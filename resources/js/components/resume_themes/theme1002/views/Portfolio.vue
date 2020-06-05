<template>
	<div class="portfolio">
		<template v-if="inSmallScreen">
			<div class="project-wrapper" v-for="project in projects" :key="project.id">
				<ItemView :thumbnail="project.thumbnail" :title="project.title" :subTitle="project.subTitle" />
			</div>
		</template>

		<SimpleCarousel v-else :items="projects" />
	</div>
</template>

<script>
import ItemView from "./../components/portfolio/ItemView";
import SimpleCarousel from "./../components/portfolio/SimpleCarousel";

export default {
	name: "Portfolio",

	components: { ItemView, SimpleCarousel },

	data() {
		return {
			inSmallScreen: true,

			projects: [
				{
					id: 1,
					thumbnail:
						"/images/resume_themes/theme1002/thumbnails/default.jpg",
					title: "Project name",
					subTitle: "category"
				},
				{
					id: 2,
					thumbnail:
						"/images/resume_themes/theme1002/thumbnails/default.jpg",
					title: "Project name",
					subTitle: "category"
				},
				{
					id: 3,
					thumbnail:
						"/images/resume_themes/theme1002/thumbnails/default.jpg",
					title: "Project name",
					subTitle: "category"
				},
				{
					id: 4,
					thumbnail:
						"/images/resume_themes/theme1002/thumbnails/default.jpg",
					title: "Project name",
					subTitle: "category"
				},
				{
					id: 5,
					thumbnail:
						"/images/resume_themes/theme1002/thumbnails/default.jpg",
					title: "Project name",
					subTitle: "category"
				},
				{
					id: 6,
					thumbnail:
						"/images/resume_themes/theme1002/thumbnails/default.jpg",
					title: "Project name",
					subTitle: "category"
				}
			]
		};
	},

	methods: {
		onResize() {
			this.inSmallScreen = window.outerWidth < 1024;
			this.$forceUpdate();
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
	padding-top: 17px;
	padding-bottom: 17px;
	max-width: $sm;
	margin-left: auto;
	margin-right: auto;

	.project-wrapper {
		display: flex;
		justify-content: center;
		padding-top: 13px;
		padding-bottom: 13px;
	}
}

@media (min-width: $sm) {
	.portfolio {
		max-width: $sm;
	}
}

@media (min-width: $md) {
	.portfolio {
		display: flex;
		flex-wrap: wrap;
		padding: 45px 12px;
		max-width: $md;

		.project-wrapper {
			width: 50%;
			padding-top: 15px;
			padding-bottom: 15px;
		}
	}
}

@media (min-width: $lg) {
	.portfolio {
		max-width: $lg;
	}
}

@media (min-width: $xl) {
	.portfolio {
		max-width: $xl;
	}
}

@media (min-width: $xxl) {
	.portfolio {
		max-width: $xxl;
	}
}
</style>
