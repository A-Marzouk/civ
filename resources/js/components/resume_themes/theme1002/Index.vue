<template>
	<div id="wrapper_theme1002">
		<!-- header -->
		<component :currentUser="currentUser" :currentTab="currentTab" @tabChanged="currentTab=$event" v-bind:is="currentHeader"></component>

		<SmallTabsNavigation v-if="inSmallScreen" :currentTab="currentTab" @tabChanged="currentTab=$event" />

		<TabsContent :currentTab="currentTab" />
	</div>
</template>

<script>
import SmallHeader from "./components/header/SmallHeader";
import LargeHeader from "./components/header/LargeHeader";
import SmallTabsNavigation from "./components/header/SmallTabsNavigation";
import TabsContent from "./components/TabsContent";

export default {
	name: "resume-theme-1002",

	components: {
		SmallHeader,
		LargeHeader,
		SmallTabsNavigation,
		TabsContent
	},

	data: () => {
		return {
			currentTab: "work",
			currentHeader: "small-header",
			inSmallScreen: true,
			currentUser: {
				avatar: "/images/resume_themes/theme1002/profiles/default.jpg",
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

			this.inSmallScreen = window.innerWidth < 1024;
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
