<template>
	<div class="tw-px-4 tw-pt-16 tw-pb-12 md:tw-px-37px md:tw-grid md:tw-grid-cols-2 md:tw-gap-5">
		<div class="tw-mb-5 md:tw-mb-0" v-for="(item, index) in media" :key="item.id" :style="getItemStyle(index)">
			<AudioPreview v-if="item.type == 'audio'" :media="item" />
			<VideoPreview v-else-if="item.type == 'video'" :media="item" />
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
					title: "AUDIO_04/08/2020",
					thumbnail: "/images/resume_themes/theme1000/media/2.png",
					artist: "Hean Prinsloo",
					duration: "1:05:00",
					type: "audio"
				},
				{
					id: 3,
					title: "AUDIO_04/09/2020",
					thumbnail: "/images/resume_themes/theme1000/media/3.png",
					artist: "Hean Prinsloo",
					duration: "1:05:00",
					type: "audio"
				},
				{
					id: 4,
					thumbnail: "/images/resume_themes/theme1000/media/8.png",
					duration: "15:00",
					type: "video"
				},
				{
					id: 5,
					title: "AUDIO_04/09/2020",
					thumbnail: "/images/resume_themes/theme1000/media/3.png",
					artist: "Hean Prinsloo",
					duration: "1:05:00",
					type: "audio"
				},
				{
					id: 6,
					title: "AUDIO_04/08/2020",
					thumbnail: "/images/resume_themes/theme1000/media/4.png",
					artist: "Hean Prinsloo",
					duration: "1:05:00",
					type: "audio"
				},
				{
					id: 7,
					title: "AUDIO_04/08/2020",
					thumbnail: "/images/resume_themes/theme1000/media/5.png",
					artist: "Hean Prinsloo",
					duration: "1:05:00",
					type: "audio"
				},
				{
					id: 8,
					title: "AUDIO_04/08/2020",
					thumbnail: "/images/resume_themes/theme1000/media/6.png",
					artist: "Hean Prinsloo",
					duration: "1:05:00",
					type: "audio"
				},
				{
					id: 9,
					title: "AUDIO_04/08/2020",
					thumbnail: "/images/resume_themes/theme1000/media/7.png",
					artist: "Hean Prinsloo",
					duration: "1:05:00",
					type: "audio"
				},
				{
					id: 10,
					thumbnail: "/images/resume_themes/theme1000/media/9.png",
					duration: "15:00",
					type: "video"
				},
				{
					id: 11,
					title: "AUDIO_04/08/2020",
					thumbnail: "/images/resume_themes/theme1000/media/1.png",
					artist: "Hean Prinsloo",
					duration: "1:05:00",
					type: "audio"
				},
				{
					id: 12,
					title: "AUDIO_04/08/2020",
					thumbnail: "/images/resume_themes/theme1000/media/1.png",
					artist: "Hean Prinsloo",
					duration: "1:05:00",
					type: "audio"
				},
				{
					id: 13,
					thumbnail: "/images/resume_themes/theme1000/media/9.png",
					duration: "15:00",
					type: "video"
				},
				{
					id: 14,
					title: "AUDIO_04/08/2020",
					thumbnail: "/images/resume_themes/theme1000/media/1.png",
					artist: "Hean Prinsloo",
					duration: "1:05:00",
					type: "audio"
				}
			],
			gridAreaValues: [],
			windowWidth: window.innerWidth
		};
	},

	computed: {
		getItemStyle() {
			return index => {
				if (this.gridAreaValues.length == 0) {
					return "";
				}

				if (this.windowWidth < 768) {
					return "";
				}

				let [
					startRow,
					startColumn,
					endRow,
					endColumn
				] = this.gridAreaValues[index];

				return `grid-area: ${startRow} / ${startColumn} / ${endRow} / ${endColumn};`;
			};
		}
	},

	methods: {
		initGridAreas() {
			let renderedAudioMedia = 0,
				renderedVideoMedia = 0,
				startRow = 1,
				endRow = 2,
				startColumn = 1,
				endColumn = 2;

			this.gridAreaValues = this.media.map((item, index) => {
				if (index === 0) {
					return [startRow, startColumn, endRow, endColumn];
				}

				// Left or Right
				if (index % 2 !== 0) {
					startColumn = 2;
					endColumn = 3;
				} else {
					startColumn = 1;
					endColumn = 2;
				}

				// Add new Row
				if (index % 2 === 0) {
					startRow++;
					endRow++;
				}

				if (item.type === "video") {
					endRow++;
				}

				if (this.media[index - 1].type === "video") {
					endRow--;
				}

				return [startRow, startColumn, endRow, endColumn];
			});
		}
	},

	mounted() {
		this.initGridAreas();
		window.onresize = e => (this.windowWidth = e.target.innerWidth);
	}
};
</script>

<style lang="scss" scoped>
</style>
