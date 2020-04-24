<template>
	<div id="wrapper_theme1000" class="tw-w-full tw-bg-white">
		<Header :currentTab="currentTab" @tabChanged="currentTab = $event" />
		<TabsContent :currentTab="currentTab" />
	</div>
</template>

<script>
import Header from "./Header";
import TabsContent from "./TabsContent";

export default {
	name: "resume-theme-1000",

	components: { Header, TabsContent },

	data: () => {
		return {
			currentTab: "media"
		};
	}
};
</script>

<style lang="scss" scoped>
@import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Poppins:wght@400;500;700&family=Roboto:wght@400;700&display=swap");

#wrapper_theme1000 {
	font-family: "Roboto", sans-serif;
}
</style>
