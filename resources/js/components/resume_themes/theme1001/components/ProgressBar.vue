<template>
	<div class="progress-bar">
		<div class="progress" :style="{width:  progress+'%'}"></div>
	</div>
</template>

<script>
export default {
	name: "progress-bar",

	props: {
		progress: {
			type: Number,
			required: true
		}
	}
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

.progress-bar {
	position: relative;
	background: #d3d6e4;
	height: 4px;
	width: 100%;
	border-radius: 100px;

	.progress {
		background: #0053b9;
		position: absolute;
		left: 0;
		top: 0;
		height: 4px;
		border-radius: 100px;
	}
}

@media (min-width: 1600px) {
	.progress-bar {
		.progress {
			height: 6px;
		}
	}
}
</style>
