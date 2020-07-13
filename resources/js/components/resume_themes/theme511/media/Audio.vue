<template>
  <div>
    <v-card width="100%" class="audio-tm903" color="#fff" justify="center">
      <v-row dense justify="center" align="center" class="py-6">
        <v-col cols="3" align="center" justify="center">
          <v-img :src="img" contain width="65"></v-img>
        </v-col>
        <v-col cols="6">
          <div class="title-audio-tm903">AUD{{title}}</div>
          <div class="subtitle-audio-tm903">{{user_name}}</div>
          <div class="timer-audio-tm903">{{ currentTime }}</div>
        </v-col>
        <v-col cols="3" align="center" justify="center">
          <v-btn
            color="#39E1AA"
            height="65"
            width="65"
            dark
            fab
            elevation="0"
            @click.native="playing ? pause() : play()"
          >
            <v-icon color="#ffff" large v-if="!playing || paused"
              >mdi-play</v-icon
            >
            <v-icon color="#ffff" large v-else>mdi-pause</v-icon>
          </v-btn>
        </v-col>
      </v-row>
    </v-card>
    <v-footer
      style="z-index:500"
      fixed
      color="#fff"
      class="media-player-tm903 hidden-xs-only"
    >
      <v-row justify="center" class="align-center">
        <v-col class="avatar-media-player-tm903" lg="3" cols="2" sm="4">
          <v-row justify="center" class="align-center">
            <v-col lg="3" class="hidden-md-and-down">
              <v-list-item-avatar height="65" width="65" color="transparent">
                <v-img src="/images/resume_themes/theme511/audio.png"></v-img>
              </v-list-item-avatar>
            </v-col>
            <v-col sm="12" lg="auto" cols="3">
              <div class="audio-info-903">
                <span class="title-audio-tm903">AUDIO_{{title}}</span>
                <br />
                <span class="subtitle-audio-tm903">{{user_name}}</span>
              </div>
            </v-col>
            <v-col
              class="linear-playing-audio-tm903 d-none d-lg-none d-sm-block"
              sm="12"
            >
              <div class="mt-n4">
                <v-progress-linear
                  height="54"
                  color="transparent"
                  rounded
                  class="sliding"
                  style="cursor:pointer;border-radius: 30px;"
                  @click.native="setPosition()"
                  :disabled="!loaded"
                  v-model="percentage"
                >
                  <v-img
                    class="ml-6 mt-6 mb-6 mr-6"
                    src="/images/resume_themes/theme511/padBar.png"
                  ></v-img>
                </v-progress-linear>
                <div class="d-flex">
                  <span class="timer-player-903">0:00</span>
                  <v-spacer></v-spacer>
                  <span class="timer-player-903">{{currentTime}}</span>
                </div>
              </div>
              <audio
                id="player"
                ref="player"
                v-on:ended="ended"
                v-on:canplay="canPlay"
                :src="file"
              ></audio>
            </v-col>
          </v-row>
        </v-col>
        <v-col
          class="linear-playing-audio-tm903 hidden-lg-and-down"
          cols="3"
          lg="3"
          sm="6"
        >
          <div class="ml-n12">
            <v-progress-linear
              height="54"
              color="transparent"
              rounded
              class="sliding"
              style="cursor:pointer;border-radius: 30px;"
              @click.native="setPosition()"
              :disabled="!loaded"
              v-model="percentage"
            >
              <v-img
                class="ml-6 mt-6 mb-6 mr-6"
                src="/images/resume_themes/theme511/bars.png"
              ></v-img>
            </v-progress-linear>
            <div class="d-flex">
              <span class="timer-player-903">0:00</span>
              <v-spacer></v-spacer>
              <span class="timer-player-903">{{currentTime}}</span>
            </div>
          </div>
        </v-col>
        <v-col lg="5" sm="6" cols="12">
          <div class="d-flex">
            <v-list-item-icon>
              <v-btn icon>
                <v-icon>mdi-shuffle</v-icon>
              </v-btn>
            </v-list-item-icon>
            <div>
              <v-btn
                style="margin-left:auto;margin-right:auto;"
                height="60"
                width="60"
                color="#39E1AA"
                outlined
                fab
              >
                <v-icon color="#39E1AA">mdi-chevron-double-left</v-icon>
              </v-btn>
              <v-btn
                style="margin-left:auto;margin-right:auto;"
                elevation="0"
                height="60"
                width="60"
                color="#39E1AA"
                dark
                fab
                @click.native="playing ? pause() : play()"
              >
                <v-icon color="#ffff" large v-if="!playing || paused"
                  >mdi-play</v-icon
                >
                <v-icon color="#ffff" large v-else>mdi-pause</v-icon>
              </v-btn>
              <v-btn
                style="margin-left:auto;margin-right:auto;"
                height="60"
                width="60"
                color="#39E1AA"
                outlined
                fab
              >
                <v-icon color="#39E1AA">mdi-chevron-double-right</v-icon>
              </v-btn>
            </div>
            <v-list-item-icon>
              <v-btn icon>
                <v-icon>mdi-repeat</v-icon>
              </v-btn>
            </v-list-item-icon>
          </div>
          <div class="hidden-sm-and-up">
            <v-progress-linear
              class="mt-2"
              color="#FFD43B"
              value="50"
              rounded
              height="10"
            ></v-progress-linear>
            <span class="pl-7">2:00:00</span>
          </div>
        </v-col>
        <v-col class="full-media-player-tm903" sm="2">
          <v-btn icon>
            <v-icon>mdi-fullscreen</v-icon>
          </v-btn>
        </v-col>
      </v-row>
    </v-footer>
    <v-footer
      style="z-index:500"
      fixed
      color="#615EBC"
      class="mobile-media-player-tm511 hidden-sm-and-up"
    >
      <v-container>
        <v-row justify="space-between">
          <v-col cols="3">
            <div class="subtitle-audio-tm903 white--text">AUD{{title}}</div>
          </v-col>
          <v-col cols="5">
            <div>
              <v-btn icon dark>
                <v-icon>mdi-shuffle</v-icon>
              </v-btn>
              <v-btn icon dark>
                <v-icon>mdi-repeat</v-icon>
              </v-btn>
              <v-btn icon dark>
                <v-icon>mdi-fullscreen</v-icon>
              </v-btn>
            </div>
          </v-col>
        </v-row>
        <v-row justify="center">
          <v-col cols="12" class="text-center">
            <div>
              <v-btn
                icon
                text
                dark
                class="mob-other-btn"
                width="60"
                height="60"
              >
                <v-icon>mdi-chevron-double-left</v-icon>
              </v-btn>
              <v-btn icon text dark class="mob-play" width="60" height="60">
                <v-icon v-if="!playing || paused">mdi-play</v-icon>
                <v-icon v-else>mdi-pause</v-icon>
              </v-btn>
              <v-btn
                icon
                text
                dark
                class="mob-other-btn"
                width="60"
                height="60"
              >
                <v-icon>mdi-chevron-double-right</v-icon>
              </v-btn>
            </div>
          </v-col>
        </v-row>
        <v-row justify="center">
          <v-col cols="9">
            <v-progress-linear
              class="mt-2"
              color="#FFD43B"
              value="50"
              rounded
              height="10"
            ></v-progress-linear>
          </v-col>
          <v-col cols="2">
            <span class="pl-1">1:05:00</span>
          </v-col>
        </v-row>
      </v-container>
    </v-footer>
  </div>
</template>
<script>
const formatTime = second =>
  new Date(second * 1000).toISOString().substr(11, 8);
export default {
  name: "vuetify-audio",
  props: {
    file: {
      type: String,
      default: null
    },
    img: {
      type: String,
      default: null
    },
    autoPlay: {
      type: Boolean,
      default: false
    },
    ended: {
      type: Function,
      default: () => {}
    },
    canPlay: {
      type: Function,
      default: () => {}
    },
    color: {
      type: String,
      default: null
    },
    title: {
      type: String,
      default: null
    },
    user_name: {
      type: String,
      default: null
    },
    downloadable: {
      type: Boolean,
      default: false
    }
  },
  computed: {
    duration: function() {
      return this.audio ? formatTime(this.totalDuration) : "";
    },
    play_margin() {
      switch (this.$vuetify.breakpoint.name) {
        case "xs":
          return "ma-1";
        case "sm":
          return "ma-5";
        case "md":
          return "ma-5";
        case "lg":
          return "ma-5";
        case "xl":
          return "ma-5";
      }
    }
  },
  data() {
    return {
      firstPlay: true,
      isMuted: false,
      loaded: false,
      playing: false,
      paused: false,
      percentage: 0,
      currentTime: "00:00:00",
      audio: undefined,
      totalDuration: 0,
      showFooter: false
    };
  },
  methods: {
    setPosition() {
      this.audio.currentTime = parseInt(
        (this.audio.duration / 100) * this.percentage
      );
    },
    stop() {
      this.audio.pause();
      this.paused = true;
      this.playing = false;
      this.audio.currentTime = 0;
      this.showFooter = true;
    },
    play() {
      if (this.playing) return;
      this.audio.play().then(_ => (this.playing = true));
      this.paused = false;
      this.showFooter = true;
    },
    pause() {
      this.paused = !this.paused;
      this.paused ? this.audio.pause() : this.audio.play();
      this.showFooter = true;
    },
    download() {
      this.audio.pause();
      window.open(this.file, "download");
    },
    mute() {
      this.isMuted = !this.isMuted;
      this.audio.muted = this.isMuted;
      this.volumeValue = this.isMuted ? 0 : 75;
    },
    reload() {
      this.audio.pause();
      this.audio.currentTime = 0;
      this.audio.load();
      this.audio.play();
    },
    _handleLoaded: function() {
      if (this.audio.readyState >= 2) {
        if (this.audio.duration === Infinity) {
          // Fix duration for streamed audio source or blob based
          // https://stackoverflow.com/questions/38443084/how-can-i-add-predefined-length-to-audio-recorded-from-mediarecorder-in-chrome/39971175#39971175
          this.audio.currentTime = 1e101;
          this.audio.ontimeupdate = () => {
            this.audio.ontimeupdate = () => {};
            this.audio.currentTime = 0;
            this.totalDuration = parseInt(this.audio.duration);
            this.loaded = true;
          };
        } else {
          this.totalDuration = parseInt(this.audio.duration);
          this.loaded = true;
        }
        if (this.autoPlay) this.audio.play();
      } else {
        throw new Error("Failed to load sound file");
      }
    },
    _handlePlayingUI: function(e) {
      this.percentage = (this.audio.currentTime / this.audio.duration) * 100;
      this.currentTime = formatTime(this.audio.currentTime);
      this.playing = true;
    },
    _handlePlayPause: function(e) {
      if (e.type === "play" && this.firstPlay) {
        // in some situations, audio.currentTime is the end one on chrome
        this.audio.currentTime = 0;
        if (this.firstPlay) {
          this.firstPlay = false;
        }
      }
      if (
        e.type === "pause" &&
        this.paused === false &&
        this.playing === false
      ) {
        this.currentTime = "00:00:00";
      }
    },
    _handleEnded() {
      this.paused = this.playing = false;
    },
    init: function() {
      this.audio.addEventListener("timeupdate", this._handlePlayingUI);
      this.audio.addEventListener("loadeddata", this._handleLoaded);
      this.audio.addEventListener("pause", this._handlePlayPause);
      this.audio.addEventListener("play", this._handlePlayPause);
      this.audio.addEventListener("ended", this._handleEnded);
    }
  },
  mounted() {
    this.audio = this.$refs.player;
    this.init();
  },
  beforeDestroy() {
    this.audio.removeEventListener("timeupdate", this._handlePlayingUI);
    this.audio.removeEventListener("loadeddata", this._handleLoaded);
    this.audio.removeEventListener("pause", this._handlePlayPause);
    this.audio.removeEventListener("play", this._handlePlayPause);
    this.audio.removeEventListener("ended", this._handleEnded);
  }
};
</script>
<style lang="scss" scoped>
.player-audio-tm903 {
  background: #0d001a;
  box-shadow: -5px -5px 9px rgba(113, 113, 113, 0.149);
  border-radius: 30px;
  width: 235px;
  height: 60px;
  display: flex;
}
.title-audio-tm903 {
  font-family: Poppins;
  font-style: normal;
  font-weight: bold;
  font-size: 18px;
  line-height: 27px;
  color: #000000;
  cursor: pointer;
}
.subtitle-audio-tm903 {
  font-family: Poppins;
  text-transform: capitalize;
  font-style: normal;
  font-weight: normal;
  font-size: 12px;
  line-height: 18px;
  color: rgba(0, 0, 0, 0.55);
  cursor: pointer;
}
.v-card:not(.v-sheet--tile):not(.v-card--shaped) {
  border-radius: 20px;
}
.v-bottom-sheet.v-dialog.v-bottom-sheet--inset {
  max-width: 100%;
}

.audio-tm903 {
  box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.1);
  border-radius: 20px;
  .v-progress-linear--rounded {
    border-radius: 20px;
  }
  .v-progress-linear__background {
    background-color: #0d001a !important;
    opacity: 1 !important;
  }
  .bottom-audio-tm903 {
    max-width: 20px;
  }

  .timer-audio-tm903 {
    font-family: Poppins;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 18px;
    color: #000000;
    cursor: pointer;
  }
  .conter-tm901 {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 300;
    font-size: 21px;
    line-height: 29px;
    color: #5289e7;
  }
}
.mob-play {
  border: 2px solid #ffffff;
}
</style>