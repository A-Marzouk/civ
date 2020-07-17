<template>
  <v-card class="video-tm903">
    <div ref="videoPoster">
      <v-img class="img-video-tm903" cover :src="img" alt>
        <v-btn
          class="b-play-tm903"
          color="#D4DDFF"
          height="90"
          width="90"
          style="border:1px solid #3D5ED4;"
          dark
          fab
          elevation="0"
          @click.native="playVideo()"
        >
          <v-icon color="#3D5ED4" large>mdi-play</v-icon>
        </v-btn>
      </v-img>
    </div>
    <div ref="videotm903" class="videotm903">
      <v-icon @click.prevent="stopVideo()" right>mdi-close</v-icon>
      <video width="100%" ref="videoElem" controls :src="link"></video>
    </div>
  </v-card>
</template>

<script>
export default {
  props: {
    link: {
      type: String,
      default: null
    },
    img: {
      type: String,
      default: null
    }
  },
  methods: {
    playVideo() {
      this.$refs.videotm903.style.display = "block";
      this.$refs.videoPoster.style.display = "none";
      this.$refs.videoElem.play();
    },
    stopVideo() {
      this.$refs.videotm903.style.display = "none";
      this.$refs.videoPoster.style.display = "block";
      this.$refs.videoElem.pause();
    }
  }
};
</script>

<style lang="scss" scoped>
.video-tm903 {
  box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.15);
  border-radius: 10px;

  .b-play-tm903 {
    left: -20%;
    top: 38%;
    @media only screen and (max-width: 597px) {
      left: -20%;
      top: 38%;
    }
  }
  .videotm903 {
    display: none;
  }
}
</style>