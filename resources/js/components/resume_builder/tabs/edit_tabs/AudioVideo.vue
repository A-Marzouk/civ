<template>
  <v-app>
    <v-container style="width:100%;">
      <v-tabs class="resume-builder__tab-bar" hide-slider v-model="hobbiesTab">
        <v-tab class="resume-builder__tab" v-for="(tabName,i) in tabs" :key="i">{{tabName}}</v-tab>
      </v-tabs>
      <v-card
        class="card-main pa-lg-10 pa-md-10 pa-sm-10 pa-3 resume-builder__scroll main-content"
        flat
        id="hobbiesContent"
      >
        <v-tabs-items v-model="hobbiesTab">
          <v-tab-item v-for="i in 5" :key="i">
            <v-container style="width: 100%;">
              <v-form>
                <v-row align="center">
                  <v-col xl="3" lg="4" md="6" sm="6" cols="12">
                    <v-select
                      class="resume-builder__input civie-select"
                      outlined
                      placeholder="Select an option"
                      :items="hobbyTypes"
                      label="Type"
                      color="#001CE2"
                      v-model="hobbyType"
                    >
                      <button class="dropdown-icon icon" slot="append">
                        <svg-vue :icon="`dropdown-caret`"></svg-vue>
                      </button>
                    </v-select>
                  </v-col>

                  <v-col xl="3" lg="4" md="6" sm="6" cols="12">
                    <v-select
                      class="resume-builder__input civie-select"
                      outlined
                      placeholder="Select an option"
                      :items="hobbyNames"
                      label="Name"
                      color="#001CE2"
                      v-model="hobbyName"
                    >
                      <button class="dropdown-icon icon" slot="append">
                        <svg-vue :icon="`dropdown-caret`"></svg-vue>
                      </button>
                    </v-select>
                  </v-col>

                  <v-col xl="3" lg="4" md="6" sm="6" cols="12">
                    <v-btn
                      class="resume-builder__btn civie-btn filled btn-add-new mt-xl-n2 mt-lg-n2 mt-n8"
                      depressed
                    >Add New</v-btn>
                  </v-col>
                </v-row>
              </v-form>
              <v-row align="center" dense>
                <v-col xl="5" lg="6" md="8" sm="12" cols="12">
                  <v-card class="card-holder pa-2 mb-3">
                    <v-row justify="center">
                      <v-col xl="1" lg="1" md="1" sm="1" cols="1" class="mt-xl-n2 mt-lg-n2 mt-n3" align="center">
                        <v-btn color="#ffffff" class="btn-v_bar" depressed>
                          <v-icon color="#888DB1">mdi-dots-vertical</v-icon>
                        </v-btn>
                      </v-col>
                      <v-col xl="1" lg="1" md="1" sm="1" cols="1" class="mt-n5">
                        <div class="vertical-line"></div>
                      </v-col>
                      <v-col xl="7" lg="7" md="7" sm="6" cols="7" class="mt-n2 hidden-xs-only">
                        <v-card class="card-audio-controller" height="40" color="#F2F3FD" flat>
                          <v-row justify="center" align="center" dense class="card-audio-row">
                            <v-col cols="2" align="right" class="mt-1">
                              <img
                                src="/images/new_resume_builder/icons/main/play.svg"
                                alt="play_button"
                                class="btn-play mt-n1"
                                width="20"
                                height="20"
                              />
                            </v-col>
                            <v-col cols="3" class="mt-1">
                              <v-card color="transparent" flat tile>
                                <span class="audio-duration">0.00/0.15</span>
                              </v-card>
                            </v-col>
                            <v-col cols="4" class="mt-1">
                              <v-progress-linear color background-color="#C4C9F5" class="seekbar"></v-progress-linear>
                            </v-col>
                            <v-col cols="3" class="mt-1">
                              <v-card color="transparent" flat tile>
                                <v-btn icon small>
                                  <img
                                    src="/images/new_resume_builder/icons/main/volume-1.svg"
                                    alt="play_button"
                                    class="btn-volume"
                                  />
                                </v-btn>
                                <v-btn icon small>
                                  <v-icon>mdi-dots-vertical</v-icon>
                                </v-btn>
                              </v-card>
                            </v-col>
                          </v-row>
                        </v-card>
                      </v-col>
                      <v-col xl="3" lg="3" md="3" sm="4" cols="3" align="right" class="action-col">
                        <v-btn color="#F2F3FD" depressed class="btn-skill-action mr-auto">
                          <img src="/images/new_resume_builder/icons/main/eye.svg" alt />
                        </v-btn>
                        <v-btn color="#F2F3FD" depressed class="btn-skill-action mr-auto">
                          <img src="/images/new_resume_builder/icons/main/edit-skill.svg" alt />
                        </v-btn>
                        <v-btn color="#F2F3FD" depressed class="btn-skill-action mr-auto">
                          <img src="/images/new_resume_builder/icons/main/trash.svg" alt />
                        </v-btn>
                      </v-col>
                    </v-row>
                  </v-card>
                </v-col>
              </v-row>
            </v-container>
          </v-tab-item>
        </v-tabs-items>
      </v-card>
    </v-container>
  </v-app>
</template>

<script>
export default {
  name: "Hobbies",
  data() {
    return {
      tabs: ["Audio", "Video"],
      hobbyType: "",
      hobbyTypes: ["Personal Hobby", "Personal Hobby2"],
      hobbyNames: ["Gardening"],
      hobbyName: "",
      hobbiesTab: 0,
      hobby: {
        category: "select",
        title: ""
      },
      categoryOptions: [
        {
          title: "Sports",
          value: "sports"
        },
        {
          title: "Ice skating",
          value: "ice_skating"
        },
        {
          title: "Cycling",
          value: "cycling"
        },
        {
          title: "Parkour",
          value: "parkour"
        }
      ],
      showCategoryOptions: false,
      optionHobbyId: 0,
      editedHobby: {},
      errors: {
        new: {},
        edit: {}
      }
    };
  },
  computed: {
    hobbies() {
      return this.$store.state.user.hobbies;
    }
  },
  props: ["selectProps"],
  methods: {
    toggleSelect() {
      this.disabledSelect = !this.disabledSelect;
    },
    selectCategory(title) {
      this.hobby.category = title;
      this.showCategoryOptions = false;
    },
    addHobby() {
      if (this.validateHobby()) {
        this.hobby.user_id = this.$store.state.user.id;
        axios
          .post("/api/user/hobbies", this.hobby)
          .then(response => {
            let addedHobby = response.data.data;
            this.hobbies.push(addedHobby);
            this.clearHobby();
            this.$store.dispatch("fullScreenNotification");
          })
          .catch(error => {
            if (typeof error.response.data === "object") {
              this.errors.new = error.response.data.errors;
            } else {
              this.errors.new = "Something went wrong. Please try again.";
            }
            this.$store.dispatch("flyingNotification", {
              message: "Error",
              iconSrc: "/images/resume_builder/error.png"
            });
          });
      }
    },
    validateHobby() {
      this.errors = {
        new: {},
        edit: {}
      };

      if (this.hobby.title && this.hobby.category) {
        return true;
      }

      if (!this.hobby.title) {
        this.errors.new.title = "Title required.";
      }
      if (!this.hobby.category) {
        this.errors.new.category = "Category required.";
      }

      return false;
    },
    clearHobby() {
      this.hobby = {
        category: "",
        title: ""
      };
    },

    editHobby(hobby) {
      this.editedHobby = {
        id: hobby.id,
        category: hobby.category,
        title: hobby.title
      };
      this.closeOptionsBtn();
      document.getElementById("hobbiesContent").scrollTop = 0;
    },
    applyEdit() {
      axios
        .put("/api/user/hobbies", this.editedHobby)
        .then(response => {
          this.EditedSuccessfully(response.data.data);
          this.clearErrors();
          this.$store.dispatch("fullScreenNotification");
        })
        .catch(error => {
          if (typeof error.response.data === "object") {
            this.errors.edit = error.response.data.errors;
          } else {
            this.errors = "Something went wrong. Please try again.";
          }
          this.$store.dispatch("flyingNotification", {
            message: "Error",
            iconSrc: "/images/resume_builder/error.png"
          });
        });
    },
    deleteHobby(hobby) {
      if (
        !confirm("Do you want to delete this hobby [" + hobby.title + "] ?")
      ) {
        return;
      }
      axios
        .delete("/api/user/hobbies/" + hobby.id)
        .then(response => {
          this.$store.dispatch("flyingNotificationDelete");
          this.hobbies.forEach((hobby, index) => {
            if (hobby.id === response.data.data.id) {
              this.hobbies.splice(index, 1);
            }
          });

          this.closeOptionsBtn();
        })
        .catch(error => {
          console.log(error);
        });
    },

    EditedSuccessfully(editedHobby) {
      this.clearEditedHobby();
      // replace the edited hobby with the new one:
      this.hobbies.forEach((hobby, index) => {
        if (hobby.id === editedHobby.id) {
          this.hobbies[index] = editedHobby;
        }
      });
    },
    closeOptionsBtn() {
      this.optionHobbyId = 0;
      this.clearErrors();
    },
    clearEditedHobby() {
      this.editedHobby = {};
    },
    cancelEdit() {
      this.clearEditedHobby();
      this.closeOptionsBtn();
    },
    clearErrors() {
      this.errors = {
        new: {},
        edit: {}
      };
    }
  },
  mounted() {
    $("#hobbiesSection").on("click", e => {
      if (
        this.showCategoryOptions &&
        !$(e.target).parents(".civ-input").length
      ) {
        this.showCategoryOptions = false;
      }
    });

    console.log(Vue.$cookies.get("spotify_access_token"));
  }
};
</script>

<style scoped lang="scss">
@import "../../../../../sass/media-queries";
$mainBlue: #001ce2;
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
  width: 1412px;
  @media screen and (max-width: 1903px) {
    width: auto;
  }
  .btn-add-new {
    font-family: "Noto Sans" !important;
    width: 120px !important;
    height: 50px !important;
    font-size: 18px !important;
    font-weight: 500;
    @media screen and (max-width: 767px) {
      width: 100px !important;
      height: 40px !important;
      font-size: 15px !important;
    }
  }
  .card-holder {
    box-shadow: 0px 5px 20px rgba(0, 16, 131, 0.06);
    height: 50px;
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
      @media screen and (min-width: 600px) and (max-width: 767px){
        margin-left: -4px;
      }
      @media screen and (max-width: 599px) {
        min-width: 24px !important;
        min-height: 24px !important;
        width: 24px !important;
        height: 30x !important;
        margin-top: 2px;
        margin-left: -5px;
      }
    }
    .vertical-line {
      border-left: 1px solid #e6e8fc;
      height: 50px;
      @media screen and (min-width: 600px) and (max-width: 767px){
        margin-left: -7px;
      }
    }
    .hobby-title {
      font-family: "Noto Sans" !important;
      font-size: 18px;
      line-height: 25px;
      color: #888db1 !important;
      @media screen and (min-width: 600px) and (max-width: 767px) {
        font-size: 12px;
      }
      @media screen and (max-width: 374px) {
        font-size: 14px;
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
      @media screen and (max-width: 369px) {
        margin-left: -11px;
      }
    }
    .action-col {
      margin-top: -10px;
    }
    .card-audio-controller {
      border-radius: 100px;
      min-width: 257px !important;
      margin-top: -7px;
      @media screen and (min-width: 600px) and (max-width: 767px) {
        margin-left: -37px;
      }
      .btn-play {
      }
      .card-audio-row {
        @media screen and (min-width: 600px) and (max-width: 767px) {
          margin-left: -11px;
        }
      }
      .audio-duration {
        font-family: "Noto Sans" !important;
        font-weight: 500;
        font-size: 14px !important;
        line-height: 14px;
        color: #888db1 !important;
      }
    }
  }
}
.error {
  position: absolute;
  color: red;
  font-weight: 600;
  margin-left: 5px;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>
