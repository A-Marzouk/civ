<template>
  <div>
    <div class="audio-tm1001">
      <v-row dense justify="center" align="center" class="paddingY">
        <v-col cols="3" align="center" justify="center">
          <v-img
            class="thumbSize"
            style="border-radius: 10px"
            :src="img"
          ></v-img>
        </v-col>
        <v-col cols="6">
          <div class="title-audio-tm1001">AUDIO_{{ title }}</div>
          <div class="subtitle-audio-tm1001">{{ user_name }}</div>
          <div class="timer-audio-tm1001">{{ currentTime }}</div>
          <audio
            id="player"
            ref="player"
            v-on:ended="ended"
            v-on:canplay="canPlay"
            :src="file"
          ></audio>
        </v-col>
        <v-col cols="3" align="center" justify="center">
          <v-btn
            color="#D4DDFF"
            height="90"
            width="90"
            class="playBtnSize"
            style="border: 1px solid #3d5ed4"
            dark
            fab
            elevation="0"
            @click.native="playing ? pause() : play()"
          >
            <v-icon color="#3D5ED4" large v-if="!playing || paused"
              >mdi-play</v-icon
            >
            <v-icon color="#3D5ED4" large v-else>mdi-pause</v-icon>
          </v-btn>
        </v-col>
      </v-row>
    </div>
    <v-footer
      style="z-index: 500"
      fixed
      color="#fff"
      class="media-player-tm1001 hide-on-mobile"
    >
      <v-row justify="center" class="align-center" dense>
        <v-col class="avatar-media-player-tm1001" cols="auto">
          <v-row justify="center" class="align-center" dense>
            <v-col sm="auto" class="hide-on-mobile">
              <v-img
                class="thumbSize"
                style="border-radius: 10px"
                src="/images/resume_themes/theme1001/media/audio-1.png"
              ></v-img>
            </v-col>
            <v-col sm="auto" lg="auto" cols="3">
              <div class="audio-info-1001">
                <span class="title-audio-tm1001">AUDIO_{{ title }}</span>
                <br />
                <span class="subtitle-audio-tm1001">{{ user_name }}</span>
              </div>
            </v-col>
          </v-row>
        </v-col>
        <v-col
          class="linear-playing-audio-tm1001"
          cols="4"
          sm="3"
          md="4"
          lg="4"
          xl="5"
        >
          <div>
            <v-progress-linear
              height="54"
              color="transparent"
              rounded
              class="sliding"
              style="cursor: pointer; border-radius: 30px"
              @click.native="setPosition()"
              :disabled="!loaded"
              v-model="percentage"
            >
              <v-img
                class="ml-6 mt-6 mb-6 mr-6"
                src="/images/resume_themes/theme1001/media/Bars.svg"
              ></v-img>
            </v-progress-linear>
            <div class="d-flex">
              <span class="timer-player-1001">{{ currentTime }}</span>
              <v-spacer></v-spacer>
              <span class="timer-player-1001">{{ duration }}</span>
            </div>
          </div>
        </v-col>
        <v-col xl="4" lg="5" sm="auto" cols="4">
          <div class="d-flex">
            <v-list-item-icon>
              <v-btn icon>
                <v-icon color="#172C7A" class="iconSize">mdi-shuffle</v-icon>
              </v-btn>
            </v-list-item-icon>
            <div class="player-btn-group-1001">
              <v-btn class="btnSize" color="#3D5ED4" outlined fab>
                <v-icon color="#3D5ED4" class="iconSize"
                  >mdi-chevron-double-left</v-icon
                >
              </v-btn>
              <v-btn
                elevation="0"
                class="btnSize"
                color="#3D5ED4"
                dark
                fab
                @click.native="playing ? pause() : play()"
              >
                <v-icon color="#ffff" class="iconSize" v-if="!playing || paused"
                  >mdi-play</v-icon
                >
                <v-icon color="#ffff" class="iconSize" v-else>mdi-pause</v-icon>
              </v-btn>
              <v-btn class="btnSize" color="#3D5ED4" outlined fab>
                <v-icon color="#3D5ED4" class="iconSize"
                  >mdi-chevron-double-right</v-icon
                >
              </v-btn>
            </div>
            <v-list-item-icon>
              <v-btn icon>
                <v-icon color="#172C7A" class="iconSize">mdi-repeat</v-icon>
              </v-btn>
            </v-list-item-icon>
          </div>
        </v-col>
      </v-row>
    </v-footer>
    <v-footer
      style="z-index: 500"
      fixed
      color="#fff"
      class="media-player-tm1001 hide-smAndUp"
    >
      <v-row justify="center" class="align-center" dense>
        <v-col class="avatar-media-player-tm1001" cols="12">
          <v-row class="align-center justify-space-between" dense>
            <v-col cols="auto">
              <div class="audio-info-1001">
                <span class="title-audio-tm1001">AUDIO_{{ title }}</span>
                <!-- <br />
                <span class="subtitle-audio-tm1001">Hean Prinsloo</span> -->
              </div>
            </v-col>
            <v-col cols="auto">
              <div>
                <v-btn icon>
                  <v-icon color="#172C7A" class="iconSize">mdi-shuffle</v-icon>
                </v-btn>
                <v-btn icon>
                  <v-icon color="#172C7A" class="iconSize">mdi-repeat</v-icon>
                </v-btn>
              </div>
            </v-col>
          </v-row>
        </v-col>

        <v-col cols="12">
          <div class="d-flex justify-center padBot">
            <div class="player-btn-group-1001">
              <v-btn class="btnSize" color="#3D5ED4" outlined fab>
                <v-icon color="#3D5ED4" class="iconSize"
                  >mdi-chevron-double-left</v-icon
                >
              </v-btn>
              <v-btn
                elevation="0"
                class="btnSize"
                color="#3D5ED4"
                dark
                fab
                @click.native="playing ? pause() : play()"
              >
                <v-icon color="#ffff" class="iconSize" v-if="!playing || paused"
                  >mdi-play</v-icon
                >
                <v-icon color="#ffff" class="iconSize" v-else>mdi-pause</v-icon>
              </v-btn>
              <v-btn class="btnSize" color="#3D5ED4" outlined fab>
                <v-icon color="#3D5ED4" class="iconSize"
                  >mdi-chevron-double-right</v-icon
                >
              </v-btn>
            </div>
          </div>
        </v-col>
        <v-col class="linear-playing-audio-tm1001" cols="12">
          <div>
            <v-progress-linear
              height="54"
              color="transparent"
              rounded
              class="sliding"
              style="cursor: pointer; border-radius: 30px; height: 40px"
              @click.native="setPosition()"
              :disabled="!loaded"
              v-model="percentage"
            >
              <v-img
                src="/images/resume_themes/theme1001/media/Bars.svg"
              ></v-img>
            </v-progress-linear>
            <div class="d-flex">
              <span class="timer-player-1001">00.00</span>
              <v-spacer></v-spacer>
              <span class="timer-player-1001">05:38</span>
            </div>
          </div>
        </v-col>
      </v-row>
    </v-footer>
  </div>
</template>
<script>
const formatTime = (second) =>
  new Date(second * 1000).toISOString().substr(11, 8);
export default {
  name: "vuetify-audio",
  props: {
    title: {
      type: String,
      default: null,
    },
    user_name: {
      type: String,
      default: null,
    },
    file: {
      type: String,
      default: null,
    },
    img: {
      type: String,
      default: null,
    },
    autoPlay: {
      type: Boolean,
      default: false,
    },
    ended: {
      type: Function,
      default: () => {},
    },
    canPlay: {
      type: Function,
      default: () => {},
    },
    color: {
      type: String,
      default: null,
    },
    title: {
      type: String,
      default: null,
    },
    user_name: {
      type: String,
      default: null,
    },
    downloadable: {
      type: Boolean,
      default: false,
    },
  },
  computed: {
    duration: function () {
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
    },
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
      showFooter: false,
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
      this.audio.play().then((_) => (this.playing = true));
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
    _handleLoaded: function () {
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
    _handlePlayingUI: function (e) {
      this.percentage = (this.audio.currentTime / this.audio.duration) * 100;
      this.currentTime = formatTime(this.audio.currentTime);
      this.playing = true;
    },
    _handlePlayPause: function (e) {
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
    init: function () {
      this.audio.addEventListener("timeupdate", this._handlePlayingUI);
      this.audio.addEventListener("loadeddata", this._handleLoaded);
      this.audio.addEventListener("pause", this._handlePlayPause);
      this.audio.addEventListener("play", this._handlePlayPause);
      this.audio.addEventListener("ended", this._handleEnded);
    },
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
  },
};
</script>
<style lang="scss" scoped>
.paddingY {
  padding: 1rem 1rem 1rem 0.7rem;
}
.justify-space-between {
  justify-content: space-between;
}
.thumbSize {
  width: 90px;
  height: 90px;
}
.playBtnSize {
  width: 90px !important;
  height: 90px !important;
}
.player-audio-tm1001 {
  background: #0d001a;
  box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
  border-radius: 30px;
  border: 1px solid #d3d6e4;
  width: 235px;
  height: 130px;
  display: flex;
}
.title-audio-tm1001 {
  font-family: "Muli", sans-serif;
  font-style: normal;
  font-weight: 400;
  font-size: 24px;
  line-height: 35px;
  color: #172c7a;
  cursor: pointer;
}
.subtitle-audio-tm1001 {
  font-family: "Muli", sans-serif;
  text-transform: capitalize;
  font-style: normal;
  font-weight: bold;
  font-size: 16px;
  line-height: 25px;
  color: #f8ab08;
  cursor: pointer;
}
.timer-audio-tm1001 {
  font-family: "Muli", sans-serif;
  font-style: normal;
  font-weight: normal;
  font-size: 20px;
  line-height: 30px;
  color: #bec2d4;
  cursor: pointer;
}
.timer-player-1001 {
  font-family: "Muli", sans-serif;
  font-style: normal;
  font-weight: normal;
  font-size: 20px;
  line-height: 40px;
  color: #bec2d4;
}
.audio-info-1001 {
  padding-left: 1rem;
}
.v-card:not(.v-sheet--tile):not(.v-card--shaped) {
  border-radius: 20px;
}
.v-bottom-sheet.v-dialog.v-bottom-sheet--inset {
  max-width: 100%;
}

.media-player-tm1001 {
  padding-right: 120px;
  padding-left: 120px;
  padding-top: 1.5rem;
  padding-bottom: 1rem;
}
.audio-tm1001 {
  border-radius: 20px;
  box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);

  border: 1px solid #d3d6e4;

  .v-progress-linear--rounded {
    border-radius: 20px;
  }
  .v-progress-linear__background {
    background-color: #0d001a !important;
    opacity: 1 !important;
  }
  .bottom-audio-tm1001 {
    max-width: 20px;
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

.linear-playing-audio-tm1001 {
  padding: 0 1.5rem !important;
}
.player-btn-group-1001 {
  padding: 0 1rem;
  align-self: center;
}
.player-btn-group-1001 > .v-btn {
  margin: 0 4px;
}
.btnSize {
  width: 60px !important;
  height: 60px !important;
}
.iconSize {
  width: 24px !important;
  height: 24px !important;
}
.hide-smAndUp {
  display: none;
}
@media screen and (max-width: 1024px) {
  .thumbSize {
    width: 70px;
    height: 70px;
  }
  .playBtnSize {
    width: 70px !important;
    height: 70px !important;
  }
  .hide-smAndUp {
    display: none;
  }
  .title-audio-tm1001 {
    font-family: "Muli", sans-serif;
    font-style: normal;
    font-weight: 400;
    font-size: 18px;
    line-height: 30px;
    color: #172c7a;
    cursor: pointer;
  }
  .subtitle-audio-tm1001 {
    font-family: "Muli", sans-serif;
    text-transform: capitalize;
    font-style: normal;
    font-weight: bold;
    font-size: 12px;
    line-height: 30px;
    color: #f8ab08;
    cursor: pointer;
  }
  .timer-audio-tm1001 {
    font-family: "Muli", sans-serif;
    font-style: normal;
    font-weight: normal;
    font-size: 15px;
    line-height: 23px;
    color: #bec2d4;
    cursor: pointer;
  }
  .media-player-tm1001 {
    padding-right: 1rem;
    padding-left: 1rem;
    padding-top: 1rem;
    padding-bottom: 1rem;
  }
  .player-btn-group-1001 {
    padding: 0 1rem;
  }
  .linear-playing-audio-tm1001 {
    padding: 0 1rem !important;
  }
  .audio-info-1001 {
    padding-left: 0.5rem;
  }
  .btnSize {
    width: 40px !important;
    height: 40px !important;
  }
  .iconSize {
    width: 18px !important;
    height: 18px !important;
  }
}
@media screen and (max-width: 475px) {
  .playBtnSize {
    width: 70px !important;
    height: 70px !important;
  }
  .thumbSize {
    width: 70px;
    height: 70px;
  }
  .hide-smAndUp {
    display: block;
  }
  .title-audio-tm1001 {
    font-family: "Muli", sans-serif;
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 25px;
    color: #172c7a;
    cursor: pointer;
  }
  .subtitle-audio-tm1001 {
    font-family: "Muli", sans-serif;
    text-transform: capitalize;
    font-style: normal;
    font-weight: bold;
    font-size: 9px;
    line-height: 25px;
    color: #f8ab08;
    cursor: pointer;
  }
  .timer-audio-tm1001 {
    font-family: "Muli", sans-serif;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 18px;
    color: #bec2d4;
    cursor: pointer;
  }
  .timer-player-1001 {
    font-family: "Muli", sans-serif;
    font-style: normal;
    font-weight: normal;
    font-size: 13px;
    line-height: 20px;
    color: #bec2d4;
  }
  .hide-on-mobile {
    display: none;
  }
  .btnSize {
    width: 30px !important;
    height: 30px !important;
  }
  .iconSize {
    width: 12px !important;
    height: 12px !important;
  }
  .player-btn-group-1001 {
    padding: 0 1rem;
    align-self: center;
  }
  .justify-center {
    justify-content: center;
  }
  .padBot {
    padding-bottom: 1rem;
  }
}
</style>