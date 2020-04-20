<template>
  <v-app>
    <v-card flat tile color="#623CEA" id="theme501">
      <v-row no-gutters class="mt-xl-12 mt-lg-12 mt-sm-6 mt-6">
        <v-col class="col-md-6 col-sm-12" cols="12">
          <v-row no-gutters class="justify-start" align="center">
            <v-col
              class="col-md-3 ml-sm-6 pl-3 pl-lg-0 pl-sm-1 pl-xl-0"
              align-xl="center"
              sm="3"
              lg="3"
              xl="2"
              cols="4"
              align-lg="center"
              align-sm="start"
              align-content="end"
            >
              <v-img
                src="/images/resume_themes/theme501/man-crossed-arms-1516680.jpg"
                style="border: 3px solid white;border-radius:50%;"
                class="profile"
                cover
              ></v-img>
            </v-col>
            <v-col
              cols="6"
              class="col-md-6 col-sm-6 pt-lg-12 pt-sm-6 pt-4 pl-xl-12 ml-xl-4 ml-lg-6 pl-6"
            >
              <div
                class="head font-weight-bold text-left mb-2"
                style="color: whitesmoke;"
              >David Runchev</div>
              <div class="subhead text-left mb-4 white--text">Visual Designer</div>

              <div class="hidden-sm-and-down">
                <v-btn fab outlined dark x-small color="#04C79B">
                  <v-icon dark color="white">mdi-behance</v-icon>
                </v-btn>
                <v-btn class="mx-0" fab outlined dark x-small color="#04C79B">
                  <v-icon dark color="white">mdi-dribbble</v-icon>
                </v-btn>
                <v-btn class="mx-0" fab outlined dark x-small color="#04C79B">
                  <v-icon dark color="white">mdi-instagram</v-icon>
                </v-btn>
              </div>

              <div class="hidden-md-and-up mt-sm-8">
                <v-btn dark elevation="0" class="px-0 iconsize" color="#217BFF">
                  <v-icon dark small color="white">mdi-behance</v-icon>
                </v-btn>
                <v-btn dark elevation="0" class="px-0 mx-1 iconsize" color="#EE588A">
                  <v-icon dark small color="white">mdi-dribbble</v-icon>
                </v-btn>
                <v-btn dark elevation="0" class="px-0 mx-1 iconsize" color="#DD24BC">
                  <v-icon dark small color="white">mdi-instagram</v-icon>
                </v-btn>
                <v-btn dark elevation="0" class="px-0 mx-1 iconsize" color="#DC4E41">
                  <v-icon dark small color="white">mdi-google-plus</v-icon>
                </v-btn>
              </div>
            </v-col>
            <v-col class="hidden-md-and-up pl-4 pl-sm-2" cols="2">
              <v-btn dark class="px-0 my-4 d-block iconsize" color="#03CA9F">
                <v-icon dark small color="white">mdi-phone</v-icon>
              </v-btn>
              <v-btn dark class="px-0 my-4 d-block iconsize" color="#2400FF">
                <v-icon dark small color="white">mdi-video</v-icon>
              </v-btn>
            </v-col>
          </v-row>
          <v-col class="col-md-12 col-sm-12 mt-sm-n12 mx-auto hidden-xs-only ml-sm-6">
            <v-btn color="#04C79B" dark rounded small>
              <span class="pl-4 pr-4">TAP TO CHAT</span>
            </v-btn>
          </v-col>
        </v-col>
        <v-col class="col-md-6 col-sm-12 mt-sm-12 my-6">
          <v-row no-gutters justify-lg="end" justify-sm="center" justify="center">
            <v-col class="col-md-6 text-right mb-md-8 hidden-sm-and-down" lg="12">
              <div
                class="subtitle-2 text-right mt-2 mr-4 d-inline-block"
                style="color: whitesmoke;"
              >Your Interviews :</div>
              <v-btn class="ma-2" outlined color="white">
                <v-img src="/images/resume_themes/theme501/audio.png"></v-img>
                <div class="ml-2 subtitle-1">Upload Audio</div>
              </v-btn>
              <v-btn class="ma-2" outlined color="white">
                <v-img src="/images/resume_themes/theme501/video.png"></v-img>
                <div class="ml-2 subtitle-1">Upload Video</div>
              </v-btn>
            </v-col>
            <v-col class="col-md-8 col-sm-11 mr-md-4" lg="10" cols="11">
              <v-row class="info-pad">
                <v-col cols="4" lg="4">
                  <div class="info-title text-center">15$</div>
                  <div class="info-subtitle text-center" style="opacity: 0.82">Hourly rate</div>
                </v-col>
                <v-col cols="5" sm="4" lg="4">
                  <div class="info-title text-center">40 hours</div>
                  <div class="info-subtitle text-center" style="opacity: 0.82">Weekly Availability</div>
                </v-col>

                <v-col cols="3" class="text-center" lg="4">
                  <v-btn
                    dark
                    color="#03CA9F"
                    width="100%"
                    height="100%"
                    elevation="0"
                    class="ma-auto"
                  >
                    <div class="subhead">Hire Me</div>
                  </v-btn>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
      <v-row class="hidden-sm-and-up">
        <v-tabs-items v-model="tab">
          <v-tab-item value="tab-4">
            <v-row class="justify-center text-center" no-gutters>
              <v-tabs
                v-model="activetab"
                slider-color="white"
                show-arrows
                background-color="#03CA9F"
                class="tabmob"
              >
                <v-tab>
                  <div class="subhead">
                    Programming
                    languages
                  </div>
                </v-tab>
                <v-tab>
                  <div class="subhead">
                    Frameworks/
                    Databases
                  </div>
                </v-tab>
                <v-tab>
                  <div class="subhead">Software</div>
                </v-tab>
                <v-tab>
                  <div class="subhead">Design</div>
                </v-tab>
              </v-tabs>
            </v-row>
          </v-tab-item>
        </v-tabs-items>
      </v-row>
      <v-row no-gutters justify="center" class="mt-sm-8">
        <v-col md="8" sm="12" cols="12" class="hidden-xs-only">
          <v-tabs
            v-model="tab"
            background-color="rgb(255, 255, 255,0.0)"
            grow
            dark
            text
            hide-slider
          >
            <v-tab v-for="tab in tabs" :key="tab.link" :href="tab.link" class="tablet">
              <v-icon left>{{tab.icon}}</v-icon>
              <div class="title text-capitalize font-weight-bold">{{tab.name}}</div>
            </v-tab>
          </v-tabs>
        </v-col>
        <v-col cols="12" class="hidden-sm-and-up" align="center">
          <v-card flat>
            <v-tabs
              background-color="transparent"
              height="100"
              v-model="tab"
              hide-slider
              center-active
            >
              <v-tab class="text-center" v-for="tab in tabs" :key="tab.link" :href="tab.link">
                <!-- <div
                  @click="currentTab = tab.id"
                  class="mt-2 body-2 d-block black--text text-capitalize font-weight-medium"
                >{{ tab.name }}</div>-->
                <v-btn
                  fab
                  class="text-center d-block"
                  :color="currentTab == tab.link ? '#623CEA':'#AE97FF'"
                  @click="currentTab = tab.link"
                  :class="[currentTab == tab.link ? 'tab-mobile-btn-active':'']"
                  dark
                  depressed
                  x-small
                >
                  <v-icon class="sicon">{{tab.icon}}</v-icon>
                </v-btn>
              </v-tab>
            </v-tabs>
          </v-card>
        </v-col>
        <v-col cols="12" align="center" class="hidden-sm-and-up">
          <v-card flat>
            <v-btn
              fab
              text
              x-small
              v-for="dot in tabs"
              :key="dot.link"
              @click="currentTab = dot.link"
            >
              <span class="mt-2" :class="[currentTab === dot.link?'tab-dot-active':'tab-dot']"></span>
            </v-btn>
          </v-card>
        </v-col>
      </v-row>
    </v-card>

    <v-tabs-items v-model="tab">
      <v-tab-item value="tab-1">
        <v-row class="justify-center mt-xl-6 mt-lg-12 mt-sm-4">
          <v-col class="col-md-3 col-sm-12 mx-4 px-sm-12 py-sm-3" cols="12">
            <v-card elevation="8">
              <div style="padding:10px 10px;">
                <v-img
                  :aspect-ratio=".96"
                  cover
                  src="/images/resume_themes/theme501/Screenshot_1.png"
                  style="border-radius: 10px;box-shadow: 0px 10px 23px rgba(0, 0, 0, 0.161);"
                ></v-img>
              </div>
              <v-row class="justify-between">
                <v-col cols="9">
                  <v-card-title>Product Designer</v-card-title>
                  <v-card-subtitle>insdrurial, creative, idea</v-card-subtitle>
                </v-col>
                <v-col cols="3" justify="end" align="end">
                  <v-icon color="#623CEA" large class="mt-6 mr-2">open_in_new</v-icon>
                </v-col>
              </v-row>
            </v-card>
          </v-col>
          <v-col class="col-md-3 col-sm-12 mx-4 px-sm-12 py-sm-3" cols="12">
            <v-card elevation="8">
              <div style="padding:10px 10px;">
                <v-img
                  :aspect-ratio=".96"
                  cover
                  src="/images/resume_themes/theme501/d2a.jpg"
                  style="border-radius: 10px;box-shadow: 0px 10px 23px rgba(0, 0, 0, 0.161);"
                ></v-img>
              </div>
              <v-row class="justify-between">
                <v-col cols="9">
                  <v-card-title>Product Designer</v-card-title>
                  <v-card-subtitle>insdrurial, creative, idea</v-card-subtitle>
                </v-col>
                <v-col cols="3" justify="end" align="end">
                  <v-icon color="#623CEA" large class="mt-6 mr-2">open_in_new</v-icon>
                </v-col>
              </v-row>
            </v-card>
          </v-col>
          <v-col class="col-md-3 col-sm-12 mx-4 px-sm-12 py-sm-3" cols="12">
            <v-card elevation="8">
              <div style="padding:10px 10px;">
                <v-img
                  :aspect-ratio=".96"
                  cover
                  src="/images/resume_themes/theme501/image_processing20191208-15422-1m97ypn.png"
                  style="border-radius: 10px;box-shadow: 0px 10px 23px rgba(0, 0, 0, 0.161);"
                ></v-img>
              </div>
              <v-row class="justify-between">
                <v-col cols="9">
                  <v-card-title>Product Designer</v-card-title>
                  <v-card-subtitle>insdrurial, creative, idea</v-card-subtitle>
                </v-col>
                <v-col cols="3" justify="end" align="end">
                  <v-icon color="#623CEA" large class="mt-6 mr-2">open_in_new</v-icon>
                </v-col>
              </v-row>
            </v-card>
          </v-col>
        </v-row>
      </v-tab-item>
      <v-tab-item value="tab-2">
        <v-container class="mt-md-6">
          <v-row>
            <v-col cols="12" md="6">
              <v-timeline align-top dense class="large_dot">
                <v-timeline-item fill-dot color="#0050FD" icon="mdi-package-variant">
                  <p class="title mt-1">Product Designer</p>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div class="subtitle-2">Gps Bangla</div>
                  <div class="subtitle-2">Jan 2017 - Feb 2019</div>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div
                    class="subtitle-2"
                  >Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,</div>
                </v-timeline-item>
              </v-timeline>
              <v-timeline align-top dense class="large_dot">
                <v-timeline-item fill-dot color="#00C1FF" icon="mdi-ruler-square-compass">
                  <p class="title mt-1">Visual Designer</p>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div class="subtitle-2">Gps Bangla</div>
                  <div class="subtitle-2">Jan 2017 - Feb 2019</div>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div
                    class="subtitle-2"
                  >Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,</div>
                </v-timeline-item>
              </v-timeline>
              <v-timeline align-top dense class="large_dot">
                <v-timeline-item fill-dot color="#69C03E" icon="mdi-ruler-square-compass">
                  <p class="title mt-1">Ux Designer</p>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div class="subtitle-2">Gps Bangla</div>
                  <div class="subtitle-2">Jan 2017 - Feb 2019</div>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div
                    class="subtitle-2"
                  >Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,</div>
                </v-timeline-item>
              </v-timeline>
            </v-col>
            <v-col cols="12" md="6">
              <v-timeline align-top dense class="large_dot">
                <v-timeline-item fill-dot color="#00C1FF" icon="mdi-package-variant">
                  <p class="title mt-1">Animation Designer</p>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div class="subtitle-2">Gps Bangla</div>
                  <div class="subtitle-2">Jan 2017 - Feb 2019</div>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div
                    class="subtitle-2"
                  >Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,</div>
                </v-timeline-item>
              </v-timeline>
              <v-timeline align-top dense class="large_dot">
                <v-timeline-item fill-dot color="#69C03E" icon="mdi-ruler-square-compass">
                  <p class="title mt-1">Illustration Designer</p>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div class="subtitle-2">Gps Bangla</div>
                  <div class="subtitle-2">Jan 2017 - Feb 2019</div>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div
                    class="subtitle-2"
                  >Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,</div>
                </v-timeline-item>
              </v-timeline>
              <v-timeline align-top dense class="large_dot">
                <v-timeline-item fill-dot color="#0050FD" icon="mdi-ruler-square-compass">
                  <p class="title mt-1">Ux Designer</p>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div class="subtitle-2">Gps Bangla</div>
                  <div class="subtitle-2">Jan 2017 - Feb 2019</div>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div
                    class="subtitle-2"
                  >Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,</div>
                </v-timeline-item>
              </v-timeline>
            </v-col>
          </v-row>
        </v-container>
      </v-tab-item>
      <v-tab-item value="tab-3">
        <v-container class="mt-md-6">
          <v-row>
            <v-col cols="12" md="6">
              <v-timeline align-top dense class="large_dot">
                <v-timeline-item fill-dot color="#0050FD" icon="mdi-package-variant">
                  <p class="title mt-1">Graphic Arts Institute</p>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div class="subtitle-2">Gps Bangla</div>
                  <div class="subtitle-2">Jan 2017 - Feb 2019</div>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div
                    class="subtitle-2"
                  >Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,</div>
                </v-timeline-item>
              </v-timeline>
              <v-timeline align-top dense class="large_dot">
                <v-timeline-item fill-dot color="#21D5B4" icon="mdi-ruler-square-compass">
                  <p class="title mt-1">Visual Design ltd</p>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div class="subtitle-2">Gps Bangla</div>
                  <div class="subtitle-2">Jan 2017 - Feb 2019</div>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div
                    class="subtitle-2"
                  >Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,</div>
                </v-timeline-item>
              </v-timeline>
              <v-timeline align-top dense class="large_dot">
                <v-timeline-item fill-dot color="#DB2CB7" icon="mdi-ruler-square-compass">
                  <p class="title mt-1">Udemy</p>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div class="subtitle-2">Gps Bangla</div>
                  <div class="subtitle-2">Jan 2017 - Feb 2019</div>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div
                    class="subtitle-2"
                  >Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,</div>
                </v-timeline-item>
              </v-timeline>
            </v-col>
            <v-col cols="12" md="6">
              <v-timeline align-top dense class="large_dot">
                <v-timeline-item fill-dot color="#21D5B4" icon="mdi-package-variant">
                  <p class="title mt-1">Edx Ltd</p>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div class="subtitle-2">Gps Bangla</div>
                  <div class="subtitle-2">Jan 2017 - Feb 2019</div>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div
                    class="subtitle-2"
                  >Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,</div>
                </v-timeline-item>
              </v-timeline>
              <v-timeline align-top dense class="large_dot">
                <v-timeline-item fill-dot color="#DB2CB7" icon="mdi-ruler-square-compass">
                  <p class="title mt-1">Teachable.</p>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div class="subtitle-2">Gps Bangla</div>
                  <div class="subtitle-2">Jan 2017 - Feb 2019</div>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div
                    class="subtitle-2"
                  >Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,</div>
                </v-timeline-item>
              </v-timeline>
              <v-timeline align-top dense class="large_dot">
                <v-timeline-item fill-dot color="#FEA630" icon="mdi-ruler-square-compass">
                  <p class="title mt-1">Learnworlds.</p>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div class="subtitle-2">Gps Bangla</div>
                  <div class="subtitle-2">Jan 2017 - Feb 2019</div>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div
                    class="subtitle-2"
                  >Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,</div>
                </v-timeline-item>
              </v-timeline>
            </v-col>
          </v-row>
        </v-container>
      </v-tab-item>
      <v-tab-item value="tab-4">
        <v-row class="justify-center mt-12 hidden-xs-only">
          <v-col
            class="col-md-7 col-sm-11 elevation-6 py-6"
            style="height:auto;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;"
          >
            <v-row class="justify-center text-center" no-gutters>
              <v-col
                md="3"
                sm="3"
                cols="3"
                v-on:click="activetab=0"
                class="tabs"
                v-bind:class="[ activetab === 0 ? 'active' : '' ]"
              >
                <a class="tabtitle">
                  Programming
                  languages
                </a>
              </v-col>
              <v-col
                md="3"
                sm="3"
                cols="3"
                v-on:click="activetab=1"
                class="tabs"
                v-bind:class="[ activetab === 1 ? 'active' : '' ]"
              >
                <a class="tabtitle">
                  Frameworks/
                  Databases
                </a>
              </v-col>
              <v-col
                md="3"
                sm="3"
                cols="3"
                v-on:click="activetab=2"
                class="tabs"
                v-bind:class="[ activetab === 2 ? 'active' : '' ]"
              >
                <a class="tabtitle">Software</a>
              </v-col>
              <v-col
                md="3"
                sm="3"
                cols="3"
                v-on:click="activetab=3"
                class="tabs"
                v-bind:class="[ activetab === 3 ? 'active' : '' ]"
              >
                <a class="tabtitle">
                  Design
                  Skills
                </a>
              </v-col>
            </v-row>
          </v-col>
        </v-row>
        <v-container>
          <v-row class="justify-center">
            <v-col sm="12" xl="10" lg="12" cols="12">
              <v-row v-if="activetab === 0" class="justify-center">
                <v-col>
                  <div class="title text-left font-weight-bold">
                    Programming
                    languages
                  </div>
                </v-col>

                <v-col class="col-md-12 col-sm-12" lg="12" cols="12">
                  <v-row
                    justify="space-around"
                    justify-lg="space-between"
                    justify-sm="space-between"
                    align="start"
                    dense
                  >
                    <v-col class="col-md-3 col-sm-6" cols="5">
                      <v-row dense class="justify-start backlayer mx-xl-4 mx-lg-2 mx-sm-4">
                        <v-col cols="3" sm="3" md="3">
                          <v-img src="https://i.ibb.co/G3zQ7md/Adobe-Illustrator-CC-icon.png"></v-img>
                        </v-col>
                        <v-col cols="7" sm="7" md="7" class="mb-2" align-self="end">
                          <div class="mini text-left pb-2">Illustrator</div>
                          <v-progress-linear
                            value="90"
                            height="10"
                            background-color="#C5C5C5"
                            color="#23A565"
                          ></v-progress-linear>
                        </v-col>
                        <v-col cols="1" sm="2" md="2" class="mb-1" align-self="end">
                          <span class="text-left subhead">90%</span>
                        </v-col>
                      </v-row>
                    </v-col>
                    <v-col class="col-md-3 col-sm-6" cols="5">
                      <v-row dense class="justify-start backlayer mx-xl-4 mx-lg-2 mx-sm-4">
                        <v-col cols="3" sm="3" md="3">
                          <v-img src="https://i.ibb.co/5LmT1d2/Group-296.png"></v-img>
                        </v-col>
                        <v-col cols="7" sm="7" md="7" class="mb-2" align-self="end">
                          <div class="mini text-left pb-2">Adobe XD</div>
                          <v-progress-linear
                            background-color="#C5C5C5"
                            height="10"
                            value="70"
                            color="#BF3B2C"
                          ></v-progress-linear>
                        </v-col>
                        <v-col cols="1" sm="2" md="2" class="mb-1" align-self="end">
                          <span class="text-center subhead">70%</span>
                        </v-col>
                      </v-row>
                    </v-col>
                    <v-col class="col-md-3 col-sm-6" cols="5">
                      <v-row dense class="justify-start backlayer mx-xl-4 mx-lg-2 mx-sm-4">
                        <v-col cols="3" sm="3" md="3">
                          <v-img src="https://i.ibb.co/XF4kff4/Group-298.png"></v-img>
                        </v-col>
                        <v-col cols="7" sm="7" md="7" class="mb-2" align-self="end">
                          <div class="mini text-left pb-2">Photoshop</div>
                          <v-progress-linear
                            background-color="#C5C5C5"
                            height="10"
                            value="95"
                            color="#109083"
                          ></v-progress-linear>
                        </v-col>
                        <v-col cols="1" sm="2" md="2" class="mb-1" align-self="end">
                          <span class="text-center subhead">95%</span>
                        </v-col>
                      </v-row>
                    </v-col>
                    <v-col class="col-md-3 col-sm-6" cols="5">
                      <v-row dense class="justify-start backlayer mx-xl-4 mx-lg-2 mx-sm-4">
                        <v-col cols="3" sm="3" md="3">
                          <v-img src="https://i.ibb.co/XX03172/Group-300.png"></v-img>
                        </v-col>
                        <v-col cols="7" sm="7" md="7" class="mb-2" align-self="end">
                          <div class="mini text-left pb-2">Premiere Pro</div>
                          <v-progress-linear
                            background-color="#C5C5C5"
                            height="10"
                            value="50"
                            color="#F4B707"
                          ></v-progress-linear>
                        </v-col>
                        <v-col cols="1" sm="2" md="2" class="mb-1" align-self="end">
                          <span class="text-center subhead">50%</span>
                        </v-col>
                      </v-row>
                    </v-col>
                  </v-row>
                </v-col>
              </v-row>
              <v-row v-if="activetab === 1" class="justify-center">
                <v-col>
                  <div class="title text-left font-weight-bold">Frameworks/ Databases</div>
                </v-col>

                <v-col class="col-md-12 col-sm-12" lg="12" cols="12">
                  <v-row
                    justify="space-around"
                    justify-lg="space-between"
                    justify-sm="space-between"
                    align="start"
                    dense
                  >
                    <v-col class="col-md-3 col-sm-6" cols="5">
                      <v-row dense class="justify-start backlayer mx-xl-4 mx-lg-2 mx-sm-4">
                        <v-col cols="3" sm="3" md="3">
                          <v-img src="/images/resume_themes/theme501/html.png"></v-img>
                        </v-col>
                        <v-col cols="7" sm="7" md="7" class="mb-2" align-self="end">
                          <div class="mini text-left pb-2">HTML</div>
                          <v-progress-linear
                            value="90"
                            height="10"
                            background-color="#C5C5C5"
                            color="#E34F26"
                          ></v-progress-linear>
                        </v-col>
                        <v-col cols="1" sm="2" md="2" class="mb-1" align-self="end">
                          <span class="text-center subhead">90%</span>
                        </v-col>
                      </v-row>
                    </v-col>

                    <v-col class="col-md-3 col-sm-6" cols="5">
                      <v-row dense class="justify-start backlayer mx-xl-4 mx-lg-2 mx-sm-4">
                        <v-col cols="3" sm="3" md="3">
                          <v-img src="/images/resume_themes/theme501/css.png"></v-img>
                        </v-col>
                        <v-col cols="7" sm="7" md="7" class="mb-2" align-self="end">
                          <div class="mini text-left pb-2">CSS</div>
                          <v-progress-linear
                            background-color="#C5C5C5"
                            height="10"
                            value="70"
                            color="#264DE4"
                          ></v-progress-linear>
                        </v-col>
                        <v-col cols="1" sm="2" md="2" class="mb-1" align-self="end">
                          <span class="text-center subhead">70%</span>
                        </v-col>
                      </v-row>
                    </v-col>
                    <v-col class="col-md-3 col-sm-6" cols="5">
                      <v-row dense class="justify-start backlayer mx-xl-4 mx-lg-2 mx-sm-4">
                        <v-col cols="3" sm="3" md="3">
                          <v-img src="/images/resume_themes/theme501/js.png"></v-img>
                        </v-col>
                        <v-col cols="7" sm="7" md="7" class="mb-2" align-self="end">
                          <div class="mini text-left pb-2">JavaScript</div>
                          <v-progress-linear
                            background-color="#C5C5C5"
                            height="10"
                            value="95"
                            color="#FDD83C"
                          ></v-progress-linear>
                        </v-col>
                        <v-col cols="1" sm="2" md="2" class="mb-1" align-self="end">
                          <span class="text-center subhead">95%</span>
                        </v-col>
                      </v-row>
                    </v-col>
                    <v-col class="col-md-3 col-sm-6" cols="5">
                      <v-row dense class="justify-start backlayer mx-xl-4 mx-lg-2 mx-sm-4">
                        <v-col cols="3" sm="3" md="3">
                          <v-img src="/images/resume_themes/theme501/magento.png"></v-img>
                        </v-col>
                        <v-col cols="7" sm="7" md="7" class="mb-2" align-self="end">
                          <div class="mini text-left pb-2">Magento</div>
                          <v-progress-linear
                            background-color="#C5C5C5"
                            height="10"
                            value="50"
                            color="#EC6737"
                          ></v-progress-linear>
                        </v-col>
                        <v-col cols="1" sm="2" md="2" class="mb-1" align-self="end">
                          <span class="text-center subhead">50%</span>
                        </v-col>
                      </v-row>
                    </v-col>
                  </v-row>
                </v-col>
              </v-row>
              <v-row v-if="activetab === 2" class="justify-center">
                <v-col>
                  <div class="title text-left font-weight-bold">Software</div>
                </v-col>

                <v-col class="col-md-12 col-sm-12" lg="12" cols="12">
                  <v-row
                    justify="space-around"
                    justify-lg="space-between"
                    justify-sm="space-between"
                    align="start"
                    dense
                  >
                    <v-col class="col-md-3 col-sm-6" cols="5">
                      <v-row dense class="justify-start backlayer mx-xl-4 mx-lg-2 mx-sm-4">
                        <v-col cols="3" sm="3" md="3">
                          <v-img src="/images/resume_themes/theme501/html.png"></v-img>
                        </v-col>
                        <v-col cols="7" sm="7" md="7" class="mb-2" align-self="end">
                          <div class="mini text-left pb-2">HTML</div>
                          <v-progress-linear
                            value="90"
                            height="10"
                            background-color="#C5C5C5"
                            color="#E34F26"
                          ></v-progress-linear>
                        </v-col>
                        <v-col cols="1" sm="2" md="2" class="mb-1" align-self="end">
                          <span class="text-center subhead">90%</span>
                        </v-col>
                      </v-row>
                    </v-col>

                    <v-col class="col-md-3 col-sm-6" cols="5">
                      <v-row dense class="justify-start backlayer mx-xl-4 mx-lg-2 mx-sm-4">
                        <v-col cols="3" sm="3" md="3">
                          <v-img src="/images/resume_themes/theme501/css.png"></v-img>
                        </v-col>
                        <v-col cols="7" sm="7" md="7" class="mb-2" align-self="end">
                          <div class="mini text-left pb-2">CSS</div>
                          <v-progress-linear
                            background-color="#C5C5C5"
                            height="10"
                            value="70"
                            color="#264DE4"
                          ></v-progress-linear>
                        </v-col>
                        <v-col cols="1" sm="2" md="2" class="mb-1" align-self="end">
                          <span class="text-center subhead">70%</span>
                        </v-col>
                      </v-row>
                    </v-col>
                    <v-col class="col-md-3 col-sm-6" cols="5">
                      <v-row dense class="justify-start backlayer mx-xl-4 mx-lg-2 mx-sm-4">
                        <v-col cols="3" sm="3" md="3">
                          <v-img src="/images/resume_themes/theme501/js.png"></v-img>
                        </v-col>
                        <v-col cols="7" sm="7" md="7" class="mb-2" align-self="end">
                          <div class="mini text-left pb-2">JavaScript</div>
                          <v-progress-linear
                            background-color="#C5C5C5"
                            height="10"
                            value="95"
                            color="#FDD83C"
                          ></v-progress-linear>
                        </v-col>
                        <v-col cols="1" sm="2" md="2" class="mb-1" align-self="end">
                          <span class="text-center subhead">95%</span>
                        </v-col>
                      </v-row>
                    </v-col>
                    <v-col class="col-md-3 col-sm-6" cols="5">
                      <v-row dense class="justify-start backlayer mx-xl-4 mx-lg-2 mx-sm-4">
                        <v-col cols="3" sm="3" md="3">
                          <v-img src="/images/resume_themes/theme501/magento.png"></v-img>
                        </v-col>
                        <v-col cols="7" sm="7" md="7" class="mb-2" align-self="end">
                          <div class="mini text-left pb-2">Magento</div>
                          <v-progress-linear
                            background-color="#C5C5C5"
                            height="10"
                            value="50"
                            color="#EC6737"
                          ></v-progress-linear>
                        </v-col>
                        <v-col cols="1" sm="2" md="2" class="mb-1" align-self="end">
                          <span class="text-center subhead">50%</span>
                        </v-col>
                      </v-row>
                    </v-col>
                  </v-row>
                </v-col>
              </v-row>
              <v-row v-if="activetab === 3" class="justify-center">
                <v-col>
                  <div class="title text-left font-weight-bold">Design Skills</div>
                </v-col>

                <v-col class="col-md-12 col-sm-12" lg="12" cols="12">
                  <v-row
                    justify="space-around"
                    justify-lg="space-between"
                    justify-sm="space-between"
                    align="start"
                    dense
                  >
                    <v-col class="col-md-3 col-sm-6" cols="5">
                      <v-row dense class="justify-start backlayer mx-xl-4 mx-lg-2 mx-sm-4">
                        <v-col cols="3" sm="3" md="3">
                          <v-img src="/images/resume_themes/theme501/html.png"></v-img>
                        </v-col>
                        <v-col cols="7" sm="7" md="7" class="mb-2" align-self="end">
                          <div class="mini text-left pb-2">HTML</div>
                          <v-progress-linear
                            value="90"
                            height="10"
                            background-color="#C5C5C5"
                            color="#E34F26"
                          ></v-progress-linear>
                        </v-col>
                        <v-col cols="1" sm="2" md="2" class="mb-1" align-self="end">
                          <span class="text-center subhead">90%</span>
                        </v-col>
                      </v-row>
                    </v-col>

                    <v-col class="col-md-3 col-sm-6" cols="5">
                      <v-row dense class="justify-start backlayer mx-xl-4 mx-lg-2 mx-sm-4">
                        <v-col cols="3" sm="3" md="3">
                          <v-img src="/images/resume_themes/theme501/css.png"></v-img>
                        </v-col>
                        <v-col cols="7" sm="7" md="7" class="mb-2" align-self="end">
                          <div class="mini text-left pb-2">CSS</div>
                          <v-progress-linear
                            background-color="#C5C5C5"
                            height="10"
                            value="70"
                            color="#264DE4"
                          ></v-progress-linear>
                        </v-col>
                        <v-col cols="1" sm="2" md="2" class="mb-1" align-self="end">
                          <span class="text-center subhead">70%</span>
                        </v-col>
                      </v-row>
                    </v-col>
                    <v-col class="col-md-3 col-sm-6" cols="5">
                      <v-row dense class="justify-start backlayer mx-xl-4 mx-lg-2 mx-sm-4">
                        <v-col cols="3" sm="3" md="3">
                          <v-img src="/images/resume_themes/theme501/js.png"></v-img>
                        </v-col>
                        <v-col cols="7" sm="7" md="7" class="mb-2" align-self="end">
                          <div class="mini text-left pb-2">JavaScript</div>
                          <v-progress-linear
                            background-color="#C5C5C5"
                            height="10"
                            value="95"
                            color="#FDD83C"
                          ></v-progress-linear>
                        </v-col>
                        <v-col cols="1" sm="2" md="2" class="mb-1" align-self="end">
                          <span class="text-center subhead">95%</span>
                        </v-col>
                      </v-row>
                    </v-col>
                    <v-col class="col-md-3 col-sm-6" cols="5">
                      <v-row dense class="justify-start backlayer mx-xl-4 mx-lg-2 mx-sm-4">
                        <v-col cols="3" sm="3" md="3">
                          <v-img src="/images/resume_themes/theme501/magento.png"></v-img>
                        </v-col>
                        <v-col cols="7" sm="7" md="7" class="mb-2" align-self="end">
                          <div class="mini text-left pb-2">Magento</div>
                          <v-progress-linear
                            background-color="#C5C5C5"
                            height="10"
                            value="50"
                            color="#EC6737"
                          ></v-progress-linear>
                        </v-col>
                        <v-col cols="1" sm="2" md="2" class="mb-1" align-self="end">
                          <span class="text-center subhead">50%</span>
                        </v-col>
                      </v-row>
                    </v-col>
                  </v-row>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-container>
      </v-tab-item>
      <v-tab-item value="tab-5">
        <v-row justify="center" class="mt-xl-6 mt-lg-10">
          <v-col cols="11" class="hidden-sm-and-up mt-12">
            <v-img src="/images/resume_themes/theme501/about.png" class="box-layer" contain></v-img>
          </v-col>
          <v-col md="6" sm="6" cols="11" class="mt-12">
            <div>Hello, I'm</div>
            <div class="display-2 mt-md-6 mt-sm-6">Mickel David</div>
            <div class="display-2 mt-md-2 mt-sm-2">
              a
              <span style="color:#623CEA;">UI & UX</span>
              Designer
            </div>
            <div class="display-2 mt-md-12 mt-sm-8">About me.</div>
            <v-row dense class="mt-md-12 mt-sm-8">
              <v-col cols="1">
                <div class="line"></div>
              </v-col>
              <v-col cols="10" sm="11" lg="9">
                <div
                  class="title"
                  style="color:#656565;"
                >I have a great passion on designing and always love to create a new design. Thus now I am highly skilled, enthusiastic, self- motivated UI & UX Designer able to do any kinds of designing on upwork. Not only that I have worked for other company but I myself have also a website based on web programming and web developing of my own.</div>
                <div class="mt-md-8 mt-sm-8 mt-6">
                  <v-btn dark class="px-0" min-width="30" height="30" color="#414143">
                    <v-icon dark small color="white">mdi-behance</v-icon>
                  </v-btn>
                  <v-btn dark class="px-0 mx-1" min-width="30" height="30" color="#414143">
                    <v-icon dark small color="white">mdi-dribbble</v-icon>
                  </v-btn>
                  <v-btn dark class="px-0 mx-1" min-width="30" height="30" color="#414143">
                    <v-icon dark small color="white">mdi-instagram</v-icon>
                  </v-btn>
                  <v-btn dark class="px-0 mx-1" min-width="30" height="30" color="#414143">
                    <v-icon dark small color="white">mdi-google-plus</v-icon>
                  </v-btn>
                </div>
              </v-col>
            </v-row>
          </v-col>
          <v-col md="2" sm="4" class="hidden-sm-and-down mt-12">
            <v-img src="/images/resume_themes/theme501/about.png" class="box-layer" contain></v-img>
          </v-col>
        </v-row>
      </v-tab-item>
      <v-tab-item value="tab-6"></v-tab-item>
    </v-tabs-items>
  </v-app>
</template>

<style lang="scss" scoped>
@import "https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css";
@import "https://fonts.googleapis.com/css?family=Material+Icons";
@import "resources/sass/themes/theme501.scss";
#resumeTheme501
  .v-slide-group__prev
  .v-slide-group__prev
  .v-slide-group__prev--disabled {
  display: none;
}
.v-tabs-bar.v-slide-group--is-overflowing.v-tabs-bar--is-mobile:not(.v-tabs-bar--show-arrows):not(.v-slide-group--has-affixes)
  .v-slide-group__prev {
  display: none !important;
  visibility: hidden;
}
.v-tabs-bar.v-slide-group--is-overflowing.v-tabs-bar--is-mobile:not(.v-tabs-bar--show-arrows):not(.v-slide-group--has-affixes)
  .v-slide-group__prev {
  display: none !important;
  visibility: hidden;
}

#resumeTheme501 .v-slide-group__next {
  display: none;
}
</style>
   
   <script>
export default {
  props: ["user", "is_preview"],
  data() {
    return {
      currentTab: null,
      activetab: 1,
      tab: "#tab-1",
      text: [
        "",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
        "asdasdasdasd"
      ],
      tabs: [
        {
          link: "#tab-1",
          name: "Portfolio",
          icon: "mdi-layers"
        },
        {
          link: "#tab-2",
          name: "Work",
          icon: "mdi-briefcase"
        },
        {
          link: "#tab-3",
          name: "Education",
          icon: "mdi-school"
        },
        {
          link: "#tab-4",
          name: "Skills",
          icon: "mdi-head-snowflake-outline"
        },
        {
          link: "#tab-5",
          name: "About Me",
          icon: "mdi-comment-edit"
        },
        {
          link: "#tab-6",
          name: "Achievement",
          icon: "mdi-trophy"
        }
      ]
    };
  }
};
</script>



