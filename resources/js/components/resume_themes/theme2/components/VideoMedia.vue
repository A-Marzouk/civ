<template>
	<div class="video-modal-overlay">
		<div class="video-modal-outer">
			<div class="video-modal-header">
				<h2 class="video-modal-title">My Video</h2>

				<a class="close-video-media" href="#" @click.prevent="$emit('close')">
					<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M18 0C8.07497 0 0 8.07497 0 18C0 27.925 8.07497 36 18 36C27.925 36 36 27.925 36 18C36 8.07497 27.925 0 18 0ZM18 34.5C8.90184 34.5 1.49998 27.0982 1.49998 18C1.49998 8.90184 8.90184 1.49998 18 1.49998C27.0982 1.49998 34.5 8.90184 34.5 18C34.5 27.0982 27.0982 34.5 18 34.5Z" fill="#4D75E8" />
						<path d="M25.2803 10.7207C24.9873 10.4277 24.5127 10.4277 24.2197 10.7207L18 16.9405L11.7803 10.7208C11.4873 10.4278 11.0127 10.4278 10.7197 10.7208C10.4268 11.0138 10.4268 11.4884 10.7197 11.7813L16.9394 18.001L10.7197 24.2207C10.4268 24.5137 10.4268 24.9883 10.7197 25.2812C10.8662 25.4277 11.0582 25.501 11.25 25.501C11.4419 25.501 11.6338 25.4277 11.7803 25.2812L18 19.0615L24.2197 25.2812C24.3661 25.4277 24.5581 25.501 24.75 25.501C24.9419 25.501 25.1337 25.4277 25.2803 25.2812C25.5733 24.9882 25.5733 24.5136 25.2803 24.2207L19.0605 18.001L25.2802 11.7813C25.5732 11.4883 25.5732 11.0137 25.2803 10.7207Z" fill="#4D75E8" />
					</svg>
				</a>
			</div>
			<div class="video-modal-body">
				<div class="video-list-slider">
					<div class="video-list-slider-content">
						<v-list class="videos-list p-0" :class="{'d-none': i!==pageIndex}" v-for="(pageVideos, i) in videosPerPage" :key="i">
							<v-list-item class="p-0 videos-list-item" v-for="(video, index) in pageVideos" :key="`${video.src}?index=${index}`">
								<v-list-item-content class="p-0">
									<div class="video-player">
										<div class="player-title">
											<h3 v-text="video.title"></h3>
										</div>

										<div class="player-body">
											<div class="video-preview" @click="showPlayer(video.src)">
												<img :src="video.thumbnail" alt="">
												<a href="#" class="play-pause-action" title="Play/Pause" @click.prevent="showPlayer(video.src)">
													<svg viewBox="0 0 50 49" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M25 0C11.2142 0 0 10.9909 0 24.5C0 38.0091 11.2142 49 25 49C38.7858 49 50 38.0091 50 24.5C50 10.9909 38.7858 0 25 0ZM34.9386 25.3584L20.3553 34.5459C20.1844 34.6545 19.987 34.7084 19.7917 34.7084C19.6208 34.7084 19.4479 34.6664 19.2933 34.5838C18.9575 34.4043 18.75 34.0613 18.75 33.6875V15.3125C18.75 14.9387 18.9575 14.5957 19.2933 14.4162C19.6229 14.2388 20.0358 14.2497 20.3553 14.4541L34.9386 23.6416C35.2356 23.829 35.4167 24.1531 35.4167 24.5C35.4167 24.8469 35.2356 25.1709 34.9386 25.3584Z" fill="#4D75E8" />
													</svg>
												</a>
											</div>
										</div>
									</div>
								</v-list-item-content>
							</v-list-item>
						</v-list>
					</div>

					<div class="video-list-slider-controls">
						<a href="#" @click.prevent="prevPage">
							<svg width="32" height="23" viewBox="0 0 32 23" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path :fill-opacity="(pageIndex > 0) ? 1 : 0.2" d="M10.4388 0.326524C10.6521 0.115446 10.9377 -0.00176123 11.2344 2.00092e-05C11.5311 0.00180125 11.8154 0.12243 12.0262 0.336053C12.237 0.549677 12.3577 0.839297 12.3623 1.14285C12.3669 1.4464 12.2551 1.73972 12.0509 1.95996L3.87563 10.3244H30.8584C31.0075 10.3236 31.1554 10.3529 31.2934 10.4105C31.4315 10.4681 31.5571 10.553 31.6631 10.6603C31.7691 10.7676 31.8535 10.8953 31.9113 11.0359C31.9691 11.1766 31.9992 11.3275 32 11.48C31.9998 11.7912 31.8791 12.0895 31.6643 12.3098C31.4495 12.53 31.1582 12.6542 30.8541 12.6551H3.87563L12.0518 21.0046C12.2614 21.2255 12.3787 21.5213 12.3787 21.8292C12.3787 22.1372 12.2614 22.433 12.0518 22.6539C11.9466 22.7635 11.8212 22.8506 11.6828 22.91C11.5444 22.9694 11.3958 23 11.2457 23C11.0956 23 10.9471 22.9694 10.8087 22.91C10.6703 22.8506 10.5448 22.7635 10.4397 22.6539L0.327218 12.3012C0.117539 12.0835 0 11.7901 0 11.4845C0 11.1788 0.117539 10.8855 0.327218 10.6678L10.4388 0.326524Z" fill="#4D75E8" />
							</svg>
						</a>

						<div class="video-list-slider-delimiter">
							<a v-for="(pageVideos, i) in videosPerPage" :class="{'active': i===pageIndex}" href="#" @click.prevent="pageIndex=i" :key="i"></a>
						</div>

						<a href="#" @click.prevent="nextPage">
							<svg width="32" height="23" viewBox="0 0 32 23" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path :fill-opacity="pageIndex < videosPerPage.length - 1 ? 1 : 0.2" d="M21.5612 22.6735C21.3479 22.8846 21.0623 23.0018 20.7656 23C20.4689 22.9982 20.1846 22.8776 19.9738 22.6639C19.763 22.4503 19.6423 22.1607 19.6377 21.8572C19.6331 21.5536 19.7449 21.2603 19.9491 21.04L28.1244 12.6756L1.14158 12.6756C0.99246 12.6764 0.844643 12.6471 0.70657 12.5895C0.568497 12.5319 0.442871 12.447 0.336866 12.3397C0.23086 12.2324 0.146547 12.1047 0.0887489 11.9641C0.0309486 11.8234 0.000793457 11.6725 0 11.52C0.000226974 11.2088 0.120945 10.9105 0.33572 10.6902C0.550495 10.47 0.841824 10.3458 1.1459 10.3449L28.1244 10.3449L19.9482 1.99544C19.7386 1.7745 19.6213 1.47869 19.6213 1.17076C19.6213 0.862829 19.7386 0.567017 19.9482 0.346079C20.0534 0.236494 20.1788 0.149448 20.3172 0.0900269C20.4556 0.0306053 20.6042 0 20.7543 0C20.9044 0 21.0529 0.0306053 21.1913 0.0900269C21.3297 0.149448 21.4552 0.236494 21.5603 0.346079L31.6728 10.6988C31.8825 10.9165 32 11.2099 32 11.5155C32 11.8212 31.8825 12.1145 31.6728 12.3322L21.5612 22.6735Z" fill="#4D75E8" />
							</svg>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div v-show="showVideoPlayer" class="video-player-overlay" @click="hidePlayer">
			<div class="c-video-player" @click.stop>
				<div class="tw-relative">
					<video preload="auto" loop class="el-video-player" :src="current.video.src" :poster="current.video.thumbnail" @click="playPause" ref="videoPlayer"></video>

					<a class="play-pause-control" href="#" @click.prevent="playPause">
						<v-icon color="white" v-if="current.isPlaying">mdi-pause</v-icon>
						<v-icon color="white" v-else>mdi-play</v-icon>
					</a>
				</div>

				<div class="video-player-footer">
					<v-progress-linear height="8" background-color="#EBEBEB" color="#4D75E8" :value="currentProgress"></v-progress-linear>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "video-media",

	data() {
		return {
			showVideoPlayer: false,
			pageIndex: 0,
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
		}
	},

	methods: {
		showPlayer(src) {
			this.current.video = this.videos.find(video => video.src === src);
			this.showVideoPlayer = true;

			setTimeout(() => {
				this.current.isPlaying = true;
				this.player.play();
			}, 500);
		},

		hidePlayer() {
			this.showVideoPlayer = false;
			this.player.pause();
			this.current = {
				isPlaying: false,
				video: {},
				duration: 0,
				time: 0
			};
		},

		playPause() {
			if (this.current.isPlaying) {
				this.player.pause();
				this.current.isPlaying = false;
				return;
			}

			this.player.play();
			this.current.isPlaying = true;
		},

		prevPage() {
			if (this.pageIndex <= 0) return;

			this.pageIndex--;
		},

		nextPage() {
			if (this.pageIndex >= this.videosPerPage.length - 1) return;

			this.pageIndex++;
		},

		load() {
			if (this.player.readyState >= 2) {
				this.current.duration = parseInt(this.player.duration);
				return;
			}

			throw new Error("Failed to load sound file.");
		},

		update() {
			this.current.time = Math.floor(this.player.currentTime);
		},

		ended() {
			this.playPause();
		}
	},

	mounted() {
		this.player = this.$refs.videoPlayer;
		this.player.ontimeupdate = this.update;
		this.player.onloadeddata = this.load;
		this.player.addEventListener("ended", this.ended);
	}
};
</script>

<style lang="scss" scoped>
@import "../scss/media-queries";

.video-modal-overlay {
	font-family: "Actor", sans-serif;
	background: rgba(0, 0, 0, 0.77);
	position: fixed;
	top: 0;
	right: 0;
	height: 100%;
	width: 100%;
	display: flex;
	align-items: center;
	justify-content: center;
	overflow-y: scroll;
	z-index: 300;

	.video-modal-outer {
		background: white;
		width: calc(100% - 24px);
		max-width: 706px;
		border-radius: 30px;
		box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.15);

		.video-modal-header {
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 30px 20px 0;

			.close-video-media {
				svg {
					height: 36px;
					width: 36px;
				}
			}

			.video-modal-title {
				font-size: 24px;
				line-height: 29px;
				color: #4d75e8;
			}
		}

		.video-modal-body {
			.video-list-slider {
				.video-list-slider-content {
				}
				.video-list-slider-controls {
					display: flex;
					justify-content: center;
					padding: 8px 20px 32px;

					.video-list-slider-delimiter {
						display: flex;
						align-items: center;
						padding-left: 30px;
						padding-right: 30px;

						a {
							margin-left: 7px;
							margin-right: 7px;
							display: inline-block;
							height: 16px;
							width: 16px;
							border-radius: 100px;
							background: rgba(77, 117, 232, 0.2);

							&.active {
								background: #4d75e8;
							}

							&:hover {
								text-decoration: none;
							}
						}
					}
				}
			}
		}
	}

	@include md {
		.video-modal-outer {
			padding: 78px 38px 52px 48px;

			.video-modal-header {
				.close-video-media {
					svg {
						height: 30px;
						width: 30px;
					}
				}

				.video-modal-title {
					font-size: 32px;
					line-height: 38px;
				}
			}

			.video-modal-body {
				.video-list-slider {
					.video-list-slider-controls {
						padding-right: 10px;

						& > a {
							svg {
								height: 32px;
								width: 44px;
							}
						}

						.video-list-slider-delimiter {
							padding-left: 46px;
							padding-right: 46px;

							a {
								margin-left: 10px;
								margin-right: 10px;
								height: 22px;
								width: 22px;
							}
						}
					}
				}
			}
		}
	}

	@include lg {
		.video-modal-outer {
			max-width: $lg;
		}
	}

	@include xl {
		.video-modal-outer {
			padding: 40px 75px;
			max-width: 1568px;
			border-radius: 40px;

			.video-modal-header {
				.close-video-media {
					svg {
						height: 40px;
						width: 40px;
					}
				}

				.video-modal-title {
					font-size: 30px;
					line-height: 36px;
				}
			}

			.video-modal-body {
				.video-list-slider {
					.video-list-slider-controls {
						padding-right: unset;

						& > a {
							svg {
								height: 23px;
								width: 32px;
							}
						}

						.video-list-slider-delimiter {
							padding-left: 33px;
							padding-right: 33px;

							a {
								margin-left: 7px;
								margin-right: 7px;
								height: 16px;
								width: 16px;
							}
						}
					}
				}
			}
		}
	}
}

.videos-list {
	font-family: "Actor", sans-serif;
	width: 100%;

	.video-player {
		padding: 12px 20px 20px;

		.player-title {
			margin-bottom: 8px;
			font-weight: 500;
			font-size: 18px;
			line-height: 22px;
			user-select: none;
			color: #4d75e8;
		}

		.player-body {
			display: flex;
			align-items: center;
			justify-content: center;
			width: 100%;
			max-width: 380px;
			margin-left: auto;
			margin-right: auto;

			.video-preview {
				position: relative;
				padding-top: 59.5%;
				box-shadow: 0px 1px 24px -4px rgba(0, 0, 0, 0.5);
				border-radius: 20px;
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
				height: 30px;
				width: 30px;

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

	@include lg {
		display: grid;
		grid-template-columns: 1fr 1fr;
		max-width: 1140px;
		margin-left: auto;
		margin-right: auto;

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

	@include xl {
		padding-left: 40px;
	}
}

.video-player-overlay {
	position: fixed;
	bottom: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: rgba(0, 0, 0, 0.32);
	z-index: 99999;
	display: flex;
	align-items: center;
	justify-content: center;
	padding: 12px;

	.c-video-player {
		width: 100%;
		max-width: 770px;
		position: relative;
		border-radius: 10px;
		overflow: hidden;

		.el-video-player {
			width: 100%;
		}

		.play-pause-control {
			background: rgba(36, 16, 164, 0.78);
			display: flex;
			align-items: center;
			justify-content: center;
			position: absolute;
			right: 50%;
			bottom: 50%;
			transform: translate(50%, 50%);
			border-radius: 100px;
			height: 36px;
			width: 36px;
			opacity: 0;
			transition: all 0.2s;

			&:hover {
				text-decoration: none;
			}
		}

		@media (hover: hover) and (pointer: fine) {
			&:hover {
				.play-pause-control {
					opacity: 0.5;

					&:hover {
						opacity: 1;
					}
				}
			}
		}

		.video-player-footer {
			position: absolute;
			bottom: 0;
			width: 100%;
		}
	}
}
</style>
