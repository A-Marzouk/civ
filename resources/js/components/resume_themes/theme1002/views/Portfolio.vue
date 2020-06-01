<template>
	<div class="portfolio">
		<template v-if="inSmallScreen">
			<div class="project-wrapper" v-for="project in projects" :key="project.id">
				<ItemView :thumbnail="project.thumbnail" :slug="project.slug" :title="project.title" :subTitle="project.subTitle" />
			</div>
		</template>

		<SimpleCarousel v-else :items="projects" />
	</div>
</template>

<script>
import ItemView from "./../components/portfolio/ItemView";
import SimpleCarousel from "./../components/portfolio/SimpleCarousel";

export default {
	name: "portfolio",

	components: { ItemView, SimpleCarousel },

	data() {
		return {
			inSmallScreen: true,

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
	},

	methods: {
		onResize() {
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

<style lang="scss" scoped>
@import "./../scss/variables";

.portfolio {
	padding: 17px 25px;

	.project-wrapper {
		padding: 13px;
	}
}

@media (min-width: $md) {
	.portfolio {
		display: flex;
		flex-wrap: wrap;
		padding: 45px 28px;

		.project-wrapper {
			padding: 15px;
			width: 50%;
		}
	}
}
</style>
