<template>
  <div>
    <v-tab-item value="portfolio" key="portfolio">
      <div class="watermark-text text-center">Portfolio</div>
      <v-card flat color="transparent" tile align="center">
        <v-row align="center" justify="center">
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
.watermark-text {
  position: absolute;
  font-size: 10vw;
  width: 100%;
  opacity: 0.1;
  white-space: nowrap;
  display: inline-block;
  // margin-top: 200px;
  // top: 50%;
  // left: 50%;
  // margin-right: -50%;
  // transform: translate(-50%, -50%);
  margin: auto;
}
</style>