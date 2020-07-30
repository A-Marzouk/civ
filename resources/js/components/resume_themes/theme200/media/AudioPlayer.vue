<template>
  <vueSlickCarousel v-bind="slickOptionsAudioModal">
    <template>
      <v-card flat class="pa-12" color="transparent">
        <v-card-text class="ml-xl-6 ml-lg-6">
          <v-row justify="center" dense class="mt-xl-10">
            <v-col xl="1" lg="1" cols="3">
              <v-btn
                fab
                color="#FC5C8A"
                class="btn-play"
                depressed
                @click.prevent="playing = !playing"
              >
                <v-icon color="white" x-large v-if="playing">mdi-pause</v-icon>
                <v-icon color="white" x-large v-else>mdi-play</v-icon>
              </v-btn>
            </v-col>
            <v-col xl="11" lg="11" cols="9" align="left" class="mt-n8">
              <v-row>
                <v-col xl="6" lg="6" cols="6">
                  <div class="durationTime">{{currentTime}}</div>
                </v-col>
                <v-col xl="5" lg="5" cols="6" align="right">
                  <div class="durationTime">{{durationTime}}</div>
                </v-col>
                <v-col xl="11" lg="11" align="left">
                  <v-progress-linear value="15" height="8" color="#FC5C8A"></v-progress-linear>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-card-text>
      </v-card>
    </template>
  </vueSlickCarousel>
</template>
<script>
import VueSlickCarousel from "vue-slick-carousel";
export default {
  name: "AudioPlayer",
  components: {
    VueSlickCarousel,
  },
  props: {
    file: {
      type: String,
      default: null,
    },
    autoPlay: {
      type: Boolean,
      default: false,
    },
    loop: {
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      audio: undefined,
      playing: false,
      currentSeconds: 0,
      durationSeconds: 0,
      slickOptionsAudioModal: {
        infinite: false,
        dots: true,
        arrows: false,
        slidesPerRow: 1,
        slidesToScroll: 1,
        rows: 3,
      },
    };
  },

  computed: {
    currentTime() {
      return "0:00";
    },
    durationTime() {
      return "5:28";
    },
    percentComplete() {
      return parseInt((this.currentSeconds / this.durationSeconds) * 100);
    },
  },
};
</script>

<style scoped lang="scss">
.durationTime {
  font-size: 22px;
  color: #343434 !important;
}
</style>