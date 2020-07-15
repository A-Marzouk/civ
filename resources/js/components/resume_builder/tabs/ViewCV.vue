<template>
  <v-app>
    <v-container fluid class="pa-xl-0 pa-lg-0 pa-md-8 pa-sm-5 pa-6">
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
            height="60"
          >
            <template slot="append">
              <v-btn class="eye-btn ml-n12 mr-4 mt-n2" depressed>
                <img width="35.59" height="35" src="/icons/count-icon.svg" alt="icon" />
              </v-btn>
            </template>
            <button class="dropdown-icon icon" slot="append" style="margin-top:2px;">
              <svg-vue :icon="`dropdown-caret`"></svg-vue>
            </button>
          </v-select>
          <v-navigation-drawer permanent width="330" class="hidden-md-and-down ml-xl-12">
            <v-card flat color="transparent" class="pa-5 mt-n12">
              <v-text-field
                class="resume-builder__input civie-input custom-border-radius"
                outlined
                color="#001CE2"
                :class="{'resume-builder__input--disabled': disabledInput}"
                :disabled="disabledInput"
                label
                height="55"
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
        <v-col xl="9" lg="9" md="12" sm="12" cols="12" align="left" class>
          <!-- tab bar -->
          <v-card class="card-themes-wrapper main-content resume-builder__scroll pa-10">
            <div class="themes-wrapper-title mb-4">Choose the CV template you love</div>
            <v-row align="center" v-if="user.theme">
              <v-col
                md="4"
                :sm="windowWidth<=767?'6':'4'"
                cols="12"
                v-for="theme in availableThemes"
                :key="theme.id"
              >
                <v-hover>
                  <template v-slot:default="{ hover }">
                    <v-card class="card-theme-holder pa-0 ma-0" flat color="transparent">
                      <v-row justify="center">
                        <img
                          :src="theme.image"
                          alt="themes"
                          class="theme-image"
                          :class="theme.id == user.theme.id? 'active': 'inactive'"
                        />
                        <v-fade-transition>
                          <v-overlay
                            v-if="hover"
                            absolute
                            color="#ffffff"
                            opacity="0.5"
                            class="custom-overlay"
                          >
                            <v-btn
                              color="#001CE2"
                              absolute
                              class="btn-activate"
                              :class="{active : theme.id === user.theme.id}"
                              depressed
                              @click="activateTheme(theme.id)"
                            >
                              {{theme.id === user.theme.id ? 'Active' : 'Activate'}}
                              <img
                                src="/icons/check.svg"
                              />
                            </v-btn>
                            <v-row>
                              <v-col cols="12" align="center">
                                <v-btn
                                  color="#001CE2"
                                  class="btn-my-data mb-xl-n4 mb-lg-n6 mb-md-n6 mb-sm-n12 mb-n5"
                                  outlined
                                  depressed
                                >
                                  Play Video
                                  <img src="/icons/youtube.svg" />
                                </v-btn>
                              </v-col>
                              <v-col cols="12" align="center">
                                <v-btn
                                  color="#001CE2"
                                  class="btn-my-data mb-xl-n4 mb-lg-n5 mb-md-n5 mb-sm-n6 mb-n5"
                                  outlined
                                  depressed
                                  @click="openTheme(theme.id, 'true')"
                                >
                                  My Data
                                  <img src="/icons/eye-icon-blue.svg" />
                                </v-btn>
                              </v-col>
                              <v-col cols="12" align="center">
                                <v-btn
                                  color="#001CE2"
                                  class="btn-preview-data"
                                  depressed
                                  @click="openTheme(theme.id, 'false')"
                                >
                                  Preview Data
                                  <img src="/icons/eye-icon-white.svg" />
                                </v-btn>
                              </v-col>
                            </v-row>
                          </v-overlay>
                        </v-fade-transition>
                      </v-row>
                    </v-card>
                  </template>
                </v-hover>
              </v-col>
            </v-row>
          </v-card>
          <v-card flat tile color="transparent"></v-card>

          <div class="cv-content-preview-wrapper">
            <div class="cv-content-preview">
              <div class="cv-preview-link">
                <a
                  v-if="user.username"
                  :href="`https://civ.ie/${user.username}`"
                  target="_blank"
                  v-text="`https://civ.ie/${user.username}`"
                ></a>
              </div>
              <div class="cv-preview-theme-wrapper">
                <div class="cv-preview-theme">
                  <vue-friendly-iframe :src="themeUrl" @load="onLoad"></vue-friendly-iframe>
                </div>
              </div>
            </div>
          </div>
        </v-col>
      </v-row>
      <v-dialog
        v-model="viewThemeModal"
        class="view-theme-modal"
        max-width="964"
        max-height="678"
        style="border-radius:10px;"
      >
        <v-card class="view-theme-modal-card">
          <img
            src="/images/new_resume_builder/themes-wrapper.svg"
            alt="themes"
            class="theme-img-modal"
          />
        </v-card>
      </v-dialog>
    </v-container>
  </v-app>
</template>

<script>
export default {
  name: "ViewCV",
  data() {
    return {
      overlay: false,
      viewThemeModal: false,
      themeTab: 0,
      selectedTheme: 1,
      currentThemeComponent: "resumeTheme201",
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
      ],
      baseUrl:'',
      cvAutoUpdate: true
    };
  },
  computed: {
    user() {
      return this.$store.state.user;
    },
    userTheme: function() {
      let code = this.$store.state.user.theme.code;
      if (code) {
        return this.importComponent(code);
      }
    },
  themeUrl:{
    get() {
      return this.baseUrl + this.$store.state.user.username;
    },
    set(newValue) {
      this.baseUrl = newValue;
    }
  }
  },
  methods: {
    importComponent(path) {
      return () => import("../../resume_themes/theme" + path + "/index.vue");
    },
    openTheme(id, is_real) {
      let url = "/preview/" + id + "?real=" + is_real;
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
          this.updateIframe();
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
    },
    getThemeUrl(){
      // refresh iframe src:
      this.baseUrl =  '';
      setTimeout(() => {
        this.setBaseURL();
      }, 0)

    },
    setBaseURL() {
      let getUrl = window.location;
      this.baseUrl = getUrl.protocol + "//" + getUrl.host + "/";
    },
    onLoad(){
      // remove the spinner loader.


    },
    updateIframe(){
      console.log('Update');
      if(!this.cvAutoUpdate){
        return;
      }
      setTimeout(() => {
        this.getThemeUrl();
      },0);
    }
  },
  mounted() {
    this.getThemesList();
    window.onresize = () => {
      this.windowWidth = window.innerWidth;
    };
    this.setBaseURL();
  }
};
</script>

<style scoped lang="scss">
@import "../../../../sass/media-queries";
$mainBlue: #001ce2;
.view-theme-modal {
  border-radius: 5px;
  border: 1px solid #888db1;
  width: 964px;
  max-width: 964px;
  @media screen and (max-width: 1903px) {
    width: 50% !important;
    max-width: 50% !important;
  }

  .view-theme-modal-card {
    border: 1px solid #888db1;
    border-radius: 5px;
    .theme-img-modal {
      width: 964px;
      height: 678px;
      @media screen and (min-width: 1264px) and (max-width: 1903px) {
        width: 80%;
      }
    }
  }
}
.resume-builder__tab {
  font-family: "Noto Sans" !important;
  font-size: 18px !important;
  line-height: 25px;
  text-transform: capitalize !important;
}
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
  @media screen and (min-width: 1904px) {
    max-width: 1480px !important;
    margin-left: -81px;
  }
  @media screen and (min-width: 1264px) and (max-width: 1903px) {
    width: 98% !important;
  }
  @media screen and (max-width: 599px) {
    width: auto !important;
  }
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
  @media screen and (min-width: 1264px) and (max-width: 1903px) {
    max-width: 1431.25px;
    margin-left: 0;
  }
  .themes-wrapper-title {
    font-family: "Noto Sans" !important;
    font-style: normal;
    font-weight: 600;
    font-size: 40px;
    line-height: 54px;
    color: #001ce2 !important;
    @media screen and (max-width: 959px) {
      font-size: 22px;
      line-height: 28px;
    }
    @media screen and (max-width: 767px) {
      font-size: 18px;
      line-height: 25px;
    }
    @media screen and (max-width: 430px) {
      font-size: 15px;
      line-height: 25px;
    }
    @media screen and (max-width: 382px) {
      font-size: 13px;
    }
  }
  .card-theme-holder {
    max-width: 417px;
    max-height: 302.56px;
    @media screen and (min-width: 960px) and (max-width: 1903px) {
      width: 274px;
      height: 200px;
    }
    @media screen and (min-width: 768px) and (max-width: 959px) {
      width: 200px;
      height: 145.11px;
    }
    @media screen and (min-width: 600px) and (max-width: 767px) {
      width: 240px;
      height: 175.11px;
    }
    @media screen and (max-width: 599px) {
      width: 300px;
      height: 217.67px;
    }

    .active {
      border: 3px solid #001ce2;
    }
    .inactive {
      border: 1px solid #888db1;
    }
    img {
      max-width: 417px;
      max-height: 302.56px;
      height: 302.56px;
      width: 95%;
      border-radius: 5px;
      @media screen and (min-width: 960px) and (max-width: 1903px) {
        width: 274px;
        height: 200px;
      }
      @media screen and (min-width: 768px) and (max-width: 959px) {
        width: 200px;
        height: 145.11px;
      }
      @media screen and (min-width: 600px) and (max-width: 767px) {
        width: 240px;
        height: 175.11px;
      }
      @media screen and (max-width: 599px) {
        width: 300px;
        height: 217.67px;
      }
    }
    .custom-overlay {
      background: rgba(255, 255, 255, 0.95);
      border: 1px solid #888db1 !important;
      border-radius: 5px !important;
    }
    .btn-preview-data {
      width: 120px;
      height: 35px;
      border-radius: 5px;
      font-family: "Noto Sans" !important;
      font-style: normal;
      font-weight: 500;
      font-size: 12px;
      line-height: 12px;
      text-transform: capitalize !important;
      @media screen and (min-width: 960px) and (max-width: 1903px) {
        font-size: 10px;
        width: 100px;
        height: 30px;
      }
      @media screen and (min-width: 600px) and (max-width: 959px) {
        font-size: 10px;
        width: 100px;
        height: 23px;
      }
      img {
        margin-left: 5px;
        width: 12px;
        height: 12px;
        @media screen and (min-width: 960px) and (max-width: 1903px) {
          width: 10px;
          height: 10px;
        }
        @media screen and (min-width: 600px) and (max-width: 959px) {
          width: 10px;
          height: 10px;
        }
      }
    }
    .btn-my-data {
      width: 120px;
      height: 35px;
      border-radius: 5px;
      font-family: "Noto Sans" !important;
      font-style: normal;
      font-weight: 500;
      font-size: 12px;
      line-height: 12px;
      text-transform: capitalize !important;
      color: #001ce2 !important;
      @media screen and (min-width: 960px) and (max-width: 1903px) {
        font-size: 10px;
        width: 100px;
        height: 30px;
      }
      @media screen and (min-width: 600px) and (max-width: 959px) {
        font-size: 10px;
        width: 100px;
        height: 23px;
      }

      img {
        margin-left: 5px;
        width: 12px;
        height: 12px;
        @media screen and (min-width: 960px) and (max-width: 1903px) {
          width: 10px;
          height: 10px;
        }
        @media screen and (min-width: 600px) and (max-width: 959px) {
          width: 10px;
          height: 10px;
        }
      }
    }
    .btn-activate {
      &.active {
        background: greenyellow !important;
        border: none;
      }

      top: -77px;
      right: -3px;
      width: 120px;
      height: 35px;
      border-radius: 5px;
      font-family: "Noto Sans" !important;
      font-style: normal;
      font-weight: 500;
      font-size: 12px;
      line-height: 12px;
      text-transform: capitalize !important;
      @media screen and (min-width: 960px) and (max-width: 1903px) {
        font-size: 10px;
        width: 100px;
        height: 30px;
        top: -28px;
        right: 0;
      }
      @media screen and (min-width: 768px) and (max-width: 959px) {
        font-size: 8px;
        width: 100px;
        height: 23px;
        top: -4px;
        right: -1px;
      }
      @media screen and (min-width: 600px) and (max-width: 767px) {
        top: -19px;
        right: -1px;
      }
      @media screen and (max-width: 599px) {
        top: -35px;
        right: 0;
      }

      img {
        margin-left: 5px;
        width: 10px;
        height: 10px;
      }
    }
  }
  .theme-img {
    img {
      width: 417px !important;
      height: 302.56px !important;
      @media screen and (max-width: 959px) {
        width: 200px !important;
        height: 145.11px !important;
      }
      @media screen and (max-width: 767px) {
        width: 142px !important;
        height: 103.03px !important;
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

.cv-content-preview-wrapper {
  margin-right: -10px;
  margin-left: -10px;
  overflow-y: scroll;
  margin-top: 40px;
  padding: 10px;
  max-height: 600px;
  max-width: 350px;
  margin-left: auto;
  margin-right: auto;
  @media screen and (min-width: 1904px) {
    max-width: 1480px;
    width: 1480px;
    margin-left: -81px !important;
  }
  @media screen and (min-width: 1264px) and (max-width: 1903px) {
    max-width: 99.2% !important;
  }

  &::-webkit-scrollbar {
    width: 5px;
    height: 0;
    background: #e5e5e5;
    border-radius: 5px 0 0 5px;
  }

  &::-webkit-scrollbar-thumb {
    background: #001ce2;
    border-radius: 5px 0 0 5px;
  }

  .cv-content-preview {
    .cv-preview-link {
      height: 50px;
      display: flex;
      align-items: center;
      border-radius: 5px;
      padding-left: 25px;
      border: 1px solid #e6e8fc;

      a {
        color: #888db1;
        font-family: "Roboto", "sans-serif";
        font-size: 20px;
        line-height: 22px;

        &:hover {
          color: inherit;
        }
      }
    }

    .cv-preview-theme-wrapper {
      .cv-preview-theme {
        overflow-x: scroll;

        &::-webkit-scrollbar {
          height: 0;
        }

        &::-webkit-scrollbar-thumb {
          height: 0;
        }
      }
    }
  }

  @include gt-xs {
    padding: 10px;
    padding-right: 20px;
    max-width: unset;
    margin-left: -10px;

    &::-webkit-scrollbar {
      width: 10px;
      border-radius: 10px 0 0 10px;
    }

    &::-webkit-scrollbar-thumb {
      border-radius: 10px 0 0 10px;
    }
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
<style lang="scss">
.civie-input.custom-border-radius {
  .v-input__slot fieldset {
    border-radius: 5px !important;
  }
}

/* I frame styling */
.vue-friendly-iframe{
  iframe{
    width:100%;
    min-height:1400px;
  }
}
</style>