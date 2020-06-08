<template>
	<div class="tab-links">
		<TabLink v-for="(tab, index) in tabs" :tab="tab" :isActive="currentTab === tab.name" @click="$emit('skillChanged', $event)" :key="index" />
	</div>
</template>

<script>
import TabLink from "./TabLink";

export default {
	name: "tab-links",

	props: {
		currentTab: {
			type: String,
			required: true
		}
	},

	components: { TabLink },

	data() {
		return {
			tabs: [
				{ name: "ProgramingLanguages", label: "Programing Languages" },
				{ name: "Frameworks", label: "Frameworks" },
				{ name: "DesignSkills", label: "Design Skills" },
				{ name: "Softwares", label: "Softwares" }
			]
		};
	},

	methods: {
		isLinkActive(label) {
			return label.toLowerCase() == this.currentTab.toLowerCase();
		}
	}
};
</script>

<style lang="scss" scoped>
.tab-links {
	display: flex;
	overflow-y: hidden;
	padding-left: 16px;
	padding-right: 16px;

	&::-webkit-scrollbar {
		height: 0;
	}
}
</style>
