<template>
  <v-app>
    <v-container style="width:100%;" fluid>
      <v-row align="center">
        <!-- sidemenu -->
        <v-col xl="3">
          <v-card class="pa-5 card-sidebar" flat tile>
            <v-tabs vertical background-color="indigo" dark>
              <v-tab>Option</v-tab>
              <v-tab>Another Selection</v-tab>
              <v-tab>Items</v-tab>
              <v-tab>Another Screen</v-tab>
            </v-tabs>
          </v-card>
        </v-col>
        <!-- side menu -->
        <v-col xl="9">2</v-col>
      </v-row>
    </v-container>
  </v-app>
</template>

<script>
export default {
  name: "ViewCV",
  data() {
    return {
      availableThemes: [],
      showProfessionOptions: false,
      showSpecialityOptions: false,
      selectedProfession: 0,
      selectedSpeciality: 0,
      previewThemeID: null,
      professionOptions: [
        {
          name: "Select a profession"
        },
        {
          name: "Fullstack Developer"
        },
        {
          name: "Frontend Developer"
        },
        {
          name: "Database Specialist"
        },
        {
          name: "Big Data"
        },
        {
          name: "UX/UI Designer"
        },
        {
          name: "Graphic Designer"
        }
      ],
      specialityOptions: [
        {
          name: "Select a speciality"
        },
        {
          name: "Fullstack Developer"
        },
        {
          name: "Frontend Developer"
        },
        {
          name: "Database Specialist"
        },
        {
          name: "Big Data"
        },
        {
          name: "UX/UI Designer"
        },
        {
          name: "Graphic Designer"
        }
      ]
    };
  },
  computed: {
    user() {
      return this.$store.state.user;
    }
  },
  methods: {
    showPreviewModal(theme_id) {
      this.previewThemeID = theme_id;
      this.$refs.previewModal.show();
    },
    openTheme(theme) {
      let url = "/preview/theme" + theme.code;
      window.open(url, "_blank") || window.location.replace(url);
    },
    activateTheme(theme_id) {
      if (this.user.theme_id === theme_id) {
        return;
      }
      axios
        .put("/api/user/update-theme", { theme_id: theme_id })
        .then(response => {
          this.user.theme_id = theme_id;
          this.setActiveTheme(theme_id);
          this.$store.dispatch("flyingNotification");
        })
        .catch(error => {
          if (typeof error.response.data === "object") {
            console.log(error.response.data.errors);
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
    selectProfession(index) {
      // Search profession on db using index
      // axios request
      this.selectedProfession = index;
      this.showProfessionOptions = false;
    },
    selectSpeciality(index) {
      // Search speciality on db using index
      // axios request
      this.selectedSpeciality = index;
      this.showSpecialityOptions = false;
    },
    getThemesList() {
      axios
        .get("/api/user/themes-list")
        .then(response => {
          this.availableThemes = response.data.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    setActiveTheme(theme_id) {
      this.availableThemes.forEach(theme => {
        if (theme.id === theme_id) {
          this.user.theme = theme;
        }
      });
    }
  },
  mounted() {
    this.getThemesList();
  }
};
</script>

<style scoped lang="scss">
@import "../../../../sass/media-queries";
$mainBlue: #001ce2;
.card-sidebar {
  border-right: 1px solid rgba(0, 28, 226, 0.1) !important;
}
#previewModalContainer {
  width: 80%;

  iframe {
    width: 100%;
    height: 80vh;
  }
}
</style>
