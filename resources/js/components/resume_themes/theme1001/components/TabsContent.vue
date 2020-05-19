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
@import "./../scss/variables";

.tabs-content {
	padding-left: 20px;
	padding-right: 20px;
}

@media (min-width: 375px) {
	.tabs-content {
		padding-left: 25px;
		padding-right: 25px;
	}
}

@media (min-width: $lg) {
	.tabs-content {
		max-width: $lg;
		padding-left: 50px;
		padding-right: 50px;
		margin: 0 auto;
	}
}

@media (min-width: 1600px) {
	.tabs-content {
		max-width: 1600px;
		padding-left: 100px;
		padding-right: 100px;
	}
}

@media (min-width: $xl) {
	.tabs-content {
		max-width: $xl;
	}
}
</style>
