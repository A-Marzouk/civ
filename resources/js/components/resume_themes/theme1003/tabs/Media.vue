<template>
	<div class="media">
		<div class="tw-w-full" v-masonry :transition-duration="0" item-selector=".item" :origin-top="true">
			<div v-masonry-tile class="media_outer item" v-for="mediaItem in mediaStore.mediaItems" :key="mediaItem.id">
				<AudioPreview v-if="mediaItem.type === 'audio'" :audio="mediaItem" />
				<VideoPreview v-else-if="mediaItem.type === 'video'" :video="mediaItem" />
			</div>
		</div>

		<AudioPlayer v-if="mediaStore.current && mediaStore.current.type === 'audio'" :audio="mediaStore.current" />
		<VideoPlayer v-if="mediaStore.current && mediaStore.current.type === 'video'" :video="mediaStore.current" />
	</div>
</template>

<script>
import mediaStore from '../stores/media.store';
import AudioPlayer from '../components/media/AudioPlayer';
import AudioPreview from '../components/media/AudioPreview';
import VideoPlayer from '../components/media/VideoPlayer';
import VideoPreview from '../components/media/VideoPreview';

export default {
	name: 'Media',
	props: {
		currentUser: { type: Object, required: true }
	},
	components: { AudioPlayer, AudioPreview, VideoPlayer, VideoPreview },
	data() {
		return {
			mediaStore
		};
	},
	mounted() {
		mediaStore.init(this.currentUser.media);
	}
};
</script>

<style lang="scss" scoped>
@import './../scss/variables';

.media {
	display: block;
	margin-top: -10px;
	padding-bottom: 133px;

	.media_outer {
		width: 100%;
		padding: 10px;
	}

	@include sm {
		.media_outer {
			width: 50%;
		}
	}

	@include md {
		margin-left: auto;
		margin-right: auto;
		max-width: 665px;

		.media_outer {
			padding: 10px;
		}
	}

	@include lg {
		max-width: $lg;

		.media_outer {
			width: 33.33333%;
			padding: 10px;
		}
	}

	@include xl {
		max-width: calc(#{$xl} - 30px);
		padding-bottom: 75px;

		.media_outer {
			width: 25%;
			padding: 10px;
		}
	}
}
</style>
