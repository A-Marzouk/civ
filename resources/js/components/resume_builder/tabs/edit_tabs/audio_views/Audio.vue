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
          <div class="audio-element" v-for="(audio,index) in audios" :key="audio.id" v-if="audio.type === 'audio'">
            <div class="audio-name">{{audio.title}}</div>
            <div class="audio-player d-flex align-items-center">
              <svg-vue class="play-icon" icon="play-icon"></svg-vue>
              <svg-vue class="sound-frecuency" icon="sound-frecuency"></svg-vue>

              <div class="order-controls d-flex flex-column">
                <button class="icon">
                  <svg-vue icon="arrow-up"></svg-vue>
                </button>
                <button class="icon">
                  <svg-vue icon="arrow-down"></svg-vue>
                </button>
              </div>

              <div class="input-select select-audio-options dropdown">
                <button class="audio-options dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Option
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="javascript:void(0)" @click="deleteMedia(audio)">
                    <svg-vue class="option-icon" icon="trash-delete-icon"></svg-vue>Delete
                  </a>
                </div>
              </div>
            </div>
          </div>
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
                  v-if="currentUploadMethod == null"
                >×</button>

                <button
                  type="button"
                  align="left"
                  aria-label="Close"
                  @click="currentUploadMethod=null"
                  class="btn-close"
                  v-if="currentUploadMethod != null"
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
              <b-container class="bv-example-row" v-if="currentUploadMethod==null">
                <b-row class="text-center">
                  <!-- Link Url -->
                  <b-col>
                    <div class="d-flex-inline upload-audio-subtitle">Link URL</div>
                    <div class="d-flex-inline">
                      <button @click="currentUploadMethod='linkUrl' ">
                        <svg-vue class="upload-url-icon" icon="upload-url-icon"></svg-vue>
                      </button>
                    </div>
                  </b-col>
                  <!-- Link URL -->
                  <!-- MP3 -->
                  <b-col>
                    <div class="d-flex-inline upload-audio-subtitle">Upload Mp3</div>
                    <div class="d-flex-inline">
                      <input type="file" ref="audio" style="display: none" @change="handleAudioUpload" accept=".mp3" />
                      <button @click="$refs.audio.click()">
                        <svg-vue class="mp3-icon" icon="mp3-icon"></svg-vue>
                      </button>
                    </div>
                  </b-col>
                  <!-- MP3 -->
                  <!-- Record -->
                  <b-col>
                    <div class="d-flex-inline upload-audio-subtitle">Record</div>
                    <div class="d-flex-inline">
                      <button @click="currentUploadMethod='record'">
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

            <b-container v-if="currentUploadMethod=='linkUrl'" class="bv-example-row">
              <b-row align-v="center">
                <b-col cols="2" class="link-title-text">Link URL</b-col>
                <b-col cols="8">
                  <b-form-input type="url" class="link-input" placeholder="link here" v-model="newAudio.url"></b-form-input>
                </b-col>
                <b-col>
                  <button @click="uploadMedia">
                    <svg-vue class="link-btn-icon" icon="link-btn-icon"></svg-vue>
                  </button>
                </b-col>
              </b-row>
            </b-container>

            <b-container v-if="currentUploadMethod=='record'">
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
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      newAudio: {
        title: 'Audio',
        type: 'audio',
        url:'',
        mediaFile: null
      },
      errors: {},
      currentUploadMethod: null,
    }
  },
  computed: {
    audios() {
      return this.$store.state.user.media;
    }
  },
  methods: {
    handleAudioUpload() {
      this.newAudio.mediaFile = this.$refs.audio.files[0];
      this.uploadMedia();
    },
    uploadMedia() {
      let formData = new FormData();

      $.each(this.newAudio, (field) => {
        if(this.newAudio[field] !== null){
          formData.append(field, this.newAudio[field]);
        }
      });

      this.$bvModal.hide('main-upload-modal');
      this.currentUploadMethod = null;

      const config = {
        onUploadProgress: progressEvent => {
          let progress = (progressEvent.loaded/progressEvent.total) * 100 ;
          $('#progressBar').css('width',progress + '%');
        } ,
        headers:{'Content-Type': 'multipart/form-data'}
      };

      axios.post('/api/user/media', formData , config)
              .then((response) => {
                let addedMedia = response.data.data;
                this.audios.push(addedMedia);
                this.clearMedia();
                setTimeout(() => {
                  $('#progressBar').css('width',0);
                }, 2000);
                this.$store.dispatch('flyingNotification');
              })
              .catch((error) => {
                if (typeof error.response.data === 'object') {
                  this.errors.new = error.response.data.errors;
                } else {
                  this.errors.new = 'Something went wrong. Please try again.';
                }
                this.$store.dispatch('flyingNotification',{message:'Error',iconSrc:'/images/resume_builder/error.png'});
              });
    },
    clearMedia() {
      this.newAudio = {
        title: 'Audio',
        type: 'audio',
        mediaFile: null
      };
    },
    deleteMedia(mdeia){
      if (!confirm('Do you want to delete this Audio ?')) {
        return;
      }
      axios.delete('/api/user/media/' + mdeia.id)
              .then((response) => {
                this.$store.dispatch('flyingNotificationDelete');
                this.audios.forEach( (audio,index) => {
                  if(audio.id === response.data.data.id){
                    this.audios.splice(index,1);
                  }
                });
              })
              .catch(error => {
                console.log(error);
                this.$store.dispatch('flyingNotification',{message:'Error',iconSrc:'/images/resume_builder/error.png'});
              })
    }
  },
};
</script>

<style  lang="scss" scoped>
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

.audio-element {
  position: relative;
  margin-bottom: 50px;

  .audio-name {
    font-family: "Noto Sans", Arial, Helvetica, sans-serif;
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 18px;
  }
  .order-controls {
    right: -27px;
    position: absolute;
    z-index: 2;
    .icon {
      padding: 0 !important;
      background: none;
      border: none;
      outline:none;
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      svg {
        width: 12px;
        height: 6px;
      }

      &:first-child {
        margin-bottom: 15px;
      }
    }
  }
  .select-audio-options {
    position: absolute;
    bottom: 7px;
    right: 19px;
    height: 22px;
    border-radius: 5px;
    border: 1px solid $mainBlue;
    width: 67px;
    display: flex;
    align-items: center;
    .caret-icon {
      position: absolute;
      z-index: 3;
      height: 5px;
      width: 10px;
      right: 6px;
    }
  }
}
.audio-player {
  border: 1px solid $mainBlue;
  border-radius: 25px;
  height: 91px;
  width: 350px;
  padding-left: 36px;
  .play-icon {
    width: 30px;
  }
  .sound-frecuency {
    width: 210px;
    margin-left: 25px;
  }
}

</style>

<style>
  .modal.show .modal-dialog.modal-md {
    max-width: 55% !important;
  }
</style>
