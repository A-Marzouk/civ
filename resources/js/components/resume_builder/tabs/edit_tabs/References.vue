<template>
  <v-app>
    <v-card class="card-ref pa-xl-10 pa-lg-5">
      <v-container class="mt-xl-5 mt-lg-10 mt-12">
        <v-row align="center">
          <v-col xl="3" lg="3" md="6" sm="6" cols="12">
            <v-select
              class="resume-builder__input civie-select"
              outlined
              placeholder="Select an option"
              :items="references"
              label="Referecent Type"
              color="#001CE2"
              v-model="referenceType"
            >
              <button class="dropdown-icon icon" slot="append" @click="toggleSelect">
                <svg-vue :icon="`dropdown-caret`"></svg-vue>
              </button>
            </v-select>
          </v-col>
          <v-col xl="3" lg="3" md="6" sm="6" cols="12">
            <v-text-field
              class="resume-builder__input civie-input"
              outlined
              color="#001CE2"
              :rules="rules"
              :class="{'resume-builder__input--disabled': disabledInput}"
              :disabled="disabledInput"
              label="Full Name"
              v-model="fullname"
            ></v-text-field>
          </v-col>
          <v-col xl="3" lg="3" md="6" sm="6" cols="12">
            <v-text-field
              class="resume-builder__input civie-input"
              outlined
              color="#001CE2"
              :rules="rules"
              :class="{'resume-builder__input--disabled': disabledInput}"
              :disabled="disabledInput"
              label="Title/Position"
              v-model="title"
            ></v-text-field>
          </v-col>

          <v-col xl="3" lg="3" md="6" sm="6" cols="12">
            <v-text-field
              class="resume-builder__input civie-input"
              outlined
              color="#001CE2"
              :rules="rules"
              :class="{'resume-builder__input--disabled': disabledInput}"
              :disabled="disabledInput"
              label="Phone"
              v-model="phone"
            ></v-text-field>
          </v-col>

          <v-col xl="3" lg="3" md="6" sm="6" cols="12">
            <v-text-field
              type="email"
              class="resume-builder__input civie-input"
              outlined
              color="#001CE2"
              :rules="rules"
              :class="{'resume-builder__input--disabled': disabledInput}"
              :disabled="disabledInput"
              label="Email"
            ></v-text-field>
          </v-col>
          <v-col xl="3" lg="3" md="6" sm="6" cols="12">
            <v-text-field
              class="resume-builder__input civie-input"
              outlined
              color="#001CE2"
              :rules="rules"
              :class="{'resume-builder__input--disabled': disabledInput}"
              :disabled="disabledInput"
              label="Company"
              v-model="company"
            ></v-text-field>
          </v-col>

          <v-col xl="3" lg="3" md="6" sm="6">
            <v-text-field
              class="resume-builder__input civie-input"
              outlined
              color="#001CE2"
              :rules="rules"
              :class="{'resume-builder__input--disabled': disabledInput}"
              :disabled="disabledInput"
              label="Address"
              v-model="address"
            ></v-text-field>
          </v-col>
          <v-col xl="3" lg="3" md="6" sm="6" cols="12">
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

          <v-col xl="3" lg="3" md="6" sm="6" cols="12">
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

          <v-col xl="3" lg="3" md="6" sm="6" cols="12">
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
          <v-col xl="8" lg="8" md="12" sm="12" cols="12">
            <v-btn class="resume-builder__btn civie-btn filled btn-add-new mt-n5">Add New</v-btn>
          </v-col>
        </v-row>
      </v-container>
    </v-card>
  </v-app>
</template>

<script>
import { moveTabsHelper } from "../../helpers/tab-animations";
export default {
  name: "References",
  data() {
    return {
      activeTab: "References",
      tabs: ["References", "Referee", "Testimonials"],
      references: ["Reference", "Reference2"],
      newTestimonial: {
        title: "",
        description: ""
      },
      editedTestimonial: {},
      optionTestimonialId: 0,
      errors: {
        new: {},
        edit: {}
      },
      rules: [value => !!value || "Please fill this field."],
      disabledInput: false,
      addNewTestimonial: false,
      referenceType: "",
      fullname: "",
      title: "",
      phone: "",
      email: "",
      company: "",
      address: "",
      url: "",
      importImage: "",
      description: ""
    };
  },
  computed: {
    reference() {
      return this.$store.state.user.reference;
    },
    referee() {
      return this.$store.state.user.referee;
    },
    testimonials() {
      return this.$store.state.user.testimonials;
    }
  },
  props: ["selectProps", "inputProps"],
  methods: {
    toggleSelect() {
      this.disabledSelect = !this.disabledSelect;
    },
    toggleInput() {
      this.disabledInput = !this.disabledInput;
    },
    setActiveTab(tab) {
      this.activeTab = tab;
    },
    changeTab(e) {
      this.errors = { new: {}, edit: {} };
      moveTabsHelper(e, "referencesLinksWrapper", this);
    },
    applyReferenceEdit(savingType) {
      this.errors = { new: {}, edit: {} };
      let formData = {};
      $.each(this.reference, field => {
        if (this.reference[field] !== null) {
          if (this.reference[field].length) {
            formData[field] = this.reference[field];
          }
        }
      });

      formData["id"] = this.reference.id;

      if (savingType === "manual") {
        formData = this.reference;
      }

      axios
        .put("/api/user/reference", formData)
        .then(response => {
          console.log(response.data);
          savingType === "manual"
            ? this.$store.dispatch("fullScreenNotification")
            : this.$store.dispatch("flyingNotification");
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
    applyRefereeEdit(savingType) {
      this.errors = {};

      let formData = {};
      $.each(this.referee, field => {
        if (this.referee[field] !== null) {
          if (this.referee[field].length) {
            formData[field] = this.referee[field];
          }
        }
      });

      formData["id"] = this.referee.id;

      if (savingType === "manual") {
        formData = this.referee;
      }

      axios
        .put("/api/user/referee", formData)
        .then(response => {
          savingType === "manual"
            ? this.$store.dispatch("fullScreenNotification")
            : this.$store.dispatch("flyingNotification");
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
    addTestimonial() {
      this.errors = { new: {}, edit: {} };
      this.newTestimonial.user_id = this.$store.state.user.id;
      axios
        .post("/api/user/testimonials", this.newTestimonial)
        .then(response => {
          this.testimonials.unshift(response.data.data);
          this.newTestimonial = { title: "", description: "" };
          this.addNewTestimonial = false;
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
    },
    closeOptionsBtn() {
      this.optionTestimonialId = 0;
    },
    editTestimonial(testimonial) {
      this.editedTestimonial = {
        id: testimonial.id,
        title: testimonial.title,
        description: testimonial.description
      };
      this.closeOptionsBtn();
    },
    applyEdit() {
      this.errors = { new: {}, edit: {} };
      axios
        .put("/api/user/testimonials", this.editedTestimonial)
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
    EditedSuccessfully(editedTestimonial) {
      this.clearEditedTestimonial();
      this.$store.dispatch("fullScreenNotification");
      // replace the edited skill with the new one:
      this.testimonials.forEach((testimonial, index) => {
        if (testimonial.id === editedTestimonial.id) {
          this.testimonials[index] = editedTestimonial;
        }
      });
    },
    clearEditedTestimonial() {
      this.editedTestimonial = {};
    },
    deleteTestimonial(testimonial) {
      if (!confirm("Do you want to delete this testimonial ?")) {
        return;
      }
      axios
        .delete("/api/user/testimonials/" + testimonial.id)
        .then(response => {
          this.$store.dispatch("flyingNotificationDelete");
          this.testimonials.forEach((myTestimonial, index) => {
            if (myTestimonial.id === response.data.data.id) {
              this.testimonials.splice(index, 1);
            }
          });

          this.closeOptionsBtn();
        })
        .catch(error => {
          console.log(error);
        });
    }
  },
};
</script>

<style scoped lang="scss">
@import "../../../../../sass/media-queries";
$mainBlue: #001ce2;
.card-ref {
  width: 1412px;
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
}

.references-wrap {
  width: 100%;

  @include lt-md {
    width: 100%;
  }
}
.section-body-wrapper {
  max-width: 1337px;
  width: 100%;

  @include lt-md {
    width: 100%;
  }

  .references {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    margin-top: 45px;

    @include lt-md {
      &.about-section {
        max-width: 600px;
        width: 100%;

        .about-addnew {
          width: 100%;

          .action-btns {
            justify-content: space-between;
          }
        }
      }

      max-width: 348px;
      margin: 30px auto 0px auto;
      justify-content: center;
    }

    .reference-input {
      margin-bottom: 60px;
      display: flex;
      flex-direction: column;

      @include lt-md {
        width: 100%;
        margin-bottom: 23px;
      }

      input,
      textarea {
        width: 585px;
        height: 68px;
        border: 1.5px solid #001ce2;
        border-radius: 10px;
        opacity: 1;
        padding: 5px 18px;
        &.grey-border {
          border: 1.5px solid #9f9e9e;
        }

        @include lt-md {
          width: 100%;
        }
      }

      textarea {
        height: 154.59px;
        padding-top: 12px;
      }
      input:focus,
      textarea:focus {
        outline: none;
      }

      label {
        text-align: left;
        font: 600 20px Noto Sans;
        letter-spacing: 0;
        opacity: 1;
        color: #001ce2;
        &.grey {
          color: #9f9e9e;
        }
      }
    }
  }

  .about-section {
    margin-top: 10px;
    max-width: 585px;

    .about-addnew {
      width: 100%;

      .about-input {
        width: 100%;
        textarea {
          width: 100%;
        }
      }
    }

    .about-input {
      display: flex;
      flex-direction: column;
      width: fit-content;

      @include lt-md {
        width: 100%;
        margin-bottom: 23px;
      }

      textarea {
        width: 815px;
        height: 274px;
        border: 1.5px solid #9f9e9e;
        border-radius: 10px;
        opacity: 1;
        padding-left: 18px;
        padding-top: 18px;

        @include lt-md {
          width: 100%;
        }
      }

      textarea:focus {
        outline: none;
      }

      label {
        margin-bottom: 17px;
        .label-text {
          text-align: left;
          font: 600 20px Noto Sans;
          letter-spacing: 0;
          opacity: 1;
          font-size: 20px;
          color: #9f9e9e;
        }

        .note-text {
          font: 500 13px Noto Sans;
          color: #1f5de4;
          opacity: 0.7;
        }
      }
    }

    .action-btns {
      justify-content: space-between;

      .add-new-work {
        margin: 0;
      }
    }
  }

  .action-btns {
    margin-top: 45px;
    display: flex;

    @include lt-md {
      justify-content: center;
    }
    @include lt-sm {
      flex-direction: column;
    }

    .add-work {
      margin-right: 29px;

      @include lt-sm {
        margin-bottom: 10px;
      }

      a {
        display: flex;
        justify-content: center;
        align-items: center;

        width: 247px;
        height: 62px;
        background: #001ce2 0% 0% no-repeat padding-box;
        border-radius: 8px;
        opacity: 1;

        font: 600 19px/26px Noto Sans;
        letter-spacing: 0;
        color: #ffffff;

        img {
          width: 27px;
          height: 27px;
          margin-right: 10px;

          @include lt-sm {
            max-width: 20px;
            max-height: 20px;
          }
        }

        @include lt-sm {
          width: 100%;
          height: 45px;
          font-size: 8px;
          font-weight: 500;
        }
      }
    }

    .add-new-work {
      margin-right: 29px;

      @include lt-md {
        margin: 0;
      }

      a {
        display: flex;
        justify-content: center;
        align-items: center;

        width: 226px;
        height: 62px;
        border: 2px solid #001ce2;
        border-radius: 8px;
        opacity: 1;

        font: 600 19px/26px Noto Sans;
        letter-spacing: 0;
        color: #001ce2;

        img {
          width: 27px;
          height: 27px;
          margin-right: 10px;
        }

        @include lt-sm {
          width: 100%;
          height: 45px;
          font-size: 8px;
          font-weight: 500;
        }
      }
    }
    .auto-import-btn {
      a {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 226px;
        height: 62px;

        border: 1.5px solid #001ce2;
        border-radius: 8px;
        opacity: 1;

        font: 600 19px Noto Sans;
        letter-spacing: 0;
        color: #001ce2;

        img {
          width: 27px;
          height: 27px;
          margin-right: 14px;
        }
      }
    }

    .auto-import-btn.short {
      margin-right: 38px;

      a {
        width: 144px;
      }
    }
  }
}

.work-ex-list {
  margin-top: 64px;

  .work-ex-item {
    position: relative;
    display: flex;
    justify-content: flex-start;
    max-width: 757px;
    width: 100%;
    margin-bottom: 30px;

    .item-grid {
      width: 100%;
      display: grid;
      grid-template-columns: 38px 1fr;
      grid-gap: 18px;

      @include lt-sm {
        grid-gap: 6px;
      }
    }

    .work-icon {
      width: 100%;
      margin-top: 10px;

      img {
        width: 100%;
        height: auto;
      }

      @include lt-md {
        img {
          width: 34px;
        }
      }

      @include lt-sm {
        grid-gap: 12px;

        img {
          width: 28px;
        }
      }
    }

    .work-ex-info {
      .work-ex-title {
        font: 700 30px/41px Noto Sans;
        letter-spacing: 0;
        color: #3c3748;
        margin-bottom: 12px;
        opacity: 1;

        @include lt-md {
          font-size: 24px;
        }

        @include lt-md {
          font-size: 16px;
        }
      }
      .work-ex-sub-title {
        font: 700 19px Noto Sans;
        letter-spacing: 0;
        color: #3c3748;
        opacity: 1;
        margin-bottom: 16px;

        @include lt-md {
          font-size: 18px;
        }

        @include lt-md {
          font-size: 14px;
        }
      }
      .work-ex-detials {
        font: 500 16px Noto Sans;
        letter-spacing: 0;
        color: #555060;
        opacity: 1;

        @include lt-md {
          font-size: 12px;
        }

        @include lt-md {
          font-size: 11px;
        }
      }
    }

    .optionsBtns {
      width: 100%;
      background: #f9f9f9;
      box-shadow: 0 9px 12px rgba(0, 0, 0, 0.03);
      justify-content: space-between;
      padding: 12px 37px;
      border-radius: 2px;
      margin: 1rem auto 0;

      @include lt-md {
        display: flex !important;
      }

      @include lt-sm {
        max-width: 250px;
      }

      a {
        height: 24px;
        display: block;

        @include lt-sm {
          height: 16px;
        }

        .icon {
          height: 100%;
          color: $mainBlue;
          fill: $mainBlue;

          path {
            fill: $mainBlue;
          }
        }
      }
    }

    .options {
      position: absolute;
      right: 14px;
      top: 14px;

      .options-btn {
        a {
          width: 130px;
          height: 44px;

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
        width: 130px;
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
      }
    }
  }
}

.error {
  color: red;
  padding-top: 5px;
  padding-left: 3px;
}
</style>
