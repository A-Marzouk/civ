<template>
	<div>
		<Education />
		<Experience />
	</div>
</template>

<script>
import Education from "./../../views/Education";
import Experience from "./../../views/Experience";

export default {
	name: "experience-education",

	components: { Education, Experience }
};
</script>

<style lang="scss" scoped>
</style>
