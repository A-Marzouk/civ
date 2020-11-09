<template>
  <div>
    <div ref="videoPoster">
      <v-img :src="previewImg" contain style="border-radius:9px;">
        <v-overlay
          absolute
          :value="overlay"
          color="transparent"
          class="video-overlay"
        >
          <v-btn class="btn-play" color="transparent"  @click.prevent="playVideo()">
            <v-img
              src="/images/resume_themes/theme206/icons/play.svg"
            ></v-img>
          </v-btn> </v-overlay
      ></v-img>
    </div>
    <div ref="videotm903" class="videotm903">
      <video
        width="100%"
        ref="videoElem"
        controls
        :src="file"
        :modalOpen="modalOpen"
      ></video>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    file: {
      type: String,
      default: null,
    },
    title: {
      type: String,
      default: null,
    },
    previewImg: {
      type: String,
      default: null,
    },
    details: {
      type: String,
      default: null,
    },
    modalOpen: {
      type: Boolean,
      default: true,
    },
  },
  data() {
    return {
      overlay: true,
      playing: false,
    };
  },
  watch: {
    modalOpen: function (val) {
      if (val == false) {
        this.stopVideo();
      }
    },
  },
  methods: {
    playVideo() {
      this.$refs.videotm903.style.display = "flex";
      this.$refs.videoPoster.style.display = "none";
      this.$refs.videoElem.play();
      this.overlay = false;
    },
    stopVideo() {
      this.$refs.videotm903.style.display = "none";
      this.$refs.videoPoster.style.display = "flex";
      this.$refs.videoElem.pause();
      this.overlay = true;
    },
  },
};
</script>

<style scoped lang="scss">
@import url("https://fonts.googleapis.com/css?family=Montserrat&display=swap");
.btn-play {
  width: 65px !important;
  height: 65px !important;
  border-radius: 50% !important;
  z-index: 100;
  img {
    max-width: 32px !important;
    min-width: 32px !important;
    max-height: 32px !important;
  }
}
.card-video {
  padding: 0px !important;
  border-radius: 40px !important;
  @media screen and (min-width: 1264px) and (max-width: 1903px){
    width: 80%;
    height: auto;
  }
  @media screen and (min-width: 600px) and (max-width: 959px){
    width: 80%;
    height: auto;
  }
  @media screen and (max-width: 599px){
    width: 85%;
    height: auto;
  }
  .video-title {
    font-family: "Montserrat";
    font-style: normal;
    font-weight: normal;
    font-size: 18px;
    line-height: 22px;
    color: #8b8b8b !important;
  }
  // overlay
  .video-window-title {
    font-family: "Open Sans" !important;
    font-size: 30px;
    color: #2e2e2e !important;
    @media screen and (min-width: 1264px) and (max-width: 1903px) {
      font-size: 24px;
    }
    @media screen and (max-width: 959px) {
      font-size: 32px;
    }
    @media screen and (max-width: 599px) {
      font-size: 18px;
    }
  }
  .video-window-subtitle {
    font-family: "Open Sans" !important;
    font-size: 19px;
    color: #7d7d7d !important;
    text-transform: capitalize !important;
    @media screen and (min-width: 1904px) {
      margin-top: 2px;
    }
    @media screen and (min-width: 1264px) and (max-width: 1903px) {
      font-size: 14px;
    }
    @media screen and (max-width: 959px) {
      font-size: 18px;
    }
    @media screen and (max-width: 599px) {
      font-size: 10px;
    }
  }
}
.videotm903 {
  display: none;
}
</style>