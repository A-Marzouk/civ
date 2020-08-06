<template>
  <v-card class="video-tm1001">
    <div ref="videoPoster">
      <v-img class="img-video-tm1001" cover :src="img" alt>
        <v-btn
          class="b-play-tm1001"
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
    <div ref="videotm1001" class="videotm1001">
      <v-icon @click.prevent="stopVideo()" right>mdi-close</v-icon>
      <video width="100%" ref="videoElem" controls :src="link"></video>
    </div>
  </v-card>
</template>

<script>
export default {
  props: {
    title: {
      type: String,
      default: null
    },
    user_name: {
      type: String,
      default: null
    },
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
      this.$refs.videotm1001.style.display = "block";
      this.$refs.videoPoster.style.display = "none";
      this.$refs.videoElem.play();
    },
    stopVideo() {
      this.$refs.videotm1001.style.display = "none";
      this.$refs.videoPoster.style.display = "block";
      this.$refs.videoElem.pause();
    }
  }
};
</script>

<style lang="scss" scoped>
.video-tm1001 {
  box-shadow: 0px 0px 0px rgba(0, 0, 0, 0);
  .img-video-tm1001 {
    box-shadow: 0px 0px 0px rgba(0, 0, 0, 0);

    border-radius: 10px;
  }

  .b-play-tm1001 {
    left: -20%;
    top: 38%;
    @media only screen and (max-width: 597px) {
      left: -20%;
      top: 38%;
    }
  }
  .videotm1001 {
    display: none;
  }
}
</style>