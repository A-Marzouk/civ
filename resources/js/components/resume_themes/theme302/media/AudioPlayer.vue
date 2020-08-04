<template>
  <div class="audio_player">
    <v-container fluid pa-0>
      <v-row justify="center" align="center">
        <v-col cols="10">
          <v-row justify="center" align="center">
            <v-col cols="12" sm="auto"
              ><div class="audio-title">
                Audio-1
              </div></v-col
            >
            <v-col cols="3" sm="auto">
              <v-img
                src="/images/resume_themes/theme302/halfCircle.svg"
                max-width="60"
                class="text-center align-center justify-center align-self-center"
              >
                <v-btn
                  color="#104efb"
                  x-small
                  fab
                  depressed
                  class="align-center justify-center mr-1"
                  @click.prevent="playing ? pause() : play()"
                >
                  <v-icon color="#fff" v-if="!playing || paused"
                    >mdi-play</v-icon
                  >
                  <v-icon color="#ffff" v-else>mdi-pause</v-icon>
                </v-btn>
              </v-img>
            </v-col>
            <v-col cols="9" sm="8">
              <div class="float-left timer pb-2">{{ currentTime }}</div>
              <div class="float-right timer pb-2">05:38</div>
              <div class="progress-bar-back flex-nowrap d-flex">
                <div
                  class="progress-bar-front"
                  :style="'width:' + percentage + '%;'"
                ></div>
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
      </v-row>
    </v-container>
  </div>
</template>
<script>
const formatTime = second =>
  new Date(second * 1000).toISOString().substr(11, 8);
export default {
  props: {
    index: {
      type: Number
    },
    file: {
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
    }
  },
  computed: {
    duration: function() {
      return this.audio ? formatTime(this.totalDuration) : "";
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
      currentTime: "00:00",
      audio: undefined,
      totalDuration: 0
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
    },
    play() {
      if (this.playing) return;
      this.audio.play().then(_ => (this.playing = true));
      this.paused = false;
    },
    pause() {
      this.paused = !this.paused;
      this.paused ? this.audio.pause() : this.audio.play();
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
        this.currentTime = "00:00";
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
.timer {
  font-family: "Raleway";
  font-style: normal;
  font-weight: 300;
  font-size: 18px;
  line-height: 21px;

  color: #104efb;

  text-shadow: 0px 0px 20px rgba(255, 255, 255, 0.2);
}
.progress-bar-back {
  background: rgba(16, 78, 251, 0.12);
  width: 100%;
  height: 1px;
}
.progress-bar-front {
  background: #104efb;
  height: 3px;
}
</style>