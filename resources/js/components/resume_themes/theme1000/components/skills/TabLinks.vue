<template>
	<div class="tw-flex tw-overflow-y-hidden tab-links">
		<TabLink v-for="(label, index) in tabsLabel" :label="label" :isActive="isLinkActive(label)" :key="index" @click="$emit('activeLabelChanged', $event)" />
	</div>
</template>

<script>
import TabLink from "./TabLink";

export default {
	name: "tab-links",

	props: {
		tabsLabel: {
			type: Array,
			required: true
		},
		activeLabel: {
			type: String,
			default: ""
		}
	},

	components: { TabLink },

	methods: {
		isLinkActive(label) {
			return label.toLowerCase() == this.activeLabel.toLowerCase();
		}
	}
};
</script>

<style lang="scss" scoped>
.tab-links::-webkit-scrollbar {
	height: 0;
}
</style>
