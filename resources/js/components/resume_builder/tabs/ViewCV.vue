<template>
  <v-app>
    <v-container style="width:100%;" fluid>
      <v-row>
        <!-- side menu -->
        <v-col xl="3" lg="3" md="3" sm="3" cols="3">
          <v-navigation-drawer permanent width="400">
            <v-card flat color="transparent" class="pa-5 mt-n12">
              <v-text-field
                class="resume-builder__input civie-input"
                outlined
                color="#001CE2"
                :rules="rules"
                :class="{'resume-builder__input--disabled': disabledInput}"
                :disabled="disabledInput"
                label
                height="55"
                style="border-radius:5px !important;"
              >
                <template slot="append">
                  <v-btn class="eye-btn mt-n1" depressed>
                    <img width="35.59" height="35" src="/icons/count-icon.svg" alt="icon" />
                  </v-btn>
                </template>
              </v-text-field>
            </v-card>
            <v-card color="transparent" flat tile class="ml-2">
              <v-tabs vertical fixed-tabs active-class="custom-active-tab" slider-size="5">
                <v-tab
                  v-for="category in themeCategories"
                  :key="category.id"
                  class="custom-tab"
                  :ripple="false"
                >
                  <v-row>
                    <v-col
                      cols="8"
                      align="left"
                      :class="category.id!=1?'':'ml-xl-n8'"
                    >{{category.title}}</v-col>
                    <v-col cols="4" align="right">
                      <v-card
                        class="card-counter"
                        flat
                        height="35"
                        width="35.9"
                        color="#E6E8FC"
                        align="center"
                      >
                        <span class="counter">{{category.count}}</span>
                      </v-card>
                    </v-col>
                  </v-row>
                </v-tab>
              </v-tabs>
            </v-card>
          </v-navigation-drawer>
        </v-col>
        <v-col xl="9" lg="9" md="9" sm="9" cols="9">
          <v-card class="card-themes-wrapper main-content resume-builder__scroll pa-10">
            <v-card-subtitle class="themes-wrapper-title">Choose the CV template you love</v-card-subtitle>
            <v-row align="center">
              <v-col md="4" sm="6" cols="12" v-for="i in 12" :key="i">
                <v-card
                  flat
                  color="transparent"
                  tile
                  class="card-theme-wrapper mb-xl-0 mb-lg-n12 mb-md-n12"
                >
                  <img src="/images/new_resume_builder/themes-wrapper.svg" alt="themes" />
                </v-card>
              </v-col>
            </v-row>
          </v-card>
          <v-card flat tile color="transparent"></v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-app>
</template>

<script>
export default {
  name: "ViewCV",
  data() {
    return {
      windowWidth: window.innerWidth,
      disabledInput: false,
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
      ],
      themeCategories: [
        { id: 1, title: "UI/UX Designer", count: 46 },
        { id: 2, title: "Graphic Designer", count: 35 },
        { id: 3, title: "Mobile App Designer", count: 22 },
        { id: 4, title: "Front-end Developer", count: 88 },
        { id: 5, title: "Full Stack Developer", count: 115 },
        { id: 6, title: "Graphic Designer", count: 46 },
        { id: 7, title: "Motion Designer", count: 19 },
        { id: 8, title: "Database Specialist", count: 16 },
        { id: 9, title: "Big Data", count: 75 }
      ]
    };
  },
  computed: {
    user() {
      return this.$store.state.user;
    }
  },
  props: ["inputProps"],
  methods: {
    methods: {
      toggleInput() {
        this.disabledInput = !this.disabledInput;
      }
    },
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
    window.onresize = () => {
      this.windowWidth = window.innerWidth;
    };
  }
};
</script>

<style scoped lang="scss">
@import "../../../../sass/media-queries";
$mainBlue: #001ce2;
.eye-btn {
  min-width: 35.59px !important;
  width: 35.59px !important;
  min-height: 35px !important;
  height: 35px !important;
  max-height: 35px !important;
}
.main-content {
  height: 525px;
  background: #fff;
  box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1);
  padding: 50px;
  margin-bottom: 70px;
  scroll-behavior: smooth;
}
.custom-ripple-class {
  background: transparent;
}
.custom-tab {
  font-family: "Noto Sans" !important;
  font-style: normal;
  font-weight: 500;
  font-size: 18px !important;
  line-height: 26px;
  color: #888db1 !important;
  text-transform: capitalize !important;
}
.custom-active-tab {
  font-family: "Noto Sans" !important;
  font-style: normal;
  font-weight: 500;
  font-size: 18px !important;
  line-height: 26px;
  color: #001ce2 !important;
}
.custom-active-tab::before {
  opacity: 0 !important;
}
.v-tab {
  justify-content: left !important;
}
.card-counter {
  border-radius: 5px;
  padding-top: 2px;
  .counter {
    font-family: "Noto Sans" !important;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 14px;
    text-align: center;
    color: #888db1 !important;
    justify-content: center;
    justify-items: center;
  }
}
.card-themes-wrapper {
  .themes-wrapper-title {
    font-family: "Noto Sans" !important;
    font-style: normal;
    font-weight: 600;
    font-size: 40px;
    line-height: 54px;
    color: #001ce2 !important;
  }
  .card-theme-wrapper {
    width: 417px;
    height: 302.56px;
  }
}

#previewModalContainer {
  width: 80%;

  iframe {
    width: 100%;
    height: 80vh;
  }
}
</style>
<style>
#resumeBuilder .v-tabs-slider-wrapper {
  left: auto !important;
  right: 0 !important;
  width: 5px !important;
}
#resumeBuilder .v-tabs-slider {
  background: #001ce2 !important;
  border-radius: 10px 0px 0px 10px !important;
}
</style>