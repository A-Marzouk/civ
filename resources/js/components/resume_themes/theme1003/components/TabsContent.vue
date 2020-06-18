<template>
	<div class="tabs-content">
		<component v-bind:is="currentTab"></component>
	</div>
</template>

<script>
import AboutMe from "./../tabs/AboutMe";
import Education from "./../tabs/Education";
import Experience from "./../tabs/Experience";
import Media from "./../tabs/Media";
import Portfolio from "./../tabs/Portfolio";
import Skills from "./../tabs/Skills";

export default {
	name: "TabsContent",

	components: { AboutMe, Education, Experience, Media, Portfolio, Skills },

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
	padding: 25px 10px;

	@include lg {
		padding: 40px 15px;
	}
}
</style>
