<template>
	<div class="audio-player">
		<div class="controls tw-relative tw-flex tw-justify-center tw-items-center">
			<a href="#" class="tw-absolute tw-top-0 tw-right-0" @click.prevent>
				<svg class="tw-fill-current" xmlns="http://www.w3.org/2000/svg">
					<path d="M2 9H0v5h5v-2H2V9zM0 5h2V2h3V0H0v5zm12 7H9v2h5V9h-2v3zM9 0v2h3v3h2V0H9z" />
				</svg>
			</a>
			<a href="#" class="controls__button--previous" @click.prevent>
				<svg class="tw-fill-current" xmlns="http://www.w3.org/2000/svg">
					<path d="M9.262 13.738L3.537 8l5.725-5.737L7.5.5 0 8l7.5 7.5 1.762-1.762zM19.262 13.738L13.537 8l5.725-5.737L17.5.5 10 8l7.5 7.5 1.762-1.762z" />
				</svg>
			</a>
			<a href="#" class="controls__button--play" @click.prevent>
				<svg class="tw-fill-current" xmlns="http://www.w3.org/2000/svg">
					<path d="M.5 17.75h5V.25h-5v17.5zm10-17.5v17.5h5V.25h-5z" />
				</svg>
			</a>
			<a href="#" class="controls__button--next" @click.prevent>
				<svg xmlns="http://www.w3.org/2000/svg">
					<path d="M10.738 13.738L16.462 8l-5.724-5.737L12.5.5 20 8l-7.5 7.5-1.762-1.762zM.738 13.738L6.463 8 .738 2.263 2.5.5 10 8l-7.5 7.5-1.762-1.762z" />
				</svg>
			</a>
		</div>
		<div class="progress">
			<div class="progress__duration">

			</div>
			<div class="progress__bar">

			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "audio-player"
};
</script>

<style lang="scss" scoped>
</style>
