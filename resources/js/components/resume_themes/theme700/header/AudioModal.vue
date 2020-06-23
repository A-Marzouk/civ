<template>
	<div class="audio-modal d-inline-flex tw-align-middle">
		<v-btn elevation="0" fab :width="30" :height="30" class="mr-5" color="#EBEBEB" @click="open">
			<v-img src="/images/resume_themes/theme700/headphones.svg" contain :width="14" :height="14"></v-img>
		</v-btn>
		<v-dialog content-class="theme700-v-dialog--audio-modal" v-model="dialog" persistent overlay-opacity="0.5" overlay-color="#000000">
			<v-card>
				<div class="v-dialog-v-card-header">
					<v-card-title class="pa-0 font-weight-bold">
						<h2 class="modal-title">
							<span class="title-text">My Audio</span>
						</h2>
					</v-card-title>

					<v-card-actions class="justify-end mr-3">
						<v-btn class="close-action" elevation="0" color="#EBEBEB" fab @click="close">
							<v-icon color="#513ECD">mdi-close</v-icon>
						</v-btn>
					</v-card-actions>
				</div>

				<v-carousel class="v-carousel-audio-modal" height="auto" hide-delimiter-background light :show-arrows="false" :continuous="false">
					<v-carousel-item v-for="(pageAudios, i) in audiosPerPage" :key="i">
						<v-list class="audios-list">
							<v-list-item v-for="audio in pageAudios" :key="audio.src">
								<v-list-item-content>
									<div class="audio-player" :class="{'playing': isPlaying(audio.src)}">
										<div class="player-title">
											<h3 v-text="audio.title"></h3>
										</div>

										<div class="player-body">
											<a href="#" class="play-pause-action" title="Play/Pause" @click.prevent="playPause(audio.src)">
												<v-icon v-if="isPlaying(audio.src)" color="white" large>mdi-pause</v-icon>
												<v-icon v-else color="white" large>mdi-play</v-icon>
											</a>
											<dir class="player-status">
												<div v-if="isPlaying(audio.src)" class="player-timing">
													<span v-text="formatDuration(current.time)"></span>
													<span v-text="formatDuration(current.duration)"></span>
												</div>
												<v-progress-linear v-if="isPlaying(audio.src)" background-color="#EBEBEB" rounded height="14" color="#513ECD" :value="currentProgress"></v-progress-linear>
												<v-progress-linear v-else background-color="#EBEBEB" rounded height="14" color="#513ECD" value="0"></v-progress-linear>
											</dir>
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
	name: "audio-modal",

	data() {
		return {
			dialog: false,
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

		open() {
			this.dialog = true;
		},

		close() {
			this.player.pause();
			this.current = {
				isPlaying: false,
				audio: {},
				duration: 0,
				time: 0
			};
			this.dialog = false;
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
		}
	},

	mounted() {
		this.player.ontimeupdate = this.update;
		this.player.onloadeddata = this.load;
	}
};
</script>

<style lang="scss" scoped>
@import "./../scss/media-queries.scss";

.audio-modal {
	font-family: "Montserrat", sans-serif;
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

.v-dialog-v-card-header {
	display: flex;
	align-items: center;
	justify-content: space-between;
}

.v-btn--fab.close-action {
	margin-top: 5.5px;
	margin-right: 16px;
	height: 35px;
	width: 35px;
}

.audios-list {
	width: 100%;
	font-family: "Lato", sans-serif;

	.audio-player {
		padding-top: 18px;
		padding-left: 12px;
		padding-right: 12px;

		.player-title {
			font-weight: 500;
			font-size: 24px;
			line-height: 29px;
			user-select: none;
			color: #513ecd;
		}

		.player-body {
			display: flex;
			align-items: center;
			padding-top: 20px;

			.player-status {
				flex: 1;
				margin-left: 12px;
				position: relative;

				.player-timing {
					position: absolute;
					bottom: 18px;
					left: 0;
					right: 0;
					display: flex;
					justify-content: space-between;
					font-weight: 500;
					font-size: 18px;
					line-height: 22px;
					color: #513ecd;
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
			background: #2410a4;
			border-radius: 100px;
			height: 55px;
			width: 55px;

			&:hover {
				text-decoration: none;
			}
		}
	}

	@include md {
		.audio-player {
			.player-title {
				font-size: 30px;
				line-height: 36px;
			}

			.player-body {
				.player-status {
					margin-left: 28px;
				}
			}

			.play-pause-action {
				height: 61px;
				width: 61px;

				.v-icon {
					font-size: 52px !important;
				}
			}
		}
	}

	@include lg {
		.audio-player {
			.player-title {
				text-align: center;
			}
		}
	}

	@include xl {
		max-width: 1140px;
		margin-left: auto;
		margin-right: auto;
		padding-left: 40px;
	}
}

.v-carousel-audio-modal {
	padding-bottom: 50px;
}

@include md {
	.v-carousel-audio-modal {
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
.v-dialog.theme700-v-dialog--audio-modal {
	margin-left: 10px;
	margin-right: 10px;

	&.v-dialog:not(.v-dialog--fullscreen) {
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
		margin-left: 40px;
		margin-right: 40px;

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
		margin-left: 100px;
		margin-right: 100px;
	}
}
</style>
