<template>
  <v-app>
    <div class="data-container">
      <div class="view-container resume-builder__scroll">
        <v-card class flat>
          <SchoolView :activeTab="activeTab"></SchoolView>
        </v-card>
      </div>
    </div>
  </v-app>
</template>

<script>
import SchoolView from "./education_tabs/school";

export default {
  name: "Education",
  components: {
    SchoolView,
  },
  data: (vm) => {
    return {
      optionEducationId: 0,
      editedEducation: {},
      newEducation: {
        institution_type: "",
        university_name: "",
        degree_title: "",
        date_from: "",
        date_to: "",
        present: false,
        is_public: true,
      },
      errors: {
        new: {},
        edit: {},
      },
      addNewEducation: false,
      tabs: ["Education"],
      tabViews: [],
      activeTab: "School",
    };
  },
  computed: {
    educations() {
      return this.$store.state.user.education;
    },
  },
  methods: {
    editEducation(education) {
      this.editedEducation = {
        id: education.id,
        institution_type: education.institution_type,
        university_name: education.university_name,
        degree_title: education.degree_title,
        date_from: education.date_from,
        date_to: education.date_to,
        present: education.present,
        is_public: education.is_public,
      };

    },
    applyEdit() {
      this.editedEducation.user_id = this.educations[0].user_id;
      axios
        .put("/api/user/education", this.editedEducation)
        .then((response) => {
          this.EditedSuccessfully(response.data.data);
        })
        .catch((error) => {
          if (typeof error.response.data === "object") {
            this.errors.edit = error.response.data.errors;
          } else {
            this.errors.edit = "Something went wrong. Please try again.";
          }
          this.$store.dispatch("flyingNotification", {
            message: "Error",
            iconSrc: "/images/resume_builder/error.png",
          });
        });
    },
    EditedSuccessfully(editedEducation) {
      this.clearEditedEducation();
      this.$store.dispatch("flyingNotification");
      // replace the edited skill with the new one:
      this.educations.forEach((education, index) => {
        if (education.id === editedEducation.id) {
          this.educations[index] = editedEducation;
        }
      });
    },
    clearEditedEducation() {
      this.editedEducation = {};
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
      this.errors = { new: {}, edit: {} };
      this.newEducation.user_id = this.$store.state.user.id;
      axios
        .post("/api/user/education", this.newEducation)
        .then((response) => {
          this.educations.unshift(response.data.data);
          this.clearEducation();
          this.$store.dispatch("flyingNotification");
        })
        .catch((error) => {
          if (typeof error.response.data === "object") {
            this.errors.new = error.response.data.errors;
          } else {
            this.errors.new = "Something went wrong. Please try again.";
          }
          this.$store.dispatch("flyingNotification", {
            message: "Error",
            iconSrc: "/images/resume_builder/error.png",
          });
        });
    },
    clearEducation() {
      this.addNewEducation = false;
      this.newEducation = {
        institution_type: "",
        university_name: "",
        degree_title: "",
        date_from: "",
        date_to: "",
        present: false,
      };
    },
    closeOptionsBtn() {
      this.optionEducationId = 0;
    },
  },
  mounted() {},
};
</script>

<style scoped lang="scss">
@import "../../../../../sass/media-queries";
$mainBlue: #001ce2;
.data-container {
  @include lt-sm {
    margin: 3%;
  }

  padding: 0;
  margin-bottom: 30px;

  .view-container {
    max-height: 450px;
    box-shadow: 0 5px 20px rgba($color: #001083, $alpha: 0.1);
    padding-right: 20px;
    background-color: rgba(247, 247, 253, 1) !important;
  }
}
</style>
