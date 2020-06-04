<template>
  <v-app>
    <div style="width: 100%">
      <v-card color="transparent" flat tile>
        <v-tabs hide-slider v-model="skillTab">
          <v-tab
            :active-class="index==0?'custom-active-class custom-active-left': index==4?'custom-active-class custom-active-right':'custom-active-class'"
            :class="[index>0?'custom-tab custom-tab-border':'custom-tab', index==0?'custom-active-left':index==4?'custom-active-right':'']"
            v-for="(i,index) in 5"
            :key="index"
          >Skill {{i}}</v-tab>
        </v-tabs>
      </v-card>
      <v-card>
        <v-tabs-items v-model="skillTab">
          <v-tab-item v-for="i in 5" :key="i">
            <v-row>
              <v-col
                cols="3"
                v-for="j in 3"
                :key="j"
              >Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam consequuntur ab odit aspernatur alias! Sunt itaque temporibus consectetur quae exercitationem officia! Voluptatibus voluptatem nostrum inventore excepturi beatae nihil! Eum, corporis!</v-col>
            </v-row>
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
      return this.$store.state.user.skills;
    }
  },
  methods: {
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
    setActiveTab(tab) {
      this.activeTab = tab;
    },
    changeTab(e) {
      // Here will be the animations between transitions

      moveTabsHelper(e, "skillLinksWrapper", this);
    }
  },
  mounted() {
    setTimeout(() => {
      // give time to skills to be loaded
      this.moveProgressBar();
    }, 2000);

    this.changeTab({
      target: document.querySelector(`.bar-item[data-target=${this.activeTab}]`)
    });
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
.custom-tab {
  font-family: "Noto Sans" !important;
  font-size: 18px !important;
  line-height: 25px;
  color: #888db1 !important;
  background: #f2f3fd !important;
  text-transform: capitalize !important;
}
.custom-tab-border {
  border-left: 1px solid #e6e8fc;
}
.custom-active-class {
  font-family: "Noto Sans" !important;
  font-size: 18px !important;
  line-height: 25px;
  color: #ffffff !important;
  background: #001ce2 !important;
  text-transform: capitalize !important;
}

.custom-active-left {
  border-top-left-radius: 10px;
}
.custom-active-right {
  border-top-right-radius: 10px;
}
</style>
