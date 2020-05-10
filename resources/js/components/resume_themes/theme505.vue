//theme-27
<template>
  <v-app>
    <section class="back">
      <v-row no-gutters>
        <v-col xl="4" lg="5" md="6" sm="12" cols="12">
          <div class="mx-lg-5 my-lg-3 my-xs-5 py-3">
            <v-row align="center" no-gutters>
              <v-col cols="4" sm="3" md="5" lg="4" xl="4">
                <v-avatar
                  class="ma-4 pa-1"
                  style="background: linear-gradient(132.84deg, #C10FA0 -2.15%, #270556 101.91%);"
                >
                  <v-img
                    src="/images/resume_themes/theme505/avatar.png"
                    contain
                    :aspect-ratio="1"
                    class="mt-1"
                  ></v-img>
                </v-avatar>
              </v-col>

              <v-col cols="8" sm="8" md="7" lg="8" xl="8" class="pl-sm-0 pl-md-3 pl-3 pl-lg-6">
                <div class="head textcol font-weight-black">Beverly Andrews</div>

                <div class="subtitle-1 grey--text text--lighten-2 pb-2">User interface designer</div>

                <v-btn
                  fab
                  color="#C10FA0"
                  text
                  small
                  v-for="m in media"
                  :key="m.id"
                  class="mr-4"
                  style="border: 2px solid #C10FA0;"
                >
                  <v-img :src="m.src" width="18" height="18" class="mt-1" contain></v-img>
                </v-btn>
              </v-col>
            </v-row>
          </div>
        </v-col>
        <v-col xl="3" lg="3" md="3" sm="12" justify="center" align-self="center">
          <div
            class="text-center text-md-subtitle-1 grey--text text--lighten-2 font-weight-medium hidden-xs-only"
          >Links to my profiles:</div>
          <div class="text-center mt-6">
            <v-btn
              class="px-0 mx-xs-1"
              text
              color="white"
              v-for="icon in icons"
              :key="icon.id"
              min-width="48px"
            >
              <v-img width="40" height="40" contain :src="icon.src"></v-img>
            </v-btn>
          </div>
        </v-col>
        <v-col lg="3" md="3" sm="12" cols="12" class="ml-lg-auto ml-xl-auto mt-md-10 mt-8 ml-0">
          <v-row justify="center" align="center" class="text-center" dense>
            <v-col cols="4" sm="3" md="4" lg="4">
              <div class="text-center antext subtitle-2 font-light">Hourly rate</div>
              <div class="text-center grey--text text--lighten-2 title font-weight-bold">$25 USD</div>
            </v-col>
            <v-col cols="1" align="center" class="mx-xl-n8">
              <div
                style="width:1px;height:2rem;background-color:rgba(255, 255, 255, 0.38);"
                class="mt-xl-2"
              ></div>
            </v-col>

            <v-col cols="4" sm="3" md="4" lg="4">
              <div class="text-center antext subtitle-2 font-light">Available for</div>
              <div class="text-center grey--text text--lighten-2 title font-weight-bold">8 hours</div>
            </v-col>
            <v-col md="6" lg="8" cols="6" sm="4">
              <button class="hire py-3 mt-2">
                <div class="text-center grey--text text--lighten-2 font-weight-bold">HIRE ME</div>
              </button>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
      <v-row class="mt-md-6 mt-12 pt-6">
        <v-col lg="12" sm="12" cols="12" class="tablet">
          <v-tabs
            background-color="transparent"
            class="tabhigh"
            hide-slider
            hide-arrows
            center-active
            grow
          >
            <v-tab
              v-for="tab in tabs"
              :key="tab.id"
              @click="tablet = tab.name"
              class="ml-md-5 mr-md-10 mx-xs-2 text-left ml-0"
              exact-active-class
            >
              <v-btn fab text elevation="0" color="white">
                <v-img :src="tab.icon" width="64" height="64" contain></v-img>
              </v-btn>

              <div
                class="tabtitle textcol font-weight-bold text-capitalize mx-md-4 pl-2 mr-5"
              >{{ tab.name }}</div>
            </v-tab>
          </v-tabs>
        </v-col>
      </v-row>
      <v-row>
        <v-slide-x-reverse-transition>
          <v-col md="12" cols="12" xl="12" lg="12" sm="12" v-if="tablet=='Portfolio'" key="one">
            <v-row justify="center" align="center" class="mt-12" no-gutters>
              <v-col
                xl="3"
                md="4"
                cols="12"
                sm="12"
                class="mx-xl-3 px-sm-4 py-sm-8 pl-1 py-xs-4"
                v-for="img in images"
                :key="img.id"
              >
                <v-img
                  :src="img.src"
                  aspect-ratio="1.2"
                  style="box-shadow: 0px 4px 30px rgba(0, 0, 0, 0.15);border-radius:20px;"
                ></v-img>
              </v-col>
            </v-row>
          </v-col>
        </v-slide-x-reverse-transition>
        <v-slide-x-reverse-transition>
          <v-col md="12" cols="12" xl="12" lg="12" sm="12" v-if="tablet=='Work'" key="two">
            <v-row justify="center" class="mt-12">
              <v-col md="10" sm="12">
                <v-row justify="center">
                  <v-col md="6" sm="12" cols="12" v-for="n in 4" :key="n">
                    <v-row justify="start" class="layer ma-md-4 py-md-6 mx-xs-4 py-xs-2" no-gutters>
                      <v-row class="pl-md-12 ml-sm-12 pl-6 mt-md-4 mt-4" no-gutters>
                        <v-col md="2" sm="3" cols="12">
                          <h1 class="textcol headline font-weight-bold">{{ temp.title }}</h1>
                        </v-col>
                        <v-col md="8" sm="7" cols="12" class="text-md-center pr-md-12">
                          <h1
                            class="subtitle-2 pb-2 mr-12 grey--text text--lighten-2"
                          >{{ temp.sub }}</h1>
                        </v-col>
                        <v-row class="pr-6 mt-md-8 pb-6">
                          <v-col md="3" sm="3" cols="12">
                            <h1
                              class="d-inline-block subtitle-2 grey--text text--lighten-2"
                            >Duration :</h1>
                            <h1
                              class="d-inline-block subtitle-2 font-weight-bold textcol"
                              style="color:#F97CB3;"
                            >{{ temp.duration }}</h1>
                          </v-col>
                          <v-col md="8" sm="7" cols="12" class="px-md-12 pb-12 pr-12">
                            <h1
                              class="grey--text text--lighten-2 sfont pb-2 font-weight-thin"
                            >{{ temp.para }}</h1>
                          </v-col>
                        </v-row>
                      </v-row>
                    </v-row>
                  </v-col>
                </v-row>
              </v-col>
            </v-row>
          </v-col>
        </v-slide-x-reverse-transition>
        <v-slide-x-reverse-transition>
          <v-col md="12" cols="12" xl="12" lg="12" sm="12" v-if="tablet=='Education'" key="three">
            <v-row justify="center" class="mt-12">
              <v-col md="10" sm="12">
                <v-row justify="center" class="mx-xs-1">
                  <v-col md="6" sm="12" cols="12" v-for="n in 4" :key="n">
                    <v-row justify="center" class="layer ma-md-4 py-md-6 ma-1 py-xs-3" no-gutters>
                      <v-col cols="12" md="12" class="pl-md-6 pl-3">
                        <v-row class="pl-md-12 ml-sm-12 pl-6 mt-md-4" no-gutters>
                          <v-col md="3" sm="3" cols="3" class="text-center pr-12 mt-4">
                            <h1
                              class="grey--text text--lighten-3 subtitle-2 pb-2 mr-12"
                            >{{ emp.sub }}</h1>
                          </v-col>
                          <v-col md="12" sm="12" cols="12">
                            <h1 class="textcol headline font-weight-bold">{{ emp.title }}</h1>
                          </v-col>
                          <v-row no-gutters class="pr-6 mt-md-4 pb-sm-6 mt-2">
                            <v-col md="6" sm="6" cols="12" class="my-xs-4">
                              <h1
                                class="subtitle-2 font-weight-bold grey--text text--lighten-2"
                              >{{ emp.duration }}</h1>
                            </v-col>

                            <v-col md="8" sm="8" cols="12" class="pb-6 pr-0">
                              <h1
                                class="grey--text text--lighten-1 sfont pb-2 font-weight-thin"
                              >{{ emp.para }}</h1>
                            </v-col>
                          </v-row>
                        </v-row>
                      </v-col>
                    </v-row>
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
            v-if="tablet=='Skills'"
            key="four"
            style="height:100vh;"
          >
            <v-row no-gutters justify="start" class="padleft">
              <v-col md="12" lg="12">
                <v-tabs
                  v-model="tabskill"
                  background-color="transparent"
                  height="60"
                  color="#C10FA0"
                  center-active
                  hide-arrows
                  grow
                >
                  <v-tabs-slider style="height:0px;padding:0 0 !important;"></v-tabs-slider>
                  <v-tab
                    v-for="item in items"
                    :key="item.id"
                    exact
                    class="subtitle-1 text-capitalize textcol skilltab"
                  >{{ item.name }}</v-tab>
                </v-tabs>

                <v-row no-gutters class="mt-4">
                  <v-col md="12" sm="12" cols="12">
                    <v-tabs-items v-model="tabskill" style="background-color:transparent;">
                      <v-tab-item v-for="item in items" :key="item.id">
                        <v-row class="justify-center py-2" align="center" no-gutters>
                          <v-col
                            xl="8"
                            lg="8"
                            md="8"
                            sm="12"
                            cols="12"
                            v-for="(s, index) in item.skills"
                            :key="index"
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
                                  class="skilltext text-left font-weight-bold mb-sm-1 mb-1"
                                >{{ s.name }} - {{ s.val }}</div>
                              </v-col>

                              <v-col cols="12" sm="12" md="9" lg="8">
                                <div class="pro-back ml-md-11 my-5">
                                  <div class="progress" :style="'width:'+ s.val "></div>
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
    </section>
  </v-app>
</template>

<style lang="scss" scoped>
@import "https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900&display=swap";
@import "resources/sass/themes/theme505.scss";
</style>

<script>
export default {
  data() {
    return {
      tablet: "Portfolio",
      tabskill: null,
      media: [
        {
          id: 1,
          src: "/images/resume_themes/theme505/email.svg"
        },
        {
          id: 2,
          src: "/images/resume_themes/theme505/video-player.svg"
        },
        {
          id: 3,
          src: "/images/resume_themes/theme505/headphones.svg"
        }
      ],
      icons: [
        {
          id: 1,
          src: "/images/resume_themes/theme505/instagram.svg"
        },
        {
          id: 2,
          src: "/images/resume_themes/theme505/linkedin.svg"
        },
        {
          id: 3,
          src: "/images/resume_themes/theme505/facebook.svg"
        },
        {
          id: 4,
          src: "/images/resume_themes/theme505/behance.svg"
        }
      ],
      images: [
        {
          id: 1,
          src: "/images/resume_themes/theme505/img1.png"
        },
        {
          id: 2,
          src: "/images/resume_themes/theme505/img2.png"
        },
        {
          id: 3,
          src: "/images/resume_themes/theme505/img3.png"
        },
        {
          id: 4,
          src: "/images/resume_themes/theme505/img4.png"
        },
        {
          id: 5,
          src: "/images/resume_themes/theme505/img5.png"
        },
        {
          id: 6,
          src: "/images/resume_themes/theme505/img6.png"
        }
      ],
      tabs: [
        {
          id: 1,
          name: "Portfolio",
          icon: "/images/resume_themes/theme505/portfolio.svg",
          link: "/"
        },
        {
          id: 2,
          name: "Work",
          icon: "/images/resume_themes/theme505/work.svg",
          link: "/work"
        },
        {
          id: 3,
          name: "Education",
          icon: "/images/resume_themes/theme505/education.svg",
          link: "/education"
        },
        {
          id: 4,
          name: "Skills",
          icon: "/images/resume_themes/theme505/skills.svg",
          link: "/skills"
        }
      ],
      temp: {
        icon: "/images/resume_themes/theme505/work.svg",
        title: "Google",
        sub: "User interface designer",
        duration: "Dec 19 - Present",
        para:
          "I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes."
      },
      emp: {
        icon: "/images/resume_themes/theme505/education.svg",
        title: "California Institute of Technology",
        sub: "University",
        duration: "M.Sc in HCI, Dec 19 - Present",
        para:
          "I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your  and make changes."
      },
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
    scrollToEnd: function() {
      var container = this.$el.querySelector("#container");
      container.scrollTop = container.scrollHeight;
    }
  }
};
</script>




