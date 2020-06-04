<template>
	<div class="tw-flex-1 tw-text-center">
		<div class="tab-button tw-cursor-pointer" :class="{'active': isActive}" @click="$emit('click')">
			<div class="tab-button__icon">
				<slot></slot>
			</div>
			<div class="tab-button__label">
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
@import "./../scss/variables";

.tab-button {
	color: #b3b3b3;
	display: inline-flex;
	align-items: center;
	font-family: $poppins;
	justify-content: center;
	height: 34px;
	width: 34px;

	&:hover {
		color: #df136c;
	}

	&.active {
		width: auto;
		padding-left: 10px;
		padding-right: 10px;
		background: #df136c;
		color: #ffffff;

		.tab-button__label {
			display: block;
		}
	}

	.tab-button__icon {
		display: inline-block;

		svg {
			fill: currentColor;
			width: 14px;
		}
	}

	.tab-button__label {
		display: none;
		font-family: inherit;
		font-size: 12px;
		font-weight: 500;
		line-height: 18px;
		padding-left: 10px;
		user-select: none;
		white-space: nowrap;
	}

	@include sm {
		height: 40px;
		width: 40px;

		&.active {
			padding-left: 20px;
			padding-right: 20px;
		}
	}

	@include md {
		&.active {
			padding-left: 28px;
			padding-right: 28px;
		}
	}

	@include lg {
		transition: background-color 0.3s;

		.tab-button__label {
			display: block;
			font-size: 16px;
		}
	}

	@include xl {
		.tab-button__label {
			font-size: 20px;
			line-height: 30px;
		}
	}
}
</style>
