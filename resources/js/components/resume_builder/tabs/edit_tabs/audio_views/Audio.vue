<template>
  <div>
    <div class="content d-flex">
      <div class="upload-container d-flex flex-column">
        <h3 class="text-blue">Upload my audio</h3>
        
        <div id="audio_and_video" class="vue-dropzone">
          <svg-vue class="upload-audio-icon" icon="upload-audio-icon"></svg-vue>
          <div class="empty-text">
           &nbsp;
          </div>
          <b-button class="btn filled btn-upload" @click="$bvModal.show('main-upload-modal')">
            <svg-vue class="upload-icon icon" icon="upload-icon"></svg-vue>
            <span>Browse audio file</span>
          </b-button>
        </div>
        <!-- Insert icon -->
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
                >×</button>
              </b-col>
              <b-col cols="10" class="upload-audio-title text-center">Upload <span>Audio</span>
              <svg-vue class="voice-icon" icon="voice-icon"></svg-vue>
              </b-col>
            </b-row>
            <b-container class="bv-example-row">
              <b-row class="text-center">
                <!-- Link Url -->
                <b-col>
                  <div class="d-flex-inline upload-audio-subtitle">Link URL</div>
                  <div class="d-flex-inline">
                    <button>
                      <svg-vue class="upload-url-icon" icon="upload-url-icon"></svg-vue>
                    </button>
                  </div>
                </b-col>
                <!-- Link URL -->
                <!-- MP3 -->
                <b-col>
                  <div class="d-flex-inline upload-audio-subtitle">Upload Mp3</div>
                  <div class="d-flex-inline">
                    <button>
                      <svg-vue class="upload-url-icon" icon="mp3-icon"></svg-vue>
                    </button>
                  </div>
                </b-col>
                <!-- MP3 -->
                <!-- Record -->
                <b-col>
                  <div class="d-flex-inline upload-audio-subtitle">Record</div>
                  <div class="d-flex-inline">
                    <button>
                      <svg-vue class="microphone-icon" icon="microphone-icon"></svg-vue>
                    </button>
                  </div>
                </b-col>
                <!-- Record -->
              </b-row>
            </b-container>
          </div>
        </b-modal>
      </div>
      <!-- Audio Upload Main Modal -->

      <!-- Audio previews -->
      <div class="audios-preview-container">
        <div
          v-for="(mediaElement,index) in media"
          :key="index + '_mediaElement'"
          v-if="mediaElement.type === 'audio'"
        >
          <audio-element :mediaElement="mediaElement"></audio-element>
        </div>
      </div>
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
      errors: {}
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
</style>

<style>
/* new css */
.modal-content {
  border: 2px solid #001CE2 !important;
  border-radius: 20px !important;
}
.modal.show .modal-dialog{
  max-width: 50% !important;
  
}
.btn-close{
  color: #001AD6;
  font-size: 1.5rem;
  margin-top:-10px;
  border:none !important;
}

.upload-audio-title{
  font-size:2rem;
  margin-left: -48px;
  color:#001CE2;
}

.upload-audio-title span{
  font-weight: bold;
}

.upload-audio-subtitle{
  font-size: 1.3rem !important;
  font-weight: bold;
  color:#001CE2;
}
.upload-url-icon{
  width: 30%;
  margin-top: 15px;
}
.microphone-icon{
  width: 20%;
  margin-top: 15px;
}

.voice-icon{
  width: 4%;
  margin-left: 15px;
}

/* new css */
</style>