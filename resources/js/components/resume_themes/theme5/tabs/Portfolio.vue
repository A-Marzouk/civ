<template>
  <v-container pa-0>
    <v-row justify="center" align="center" class="mb-6">
      <v-col cols="12" sm="11" md="8" class="category__bar">
        <v-tabs hide-slider centered background-color="transparent">
          <v-tab href="#ALL" @click="category = 'All'">All</v-tab>
          <v-tab v-for="(categ, i) in filtredPortfolios" :key="i" @click="category = categ" :href="'#' + categ"
            >{{ categ }}
          </v-tab>
        </v-tabs>
      </v-col>
    </v-row>
    <v-row no-gutters justify="center">
      <v-col
        md="4"
        sm="12"
        cols="12"
        v-for="project in filterCategory(category)"
        :key="project.id + '_project'"
        v-show="project.is_public"
        class="pa-4"
        align="center"
      >
        <ImagesCarouselModal :images="project.images">
          <v-img :src="getProjectMainImage(project)" alt="portfolio img" :aspect-ratio="1.2" cover></v-img>
        </ImagesCarouselModal>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
import ImagesCarouselModal from '../../reusable/ImagesCarouselModal';
export default {
  components: { ImagesCarouselModal },
  props: {
    projects: {
      type: undefined,
      required: true
    }
  },
  data() {
    return {
      portfolios: this.projects,
      category: 'All',
      categories: [],
      filterProjects: []
    };
  },
  computed: {
    filtredPortfolios() {
      this.filterProjects = this.portfolios.filter(a => a.is_public);
      let uniqueCategories = [...new Set(this.filterProjects.map(project => project.category))];
      return uniqueCategories;
    }
  },
  methods: {
    getProjectMainImage(project) {
      let mainImage = '';
      let images = project.images;
      images.forEach(image => {
        if (image.is_main) {
          mainImage = image;
        }
      });
      return mainImage.src;
    },
    filterCategory(category) {
      if (category == 'All') {
        return this.portfolios;
      }
      var filterArray = this.portfolios.filter(a => a.category === category);
      return filterArray;
    }
  }
};
</script>
<style lang="scss" scoped>
.category__bar {
  background-color: transparent;
  margin: 1rem;
  border-radius: 5px;
  padding: 1rem;
  .v-tab {
    font-family: Poppins;
    font-style: normal;
    font-weight: bold;
    font-size: 1rem;
    line-height: 1.5rem;
    margin: 0 0.5rem;
    padding: 0.1rem 1.5rem;
    text-transform: capitalize !important;
    text-decoration: none;
  }
  .v-tab--active {
    background: rgb(241, 241, 241);

    color: #5f45ff;
    border-radius: 5px;
    margin: 0 0.5rem;
  }
}
</style>