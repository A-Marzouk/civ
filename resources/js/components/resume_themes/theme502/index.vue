//theme-41
<template>
  <v-app id="theme502">
    <v-row class="mt-6" no-gutters>
      <v-col xl="8" lg="8" md="8" sm="12" cols="12">
        <v-row align="center" no-gutters>
          <v-col
            cols="3"
            sm="2"
            md="3"
            lg="2"
            xl="2"
            class="ml-md-0 ml-sm-12 ml-4"
          >
            <v-img
              :src="currentUser.personal_info.profile_pic"
              :aspect-ratio="0.92"
              class="avatar mt-1"
              style="border-radius: 0px 1rem 2rem 0px ;"
            ></v-img>
          </v-col>
          <v-col
            cols="7"
            sm="9"
            md="7"
            lg="9"
            xl="9"
            class="pl-sm-6 pl-md-3 pl-lg-6 pl-3"
          >
            <div class="head font-weight-bold">
              {{ currentUser.personal_info.full_name }}
              <div class="text-left d-sm-inline-block d-none">
                <v-btn fab color="#3E56CD" small class="ml-6" elevation="0">
                  <v-img
                    src="/images/resume_themes/theme502/email.svg"
                    width="14"
                    height="14"
                    contain
                  ></v-img>
                </v-btn>
                <v-btn fab color="#3E56CD" x-small class="mx-6" elevation="0">
                  <v-img
                    src="/images/resume_themes/theme502/video-player.svg"
                    width="12"
                    height="12"
                    contain
                  ></v-img>
                </v-btn>
                <v-btn fab color="#3E56CD" x-small class="mr-3" elevation="0">
                  <v-img
                    src="/images/resume_themes/theme502/headphones.svg"
                    width="12"
                    height="12"
                    contain
                  ></v-img>
                </v-btn>
              </div>
            </div>

            <div class="subhead grey--text text--darken-1 pb-sm-8 pb-4">
              {{ currentUser.personal_info.designation }}
            </div>

            <div class="text-left hidden-xs-only">
              <v-btn
                class="px-0 mr-4"
                color="#3E56CD"
                fab
                :href="Userlink.link"
                v-for="Userlink in currentUser.links"
                :key="Userlink.id + '_link'"
                target="_blank"
                v-show="Userlink.is_active && Userlink.is_public"
                small
                elevation="0"
              >
                <v-img
                  width="18"
                  height="18"
                  contain
                  :src="
                    `/images/resume_themes/theme502/social_icons/${Userlink.link_title.toLowerCase()}.svg`
                  "
                ></v-img>
              </v-btn>
            </div>
            <div class="hidden-sm-and-up">
              <v-btn fab color="#3E56CD" small elevation="0">
                <v-img
                  src="/images/resume_themes/theme502/email.svg"
                  width="14"
                  height="14"
                  contain
                ></v-img>
              </v-btn>
              <v-btn fab color="#3E56CD" x-small class="mx-3" elevation="0">
                <v-img
                  src="/images/resume_themes/theme502/video-player.svg"
                  width="12"
                  height="12"
                  contain
                ></v-img>
              </v-btn>
              <v-btn fab color="#3E56CD" x-small elevation="0">
                <v-img
                  src="/images/resume_themes/theme502/headphones.svg"
                  width="12"
                  height="12"
                  contain
                ></v-img>
              </v-btn>
            </div>
          </v-col>
        </v-row>
      </v-col>

      <v-col
        xl="3"
        lg="4"
        md="4"
        sm="10"
        cols="10"
        class="mt-8 ml-lg-auto ml-md-auto ml-xl-auto ml-sm-12 ml-auto pr-xl-0 pr-lg-0 pr-md-0 pr-sm-0 mt-sm-12 ml-sm-0"
      >
        <v-row
          justify-lg="start"
          justify-md="start"
          justify-sm="end"
          justify="center"
          align="center"
          class="text-center"
          no-gutters
        >
          <v-col cols="auto" sm="3" md="4" lg="3" xl="4">
            <div
              class="text-center grey--text text--darken-1 subtitle-2 font-light"
            >
              <v-icon small @click="paymentInfoPrev()">navigate_before</v-icon>
              <div
                v-for="(payment_Info, index) in currentUser.payment_info"
                :key="index"
                v-show="payment_Info.is_public"
                class="d-inline-block"
              >
                <span
                  class="text-center grey--text text--darken-1 subtitle-2 font-light text-capitalize"
                  v-if="paymentInfo == index"
                >
                  {{ payment_Info.salary_frequency }} Rate
                </span>
              </div>
              <v-icon small @click="paymentInfoNext()">navigate_next</v-icon>
            </div>
            <div class="text-center textcol title font-weight-medium">
              <div
                v-for="(payment_Info, index) in currentUser.payment_info"
                :key="index"
                v-show="payment_Info.is_public"
              >
                <span
                  class="text-center textcol title font-weight-medium text-uppercase"
                  v-if="paymentInfo == index"
                >
                  ${{ payment_Info.salary }} {{ payment_Info.currency }}
                </span>
              </div>
            </div>
          </v-col>
          <v-col cols="1" sm="auto" lg="1" align="center" class="mx-xl-n6">
            <div style="width:1px;height:2rem;background-color:#D7D7D7;"></div>
          </v-col>

          <v-col cols="4" sm="3" md="4" lg="3" xl="4">
            <div
              class="text-center grey--text text--darken-1 subtitle-2 font-light"
            >
              <v-icon small @click="availablePrev()">navigate_before</v-icon>
              <div
                v-for="(availability_info,
                index) in currentUser.availability_info"
                :key="index"
                v-show="availability_info.is_public"
                class="d-inline-block"
              >
                <span
                  class="text-center grey--text text--darken-1 subtitle-2 font-light text-capitalize "
                  v-if="available == index"
                >
                  {{ availability_info.available_hours_frequency }}
                  for
                </span>
              </div>
              <v-icon small @click="availableNext()">navigate_next</v-icon>
            </div>
            <div class="text-center textcol title font-weight-medium">
              <div
                v-for="(availability_info,
                index) in currentUser.availability_info"
                :key="index"
                v-show="availability_info.is_public"
              >
                <span
                  class="text-center textcol title font-weight-medium"
                  v-if="available == index"
                >
                  {{ availability_info.available_hours }} hours
                </span>
              </div>
            </div>
          </v-col>
          <v-col
            cols="6"
            sm="4"
            md="6"
            lg="4"
            xl="4"
            class="mt-6 mt-lg-0 mt-sm-0"
          >
            <v-btn
              color="#2943c7"
              style="border-radius: 10px;height:50px;"
              class="hire"
            >
              <div
                class="text-center grey--text text--lighten-5 font-weight-medium"
              >
                HIRE ME
              </div>
            </v-btn>
          </v-col>
        </v-row>
      </v-col>
      <v-col cols="12" class="hidden-sm-and-up mt-12">
        <div class="text-center mt-6">
          <v-btn
            class="px-0 mr-4"
            color="#3E56CD"
            fab
            :href="Userlink.link"
            v-for="Userlink in currentUser.links"
            :key="Userlink.id + '_link'"
            target="_blank"
            v-show="Userlink.is_active && Userlink.is_public"
            small
            elevation="0"
          >
            <v-img
              width="18"
              height="18"
              contain
              :src="
                `/images/resume_themes/theme502/social_icons/${Userlink.link_title.toLowerCase()}.svg`
              "
            ></v-img>
          </v-btn>
        </div>
      </v-col>
    </v-row>
    <v-row
      class="mt-sm-12 mt-md-6 mt-6 mt-lg-4 pt-md-0 pt-6 pt-lg-0 margleft"
      justify="start"
      no-gutters
    >
      <v-col
        lg="8"
        sm="12"
        cols="12"
        xl="8"
        class="tablet mr-xl-12 mr-sm-0 mt-sm-12"
      >
        <v-tabs background-color="transparent" hide-arrows grow class="helo">
          <v-tab class="text-center" @click="tab = 'Portfolio'">
            <div class="tabtitle textcol font-weight-bold text-capitalize">
              Portfolio
            </div>
          </v-tab>
          <v-tab class="text-center" @click="tab = 'Work'">
            <div class="tabtitle textcol font-weight-bold text-capitalize">
              Work
            </div>
          </v-tab>
          <v-tab class="text-center" @click="tab = 'Education'">
            <div class="tabtitle textcol font-weight-bold text-capitalize">
              Education
            </div>
          </v-tab>
          <v-tab class="text-center" @click="tab = 'Skills'">
            <div class="tabtitle textcol font-weight-bold text-capitalize">
              Skills
            </div>
          </v-tab>
        </v-tabs>
      </v-col>
    </v-row>

    <v-row no-gutters>
      <v-slide-x-reverse-transition>
        <v-col
          md="12"
          cols="12"
          xl="12"
          lg="12"
          sm="12"
          v-if="tab == 'Portfolio'"
          key="one"
          style="height:100vh;"
        >
          <v-row
            justify="center"
            align="center"
            class="padleft mt-lg-12 mt-2 mt-sm-6"
            no-gutters
          >
            <v-col
              xl="3"
              md="4"
              lg="4"
              cols="12"
              sm="12"
              class="mx-xl-3 px-lg-3 px-sm-4 py-xl-6 py-sm-2 px-4 py-2"
              v-for="project in currentUser.projects"
              :key="project.id + '_project'"
              v-show="project.is_public"
            >
              <v-img
                :src="getProjectMainImage(project)"
                :aspect-ratio="1.2"
                style="box-shadow: 0px 4px 30px rgba(0, 0, 0, 0.15);border-radius:20px;"
              ></v-img>
            </v-col>
          </v-row>
        </v-col>
      </v-slide-x-reverse-transition>
      <v-slide-x-reverse-transition>
        <v-col
          md="12"
          cols="12"
          xl="12"
          lg="12"
          sm="12"
          v-if="tab == 'Work'"
          key="two"
          style="height:100vh;"
        >
          <v-row no-gutters class="px-4 px-lg-0 mt-6 px-sm-6">
            <v-col
              md="6"
              sm="12"
              cols="12"
              lg="6"
              v-for="work in currentUser.work_experience"
              :key="work.id"
              v-show="work.is_public"
              class="mt-4 padleft"
            >
              <v-row class="mt-4" no-gutters>
                <v-col md="12" sm="12" cols="12">
                  <h1 class="textcol headline font-weight-bold">
                    {{ work.job_title }}
                  </h1>
                </v-col>
                <v-col md="6" sm="6" cols="6" class="text-md-left mt-2">
                  <h1
                    class="caption font-weight-bold pb-2 mr-lg-12 grey--text text--darken-4"
                  >
                    {{ work.company_name }}
                  </h1>
                </v-col>

                <v-col md="6" sm="6" cols="6" class="mt-2">
                  <h1
                    class="caption font-weight-bold text-right grey--text text--darken-4"
                  >
                    {{ work.date_from }} - {{ work.date_to }}
                  </h1>
                </v-col>
                <v-col md="12" sm="12" cols="12" xl="12" class="my-6">
                  <div
                    class="grey--text text--darken-1 sfont pb-2 font-weight-thin"
                  >
                    {{ work.description }}
                  </div>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-col>
      </v-slide-x-reverse-transition>
      <v-slide-x-reverse-transition>
        <v-col
          md="12"
          cols="12"
          xl="12"
          lg="12"
          sm="12"
          v-if="tab == 'Education'"
          key="three"
          style="height:100vh;"
        >
          <v-row justify="start" no-gutters class="px-4 px-lg-0 px-sm-6 mt-6">
            <v-col
              md="6"
              sm="12"
              cols="12"
              lg="6"
              v-for="education in currentUser.education"
              :key="education.id"
              v-show="education.is_public"
              class="mt-4 padleft"
            >
              <v-row justify="start" class no-gutters>
                <v-row class="mt-md-4 mt-4" no-gutters>
                  <v-col md="12" sm="12" cols="12">
                    <h1 class="textcol headline font-weight-bold">
                      {{ education.university_name }}
                    </h1>
                  </v-col>
                  <v-col md="12" sm="12" cols="12" class="text-md-left my-6">
                    <h1
                      class="caption font-weight-bold pb-2 mr-12 grey--text text--darken-4"
                    >
                      {{ education.date_from }} - {{ education.date_to }}
                    </h1>
                  </v-col>

                  <v-col md="12" sm="12" cols="12" xl="12">
                    <div
                      class="grey--text text--darken-1 sfont pb-2 font-weight-thin"
                    >
                      {{ education.degree_title }}
                    </div>
                  </v-col>
                </v-row>
              </v-row>
            </v-col>
          </v-row>
        </v-col>
      </v-slide-x-reverse-transition>
      <v-slide-x-reverse-transition>
        <v-col
          md="12"
          cols="12"
          xl="12"
          lg="12"
          sm="12"
          v-if="tab == 'Skills'"
          key="four"
          style="height:100vh;"
        >
          <v-row no-gutters justify="start" class="padleft">
            <v-col md="12" lg="12" class="mt-md-8 mt-sm-4">
              <v-tabs
                v-model="tabskill"
                background-color="transparent"
                height="60"
                color="#C10FA0"
                center-active
                hide-arrows
                grow
              >
                <v-tabs-slider
                  style="height:0px;padding:0 0 !important;"
                ></v-tabs-slider>

                <v-tab
                  v-show="
                    currentUser.skills.find(
                      s => s.category == 'programming_languages'
                    )
                  "
                >
                  <div class="subtitle-1 text-capitalize textcol skilltab">
                    Programming languages
                  </div>
                </v-tab>
                <v-tab
                  v-show="
                    currentUser.skills.find(s => s.category == 'frameworks')
                  "
                >
                  <div class="subtitle-1 text-capitalize textcol skilltab">
                    Frameworks/ Databases
                  </div>
                </v-tab>
                <v-tab
                  v-show="
                    currentUser.skills.find(s => s.category == 'software')
                  "
                >
                  <div class="subtitle-1 text-capitalize textcol skilltab">
                    Software
                  </div>
                </v-tab>
                <v-tab
                  v-show="
                    currentUser.skills.find(s => s.category == 'software')
                  "
                >
                  <div class="subtitle-1 text-capitalize textcol skilltab">
                    Design
                  </div>
                </v-tab>
              </v-tabs>

              <v-row no-gutters class="mt-4">
                <v-col md="12" sm="12" cols="12">
                  <v-tabs-items
                    v-model="tabskill"
                    style="background-color:transparent;"
                  >
                    <v-tab-item
                      v-show="
                        currentUser.skills.find(
                          s => s.category == 'programming_languages'
                        )
                      "
                    >
                      <v-row
                        class="justify-center py-2"
                        align="center"
                        no-gutters
                      >
                        <v-col
                          xl="8"
                          lg="8"
                          md="8"
                          sm="12"
                          cols="12"
                          v-for="(s, index) in currentUser.skills"
                          :key="index"
                          v-show="s.category == 'programming_languages'"
                          class="px-md-6 my-4 px-2 mx-2"
                        >
                          <v-row
                            no-gutters
                            class="mx-md-0 mx-lg-0 mx-xl-0 mx-sm-12 mx-4"
                            justify="center"
                            align="center"
                          >
                            <v-col cols="12" sm="12" md="3" lg="4" xl="3">
                              <div
                                class="skilltext text-left font-weight-bold mb-sm-1 mb-xs-1"
                              >
                                {{ s.title }} - {{ s.percentage }}
                              </div>
                            </v-col>

                            <v-col cols="12" sm="12" md="9" lg="8">
                              <div class="pro-back ml-md-11 my-5">
                                <div
                                  class="progress"
                                  :style="'width:' + s.percentage"
                                ></div>
                              </div>
                            </v-col>
                          </v-row>
                        </v-col>
                      </v-row>
                    </v-tab-item>
                    <v-tab-item
                      v-show="
                        currentUser.skills.find(s => s.category == 'frameworks')
                      "
                    >
                      <v-row
                        class="justify-center py-2"
                        align="center"
                        no-gutters
                      >
                        <v-col
                          xl="8"
                          lg="8"
                          md="8"
                          sm="12"
                          cols="12"
                          v-for="(s, index) in currentUser.skills"
                          :key="index"
                          v-show="s.category == 'frameworks'"
                          class="px-md-6 my-4 px-2 mx-2"
                        >
                          <v-row
                            no-gutters
                            class="mx-md-0 mx-lg-0 mx-xl-0 mx-sm-12 mx-4"
                            justify="center"
                            align="center"
                          >
                            <v-col cols="12" sm="12" md="3" lg="4" xl="3">
                              <div
                                class="skilltext text-left font-weight-bold mb-sm-1 mb-xs-1"
                              >
                                {{ s.title }} - {{ s.percentage }}
                              </div>
                            </v-col>

                            <v-col cols="12" sm="12" md="9" lg="8">
                              <div class="pro-back ml-md-11 my-5">
                                <div
                                  class="progress"
                                  :style="'width:' + s.percentage"
                                ></div>
                              </div>
                            </v-col>
                          </v-row>
                        </v-col>
                      </v-row>
                    </v-tab-item>
                    <v-tab-item
                      v-show="
                        currentUser.skills.find(s => s.category == 'software')
                      "
                    >
                      <v-row
                        class="justify-center py-2"
                        align="center"
                        no-gutters
                      >
                        <v-col
                          xl="8"
                          lg="8"
                          md="8"
                          sm="12"
                          cols="12"
                          v-for="(s, index) in currentUser.skills"
                          :key="index"
                          v-show="s.category == 'software'"
                          class="px-md-6 my-4 px-2 mx-2"
                        >
                          <v-row
                            no-gutters
                            class="mx-md-0 mx-lg-0 mx-xl-0 mx-sm-12 mx-4"
                            justify="center"
                            align="center"
                          >
                            <v-col cols="12" sm="12" md="3" lg="4" xl="3">
                              <div
                                class="skilltext text-left font-weight-bold mb-sm-1 mb-xs-1"
                              >
                                {{ s.title }} - {{ s.percentage }}
                              </div>
                            </v-col>

                            <v-col cols="12" sm="12" md="9" lg="8">
                              <div class="pro-back ml-md-11 my-5">
                                <div
                                  class="progress"
                                  :style="'width:' + s.percentage"
                                ></div>
                              </div>
                            </v-col>
                          </v-row>
                        </v-col>
                      </v-row>
                    </v-tab-item>
                    <v-tab-item
                      v-show="
                        currentUser.skills.find(s => s.category == 'design')
                      "
                    >
                      <v-row
                        class="justify-center py-2"
                        align="center"
                        no-gutters
                      >
                        <v-col
                          xl="8"
                          lg="8"
                          md="8"
                          sm="12"
                          cols="12"
                          v-for="(s, index) in currentUser.skills"
                          :key="index"
                          v-show="s.category == 'design'"
                          class="px-md-6 my-4 px-2 mx-2"
                        >
                          <v-row
                            no-gutters
                            class="mx-md-0 mx-lg-0 mx-xl-0 mx-sm-12 mx-4"
                            justify="center"
                            align="center"
                          >
                            <v-col cols="12" sm="12" md="3" lg="4" xl="3">
                              <div
                                class="skilltext text-left font-weight-bold mb-sm-1 mb-xs-1"
                              >
                                {{ s.title }} - {{ s.percentage }}
                              </div>
                            </v-col>

                            <v-col cols="12" sm="12" md="9" lg="8">
                              <div class="pro-back ml-md-11 my-5">
                                <div
                                  class="progress"
                                  :style="'width:' + s.percentage"
                                ></div>
                              </div>
                            </v-col>
                          </v-row>
                        </v-col>
                      </v-row>
                    </v-tab-item>
                  </v-tabs-items>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-col>
      </v-slide-x-reverse-transition>
    </v-row>
  </v-app>
</template>
<style lang="scss" scoped>
@import "resources/sass/themes/theme502.scss";
.v-tabs-bar.v-slide-group--is-overflowing.v-tabs-bar--is-mobile:not(.v-tabs-bar--show-arrows):not(.v-slide-group--has-affixes)
  .v-slide-group__prev {
  display: none !important;
  visibility: hidden;
}
</style>
<script>
export default {
  props: ["user", "is_preview"],
  data() {
    return {
      available: 0,
      paymentInfo: 0,
      currentUser: this.user,
      tab: "Portfolio",
      media: [
        {
          id: 1,
          src: "/images/resume_themes/theme502/email.svg"
        },
        {
          id: 2,
          src: "/images/resume_themes/theme502/video-player.svg"
        },
        {
          id: 3,
          src: "/images/resume_themes/theme502/headphones.svg"
        }
      ],
      icons: [
        {
          id: 1,
          src: "/images/resume_themes/theme502/behance.svg"
        },
        {
          id: 2,
          src: "/images/resume_themes/theme502/dribbble.svg"
        },
        {
          id: 3,
          src: "/images/resume_themes/theme502/instagram.svg"
        },
        {
          id: 4,
          src: "/images/resume_themes/theme502/linkedin.svg"
        },
        {
          id: 5,
          src: "/images/resume_themes/theme502/google-plus.svg"
        }
      ],
      tabs: [
        {
          id: 1,
          name: "Portfolio",

          link: "/"
        },
        {
          id: 2,
          name: "Work",

          link: "/work"
        },
        {
          id: 3,
          name: "Education",

          link: "/education"
        },
        {
          id: 4,
          name: "Skills",

          link: "/skills"
        }
      ],
      images: [
        {
          id: 1,
          src: "/images/resume_themes/theme502/img1.png"
        },
        {
          id: 2,
          src: "/images/resume_themes/theme502/img2.png"
        },
        {
          id: 3,
          src: "/images/resume_themes/theme502/img3.png"
        },
        {
          id: 4,
          src: "/images/resume_themes/theme502/img4.png"
        },
        {
          id: 5,
          src: "/images/resume_themes/theme502/img5.png"
        },
        {
          id: 6,
          src: "/images/resume_themes/theme502/img6.png"
        }
      ],
      temp: {
        icon: "/images/resume_themes/theme502/work.svg",
        title: "Google",
        sub: "User interface designer",
        duration: "Dec 19 - Present",
        para:
          "I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes."
      },
      emp: {
        icon: "/images/resume_themes/theme502/education.svg",
        title: "California Institute of Technology",
        sub: "University",
        duration: "M.Sc in HCI, Dec 19 - Present",
        para:
          "I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your  and make changes."
      },
      tabskill: null,
      items: [
        {
          id: 1,
          name: "Programming Languages",
          skills: [
            {
              name: "Photoshop",
              val: "90%",
              icon: "ph"
            },

            {
              name: "Illustrator",
              val: "80%",
              icon: "ill"
            },

            {
              name: "Figma",
              val: "75%",
              icon: "fig"
            },
            {
              name: "Photoshop",
              val: "90%",
              icon: "ph"
            },

            {
              name: "Illustrator",
              val: "80%",
              icon: "ill"
            },

            {
              name: "Figma",
              val: "75%",
              icon: "fig"
            }
          ]
        },
        {
          id: 2,
          name: "Frameworks/ Databases",
          skills: [
            {
              name: "Photoshop",
              val: "90%",
              icon: "ph"
            },
            {
              name: "Illustrator",
              val: "80%",
              icon: "ill"
            },

            {
              name: "Figma",
              val: "75%",
              icon: "fig"
            },
            {
              name: "Figma",
              val: "75%",
              icon: "fig"
            }
          ]
        },
        {
          id: 3,
          name: "Design Skills",
          skills: [
            {
              name: "Photoshop",
              val: "90%",
              icon: "ph"
            },
            {
              name: "Photoshop",
              val: "90%",
              icon: "ph"
            },

            {
              name: "Figma",
              val: "75%",
              icon: "fig"
            },
            {
              name: "Figma",
              val: "75%",
              icon: "fig"
            }
          ]
        },
        {
          id: 4,
          name: "Software",
          skills: [
            {
              name: "Photoshop",
              val: "90%",
              icon: "ph"
            },

            {
              name: "Figma",
              val: "75%",
              icon: "fig"
            }
          ]
        }
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

