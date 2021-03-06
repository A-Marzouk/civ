<template>
  <v-app style="margin: 0; padding: 0; background: none;">
    <div style="width: 100%" class="main-container pa-md-0 pa-sm-0 pa-3">
      <v-card color="transparent" flat tile>
        <div class="d-flex justifyspace reverse-on-phone" style="max-width: 86%">
          <v-tabs class="resume-builder__tab-bar" center-active hide-slider v-model="activeTab" height="51">
            <v-tab style="font-weight: 400"
                   class="resume-builder__tab" @click="setSkillCategory(tab.toString())"
                   v-for="tab in tabs"
                   :key="tab"
            >{{tab.replace('_',' ')}}</v-tab>
          </v-tabs>
        </div>
      </v-card>
      <div class="skills-content resume-builder__scroll" id="skillsContent">
          <div style="width:100%;" class="card-skill-items">
              <v-row class="align-items-baseline">
                <v-col xl="4" lg="4" md="6" sm="6" cols="12" class="mt-md-0 mt-sm-0 mt-n10">
                  <v-card flat tile color="transparent" class="mt-10 ml-xl-10">
                    <v-combobox
                        v-model="editedSkill.title"
                        :items="getSkillSet"
                        :search-input.sync="search"
                        flat
                        placeholder="Skill Title"
                        :label="skillCategory === mainSkillsTabName ? 'Main Skill' : 'Skill Title' "
                        outlined
                        color="#001CE2"
                        class="resume-builder__input civie-select"
                        :error="!!errors.title"
                        :error-messages="errors.title"
                    >
                        <button class="dropdown-icon icon pb-1" slot="append">
                            <!-- <svg-vue></svg-vue> -->
                        </button>

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
                  </v-card>
                </v-col>

                <v-col
                  xl="4"
                  lg="4"
                  md="6"
                  sm="6"
                  cols="12"
                  class="mt-md-0 mt-sm-n10 mt-n12 ml-xl-n7"
                  v-if="skillCategory !== mainSkillsTabName"
                >
                  <v-card flat tile color="transparent" class="mt-10 ml-xl-10">
                    <v-text-field
                      class="resume-builder__input civie-input"
                      outlined
                      type="number"
                      min="0"
                      max="99"
                      step="1"
                      placeholder="99%"
                      v-model="editedSkill.percentage"
                      label="Skill Amount"
                      :error="!!errors.percentage"
                      :error-messages="errors.percentage"
                      color="#001CE2"
                    ></v-text-field>
                  </v-card>
                </v-col>

                <v-col xl="4" lg="4" md="6" sm="6" cols="3" class="mt-lg-n2 my-md-n10 mt-sm-n10 mt-n6 d-flex">
                  <v-btn
                    class="resume-builder__btn civie-btn filled btn-add-new mt-2 ml-xl-0 ml-lg-n2 ml-sm-n0 ml-0 mr-lg-7 mr-md-7"
                    @click="addSkill"
                  >{{editedSkill.id === undefined ? 'Add New' : 'Update'}}</v-btn>
                  
                  <v-btn
                    class="resume-builder__btn civie-btn btn-add-new mt-2 ml-5"
                    @click="cancelEdit"
                    v-show="editedSkill.id !== undefined"
                  >Cancel</v-btn>
                </v-col>
              </v-row>

              <v-row>
                <v-col xl="6" :lg="windowWidth<1440?'8':'7'" md="12" sm="12" cols="12">
                  <v-container fluid style="width:100%;" ma-0 pa-0>
                    <v-row align="center" dense>
                      <v-col cols="12">
                        <draggable v-model="skills" @start="drag=true" @end="drag=false"  handle=".drag-handler">
                          <v-card
                                  v-for="skill in skills"
                                  :key="skill.id"
                                  v-show="skill.category === skillCategory && skillCategory !== 'Main Skills'"
                                  color="#E6E8FC"
                                  class="card-skill ml-xl-10 mt-md-0 mt-sm-5 mt-5 mb-5"
                                  :class="{'half-opacity' : !skill.is_public, 'edit' : skill.id === editedSkill.id}"
                                  flat
                          >
                            <v-card-text>
                              <!-- skill for desktop -->
                              <v-row align="center" justify="center" class="mt-n3 row-skill-details">
                                <v-col xl="1" lg="2" md="1" sm="1" cols="2" class="drag-handler">
                                  <v-btn depressed class="btn-v_bar" color="#F2F3FD">
                                    <v-icon color="#888DB1">mdi-dots-vertical</v-icon>
                                  </v-btn>
                                </v-col>
                                <v-col xl="6" lg="5" md="7" sm="6" cols="6">
                                  <v-card color="transparent" flat tile>
                                    <div class="skill-title">{{skill.title}}</div>
                                    <div class="mt-3">
                                      <v-progress-linear
                                              class="progress-skill"
                                              height="8"
                                              rounded
                                              color="#001CE2"
                                              background-color="#C4C9F5"
                                              :value="skill.percentage"
                                      ></v-progress-linear>
                                    </div>
                                  </v-card>
                                </v-col>
                                <v-col xl="2" lg="2" md="1" sm="2" cols="2" class="mt-5">
                                  <span class="skill-title">{{skill.percentage}}%</span>
                                </v-col>
                                <v-col
                                        xl="3"
                                        lg="3"
                                        md="3"
                                        sm="3"
                                        cols="3"
                                        align="right"
                                        class="mt-5 resume-builder__action-buttons-container"
                                >
                                  <v-btn
                                          color="#F2F3FD"
                                          depressed
                                          @click="toggleVisibility(skill)"
                                          class="btn-skill-action mr-xl-1 mr-lg-1 mx-1"
                                  >
                                    <svg-vue
                                            icon="eye-icon"
                                            :class="{'visible' : skill.is_public}"
                                            class="icon"
                                    ></svg-vue>
                                  </v-btn>
                                  <v-btn
                                          color="#F2F3FD"
                                          depressed
                                          @click="editSkill(skill)"
                                          class="btn-skill-action mr-xl-1 mr-lg-1 mr-1"
                                  >
                                    <svg-vue icon="edit-icon" class="icon"></svg-vue>
                                  </v-btn>
                                  <v-btn
                                          color="#F2F3FD"
                                          depressed
                                          @click="deleteSkill(skill)"
                                          class="btn-skill-action mr-xl-1 mr-lg-1 mr-1"
                                  >
                                    <svg-vue icon="trash-delete-icon" class="icon"></svg-vue>
                                  </v-btn>
                                </v-col>
                              </v-row>

                              <!-- skill for mobile -->
                              <v-row
                                      align="center"
                                      justify="center"
                                      class="row-skill-details-mobile mt-n5"
                              >
                                <v-col cols="6">
                                  <v-btn depressed class="btn-v_bar drag-handler">
                                    <v-icon color="#888DB1">mdi-dots-vertical</v-icon>
                                  </v-btn>
                                </v-col>
                                <v-col cols="6" align="right" class="resume-builder__action-buttons-container">
                                  <v-btn
                                          color="#F2F3FD"
                                          depressed
                                          @click="toggleVisibility(skill)"
                                          class="btn-skill-action mr-xl-1 mr-lg-auto mx-auto"
                                  >
                                    <svg-vue
                                            icon="eye-icon"
                                            :class="{'visible' : skill.is_public}"
                                            class="icon"
                                    ></svg-vue>
                                  </v-btn>
                                  <v-btn
                                          color="#F2F3FD"
                                          depressed
                                          @click="editSkill(skill)"
                                          class="btn-skill-action mr-xl-1 mr-lg-auto mx-auto"
                                  >
                                    <svg-vue icon="edit-icon" class="icon"></svg-vue>
                                  </v-btn>
                                  <v-btn
                                          color="#F2F3FD"
                                          depressed
                                          @click="deleteSkill(skill)"
                                          class="btn-skill-action mr-xl-1 mr-lg-auto mx-auto"
                                  >
                                    <svg-vue icon="trash-delete-icon" class="icon"></svg-vue>
                                  </v-btn>
                                </v-col>
                                <v-col cols="12" class="mt-n4">
                                  <v-row align="center">
                                    <v-col cols="12" class="mb-1">
                                      <div class="skill-title">{{skill.title}}</div>
                                    </v-col>
                                    <v-col cols="9" class="mt-n5">
                                      <v-progress-linear
                                              class="progress-skill"
                                              height="8"
                                              rounded
                                              color="#001CE2"
                                              background-color="#C4C9F5"
                                              :value="skill.percentage"
                                      ></v-progress-linear>
                                    </v-col>
                                    <v-col cols="3" class="mt-n5">
                                      <div class="skill-title mt-n1">{{skill.percentage}}%</div>
                                    </v-col>
                                  </v-row>
                                </v-col>
                              </v-row>
                            </v-card-text>
                          </v-card>
                        </draggable>
                      </v-col>
                      <v-col cols="12" class="d-flex flex-wrap ml-xl-10 mt-md-0 mt-sm-5 mt-5 mb-5">
                        <div  v-for="skill in skills" v-show="skill.category === skillCategory && skillCategory === 'Main Skills'"   :key="skill.id + 'main'" class="skill-chip">
                          <span>{{skill.title}}</span>
                          <img src="/icons/deletex.svg" @click="deleteSkill(skill)" alt="skill delete">
                        </div>
                      </v-col>
                    </v-row>
                  </v-container>

                </v-col>
              </v-row>
          </div>
      </div>
    </div>
  </v-app>
</template>

<script>

import draggable from "vuedraggable";

import { skills } from '../../helpers/pretexts';

export default {
  name: "Skills",
  components: {
    draggable
  },
  data() {
    return {
      windowWidth: window.innerWidth,
      typeItems: ["Programming Language"],
      activeTab: 0,
      mainSkillsTabName: 'Main Skills',
      skillCategory: 'Main Skills',
      tabs: [ "Main Skills" ,"Development", "Design", "Leadership", "Professionalism", "Organizational", "Team Building", "Personal Life", "Analytical", "Sports", "Business related", "Technical","Communication", "Creativity", "Nursing and Healthcare"],
      addNewSkill: false,
      optionSkillId: 0,
      search:'',
      skillItems: skills,
      editedSkill: {
        category: "",
        title: "",
        percentage: ""
      },
      errors: {}
    };
  },
  computed: {
    skills: {
      get() {
        return this.$store.state.user.skills;
      },
      set(skills) {
        this.$store.commit("updateSkills", skills);
      }
    },
    getSkillSet() {
      return this.skillItems[this.skillCategory.split(" ")[0].toLowerCase()]
    }
  },
  props: ["selectProps"],
  methods: {
    toggleSelect() {
      this.disabledSelect = !this.disabledSelect;
    },
    setSkillCategory(category) {
      this.skillCategory = category;
      this.clearSkill();
    },
    toggleVisibility(skill) {
      skill.is_public = !skill.is_public;
      axios
        .post("/api/user/skills/toggle-visibility", skill)
        .then(response => {
          this.$store.dispatch("flyingNotification");
        })
        .catch(error => {
          console.log(error);
        });
    },
    addSkill() {
      if(this.skillCategory === this.mainSkillsTabName){
        this.editedSkill.percentage = 100;
      }
      if (this.validateSkill()) {
        // set skill category & add new

        let edit = false;
        if (this.editedSkill.id !== undefined) {
          edit = true;
        }

        this.editedSkill.category = this.skillCategory;
        this.editedSkill.user_id = this.$store.state.user.id;

        axios
          .post("/api/user/skills", this.editedSkill)
          .then( (response) => {
            response.data.data.is_public = true;
            if (!edit) {
              let addedSkill = response.data.data;
              this.skills.push(addedSkill);
            } else {
              this.skills.forEach((skill, index) => {
                if (skill.id === response.data.data.id) {
                  this.skills.splice(index, 1, response.data.data);
                }
              });
            }

            this.clearSkill();
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
      }
    },
    validateSkill() {
      this.errors = {
        new: {},
        edit: {}
      };

      if (this.editedSkill.title && this.editedSkill.percentage) {
        return true;
      }

      if (!this.editedSkill.title) {
        this.errors.title = "Title required.";
      }
      if (!this.editedSkill.percentage) {
        this.errors.percentage = "Percentage required.";
      }

      return false;
    },
    clearSkill() {
      this.editedSkill = {
        category: this.skillCategory,
        title: "",
        percentage: ""
      };
    },
    editSkill(skill) {
      this.editedSkill = {
        id: skill.id,
        category: skill.category,
        title: skill.title,
        percentage: skill.percentage,
        user_id: skill.user_id
      };

      // scroll to the top of the element:
      document.getElementById("skillsContent").scrollTop = 0;
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
        })
        .catch(error => {
          console.log(error);
        });
    },
    cancelEdit() {
      this.clearSkill();
    }
  },
  mounted() {
    window.onresize = () => {
      this.windowWidth = window.innerWidth;
    };
  }
};
</script>

<style scoped lang="scss">
@import "../../../../../sass/media-queries";

.skill-chip{
  background: #E6E8FC;
  border-radius: 7px;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 39px;
  font-style: normal;
  font-weight: 500;
  font-size: 17px;
  color: #888DB1;
  padding-left:11px;
  padding-right:11px;
  width: fit-content;
  margin-right: 12px;
  margin-bottom: 12px;
  span{
    margin-right: 6px;
  }
  img{
    &:hover{
      cursor: pointer;
    }
  }
}
.civie-select,
.civie-input {
  min-width: 300px;
}

.skills-content {
  height: 450px;
  background: #fff;
  box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1);
  padding-right: 22px;
  @include lt-sm{
    padding-right: 10px;
  }
  margin-bottom: 70px;
  scroll-behavior: smooth;
  overflow-y: scroll;
}

.civie-btn {
  margin-left: 30px;
}

.error {
  color: red;
  font-weight: 600;
  margin-left: 5px;
}
.card-skill-items {
  width: 100%;
  min-height: 100%;
  @include lt-sm{
    padding: 0 30px;
  }
  @include lt-md{
    padding: 0 30px;
  }
  @include lt-lg{
    padding: 0 30px;
  }


  @media screen and (min-width: 1264px) and (max-width: 1903px) {
    width: auto !important;
    padding: 0 30px;
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
    box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1) !important;
    @media screen and (max-width: 767px) {
      width: 100px !important;
      height: 40px !important;
      font-size: 15px !important;
    }
  }

  .card-skill {
    border-radius: 10px !important;
    height: 76px !important;

    &.edit{
      border: blue solid 1.6px !important;
    }

    @media screen and (min-width: 1264px) and (max-width: 1903px) {
      min-width: 400px !important;
    }
    @media screen and (min-width: 600px) and (max-width: 767px) {
      min-height: 95px !important;
    }
    @media screen and (max-width: 599px) {
      min-height: 110px !important;
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
      background: #F2F3FD;
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

  .eye-icon {
    width: 16px;
    height: auto;
  }
}

  .drag-handler{
    &:hover{
      cursor: pointer;
    }
  }
</style>

<style>
#resumeBuilder .v-progress-linear__determinate {
  border-top-right-radius: 5px !important;
  border-bottom-right-radius: 5px !important;
}

.v-slide-group__prev {
  display: none !important;
}

.v-slide-group__next {
  display: none !important;
}
</style>
