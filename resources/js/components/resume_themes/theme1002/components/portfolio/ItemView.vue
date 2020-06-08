<template>
	<div class="item-view" :style="`background-image: url(${thumbnail})`">
		<div class="item-meta">
			<h3 class="item-meta__title" v-text="title"></h3>
			<p class="item-meta__subtitle" v-text="subTitle"></p>
		</div>
	</div>
</template>

<script>
export default {
	name: "ItemView",

	props: {
		thumbnail: {
			type: String,
			default: "default.png"
		},

		title: {
			type: String,
			required: true
		},

		subTitle: {
			type: String,
			default: ""
		}
	}
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.item-view {
	display: flex;
	align-items: flex-end;
	width: 249px;
	height: 232px;
	margin-left: auto;
	margin-right: auto;
	border-radius: 5px;
	background-size: cover;
	background-color: #e6edfc;
	background-repeat: no-repeat;
	background-position: center;
	transition: width, height 0.3s;

	&:focus {
		border: 1px solid #205de5;
	}

	.item-meta {
		color: #205de5;
		width: 100%;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		font-family: $montserrat;
		height: 152px;

		.item-meta__title {
			font-size: 21px;
			font-weight: 700;
			line-height: 25px;
		}

		.item-meta__subtitle {
			margin-top: 3px;
			font-size: 15px;
			font-weight: 500;
			line-height: 20px;
		}
	}
}

@media (min-width: $sm) {
	.item-view {
		width: 296px;
		height: 276px;
	}
}

@media (min-width: $md) {
	.item-view {
		width: 301px;
		height: 310px;

		.item-meta {
			height: 212px;

			.item-meta__title {
				font-size: 24px;
				line-height: 29px;
			}

			.item-meta__subtitle {
				margin-top: 8px;
				font-size: 18px;
				line-height: 21px;
			}
		}
	}
}

@media (min-width: 992px) {
	.item-view {
		width: 340px;
		height: 317px;
	}
}

@media (min-width: $lg) {
	.item-view {
		width: 385px;
		height: 352px;

		.item-meta {
			.item-meta__title {
				font-size: 20px;
			}

			.item-meta__subtitle {
				font-size: 14px;
			}
		}
	}
}

@media (min-width: $xl) {
	.item-view {
		width: 615px;
		height: 562px;

		.item-meta {
			height: 225px;

			.item-meta__title {
				font-size: 32px;
				line-height: 58px;
			}

			.item-meta__subtitle {
				font-size: 21px;
				line-height: 27px;
			}
		}
	}
}

@media (min-width: $xxl) {
	.item-view {
		width: 735px;
		height: 673px;

		.item-meta {
			height: 290px;

			.item-meta__title {
				font-size: 32px;
				line-height: 58px;
			}

			.item-meta__subtitle {
				margin-top: 40px;
				font-size: 21px;
				line-height: 27px;
			}
		}
	}
}
</style>
