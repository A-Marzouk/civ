<template>
  <v-app>
    <section class="backdesign">
      <v-row justify="center" align="center" class="mb-lg-12 pb-lg-12">
        <v-col md="6" lg="6" cols="12">
          <v-row justify="center" align="center" no-gutters>
            <v-col md="2" lg="2" cols="3" sm="3" class="d-flex flex-column align-center">
              <v-avatar class="profile" size="100">
                <img src="/images/resume_themes/theme510/avatar.svg" alt="John" />
              </v-avatar>
              <!-- <v-avatar class="profile hidden-md-and-up" size="100">
                <img src="/images/resume_themes/theme510/avatar.svg" alt="John" />
              </v-avatar>-->
            </v-col>
            <v-col md="4" lg="4" cols="6" sm="9" class="pl-3">
              <div class="name white--text">
                Jennifer lopez
                <div sm="4" class="d-none d-sm-inline-block d-md-none">
                  <v-btn
                    outlined
                    fab
                    v-for="(icon, index) in media"
                    :key="index"
                    color="white"
                    class="butmarg"
                  >
                    <v-img :src="icon" width="16" height="16" contain class="butmedia"></v-img>
                  </v-btn>
                </div>
              </div>
              <div class="job">Web Designer</div>
              <v-row class="hidden-sm-and-down mt-2" no-gutters>
                <v-col lg="2" md="2" v-for="icon in icons" :key="icon.name">
                  <v-img
                    color="white"
                    :src="icon.name"
                    :width="icon.size"
                    :height="icon.size"
                    contain
                  ></v-img>
                </v-col>
              </v-row>
              <div sm="4" class="d-flex d-sm-none">
                <v-btn
                  outlined
                  fab
                  x-small
                  v-for="(icon, index) in media"
                  :key="index"
                  color="white"
                  class="mr-3 mt-2"
                >
                  <v-img :src="icon" width="16" height="16" contain></v-img>
                </v-btn>
              </div>
            </v-col>
            <v-row class="hidden-md-and-up spicon" align="end" justify="center">
              <v-col cols="11" align="center">
                <v-img
                  v-for="icon in iconsmob"
                  :key="icon.name"
                  :src="icon.name"
                  :width="icon.size"
                  :height="icon.size"
                  class="iconmob d-inline-block mx-4 mx-sm-5 mx-md-5"
                  contain
                ></v-img>
              </v-col>
            </v-row>
            <v-col md="3" cols="6" class="hidden-sm-and-down">
              <v-btn
                outlined
                fab
                x-small
                v-for="(icon, index) in media"
                :key="index"
                color="white"
                class="mr-3"
              >
                <v-img :src="icon" width="14" height="14" contain></v-img>
              </v-btn>
            </v-col>
          </v-row>
        </v-col>
        <v-col md="6" lg="6" class="hidden-sm-and-down">
          <v-row no-gutters justify="center" align="center">
            <v-col md="8" class="blade">
              <v-row no-gutters justify="center" align="center" class="mt-4 mr-8">
                <v-col md="3" class="index line mt-3">
                  <h2 class="point text-center font-weight-bold textcol">$10</h2>
                  <h2 class="subpoint text-center textcol">hourly rate</h2>
                </v-col>
                <v-col md="3" class="index mx-2 mt-3">
                  <h2 class="point text-center font-weight-bold textcol">35 HOURS</h2>
                  <h2 class="subpoint text-center textcol">weekly availability</h2>
                </v-col>
                <v-col md="4" class="index text-center pl-3 mt-2">
                  <v-btn
                    color="#104EFB"
                    width="160"
                    height="50"
                    style="border-radius:300px"
                    class="white--text but"
                    elevation="4"
                  >HIRE ME</v-btn>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-col>

        <v-col cols="12" sm="12" class="hidden-md-and-up">
          <v-row no-gutters justify="center" class="blademob" align="center">
            <v-row no-gutters justify="center" class="margtop mr-3" align="center">
              <v-col sm="6" cols="6" class="index linemob">
                <h2 class="point text-center font-weight-bold white--text">10$</h2>
                <h2 class="subpoint text-center white--text">hourly rate</h2>
              </v-col>
              <v-col sm="6" cols="6" class="index">
                <h2 class="point text-center font-weight-bold white--text">35 HOURS</h2>
                <h2 class="subpoint text-center white--text">weekly availability</h2>
              </v-col>
            </v-row>
            <v-col cols="12" sm="12" class="margintop text-center">
              <v-btn
                color="#104EFB"
                x-large
                elevation="4"
                class="white--text butmob"
                style="border-radius:300px"
              >HIRE ME</v-btn>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
      <v-row justify="start" align="start" class="marg">
        <v-col md="8" cols="12">
          <v-tabs
            v-model="currentTab"
            center-active
            show-arrows
            color="#104efb"
            background-color="transparent"
          >
            <v-tabs-slider class="slider"></v-tabs-slider>

            <v-tab
              v-for="tab in tabs"
              :key="tab.name"
              @click="currentTab = tab.id"
              class="mr-lg-8 mr-sm-6 mr-4"
            >
              <div class="tabtitle text-capitalize">{{ tab.name }}</div>
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
      <v-row no-gutters justify="end" align="end" class="hidden-md-and-down">
        <v-col md="2" sm="6" class="navblade py-3" style="text-align: center;">
          <v-btn
            dark
            fab
            outlined
            color="#fff"
            :disabled="currentTab==0"
            @click="currentTab--"
            small
            class="ma-3"
          >
            <v-icon small>mdi-arrow-left</v-icon>
          </v-btn>
          <v-btn dark fab outlined color="#fff" small class="ma-3" @click="currentTab++">
            <v-icon small>mdi-arrow-right</v-icon>
          </v-btn>
        </v-col>
      </v-row>
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
  name: "App",

  data() {
    return {
      tabmob: null,
      currentTab: 0,
      icons: [
        { name: "/images/resume_themes/theme510/behance.svg", size: 18 },
        { name: "/images/resume_themes/theme510/dribbble.svg", size: 16 },
        { name: "/images/resume_themes/theme510/pinterest.svg", size: 16 },
        { name: "/images/resume_themes/theme510/instagram.svg", size: 16 },
        { name: "/images/resume_themes/theme510/linkedin.svg", size: 16 }
      ],
      iconsmob: [
        { name: "/images/resume_themes/theme510/behance_2.svg", size: 24 },
        { name: "/images/resume_themes/theme510/dribbble_2.svg", size: 24 },
        { name: "/images/resume_themes/theme510/pinterest_2.svg", size: 24 },
        { name: "/images/resume_themes/theme510/instagram_2.svg", size: 24 },
        { name: "/images/resume_themes/theme510/linkedin_2.svg", size: 24 }
      ],
      media: [
        "/images/resume_themes/theme510/message.svg",
        "/images/resume_themes/theme510/audio.svg",
        "/images/resume_themes/theme510/video.svg"
      ],
      tabs: [
        {
          id: 1,
          name: "Portfolio",
          link: "/portfolio"
        },
        {
          id: 2,
          name: "Skills",
          link: "/skills"
        },
        {
          id: 3,
          name: "Work",
          link: "/work"
        },
        {
          id: 4,
          name: "Education",
          link: "/education"
        }
      ]
    };
  }
};
</script>

<style lang="scss" scoped>
.tabtitle {
  font-family: Gotham Pro;
  font-style: normal;
  font-weight: normal;
  font-size: 1.5rem;
  line-height: 14px;
}
.point {
  font-family: "Montserrat", sans-serif;
  font-style: normal;
  font-weight: 400;
  font-size: 14px;
  line-height: 15px;
}
.subpoint {
  font-family: "Montserrat", sans-serif;
  font-style: normal;
  font-weight: 300;
  font-size: 12px;
  line-height: 18px;
}
.v-tabs-slider-wrapper {
  height: 3px !important;
  padding: 0 100px !important;
  left: 0;
  opacity: 0.6;
}
.v-tab:not(.v-tab--active) {
  color: #104efb !important;
  opacity: 0.4 !important;
}

.cls-1 {
  fill: #104efb;
}
.textcol {
  color: #104efb !important;
}
section {
  position: relative;
  margin: 0;
  padding: 0;
  background: url("/images/resume_themes/theme510/curve.jpg");
  background-repeat: no-repeat;
  background-size: cover;
}
/* .backdesign:after {
  content: "";
  position: absolute;
  width: 100%;
  height: 280px;
  background: url("/images/resume_themes/theme510/backdesign.png");
  background-repeat: repeat-y;
  background-size: cover;
  background-position: top;
} */
.marg {
  margin-top: 2px;
  margin-left: 150px;
}
.v-tabs-slider {
  margin-left: auto;
  margin-right: auto;
  width: 60% !important;
  background-color: rgba(16, 78, 251, 0.5) !important;
  box-shadow: 0px 7px 9px rgba(16, 78, 251, 0.03) !important;
}
.name {
  font-family: "Montserrat", sans-serif;
  font-style: normal;
  font-weight: 300;
  font-size: 1.5rem;
  line-height: 20px;
}
.job {
  font-family: "Montserrat", sans-serif;
  font-style: normal;
  font-weight: 200;
  font-size: 1rem;
  line-height: 20px;
  color: rgba(255, 255, 255, 0.6) !important;

  margin-top: 15px;
}

@media only screen and (max-width: 600px) {
  .navblade {
    position: fixed;
    background-color: #104efb;
    border-top-left-radius: 300px;
    border-bottom-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    bottom: 0;
  }
  .marg {
    margin-top: 20px;
    margin-left: 0;
  }
  .butmob {
    width: 200px !important;
    height: 60px !important;
    font-size: 15px !important;
  }
  section {
    position: relative;
    margin: 0;
    padding: 0;
    background: url("/images/resume_themes/theme510/curvedmob.jpg");
    background-repeat: no-repeat;
    background-size: contain;
  }

  .marg {
    margin-top: 30px !important;
  }
  .v-tabs-slider-wrapper {
    height: 3px !important;
    padding: 0 5px !important;
    left: 0;
    opacity: 0.6;
  }
  .margtop {
    margin-top: 30px;
  }
  .margintop {
    margin-top: 60px;
  }
  .linemob:after {
    content: "";
    background-color: #fff;
    position: absolute;
    opacity: 0.3;
    width: 1px;
    top: -8px;
    right: 0;
    z-index: 100;
    height: 50px;
    border: 1px solid rgba(255, 255, 255, 0.6);
    transform: rotate(180deg);
  }
  .spicon {
    margin-top: 50px;
  }
  .name {
    font-family: "Montserrat", sans-serif;
    font-style: normal;
    font-weight: 300;
    font-size: 24px;
    line-height: 20px;
    margin-top: 0px;
  }
  .job {
    font-family: "Montserrat", sans-serif;
    font-style: normal;
    font-weight: 200;
    font-size: 0.8rem;
    line-height: 20px;
    margin-top: 10px;
    color: rgba(255, 255, 255, 0.6) !important;
  }
}
@media screen and (max-width: 1360px) {
  .but {
    width: 120px !important;
  }
}
@media only screen and (max-width: 800px) and (min-width: 700px) {
  .navblade {
    position: relative;
    background-color: #104efb;
    border-top-left-radius: 300px;
    border-bottom-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    bottom: 0;
  }
  .marg {
    margin-top: 20px;
    margin-left: 0;
  }
  .butmarg {
    padding: 0px 20px !important;
    margin: 0 10px !important;
  }
  .butmedia {
    height: 24px !important;
    width: 24px !important;
  }

  .name {
    font-family: "Montserrat", sans-serif;
    font-style: normal;
    font-weight: 300;
    font-size: 34px;
    line-height: 20px;

    margin-left: -24px;
  }
  .job {
    font-family: "Montserrat", sans-serif;
    font-style: normal;
    font-weight: 200;
    font-size: 1.2rem;
    line-height: 20px;
    color: rgba(255, 255, 255, 0.6) !important;
    margin-left: -24px;
    margin-top: 15px;
  }

  .iconmob {
    height: 36px !important;
    width: 36px !important;
  }
  .profile {
    margin-top: 16px !important;
    height: 120px !important;
    min-width: 120px !important;
    width: 120px !important;
  }
  .spicon {
    margin-top: 120px;
    padding-left: 110px;
    margin-right: 128px !important;
  }
  .butmob {
    width: 350px !important;
    height: 100px !important;
    font-size: 30px !important;
  }
  .v-tabs-slider-wrapper {
    height: 3px !important;
    padding: 0 50px !important;
    left: 0;
    opacity: 0.6;
  }
  .margintop {
    margin-top: 150px;
  }
  .point {
    font-size: 24px;
    padding: 10px 0;
  }
  .subpoint {
    font-size: 24px;
    padding: 10px 0;
  }
  .margtop {
    margin-top: 60px;
  }
  .blademob:before {
    content: "";
    background-color: #104efb;
    position: absolute;
    width: 100%;
    top: 0;
    height: 210px !important;

    border-top-left-radius: 300px;
    border-bottom-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 300px;
    z-index: 1;
  }
  .blademob {
    margin-top: 45px !important;
  }
  .but {
    width: 100px;
  }
  section {
    position: relative;
    margin: 0;
    padding: 0;
    top: 0;
    background: url("/images/resume_themes/theme510/ipad.png");
    background-repeat: no-repeat;
    background-size: contain;
  }

  .linemob:after {
    content: "";
    background-color: #fff;
    position: absolute;
    opacity: 0.44;
    width: 1px;
    top: 0px;
    right: 0;
    z-index: 100;
    height: 90px;
    border: 1px solid rgba(255, 255, 255, 0.5);
    transform: rotate(180deg);
  }
}
#curve {
  position: absolute;
  bottom: 0;
  width: 100%;
}
#curve path {
  fill: #fff;
}
#curvemob {
  position: absolute;
  top: 0;
  width: 100%;
}
#curvemob path {
  fill: #fff;
}
a {
  text-decoration: none;
}
.textunder {
  text-decoration: underline;
  text-underline-position: under;
}
.blade {
  position: relative;

  z-index: 1;
}
.blade:before {
  content: "";
  background-color: #fff;
  position: absolute;
  width: 100%;
  top: 0;
  height: 100px;
  border-top-left-radius: 300px;
  border-bottom-left-radius: 0;
  border-top-right-radius: 0;
  border-bottom-right-radius: 300px;
  z-index: 1;
}
.blademob {
  position: relative;
  margin-top: 30px;
  z-index: 1;
}
.blademob:before {
  content: "";
  background-color: #104efb;
  position: absolute;
  width: 100%;
  top: 0;
  height: 100px;
  border-top-left-radius: 300px;
  border-bottom-left-radius: 0;
  border-top-right-radius: 0;
  border-bottom-right-radius: 300px;
  z-index: 1;
}
.index {
  z-index: 10;
}
.line {
  position: relative;
  z-index: 10;
}
.line:after {
  content: "";
  position: absolute;
  opacity: 0.44;
  width: 1px;
  top: -15px;
  right: 0;
  z-index: 100;
  height: 60px;
  border: 1px solid rgba(16, 78, 251, 0.3);
  transform: rotate(180deg);
}
.linemob {
  position: relative;
  z-index: 10;
}

.navblade {
  position: fixed;
  background-color: #104efb;
  border-top-left-radius: 300px;
  border-bottom-left-radius: 0;
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
  bottom: 0;
}
</style>
