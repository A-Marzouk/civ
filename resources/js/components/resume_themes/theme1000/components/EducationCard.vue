<template>
	<div class="tw-flex tw-justify-between education-card tw-rounded-10px tw-px-25px tw-pb-25px tw-pt-4">
		<div>
			<h4 class="tw-font-bold tw-leading-21px tw-text-black tw-text-lg" v-text="education.title"></h4>
			<div class="tw-font-medium tw-leading-21px tw-text-black tw-text-lg tw-pt-10px" v-text="education.school"></div>
			<p class="tw-leading-tight tw-text-xs tw-text-black tw-pt-10px" v-html="education.detail"></p>
			<div class="tw-leading-tight tw-text-black tw-opacity-50 tw-pt-5" v-text="education.duration"></div>
		</div>
		<div>
			<div class="tw-flex tw-items-center tw-justify-center tw-w-60px tw-h-60px icon-outer">
				<svg width="28" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill="#fff" d="M14 .75L.25 8.25l5 2.725v7.5L14 23.25l8.75-4.775v-7.5l2.5-1.362v8.637h2.5v-10L14 .75zm8.525 7.5L14 12.9 5.475 8.25 14 3.6l8.525 4.65zm-2.275 8.738L14 20.4l-6.25-3.412v-4.65L14 15.75l6.25-3.412v4.65z" />
				</svg>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "education-card",

	props: {
		education: {
			type: Object,
			required: true
		}
	}
};
</script>

<style lang="scss" scoped>
.education-card {
	background: #eeeff1;
}

.icon-outer {
	background: #ffb400;
	border-radius: 9px;
}
</style>
