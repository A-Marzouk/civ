<template>
  <v-card flat class="pa-md-0 pa-0" color="transparent">
    <v-card-text class="ml-xl-6 ml-lg-6">
      <v-row justify="center" dense class="mt-xl-0 mt-lg-0 mt-md-10 mt-sm-12 mt-10">
        <v-col xl="1" lg="1" md="1" sm="1" cols="2">
          <v-btn
            fab
            color="#FC5C8A"
            class="btn-play"
            depressed
            @click.prevent="playing ? pause() : play()"
          >
            <v-icon color="white" x-large v-if="!playing || paused">mdi-play</v-icon>
            <v-icon color="white" x-large v-else>mdi-pause</v-icon>
          </v-btn>
        </v-col>
        <v-col xl="11" lg="11" md="11" sm="11" cols="10" align="left" class="mt-n8">
          <v-row>
            <v-col xl="6" lg="6" md="6" cols="6">
              <div class="durationTime">{{currentTime}}</div>
            </v-col>
            <v-col xl="5" lg="5" md="6" cols="6" align="right">
              <div class="durationTime">{{totalDuration | secondToMinHours}}</div>
            </v-col>
            <v-col xl="11" lg="11" md="12" sm="12" align="left">
              <v-progress-linear
                class="custom-progressbar"
                :value="percentage"
                height="8"
                :color="color"
              ></v-progress-linear>
            </v-col>
          </v-row>
          <audio id="player" ref="player" v-on:ended="ended" v-on:canplay="canPlay" :src="file"></audio>
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

  computed: {},
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
  font-size: 22px;
  color: #343434 !important;
}
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
.custom-progressbar {
  @media screen and (min-width: 768px) and (max-width: 959px) {
    height: 12px !important;
  }
}
</style>
