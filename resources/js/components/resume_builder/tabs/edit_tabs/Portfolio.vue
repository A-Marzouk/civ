<template>
  <div class="portfolio-contents" id="portfolio-tab">
    <div class="data-container">
      <v-card class="view-container resume-builder__scroll" style="overflow-x: hidden !important;">
        <v-form class="grid-form" ref="form">
          <v-text-field
            id="projectName"
            class="resume-builder__input civie-input"
            outlined
            label="Project Name"
            color="#001CE2"
            v-model="editedProject.name"
            :error="!!errors.name"
            :error-messages="errors.name"
          ></v-text-field>
          <v-text-field
            id="url"
            class="resume-builder__input civie-input"
            outlined
            label="URL"
            hint="(Active link of the project)"
            color="#001CE2"
            v-model="editedProject.link"
            :error="!!errors.link"
            :error-messages="errors.link"
          ></v-text-field>
          <v-textarea
            id="description"
            class="resume-builder__input civie-textarea"
            outlined
            label="Description"
            color="#001CE2"
            v-model="editedProject.description"
            :error="!!errors.description"
            :error-messages="errors.description"
          ></v-textarea>
          <!-- Using v-input classes -->
          <v-input
            class="resume-builder__input civie-dropzone v-text-field v-text-field--outlined v-text-field--enclosed"
            outlined
            label="Upload Images"
            hint="(Maximum 5 files)"
          >
            <vue-dropzone
              class="civie-dropzone-input sm-image"
              id="dropzone"
              :options="dropzoneOptions"
              v-model="editedProject.images"
              :useCustomSlot="true"
              v-on:vdropzone-file-added="handlingEvent"
              v-on:vdropzone-drop="checkMaximumFiles"
              ref="newImages"
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
            label="Skills"
            hint="(Skills you use in the project)"
            color="#001CE2"
            v-model="editedProject.skills"
            :error="!!errors.skills"
            :error-messages="errors.skills"
          ></v-text-field>
          <v-text-field
            id="software"
            class="resume-builder__input civie-input"
            outlined
            label="Software"
            hint="(Software used for this project)"
            color="#001CE2"
            v-model="editedProject.software"
            :error="!!errors.software"
            :error-messages="errors.software"
          ></v-text-field>

          <div class="col-12 d-flex flex-column">
            <div class="uploadedImagesList" v-if="editedProject.images.length > 0 ">
              <div
                class="imageRow"
                v-for="image in editedProject.images"
                :key="image.id"
                v-if="image.src"
              >
                <img :src="image.src" alt="project image" />
                <div class="remove-image" @click="deleteProjectImage(image)">
                  <img src="/images/del-icon.png" alt="delete" />
                </div>
              </div>
            </div>

            <div class="d-flex mb-4">
              <v-btn
                class="resume-builder__btn civie-btn filled"
                raised
                @click="saveProject"
              >{{editedProject.id !== '' ? 'Update' : 'Add New'}}</v-btn>

              <v-btn
                class="resume-builder__btn civie-btn ml-2"
                raised
                @click="clearProject"
                v-show="editedProject.id !== '' "
              >Cancel</v-btn>
            </div>
          </div>
        </v-form>

        <draggable
          class="projects-list"
          v-if="projects"
          v-model="projects"
          @start="drag=true"
          @end="drag=false"
          handle=".drag-handler"
        >
          <div class="project ml-md-4" v-for="project in projects" :class="{'half-opacity' : !project.is_public}">
            <div class="project__header">
              <v-btn depressed class="drag-and-drop-handler drag-handler">
                <svg-vue :icon="'drag-and-drop-icon'" class="icon"></svg-vue>
              </v-btn>
              <div class="resume-builder__action-buttons-container">
                <v-btn class="btn-icon civie-btn" depressed @click="toggleProject(project)">
                  <svg-vue icon="eye-icon" :class="{'visible' : project.is_public}" class="icon"></svg-vue>
                </v-btn>
                <v-btn class="btn-icon civie-btn" @click="editProject(project)" depressed>
                  <svg-vue
                    icon="edit-icon"
                    class="icon"
                    :class="{'visible' : project.id === editedProject.id}"
                  ></svg-vue>
                </v-btn>
                <v-btn class="btn-icon civie-btn" @click="deleteProject(project)" depressed>
                  <svg-vue icon="trash-delete-icon" class="icon"></svg-vue>
                </v-btn>
              </div>
            </div>
            <div class="project__body">
              <div class="project__img">
                <div class="project__name">{{project.name}}</div>
                <img :src="getMainImage(project)" alt="portfolio img" />
              </div>
              <div class="project__info">
                <div class="project__name">{{project.name}}</div>
                <div class="project__url">
                  <b>URL:</b>
                  <a :href="project.link">{{project.link}}</a>
                </div>
                <div class="project__skills">
                  <b>Skills:</b>
                  {{project.skills}}
                </div>
                <div class="project__softwares">
                  <b>Software:</b>
                  {{project.software}}
                </div>
                <div class="project__description">
                  <b>Description:</b>
                  {{project.description}}
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
import vue2Dropzone from "vue2-dropzone";
import draggable from "vuedraggable";

export default {
  name: "Portfolio",
  components: {
    vueDropzone: vue2Dropzone,
    draggable
  },
  data: () => ({
    editedProject: {
      id: "",
      name: "",
      description: "",
      link: "",
      skills: "",
      software: "",
      images: []
    },
    dropzoneOptions: {
      url: "https://httpbin.org/post",
      thumbnailWidth: 150,
      maxFilesize: 25,
      maxFiles: 5,
      acceptedFiles: "image/*",
      addRemoveLinks: true
    },
    errors: {}
  }),
  computed: {
    projects: {
      get() {
        return this.$store.state.user.projects;
      },
      set(projects) {
        this.$store.commit("updateProjects", projects);
      }
    }
  },
  methods: {
    // projects list functions:
    getMainImage(project) {
      let mainImageSrc = "";
      project.images.forEach(image => {
        image.is_main ? (mainImageSrc = image.src) : "";
      });

      return mainImageSrc;
    },
    deleteProject(project) {
      if (!confirm("Do you want to delete this project ?")) {
        return;
      }
      axios
        .delete("/api/user/projects/" + project.id)
        .then(response => {
          this.$store.dispatch("flyingNotificationDelete");
          this.projects.forEach((myProject, index) => {
            if (myProject.id === response.data.data.id) {
              this.projects.splice(index, 1);
            }
          });
        })
        .catch(error => {
          console.log(error);
        });
    },
    deleteProjectImage(image) {
      axios
        .delete("/api/user/projects/images/" + image.id)
        .then(response => {
          this.$store.dispatch("flyingNotificationDelete");
          this.editedProject.images.forEach((myImage, index) => {
            if (myImage.id === response.data.data.id) {
              this.editedProject.images.splice(index, 1);
            }
          });
        })
        .catch(error => {
          console.log(error);
        });
    },
    editProject(project) {
      this.removeFiles();
      $.each(project, field => {
        this.editedProject[field] = project[field];
      });
    },

    toggleProject(project) {
      project.is_public = !project.is_public;
      axios
        .put("/api/user/projects", project)
        .then((response) => {
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

    // new project functions
    handlingEvent: function(file) {
      if (this.editedProject.images.length < 5) {
        this.editedProject.images.push(file);
      }
    },
    checkMaximumFiles() {
      if (this.editedProject.images.length >= 5) {
      }
    },
    removeFiles() {
      this.editedProject.images = [];
      this.$refs.newImages.removeAllFiles();
    },

    saveProject() {
      this.errors = {};
      let formData = new FormData();

      $.each(this.editedProject, field => {
        if (field !== "images") {
          formData.append(field, this.editedProject[field]);
        }
      });

      this.editedProject.images.forEach(image => {
        formData.append("images[]", image);
      });

      let edit = false;
      if (this.editedProject.id !== "") {
        edit = true;
      }

      formData.append("user_id", this.$store.state.user.id);
      formData.append("id", this.editedProject.id);

      axios.post("/api/user/projects", formData, {
          headers: { "Content-Type": "multipart/form-data" }
        })
        .then(response => {
          if (!edit) {
            this.projects.push(response.data.data);
          } else {
            this.projects.forEach((project, index) => {
              if (project.id === response.data.data.id) {
                this.projects.splice(index, 1, response.data.data);
              }
            });
          }

          this.$store.dispatch("flyingNotification");
          this.clearProject();
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
    clearProject() {
      this.editedProject = {
        id: "",
        name: "",
        description: "",
        link: "",
        skills: "",
        software: "",
        images: []
      };
      this.$refs.newImages.removeAllFiles();
    },
    canSubmit() {
      let canSubmit = true;

      $.each(this.editedProject, field => {
        if (!this.editedProject[field].length) {
          canSubmit = false;
        }
      });

      return canSubmit;
    }
  },
  mounted() {}
};
</script>

<style lang="scss">
@import "../../../../../sass/variables";
@import "../../../../../sass/media-queries";
.ml-custom-n12 {
  margin-left: -12px;
}

.portfolio-contents{
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

.civie-dropzone-input {
  overflow: auto;
}

.uploadedImagesList {
  display: flex;
  margin-bottom: 30px;

  .imageRow {
    margin-right: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    &:hover {
      cursor: pointer;
      .remove-image {
        display: flex;
      }
    }

    img {
      width: 60px;
      height: 60px;
    }
    .remove-image {
      position: absolute;
      width: 60px;
      height: 60px;
      background: rgba(0, 0, 0, 0.5);
      border-radius: 5px;

      display: none;
      justify-content: center;
      align-items: center;

      img {
        width: 30px;
        height: 30px;
      }
    }
  }
}
</style>
