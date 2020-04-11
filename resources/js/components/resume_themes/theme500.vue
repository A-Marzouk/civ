<template>
  <v-app>
    <v-card flat tile color="#3361D0">
      <v-row class="justify-center">
        <v-col class="col-md-6 col-sm-12" cols="12">
          <v-row class="justify-center" no-gutters>
            <v-col class="col-md-3 col-sm-6" cols="5">
              <v-avatar class="profile" size="164">
                <v-img src="https://i.ibb.co/rMYWhw2/man-crossed-arms-1516680-2x-1.png"></v-img>
                <v-btn color="#23A565" absolute dark small style="bottom: 22px;">TAP TO CHAT</v-btn>
              </v-avatar>
            </v-col>
            <v-col class="col-md-6 col-sm-6 pt-6 pl-1" cols="5">
              <p
                class="pl-1 head font-weight-bold text-left"
                style="color: whitesmoke;"
              >Olivia Emily</p>
              <p class="pl-1 subhead text-left" style="color: whitesmoke;">UI/UX Designer</p>

              <v-btn dark min-width="36" height="36" class="px-0" color="#217BFF">
                <v-icon small dark color="white">mdi-behance</v-icon>
              </v-btn>

              <v-btn dark color="#EE588A" min-width="36" height="36" class="px-0">
                <v-icon small dark color="white">mdi-dribbble</v-icon>
              </v-btn>
              <v-btn dark color="#DD24BC" min-width="36" height="36" class="px-0">
                <v-icon small dark color="white">mdi-instagram</v-icon>
              </v-btn>
            </v-col>
            <v-col class="hidden-sm-and-up pt-12 mt-6" cols="2">
              <v-btn class="ma-2" outlined color="white" x-small>
                <v-icon small>mdi-volume-high</v-icon>
              </v-btn>
              <v-btn class="ma-2" outlined color="white" x-small>
                <v-icon small lft>mdi-video</v-icon>
              </v-btn>
            </v-col>
          </v-row>
        </v-col>
        <v-col class="col-md-6 col-sm-12" cols="12">
          <v-row no-gutters class="justify-end align-center pr-lg-12">
            <v-col lg="12" class="col-md-8 col-sm-8 hidden-sm-and-down text-right pr-lg-2">
              <div
                class="subhead text-right mt-4 mr-4 d-inline-block"
                style="color: whitesmoke;"
              >Your Interviews :</div>
              <v-btn class="ma-2" outlined color="white" left>
                Audio & Text
                <v-icon right>mdi-volume-high</v-icon>
              </v-btn>
              <v-btn outlined color="white" left>
                Upload Video
                <v-icon right>ondemand_video</v-icon>
              </v-btn>
            </v-col>
            <v-col lg="9" class="col-md-10 col-sm-12 mt-8 marginr" cols="11">
              <v-row
                style="background: rgb(37, 29, 68,0.20);border-radius: 10px;"
                class="align-center px-3 py-2"
                no-gutters
              >
                <v-col cols="4" md="4" sm="4" lg="3">
                  <div class="title text-left" style="color: whitesmoke;">15$</div>
                  <div class="caption text-left" style="color: #FFFFFF;opacity: 0.82">
                    Hourly
                    rate
                  </div>
                </v-col>
                <v-col cols="1" align="center" class="mx-xl-n6">
                  <div style="width:1px;height:2rem;background-color:#D7D7D7;"></div>
                </v-col>
                <v-col cols="5" md="4" sm="4" lg="3">
                  <div class="title text-left pl-3" style="color: whitesmoke;">40 hours</div>
                  <div class="caption text-left pl-3" style="color: #FFFFFF;opacity: 0.82">
                    Weekly
                    Availability
                  </div>
                </v-col>

                <v-col cols="3" md="4" sm="4" lg="4" class="text-center">
                  <v-btn dark color="#23A565" large width="100%" class="ma-auto">
                    <div class="mini">Hire Me</div>
                  </v-btn>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
      <v-row no-gutters class="justify-center align-center mt-10">
        <v-col class="col-md-8 col-sm-12">
          <v-tabs
            v-model="tab"
            background-color="rgb(255, 255, 255,0.0)"
            dark
            class="theme500"
            show-arrows
          >
            <v-tabs-slider></v-tabs-slider>

            <v-tab href="#tab-1">
              <v-icon left>mdi-image-outline</v-icon>Portfolio
            </v-tab>

            <v-tab href="#tab-2">
              <v-icon left>mdi-briefcase</v-icon>Work
            </v-tab>

            <v-tab href="#tab-3">
              <v-icon left>mdi-school-outline</v-icon>Education
            </v-tab>
            <v-tab href="#tab-4">
              <v-icon left>mdi-chat-processing</v-icon>Reviews
            </v-tab>
          </v-tabs>
        </v-col>
      </v-row>
      <v-row
        class="justify-center align-center tabrow"
        no-gutters
        style="background-color: #F0F3F1;"
      >
        <v-col class="col-md-5 col-sm-12" cols="12">
          <v-row class="justify-center text-center" no-gutters>
            <v-col
              md="3"
              sm="3"
              cols="3"
              v-on:click="activetab=1"
              class="tabs"
              v-bind:class="[ activetab === 1 ? 'active' : '' ]"
            >
              <a class="tabtitle">
                <v-icon class="d-block" color="#23A565">mdi-monitor-screenshot</v-icon>Programming
                languages
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
              <a class="tabtitle">
                <v-icon class="d-block" color="#23A565">mdi-ruler-square-compass</v-icon>Frameworks/
                Databases
              </a>
            </v-col>
            <v-col
              md="3"
              sm="3"
              cols="3"
              v-on:click="activetab=4"
              class="tabs"
              v-bind:class="[ activetab === 4 ? 'active' : '' ]"
            >
              <a class="tabtitle">
                <v-icon class="d-block" color="#23A565">mdi-disc-player</v-icon>Software
              </a>
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
                <v-icon class="d-block" color="#23A565">mdi-material-design</v-icon>Design
                Skills
              </a>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </v-card>

    <v-container>
      <v-row v-if="activetab === 1" class="justify-center">
        <v-col class="col-md-10 col-sm-12">
          <v-row class="justify-center">
            <v-col class="col-md-3 col-sm-6" cols="3">
              <v-row class="justify-end">
                <v-col cols="12" sm="3" md="3">
                  <v-img src="https://i.ibb.co/G3zQ7md/Adobe-Illustrator-CC-icon.png"></v-img>
                </v-col>
                <v-col sm="7" md="7" class="hidden-xs-only">
                  <div class="mini text-left">Illustrator</div>
                  <v-progress-linear rounded value="90" color="#23A565"></v-progress-linear>
                </v-col>
                <v-col sm="2" md="2" class="hidden-xs-only mt-1 pr-2">
                  <span class="text-center subtitle-2">90%</span>
                </v-col>
              </v-row>
            </v-col>

            <v-col class="col-md-3 col-sm-6" cols="3">
              <v-row class="justify-end">
                <v-col cols="12" sm="3" md="3">
                  <v-img src="https://i.ibb.co/5LmT1d2/Group-296.png"></v-img>
                </v-col>
                <v-col sm="7" md="7" class="hidden-xs-only">
                  <div class="mini text-left">Adobe XD</div>
                  <v-progress-linear rounded value="70" color="#BF3B2C"></v-progress-linear>
                </v-col>
                <v-col sm="2" md="2" class="hidden-xs-only mt-1 pr-2">
                  <span class="text-center subtitle-2">70%</span>
                </v-col>
              </v-row>
            </v-col>
            <v-col class="col-md-3 col-sm-6" cols="3">
              <v-row class="justify-end">
                <v-col cols="12" sm="3" md="3">
                  <v-img src="https://i.ibb.co/XF4kff4/Group-298.png"></v-img>
                </v-col>
                <v-col sm="7" md="7" class="hidden-xs-only">
                  <div class="mini text-left">Photoshop</div>
                  <v-progress-linear rounded value="95" color="#109083"></v-progress-linear>
                </v-col>
                <v-col sm="2" md="2" class="hidden-xs-only mt-1 pr-2">
                  <span class="text-center subtitle-2">95%</span>
                </v-col>
              </v-row>
            </v-col>
            <v-col class="col-md-3 col-sm-6" cols="3">
              <v-row class="justify-end">
                <v-col cols="12" sm="3" md="3">
                  <v-img src="https://i.ibb.co/XX03172/Group-300.png"></v-img>
                </v-col>
                <v-col sm="7" md="7" class="hidden-xs-only">
                  <div class="mini text-left">Premiere Pro</div>
                  <v-progress-linear rounded value="50" color="#F4B707"></v-progress-linear>
                </v-col>
                <v-col sm="2" md="2" class="hidden-xs-only mt-1 pr-2">
                  <span class="text-center subtitle-2">50%</span>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
      <v-row v-if="activetab === 2" class="justify-center">
        <v-col class="col-md-6 col-sm-12">
          <v-row class="justify-center">
            <v-col class="col-md-4 col-sm-6" cols="3">
              <v-row class="justify-end">
                <v-col cols="12" sm="3" md="3">
                  <v-img src="https://i.ibb.co/XX03172/Group-300.png"></v-img>
                </v-col>
                <v-col sm="6" md="6" class="hidden-xs-only">
                  <div class="mini text-left">Premiere Pro</div>
                  <v-progress-linear rounded value="50" color="#F4B707"></v-progress-linear>
                </v-col>
                <v-col sm="2" md="2" class="hidden-xs-only mt-3 pr-2">
                  <span class="text-center subtitle-2">50%</span>
                </v-col>
              </v-row>
            </v-col>

            <v-col class="col-md-4 col-sm-6" cols="3">
              <v-row class="justify-end">
                <v-col cols="12" sm="3" md="3">
                  <v-img src="https://i.ibb.co/XX03172/Group-300.png"></v-img>
                </v-col>
                <v-col sm="6" md="6" class="hidden-xs-only">
                  <div class="mini text-left">Premiere Pro</div>
                  <v-progress-linear rounded value="50" color="#F4B707"></v-progress-linear>
                </v-col>
                <v-col sm="2" md="2" class="hidden-xs-only mt-3 pr-2">
                  <span class="text-center subtitle-2">50%</span>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
      <v-row v-if="activetab === 3" class="justify-center">
        <v-col class="col-md-6 col-sm-12">
          <v-row class="justify-center">
            <v-col class="col-md-4 col-sm-6" cols="3">
              <v-row class="justify-end">
                <v-col cols="12" sm="3" md="3">
                  <v-img src="https://i.ibb.co/XF4kff4/Group-298.png"></v-img>
                </v-col>
                <v-col sm="6" md="6" class="hidden-xs-only">
                  <div class="mini text-left">Photoshop</div>
                  <v-progress-linear rounded value="95" color="#109083"></v-progress-linear>
                </v-col>
                <v-col sm="2" md="2" class="hidden-xs-only mt-3 pr-2">
                  <span class="text-center subtitle-2">95%</span>
                </v-col>
              </v-row>
            </v-col>
            <v-col class="col-md-4 col-sm-6" cols="3">
              <v-row class="justify-end">
                <v-col cols="12" sm="3" md="3">
                  <v-img src="https://i.ibb.co/XX03172/Group-300.png"></v-img>
                </v-col>
                <v-col sm="6" md="6" class="hidden-xs-only">
                  <div class="mini text-left">Premiere Pro</div>
                  <v-progress-linear rounded value="50" color="#F4B707"></v-progress-linear>
                </v-col>
                <v-col sm="2" md="2" class="hidden-xs-only mt-3 pr-2">
                  <span class="text-center subtitle-2">50%</span>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
      <v-row v-if="activetab === 4" class="justify-center">
        <v-col class="col-md-6 col-sm-12">
          <v-row class="justify-center">
            <v-col class="col-md-4 col-sm-6" cols="3">
              <v-row class="justify-end">
                <v-col cols="12" sm="3" md="3">
                  <v-img src="https://i.ibb.co/G3zQ7md/Adobe-Illustrator-CC-icon.png"></v-img>
                </v-col>
                <v-col sm="6" md="6" class="hidden-xs-only">
                  <div class="mini text-left">Illustrator</div>
                  <v-progress-linear rounded value="90" color="#23A565"></v-progress-linear>
                </v-col>
                <v-col sm="2" md="2" class="hidden-xs-only mt-3 pr-2">
                  <span class="text-center subtitle-2">90%</span>
                </v-col>
              </v-row>
            </v-col>

            <v-col class="col-md-4 col-sm-6" cols="3">
              <v-row class="justify-end">
                <v-col cols="12" sm="3" md="3">
                  <v-img src="https://i.ibb.co/5LmT1d2/Group-296.png"></v-img>
                </v-col>
                <v-col sm="6" md="6" class="hidden-xs-only">
                  <div class="mini text-left">Adobe XD</div>
                  <v-progress-linear rounded value="70" color="#BF3B2C"></v-progress-linear>
                </v-col>
                <v-col sm="2" md="2" class="hidden-xs-only mt-3 pr-2">
                  <span class="text-center subtitle-2">70%</span>
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
            <v-col class="col-md-8 col-sm-12" cols="12">
              <v-row class="justify-center">
                <v-col class="col-md-4 col-sm-12 pa-sm-10" cols="12">
                  <v-img
                    src="https://i.ibb.co/Dg4Tn3X/art-ios-app-concept-2x.png"
                    style="border-radius: 10px;box-shadow: 0px 10px 23px rgba(0, 0, 0, 0.161);"
                  ></v-img>
                </v-col>
                <v-col class="col-md-4 col-sm-12 pa-sm-10" cols="12">
                  <v-img
                    src="https://i.ibb.co/DMNZ73L/capcon-preview.png"
                    style="border-radius: 10px;box-shadow: 0px 10px 23px rgba(0, 0, 0, 0.161);"
                  ></v-img>
                </v-col>
                <v-col class="col-md-4 col-sm-12 pa-sm-10" cols="12">
                  <v-img
                    src="https://i.ibb.co/1d6Cv5R/xavier-designer-profiles-part-4.png"
                    style="border-radius: 10px;box-shadow: 0px 10px 23px rgba(0, 0, 0, 0.161);"
                  ></v-img>
                </v-col>
                <v-col class="col-md-4 col-sm-12 pa-sm-10" cols="12">
                  <v-img
                    src="https://i.ibb.co/KhW3mcH/fargostudio-by-ben-schade.png"
                    style="border-radius: 10px;box-shadow: 0px 10px 23px rgba(0, 0, 0, 0.161);"
                  ></v-img>
                </v-col>
                <v-col class="col-md-4 col-sm-12 pa-sm-10" cols="12">
                  <v-img
                    src="https://i.ibb.co/r3Kk2vJ/image-processing20191024-3744-10lw17z.png"
                    style="border-radius: 10px;box-shadow: 0px 10px 23px rgba(0, 0, 0, 0.161);"
                  ></v-img>
                </v-col>
                <v-col class="col-md-4 col-sm-12 pa-sm-10" cols="12">
                  <v-img
                    src="https://i.ibb.co/JF9gSdT/image-processing20191201-6286-1wvmanh.jpg"
                    style="border-radius: 10px;box-shadow: 0px 10px 23px rgba(0, 0, 0, 0.161);"
                  ></v-img>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-container>
      </v-tab-item>
      <v-tab-item value="tab-2">
        <v-container>
          <v-row style="overflow: scroll;">
            <v-col cols="12">
              <p class="display-2" style="color: #3C3748;">Work</p>
              <div class="mainPoint"></div>
              <div class="lilPoint"></div>
            </v-col>
            <v-col cols="12">
              <v-timeline align-top dense class="large_dot">
                <v-timeline-item
                  fill-dot
                  large
                  color="#23A565"
                  icon-color="white"
                  icon="mdi-package-variant"
                >
                  <p class="title mt-3">Product Designer</p>
                </v-timeline-item>
                <v-timeline-item right hide-dot color="#3C3748" small>
                  <div class="subtitle-2">Gps Bangla</div>
                  <div class="subtitle-2">Jan 2017 - Feb 2019</div>
                </v-timeline-item>
                <v-timeline-item right hide-dot color="#3C3748" small>
                  <div class="subtitle-2">
                    Lorem ipsum dolor sit amet, consetetur
                    sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
                    magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                    dolores
                    et ea rebum.
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
                  color="#23A565"
                  icon-color="white"
                  icon="mdi-ruler-square-compass"
                >
                  <p class="title mt-3">Visual Designer</p>
                </v-timeline-item>
                <v-timeline-item right hide-dot color="#3C3748" small>
                  <div class="subtitle-2">Gps Bangla</div>
                  <div class="subtitle-2">Jan 2017 - Feb 2019</div>
                </v-timeline-item>
                <v-timeline-item right hide-dot color="#3C3748" small>
                  <div class="subtitle-2">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                    eirmod
                    tempor invidunt ut
                    labore et dolore
                    magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                    dolores
                    et ea rebum.
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
              <p class="display-2" style="color: #3C3748;">Education</p>
              <div class="mainPoint"></div>
              <div class="lilPoint"></div>
            </v-col>
            <v-col cols="12">
              <v-timeline align-top dense class="large_dot">
                <v-timeline-item
                  fill-dot
                  large
                  color="#23A565"
                  icon-color="white"
                  icon="mdi-package-variant"
                >
                  <p class="title mt-3">Graphic Arts Institute</p>
                </v-timeline-item>
                <v-timeline-item right hide-dot color="#3C3748" small>
                  <div class="subtitle-2">2011 - 2016</div>
                  <div class="subtitle-2">Graphic Design</div>
                </v-timeline-item>
                <v-timeline-item right hide-dot color="#3C3748" small>
                  <div class="subtitle-2">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                    eirmod
                    tempor invidunt ut
                    labore et dolore
                    magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                    dolores
                    et ea rebum.
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
                  color="#23A565"
                  icon-color="white"
                  icon="mdi-ruler-square-compass"
                >
                  <p class="title mt-3">Shanta Morioum</p>
                </v-timeline-item>
                <v-timeline-item right color="#3C3748" hide-dot>
                  <div class="subtitle-2">2016 - 2019</div>
                  <div class="subtitle-2">Visual Design</div>
                </v-timeline-item>
                <v-timeline-item right color="#3C3748" hide-dot>
                  <div class="subtitle-2">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                    eirmod
                    tempor invidunt ut
                    labore et dolore
                    magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                    dolores
                    et ea rebum.
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
        <v-container>
          <v-row style="overflow-y: scroll;">
            <v-col cols="12">
              <p class="display-2" style="color: #3C3748;">Reviews</p>
              <div class="mainPoint"></div>
              <div class="lilPoint"></div>
            </v-col>
            <v-col cols="12">
              <v-timeline align-top dense class="large_dot">
                <v-timeline-item
                  fill-dot
                  large
                  color="#23A565"
                  icon-color="white"
                  icon="mdi-package-variant"
                >
                  <p class="title mt-3">Graphic Arts Institute</p>
                </v-timeline-item>
                <v-timeline-item right hide-dot color="#3C3748" small>
                  <div class="subtitle-2">2011 - 2016</div>
                  <div class="subtitle-2">Graphic Design</div>
                </v-timeline-item>
                <v-timeline-item right hide-dot color="#3C3748" small>
                  <div class="subtitle-2">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                    eirmod
                    tempor invidunt ut
                    labore et dolore
                    magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                    dolores
                    et ea rebum.
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
                  color="#23A565"
                  icon-color="white"
                  icon="mdi-ruler-square-compass"
                >
                  <p class="title mt-3">Shanta Morioum</p>
                </v-timeline-item>
                <v-timeline-item right hide-dot color="#3C3748" small>
                  <div class="subtitle-2">2016 - 2019</div>
                  <div class="subtitle-2">Visual Design</div>
                </v-timeline-item>
                <v-timeline-item right hide-dot color="#3C3748" small>
                  <div class="subtitle-2">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                    eirmod
                    tempor invidunt ut
                    labore et dolore
                    magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                    dolores
                    et ea rebum.
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
@import "resources/sass/themes/theme500.scss";
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



