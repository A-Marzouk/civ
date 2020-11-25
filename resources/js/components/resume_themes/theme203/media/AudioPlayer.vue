<template>
  <v-card flat class="card-audio" color="transparent">
    <v-card-subtitle class="duration-time">{{ audioTitle }}</v-card-subtitle>
    <v-card-text class>
      <v-row dense class="main-row">
        <v-col xl="11" lg="11" md="11" sm="11" cols="12" align="left">
          <v-list-item color="transparent">
            <v-list-item-icon class="mr-n1">
              <div>
                <v-btn class="btn-play" depressed @click.prevent="playing ? pause() : play()">
                  <v-img
                    src="/images/resume_themes/theme203/icons/inner-play.svg"
                    v-if="!playing || paused"
                    style="z-index: 1005"
                  ></v-img>
                  <v-img
                    style="z-index: 1005"
                    src="/images/resume_themes/theme203/icons/inner-pause.svg"
                    v-else
                  ></v-img>
                </v-btn>
              </div>
            </v-list-item-icon>
            <v-list-item-content class="time-progress-holder">
              <v-list-item-subtitle class="">
                <v-card flat color="transparent">
                  <v-row no-gutters>
                    <v-col lg="6" sm="6" cols="6" class="">
                      <span class="mb-n4">
                        <v-card flat color="transparent" class="duration-time custom-ml">{{ currentTime }}</v-card>
                      </span>
                    </v-col>
                    <v-col lg="6" sm="6" cols="5" align="right" class="">
                      <span class="">
                        <v-card flat color="transparent" class="duration-time custom-mr">{{
                          totalDuration | secondToMinHours
                        }}</v-card>
                      </span>
                    </v-col>
                  </v-row>
                </v-card>
              </v-list-item-subtitle>
              <v-list-item-subtitle>
                <v-card flat color="transparent">
                  <v-progress-linear
                    rounded
                    tile
                    class="custom-progressbar"
                    color="transparent"
                    background-color="#E0E0E0"
                    :value="percentage"
                    height="22"
                  ></v-progress-linear>
                </v-card>
              </v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>

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
const formatTime = second => new Date(second * 1000).toISOString().substr(11, 8);
export default {
  filters: {
    secondToMinHours(sec) {
      sec = Number(sec);
      var h = Math.floor(sec / 3600);
      var m = Math.floor((sec % 3600) / 60);
      var s = Math.floor((sec % 3600) % 60);
      var newH = h < 10 ? '0' + h : h;
      var newM = m < 10 ? '0' + m : m;
      var newS = s < 10 ? '0' + s : s;
      return newH + ':' + newM + ':' + newS;
    }
  },
  name: 'AudioPlayer',
  components: {},
  props: {
    modalOpen: {
      type: Boolean,
      default: true
    },
    color: {
      type: String
    },
    index: {
      type: Number
    },
    file: {
      type: String,
      default: null
    },
    audioTitle: {
      type: String,
      default: ''
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
  data() {
    return {
      firstPlay: true,
      isMuted: false,
      loaded: false,
      playing: false,
      paused: false,
      percentage: 0,
      currentTime: '00:00:00',
      audio: undefined,
      totalDuration: 0
    };
  },

  watch: {
    modalOpen: function (val) {
      if (val == false) {
        this.stop();
      }
    }
  },
  methods: {
    setPosition() {
      this.audio.currentTime = parseInt((this.audio.duration / 100) * this.percentage);
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
        throw new Error('Failed to load sound file');
      }
    },
    _handlePlayingUI: function (e) {
      this.percentage = (this.audio.currentTime / this.audio.duration) * 100;
      this.currentTime = formatTime(this.audio.currentTime);
      this.playing = true;
    },
    _handlePlayPause: function (e) {
      if (e.type === 'play' && this.firstPlay) {
        // in some situations, audio.currentTime is the end one on chrome
        this.audio.currentTime = 0;
        if (this.firstPlay) {
          this.firstPlay = false;
        }
      }
      if (e.type === 'pause' && this.paused === false && this.playing === false) {
        this.currentTime = '00:00:00';
      }
    },
    _handleEnded() {
      this.paused = this.playing = false;
    },
    init: function () {
      this.audio.addEventListener('timeupdate', this._handlePlayingUI);
      this.audio.addEventListener('loadeddata', this._handleLoaded);
      this.audio.addEventListener('pause', this._handlePlayPause);
      this.audio.addEventListener('play', this._handlePlayPause);
      this.audio.addEventListener('ended', this._handleEnded);
    }
  },
  mounted() {
    this.audio = this.$refs.player;
    this.init();
  },
  beforeDestroy() {
    this.audio.removeEventListener('timeupdate', this._handlePlayingUI);
    this.audio.removeEventListener('loadeddata', this._handleLoaded);
    this.audio.removeEventListener('pause', this._handlePlayPause);
    this.audio.removeEventListener('play', this._handlePlayPause);
    this.audio.removeEventListener('ended', this._handleEnded);
  }
};
</script>

<style scoped lang="scss">
.custom-ml {
  margin-left: 20px;
  @media screen and (min-width: 960px) and (max-width: 1263px) {
    margin-left: 15px;
  }
  @media screen and (max-width: 599px) {
    margin-left: 5px;
  }
}
.custom-mr {
  margin-right: 20px;
  @media screen and (min-width: 960px) and (max-width: 1263px) {
    margin-right: 25px;
  }
  @media screen and (max-width: 599px) {
    margin-right: 5px;
  }
}
.card-audio {
  @media screen and (min-width: 1263px) and (max-width: 1903px) {
    padding: 20px;
  }
  .main-row {
    margin-top: -26px;
    .time-progress-holder {
      margin-top: -20px;
    }
  }
}
.duration-time {
  font-family: 'Montserrat' !important;
  font-style: normal;
  font-weight: normal;
  font-size: 18px;
  line-height: 22px;
  color: #8b8b8b !important;
  @media screen and (max-width: 400px) {
    font-size: 14px;
  }
  @media screen and (max-width: 360px) {
    font-size: 12px;
  }
  @media screen and (max-width: 340px) {
    font-size: 8px;
  }
}
.btn-play {
  width: 72px !important;
  height: 71.01px !important;
  background: #000000 !important;
  border: 5px solid #e0bb4c !important;
  border-radius: 50% !important;
  z-index: 100;
  img {
    max-width: 32px !important;
    min-width: 32px !important;
    max-height: 32px !important;
  }
}
.custom-progressbar {
  border-radius: 15px !important;
  background: #e0e0e0 !important;
  opacity: 0.7;
  margin-left: -4px;
  z-index: 0 !important;
}
</style>

<style lang="scss">
#resumeTheme203 {
  .card-audio {
    .v-progress-linear__determinate {
      overflow: hidden;
      position: absolute;
    }
    .v-progress-linear__determinate:after {
      content: '';
      display: block;
      position: absolute;
      top: 0;
      left: 0;
      background-image: linear-gradient(92.63deg, #fcd259 1.07%, #e5bf4e 51.95%, #ffde81 89.88%) !important;
      height: 100%;
      width: 100%;
      border-radius: 15px !important;
    }
  }
}
</style>