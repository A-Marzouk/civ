<template>
  <v-container>
    <v-row align="center" justify="center">
      <v-card class="card-video mb-md-0 mb-sm-5 mb-5 mt-sm-0 mt-n12" flat color="transparent">
        <v-card-subtitle class="video-title" align="left"
          >Video-1</v-card-subtitle
        >
        <div ref="videoPoster">
          <v-img :src="previewImg">
            <v-overlay
              absolute
              :value="overlay"
              color="transparent"
              class="video-overlay"
            >
              <v-btn class="btn-play" @click.prevent="playVideo()">
                <v-img
                  src="/images/resume_themes/theme203/icons/inner-play.svg"
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
        <!-- <v-card-title class="video-window-title">{{title}}</v-card-title>
      <v-card-subtitle
        class="video-window-subtitle mt-xl-0 mt-lg-n3 mt-sm-0 mt-n6"
        align="left"
      >{{details}}</v-card-subtitle> -->
      </v-card>
    </v-row>
  </v-container>
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
  width: 72px !important;
  height: 71.01px !important;
  background: #000000;
  border: 5px solid #e0bb4c !important;
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

