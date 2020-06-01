<template>
	<div class="tabs-content">
		<component v-bind:is="currentTab"></component>
	</div>
</template>

<script>
import Portfolio from "./../views/Portfolio";
import Work from "./../views/Work";
import Skills from "./../views/Skills";
import Education from "./../views/Education";

export default {
	name: "TabsContent",

	components: {
		Portfolio,
		Work,
		Skills,
		Education
	},

	props: {
		currentTab: {
			type: String,
			required: true
		}
	}
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

.tabs-content {
	max-width: 1024px;
	margin-left: auto;
	margin-right: auto;
	padding-right: 40px;
	padding-left: 40px;
}

@media (min-width: $xl) {
	.tabs-content {
		max-width: $xl;
		padding-left: 82px;
		padding-right: 82px;
	}
}

@media (min-width: $xxl) {
	.tabs-content {
		max-width: $xxl;
		padding-left: 115px;
		padding-right: 115px;
	}
}
</style>
