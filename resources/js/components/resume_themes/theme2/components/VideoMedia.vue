<template>
	<div class="video-media">
		<a class="open-video-media" href="#" @click.prevent="open">
			<img src="/images/resume_themes/theme2/video.svg" alt="video icon">
		</a>
	</div>
</template>

<script>
export default {
	name: "video-media"
};
</script>

<style lang="scss" scoped>
.video-media {
	.open-video-media {
		margin-bottom: 14px;

		img {
			width: 48px;
			height: 48px;
		}
	}
}
</style>
