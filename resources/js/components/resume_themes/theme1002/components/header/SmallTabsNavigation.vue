<template>
	<nav class="tabs-navigation">
		<MenuSwitcher :currentTab="currentTab" :items="items" @changeCurrentTab="$emit('tabChanged', $event)" />
	</nav>
</template>

<script>
import MenuSwitcher from "./MenuSwitcher";

export default {
	name: "SmallTabsNavigation",

	props: {
		currentTab: {
			type: String,
			required: true
		}
	},

	components: { MenuSwitcher },

	data() {
		return {
			items: [
				{
					tabName: "portfolio",
					label: "Portfolio",
					icon: "/images/resume_themes/theme1002/icons/portfolio.svg"
				},
				{
					tabName: "work",
					label: "Work",
					icon: "/images/resume_themes/theme1002/icons/work.svg"
				},
				{
					tabName: "skills",
					label: "Skills",
					icon: "/images/resume_themes/theme1002/icons/skills.svg"
				},
				{
					tabName: "education",
					label: "Education",
					icon: "/images/resume_themes/theme1002/icons/education.svg"
				}
			]
		};
	}
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.tabs-navigation {
}
</style>
