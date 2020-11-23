<template>
  <v-container fluid v-if="activeTab === 'portfolio'" class="mainheight">
    <v-row justify="center" align="center" class="mb-6">
      <v-col cols="12" sm="11" md="8" class="category__bar">
        <v-tabs hide-slider centered background-color="#FAF7F1">
          <v-tab href="#ALL" @click="category = 'All'">All</v-tab>
          <v-tab v-for="(categ, i) in categories" :key="i" @click="category = categ" :href="'#' + categ"
            >{{ categ }}
          </v-tab>
        </v-tabs>
      </v-col>
    </v-row>
    <v-row>
      <v-col
        class="hidden-lg-and-up"
        sm="3"
        cols="12"
        v-for="portfolio in filterCategory(category)"
        :key="portfolio.id"
        v-show="portfolio.is_public"
      >
        <v-img class="borImg" :src="getProjectMainImage(portfolio)"></v-img>
      </v-col>

      <v-col lg="12" class="hidden-md-and-down">
        <VueSlickCarousel v-bind="settings">
          <div
            v-for="portfolio in filterCategory(category)"
            :key="portfolio.id"
            v-show="portfolio.is_public"
            class="px-2"
          >
            <v-img :src="getProjectMainImage(portfolio)" class="borImg" :aspect-ratio="1" alt="portfolio img"></v-img>
          </div>

          <template #customPaging="i">
            <div class="custom-dot">
              <div class="d-none">{{ i }}</div>
            </div>
          </template>
        </VueSlickCarousel>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
import VueSlickCarousel from "vue-slick-carousel";
// optional style for arrows & dots
import "vue-slick-carousel/dist/vue-slick-carousel-theme.css";
export default {
  props: ["activeTab", "projects"],
  components: {
    VueSlickCarousel
  },
  data: () => ({
    settings: {
      dots: true,
      focusOnSelect: true,
      infinite: true,
      speed: 500,
      slidesToShow: 4,
      slidesToScroll: 4,
      touchThreshold: 5,
      initialSlide: 0,
      // Any other options that can be got from plugin documentation
    },
      category: "All",
      categories: [],
      filterProjects:[]
   
  }),

  mounted() {
    this.filtredPortfolios();
  },
  methods: {
    filtredPortfolios() {
       this.filterProjects = this.projects.filter(
          (a) => a.is_public
        );
        let uniqueCategories = [
          ...new Set(this.filterProjects.map((project) => project.category)),
        ];
       return this.categories = uniqueCategories;
    },
    getProjectMainImage(project) {
      let mainImage = "";
      let images = project.images;
      images.forEach((image) => {
        if (image.is_main) {
          mainImage = image;
        }
      });
      return mainImage.src;
    },
    filterCategory(category) {
      if (category == "All") {
        return this.projects;
      }
      var filterArray = this.projects.filter(
        (a) => a.category === category
      );
     
      return filterArray;
    },
    changeCategory(category) {
      this.category = category;
    },
  },
};
</script>
<style lang="scss" scoped>
.slick-active .custom-dot {
  background-color: #f7b301 !important;
  opacity: 1;
  width: 15px;
  height: 15px;
}
.custom-dot {
  background: #000000;
  opacity: 0.3;
  border-radius: 50%;
  width: 15px;
  height: 15px;
}
.borImg {
  border-radius: 20px !important  ;
}

.category__bar {
  background: #faf7f1;
  box-shadow: 0px 10px 8px rgba(0, 0, 0, 0.1);
  border-radius: 50px;
  padding: 0.5rem 2rem;
  .v-tab {
    font-family: Poppins;
    font-style: normal;
    font-weight: bold;
    font-size: 1rem;
    line-height: 1.5rem;
    margin: 0 0.5rem;
    padding: 0.1rem 1.5rem;
    text-transform: capitalize !important;
  }
  .v-tab--active {
    background: #faf7f1;
    border: 5px solid #39e1aa;
    color: #39e1aa;
    border-radius: 50px;
    margin: 0 0.5rem;
  }
}
</style>