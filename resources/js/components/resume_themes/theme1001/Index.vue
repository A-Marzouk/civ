<template>
	<div id="wrapper_theme1001">
		<Header :currentTab="currentTab" :currentUser="currentUser" @tabChanged="currentTab=$event" />
	</div>
</template>

<script>
import Header from "./components/Header";

export default {
	name: "resume-theme-1001",

	components: { Header },

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
