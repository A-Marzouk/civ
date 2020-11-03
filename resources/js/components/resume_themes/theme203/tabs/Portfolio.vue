<template>
  <div class="portfolio">
    <v-tab-item value="portfolio" key="portfolio">
      <div class="child-tabs" style="z-index: 2000">
        <!-- child tabs -->
        <v-tabs hide-slider centered v-model="category">
          <v-tab
            active-class="child-tab-text-active"
            class="child-tab-text"
            href="#All"
            >All</v-tab
          >
          <v-tab
            v-for="(tab, index) in categories"
            :key="index"
            active-class="child-tab-text-active"
            class="child-tab-text"
            :id="tab"
            :href="'#' + tab"
            >{{ tab }}</v-tab
          >
        </v-tabs>
        <!-- child tabs -->
      </div>
      <div class="watermark-text text-center">Portfolio</div>
      <v-card flat color="transparent" tile align="center">
        <v-row align="center" justify="center">
          <v-tabs-items v-model="category">
            <v-tab-item key="All" value="All">
              <v-col cols="12">
                <masonry
                  :cols="{ default: 4, 959: 1, 599: 1 }"
                  :gutter="{ default: '30px', 700: '15px' }"
                >
                  <template v-for="item in currentUser.projects">
                    <ImagesCarouselModal :images="item.images" :key="item.id">
                      <v-card
                        class="mb-2 card-portfolio"
                        align="left"
                        flat
                        color="transparent"
                        tile
                        :key="item.id"
                        v-show="item.is_public == 1"
                      >
                        <v-img
                          class="custom-portfolio-img"
                          :src="getProjectMainImage(item)"
                          style="border-radius: 10px !important"
                        ></v-img>
                        <v-card-title class="custom-portfolio-title">
                          {{ item.name }}
                        </v-card-title>
                        <v-card-subtitle class="custom-portfolio-subtitle">{{
                          item.description
                        }}</v-card-subtitle>
                      </v-card>
                    </ImagesCarouselModal>
                  </template>
                </masonry>
              </v-col>
            </v-tab-item>
            <!-- All Categories -->
            <template v-for="category in categories">
              <v-tab-item :key="category" :value="category">
                <v-col cols="12">
                  <masonry
                    :cols="{ default: 4, 959: 1, 599: 1 }"
                    :gutter="{ default: '30px', 700: '15px' }"
                  >
                    <template v-for="item in currentUser.projects">
                      <ImagesCarouselModal
                        :images="item.images"
                        :key="item.id"
                        v-show="item.category == category"
                      >
                        <v-card
                          class="mb-2 card-portfolio"
                          align="left"
                          flat
                          color="transparent"
                          tile
                          :key="item.id"
                          v-show="item.is_public == 1"
                        >
                          <v-img
                            class="custom-portfolio-img"
                            :src="getProjectMainImage(item)"
                            style="border-radius: 10px !important"
                          ></v-img>
                          <v-card-title class="custom-portfolio-title">
                            {{ item.name }}
                          </v-card-title>
                          <v-card-subtitle class="custom-portfolio-subtitle">{{
                            item.description
                          }}</v-card-subtitle>
                        </v-card>
                      </ImagesCarouselModal>
                    </template>
                  </masonry>
                </v-col>
              </v-tab-item>
            </template>
            <!-- All Categories -->
          </v-tabs-items>
        </v-row>
      </v-card>
    </v-tab-item>
  </div>
</template>
<script>
import ImagesCarouselModal from "../../reusable/ImagesCarouselModal";
export default {
  name: "Portfolio",
  components: {
    ImagesCarouselModal,
  },
  props: {
    currentUser: {
      type: Object,
    },
  },
  data() {
    return {
      category: 0,
      categories: [],
    };
  },
  computed: {},
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
@import url("https://fonts.googleapis.com/css?family=Montserrat&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");
.watermark-text {
  position: absolute;
  font-size: 10vw;
  width: 100%;
  opacity: 0.1;
  white-space: nowrap;
  display: inline-block;
  font-family: "Poppins" !important;
  // margin-top: 200px;
  // top: 50%;
  // left: 50%;
  // margin-right: -50%;
  // transform: translate(-50%, -50%);
  margin: auto;
}
.child-tabs {
  margin-bottom: 20px;
  .child-tab-text {
    font-family: "Montserrat", sans-serif !important;
    font-style: normal;
    font-weight: normal;
    font-size: 18px;
    line-height: 22px;
    color: #dddddd !important;
    text-transform: capitalize !important;
  }

  .child-tab-text-active {
    background: #fcd259;
    border-radius: 50px;
    color: #ffffff !important;
  }
}
.custom-portfolio-img {
  width: 100% !important;
  //height: 100% !important;
  max-height: 400px !important;
}
</style>