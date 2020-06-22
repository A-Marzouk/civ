<template>
	<div class="video-modal d-inline-flex tw-align-middle">
		<div v-show="dialog && current.isPlaying" class="video-player-overlay">
			<video ref="videoPlayer"></video>
		</div>

		<v-btn elevation="0" fab :width="30" :height="30" class="mr-5" color="#EBEBEB" @click="open">
			<v-img src="/images/resume_themes/theme700/video.svg" contain :width="12" :height="12"></v-img>
		</v-btn>
		<v-dialog content-class="theme700-v-dialog--video-modal" v-model="dialog" persistent overlay-opacity="0.5" overlay-color="#000000">
			<v-card>
				<div class="v-dialog-v-card-header">
					<v-card-title class="pa-0 font-weight-bold">
						<h2 class="modal-title">
							<span class="title-text">My Video</span>
						</h2>
					</v-card-title>

					<v-card-actions class="justify-end mr-3">
						<v-btn class="close-action" elevation="0" color="#EBEBEB" fab @click="close">
							<v-icon color="#513ECD">mdi-close</v-icon>
						</v-btn>
					</v-card-actions>
				</div>

				<v-carousel class="v-carousel-video-modal" height="auto" hide-delimiter-background light :show-arrows="false" :continuous="false">
					<v-carousel-item v-for="(pageVideos, i) in videosPerPage" :key="i">
						<v-list class="videos-list">
							<v-list-item class="p-0 videos-list-item" v-for="(video, index) in pageVideos" :key="`${video.src}?index=${index}`">
								<v-list-item-content>
									<div class="video-player" :class="{'playing': isPlaying(video.src)}">
										<div class="player-title">
											<h3 v-text="video.title"></h3>
										</div>

										<div class="player-body">
											<div class="video-preview">
												<img :src="video.thumbnail" alt="">
												<a href="#" class="play-pause-action" title="Play/Pause" @click.prevent="playPause(video.src)">
													<svg width="61" height="61" viewBox="0 0 61 61" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M30.5 0C13.6825 0 0 13.6825 0 30.5C0 47.3175 13.6825 61 30.5 61C47.3175 61 61 47.3175 61 30.5C61 13.6825 47.3175 0 30.5 0ZM22.875 45.7497V15.2499L45.75 30.4997L22.875 45.7497Z" fill="#2410A4" />
													</svg>
												</a>
											</div>
										</div>
									</div>
								</v-list-item-content>
							</v-list-item>
						</v-list>
					</v-carousel-item>
				</v-carousel>
			</v-card>
		</v-dialog>
	</div>
</template>

<script>
export default {
	name: "video-modal",

	data() {
		return {
			dialog: false,
			current: {
				isPlaying: false,
				video: {},
				duration: 0,
				time: 0
			},

			videos: [
				{
					title: "Video-1",
					thumbnail: "/uploads/media/videos/dummy-user/video-1.jpg",
					src: "/uploads/media/videos/dummy-user/video-1.mp4"
				},
				{
					title: "Video-2",
					thumbnail: "/uploads/media/videos/dummy-user/video-2.jpg",
					src: "/uploads/media/videos/dummy-user/video-2.mp4"
				},
				{
					title: "Video-3",
					thumbnail: "/uploads/media/videos/dummy-user/video-1.jpg",
					src: "/uploads/media/videos/dummy-user/video-1.mp4"
				},
				{
					title: "Video-4",
					thumbnail: "/uploads/media/videos/dummy-user/video-2.jpg",
					src: "/uploads/media/videos/dummy-user/video-2.mp4"
				},
				{
					title: "Video-5",
					thumbnail: "/uploads/media/videos/dummy-user/video-1.jpg",
					src: "/uploads/media/videos/dummy-user/video-1.mp4"
				}
			],
			player: undefined
		};
	},

	computed: {
		currentProgress() {
			return (this.current.time / this.current.duration) * 100;
		},

		videosPerPage() {
			const perPage = 2,
				videosPerPage = [];

			for (let i = 0; i < this.videos.length; i += perPage) {
				videosPerPage.push(this.videos.slice(i, i + perPage));
			}

			return videosPerPage;
		},
		isPlaying() {
			return src => {
				return src === this.current.video.src && this.current.isPlaying;
			};
		}
	},

	methods: {
		playPause(src) {
			console.log("playing: ", src);
		},

		open() {
			this.dialog = true;
		},

		close() {
			this.dialog = false;
		},

		pause() {
			console.log("pause");
		}
	},

	mounted() {
		this.player = this.$refs.videoPlayer;
	}
};
</script>

<style lang="scss" scoped>
@import "./../scss/media-queries.scss";

.video-player-overlay {
	position: fixed;
	bottom: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: rgba(0, 0, 0, 0.5);
	z-index: 99999;
	display: flex;
	align-items: center;
	justify-content: center;
}

.video-modal {
	font-family: "Montserrat", sans-serif;
}

.v-dialog-v-card-header {
	display: flex;
	align-items: center;
	justify-content: space-between;
}

.modal-title {
	font-family: "Montserrat", sans-serif;
	position: relative;
	display: flex;
	align-items: center;
	height: 95px;

	.title-text {
		background: #ffffff;
		display: flex;
		padding-left: 15px;
		padding-top: 15px;
		position: absolute;
		left: 60px;
		height: 62px;
		color: #513ecd;
		font-size: 24px;
		line-height: 29px;
		font-weight: 700;
		white-space: nowrap;
		border-radius: 100px;
		z-index: 1;
	}

	&::after {
		content: "";
		position: absolute;
		background: #513ecd;
		height: 100%;
		width: 90px;
	}

	@include md {
		height: 183px;

		.title-text {
			left: 116px;
			height: 120px;
			font-size: 36px;
			line-height: 44px;
			padding-left: 28px;
			padding-top: 29px;
		}

		&::after {
			width: 172px;
		}
	}
}

.v-btn--fab.close-action {
	margin-top: 5.5px;
	margin-right: 16px;
	height: 35px;
	width: 35px;
}

.videos-list {
	width: 100%;
	font-family: "Lato", sans-serif;

	.video-player {
		.player-title {
			text-align: center;
			font-weight: 500;
			font-size: 24px;
			line-height: 29px;
			user-select: none;
			color: #513ecd;
		}

		.player-body {
			display: flex;
			align-items: center;
			justify-content: center;
			padding: 12px;
			width: 100%;
			max-width: 320px;
			margin-left: auto;
			margin-right: auto;

			.video-preview {
				position: relative;
				padding-top: 78.22%;
				box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.15);
				border-radius: 14px;
				width: 100%;

				img {
					position: absolute;
					left: 0;
					bottom: 0;
					object-fit: cover;
					height: 100%;
					width: 100%;
					border-radius: 14px;
				}
			}

			.play-pause-action {
				position: absolute;
				bottom: 50%;
				right: 50%;
				transform: translate(50%, 50%);
				display: flex;
				align-items: center;
				justify-content: center;
				background: rgba(255, 255, 255, 0.2);
				border-radius: 100px;
				height: 61px;
				width: 61px;

				svg {
					height: 100%;
					width: 100%;
				}

				&:hover {
					text-decoration: none;
				}
			}
		}
	}

	@include md {
		.video-player {
			.player-title {
				font-size: 30px;
				line-height: 36px;
			}

			.player-body {
				max-width: 600px;

				.play-pause-action {
					height: 76px;
					width: 76px;
				}
			}
		}
	}

	@include xl {
		display: grid;
		grid-template-columns: 1fr 1fr;
		max-width: 1140px;
		margin-left: auto;
		margin-right: auto;
		padding-left: 40px;

		.video-player {
			.player-body {
				padding: 20px;

				.play-pause-action {
					height: 61px;
					width: 61px;
				}
			}
		}
	}
}

.v-dialog__content {
	align-items: flex-start;
	overflow-y: scroll;
}

.v-carousel-video-modal {
	padding-bottom: 50px;
}

@include md {
	.v-carousel-video-modal {
		padding-bottom: 70px;
	}

	.v-btn--fab.close-action {
		height: 67px;
		width: 67px;
	}
}

@include lg {
	.v-btn--fab.close-action {
		margin-right: 20px;
		height: 44px;
		width: 44px;
	}
}
</style>

<style lang="scss">
.v-dialog.theme700-v-dialog--video-modal {
	margin: 82px 10px;

	&.v-dialog:not(.v-dialog--fullscreen) {
		max-height: 100%;
	}

	.v-btn:not(.v-btn--text):not(.v-btn--outlined) {
		color: #ebebeb;

		&.v-btn--active {
			color: #513ecd;

			&:before {
				content: none;
			}
		}

		&.close-action {
			.v-btn__content .v-icon {
				font-size: 20px;
			}
		}

		&.v-carousel__controls__item {
			.v-btn__content .v-icon {
				height: 20px;
				font-size: 22px !important;
				width: 20px;
			}
		}
	}

	@media (min-width: 768px) {
		max-width: 768px;
		margin: 147px 42px;

		.v-btn:not(.v-btn--text):not(.v-btn--outlined) {
			&.close-action {
				.v-btn__content .v-icon {
					height: 29px;
					font-size: 50px;
					width: 29px;
				}
			}

			&.v-carousel__controls__item {
				margin-left: 15px;
				margin-right: 15px;

				.v-btn__content .v-icon {
					height: 38px;
					font-size: 42px !important;
					width: 38px;
				}
			}
		}

		.v-carousel__controls {
			height: 70px;
		}
	}

	@media (min-width: 1024px) {
		max-width: 1024px;

		.v-btn:not(.v-btn--text):not(.v-btn--outlined) {
			&.close-action {
				.v-btn__content .v-icon {
					height: 19px;
					font-size: 32px;
					width: 19px;
				}
			}

			&.v-carousel__controls__item {
				margin-left: 9px;
				margin-right: 9px;

				.v-btn__content .v-icon {
					height: 21px;
					font-size: 22px !important;
					width: 21px;
				}
			}
		}
	}

	@media (min-width: 1600px) {
		max-width: 1700px;
		margin: 140px 100px;
	}
}
</style>
