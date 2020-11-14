<template>
  <v-app style="width: 100%" class="portfolio-contents" id="portfolio-tab">
    <div class="data-container view-container resume-builder__scroll" style="width: 100%">
      <v-card
        class=""
        style="overflow-x: hidden !important;"
      >
        <v-form class="grid-form" ref="form">
          <v-text-field
            id="projectName"
            class="resume-builder__input civie-input"
            outlined
            label="Project Name"
            color="#001CE2"
            placeholder="Project 1"
            v-model="editedProject.name"
            :error="!!errors.name"
            :error-messages="errors.name"
          ></v-text-field>
          <v-combobox
                  class="resume-builder__input civie-input eye-up-position"
                  v-model="editedProject.category"
                  :search-input.sync="search"
                  :items="projectCategories"
                  outlined
                  dense
                  :error="!!errors.category"
                  :error-messages="errors.category"
                  label="Project Category">

            <template v-slot:no-data>
              <v-list-item>
                <v-list-item-content>
                  <v-list-item-title>
                    No results matching "<strong>{{ search }}</strong>". Press <kbd>enter</kbd> to create a new one
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </template>

          </v-combobox>
          <v-text-field
            id="url"
            class="resume-builder__input civie-input"
            outlined
            label="URL"
            hint="(Active link of the project)"
            color="#001CE2"
            v-model="editedProject.link"
            placeholder="https://website.com"
            :error="!!errors.link"
            :error-messages="errors.link"
          ></v-text-field>
          <v-textarea
            id="description"
            rows="1"
            auto-grow
            row-height="7"
            class="resume-builder__input civie-textarea"
            outlined
            label="Description"
            counter
            maxlength="1000"
            color="#001CE2"
            placeholder="Describe your project"
            v-model="editedProject.description"
            :error="!!errors.description"
            :error-messages="errors.description"
          ></v-textarea>
          <v-input
            class="resume-builder__input civie-dropzone v-text-field v-text-field--outlined v-text-field--enclosed"
            outlined
            label="Upload Images"
            persistent-hint
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
            placeholder="Skills used in the project"
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
            placeholder="Software used for the project"
            color="#001CE2"
            v-model="editedProject.software"
            :error="!!errors.software"
            :error-messages="errors.software"
          ></v-text-field>
          <div class="col-12 d-flex flex-column">
            <div
              class="uploadedImagesList"
              v-if="editedProject.images.length > 0"
            >
              <div
                class="imageRow"
                v-for="image in editedProject.images"
                :key="image.id"
                v-show="image.src"
              >
                <img :src="image.src" alt="project image" />
                <div class="remove-image" @click="deleteProjectImage(image)">
                  <img src="/images/del-icon.png" alt="delete" />
                </div>
              </div>
            </div>
          </div>
        </v-form>

        <div class="d-flex mb-4" style="padding-left: 46px;">
          <v-btn
                  class="resume-builder__btn civie-btn filled"
                  raised depressed
                  @click="saveProject"
          >{{ editedProject.id !== "" ? "Update" : "Add New" }}</v-btn
          >

          <v-btn
                  class="resume-builder__btn civie-btn cancel-btn"
                  depressed
                  raised
                  @click="clearProject"
                  v-show="editedProject.id !== ''"
          >Cancel</v-btn
          >
        </div>

        <draggable
          class="projects-list"
          v-if="projects"
          v-model="projects"
          @start="drag = true"
          @end="drag = false"
          handle=".drag-handler"
        >
          <div
            class="project ml-md-4"
            v-for="project in projects"
            :key="project.id"
            :class="{ 'half-opacity': !project.is_public }"
          >
            <div class="project__header">
              <v-btn depressed class="drag-and-drop-handler drag-handler">
                <svg-vue :icon="'drag-and-drop-icon'" class="icon"></svg-vue>
              </v-btn>
              <div class="resume-builder__action-buttons-container">
                <v-btn
                  class="btn-icon civie-btn"
                  depressed
                  @click="toggleProject(project)"
                >
                  <svg-vue
                    icon="eye-icon"
                    :class="{ visible: project.is_public }"
                    class="icon"
                  ></svg-vue>
                </v-btn>
                <v-btn
                  class="btn-icon civie-btn"
                  @click="editProject(project)"
                  depressed
                >
                  <svg-vue
                    icon="edit-icon"
                    class="icon"
                    :class="{ visible: project.id === editedProject.id }"
                  ></svg-vue>
                </v-btn>
                <v-btn
                  class="btn-icon civie-btn"
                  @click="deleteProject(project)"
                  depressed
                >
                  <svg-vue icon="trash-delete-icon" class="icon"></svg-vue>
                </v-btn>
              </div>
            </div>

            <v-row class="project_body" no-gutters>
              <v-col cols="12" sm="4" lg="4" class="project_img">
                <div class="project_name d-block d-sm-none d-lg-none">
                  {{ project.name }}
                </div>
                <v-img
                  cover
                  :aspect-ratio="1.2"
                  :src="getMainImage(project)"
                  alt="portfolio img"
                >
                </v-img>
              </v-col>
              <v-col cols="12" sm="8" lg="8" class="pl-0 pl-sm-4 project_info">
                <div class="project_name d-none d-sm-block d-lg-block">
                  {{ project.name }}
                </div>
                <div class="project_url">
                  <b>URL:</b>
                  <a :href="project.link">{{ project.link }}</a>
                </div>
                <div class="project_skills">
                  <b>Skills:</b>
                  {{ project.skills }}
                </div>
                <div class="project_skills">
                  <b>Category:</b>
                  {{ project.category }}
                </div>
                <div class="project_description">
                  <b>Description:</b>
                  {{ project.description }}
                </div>
              </v-col>
            </v-row>
          </div>
        </draggable>
      </v-card>
    </div>
  </v-app>
</template>

<script>
import vue2Dropzone from "vue2-dropzone";
import draggable from "vuedraggable";
import {categories} from '../../helpers/categories'

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
      category: "",
      description: "",
      link: "",
      skills: "",
      software: "",
      images: []
    },
    search:'',
    dropzoneOptions: {
      url: "https://httpbin.org/post",
      thumbnailWidth: 150,
      maxFilesize: 25,
      maxFiles: 5,
      acceptedFiles: "image/*",
      addRemoveLinks: true
    },
    errors: {},
    projectCategories: categories
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
  watch: {
    'editedProject.category': function (val) {
      if (val.length > 5) {
        this.$nextTick(() => this.model.pop())
      }
    },
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
      axios.put("/api/user/projects", project)
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
            response.data.data.is_public = true ;
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
        category: "",
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

.portfolio-contents {
  @include lt-sm {
    max-width: 94%;
    margin-right: auto;
    margin-left: auto;
  }
}

#portfolio-tab {
  .view-container {
    max-height: 470px;
    overflow: auto;
    box-shadow: 0 5px 20px rgba($color: #001083, $alpha: 0.1);
    margin: 0 auto;

    .grid-form {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      grid-auto-rows: 104px;
      grid-gap: 15px;
      padding: 50px 46px 10px;

      .resume-builder__input {
        grid-column: span 1;

        &.civie-textarea,
        &.civie-dropzone {
          grid-row-start: 1;
          grid-row-end: 3;
          height: 97.5%;

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
        &_body {
          margin-top: 10px;
          .project_img {
            .project {
              &_name {
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
              img {
                margin-bottom: 15px;
              }
            }
          }

          .project_info {
            margin-top: 14px;

            .project {
              &_name {
                font-size: 24px;
                font-weight: 700;
                color: $mainColor;
                margin-bottom: 10px;
              }

              &_url,
              &_skills,
              &_softwares,
              &_description {
                color: $inputTextColor;
              }
            }

            @include lt-sm {
              width: 100%;
              margin-left: 0;
            }
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
