<template>
	<transition name="fade" appear>
		<div class="video-player">
			<div class="tw-relative">
				<button class="close-player-btn" @click="mediaStore.pauseVideo()">&times;</button>
			</div>
			<video ref="videoPlayer" :src="video.url" :poster="video.media_preview" controls="false"></video>
		</div>
	</transition>
</template>

<script>
import mediaStore from '../../stores/media.store';

export default {
	name: 'VideoPlayer',
	props: { video: { type: Object, required: true } },
	data() {
		return {
			mediaStore
		};
	},
	mounted() {
		this.$refs.videoPlayer.play().then(_ => {
			mediaStore.current.isPlaying = true;
		});
	}
};
</script>

<style lang="scss" scoped>
.video-player {
	right: 50%;
	width: 100%;
	bottom: 50%;
	position: fixed;
	max-width: 720px;
	min-height: 360px;
	border-radius: 3px;
	border: 1px solid #ebebeb;
	transform: translate(50%, 50%);
	box-shadow: 0 0 10px -7px rgba(0, 0, 0, 0.58);
	background-color: #ffffff;

	.close-player-btn {
		position: absolute;
		bottom: 100%;
		left: 100%;
		display: flex;
		font-size: 22px;
		border-radius: 50%;
		height: 24px;
		align-items: center;
		width: 24px;
		border: 1px solid #010001;
		justify-content: center;
		font-weight: 700;
		line-height: 1px;
		background: white;

		&:focus {
			outline: none;
		}
	}

	video {
		width: 100%;

		&:focus {
			outline: none;
		}
	}
}

.fade-enter-active,
.fade-leave-active {
	transition: opacity 0.5s;
}
.fade-enter,
.fade-leave-to {
	opacity: 0;
}
</style>
