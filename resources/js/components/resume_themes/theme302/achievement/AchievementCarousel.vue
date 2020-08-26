<template>
  <div class="media__content__audio">
    <VueSlickCarousel
      v-bind="achievementSettings"
      class="reference_carousel"
      :style="{ height: '400px' }"
    >
      <Achievements
        v-for="(achievement, index) in achievements"
        :key="index"
        :achievement="achievement"
      ></Achievements>

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
import Achievements from "./Achievements";

export default {
   props: ["achievements"],
    components:{
        Achievements,
        VueSlickCarousel
    },
    data(){
        return{
            achievementSettings: {
                    arrows: false,
                    dots: true,
                    infinite: true,
                    slidesToShow: 2,
                    swipeToSlide:true,
                     centerMode:true,
                    centerPadding:'25px'
                }
        }
    }
}
</script>
<style lang="scss" scoped>
.custom-dot {
  background-color: #104efb;
  opacity: 0.6;
  border-radius: 50%;
  width: 15px;

  height: 15px;
  margin-top: 0rem;
  @media only screen and (min-width: 650px) and (max-width: 1024px) {
    margin-top: 16rem;
  }
  @media only screen and (min-width: 320px) and (max-width: 500px) {
    margin-top: 8rem;
  }
}
.slick-active .custom-dot {
  background-color: #104efb;
  opacity: 1 !important;
  width: 15px;
  height: 15px;
  margin-top: 0rem;
  @media only screen and (min-width: 650px) and (max-width: 1024px) {
    margin-top: 16rem;
  }
  @media only screen and (min-width: 320px) and (max-width: 500px) {
    margin-top: 8rem;
  }
}
.slick-active .custom-dot:after {
  content: "";

  position: absolute;
  top: -4px;
  left: -4px;
  right: 0px;

  border-radius: 50%;
  border: 1px solid #104efb;
  width: 24px;
  height: 24px;
  margin-top: 0rem;
  @media only screen and (min-width: 650px) and (max-width: 1024px) {
    margin-top: 16rem;
  }
  @media only screen and (min-width: 320px) and (max-width: 500px) {
    margin-top: 8rem;
  }
}
</style>