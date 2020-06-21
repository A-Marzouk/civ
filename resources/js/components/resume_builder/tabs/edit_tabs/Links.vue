<template>
	<div id="linksSection" data-app>

		<!-- Tabs -->
		<v-tabs class="resume-builder__tab-bar" hide-slider>
			<v-tab class="resume-builder__tab tabName" v-for="tab in tabs" :key="tab" @click="setLinkCategory(tab)">
				{{tab}}
			</v-tab>
		</v-tabs>

		<!-- Content -->

		<div class="links-content resume-builder__scroll" v-if="links">

			<div class="link-inputs-row">
				<v-select class="resume-builder__input civie-select icon-prepended" outlined placeholder="Site" :items="getCurrentCategories()" label="Site" color="#001CE2" v-model="editedLink.link_title">
					<button class="dropdown-icon icon" slot="append">
						<svg-vue :icon="`dropdown-caret`"></svg-vue>
					</button>

					<button class="input-prepended-icon" slot="prepend">
						<img :src="`/images/resume_builder/${linkCategory}_icons/${editedLink.link_title.toLowerCase()}-1.svg`" alt="link icon">
					</button>

				</v-select>

				<v-text-field class="resume-builder__input civie-input" outlined color="#001CE2" placeholder="https://github.com/john-doe" :class="{'resume-builder__input--disabled': false}" :disabled="false" label="URL" :error="!!errors.link" v-model="editedLink.link">
				</v-text-field>

				<v-btn class="resume-builder__btn civie-btn filled" raised @click="saveLink">
					{{editedLink.id !== '' ? 'Update' : 'Add New'}}
				</v-btn>

				<v-btn class="resume-builder__btn civie-btn ml-2" raised @click="clearLink" v-show="editedLink.id !== '' ">
					Cancel
				</v-btn>

			</div>

			<draggable class="links-items" v-model="links" @start="drag=true" @end="drag=false"  handle=".mover">
				<div class="link-item" v-for="link in links" :key="link.id" v-if="link.link && link.category === linkCategory">
					<div class="link-data">
						<div class="mover">
							<img src="/images/new_resume_builder/three-dots.svg" alt="mover icon">
						</div>
						<div class="link-text">
							<img :src="`/images/resume_builder/${linkCategory}_icons/${link.link_title.toLowerCase()}-1.svg`" alt="link icon">
							{{link.link}}
						</div>
					</div>
					<div class="action-btns">
						<div class="resume-builder__action-buttons-container">
							<v-btn class="btn-icon civie-btn" depressed @click="toggleLink(link)">
								<svg-vue icon="eye-icon" class="icon" :class="{'visible' : link.is_active}"></svg-vue>
							</v-btn>
							<v-btn class="btn-icon civie-btn" depressed @click="editLink(link)">
								<svg-vue icon="edit-icon" class="icon" :class="{'visible' : link.id === editedLink.id}"></svg-vue>
							</v-btn>

							<v-btn class="btn-icon civie-btn" depressed @click="deleteLink(link)">
								<svg-vue icon="trash-delete-icon" class="icon"></svg-vue>
							</v-btn>
						</div>
					</div>
				</div>
			</draggable>

		</div>

	</div>
</template>

<script>
import draggable from "vuedraggable";

export default {
	components: {
		draggable
	},
	data: () => ({
		tabs: ["professional", "social", "contact"],
		professionalLinksCategories: [
			"GitHub",
			"LinkedIn",
			"Behance",
			"Dribbble",
			"Website",
			"PDF"
		],
		socialLinksCategories: [
			"Facebook",
			"Instagram",
			"Pinterest",
			"Twitter"
		],
		contactLinksCategories: ["Messenger", "Telegram", "Whatsapp", "Skype"],
		socialLinks: [],
		professionalLinks: [],
		contactLinks: [],
		errors: {},
		linkCategory: "professional",
		editedLink: {
			id: "",
			link_title: "website",
			link: "",
			is_active: true
		},
		linkHolder: {}
	}),
	methods: {
		editLink(link) {
			this.editedLink.id = link.id;
			this.editedLink.link_title = link.link_title;
			this.editedLink.link = link.link;
		},
		setLinkCategory(category) {
			this.linkCategory = category;
			this.clearLink();
		},
		toggleLink(link) {
			link.is_active = !link.is_active;
			axios.put("/api/user/links", link)
				.then(response => {
					this.$store.dispatch("flyingNotification");
					this.closeOptionsBtn();
				})
				.catch(error => {
					if (typeof error.response.data === "object") {
						this.errors.edit = error.response.data.errors;
					} else {
						this.errors.edit =
							"Something went wrong. Please try again.";
					}
					this.$store.dispatch("flyingNotification", {
						message: "Error",
						iconSrc: "/images/resume_builder/error.png"
					});
				});
		},
		setActiveTab(tab) {
			this.activeTab = tab;
		},
		deleteLink(link) {
			if (
				!confirm(
					"Do you want to delete this link [" + link.link + "] ?"
				)
			) {
				return;
			}
			axios
				.delete("/api/user/links/" + link.id)
				.then(response => {
					this.$store.dispatch("flyingNotificationDelete");
					this.links.forEach((link, index) => {
						if (link.id === response.data.data.id) {
							this.links.splice(index, 1);
						}
					});

					this.closeOptionsBtn();
				})
				.catch(error => {
					console.log(error);
				});
		},
		saveLink() {
			this.errors = {};

			if (!this.validURL(this.editedLink.link)) {
				this.errors = { link: "Not a valid link!" };
				return;
			}

			let edit = false;
			if (this.editedLink.id !== "") {
				edit = true;
			}
			this.editedLink.user_id = this.$store.state.user.id;
			this.editedLink.category = this.linkCategory;

			axios
				.post("/api/user/links", this.editedLink)
				.then(response => {
					if (!edit) {
						let addedLink = response.data.data;
						this.links.push(addedLink);
					} else {
						this.links.forEach((link, index) => {
							if (link.id === response.data.data.id) {
								this.links[index] = response.data.data;
							}
						});
					}
					this.clearLink();
					this.$store.dispatch('flyingNotification');
				})
				.catch(error => {
					if (typeof error.response.data === "object") {
						this.errors = error.response.data.errors;
					} else {
						this.errors = "Something went wrong. Please try again.";
					}
					this.$store.dispatch("flyingNotification", {
						message: "Error",
						iconSrc: "/images/resume_builder/error.png"
					});
				});
		},
		cancelEdit() {},
		clearLink() {
			this.editedLink = {
				id: "",
				link_title: "website",
				category: this.linkCategory,
				link: "",
				is_active: true,
				user_id: this.$store.state.user.id
			};
		},
		validURL(str) {
			var pattern = new RegExp(
				"^(https?:\\/\\/)?" + // protocol
				"((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|" + // domain name
				"((\\d{1,3}\\.){3}\\d{1,3}))" + // OR ip (v4) address
				"(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*" + // port and path
				"(\\?[;&a-z\\d%_.~+=-]*)?" + // query string
					"(\\#[-a-z\\d_]*)?$",
				"i"
			); // fragment locator
			return !!pattern.test(str);
		},
		getCurrentCategories() {
			if (this.linkCategory === "professional") {
				return this.professionalLinksCategories;
			} else if (this.linkCategory === "social") {
				return this.socialLinksCategories;
			} else {
				return this.contactLinksCategories;
			}
		}
	},
	computed: {
		links: {
			get() {
				return this.$store.state.user.links;
			},
			set(links) {
				this.$store.commit("updateLinks", links);
			}
		}
	},
	mounted() {}
};
</script>

<style lang="scss" scoped>
@import "../../../../../sass/media-queries";

$mainBlue: #001ce2;

#linksSection {
	.links-content {
		height: 323px;
		background: #fff;
		box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1);
		padding: 50px;
		margin-bottom: 70px;


		@include lt-sm {
			height: 400px;
		}
	}

	.tabName {
		text-transform: capitalize;
	}

	.link-inputs-row {
		display: flex;
		align-items: center;
		margin-top: 12px;

		.civie-select {
			max-width: 210px;
			margin-right: 30px;

			.v-input__slot {
				padding-left: 30px !important;
			}

			.input-prepended-icon {
				position: absolute;
				top: 41px;
				left: 5px;

				img {
					width: 33px;
				}
			}
		}

		.civie-input {
			max-width: 350px;
			margin-right: 30px;
		}

		.civie-btn {
			min-height: 54px;
		}

		@include lt-md {
			flex-wrap: wrap;
			justify-content: space-between;

			.civie-input {
				max-width: 59%;
				width: 59%;
				margin-right: 0;
			}

			.civie-select {
				margin-right: 0;
				width: 39%;
				max-width: 39%;
			}
		}

		@include lt-sm {
			.civie-input,
			.civie-select {
				max-width: 100%;
				width: 100%;
			}
		}
	}

	.links-items {
		.link-item {
			width: 100%;
			height: 50px;
			display: flex;
			margin-bottom: 30px;
			align-items: center;
			justify-content: space-between;
			background: white;
			box-shadow: 0 5px 20px rgba(0, 16, 131, 0.15);

			.link-data {
				display: flex;
				height: 50px;

				.mover {
					width: 50px;
					display: flex;
					justify-content: center;
					align-items: center;
					border-right: 1px solid #e6e8fc;

					img {
						width: 12px;
						height: 16px;
					}

					&:hover {
						cursor: grab;
					}
				}

				.link-text {
					display: flex;
					align-items: center;
					margin-left: 10px;
					font-size: 18px;
					line-height: 25px;
					color: #888db1;

					img {
						width: 45px;
						height: auto;
					}
				}
			}

			.action-btns {
				margin-right: 10px;

				.resume-builder__action-buttons-container {
					position: static;
				}
			}
		}
	}
}

.error {
	color: red;
	padding-top: 5px;
	padding-left: 3px;
}
</style>
