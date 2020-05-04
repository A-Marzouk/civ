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
                class="ma-2 elevation-0"
                color="#00A3FF"
                left
                style="color:#00A3FF;background-color:#E7F6FF;font-size:14px;"
              >
                <v-icon left color="#00A3FF">mdi-volume-high</v-icon>Upload Audio
              </v-btn>
              <v-btn
                class="ma-2 elevation-0"
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

            <v-tab href="#tab-1">Portfolio</v-tab>

            <v-tab href="#tab-2">Work</v-tab>

            <v-tab href="#tab-3">Education</v-tab>

            <v-tab href="#tab-4">Education</v-tab>
          </v-tabs>
        </v-col>
      </v-row>
    </v-card>

    <v-tabs-items v-model="tab">
      <v-tab-item value="tab-1">
        <v-container>
          <v-row class="justify-center" no-gutters>
            <v-col lg="10" sm="11" cols="11">
              <v-row no-gutters justify="center">
                <v-col class="col-lg-4 col-sm-6 pa-lg-8">
                  <v-card elevation="8">
                    <div style="padding:10px 10px;">
                      <v-img
                        src="https://i.ibb.co/hCSX2Q1/Mask-Group-4.png"
                        style="border-radius: 10px;box-shadow: 0px 10px 23px rgba(0, 0, 0, 0.161);"
                      ></v-img>
                    </div>
                  </v-card>
                </v-col>
                <v-col class="col-lg-4 col-sm-6 pa-lg-8">
                  <v-card elevation="8">
                    <div style="padding:10px 10px;">
                      <v-img
                        src="https://i.ibb.co/tZ0H6j2/Mask-Group-8.png"
                        style="border-radius: 10px;box-shadow: 0px 10px 23px rgba(0, 0, 0, 0.161);"
                      ></v-img>
                    </div>
                  </v-card>
                </v-col>
                <v-col class="col-lg-4 col-sm-6 pa-lg-8">
                  <v-card elevation="8">
                    <div style="padding:10px 10px;">
                      <v-img
                        src="https://i.ibb.co/1KSwfzs/Mask-Group-7.png"
                        style="border-radius: 10px;box-shadow: 0px 10px 23px rgba(0, 0, 0, 0.161);"
                      ></v-img>
                    </div>
                  </v-card>
                </v-col>
                <v-col class="col-lg-4 col-sm-6 pa-lg-8">
                  <v-card elevation="8">
                    <div style="padding:10px 10px;">
                      <v-img
                        src="https://i.ibb.co/H7jNspq/Mask-Group-5.png"
                        style="border-radius: 10px;box-shadow: 0px 10px 23px rgba(0, 0, 0, 0.161);"
                      ></v-img>
                    </div>
                  </v-card>
                </v-col>
                <v-col class="col-lg-4 col-sm-6 pa-lg-8">
                  <v-card elevation="8">
                    <div style="padding:10px 10px;">
                      <v-img
                        src="https://i.ibb.co/1KSwfzs/Mask-Group-7.png"
                        style="border-radius: 10px;box-shadow: 0px 10px 23px rgba(0, 0, 0, 0.161);"
                      ></v-img>
                    </div>
                  </v-card>
                </v-col>
                <v-col class="col-lg-4 col-sm-6 pa-lg-8">
                  <v-card elevation="8">
                    <div style="padding:10px 10px;">
                      <v-img
                        src="https://i.ibb.co/H7jNspq/Mask-Group-5.png"
                        style="border-radius: 10px;box-shadow: 0px 10px 23px rgba(0, 0, 0, 0.161);"
                      ></v-img>
                    </div>
                  </v-card>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-container>
      </v-tab-item>
      <v-tab-item value="tab-2">
        <v-container>
          <v-row style="overflow: scroll;">
            <!-- <v-col cols="12">
                  <p class="display-2 " style="color: #623CEA;">Work</p>
                  <div class="mainPoint"></div>
                  <div class="lilPoint"></div>
            </v-col>-->
            <v-col cols="12">
              <v-timeline dense>
                <v-timeline-item color="white">
                  <template v-slot:icon>
                    <span style="font-size:50px;font-weight: 700;color: #01A2FE;opacity: 0.3;">01</span>
                  </template>
                </v-timeline-item>

                <v-timeline-item right hide-dot>
                  <div class="title">Senior UI/UX Designer</div>
                  <div class="subtitle-2" style="color:#01A2FE;">
                    BIG BANG DESIGN
                    <span
                      class="caption font-italic"
                      style="color:#A4A6AE;"
                    >/ May 2018 - Present</span>
                  </div>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div
                    class="subtitle-2"
                  >Partners with clients, ranging from small businesses to Fortune 500 companies, to create cutting-edge digital marketing designs targeting the American market. Forms a creative vision and clearly conveys ideas using both visual and verbal communication. Collaborates with a creative team consisting of web developers, content creators, and digital designers, to create engaging digital collateral. Creates the end-to-end design for responsive websites using a mobile-first approach.</div>
                </v-timeline-item>
              </v-timeline>

              <v-timeline dense>
                <v-timeline-item color="white">
                  <template v-slot:icon>
                    <span style="font-size:50px;font-weight: 700;color: #01A2FE;opacity: 0.3;">02</span>
                  </template>
                </v-timeline-item>

                <v-timeline-item right hide-dot>
                  <div class="title">Junior UI/UX Designer</div>
                  <div class="subtitle-2" style="color:#01A2FE;">
                    Western Ltd.
                    <span
                      class="caption font-italic"
                      style="color:#A4A6AE;"
                    >/ July 2017 - May 2018</span>
                  </div>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div
                    class="subtitle-2"
                  >Conducted in-depth market research to construct creative design solutions for a variety of clients in the pharma industry. Utilized Adobe Creative Suite to draft print and digital collateral, including packaging, flyers, logos, and business cards. Managed relationships with vendors in print, web development, and copywriting, to bring design ideas to fruition Utilized expertise in UI/UX to create user-focused design concepts that quickly produce a ROI.</div>
                </v-timeline-item>
              </v-timeline>
            </v-col>
          </v-row>
        </v-container>
      </v-tab-item>
      <v-tab-item value="tab-3">
        <v-container>
          <v-row style="overflow: scroll;">
            <!-- <v-col cols="12">
                      <p class="display-2 " style="color: #623CEA;">Work</p>
                      <div class="mainPoint"></div>
                      <div class="lilPoint"></div>
            </v-col>-->
            <v-col cols="12">
              <v-timeline dense>
                <v-timeline-item color="white">
                  <template v-slot:icon>
                    <span style="font-size:50px;font-weight: 700;color: #01A2FE;opacity: 0.3;">01</span>
                  </template>
                </v-timeline-item>

                <v-timeline-item right hide-dot>
                  <div class="title">Udemy</div>
                  <div class="subtitle-2" style="color:#01A2FE;">
                    UI/UX DESIGN COURSE
                    <span
                      class="caption font-italic"
                      style="color:#A4A6AE;"
                    >/ September 2015 - December 2015</span>
                  </div>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div
                    class="subtitle-2"
                  >Partners with clients, ranging from small businesses to Fortune 500 companies, to create cutting-edge digital marketing designs targeting the American market. Forms a creative vision and clearly conveys ideas using both visual and verbal communication. Collaborates with a creative team consisting of web developers, content creators, and digital designers, to create engaging digital collateral. Creates the end-to-end design for responsive websites using a mobile-first approach.</div>
                </v-timeline-item>
              </v-timeline>

              <v-timeline dense>
                <v-timeline-item color="white">
                  <template v-slot:icon>
                    <span style="font-size:50px;font-weight: 700;color: #01A2FE;opacity: 0.3;">02</span>
                  </template>
                </v-timeline-item>

                <v-timeline-item right hide-dot>
                  <div class="title">Oxford University</div>
                  <div class="subtitle-2" style="color:#01A2FE;">
                    COMPUTER SCIENCE & TECHNOLOGY
                    <span
                      class="caption font-italic"
                      style="color:#A4A6AE;"
                    >/ September 2011 - July 2015</span>
                  </div>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div
                    class="subtitle-2"
                  >Conducted in-depth market research to construct creative design solutions for a variety of clients in the pharma industry. Utilized Adobe Creative Suite to draft print and digital collateral, including packaging, flyers, logos, and business cards. Managed relationships with vendors in print, web development, and copywriting, to bring design ideas to fruition Utilized expertise in UI/UX to create user-focused design concepts that quickly produce a ROI.</div>
                </v-timeline-item>
              </v-timeline>
            </v-col>
          </v-row>
        </v-container>
      </v-tab-item>
      <v-tab-item value="tab-4">
        <v-row class="justify-center mt-lg-6">
          <v-col
            class="col-md-8 col-sm-8"
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
            <v-col class="col-md-6 col-sm-12">
              <v-row>
                <v-col class="col-md-2 col-sm-3">
                  <v-img src="https://i.ibb.co/jT2HsgH/PS.png"></v-img>
                </v-col>
                <v-col class="col-md-2 col-sm-3">
                  <v-img src="https://i.ibb.co/fn1m4mw/Ai.png"></v-img>
                </v-col>
                <v-col class="col-md-2 col-sm-3">
                  <v-img src="https://i.ibb.co/nzf9CFS/Lr.png"></v-img>
                </v-col>
                <v-col class="col-md-2 col-sm-3">
                  <v-img src="https://i.ibb.co/MVhmWNJ/Xd.png"></v-img>
                </v-col>
                <v-col class="col-md-2 col-sm-3">
                  <v-img src="https://i.ibb.co/DGMZXDH/Id.png"></v-img>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-container>
      </v-tab-item>
    </v-tabs-items>
  </v-app>
</template>


<style lang="scss" scoped>
/* Change background color of tabs on hover */
.tabs a:hover {
  color: #5289e7;
}

/* Styling for active tab */
.tabs a.active {
  border-bottom: 2px solid #5289e7;
  color: #5289e7;

  cursor: default;
}
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
  background: url("https://i.ibb.co/FBcj7mG/back.png") no-repeat;
  -webkit-background-size: 100% 100%;
  -moz-background-size: 100% 100%;
  -o-background-size: 100% 100%;
  background-size: 100% 100%;

  background-position: center center;
  color: #000 !important;
}
@media only screen and (max-width: 768px) {
  /* For mobile phones: */
  .v-tab--active {
    background: white !important;

    background-position: center center;
    color: #000 !important;
  }
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
.v-timeline-item__dot {
  box-shadow: 0 0px 0px 0px rgba(0, 0, 0, 0.2);
}
</style>

<script>
export default {
  data() {
    return {
      activetab: 1,
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