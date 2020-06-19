<template>
	<div class="d-inline-flex tw-align-middle">
		<v-btn elevation="0" fab :width="30" :height="30" class="mr-5" color="#EBEBEB">
			<v-img src="/images/resume_themes/theme700/video.svg" contain :width="12" :height="12"></v-img>
		</v-btn>
		<v-dialog v-model="dialog" persistent max-width="850" overlay-opacity="0.5" overlay-color="#202124">
			<v-card>
				<v-card-actions>
					<v-icon class="close-icon" @click="close">mdi-close</v-icon>
				</v-card-actions>
				<div>
					Video Modal
				</div>
			</v-card>
		</v-dialog>
	</div>
</template>

<script>
export default {
	name: "video-modal",

	data() {
		return {
			dialog: false
		};
	},

	methods: {
		close() {
			this.dialog = false;
		},

		pause() {
			console.log("pause");
		}
	}
};
</script>

<style lang="scss" scoped>
</style>
