<template>
  <div class="media__content__audio_player">
    <div class="media__content__audio_player_left">
      <div class="media__content__audio_player_left__button">
        <a
          href="javascript:void(0)"
          @click.prevent="playing ? pause() : play()"
        >
          <img
            src="/images/resume_themes/theme3/play.svg"
            v-if="!playing || paused"
            alt="audio play"
          />
          <img
            src="/images/resume_themes/theme3/pause.svg"
            v-else
            alt="audio pause"
          />
        </a>
      </div>
    </div>
    <div class="media__content__audio_player_right">
      <div class="media__content__audio_player_right_timer">
        <div class="media__content__audio_player_right_timer_start">
          {{ currentTime }}
        </div>
        <div class="media__content__audio_player_right_timer_end">
          05:38
        </div>
      </div>
      <div class="media__content__audio_player_right_progress">
        <div class="media__content__audio_player_right_progress_bar">
          <div
            class="media__content__audio_player_right_progress_bar_value"
            :style="'width:' + percentage + '%;'"
          ></div>
        </div>
      </div>
    </div>
    <audio
      id="player"
      ref="player"
      v-on:ended="ended"
      v-on:canplay="canPlay"
      :src="file"
    ></audio>
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
      currentTime: "00:00:00",
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
.media__content__audio_player {
  margin: 1rem auto;
  width: 60% !important;
  height: 60px;
  display: flex !important;
  flex-wrap: nowrap;
  @media only screen and (min-width: 650px) and (max-width: 1024px) {
    width: 100% !important;
    margin: 1rem 1rem;
  }
  @media only screen and (min-width: 320px) and (max-width: 500px) {
    width: 100% !important;
    margin: 1rem 1rem;
  }
  &_left {
    width: 5%;
    height: auto;
    display: block;
    @media only screen and (min-width: 650px) and (max-width: 1024px) {
      width: 10%;
    }
    @media only screen and (min-width: 320px) and (max-width: 500px) {
      width: 14%;
    }
    &_button {
      width: 40px;
      height: 40px;
      @media only screen and (min-width: 650px) and (max-width: 1024px) {
        width: 67px;
        height: 67px;
      }
      @media only screen and (min-width: 320px) and (max-width: 500px) {
        width: 67px;
        height: 67px;
      }
      a > img {
        width: 40px;
        height: 40px;
        @media only screen and (min-width: 650px) and (max-width: 1024px) {
          width: 67px;
          height: 67px;
        }
        @media only screen and (min-width: 320px) and (max-width: 500px) {
          width: 67px;
          height: 67px;
        }
      }
    }
  }
  &_right {
    width: 95%;
    height: auto;
    display: block;
    padding: 0 1.5rem;
    @media only screen and (min-width: 650px) and (max-width: 1024px) {
      width: 90%;
    }
    @media only screen and (min-width: 320px) and (max-width: 500px) {
      width: 86%;
    }

    &_timer {
      width: 100%;
      margin: auto;

      &_start {
        font-family: Open Sans;
        font-style: normal;
        font-weight: 300;
        font-size: 21px;
        line-height: 29px;
        /* identical to box height */

        color: #5289e7;
        float: left;
        @media only screen and (min-width: 650px) and (max-width: 1024px) {
          font-size: 16px;
        }
        @media only screen and (min-width: 320px) and (max-width: 500px) {
          font-size: 12px;
        }
      }
      &_end {
        font-family: Open Sans;
        font-style: normal;
        font-weight: 300;
        font-size: 21px;
        line-height: 29px;
        /* identical to box height */

        color: #5289e7;
        float: right;
        @media only screen and (min-width: 650px) and (max-width: 1024px) {
          font-size: 16px;
        }
        @media only screen and (min-width: 320px) and (max-width: 500px) {
          font-size: 12px;
        }
      }
    }
    &_progress {
      width: 100%;
      margin: auto;
      display: flex;
      flex-wrap: nowrap;
      &_bar {
        width: 100%;
        height: 5px;
        border-radius: 100px;
        background: rgba(82, 137, 231, 0.2);
        &_value {
          height: 5px;
          border-radius: 100px;
          background: #5289e7;
        }
      }
    }
  }
}
</style>