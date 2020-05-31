<template>
	<a :href="slug" class="item-view" :style="`background-image: url(${thumbnail}); height: ${height}px;`" @resize="onResize">
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
		height() {
			const ratio = this.ratio.split(":").reduce((a, b) => {
				return a / b;
			});

			return this.width / ratio;
		}
	},

	methods: {
		onResize() {
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
	padding-top: 27%;
	align-items: center;
	border-radius: 5px;
	justify-content: center;
	background-size: 35px 35px;
	background-color: #e6edfc;
	background-repeat: no-repeat;
	background-position: center 35%;

	&:hover {
		text-decoration: none;
	}

	.item-meta {
		color: #205de5;

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
</style>
