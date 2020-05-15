<template>
	<div class="audio-player">
		<div class="audio-player__controls tw-relative tw-flex tw-justify-center tw-items-center">
			<a href="#" class="controls__button--expand" @click.prevent>
				<svg class="tw-fill-current" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
					<path d="M2 9H0V14H5V12H2V9ZM0 5H2V2H5V0H0V5ZM12 12H9V14H14V9H12V12ZM9 0V2H12V5H14V0H9Z" />
				</svg>
			</a>
			<a href="#" class="controls__button controls__button--previous" @click.prevent>
				<svg class="tw-fill-current" viewBox="0 0 20 16" xmlns="http://www.w3.org/2000/svg">
					<path d="M9.26245 13.7375L3.53745 8L9.26245 2.2625L7.49995 0.5L-4.95911e-05 8L7.49995 15.5L9.26245 13.7375Z" />
					<path d="M19.2625 13.7375L13.5375 8L19.2625 2.2625L17.5 0.5L9.99995 8L17.5 15.5L19.2625 13.7375Z" />
				</svg>
			</a>
			<a href="#" class="controls__button controls__button--play" @click.prevent>
				<svg class="tw-fill-current" viewBox="0 0 16 18" xmlns="http://www.w3.org/2000/svg">
					<path d="M0.5 17.75H5.5V0.25H0.5V17.75ZM10.5 0.25V17.75H15.5V0.25H10.5Z" />
				</svg>
			</a>
			<a href="#" class="controls__button controls__button--next" @click.prevent>
				<svg class="tw-fill-current" viewBox="0 0 20 16" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.7375 13.7375L16.4625 8L10.7375 2.2625L12.5 0.5L20 8L12.5 15.5L10.7375 13.7375Z" />
					<path d="M0.737549 13.7375L6.46255 8L0.737549 2.2625L2.50005 0.5L10 8L2.50005 15.5L0.737549 13.7375Z" />
				</svg>
			</a>
		</div>
		<div class="audio-player__progress">
			<div class="progress__meta">
				<span>{{ formatDuration(position) }}</span>
				<span>{{ formatDuration(track.duration) }}</span>
			</div>
			<div class="progress__bar">
				<div class="bar__outer">
					<div class="bar__inner" :style="`width: ${(position/track.duration) * 100}%`"></div>
				</div>
			</div>
		</div>
		<div class="audio-player__preview">
			<div class="audio-preview__thumbnail">
				<img :src="track.thumbnail">
			</div>
			<div class="audio-preview__detail tw-font-poppins">
				<h4 class="detail__title" v-text="track.title"></h4>
				<div class="detail__artist-name" v-text="track.artist"></div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "audio-player",

	props: {
		track: {
			type: Object,
			required: true
		}
	},

	data: () => {
		return {
			position: 60 * 5
		};
	},

	methods: {
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
	}
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.audio-player {
	left: 0;
	right: 0;
	height: 140px;
	bottom: 0;
	padding: 25px 25px 15px;
	position: fixed;
	background: #eeeff1;
}

.audio-player__controls {
	.controls__button--expand {
		top: 0;
		right: 0;
		color: black;
		width: 14px;
		height: 14px;
		position: absolute;
	}

	.controls__button {
		width: 60px;
		height: 60px;
		display: flex;
		align-items: center;
		border-radius: 5px;
		justify-content: center;

		&.controls__button--previous {
			color: #000000;
			svg {
				width: 20px;
				height: 16px;
			}
		}
		&.controls__button--play {
			color: #ffffff;
			background: #3f38dd;
			margin-left: 15px;
			margin-right: 15px;

			svg {
				width: 16px;
				height: 18px;
			}
		}
		&.controls__button--next {
			color: #000000;
			svg {
				width: 20px;
				height: 16px;
			}
		}
	}
}

.audio-player__progress {
	padding-top: 11px;

	.progress__meta {
		width: 100%;
		display: flex;
		font-size: 8px;
		list-style: 12px;
		justify-content: space-between;
	}

	.progress__bar {
		padding-top: 8px;

		.bar__outer {
			height: 8px;
			position: relative;
			background: #f4f8fb;
			border-radius: 20px;
		}

		.bar__inner {
			top: 0;
			left: 0;
			bottom: 0;
			position: absolute;
			background: #3f38dd;
			border-radius: 20px;
		}
	}
}

.audio-player__preview {
	display: none;
}

@media (min-width: $sm) {
	.audio-player__progress {
		max-width: 415px;
		margin: 0 auto;
	}

	.audio-player__preview {
		top: 0;
		left: 0;
		padding: 25px;
		display: flex;
		position: absolute;
		border-radius: 9px;

		.audio-preview__thumbnail {
			img {
				width: 52px;
				height: 52px;
				border-radius: 9px;
			}
		}

		.audio-preview__detail {
			flex: 1;
			padding-left: 15px;

			.detail__title {
				font-size: 12px;
				word-break: break-word;
				line-height: 18px;
				font-weight: 700;
			}

			.detail__artist-name {
				color: rgba(0, 0, 0, 0.55);
				font-size: 10px;
				line-height: 15px;
				padding-top: 5px;
			}

			.detail__track-duration {
				font-size: 12px;
				line-height: 18px;
			}
		}
	}
}

@media (min-width: $md) {
	.audio-player {
		height: 100px;
		padding-top: 20px;
	}

	.audio-player__preview {
		padding-left: 60px;
	}

	.audio-player__progress {
		left: 20%;
		right: 0;
		margin: unset;
		bottom: 5px;
		max-width: 20%;
		position: absolute;
	}
}

@media (min-width: 1600px) {
	.audio-player {
		padding-top: 20px;
	}

	.audio-player__controls {
		.controls__button--expand {
			top: 25px;
			right: 25px;
		}
	}

	.audio-player__progress {
		left: 262px;
		bottom: 20px;
		max-width: 415px;
	}
}
</style>
