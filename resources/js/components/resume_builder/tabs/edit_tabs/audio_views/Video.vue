<template>
  <div>
    <div class="content d-flex">
      <div class="upload-container d-flex flex-column">
        <h3 class="text-blue">Upload my video</h3>
        <div id="audio_and_video" class="vue-dropzone">
          <svg-vue class="upload-audio-icon" icon="upload-audio-icon"></svg-vue>
          <div class="empty-text">
            <br />
          </div>
          <b-button class="btn filled btn-upload" @click="$bvModal.show('main-upload-modal')">
            <svg-vue class="upload-icon icon" icon="upload-icon"></svg-vue>
            <span>Browse video file</span>
          </b-button>
        </div>
        <!-- Insert icon -->
      </div>

      <!-- Preview video -->
      <div class="upload-container d-flex flex-column" style="margin-left:-5vw;">
        <div class="audios-preview-container">
          <video-element v-for="i in 2" :key="i" :name="'Video ' + i"></video-element>
        </div>
      </div>

      <!-- preview video -->

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
                <span>Video</span>
                <svg-vue class="video-icon" icon="video-icon"></svg-vue>
              </b-col>
            </b-row>
            <!-- Main Function Buttons -->
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

                <!-- Upload Video -->
                <b-col>
                  <div class="d-flex-inline upload-audio-subtitle">Upload Video</div>
                  <div class="d-flex-inline">
                    <input type="file" ref="file" style="display: none" accept=".webm, .ogg, .mp4" />
                    <button @click="$refs.file.click()">
                      <svg-vue class="video-upload-icon" icon="video-upload-icon"></svg-vue>
                    </button>
                  </div>
                </b-col>
                <!-- Upload Video -->
              </b-row>
            </b-container>

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
          </div>
        </b-modal>
      </div>
      <!-- Audio Upload Main Modal -->
    </div>
  </div>
</template>

<script>
import videoElement from "../includes/video-elements";
export default {
  components: {
    videoElement
  },
  data() {
    return {
      dropzoneOptions: {
        url: "https://httpbin.org/post",
        thumbnailWidth: 150,
        maxFilesize: 0.5,
        acceptedFiles: "video/*"
      },
      videos: [{}],
      errors: {},
      allUploadBtn: true,
      currentItem: null,
      overlay: true
    };
  },
  methods: {},
  computed: {}
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

.video-upload-icon {
  width: 40px !important;
  margin-top: 15px;
}

.video-icon {
  width: 40px !important;
  margin-left: 15px;
  margin-top: -18px;
}

/* Child Modal */

/* Child Modal */

/* new css */
</style>