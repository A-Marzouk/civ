<template>
  <div>
    <v-card color="#F0F0F3" style="border-radius:9px;" hover>
      <v-card-text>
        <v-list-item>
          <v-list-item-content>
            <v-list-item-title class="audio-title"
              >AUDIO 02 - 07/04/2020</v-list-item-title
            >
            <v-list-item-subtitle class="audio-duration"
              >1:05:00</v-list-item-subtitle
            >
          </v-list-item-content>
          <v-spacer></v-spacer>
          <v-list-item-icon>
            <v-btn
              class="play-btn"
              color="#5843BE"
              depressed
              fab
              small
              @click.native="playing ? pause() : play()"
            >
              <v-icon color="#ffff" large v-if="!playing || paused"
                >mdi-play</v-icon
              >
              <v-icon color="#ffff" large v-else>mdi-pause</v-icon>
            </v-btn>
          </v-list-item-icon>
        </v-list-item>
      </v-card-text>
      <v-card-text class="ml-3 mt-n10">
        <v-row>
          <v-col cols="9">
            <v-progress-linear
              style="border:3px solid #EEEEEE; border-radius:12px;"
              class="custom-progress-bar"
              color="#5843BE"
              rounded
              @click.native="setPosition()"
              :disabled="!loaded"
              v-model="percentage"
              background-color="#eeeeee"
              height="15"
              :value="60"
            ></v-progress-linear>
          </v-col>
        </v-row>
      </v-card-text>
      <audio
        style="display:none"
        id="player"
        ref="player"
        v-on:ended="ended"
        v-on:canplay="canPlay"
        :src="audioMedia.url"
      ></audio>
    </v-card>
  </div>
</template>
<script>
const formatTime = second =>
  new Date(second * 1000).toISOString().substr(11, 8);
export default {
  name: "audioMedia",
  props: {
    audioMedia: {
      type: Object,
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
    // download() {
    //   this.audio.pause();
    //   window.open(this.file, "download");
    // },
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
// about me
//media
.audio-title {
  font-family: "Poppins", sans-serif !important;
  line-height: 27px;
}
.audio-duration {
  font-family: "Poppins", sans-serif !important;
  color: rgba(88, 67, 190, 0.55) !important;
  font-size: 0.75rem !important;
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