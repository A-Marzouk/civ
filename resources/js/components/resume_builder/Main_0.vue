
<template>
	<div>
		<nav class="resume-builder-nav d-flex align-items-start justify-content-between">
			<a href="/resume-builder" class="brand-link">
				<img class="brand-image" src="/images/logo_new.png" alt="123workforce icon" />
			</a>

			<a href="javascript:;" class="menu-link" @click='openMenu = true'>
				<img class="menu-icon" src="/icons/menu-icon.svg" alt="menu icon 123workforce" />
			</a>

			<div class="nav-icons">
				<!-- <router-link id='editCV' data-target="editCV" v-on:click.native="changeTab; setActiveTab('editCV')" to="/resume-builder/edit">
					<div class="icon" :class="{'active' : activeTab === 'editCV'}">
						<img :src=" activeTab === 'editCV' ? '/images/new_resume_builder/icons/main/Edit.png' : '/images/new_resume_builder/icons/main/Edit-1.png'" alt="edit icon">
					</div>
				</router-link> -->
				<!-- <router-link id='viewCV' data-target="viewCV" v-on:click.native="changeTab; setActiveTab('viewCV')" to="/resume-builder/view">
					<div class="icon" :class="{'active' : activeTab === 'viewCV'}">
						<img :src=" activeTab === 'viewCV' ? '/images/new_resume_builder/icons/main/Theme.png' : '/images/new_resume_builder/icons/main/Theme-1.png'" alt="theme icon">
					</div>
				</router-link> -->
				<!-- <router-link id='coverLetter' data-target="coverLetter" v-on:click.native="changeTab; setActiveTab('coverLetter')" to="/resume-builder/cover-letter">
					<div class="icon" :class="{'active' : activeTab === 'coverLetter'}">
						<img :src=" activeTab === 'coverLetter' ? '/images/new_resume_builder/icons/main/Coverletter.png' : '/images/new_resume_builder/icons/main/Coverletter-1.png'" alt="cover icon">
					</div>
				</router-link> -->
				<!-- <router-link id='jobAlert' data-target="jobAlert" v-on:click.native="changeTab; setActiveTab('jobAlert')" to="/resume-builder/jobs">
					<div class="icon" :class="{'active' : activeTab === 'jobAlert'}">
						<img :src=" activeTab === 'jobAlert' ? '/images/new_resume_builder/icons/main/job.png' : '/images/new_resume_builder/icons/main/job-1.png'" alt="cover icon">
					</div>
				</router-link> -->
				<!-- <div class="my-account-icon" @click="profileMenu = !profileMenu">
					<div class="icon" v-if="personalInfo" :class="{'active' : activeTab === 'myAccount'}">
						<img :src="personalInfo.profile_pic" alt="profile-pic">
					</div>
					<div class="custom-drop-down" v-show="profileMenu">
						<div class="drop-down-item">
							<router-link id='myAccount' data-target="myAccount" v-on:click.native="changeTab; setActiveTab('myAccount')" to="/resume-builder">
								Account Settings
							</router-link>
						</div>
						<div class="drop-down-item">
							<a href="javascript:void(0)" @click="logout" class="sign-out">
								Sign Out
							</a>
						</div>
					</div>
				</div> -->
			</div>
		</nav>

		<div class="side-menu" :class="{ opened: openMenu }">
			<div class="bg-action" @click='openMenu = false'></div>
			<div class="side-bg-panel">
				<div class="links-wrapper">

					<a href="javascript:;" class="close-btn" @click='openMenu = false'>
						<img class="close-icon" src="/icons/close-icon.svg" alt="close icon 123workforce" />
					</a>

					<div id="mainLinksWrapperMobile" class="links-group d-flex align-items-center justify-content-between">
						<router-link id='editCVMobile' data-target="editCV" v-on:click.native="setActiveTab('editCV')" to="/resume-builder/edit" class="second has-inside-routes main-tab-link">
							<svg-vue class="nav-icon" :icon="`editCV-icon`"></svg-vue>
						</router-link>
						<router-link id='viewCVMobile' data-target="viewCV" v-on:click.native="setActiveTab('viewCV')" to="/resume-builder/view" class="third has-inside-routes main-tab-link">
							<svg-vue class="nav-icon" :icon="`view-icon`"></svg-vue>
						</router-link>
						<router-link id='myAccountMobile' data-target="myAccount" v-on:click.native="setActiveTab('myAccount')" to="/resume-builder" class="first main-tab-link">
							<svg-vue class="nav-icon" :icon="`account-icon`"></svg-vue>
						</router-link>
					</div>
				</div>

				<edit-menu v-show='activeTab === "editCV"'></edit-menu>
				<a class="btn-logout" href="javascript:;" @click="logout">
					<font-awesome-icon :icon="['fas','sign-out-alt']" size="2x" color="#001CE2" />
				</a>
			</div>
		</div>
	</div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.resume-builder-nav {
	@include lt-lg {
		padding: 26px 80px;
		height: 90px;
	}

	@include lt-sm {
		padding: 36px;
		height: auto;
		/*overflow-x: hidden;*/
		// box-shadow: none;
	}

	.btn {
		max-width: 110px !important;
		margin-top: 0 !important;

		@include lt-md {
			max-width: 80px !important;
		}

		@include lt-sm {
			max-width: 60px !important;
		}
	}

	.brand-link {
		flex-grow: 0.4;
		margin-top: -12px;
		@include lt-lg {
			display: none;
		}
		img {
			width: 143px;
			height: 52px;
		}
	}

	.brand-image {
		width: 40px;
		margin-right: 50px;

		@include lt-lg {
			display: none;
		}
	}

	.menu-link {
		margin-top: 5px;
		display: none;

		@include lt-lg {
			display: block;
		}

		@include lt-md {
			margin-top: 10px;
		}
	}

	.menu-icon {
		display: none;
		height: 20px;
		// margin:

		@include lt-lg {
			display: block;
		}

		@include lt-sm {
			height: auto;
		}
	}

	#mainLinksWrapper {
		width: 800px;

		@include lt-lg {
			display: none !important;
		}
	}

	.links-group {
		height: 100%;
		position: relative;

		@include lt-lg {
		}

		.decorator {
			position: absolute;
			display: block;
			height: 5px;
			background-color: $mainBlue;
			border-radius: 5px 5px 0 0;
			transform: translateX(0);
			transition: 0.6s;
			bottom: -50px;
		}

		a {
			// margin-right: 100px;
			max-width: 205px;
			width: 45%;
			text-align: center;
			color: #747474;
			font-weight: bold;
			display: block;
			padding: 0 30px;
			height: 100%;
			font-size: 25px;
			transition: color 1s;
			border-bottom-color: transparent;
			white-space: nowrap;
			&:hover,
			&:active {
				text-decoration: none;
			}

			&.router-link-exact-active,
			&.router-link-active.has-inside-routes {
				position: relative;
				color: $mainBlue;
			}

			&:last-child {
				margin: 0;
			}
		}
	}

	.actions-group {
		// position: absolute;
		// right: 100px;

		// @include lt-lg {
		//     right: 37px;
		// }

		align-self: center;

		.action-btn {
			background: transparent;
			border: 0;
			width: 40px;
			margin-right: 58px;
			position: relative;

			@include lt-md {
				width: 26px;
				margin-right: 33px;
			}

			@include lt-sm {
				width: 20px;
				margin-right: 24px;
			}

			img {
				width: 100%;
			}

			&.user-profile {
				width: 46px;
				margin: 0;

				@include lt-sm {
					width: 27px;
				}

				img {
					border-radius: 50%;
					width: 100%;
				}
			}
		}
	}

	.nav-icons {
		display: flex;
		margin-top: -12px;

		.my-account-icon {
			&:hover {
				cursor: pointer;
			}
			position: relative;
			.custom-drop-down {
				position: absolute;
				width: 230px;
				height: auto;
				padding: 30px;
				border-radius: 10px;
				background-color: white;
				top: 75px;
				right: -20px;
				box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1);

				.drop-down-item {
					font-family: Noto Sans, "sans-serif";
					font-style: normal;
					font-weight: 600;
					font-size: 14px;
					line-height: 18px;
					border-bottom: 1px solid #d4dbec;
					padding-bottom: 15px;
					padding-top: 15px;
					color: #0046fe;
					&:last-child {
						padding-bottom: 0;
						border: 0;
					}
					&:first-child {
						padding-top: 0;
					}

					a {
						margin-left: 8px;
						&:hover {
							text-decoration: none;
						}
					}

					a.sign-out {
						color: #838ca3;
					}
				}
			}

			.custom-drop-down:before {
				content: " ";
				height: 0;
				position: absolute;
				width: 0;
				top: -40px;
				left: calc(100% - 62px);
				border: 20px solid transparent;
				border-bottom-color: white;
			}
		}

		.icon {
			margin-left: 10px;
			img {
				width: 50px;
				height: 50px;
				border-radius: 50%;
			}
		}

		.icon.active:after {
			box-sizing: inherit;
			content: " ";
			display: flex;
			flex-direction: column;
			border: 2px solid blue;
			background: blue;
			border-top-left-radius: 16px;
			border-top-right-radius: 16px;
			width: 45px;
			height: 5px;
			margin-left: 3px;
			margin-top: 17px;
		}
	}
}

.brand-image {
}
.menu-link {
}
.links-group {
}
.user-profile {
}
.nav-icons {
}
.my-account-icon {
}
</style>
