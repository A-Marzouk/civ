<template>
	<div id="wrapper_theme1002">
		<Header :currentUser="currentUser" />
	</div>
</template>

<script>
import Header from "./components/Header";

export default {
	name: "resume-theme-1002",

	components: { Header },

	data: () => {
		return {
			currentTab: "portfolio",
			currentUser: {
				avatar: "/images/resume_themes/theme1002/profiles/person.png",
				fullname: "Ahmed Elsayed",
				jobTitle: "ux/ui designer",
				hourRate: 10,
				weeklyAvailability: 35
			}
		};
	}
};
</script>
