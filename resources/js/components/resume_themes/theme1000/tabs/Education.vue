<template>
	<div class="tw-px-4 tw-pt-16 screen425px:tw-px-37px screen1024px:tw-flex screen1024px:tw-flex-wrap screen1024px:tw-px-0">
		<div class="screen1024px:tw-w-1/2 screen1024px:tw-px-15px screen1920px:tw-w-1/3" :class="{'tw-mb-5': isLastEducation(education)}" v-for="education in educations" :key="education.id">
			<Card :details="education">
				<svg width="28" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill="#fff" d="M14 .75L.25 8.25l5 2.725v7.5L14 23.25l8.75-4.775v-7.5l2.5-1.362v8.637h2.5v-10L14 .75zm8.525 7.5L14 12.9 5.475 8.25 14 3.6l8.525 4.65zm-2.275 8.738L14 20.4l-6.25-3.412v-4.65L14 15.75l6.25-3.412v4.65z" />
				</svg>
			</Card>
		</div>
	</div>
</template>

<script>
import Card from "../components/Card";

export default {
	name: "education",

	components: { Card },

	data: () => {
		return {
			educations: [
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
				},
				{
					id: 3,
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
		isLastEducation() {
			return education => {
				if (education.length === 0) {
					return true;
				}

				return (
					education.id !==
					this.educations[this.educations.length - 1].id
				);
			};
		}
	}
};
</script>

<style lang="scss" scoped>
</style>
