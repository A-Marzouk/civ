<template>
	<div v-if="true || media.id===1" class="audio-preview">
		<img class="audio-preview__thumbnail" :src="media.thumbnail">
		<div class="audio-preview__detail tw-font-poppins">
			<h4 class="detail__title" v-text="media.title"></h4>
			<div class="detail__artist-name" v-text="media.artist"></div>
			<div class="detail__track-duration tw-text-black" v-text="media.duration"></div>
		</div>
	</div>

</template>

<script>
export default {
	name: "audio-preview",

	props: {
		media: {
			type: Object,
			required: true
		}
	}
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

@media (min-width: $sm) {
	.audio-preview {
		display: grid;
		grid-template-columns: 2fr 3fr;
		background: #eeeff1;
		height: 87px;
		border-radius: 9px;

		.audio-preview__thumbnail {
			width: 78%;
			align-self: center;
			justify-self: center;
			border-radius: 4px;
		}

		.audio-preview__detail {
			align-self: center;

			.detail__title {
				font-size: 13px;
				line-height: 18px;
				font-weight: 700;
			}

			.detail__artist-name {
				font-size: 12px;
				color: rgba(0, 0, 0, 0.55);
			}

			.detail__track-duration {
				font-size: 12px;
			}
		}
	}
}
</style>
