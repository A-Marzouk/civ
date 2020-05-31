<template>
	<div class="portfolio">
		<div class="project-wrapper" v-for="project in projects" :key="project.id">
			<ItemView :thumbnail="project.thumbnail" :slug="project.slug" :title="project.title" :subTitle="project.subTitle" />
		</div>
	</div>
</template>

<script>
import ItemView from "./../components/portfolio/ItemView";

export default {
	name: "portfolio",

	components: { ItemView },

	data() {
		return {
			projects: [
				{
					id: 1,
					slug: "#",
					thumbnail:
						"/images/resume_themes/theme1002/thumbnails/default.png",
					title: "Project name",
					subTitle: "category"
				},
				{
					id: 2,
					slug: "#",
					thumbnail:
						"/images/resume_themes/theme1002/thumbnails/default.png",
					title: "Project name",
					subTitle: "category"
				},
				{
					id: 3,
					slug: "#",
					thumbnail:
						"/images/resume_themes/theme1002/thumbnails/default.png",
					title: "Project name",
					subTitle: "category"
				},
				{
					id: 4,
					slug: "#",
					thumbnail:
						"/images/resume_themes/theme1002/thumbnails/default.png",
					title: "Project name",
					subTitle: "category"
				},
				{
					id: 5,
					slug: "#",
					thumbnail:
						"/images/resume_themes/theme1002/thumbnails/default.png",
					title: "Project name",
					subTitle: "category"
				},
				{
					id: 6,
					slug: "#",
					thumbnail:
						"/images/resume_themes/theme1002/thumbnails/default.png",
					title: "Project name",
					subTitle: "category"
				}
			]
		};
	}
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

.portfolio {
	padding: 17px 23px;

	.project-wrapper {
		padding: 15px;
	}
}
</style>
