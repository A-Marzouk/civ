<template>
	<div class="skills">
		<MenuSwitcher :currentTab="currentTab" @skillChanged="currentTab=$event" />

		<ItemsView :items="skills[currentTab]" />
	</div>
</template>

<script>
import MenuSwitcher from "./../components/skills/MenuSwitcher";
import ItemsView from "./../components/skills/ItemsView";

export default {
	name: "Skills",

	components: {
		MenuSwitcher,
		ItemsView
	},

	data() {
		return {
			currentTab: "ProgramingLanguages",

			skills: {
				Software: [
					{
						id: 1,
						title: "After effect",
						icon:
							"/images/resume_themes/theme1002/skills/after-effects.png",
						level: 92
					},
					{
						id: 2,
						title: "Adobe XD",
						icon:
							"/images/resume_themes/theme1002/skills/experience.png",
						level: 92
					}
				],
				DesignSkills: [
					{
						id: 1,
						title: "After effect",
						icon:
							"/images/resume_themes/theme1002/skills/after-effects.png",
						level: 92
					},
					{
						id: 2,
						title: "Adobe XD",
						icon:
							"/images/resume_themes/theme1002/skills/experience.png",
						level: 92
					}
				],
				FrameworksDatabases: [
					{
						id: 1,
						title: "Laravel",
						icon:
							"/images/resume_themes/theme1002/skills/after-effects.png",
						level: 92
					},
					{
						id: 2,
						title: "MySQL",
						icon:
							"/images/resume_themes/theme1002/skills/experience.png",
						level: 92
					},
					{
						id: 3,
						title: "VueJs",
						icon:
							"/images/resume_themes/theme1002/skills/experience.png",
						level: 92
					},
					{
						id: 4,
						title: "TailwindCss",
						icon:
							"/images/resume_themes/theme1002/skills/after-effects.png",
						level: 92
					}
				],
				ProgramingLanguages: [
					{
						id: 1,
						title: "PHP",
						icon:
							"/images/resume_themes/theme1002/skills/after-effects.png",
						level: 92
					},
					{
						id: 2,
						title: "SQL",
						icon:
							"/images/resume_themes/theme1002/skills/experience.png",
						level: 92
					}
				]
			}
		};
	}
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

.skills {
	padding-top: 25px;
	padding-bottom: 25px;

	.skills-tab {
		padding-top: 28px;
	}
}

@media (min-width: $md) {
	.skills {
		padding-top: 45px;
		padding-bottom: 45px;

		.skills-tab {
			padding-top: 38px;
		}
	}
}
</style>
