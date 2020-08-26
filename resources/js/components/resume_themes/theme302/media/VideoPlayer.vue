<template>
  <div class="video-tm3">
    <div ref="videoPoster">
      <v-img
        class="img-video-tm3 text-center align-center justify-center align-self-center"
        cover
        :src="img"
        alt
      >
        <v-img
          src="/images/resume_themes/theme302/halfCircle.svg"
          max-width="60"
          class="mx-auto text-center align-center justify-center align-self-center"
        >
          <v-btn
            color="#104efb"
            x-small
            fab
            depressed
            class="align-center justify-center"
            @click.prevent="playVideo()"
          >
            <v-icon color="#fff" v-if="!playing || paused">mdi-play</v-icon>
            <v-icon color="#ffff" v-else>mdi-pause</v-icon>
          </v-btn>
        </v-img>
      </v-img>
    </div>
    <div ref="videotm903" class="videotm903">
      <v-icon @click.prevent="stopVideo()" right>mdi-close</v-icon>
      <video width="100%" ref="videoElem" controls :src="link"></video>
    </div>
  </div>
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
    },
    details: {
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
.video-tm3 {
  position: relative;
  justify-content: center;
  .img-video-tm3 {
    border-radius: 30px;
    width: 450px;
    height: 350px;
    margin: auto;
    position: relative;

    @media only screen and (min-width: 650px) and (max-width: 1024px) {
      height: 300px;
      width: 400px;
    }
    @media only screen and (min-width: 320px) and (max-width: 500px) {
      height: 250px;
      width: 350px;
    }
  }

  .b-play-tm3 {
    position: absolute;
    left: 45%;
    top: 35%;

    img {
      width: 75px;
      height: 75px;
    }
    @media only screen and (max-width: 597px) {
      left: 36%;
      top: 30%;
    }
  }

  .video-txt-tm3 {
    color: #333333;
    width: 450px;
    margin: 5px auto;
  }
  .videotm903 {
    display: none;
  }
}
</style>