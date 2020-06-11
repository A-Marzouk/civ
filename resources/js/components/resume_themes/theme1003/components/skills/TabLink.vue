<template>
	<div class="tab-link" :class="{'active': isActive}" @click="$emit('click', tab.name)">
		{{ tab.label }}
	</div>
</template>

<script>
export default {
	name: "tab-link",

	props: {
		tab: {
			type: Object,
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
	position: relative;
	color: #000000;
	cursor: pointer;
	margin-right: 20px;
	padding-bottom: 5px;
	font-size: 10px;
	font-family: $poppins;
	line-height: 15px;
	white-space: nowrap;

	&::after {
		content: "";
		display: block;
		width: 58%;
		height: 1px;
		position: absolute;
		background: transparent;
		bottom: 0;
		left: 50%;
		transform: translateX(-50%);
		border-radius: 100px;
	}

	&.active {
		font-weight: 700;

		&::after {
			background: #000000;
		}
	}

	@include md {
		font-size: 16px;
		line-height: 24px;
		margin-right: 30px;
		padding-bottom: 3px;

		&::after {
			height: 2px;
			left: 0;
			transform: translateX(0);
		}

		&.active {
			font-weight: 400;
		}
	}

	@include lg {
	}

	@include xl {
		font-size: 28px;
		line-height: 43px;
		margin-right: 74px;
		padding-bottom: 10px;

		&::after {
			width: 45%;
			height: 5px;
		}
	}
}
</style>
