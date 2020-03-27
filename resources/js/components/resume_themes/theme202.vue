<template>
  <v-app style="width:100%">
    <v-container
      fluid
      ma-0
      pa-0
      style="background-color:rgba(16, 78, 251, 0.06); max-width:1920px !important; "
    >
      <v-layout row wrap>
        <v-flex xs12>
          <v-card color="#104EFB" class="custom-parent-card">
            <v-card-text>
              <div class="circle1"></div>
              <div class="circle2"></div>
              <v-container class="themeWrapperBlue">
                <v-layout row wrap>
                  <!-- Profile Pic -->
                  <v-flex xs12 sm6 md3 class="ml-md-n2 ml-sm-0">
                    <v-card color="transparent" dark flat>
                      <v-card-text>
                        <v-list-item>
                          <v-list-item-avatar color="grey darken-3" size="120" max-width="120">
                            <v-img
                              class="elevation-6 avatar-border"
                              src="https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShortCurly&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=Hoodie&clotheColor=White&eyeType=Default&eyebrowType=DefaultNatural&mouthType=Default&skinColor=Light"
                            ></v-img>
                          </v-list-item-avatar>
                          <v-list color="transparent" class="ml-n5" disabled>
                            <v-list-item-group v-model="item" color="primary">
                              <v-list-item>
                                <v-list-item-content>
                                  <v-list-item-title class="headline">
                                    <span class="title-text">Conor</span>
                                  </v-list-item-title>
                                </v-list-item-content>
                                <v-list-item-icon>
                                  <v-btn btn small dark color="#104EFB" depressed class="">
                                    <img
                                      width="20"
                                      src="/images/resume_themes/theme202/icons/message.png"
                                    />
                                  </v-btn>
                                </v-list-item-icon>
                              </v-list-item>
                            </v-list-item-group>
                            <!-- Designation Group -->
                            <v-list-item-group v-model="item2" color="primary" class="mt-n6">
                              <v-list-item>
                                <v-list-item-content>
                                  <v-list-item-subtitle class="subtitle-text">Web Designer</v-list-item-subtitle>
                                </v-list-item-content>
                              </v-list-item>
                            </v-list-item-group>
                            <!-- Designation group -->
                            <!-- Interview -->
                            <v-list-item-group color="primary">
                              <v-list-item>
                                <v-list-item-content>
                                  <v-list-item-subtitle class="interview-text mr-2">Interview</v-list-item-subtitle>
                                </v-list-item-content>
                                <v-list-item-icon>
                                  <v-btn depressed small dark color="#104EFB">
                                    <img
                                      height="19"
                                      src="/images/resume_themes/theme202/icons/audio-speaker-on.png"
                                    />
                                  </v-btn>
                                </v-list-item-icon>

                                <v-list-item-icon>
                                  <v-btn depressed small dark color="#104EFB" class="ml-n5">
                                    <img
                                      height="19"
                                      src="/images/resume_themes/theme202/icons/video-camera.png"
                                      style="margin-top:-4px;"
                                    />
                                  </v-btn>
                                </v-list-item-icon>
                              </v-list-item>
                            </v-list-item-group>
                            <!-- Interview -->
                          </v-list>
                        </v-list-item>
                      </v-card-text>
                    </v-card>
                  </v-flex>
                  <!-- Profile Pic -->

                  <!-- Social Icons -->
                  <v-flex
                    class="mt-n3 mt-md-0 mt-sm-0"
                    d-flex
                    xs12
                    sm6
                    md5
                    align-center
                    justify-center
                  >
                    <v-card color="transparent" flat class="custom-social-media-card">
                      <v-card-text class="custom-card-text" align="center">
                        <v-btn depressed class="mx-1 custom-social-btn hidden-sm-and-up">
                          <img
                            width="16"
                            src="/images/resume_themes/theme202/social_icons/behance.webp"
                          />
                        </v-btn>
                        <v-btn depressed class="mx-1 custom-social-btn">
                          <img
                            width="16"
                            src="/images/resume_themes/theme202/social_icons/dribbble.webp"
                          />
                        </v-btn>
                        <v-btn depressed class="mx-1 custom-social-btn">
                          <img
                            width="16"
                            src="/images/resume_themes/theme202/social_icons/pinterest.webp"
                          />
                        </v-btn>
                        <v-btn depressed class="mx-1 custom-social-btn">
                          <img
                            width="16"
                            src="/images/resume_themes/theme202/social_icons/instagram.webp"
                          />
                        </v-btn>

                        <v-btn depressed class="mx-1 custom-social-btn">
                          <img
                            width="16"
                            src="/images/resume_themes/theme202/social_icons/linkedin.webp"
                          />
                        </v-btn>
                      </v-card-text>
                    </v-card>
                  </v-flex>
                  <!-- Social Icons -->

                  <v-flex xs12 md10 class="hidden-sm-and-up mb-md-1 mb-sm-1"></v-flex>
                  <!-- Availability -->
                  <v-flex
                    d-flex
                    xs12
                    sm12
                    md4
                    align-center
                    justify-center
                    mt-xs-10
                    mb-md-0
                    mb-sm-12
                  >
                    <v-card flat class="hire-me pa-0 ml-md-n12">
                      <v-card-text>
                        <v-layout row justify-center align-center>
                          <v-flex xs6 sm4 md3>
                            <div class="caption hire-me-title-text">$10</div>
                            <div class="hire-me-subtitle-text">Hourly Rate</div>
                          </v-flex>
                          <v-flex xs6 sm4 md4>
                            <div class="caption hire-me-title-text">35 HOURS</div>
                            <div class="hire-me-subtitle-text">Weekly availibility</div>
                          </v-flex>
                          <v-flex xs5 sm3 md4>
                            <div class="circle3 d-none d-sm-none d-md-flex"></div>
                            <div class="circle4 d-none d-sm-none d-md-flex"></div>
                            <div class="mt-10 hidden-sm-and-up"></div>
                            <!-- Hire Me Button -->
                            <div class="caption ml-md-3 mr-md-n3">
                              <v-btn
                                block
                                color="#104EFB"
                                height="45"
                                dark
                                class="btn-hire-me"
                              >HIRE ME</v-btn>
                            </div>
                            <!-- Hire Me Buton -->
                          </v-flex>
                        </v-layout>
                      </v-card-text>
                    </v-card>
                  </v-flex>
                  <!-- Social  -->
                </v-layout>
              </v-container>
            </v-card-text>
          </v-card>
        </v-flex>
      </v-layout>

      <!-- Tabs -->
      <v-container class="themeWrapperBlue">
        <v-layout
          class="tab-layout"
          row
          wrap
          my-md-n11
          my-sm-n11
          justify-center
          align-center
        >
          <v-flex xs10 md11 sm10>
            <v-card flat class="card-tab">
              <!-- Main Tab -->
              <v-tabs
                v-model="tab"
                centered
                background-color="white"
                color="#104EFB"
                show-arrows
                hide-slider
              >
                <v-tab
                  :ripple="false"
                  class="tab-text text-capitalize"
                  v-for="item in tabs"
                  :key="item.id"
                  @click="currentTab = item.id"
                  :class="[
                  currentTab == item.id ? 'active-tab': ''
                ]"
                >{{ item.title }}</v-tab>
              </v-tabs>
              <!-- Main Tab -->
            </v-card>

            <v-tabs-items v-model="tab" class="mt-12 mt-xs-10">
              <!-- Skills -->
              <v-tab-item>
                <v-card flat tile color="rgba(16, 78, 251, 0.06)">
                  <v-card-text>
                    <!-- Skills Tabs-->
                    <v-tabs
                      v-model="skillTab"
                      centered
                      grow
                      background-color="transparent"
                      show-arrows
                      hide-slider
                    >
                      <v-tab class="text-capitalize child-tab-text">Programming</v-tab>
                      <v-tab class="text-capitalize child-tab-text">Frameworks/Databases</v-tab>
                      <v-tab class="text-capitalize child-tab-text">Design Skills</v-tab>
                      <v-tab class="text-capitalize child-tab-text">Software</v-tab>
                    </v-tabs>
                    <hr class="separator-line mt-5" />

                    <v-tabs-items v-model="skillTab" class="my-8">
                      <!-- Programming -->
                      <v-tab-item v-for="i in 4" :key="i">
                        <v-card flat color="rgba(16, 78, 251, 0.06)">
                          <v-card-text class="card-text-center">
                            <v-layout row wrap justify-center align-center>
                              <!-- Photoshop Skill -->
                              <v-flex xs2 align="center">
                                <div class="caption">
                                  <v-progress-circular
                                    class="custom-progress-bar"
                                    size="45"
                                    rotate="180"
                                    :value="64"
                                    color="#104EFB"
                                  >
                                    <span class="progress-value-text">64%</span>
                                  </v-progress-circular>
                                </div>
                                <div class="my-10">
                                  <img
                                    class="skill-img"
                                    src="/images/resume_themes/theme202/skills/photoshop.png"
                                  />
                                </div>
                              </v-flex>
                              <!-- Photoshop skill -->

                              <!-- Illustrator Skill -->
                              <v-flex xs2 align="center">
                                <div class="caption">
                                  <v-progress-circular
                                    class="custom-progress-bar"
                                    size="45"
                                    rotate="180"
                                    :value="76"
                                    color="#104EFB"
                                  >
                                    <span class="progress-value-text">76%</span>
                                  </v-progress-circular>
                                </div>
                                <div class="my-10">
                                  <img
                                    class="skill-img"
                                    src="/images/resume_themes/theme202/skills/illustrator.png"
                                  />
                                </div>
                              </v-flex>
                              <!-- Illustrator Skill -->

                              <!-- Sketch Skill -->
                              <v-flex xs2 align="center">
                                <div class="caption">
                                  <v-progress-circular
                                    class="custom-progress-bar"
                                    size="45"
                                    rotate="180"
                                    :value="60"
                                    color="#104EFB"
                                  >
                                    <span class="progress-value-text">60</span>
                                  </v-progress-circular>
                                </div>
                                <div class="my-10">
                                  <img
                                    class="skill-img"
                                    src="/images/resume_themes/theme202/skills/sketch.png"
                                  />
                                </div>
                              </v-flex>
                              <!-- Sketch Skill -->

                              <!-- XD Skill -->
                              <v-flex xs2 align="center">
                                <div class="caption">
                                  <v-progress-circular
                                    class="custom-progress-bar"
                                    size="45"
                                    rotate="180"
                                    :value="70"
                                    color="#104EFB"
                                  >
                                    <span class="progress-value-text">70%</span>
                                  </v-progress-circular>
                                </div>
                                <div class="my-10">
                                  <img
                                    class="skill-img"
                                    src="/images/resume_themes/theme202/skills/xd.png"
                                  />
                                </div>
                              </v-flex>
                              <!-- XD Skill -->

                              <!-- Figma -->
                              <v-flex xs2 align="center">
                                <div class="caption">
                                  <v-progress-circular
                                    class="custom-progress-bar"
                                    size="45"
                                    rotate="180"
                                    :value="97"
                                    color="#104EFB"
                                  >
                                    <span class="progress-value-text">97</span>
                                  </v-progress-circular>
                                </div>
                                <div class="my-10">
                                  <img
                                    class="skill-img-figma"
                                    width="38.36"
                                    src="/images/resume_themes/theme202/skills/figma.png"
                                  />
                                </div>
                              </v-flex>
                              <!-- Figma -->
                            </v-layout>
                          </v-card-text>
                        </v-card>
                      </v-tab-item>
                      <!-- Programming -->
                    </v-tabs-items>

                    <!-- Skills Tabs -->
                  </v-card-text>
                </v-card>
              </v-tab-item>
              <!-- Skills -->

              <!-- ................................................Portfolio........................................ -->
              <!-- Portfolio -->
              <v-tab-item>
                <v-card flat color="rgba(16, 78, 251, 0.06)">
                  <v-card-text>
                    <v-layout row wrap align-center justify-center>
                      <v-flex xs12 sm10 md6 pa-md-8 mb-sm-10 mb-10>
                        <v-card elevation="6" class="card-portfolio">
                          <v-toolbar color="#104EFB" dark height="100">
                            <v-toolbar-title>
                              <div style="text-align:left;" class="ml-10">
                                <div class="title">
                                  <span class="portfolio-title">Mobile App "Join"</span>
                                </div>
                                <div class="caption">
                                  <span class="portifolio-subtitle">Web Design, Ui/Ux</span>
                                </div>
                              </div>
                            </v-toolbar-title>
                            <v-spacer></v-spacer>
                            <v-btn icon>
                              <v-icon>mdi-dots-vertical</v-icon>
                            </v-btn>
                          </v-toolbar>

                          <v-card-text align="center">
                            <v-img
                              aspect-ratio="1.4"
                              src="/images/resume_themes/theme202/portfolio/1.png"
                            ></v-img>
                          </v-card-text>
                        </v-card>
                      </v-flex>

                      <v-flex xs12 sm10 md6 pa-md-8 mb-sm-10>
                        <v-card elevation="6" class="card-portfolio">
                          <v-toolbar color="#104EFB" dark height="100">
                            <v-toolbar-title>
                              <div style="text-align:left;" class="ml-10">
                                <div class="title">
                                  <span class="portfolio-title">Mobile App "Join"</span>
                                </div>
                                <div class="caption">
                                  <span class="portifolio-subtitle">Web Design, Ui/Ux</span>
                                </div>
                              </div>
                            </v-toolbar-title>
                            <v-spacer></v-spacer>
                            <v-btn icon>
                              <v-icon>mdi-dots-vertical</v-icon>
                            </v-btn>
                          </v-toolbar>

                          <v-card-text align="center">
                            <v-img
                              aspect-ratio="1.4"
                              src="/images/resume_themes/theme202/portfolio/2.png"
                            ></v-img>
                          </v-card-text>
                        </v-card>
                      </v-flex>
                    </v-layout>
                  </v-card-text>
                  <v-card-text class="card-text-center">
                    <v-btn icon class="mr-5" color="primary">
                      <v-icon>mdi-arrow-left</v-icon>
                    </v-btn>
                    <v-btn icon class="ml-5" color="primary">
                      <v-icon>mdi-arrow-right</v-icon>
                    </v-btn>
                  </v-card-text>
                </v-card>
              </v-tab-item>
              <!-- Portfolio -->
              <!-- ...................................Portfoilo................................................... -->

              <!-- .............................. Work ............................................-->
              <v-tab-item>
                <v-card flat color="rgba(16, 78, 251, 0.06)">
                  <v-card-text>
                    <v-layout row wrap align-center justify-center>
                      <!-- 1st Card -->
                      <v-flex xs12 md6 ma-0 pa-5 mb-10 v-for="i in 4" :key="i">
                        <v-card elevation="6" class="card-portfolio">
                          <v-card-text>
                            <v-layout row wrap justify-center align-center>
                              <v-flex xs12 mt-5 mb-5 class="hidden-sm-and-down">
                                <div align="center">
                                  <v-img
                                    width="32"
                                    height="30"
                                    src="/images/resume_themes/theme202/icons/work.png"
                                  ></v-img>
                                </div>
                              </v-flex>
                              <v-flex xs12 md4 class="hidden-sm-and-down">
                                <v-card flat>
                                  <v-card-text>
                                    <v-list-item three-line>
                                      <v-list-item-content>
                                        <v-list-item-title class="mb-12 card-work-title-left">
                                          <span class>
                                            Graphic &
                                            <br />Web Designer
                                          </span>
                                        </v-list-item-title>
                                        <v-list-item-subtitle class="card-work-subtitle">2018-2019</v-list-item-subtitle>
                                      </v-list-item-content>
                                    </v-list-item>
                                  </v-card-text>
                                </v-card>
                              </v-flex>
                              <!-- This potion is only shows on sm and xs devices -->
                              <v-flex xs12 class="hidden-md-and-up">
                                <v-card color="transparent" flat>
                                  <v-card-text class>
                                    <v-container mx-sm-6>
                                      <v-layout row wrap>
                                        <v-flex xs2 sm2 class>
                                          <img
                                            width="25"
                                            src="/images/resume_themes/theme202/icons/work.png"
                                          />
                                        </v-flex>
                                        <v-flex xs8 sm6 class="mt-1">
                                          <span
                                            class="card-work-title-left text-center"
                                          >Graphic & Web Designer</span>
                                        </v-flex>
                                        <v-flex
                                          xs6
                                          sm4
                                          offset-xs-2
                                          class="mt-sm-1 offset-2 offset-sm-0"
                                        >
                                          <span class="card-work-subtitle">2018-2019</span>
                                        </v-flex>
                                      </v-layout>
                                    </v-container>
                                  </v-card-text>
                                </v-card>
                              </v-flex>
                              <!-- This potion is only shows on sm and xs devices -->

                              <v-flex xs12 md8>
                                <v-card flat class="mx-sm-5">
                                  <v-list-item three-line>
                                    <v-list-item-content>
                                      <v-list-item-title class="caption">
                                        <span class="card-work-title-right">Company "React"</span>
                                      </v-list-item-title>

                                      <v-list-item-subtitle
                                        class="card-work-details"
                                      >- Turning creative concepts into finished websites.</v-list-item-subtitle>
                                      <v-list-item-subtitle
                                        class="card-work-details"
                                      >- Drawing up detailed website s pecifications.</v-list-item-subtitle>
                                      <v-list-item-subtitle
                                        class="card-work-details"
                                      >- Building websites that are easy to understand, navigate and use.</v-list-item-subtitle>
                                      <v-list-item-subtitle
                                        class="card-work-details"
                                      >- Designing sample page layouts.</v-list-item-subtitle>
                                      <v-list-item-subtitle
                                        class="card-work-details"
                                      >- Ensuring that the website complies with the company’s brand guidelines.</v-list-item-subtitle>
                                    </v-list-item-content>
                                  </v-list-item>
                                </v-card>
                              </v-flex>
                            </v-layout>
                          </v-card-text>
                        </v-card>
                      </v-flex>
                      <!-- 1st card -->

                      <!-- 4th Card -->
                    </v-layout>
                  </v-card-text>
                </v-card>
              </v-tab-item>
              <!-- ........................Work........................................... -->

              <!-- ......................................Education..................................... -->
              <v-tab-item>
                <v-card flat color="rgba(16, 78, 251, 0.06)">
                  <v-card-text>
                    <v-layout row wrap align-center justify-center>
                      <!-- 1st Card -->
                      <v-flex xs12 md6 ma-0 pa-5 mb-10 v-for="i in 4" :key="i">
                        <v-card elevation="6" class="card-portfolio">
                          <v-card-text>
                            <v-layout row wrap justify-center align-center>
                              <!-- Hidden in sm and down -->
                              <v-flex xs12 mt-5 mb-5 class="hidden-sm-and-down">
                                <div align="center">
                                  <v-img
                                    width="32"
                                    height="30"
                                    src="/images/resume_themes/theme202/icons/education.png"
                                  ></v-img>
                                </div>
                              </v-flex>
                              <v-flex xs12 md4 mt-md-n12 class="hidden-sm-and-down">
                                <v-card flat>
                                  <v-card-text>
                                    <div class="card-work-title-left mb-8 mx-2">
                                      Master in
                                      <br />Web Developer
                                    </div>
                                    <p class="card-work-subtitle mx-2">2015-2016</p>
                                  </v-card-text>
                                </v-card>
                              </v-flex>
                              <!-- Hidden and sm and down -->

                              <!-- Hidden in md and up -->
                              <v-flex xs12 class="hidden-md-and-up">
                                <v-card color="transparent" flat>
                                  <v-card-text class>
                                    <v-container mx-sm-6 grid-list-xs>
                                      <v-layout row wrap>
                                        <v-flex xs2 sm2 class>
                                          <img
                                            width="25"
                                            src="/images/resume_themes/theme202/icons/work.png"
                                          />
                                        </v-flex>
                                        <v-flex xs8 sm6 class="mt-1">
                                          <span
                                            class="card-work-title-left text-center"
                                          >Master in Web Developer</span>
                                        </v-flex>
                                        <v-flex xs6 sm4 class="mt-sm-1 offset-2 offset-sm-0">
                                          <span class="card-work-subtitle">2015-2016</span>
                                        </v-flex>
                                      </v-layout>
                                    </v-container>
                                  </v-card-text>
                                </v-card>
                              </v-flex>
                              <!-- Hidden in md and up -->

                              <v-flex xs12 md8>
                                <v-card flat>
                                  <v-card-text>
                                    <v-list-item three-line>
                                      <v-list-item-content>
                                        <v-list-item-title class="caption">
                                          <span
                                            class="card-work-title-right"
                                          >Envision Media, Inc., Santa Cruz, CA</span>
                                        </v-list-item-title>

                                        <v-list-item-subtitle
                                          class="card-work-details"
                                        >- Turning creative concepts into finished websites.</v-list-item-subtitle>
                                        <v-list-item-subtitle
                                          class="card-work-details"
                                        >- Drawing up detailed website s pecifications.</v-list-item-subtitle>
                                        <v-list-item-subtitle
                                          class="card-work-details"
                                        >- Building websites that are easy to understand, navigate and use.</v-list-item-subtitle>
                                        <v-list-item-subtitle
                                          class="card-work-details"
                                        >- Designing sample page layouts.</v-list-item-subtitle>
                                        <v-list-item-subtitle
                                          class="card-work-details"
                                        >- Ensuring that the website complies with the company’s brand guidelines.</v-list-item-subtitle>
                                      </v-list-item-content>
                                    </v-list-item>
                                  </v-card-text>
                                </v-card>
                              </v-flex>
                            </v-layout>
                          </v-card-text>
                        </v-card>
                      </v-flex>
                      <!-- 1st card -->
                    </v-layout>
                  </v-card-text>
                </v-card>
              </v-tab-item>
              <!-- .....................................Education................................................. -->
            </v-tabs-items>
          </v-flex>
        </v-layout>
      </v-container>
      <!-- Tabs -->
    </v-container>
  </v-app>
</template>

<script>
export default {
  name: "ResumeTheme202",
  data() {
    return {
      tab: null,
      item: null,
      item2: null,
      skillTab: null,
      currentTab: 1,
      tabs: [
        { id: 1, title: "Skills" },
        { id: 2, title: "Portfolio" },
        { id: 3, title: "Work" },
        { id: 4, title: "Education" }
      ]
    };
  }
};
</script>

<style scoped lang="scss">
@import url("https://fonts.googleapis.com/css?family=Actor&display=swap");
@import url("https://fonts.googleapis.com/css?family=Raleway&display=swap");
/* Theme Wrapper */
.themeWrapperBlue {
  max-width: 100%;
}
/* Theme wrapper*/

/* tab */
.active-tab {
  background-color: #ffffff !important;
  border-radius: 30px !important;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24) !important;
  height: 2.5rem;
  margin-top: 4px;
  overflow: hidden !important;
  width: 15%;
}

.active-tab:hover {
  border-radius: 30px !important;
  overflow: hidden !important;
}

.tab-text.active-tab {
  color: #104efb !important;
  border-radius: 30px !important;
}

.tab-text:hover {
  color: #104efb !important;
}

.active-tab:active {
  background-color: #ffffff !important;
  height: 100% !important;
}

/* tab */
.separator-line {
  border: 1px solid rgba(16, 78, 251, 0.12);
}
.portifolio-subtitle {
  font-family: Raleway !important;
}
.title-text {
  font-size: 25px !important;
  font-family: Raleway !important;
  font-style: normal;
}

.v-btn .hire-me-rounded-btn {
  font-size: 65px !important;
}

.subtitle-text {
  font-family: Raleway !important;
  font-style: normal;
  font-weight: normal;
  font-size: 18px !important;
  color: #ffffff !important;
}

.interview-text {
  font-family: Raleway !important;
  font-style: normal;
  font-weight: normal;
  font-size: 14px !important;
  color: #ffffff !important;
}

.hire-me {
  width: 700px;
  text-align: center !important;
  box-shadow: 0px 7px 9px rgba(16, 78, 251, 0.03) !important;
  border-radius: 50px !important;
}

.btn-hire-me {
  border-radius: 40px !important;
  height: 45px !important;
  margin-top: 0px !important;
}

.hire-me-title-text {
  font-weight: bold !important;
  font-size: 12px !important;
  line-height: 0.75rem !important;
  color: #104efb;
}

.hire-me-subtitle-text {
  font-family: Raleway !important;
  font-size: 12px !important;
  color: #104efb;
}

.social-media-block {
  padding: 0px;
}

.icon-message {
  margin-left: 75px;
}

.custom-social-btn {
  height: 45px !important;
  min-width: 40px !important;
  border-radius: 15px !important;
  box-shadow: 0px 7px 9px rgba(0, 31, 118, 0.08) !important;
  offset: 0px, 7px rgba(0, 31, 118, 0.08) !important;
}

.card-tab {
  box-shadow: 0px 7px 9px rgba(16, 78, 251, 0.03) !important;
  border-radius: 50px !important;
  padding: 7px;
}

.skill-img {
  width: 38.36px;
  height: 38.36px;
}

.card-text-center {
  text-align: center !important;
}

.card-portfolio {
  border-radius: 20px !important;
}

.card-work-title-left {
  color: #104efb !important;
  font-size: 16px !important;
}

.card-work-title-right {
  font-family: "Actor" !important;
  color: #104efb !important;
  font-size: 18px !important;
  font-weight: bold !important;
}

.portfolio-title {
  font-family: "Raleway" !important;
  font-weight: bold;
}

.card-work-subtitle {
  font-family: "Actor" !important;
  color: #104efb !important;
  font-size: 16px !important;
}

.card-work-details {
  font-family: Raleway !important;
  color: #104efb !important;
  font-size: 14px !important;
}

.tab-text {
  font-family: Raleway !important;
  font-size: 20px !important;
  margin-right: 2.8vw;
  color: rgba(16, 78, 251, 0.4) !important;
}

.child-tab-text {
  font-family: Raleway !important;
  font-size: 20px !important;
}

.avatar-border {
  border: 10px solid #1e86ff;
}

.circle1 {
  position: absolute;
  margin-top: -50px;
  width: 180px;
  height: 180px;
  border-radius: 50%;
  background: rgba(241, 244, 255, 0.1);
}

.circle2 {
  position: absolute;
  margin-left: -150px;
  width: 300px;
  height: 300px;
  border-radius: 50%;
  background: rgba(241, 244, 255, 0.1);
}

.circle3 {
  position: absolute;
  margin-top: -48px;
  margin-left: 173px;
  width: 150px;
  height: 150px;
  border-radius: 50%;
  background: rgba(241, 244, 255, 0.1);
}

.circle4 {
  position: absolute;
  margin-left: 93px;
  margin-top: -123px;
  width: 220px;
  height: 220px;
  border-radius: 50%;
  background: rgba(241, 244, 255, 0.1);
}

/* media query block */
@media screen and (min-width: 960px) and (max-width: 1263px) {
  .custom-social-media-card {
    margin-left: 90px;
  }
  .hire-me-subtitle-text {
    font-size: 10px !important;
  }
}

@media screen and (min-width: 600px) and (max-width: 959px) {
  .btn-hire-me {
    border-radius: 20px !important;
  }
  .hire-me {
    margin-left: 30px !important;
    margin-right: 30px !important;
  }
  .custom-social-btn {
    height: 45px;
  }
  .tab-text {
    font-size: 16px !important;
  }
  .child-tab-text {
    font-size: 18px !important;
  }
  /* Work */
  .card-work-title-left {
    text-align: center !important;
  }
  .card-work-subtitle {
    text-align: center !important;
  }
  /* Work */
  /* Circle */

  /* Circle */
}

@media screen and (max-width: 599px) {
  /* Active tab */
  .active-tab {
    height: 2rem;
    margin-top: 8px;
    padding: 0px !important;
  }
  /* Active tab */
  .custom-social-btn {
    height: 45px !important;
  }
  /* work/work portfolio */
  .card-work-title-left {
    text-align: center !important;
  }
  .card-work-subtitle {
    text-align: center !important;
  }
  /* Work/Portfolio */
  .custom-parent-card {
    height: 495px !important;
  }
  /* Parent tab text */
  .tab-layout {
    margin-top: -38px !important;
  }
  .tab-text {
    margin-right: 0px;
    font-size: 15px !important;
  }
  .child-tab-text {
    font-size: 14px !important;
  }
  .card-tab {
    padding: 0px;
  }
  /* Parent tab text  */
  /* circles */

  .v-btn.btn-hire-me {
    height: 60px !important;
    margin-top: -20px;
  }

  .hire-me {
    margin-left: 1px;
    width: 95% !important;
  }
  .btn-hire-me {
    border-radius: 20px !important;
  }
  /* circles */
  .skill-img {
    width: 30px;
    height: 30px;
  }

  .skill-img-figma {
    width: 40px;
    height: 30px;
  }

  .custom-progress-bar {
    height: 35px !important;
    width: 35px !important;
  }
  .progress-value-text {
    font-size: 8px !important;
  }
}
@media screen and (max-width: 360px) {
  .hire-me {
    margin-left: 13px !important;
  }

  .btn-hire-me {
    border-radius: 15px !important;
  }
}

/* media query block */
</style>