<template>
  <div class="media__content__audio">
    <VueSlickCarousel
      v-bind="settings"
      class="video_carousel"
      :style="{ height: '400px' }"
    >
      <Hobbies v-for="(video, index) in 16" :key="index"></Hobbies>

      <template #customPaging="i">
        <div class="custom-dot">
          <div class="d-none">{{ i }}</div>
        </div>
      </template>
    </VueSlickCarousel>
  </div>
</template>
<script>
import VueSlickCarousel from "vue-slick-carousel";
import "vue-slick-carousel/dist/vue-slick-carousel-theme.css";
import Hobbies from "./tabs/Hobbies";
export default {
    components:{
        Hobbies,
        VueSlickCarousel
    },
    data(){
        return{
            settings: {
                    arrows: false,
                    dots: true,
                    infinite: true,
                    slidesToShow: 3,
                    slidesPerRow:1,
                    rows:2,
                }
        }
    }
}
</script>