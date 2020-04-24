<template>
	<div class="tw-flex tw-items-center tw-justify-center tw-rounded-9px tw-p-28px tw-relative" :style="`background: url(${media.thumbnail}) center/cover no-repeat ; height: ${getHeight}px;`">
		<div class="bg-violet tw-flex tw-items-center tw-justify-center tw-w-16 tw-h-16 tw-rounded-full">
			<svg width="17" height="19" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill="#fff" d="M16.5 8.634a1 1 0 010 1.732L2.25 18.593a1 1 0 01-1.5-.866V1.273a1 1 0 011.5-.866L16.5 8.634z" />
			</svg>
		</div>
		<div class="tw-absolute tw-bottom-0 tw-left-0 tw-pl-30px tw-pb-20px">
			<div class="tw-flex tw-items-center tw-justify-center tw-font-poppins tw-leading-18px tw-bg-black tw-text-white tw-text-xs tw-h-35px tw-w-75px" v-text="media.duration"></div>
		</div>
	</div>
</template>

<script>
export default {
	name: "video-preview",

	props: {
		media: {
			type: Object,
			required: true
		},
		aspectRatio: {
			type: String,
			default: "73:56"
		}
	},

	data: () => {
		return {
			width: 0
		};
	},

	computed: {
		calculatedAspectRatio() {
			return this.aspectRatio.split(":").reduce((a, b) => {
				return a / b;
			});
		},

		getHeight() {
			return this.width / this.calculatedAspectRatio;
		}
	},

	mounted() {
		this.width = this.$el.offsetWidth;
		console.log("width:", this.width);
		console.log("height:", this.getHeight);
		console.log("ratio:", this.calculatedAspectRatio);
	}
};
</script>

<style lang="scss" scoped>
.bg-violet {
	background: #3f38dd;
}
.tw-w-75px {
	width: 75px;
}
</style>
