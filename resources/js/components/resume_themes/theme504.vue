//theme-41-v3
<template>
  <v-app>
    <v-card flat tile elevation="4">
      <v-row class="pa-4">
        <v-col class="col-md-6 col-sm-12">
          <v-row class="justify-start">
            <v-col class="col-md-3 col-sm-6">
              <v-avatar class="profile" color="grey" size="164">
                <v-img src="https://i.ibb.co/gRrW6dL/Ellipse-17.png"></v-img>
              </v-avatar>
            </v-col>
            <v-col class="col-md-6 col-sm-6 pt-12 pl-6">
              <p class="display-1 font-weight-bold text-left" style="color:#222B4C;">Zoyee Allena</p>
              <p
                class="text-left"
                style="font-family: Poppins;font-style: regular;font-size: 24px;text-align: left;vertical-align: top;"
              >
                Web Developer
                <v-btn dark small color="#5289E7" elevation="4" style="color:#fff;">
                  <v-icon dark small color="#fff">mdi-message-text</v-icon>
                </v-btn>
              </p>
            </v-col>
          </v-row>
        </v-col>
        <v-col class="col-md-6 col-sm-6">
          <v-row no-gutters class="justify-end">
            <v-col class="col-md-6 col-sm-12">
              <v-btn
                class="ma-2 elevation-0"
                rounded
                outlined
                color="#5289E7"
                right
                style="color:#5289E7;font-size:14px;"
              >
                <v-icon left color="#5289E7">mdi-music-box-outline</v-icon>Audio
              </v-btn>
              <v-btn
                class="ma-2 elevation-0"
                rounded
                outlined
                color="#5289E7"
                right
                style="color:#5289E7;font-size:14px;"
              >
                <v-icon left color="#5289E7">mdi-video</v-icon>Video
              </v-btn>
            </v-col>
            <v-col class="col-md-12 col-sm-12 mx-auto mr-12">
              <v-row>
                <v-col class="col-md-4 col-sm-6">
                  <div class="display-1 text-center">15$</div>
                  <div class="caption text-center" style="opacity: 0.82">Hourly rate</div>
                </v-col>
                <v-col class="col-md-4 col-sm-6">
                  <div class="display-1 text-center">35 hrs</div>
                  <div class="caption text-center" style="opacity: 0.82">Weekly Availability</div>
                </v-col>
                <v-col class="col-md-4 col-sm-6">
                  <v-btn dark color="#5289E7" x-large rounded width="80%" class="ma-auto">
                    <div
                      style="font-family: Poppins;font-style: normal;font-weight: normal;font-size:16px;text-align: center;"
                    >Hire Me</div>
                  </v-btn>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </v-card>

    <div class="tabs pt-8" style="text-align:center;">
      <a
        v-on:click="activetab=1"
        v-bind:class="[ activetab === 1 ? 'active' : '' ]"
      >Programming languages</a>
      <a v-on:click="activetab=2" v-bind:class="[ activetab === 2 ? 'active' : '' ]">Frameworks</a>
      <a v-on:click="activetab=3" v-bind:class="[ activetab === 3 ? 'active' : '' ]">Design Skills</a>
      <a v-on:click="activetab=4" v-bind:class="[ activetab === 4 ? 'active' : '' ]">Software</a>
    </div>

    <v-container>
      <v-row v-if="activetab === 1" class="justify-center">
        <v-col class="col-md-6 col-sm-12">
          <v-row>
            <v-col class="col-lg-4 col-md-4 col-sm-3">
              <v-img
                src="https://i.ibb.co/SQQ2FSK/Group-64.png"
                width="30"
                hegiht="30"
                style="float:right"
              ></v-img>
            </v-col>

            <v-col class="col-md-4 col-sm-3">
              <v-img
                src="https://i.ibb.co/98vvcb0/Group-65.png"
                width="30"
                hegiht="30"
                style="margin:auto;"
              ></v-img>
            </v-col>
            <v-col class="col-md-4 col-sm-3">
              <v-img
                src="https://i.ibb.co/VMfy3BS/Group-66.png"
                width="30"
                hegiht="30"
                style="float:left"
              ></v-img>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
      <v-row v-if="activetab === 2" class="justify-center">
        <v-col class="col-md-6 col-sm-12">
          <v-row>
            <v-col class="col-lg-6 col-md-6 col-sm-3">
              <v-img
                src="https://i.ibb.co/qr5r7wD/Group-76.png"
                width="30"
                hegiht="30"
                style="float:right;"
              ></v-img>
            </v-col>

            <v-col class="col-lg-6 col-md-6 col-sm-3">
              <v-img
                src="https://i.ibb.co/4fDL6Xx/Group-77.png"
                width="30"
                hegiht="30"
                style="float:left;"
              ></v-img>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
      <v-row v-if="activetab === 3" class="justify-center">
        <v-col class="col-md-6 col-sm-12">
          <v-row>
            <v-col class="col-lg-4 col-md-4 col-sm-3">
              <v-img
                src="https://i.ibb.co/JHc04GB/Group-80.png"
                width="30"
                hegiht="30"
                style="float:right"
              ></v-img>
            </v-col>

            <v-col class="col-md-4 col-sm-3">
              <v-img
                src="https://i.ibb.co/QXgYHwt/Group-81.png"
                width="30"
                hegiht="30"
                style="margin:auto;"
              ></v-img>
            </v-col>
            <v-col class="col-md-4 col-sm-3">
              <v-img
                src="https://i.ibb.co/k34J4PC/Group-83.png"
                width="30"
                hegiht="30"
                style="float:left"
              ></v-img>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
      <v-row v-if="activetab === 4" class="justify-center">
        <v-col class="col-md-6 col-sm-12">
          <v-row>
            <v-col class="col-lg-6 col-md-6 col-sm-3">
              <v-img
                src="https://i.ibb.co/qr5r7wD/Group-76.png"
                width="30"
                hegiht="30"
                style="float:right;"
              ></v-img>
            </v-col>

            <v-col class="col-lg-6 col-md-6 col-sm-3">
              <v-img
                src="https://i.ibb.co/4fDL6Xx/Group-77.png"
                width="30"
                hegiht="30"
                style="float:left;"
              ></v-img>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </v-container>

    <v-row no-gutters class="justify-center mt-12">
      <v-col class="col-md-8 col-sm-12">
        <v-tabs v-model="tab" background-color="transparent" color="#5289E7" centered show-arrows>
          <v-tabs-slider></v-tabs-slider>

          <v-tab href="#tab-1" class="tab">Portfolio</v-tab>

          <v-tab href="#tab-2" class="tab">Work</v-tab>

          <v-tab href="#tab-3" class="tab">Education</v-tab>
        </v-tabs>
      </v-col>
    </v-row>

    <v-tabs-items v-model="tab">
      <v-tab-item value="tab-1">
        <v-row class="justify-center">
          <v-col class="col-md-8 col-sm-12">
            <v-row class="justify-center">
              <v-col class="col-md-4 col-sm-6">
                <v-img src="https://i.ibb.co/2gcH3gC/Rectangle-3.png"></v-img>
                <p
                  class="subtitle-2 pt-2"
                >🛒Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </v-col>
              <v-col class="col-md-4 col-sm-6">
                <v-img src="https://i.ibb.co/crdVTbK/Rectangle-4.png"></v-img>
                <p
                  class="subtitle-2 pt-2"
                >🛒Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </v-col>
              <v-col class="col-md-4 col-sm-6">
                <v-img src="https://i.ibb.co/BT5S6YC/Rectangle-5.png"></v-img>
                <p
                  class="subtitle-2 pt-2"
                >🛒Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </v-col>
            </v-row>
          </v-col>
        </v-row>
      </v-tab-item>
      <v-tab-item value="tab-2">
        <v-container>
          <v-row style="overflow: scroll;">
            <v-col class="col-md-4 col-sm-12">
              <v-timeline dense>
                <v-timeline-item
                  fill-dot
                  large
                  color="#5289E7"
                  icon-color="#FFFFFF"
                  icon="mdi-briefcase"
                ></v-timeline-item>

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
                  <div class="subtitle-2">
                    Partners with clients, ranging from small businesses to Fortune 500 companies, to create
                    cutting-edge digital marketing designs targeting the American market. Forms a creative vision and
                    clearly conveys ideas using both visual and verbal communication. Collaborates with a creative
                    team consisting of web developers, content creators, and digital designers, to create engaging
                    digital collateral. Creates the end-to-end design for responsive websites using a mobile-first
                    approach.
                  </div>
                </v-timeline-item>
              </v-timeline>

              <v-timeline dense>
                <v-timeline-item
                  fill-dot
                  large
                  color="#5289E7"
                  icon-color="#FFFFFF"
                  icon="mdi-briefcase"
                ></v-timeline-item>

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
                  <div class="subtitle-2">
                    Conducted in-depth market research to construct creative design solutions for a variety of clients
                    in the pharma industry. Utilized Adobe Creative Suite to draft print and digital collateral,
                    including packaging, flyers, logos, and business cards. Managed relationships with vendors in
                    print, web development, and copywriting, to bring design ideas to fruition Utilized expertise in
                    UI/UX to create user-focused design concepts that quickly produce a ROI.
                  </div>
                </v-timeline-item>
              </v-timeline>
            </v-col>
            <v-col class="col-md-4 col-sm-12">
              <v-timeline dense>
                <v-timeline-item
                  fill-dot
                  large
                  color="#5289E7"
                  icon-color="#FFFFFF"
                  icon="mdi-briefcase"
                ></v-timeline-item>

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
                  <div class="subtitle-2">
                    Partners with clients, ranging from small businesses to Fortune 500 companies, to create
                    cutting-edge digital marketing designs targeting the American market. Forms a creative vision and
                    clearly conveys ideas using both visual and verbal communication. Collaborates with a creative
                    team consisting of web developers, content creators, and digital designers, to create engaging
                    digital collateral. Creates the end-to-end design for responsive websites using a mobile-first
                    approach.
                  </div>
                </v-timeline-item>
              </v-timeline>
            </v-col>
          </v-row>
        </v-container>
      </v-tab-item>
      <v-tab-item value="tab-3">
        <v-container>
          <v-row style="overflow: scroll;">
            <v-col class="col-md-4 col-sm-12">
              <v-timeline dense>
                <v-timeline-item
                  fill-dot
                  large
                  color="#5289E7"
                  icon-color="#FFFFFF"
                  icon="mdi-school"
                ></v-timeline-item>

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
                  <div class="subtitle-2">
                    Partners with clients, ranging from small businesses to Fortune 500 companies, to create
                    cutting-edge digital marketing designs targeting the American market. Forms a creative vision and
                    clearly conveys ideas using both visual and verbal communication. Collaborates with a creative
                    team consisting of web developers, content creators, and digital designers, to create engaging
                    digital collateral. Creates the end-to-end design for responsive websites using a mobile-first
                    approach.
                  </div>
                </v-timeline-item>
              </v-timeline>

              <v-timeline dense>
                <v-timeline-item
                  fill-dot
                  large
                  color="#5289E7"
                  icon-color="#FFFFFF"
                  icon="mdi-school"
                ></v-timeline-item>

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
                  <div class="subtitle-2">
                    Conducted in-depth market research to construct creative design solutions for a variety of clients
                    in the pharma industry. Utilized Adobe Creative Suite to draft print and digital collateral,
                    including packaging, flyers, logos, and business cards. Managed relationships with vendors in
                    print, web development, and copywriting, to bring design ideas to fruition Utilized expertise in
                    UI/UX to create user-focused design concepts that quickly produce a ROI.
                  </div>
                </v-timeline-item>
              </v-timeline>
            </v-col>
            <v-col class="col-md-4 col-sm-12">
              <v-timeline dense>
                <v-timeline-item
                  fill-dot
                  large
                  color="#5289E7"
                  icon-color="#FFFFFF"
                  icon="mdi-school"
                ></v-timeline-item>

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
                  <div class="subtitle-2">
                    Partners with clients, ranging from small businesses to Fortune 500 companies, to create
                    cutting-edge digital marketing designs targeting the American market. Forms a creative vision and
                    clearly conveys ideas using both visual and verbal communication. Collaborates with a creative
                    team consisting of web developers, content creators, and digital designers, to create engaging
                    digital collateral. Creates the end-to-end design for responsive websites using a mobile-first
                    approach.
                  </div>
                </v-timeline-item>
              </v-timeline>
              <v-timeline dense>
                <v-timeline-item
                  fill-dot
                  large
                  color="#5289E7"
                  icon-color="#FFFFFF"
                  icon="mdi-school"
                ></v-timeline-item>

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
                  <div class="subtitle-2">
                    Conducted in-depth market research to construct creative design solutions for a variety of clients
                    in the pharma industry. Utilized Adobe Creative Suite to draft print and digital collateral,
                    including packaging, flyers, logos, and business cards. Managed relationships with vendors in
                    print, web development, and copywriting, to bring design ideas to fruition Utilized expertise in
                    UI/UX to create user-focused design concepts that quickly produce a ROI.
                  </div>
                </v-timeline-item>
              </v-timeline>
            </v-col>
            <v-col class="col-md-4 col-sm-12">
              <v-timeline dense>
                <v-timeline-item
                  fill-dot
                  large
                  color="#5289E7"
                  icon-color="#FFFFFF"
                  icon="mdi-school"
                ></v-timeline-item>

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
                  <div class="subtitle-2">
                    Partners with clients, ranging from small businesses to Fortune 500 companies, to create
                    cutting-edge digital marketing designs targeting the American market. Forms a creative vision and
                    clearly conveys ideas using both visual and verbal communication. Collaborates with a creative
                    team consisting of web developers, content creators, and digital designers, to create engaging
                    digital collateral. Creates the end-to-end design for responsive websites using a mobile-first
                    approach.
                  </div>
                </v-timeline-item>
              </v-timeline>
              <v-timeline dense>
                <v-timeline-item
                  fill-dot
                  large
                  color="#5289E7"
                  icon-color="#FFFFFF"
                  icon="mdi-school"
                ></v-timeline-item>

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
                  <div class="subtitle-2">
                    Conducted in-depth market research to construct creative design solutions for a variety of clients
                    in the pharma industry. Utilized Adobe Creative Suite to draft print and digital collateral,
                    including packaging, flyers, logos, and business cards. Managed relationships with vendors in
                    print, web development, and copywriting, to bring design ideas to fruition Utilized expertise in
                    UI/UX to create user-focused design concepts that quickly produce a ROI.
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
/* Style the tabs */
.tabs {
  overflow: hidden;
  margin-left: 20px;
  margin-bottom: -2px;
}

.tabs ul {
  list-style-type: none;
  margin-left: 20px;
}

.tabs a {
  color: #000;
  cursor: pointer;
  padding: 12px 24px;
  transition: background-color 0.5s;
  border-radius: 500px;

  font-weight: bold;
  margin: auto;
  text-align: center;
  display: inline-block;
}

/* Change background color of tabs on hover */
.tabs a:hover {
  color: #5289e7;
}

/* Styling for active tab */
.tabs a.active {
  background-color: #5289e7;
  border-radius: 500px;
  color: #fff;

  cursor: default;
}

/* Style the tab content */
.tabcontent {
  padding: 30px;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-shadow: 3px 3px 6px #e1e1e1;
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

.basil {
  background-color: #5289e7 !important;
}

.basil--text {
  color: #356859 !important;
}

@media only screen and (max-width: 768px) {
}

.v-timeline-item__dot {
  box-shadow: 0 0px 0px 0px rgba(0, 0, 0, 0.2);
}
</style>

<script>
export default {
  data() {
    return {
      tab: null,
      taboo: null,
      activetab: 1,
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