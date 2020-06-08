<template>
	<div class="theme1002-progress-bar">
		<div class="bar-outline">
			<div class="bar" :style="{width:  level+'%'}"></div>
		</div>
		<strong class="progress-level">{{ level }}</strong>
	</div>
</template>

<script>
export default {
	name: "progress-bar",

	props: {
		level: {
			type: Number,
			default: 100
		}
	}
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

.theme1002-progress-bar {
	display: flex;
	align-items: center;

	.bar-outline {
		flex: 1;
		padding-left: 5px;
		padding-right: 5px;

		.bar {
			height: 6px;
			border-radius: 100px;
			background: #205de5;
		}
	}
	.progress-level {
		font-family: $poppins;
		font-size: 20px;
		line-height: 28px;
		color: #205de5;
	}
}

@media (min-width: $xl) {
	.theme1002-progress-bar {
		.bar-outline {
			padding-left: 10px;
			padding-right: 10px;

			.bar {
				height: 8px;
			}
		}

		.progress-level {
			font-size: 42px;
			line-height: 60px;
		}
	}
}
</style>
