<template>
  <v-app>
    <div style="width: 100%">
      <v-card color="transparent" flat tile>
        <v-tabs class="resume-builder__tab-bar" hide-slider v-model="skillTab">
          <v-tab
            class="resume-builder__tab"
            v-for="(tabName,i) in tabs"
            :key="i"
          >{{tabName.replace('_',' ')}}</v-tab>
        </v-tabs>
      </v-card>
      <v-card class="card-skill-items">
        <v-tabs-items v-model="skillTab">
          <v-tab-item v-for="(tabName,i) in tabs" :key="i">
            <v-container style="width:100%;">
              <v-row align="center">
                <v-col xl="3" lg="3" md="6" sm="6" cols="12">
                  <v-card flat tile color="transparent" class="mt-10 ml-xl-10">
                    <v-select
                      class="resume-builder__input civie-select"
                      outlined
                      placeholder="Select an option"
                      :items="typeItems"
                      label="Type"
                      color="#001CE2"
                    >
                      <button class="dropdown-icon icon" slot="append" @click="toggleSelect">
                        <svg-vue :icon="`dropdown-caret`"></svg-vue>
                      </button>
                    </v-select>
                  </v-card>
                </v-col>

                <v-col xl="3" lg="3" md="6" sm="6" cols="12" class="mt-md-0 mt-sm-0 mt-n10">
                  <v-card flat tile color="transparent" class="mt-10 ml-xl-10">
                    <v-select
                      class="resume-builder__input civie-select"
                      outlined
                      placeholder="Select an option"
                      :items="typeItems"
                      label="Name"
                      color="#001CE2"
                    >
                      <button class="dropdown-icon icon" slot="append" @click="toggleSelect">
                        <svg-vue :icon="`dropdown-caret`"></svg-vue>
                      </button>
                    </v-select>
                  </v-card>
                </v-col>

                <v-col xl="3" lg="3" md="6" sm="6" cols="12" class="mt-md-0 mt-sm-n10 mt-n10">
                  <v-card flat tile color="transparent" class="mt-10 ml-xl-10">
                    <v-select
                      class="resume-builder__input civie-select"
                      outlined
                      placeholder="Select an option"
                      :items="typeItems"
                      label="Skill Amount"
                      color="#001CE2"
                    >
                      <button class="dropdown-icon icon" slot="append" @click="toggleSelect">
                        <svg-vue :icon="`dropdown-caret`"></svg-vue>
                      </button>
                    </v-select>
                  </v-card>
                </v-col>

                <v-col xl="3" lg="3" md="6" sm="6" cols="3" class="mt-md-0 mt-sm-n10 mt-n10">
                  <v-btn class="resume-builder__btn civie-btn filled btn-add-new mt-2">Add New</v-btn>
                </v-col>
                <v-col xl="6" lg="6" md="12" sm="12" cols="12">
                  <v-container fluid style="width:100%;" ma-0 pa-0>
                    <v-row align="center" dense>
                      <v-col cols="12" v-for="i in 3" :key="i">
                        <v-card
                          color="#E6E8FC"
                          class="card-skill ml-xl-10 mt-md-0 mt-sm-5 mt-5"
                          flat
                        >
                          <v-card-text>
                            <v-row align="center" justify="center" class="mt-n3 row-skill-details">
                              <v-col xl="1" lg="2" md="1" sm="1" cols="2">
                                <v-btn depressed class="btn-v_bar">
                                  <v-icon color="#888DB1">mdi-dots-vertical</v-icon>
                                </v-btn>
                              </v-col>
                              <v-col xl="6" lg="4" md="7" sm="6" cols="6">
                                <v-card color="transparent" flat tile>
                                  <div class="skill-title">Laravel</div>
                                  <div class="mt-3">
                                    <v-progress-linear
                                      class="progress-skill"
                                      height="8"
                                      rounded
                                      color="#001CE2"
                                      background-color="#C4C9F5"
                                      value="90"
                                    ></v-progress-linear>
                                  </div>
                                </v-card>
                              </v-col>
                              <v-col xl="2" lg="2" md="1" sm="2" cols="2" class="mt-5">
                                <span class="skill-title">90%</span>
                              </v-col>
                              <v-col
                                xl="3"
                                lg="4"
                                md="3"
                                sm="3"
                                cols="3"
                                align="right"
                                class="mt-5"
                              >
                                <v-btn
                                  color="#F2F3FD"
                                  depressed
                                  class="btn-skill-action mr-xl-1 mr-lg-auto mx-auto"
                                >
                                  <img src="/images/new_resume_builder/icons/main/tick.svg" alt />
                                </v-btn>
                                <v-btn
                                  color="#F2F3FD"
                                  depressed
                                  class="btn-skill-action mr-xl-1 mr-lg-auto mx-auto"
                                >
                                  <img
                                    src="/images/new_resume_builder/icons/main/edit-skill.svg"
                                    alt
                                  />
                                </v-btn>
                                <v-btn
                                  color="#F2F3FD"
                                  depressed
                                  class="btn-skill-action mr-xl-1 mr-lg-auto mx-auto"
                                >
                                  <img src="/images/new_resume_builder/icons/main/trash.svg" alt />
                                </v-btn>
                              </v-col>
                            </v-row>

                            <v-row
                              align="center"
                              justify="center"
                              class="row-skill-details-mobile mt-n5"
                            >
                              <v-col cols="6">
                                <v-btn depressed class="btn-v_bar">
                                  <v-icon color="#888DB1">mdi-dots-vertical</v-icon>
                                </v-btn>
                              </v-col>
                              <v-col cols="6" align="right">
                                <v-btn color="#F2F3FD" depressed class="btn-skill-action mx-auto">
                                  <img src="/images/new_resume_builder/icons/main/tick.svg" alt />
                                </v-btn>
                                <v-btn color="#F2F3FD" depressed class="btn-skill-action mx-auto">
                                  <img
                                    src="/images/new_resume_builder/icons/main/edit-skill.svg"
                                    alt
                                  />
                                </v-btn>
                                <v-btn color="#F2F3FD" depressed class="btn-skill-action mx-auto">
                                  <img src="/images/new_resume_builder/icons/main/trash.svg" alt />
                                </v-btn>
                              </v-col>
                              <v-col cols="12" class="mt-n7">
                                <v-row align="center">
                                  <v-col cols="12">
                                    <div class="skill-title">Laravel</div>
                                  </v-col>
                                  <v-col cols="9" class="mt-n5">
                                    <v-progress-linear
                                      class="progress-skill"
                                      height="8"
                                      rounded
                                      color="#001CE2"
                                      background-color="#C4C9F5"
                                      value="90"
                                    ></v-progress-linear>
                                  </v-col>
                                  <v-col cols="3" class="mt-n5">
                                    <div class="skill-title">90%</div>
                                  </v-col>
                                </v-row>
                              </v-col>
                            </v-row>
                          </v-card-text>
                        </v-card>
                      </v-col>
                    </v-row>
                  </v-container>
                </v-col>
              </v-row>
            </v-container>
          </v-tab-item>
        </v-tabs-items>
      </v-card>
    </div>
  </v-app>
</template>

<script>
import { moveTabsHelper } from "../../helpers/tab-animations";
export default {
  name: "Skills",
  data() {
    return {
      typeItems: ["Programming Language"],
      skillTab: 0,
      activeTab: "programming_languages",
      tabs: ["programming_languages", "software", "design", "frameworks"],
      skill: {
        category: "",
        title: "",
        percentage: "",
        user_id: this.$store.state.user.id
      },
      addNewSkill: false,
      optionSkillId: 0,
      editedSkill: {},
      errors: {
        new: {},
        edit: {}
      }
    };
  },
  computed: {
    skills() {
      console.log(this.$store.state.user.skills);
      return this.$store.state.user.skills;
    }
  },
  props: ["selectProps"],
  methods: {
    toggleSelect() {
      this.disabledSelect = !this.disabledSelect;
    },
    moveProgressBar() {
      this.skills.forEach(skill => {
        this.progressBarSingleSkill(skill);
      });
    },
    progressBarSingleSkill(skill) {
      let skillIdSelector = $("#skill_" + skill.id);
      let progressBarSelector = $("#progress-bar_" + skill.id);
      let getPercent = skill.percentage / 100;
      let getProgressWrapWidth = skillIdSelector.width();
      let progressTotal = getPercent * getProgressWrapWidth;
      let animationLength = 2000;
      // on page load, animate percentage bar to data percentage length
      // .stop() used to prevent animation queueing
      progressBarSelector.stop().animate(
        {
          left: progressTotal
        },
        animationLength
      );
    },
    addSkill() {
      if (this.validateSkill()) {
        // set skill category & add new
        this.skill.category = this.activeTab;
        axios
          .post("/api/user/skills", this.skill)
          .then(response => {
            let addedSkill = response.data.data;
            this.skills.push(addedSkill);
            this.clearSkill();
            setTimeout(() => {
              // give time to the skill to be loaded
              this.progressBarSingleSkill(addedSkill);
            }, 1500);
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
    validateSkill() {
      this.errors = {
        new: {},
        edit: {}
      };

      if (this.skill.title && this.skill.percentage) {
        return true;
      }

      if (!this.skill.title) {
        this.errors.new.title = "Title required.";
      }
      if (!this.skill.percentage) {
        this.errors.new.percentage = "Percentage required.";
      }

      return false;
    },
    clearSkill() {
      this.skill = {
        category: "",
        title: "",
        percentage: ""
      };
    },

    editSkill(skill) {
      this.editedSkill = {
        id: skill.id,
        category: skill.category,
        title: skill.title,
        percentage: skill.percentage
      };
      this.closeOptionsBtn();
    },
    applyEdit() {
      axios
        .put("/api/user/skills", this.editedSkill)
        .then(response => {
          this.EditedSuccessfully(response.data.data);
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
    deleteSkill(skill) {
      if (
        !confirm("Do you want to delete this skill [" + skill.title + "] ?")
      ) {
        return;
      }
      axios
        .delete("/api/user/skills/" + skill.id)
        .then(response => {
          this.$store.dispatch("flyingNotificationDelete");
          this.skills.forEach((skill, index) => {
            if (skill.id === response.data.data.id) {
              this.skills.splice(index, 1);
            }
          });

          this.closeOptionsBtn();
        })
        .catch(error => {
          console.log(error);
        });
    },
    EditedSuccessfully(editedSkill) {
      this.clearEditedSkill();
      this.$store.dispatch("fullScreenNotification");
      // replace the edited skill with the new one:
      this.skills.forEach((skill, index) => {
        if (skill.id === editedSkill.id) {
          this.skills[index] = editedSkill;
          this.progressBarSingleSkill(editedSkill);
        }
      });
    },
    closeOptionsBtn() {
      this.optionSkillId = 0;
    },
    clearEditedSkill() {
      this.editedSkill = {};
    },
    cancelEdit() {
      this.clearEditedSkill();
      this.closeOptionsBtn();
    },
  },
  mounted() {
    setTimeout(() => {
      // give time to skills to be loaded
      this.moveProgressBar();
    }, 2000);
  }
};
</script>

<style scoped lang="scss">
@import "../../../../../sass/media-queries";

.section-body-wrapper {
  max-width: 1337px;
  width: 100%;

  .action-btns {
    margin-top: 15px;

    .btn {
      @include lt-sm {
        width: 48%;
        min-width: 90px;
        max-width: 142px;
      }
    }

    @include lt-md {
      display: flex;
      justify-content: space-between;
      width: 100%;
      margin-top: 40px;
    }

    @include gt-sm {
      display: none;
    }

    .add-award-btn {
      margin-right: 31px;

      a {
        display: flex;
        justify-content: center;
        align-items: center;

        background: #001ce2 0% 0% no-repeat padding-box;
        border-radius: 8px;

        font: 600 19px Noto Sans;
        letter-spacing: 0;
        color: #ffffff;
        opacity: 1;

        img {
          width: 27px;
          height: 27px;
          margin-right: 10px;
        }
      }
    }

    .auto-import-btn {
      margin-bottom: 7px;

      a {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 226px;
        height: 62px;

        border: 2px solid #001ce2;
        border-radius: 8px;
        opacity: 1;

        font: 600 19px Noto Sans;
        letter-spacing: 0;
        color: #001ce2;

        img {
          width: 27px;
          height: 27px;
          margin-right: 10px;
        }
      }
    }
  }

  .addSkillForm {
    @include lt-md {
      display: block !important;

      .input-field {
        max-width: 100%;
        width: 100%;

        input {
          max-width: 100%;
        }
      }
    }
  }

  .add-award-section {
    display: flex;
    align-items: flex-start;
    flex-direction: column;
    margin-top: 55px;

    .award-input {
      display: flex;
      flex-direction: column;
      margin-bottom: 23px;

      input {
        width: 572.82px;
        height: 76px;
        border: 2px solid #505050;
        border-radius: 10px;
        opacity: 1;
        padding-left: 18px;
      }

      input:focus {
        outline: none;
      }

      label {
        text-align: left;
        font: 600 16px Noto Sans;
        letter-spacing: 0;
        color: #505050;
        opacity: 1;
      }

      @include lt-md {
        width: 100%;

        input {
          width: 100%;
          max-height: 60px;
        }
      }
    }

    .action-btns {
      display: flex;
      margin-top: 15px;

      @include lt-md {
        justify-content: space-between;
        width: 100%;
      }

      .add-award-btn {
        margin-right: 31px;

        a {
          display: flex;
          justify-content: center;
          align-items: center;

          background: #001ce2 0% 0% no-repeat padding-box;
          border-radius: 8px;

          font: 600 19px Noto Sans;
          letter-spacing: 0;
          color: #ffffff;
          opacity: 1;

          img {
            width: 27px;
            height: 27px;
            margin-right: 10px;
          }
        }
      }

      .auto-import-btn {
        margin-bottom: 7px;

        a {
          display: flex;
          justify-content: center;
          align-items: center;
          width: 226px;
          height: 62px;

          border: 2px solid #001ce2;
          border-radius: 8px;
          opacity: 1;

          font: 600 19px Noto Sans;
          letter-spacing: 0;
          color: #001ce2;

          img {
            width: 27px;
            height: 27px;
            margin-right: 10px;
          }
        }
      }
    }
  }

  .skills-list {
    margin-top: 60px;
    max-width: 861px;
    width: 100%;

    .skills-item {
      position: relative;
      background: whitesmoke;
      // margin-left: 43px;
      margin-bottom: 30px;
      display: flex;
      justify-content: center;
      flex-direction: column;
      width: 100%;
      min-height: 140px;
      padding: 10px 43px 30px 43px;
      border-radius: 8px;

      @include lt-md {
        padding: 1em 2em;
      }

      @include lt-sm {
        padding: 1em;
      }

      .skill-title {
        font-family: "Noto Sans", serif;
        font-weight: bold;
        font-size: 22px;
        text-align: left;
        color: #3c3748;
      }

      .percentage {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;

        .percentage-bar {
          width: 85%;

          .progress {
            width: 100%;
            height: 15px;
            border-radius: 23px;
          }

          .progress-wrap {
            width: 100%;
            background: #ff7c00;
            margin: 12px 0;
            overflow: hidden;
            position: relative;

            .progress-bar {
              background: #ffd7b2;
              left: 0;
              position: absolute;
              top: 0;
              border-radius: 0;
              border: 0;
            }
          }

          .progress-wrap.color-blueviolet {
            background: blueviolet;

            .progress-bar {
              background: #bf99e2;
            }
          }
        }

        .percentage-text {
          font-family: "Noto Sans", serif;
          font-weight: bold;
          font-size: 22px;
          text-align: right;
          color: #ff7c00;
        }

        .percentage-text.color-blueviolet {
          color: blueviolet;
        }
      }

      .options {
        position: absolute;
        right: 14px;
        top: 14px;

        .options-btn {
          a {
            width: 88px;
            height: 29px;

            display: flex;
            justify-content: center;
            align-items: center;

            background: #ffffff 0 0 no-repeat padding-box;
            border: 1px solid #505050;
            border-radius: 5px;
            opacity: 1;

            font: 600 13px Noto Sans;
            letter-spacing: 0;
            color: #505050;

            img {
              width: 13.3px;
              height: 6.8px;
              margin-left: 8px;
            }

            img.optionsOpened {
              -webkit-transform: scaleY(-1);
              transform: scaleY(-1);
            }
          }

          a.opened {
            border: 1px solid #1f5de4;
          }

          a:focus {
            outline: none !important;
            box-shadow: none !important;
          }
        }

        .extended-options {
          background: #ffffff 0 0 no-repeat padding-box;
          border: 1px solid #505050;
          border-radius: 5px;
          opacity: 1;
          margin-top: 8px;
          width: 88px;
          height: 60px;
          padding-top: 7px;
          padding-left: 8px;

          .edit-btn,
          .delete-btn {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            font: 600 13px Noto Sans;
            letter-spacing: 0;
            color: #505050;

            img {
              width: 15.75px;
              height: 14px;
              margin-right: 6px;
            }

            &:hover {
              cursor: pointer;
            }
          }

          .delete-btn {
            margin-top: 8px;

            img {
              width: 10.89px;
              height: 14px;
              margin-right: 9.5px;
            }
          }
        }

        .extended-options.opened {
          border: 1px solid #1f5de4;
          position: relative;
          z-index: 2;
        }
      }

      .editForm {
        display: flex;
        justify-content: center;
        width: 100%;

        .add-award-section {
          width: 580px;

          @include lt-md {
            width: 100%;
          }
        }

        .action-btns {
          justify-content: space-between;
          width: 100%;
        }
      }
    }
  }
}

.error {
  color: red;
  font-weight: 600;
  margin-left: 5px;
}
.card-skill-items {
  width: 1412px !important;
  @media screen and (min-width: 1264px) and (max-width: 1903px) {
    width: auto !important;
  }
  @media screen and (min-width: 960px) and (max-width: 1263px) {
    width: auto !important;
  }
  @media screen and (max-width: 959px) {
    width: auto !important;
  }

  box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1);
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
  .card-skill {
    border-radius: 10px !important;
    height: 76px !important;
    @media screen and (min-width: 1264px) and (max-width: 1903px) {
      min-width: 400px !important;
    }
    @media screen and (min-width: 600px) and (max-width: 767px) {
      height: 95px !important;
    }
    @media screen and (max-width: 599px) {
      height: 88px !important;
    }
    .btn-v_bar {
      min-width: 30px !important;
      min-height: 30px !important;
      width: 30px !important;
      height: 30px !important;
      background: #f2f3fd;
      border-radius: 5px;
      @media screen and (max-width: 599px) {
        min-width: 25px !important;
        min-height: 25px !important;
        width: 25px !important;
        height: 25px !important;
      }
    }
    .skill-title {
      font-family: "Noto Sans" !important;
      font-weight: 500;
      font-size: 16px !important;
      line-height: 14px;
      color: #888db1;
    }
    .progress-skill {
      border-radius: 20px !important;
      background-color: #c4c9f5 !important;
    }
    .btn-skill-action {
      border-radius: 5px !important;
      min-width: 30px !important;
      min-height: 30px !important;
      width: 30px !important;
      height: 30px !important;
    }

    .row-skill-details {
      @media screen and (min-width: 768px) {
        display: flex;
      }
      @media screen and (max-width: 767px) {
        display: none;
      }
    }

    .row-skill-details-mobile {
      @media screen and (min-width: 768px) {
        display: none;
      }
      @media screen and (max-width: 767px) {
        display: flex;
        margin-top: -14px !important;
      }
    }
  }
}
</style>

<style>
#resumeBuilder .v-progress-linear__determinate {
  border-top-right-radius: 5px !important;
  border-bottom-right-radius: 5px !important;
}
</style>
