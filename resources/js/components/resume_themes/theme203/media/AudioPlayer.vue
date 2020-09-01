<template>
  <v-card flat class="pa-xl-0 pa-lg-5 pa-md-0 pa-0 card-audio" color="transparent">
    <v-card-subtitle class="durationTime mb-lg-n12 mb-md-n8 mb-n12">Audio-1</v-card-subtitle>
    <v-card-text class>
      <v-row dense class="mt-xl-10 mt-lg-10 mt-md-10 mt-sm-12 mt-10 mb-xl-0 mb-lg-n12 mb-mb-0">
        <v-col xl="11" lg="11" md="11" sm="10" cols="10" align="left">
          <v-list-item color="transparent">
            <v-list-item-icon class="mr-n1">
              <div>
                <v-btn class="btn-play" icon depressed @click.prevent="playing ? pause() : play()">
                  <img
                    src="/images/resume_themes/theme203/icons/play.svg"
                    v-if="!playing || paused"
                  />
                  <img src="/images/resume_themes/theme203/icons/pause.svg" v-else />
                </v-btn>
              </div>
            </v-list-item-icon>
            <v-list-item-content class="mt-xl-n12 mt-lg-n12 mt-md-n12 mt-sm-n12 mt-n12">
              <v-list-item-subtitle class="mt-4">
                <v-row no-gutters>
                  <v-col cols="1" class="ml-lg-n12 ml-md-n7"></v-col>
                  <v-col cols="5">
                    <span class="mb-n4">
                      <v-card flat color="transparent" class="durationTime">{{ currentTime }}</v-card>
                    </span>
                  </v-col>
                  <v-col cols="6" align="right">
                    <span class="mb-n4">
                      <v-card
                        flat
                        color="transparent"
                        class="durationTime"
                      >{{ totalDuration | secondToMinHours }}</v-card>
                    </span>
                  </v-col>
                </v-row>
              </v-list-item-subtitle>
              <v-list-item-subtitle>
                <v-progress-linear
                  rounded
                  tile
                  class="custom-progressbar"
                  color="yellow"
                  background-color="#E0E0E0"
                  :value="percentage"
                  height="22"
                ></v-progress-linear>
              </v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
          <!-- <v-row justify="center">
            <v-col xl="6" lg="6" md="6" cols="6">
              <div class="durationTime">{{currentTime}}</div>
            </v-col>
            <v-col xl="5" lg="5" md="6" cols="6" align="right">
              <div class="durationTime">{{totalDuration | secondToMinHours}}</div>
            </v-col>
            <v-col xl="11" lg="11" md="12" sm="12" align="left">
              <div class="d-flex flex-row">
                <div>
                  <v-btn class="btn-play" icon depressed @click.prevent="playing ? pause() : play()">
                    <img
                      src="/images/resume_themes/theme203/icons/play.svg"
                      v-if="!playing || paused"
                    />
                    <img src="/images/resume_themes/theme203/icons/pause.svg" v-else />
                  </v-btn>
                </div>

                <v-progress-linear
                  rounded
                  tile
                  class="custom-progressbar ml-lg-2 mt-lg-2"
                  color="yellow"
                  background-color="#E0E0E0"
                  :value="percentage"
                  height="22"
                ></v-progress-linear>
              </div>
            </v-col>
          </v-row>-->
          <audio
            id="player"
            ref="player"
            :modalOpen="modalOpen"
            v-on:ended="ended"
            v-on:canplay="canPlay"
            :src="file"
          ></audio>
        </v-col>
      </v-row>
    </v-card-text>
  </v-card>
</template>
<script>
const formatTime = (second) =>
  new Date(second * 1000).toISOString().substr(11, 8);
export default {
  filters: {
    secondToMinHours(sec) {
      sec = Number(sec);
      var h = Math.floor(sec / 3600);
      var m = Math.floor((sec % 3600) / 60);
      var s = Math.floor((sec % 3600) % 60);
      var newH = h < 10 ? "0" + h : h;
      var newM = m < 10 ? "0" + m : m;
      var newS = s < 10 ? "0" + s : s;
      return newH + ":" + newM + ":" + newS;
    },
  },
  name: "AudioPlayer",
  components: {},
  props: {
    modalOpen: {
      type: Boolean,
      default: true,
    },
    color: {
      type: String,
    },
    index: {
      type: Number,
    },
    file: {
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
    };
  },

  watch: {
    modalOpen: function (val) {
      if (val == false) {
        this.stop();
      }
    },
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
    },
    play() {
      if (this.playing) return;
      this.audio.play().then((_) => (this.playing = true));
      this.paused = false;
      this.playing = true;
    },
    pause() {
      this.paused = !this.paused;
      this.paused ? this.audio.pause() : this.audio.play();
      this.playing = false;
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

<style scoped lang="scss">
.durationTime {
  font-family: "Montserrat" !important;
  font-style: normal;
  font-weight: normal;
  font-size: 18px;
  line-height: 22px;
  color: #8b8b8b !important;
}
.btn-play {
  z-index: 100;
  img {
    @media screen and (max-width: 1263px) {
      width: 73px;
      height: 72px;
    }
  }
}
.custom-progressbar {
  border-radius: 15px !important;
  background: #e0e0e0 !important;
  opacity: 0.7;
  @media screen and (min-width: 768px) and (max-width: 959px) {
    height: 12px !important;
  }
}
</style>

<style lang="scss">
#resumeTheme203 {
  .card-audio {
    .v-progress-linear__determinate {
      border-radius: 15px !important;
    }
  }
}
</style>