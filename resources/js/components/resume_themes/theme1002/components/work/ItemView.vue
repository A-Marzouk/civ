<template>
	<div class="item-view">
		<h3 class="item-view__title" v-text="title"></h3>
		<p class="item-view__description" v-text="description"></p>
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

		description: {
			type: String,
			required: true
		}
	}
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.item-view {
	width: 100%;
	max-width: 302.5px;
	font-family: $montserrat;
	color: #205de5;

	.item-view__title {
		position: relative;
		text-transform: uppercase;
		padding-left: 20px;
		font-family: $nexa-bold;
		font-size: 20px;
		font-weight: 700;
		line-height: 27px;

		&::before {
			content: "";
			position: absolute;
			left: 0;
			bottom: 0;
			margin-bottom: 7px;
			display: block;
			height: 14px;
			width: 14px;
			border: 1px solid;
			border-radius: 100px;
		}
	}

	.item-view__description {
		font-size: 10px;
		line-height: 19px;
	}
}

@media (min-width: $md) {
	.item-view {
		max-width: 580px;

		.item-view__title {
			padding-left: 24px;
			font-size: 32px;
			line-height: 42px;

			&::before {
				margin-bottom: 12px;
				height: 18px;
				width: 18px;
			}
		}

		.item-view__description {
			font-size: 14px;
			line-height: 20px;
			padding-left: 24px;
		}
	}
}

@media (min-width: $lg) {
	.item-view {
		max-width: unset;

		.item-view__title {
			padding-left: 34px;
			margin-bottom: 15px;

			&::before {
				margin-bottom: 10px;
				height: 24px;
				width: 24px;
			}
		}

		.item-view__description {
		}
	}
}

@media (min-width: $xl) {
	.item-view {
		position: relative;
		padding-bottom: 50px;

		&::after {
			content: "";
			border-top: 1px solid #205de5;
			position: absolute;
			bottom: 0;
			right: 50%;
			width: 77%;
			transform: translateX(55%);
		}

		.item-view__title {
			padding-left: 36px;

			&::before {
				margin-bottom: 9px;
				height: 26px;
				width: 26px;
			}
		}

		.item-view__description {
			padding-left: 26px;
			font-size: 18px;
			line-height: 26px;
		}
	}
}

@media (min-width: $xxl) {
	.item-view {
		&::after {
			width: 83%;
			transform: translateX(61%);
		}

		.item-view__title {
			font-size: 42px;
			line-height: 56px;
			padding-left: 40px;

			&::before {
				height: 30px;
				width: 30px;
				margin-bottom: 14px;
			}
		}

		.item-view__description {
			padding-left: 32px;
			font-size: 20px;
			line-height: 30px;
		}
	}
}
</style>
