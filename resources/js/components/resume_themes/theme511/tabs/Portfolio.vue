<template>
  <v-container fluid v-if="activeTab === 'portfolio'" class="mainheight">
    <v-row>
      <v-col
        class="hidden-lg-and-up"
        sm="3"
        cols="12"
        v-for="(project, i) in projects"
        :key="i"
        v-show="project.is_public"
      >
        <v-img class="borImg" :src="getProjectMainImage(project)"></v-img>
      </v-col>

      <v-col lg="12" class="hidden-md-and-down">
        <VueSlickCarousel v-bind="settings">
          <div v-for="(project, i) in projects" :key="i" class="px-2">
            <v-img
              :src="getProjectMainImage(project)"
              class="borImg"
              :aspect-ratio="1"
              alt="portfolio img"
            ></v-img>
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
      touchThreshold: 5
      // Any other options that can be got from plugin documentation
    },
    portfolio: [
      {
        src: "/images/resume_themes/theme511/port-1.png"
      },
      {
        src: "/images/resume_themes/theme511/port-2.png"
      },
      {
        src: "/images/resume_themes/theme511/port-3.png"
      },
      {
        src: "/images/resume_themes/theme511/port-4.png"
      },
      {
        src: "/images/resume_themes/theme511/port-1.png"
      },
      {
        src: "/images/resume_themes/theme511/port-2.png"
      },
      {
        src: "/images/resume_themes/theme511/port-3.png"
      },
      {
        src: "/images/resume_themes/theme511/port-4.png"
      }
    ]
  }),
  methods: {
    getProjectMainImage(project) {
      let mainImage = "";

      let images = project.images;
      images.forEach(image => {
        if (image.is_main) {
          mainImage = image;
        }
      });

      return mainImage.src;
    }
  }
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
</style>