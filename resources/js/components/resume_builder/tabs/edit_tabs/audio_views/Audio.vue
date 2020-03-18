<template>
  <div>
    <div class="content d-flex">
      <div class="upload-container d-flex flex-column">
        <h3 class="text-blue">Upload my audio</h3>

        <div id="audio_and_video" class="vue-dropzone">
          <svg-vue class="upload-audio-icon" icon="upload-audio-icon"></svg-vue>
          <div class="empty-text">
            <br />
          </div>
          <b-button class="btn filled btn-upload" @click="$bvModal.show('main-upload-modal')">
            <svg-vue class="upload-icon icon" icon="upload-icon"></svg-vue>
            <span>Browse audio file</span>
          </b-button>
        </div>
        <!-- Insert icon -->
      </div>

      <div class="upload-container d-flex flex-column" style="margin-left:-5vw;">
        <div class="audios-preview-container">
          <audio-element v-for="i in 2" :key="i" :name="'Audio ' + i"></audio-element>
        </div>
      </div>

      <!-- Audio Upload Main Modal -->
      <div>
        <b-modal id="main-upload-modal" style="max-width:60% !important;" hide-footer hide-header>
          <div class="d-block">
            <b-row>
              <b-col cols="2" align-h="start">
                <button
                  type="button"
                  align="left"
                  aria-label="Close"
                  @click="$bvModal.hide('main-upload-modal')"
                  class="btn-close"
                  v-if="currentItem == null"
                >×</button>

                <button
                  type="button"
                  align="left"
                  aria-label="Close"
                  @click="currentItem=null"
                  class="btn-close"
                  v-if="currentItem != null"
                >
                  <svg-vue class="audio-back-icon" icon="audio-back-icon"></svg-vue>
                </button>
              </b-col>
              <b-col cols="10" class="upload-audio-title text-center">
                Upload
                <span>Audio</span>
                <svg-vue class="voice-icon" icon="voice-icon"></svg-vue>
              </b-col>
            </b-row>
            <!-- Main Function Buttons -->
            <transition name="bounce">
              <b-container class="bv-example-row" v-if="currentItem==null">
                <b-row class="text-center">
                  <!-- Link Url -->
                  <b-col>
                    <div class="d-flex-inline upload-audio-subtitle">Link URL</div>
                    <div class="d-flex-inline">
                      <button @click="currentItem='linkUrl' ">
                        <svg-vue class="upload-url-icon" icon="upload-url-icon"></svg-vue>
                      </button>
                    </div>
                  </b-col>
                  <!-- Link URL -->
                  <!-- MP3 -->
                  <b-col>
                    <div class="d-flex-inline upload-audio-subtitle">Upload Mp3</div>
                    <div class="d-flex-inline">
                      <input type="file" ref="file" style="display: none" accept=".mp3" />
                      <button @click="$refs.file.click()">
                        <svg-vue class="mp3-icon" icon="mp3-icon"></svg-vue>
                      </button>
                    </div>
                  </b-col>
                  <!-- MP3 -->
                  <!-- Record -->
                  <b-col>
                    <div class="d-flex-inline upload-audio-subtitle">Record</div>
                    <div class="d-flex-inline">
                      <button @click="currentItem='record'">
                        <svg-vue class="microphone-icon" icon="microphone-icon"></svg-vue>
                      </button>
                    </div>
                  </b-col>
                  <!-- Record -->
                </b-row>
              </b-container>
            </transition>
            <!-- Main Function Buttons -->
            <!-- Link Upload Child -->

            <b-container v-if="currentItem=='linkUrl'" class="bv-example-row">
              <b-row align-v="center">
                <b-col cols="2" class="link-title-text">Link URL</b-col>
                <b-col cols="8">
                  <b-form-input type="url" class="link-input" placeholder="link here"></b-form-input>
                </b-col>
                <b-col col="2">
                  <button>
                    <svg-vue class="link-btn-icon" icon="link-btn-icon"></svg-vue>
                  </button>
                </b-col>
              </b-row>
            </b-container>
            <!-- Link Upload Child -->

            <!-- <b-container v-if="currentItem=='mp3Upload'">
              <b-row>
                <b-col>Mp3</b-col>
              </b-row>
            </b-container>-->

            <b-container v-if="currentItem=='record'">
              <b-row class="justify-content-md-center">
                <b-col col lg="2">
                  <svg-vue class="microphone-icon" icon="microphone-icon"></svg-vue>
                </b-col>

                <b-col col lg="2">
                  <button>
                    <svg-vue class="cancel-record-icon" icon="cancel-record-icon"></svg-vue>
                  </button>
                </b-col>
                <b-col col lg="2" class="time-col">
                  <span class="red-dot">.</span>
                  <span class="recording-time-text">0.07</span>
                </b-col>
                <b-col col lg="2">
                  <button>
                    <svg-vue class="done-record-icon" icon="done-record-icon"></svg-vue>
                  </button>
                </b-col>
              </b-row>
            </b-container>
          </div>
        </b-modal>
      </div>
      <!-- Audio Upload Main Modal -->

      <!-- Audio previews -->
      <!-- <div class="audios-preview-container">
        <div
          v-for="(mediaElement,index) in media"
          :key="index + '_mediaElement'"
          v-if="mediaElement.type === 'audio'"
        >
          <audio-element :mediaElement="mediaElement"></audio-element>
        </div>
      </div>-->
    </div>
  </div>
</template>

<script>
import audioElement from "../includes/audio-element";
export default {
  components: {
    audioElement
  },
  data() {
    return {
      dropzoneOptions: {
        url: "https://httpbin.org/post",
        thumbnailWidth: 150,
        maxFilesize: 0.5,
        acceptedFiles: "audio/*"
      },
      audios: [{}],
      errors: {},
      allUploadBtn: true,
      currentItem: null
    };
  },
  computed: {
    media() {
      return this.$store.state.user.media;
    }
  },
  methods: {}
};
</script>

<style scoped lang="scss">
$mainBlue: #001ce2;

.upload-container {
  position: relative;
  width: 354px;
  margin-right: 232px;

  h3 {
    font-size: 28px;
    position: relative;
    width: 100%;
    text-align: center;

    &::after {
      position: absolute;
      bottom: -30px;
      left: 0;
      content: "";
      width: 100%;
      height: 2px;
      background: $mainBlue;
    }
  }
}

.vue-dropzone {
  box-sizing: border-box;
  max-width: 100%;
  padding-top: 30px;
  height: 225px;
  margin-top: 98px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.upload-audio-icon {
  height: 48px;
  margin-bottom: 10px;
}

.upload-icon {
  width: 25px;
}

.btn-upload {
  width: 214px;
  margin: 0 auto;
  font-size: 16px !important;
}

.audios-preview-container {
  margin-top: 10px;
}

/* aninamtion */
.bounce-enter-active {
  animation: bounce-in 0.5s;
}
.bounce-leave-active {
  animation: bounce-in 0.5s reverse;
}
@keyframes bounce-in {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(1.5);
  }
  100% {
    transform: scale(1);
  }
}
/* animation */
</style>

<style>
/* new css */
.modal-content {
  border: 2px solid #001ce2 !important;
  border-radius: 20px !important;
}
.modal.show .modal-dialog {
  max-width: 55% !important;
}
.btn-close {
  color: #001ad6;
  font-size: 1.5rem;
  margin-top: -10px;
  border: none !important;
}

.upload-audio-title {
  font-size: 2rem;
  margin-left: -48px;
  color: #001ce2;
}

.upload-audio-title span {
  font-weight: bold;
}

.upload-audio-subtitle {
  font-size: 1.3rem !important;
  font-weight: bold;
  color: #001ce2;
}
.upload-url-icon {
  width: 50px !important;
  height: auto;
  margin-top: 15px;
}

.mp3-icon {
  width: 50px !important;
  margin-top: 15px;
}
.microphone-icon {
  width: 30px !important;
  margin-top: 15px;
}

.voice-icon {
  width: 20px !important;
  margin-left: 15px;
}
.audio-back-icon {
  width: 10px !important;
}
/* Child Modal */
.link-title-text {
  color: #001ce2 !important;
  font-size: 1rem !important;
  font-weight: bold !important;
}

.link-input {
  border: 1px solid #001ce2 !important;
}
.link-btn-icon {
  width: 60%;
}
.red-dot-icon {
  width: 10px;
}

.red-dot {
  color: #ff0707;
  font-size: 3rem;
}
.recording-time-text {
  font-size: 1.8rem;
  color: #001ce2;
}

.cancel-record-icon {
  width: 50px;
  margin-top: 16px;
}

.done-record-icon {
  width: 50px;
  margin-top: 16px;
}
.time-col {
  margin-right: 37px;
  margin-top: -2px;
}
/* Child Modal */

/* new css */
</style>