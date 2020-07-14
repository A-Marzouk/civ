<template>
  <v-app class="media-contents">
    <div style="width:100%;">
      <v-tabs class="resume-builder__tab-bar" hide-slider v-model="audioTab">
        <v-tab class="resume-builder__tab" v-for="(tabName,i) in tabs" :key="i" @click="changeTab(tabName)">{{tabName}}</v-tab>
      </v-tabs>
      <v-card
        class="card-main pa-lg-10 pa-md-10 pa-sm-3 pa-3 resume-builder__scroll main-content"
        flat
      >
        <v-tabs-items v-model="audioTab">
          <!-- Audio tab -->
          <v-tab-item>
            <v-container style="width: 100%;">
              <v-form v-if=" currentUploadMethod === 'upload' ">
                <v-row align="center">
                  <v-col xl="3" lg="4" md="6" sm="6" cols="12" class="mb-md-0 mb-sm-0 mb-n2">
                    <v-input
                      class="resume-builder__input civie-dropzone v-text-field v-text-field--outlined v-text-field--enclosed"
                      outlined
                      label="Upload File"
                      hint="(Maximum 1 files)"
                      height="50"
                      :error="!!errors.url"
                    >
                      <vue-dropzone
                        class="civie-dropzone-input"
                        ref="filesDropZone_0"
                        id="dropzone_0"
                        :options="dropzoneOptions"
                        :useCustomSlot="true"
                        v-on:vdropzone-file-added="handlingEvent"

                      >
                        <div class="dropzone-custom-content d-flex flex-row" style="float:left;">
                          <div class="mr-5">
                            <svg-vue class="icon" :icon="'upload-input-icon'"></svg-vue>
                          </div>
                          <div class="upload-text">Browse/Drag</div>
                        </div>
                      </vue-dropzone>
                    </v-input>
                  </v-col>
                  <v-col cols="12" class="hidden-sm-and-up mt-n12 mb-n2">
                    <label class="label-or">or</label>
                  </v-col>
                  <v-col xl="3" lg="4" md="6" sm="6" cols="12" class="mt-md-0 mt-sm-0 mt-n12">
                    <v-text-field
                      class="resume-builder__input civie-input"
                      outlined
                      v-model="newMedia.url"
                      :error="!!errors.url"
                      color="#001CE2"
                    >
                      <template v-slot:prepend>
                        <label class="label-or hidden-xs-only">or</label>
                      </template>
                      <template v-slot:prepend-inner>
                        <img
                          class="ml-3 mt-n1"
                          src="/images/new_resume_builder/icons/main/link.svg"
                        />
                      </template>
                    </v-text-field>
                  </v-col>
                  <v-col xl="3" lg="4" md="6" sm="6" cols="12">
                    <v-btn
                      class="resume-builder__btn civie-btn filled btn-add-new mt-xl-1 mt-lg-1 mt-md-1 mt-sm-n8 mt-n8"
                      depressed
                      @click="uploadMedia"
                    >Add New</v-btn>
                  </v-col>
                </v-row>
              </v-form>

              <v-row>
                <v-col xl="3" lg="4" md="6" sm="6" cols="12" v-if="currentUploadMethod === 'upload' ">
                  <v-btn
                          class="resume-builder__btn civie-btn filled btn-add-new"
                          depressed
                          @click="currentUploadMethod = 'record' "
                  >Record</v-btn>
                </v-col>
              </v-row>
              <v-row>
                <v-col xl="3" lg="4" md="6" sm="6" cols="12" v-if="currentUploadMethod === 'record' ">
                  <v-btn
                          class="resume-builder__btn civie-btn filled btn-add-new mt-xl-1 mt-lg-1 mt-md-1 mt-sm-n8 mt-n8"
                          depressed
                          @click="currentUploadMethod = 'upload' "
                  >Back</v-btn>
                </v-col>
              </v-row>

              <div class="w-100 d-flex justify-content-center audio-recorder" v-if="currentUploadMethod === 'record' && audioTab === 0 ">
                <audio-recorder :attempts="1" :time="3" :after-recording="recordingFinish"
                                :show-upload-button="false"/>
              </div>

              <draggable v-if="medias"  v-model="medias" @start="drag=true" @end="drag=false"  handle=".drag-handler">
                <v-row align="center" dense v-for="media in medias" :key="media.id">

                <v-col xl="7" :lg="windowWidth<1440 ? '9' : '7' " md="9" sm="12" cols="12" v-show="audioTab === 0 && media.type === 'audio'">
                    <!-- audio card -->
                    <v-card class="card-holder pa-2 mb-3 mt-3">
                      <v-row justify="center">
                        <v-col
                          xl="1"
                          lg="1"
                          md="1"
                          sm="1"
                          cols="4"
                          class=" drag-handler mt-xl-n2 mt-lg-n2 mt-md-n3 mt-sm-n3 mt-0"
                          :align="windowWidth<767?'left':'center'"
                        >
                          <v-btn color="#ffffff" class="btn-v_bar" depressed>
                            <v-icon color="#888DB1">mdi-dots-vertical</v-icon>
                          </v-btn>
                        </v-col>
                        <v-col
                          xl="1"
                          lg="1"
                          md="1"
                          sm="1"
                          cols="1"
                          class="mt-xl-n5 mt-lg-n5 mt-md-n5 mt-sm-n5 mt-0 hidden-xs-only"
                        >
                          <div class="vertical-line"></div>
                        </v-col>
                        <v-col
                          xl="6"
                          lg="7"
                          md="7"
                          :sm="windowWidth<=767?'6':'7'"
                          cols="7"
                          class="hidden-xs-only"
                          style="margin-top:-15px;"
                        >
                          <audio controls class="audio-controller ml-xl-n4">
                            <source :src="media.url" />
                          </audio>
                        </v-col>
                        <v-col
                          xl="4"
                          lg="3"
                          md="3"
                          :sm="windowWidth<=767?'4':'3'"
                          cols="8"
                          align="right"
                          class="action-col resume-builder__action-buttons-container"
                        >
                          <v-btn
                                  class="btn-icon civie-btn"
                                  depressed @click="toggleMedia(media)"
                          >
                            <svg-vue
                                    icon="eye-icon"
                                    :class="{'visible' : media.is_public}"
                                    class="icon"
                            ></svg-vue>
                          </v-btn>
                          <v-btn
                                  class="btn-icon civie-btn"
                                  @click="deleteMedia(media)"
                                  depressed
                          >
                            <svg-vue
                                    icon="trash-delete-icon"
                                    class="icon"
                            ></svg-vue>
                          </v-btn>
                        </v-col>
                        <v-col cols="12" class="hidden-sm-and-up" align="center">
                          <audio controls class="audio-controller">
                            <source :src="media.url" />
                          </audio>
                        </v-col>
                      </v-row>
                    </v-card>
                    <!-- audio card -->
                </v-col>

                <v-col xl="6" lg="6" md="12" sm="12" cols="12" v-show="audioTab === 1 && media.type === 'video'">
                    <!-- Video Card -->
                    <v-card class="card-holder pa-2 mb-3 mt-3"  height="auto">
                      <v-row justify="center">
                        <v-col
                          xl="5"
                          lg="5"
                          md="5"
                          sm="5"
                          cols="5"
                          class="mt-xl-n2 mt-lg-n2 mt-md-n3 mt-sm-n3 mt-0 drag-handler"
                          align="left"
                        >
                          <v-btn color="#ffffff" class="btn-v_bar ml-2" depressed>
                            <v-icon color="#888DB1">mdi-dots-vertical</v-icon>
                          </v-btn>
                        </v-col>

                        <v-col xl="7" lg="7" md="7" sm="7" cols="7" align="right" class="action-col resume-builder__action-buttons-container">
                          <v-btn
                                  class="btn-icon civie-btn"
                                  depressed @click="toggleMedia(media)"
                          >
                            <svg-vue
                                    icon="eye-icon"
                                    :class="{'visible' : media.is_public}"
                                    class="icon"
                            ></svg-vue>
                          </v-btn>
                          <v-btn
                                  class="btn-icon civie-btn"
                                  @click="deleteProject(project)"
                                  depressed
                          >
                            <svg-vue
                                    icon="trash-delete-icon"
                                    class="icon"
                            ></svg-vue>
                          </v-btn>
                        </v-col>
                        <v-col cols="12" class align="center">
                          <v-card flat color="transparent" tile class="pa-2">
                            <video width="auto" height="auto" controls>
                              <source
                                :src="media.url"
                                type="video/mp4"
                              />
                            </video>
                          </v-card>
                        </v-col>
                      </v-row>
                    </v-card>
                    <!-- Video Card -->
                </v-col>

              </v-row>
              </draggable>

            </v-container>
          </v-tab-item>

          <!-- Video tab -->
          <v-tab-item>
            <v-container style="width: 100%;">
              <v-form>
                <v-row align="center">
                  <v-col xl="3" lg="4" md="6" sm="6" cols="12" class="mb-md-0 mb-sm-0 mb-n2">
                    <v-input
                            class="resume-builder__input civie-dropzone v-text-field v-text-field--outlined v-text-field--enclosed"
                            outlined
                            label="Upload File"
                            hint="(Maximum 1 files)"
                            height="50"
                            :error="!!errors.url"
                    >
                      <vue-dropzone
                              class="civie-dropzone-input"
                              ref="filesDropZone_1"
                              id="dropzone_1"
                              :options="dropzoneOptionsVideo"
                              :useCustomSlot="true"
                              v-on:vdropzone-file-added="handlingEvent"

                      >
                        <div class="dropzone-custom-content d-flex flex-row" style="float:left;">
                          <div class="mr-5">
                            <svg-vue class="icon" :icon="'upload-input-icon'"></svg-vue>
                          </div>
                          <div class="upload-text">Browse/Drag</div>
                        </div>
                      </vue-dropzone>
                    </v-input>
                  </v-col>
                  <v-col cols="12" class="hidden-sm-and-up mt-n12 mb-n2">
                    <label class="label-or">or</label>
                  </v-col>
                  <v-col xl="3" lg="4" md="6" sm="6" cols="12" class="mt-md-0 mt-sm-0 mt-n12">
                    <v-text-field
                            class="resume-builder__input civie-input"
                            outlined
                            v-model="newMedia.url"
                            :error="!!errors.url"
                            color="#001CE2"
                    >
                      <template v-slot:prepend>
                        <label class="label-or hidden-xs-only">or</label>
                      </template>
                      <template v-slot:prepend-inner>
                        <img
                                class="ml-3 mt-n1"
                                src="/images/new_resume_builder/icons/main/link.svg"
                        />
                      </template>
                    </v-text-field>
                  </v-col>
                  <v-col xl="3" lg="4" md="6" sm="6" cols="12">
                    <v-btn
                            class="resume-builder__btn civie-btn filled btn-add-new mt-xl-1 mt-lg-1 mt-md-1 mt-sm-n8 mt-n8"
                            depressed
                            @click="uploadMedia"
                    >Add New</v-btn>
                  </v-col>
                </v-row>
              </v-form>

              <draggable v-if="medias"  v-model="medias" @start="drag=true" @end="drag=false"  handle=".drag-handler">
                <v-row align="center" dense v-for="media in medias" :key="media.id">

                  <v-col xl="7" :lg="windowWidth<1440 ? '9' : '7' " md="9" sm="12" cols="12" v-show="audioTab === 0 && media.type === 'audio'">
                    <!-- audio card -->
                    <v-card class="card-holder pa-2 mb-3 mt-3">
                      <v-row justify="center">
                        <v-col
                                xl="1"
                                lg="1"
                                md="1"
                                sm="1"
                                cols="4"
                                class=" drag-handler mt-xl-n2 mt-lg-n2 mt-md-n3 mt-sm-n3 mt-0"
                                :align="windowWidth<767?'left':'center'"
                        >
                          <v-btn color="#ffffff" class="btn-v_bar" depressed>
                            <v-icon color="#888DB1">mdi-dots-vertical</v-icon>
                          </v-btn>
                        </v-col>
                        <v-col
                                xl="1"
                                lg="1"
                                md="1"
                                sm="1"
                                cols="1"
                                class="mt-xl-n5 mt-lg-n5 mt-md-n5 mt-sm-n5 mt-0 hidden-xs-only"
                        >
                          <div class="vertical-line"></div>
                        </v-col>
                        <v-col
                                xl="6"
                                lg="7"
                                md="7"
                                :sm="windowWidth<=767?'6':'7'"
                                cols="7"
                                class="hidden-xs-only"
                                style="margin-top:-15px;"
                        >
                          <audio controls class="audio-controller ml-xl-n4">
                            <source :src="media.url" />
                          </audio>
                        </v-col>
                        <v-col
                                xl="4"
                                lg="3"
                                md="3"
                                :sm="windowWidth<=767?'4':'3'"
                                cols="8"
                                align="right"
                                class="action-col resume-builder__action-buttons-container"
                        >
                          <v-btn
                                  class="btn-icon civie-btn"
                                  depressed @click="toggleMedia(media)"
                          >
                            <svg-vue
                                    icon="eye-icon"
                                    :class="{'visible' : media.is_public}"
                                    class="icon"
                            ></svg-vue>
                          </v-btn>
                          <v-btn
                                  class="btn-icon civie-btn"
                                  @click="deleteMedia(media)"
                                  depressed
                          >
                            <svg-vue
                                    icon="trash-delete-icon"
                                    class="icon"
                            ></svg-vue>
                          </v-btn>
                        </v-col>
                        <v-col cols="12" class="hidden-sm-and-up" align="center">
                          <audio controls class="audio-controller">
                            <source :src="media.url" />
                          </audio>
                        </v-col>
                      </v-row>
                    </v-card>
                    <!-- audio card -->
                  </v-col>

                  <v-col xl="6" lg="6" md="12" sm="12" cols="12" v-show="audioTab === 1 && media.type === 'video'">
                    <!-- Video Card -->
                    <v-card class="card-holder pa-2 mb-3 mt-3"  height="auto">
                      <v-row justify="center">
                        <v-col
                                xl="5"
                                lg="5"
                                md="5"
                                sm="5"
                                cols="5"
                                class="mt-xl-n2 mt-lg-n2 mt-md-n3 mt-sm-n3 mt-0 drag-handler"
                                align="left"
                        >
                          <v-btn color="#ffffff" class="btn-v_bar ml-2" depressed>
                            <v-icon color="#888DB1">mdi-dots-vertical</v-icon>
                          </v-btn>
                        </v-col>

                        <v-col xl="7" lg="7" md="7" sm="7" cols="7" align="right" class="action-col resume-builder__action-buttons-container">
                          <v-btn
                                  class="btn-icon civie-btn"
                                  depressed @click="toggleMedia(media)"
                          >
                            <svg-vue
                                    icon="eye-icon"
                                    :class="{'visible' : media.is_public}"
                                    class="icon"
                            ></svg-vue>
                          </v-btn>
                          <v-btn
                                  class="btn-icon civie-btn"
                                  @click="deleteProject(project)"
                                  depressed
                          >
                            <svg-vue
                                    icon="trash-delete-icon"
                                    class="icon"
                            ></svg-vue>
                          </v-btn>
                        </v-col>
                        <v-col cols="12" class align="center">
                          <v-card flat color="transparent" tile class="pa-2">
                            <video width="auto" height="auto" controls>
                              <source
                                      :src="media.url"
                                      type="video/mp4"
                              />
                            </video>
                          </v-card>
                        </v-col>
                      </v-row>
                    </v-card>
                    <!-- Video Card -->
                  </v-col>

                </v-row>
              </draggable>

            </v-container>
          </v-tab-item>

        </v-tabs-items>
      </v-card>
    </div>
  </v-app>
</template>

<script>
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";
import draggable from "vuedraggable";

export default {
  name: "AudioVideo",
  components: {
    vueDropzone: vue2Dropzone,
    draggable
  },
  data() {
    return {
      windowWidth: window.innerWidth,
      dropzoneOptions: {
        url: "https://httpbin.org/post",
        thumbnailWidth: 150,
        maxFilesize: 25,
        maxFiles: 1,
        acceptedFiles: 'audio/*',
        addRemoveLinks: true
      },
      dropzoneOptionsVideo: {
        url: "https://httpbin.org/post",
        thumbnailWidth: 150,
        maxFilesize: 25,
        maxFiles: 1,
        acceptedFiles: 'video/*',
        addRemoveLinks: true
      },
      newMedia: {
        title: "Audio",
        type: "audio",
        url: "",
        mediaFile: null
      },
      currentUploadMethod: 'upload',
      tabs: ["Audio", "Video"],
      audioTab: 0,
      errors: {}
    };
  },
  computed: {
    medias: {
      get() {
        return this.$store.state.user.media;
      },
      set(medias) {
        this.$store.commit('updateMedia', medias);
      }
    },
  },
  methods: {
    changeTab(tabName){
      this.newMedia.type = tabName.toLowerCase();
      this.newMedia.title = tabName;
    },
    recordingFinish(data) {
      this.newMedia.mediaFile = data.blob;
      // auto select the audio
      setTimeout(() => {
        $('.ar-records__record').click();

        // add upload button :
        let uploadBtn = '<img alt="upload" id="uploadRecord" src="/icons/done-record-icon.svg"/>';
        $('.ar-records__record').prepend(uploadBtn);
        $('#uploadRecord').on('click', this.uploadMedia);

      }, 1000);
    },
    validateMedia(){
      let url = this.newMedia.url;

      let file_valid  = true;
      let url_valid   = true;
      if(this.newMedia.mediaFile === null){
        file_valid = false;
      }

      let urlRegex = /[(http(s)?):\/\/(www\.)?a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/ ;
      url_valid = url.match(urlRegex);

      return file_valid || url_valid ;
    },
    handleAudioUpload() {
      this.newMedia.mediaFile = this.$refs.audio.files[0];
      this.uploadMedia();
    },
    toggleMedia(media){
      media.is_public = !media.is_public;
      axios.put("/api/user/media", media)
              .then( () => {
                this.$store.dispatch("flyingNotification");
                // clear file after upload.
                this.clearMedia();
              })
              .catch(error => {
                if (typeof error.response.data === "object") {
                  this.errors = error.response.data.errors;
                } else {
                  this.errors =
                          "Something went wrong. Please try again.";
                }
                this.$store.dispatch("flyingNotification", {
                  message: "Error",
                  iconSrc: "/images/resume_builder/error.png"
                });
              });
    },
    handlingEvent: function(file) {
      this.newMedia.mediaFile = file;
    },
    uploadMedia() {
      this.errors = {} ;

      let formData = new FormData();
      $.each(this.newMedia, field => {
        if (this.newMedia[field] !== null) {
          formData.append(field, this.newMedia[field]);
        }
      });
      formData.append("user_id", this.$store.state.user.id);
      const config = {
        onUploadProgress: progressEvent => {
          let progress = (progressEvent.loaded / progressEvent.total) * 100;
          $("#progressBar").css("width", progress + "%");
        },
        headers: { "Content-Type": "multipart/form-data" }
      };

      if(!this.validateMedia()){
        this.errors.url = 'Not a valid url';
        return;
      }
      axios.post("/api/user/media", formData, config)
        .then(response => {
          response.data.data.is_public = true;
          this.medias.unshift(response.data.data);
          this.clearMedia();
          this.$store.dispatch("flyingNotification");
        })
        .catch(error => {
          if (typeof error.response.data === "object") {
            this.errors = error.response.data.errors;
          } else {
            this.errors = "Something went wrong. Please try again.";
          }
          this.$store.dispatch("flyingNotification", {
            message: "Error",
            iconSrc: "/images/resume_builder/error.png"
          });
        });
    },
    clearMedia() {
      this.newMedia = {
        title: "Audio",
        type: "audio",
        url: "",
        mediaFile: null
      };
      this.currentUploadMethod = 'upload';
      this.$refs.filesDropZone_0.removeAllFiles();
      this.$refs.filesDropZone_1.removeAllFiles();
    },
    deleteMedia(mdeia) {
      if (!confirm("Do you want to delete this Media file ?")) {
        return;
      }
      axios
        .delete("/api/user/media/" + mdeia.id)
        .then(response => {
          this.$store.dispatch("flyingNotificationDelete");
          this.medias.forEach((media, index) => {
            if (media.id === response.data.data.id) {
              this.medias.splice(index, 1);
            }
          });
        })
        .catch(error => {
          console.log(error);
          this.$store.dispatch("flyingNotification", {
            message: "Error",
            iconSrc: "/images/resume_builder/error.png"
          });
        });
    }
  },
  mounted() {
    window.onresize = () => {
      this.windowWidth = window.innerWidth;
    }
  }
};
</script>

<style scoped lang="scss">
@import "../../../../../sass/media-queries";
$mainBlue: #001ce2;
.hidden-custom-mobile {
  @media screen and (max-width: 768px) {
    display: none;
  }
}

.media-contents{
  @include lt-sm{
    max-width: 94%;
    margin-right: auto;
    margin-left: auto;
  }
}

.hidden-custom-tablet-and-up {
  @media screen and (min-width: 768px) {
    display: none;
  }
}
.main-content {
  height: 323px;
  background: #fff;
  box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1);
  padding: 50px;
  margin-bottom: 70px;
  scroll-behavior: smooth;
  @media screen and (max-width: 599px) {
    height: 462px;
  }
}
.card-main {
  box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1) !important;
  @media screen and (max-width: 1903px) {
    width: auto;
  }
  .btn-add-new {
    font-family: "Noto Sans" !important;
    width: 120px !important;
    height: 50px !important;
    font-size: 18px !important;
    font-weight: 500;
    box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1) !important;
    @media screen and (max-width: 767px) {
      width: 100px !important;
      height: 40px !important;
      font-size: 15px !important;
    }
  }
  .card-holder {
    box-shadow: 0px 5px 20px rgba(0, 16, 131, 0.06);
    height: 50px;
    width: 523px;
    @media screen and (max-width: 1903px) {
      width: auto;
    }
    @media screen and (max-width: 599px) {
      height: auto;
      width: auto;
    }
    .btn-v_bar {
      min-width: 30px !important;
      min-height: 28px !important;
      width: 30px !important;
      height: 28px !important;
      margin-left: 2px;
      @media screen and (min-width: 1264px) and (max-width: 1903px) {
        margin-left: 0px;
      }
      @media screen and (max-width: 1263px) {
        margin-top: 4px;
      }
      @media screen and (min-width: 600px) and (max-width: 767px) {
        margin-left: -4px;
      }
      @media screen and (max-width: 599px) {
        min-width: 24px !important;
        min-height: 24px !important;
        width: 24px !important;
        height: 30x !important;
        margin-top: 2px;
        margin-left: 0px;
      }
    }
    .card-holder-video {
      box-shadow: 0px 5px 20px rgba(0, 16, 131, 0.06);
      height: auto;
      width: 523px;
      @media screen and (max-width: 1903px) {
        width: auto;
      }
      @media screen and (max-width: 599px) {
        height: auto;
        width: auto;
      }
      .btn-v_bar {
        min-width: 30px !important;
        min-height: 28px !important;
        width: 30px !important;
        height: 28px !important;
        margin-left: 2px;
        @media screen and (min-width: 1264px) and (max-width: 1903px) {
          margin-left: 0px;
        }
        @media screen and (max-width: 1263px) {
          margin-top: 4px;
        }
        @media screen and (min-width: 600px) and (max-width: 767px) {
          margin-left: -4px;
        }
        @media screen and (max-width: 599px) {
          min-width: 24px !important;
          min-height: 24px !important;
          width: 24px !important;
          height: 30x !important;
          margin-top: 2px;
          margin-left: 0px;
        }
      }
    }
    .vertical-line {
      border-left: 1px solid #e6e8fc;
      height: 50px;
      @media screen and (min-width: 600px) and (max-width: 767px) {
        margin-left: -7px;
      }
    }

    .seekbar {
      border-radius: 10px !important;
    }
    .btn-skill-action {
      border-radius: 5px !important;
      min-width: 30px !important;
      min-height: 30px !important;
      width: 30px !important;
      height: 30px !important;
    }
    .action-col {
      margin-top: -10px;
      @media screen and (max-width: 599px) {
        margin-top: 0px;
      }
    }
    .audio-controller {
      height: 40px !important;
    }
  }
}
.error {
  position: absolute;
  color: red;
  font-weight: 600;
  margin-left: 5px;
}
.label-or {
  margin-top: 25px;
  font-family: "Noto Sans" !important;
  font-weight: 500;
  font-size: 16px !important;
  line-height: 22px;
  color: #888db1 !important;
  margin-left: -16px;
  @media screen and (max-width: 599px) {
    margin-left: 0px;
  }
}
.dropzone-custom-content {
  margin-left: -18%;
  @media screen and (min-width: 1366px) and (max-width: 1903px) {
    margin-left: -15%;
  }
  @media screen and (min-width: 1264px) and (max-width: 1365px) {
    margin-left: -13%;
  }
  @media screen and (min-width: 960px) and (max-width: 1263px) {
    margin-left: -22%;
  }
  @media screen and (min-width: 600px) and (max-width: 767px) {
    margin-left: -8%;
  }
  @media screen and (min-width: 394px) and (max-width: 599px) {
    margin-left: -21% !important;
  }
}
.dropzone.dz-clickable {
  border: 2px solid #c4c9f5 !important;
  min-height: 48px !important;
  height: 48px !important;
  border: 2px solid #c4c9f5;
  border-radius: 10px;
  overflow: hidden !important;
}
.upload-text {
  font-family: "Noto Sans" !important;
  font-weight: 500;
  font-size: 18px;
  line-height: 25px;
  color: #888db1 !important;
  margin-top: 1px;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
 {
  opacity: 0;
}
.input-group {
  margin-right: 15px;
  &:nth-child(4),
  &:last-child {
    margin-right: none;
  }
  .civie-textarea,
  .civie-dropzone {
    margin-bottom: 35.5px;
    height: auto;
    .v-input__control,
    .v-input__slot {
      height: 165px;
    }
  }
  &.files {
    .v-label {
      position: absolute;
    }
    .civie-dropzone {
      width: 100%;
    }
  }
}
</style>

<style>
@media screen and (max-width: 599px) {
  #resumeBuilder .v-input__prepend-outer {
    display: none !important;
  }
}
</style>
<style lang="scss">
  // recorder styles not scoped

  .ar-player > .ar-player-bar > .ar-player__progress {
    width: 40px !important;
  }

  .ar-content, .ar-player {
    width: 300px !important;
  }

  .ar-icon {
      border: 1px solid #001CE2 !important;
  }

  .audio-recorder {
    .ar-recorder__records-limit {
      display: none !important;
    }

    .ar-records {
      height: auto !important;
    }

    .ar-recorder__duration {
      margin-top: 10px;
    }

    #uploadRecord {
      width: 25px;
      height: auto;

      &:hover {
        cursor: pointer;
      }
    }
  }
</style>