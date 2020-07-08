<template>
  <v-app>
    <v-card flat tile color="#3361D0">
      <v-row class="justify-center pt-lg-4">
        <v-col md="6" sm="12" lg="6" cols="12">
          <v-row justify-lg="center" justify-sm="start" no-gutters>
            <v-col
              cols="5"
              lg="3"
              xl="3"
              md="3"
              sm="3"
              align-lg="center"
              align-sm="start"
              class="ml-sm-6"
            >
              <v-avatar class="profile" size="164">
                <v-img :src="currentUser.personal_info.profile_pic"></v-img>
                <v-btn color="#23A565" absolute dark small style="bottom: 22px;"
                  >TAP TO CHAT</v-btn
                >
              </v-avatar>
            </v-col>
            <v-col class="col-md-6 col-sm-6 pt-6 pl-1" cols="5">
              <p
                class="pl-1 head font-weight-bold text-left"
                style="color: whitesmoke;"
              >
                {{ currentUser.personal_info.full_name }}
              </p>
              <p class="pl-1 subhead text-left" style="color: whitesmoke;">
                {{ currentUser.personal_info.designation }}
              </p>

              <v-btn
                :href="Userlink.link"
                v-for="(Userlink, index) in currentUser.links"
                :key="Userlink.id + '_link'"
                target="_blank"
                dark
                min-width="36"
                height="36"
                class="mr-2 my-2 px-0"
                v-show="Userlink.is_active && Userlink.is_public"
                :color="Randomcolors[index].color"
              >
                <v-icon small dark color="white"
                  >mdi-{{ Userlink.link_title.toLowerCase() }}</v-icon
                >
              </v-btn>
            </v-col>
            <v-col class="hidden-md-and-up mt-5" cols="2">
              <v-btn
                class="ma-2"
                min-width="36"
                height="36"
                outlined
                color="white"
                x-small
              >
                <v-icon small>mdi-volume-high</v-icon>
              </v-btn>
              <v-btn
                class="ma-2"
                min-width="36"
                height="36"
                outlined
                color="white"
                x-small
              >
                <v-icon small lft>mdi-video</v-icon>
              </v-btn>
            </v-col>
          </v-row>
        </v-col>
        <v-col class="col-md-6 col-sm-11 pr-lg-12" cols="12">
          <v-row
            no-gutters
            justify-lg="end"
            justify-xl="end"
            justify-sm="center"
            justify="center"
            class="align-center pr-lg-12"
          >
            <v-col
              lg="12"
              class="col-md-8 col-sm-8 hidden-sm-and-down text-right pr-lg-2"
            >
              <div
                class="subhead text-right mt-4 mr-4 d-inline-block"
                style="color: whitesmoke;"
              >
                Your Interviews :
              </div>
              <v-btn class="ma-2" outlined color="white" left>
                Audio & Text
                <v-icon right>mdi-volume-high</v-icon>
              </v-btn>
              <v-btn outlined color="white" left>
                Upload Video
                <v-icon right>ondemand_video</v-icon>
              </v-btn>
            </v-col>
            <v-col
              lg="10"
              xl="8"
              class="col-md-10 col-sm-12 mt-8 marginr"
              cols="11"
            >
              <v-row
                style="background: rgb(37, 29, 68,0.20);border-radius: 10px;"
                class="align-center px-2 px-sm-3 px-lg-3 py-2"
                no-gutters
                justify-lg="center"
                justify-sm="space-between"
              >
                <v-col cols="auto" md="4" sm="auto" lg="3" xl="3">
                  <div class="title text-left" style="color: whitesmoke;">
                    <div
                      v-for="(payment_Info, index) in currentUser.payment_info"
                      :key="index"
                      v-show="payment_Info.is_public"
                    >
                      <span class="title text-left" v-if="paymentInfo == index">
                        $ {{ payment_Info.salary }}
                      </span>
                    </div>
                  </div>
                  <div
                    class="caption text-left"
                    style="color: #FFFFFF;opacity: 0.82"
                  >
                    <v-icon dark small @click="paymentInfoPrev()"
                      >navigate_before</v-icon
                    >
                    <div
                      v-for="(payment_Info, index) in currentUser.payment_info"
                      :key="index"
                      v-show="payment_Info.is_public"
                      class="d-inline-block"
                    >
                      <span
                        class="caption text-left text-capitalize"
                        v-if="paymentInfo == index"
                      >
                        {{ payment_Info.salary_frequency }} Rate
                      </span>
                    </div>
                    <v-icon dark small @click="paymentInfoNext()"
                      >navigate_next</v-icon
                    >
                  </div>
                </v-col>
                <v-col
                  cols="auto"
                  lg="1"
                  class="px-1 px-sm-2 px-lg-2"
                  align="center"
                >
                  <div
                    style="width:1px;height:2rem;background-color:#D7D7D7;"
                  ></div>
                </v-col>
                <v-col cols="5" md="4" sm="4" lg="4">
                  <div class="title text-left pl-3" style="color: whitesmoke;">
                    <div
                      v-for="(availability_info,
                      index) in currentUser.availability_info"
                      :key="index"
                      v-show="availability_info.is_public"
                    >
                      <span
                        class="title text-left"
                        style="color: whitesmoke;"
                        v-if="available == index"
                      >
                        {{ availability_info.available_hours }} hrs
                      </span>
                    </div>
                  </div>
                  <div
                    class="caption text-left "
                    style="color: #FFFFFF;opacity: 0.82"
                  >
                    <v-icon dark small @click="availablePrev()"
                      >navigate_before</v-icon
                    >
                    <div
                      v-for="(availability_info,
                      index) in currentUser.availability_info"
                      :key="index"
                      v-show="availability_info.is_public"
                      class="d-inline-block"
                    >
                      <span
                        class="caption text-capitalize text-left"
                        v-if="available == index"
                      >
                        {{ availability_info.available_hours_frequency }}
                        Availability
                      </span>
                    </div>
                    <v-icon dark small @click="availableNext()"
                      >navigate_next</v-icon
                    >
                  </div>
                </v-col>

                <v-col
                  cols="3"
                  md="4"
                  sm="3"
                  lg="3"
                  xl="3"
                  class="text-center ml-lg-6 ml-sm-0 ml-0"
                >
                  <v-btn
                    dark
                    color="#23A565"
                    large
                    width="100%"
                    class="ma-auto"
                    elevation="0"
                  >
                    <div class="mini text-capitalize">Hire Me</div>
                  </v-btn>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
      <v-row no-gutters class="justify-center align-center mt-10">
        <v-col lg="10" xl="8" sm="12" md="8" cols="12">
          <v-tabs
            v-model="tab"
            show-arrows
            background-color="rgb(255, 255, 255,0.0)"
            dark
            class="theme500"
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
        <v-col class="col-md-5 col-sm-12 pl-xl-11" cols="12" lg="7" xl="6">
          <v-row class="justify-center text-center" no-gutters>
            <v-col
              md="3"
              sm="3"
              cols="3"
              v-on:click="activetab = 1"
              v-show="
                currentUser.skills.find(
                  s => s.category == 'programming_languages'
                )
              "
              class="tabs"
              v-bind:class="[activetab === 1 ? 'active' : '']"
            >
              <a class="tabtitle">
                <v-icon class="d-block" color="#23A565"
                  >mdi-monitor-screenshot</v-icon
                >Programming languages
              </a>
            </v-col>
            <v-col
              md="3"
              sm="3"
              cols="3"
              v-on:click="activetab = 2"
              class="tabs"
              v-bind:class="[activetab === 2 ? 'active' : '']"
              v-show="currentUser.skills.find(s => s.category == 'frameworks')"
            >
              <a class="tabtitle">
                <v-icon class="d-block" color="#23A565"
                  >mdi-ruler-square-compass</v-icon
                >Frameworks/ Databases
              </a>
            </v-col>
            <v-col
              md="3"
              sm="3"
              cols="3"
              v-on:click="activetab = 4"
              class="tabs"
              v-bind:class="[activetab === 4 ? 'active' : '']"
              v-show="currentUser.skills.find(s => s.category == 'software')"
            >
              <a class="tabtitle">
                <v-icon class="d-block" color="#23A565">mdi-disc-player</v-icon
                >Software
              </a>
            </v-col>
            <v-col
              md="3"
              sm="3"
              cols="3"
              v-on:click="activetab = 3"
              class="tabs"
              v-bind:class="[activetab === 3 ? 'active' : '']"
              v-show="currentUser.skills.find(s => s.category == 'design')"
            >
              <a class="tabtitle">
                <v-icon class="d-block" color="#23A565"
                  >mdi-material-design</v-icon
                >Design Skills
              </a>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </v-card>

    <v-container>
      <v-row v-if="activetab === 1" class="justify-center">
        <v-col class="col-md-10 col-sm-12" lg="12">
          <v-row class="justify-center" align="start">
            <v-col
              class="col-md-3 col-sm-6"
              cols="6"
              v-for="(s, index) in currentUser.skills"
              :key="index"
              v-show="s.category == 'programming_languages'"
            >
              <v-row class="justify-end" dense>
                <v-col cols="3" sm="3" md="3">
                  <v-img
                    src="https://i.ibb.co/G3zQ7md/Adobe-Illustrator-CC-icon.png"
                  ></v-img>
                </v-col>
                <v-col cols="7" sm="7" md="7" class="mb-2" align-self="end">
                  <div class="mini text-left pb-2">{{ s.title }}</div>
                  <v-progress-linear
                    :color="Randomcolors[index].color"
                    :value="s.percentage"
                    height="10"
                    background-color="#C5C5C5"
                  ></v-progress-linear>
                </v-col>
                <v-col cols="2" sm="2" md="2" class="mb-1" align-self="end">
                  <span class="text-center subtitle-2"
                    >{{ s.percentage }}%</span
                  >
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
      <v-row v-if="activetab === 2" class="justify-center">
        <v-col class="col-md-10 col-sm-12">
          <v-row class="justify-center" align="start">
            <v-col
              class="col-md-3 col-sm-6"
              cols="6"
              v-for="(s, index) in currentUser.skills"
              :key="index"
              v-show="s.category == 'frameworks'"
            >
              <v-row class="justify-end" dense>
                <v-col cols="3" sm="3" md="3">
                  <v-img
                    src="https://i.ibb.co/G3zQ7md/Adobe-Illustrator-CC-icon.png"
                  ></v-img>
                </v-col>
                <v-col cols="7" sm="7" md="7" class="mb-2" align-self="end">
                  <div class="mini text-left pb-2">{{ s.title }}</div>
                  <v-progress-linear
                    :color="Randomcolors[index].color"
                    :value="s.percentage"
                    height="10"
                    background-color="#C5C5C5"
                  ></v-progress-linear>
                </v-col>
                <v-col cols="2" sm="2" md="2" class="mb-1" align-self="end">
                  <span class="text-center subtitle-2"
                    >{{ s.percentage }}%</span
                  >
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
      <v-row v-if="activetab === 3" class="justify-center">
        <v-col class="col-md-10 col-sm-12">
          <v-row class="justify-center" align="start">
            <v-col
              class="col-md-3 col-sm-6"
              cols="6"
              v-for="(s, index) in currentUser.skills"
              :key="index"
              v-show="s.category == 'software'"
            >
              <v-row class="justify-end" dense>
                <v-col cols="3" sm="3" md="3">
                  <v-img
                    src="https://i.ibb.co/G3zQ7md/Adobe-Illustrator-CC-icon.png"
                  ></v-img>
                </v-col>
                <v-col cols="7" sm="7" md="7" class="mb-2" align-self="end">
                  <div class="mini text-left pb-2">{{ s.title }}</div>
                  <v-progress-linear
                    :color="Randomcolors[index].color"
                    :value="s.percentage"
                    height="10"
                    background-color="#C5C5C5"
                  ></v-progress-linear>
                </v-col>
                <v-col cols="2" sm="2" md="2" class="mb-1" align-self="end">
                  <span class="text-center subtitle-2"
                    >{{ s.percentage }}%</span
                  >
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
      <v-row v-if="activetab === 4" class="justify-center">
        <v-col class="col-md-10 col-sm-12">
          <v-row class="justify-center" align="start">
            <v-col
              class="col-md-3 col-sm-6"
              cols="6"
              v-for="(s, index) in currentUser.skills"
              :key="index"
              v-show="s.category == 'design'"
            >
              <v-row class="justify-end" dense>
                <v-col cols="3" sm="3" md="3">
                  <v-img
                    src="https://i.ibb.co/G3zQ7md/Adobe-Illustrator-CC-icon.png"
                  ></v-img>
                </v-col>
                <v-col cols="7" sm="7" md="7" class="mb-2" align-self="end">
                  <div class="mini text-left pb-2">{{ s.title }}</div>
                  <v-progress-linear
                    :color="Randomcolors[index].color"
                    :value="s.percentage"
                    height="10"
                    background-color="#C5C5C5"
                  ></v-progress-linear>
                </v-col>
                <v-col cols="2" sm="2" md="2" class="mb-1" align-self="end">
                  <span class="text-center subtitle-2"
                    >{{ s.percentage }}%</span
                  >
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
            <v-col class="col-md-8 col-sm-12" cols="12" lg="12">
              <v-row class="justify-center">
                <v-col
                  class="col-md-4 col-sm-12 pa-sm-4"
                  cols="12"
                  v-for="project in currentUser.projects"
                  :key="project.id + '_project'"
                  v-show="project.is_public"
                >
                  <v-img
                    :src="getProjectMainImage(project)"
                    :aspect-ratio="1.2"
                    alt="portfolio img"
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
            <v-col
              cols="12"
              v-for="work in currentUser.work_experience"
              :key="work.id"
              v-show="work.is_public"
            >
              <v-timeline align-top dense class="large_dot">
                <v-timeline-item
                  fill-dot
                  large
                  color="#23A565"
                  icon-color="white"
                  icon="mdi-package-variant"
                >
                  <p class="title mt-3">{{ work.job_title }}</p>
                </v-timeline-item>
                <v-timeline-item right hide-dot color="#3C3748" small>
                  <div class="subtitle-2">{{ work.company_name }}</div>
                  <div class="subtitle-2">
                    {{ work.date_from }} - {{ work.date_to }}
                  </div>
                </v-timeline-item>
                <v-timeline-item right hide-dot color="#3C3748" small>
                  <div class="subtitle-2 pr-lg-4">
                    {{ work.description }}
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
            <v-col
              cols="12"
              v-for="education in currentUser.education"
              :key="education.id"
              v-show="education.is_public"
            >
              <v-timeline align-top dense class="large_dot">
                <v-timeline-item
                  fill-dot
                  large
                  color="#23A565"
                  icon-color="white"
                  icon="mdi-package-variant"
                >
                  <p class="title mt-3">{{ education.university_name }}</p>
                </v-timeline-item>
                <v-timeline-item right hide-dot color="#3C3748" small>
                  <div class="subtitle-2">
                    {{ education.date_from }} - {{ education.date_to }}
                  </div>
                  <div class="subtitle-2">{{ education.institution_type }}</div>
                </v-timeline-item>
                <v-timeline-item right hide-dot color="#3C3748" small>
                  <div class="subtitle-2 pr-lg-4">
                    {{ education.degree_title }}
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
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                    diam nonumy eirmod tempor invidunt ut labore et dolore magna
                    aliquyam erat, sed diam voluptua. At vero eos et accusam et
                    justo duo dolores et ea rebum. Stet clita kasd gubergren, no
                    sea takimata sanctus est Lorem ipsum dolor sit amet.
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
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                    diam nonumy eirmod tempor invidunt ut labore et dolore magna
                    aliquyam erat, sed diam voluptua. At vero eos et accusam et
                    justo duo dolores et ea rebum. Stet clita kasd gubergren, no
                    sea takimata sanctus est Lorem ipsum dolor sit amet.
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
/* Please check this import */
@import "resources/sass/themes/theme500.scss";
</style>
   
   <script>
export default {
  props: ["user", "is_preview"],
  data() {
    return {
      taboo: null,
      activetab: 1,
      available: 0,
      paymentInfo: 0,
      tab: null,
      text: [
        "",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
        "asdasdasdasd"
      ],
      currentUser: this.user,
      Randomcolors: [
        { color: "#217BFF" },
        { color: "#EE588A" },
        { color: "#DD24BC" },
        { color: "#F57C00" },
        { color: "#00897B" },
        { color: "#00ACC1" },
        { color: "#E64A19" },
        { color: "#217BFF" },
        { color: "#EE588A" },
        { color: "#DD24BC" },
        { color: "#F57C00" },
        { color: "#00897B" },
        { color: "#00ACC1" },
        { color: "#E64A19" },
        { color: "#217BFF" },
        { color: "#EE588A" },
        { color: "#DD24BC" },
        { color: "#F57C00" },
        { color: "#00897B" },
        { color: "#00ACC1" },
        { color: "#E64A19" }
      ]
    };
  },
  methods: {
    availableNext() {
      if (this.available == 2) {
        this.available = 0;
      } else this.available++;
    },
    availablePrev() {
      if (this.available == 0) {
        this.available = 2;
      } else this.available--;
    },
    paymentInfoNext() {
      if (this.paymentInfo == 2) {
        this.paymentInfo = 0;
      } else this.paymentInfo++;
    },
    paymentInfoPrev() {
      if (this.paymentInfo == 0) {
        this.paymentInfo = 2;
      } else this.paymentInfo--;
    },
    getProjectMainImage(project) {
      let mainImage = "";

      let images = project.images;
      images.forEach(image => {
        if (image.is_main) {
          mainImage = image;
        }
      });

      return mainImage.src;
    },
    setDummyUser() {
      this.currentUser = this.$store.state.dummyUser;
    }
  },
  mounted() {
    // if there is no user or the preview is true, set dummy user
    if (!this.currentUser || this.is_preview) {
      this.setDummyUser();
    }

    // let user accessible in included components.
    this.$store.dispatch("updateThemeUser", this.currentUser);
  }
};
</script>



