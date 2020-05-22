<template>
	<div class="item-view">
		<div class="item-view__icon">
			<slot />
		</div>
		<div class="item-view-content">
			<div class="content-header">
				<div class="header__title" v-text="item.title"></div>
				<div class="header__duration" v-if="duration" v-text="duration"></div>
			</div>
			<div class="content-body">
				<div class="sub-item" v-for="(subItem, i) in item.subItems" :key="i">
					<div class="sub-item-header">
						<div class="sub-item__title" :class="{'sub-item__title--has-point': item.subItems.length>1}" v-text="subItem.title"></div>
						<div class="sub-item__type" v-if="subItem.type" v-text="subItem.type"></div>
					</div>
					<div class="sub-item-detail" v-text="subItem.detail"></div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "item-view",

	props: {
		item: {
			type: Object,
			required: true
		}
	},

	computed: {
		duration() {
			if (!this.item.duration) return undefined;

			return `${this.item.duration.from} - ${this.item.duration.to}`;
		}
	}
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.item-view {
	position: relative;
	padding-left: 66px;
	font-family: $muli;
	max-width: 277px;
	margin: 0 auto;

	.item-view__icon {
		position: absolute;
		left: 0;
		top: 0;

		&::before {
			content: "";
			position: absolute;
			top: 50%;
			left: 34px;
			height: 1px;
			width: 25px;
			transform: translateY(50%);
			background: #bec2d4;
		}

		svg {
			height: 24px;
			width: 24px;
		}
	}

	.item-view-content {
		.content-header {
			display: flex;
			align-items: center;
			padding-top: 5px;

			.header__title {
				position: relative;
				color: #172c7a;
				font-weight: 700;
				font-size: 13px;
				line-height: 12px;
			}

			.header__duration {
				font-size: 9.3px;
				line-height: 11px;
				color: #838ba4;
				padding-left: 7px;
			}
		}

		.content-body {
			.sub-item {
				padding-top: 17px;

				.sub-item-header {
					display: flex;
					justify-content: space-between;
					align-items: center;

					.sub-item__title {
						color: #172c7a;
						font-family: $poppins;
						font-size: 11px;
						line-height: 13px;

						&.sub-item__title--has-point {
							position: relative;

							&::before {
								content: "";
								background: #172c7a;
								height: 4px;
								width: 4px;
								border-radius: 100px;
								position: absolute;
								left: -10px;
								top: 5.5px;
							}
						}
					}

					.sub-item__type {
						display: flex;
						align-items: center;
						justify-content: center;
						background: rgba(248, 171, 8, 0.25);
						color: #f8ab08;
						font-size: 6.66px;
						font-weight: 300;
						width: 34px;
						height: 13px;
						border-radius: 34px;
					}
				}

				.sub-item-detail {
					font-size: 9px;
					font-weight: 300;
					color: #838ba4;
					line-height: 14px;
					padding-top: 7px;
				}
			}
		}
	}
}

@media (min-width: $sm) {
	.item-view {
		max-width: 375px;

		.item-view-content {
			.content-header {
				.header__title {
					font-size: 15px;
					line-height: 16px;
				}

				.header__duration {
					font-size: 10px;
					line-height: 10px;
					padding-left: 10px;
				}
			}

			.content-body {
				.sub-item {
					padding-top: 20px;

					.sub-item-header {
						.sub-item__type {
							font-size: 8px;
							width: 45px;
							height: 15px;
						}
					}

					.sub-item-detail {
						font-size: 13px;
						line-height: 19px;
					}
				}
			}
		}
	}
}

@media (min-width: $md) {
	.item-view {
		max-width: 277px;
		margin-left: initial;

		.item-view-content {
			.content-header {
				.header__title {
					font-size: 13px;
					line-height: 12px;
				}

				.header__duration {
					font-size: 9.3px;
					line-height: 11px;
					padding-left: 7px;
				}
			}

			.content-body {
				.sub-item {
					padding-top: 17px;

					.sub-item-header {
						.sub-item__type {
							font-size: 6.66px;
							width: 34px;
							height: 13px;
						}
					}

					.sub-item-detail {
						font-size: 9px;
						line-height: 14px;
					}
				}
			}
		}
	}
}

@media (min-width: 1600px) {
	.item-view {
		max-width: 524px;
		padding-left: 125px;

		.item-view__icon {
			&::before {
				width: 48px;
				left: 60px;
			}

			svg {
				height: 44px;
				width: 44px;
			}
		}

		.item-view-content {
			.content-header {
				.header__title {
					font-size: 24px;
					line-height: 24px;
				}

				.header__duration {
					font-size: 20px;
					line-height: 24px;
					padding-left: 10px;
				}
			}

			.content-body {
				.sub-item {
					padding-top: 30px;

					.sub-item-header {
						.sub-item__title {
							font-size: 17px;
							line-height: 24px;

							&.sub-item__title--has-point {
								&::before {
									height: 7px;
									width: 7px;
									left: -20px;
									top: 10.25px;
								}
							}
						}

						.sub-item__type {
							font-size: 11px;
							width: 65px;
							height: 24px;
						}
					}

					.sub-item-detail {
						font-size: 17px;
						line-height: 27px;
					}
				}
			}
		}
	}
}
</style>
