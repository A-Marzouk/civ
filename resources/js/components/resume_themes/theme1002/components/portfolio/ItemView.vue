<template>
	<a :href="slug" class="item-view" :style="style" @resize="onResize">
		<div class="item-meta">
			<h3 class="item-meta__title" v-text="title"></h3>
			<p class="item-meta__subtitle" v-text="subTitle"></p>
		</div>
	</a>
</template>

<script>
export default {
	name: "item-view",

	props: {
		thumbnail: {
			type: String,
			default: "default.png"
		},

		slug: {
			type: String,
			default: "#"
		},

		title: {
			type: String,
			required: true
		},

		subTitle: {
			type: String,
			default: ""
		},

		ratio: {
			type: String,
			default: "249:232"
		}
	},

	data() {
		return {
			width: null
		};
	},

	computed: {
		style() {
			return `background-image: url(${this.thumbnail}); height: ${this.height}px;`;
		},

		height() {
			const ratio = this.ratio.split(":").reduce((a, b) => {
				return a / b;
			});

			return this.width / ratio;
		}
	},

	methods: {
		onResize() {
			console.log("onResize");

			this.width = this.$el.offsetWidth;
		}
	},

	mounted() {
		this.onResize();
		window.addEventListener("resize", this.onResize);
	},

	beforeDestroy() {
		window.removeEventListener("resize", this.onResize);
	}
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.item-view {
	display: flex;
	text-align: center;
	font-family: $montserrat;
	align-items: flex-end;
	border-radius: 5px;
	justify-content: center;
	background-size: 35px 35px;
	background-color: #e6edfc;
	background-repeat: no-repeat;
	background-position: center 35%;

	&:hover {
		text-decoration: none;
	}

	&:focus {
		outline: none;
		border: 1px solid #205de5;
	}

	.item-meta {
		color: #205de5;
		margin-bottom: 22%;

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

@media (min-width: $md) {
	.item-view {
		background-size: 42px;

		.item-meta {
			margin-bottom: 22%;

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

@media (min-width: $xl) {
	.item-view {
		background-size: 100px;

		.item-meta {
			margin-bottom: 16%;

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
