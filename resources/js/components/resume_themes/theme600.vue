<template>
  <v-app style="width:100%;">
    <v-container class="hold_theme31" fluid style="width:100%;">
      <v-row class="freelancerCard">
        <v-col lg="12" md="12" cols="12" class="resumeCardRight">
          <v-row>
            <v-col lg="7" cols="12" sm="12" md="8">
              <v-card class="profile-bg-card">
                <div class="profile-info">
                  <v-row class="content-hide">
                    <v-col lg="2" sm="2">
                      <v-avatar size="100" class="mr-2">
                        <img src="/images/resume_themes/theme600/img/profile-pic.png" alt />
                      </v-avatar>
                    </v-col>

                    <v-col lg="6">
                      <div class="name-info">
                        <h2 class="freelancer-name">Beverly Andrews</h2>
                        <p>User interface designer</p>
                      </div>

                      <div class="resume">
                        <a href="#">
                          <v-icon>mdi-email</v-icon>
                        </a>
                        <a href="#" class="download">
                          <span>pdf</span>
                          <v-icon>mdi-download</v-icon>
                        </a>
                      </div>
                    </v-col>

                    <v-col lg="4">
                      <div class="social-wrap card-social-hold">
                        <a href="#">
                          <v-icon>mdi-map-marker</v-icon>
                        </a>
                        <a href="#">
                          <v-icon>mdi-whatsapp</v-icon>
                        </a>
                        <a href="#">
                          <v-icon>mdi-google-plus</v-icon>
                        </a>
                      </div>
                    </v-col>
                  </v-row>

                  <div class="content-show">
                    <div class="d-flex justify-space-around">
                      <v-avatar size="100" class="mr-2">
                        <img src="/images/resume_themes/theme600/img/profile-pic.png" alt />
                      </v-avatar>

                      <div>
                        <div class="name-info">
                          <h2 class="freelancer-name">Beverly Andrews</h2>
                          <p>User interface designer</p>
                        </div>

                        <div class="resume">
                          <a href="#" class="email">
                            <v-icon>mdi-email</v-icon>
                          </a>
                          <a href="#" class="download">
                            <span>pdf</span>
                            <v-icon>mdi-download</v-icon>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </v-card>
            </v-col>

            <v-col
              lg="5"
              cols="12"
              sm="12"
              md="4"
              class="d-flex justify-lg-end justify-md-end justify-sm-center justify-center"
            >
              <div class="social-wrap-pink custom-margin content-hide pr-7">
                <a href="#">
                  <img src="/images/resume_themes/theme600/behance.svg" alt />
                </a>
                <a href="#">
                  <img src="/images/resume_themes/theme600/dribble.svg" alt />
                </a>
                <a href="#">
                  <img src="/images/resume_themes/theme600/instagram.svg" alt />
                </a>
                <a href="#">
                  <img src="/images/resume_themes/theme600/linked-in.svg" alt />
                </a>
              </div>

              <div class="social-wrap content-show">
                <a href="#">
                  <v-icon>mdi-map-marker</v-icon>
                </a>
                <a href="#">
                  <v-icon>mdi-whatsapp</v-icon>
                </a>
                <a href="#">
                  <v-icon>mdi-google-plus</v-icon>
                </a>
                <a href="#">
                  <img src="/images/resume_themes/theme600/behance.svg" alt />
                </a>
                <a href="#">
                  <img src="/images/resume_themes/theme600/dribble.svg" alt />
                </a>
                <a href="#">
                  <img src="/images/resume_themes/theme600/instagram.svg" alt />
                </a>
                <a href="#">
                  <img src="/images/resume_themes/theme600/linked-in.svg" alt />
                </a>
              </div>
            </v-col>

            <div class="bg-eclipse1">
              <img src="/images/resume_themes/theme600/bg-eclipse1.svg" alt />
            </div>
            <div class="bg-eclipse2">
              <img src="/images/resume_themes/theme600/bg-eclipse2.svg" alt />
            </div>

            <v-col>
              <div class="hold-tabs">
                <v-tabs
                  v-model="activeTab"
                  background-color="transparent"
                  class="main-tab"
                  hide-slider
                  active-class="isActive"
                >
                  <v-tab
                    class="tab-bg mr-8"
                    v-for="(item,idx) in resume_tabs"
                    :key="idx"
                    :href="`#tab-${idx}`"
                    @click="setTab(item)"
                    :ripple="false"
                  >
                    <!-- <v-icon class="tab-icon">mdi-{{item.icon}}</v-icon> -->
                    <!-- <v-icon class="tab-icon">
                     
                    </v-icon>-->
                    <div class="label-icon">
                      <img :src="getImgUrl(item.icon)" alt />
                    </div>
                    {{ item.label }}
                  </v-tab>
                </v-tabs>
              </div>
            </v-col>

            <div class="hold-contents">
              <v-tabs-items
                class="bg-transparent"
                v-model="activeTab"
                active-class="content-margin"
              >
                <v-tab-item
                  transition="fade-transition"
                  reverse-transition="fade-transition"
                  value="tab-0"
                >
                  <div class="content content_margin">
                    <h2 class="display-1">About</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro nemo illum ex quae animi modi molestias</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro nemo illum ex quae animi modi molestias</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro nemo illum ex quae animi modi molestias</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro nemo illum ex quae animi modi molestias</p>
                  </div>
                </v-tab-item>

                <v-tab-item
                  transition="fade-transition"
                  reverse-transition="fade-transition"
                  value="tab-1"
                >
                  <div class="content_margin">
                    <v-row>
                      <v-col class="case-image" sm="6" md="3" lg="3" xl="3" cols="12">
                        <img
                          src="/images/resume_themes/theme600/img/portfolio-1.png"
                          alt="Portfolio Image"
                        />
                      </v-col>
                      <v-col class="case-image" lg="3" md="3" sm="6" xl="3" cols="12">
                        <img
                          src="/images/resume_themes/theme600/img/portfolio-2.png"
                          alt="Portfolio Image"
                        />
                      </v-col>
                      <v-col class="case-image" cols="12" lg="3" md="3" sm="6" xl="3">
                        <img
                          src="/images/resume_themes/theme600/img/potfolio-3.png"
                          alt="Portfolio Image"
                        />
                      </v-col>
                      <v-col class="case-image" cols="12" lg="3" md="3" sm="6" xl="3">
                        <img
                          src="/images/resume_themes/theme600/img/portfolio-4.png"
                          alt="Portfolio Image"
                        />
                      </v-col>
                      <v-col class="case-image" cols="12" lg="3" md="3" sm="6" xl="3">
                        <img
                          src="/images/resume_themes/theme600/img/potfolio-3.png"
                          alt="Portfolio Image"
                        />
                      </v-col>
                      <v-col class="case-image" cols="12" lg="3" md="3" sm="6" xl="3">
                        <img
                          src="/images/resume_themes/theme600/img/portfolio-4.png"
                          alt="Portfolio Image"
                        />
                      </v-col>
                    </v-row>
                  </div>
                </v-tab-item>

                <v-tab-item
                  class="works"
                  transition="fade-transition"
                  reverse-transition="fade-transition"
                  value="tab-2"
                >
                  <div class="content_margin">
                    <v-row>
                      <v-col sm="12" md="6" lg="6" xl="6" cols="12" pb="3">
                        <v-card class="bg-card">
                          <v-row>
                            <v-col md="2" cols="2">
                              <div class="avatar">
                                <img
                                  src="/images/resume_themes/theme600/img/works-icon.png"
                                  alt="Works Icon"
                                />
                              </div>
                            </v-col>

                            <v-col md="3" sm="10" cols="10" class="company-info ml-auto">
                              <h2 class="company-title">Google</h2>
                              <div class="extra-small-screen">
                                <p class="small-text">duration:</p>
                                <p class="date">Dec 19 - Present</p>
                              </div>

                              <p
                                class="desc hidden-md-and-up"
                              >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
                            </v-col>

                            <v-col
                              md="7"
                              sm="10"
                              cols="10"
                              class="job-info ml-auto hidden-sm-and-down visible-sm-only"
                            >
                              <p class="job-title">User interface designer</p>
                              <p
                                class="desc"
                              >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
                            </v-col>

                            <v-col
                              md="3"
                              sm="10"
                              cols="10"
                              class="company-info ml-auto hidden-sm-and-up hidden-xs-only"
                            >
                              <h2 class="company-title">Google</h2>
                              <p class="job-title">User interface designer</p>
                              <div class="d-inline-flex align-center mt-4 mb-4">
                                <p class="small-text mr-1">duration:</p>
                                <p class="date">Dec 19 - Present</p>
                              </div>
                              <p
                                class="desc"
                              >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
                            </v-col>
                          </v-row>
                        </v-card>
                      </v-col>

                      <v-col sm="12" md="6" lg="6" xl="6" cols="12" pb="3">
                        <v-card class="bg-card">
                          <v-row>
                            <v-col md="2" cols="2">
                              <div class="avatar">
                                <img
                                  src="/images/resume_themes/theme600/img/works-icon.png"
                                  alt="Works Icon"
                                />
                              </div>
                            </v-col>

                            <v-col md="3" sm="10" cols="10" class="company-info ml-auto">
                              <h2 class="company-title">Google</h2>
                              <div class="extra-small-screen">
                                <p class="small-text">duration:</p>
                                <p class="date">Dec 19 - Present</p>
                              </div>

                              <p
                                class="desc hidden-md-and-up"
                              >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
                            </v-col>

                            <v-col
                              md="7"
                              sm="10"
                              cols="10"
                              class="job-info ml-auto hidden-sm-and-down visible-sm-only"
                            >
                              <p class="job-title">User interface designer</p>
                              <p
                                class="desc"
                              >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
                            </v-col>

                            <v-col
                              md="3"
                              sm="10"
                              cols="10"
                              class="company-info ml-auto hidden-sm-and-up hidden-xs-only"
                            >
                              <h2 class="company-title">Google</h2>
                              <p class="job-title">User interface designer</p>
                              <div class="d-inline-flex align-center mt-4 mb-4">
                                <p class="small-text mr-1">duration:</p>
                                <p class="date">Dec 19 - Present</p>
                              </div>
                              <p
                                class="desc"
                              >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
                            </v-col>
                          </v-row>
                        </v-card>
                      </v-col>
                    </v-row>
                  </div>
                </v-tab-item>

                <v-tab-item
                  class="education"
                  transition="fade-transition"
                  reverse-transition="fade-transition"
                  value="tab-3"
                >
                  <div class="content_margin">
                    <v-row align="center">
                      <v-col sm="12" md="6" lg="6" xl="6" cols="12" pb="3">
                        <v-card class="bg-card">
                          <v-row>
                            <v-col md="2" cols="2">
                              <div class="avatar">
                                <img
                                  src="/images/resume_themes/theme600/img/works-icon.png"
                                  alt="Works Icon"
                                />
                              </div>
                            </v-col>

                            <v-col md="10" sm="10" cols="10" class="company-info">
                              <h2 class="company-title">California Institute of Technology</h2>
                              <div
                                class="d-flex align-center justify-space-between small-info mobile-screen-for-edu"
                              >
                                <div class="d-flex align-center">
                                  <p class="small-text">M.Sc in HCI</p>
                                  <p class="date">Dec 19 - Present</p>
                                </div>
                                <p class="university">university</p>
                              </div>
                              <p
                                class="desc"
                              >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
                            </v-col>
                          </v-row>
                        </v-card>
                      </v-col>

                      <v-col sm="12" md="6" lg="6" xl="6" cols="12" pb="3">
                        <v-card class="bg-card">
                          <v-row>
                            <v-col md="2" cols="2">
                              <div class="avatar">
                                <img
                                  src="/images/resume_themes/theme600/img/works-icon.png"
                                  alt="Works Icon"
                                />
                              </div>
                            </v-col>

                            <v-col md="10" sm="10" cols="10" class="company-info">
                              <h2 class="company-title">California Institute of Technology</h2>
                              <div
                                class="d-flex align-center justify-space-between small-info mobile-screen-for-edu"
                              >
                                <div class="d-flex align-center">
                                  <p class="small-text">M.Sc in HCI</p>
                                  <p class="date">Dec 19 - Present</p>
                                </div>
                                <p class="university">university</p>
                              </div>
                              <p
                                class="desc"
                              >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
                            </v-col>
                          </v-row>
                        </v-card>
                      </v-col>
                    </v-row>
                  </div>
                </v-tab-item>

                <v-tab-item
                  transition="fade-transition"
                  reverse-transition="fade-transition"
                  value="tab-4"
                >
                  <div class="content_margin">
                    <v-tabs
                      v-model="skillTab"
                      class="secondary-tab"
                      background-color="transparent"
                      centered
                      hide-slider
                      active-class="isActiveSkill"
                    >
                      <v-tab
                        class="skill-tab-bg"
                        v-for="(item,idx) in skillsTab"
                        :href="`#skillTab-${idx}`"
                        :key="idx"
                        @click="setTabSkill(idx)"
                        :ripple="false"
                      >{{ item }}</v-tab>
                    </v-tabs>

                    <div class="hold-skill-progress">
                      <v-tabs-items v-model="skillTab" class="bg-transparent">
                        <v-tab-item
                          transition="fade-transition"
                          reverse-transition="fade-transition"
                          v-for="(i,index) in 4"
                          :key="index"
                          :value="'skillTab-'+index"
                        >
                          <v-row class="skill-wrap">
                            <v-col
                              md="6"
                              lg="6"
                              class="box-skill"
                              cols="12"
                              sm="12"
                              v-for="i in 4"
                              :key="i"
                            >
                              <div class="logo-skill icon_ps">Ps</div>
                              <div class="info-skill">
                                <div class="head-skill">
                                  <span class="nameSkill">Photoshop</span>
                                  <span class="percentSkill">95%</span>
                                </div>
                                <v-progress-linear
                                  class="progress-bg"
                                  buffer-value="100"
                                  height="15px"
                                  value="95"
                                  background-color="rgba(228, 228, 228, 0.7)"
                                  color="blue"
                                  :rounded="true"
                                ></v-progress-linear>
                              </div>
                            </v-col>
                          </v-row>
                        </v-tab-item>
                      </v-tabs-items>
                    </div>
                  </div>
                </v-tab-item>
              </v-tabs-items>
            </div>
          </v-row>
        </v-col>
      </v-row>
    </v-container>
  </v-app>
</template>

<style lang="scss" scoped>
@import url("https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap|Material+Icons");
@import url("https://fonts.googleapis.com/css?family=Rubik:400,700&display=swap");

// Base Css Here Start

@import url("https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap|Material+Icons");

*,
*::before,
*::after {
  box-sizing: border-box;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}
.progress-bg {
  margin-left: -5px;
}
html,
body {
  line-height: 1.2;
}

body {
  position: relative;
  left: 0;
  width: 100%;
  height: 100vh;
  max-height: 100vh;
  margin: 0;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  cursor: default;
}

a {
  text-decoration: none;
}

b,
strong {
  display: inline-block;
  font-weight: 500;
}

h1,
h2,
h3,
h4 {
  font-weight: 700;
}

audio,
canvas,
iframe,
svg,
video,
img {
  vertical-align: middle;
}

hr {
  display: block;
  height: 1px;
  margin: 1rem 0;
  padding: 0;
  border: 0;
}

ul,
li {
  padding: 0;
  margin: 0;
  list-style: none;
}

fieldset {
  margin: 0;
  padding: 0;
  border: 0;
}

textarea {
  resize: none;
}

input::-moz-focus-inner {
  border: 0;
}

input:focus {
  border: 0;
}

a[href],
button {
  touch-action: manipulation;
}

figure {
  margin: 0;
}

body::after,
body::before {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  visibility: hidden;
  overflow: hidden;
  width: 1px;
  height: 1px;
}

a {
  position: relative;
  color: inherit;
  text-decoration: none;

  &:active,
  &:visited {
    color: inherit;
  }

  @at-root .pointerevents:not(.touchevents) &:hover {
    text-decoration: none;
  }
}

img {
  display: block;
  max-width: 100%;
  height: auto;
  margin-right: auto;
  margin-left: auto;
}

blockquote {
  margin-bottom: 2em;
  font-style: italic;
}

iframe,
object,
embed {
  width: 100%;
}

// Base Css Here End

a {
  text-decoration: none;
}

img {
  width: 100%;
}

.bg-eclipse1 {
  position: absolute;
  top: 0;
  right: 0;
}

.bg-eclipse2 {
  position: absolute;
  top: 55px;
  left: 20px;
  img {
    width: 55%;
  }
  @media screen and (max-width: 959px) {
    left: -8rem;
  }
}

.profile-bg-card {
  background: linear-gradient(
    99.62deg,
    #f9bfda 1.07%,
    #ffcad0 51.95%,
    #fdbeba 89.88%
  );
  position: relative;
  z-index: 5;
  box-shadow: 0px 4px 20px rgba(253, 191, 187, 0.44) !important;
  border-radius: 10px 10px 200px 10px !important;
  padding: 2rem;
  @media screen and (max-width: 575.98px) {
    border-radius: 5px 5px 120px 5px;
  }
}
.hold_theme31 {
  max-width: 1920px;
  margin: 0 auto;
  position: relative;
}
#ResumeTheme600 {
  background: #f2f5f9 !important;
  height: 100%;
}

.v-tabs-bar.v-slide-group--is-overflowing.v-tabs-bar--is-mobile:not(.v-tabs-bar--show-arrows):not(.v-slide-group--has-affixes)
  .v-slide-group__prev {
  display: none !important;
}

.resume {
  display: flex;
  align-items: center;
}

.card-social-hold {
  justify-content: flex-end;
}

.social-wrap-pink{
  display: flex;
  position: relative;
  z-index: 5;
  &.custom-margin {
    margin-top: 42px;
  }
  a {
    width: 40px !important;
    height: 40px !important;
    border-radius: 50%;
    display: inline-flex !important;
    align-items: center;
    justify-content: center;
    background: #fff;
    display: none;
    background: linear-gradient(99.62deg, #F9BFDA 1.07%, #FFCAD0 51.95%, #FDBEBA 89.88%);
    margin: 5px;
    img {
      width: 16px;
    }
    &.email {
      background: #fff !important;
    }
  }
}

.resume,
.social-wrap {
  display: flex;
  position: relative;
  z-index: 5;
  &.custom-margin {
    margin-top: 42px;
  }
  a {
    width: 40px !important;
    height: 40px !important;
    border-radius: 50%;
    display: inline-flex !important;
    align-items: center;
    justify-content: center;
    background: #fff;
    display: none;
    margin: 5px;
    img {
      width: 16px;
    }
    &.email {
      background: #fff !important;
    }
    @media screen and (max-width: 575.98px) {
      width: 40px !important;
      height: 40px !important;
      background: linear-gradient(
        92.63deg,
        #f9bfda 1.07%,
        #ffcad0 51.95%,
        #fdbeba 89.88%
      );
      box-shadow: 0px 4px 20px rgba(253, 191, 187, 0.44);
    }

    box-shadow: 0px 0px 20px rgba(187, 209, 244, 0.25);
    &.download {
      background: #fec8d1 !important;
      border: 3px solid #ffffff !important;
      box-sizing: border-box !important;
      padding: 17px;
      display: flex;
      flex-direction: column;
      @media screen and (max-width: 575.98px) {
        padding: 0;
      }

      span {
        text-transform: uppercase;
        color: #222d68;
        font-weight: 600;
        font-size: 8px;
        @media screen and (max-width: 575.98px) {
          display: none;
        }
      }
    }
    i {
      color: #222d68 !important;
      font-size: 19px;
      @media screen and (max-width: 575.98px) {
        font-size: 14px;
      }
    }
  }
}

.case-image {
  img {
    box-shadow: 0px 15px 30px rgba(56, 82, 206, 0.11);
    border-radius: 20px;
    height: 100%;
    object-fit: cover;
  }
}

.content-show {
  display: none !important;
}

@media screen and (max-width: 575.98px) {
  .content-show {
    display: flex !important;
  }

  .content-hide {
    display: none !important;
  }
}

.name-info {
  .freelancer-name {
    font-family: "Rubik";
    font-style: normal;
    font-weight: 700;
    line-height: 47px;
    color: #222d68;
    font-size: 1.8rem !important;
    text-transform: capitalize;
    @media screen and (max-width: 575.98px) {
      font-size: 20px !important;
      line-height: 28px;
    }
  }
  p {
    font-family: Rubik;
    font-style: normal;
    font-weight: normal;
    font-size: 17px;
    line-height: 25px;
    color: #fff;
    text-transform: inherit;
  }
}

.hold-tabs {
  width: 96%;
  margin: 3rem 0;
  margin-bottom: 0;
  margin-left: 2%;
  .main-tab {
    width: 100%;
  }

  .tab-bg {
    width: 200px !important;
    background: linear-gradient(
      99.48deg,
      #f9bfda 1.07%,
      #ffcad0 51.95%,
      #fdbeba 89.88%
    );
    opacity: 0.4;
    border-radius: 5px 5px 60px 5px;
    color: #222d68 !important;
    font-family: "Roboto";
    font-style: normal;
    font-weight: 600;
    &.isActive {
      opacity: 1;
    }
  }
}

.label-icon {
  width: 35px;
  height: 35px;
  background: #fff;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-left: -16px;
  margin-right: 8px;
  box-shadow: 0px 0px 20px rgba(187, 209, 244, 0.25);
  img {
    width: 50%;
    margin: 0 auto;
  }
}

.secondary-tab {
  opacity: 1;
  position: relative;
  &:before {
    position: absolute !important;
    content: "" !important;
    bottom: 0%;
    left: 0;
    height: 2px;
    width: 100%;
    height: 3px;
    background: rgba(34, 45, 104, 0.1);
    border-radius: 15px;
  }
}

.skill-wrap {
  max-width: 80%;
  margin: 0 auto;
  padding: 8rem 0;

  @media screen and (max-width: 600px) {
    max-width: 100%;
  }

  .box-skill {
    display: flex;
    width: 100%;
    .head-skill {
      display: flex;
      justify-content: space-between;
      font-family: Rubik;
      font-style: normal;
      font-weight: normal;
      color: #222d68;
      font-weight: 600;
      .nameSkill {
        margin-left: 10px;
      }
    }
    .logo-skill {
      width: 50px;
      height: 50px;
      top: 4px;
      left: 2px;
      background: #222d68;
      border: 5px solid #fdbfbc;
      box-sizing: border-box;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      position: relative;
      font-family: Rubik;
      font-style: normal;
      z-index: 1;

      @media screen and (max-width: 600px) {
      }
    }
    .info-skill {
      flex: 1;
    }
  }
}

.skill-tab-bg {
  position: relative;
  transition: all 0.3s ease-out;
  font-family: Rubik;
  font-style: normal;
  font-weight: 700;
  line-height: 28px;
  color: #222d68 !important;
  text-transform: capitalize;
  opacity: 0.4;
}

.isActiveSkill {
  opacity: 1;
  position: relative;
  &:before {
    position: absolute !important;
    content: "" !important;
    top: inherit;
    bottom: 0;
    left: 50% !important;
    transform: translateX(-50%);
    height: 3px;
    width: 50%;
    z-index: 3;
    background: linear-gradient(
      151.48deg,
      #f9bfda 1.07%,
      #ffcad0 51.95%,
      #fdbeba 89.88%
    );
    border-radius: 15px;
    opacity: 1 !important;
  }
}

.tab-icon {
  margin-right: 15px;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  background: #ffffff;
  box-shadow: 0px 0px 20px rgba(187, 209, 244, 0.25);
  font-size: 14px !important;
}

.v-tabs-slider {
  display: none !important;
}

.hold-contents {
  width: 100%;
  min-height: 100%;
  .content {
    padding: 5rem 2rem;
    background: #ffffff;
    box-shadow: 0px 0px 25px #e4eaf4;
    border-radius: 20px 20px 260px 20px;
    margin-top: 2rem;

    h2 {
      font-family: Roboto;
      font-style: normal;
      font-weight: bold;
      line-height: 42px;
      color: #fdbebb;
    }
  }

  .bg-transparent {
    background: transparent !important;
    min-height: 100%;
    width: 97%;
  }
}

.works {
  .bg-card {
    background: #ffffff;
    box-shadow: 0px 0px 25px #e4eaf4 !important;
    border-radius: 20px 20px 260px 20px !important;
    padding-bottom: 3rem;

    @media screen and (max-width: 600px) {
      border-radius: 5px 5px 140px 5px !important;
    }
  }

  .extra-small-screen {
    @media screen and (max-width: 600px) {
      display: flex;
      .small-text {
        margin-right: 15px;
      }
    }
  }

  .company-title {
    line-height: 42px;
    color: #222d68;
    font-size: 1.2rem;
  }
  .job-title {
    line-height: 26px;
    color: #f97cb3;
    margin-bottom: 24px !important;
  }

  .company-info,
  .job-info {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    min-height: 250px;

    @media screen and (max-width: 960px) {
      min-height: auto;
    }
  }

  .job-info {
    margin-top: 18px;
  }

  .desc {
    font-size: 12px;
    color: #222d68;
    max-width: 72%;
  }

  .small-text {
    text-transform: capitalize;
    font-size: 13px;
    margin-bottom: 7px;
  }
  .date {
    color: #f97cb3;
    font-weight: 600;
    font-size: 12px;
  }

  .avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(
      92.67deg,
      #f9bfda 1.07%,
      #ffcad0 51.95%,
      #fdbeba 89.88%
    );
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    margin: 0 auto;
    position: absolute;
    top: 53px;
    left: 49px;
    @media screen and (max-width: 959px) {
      top: 18px;
    }

    @media screen and (max-width: 600px) {
      top: 13px;
      left: 14px;
    }

    img {
      width: 20px;
    }
  }

  p {
    margin: 0;
  }
}

.education {
  .bg-card {
    background: #ffffff;
    box-shadow: 0px 0px 25px #e4eaf4 !important;
    border-radius: 20px 20px 260px 20px !important;
    padding-bottom: 3rem;

    @media screen and (max-width: 600px) {
      border-radius: 5px 5px 140px 5px !important;
    }
  }

  .company-title {
    line-height: 42px;
    color: #222d68;
    font-size: 1.2rem;
  }
  .job-title {
    line-height: 26px;
    color: #f97cb3;
    margin-bottom: 0;
  }

  .mobile-screen-for-edu {
    @media screen and (max-width: 600px) {
      flex-direction: column;
      align-items: flex-start !important;
      margin-bottom: 15px;
    }
  }

  .company-info {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    min-height: 250px;
    max-width: 80%;

    @media screen and (max-width: 960px) {
      min-height: auto;
    }
  }

  .small-info {
    max-width: 70%;
  }

  .desc {
    font-size: 12px;
    color: #222d68;
    max-width: 72%;
  }
  .small-text {
    margin-right: 10px;
  }

  .small-text,
  .date,
  .university {
    color: #f97cb3;
    font-weight: 600;
    text-transform: capitalize;
    font-size: 13px;
  }

  .avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(
      92.67deg,
      #f9bfda 1.07%,
      #ffcad0 51.95%,
      #fdbeba 89.88%
    );
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    margin: 0 auto;
    position: absolute;
    top: 33px;
    left: 49px;

    @media screen and (max-width: 959px) {
      top: 18px;
    }

    @media screen and (max-width: 600px) {
      top: 13px;
      left: 14px;
    }

    img {
      width: 20px;
    }
  }

  p {
    margin: 0;
  }
}

.content_margin {
  margin-top: 4rem;
  margin-left: 2%;
  margin-right: 2%;
}

.hire-sectionv3 {
  display: flex !important;
  flex-direction: column !important;
  justify-content: center !important;
  align-items: flex-end;
  .hourly-info {
    display: flex;
    justify-content: space-between;
    min-width: 42%;
    p {
    }
    h3 {
    }
  }
}
</style>
<style>
#resumeTheme600 .v-application .blue {
  background: linear-gradient(
    138.05deg,
    #f9bfda 1.07%,
    #ffcad0 51.95%,
    #fdbeba 89.88%
  ) !important;
  border-color: linear-gradient(
    138.05deg,
    #f9bfda 1.07%,
    #ffcad0 51.95%,
    #fdbeba 89.88%
  ) !important;
}
</style>


<script lang='js' >

export default {
  components: {
  },
  data() {
    return {
      activeTab: null,
      skillTab: null,
      typeSkill: '',
      colorTab: false,
      currentTab:null,
      resume_tabs: [
        {
          name: 'about',
          label: 'About',
          icon: 'user.svg'
        },
        {
          name: 'portfolio',
          label: 'Portfolio',
          icon: 'case.svg'
        },
        {
          name: 'work',
          label: 'Work',
          icon: 'growth.svg'
        },
        {
          name: 'education',
          label: 'Education',
          icon: 'image.svg'
        },
        {
          name: 'skills',
          label: 'Skills',
          icon: 'mortarboard.svg'
        }
      ],
      skillsTab: [
        'Programming languages',
        'Frameworks/ Databases',
        'Design Skills',
        'Software'
      ]
    };
  },
  methods: {
    setTab(tabName) {
      this.currentTab = tabName;
    },
    setTabSkill(i) {
      this.typeSkill = i;
    },
    getImgUrl(pic) {
      return `/images/resume_themes/theme600/${pic}`;
    }
  }
};
</script>