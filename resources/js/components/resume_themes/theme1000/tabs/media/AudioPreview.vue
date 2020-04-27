<template>
	<div class="tw-flex tw-items-center bg-card tw-rounded-9px tw-px-30px tw-pt-8 tw-pb-30px xxl:tw-py-35px">
		<img class="tw-rounded-9px tw-h-78px tw-w-78px" :src="media.thumbnail">
		<div class="tw-pl-20px">
			<h4 class="tw-font-poppins tw-font-bold tw-leading-21px tw-text-black tw-text-lg" v-text="media.title"></h4>
			<div class="tw-font-poppins tw-leading-21px text-semi-black tw-text-xs tw-pt-5px" v-text="media.artist"></div>
			<div class="tw-font-poppins tw-leading-18px tw-text-black tw-text-xs tw-pt-5px" v-text="media.duration"></div>
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
.bg-card {
	background: #eeeff1;
}
.tw-rounded-9px {
	border-radius: 9px;
}
.text-semi-black {
	color: rgba(0, 0, 0, 0.55);
}
</style>
