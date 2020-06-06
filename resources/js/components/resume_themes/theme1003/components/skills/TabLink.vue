<template>
	<div class="tab-link tw-font-poppins tw-text-sm tw-whitespace-no-wrap tw-mr-5 tw-border-b tw-cursor-pointer" :class="{'tw-border-black': isActive, ' tw-border-white': !isActive}" @click="$emit('click', label)">
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
@import "./../../scss/variables";

.tab-link {
	color: #333333;
	padding: 10px 1px 5px;
	line-height: 21px;
}

@media (min-width: $lg) {
	.tab-link {
		font-size: 18px;
		line-height: 26px;
	}
}

@media (min-width: 1600px) {
	.tab-link {
		font-size: 26px;
		line-height: 37px;
		margin-right: 70px;
	}
}
</style>
