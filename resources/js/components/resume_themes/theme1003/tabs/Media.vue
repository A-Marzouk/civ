<template>
	<div class="media">
		<div class="tw-w-full" v-masonry :transition-duration="0" item-selector=".item" :origin-top="true">
			<div v-masonry-tile class="media_outer item" v-for="item in media" :key="item.id">
				<AudioPreview v-if="item.type === 'audio'" :media="item" :isPlaying="isPlaying(item.id)" @onPlay="onPlay" @onPause="onPause" />
				<VideoPreview v-else-if="item.type === 'video'" :media="item" />
			</div>
		</div>

		<AudioPlayer :track="activeMedia" />
	</div>
</template>

<script>
import AudioPreview from "./../components/media/AudioPreview";
import VideoPreview from "./../components/media/VideoPreview";
import AudioPlayer from "./../components/media/AudioPlayer";

export default {
	name: "media",

	components: { AudioPreview, VideoPreview, AudioPlayer },

	data: () => {
		return {
			media: [
				{
					id: 1,
					category: "Podcast",
					thumbnail: "/images/resume_themes/theme1003/media/1.png",
					duration: 1 * 3600 + 5 * 60,
					position: 15 * 60,
					type: "video"
				},
				{
					id: 2,
					category: "Podcast",
					title: "Lorem Cambell -Feat Lorem Mena",
					thumbnail: "/images/resume_themes/theme1003/media/2.png",
					artist: "Hean Prinsloo",
					duration: 1 * 3600 + 5 * 60,
					position: 1 * 3600 + 5 * 60,
					type: "audio"
				},

				{
					id: 3,
					category: "Podcast",
					title: "Lorem Cambell -Feat Lorem Mena",
					thumbnail: "/images/resume_themes/theme1003/media/2.png",
					artist: "Hean Prinsloo",
					duration: 1 * 3600 + 5 * 60,
					position: 3600,
					type: "audio"
				},
				{
					id: 4,
					category: "Podcast",
					title: "Lorem Cambell -Feat Lorem Mena",
					thumbnail: "/images/resume_themes/theme1003/media/2.png",
					artist: "Hean Prinsloo",
					duration: 1 * 3600 + 5 * 60,
					position: 3600,
					type: "audio"
				},
				{
					id: 5,
					category: "Podcast",
					title: "Lorem Cambell -Feat Lorem Mena",
					thumbnail: "/images/resume_themes/theme1003/media/1.png",
					artist: "Hean Prinsloo",
					duration: 1 * 3600 + 5 * 60,
					position: 3600,
					type: "audio"
				},
				{
					id: 6,
					category: "Podcast",
					title: "Lorem Cambell -Feat Lorem Mena",
					thumbnail: "/images/resume_themes/theme1003/media/1.png",
					artist: "Hean Prinsloo",
					duration: 1 * 3600 + 5 * 60,
					position: 3600,
					type: "audio"
				},
				{
					id: 7,
					category: "Podcast",
					thumbnail: "/images/resume_themes/theme1003/media/2.png",
					duration: 1 * 3600 + 5 * 60,
					position: 3600,
					type: "video"
				},
				{
					id: 8,
					category: "Podcast",
					title: "Lorem Cambell -Feat Lorem Mena",
					thumbnail: "/images/resume_themes/theme1003/media/1.png",
					artist: "Hean Prinsloo",
					duration: 1 * 3600 + 5 * 60,
					position: 3600,
					type: "audio"
				}
			],
			player: {
				media_id: 2,
				isPlaying: true
			}
		};
	},

	computed: {
		activeMedia() {
			return this.media.find(item => item.id === this.player.media_id);
		}
	},

	methods: {
		onPlay(id) {
			let track = this.media.find(item => item.id === id);
			this.player.media_id = track.id;
			this.player.isPlaying = true;
		},

		onPause() {
			this.player.isPlaying = false;
		},

		isPlaying(id) {
			return id === this.player.media_id && this.player.isPlaying;
		}
	}
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

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
