<template>
	<div class="audio-preview">
		<div class="audio-detail">
			<img :src="media.thumbnail" :alt="media.title">

			<div class="audio-infos">
				<h4 class="audio-category" v-text="media.category"></h4>
				<h4 class="audio-title" v-text="shorten(media.title)"></h4>
				<div class="audio-duration" v-text="formatDuration(media.duration)"></div>
			</div>

			<div class="audio-play-pause" @click="onPlayPause">
				<svg v-if="isPlaying" width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill="#ffffff" d="M0.5 17.75H5.5V0.25H0.5V17.75ZM10.5 0.25V17.75H15.5V0.25H10.5Z" />
				</svg>

				<svg v-else width="17" height="19" viewBox="0 0 17 19" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill="#ffffff" d="M16.5 8.63398C17.1667 9.01888 17.1667 9.98112 16.5 10.366L2.25 18.5933C1.58333 18.9782 0.75 18.497 0.75 17.7272V1.27276C0.75 0.502958 1.58333 0.0218327 2.25 0.406733L16.5 8.63398Z" />
				</svg>
			</div>
		</div>
		<div class="audio-progress">
			<div class="audio-progress-bar" :style="`width: ${calculatePercentage(media.position, media.duration)}%;`"></div>
		</div>
	</div>
</template>

<script>
import utilsMixin from "./../../mixins/utilsMixin";

export default {
	name: "audio-preview",

	props: {
		media: {
			type: Object,
			required: true
		},

		isPlaying: {
			type: Boolean,
			default: false
		}
	},

	mixins: [utilsMixin],

	methods: {
		onPlayPause() {
			if (this.isPlaying) {
				this.$emit("onPause");
				return;
			}

			this.$emit("onPlay", this.media.id);
		},

		shorten(str, num = 24) {
			if (str.length > num) {
				return str.slice(0, num) + "...";
			}
			return str;
		}
	}
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.audio-preview {
	padding: 20px 13px;
	background: #f5f6f8;

	.audio-detail {
		display: flex;
		padding-left: 7px;
		padding-right: 7px;

		img {
			height: 55px;
			width: 55px;
		}

		.audio-play-pause {
			background: #312050;
			display: flex;
			align-items: center;
			justify-content: center;
			height: 55px;
			width: 55px;
		}

		.audio-infos {
			flex: 1;
			color: #000000;
			font-family: $poppins;
			padding-left: 9px;
			padding-right: 5px;

			.audio-category {
				font-size: 16px;
				line-height: 25px;
			}

			.audio-title {
				font-size: 10px;
				line-height: 16px;
				color: rgba(0, 0, 0, 0.55);
			}

			.audio-duration {
				font-size: 10px;
				line-height: 16px;
			}
		}
	}

	.audio-progress {
		.audio-progress-bar {
			background: #312050;
			height: 8px;
			margin-top: 13px;
		}
	}

	@include xs {
		.audio-detail {
			img {
				height: 65px;
				width: 65px;
			}

			.audio-play-pause {
				height: 65px;
				width: 65px;
			}

			.audio-infos {
				padding-left: 15px;
				padding-right: 10px;

				.audio-category {
					font-size: 18px;
					line-height: 27px;
				}

				.audio-duration {
					font-size: 12px;
					line-height: 18px;
				}
			}
		}
	}

	@include sm {
		.audio-detail {
			.audio-infos {
				padding-left: 20px;
				padding-right: 13px;

				.audio-title {
					font-size: 12px;
					line-height: 18px;
				}
			}
		}
	}
}
</style>
