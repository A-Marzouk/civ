<template>
	<div class="education">
		<div class="education-items">
			<ItemViewCard v-for="item in education" :title="item.title" :subtitle="item.subtitle" :description="item.description" :duration="item.duration" :key="item.id" />
		</div>
	</div>
</template>

<script>
import ItemViewCard from "../components/ItemViewCard";

export default {
	name: "education",

	components: { ItemViewCard },

	data: () => {
		return {
			education: [
				{
					id: 1,
					title: "Ryerson University",
					subtitle: "London",
					description:
						"Parallel to the Potsgraduate degree in computer security, I studied Digital Marketing.",
					duration: "2010-2013"
				},
				{
					id: 2,
					title: "Ryerson University",
					subtitle: "London",
					description:
						"Parallel to the Potsgraduate degree in computer security, I studied Digital Marketing.",
					duration: "2010-2013"
				},
				{
					id: 3,
					title: "Ryerson University",
					subtitle: "London",
					description:
						"Parallel to the Potsgraduate degree in computer security, I studied Digital Marketing.",
					duration: "2010-2013"
				},
				{
					id: 4,
					title: "Ryerson University",
					subtitle: "London",
					description:
						"Parallel to the Potsgraduate degree in computer security, I studied Digital Marketing.",
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
@import "./../scss/variables";

.education {
	font-family: $roboto;
	padding-left: 7px;
	padding-right: 7px;

	.education-items {
		display: grid;
		grid-template-columns: 1fr;
		row-gap: 25px;
	}

	@include xs {
		padding-left: 16px;
		padding-right: 16px;
	}

	@include md {
		padding: 10px 15px;

		.education-items {
			max-width: 752px;
			margin: 0 auto;
			column-gap: 30px;
			row-gap: 30px;
		}
	}

	@include lg {
		.education-items {
			max-width: 1320px;
			grid-template-columns: 1fr 1fr 1fr;
		}
	}

	@include xl {
		padding-top: 25px;
		padding-bottom: 25px;

		.education-items {
			max-width: 1770px;
			grid-template-columns: 1fr 1fr 1fr 1fr;
		}
	}
}
</style>
