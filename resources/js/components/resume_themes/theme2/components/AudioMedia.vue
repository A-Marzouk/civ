<template>
	<div class="audio-modal-overlay">
		<div class="audio-modal-outer">
			<div class="audio-modal-header">
				<h2 class="audio-modal-title">My Audio</h2>

				<a class="close-audio-media" href="#" @click.prevent="close">
					<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M18 0C8.07497 0 0 8.07497 0 18C0 27.925 8.07497 36 18 36C27.925 36 36 27.925 36 18C36 8.07497 27.925 0 18 0ZM18 34.5C8.90184 34.5 1.49998 27.0982 1.49998 18C1.49998 8.90184 8.90184 1.49998 18 1.49998C27.0982 1.49998 34.5 8.90184 34.5 18C34.5 27.0982 27.0982 34.5 18 34.5Z" fill="#4D75E8" />
						<path d="M25.2803 10.7207C24.9873 10.4277 24.5127 10.4277 24.2197 10.7207L18 16.9405L11.7803 10.7208C11.4873 10.4278 11.0127 10.4278 10.7197 10.7208C10.4268 11.0138 10.4268 11.4884 10.7197 11.7813L16.9394 18.001L10.7197 24.2207C10.4268 24.5137 10.4268 24.9883 10.7197 25.2812C10.8662 25.4277 11.0582 25.501 11.25 25.501C11.4419 25.501 11.6338 25.4277 11.7803 25.2812L18 19.0615L24.2197 25.2812C24.3661 25.4277 24.5581 25.501 24.75 25.501C24.9419 25.501 25.1337 25.4277 25.2803 25.2812C25.5733 24.9882 25.5733 24.5136 25.2803 24.2207L19.0605 18.001L25.2802 11.7813C25.5732 11.4883 25.5732 11.0137 25.2803 10.7207Z" fill="#4D75E8" />
					</svg>
				</a>
			</div>
			<div class="audio-modal-body">
				<div class="audio-list-slider">
					<div class="audio-list-slider-content">
						<v-list class="audios-list" :class="{'d-none': i!==pageIndex}" v-for="(pageAudios, i) in audiosPerPage" :key="i">
							<v-list-item class="p-0" v-for="audio in pageAudios" :key="audio.src">
								<v-list-item-content class="pb-0">
									<div class="audio-player" :class="{'playing': isPlaying(audio.src)}">
										<div class="player-title">
											<h3 v-text="audio.title"></h3>
										</div>

										<div class="player-body">
											<a href="#" class="play-pause-action" title="Play/Pause" @click.prevent="playPause(audio.src)">
												<v-icon class="text-white" size="inherit" v-if="isPlaying(audio.src)" color="white" large>mdi-pause</v-icon>
												<v-icon class="text-white" size="inherit" v-else color="white" large>mdi-play</v-icon>
											</a>
											<div class="player-status">
												<div v-if="isPlaying(audio.src)" class="player-timing">
													<span v-text="formatDuration(current.time)"></span>
													<span v-text="formatDuration(current.duration)"></span>
												</div>

												<v-progress-linear class="player-v-progress-bar" v-if="isPlaying(audio.src)" background-color="transparent" height="4" color="#4D75E8" :value="currentProgress"></v-progress-linear>
												<v-progress-linear class="player-v-progress-bar" v-else background-color="transparent" height="4" color="#4D75E8" value="0"></v-progress-linear>
											</div>
										</div>
									</div>
								</v-list-item-content>
							</v-list-item>
						</v-list>
					</div>

					<div class="audio-list-slider-controls">
						<a href="#" @click.prevent="prevPage">
							<svg width="32" height="23" viewBox="0 0 32 23" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path :fill-opacity="(pageIndex > 0) ? 1 : 0.2" d="M10.4388 0.326524C10.6521 0.115446 10.9377 -0.00176123 11.2344 2.00092e-05C11.5311 0.00180125 11.8154 0.12243 12.0262 0.336053C12.237 0.549677 12.3577 0.839297 12.3623 1.14285C12.3669 1.4464 12.2551 1.73972 12.0509 1.95996L3.87563 10.3244H30.8584C31.0075 10.3236 31.1554 10.3529 31.2934 10.4105C31.4315 10.4681 31.5571 10.553 31.6631 10.6603C31.7691 10.7676 31.8535 10.8953 31.9113 11.0359C31.9691 11.1766 31.9992 11.3275 32 11.48C31.9998 11.7912 31.8791 12.0895 31.6643 12.3098C31.4495 12.53 31.1582 12.6542 30.8541 12.6551H3.87563L12.0518 21.0046C12.2614 21.2255 12.3787 21.5213 12.3787 21.8292C12.3787 22.1372 12.2614 22.433 12.0518 22.6539C11.9466 22.7635 11.8212 22.8506 11.6828 22.91C11.5444 22.9694 11.3958 23 11.2457 23C11.0956 23 10.9471 22.9694 10.8087 22.91C10.6703 22.8506 10.5448 22.7635 10.4397 22.6539L0.327218 12.3012C0.117539 12.0835 0 11.7901 0 11.4845C0 11.1788 0.117539 10.8855 0.327218 10.6678L10.4388 0.326524Z" fill="#4D75E8" />
							</svg>
						</a>

						<div class="audio-list-slider-delimiter">
							<a v-for="(pageAudios, i) in audiosPerPage" :class="{'active': i===pageIndex}" href="#" @click.prevent="pageIndex=i" :key="i"></a>
						</div>

						<a href="#" @click.prevent="nextPage">
							<svg width="32" height="23" viewBox="0 0 32 23" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path :fill-opacity="pageIndex < audiosPerPage.length - 1 ? 1 : 0.2" d="M21.5612 22.6735C21.3479 22.8846 21.0623 23.0018 20.7656 23C20.4689 22.9982 20.1846 22.8776 19.9738 22.6639C19.763 22.4503 19.6423 22.1607 19.6377 21.8572C19.6331 21.5536 19.7449 21.2603 19.9491 21.04L28.1244 12.6756L1.14158 12.6756C0.99246 12.6764 0.844643 12.6471 0.70657 12.5895C0.568497 12.5319 0.442871 12.447 0.336866 12.3397C0.23086 12.2324 0.146547 12.1047 0.0887489 11.9641C0.0309486 11.8234 0.000793457 11.6725 0 11.52C0.000226974 11.2088 0.120945 10.9105 0.33572 10.6902C0.550495 10.47 0.841824 10.3458 1.1459 10.3449L28.1244 10.3449L19.9482 1.99544C19.7386 1.7745 19.6213 1.47869 19.6213 1.17076C19.6213 0.862829 19.7386 0.567017 19.9482 0.346079C20.0534 0.236494 20.1788 0.149448 20.3172 0.0900269C20.4556 0.0306053 20.6042 0 20.7543 0C20.9044 0 21.0529 0.0306053 21.1913 0.0900269C21.3297 0.149448 21.4552 0.236494 21.5603 0.346079L31.6728 10.6988C31.8825 10.9165 32 11.2099 32 11.5155C32 11.8212 31.8825 12.1145 31.6728 12.3322L21.5612 22.6735Z" fill="#4D75E8" />
							</svg>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "audio-media",

	data() {
		return {
			pageIndex: 0,
			current: {
				isPlaying: false,
				audio: {},
				duration: 0,
				time: 0
			},
			audios: [
				{
					title: "Audio-1",
					src:
						"https://www.bensound.com/bensound-music/bensound-summer.mp3"
				},
				{
					title: "Audio-2",
					src:
						"https://www.bensound.com/bensound-music/bensound-ukulele.mp3"
				},
				{
					title: "Audio-3",
					src:
						"https://www.bensound.com/bensound-music/bensound-jazzyfrenchy.mp3"
				},
				{
					title: "Audio-4",
					src:
						"https://www.bensound.com/bensound-music/bensound-memories.mp3"
				},
				{
					title: "Audio-5",
					src:
						"https://www.bensound.com/bensound-music/bensound-littleidea.mp3"
				}
			],
			player: new Audio()
		};
	},

	computed: {
		currentProgress() {
			return (this.current.time / this.current.duration) * 100;
		},
		audiosPerPage() {
			const perPage = 3,
				audiosPerPage = [];

			for (let i = 0; i < this.audios.length; i += perPage) {
				audiosPerPage.push(this.audios.slice(i, i + perPage));
			}

			return audiosPerPage;
		},
		isPlaying() {
			return src => {
				return src === this.current.audio.src && this.current.isPlaying;
			};
		}
	},

	methods: {
		playPause(src) {
			if (this.current.isPlaying && src === this.current.audio.src) {
				this.current.isPlaying = false;
				this.player.pause();

				return;
			}

			if (this.current.isPlaying && src !== this.current.audio.src) {
				this.current.time = 0;
			}

			this.current.audio = this.audios.find(audio => audio.src === src);
			this.current.isPlaying = true;

			this.player.src = this.current.audio.src;
			this.player.currentTime = this.current.time;
			this.player.play();
		},

		load() {
			if (this.player.readyState >= 2) {
				this.current.duration = parseInt(this.player.duration);
				return;
			}

			throw new Error("Failed to load sound file.");
		},

		update() {
			this.current.time = parseInt(this.player.currentTime);
		},

		close() {
			this.player.pause();
			this.current = {
				isPlaying: false,
				audio: {},
				duration: 0,
				time: 0
			};

			this.$emit("close");
		},

		formatDuration(durationSeconds) {
			let seconds = Math.floor(durationSeconds % 60);

			if (seconds < 10) {
				seconds = "0" + seconds;
			}

			let minutes = Math.floor(durationSeconds / 60) % 60;

			if (minutes < 10) {
				minutes = "0" + minutes;
			}

			let hours = Math.floor(durationSeconds / 3600);

			return hours > 0
				? `${hours}:${minutes}:${seconds}`
				: `${minutes}:${seconds}`;
		},

		prevPage() {
			if (this.pageIndex <= 0) return;

			this.pageIndex--;
		},

		nextPage() {
			if (this.pageIndex >= this.audiosPerPage.length - 1) return;

			this.pageIndex++;
		}
	},

	mounted() {
		this.player.ontimeupdate = this.update;
		this.player.onloadeddata = this.load;
	}
};
</script>

<style lang="scss" scoped>
@import "../scss/media-queries";

.audio-modal-overlay {
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

	.audio-modal-outer {
		background: white;
		width: calc(100% - 24px);
		max-width: 706px;
		border-radius: 30px;
		box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.15);
		padding: 30px 20px 30px 25px;

		.audio-modal-header {
			display: flex;
			justify-content: space-between;
			align-items: center;
			height: 36px;

			.close-audio-media {
				svg {
					height: 36px;
					width: 36px;
				}
			}

			.audio-modal-title {
				font-size: 24px;
				line-height: 29px;
				color: #4d75e8;
			}
		}

		.audio-modal-body {
			.audio-list-slider {
				.audio-list-slider-content {
				}
				.audio-list-slider-controls {
					display: flex;
					justify-content: center;
					padding-right: 5px;

					.audio-list-slider-delimiter {
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
		.audio-modal-outer {
			padding: 78px 38px 52px 48px;

			.audio-modal-header {
				.close-audio-media {
					svg {
						height: 30px;
						width: 30px;
					}
				}

				.audio-modal-title {
					font-size: 32px;
					line-height: 38px;
				}
			}

			.audio-modal-body {
				.audio-list-slider {
					.audio-list-slider-controls {
						padding-right: 10px;

						& > a {
							svg {
								height: 32px;
								width: 44px;
							}
						}

						.audio-list-slider-delimiter {
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
		.audio-modal-outer {
			max-width: $lg;
		}
	}

	@include xl {
		.audio-modal-outer {
			padding: 40px 75px;
			max-width: 1568px;
			border-radius: 40px;

			.audio-modal-header {
				.close-audio-media {
					svg {
						height: 40px;
						width: 40px;
					}
				}

				.audio-modal-title {
					font-size: 30px;
					line-height: 36px;
				}
			}

			.audio-modal-body {
				.audio-list-slider {
					.audio-list-slider-controls {
						padding-right: unset;

						& > a {
							svg {
								height: 23px;
								width: 32px;
							}
						}

						.audio-list-slider-delimiter {
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

.v-carousel-audio-modal {
	padding-bottom: 50px;

	@include md {
		.v-carousel-audio-modal {
			padding-bottom: 70px;
		}
	}
}

.audios-list {
	width: 100%;
	padding-top: 22px;
	padding-bottom: 35px;

	.audio-player {
		.player-title {
			font-weight: 500;
			font-size: 18px;
			line-height: 22px;
			user-select: none;
			color: #4d75e8;
		}

		.player-body {
			display: flex;
			align-items: center;
			padding-top: 7px;

			.player-status {
				flex: 1;
				margin-left: 20px;
				position: relative;

				.player-timing {
					position: absolute;
					bottom: 7px;
					left: 0;
					right: 0;
					display: flex;
					justify-content: space-between;
					font-weight: 500;
					font-size: 14px;
					line-height: 17px;
					color: #4d75e8;
				}

				.v-progress-linear--rounded {
					border-radius: 100px;
				}
			}
		}

		.play-pause-action {
			display: flex;
			align-items: center;
			justify-content: center;
			background: #4d75e8;
			border-radius: 100px;
			font-size: 26px;
			height: 35px;
			width: 35px;

			.v-icon {
				font-size: inherit !important;
			}

			&:hover {
				text-decoration: none;
			}
		}
	}

	@include md {
		padding-top: 37px;
		padding-bottom: 62px;
		padding-right: 58px;

		.audio-player {
			padding-top: 25px;

			.player-title {
			}

			.player-body {
				.player-status {
					margin-left: 28px;

					.player-timing {
						bottom: 10px;
					}
				}
			}

			.play-pause-action {
				height: 37px;
				width: 37px;

				.v-icon {
					font-size: 27px !important;
				}
			}
		}
	}

	@include lg {
		padding-right: 100px;

		.audio-player {
			padding-top: 15px;

			.player-title {
				.player-body {
					padding-top: 25px;
				}
			}
		}
	}

	@include xl {
		padding-left: 110px;
		padding-right: 110px;
		padding-top: 30px;
		padding-bottom: 45px;

		.audio-player {
			.play-pause-action {
				height: 35px;
				width: 35px;

				.v-icon {
					font-size: 24px !important;
				}
			}
		}
	}
}

.player-v-progress-bar {
	border-bottom: 1px solid #d9d9d9;

	@include md {
		height: 6px !important;
	}
}
</style>
