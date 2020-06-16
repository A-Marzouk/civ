<template>
  <v-app>
    <v-card class="card-ref pa-xl-10 pa-lg-5 pa-5 resume-builder__scroll reference-content" flat>
      <v-container class>
        <v-form>
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
            <v-col
              xl="3"
              lg="3"
              md="6"
              sm="6"
              cols="12"
              class="mt-xl-0 mt-lg-0 mt-md-n10 mt-sm-0 mt-n6"
            >
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
            <v-col
              xl="3"
              lg="3"
              md="6"
              sm="6"
              cols="12"
              class="mt-xl-0 mt-lg-0 mt-md-n10 mt-sm-n6 mt-n6"
            >
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

            <v-col
              xl="3"
              lg="3"
              md="6"
              sm="6"
              cols="12"
              class="mt-xl-0 mt-lg-0 mt-md-n10 mt-sm-n6 mt-n6"
            >
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

            <v-col
              xl="3"
              lg="3"
              md="6"
              sm="6"
              cols="12"
              class="mt-xl-n10 mt-lg-n10 mt-md-n10 mt-sm-n6 mt-n6"
            >
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
            <v-col
              xl="3"
              lg="3"
              md="6"
              sm="6"
              cols="12"
              class="mt-xl-n10 mt-lg-n10 mt-md-n10 mt-sm-n6 mt-n6"
            >
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

            <v-col
              xl="3"
              lg="3"
              md="6"
              sm="6"
              class="mt-xl-n10 mt-lg-n10 mt-md-n10 mt-sm-n6 mt-n6"
            >
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
            <v-col
              xl="3"
              lg="3"
              md="6"
              sm="6"
              cols="12"
              class="mt-xl-n10 mt-lg-n10 mt-md-n10 mt-sm-n6 mt-n6"
            >
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

            <v-col
              xl="3"
              lg="3"
              md="6"
              sm="6"
              cols="12"
              class="mt-xl-n5 mt-lg-n5 mt-md-n5 mt-sm-0 mt-n6"
            >
              <div class="input-group files">
                <!-- Using v-input classes -->
                <div
                  class="v-input v-text-field--outlined resume-builder__input theme--light v-text-field v-text-field--is-booted v-text-field--enclosed civie-dropzone"
                >
                  <div class="v-input__control">
                    <div class="v-input__slot">
                      <fieldset aria-hidden="true"></fieldset>
                      <div class="v-text-field__slot">
                        <label class="v-label" for>Upload Images</label>
                        <vue-dropzone
                          class="civie-dropzone-input"
                          ref="myVueDropzone"
                          id="dropzone"
                          :options="dropzoneOptions"
                          :useCustomSlot="true"
                        >
                          <div class="dropzone-custom-content">
                            <svg-vue class="icon" :icon="'upload-input-icon'"></svg-vue>
                          </div>
                        </vue-dropzone>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </v-col>

            <v-col
              xl="3"
              lg="3"
              md="6"
              sm="6"
              cols="12"
              class="mt-xl-n10 mt-lg-n10 mt-md-n10 mt-sm-n6 mt-n8"
            >
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
        </v-form>
      </v-container>
    </v-card>
  </v-app>
</template>

<script>
import { moveTabsHelper } from "../../helpers/tab-animations";
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";

export default {
  name: "References",
  components: {
    vueDropzone: vue2Dropzone
  },
  data() {
    return {
      activeTab: "References",
      tabs: ["References", "Referee", "Testimonials"],
      references: ["Reference", "Reference2"],
      dropzoneOptions: {
        url: "https://httpbin.org/post",
        thumbnailWidth: 150,
        maxFilesize: 0.5
      },
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
      disabledTextarea: false,
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
  props: ["selectProps", "inputProps", "textareaProps"],
  methods: {
    toggleSelect() {
      this.disabledSelect = !this.disabledSelect;
    },
    toggleInput() {
      this.disabledInput = !this.disabledInput;
    },
    toggleTextarea() {
      this.disabledTextarea = !this.disabledTextarea;
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
  }
};
</script>

<style scoped lang="scss">
@import "../../../../../sass/media-queries";
$mainBlue: #001ce2;
.reference-content {
  background: #fff;
  box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1);
  height: 573px;
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
}
.input-group {
  margin-right: 15px;

  &:nth-child(4),
  &:last-child {
    margin-right: none;
  }

  .civie-textarea,
  .civie-dropzone {
    margin-bottom: 35.5px;
    height: auto;

    .v-input__control,
    .v-input__slot {
      height: 100%;
    }
  }

  &.files {
    .v-label {
      position: absolute;
    }
    .civie-dropzone {
      width: 100%;
    }
  }
}

.error {
  color: red;
  padding-top: 5px;
  padding-left: 3px;
}
</style>
