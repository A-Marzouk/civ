<template>
	<div id="wrapper_theme1002">
		<!-- header -->
		<component :currentUser="currentUser" v-bind:is="currentHeader"></component>

	</div>
</template>

<script>
import SmallHeader from "./components/header/SmallHeader";
import LargeHeader from "./components/header/LargeHeader";

export default {
	name: "resume-theme-1002",

	components: { SmallHeader, LargeHeader },

	data: () => {
		return {
			currentTab: "portfolio",
			currentHeader: "small-header",
			currentUser: {
				avatar: "/images/resume_themes/theme1002/profiles/person.png",
				fullname: "Ahmed Elsayed",
				jobTitle: "ux/ui designer",
				hourRate: 10,
				weeklyAvailability: 35
			}
		};
	},

	methods: {
		onResize() {
			this.currentHeader =
				window.innerWidth < 1024 ? "small-header" : "large-header";
		}
	},

	mounted() {
		this.onResize();
		window.addEventListener("resize", this.onResize);
	},

	beforeDestroy() {
		window.removeEventListener("resize", this.onResize);
	}
};
</script>
