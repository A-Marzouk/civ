<template>
	<div class="about-me tw-text-black tw-mx-auto tw-px-4 tw-pb-12">
		<div class="about-me__body tw-font-poppins tw-leading-4 tw-text-justify tw-text-xs tw-pt-10px">
			Donec a augue gravida, vulputate ligula et, pellentesque arcu. Morbi feugiat eros nec sem ultrices, et venenatis velit posuere. Donec bibendum commodo dui, eget sollicitudin urna sagittis non. Donec ac commodo tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris gravida laoreet lacus, non hendrerit elit suscipit a. Nunc ut ultricies massa, eu sollicitudin enim. Praesent quis ultrices nibh. Donec bibendum elit sed erat convallis, at feugiat arcu mollis. Nunc quam eros, venenatis id tristique malesuada, ornare eu augue. Aliquam volutpat eros id libero posuere vestibulum.
		</div>
	</div>
</template>

<script>
export default {
	name: "about-me"
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

@media (min-width: $sm) {
	.about-me {
		max-width: 56rem;
		padding-left: 37px;
		padding-right: 37px;
	}

	.about-me__body {
		line-height: 1.75rem;
		font-size: 1.125rem;
		padding-top: 15px;
	}
}

@media (min-width: $lg) {
	.about-me {
		max-width: 64rem;
	}
}
</style>
