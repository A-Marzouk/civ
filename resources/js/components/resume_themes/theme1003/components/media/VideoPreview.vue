<template>
	<div class="video-preview">
		<div class="video-thumbnail-wrapper">
			<div class="video-thumbnail">
				<img :src="video.media_preview" :alt="video.title">
			</div>
		</div>

		<div class="video-play" @click="video.isPlaying ? mediaStore.pauseVideo() : mediaStore.playVideo(video)">
			<svg v-if="video.isPlaying" width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill="#ffffff" d="M0.5 17.75H5.5V0.25H0.5V17.75ZM10.5 0.25V17.75H15.5V0.25H10.5Z" />
			</svg>

			<svg v-else width="17" height="19" viewBox="0 0 17 19" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill="#ffffff" d="M16.5 8.63398C17.1667 9.01888 17.1667 9.98112 16.5 10.366L2.25 18.5933C1.58333 18.9782 0.75 18.497 0.75 17.7272V1.27276C0.75 0.502958 1.58333 0.0218327 2.25 0.406733L16.5 8.63398Z" />
			</svg>
		</div>
	</div>
</template>

<script>
import mediaStore from '../../stores/media.store';

export default {
	name: 'VideoPreview',
	props: { video: { type: Object, required: true } },
	data() {
		return {
			mediaStore
		};
	}
};
</script>

<style lang="scss" scoped>
@import './../../scss/variables';

.video-preview {
	position: relative;
	width: 100%;

	.video-thumbnail-wrapper {
		width: 100%;

		.video-thumbnail {
			height: 0;
			width: 100%;
			position: relative;
			padding-bottom: 79.214%;

			img {
				position: absolute;
				left: 0;
				top: 0;
				width: 100%;
				height: 100%;
				object-fit: cover;
			}
		}
	}

	.video-play {
		background: #312050;
		height: 65px;
		width: 65px;
		display: flex;
		align-items: center;
		justify-content: center;
		position: absolute;
		right: 50%;
		bottom: 50%;
		transform: translate(50%, 50%);
	}

	@include md {
		.video-thumbnail-wrapper {
			.video-thumbnail {
				padding-bottom: 97.28%;
			}
		}
	}

	@include xl {
		.video-thumbnail-wrapper {
			.video-thumbnail {
				padding-bottom: 73.021%;
			}
		}
	}
}
</style>
