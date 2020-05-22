<template>
	<div>
		<Skills />
		<Language />
	</div>
</template>

<script>
import Skills from "./../../views/Skills";
import Language from "./../../views/Language";

export default {
	name: "skills-language",

	components: { Skills, Language }
};
</script>

<style lang="scss" scoped>
</style>
