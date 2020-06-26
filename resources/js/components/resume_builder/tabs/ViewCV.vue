<template>
  <v-app>
    <v-container style="width:100%;" fluid class="pa-md-0 pa-sm-5">
      <v-row>
        <!-- side menu -->
        <v-col xl="3" lg="3" md="5" sm="5" cols="12">
          <v-select
            class="resume-builder__input civie-select hidden-lg-and-up"
            outlined
            placeholder="Select an option"
            :items="themeCategories"
            item-text="title"
            item-value="id"
            color="#001CE2"
          >
            <template slot="append">
              <v-btn class="eye-btn ml-n7 mr-2" depressed>
                <img width="35.59" height="35" src="/icons/count-icon.svg" alt="icon" />
              </v-btn>
            </template>
            <button class="dropdown-icon icon" slot="append">
              <svg-vue :icon="`dropdown-caret`"></svg-vue>
            </button>
          </v-select>
          <v-navigation-drawer permanent width="330" class="hidden-md-and-down">
            <v-card flat color="transparent" class="pa-5 mt-n12">
              <v-text-field
                class="resume-builder__input civie-input"
                outlined
                color="#001CE2"
                :class="{'resume-builder__input--disabled': disabledInput}"
                :disabled="disabledInput"
                label
                height="55"
                style="border-radius:5px !important;"
                placeholder="Current Theme"
              >
                <template slot="append">
                  <v-btn class="eye-btn mt-n1 ml-n2" depressed>
                    <img width="35.59" height="35" src="/icons/count-icon.svg" alt="icon" />
                  </v-btn>
                </template>
              </v-text-field>
            </v-card>
            <v-card color="transparent" flat tile class="ml-2 mt-n6">
              <v-tabs
                vertical
                fixed-tabs
                active-class="custom-active-tab"
                slider-size="5"
                v-model="themeTab"
              >
                <v-tab
                  v-for="category in themeCategories"
                  :key="category.id"
                  class="custom-tab mb-3"
                  :ripple="false"
                >
                  <v-row>
                    <v-col cols="6" align="left">{{category.title}}</v-col>
                    <v-col cols="5" align="right">
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
        <v-col xl="9" lg="9" md="12" sm="12" cols="12" align="left">
          <v-card class="card-themes-wrapper main-content resume-builder__scroll pa-10">
            <div class="themes-wrapper-title">Choose the CV template you love</div>
            <v-row align="center">
              <v-col md="4" sm="4" cols="6" v-for="i in 12" :key="i">
                <img
                  src="/images/new_resume_builder/themes-wrapper.svg"
                  alt="themes"
                  class="theme-img"
                  :class="selectedTheme == i ? 'selected-theme':''"
                  @click="selectTheme(i)"
                />
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
      themeTab: 0,
      selectedTheme: 1,
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
  props: ["inputProps", "selectProps"],
  methods: {
    toggleInput() {
      this.disabledInput = !this.disabledInput;
    },
    toggleSelect() {
      this.disabledSelect = !this.disabledSelect;
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
    selectTheme(index) {
      this.selectedTheme = index;
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
  @media screen and (min-width: 1264px) and (max-width: 1366px) {
    font-size: 16px !important;
  }
}
.custom-active-tab {
  font-family: "Noto Sans" !important;
  font-style: normal;
  font-weight: 500;
  font-size: 18px !important;
  line-height: 26px;
  color: #001ce2 !important;
  @media screen and (min-width: 1264px) and (max-width: 1366px) {
    font-size: 16px !important;
  }
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
    @media screen and (max-width: 960px) {
      font-size: 22px;
      line-height: 28px;
    }
  }
  .theme-img {
    img {
      width: 417px !important;
      height: 302.56px !important;
      @media screen and (max-width: 960px) {
        width: 200px;
        height: 145.11px;
      }
    }
    border-radius: 0px !important;
  }
  .selected-theme {
    border: 3px solid #001ce2;
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