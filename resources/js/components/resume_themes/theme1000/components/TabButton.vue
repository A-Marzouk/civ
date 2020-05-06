<template>
	<div @click="$emit('click')" class="tab-button" :class="{'active': isActive}">
		<div class="tab-button__icon">
			<slot></slot>
		</div>
		<div class="tab-button__label">
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
@import "./../scss/variables";

.tab-button {
	flex: 1;
	color: #ffffff;
	height: 45px;
	display: flex;
	min-width: 40px;
	padding-top: 5px;
	align-items: center;
	font-family: $poppins;
	border-radius: 5px 5px 0px 0px;
	justify-content: center;

	&.sm--hidden {
		display: none;
	}

	.tab-button__icon {
		display: inline-block;

		svg {
			fill: currentColor;
			width: 100%;
			max-width: 22px;
		}
	}

	.tab-button__label {
		display: none;
		font-size: 12px;
		font-weight: 500;
		padding-left: 10px;
	}

	&.active {
		flex: none;
		flex-grow: 1;
		color: #0470dc;
		background: #fafafa;

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

@media (min-width: $md) {
	.tab-button {
		height: 60px;
	}
}

@media (min-width: $lg) {
	.tab-button {
		max-width: 280px;

		.tab-button__label {
			display: block;
			font-size: 16px;
		}
	}
}

@media (min-width: $xl) {
	.tab-button__label {
		font-size: 20px;
	}
}
</style>
