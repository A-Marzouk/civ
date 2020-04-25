<template>
	<div @click="$emit('click')" class="tw-flex tw-items-center tw-transition-colors tw-duration-100 tw-px-10px tw-pt-3 tw-pb-2 tw-rounded-t-md hover:tw-text-blue-500 tw-cursor-pointer md:tw-px-28px md:tw-py-15px xxl:tw-py-25px xxl:tw-px-56px" :class="{
            'tw-bg-white tw-text-blue-600': isActive,
            'tw-text-white': !isActive
        }">
		<slot></slot>
		<div class="tw-text-xs tw-pl-10px tw-font-poppins tw-font-medium md:tw-text-base md:tw-leading-24px xxl:tw-text-xl xxl:tw-leading-30px" :class="{'tw-block': isActive, 'tw-hidden xxl:tw-block': !isActive}">
			{{ label }}
		</div>
	</div>
</template>

<script>
export default {
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
.tw-text-blue-600 {
	color: #0470dc;
}
</style>
