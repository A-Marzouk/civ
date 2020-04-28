<template>
	<div @click="$emit('click')" class="tab-button tw-flex tw-items-center tw-transition-colors tw-duration-100 tw-px-10px tw-pt-3 tw-pb-2 tw-rounded-t-md tw-cursor-pointer screen425px:tw-px-28px screen425px:tw-py-15px screen1024px:tw-py-25px screen1920px:tw-px-56px" :class="{
            'tw-bg-white tw-text-blue-600': isActive,
            'tw-text-white': !isActive
        }">
		<slot></slot>
		<div class="tw-text-xs tw-pl-10px tw-font-poppins tw-font-medium screen425px:tw-text-base screen425px:tw-leading-24px screen1920px:tw-text-xl screen1920px:tw-leading-30px" :class="{'tw-block': isActive, 'tw-hidden screen1920px:tw-block': !isActive}">
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

	&:hover {
		color: #2b6cb0;
	}
}

.tab-button:hover {
	color: #2b6cb0;
}
</style>
