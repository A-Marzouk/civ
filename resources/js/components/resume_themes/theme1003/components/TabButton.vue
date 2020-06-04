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
	transition: all 0.3s;
	padding: 12.5px 25px 12.5px;

	&.sm--hidden {
		display: none;
	}

	.tab-button__icon {
		display: inline-block;

		svg {
			fill: currentColor;
			width: 22px;
		}
	}

	.tab-button__label {
		display: none;
		font-size: 12px;
		font-weight: 500;
		user-select: none;
		padding-left: 10px;
		font-family: inherit;
	}

	&:hover {
		color: #df136c;
	}

	&.active {
		color: #ffffff;
		background: #df136c;

		.tab-button__label {
			display: block;
		}
	}
}

@media (min-width: $sm) {
	.tab-button {
		&.sm--hidden {
			display: flex;
		}
	}
}

@media (min-width: $lg) {
	.tab-button {
		.tab-button__label {
			display: block;
			font-size: 16px;
		}
	}
}

@media (min-width: $xl) {
	.tab-button {
		.tab-button__label {
			font-size: 20px;
			line-height: 30px;
		}
	}
}
</style>
