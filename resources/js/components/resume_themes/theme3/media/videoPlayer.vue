<template>
  <div class="video-tm3">
    <div ref="videoPoster">
      <img class="img-video-tm3" cover :src="img" alt />

      <button class="b-play-tm3" @click.prevent="playVideo()">
        <img
          src="/images/resume_themes/theme3/video_play.svg"
          alt="video play"
        />
      </button>
      <div class="video-txt-tm3">{{ details }}</div>
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
    opacity: 0.5;
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