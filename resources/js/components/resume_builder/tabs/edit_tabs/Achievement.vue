<template>
  <div class="main-content" id="portfolio-tab">
    <div class="data-container pa-md-0 pa-sm-0 pa-10">
      <v-card class="view-container resume-builder__scroll">
        <v-form
                class="grid-form"
                ref="form"
        >
          <v-text-field
                  id="achievementName"
                  class="resume-builder__input civie-input"
                  outlined
                  label="Achievement type"
                  color="#001CE2"
                  v-model="editedAchievement.type"
                  :error = "!!errors.type"
          >
          </v-text-field>
          <v-text-field
                  id="url"
                  class="resume-builder__input civie-input"
                  outlined
                  label="URL"
                  hint="(Active link of the Achievement)"
                  color="#001CE2"
                  v-model="editedAchievement.url"
                  :error = "!!errors.url"
          >
          </v-text-field>
          <v-textarea
                  id="description"
                  class="resume-builder__input civie-textarea"
                  outlined
                  label="Description"
                  color="#001CE2"
                  v-model="editedAchievement.description"
                  :error = "!!errors.description"

          ></v-textarea>
          <!-- Using v-input classes -->
          <v-input
                  class="resume-builder__input civie-dropzone v-text-field v-text-field--outlined v-text-field--enclosed"
                  outlined
                  label="Upload Image"
                  hint="(Maximum 1 file)"
          >
            <vue-dropzone
                    class="civie-dropzone-input sm-image"
                    id="dropzone"
                    :options="dropzoneOptions"
                    v-model = "editedAchievement.images"
                    :useCustomSlot="true"
                    v-on:vdropzone-file-added="handlingEvent" v-on:vdropzone-drop="checkMaximumFiles" ref="newImages"
            >
              <div class="dropzone-custom-content">
                <svg-vue class="icon" :icon="'upload-input-icon'"></svg-vue>
              </div>
            </vue-dropzone>
          </v-input>
          <v-text-field
                  id="skills"
                  class="resume-builder__input civie-input"
                  outlined
                  label="Year"
                  hint="(Year)"
                  color="#001CE2"
                  v-model="editedAchievement.year"
                  :error = "!!errors.year"
          >
          </v-text-field>
          <v-text-field
                  id="software"
                  class="resume-builder__input civie-input"
                  outlined
                  label="Title"
                  hint="Type"
                  color="#001CE2"
                  v-model="editedAchievement.title"
                  :error = "!!errors.title"
          >
          </v-text-field>

          <div class="col-12 d-flex flex-column" style="transform: translateX(-9px)">
            <div class="d-flex">
              <v-btn class="resume-builder__btn civie-btn filled" raised @click="saveAchievement">
                {{editedAchievement.id !== '' ? 'Update' : 'Add New'}}
              </v-btn>

              <v-btn class="resume-builder__btn civie-btn ml-2" raised @click="clearAchievement" v-show="editedAchievement.id !== '' ">
                Cancel
              </v-btn>
            </div>
          </div>
        </v-form>

        <draggable class="projects-list" v-if="achievements" v-model="achievements" @start="drag=true" @end="drag=false"  handle=".drag-handler">
          <div class="project ml-md-4" v-for="achievement in achievements" :class="{'half-opacity' : !achievement.is_public}">
            <div class="project__header">
              <v-btn
                      depressed
                      class="drag-and-drop-handler drag-handler"
              >
                <svg-vue
                        :icon="'drag-and-drop-icon'"
                        class="icon"
                ></svg-vue>
              </v-btn>
              <div
                      class="resume-builder__action-buttons-container"
              >
                <v-btn
                        class="btn-icon civie-btn"
                        depressed @click="toggleAchievement(achievement)"
                >
                  <svg-vue
                          icon="eye-icon"
                          :class="{'visible' : achievement.is_public}"
                          class="icon"
                  ></svg-vue>
                </v-btn>
                <v-btn
                        class="btn-icon civie-btn"
                        @click="editAchievement(achievement)"
                        depressed
                >
                  <svg-vue
                          icon="edit-icon"
                          class="icon"
                          :class="{'visible' : achievement.id === editedAchievement.id}"
                  ></svg-vue>
                </v-btn>
                <v-btn
                        class="btn-icon civie-btn"
                        @click="deleteAchievement(achievement)"
                        depressed
                >
                  <svg-vue
                          icon="trash-delete-icon"
                          class="icon"
                  ></svg-vue>
                </v-btn>
              </div>
            </div>
            <div class="project__body">
              <div class="project__img">
                <div class="project__name">{{achievement.title}}</div>
                <img
                        :src="achievement.image_src"
                        alt="achievement img">
              </div>
              <div class="project__info">
                <div class="project__name">{{achievement.title}}</div>
                <div class="project__url">
                  <b>URL:</b> <a :href="achievement.url">{{achievement.url}}</a>
                </div>
                <div class="project__skills">
                  <b>Year:</b> {{achievement.year}}
                </div>
                <div class="project__description">
                  <b>Description: </b>
                  { {{achievement.description}}
                </div>
              </div>
            </div>
          </div>
        </draggable>
      </v-card>
    </div>
  </div>
</template>

<script>
  import vue2Dropzone from 'vue2-dropzone'
  import draggable from "vuedraggable";

  export default {
    name: 'Achievement',
    components: {
      vueDropzone: vue2Dropzone,
      draggable
    },
    data: () => ({
      editedAchievement: {
        id: '',
        title: '',
        category: '',
        type: '',
        year: '',
        url: '',
        description: '',
        images: [],
      },
      dropzoneOptions: {
        url: 'https://httpbin.org/post',
        thumbnailWidth: 150,
        maxFilesize: 25,
        maxFiles: 1,
        acceptedFiles: 'image/*',
        addRemoveLinks: true,
      },
      errors: {}
    }),
    computed: {
      achievements: {
        get() {
          return this.$store.state.user.achievements;
        },
        set(achievements) {
          this.$store.commit('updateAchievements', achievements);
        }
      },

    },
    methods: {
      // achievements list functions:
      deleteAchievement(achievement) {
        if (!confirm('Do you want to delete this achievement ?')) {
          return;
        }
        axios.delete('/api/user/achievements/' + achievement.id)
                .then((response) => {
                  this.$store.dispatch('flyingNotificationDelete');
                  this.achievements.forEach((myAchievement, index) => {
                    if (myAchievement.id === response.data.data.id) {
                      this.achievements.splice(index, 1);
                    }
                  });
                })
                .catch(error => {
                  console.log(error);
                })
      },
      editAchievement(achievement){
        $.each( achievement, (field) => {
          this.editedAchievement[field] = achievement[field] ;
        } );

      },

      toggleAchievement(achievement) {
        achievement.is_public = !achievement.is_public;
        axios.put("/api/user/achievements", achievement)
                .then( () => {
                  this.$store.dispatch("flyingNotification");
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


      // new achievement functions
      handlingEvent: function (file) {
        if (this.editedAchievement.images.length < 1) {
          this.editedAchievement.images.push(file);
        }else{

        }
      },
      checkMaximumFiles(){
        if (this.editedAchievement.images.length >= 1) {
        }
      },
      removeFiles() {
        this.editedAchievement.images = [];
        this.$refs.newImages.removeAllFiles();
      },

      saveAchievement() {
        this.errors = {};
        let formData = new FormData();

        $.each(this.editedAchievement, (field) => {
          if (field !== 'images') {
            formData.append(field, this.editedAchievement[field]);
          }
        });

        this.editedAchievement.images.forEach((image) => {
          formData.append('file', image);
        });

        let edit = false;
        if (this.editedAchievement.id !== "") {
          edit = true;
        }

        formData.append('user_id', this.$store.state.user.id);
        formData.append('id', this.editedAchievement.id);


        axios.post('/api/user/achievements', formData, {headers: {'Content-Type': 'multipart/form-data'}})
                .then((response) => {
                  if (!edit) {
                    response.data.data.is_public = true ;
                    this.achievements.push(response.data.data);
                  } else {
                    this.achievements.forEach((achievement, index) => {
                      if (achievement.id === response.data.data.id) {
                        this.achievements.splice(index, 1, response.data.data);
                      }
                    });
                  }

                  this.$store.dispatch('flyingNotification');
                  this.clearAchievement();
                })
                .catch((error) => {
                  if (typeof error.response.data === 'object') {
                    this.errors = error.response.data.errors;
                  } else {
                    this.errors = 'Something went wrong. Please try again.';
                  }

                  this.$store.dispatch('flyingNotification', {
                    message: 'Error',
                    iconSrc: '/images/resume_builder/error.png'
                  });
                });
      },
      clearAchievement() {
        this.editedAchievement = {
          id: '',
          title: '',
          category: '',
          type: '',
          year: '',
          url: '',
          description: '',
          images: [],
        };
        this.$refs.newImages.removeAllFiles();
      },
      canSubmit() {
        let canSubmit = true;

        $.each(this.editedAchievement, (field) => {
          if (!this.editedAchievement[field].length) {
            canSubmit = false;
          }
        });

        return canSubmit;
      }

    },
    mounted() {

    },
  }
</script>

<style lang="scss">
  @import '../../../../../sass/variables';
  @import '../../../../../sass/media-queries';
  .ml-custom-n12{
    margin-left: -12px;
  }
  .main-content{
    @include lt-sm{
      max-width: 94%;
      margin-right: auto;
      margin-left: auto;
    }
  }
  #portfolio-tab {
    .view-container {
      max-height: 678px;
      overflow: auto;
      box-shadow: 0 5px 100px rgba($color: #001083, $alpha: 0.1);
      margin: 0 auto;

      .grid-form {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-auto-rows: 104px;
        grid-gap: 15px;
        padding: 50px 46px;

        .resume-builder__input {
          grid-column: span 1;

          &.civie-textarea,
          &.civie-dropzone {
            grid-row-start: 1;
            grid-row-end: 3;
            height: 100%;

            .v-input__control,
            .v-input__slot {
              height: 100%;
            }
          }

          &.civie-dropzone {
            width: 100%;
            grid-column-start: 4;
          }

          &.civie-textarea {
            grid-column-start: 3;
          }

          .v-label {
            position: absolute;
          }

          @include lt-md {
            grid-column: span 2;

            &.civie-dropzone {
              width: 100%;
              grid-row: 3 / 5;
              grid-column: 3 / 5;
            }

            &.civie-textarea {
              grid-row: 3 / 5;
              grid-column: 1 / 3;
            }
          }

          @include lt-sm {
            grid-column: span 4;

            &.civie-textarea {
              grid-row: 5 / 7;
              grid-column: span 4;
            }

            &.civie-dropzone {
              width: 100%;
              grid-row: 7 / 9;
              grid-column: span 4;
            }
          }

        }

        .civie-btn {
          align-self: start;
          justify-self: end;

          grid-column: 4 / 5;

          @include lt-md {
            grid-column: 3 / 5;
          }

          @include lt-sm {
            grid-column: span 4;
          }
        }

        @include lt-sm {
          grid-gap: 5px;
        }
      }

      .projects-list {
        width: 100%;
        padding: 20px;

        .project {
          max-width: 620px;
          width: 100%;
          box-shadow: 0px 5px 20px rgba(0, 16, 131, 0.06);
          background: white;
          min-height: 225px;
          padding: 10px 15px;
          margin-bottom: 20px;

          &__header {
            display: flex;
            justify-content: space-between;
            width: 100%;

            .drag-and-drop-handler {
              background-color: $auxBgColor-gray;
              border-radius: 5px;
              height: 25px;
              width: 25px;

              // Reset default props of v-btn class
              min-width: auto !important;
              padding: 0 !important;

              .icon {
                height: 10px;
                width: 3px;
              }
            }

            .resume-builder__action-buttons-container {
              .btn-icon {
                width: 25px;
                height: 25px !important;

              }
            }
          }

          &__body {
            margin-top: 10px;
            display: flex;
            justify-content: space-between;

            .project__img {
              img {
                min-width: 120px;
                max-width: 220px;
              }

              .project {
                &__name {
                  display: none;

                  @include lt-sm {
                    display: block;
                    font-size: 20px;
                    font-weight: normal;
                    color: $mainColor;
                    margin-bottom: 10px;
                  }
                }
              }

              @include lt-sm {
                width: 100%;

                img,
                .project__name {
                  width: 100%;
                }

                img {
                  margin-bottom: 15px;
                }
              }
            }

            .project__info {
              margin-left: 20px;
              margin-top: 14px;

              .project {
                &__name {
                  font-size: 24px;
                  font-weight: 700;
                  color: $mainColor;
                  margin-bottom: 10px;

                  @include lt-sm {
                    display: none;
                  }
                }

                &__url,
                &__skills,
                &__softwares,
                &__description {
                  color: $inputTextColor;
                }
              }

              @include lt-sm {
                width: 100%;
                margin-left: 0;
              }
            }

            @include lt-sm {
              flex-wrap: wrap;
            }
          }

        }
      }
    }
  }

  .civie-dropzone-input{
    overflow: auto;
  }

  .uploadedImagesList{
    display: flex;
    margin-bottom: 30px;

    .imageRow{
      margin-right:30px;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      &:hover{
        cursor: pointer;
        .remove-image{
          display: flex;
        }
      }

      img{
        width: 60px;
        height: 60px;
      }
      .remove-image{
        position: absolute;
        width: 60px;
        height: 60px;
        background: rgba(0,0,0, 0.5);
        border-radius:5px;


        display: none;
        justify-content: center;
        align-items: center;

        img{
          width:30px;
          height:30px;
        }
      }
    }
  }

</style>
