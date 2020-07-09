//theme-41-v3
<template>
  <v-app id="theme503">
    <v-row class="mt-6" no-gutters>
      <v-col xl="9" lg="9" md="9" sm="12" cols="12">
        <v-row align="center" no-gutters>
          <v-col
            cols="7"
            sm="9"
            md="7"
            lg="9"
            xl="9"
            offset-xl="1"
            offset-lg="1"
            offset-sm="3"
            offset="3"
            class="pl-md-12 pl-sm-6 pl-3 mt-lg-10"
          >
            <div class="head font-weight-bold">
              Carla Pipin Ranga
              <div
                class="text-left d-lg-inline-block d-sm-inline-block d-none hidden-xs-only pl-xl-8 pl-sm-8"
              >
                <v-btn class="px-0 mr-4" color="#3E56CD" fab elevation="0">
                  <v-img
                    width="18"
                    height="18"
                    contain
                    src="/images/resume_themes/theme502/email.svg"
                  ></v-img>
                </v-btn>
                <v-btn
                  class="px-0 mr-4"
                  color="#3E56CD"
                  small
                  fab
                  elevation="0"
                >
                  <v-img
                    width="24"
                    height="24"
                    contain
                    src="/images/resume_themes/theme502/pdf.svg"
                  ></v-img>
                </v-btn>
              </div>
            </div>

            <div class="subhead grey--text text--darken-1 pb-sm-8 pb-4">
              Web Ui/Ux Designer, Graphiс Designer
            </div>

            <div class="text-left hidden-sm-and-down">
              <v-btn
                class="px-0 mr-4"
                color="#3E56CD"
                fab
                v-for="icon in icons"
                :key="icon.id"
                small
                elevation="0"
              >
                <v-img width="18" height="18" contain :src="icon.src"></v-img>
              </v-btn>
            </div>
          </v-col>
        </v-row>
      </v-col>

      <v-col
        xl="2"
        lg="3"
        md="3"
        sm="10"
        cols="10"
        offset-xl="1"
        offset-lg="1"
        class="text-right mt-2 ml-lg-auto ml-md-auto ml-xl-auto ml-sm-12 ml-auto pr-xl-0 pr-lg-0 pr-md-0 pr-sm-12 mt-sm-12 ml-sm-0"
      >
        <div class="text-lg-center d-sm-none d-lg-inline-block d-none pr-lg-4">
          <v-btn fab color="#3E56CD" small elevation="0">
            <v-img
              src="/images/resume_themes/theme502/location.svg"
              width="16"
              height="16"
              contain
            ></v-img>
          </v-btn>
          <v-btn fab color="#3E56CD" small class="mx-3" elevation="0">
            <v-img
              src="/images/resume_themes/theme502/whatsapp.svg"
              width="16"
              height="16"
              contain
            ></v-img>
          </v-btn>
          <v-btn fab color="#3E56CD" small elevation="0">
            <v-img
              src="/images/resume_themes/theme502/google-plus.svg"
              width="18"
              height="18"
              contain
            ></v-img>
          </v-btn>
        </div>
        <div class="margicon text-left hidden-sm-and-up">
          <v-btn class="px-0 mr-4" color="#3E56CD" fab elevation="0">
            <v-img
              width="18"
              height="18"
              contain
              src="/images/resume_themes/theme502/email.svg"
            ></v-img>
          </v-btn>
          <v-btn class="px-0 mr-4" color="#3E56CD" small fab elevation="0">
            <v-img
              width="24"
              height="24"
              contain
              src="/images/resume_themes/theme502/pdf.svg"
            ></v-img>
          </v-btn>
        </div>
      </v-col>
      <v-col cols="12" class="mt-12 mt-sm-4">
        <v-sheet
          class="iconmarg hidden-md-and-up"
          width="auto"
          color="transparent"
        >
          <v-slide-group multiple>
            <v-slide-item
              v-for="icon in media"
              :key="icon.id"
              class="mx-5 hidden-md-and-up"
            >
              <v-btn class fab small color="#3E56CD" elevation="0">
                <v-img width="18" height="18" contain :src="icon.src"></v-img>
              </v-btn>
            </v-slide-item>
          </v-slide-group>
        </v-sheet>
      </v-col>
    </v-row>
    <v-row
      class="mt-sm-12 mt-md-6 mt-12 mt-lg-4 pt-md-0 pt-6 pt-lg-0 margleft"
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
          <v-tab class="text-center" @click="tab = 'About'">
            <div class="tabtitle textcol font-weight-bold text-capitalize">
              About
            </div>
          </v-tab>
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
          v-if="tab == 'About'"
          key="two"
          style="height:100vh;"
        >
          <v-row no-gutters class="padding">
            <v-col xl="12" sm="12" cols="12">
              <h1
                class="textcol head mb-xl-6 mt-xl-12 mb-sm-4 mt-sm-8 mt-6 mb-4"
              >
                About
              </h1>
            </v-col>
            <v-col
              xl="12"
              sm="12"
              cols="12"
              v-for="n in 6"
              :key="n"
              class="py-xl-4 py-sm-4 py-4"
            >
              <div class="subtitle-2 text-xl-left">
                I'm Conor, I'm a product manager from London. I'm currently
                looking for new permanent job opportunities within London area
                that will allow my career to develop...
              </div>
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
              v-for="img in images"
              :key="img.id"
            >
              <v-img
                :src="img.src"
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
              v-for="n in 4"
              :key="n"
              class="mt-4 padleft"
            >
              <v-row class="mt-4" no-gutters>
                <v-col md="12" sm="12" cols="12">
                  <h1 class="textcol headline font-weight-bold">
                    {{ temp.title }}
                  </h1>
                </v-col>
                <v-col md="6" sm="6" cols="6" class="text-md-left mt-2">
                  <h1
                    class="caption font-weight-bold pb-2 mr-lg-12 grey--text text--darken-4"
                  >
                    {{ temp.sub }}
                  </h1>
                </v-col>

                <v-col md="6" sm="6" cols="6" class="mt-2">
                  <h1
                    class="caption font-weight-bold text-right grey--text text--darken-4"
                  >
                    {{ temp.duration }}
                  </h1>
                </v-col>
                <v-col md="12" sm="12" cols="12" xl="12" class="my-6">
                  <div
                    class="grey--text text--darken-1 sfont pb-2 font-weight-thin"
                  >
                    {{ temp.para }}
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
              v-for="n in 4"
              :key="n"
              class="mt-4 padleft"
            >
              <v-row justify="start" class no-gutters>
                <v-row class="mt-md-4 mt-4" no-gutters>
                  <v-col md="12" sm="12" cols="12">
                    <h1 class="textcol headline font-weight-bold">
                      {{ emp.title }}
                    </h1>
                  </v-col>
                  <v-col md="12" sm="12" cols="12" class="text-md-left my-6">
                    <h1
                      class="caption font-weight-bold pb-2 mr-12 grey--text text--darken-4"
                    >
                      {{ emp.duration }}
                    </h1>
                  </v-col>

                  <v-col md="12" sm="12" cols="12" xl="12">
                    <div
                      class="grey--text text--darken-1 sfont pb-2 font-weight-thin"
                    >
                      {{ emp.para }}
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
                <v-tabs-slider
                  style="height:0px;padding:0 0 !important;"
                ></v-tabs-slider>
                <v-tab
                  v-for="item in items"
                  :key="item.id"
                  exact
                  class="subtitle-1 text-capitalize textcol skilltab"
                  >{{ item.name }}</v-tab
                >
              </v-tabs>

              <v-row no-gutters class="mt-4">
                <v-col md="12" sm="12" cols="12">
                  <v-tabs-items
                    v-model="tabskill"
                    style="background-color:transparent;"
                  >
                    <v-tab-item v-for="item in items" :key="item.id">
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
                                class="skilltext text-left font-weight-bold mb-sm-1 mb-xs-1"
                              >
                                {{ s.name }} - {{ s.val }}
                              </div>
                            </v-col>

                            <v-col cols="12" sm="12" md="9" lg="8">
                              <div class="pro-back ml-md-11 my-5">
                                <div
                                  class="progress"
                                  :style="'width:' + s.val"
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
@import "resources/sass/themes/theme504.scss";
.v-tabs-bar.v-slide-group--is-overflowing.v-tabs-bar--is-mobile:not(.v-tabs-bar--show-arrows):not(.v-slide-group--has-affixes)
  .v-slide-group__prev {
  display: none !important;
  visibility: hidden;
}

.v-slide-group__prev {
  align-items: center;
  display: none !important;

  justify-content: center;
  min-width: 0px !important;
}
</style>
<script>
export default {
  data() {
    return {
      tab: "About",
      media: [
        {
          id: 1,
          src: "/images/resume_themes/theme502/location.svg"
        },
        {
          id: 2,
          src: "/images/resume_themes/theme502/whatsapp.svg"
        },
        {
          id: 3,
          src: "/images/resume_themes/theme502/google-plus.svg"
        },
        {
          id: 4,
          src: "/images/resume_themes/theme502/linkedin.svg"
        },
        {
          id: 5,
          src: "/images/resume_themes/theme502/google-plus.svg"
        },
        {
          id: 6,
          src: "/images/resume_themes/theme502/behance.svg"
        },
        {
          id: 7,
          src: "/images/resume_themes/theme502/dribbble.svg"
        },
        {
          id: 8,
          src: "/images/resume_themes/theme502/instagram.svg"
        },
        {
          id: 9,
          src: "/images/resume_themes/theme502/linkedin.svg"
        },
        {
          id: 10,
          src: "/images/resume_themes/theme502/google-plus.svg"
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
  }
};
</script>

