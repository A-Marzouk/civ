<template>
	<div class="edit-cv">
		<sidebar :activeTab="activeTab" @onChange="activeTab=$event" />

		<main class="edit-cv-content">
			<transition name="fade" mode="out-in" class="d-flex flex-column">
				<router-view></router-view>
			</transition>

			<span @click="updateIframe" id="updateIframe"></span>


			<div v-if="activeTab !== 'imports'" class="v-application preview-action-row v-application--is-ltr theme--light">
				<div class="switch">
					<div class="text">
						Preview Auto Update
					</div>
					<v-switch v-model="cvAutoUpdate"></v-switch>
				</div>
				<div class="refresh" @click="updateIframe('true')">
					Refresh Your Data <img src="/icons/refresh.svg" alt="">
				</div>
			</div>

			<div class="cv-content-preview-wrapper" v-if="activeTab !== 'imports'">
				<div class="cv-content-preview">
					<div class="cv-preview-link">
						<a v-if="user.username" :href="`https://civ.ie/${user.username}/${user.default_resume_link.url}`" target="_blank">
							https://civ.ie/{{user.username}}/{{user.default_resume_link.url}}
						</a>
					</div>
					<div class="cv-preview-theme-wrapper">
						<div class="cv-preview-theme">
							<div class="theme-preview-loader" v-if="!isFrameLoaded">
								<v-skeleton-loader
										class="mx-auto loader"
										type="list-item-avatar-three-line, image, article, actions"
								></v-skeleton-loader>
							</div>
							<vue-friendly-iframe v-if="user.username" :src="this.baseUrl + user.username + '/' + user.default_resume_link.url + `?current-view=${activeTab}`" @iframe-load="onLoad"></vue-friendly-iframe>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
</template>

<script>
import sidebar from "./../components/edit-tabs/sidebar";

export default {
	name: "EditCV",

	components: {
		sidebar: sidebar,
	},

	data: () => ({
		activeTab: "profile",
		baseUrl: '',
		cvAutoUpdate: true,
		isFrameLoaded: false
	}),

	computed: {
		user() {
			return this.$store.state.user;
		}
	},
	methods:{
		getThemeUrl(){
			// refresh iframe src:
				this.baseUrl =  '';
				setTimeout(() => {
					this.setBaseURL();
				}, 0)

		},
		setBaseURL() {
			let getUrl = window.location;
			this.baseUrl = getUrl.protocol + "//" + getUrl.host + "/";
		},
		onLoad(){
			// remove the spinner loader.
			this.isFrameLoaded = true;
		},
		updateIframe(force = 'false'){
			if(this.cvAutoUpdate || force === 'true'){
				this.isFrameLoaded = false;
				setTimeout(() => {
					this.getThemeUrl();
				},0);
			}
		}
	},

	created() {
		this.activeTab = window.location.pathname.split("/")[3];
	},
	mounted() {
		this.setBaseURL();
	}
};
</script>

<style lang="scss" scoped>
$activeColor: #001ce2;
$disabledColor: #9f9e9e;

@import "../../../../sass/media-queries";

.edit-cv {


	.edit-cv-content {
		padding: 40px 5px;
	}

	@include gt-xs {
		padding: 40px 30px 30px;

		.edit-cv-content {
			padding-left: unset;
			padding-right: unset;
		}
	}

	@include gt-md {
		display: flex;

		.edit-cv-content {
			flex: 1;
			overflow: hidden;
			padding-left: 30px;
		}
	}
}

.cv-content-preview-wrapper {
	overflow-y: scroll;
	padding: 10px;
	max-height: 600px;
	max-width: 94%;
	margin-left: auto;
	margin-right: auto;

	&::-webkit-scrollbar {
		width: 5px;
		height: 0;
		background: #e5e5e5;
		border-radius: 5px 0 0 5px;
	}

	&::-webkit-scrollbar-thumb {
		background: #001ce2;
		border-radius: 5px 0 0 5px;
	}

	.cv-content-preview {
		.cv-preview-link {
			height: 50px;
			display: flex;
			align-items: center;
			border-radius: 5px;
			padding-left: 25px;
			border: 1px solid #e6e8fc;

			a {
				color: #888db1;
				font-family: "Roboto", "sans-serif";
				font-size: 20px;
				line-height: 22px;

				&:hover {
					color: inherit;
				}
			}
		}

		.cv-preview-theme-wrapper {
			.cv-preview-theme {
				overflow-x: scroll;

				&::-webkit-scrollbar {
					height: 0;
				}

				&::-webkit-scrollbar-thumb {
					height: 0;
				}
			}
		}
	}

	@include gt-xs {
		padding: 10px;
		padding-right: 20px;
		max-width: unset;
		margin-left: -10px;

		&::-webkit-scrollbar {
			width: 10px;
			border-radius: 10px 0 0 10px;
		}

		&::-webkit-scrollbar-thumb {
			border-radius: 10px 0 0 10px;
		}
	}
}

.aside-link {
	font-size: 22px;
	padding-right: 32px;

	.icon {
		width: 45px;
		height: 45px;
		margin-right: 20px;
	}

	.aside-icon {
		path {
			fill: none;
			stroke: $disabledColor;
			transition: all 0.5s ease;
		}

		circle {
			fill: none;
			stroke: $disabledColor;
			transition: all 0.5s ease;
		}
	}

	&.active {
		a {
			color: $activeColor;
			transition: all 1s ease;
		}

		.aside-icon {
			path {
				fill: $activeColor;
				stroke: #fff;
				transition: all 0.5s ease;
			}

			circle {
				fill: $activeColor;
				stroke: #fff;
				transition: all 0.5s ease;
			}
		}
	}

	a {
		padding: 13px 0;
justify-content: flex-start;
		color: $disabledColor;
		transition: all 1s ease;
		display: block;
		width: 100%;
		height: 100%;

		&:active,
		&:hover {
			text-decoration: none;
			cursor: pointer;
		}
	}
}
.aside-icon {
	margin-right: 22px;
	width: 40px;
}

.fade-enter-active {
	transition: all 0.6s ease;
}

.fade-leave-active {
	transition: all 0.6s cubic-bezier(1, 0.5, 0.8, 1);
}

.fade-enter, .fade-leave-to
    /* .fade-leave-active below version 2.1.8 */
 {
	opacity: 0;
}
</style>

<style lang="scss">
	@import "../../../../sass/media-queries";

	.v-application--wrap{
		min-height: 450px !important;
	}

	.preview-action-row{
		display: flex;
		justify-content: space-between;
		align-items: center;
		flex-direction: row;
		margin-top: 40px;
		height: 50px;

		font-style: normal;
		font-weight: 500;
		font-size: 18px;
		line-height: 22px;
		color: #888DB1 !important;

		padding-right: 30px;
		@include lt-sm{
			font-size: 14px;
			padding-right: 24px;
			padding-left: 24px;
		}

		.switch{
			display: flex;
			align-items: center;


			@include lt-sm{
				flex-wrap: wrap;
				justify-content :center;
				.v-input--selection-controls.v-input--switch{
					margin-top: 0 !important;
					padding-top: 0 !important;
					.v-input__control{
						height: 28px !important;
						.v-input__slot{
							margin-bottom: 0 !important;
						}
					}
				}
			}
			.text{
				margin-right:10px;
			}
		}
		.refresh{
			display: flex;
			align-items: center;
			@include lt-sm{
				flex-wrap: wrap;
				justify-content :center;
			}
			img{
				margin-left:10px;
			}
			&:hover{
				cursor: pointer;
			}
		}
	}

	/* I frame styling */
	.vue-friendly-iframe{
		iframe{
			width:100%;
			min-height:1300px;
		}
	}

	.theme-preview-loader{
		width: 100%;
		min-height:1300px;

		.loader{
			max-width:95%;
			margin-top:25px;
			.v-skeleton-loader__list-item-avatar-three-line.v-skeleton-loader__bone{
				margin-top:25px;
				margin-bottom: 20px;
				.v-skeleton-loader__avatar.v-skeleton-loader__bone{
					margin-right:12px;
				}
			}

			.v-skeleton-loader__image.v-skeleton-loader__bone{
				margin-top:25px;
				margin-bottom: 20px;
			}

			.v-skeleton-loader__article.v-skeleton-loader__bone{
				margin-top:25px;
				margin-bottom: 20px;
			}

			.v-skeleton-loader__actions.v-skeleton-loader__bone{
				margin-top:20px;
				.v-skeleton-loader__button.v-skeleton-loader__bone{
					margin-right:30px;
				}
			}
		}
	}
</style>