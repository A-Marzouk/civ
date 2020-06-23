<template>
	<div class="audio-media">
		<a class="open-audio-media" href="#" @click.prevent="open">
			<img src="/images/resume_themes/theme2/sound.svg" alt="sound icon">
		</a>
	</div>
</template>

<script>
export default {
	name: "audio-media"
};
</script>

<style lang="scss" scoped>
.audio-media {
	.open-audio-media {
		margin-bottom: 14px;

		img {
			width: 48px;
			height: 48px;
		}
	}
}
</style>
