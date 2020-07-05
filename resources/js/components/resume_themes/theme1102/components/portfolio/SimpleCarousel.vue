<template>
	<div class="projects-carousel">
		<a class="arrow prev" @click.prevent="prev" href="#">
            <img src="/images/resume_themes/theme1102/icon/left_arrow1.svg" alt="arrow_logo">
        </a>

		<slick class="projects-slick" ref="slick" :options="slickOptions">
			<div class="item-wrapper" v-for="item in items" :key="item.id">
				<ItemView :thumbnail="item.thumbnail" :title="item.title" :subTitle="item.subTitle" />
			</div>
		</slick>

		<a class="arrow next" @click.prevent="next" href="#">
            <img src="/images/resume_themes/theme1102/icon/right_arrow1.svg" alt="arrow_logo">

        </a>
	</div>
</template>

<script>
import Slick from "vue-slick";
import ItemView from "./ItemView";

export default {
	name: "SimpleCarousel",

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
				slidesToShow: 3,
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
	align-items: stretch;

	.arrow {
		width: 25px;
		display: flex;
		align-items: center;
		justify-content: center;
        img
        {
            max-width: 145%;
        }
	}

	.projects-slick {
		visibility: hidden;
		width: calc(100% - 50px);

		&.slick-initialized {
			visibility: visible;
		}
	}
}

@media (min-width: $xl) {
	.projects-carousel {
		.projects-slick {
			max-width: 100%;
		}
	}
}
</style>
