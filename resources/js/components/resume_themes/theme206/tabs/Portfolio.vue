<template>
  <div class="portfolio">
    <v-tabs centered hide-slider v-model="category">
      <v-tab
        class="category-text"
        active-class="category-text-active"
        id="All"
        href="#All"
        >All</v-tab
      >
      <v-tab
        v-for="category in categories"
        :key="category"
        class="category-text"
        active-class="category-text-active"
        :id="category"
        :href="'#' + category"
        >{{ category }}</v-tab
      >
    </v-tabs>
    <v-card color="transparent" flat>
      <v-card-text>
        <v-tabs-items v-model="category">
          <v-tab-item key="All" value="All">
            <v-row>
              <v-col
                cols="12"
                sm="6"
                md="3"
                v-for="project in currentUser.projects"
                :key="project.id"
                v-show="project.is_public"
              >
                <v-card class="card-portfolio" hover>
                  <v-img
                    :aspect-ratio="1.2"
                    :src="getProjectMainImage(project)"
                  ></v-img>
                </v-card>
              </v-col>
            </v-row>
          </v-tab-item>
          <!-- rest of the categories -->
          <template v-for="category in categories">
            <v-tab-item :key="category" :value="category">
              <v-row>
                <v-col
                  cols="12"
                  sm="6"
                  md="3"
                  v-for="project in currentUser.projects"
                  :key="project.id"
                  v-show="
                    project.is_public == 1 && project.category == category
                  "
                >
                  <v-card class="card-portfolio" hover>
                    <v-img
                      :aspect-ratio="1.2"
                      :src="getProjectMainImage(project)"
                    ></v-img>
                  </v-card>
                </v-col>
              </v-row>
            </v-tab-item>
          </template>
          <!-- rest of the categoris -->
        </v-tabs-items>
      </v-card-text>
    </v-card>
  </div>
</template>
<script>
export default {
  name: "Portfolio",
  props: {
    currentUser: {
      type: Object,
    },
  },
  data() {
    return {
      categories: [],
      category: 0,
    };
  },
  created() {
    let uniqueCategories = [
      ...new Set(this.currentUser.projects.map((project) => project.category)),
    ];
    this.categories = uniqueCategories;
  },
  methods: {
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
  },
};
</script>
<style scoped lang="scss">
.category-text {
  font-family: "Poppins" !important;
  font-style: normal;
  font-weight: normal;
  font-size: 18px;
  line-height: 27px;
  color: #333333;
  text-transform: capitalize !important;
}
.category-text-active {
  font-weight: bold;
  color: #5843be !important;
}
.card-portfolio {
  border-radius: 30px !important;
  img {
    max-width: 419px;
    max-height: 339px;
  }
}
</style>