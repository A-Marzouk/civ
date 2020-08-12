<template>
	<div class="resume-container" :class="{'collapsed': !openMenu}">
		<resume-builder-nav :activeTab="activeTab" :openMenu="openMenu" @onOpen="openMenu=true" @onClose="openMenu=false" @onChange="setActiveTab" />

		<transition :duration="590" class="content" name="fade" mode="out-in">
			<router-view class="main-router-view"></router-view>
		</transition>

		<!-- Notifications and progress bar | to be moved to component-->

		<div class="modal fade" id="fullScreenNotificationModal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content border-0" style="border:none !important;">
					<div class="modal-body">
						<!-- image and notification text are set on stor.js (while sending the event) - default value is for success-->
						<div class="thank-you-pop d-flex">
							<img src="" id="notificationIconSrc" alt="notification modal">
							<div class="success-message-text" id="notificationText"></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="flying-notification" id="flyingNotification">
			<div class="d-flex align-items-center justify-content-center w-100">
				<img src="" id="flyingNotificationIconSrc" alt="notification modal">
				<div class="text" id="flyingNotificationText"></div>
			</div>
		</div>

		<div class="flying-notification delete" id="flyingNotificationDelete">
			<div class="d-flex align-items-center justify-content-center w-100">
				<img src="/images/resume_builder/delete-icon-red.png" alt="notification modal">
				<div class="text">Deleted</div>
			</div>
		</div>

		<div class="progressBar" id="progressBar"></div>

		<div class="modal importModal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="prices" aria-hidden="true" style="overflow: hidden!important;">
			<div class="modal-dialog" role="document">
				<div class="modal-content">

					<div class="modal-body">
						<div class="close-btn" data-dismiss="modal">
							<a href="javascript:void(0)">
								<img src="/images/resume_builder/my_account/close-modal.png" alt="Close icon">
							</a>
						</div>
						<div class="importModalContent">
							<div class="title">
								Import from
							</div>

							<div class="importOptions">
								<div class="item">
									<img src="/images/resume_builder/my_account/word.png" alt="Word icon">
									Word
								</div>
								<div class="item">
									<img class="behance" src="/images/resume_builder/my_account/behance.png" alt="Behance icon">
									Behance
								</div>
								<div class="item">
									<img src="/images/resume_builder/my_account/download.png" alt="Upload icon" style="transform: scaleY(-1);">
									Upload PDF
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import resumeBuilderNav from "./components/main/resume-builder-nav";

export default {
	name: "Main",
	components: {
		"resume-builder-nav": resumeBuilderNav
	},
	data() {
		return {
			openMenu: false,
			activeTab: "myAccount"
		};
	},
	computed: {
		user() {
			return this.$store.state.user;
		},
		personalInfo() {
			return this.$store.state.user.personal_info;
		}
	},
	methods: {
		setActiveTab(tab) {
			this.activeTab = tab;
		}
	},
	mounted() {
		this.$store.dispatch("setCurrentUser", this.$attrs.tempuser);
		let currentTab = "myAccount";
		let pathArray = window.location.pathname.split("/");
		pathArray.forEach(tab => {
			if (tab === "resume-builder") {
				currentTab = pathArray[pathArray.indexOf(tab) + 1];
			}
		});

		switch (currentTab) {
			case "edit":
				this.setActiveTab("editCV");
				break;
			case "view":
				this.setActiveTab("viewCV");
				break;
			case "jobs":
				this.setActiveTab("jobAlert");
				break;
			case "cover-letter":
				this.setActiveTab("coverLetter");
				break;
			default:
				this.setActiveTab("myAccount");
				break;
		}
	}
};
</script>

<style lang="scss" scoped>
@import "../../../sass/media-queries";

$resume-builder-nav-height: 99px;

body.modal-open {
	overflow: visible !important;
}

.resume-container {
	width: 100%;
	transition: all 0.5s;
	padding-top: calc(#{$resume-builder-nav-height} * 2);

	&.collapsed {
		padding-top: $resume-builder-nav-height;
	}

	@include gt-xs {
		&,
		&.collapsed {
			padding-top: unset;
		}
	}
}

.main-router-view {
	min-height: calc(100vh - #{$resume-builder-nav-height});
	max-width: 1024px;
	margin-left: auto;
	margin-right: auto;

	@include gt-md {
		max-width: #{$screen-xl-min};
	}

	@include gt-lg {
		max-width: #{$screen-xl-min};
	}
}

.content {
	width: 100%;

	&.hideInfoWrapper {
		margin: 0;

		.info-wrapper {
			display: none;
		}
	}

	.info-wrapper {
		@include lt-md {
			display: none !important;
		}
	}
}

.info-wrapper {
	display: flex;
	align-items: center;

	.avatar {
		margin-right: 32px;
		img {
			width: 167px;
			height: 167px;
			border-radius: 50%;
		}
	}

	.name-title-wrapper {
		.user-name {
			margin-bottom: 4px;
			font: Bold 34px/46px Noto Sans;
			letter-spacing: 0;
			color: #413a5d;
			opacity: 1;
		}

		.job-title {
			margin-left: 4px;
			font: Medium 18px/24px Noto Sans;
			letter-spacing: 0;
			color: #413a5d;
			opacity: 1;
		}
	}
}

.thank-you-pop {
	width: 100%;
	display: flex;
	align-items: center;
	justify-content: center;

	img {
		width: 99px;
		height: 99px;
		margin-right: 64px;
	}

	p {
		font-size: 20px;
		margin-bottom: 27px;
		color: #5c5c5c;
	}

	h3.cupon-pop {
		font-size: 25px;
		margin-bottom: 40px;
		color: #222;
		display: inline-block;
		text-align: center;
		padding: 10px 20px;
		border: 2px dashed #222;
		clear: both;
		font-weight: normal;

		span {
			color: #03a9f4;
		}
	}

	a {
		display: inline-block;
		margin: 0 auto;
		padding: 9px 20px;
		color: #fff;
		text-transform: uppercase;
		font-size: 14px;
		background-color: #8bc34a;
		border-radius: 17px;

		i {
			margin-right: 5px;
			color: #fff;
		}
	}
}

#fullScreenNotificationModal .modal-header {
	border: 0px;
}

.success-message-text {
	font-weight: 600;
	font-size: 33px;
	text-align: left;
	color: #505050;
}

#fullScreenNotificationModal {
	align-items: center;
	background: rgba(255, 255, 255, 0.9);
	overflow-y: hidden;
	.modal-dialog {
		max-width: 736px !important;
		height: 100vh !important;
		display: flex;
	}

	.modal-content {
		border: none;
		border-radius: 45px;
		margin: auto !important;
		height: fit-content !important;
	}
	.modal-body {
		height: 303px;
		display: flex;
		align-items: center;
		justify-content: center;
	}
}

.progressBar {
	position: fixed;
	width: 0%;
	height: 7px;
	bottom: 0;
	left: 0;
	background: #001ce2;
}

// import modal styles:

.importModal {
	.modal-dialog {
		display: flex;
		justify-content: center;
		margin-top: 15%;

		.modal-content {
			width: 889px;
			border-radius: 20px;

			.modal-body {
				width: 889px;
				height: 340px;

				border: 1.5px solid #001ce2;
				border-radius: 20px;

				display: flex;
				align-items: flex-start;
				justify-content: center;

				padding-left: 120px;
				padding-right: 120px;

				.importModalContent {
					width: 100%;
					display: flex;
					align-items: center;
					flex-direction: column;

					.title {
						margin-top: 20px;
						margin-bottom: 40px;
						font-weight: bold;
						font-size: 48px;
						text-align: left;
						color: #001ce2;
					}

					.importOptions {
						display: flex;
						justify-content: space-between;
						width: 100%;

						.item {
							display: flex;
							flex-direction: column;
							align-items: center;
							justify-content: flex-end;

							font-weight: normal;
							font-size: 22px;
							text-align: left;
							color: #001ce2;
							img {
								margin-bottom: 15px;
								width: 57.05px;
								height: 54.68px;
							}
							img.behance {
								height: 38.68px;
							}

							&:hover {
								cursor: pointer;
							}
						}
					}
				}

				.close-btn {
					position: absolute;
					top: 50px;
					left: 58px;
					&:hover {
						cursor: pointer;
					}
				}
			}
		}
	}
}

.auto-import-btn {
	a {
		display: flex;
		justify-content: center;
		align-items: center;
		width: 226px;
		height: 62px;

		border: 1.5px solid #001ce2;
		border-radius: 8px;
		opacity: 1;

		font: 600 19px Noto Sans;
		letter-spacing: 0;
		color: #001ce2;

		img {
			width: 27px;
			height: 27px;
			margin-right: 14px;
		}
	}
}

// Responsive

// Mobile responsive
@include lt-sm {
}
</style>
