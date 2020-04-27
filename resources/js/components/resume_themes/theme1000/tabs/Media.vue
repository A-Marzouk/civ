<template>
	<div class="tw-px-4 tw-pt-16 tw-pb-12 tw-max-w-sm tw-mx-auto md:tw-max-w-none md:tw-px-37px">
		<div v-masonry transition-duration="0.3s" item-selector=".item" :origin-top="true">
			<div v-masonry-tile class="tw-p-10px tw-w-full md:tw-w-1/2 xxl:tw-w-1/4 item" v-for="item in media" :key="item.id">
				<AudioPreview v-if="item.type == 'audio'" :media="item" />
				<VideoPreview v-else-if="item.type == 'video'" :media="item" />
			</div>
		</div>
	</div>
</template>

<script>
import AudioPreview from "./media/AudioPreview";
import VideoPreview from "./media/VideoPreview";

export default {
	name: "media",

	components: { AudioPreview, VideoPreview },

	data: () => {
		return {
			media: [
				{
					id: 1,
					title: "AUDIO_04/08/2020",
					thumbnail: "/images/resume_themes/theme1000/media/1.png",
					artist: "Hean Prinsloo",
					duration: "1:05:00",
					type: "audio"
				},
				{
					id: 2,
					thumbnail: "/images/resume_themes/theme1000/media/8.png",
					duration: "15:00",
					type: "video"
				},
				{
					id: 3,
					title: "AUDIO_04/08/2020",
					thumbnail: "/images/resume_themes/theme1000/media/4.png",
					artist: "Hean Prinsloo",
					duration: "1:05:00",
					type: "audio"
				},
				{
					id: 4,
					title: "AUDIO_04/08/2020",
					thumbnail: "/images/resume_themes/theme1000/media/7.png",
					artist: "Hean Prinsloo",
					duration: "1:05:00",
					type: "audio"
				},
				{
					id: 5,
					title: "AUDIO_04/08/2020",
					thumbnail: "/images/resume_themes/theme1000/media/2.png",
					artist: "Hean Prinsloo",
					duration: "1:05:00",
					type: "audio"
				},
				{
					id: 6,
					title: "AUDIO_04/09/2020",
					thumbnail: "/images/resume_themes/theme1000/media/5.png",
					artist: "Hean Prinsloo",
					duration: "1:05:00",
					type: "audio"
				},
				{
					id: 7,
					thumbnail: "/images/resume_themes/theme1000/media/9.png",
					duration: "15:00",
					type: "video"
				},
				{
					id: 8,
					title: "AUDIO_04/08/2020",
					thumbnail: "/images/resume_themes/theme1000/media/3.png",
					artist: "Hean Prinsloo",
					duration: "1:05:00",
					type: "audio"
				},
				{
					id: 9,
					title: "AUDIO_04/08/2020",
					thumbnail: "/images/resume_themes/theme1000/media/3.png",
					artist: "Hean Prinsloo",
					duration: "1:05:00",
					type: "audio"
				},
				{
					id: 10,
					title: "AUDIO_04/08/2020",
					thumbnail: "/images/resume_themes/theme1000/media/6.png",
					artist: "Hean Prinsloo",
					duration: "1:05:00",
					type: "audio"
				}
			]
		};
	}
};
</script>

<style lang="scss" scoped>
</style>
