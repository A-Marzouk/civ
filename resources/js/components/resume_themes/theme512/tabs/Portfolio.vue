<template>
  <v-container fluid v-if="currentTab === 0">
    <v-row no-gutters>
      <v-col cols="12">
        <VueSlickCarousel
          v-bind="settings"
          ref="myVueperSlides"
          :breakpoints="breakpoints"
        >
          <div v-for="(p, i) in portfolio" :key="i" class="pa-2">
            <v-img :src="p.src" cover style="border-radius:10px;"></v-img>
          </div>

          <template #customPaging="i">
            <div class="custom-dot d-none">
              <div class="d-none">{{ i }}</div>
            </div>
          </template>
        </VueSlickCarousel>
      </v-col>
      <v-col cols="12" class="text-center pt-2">
        <v-btn @click="previous()" color="transparent" elevation="0">
          <v-img src="/images/resume_themes/theme512/leftarrow.png"></v-img>
        </v-btn>
        <v-btn
          @click="$refs.myVueperSlides.next()"
          color="transparent"
          elevation="0"
        >
          <v-img src="/images/resume_themes/theme512/rightarrow.png"></v-img>
        </v-btn>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
import VueSlickCarousel from "vue-slick-carousel";
// optional style for arrows & dots
// import "vue-slick-carousel/dist/vue-slick-carousel-theme.css";
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
      slidesToShow: 3,
      visibleSlides: 3,
      slidesToScroll: 4,
      touchThreshold: 5

      // Any other options that can be got from plugin documentation
    },
    breakpoints: {
      1024: {
        visibleSlides: 2,
        slideMultiple: 2,
        slidesToShow: 2,
        slidesToScroll: 2,
        touchThreshold: 3,
        slideRatio: 1
      },
      600: {
        visibleSlides: 2,
        slideMultiple: 2,
        slidesToShow: 2,
        slidesToScroll: 2,
        touchThreshold: 3,
        slideRatio: 1
      }
    },
    portfolio: [
      {
        src: "/images/resume_themes/theme512/port-1.png"
      },
      {
        src: "/images/resume_themes/theme512/port-3.png"
      },
      {
        src: "/images/resume_themes/theme512/port-1.png"
      },
      {
        src: "/images/resume_themes/theme512/port-3.png"
      },
      {
        src: "/images/resume_themes/theme512/port-1.png"
      },
      {
        src: "/images/resume_themes/theme512/port-3.png"
      },
      {
        src: "/images/resume_themes/theme512/port-1.png"
      },
      {
        src: "/images/resume_themes/theme512/port-3.png"
      }
    ]
  }),
  methods: {
    previous() {
      this.$refs.myVueperSlides.next();
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
</style>