<template>
	<div id="header">
		<component :currentUser="currentUser" v-bind:is="currentHeader"></component>
	</div>
</template>

<script>
import SmallHeader from "./header/SmallHeader";
import LargeHeader from "./header/LargeHeader";

export default {
	name: "Header",

	components: { SmallHeader, LargeHeader },

	props: {
		currentUser: {
			type: Object,
			required: true
		}
	},

	data: () => {
		return {
			currentHeader: "small-header"
		};
	},

	methods: {
		onResize() {
			this.currentHeader =
				window.innerWidth < 1024 ? "small-header" : "large-header";
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
@import "./../scss/variables";

#header {
	background: rgba(32, 93, 229, 0.03);
}
</style>
