<template>
  <v-container fluid v-if="currentTab === 0" class="mainheight">
    <v-row>
      <v-col class="hidden-lg-and-up" sm="3" cols="6" v-for="(p,i) in portfolio" :key="i">
        <v-img :src="p.src"></v-img>
      </v-col>

      <v-col lg="12" class="hidden-md-and-down">
        <VueSlickCarousel v-bind="settings">
          <div v-for="(p,i) in portfolio" :key="i">
            <img :src="p.src" alt />
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
  props: ["currentTab"],
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
  })
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
</style>