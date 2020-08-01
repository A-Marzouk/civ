<template>
  <v-container>
    <v-card class="card-video mb-md-0 mb-sm-5 mb-5">
      <div ref="videoPoster">
        <img src="/images/resume_themes/theme200/preview1.png"/>
          <v-overlay absolute="true" :value="overlay" color="#6152CF" class="video-overlay">
            <v-btn color="#FC5C8A" fab class="btn-play" @click.prevent="playVideo()">
              <v-icon x-large color="#6152CF">mdi-play</v-icon>
            </v-btn>
          </v-overlay>
      </div>
      <div ref="videotm903" class="videotm903">
        <video width="100%" ref="videoElem" controls :src="link" :modalOpen="modalOpen"></video>
      </div>
      <v-card-title class="video-window-title">Video Title</v-card-title>
      <v-card-subtitle
        class="video-window-subtitle mt-xl-0 mt-lg-n3 mt-sm-0 mt-n6"
        align="left"
      >Video Transcript</v-card-subtitle>
    </v-card>
  </v-container>
</template>
<script>
export default {
  props: {
    link: {
      type: String,
      default: null,
    },
    img: {
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
.btn-play {
  width: 54px;
  height: 54px;
  @media screen and (max-width: 959px) {
    width: 73.85;
    height: 73.85px;
  }
  @media screen and (max-width: 599px) {
    width: 51px;
    height: 51px;
  }
}
.card-video {
  border-radius: 12px !important;
  width: 781px;
  height: 541.31px;
  @media screen and (min-width: 1264px) and (max-width: 1903px){
    height: 90%;
  }

  // overlay
  .video-overlay {
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    height: 439.31px;
    @media screen and (min-width:1264px) and (max-width: 1903px){
      height: 355.5px;
    }
  }
  img {
    height: 439.31px;
    @media screen and (min-width:1264px) and (max-width: 1903px){
      height: 355.5px;
    }
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
