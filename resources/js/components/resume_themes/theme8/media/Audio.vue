<template>
  <div class="media-content-audio">
      <VueSlickCarousel :dots="true">
          <div v-for="i in 6" :key="i">{{i}}</div>
      </VueSlickCarousel>
  </div>
</template>
<script>
import VueSlickCarousel from "vue-slick-carousel";

export default {
  components: {
      VueSlickCarousel,
  },

};
</script>