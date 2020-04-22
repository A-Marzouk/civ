<template>
	<div :class="{ 'tw-px-10px': isActive }">
		<div @click="$emit('click')" class="tw-flex tw-items-center tw-transition-colors tw-duration-100 tw-px-10px tw-pt-3 tw-pb-2 tw-rounded-t-md hover:tw-text-blue-500 tw-cursor-pointer" :class="{
            'tw-bg-white tw-text-blue-600': isActive,
            'tw-text-white': !isActive
        }">
			<slot></slot>
			<div v-if="isActive" class="tw-text-xs tw-pl-10px tw-font-poppins tw-font-medium">
				{{ label }}
			</div>
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
