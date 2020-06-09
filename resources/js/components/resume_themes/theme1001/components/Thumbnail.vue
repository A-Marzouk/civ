<template>
	<img :src="src" :style="`height: ${height}px;`" @resize="onResize">
</template>

<script>
export default {
	name: "thumbnail",

	props: {
		src: {
			type: String,
			required: true
		},

		ratio: {
			type: String,
			default: "325:208"
		}
	},

	data: () => {
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
		window.removeEventListener("resize");
	}
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

img {
	width: 100%;
	border: 1px solid #e3e2ea;
	object-fit: cover;
}
</style>
