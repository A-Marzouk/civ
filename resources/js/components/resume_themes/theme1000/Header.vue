<template>
	<div class="header">
		<div class="tw-flex tw-items-center tw-px-3 tw-py-4">
			<img class="tw-w-12 tw-h-12 tw-rounded-lg" :src="profile.avatar" alt="Hean Prinsloo CV" />
			<h3 class="tw-font-bold tw-text-white tw-leading-snug tw-pl-6">
				{{ profile.fullname }}
			</h3>
		</div>
		<TabsNavigation :currentTab="currentTab" @tabChanged="$emit('tabChanged', $event)" />
	</div>
</template>

<script>
import TabsNavigation from "./header/TabsNavigation";

export default {
	name: "Header",

	props: {
		currentTab: {
			type: String,
			required: true
		}
	},

	components: { TabsNavigation },

	data: () => {
		return {
			profile: {
				avatar: "/images/resume_themes/theme1000/avatar.png",
				fullname: "Hean Prinsloo"
			}
		};
	}
};
</script>

<style lang="scss" scoped>
.header {
	background: linear-gradient(180deg, #012e84 0%, #012166 100%);
	box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.15);
}
</style>
