<template>
	<div class="tw-px-4 tw-pt-16 md:tw-px-37px">
		<div :class="{'tw-mb-5': isLastExperience(experience)}" v-for="experience in experiences" :key="experience.id">
			<Card :details="experience" iconBgColor="lima">
				<svg width="26" height="25" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill="#F3F3F3" d="M15.5 5.5V3h-5v2.5h5zM3 8v13.75h20V8H3zm20-2.5c1.387 0 2.5 1.112 2.5 2.5v13.75c0 1.387-1.113 2.5-2.5 2.5H3a2.491 2.491 0 01-2.5-2.5L.512 8c0-1.388 1.1-2.5 2.488-2.5h5V3C8 1.613 9.113.5 10.5.5h5C16.887.5 18 1.613 18 3v2.5h5z" />
				</svg>
			</Card>
		</div>
	</div>
</template>

<script>
import Card from "../components/Card";

export default {
	name: "experience",

	components: { Card },

	data: () => {
		return {
			experiences: [
				{
					id: 1,
					title: "UXUI Designer",
					subtitle: "IBM LAB",
					description:
						"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam volutpat elit a lacus luctus, accumsan.",
					duration: "2010-2013"
				},
				{
					id: 2,
					title: "UXUI Designer",
					subtitle: "IBM LAB",
					description:
						"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam volutpat elit a lacus luctus, accumsan.",
					duration: "2010-2013"
				}
			]
		};
	},

	computed: {
		isLastExperience() {
			return experience => {
				if (experience.length === 0) {
					return true;
				}

				return (
					experience.id !==
					this.experiences[this.experiences.length - 1].id
				);
			};
		}
	}
};
</script>

<style lang="scss" scoped>
</style>
