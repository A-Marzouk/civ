<template>
	<div class="tabs-content">
		<component v-bind:is="currentTab"></component>
	</div>
</template>

<script>
import AboutMe from "./../views/AboutMe";
import Media from "./../views/Media";
import Portfolio from "./../views/Portfolio";
import ExperienceEducation from "./tabs/ExperienceEducation";
import SkillsLanguage from "./tabs/SkillsLanguage";

export default {
	name: "TabsContent",

	components: {
		AboutMe,
		Media,
		Portfolio,
		ExperienceEducation,
		SkillsLanguage
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
.tabs-content {
	padding: 25px 10px;
}

@media (min-width: 1600px) {
	.tabs-content {
		max-width: 1600px;
		margin: 0 auto;
	}
}
</style>
