<template>
	<div class="tw-px-4 tw-pt-16">
		<div :class="{'tw-mb-5': isLastEducation(education)}" v-for="education in educations" :key="education.id">
			<EducationCard :education="education" />
		</div>
	</div>
</template>

<script>
import EducationCard from "../components/EducationCard";

export default {
	name: "education",

	components: { EducationCard },

	data: () => {
		return {
			educations: [
				{
					id: 1,
					title: "UXUI Designer",
					school: "IBM LAB",
					detail:
						"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam volutpat elit a lacus luctus, accumsan.",
					duration: "2010-2013"
				},
				{
					id: 2,
					title: "UXUI Designer",
					school: "IBM LAB",
					detail:
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
