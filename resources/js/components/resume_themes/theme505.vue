<template>
  <v-app>
    <v-card flat tile>
      <v-row class="pa-4">
        <v-col class="col-md-6 col-sm-12">
          <v-row class="justify-start">
            <v-col class="col-md-3 col-sm-6">
              <v-avatar class="profile" color="grey" size="164">
                <v-img src="https://i.ibb.co/zXy7SbT/Image.png" style=" border: 5px solid #F5823A"></v-img>
              </v-avatar>
            </v-col>
            <v-col class="col-md-6 col-sm-6 pt-12 pl-6">
              <p class="headline font-weight-bold text-left" style="color:#222B4C;">Zoyee Allena</p>
              <p
                class="text-left"
                style="font-family: Circular Std;font-style: normal;font-weight: normal;font-size: 16px;line-height: 33px;color: #9CA4C1;"
              >Visual Designer</p>

              <v-btn
                fab
                outlined
                dark
                x-small
                color="white"
                elevation="4"
                style="background-color:#E3EFFF;"
              >
                <v-icon dark color="#0067FF">mdi-behance</v-icon>
              </v-btn>

              <v-btn
                class="mx-0"
                fab
                outlined
                dark
                x-small
                color="white"
                elevation="4"
                style="background-color:#FFE3ED;"
              >
                <v-icon dark color="#EC407A">mdi-dribbble</v-icon>
              </v-btn>
              <v-btn
                class="mx-0"
                fab
                outlined
                dark
                x-small
                color="white"
                elevation="4"
                style="background-color:#FFF6D3;"
              >
                <v-icon dark color="#FF0100">mdi-instagram</v-icon>
              </v-btn>
            </v-col>
          </v-row>
          <!-- <v-col class="col-md-12 col-sm-12  mt-n12  mx-auto d-none d-sm-flex">
                <v-btn color="#04C79B" dark rounded small>
                  <span class="pl-4 pr-4">
                    TAP TO CHAT
                  </span>
  
                </v-btn>
              </v-col>
              <v-col class="col-md-12 col-sm-12  mx-auto d-flex  d-sm-none d-md-none">
                <v-btn color="#04C79B" dark rounded small>
                  <span class="pl-4 pr-4">
                    TAP TO CHAT
                  </span>
  
                </v-btn>
          </v-col>-->
        </v-col>
        <v-col class="col-md-6 col-sm-6">
          <v-row no-gutters class="justify-center">
            <v-col class="col-md-3 col-sm-6">
              <p class="subtitle-2 text-right mt-2 mr-4">Your Interviews :</p>
            </v-col>
            <v-col class="col-md-9 col-sm-6">
              <v-btn
                class="ma-2"
                color="#00A3FF"
                left
                style="color:#00A3FF;background-color:#E7F6FF;font-size:14px;"
              >
                <v-icon left color="#00A3FF">mdi-volume-high</v-icon>Upload Audio
              </v-btn>
              <v-btn
                class="ma-2"
                color="#00A3FF"
                left
                style="color:#00A3FF;background-color:#E7F6FF;font-size:14px;"
              >
                <v-icon left color="#00A3FF">ondemand_video</v-icon>Upload Video
              </v-btn>
            </v-col>
            <v-col class="col-md-12 col-sm-12 mx-auto mr-12">
              <v-row>
                <v-col class="col-md-4 col-sm-6">
                  <div class="title text-center">
                    15$
                    <span class="caption" style="opacity: 0.82">Hourly rate</span>
                  </div>
                </v-col>
                <v-col class="col-md-4 col-sm-6">
                  <div class="title text-center">
                    35 hrs
                    <span class="caption" style="opacity: 0.82">Weekly Availability</span>
                  </div>
                </v-col>
                <v-col class="col-md-4 col-sm-6">
                  <v-btn dark color="#00A3FF" x-large width="80%" class="ma-auto">
                    <div style="font-size:12px;text-align: center;">Hire Me</div>
                  </v-btn>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
      <v-row no-gutters class="justify-center" style="background-color:#00A3FF;">
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
            <v-tab href="#tab-4">
              <v-icon left>mdi-head-snowflake</v-icon>Skills
            </v-tab>
          </v-tabs>
        </v-col>
      </v-row>
    </v-card>

    <v-tabs-items v-model="tab">
      <v-tab-item value="tab-1">
        <v-container>
          <v-row class="justify-center mt-8">
            <v-col class="col-md-4 col-sm-6">
              <v-card elevation="8">
                <div style="padding:10px 10px;">
                  <v-img
                    src="/images/resume_themes/theme505/Screenshot_1.png"
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
            <v-col class="col-md-4 col-sm-6">
              <v-card elevation="8">
                <div style="padding:10px 10px;">
                  <v-img
                    src="/images/resume_themes/theme505/d2a.jpg"
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
            <v-col class="col-md-4 col-sm-6">
              <v-card elevation="8">
                <div style="padding:10px 10px;">
                  <v-img
                    src="/images/resume_themes/theme505/image_processing20191208-15422-1m97ypn.png"
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
      <v-tab-item value="tab-4">
        <v-row class="justify-center mt-lg-6">
          <v-col
            class="col-md-8 col-sm-8 elevation-8"
            style="height:auto;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;"
          >
            <v-row class="justify-center tabs">
              <v-col class="col-md-3 col-sm-6 text-center">
                <a
                  v-on:click="activetab=1"
                  v-bind:class="[ activetab === 1 ? 'active pb-2' : '' ]"
                >Programming languages</a>
              </v-col>
              <v-col class="col-md-3 col-sm-6 text-center">
                <a
                  v-on:click="activetab=2"
                  v-bind:class="[ activetab === 2 ? 'active pb-2' : '' ]"
                >Frameworks</a>
              </v-col>

              <v-col class="col-md-3 col-sm-6 text-center">
                <a
                  v-on:click="activetab=3"
                  v-bind:class="[ activetab === 3 ? 'active pb-2' : '' ]"
                >Design Skills</a>
              </v-col>
              <v-col class="col-md-3 col-sm-6 text-center">
                <a
                  v-on:click="activetab=4"
                  v-bind:class="[ activetab === 4 ? 'active pb-2' : '' ]"
                >Software</a>
              </v-col>
            </v-row>
          </v-col>
        </v-row>
        <v-container>
          <v-row class="justify-center">
            <v-col class="col-md-10 col-sm-12">
              <v-row>
                <v-col class="col-md-3 col-sm-6">
                  <v-row class="justify-end">
                    <v-col cols="3">
                      <v-img
                        src="/images/resume_themes/theme505/616px-Adobe_Illustrator_CC_icon.svg.png"
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
                      <v-img src="/images/resume_themes/theme505/1050px-Adobe_XD_CC_icon.svg.png"></v-img>
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
                      <v-img src="/images/resume_themes/theme505/photoshop-logo-png-open-2000.png"></v-img>
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
                      <v-img src="/images/resume_themes/theme505/adobe-premiere-pro-logo-3.png"></v-img>
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
      </v-tab-item>
    </v-tabs-items>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      tab: null,
      text: [
        "",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
        "asdasdasdasd"
      ]
    };
  },
  methods: {
    scrollToEnd: function() {
      var container = this.$el.querySelector("#container");
      container.scrollTop = container.scrollHeight;
    }
  }
};
</script>




<style lang="scss" scoped>
.large_dot:before {
  bottom: 0;
  content: "";
  height: 160px;
  position: absolute;
  top: 100px;
  width: 2px;
}
.v-timeline-item__dot--small {
  height: 10px;
  left: calc(50% - 12px);
  width: 10px;
}

.v-timeline-item__dot--large {
  box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.169);
}

.v-timeline-item {
  display: flex;
  padding-bottom: 6px;
}
.mainPoint {
  margin-left: 10px;
  height: 5px;
  border-radius: 15px;
  width: 40px;
  background-color: #03ca9f;
}

.mainPoint::before {
  content: "";
  display: block;

  margin-left: 50px;
  height: 5px;
  border-radius: 15px;
  width: 20px;
  background-color: #03ca9f;
}

.lilPoint {
  margin-left: 90px;
  height: 5px;
  border-radius: 15px;
  width: 40px;
  background-color: #03ca9f;
  margin-top: -5px;
}
.v-tab--active {
  background-color: #fafafa;
  color: #000 !important;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}
.v-tab--active .v-icon {
  color: #03ca9f;
}

.v-tabs-slider-wrapper {
  display: none !important;
}
.theme--dark.v-tabs .v-tab:hover:before {
  opacity: 0.08;
  border-top-left-radius: -50px;
  border-top-right-radius: 10px;
}
</style>