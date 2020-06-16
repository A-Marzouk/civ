<template>
	<div class="audio-player">
		<div class="player-title" v-text="track.title"></div>
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
			<div class="control-action control-play-pause-action" @click="onPlayPause">
				<svg v-if="isPlaying" width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
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
		</div>

		<div class="player-footer">
			<div class="player-progress">
				<div class="player-progress-bar" :style="`width: ${calculatePercentage(track.position, track.duration)}%;`"></div>
			</div>
			<div class="player-position" v-text="formatDuration(track.position)"></div>
		</div>
	</div>
</template>

<script>
import utilsMixin from "./../../mixins/utilsMixin";

export default {
	name: "audio-player",

	props: {
		track: {
			type: Object,
			required: true
		},

		isPlaying: {
			type: Boolean,
			default: false
		}
	},

	mixins: [utilsMixin],

	data: () => {
		return {
			position: 60 * 5
		};
	},

	methods: {
		onPlayPause() {
			if (this.isPlaying) {
				this.$emit("onPause");
				return;
			}

			this.$emit("onPlay", this.media.id);
		}
	}
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.audio-player {
	font-family: $poppins;
	background: #f5f6f8;
	padding: 10px 25px 25px;
	position: fixed;
	right: 0;
	bottom: 0;
	width: 100%;
	height: 148px;

	.player-title {
		font-size: 12px;
		line-height: 18px;
		font-weight: 600;
	}

	.player-control {
		display: flex;
		justify-content: center;
		align-items: center;
		padding-top: 10px;
		padding-bottom: 20px;

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
		}
	}

	.player-footer {
		display: flex;

		.player-progress {
			flex: 1;
			.player-progress-bar {
				background: #312050;
				height: 8px;
			}
		}

		.player-position {
		}
	}
}
</style>
