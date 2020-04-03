<template>
  <v-app>
    <v-card flat tile color="#623CEA">
      <v-row class="pa-4">
        <v-col class="col-md-6 col-sm-12">
          <v-row class="justify-start">
            <v-col class="col-md-3 col-sm-6">
              <v-avatar class="profile" color="grey" size="164">
                <v-img
                  src="/images/resume_themes/theme501/man-crossed-arms-1516680.jpg"
                  style="border: 3px solid white;"
                ></v-img>
              </v-avatar>
            </v-col>
            <v-col class="col-md-6 col-sm-6 pt-12 pl-6">
              <p
                class="headline font-weight-bold text-left"
                style="color: whitesmoke;"
              >David Runchev</p>
              <p
                class="text-left"
                style="font-family: Circular Std;font-style: normal;font-weight: normal;font-size: 22px;line-height: 33px;color: #FFFFFF;opacity: 0.82"
              >Visual Designer</p>

              <v-btn fab outlined dark x-small color="#04C79B">
                <v-icon dark color="white">mdi-behance</v-icon>
              </v-btn>

              <v-btn class="mx-0" fab outlined dark x-small color="#04C79B">
                <v-icon dark color="white">mdi-dribbble</v-icon>
              </v-btn>
              <v-btn class="mx-0" fab outlined dark x-small color="#04C79B">
                <v-icon dark color="white">mdi-instagram</v-icon>
              </v-btn>
            </v-col>
          </v-row>
          <v-col class="col-md-12 col-sm-12 mt-n12 mx-auto d-none d-sm-flex">
            <v-btn color="#04C79B" dark rounded small>
              <span class="pl-4 pr-4">TAP TO CHAT</span>
            </v-btn>
          </v-col>
          <v-col class="col-md-12 col-sm-12 mx-auto d-flex d-sm-none d-md-none">
            <v-btn color="#04C79B" dark rounded small>
              <span class="pl-4 pr-4">TAP TO CHAT</span>
            </v-btn>
          </v-col>
        </v-col>
        <v-col class="col-md-6 col-sm-12">
          <v-row no-gutters class="justify-center">
            <v-col class="col-md-6 col-sm-6">
              <p
                class="subtitle-2 text-right mt-2 mr-4"
                style="color: whitesmoke;"
              >Your Interviews :</p>
            </v-col>
            <v-col class="col-md-6 col-sm-6">
              <v-btn class="ma-2" outlined color="white" left>
                <v-icon left>mdi-volume-high</v-icon>Upload Audio
              </v-btn>
              <v-btn class="ma-2" outlined color="white" left>
                <v-icon left>ondemand_video</v-icon>Upload Video
              </v-btn>
            </v-col>
            <v-col class="col-md-8 col-sm-12">
              <v-row style="background: rgb(37, 29, 68,0.20);border-radius: 10px;">
                <v-col cols="4">
                  <div class="title text-center" style="color: whitesmoke;">15$</div>
                  <div
                    class="subtitle-2 text-center"
                    style="color: #FFFFFF;opacity: 0.82"
                  >Hourly rate</div>
                </v-col>
                <v-col cols="4">
                  <div class="title text-center" style="color: whitesmoke;">40 hours</div>
                  <div
                    class="subtitle-2 text-center"
                    style="color: #FFFFFF;opacity: 0.82"
                  >Weekly Availability</div>
                </v-col>

                <v-col cols="4">
                  <v-btn dark color="#03CA9F" large width="100%" class="ma-auto">Hire Me</v-btn>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
      <v-row no-gutters class="justify-center">
        <v-col class="col-md-8 col-sm-12">
          <v-tabs
            v-model="tab"
            background-color="rgb(255, 255, 255,0.0)"
            centered
            grow
            dark
            text
            show-arrows
          >
            <v-tabs-slider></v-tabs-slider>

            <v-tab href="#tab-1">
              <v-icon left>layers</v-icon>Portfolio
            </v-tab>

            <v-tab href="#tab-2">
              <v-icon left>mdi-briefcase</v-icon>Work
            </v-tab>

            <v-tab href="#tab-3">
              <v-icon left>mdi-school</v-icon>Education
            </v-tab>
          </v-tabs>
        </v-col>
      </v-row>
    </v-card>

    <v-row class="justify-center">
      <v-col
        class="col-md-8 col-sm-8 elevation-12"
        style="height:auto;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;"
      >
        <v-row class="justify-center">
          <v-col class="col-md-3 col-sm-6">
            <div class="subtitle-2 text-center">Programing Languages</div>
          </v-col>
          <v-col class="col-md-3 col-sm-6">
            <div class="subtitle-2 text-center">Frameworks/Databases</div>
            <!-- <span
            style="position: absolute; left: 37.50%;right: 54.50%;top: 36.5%; bottom: 62.70%;background: #03CA9F;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);mix-blend-mode: normal;border-radius:10px"></span>-->
          </v-col>
          <v-col class="col-md-3 col-sm-6">
            <div class="subtitle-2 text-center">Software</div>
          </v-col>
          <v-col class="col-md-3 col-sm-6">
            <div class="subtitle-2 text-center">Design Skills</div>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
    <v-container>
      <v-row class="justify-center">
        <v-col class="col-md-8 col-sm-12">
          <v-row>
            <v-col class="col-md-3 col-sm-6">
              <v-row class="justify-end">
                <v-col cols="3">
                  <v-img
                    src="/images/resume_themes/theme501/616px-Adobe_Illustrator_CC_icon.svg.png"
                  ></v-img>
                </v-col>
                <v-col cols="6">
                  <div class="text-left">Illustrator</div>
                  <v-progress-linear rounded value="90" color="#623CEA"></v-progress-linear>
                </v-col>
                <v-col cols="2" class="mt-3 pr-2">
                  <span class="text-center subtitle-2">90%</span>
                </v-col>
              </v-row>
            </v-col>
            <v-col class="col-md-3 col-sm-6">
              <v-row class="justify-end">
                <v-col cols="3">
                  <v-img src="/images/resume_themes/theme501/1050px-Adobe_XD_CC_icon.svg.png"></v-img>
                </v-col>
                <v-col cols="6">
                  <div class="text-center">Adobe XD</div>
                  <v-progress-linear rounded value="70" color="#623CEA"></v-progress-linear>
                </v-col>
                <v-col cols="2" class="mt-3 pr-2">
                  <span class="text-center subtitle-2">70%</span>
                </v-col>
              </v-row>
            </v-col>
            <v-col class="col-md-3 col-sm-6">
              <v-row class="justify-end">
                <v-col cols="3">
                  <v-img src="/images/resume_themes/theme501/photoshop-logo-png-open-2000.png"></v-img>
                </v-col>
                <v-col cols="6">
                  <div class="text-center">Photoshop</div>
                  <v-progress-linear rounded value="95" color="#623CEA"></v-progress-linear>
                </v-col>
                <v-col cols="2" class="mt-3 pr-2">
                  <span class="text-center subtitle-2">95%</span>
                </v-col>
              </v-row>
            </v-col>
            <v-col class="col-md-3 col-sm-6">
              <v-row class="justify-end">
                <v-col cols="3">
                  <v-img src="/images/resume_themes/theme501/adobe-premiere-pro-logo-3.png"></v-img>
                </v-col>
                <v-col cols="6">
                  <div class="text-center">Premiere Pro</div>
                  <v-progress-linear rounded value="50" color="#623CEA"></v-progress-linear>
                </v-col>
                <v-col cols="2" class="mt-3 pr-2">
                  <span class="text-center subtitle-2">50%</span>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </v-container>
    <v-tabs-items v-model="tab">
      <v-tab-item value="tab-1">
        <v-container>
          <v-row class="justify-center">
            <v-col class="col-md-3 col-sm-6">
              <v-card elevation="8">
                <div style="padding:10px 10px;">
                  <v-img
                    src="/images/resume_themes/theme501/Screenshot_1.png"
                    style="border-radius: 10px;box-shadow: 0px 10px 23px rgba(0, 0, 0, 0.161);"
                  ></v-img>
                </div>
                <v-row class="justify-between">
                  <v-col cols="10">
                    <v-card-title>Product Designer</v-card-title>
                    <v-card-subtitle>insdrurial, creative, idea</v-card-subtitle>
                  </v-col>
                  <v-col cols="2">
                    <v-icon color="#623CEA" class="mt-6">open_in_new</v-icon>
                  </v-col>
                </v-row>
              </v-card>
            </v-col>
            <v-col class="col-md-3 col-sm-6">
              <v-card elevation="8">
                <div style="padding:10px 10px;">
                  <v-img
                    src="/images/resume_themes/theme501/d2a.jpg"
                    style="border-radius: 10px;box-shadow: 0px 10px 23px rgba(0, 0, 0, 0.161);"
                  ></v-img>
                </div>
                <v-row class="justify-between">
                  <v-col cols="10">
                    <v-card-title>Website Design</v-card-title>
                    <v-card-subtitle>insdrurial, creative, idea</v-card-subtitle>
                  </v-col>
                  <v-col cols="2">
                    <v-icon color="#623CEA" class="mt-6">open_in_new</v-icon>
                  </v-col>
                </v-row>
              </v-card>
            </v-col>
            <v-col class="col-md-3 col-sm-6">
              <v-card elevation="8">
                <div style="padding:10px 10px;">
                  <v-img
                    src="/images/resume_themes/theme501/image_processing20191208-15422-1m97ypn.png"
                    style="border-radius: 10px;box-shadow: 0px 10px 23px rgba(0, 0, 0, 0.161);"
                  ></v-img>
                </div>
                <v-row class="justify-between">
                  <v-col cols="10">
                    <v-card-title>Dashboard Designer</v-card-title>
                    <v-card-subtitle>unique, modern, idea</v-card-subtitle>
                  </v-col>
                  <v-col cols="2">
                    <v-icon color="#623CEA" class="mt-6">open_in_new</v-icon>
                  </v-col>
                </v-row>
              </v-card>
            </v-col>
          </v-row>
        </v-container>
      </v-tab-item>
      <v-tab-item value="tab-2">
        <v-container>
          <v-row style="overflow: scroll;">
            <v-col cols="12">
              <p class="display-2" style="color: #623CEA;">Work</p>
              <div class="mainPoint"></div>
              <div class="lilPoint"></div>
            </v-col>
            <v-col cols="12">
              <v-timeline align-top dense class="large_dot">
                <v-timeline-item
                  fill-dot
                  large
                  color="white"
                  icon-color="#623CEA"
                  icon="mdi-package-variant"
                >
                  <p class="title mt-3">Product Designer</p>
                </v-timeline-item>
                <v-timeline-item right fill-dot color="#623CEA" small>
                  <div class="subtitle-2">Gps Bangla</div>
                  <div class="subtitle-2">Jan 2017 - Feb 2019</div>
                </v-timeline-item>
                <v-timeline-item right fill-dot color="#623CEA" small>
                  <div class="subtitle-2">
                    Lorem ipsum dolor sit amet, consetetur
                    sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
                    magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                    Stet clita kasd
                    gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                  </div>
                </v-timeline-item>
              </v-timeline>
            </v-col>
            <v-col cols="12">
              <v-timeline align-top dense class="large_dot">
                <v-timeline-item
                  fill-dot
                  large
                  color="white"
                  icon-color="#623CEA"
                  icon="mdi-ruler-square-compass"
                >
                  <p class="title mt-3">Visual Designer</p>
                </v-timeline-item>
                <v-timeline-item right fill-dot color="#623CEA" small>
                  <div class="subtitle-2">Gps Bangla</div>
                  <div class="subtitle-2">Jan 2017 - Feb 2019</div>
                </v-timeline-item>
                <v-timeline-item right fill-dot color="#623CEA" small>
                  <div class="subtitle-2">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                    labore et dolore
                    magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                    Stet clita kasd
                    gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                  </div>
                </v-timeline-item>
              </v-timeline>
            </v-col>
          </v-row>
        </v-container>
      </v-tab-item>
      <v-tab-item value="tab-3">
        <v-container>
          <v-row style="overflow-y: scroll;">
            <v-col cols="12">
              <p class="display-2" style="color: #623CEA;">Education</p>
              <div class="mainPoint"></div>
              <div class="lilPoint"></div>
            </v-col>
            <v-col cols="12">
              <v-timeline align-top dense class="large_dot">
                <v-timeline-item
                  fill-dot
                  large
                  color="white"
                  icon-color="#623CEA"
                  icon="mdi-package-variant"
                >
                  <p class="title mt-3">Graphic Arts Institute</p>
                </v-timeline-item>
                <v-timeline-item right fill-dot color="#623CEA" small>
                  <div class="subtitle-2">2011 - 2016</div>
                  <div class="subtitle-2">Graphic Design</div>
                </v-timeline-item>
                <v-timeline-item right fill-dot color="#623CEA" small>
                  <div class="subtitle-2">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                    labore et dolore
                    magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                    Stet clita kasd
                    gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                  </div>
                </v-timeline-item>
              </v-timeline>
            </v-col>
            <v-col cols="12">
              <v-timeline align-top dense class="large_dot">
                <v-timeline-item
                  fill-dot
                  large
                  color="white"
                  icon-color="#623CEA"
                  icon="mdi-ruler-square-compass"
                >
                  <p class="title mt-3">Shanta Morioum</p>
                </v-timeline-item>
                <v-timeline-item right fill-dot color="#623CEA" small>
                  <div class="subtitle-2">2016 - 2019</div>
                  <div class="subtitle-2">Visual Design</div>
                </v-timeline-item>
                <v-timeline-item right fill-dot color="#623CEA" small>
                  <div class="subtitle-2">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                    labore et dolore
                    magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                    Stet clita kasd
                    gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                  </div>
                </v-timeline-item>
              </v-timeline>
            </v-col>
          </v-row>
        </v-container>
      </v-tab-item>
    </v-tabs-items>
  </v-app>
</template>

<style lang="scss" scoped>
@import "https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css";
@import "https://fonts.googleapis.com/css?family=Material+Icons";
@import "resources/sass/themes/theme501.scss";
</style>
   
   <script>
export default {
  props: ["user", "is_preview"],
  data() {
    return {
      taboo: null,
      activetab: 1,
      tab: null,
      text: [
        "",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
        "asdasdasdasd"
      ]
    };
  }
};
</script>



