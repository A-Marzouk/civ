<template>
	<div class="skills">
		<TabLinks :currentTab="currentTab" @skillChanged="currentTab=$event" />

		<ItemsView :items="skills[currentTab]" />
	</div>
</template>

<script>
import TabLinks from "./../components/skills/TabLinks";
import ItemsView from "./../components/skills/ItemsView";

export default {
	name: "skills",

	components: { ItemsView, TabLinks },

	data: () => {
		return {
			currentTab: "ProgramingLanguages",

			skills: {
				ProgramingLanguages: [
					{
						id: 1,
						title: "Flutter",
						level: 60
					},
					{
						id: 2,
						title: "PHP",
						level: 64
					},
					{
						id: 3,
						title: "C",
						level: 45
					},
					{
						id: 4,
						title: "Python",
						level: 5
					},
					{
						id: 5,
						title: "Javascript",
						level: 67
					},
					{
						id: 6,
						title: "Java",
						level: 43
					}
				],
				Frameworks: [
					{
						id: 1,
						title: "Flutter",
						level: 54
					}
				],
				DesignSkills: [
					{
						id: 1,
						title: "UI/UX",
						level: 65
					},
					{
						id: 2,
						title: "Material Design",
						level: 74
					}
				],
				Softwares: [
					{
						id: 1,
						title: "Photoshop",
						level: 43
					},
					{
						id: 2,
						title: "Word 2007",
						level: 65
					}
				]
			}
		};
	},

	mounted() {
		console.log(this.skills);
		console.log(this.currentTab);
	}
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

.skills {
	padding-top: 15px;

	@include xl {
		padding-top: 25px;
	}
}
</style>
