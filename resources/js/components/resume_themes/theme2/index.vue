<template>
	<div class="d-flex justify-content-center">
		<div class="themeWrapper">
			<div class="mainThemeBar">
				<div class="left hideOnPhone">
					<div class="d-flex flex-column icons">
						<a class="open-audio-media" href="#" @click.prevent="isAudioMediaOpen=true">
							<img src="/images/resume_themes/theme2/sound.svg" alt="sound icon">
						</a>
						<a class="open-video-media" href="#" @click.prevent="isVideoMediaOpen=true">
							<img src="/images/resume_themes/theme2/video.svg" alt="video icon">
						</a>
						<img src="/images/resume_themes/theme2/chat.svg" alt="chat">
					</div>
					<div class="d-flex">
						<div class="avatar">
							<img src="/images/resume_themes/theme2/man-photo.svg" alt="profile pic">
						</div>
						<div class="info d-flex flex-column align-items-between">
							<div class="user-name">
								Conor
							</div>
							<div class="job-title">
								Ui/Ux designer
							</div>
							<div class="social-icons">
								<img src="/images/resume_themes/theme2/behance.svg" alt="icon">
								<img src="/images/resume_themes/theme2/dribbble.svg" alt="icon">
								<img src="/images/resume_themes/theme2/instagram.svg" alt="icon">
								<img src="/images/resume_themes/theme2/linkedin.svg" alt="icon">
								<img src="/images/resume_themes/theme2/google.svg" alt="icon">
							</div>
						</div>
					</div>
				</div>

				<div class="hideOnNotPhone w-100">
					<div class="left">
						<div class="d-flex reverse-on-table">
							<div class="avatar">
								<img src="/images/resume_themes/theme2/man-photo.svg" alt="profile pic">
							</div>
							<div class="info d-flex flex-column align-items-between">
								<div class="user-name">
									Conor
								</div>
								<div class="job-title">
									Ui/Ux designer
								</div>
								<div class="icons">
									<img src="/images/resume_themes/theme2/chat.svg" alt="chat" style="margin-left: -5px; margin-top: 8px;">
								</div>
							</div>
						</div>
						<div class="d-flex flex-column icons">
							<a class="open-audio-media" href="#" @click.prevent="isAudioMediaOpen=true">
								<img src="/images/resume_themes/theme2/sound.svg" alt="sound icon">
							</a>
							<a class="open-video-media" href="#" @click.prevent="isVideoMediaOpen=true">
								<img src="/images/resume_themes/theme2/video.svg" alt="video icon">
							</a>
						</div>
					</div>
					<div class="left">
						<div class="info w-100">
							<div class="social-icons">
								<img src="/images/resume_themes/theme2/behance.svg" alt="icon">
								<img src="/images/resume_themes/theme2/dribbble.svg" alt="icon">
								<img src="/images/resume_themes/theme2/instagram.svg" alt="icon">
								<img src="/images/resume_themes/theme2/linkedin.svg" alt="icon">
								<img src="/images/resume_themes/theme2/google.svg" alt="icon">
							</div>
						</div>
					</div>
				</div>

				<div class="right d-flex">
					<div class="hourly-rate">
						<div class="hourly-rate-text">
							$10
						</div>
						<div class="hourly-rate-text light">
							Hourly Rate
						</div>
					</div>
					<div class="weekly-availability">
						<div class="hourly-rate-text">
							35 hours
						</div>
						<div class="hourly-rate-text light">
							Weekly Availability
						</div>
					</div>
					<div>
						<a href="javascript:void(0)" class="hire-me-btn">
							Hire me
						</a>
					</div>
				</div>
			</div>

			<div class="tabs-bar d-flex justify-content-center align-items-center">
				<div class="arrow hideOnPhone">
					<img src="/images/resume_themes/theme2/left-arrow.svg" alt="left" :class="{disabled : activeTab.id === 1}" @click="goToPrevTab(activeTab)">
				</div>
				<div class="tab-text" v-for="tab in tabs" :key="tab.id + '_tab'" @click="setActiveTab(tab)" :class="{active : activeTab.id === tab.id}">
					{{tab.title}}
				</div>
				<div class="arrow hideOnPhone">
					<img src="/images/resume_themes/theme2/right-arrow.svg" :class="{disabled : activeTab.id === tabs.length}" alt="right" @click="goToNextTab(activeTab)">
				</div>
			</div>

			<div class="tab-content-wrapper">
				<div class="tab-content-inside-wrapper">
					<div class="main-tab-content" id="style-2">

						<div v-show="activeTab.id === 2">
							<div class="skills-tabs">
								<div class="skills-tab-text" :class="{active : activeSkillTab === 'programming-languages'}" @click="setActiveSkillTab('programming-languages')">
									Programming Languages
								</div>
								<div class="skills-tab-text" :class="{active : activeSkillTab === 'framewroks-databases'}" @click="setActiveSkillTab('framewroks-databases')">
									Frameworks / Databases
								</div>
								<div class="skills-tab-text" :class="{active : activeSkillTab === 'design-skills'}" @click="setActiveSkillTab('design-skills')">
									Design Skills
								</div>
								<div class="skills-tab-text mr-0" :class="{active : activeSkillTab === 'software'}" @click="setActiveSkillTab('software')">
									Software
								</div>
							</div>

							<div class="skills-icons-bar" id="style-1">
								<img class="icon" src="/images/resume_themes/theme2/illustrator.svg" alt="skill-icon">
								<img class="icon" src="/images/resume_themes/theme2/photoshop.svg" alt="skill-icon">
								<img class="icon" src="/images/resume_themes/theme2/sketch.svg" alt="skill-icon">
								<img class="icon" src="/images/resume_themes/theme2/UI.svg" alt="skill-icon">
							</div>
						</div>

						<div class="portfolio" v-show="activeTab.id === 1">
							<img src="/images/resume_themes/theme2/portfolio1.png" alt="portfolio-project">
							<img src="/images/resume_themes/theme2/portfolio2.png" alt="portfolio-project">
							<img src="/images/resume_themes/theme2/portfolio1.png" alt="portfolio-project">
							<img src="/images/resume_themes/theme2/portfolio2.png" alt="portfolio-project">
							<img src="/images/resume_themes/theme2/portfolio1.png" alt="portfolio-project">
							<img src="/images/resume_themes/theme2/portfolio2.png" alt="portfolio-project">
						</div>

						<div class="work" v-show="activeTab.id === 3">
							<div class="work-item">
								<div class="left">
									<div class="title">
										Graphic & Web Designer
									</div>
									<div class="date">
										2018 - 2019
									</div>
								</div>
								<div class="right">
									<div class="company-name">
										Company "React"
									</div>
									<div class="description">
										- Turning creative concepts into finished websites.
										- Drawing up detailed website s pecifications.
										- Building websites that are easy to understand, navigate and use.
										- Designing sample page layouts.
										- Ensuring that the website complies with the company’s brand guidelines.
									</div>
								</div>
							</div>
							<div class="work-item">
								<div class="left">
									<div class="title">
										Graphic & Web Designer
									</div>
									<div class="date">
										2018 - 2019
									</div>
								</div>
								<div class="right">
									<div class="company-name">
										Company "React"
									</div>
									<div class="description">
										- Turning creative concepts into finished websites.
										- Drawing up detailed website s pecifications.
										- Building websites that are easy to understand, navigate and use.
										- Designing sample page layouts.
										- Ensuring that the website complies with the company’s brand guidelines.
									</div>
								</div>
							</div>
							<div class="work-item">
								<div class="left">
									<div class="title">
										Graphic & Web Designer
									</div>
									<div class="date">
										2018 - 2019
									</div>
								</div>
								<div class="right">
									<div class="company-name">
										Company "React"
									</div>
									<div class="description">
										- Turning creative concepts into finished websites.
										- Drawing up detailed website s pecifications.
										- Building websites that are easy to understand, navigate and use.
										- Designing sample page layouts.
										- Ensuring that the website complies with the company’s brand guidelines.
									</div>
								</div>
							</div>
						</div>

						<div class="work" v-show="activeTab.id === 4">
							<div class="work">
								<div class="work-item">
									<div class="left">
										<div class="title">
											Master in Web Developer
										</div>
										<div class="date">
											2018 - 2019
										</div>
									</div>
									<div class="right">
										<div class="company-name">
											Envision Media, Inc., Santa Cruz, CA
										</div>
										<div class="description">
											- Turning creative concepts into finished websites.
											- Drawing up detailed website s pecifications.
											- Building websites that are easy to understand, navigate and use.
											- Designing sample page layouts.
											- Ensuring that the website complies with the company’s brand guidelines.
										</div>
									</div>
								</div>
								<div class="work-item">
									<div class="left">
										<div class="title">
											Master in Web Developer
										</div>
										<div class="date">
											2018 - 2019
										</div>
									</div>
									<div class="right">
										<div class="company-name">
											Envision Media, Inc., Santa Cruz, CA
										</div>
										<div class="description">
											- Turning creative concepts into finished websites.
											- Drawing up detailed website s pecifications.
											- Building websites that are easy to understand, navigate and use.
											- Designing sample page layouts.
											- Ensuring that the website complies with the company’s brand guidelines.
										</div>
									</div>
								</div>
								<div class="work-item">
									<div class="left">
										<div class="title">
											Master in Web Developer
										</div>
										<div class="date">
											2018 - 2019
										</div>
									</div>
									<div class="right">
										<div class="company-name">
											Envision Media, Inc., Santa Cruz, CA
										</div>
										<div class="description">
											- Turning creative concepts into finished websites.
											- Drawing up detailed website s pecifications.
											- Building websites that are easy to understand, navigate and use.
											- Designing sample page layouts.
											- Ensuring that the website complies with the company’s brand guidelines.
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<AudioMedia v-if="isAudioMediaOpen" @close="isAudioMediaOpen=false" />
		<VideoMedia v-if="isVideoMediaOpen" @close="isVideoMediaOpen=false" />
	</div>
</template>

<script>
import VideoMedia from "./components/VideoMedia";
import AudioMedia from "./components/AudioMedia";

export default {
	props: ["user"],
	components: { VideoMedia, AudioMedia },
	data() {
		return {
			isAudioMediaOpen: false,
			isVideoMediaOpen: false,
			activeTab: {
				id: 1,
				title: "Portfolio"
			},
			tabs: [
				{
					id: 1,
					title: "Portfolio"
				},
				{
					id: 2,
					title: "Skills"
				},
				{
					id: 3,
					title: "Work"
				},
				{
					id: 4,
					title: "Education"
				}
			],
			activeSkillTab: "programming-languages"
		};
	},
	methods: {
		setActiveTab(tab) {
			this.activeTab = tab;
		},
		goToNextTab(currentTab) {
			if (currentTab.id >= 4) {
				return;
			}
			let newID = currentTab.id + 1;
			this.tabs.forEach(tab => {
				if (tab.id === newID) {
					this.activeTab = tab;
				}
			});
		},
		goToPrevTab(currentTab) {
			if (currentTab.id <= 1) {
				return;
			}
			let newID = currentTab.id - 1;
			this.tabs.forEach(tab => {
				if (tab.id === newID) {
					this.activeTab = tab;
				}
			});
		},
		setActiveSkillTab(tabName) {
			this.activeSkillTab = tabName;
		}
	},
	mounted() {}
};
</script>

<style lang="scss" scoped>
.open-audio-media,
.open-video-media {
	margin-bottom: 14px;

	img {
		width: 48px;
		height: 48px;
	}
}

.hideOnPhone {
	@media only screen and (max-width: 600px) {
		display: none !important;
	}
}

.hideOnNotPhone {
	@media only screen and (min-width: 600px) {
		display: none !important;
	}
}

.themeWrapper {
	width: 100%;
	max-width: 1920px;
	background: white;

	@media only screen and (max-width: 600px) {
		width: 100vw;
	}

	.mainThemeBar {
		padding-top: 40px;
		padding-left: 5%;
		padding-right: 5%;
		flex-wrap: wrap;
		display: flex;
		justify-content: space-between;
		align-items: center;

		@media only screen and (max-width: 1200px) {
			justify-content: center;
			width: 100%;
		}

		.left {
			display: flex;
			flex-direction: row;

			@media only screen and (max-width: 600px) {
				flex-direction: row !important;
				width: 100%;
				justify-content: space-between;
			}

			@media only screen and (max-width: 1200px) {
				flex-direction: row-reverse;
				justify-content: space-between;
				width: 100%;
			}

			.icons {
				@media only screen and (max-width: 600px) {
					margin-right: 0;
				}
				margin-right: 27px;

				img {
					width: 48px;
					height: 48px;
					margin-bottom: 14px;
				}

				img:last-child {
					margin-bottom: 0;
				}
			}

			.avatar {
				margin-right: 37px;
				border-radius: 24px;

				img {
					width: 160px;
					height: 160px;
				}

				@media only screen and (max-width: 600px) {
					margin-right: 15px;
					img {
						width: 104px;
						height: 104px;
					}
				}
			}

			.info {
				margin-top: 15px;
				@media only screen and (max-width: 600px) {
					margin-top: 0;
				}

				.user-name {
					margin-left: -2px;
					font-weight: normal;
					color: #707070;
					font-size: 31px;
					line-height: 30px;
					@media only screen and (max-width: 600px) {
						font-size: 24px;
					}
				}

				.job-title {
					margin-top: 15px;
					font-weight: 300;
					font-size: 20px;
					line-height: 19px;
					@media only screen and (max-width: 600px) {
						margin-top: 8px;
						font-size: 16px;
					}
				}

				.social-icons {
					margin-top: 42px;
					width: auto;
					display: flex;
					justify-content: space-between;
					overflow-x: auto;

					@media only screen and (max-width: 600px) {
						width: 100%;
					}

					img {
						width: 24px;
						height: 24px;
						margin-right: 30px;
						@media only screen and (max-width: 600px) {
							margin-right: 25px;
						}
					}

					img:last-child {
						margin-right: 0;
					}
				}
			}
		}

		.right {
			display: flex;
			align-items: center;
			border-radius: 10px;
			padding: 24px 35px;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);

			@media only screen and (max-width: 1200px) {
				padding: 14px 15px;
				margin-top: 57px;
				width: 100%;
				max-width: 700px;
				justify-content: center;
			}

			.hourly-rate {
				padding-right: 28px;
				margin-right: 28px;
				border-right: 1px solid rgb(77, 117, 232, 0.5);
				@media only screen and (max-width: 600px) {
					padding-right: 14px;
					margin-right: 14px;
				}
			}

			.weekly-availability {
				margin-right: 32px;
				@media only screen and (max-width: 600px) {
					margin-right: 19px;
				}
			}

			.hourly-rate-text {
				font-style: normal;
				font-weight: 600;
				font-size: 19px;
				line-height: 18px;
				color: #4d75e8;
				@media only screen and (max-width: 600px) {
					font-size: 12px;
				}
			}

			.hourly-rate-text.light {
				font-weight: 300;
			}

			.hire-me-btn {
				background: #4d75e8;
				height: 55px;
				width: 163px;
				display: flex;
				justify-content: center;
				align-items: center;
				font-weight: 300;
				font-size: 16px;
				line-height: 15px;
				color: #ffffff;
				border-radius: 15px;
				@media only screen and (max-width: 600px) {
					font-size: 12px;
					height: 34px;
					width: 105px;
					border-radius: 8px;
				}
			}
		}
	}

	.tabs-bar {
		margin-top: 54px;

		.tab-text {
			font-size: 26px;
			line-height: 25px;
			font-weight: 600;
			color: #4d75e8;
			margin-right: 35px;
			margin-left: 35px;
			padding-bottom: 9px;
			opacity: 0.43;
			position: relative;

			@media only screen and (max-width: 600px) {
				font-size: 20px;
				margin-right: 10px;
				margin-left: 10px;
			}
		}

		.tab-text.active {
			opacity: 1;
		}

		.tab-text.active:before {
			content: "";
			position: absolute;
			left: 47.5%;
			right: 47.5%;
			bottom: 0;
			height: 1px;
			width: 5%;
			border: 4px solid #4d75e8;
			border-radius: 50%;
		}

		.tab-text:hover {
			cursor: pointer;
		}

		.arrow {
			&:hover {
				cursor: pointer;
			}
			img {
				width: 30px;
				height: 30px;

				&.disabled {
					opacity: 0.3;
				}
			}
		}
	}

	.tab-content-wrapper {
		margin-top: 34px;
		background-color: #4d75e8;
		height: auto;
		min-height: 650px;
		width: 100vw;

		.tab-content-inside-wrapper {
			margin-left: 100px;
			margin-right: 100px;
			@media only screen and (max-width: 600px) {
				margin-left: 10px;
				margin-right: 10px;
				min-height: 500px;
			}
			@media only screen and (max-width: 1200px) {
				margin-left: 25px;
				margin-right: 25px;
			}
		}

		.skills-tabs {
			display: flex;
			justify-content: center;
			position: relative;
			overflow-x: auto;
			@media only screen and (max-width: 600px) {
				justify-content: space-between;
			}

			.skills-tab-text {
				font-size: 16px;
				font-weight: 600;
				line-height: 15px;
				color: #ffffff;
				margin-right: 64px;
				padding-bottom: 25px;
				position: relative;
				white-space: nowrap;
				@media only screen and (max-width: 600px) {
					font-size: 12px;
					margin-right: 0;
					padding-right: 20px;
					padding-left: 20px;
				}
			}

			.skills-tab-text:hover {
				cursor: pointer;
			}

			.skills-tab-text.active:before {
				content: "";
				position: absolute;
				left: 15%;
				right: 15%;
				bottom: 0;
				height: 1px;
				width: 70%;
				border-bottom: 3px solid white;
			}
		}

		.skills-tabs:before {
			content: "";
			position: absolute;
			left: 0;
			right: 0;
			bottom: 0;
			height: 1px;
			width: 100%;
			opacity: 0.25;
			border-bottom: 1px solid rgba(255, 255, 255, 0.35);
		}

		.skills-icons-bar {
			margin-top: 32px;
			padding-bottom: 10px;
			display: flex;
			justify-content: center;
			overflow-x: auto;

			img {
				width: 40px;
				height: 40px;
				margin-right: 64px;
				@media only screen and (max-width: 600px) {
					width: 30px;
					height: 30px;
					margin-right: 30px;
				}
			}

			img:last-child {
				margin-right: 0;
			}
		}

		.main-tab-content {
			padding-top: 45px;
			margin-top: 80px;
			max-height: 570px;
			overflow-y: scroll;
			@media only screen and (max-width: 600px) {
				margin-top: 35px;
			}

			.portfolio {
				display: flex;
				justify-content: center;
				flex-wrap: wrap;

				img {
					margin-bottom: 46px;
					margin-left: 23px;
					margin-right: 23px;
					width: 740px;
					height: 360px;
					@media only screen and (max-width: 1200px) {
						width: 92%;
						height: auto;
					}
				}

				img:last-child {
					margin-bottom: 25px;
				}
			}

			// mobile first
			.work {
				padding-right: 15px;

				.work-item {
					color: #ffffff;
					font-style: normal;
					font-weight: normal;
					margin-bottom: 55px;

					.title {
						font-size: 18px;
						line-height: 18px;
						font-weight: 500;
						margin-bottom: 10px;
					}

					.date {
						font-size: 16px;
						line-height: 19px;
						margin-bottom: 32px;
					}

					.company-name {
						font-size: 18px;
						font-weight: 500;
						line-height: 14px;
						margin-bottom: 20px;
					}

					.description {
						font-size: 17px;
					}
				}

				@media only screen and (min-width: 1024px) {
					display: flex;
					flex-direction: column;
					align-items: center;
					padding-right: 0;

					.work-item {
						display: flex;
						max-width: 800px;

						.left {
							margin-right: 98px;
							white-space: nowrap;
						}
					}
				}
			}

			.education {
			}
		}
	}
}

/* scroll bar styles */

#style-2::-webkit-scrollbar-track {
	-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
	border-radius: 0;
}

#style-2::-webkit-scrollbar {
	width: 4px;
	background-color: rgba(255, 255, 255, 0.35);
}

#style-2::-webkit-scrollbar-thumb {
	border-radius: 1px;
	-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
	background-color: white;
}

#style-1::-webkit-scrollbar-track {
	-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
	border-radius: 0;
}

#style-1::-webkit-scrollbar {
	height: 4px;
	background-color: rgba(255, 255, 255, 0.35);
}

#style-1::-webkit-scrollbar-thumb {
	border-radius: 1px;
	-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
	background-color: white;
}
</style>
