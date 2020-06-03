<template>
	<div class="skills">
		<MenuSwitcher :currentTab="currentTab" @skillChanged="currentTab=$event" />

		<div class="skills-tab">
			<component v-bind:is="currentTab"></component>
		</div>
	</div>
</template>

<script>
import MenuSwitcher from "./../components/skills/MenuSwitcher";
import Software from "./../views/skills/Software";
import DesignSkills from "./../views/skills/DesignSkills";
import FrameworksDatabases from "./../views/skills/FrameworksDatabases";
import ProgramingLanguages from "./../views/skills/ProgramingLanguages";

export default {
	name: "Skills",

	components: {
		MenuSwitcher,
		Software,
		DesignSkills,
		FrameworksDatabases,
		ProgramingLanguages
	},

	data() {
		return {
			// currentTab: "programing-languages"
			currentTab: "software"
		};
	}
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

.skills {
	padding-top: 45px;
	padding-bottom: 45px;

	.skills-tab {
		padding-top: 38px;
	}
}
</style>
