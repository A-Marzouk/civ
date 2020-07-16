<template>
	<div id="wrapper_theme1001">
		<Header :currentTab="currentTab" :currentUser="currentUser" />

		<TabsNavigation :currentTab="currentTab" @tabChanged="currentTab=$event" />

		<TabsContent :currentTab="currentTab" />
	</div>
</template>

<script>
import Header from "./components/Header";
import TabsNavigation from "./components/TabsNavigation";
import TabsContent from "./components/TabsContent";

export default {
	name: "resume-theme-1001",

	components: { Header, TabsNavigation, TabsContent },

	data: () => {
		return {
			currentTab: "portfolio",
			currentUser: {
				avatar: "/images/resume_themes/theme1001/profiles/girl.jpg",
				fullname: "Amber Salma Heard",
				jobTitle: "UX UI Designer",
				hourRate: 45,
				weeklyAvailability: 45
			}
		};
	}
};
</script>
