<template>
	<div class="tw-px-4 tw-pt-16 tw-pb-12 md:tw-px-37px md:tw-grid md:tw-grid-cols-2 md:tw-gap-5 xxl:tw-grid-cols-4">
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
				},
				{
					id: 15,
					thumbnail: "/images/resume_themes/theme1000/media/9.png",
					duration: "15:00",
					type: "video"
				},
				{
					id: 16,
					thumbnail: "/images/resume_themes/theme1000/media/9.png",
					duration: "15:00",
					type: "video"
				},
				{
					id: 17,
					title: "AUDIO_04/08/2020",
					thumbnail: "/images/resume_themes/theme1000/media/1.png",
					artist: "Hean Prinsloo",
					duration: "1:05:00",
					type: "audio"
				},
				{
					id: 18,
					title: "AUDIO_04/08/2020",
					thumbnail: "/images/resume_themes/theme1000/media/1.png",
					artist: "Hean Prinsloo",
					duration: "1:05:00",
					type: "audio"
				},
				{
					id: 19,
					title: "AUDIO_04/08/2020",
					thumbnail: "/images/resume_themes/theme1000/media/1.png",
					artist: "Hean Prinsloo",
					duration: "1:05:00",
					type: "audio"
				},
				{
					id: 20,
					title: "AUDIO_04/08/2020",
					thumbnail: "/images/resume_themes/theme1000/media/1.png",
					artist: "Hean Prinsloo",
					duration: "1:05:00",
					type: "audio"
				},
				{
					id: 21,
					title: "AUDIO_04/08/2020",
					thumbnail: "/images/resume_themes/theme1000/media/1.png",
					artist: "Hean Prinsloo",
					duration: "1:05:00",
					type: "audio"
				}
			],
			gridAreaValues: [],
			desktopGridAreaValues: [],
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

				if (this.windowWidth >= 1920) {
					let [
						startRow,
						startColumn,
						endRow,
						endColumn
					] = this.desktopGridAreaValues[index];

					return `grid-area: ${startRow} / ${startColumn} / ${endRow} / ${endColumn};`;
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
			let startRow = 1,
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
		},
		initDesktopGridAreas() {
			const startRowIndex = 0,
				endRowIndex = 2,
				startColumnIndex = 1,
				endColumnIndex = 3;

			let startRow = 1,
				endRow = 2,
				startColumn = 1,
				endColumn = 2;

			// get simaple grids for 4 columns
			let simpleGridAreas = this.media.map((item, index) => {
				if (index === 0)
					return [startRow, startColumn, endRow, endColumn];

				startColumn++;
				endColumn++;

				if (startColumn === 5 && endColumn === 6) {
					startColumn = 1;
					endColumn = 2;

					startRow++;
					endRow++;
				}

				return [startRow, startColumn, endRow, endColumn];
			});

			// Give video items twice height of audio items
			let desktopGridAreaValues = [];
			simpleGridAreas.forEach((el, index) => {
				let row = [...simpleGridAreas][index];

				if (index === 0) {
					desktopGridAreaValues.push(row);
					return;
				}

				if (this.media[index].type === "video") row[endRowIndex]++;

				if (
					this.media[index - 1].type === "video" &&
					this.media[index].type !== "video"
				)
					row[endRowIndex]--;

				desktopGridAreaValues.push(row);
			});

			// Finally Give element the correct position
			[...desktopGridAreaValues].forEach((el, index) => {
				if (this.media[index].type === "video") {
					for (
						let i = index;
						i < [...desktopGridAreaValues].length;
						i++
					) {
						if (i - index === 4) {
							for (
								let j = i;
								j < [...desktopGridAreaValues].length;
								j += 4
							) {
								desktopGridAreaValues[j][startRowIndex]++;
								desktopGridAreaValues[j][endRowIndex]++;
							}
						}
					}
				}
			});

			// Make sure last 4 items aligned correctly
			let lastLineItems = [...desktopGridAreaValues]
				.slice(desktopGridAreaValues.length - 4)
				.filter(
					el =>
						el[0] ===
						desktopGridAreaValues[
							desktopGridAreaValues.length - 1
						][0]
				);

			startColumn = 1;
			endColumn = 2;

			for (
				let index = desktopGridAreaValues.length - lastLineItems.length,
					i = 0;
				index < desktopGridAreaValues.length;
				index++, i++
			) {
				desktopGridAreaValues[index][startColumnIndex] = startColumn;
				desktopGridAreaValues[index][endColumnIndex] = endColumn;

				startColumn++;
				endColumn++;
			}

			/*  if(lastLineItems.length<4) {
            } */

			// console.log(lastLineItems);

			this.desktopGridAreaValues = desktopGridAreaValues;
		}
	},

	mounted() {
		this.initGridAreas();
		this.initDesktopGridAreas();
		window.onresize = e => (this.windowWidth = e.target.innerWidth);
	}
};
</script>

<style lang="scss" scoped>
</style>
