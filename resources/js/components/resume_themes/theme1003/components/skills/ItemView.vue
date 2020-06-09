<template>
	<div class="item-view">
		<hr class="view-hr" />

		<h3 class="view-title" v-text="title"></h3>

		<div class="view-level">
			<strong v-text="`${level}%`"></strong>
		</div>

		<div class="view-progress">
			<div class="view-progress-bar" :style="`width: ${level}%;`"></div>
		</div>
	</div>
</template>

<script>
export default {
	name: "ItemView",

	props: {
		title: {
			type: String,
			required: true
		},

		level: {
			type: Number,
			required: true
		}
	}
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.item-view {
	display: flex;
	flex-direction: column;
	color: #000000;
	background: #f5f6f8;
	font-family: $roboto;
	padding: 20px 10px 30px;
	height: 260px;

	.view-hr {
		border-top-width: 10px;
		border-top-color: #df136c;
	}

	.view-title {
		padding-top: 17px;
		font-weight: 700;
		font-size: 18px;
		line-height: 21px;
	}

	.view-level {
		flex: 1;
		display: flex;
		align-items: center;
		justify-content: center;

		strong {
			font-weight: 700;
			font-size: 60px;
			line-height: 70px;
			color: #312050;
			opacity: 0.5;
		}
	}

	.view-progress {
		position: relative;
		background: #bfbfbf;
		height: 10px;

		.view-progress-bar {
			position: absolute;
			top: 0;
			right: 0;
			height: 100%;
			background: linear-gradient(90deg, #df136c 0%, #312050 98.16%);
		}
	}

	@include md {
		padding: 20px 20px 45px;

		.view-level {
			align-items: normal;
		}

		.view-progress {
			height: 20px;
		}
	}
}
</style>
