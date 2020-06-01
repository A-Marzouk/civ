<template>
	<div class="projects-carousel">
		<a class="arrow prev" @click.prevent="prev" href="#">
			<svg xmlns="http://www.w3.org/2000/svg" width="15.043" height="27.253" viewBox="0 0 15.043 27.253">
				<path d="M14.341 26.546L1.419 13.627 14.341.708" fill="none" stroke="#205de5" stroke-width="2" />
			</svg>
		</a>

		<slick class="projects-slick" ref="slick" @init="resizeItemsView" @setPosition="resizeItemsView" :options="slickOptions">
			<div class="item-wrapper" v-for="item in items" :key="item.id">
				<ItemView ref="ItemsView" :thumbnail="item.thumbnail" :slug="item.slug" :title="item.title" :subTitle="item.subTitle" />
			</div>
		</slick>

		<a class="arrow next" @click.prevent="next" href="#">
			<svg xmlns="http://www.w3.org/2000/svg" width="15.043" height="27.253" viewBox="0 0 15.043 27.253">
				<path d="M.702.707l12.922 12.919L.702 26.545" fill="none" stroke="#205de5" stroke-width="2" />
			</svg>
		</a>
	</div>
</template>

<script>
import Slick from "vue-slick";
import ItemView from "./ItemView";

export default {
	name: "simple-carousel",

	props: {
		items: {
			type: Array,
			required: true
		}
	},

	components: { Slick, ItemView },

	data() {
		return {
			slickOptions: {
				dots: false,
				arrows: false,
				infinite: true,
				slidesToShow: 2,
				slidesToScroll: 1
			}
		};
	},

	methods: {
		next() {
			this.$refs.slick.next();
		},

		prev() {
			this.$refs.slick.prev();
		},

		resizeItemsView() {
			this.$refs.ItemsView.forEach(itemView => itemView.onResize());
		}
	}
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.projects-carousel {
	width: 100%;
	display: flex;
	max-width: 100%;
	padding-top: 25px;
	padding-bottom: 25px;
	align-items: stretch;

	.arrow {
		width: 25px;
		display: flex;
		align-items: center;
		justify-content: center;
	}

	.projects-slick {
		width: calc(100% - 50px);

		.item-wrapper {
			padding-left: 25px;
			padding-right: 25px;
		}
	}
}

@media (min-width: $xl) {
	.projects-carousel {
		.projects-slick {
			padding-top: 40px;
			padding-bottom: 40px;
			max-width: 100%;

			.item-wrapper {
				padding-left: 72.5px;
				padding-right: 72.5px;
			}
		}
	}
}
</style>
