<template>
  <v-app>
    <v-container>
      <v-card class="card-ref pa-xl-10 pa-lg-5 pa-5 resume-builder__scroll reference-content" flat>
        <v-container class>
          <v-form v-if="reference">
            <v-row align="center">
              <v-col xl="3" :lg="windowWidth<1300?'6':'3'" md="6" sm="6" cols="12">
                <v-select
                  class="resume-builder__input civie-select"
                  outlined
                  placeholder="Select an option"
                  :items="references"
                  label="Referecent Type"
                  color="#001CE2"
                  v-model="reference.type"
                >
                  <button class="dropdown-icon icon" slot="append" @click="toggleSelect">
                    <svg-vue :icon="`dropdown-caret`"></svg-vue>
                  </button>
                </v-select>
              </v-col>
              <v-col
                xl="3"
                :lg="windowWidth<1300?'6':'3'"
                md="6"
                sm="6"
                cols="12"
                class="mt-xl-0 mt-lg-0 mt-md-n10 mt-sm-0 mt-n6"
              >
                <v-text-field
                  class="resume-builder__input civie-input"
                  outlined
                  color="#001CE2"
                  :class="{'resume-builder__input--disabled': disabledInput}"
                  :disabled="disabledInput"
                  label="Full Name"
                  v-model="reference.name"
                ></v-text-field>
              </v-col>
              <v-col
                xl="3"
                :lg="windowWidth<1300?'6':'3'"
                md="6"
                sm="6"
                cols="12"
                class="mt-xl-0 mt-md-n10 mt-sm-n6 mt-n6"
                :class="windowWidth<1300?'mt-lg-n6':'mt-lg-0'"
              >
                <v-text-field
                  class="resume-builder__input civie-input"
                  outlined
                  color="#001CE2"
                  :class="{'resume-builder__input--disabled': disabledInput}"
                  :disabled="disabledInput"
                  label="Title/Position"
                  v-model="reference.title"
                ></v-text-field>
              </v-col>

              <v-col
                xl="3"
                :lg="windowWidth<1300?'6':'3'"
                md="6"
                sm="6"
                cols="12"
                class="mt-xl-0 mt-md-n10 mt-sm-n6 mt-n6"
                :class="windowWidth<1300?'mt-lg-n6':'mt-lg-0'"
              >
                <v-text-field
                  class="resume-builder__input civie-input"
                  outlined
                  color="#001CE2"
                  :class="{'resume-builder__input--disabled': disabledInput}"
                  :disabled="disabledInput"
                  label="Phone"
                  v-model="reference.phone"
                ></v-text-field>
              </v-col>

              <v-col
                xl="3"
                :lg="windowWidth<1300?'6':'3'"
                md="6"
                sm="6"
                cols="12"
                class="mt-xl-n6 mt-lg-n6 mt-md-n10 mt-sm-n6 mt-n6"
              >
                <v-text-field
                  type="email"
                  class="resume-builder__input civie-input"
                  outlined
                  color="#001CE2"
                  v-model="reference.email"
                  :class="{'resume-builder__input--disabled': disabledInput}"
                  :disabled="disabledInput"
                  label="Email"
                ></v-text-field>
              </v-col>
              <v-col
                xl="3"
                :lg="windowWidth<1300?'6':'3'"
                md="6"
                sm="6"
                cols="12"
                class="mt-xl-n6 mt-lg-n6 mt-md-n10 mt-sm-n6 mt-n6"
              >
                <v-text-field
                  class="resume-builder__input civie-input"
                  outlined
                  color="#001CE2"
                  :class="{'resume-builder__input--disabled': disabledInput}"
                  :disabled="disabledInput"
                  label="Company"
                  v-model="reference.company"
                ></v-text-field>
              </v-col>

              <v-col
                xl="3"
                :lg="windowWidth<1300?'6':'3'"
                md="6"
                sm="6"
                class="mt-xl-n6 mt-lg-n6 mt-md-n10 mt-sm-n6 mt-n6"
              >
                <v-text-field
                  class="resume-builder__input civie-input"
                  outlined
                  color="#001CE2"
                  :class="{'resume-builder__input--disabled': disabledInput}"
                  :disabled="disabledInput"
                  label="Address"
                  v-model="reference.address"
                ></v-text-field>
              </v-col>
              <v-col
                xl="3"
                :lg="windowWidth<1300?'6':'3'"
                md="6"
                sm="6"
                cols="12"
                class="mt-xl-n6 mt-lg-n6 mt-md-n10 mt-sm-n6 mt-n6"
              >
                <v-text-field
                  class="resume-builder__input civie-input"
                  outlined
                  color="#001CE2"
                  :class="{'resume-builder__input--disabled': disabledInput}"
                  :disabled="disabledInput"
                  label="URL"
                  v-model="reference.url"
                ></v-text-field>
              </v-col>

              <v-col
                xl="3"
                :lg="windowWidth<1300?'6':'3'"
                md="6"
                sm="6"
                cols="12"
                class="mt-xl-n6 mt-lg-n6 mt-md-n10 mt-sm-n6 mt-n8"
              >
                <v-textarea
                  class="resume-builder__input civie-textarea"
                  outlined
                  color="#001CE2"
                  :class="{'resume-builder__input--disabled': disabledTextarea}"
                  :disabled="disabledTextarea"
                  label="Description"
                  v-model="reference.reference_text"
                ></v-textarea>
              </v-col>
              <v-col xl="12" lg="12" md="12" sm="12" cols="12">
                <v-btn
                  class="resume-builder__btn civie-btn filled btn-add-new mt-n5"
                  @click="applyReferenceEdit"
                >Save</v-btn>
              </v-col>
            </v-row>
          </v-form>
        </v-container>
      </v-card>
    </v-container>
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
      windowWidth: window.innerWidth,
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
      importImage: ""
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
  mounted() {
    window.onresize = () => {
      this.windowWidth = window.innerWidth;
    };
  },
  methods: {
    toggleSelect() {
      this.disabledSelect = !this.disabledSelect;
    },

    applyReferenceEdit(savingType = "") {
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
      formData["user_id"] = this.reference.user_id;

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
