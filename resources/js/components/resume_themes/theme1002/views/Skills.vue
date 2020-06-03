<template>
	<div>
		<MenuSwitcher :currentTab="currentTab" @skillChanged="currentTab=$event" />

		<component v-bind:is="currentTab"></component>
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
			currentTab: "programing-languages"
		};
	}
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";
</style>
