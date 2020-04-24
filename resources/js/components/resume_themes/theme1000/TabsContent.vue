<template>
	<div class="tw-max-w-4xl tw-mx-auto">
		<component v-bind:is="currentTab"></component>
	</div>
</template>

<script>
import AboutMe from "./tabs/AboutMe";
import Education from "./tabs/Education";
import Experience from "./tabs/Experience";
import Media from "./tabs/Media";
import Portfolio from "./tabs/Portfolio";
import Skills from "./tabs/Skills";

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
