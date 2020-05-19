<template>
	<div class="education">
		<ItemView v-for="education in educations" :item="education" :key="education.id">
			<svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44">
				<g transform="translate(0 0.466)">
					<g transform="translate(0 -0.466)" fill="#fff" stroke="#f8ab08" stroke-width="1">
						<circle cx="22" cy="22" r="22" stroke="none" />
						<circle cx="22" cy="22" r="21.5" fill="none" />
					</g>
					<g transform="translate(8 -152.813)">
						<path d="M168,404.869l-8.3-2.553v4.264c0,1.971,3.715,3.57,8.3,3.57s8.3-1.6,8.3-3.57c0-.016-.005-.031-.005-.046v-4.218Z" transform="translate(-154.092 -227.609)" fill="#f8ab08" />
						<path d="M0,171.771l2.964,1.06.253-.541,1.089-.093.155.162-.934.222-.136.4s-2.11,4.411-1.8,6.57a2.722,2.722,0,0,0,2.634,0l.35-5.9v-.491l1.96-.442-.138.341-1.461.475.676.241,8.3,2.553,8.3-2.553,5.609-2.006-13.9-5.35Z" transform="translate(0 0)" fill="#f8ab08" />
					</g>
				</g>
			</svg>
		</ItemView>
	</div>
</template>

<script>
import ItemView from "./../components/ExperienceEducation/ItemView";

export default {
	name: "education",

	components: { ItemView },

	data: () => {
		return {
			educations: [
				{
					id: 1,
					title: "Technical University",
					duration: {
						from: "2015",
						to: "2017"
					},
					subItems: [
						{
							title: "Computer Science Engineering",
							detail:
								"Get, keoo and grow more customers with customer engagement Automation by kissmetrics."
						}
					]
				},
				{
					id: 2,
					title: "All Saints School",
					duration: {
						from: "2012",
						to: "2015"
					},
					subItems: [
						{
							title: "Senior Seconday",
							detail:
								"Get, keoo and grow more customers with customer engagement Automation by kissmetrics."
						}
					]
				},
				{
					id: 3,
					title: "All Saints School",
					duration: {
						from: "2012",
						to: "2015"
					},
					subItems: [
						{
							title: "Senior Seconday",
							detail:
								"Get, keoo and grow more customers with customer engagement Automation by kissmetrics."
						}
					]
				}
			]
		};
	}
};
</script>

<style lang="scss" scoped>
.education {
	padding: 40px 22px;
	padding-right: 0;
}
</style>
