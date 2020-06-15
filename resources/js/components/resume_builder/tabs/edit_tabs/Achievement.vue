<template>
  <v-app>
    <v-card class="card-ref pa-xl-10 pa-lg-5 resume-builder__scroll reference-content" flat>
      <v-container class="mt-xl-5 mt-lg-10 mt-12">
        <v-form>
          <v-row>
            <v-col md="6" sm="12" cols="12">
              <v-row>
                <v-col xl="6" lg="6" md="6" sm="6" cols="12">
                  <v-select
                    class="resume-builder__input civie-select"
                    outlined
                    placeholder="Select an option"
                    :items="items"
                    label="Achievement Type"
                    color="#001CE2"
                    v-model="achievementType"
                  >
                    <button class="dropdown-icon icon" slot="append" @click="toggleSelect">
                      <svg-vue :icon="`dropdown-caret`"></svg-vue>
                    </button>
                  </v-select>
                </v-col>
                <v-col xl="6" lg="6" md="6" sm="6" cols="12">
                  <v-text-field
                    class="resume-builder__input civie-input"
                    outlined
                    color="#001CE2"
                    :rules="rules"
                    :class="{'resume-builder__input--disabled': disabledInput}"
                    :disabled="disabledInput"
                    label="Title"
                    v-model="title"
                  ></v-text-field>
                </v-col>

                <v-col xl="6" lg="6" md="6" sm="6" cols="12" class="mt-md-n8 mt-sm-n8 mt-n8">
                  <v-text-field
                    class="resume-builder__input civie-input"
                    outlined
                    color="#001CE2"
                    :rules="rules"
                    :class="{'resume-builder__input--disabled': disabledInput}"
                    :disabled="disabledInput"
                    label="URL"
                    v-model="url"
                  ></v-text-field>
                </v-col>
                <v-col xl="6" lg="6" md="6" sm="6" cols="12" class="mt-md-n8 mt-sm-n8 mt-n8">
                  <v-text-field
                    class="resume-builder__input civie-input"
                    outlined
                    color="#001CE2"
                    :rules="rules"
                    :class="{'resume-builder__input--disabled': disabledInput}"
                    :disabled="disabledInput"
                    label="Year"
                    v-model="year"
                  ></v-text-field>
                </v-col>
              </v-row>
            </v-col>
            <v-col md="6" sm="12" cols="12" class="mt-md-0 mt-sm-n12 mt-n12">
              <v-row align="center" justify="center">
                <v-col md="6" sm="6" cols="12">
                  <v-textarea
                    class="resume-builder__input civie-textarea"
                    outlined
                    color="#001CE2"
                    :rules="rules"
                    :class="{'resume-builder__input--disabled': disabledTextarea}"
                    :disabled="disabledTextarea"
                    label="Description"
                    v-model="description"
                  ></v-textarea>
                </v-col>
                <v-col md="6" sm="6" cols="12">
                  <vue-dropzone
                    class="civie-dropzone"
                    ref="myVueDropzone"
                    id="dropzone"
                    :options="dropzoneOptions"
                    :useCustomSlot="true"
                  >
                    <div class="dropzone-custom-content">
                      <svg-vue class="icon" :icon="'upload-input-icon'"></svg-vue>
                    </div>
                  </vue-dropzone>
                </v-col>
                <v-col cols="12" align="right">
                  <v-btn class="resume-builder__btn civie-btn filled btn-add-new">Add New</v-btn>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-form>
        <v-row align="center">
          <v-col xl="6" lg="6" md="8" sm="12" cols="12">
            <v-card class="card-holder">
              <v-card-text>
                <v-row>
                  <v-col cols="6" align="left">
                    <v-btn color="#ffffff" class="btn-v_bar ml-5" depressed>
                      <v-icon color="#888DB1">mdi-dots-vertical</v-icon>
                    </v-btn>
                  </v-col>
                  <v-col cols="6" align="right">
                    <v-card color="transparent" flat tile class="mr-3">
                      <v-btn color="#F2F3FD" depressed class="btn-skill-action mr-auto">
                        <img src="/images/new_resume_builder/icons/main/eye.svg" alt />
                      </v-btn>
                      <v-btn color="#F2F3FD" depressed class="btn-skill-action mr-auto">
                        <img src="/images/new_resume_builder/icons/main/edit-skill.svg" alt />
                      </v-btn>
                      <v-btn color="#F2F3FD" depressed class="btn-skill-action mr-auto">
                        <img src="/images/new_resume_builder/icons/main/trash.svg" alt />
                      </v-btn>
                    </v-card>
                  </v-col>
                  <v-col cols="12">
                    <v-row justify="center">
                      <v-col>
                        <img
                          src="/images/new_resume_builder/achievement-img.svg"
                          alt="achievement-img"
                          class="achievement-img"
                        />
                      </v-col>
                      <v-col>
                        <v-card color="transparent" flat tile class="pa-5">
                          <div class="achievement-title">
                            National Award,
                            <span>2015</span>
                          </div>
                          <div class="achievement-subtitle">
                            <span>URL:</span> https://dribbble.com/humayrakabiranamika
                          </div>
                          <div class="achievement-description">
                            <span>Description:</span> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo consequuntur. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo consequuntur.
                          </div>
                        </v-card>
                      </v-col>
                    </v-row>
                  </v-col>
                </v-row>
              </v-card-text>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-card>
  </v-app>
</template>

<script>
import { moveTabsHelper } from "../../helpers/tab-animations";
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";

export default {
  components: {
    vueDropzone: vue2Dropzone
  },
  name: "Achievement",
  data() {
    return {
      items: ["Certificate"],
      newAchievement: {},
      disabledInput: false,
      achievementType: "",
      title: "",
      url: "",
      year: "",
      description: "",
      disabledTextarea: false,
      dropzoneOptions: {
        url: "https://httpbin.org/post",
        thumbnailWidth: 150,
        maxFilesize: 0.5
      },

      errors: {
        new: {},
        edit: {}
      },
      addNewAchievement: false,
      rules: [value => !!value || "Please fill this field."]
    };
  },
  computed: {
    achievements() {
      return this.$store.state.user.achievements;
    }
  },
  props: ["inputProps", "selectProps", "textareaProps"],
  methods: {
    toggleInput() {
      this.disabledInput = !this.disabledInput;
    },
    toggleSelect() {
      this.disabledSelect = !this.disabledSelect;
    },
    toggleTextarea() {
      this.disabledTextarea = !this.disabledTextarea;
    },
    setActiveTab(tab) {
      this.activeTab = tab;
    },
    changeTab(e) {
      let _this = this;
      moveTabsHelper(e, "achievementTabs", _this);
    },
    addAchievement(achievement) {
      this.achievements.push(achievement);
    },
    editAchievement(achievement) {
      this.editedAchievement = {
        id: achievement.id
        // TODO: continue fields
      };
      this.closeOptionsBtn();
    },
    applyEdit() {
      axios
        .put("/api/user/achievements", this.editedAchievement)
        .then(response => {
          this.EditedSuccessfully(response.data.data);
        })
        .catch(error => {
          if (typeof error.response.data === "object") {
            this.errors.edit = error.response.data.errors;
          } else {
            this.errors.edit = "Something went wrong. Please try again.";
          }
          this.$store.dispatch("flyingNotification", {
            message: "Error",
            iconSrc: "/images/resume_builder/error.png"
          });
        });
    },
    EditedSuccessfully(editedAchievement) {
      this.clearEditedAchievement();
      this.$store.dispatch("fullScreenNotification");

      // replace the edited skill with the new one:
      this.achievements.forEach((achievement, index) => {
        if (achievement.id === editedAchievement.id) {
          this.achievements[index] = editedAchievement;
        }
      });
    },
    clearEditedAchievement() {
      this.editedAchievement = {};
    },
    deleteAchievement(achievement) {
      if (!confirm("Do you want to delete this achievement ?")) {
        return;
      }
      axios
        .delete("/api/user/achievements/" + achievement.id)
        .then(response => {
          this.$store.dispatch("flyingNotificationDelete");
          this.achievements.forEach((myAchievement, index) => {
            if (myAchievement.id === response.data.data.id) {
              console.log("found deleted");
              this.achievements.splice(index, 1);
            }
          });

          this.closeOptionsBtn();
        })
        .catch(error => {
          console.log(error);
        });
    },
    closeOptionsBtn() {
      this.optionAchievementId = 0;
    }
  },
  mounted() {}
};
</script>

<style lang="scss">
$mainBlue: #001ce2;
@import "../../../../../sass/media-queries";
.reference-content {
  background: #fff;
  box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1);
  height: 850px;
  padding: 50px;
  margin-bottom: 70px;
  scroll-behavior: smooth;
}
.card-ref {
  width: 1412px;
  box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1) !important;
  @media screen and (min-width: 1264px) and (max-width: 1903px) {
    width: auto;
  }
  @media screen and (min-width: 960px) and (max-width: 1263px) {
    width: auto;
  }
  @media screen and (max-width: 768px) {
    width: auto;
  }
  .btn-add-new {
    font-family: "Noto Sans" !important;
    width: 120px !important;
    height: 50px !important;
    font-size: 18px !important;
    font-weight: 500;
    @media screen and (max-width: 599px) {
      width: 100px !important;
      height: 40px !important;
      font-size: 15px !important;
    }
  }
  .civie-dropzone {
    border: 2px solid #c4c9f5 !important;
    height: 155px;
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
  .btn-skill-action {
    border-radius: 5px !important;
    min-width: 30px !important;
    min-height: 30px !important;
    width: 30px !important;
    height: 30px !important;
    @media screen and (max-width: 369px) {
      margin-left: -11px;
    }
  }
  .card-holder {
    box-shadow: 0px 5px 20px rgba(0, 16, 131, 0.06);
    .achievement-title {
      font-family: "Noto Sans" !important;
      font-weight: 500;
      font-size: 24px !important;
      line-height: 33px;
      color: #001ce2 !important;
      span {
        color: #888db1 !important;
      }
    }
    .achievement-subtitle {
      font-family: "Noto Sans" !important;
      font-style: normal;
      font-weight: bold;
      font-size: 14px !important;
      line-height: 19px;
      color: #888db1 !important;
    }
    .achievement-description {
      font-family: "Noto Sans" !important;
      font-style: normal;
      font-weight: bold;
      font-size: 14px !important;
      line-height: 19px;
      color: #888db1 !important;
    }
    .achievement-img{
        width: 220px;
        height: 165px;
    }
  }
}

.error {
  color: red;
  padding-top: 5px;
  padding-left: 3px;
}
</style>
