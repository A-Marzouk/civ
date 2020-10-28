<template>
  <div class="mb-8 audi-container">
    <div class="info-text mb-3">Audio-{{ audio_num }}</div>

    <div class="d-flex align-center">
      <v-btn
        fab
        color="#623CEA"
        class="btn-play"
        depressed
        @click.prevent="playing ? pause() : play()"
      >
        <v-icon color="white" x-large v-if="!playing || paused"
          >mdi-play</v-icon
        >
        <v-icon color="white" x-large v-else>mdi-pause</v-icon>
      </v-btn>
      <div class="progress_container ml-4 flex-grow-1">
        <div class="d-flex justify-space-between px-2 info-text pb-1">
          <div>{{ currentTime }}</div>
          <div>{{ totalDuration | secondToMinHours }}</div>
        </div>
        <v-progress-linear
          class="custom-progressbar"
          :value="percentage"
          height="10"
          color="#623CEA"
        ></v-progress-linear>
      </div>
      <audio
        id="player"
        ref="player"
        :modalOpen="modalOpen"
        v-on:ended="ended"
        v-on:canplay="canPlay"
        :src="file"
      ></audio>
    </div>
  </div>
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
      return newM + ":" + newS;
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
    audio_num: {
      type: Number,
      default: 0,
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
      currentTime: "00:00",
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
      console.log("playing....");
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
    console.log("mounting...", this.$refs);
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
  font-size: 18px;
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
// .custom-progressbar {
//   @media screen and (min-width: 768px) and (max-width: 959px) {
//     height: 12px !important;
//   }
// }

.audio_num {
  margin: 0 1rem;
}

.audi-container {
  background-color: #e9f6ff;
  padding: 1.2rem 6rem;
}

.info-text {
  font-size: 1.1rem;
}

.progress_container {
  transform: translateY(-13px);
}

//md screen
@media only screen and (max-width: 1260px) {
  .progress_container {
    margin-left: 0.6rem;
  }
}

//sm screen
@media only screen and (max-width: 700px) {
  .audi-container {
    padding: 1.2rem 6rem;
  }

  .audi-container {
    padding: 1.2rem 2rem;
  }

  .info-text {
    margin-bottom: 0.3rem;
  }
}

@media only screen and (max-width: 500px) {
  .progress_container {
    margin-left: 1.6rem;
  }

  .audi-container {
    padding: 1.2rem 0.8rem;
  }
}
</style>
