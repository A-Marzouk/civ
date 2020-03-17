<template>
  <div>
    <div class="content d-flex">
      <div class="upload-container d-flex flex-column">
        <h3 class="text-blue">Upload my video</h3>
        <vue2Dropzone id="audio_and_video" :options="dropzoneOptions" :useCustomSlot="true">
          <svg-vue class="upload-audio-icon" icon="upload-audio-icon"></svg-vue>
          <div class="empty-text">
            Drag and drop video files
            <br />or
          </div>
          <button class="btn filled btn-upload">
            <svg-vue class="upload-icon icon" icon="upload-icon"></svg-vue>

            <span>Browse video file</span>
          </button>
        </vue2Dropzone>
        <!-- Insert icon -->
      </div>

      <!-- Audio previews -->
      <div class="audios-preview-container">
      </div>
    </div>
  </div>
</template>

<script>
export default {
  components:{
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
      errors: {}
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