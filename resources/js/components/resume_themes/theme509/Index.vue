<template>
  <v-app>
    <section class="back">
      <v-row no-gutters justify-md="center" justify-sm="center" justify="center">
        <v-col lg="6" md="4" sm="12" cols="12">
          <div class="mx-md-5 my-md-3 my-xs-5 py-3">
            <v-row align="center" no-gutters>
              <v-col cols="3" md="5" lg="4" align="center">
                <v-avatar class="ma-0 ma-sm-4 ma-md-4 ma-lg-4">
                  <v-img src="/images/resume_themes/theme509/avatar.png" contain class="mt-1"></v-img>
                </v-avatar>
              </v-col>

              <v-col cols="9" md="7" lg="8" sm="7" class="pl-md-3 pl-sm-1 pl-2 mt-6 mt-sm-0">
                <div class="head textcol font-weight-black">
                  Beverly Andrews
                  <div class="d-inline-block hidden-lg-and-up">
                    <v-btn
                      fab
                      color="#4ADAE3"
                      class="mx-2"
                      x-small
                      style="box-shadow: 0px 4px 30px rgba(74, 220, 229, 0.5);"
                    >
                      <v-img
                        src="/images/resume_themes/theme509/video-player.svg"
                        width="18"
                        height="18"
                        class="mt-1"
                        contain
                      ></v-img>
                    </v-btn>
                    <v-btn
                      fab
                      color="#4ADAE3"
                      class="mx-2"
                      x-small
                      style="box-shadow: 0px 4px 30px rgba(74, 220, 229, 0.5);"
                    >
                      <v-img
                        src="/images/resume_themes/theme509/headphones.svg"
                        width="18"
                        height="18"
                        class="mt-1"
                        contain
                      ></v-img>
                    </v-btn>
                  </div>
                </div>

                <div class="subtitle-2 grey--text text--lighten-2 pb-2 mb-2">User interface designer</div>
                <v-btn
                  fab
                  color="#4ADAE3"
                  class="mr-2"
                  small
                  style="box-shadow: 0px 4px 30px rgba(74, 220, 229, 0.5);"
                >
                  <v-img
                    src="/images/resume_themes/theme509/email.svg"
                    width="18"
                    height="18"
                    class="mt-1"
                    contain
                  ></v-img>
                </v-btn>

                <v-btn
                  fab
                  text
                  x-small
                  color="white"
                  v-for="icon in icons"
                  :key="icon.id"
                  class="mx-md-2 mx-sm-2 mx-lg-2 mx-1"
                >
                  <v-img contain max-width="4rem" max-height="4rem" :src="icon.src" class="mt-n3"></v-img>
                </v-btn>
              </v-col>
            </v-row>
          </div>
        </v-col>

        <v-col
          lg="4"
          md="11"
          sm="11"
          cols="10"
          class="ml-md-auto mr-md-12 mt-8"
          align-self="center"
        >
          <v-row
            justify-md="end"
            justify="center"
            align="center"
            class="my-4 hidden-md-and-down mr-6"
          >
            <div class="subtitle-2 grey--text text--lighten-2">Interview:</div>
            <v-btn
              fab
              color="#4ADAE3"
              class="mx-4"
              x-small
              style="box-shadow: 0px 4px 30px rgba(74, 220, 229, 0.5);"
            >
              <v-img
                src="/images/resume_themes/theme509/video-player.svg"
                width="18"
                height="18"
                class="mt-1"
                contain
              ></v-img>
            </v-btn>
            <v-btn
              fab
              color="#4ADAE3"
              class="mr-10"
              x-small
              style="box-shadow: 0px 4px 30px rgba(74, 220, 229, 0.5);"
            >
              <v-img
                src="/images/resume_themes/theme509/headphones.svg"
                width="18"
                height="18"
                class="mt-1"
                contain
              ></v-img>
            </v-btn>
          </v-row>
          <v-row justify-md="end" justify="center" align="center" class="hire-back py-3">
            <v-col cols="4" sm="3" md="3" lg="3">
              <div class="text-center antext subtitle-2 font-light">Hourly rate</div>
              <div class="text-center grey--text text--lighten-2 title font-weight-bold">$25 USD</div>
            </v-col>
            <v-col cols="2" lg="1" justify="center" align="center" class="mx-n4">
              <div style="width:1px;height:2rem;background-color:rgba(255, 255, 255, 0.38); "></div>
            </v-col>

            <v-col cols="4" sm="3" md="3" lg="3">
              <div class="text-center antext subtitle-2 font-light">Available for</div>
              <div class="text-center grey--text text--lighten-2 title font-weight-bold">8 hours</div>
            </v-col>
            <v-col cols="12" sm="4" md="4" lg="5" class="text-center mr-md--5" justify="center">
              <button class="hire py-3">
                <div class="text-center blutext font-weight-bold">HIRE ME</div>
              </button>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
      <v-row class="mt-md-6 mt-8 pt-6 mt-sm-6">
        <v-col lg="8" sm="12" cols="12" class="tablet ml-lg-12 pl-lg-8">
          <v-tabs
            background-color="transparent"
            class="tabmargn"
            hide-slider
            hide-arrows
            center-active
            v-model="tablet"
          >
            <v-tab
              v-for="tab in tabs"
              :key="tab.id"
              @click="currentTab = tab.id"
              class="ml-md-2 mr-md-2 text-left"
            >
              <v-btn fab text elevation="0" color="white">
                <v-img :src="tab.icon" width="48" height="48" contain></v-img>
              </v-btn>

              <div
                class="tabtitle textcol font-weight-bold text-capitalize mx-md-4 pl-xs-2 mr-xs-5"
              >{{ tab.name }}</div>
            </v-tab>
          </v-tabs>
        </v-col>
      </v-row>
      <div>
        <Portfolio :currentTab="currentTab" />
        <Work :currentTab="currentTab" />
        <Skills :currentTab="currentTab" />
        <Education :currentTab="currentTab" />
      </div>
    </section>
  </v-app>
</template>

<script>
import Portfolio from "./tabs/Portfolio";
import Work from "./tabs/Work";
import Education from "./tabs/Education";
import Skills from "./tabs/Skills";
export default {
  components: { Portfolio, Work, Education, Skills },
  data() {
    return {
      currentTab: 1,
      activetab: 1,
      tablet: null,
      media: [
        {
          id: 1,
          src: "/images/resume_themes/theme509/email.svg"
        },
        {
          id: 2,
          src: "/images/resume_themes/theme509/video-player.svg"
        },
        {
          id: 3,
          src: "/images/resume_themes/theme509/headphones.svg"
        }
      ],
      icons: [
        {
          id: 1,
          src: "/images/resume_themes/theme509/facebook.svg"
        },
        {
          id: 2,
          src: "/images/resume_themes/theme509/instagram.svg"
        },
        {
          id: 3,
          src: "/images/resume_themes/theme509/linkedin.svg"
        },
        {
          id: 4,
          src: "/images/resume_themes/theme509/behance.svg"
        },
        {
          id: 5,
          src: "/images/resume_themes/theme509/dribbble.svg"
        }
      ],
      tabs: [
        {
          id: 1,
          name: "Portfolio",
          icon: "/images/resume_themes/theme509/portfolio.svg",
          link: "/"
        },
        {
          id: 2,
          name: "Work",
          icon: "/images/resume_themes/theme509/work.svg",
          link: "/work"
        },
        {
          id: 3,
          name: "Education",
          icon: "/images/resume_themes/theme509/education.svg",
          link: "/education"
        },
        {
          id: 4,
          name: "Skills",
          icon: "/images/resume_themes/theme509/skills.svg",
          link: "/skills"
        }
      ]
    };
  }
};
</script>
<style lang="scss" scoped>
.hire-back {
  background: #3546c1;
  border-radius: 120px;
}
.tablet:after {
  content: "";
  position: absolute;
  height: 4px;
  width: 95%;
  background-color: rgba(255, 255, 255, 0.05);

  margin: 40px 40px 40px 50px;
}
.v-tabs-bar {
  height: 60px !important;
}
.textcol {
  color: #52edfa !important;
}
.antext {
  color: #51eaf6;
}
.blutext {
  color: #190685;
}

.back {
  background-image: url("/images/resume_themes/theme509/back.png");
  background-size: cover;
}

.profile {
  background: linear-gradient(
    97.67deg,
    #f9bfda 1.07%,
    #ffcad0 51.95%,
    #fdbeba 89.88%
  );
  box-shadow: 0px 4px 20px rgba(253, 191, 187, 0.44);
  border-radius: 10px 10px 200px 10px;
}

.theme--light.v-tabs .v-tab:hover {
  opacity: 1;
  color: #51eaf6;
}
.theme--light.v-tabs .v-tab--active:before,
.theme--light.v-tabs .v-tab--active:hover:before,
.theme--light.v-tabs .v-tab:focus:before {
  opacity: 0 !important;
}
.v-tab--active {
  opacity: 1;
}
.v-tab:not(.v-tab--active) {
  opacity: 0.3;
}

.fade-up-enter-active,
.fade-up-leave-active {
  transition: all 0.3s ease-in-out;
}
.fade-up-enter,
.fade-up-leave-to {
  transform: translateX(30px);
  opacity: 0;
}
.hire {
  background: linear-gradient(96.78deg, #52edfa 12.14%, #4adae2 95.04%);
  box-shadow: 0px 0px 50px rgba(64, 180, 239, 0.48);
  border-radius: 40px;
  width: 12rem;
}
.v-avatar {
  width: 10rem !important;
  height: 10rem !important;
}
.head {
  font-size: 1.5rem;
  color: #c10fa0;

  text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.15);
}
.tabtitle {
  font-size: 1.5rem;
}
.iconsize {
  width: 64px !important;
  height: 64px !important;
}

@media only screen and (max-width: 1024px) {
  .back {
    background-image: url("/images/resume_themes/theme509/backpad.png");
    background-size: cover;
    background-repeat: no-repeat;
  }
}
@media only screen and (max-width: 600px) {
  .back {
    background-image: url("/images/resume_themes/theme509/backmob.png");
    background-size: cover;
    background-repeat: no-repeat;
  }
  .hire-back {
    background: #3546c1;
    border-radius: 50px;
  }
  .tabmargn {
    margin-left: -52px;
  }
  .tablet:after {
    content: "";
    position: absolute;
    height: 4px;
    width: 100% !important;
    background-color: rgba(255, 255, 255, 0.05);
    margin-top: 40px;
    margin-left: 0px !important;
  }
  .v-avatar {
    width: 6rem !important;
    height: 6rem !important;
  }
  .profile {
    margin: 0px 6px;
  }
  .v-tabs-bar.v-slide-group--is-overflowing.v-tabs-bar--is-mobile:not(.v-tabs-bar--show-arrows):not(.v-slide-group--has-affixes)
    .v-slide-group__prev {
    display: none !important;
    visibility: hidden;
  }

  .tab-button {
    width: 10rem !important;
  }
  .tabtitle {
    font-size: 1.5rem;
  }
}
.iconsize {
  width: 32px !important;
  height: 32px !important;
}
</style>
