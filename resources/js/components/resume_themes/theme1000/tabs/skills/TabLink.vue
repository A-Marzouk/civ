<template>
	<div class="tw-font-poppins tw-text-sm tw-leading-21px tw-whitespace-no-wrap tw-mr-5 tw-border-b tab-link" :class="{'tw-border-black': isActive, ' tw-border-white': !isActive}">
		{{ label }}
	</div>
</template>

<script>
export default {
	name: "tab-link",

	props: {
		label: {
			type: String,
			required: true
		},
		isActive: {
			type: Boolean,
			default: false
		}
	}
};
</script>

<style lang="scss" scoped>
.tab-link {
	color: #333333;
	padding: 5px 0;
}
</style>
