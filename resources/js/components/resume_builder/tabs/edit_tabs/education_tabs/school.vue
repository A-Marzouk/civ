<template data-app>
  <div class="education-wrapper">
    <div class="float-container">
      <v-form class="grid-form" ref="form" :lazy-validation="lazy">

        <v-text-field
          id="collegeName"
          v-model="newEducation.university_name"
          class="resume-builder__input civie-input"
          placeholder="University Of The People"
          outlined
          label="Institution Name"
          color="#001CE2"
          :error="!!errors.university_name"
          :error-messages="errors.university_name"
        ></v-text-field>

        <v-text-field
          id="gradeTitle"
          v-model="newEducation.degree_title"
          class="resume-builder__input civie-input"
          placeholder="Bachelor"
          outlined
          label="Title"
          color="#001CE2"
          :error="!!errors.degree_title"
          :error-messages="errors.degree_title"
        ></v-text-field>

        <v-text-field
          id="location"
          v-model="newEducation.location"
          placeholder="Remote"
          class="resume-builder__input civie-input"
          outlined
          label="Location"
          color="#001CE2"
          :error="!!errors.location"
          :error-messages="errors.location"
        ></v-text-field>

        <v-textarea
          id="description"
          v-model="newEducation.description"
          placeholder="Describe your education"
          class="resume-builder__input civie-textarea"
          outlined
          label="Description"
          color="#001CE2"
          :error="!!errors.description"
          :error-messages="errors.description"
        ></v-textarea>

        <v-text-field
          id="website"
          v-model="newEducation.website"
          placeholder="https://website.com"
          class="resume-builder__input civie-input"
          outlined
          label="Website"
          color="#001CE2"
          :error="!!errors.website"
          :error-messages="errors.website"
        ></v-text-field>

        <!-- date tags -->

        <div class="date-group mb-5">
            <div class="date-input mr-1" style="flex: 1">
                <label class="ml-1" :class="{'error-label' : errors.date_from}">Date</label>
                
                <div style="display: flex">
                  <input type="date" style="flex: 1"
                    class="pr-2" :class="{'error-input' : errors.date_from}" v-model="newEducation.date_from">
                </div>
            </div>

            <div class="date-input ml-1" style="flex: 1;">
                <label :class="{'error-label' : errors.date_to}" class="light d-flex align-items-center mr-1">
                    <input type="checkbox" class="checkbox" v-model="newEducation.present"> <span class="present-text">Present</span>
                </label>
                
                <div style="display: flex; transition: all 1.5s;" :class="{'zero-opacity': newEducation.present}">
                  <input type="date" style="flex: 1" class="pr-2"
                    :class="{'error-input' : errors.date_to}"  v-model="newEducation.date_to" :disabled="newEducation.present">
                </div>
            </div>
        </div>

        <!-- date tags end -->

        <v-select
          id="currentStatus"
          class="resume-builder__input civie-select"
          v-model="newEducation.institution_type"
          outlined
          placeholder="Select an option"
          :items="institutionTypes"
          label="Education Type"
          :error="!!errors.institution_type"
          :error-messages="errors.institution_type"
        >
          <button class="dropdown-icon icon" @click.prevent slot="append">
            <svg-vue :icon="`dropdown-caret`"></svg-vue>
          </button>
        </v-select>

      </v-form>

      <div class="edu-action-btns mt-3">
        <v-btn
          class="resume-builder__btn civie-btn filled"
          raised depressed
          @click="addEducation"
        >{{newEducation.id !== '' ? 'Update' : 'Add New'}}</v-btn>

        <v-btn
          class="resume-builder__btn civie-btn cancel-btn"
          raised depressed
          @click="clearEducation"
          v-show="newEducation.id !== '' "
        >Cancel</v-btn>
      </div>

      <draggable
        class="education-list"
        v-model="educations"
        @start="drag=true"
        @end="drag=false"
        handle=".drag-handler"
      >
        <div
          v-for="education in educations"
          class="education-item"
          :class="{'closed' : expandedEducationID !== education.id, 'half-opacity' : !education.is_public}"
          :key="education.id"
        >
          <div class="drag-handler">
            <span class="circle"></span>
            <span class="circle"></span>
            <span class="circle"></span>
          </div>

          <div class="education-item__header">
            <div class="description">
              <svg-vue :icon="'work-experience-icon'" class="icon"></svg-vue>
              <div class="school-name">
                {{education.university_name}},
                <span class="gray">{{education.website}}</span>
                <div class="grade-title">{{education.degree_title}}</div>
              </div>
            </div>
            <div class="resume-builder__action-buttons-container">
              <v-btn
                class="btn-icon civie-btn"
                @click="toggleEducationVisibility(education)"
                depressed
              >
                <svg-vue icon="eye-icon" class="icon" :class="{'visible' : education.is_public}"></svg-vue>
              </v-btn>
              <v-btn class="btn-icon civie-btn" depressed @click="editEducation(education)">
                <svg-vue
                  icon="edit-icon"
                  class="icon"
                  :class="{'visible' : newEducation.id === education.id}"
                ></svg-vue>
              </v-btn>
              <v-btn class="btn-icon civie-btn" @click="deleteEducation(education)" depressed>
                <svg-vue icon="trash-delete-icon" class="icon"></svg-vue>
              </v-btn>
              <v-btn
                class="btn-icon mainBg civie-btn toogleDropdownBtn"
                :class="{'closed' : expandedEducationID !== education.id}"
                @click="toggleEducationCard(education)"
                depressed
              ></v-btn>
            </div>
          </div>

          <div class="education-item__content">
            <div class="date">
              {{ `${education.date_from}${education.present ? ' - Present' : ' - ' + education.date_to}`
              }}
            </div>
            <article>{{education.description}}</article>
          </div>
        </div>
      </draggable>
    </div>
  </div>
</template>

<script>
import draggable from "vuedraggable";

export default {
  props: ["activeTab"],
  components: {
    draggable,
  },
  data: () => ({
    lazy: false,
    institutionTypes: [
      "School",
      "University",
      "College",
      "Seminar",
      "Course",
      "Training",
    ],
    newEducation: {
      id: "",
      institution_type: "",
      university_name: "",
      degree_title: "",
      description: "",
      website: "",
      date_from: "",
      date_to: "",
      present: false,
    },
    errors: {},
    expandedEducationID: 0,
  }),
  computed: {
    computedDateFormatted() {
      return this.formatDate(this.date);
    },
    educations: {
      get() {
        return this.$store.state.user.education;
      },
      set(educations) {
        this.$store.commit("updateEducation", educations);
      },
    },
  },
  watch: {},
  methods: {
    toggleInput(inputData) {
      inputData.disabled = !inputData.disabled;
    },
    validate() {
      this.$refs.form.validate();
    },
    reset() {
      this.$refs.form.reset();
    },
    resetValidation() {
      this.$refs.form.resetValidation();
    },
    formatDate(date) {
      if (!date) return null;

      const [year, month, day] = date.split("-");
      return `${day}/${month}/${year}`;
    },
    parseDate(date) {
      if (!date) return null;

      const [month, day, year] = date.split("/");
      return `${year}-${month.padStart(2, "0")}-${day.padStart(2, "0")}`;
    },

    //    functions for backend
    toggleEducationCard(education) {
      this.expandedEducationID === education.id
        ? (this.expandedEducationID = 0)
        : (this.expandedEducationID = education.id);
    },
    toggleEducationVisibility(education) {
      education.is_public = !education.is_public;
      axios
        .put("/api/user/education", education)
        .then((response) => {
          this.$store.dispatch("flyingNotification");
        })
        .catch((error) => {
          if (typeof error.response.data === "object") {
            this.errors = error.response.data.errors;
          } else {
            this.errors = "Something went wrong. Please try again.";
          }
          this.$store.dispatch("flyingNotification", {
            message: "Error",
            iconSrc: "/images/resume_builder/error.png",
          });
        });
    },
    editEducation(education) {
      this.newEducation = {
        id: education.id,
        institution_type: education.institution_type,
        university_name: education.university_name,
        degree_title: education.degree_title,
        description: education.description,
        website: education.website,
        date_from: education.date_from,
        date_to: education.date_to,
        present: education.present,
      };
    },
    deleteEducation(education) {
      if (!confirm("Do you want to delete this education ?")) {
        return;
      }
      axios
        .delete("/api/user/education/" + education.id)
        .then((response) => {
          this.$store.dispatch("flyingNotificationDelete");
          this.educations.forEach((myEducation, index) => {
            if (myEducation.id === response.data.data.id) {
              this.educations.splice(index, 1);
            }
          });


        })
        .catch((error) => {
          console.log(error);
        });
    },
    addEducation() {
      this.errors = {};
      this.newEducation.user_id = this.$store.state.user.id;
      this.newEducation.category = this.activeTab;

      let edit = false;
      if (this.newEducation.id !== "") {
        edit = true;
      }

      axios
        .post("/api/user/education", this.newEducation)
        .then((response) => {
          if (!edit) {
            this.educations.unshift(response.data.data);
          } else {
            this.educations.forEach((myEducation, index) => {
              if (myEducation.id === response.data.data.id) {
                this.educations.splice(index, 1, response.data.data);
              }
            });
          }

          this.clearEducation();
          this.$store.dispatch("flyingNotification");
        })
        .catch((error) => {
          if (typeof error.response.data === "object") {
            this.errors = error.response.data.errors;
          } else {
            this.errors = "Something went wrong. Please try again.";
          }
          this.$store.dispatch("flyingNotification", {
            message: "Error",
            iconSrc: "/images/resume_builder/error.png",
          });
        });
    },
    clearEducation() {
      this.newEducation = {
        id: "",
        institution_type: "",
        university_name: "",
        degree_title: "",
        description: "",
        website: "",
        date_from: "",
        date_to: "",
        present: false,
      };
    },
  },
};
</script>

<style lang="scss">
@import "../../../../../../sass/variables";
@import "../../../../../../sass/media-queries";

.education-wrapper {
  .edu-action-btns {
    display: flex;
  }

  .present-text{
    margin-right: 95px;
    @media screen and (min-width: 1280px) and (max-width: 1700px){
      margin-right: 50px;
    }
    @media screen and (min-width:1701px) and (max-width: 1800px){
      margin-right: 65px;
    }
    @media screen and (min-width: 960px) and (max-width: 1279px){
      margin-right:50px;
    }
    @media screen and (max-width: 959px){
      margin-right: 100px;
    }

  }

  position: relative;
  padding: 60px 50px;

  @include lt-sm {
    padding: 30px 15px;
  }

  .float-container {
    background-color: $secondaryColor;
    width: 100%;
    height: 100%;
    position: relative;
    z-index: 1;
  }

  .grid-form {
    display: grid;
    grid-template-columns: repeat(4, 1fr);  
    grid-template-rows: 100px;
    grid-column-gap: 20px;

    
    // Exceptions on breakpoint
    
    .date-input input {
      max-width: 8rem;
    }
    

    @include lt-md {
      grid-template-columns: repeat(2, 1fr);

      .civie-textarea {
        grid-row: 4 / 5;
      }

      .date-group {
        grid-column: 2 / 3;
      }

      .civie-select {
        grid-column: 1 / 2;
        grid-row: 3 / 4
      }

      .date-input input {
        max-width: 12rem;
      }
      
    }

    // date input responsive ----

    @media screen and (min-width: 1804px) {
      .date-input input {
        max-width: 40rem;
      }
    }

    @media screen and (max-width: 800px) {
      .date-input input {
        max-width: 12rem;
      }
    }

    @media screen and (max-width: 715px) {
      .date-input input {
        max-width: 9rem;
      }
    }

    //------

    @include lt-sm {
      grid-template-columns: repeat(1, 1fr);

      .date-input input {
        max-width: 40rem;        
      }

      .civie-textarea {
        grid-row: 7 / 8;
      }

      .date-group {
        grid-column: 1 / 2;
      }

      .civie-select {
        grid-column: 1 / 2;
        grid-row: 3 / 4
      }
    }

    @media screen and (max-width: 418px) {
      .date-input input {
        max-width: 40rem;
      }
    }

    @media screen and (max-width: 413px) and (min-width: 360px) {
      .date-input input {
        max-width: 8rem;
      }

      .date-input {
        max-width: 8rem;
      }
    }
  }

  // Exceptions on breakpoint end ----

  

  .education-list {
    display: flex;
    flex-direction: column;
    margin-top: 25px;

    .education-item {
      height: auto;
      max-width: 842px;
      width: 100%;
      padding: 20px 38px 20px 60px;
      position: relative;
      margin: 15px 0;
      box-shadow: 0 5px 20px rgba($color: #001083, $alpha: 0.1);

      &.closed {
        .education-item__content {
          height: 0;
          transition: height 0.5s ease;
        }
      }

      .drag-handler {
        position: absolute;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        top: 11px;
        left: 0;
        width: 50px;
        height: 50px;

        &:hover {
          cursor: grab;
        }

        .circle {
          display: block;
          background: $inputTextColor;
          height: 2px;
          width: 2px;
          border: solid 0.5px $inputTextColor;
          margin-bottom: 3px;

          &:last-child {
            margin: 0;
          }
        }
      }

      &__header {
        display: flex;
        justify-content: space-between;

        .description {
          display: flex;

          .icon {
            width: 24px;
            height: 24px;
            fill: transparent;
            margin-top: 2px;
            margin-right: 20px;
          }

          .school-name {
            font-size: 20px;
            color: $mainColor;
            font-weight: bold;
            text-transform: uppercase;

            .gray {
              color: $inputTextColor;
            }

            .grade-title {
              font-size: 14px;
              color: $inputTextColor;
            }
          }
        }
      }

      &__content {
        margin-top: 25px;
        height: 120px;
        transition: height 0.5s ease;
        overflow: auto;

        .date {
          font-size: 14px;
          font-style: italic;
          color: $inputTextColor;
        }

        article {
          font-size: 16px;
          color: $inputTextColor;
          margin-top: 20px;
          overflow: auto;
        }
      }

      @include lt-md {
        padding: 20px 30px 20px 50px;

        &__header {
          .description {
            .school-name {
              font-size: 16px;
            }
          }
        }
      }

      @include lt-sm {
        padding: 17px 15px;

        &__header {
          flex-wrap: wrap;
          flex-direction: column;
          align-items: flex-end;
          justify-content: flex-start;

          .description {
            width: 100%;
            order: 2;

            .school-name {
              font-size: 20px;

              .grade-title {
                font-size: 16px;
              }
            }
          }

          .resume-builder__action-buttons-container {
            align-self: flex-end;
            margin-bottom: 20px;
          }
        }

        &__content {
          article {
            font-size: 14px;
          }
        }
      }
    }
  }
}

.date-group {
  margin-top: 28px;
  display: flex;

  @include lt-lg {
  }

  @include lt-md {
  }

  .date-text {
    // font: 500 15px/15px Noto Sans;
    letter-spacing: 0;
    color: #888db1;
    opacity: 1;
    // margin: 10px 9px;

    @include lt-lg {
    }

    @include lt-md {
      font-size: 16px;
    }

    @include lt-sm {
      font-size: 12px;
    }
  }

  .date-input {
    display: flex;
    flex-direction: column;
    // width: 126px;
    width: 50%;
    position: relative;

    label {
      text-align: left;
      position: absolute;
      top: -29px;
      letter-spacing: 0;
      font-size: 15px !important; //adjusted | 18px
      font-weight: 400;
      line-height: 25px;
      color: #888db1;
      opacity: 1;

      @include lt-md {
        font-size: 18px;
        color: #888db1;
      }
    }

    label.light {
      font-size: 15px; //adjusted | 18px
      // margin-right: 4.4rem; //added
      letter-spacing: 0;
      right: 0;
      opacity: 1;

      @include lt-md {
        color: #888db1;
      }
    }

    input {
      height: 48px; // adjusted | 50px
      border: none;
      border-bottom: 1.95px solid #C4C9F5 !important;
      border-radius: 0;
      opacity: 1;
      color: #c4c9f5;

      @include lt-lg {
      }

      @include lt-md {
      }
    }

    input.error-input {
      border: 2px solid red !important;
    }

    input:focus {
      outline: none;
    }

    input.checkbox {
      width: 12px;
      height: 12px;
      padding-left: 0;
      margin-right: 8px;
    }
  }
}

.error-label {
  color: red !important;
}

.error-input {
  border: 2px solid red !important;
}
.current-work-text {
  // margin-right: 53px;
  // @media screen and (max-width: 1903px) {
  //   margin-right: 120px;
  // }
  // @media screen and (max-width: 1430px) {
  //   margin-right: 80px;
  // }
  // @media screen and (max-width: 1279px) {
  //   margin-right: 108px;
  // }
  // @media screen and (max-width: 959px) {
  //   margin-right: 50px;
  // }
}
</style>