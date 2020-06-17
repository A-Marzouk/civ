<template>
	<div class="profile" v-if="personalInfo" data-app>
		<div class="profile-fields-wrapper">
			<div class="profile-fields">
				<div class="profile-picture">
					<div class="profile-label">
						<div class="label">Photo</div>

						<div class="picture-preview" :style="`background-image: url(${personalInfo.profile_pic})`">
							<label class="preview-cover">
								<svg width="25" height="26" viewBox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M24.9938 11.6067C24.9938 11.0514 24.8272 10.5238 24.619 10.024C24.3413 9.37146 23.9109 8.83 23.3139 8.4135C22.9391 8.14971 21.8423 7.67767 21.398 7.66379C20.1762 7.66379 18.9406 7.66379 17.7189 7.66379C17.2468 7.66379 16.9553 7.88592 16.747 8.31631C16.5526 8.73282 16.6498 9.09379 16.8581 9.44088C16.9553 9.5936 17.108 9.70467 17.2885 9.87127C18.4547 9.87127 19.6209 9.85738 20.7732 9.87127C21.9117 9.88515 22.7586 10.6904 22.7725 11.8844C22.7863 14.8416 22.7863 17.8126 22.7725 20.7698C22.7725 21.9222 21.9395 22.7691 20.7594 22.7691C15.2476 22.783 9.74971 22.783 4.23795 22.7691C3.04396 22.7691 2.22484 21.9222 2.22484 20.7698C2.21095 17.8126 2.21095 14.8416 2.22484 11.8844C2.22484 10.6765 3.08561 9.88515 4.22406 9.87127C5.22368 9.85738 6.20941 9.87127 7.20902 9.85739C7.36174 9.85739 7.51446 9.82962 7.6533 9.77408C8.19476 9.53806 8.43078 9.06602 8.33359 8.46903C8.25029 8.01088 7.75048 7.63602 7.20902 7.63602C6.02892 7.63602 4.84882 7.63602 3.66872 7.63602C3.52989 7.63602 3.37717 7.60825 3.2661 7.6499C2.34979 7.99699 1.47513 8.3302 0.850366 9.19098C0.322792 9.91292 0.0312379 10.6904 0.0173544 11.5512C-0.0104127 14.7166 0.00347088 17.8404 0.00347088 20.9642C0.00347088 21.7695 0.170073 22.533 0.697648 23.1717C0.878133 23.3938 1.05862 23.6298 1.25299 23.8381C2.0027 24.6572 2.94678 25.0182 4.0297 25.0182C9.65253 25.0182 15.2754 25.0182 20.8982 25.0182C21.7312 25.0182 22.5087 24.8377 23.1751 24.324C23.4389 24.1158 23.6888 23.8798 23.9387 23.6437C24.6606 22.9496 24.9799 22.061 24.9938 21.103C25.0077 17.9376 24.9938 14.7722 24.9938 11.6067Z" fill="white" />
									<path d="M17.2053 15.5357C17.0248 15.1192 16.997 14.661 16.7055 14.2862C16.4694 13.9807 16.2751 13.6198 16.0113 13.3282C15.3171 12.5924 14.4702 12.1481 13.4567 11.9537C12.3599 11.7455 11.638 11.8427 10.6245 12.2314C9.54157 12.634 8.83351 13.4115 8.26428 14.3417C8.09768 14.6333 8.04215 14.9803 7.91719 15.2997C7.70894 15.8689 7.77836 16.4659 7.79224 17.049C7.79224 17.3683 7.82001 17.7293 7.95884 18.0208C8.45865 19.1593 9.15283 20.1311 10.3052 20.7142C10.7633 20.9364 11.2215 21.0613 11.7213 21.1446C12.8597 21.339 13.0124 21.2557 13.9288 21.0336C14.6229 20.8531 15.206 20.4782 15.7336 20.034C16.3028 19.548 16.7055 18.9233 16.9554 18.1874C17.1497 17.6321 17.2608 17.0768 17.2192 16.577C17.2192 16.1743 17.3163 15.8134 17.2053 15.5357ZM14.3314 18.2291C13.8455 18.7289 13.1652 19.0899 12.471 19.0343C11.1243 18.9094 9.94419 17.9514 10.0136 16.5075C10.083 15.0081 11.0688 14.1196 12.4988 14.0918C13.8593 14.064 14.9423 15.0081 14.9978 16.577C15.0394 17.2295 14.7479 17.7987 14.3314 18.2291Z" fill="white" />
									<path d="M8.3335 4.67883C8.47233 4.81766 8.61117 4.94261 8.73612 5.08145C9.09709 5.48407 9.77738 5.49796 10.1661 5.08145C10.541 4.67883 10.9297 4.30397 11.3879 3.84582C11.3879 4.1096 11.3879 4.29009 11.3879 4.47057C11.3879 5.92835 11.374 7.38612 11.3879 8.84389C11.3879 9.64913 12.2209 10.1073 12.9567 9.78797C13.4288 9.57971 13.6092 9.23263 13.6092 8.7467C13.6092 7.3167 13.6092 5.87281 13.6092 4.44281C13.6092 4.26232 13.6231 4.09572 13.637 3.87358C14.0396 4.2762 14.4423 4.60941 14.7477 5.01203C14.9837 5.31747 15.2891 5.30359 15.5807 5.373C15.7473 5.41465 15.9556 5.26194 16.1499 5.2064C16.5387 5.10922 16.6497 4.80378 16.6775 4.45669C16.6914 4.20679 16.6775 3.943 16.6775 3.70698C15.5529 2.58241 14.4561 1.47173 13.3316 0.374932C12.8179 -0.124875 12.1931 -0.110992 11.735 0.333281C10.6937 1.34678 9.66632 2.38804 8.63893 3.41543C8.44456 3.6098 8.3335 3.84582 8.34738 4.12349C8.34738 4.31786 8.3335 4.51223 8.3335 4.67883Z" fill="white" />
									<path d="M20.287 11.8289C19.801 11.8289 19.3012 11.815 18.7875 11.8289C18.3016 11.8428 17.6907 12.4676 17.8018 12.9118C17.8712 13.1895 17.9129 13.5088 18.2044 13.7171C18.4404 13.8976 18.6626 14.0503 18.968 14.0503C19.2873 14.0364 19.6206 14.0503 19.9399 14.0503C20.3564 14.0503 20.6341 13.842 20.8423 13.4949C21.0644 13.1479 20.9256 12.8008 20.9673 12.5231C20.7174 12.2732 20.5091 12.0649 20.287 11.8289Z" fill="white" />
								</svg>

								<input ref="profile_picture" type="file" @change="handleProfilePictureUpload" />
							</label>
						</div>
					</div>
					<div class="error" v-if="profile_pic_error">{{profile_pic_error}}</div>
				</div>

				<div class="profile-input-field input-field--firstname input-field--group-1">
					<v-text-field class="resume-builder__input profile-input" :class="{'resume-builder__input--disabled': false}" label="First Name" v-model="personalInfo.first_name" :error="!!errors.first_name" @blur="applyEdit('auto')" hide-details="auto" outlined></v-text-field>
				</div>

				<div class="profile-input-field input-field--lastname input-field--group-1">
					<v-text-field class="resume-builder__input profile-input" label="Last Name" v-model="personalInfo.last_name" :class="{'resume-builder__input--disabled': false}" :error="!!errors.last_name" @blur="applyEdit('auto')" hide-details="auto" outlined></v-text-field>
				</div>

				<div class="profile-input-field input-field--current-location input-field--group-1">
					<v-text-field class="resume-builder__input profile-input" label="Current Location" v-model="personalInfo.location" :class="{'resume-builder__input--disabled': false}" :error="!!errors.location" @blur="applyEdit('auto')" hide-details="auto" outlined>
						<button class="eye-icon trigger-icon icon" :class="{'icon--disabled': false}" slot="append" @click="()=>false">
							<svg-vue :icon="`eye-icon`"></svg-vue>
						</button>
					</v-text-field>
				</div>

				<div class="profile-input-field input-field--date-of-birth input-field--group-1">
					<v-menu ref="menu" v-model="menu" :close-on-content-click="false" :return-value.sync="personalInfo.date_of_birth" transition="scale-transition" offset-y min-width="290px">
						<template v-slot:activator="{ on }">
							<v-text-field v-model="personalInfo.date_of_birth" class="resume-builder__input civie-datepicker profile-input" label="Date" color="#001CE2" readonly v-on="on" hide-details="auto" outlined placeholder="yyyy-mm-dd">
								<button class="dropdown-icon icon" slot="append" @click="menu = true">
									<svg-vue :icon="`dropdown-caret`"></svg-vue>
								</button>
							</v-text-field>
						</template>
						<v-date-picker v-model="personalInfo.date_of_birth" no-title scrollable color="#001CE2">
							<v-spacer></v-spacer>
							<v-btn text color="primary" @click="menu = false">Cancel</v-btn>
							<v-btn text color="primary" @click="saveDate">OK</v-btn>
						</v-date-picker>
					</v-menu>
				</div>

				<div class="profile-input-field input-field--job-title input-field--group-1">
					<v-text-field class="resume-builder__input profile-input" label="Job Title" v-model="personalInfo.designation" :class="{'resume-builder__input--disabled': false}" :error="!!errors.designation" outlined hide-details="auto" @blur="applyEdit('auto')"></v-text-field>
				</div>

				<div class="profile-input-field input-field--nationality input-field--group-1">
					<v-text-field class="resume-builder__input profile-input" label="Nationality" v-model="personalInfo.nationality" :class="{'resume-builder__input--disabled': false}" :error="!!errors.nationality" hide-details="auto" outlined @blur="applyEdit('auto')">
						<button class="eye-icon trigger-icon icon" :class="{'icon--disabled': false}" slot="append" @click="()=>false">
							<svg-vue :icon="`eye-icon`"></svg-vue>
						</button>
					</v-text-field>
				</div>

				<div class="profile-input-field input-field--languages input-field--group-2">
					<v-select class="resume-builder__input  profile-input civie-select multiple-selection" multiple chips placeholder="Select an option" @blur="syncLanguages" v-model="selectedLanguages" item-text="label" item-value="id" :items="defaultLanguages" label="Languages" color="#001CE2" outlined hide-details="auto">
						<button class="dropdown-icon icon" slot="append">
							<svg-vue :icon="`dropdown-caret`"></svg-vue>
						</button>
					</v-select>
				</div>
				<div class="profile-input-field input-field--hometown input-field--group-2">
					<v-text-field class="resume-builder__input profile-input" label="Hometown" v-model="personalInfo.hometown" :class="{'resume-builder__input--disabled': false}" :error="!!errors.hometown" hide-details="auto" outlined @blur="applyEdit('auto')">
						<button class="eye-icon trigger-icon icon" :class="{'icon--disabled': false}" slot="append" @click="()=>false">
							<svg-vue :icon="`eye-icon`"></svg-vue>
						</button>
					</v-text-field>
				</div>

				<div class="profile-input-field input-field--about input-field--group-3">
					<v-textarea class="resume-builder__input profile-input civie-textarea" color="#001CE2" :class="{'resume-builder__input--disabled': false}" :disabled="false" v-model="personalInfo.about" label="About Me" hide-details="auto" outlined @blur="applyEdit('auto')">
						<button class="eye-icon trigger-icon" :class="{'icon--disabled': false}" slot="append">
							<svg-vue :icon="`eye-icon`"></svg-vue>
						</button>
					</v-textarea>
				</div>

				<div class="profile-input-field input-field--overview input-field--group-3">
					<v-textarea class="resume-builder__input profile-input civie-textarea" color="#001CE2" :class="{'resume-builder__input--disabled': false}" :disabled="false" v-model="personalInfo.overview" label="Overview Summary" hide-details="auto" outlined @blur="applyEdit('auto')">
						<button class="eye-icon trigger-icon" :class="{'icon--disabled': false}" slot="append">
							<svg-vue :icon="`eye-icon`"></svg-vue>
						</button>
					</v-textarea>
				</div>

				<div class="profile-input-field input-field--quote input-field--group-3">
					<v-textarea class="resume-builder__input profile-input civie-textarea" color="#001CE2" :class="{'resume-builder__input--disabled': false}" :disabled="false" label="Quote" v-model="personalInfo.quote" hide-details="auto" outlined @blur="applyEdit('auto')">
						<button class="eye-icon trigger-icon" :class="{'icon--disabled': false}" slot="append">
							<svg-vue :icon="`eye-icon`"></svg-vue>
						</button>
					</v-textarea>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "Personal",
	data(vm) {
		return {
			errors: {},
			tempPic: "",
			profile_pic_error: "",
			savingType: "manual",
			menu: false,
			defaultLanguages: [],
			selectedLanguages: [],
		};
	},
	computed: {
		personalInfo() {
			return this.$store.state.user.personal_info;
		},
		languages() {
			return this.$store.state.user.languages.map(a => a.id);
		},
		user() {
			return this.$store.state.user;
		}
	},

	methods: {
		// date functions
		saveDate() {
			this.$refs.menu.save(this.personalInfo.date_of_birth);
			this.applyEdit("auto");
		},

		syncLanguages(){
			axios.post('/api/user/languages-sync', {IDs : this.selectedLanguages, user_id: this.user.id})
					.then( () => {
						this.$store.dispatch("flyingNotification");
					})
					.catch(e => {
						this.$store.dispatch("flyingNotification", {
							message: "Error",
							iconSrc: "/images/resume_builder/error.png"
						});
					});
		},
		applyEdit(savingType) {
			let formData = new FormData();
			formData.append("_method", "put");
			formData.append("user_id", this.user.id);

			$.each(this.personalInfo, field => {
				if (this.personalInfo[field] !== null) {
					if (field !== "email" && this.personalInfo[field].length) {
						formData.append(field, this.personalInfo[field]);
					}
					if (field === "profile_pic") {
						formData.append(field, this.personalInfo[field]);
					}
				}
			});

			this.errors = {};

			axios
				.post("/api/user/personal-info", formData, {
					headers: { "Content-Type": "multipart/form-data" }
				})
				.then(response => {
					if (savingType === "manual") {
						this.$store.dispatch("fullScreenNotification");
					} else {
						this.$store.dispatch("flyingNotification");
					}
					this.personalInfo.profile_pic =
						response.data.data.profile_pic;
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
		handleProfilePictureUpload() {
			// validate uploaded file :
			let isValid = this.validateUploadedFile(
				this.$refs.profile_picture.files[0]
			);
			if (isValid) {
				this.personalInfo.profile_pic = this.$refs.profile_picture.files[0];
				this.tempPic = URL.createObjectURL(
					this.$refs.profile_picture.files[0]
				);
				this.profile_pic_error = "";
				this.applyEdit("auto");
			} else {
				this.profile_pic_error = "Incorrect file chosen!";
			}
		},
		validateUploadedFile(file) {
			let isValid = true;
			if (file.type.search("image") === -1) {
				isValid = false;
			}
			if (file.size > 25000000) {
				isValid = false;
			}
			return isValid;
		},

		canEditEmail() {
			return !(
				this.user.instagram_id !== null &&
				!this.isEmail(this.personalInfo.email)
			);
		},
		isEmail(email) {
			var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(String(email).toLowerCase());
		},
		setUserPreSelectedLanguages(){
			this.selectedLanguages = this.$store.state.user.languages.map(a => a.id) ;
		}
	},
	mounted() {
		axios.get('/api/user/languages-list')
				.then( (response) => {
					this.defaultLanguages = response.data.data ;
					this.defaultLanguages.sort((a,b)=> (a.label>b.label)*2-1);
				}).then( () => {
					this.setUserPreSelectedLanguages()
				});
	}
};
</script>

<style lang="scss" scoped>
@import "../../../../../sass/media-queries";

.profile {
	max-width: 350px;
	margin-right: auto;
	margin-left: auto;

	.profile-fields-wrapper {
		padding: 10px;
		max-height: 450px;
		overflow-y: scroll;

		.profile-fields {
			padding: 10px;
			background: #ffffff;
			box-shadow: 5px -5px 14px -5px rgba(0, 16, 131, 0.1),
				-5px 5px 14px -5px rgba(0, 16, 131, 0.1);

			.profile-picture {
				padding-top: 13px;
				padding-bottom: 15px;

				.profile-label {
					.picture-preview {
						position: relative;
						overflow: hidden;
						height: 120px;
						width: 120px;
						background-color: #f2f3fd;
						background-size: cover;
						background-position: center;
						background-repeat: no-repeat;
						border-radius: 100px;

						.preview-cover {
							position: absolute;
							bottom: 0;
							left: 0;
							width: 100%;
							height: 50px;
							margin-bottom: 0;
							display: flex;
							align-items: center;
							justify-content: center;
							transition: background-color 0.3s;

							svg {
								opacity: 0;
								transition: opacity 0.3s;
							}
						}

						&:hover {
							.preview-cover {
								background: rgba(0, 28, 226, 0.5);
								svg {
									opacity: 1;
								}
							}
						}

						input[type="file"] {
							height: 0;
							width: 0;
						}
					}

					.label {
						color: #888db1;
						font-size: 16px;
						line-height: 18px;
						margin-bottom: 12px;
					}
				}
			}

			.profile-input-field {
				margin-bottom: 15px;

				&:last-child {
					margin-bottom: unset;
				}
			}
		}

		&::-webkit-scrollbar {
			width: 5px;
			background: #e5e5e5;
			border-radius: 5px 0 0 5px;
		}

		&::-webkit-scrollbar-thumb {
			background: #001ce2;
			border-radius: 5px 0 0 5px;
		}
	}

	@include gt-xs {
		max-width: unset;
		margin-left: -10px;

		.profile-fields-wrapper {
			padding-right: 20px;
			margin-top: 30px;

			.profile-fields {
				padding: 20px;
				display: grid;
				grid-template-columns: 1fr 1fr;
				gap: 20px;

				.profile-picture {
					grid-row-start: 1;
					grid-row-end: 2;
					grid-column-start: 1;
					grid-column-end: 2;
					padding-top: 5px;
					padding-bottom: 5px;
				}

				.profile-input-field {
					margin-bottom: unset;

					&.input-field--group-1 {
						grid-column-start: 1;
						grid-column-end: 2;

						&.input-field--firstname {
							grid-row-start: 2;
							grid-row-end: 3;
						}
						&.input-field--lastname {
							grid-row-start: 3;
							grid-row-end: 4;
						}
						&.input-field--current-location {
							grid-row-start: 4;
							grid-row-end: 5;
						}
						&.input-field--date-of-birth {
							grid-row-start: 5;
							grid-row-end: 6;
						}
						&.input-field--job-title {
							grid-row-start: 6;
							grid-row-end: 7;
						}
						&.input-field--nationality {
							grid-row-start: 7;
							grid-row-end: 8;
						}
					}

					&.input-field--group-2 {
						grid-column-start: 2;
						grid-column-end: 3;

						&.input-field--languages {
							grid-row-start: 6;
							grid-row-end: 7;
						}

						&.input-field--hometown {
							grid-row-start: 7;
							grid-row-end: 8;
						}
					}

					&.input-field--group-3 {
						grid-column-start: 2;
						grid-column-end: 3;

						&.input-field--about {
							grid-row-start: 1;
							grid-row-end: 2;
						}
						&.input-field--overview {
							grid-row-start: 2;
							grid-row-end: 4;
						}
						&.input-field--quote {
							grid-row-start: 4;
							grid-row-end: 6;
						}
					}
				}
			}

			&::-webkit-scrollbar {
				width: 10px;
				border-radius: 10px 0 0 10px;
			}

			&::-webkit-scrollbar-thumb {
				border-radius: 10px 0 0 10px;
			}
		}
	}

	@include gt-md {
		.profile-fields-wrapper {
			max-height: unset;
			margin-top: unset;

			.profile-fields {
				padding: 30px;
				grid-template-columns: 1fr 1fr 1fr 1fr;
				box-shadow: 0 0 7px -3px rgba(0, 0, 0, 0.24);

				.profile-picture {
					grid-row-end: 3;
				}

				.profile-input-field {
					margin-bottom: unset;

					&.input-field--group-1 {
						&.input-field--firstname {
							grid-row-start: 1;
							grid-row-end: 2;
							grid-column-start: 2;
							grid-column-end: 3;
						}
						&.input-field--lastname {
							grid-row-start: 1;
							grid-row-end: 2;
							grid-column-start: 3;
							grid-column-end: 4;
						}
						&.input-field--current-location {
							grid-row-start: 1;
							grid-row-end: 2;
							grid-column-start: 4;
							grid-column-end: 5;
						}
						&.input-field--date-of-birth {
							grid-row-start: 2;
							grid-row-end: 3;
							grid-column-start: 2;
							grid-column-end: 3;
						}
						&.input-field--job-title {
							grid-row-start: 2;
							grid-row-end: 3;
							grid-column-start: 3;
							grid-column-end: 4;
						}
						&.input-field--nationality {
							grid-row-start: 2;
							grid-row-end: 3;
							grid-column-start: 4;
							grid-column-end: 5;
						}
					}

					&.input-field--group-2 {
						&.input-field--languages {
							grid-row-start: 3;
							grid-row-end: 4;
							grid-column-start: 1;
							grid-column-end: 2;
						}

						&.input-field--hometown {
							grid-row-start: 4;
							grid-row-end: 5;
							grid-column-start: 1;
							grid-column-end: 2;
						}
					}

					&.input-field--group-3 {
						&.input-field--about {
							grid-row-start: 3;
							grid-row-end: 5;
							grid-column-start: 2;
							grid-column-end: 3;
						}
						&.input-field--overview {
							grid-row-start: 3;
							grid-row-end: 5;
							grid-column-start: 3;
							grid-column-end: 4;
						}
						&.input-field--quote {
							grid-row-start: 3;
							grid-row-end: 5;
							grid-column-start: 4;
							grid-column-end: 5;
						}
					}
				}
			}
		}
	}

	@include gt-lg {
		.profile-fields-wrapper {
			.profile-fields {
				padding: 45px;
			}
		}
	}
}

.picture-preview .old {
	.profile-tab-upper {
		background: #ffffff;
		box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1);
		margin-bottom: 70px;
		padding: 50px 0 35px 40px;

		.profile-input {
			max-width: 300px;
			min-width: 300px;
			margin-right: 40px;
			margin-top: 20px;
		}

		.profile-pic-row-holder {
			height: 110px;
			width: 25%;
			background: whitesmoke;
		}

		.profile-pic-row-wrapper {
			width: 33%;
			.label {
				font-size: 16px;
				line-height: 18px;
				margin-bottom: 12px;
				margin-top: -8px;
				color: #888db1;
			}
		}

		.profile-pic-row {
			display: flex;
			align-items: center;

			.profile-pic {
				position: relative;
				overflow-y: hidden;
				border-radius: 50%;

				img {
					width: 120px;
					height: 120px;
					border-radius: 50%;
				}

				.photo-cover {
					&:hover {
						cursor: pointer;
					}
					width: 120px;
					height: 50px;
					background: #001ce2;
					opacity: 0.5;
					position: absolute;
					bottom: 0px;
					display: flex;
					align-items: center;
					justify-content: center;
					img {
						width: 25px;
						height: 25px;
						opacity: 1;
						border-radius: 0;
					}
				}
			}

			.info-my-account {
				margin-left: 21px;

				.name {
					font-family: Noto Sans, sans-serif;
					font-style: normal;
					font-weight: 600;
					font-size: 24px;
					line-height: 36px;
					color: #888db1;
				}

				.job-title {
					font-family: Noto Sans, sans-serif;
					font-style: normal;
					font-weight: 600;
					font-size: 18px;
					line-height: 25px;
					color: #888db1;
				}
			}
		}

		display: flex;
		flex-wrap: wrap;
	}

	.input-margins {
		margin-left: 40px;
		margin-top: 20px;
	}
}
</style>

<style lang="scss">
.profile .profile-fields .profile-input-field {
	&.input-field--about .v-input__control {
		height: 159px;
	}

	.v-textarea.v-text-field--box {
		&.v-text-field--outlined:not(.v-input--dense) textarea,
		&.v-text-field--single-line:not(.v-input--dense) textarea {
			max-height: 100%;
			margin-top: unset;

			&::-webkit-scrollbar,
			&::-webkit-scrollbar-thumb {
				display: none;
				width: 0;
			}
		}
	}

	.v-textarea.v-text-field--enclosed {
		&.v-text-field--outlined:not(.v-input--dense) textarea,
		&.v-text-field--single-line:not(.v-input--dense) textarea {
			max-height: 100%;
			margin-top: unset;

			&::-webkit-scrollbar,
			&::-webkit-scrollbar-thumb {
				display: none;
				width: 0;
			}
		}
	}

	@media screen and (min-width: 1280px) {
		&.input-field--about .v-input__control {
			height: auto;
		}
	}
}
</style>
