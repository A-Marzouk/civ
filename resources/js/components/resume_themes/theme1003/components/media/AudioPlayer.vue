<template>
	<div class="audio-player">
		<div class="player-meta">
			<!-- <div class="player-thumbnail">
                <img :src="audio.thumbnail" :alt="audio.title">
            </div> -->
			<div class="player-detail">
				<div class="player-category" v-text="shorten(audio.title)" :title="audio.title"></div>
				<div class="player-title" v-text="shorten(audio.transcript)" :title="audio.transcript"></div>
			</div>
		</div>

		<div class="player-control">
			<div class="control-action control-shuffle-action">
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M6.59 5.17L1.41 0L0 1.41L5.17 6.58L6.59 5.17ZM10.5 0L12.54 2.04L0 14.59L1.41 16L13.96 3.46L16 5.5V0H10.5ZM10.83 9.41L9.42 10.82L12.55 13.95L10.5 16H16V10.5L13.96 12.54L10.83 9.41Z" fill="black" />
				</svg>
			</div>
			<div class="control-action control-prev-action">
				<svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M8.36816 11.9182L3.46102 7.00035L8.36816 2.08249L6.85745 0.571777L0.428879 7.00035L6.85745 13.4289L8.36816 11.9182Z" fill="white" />
					<path d="M16.9395 11.9182L12.0323 7.00035L16.9395 2.08249L15.4287 0.571777L9.00017 7.00035L15.4287 13.4289L16.9395 11.9182Z" fill="white" />
				</svg>
			</div>
			<div class="control-action control-play-pause-action" @click="audio.isPlaying ? mediaStore.pauseAudio() : mediaStore.playAudio(audio)">
				<svg v-if="audio.isPlaying" width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill="#ffffff" d="M0.5 17.75H5.5V0.25H0.5V17.75ZM10.5 0.25V17.75H15.5V0.25H10.5Z" />
				</svg>
				<svg v-else width="17" height="19" viewBox="0 0 17 19" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill="#ffffff" d="M16.5 8.63398C17.1667 9.01888 17.1667 9.98112 16.5 10.366L2.25 18.5933C1.58333 18.9782 0.75 18.497 0.75 17.7272V1.27276C0.75 0.502958 1.58333 0.0218327 2.25 0.406733L16.5 8.63398Z" />
				</svg>
			</div>
			<div class="control-action control-next-action">
				<svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M8.63184 11.9182L13.539 7.00035L8.63184 2.08249L10.1425 0.571777L16.5711 7.00035L10.1425 13.4289L8.63184 11.9182Z" fill="white" />
					<path d="M0.0605469 11.9182L4.96769 7.00035L0.0605469 2.08249L1.57126 0.571777L7.99983 7.00035L1.57126 13.4289L0.0605469 11.9182Z" fill="white" />
				</svg>
			</div>
			<div class="control-action control-repeat-action">
				<svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill="black" d="M4 5H14V8L18 4L14 0V3H2V9H4V5ZM14 15H4V12L0 16L4 20V17H16V11H14V15Z" />
				</svg>
			</div>

			<div class="control-action control-fullscreen-action">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M7 14H5V19H10V17H7V14ZM5 10H7V7H10V5H5V10ZM17 17H14V19H19V14H17V17ZM14 5V7H17V10H19V5H14Z" fill="black" />
				</svg>
			</div>
		</div>

		<div class="player-footer">
			<div class="player-progress">
				<div class="player-progress-bar" :style="`width: ${calculatePercentage(audio.position, audio.duration)}%;`"></div>
			</div>
			<div class="player-progress-meta">
				<div class="player-duration" v-text="formatDuration(audio.duration)"></div>
				<div class="player-position" v-text="formatDuration(audio.position)"></div>
			</div>
		</div>
	</div>
</template>

<script>
import mediaStore from '../../stores/media.store';
import utilsMixin from './../../mixins/utilsMixin';

export default {
	name: 'AudioPlayer',
	props: { audio: { type: Object } },
	mixins: [utilsMixin],
	data() {
		return {
			mediaStore
		};
	}
};
</script>

<style lang="scss" scoped>
@import './../../scss/variables';

.audio-player {
	font-family: $poppins;
	background: #f5f6f8;
	padding: 10px 25px 25px;
	position: fixed;
	right: 0;
	bottom: 0;
	width: 100%;
	height: 148px;

	.player-meta {
		.player-thumbnail {
			display: none;
		}

		.player-detail {
			.player-category {
				display: none;
			}

			.player-title {
				font-size: 12px;
				line-height: 18px;
				font-weight: 600;
			}
		}
	}

	.player-control {
		display: flex;
		justify-content: center;
		align-items: center;
		padding-top: 10px;
		padding-bottom: 15px;

		.control-action {
			display: flex;
			align-items: center;
			justify-content: center;
			margin-left: 5px;
			margin-right: 5px;
			width: 60px;
			height: 60px;

			&.control-repeat-action,
			&.control-shuffle-action {
				width: 40px;
				background: #f5f6f8;
			}

			&.control-next-action,
			&.control-prev-action {
				background: #df136c;
			}

			&.control-play-pause-action {
				background: #312050;
			}

			&.control-fullscreen-action {
				display: none;
			}
		}
	}

	.player-footer {
		display: flex;
		align-items: center;

		.player-progress {
			flex: 1;
			.player-progress-bar {
				background: #312050;
				height: 8px;
			}
		}

		.player-progress-meta {
			.player-position {
				margin-left: 25px;
			}

			.player-duration {
				display: none;
			}
		}
	}

	@include md {
		padding-top: 25px;

		.player-meta {
			max-width: 215px;

			.player-detail {
				.player-category {
					display: block;
					color: #000000;
					font-size: 12px;
					line-height: 18px;
				}

				.player-title {
					padding-top: 10px;
					font-weight: 500;
					color: rgba(0, 0, 0, 0.55);
				}
			}
		}

		.player-control {
			margin-left: 40px;
			margin-top: -35px;

			.control-action {
				&.control-fullscreen-action {
					display: flex;
					position: absolute;
					right: 0;
				}
			}
		}

		.player-footer {
			display: block;
			position: absolute;
			top: 100px;
			width: 100%;
			max-width: 215px;

			.player-progress-meta {
				display: flex;
				justify-content: space-between;
				padding-top: 7px;

				.player-duration {
					display: block;
				}
			}
		}
	}

	@include xl {
		display: flex;
		align-items: center;
		height: 100px;
		padding-top: 20px;
		padding-bottom: 10px;

		.player-meta {
			order: 1;
			display: flex;
			max-width: 275px;
			overflow: hidden;

			.player-thumbnail {
				display: block;
				width: 65px;
				height: 65px;
				min-width: 65px;

				img {
					height: 100%;
					width: 100%;
				}
			}

			.player-detail {
				padding-left: 10px;

				.player-category {
					font-size: 18px;
					line-height: 27px;
				}

				.player-title {
					white-space: nowrap;
					padding-top: 5px;
				}
			}
		}

		.player-control {
			order: 3;
			margin-left: unset;
			margin-right: auto;
			margin-top: unset;
			padding: 0;

			.control-action {
				&.control-fullscreen-action {
					bottom: 50%;
					transform: translateY(50%);
				}
			}
		}

		.player-footer {
			order: 2;
			position: static;
			max-width: 387px;
			margin-left: 50px;
			margin-right: 50px;
		}
	}
}
</style>
