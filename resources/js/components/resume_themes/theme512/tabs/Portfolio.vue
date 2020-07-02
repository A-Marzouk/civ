<template>
  <v-container fluid v-if="currentTab === 0">
    <v-row no-gutters>
      <v-col cols="12">
        <VueSlickCarousel v-bind="settings" ref="carousel" :arrows="false">
          <div class="px-2 py-8 " v-for="(p, i) in portfolio" :key="i">
            <img :src="p.src" class="bdradius" alt="portfolio img" />
          </div>
        </VueSlickCarousel>
      </v-col>
      <v-col cols="12" class="text-center pt-2">
        <v-btn @click="showPrev" color="transparent" elevation="0">
          <v-img src="/images/resume_themes/theme512/leftarrow.png"></v-img>
        </v-btn>
        <v-btn @click="showNext" color="transparent" elevation="0">
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
      centerMode: true,
      centerPadding: "200px",
      focusOnSelect: true,
      infinite: true,
      slidesToShow: 2,
      speed: 500,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            centerMode: true,
            centerPadding: "100px",
            focusOnSelect: true,
            infinite: true,
            slidesToShow: 1,
            speed: 500
          }
        },
        {
          breakpoint: 600,
          settings: {
            centerMode: true,
            centerPadding: "100px",
            focusOnSelect: true,
            infinite: true,
            slidesToShow: 1,
            speed: 500
          }
        },
        {
          breakpoint: 480,
          settings: {
            centerMode: true,
            centerPadding: "80px",
            focusOnSelect: true,
            infinite: true,
            slidesToShow: 1,
            speed: 500
          }
        }
      ]
      // Any other options that can be got from plugin documentation
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
    showNext() {
      this.$refs.carousel.next();
    },
    showPrev() {
      this.$refs.carousel.prev();
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

.bdradius {
  border-radius: 20px;
}
</style>