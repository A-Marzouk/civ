<template>
  <v-app style="width: 100%" v-if="currentUser">
    <v-container class="hold_theme13" style="max-width: 1920px;">
      <v-row class="freelancerCard">
        <v-col lg="12" md="12" cols="12" class="resumeCardRight">
          <div class="showOnlyOnmd">
            <v-container>
              <v-row class="head-section">
                <v-col
                  class="hold-profile"
                  lg="auto"
                  :class="{ 'active-indicator': currentTab === 'profile' }"
                >
                  <div class="imageCol">
                    <span />
                    <v-img
                      class="profile-img"
                      :src="currentUser.personal_info.profile_pic"
                    ></v-img>
                  </div>
                  <div class="profileCol">
                    <span class="head-name">{{
                      currentUser.personal_info.full_name
                    }}</span>
                    <span class="head-profile">
                      {{ currentUser.personal_info.designation }}</span
                    >
                  </div>
                  <div class="actionsSection">
                    <a
                      href=""
                      @click.prevent="dialogMessage = true"
                      class="send-message"
                    >
                      <img
                        src="/images/resume_themes/theme302/icons/icon-message.svg"
                        alt=""
                      />
                    </a>
                    <a
                      href=""
                      @click.prevent="dialogAudio = true"
                      class="audio"
                    >
                      <img
                        src="/images/resume_themes/theme302/icons/icon-audio.svg"
                        alt=""
                      />
                    </a>
                    <a
                      href=""
                      @click.prevent="dialogVideo = true"
                      class="video"
                    >
                      <img
                        src="/images/resume_themes/theme302/icons/icon-video.svg"
                        alt=""
                      />
                    </a>
                  </div>
                </v-col>
                <v-col
                  class="hold-hireme"
                  lg="auto"
                  :class="{
                    'active-indicator': currentTab === 'pay-availability'
                  }"
                >
                  <div class="rateSection">
                    <span class="price">
                      $ {{ currentUser.payment_info[0].salary }}
                    </span>
                    <span class="text_price">
                      {{ currentUser.payment_info[0].salary_frequency }} rate
                    </span>
                    <span class="hours">
                      {{ currentUser.availability_info[0].available_hours }}
                      hours
                    </span>
                    <span class="text_hours">
                      {{
                        currentUser.availability_info[0]
                          .available_hours_frequency
                      }}
                      Availability
                    </span>
                  </div>
                  <div class="hireSection">
                    <a
                      href="#"
                      class="btn-outline"
                      @click.prevent="dialogHireme = true"
                      >Hire Me</a
                    >
                  </div>
                </v-col>
              </v-row>
              <v-row class="social-section">
                <v-col class="social-hold">
                  <a
                    :href="Userlink.link"
                    v-for="Userlink in currentUser.links"
                    :key="Userlink.id + '_link'"
                    target="_blank"
                    v-show="Userlink.is_active && Userlink.is_public"
                  >
                    <img
                      :src="
                        `/images/resume_themes/theme302/social_icons/${Userlink.link_title.toLowerCase()}.webp`
                      "
                      alt="social icons"
                    />
                  </a>
                </v-col>
                <v-col class="hold-hireme only-mob">
                  <div class="rateSection">
                    <div class="hold_rate_price">
                      <span class="price">
                        $ {{ currentUser.payment_info[0].salary }}
                      </span>
                      <span class="text_price">
                        {{ currentUser.payment_info[0].salary_frequency }} rate
                      </span>
                    </div>
                    <div class="hold_rate_hours">
                      <span class="hours">
                        {{ currentUser.availability_info[0].available_hours }}
                        hours
                      </span>
                      <span class="text_hours">
                        {{
                          currentUser.availability_info[0]
                            .available_hours_frequency
                        }}
                        Availability
                      </span>
                    </div>
                  </div>
                  <div class="hireSection">
                    <a
                      href="#"
                      class="btn-outline"
                      @click.prevent="dialogHireme = true"
                      >Hire Me</a
                    >
                  </div>
                </v-col>
              </v-row>
            </v-container>
          </div>
          <div class="hold-tabs">
            <v-tabs
              class="main-tabs_theme13"
              height="85"
              hide-slider
              v-model="tabmodel"
            >
              <v-tab
                v-for="(tab, index) in resume_tabs"
                :key="index"
                :href="`#tab-${index}`"
                @click="activeTab = tab.name"
                :class="[{ 'active-indicator': currentTab === tab.name }]"
                :ripple="false"
              >
                {{ tab.label }}
              </v-tab>
            </v-tabs>
          </div>
          <div class="hold-contents">
            <v-tabs-items v-model="tabmodel">
              <v-tab-item class="portfolio-section" value="tab-0">
                <div class="hold-slider content-wrap">
                  <slick ref="slick" :options="slickOptions">
                    <div
                      class="slide-item"
                      v-for="project in currentUser.projects"
                      :key="project.id + '_project'"
                      v-show="project.is_public"
                    >
                      <img :src="getProjectMainImage(project)" alt="" />
                    </div>
                  </slick>
                  <div class="nav-slider">
                    <a href="#" @click.prevent="prevSlide"
                      ><img
                        src="/images/resume_themes/theme302/arrow-left.png"
                        alt=""
                    /></a>
                    <span class="navDots"></span>
                    <a href="#" @click.prevent="nextSlide"
                      ><img
                        src="/images/resume_themes/theme302/arrow-right.png"
                        alt=""
                    /></a>
                  </div>
                </div>
              </v-tab-item>
              <v-tab-item class="work-section" value="tab-1">
                <v-container>
                  <v-row class="contentSection">
                    <v-col
                      lg="6"
                      md="12"
                      sm="12"
                      v-for="(work, index) in currentUser.work_experience"
                      :key="index + 'W'"
                      v-show="work.is_public"
                    >
                      <div class="hold-titles">
                        <span class="title-work">{{ work.job_title }}</span>
                        <span class="years-work">
                          {{ getFullYear(work.date_from) }}
                          <span
                            >&nbsp;-&nbsp; {{ getFullYear(work.date_to) }}
                          </span>
                        </span>
                      </div>
                      <div class="hold-text">
                        <span class="title-company">{{
                          work.company_name
                        }}</span>
                        <span class="list-tasks"> {{ work.description }}</span>
                      </div>
                    </v-col>
                  </v-row>
                </v-container>
              </v-tab-item>
              <v-tab-item class="education-section" value="tab-2">
                <v-container>
                  <v-row class="contentSection">
                    <v-col
                      lg="6"
                      md="12"
                      sm="12"
                      v-for="(education, index) in currentUser.education"
                      :key="index + 'E'"
                      v-show="education.is_public"
                    >
                      <div class="hold-titles">
                        <span class="title-work">{{
                          education.university_name
                        }}</span>
                        <span class="years-work">
                          {{ getFullYear(education.date_from) }}
                          <span>- {{ getFullYear(education.date_to) }}</span>
                        </span>
                      </div>
                      <div class="hold-text">
                        <span class="title-company">{{
                          education.degree_title
                        }}</span>
                        <span class="list-tasks">{{
                          education.description
                        }}</span>
                      </div>
                    </v-col>
                  </v-row>
                </v-container>
              </v-tab-item>
              <v-tab-item class="skills-section" value="tab-3">
                <v-row class="skills-wrap">
                  <v-col lg="12" md="12" sm="12">
                    <v-tabs
                      class="main-subtabs_skills"
                      v-model="activeTabSkill"
                      hide-slider
                      :center-active="true"
                      :show-arrows="true"
                    >
                      <v-tab
                        v-for="(skill, index) in items"
                        :key="index"
                        v-show="
                          currentUser.skills.find(
                            s => s.category == skill.value
                          )
                        "
                        :ripple="false"
                      >
                        {{ skill.name }}
                      </v-tab>
                    </v-tabs>
                    <v-tabs-items
                      v-model="activeTabSkill"
                      class="mc-subtabs_skills"
                    >
                      <v-tab-item
                        v-for="item in items"
                        :key="item.id"
                        v-show="
                          currentUser.skills.find(s => s.category == item.value)
                        "
                      >
                        <v-container pa-0 fluid>
                          <v-row dense justify="center" align="center">
                            <v-col
                              cols="2"
                              v-for="(s, index) in skillCategory(item.value)"
                              :key="index"
                              v-show="s.is_public"
                              align="center"
                            >
                              <v-progress-circular
                                size="93"
                                width="10"
                                :value="s.percentage"
                                color="#4C71F0"
                              >
                                {{ s.percentage }}%
                              </v-progress-circular>
                              <v-img
                                src="/images/resume_themes/theme302/icons/icon-php.png"
                                alt=""
                                width="100"
                                class="mt-5"
                              >
                              </v-img>
                            </v-col>
                          </v-row>
                        </v-container>

                        <div class="hold-skills">
                          <!-- <slick
                            :options="slickContents"
                            :id="`sliderTab_${item.id}`"
                          >
                            <div
                              class="item-skill"
                              v-for="(s, index) in currentUser.skills"
                              :key="index"
                              v-show="s.category == item.value"
                            >
                              <v-progress-circular
                                size="93"
                                width="10"
                                :value="s.percentage"
                                color="#4C71F0"
                              >
                                {{ s.percentage }}% {{ item.value }}
                                {{ s.category }}
                              </v-progress-circular>
                              <img
                                src="/images/resume_themes/theme302/icons/icon-php.png"
                                alt=""
                              />
                            </div>
                          </slick> -->

                          <!-- <div class="nav-slider">
                            <a
                              href="#"
                              @click.prevent="prevSlide('contentSlides')"
                              ><img
                                src="/images/resume_themes/theme302/arrow-left.png"
                                alt=""
                            /></a>
                            <span class="navDotsContents"></span>
                            <a
                              href="#"
                              @click.prevent="nextSlide('contentSlides')"
                              ><img
                                src="/images/resume_themes/theme302/arrow-right.png"
                                alt=""
                            /></a>
                          </div> -->
                        </div>
                      </v-tab-item>
                    </v-tabs-items>
                  </v-col>
                </v-row>
              </v-tab-item>
            </v-tabs-items>
          </div>
        </v-col>
      </v-row>
    </v-container>
    <v-dialog
      v-model="dialogMessage"
      persistent
      max-width="1220"
      overlay-opacity="0.87"
      overlay-color="#656565"
    >
      <v-card class="form-wrap bg-gray">
        <v-form ref="formMessages" class="form-messages sky-style">
          <v-container>
            <v-row>
              <v-col lg="12" sm="12" cols="12">
                <v-text-field
                  v-model="formMessage.name"
                  :rules="formMessage.nameRules"
                  placeholder="Name"
                  required
                  color="#202124"
                ></v-text-field>
              </v-col>
              <v-col lg="12" sm="12" cols="12">
                <v-text-field
                  v-model="formMessage.email"
                  :rules="formMessage.emailRules"
                  placeholder="E-mail"
                  required
                  color="#202124"
                ></v-text-field>
              </v-col>
              <v-col lg="12" sm="12" cols="12">
                <v-textarea
                  v-model="formMessage.message"
                  filled
                  height="256"
                  :no-resize="true"
                  color="#202124"
                  placeholder="Message"
                ></v-textarea>
              </v-col>
            </v-row>
            <v-row class="form-actions">
              <v-btn depressed small @click="submitForm" class="btn-send"
                >Send Message</v-btn
              >
              <v-btn text small @click="cancelForm">Cancel</v-btn>
            </v-row>
          </v-container>
        </v-form>
      </v-card>
    </v-dialog>
    <v-dialog
      v-model="dialogAudio"
      persistent
      max-width="850"
      overlay-opacity="0.5"
      overlay-color="#202124"
    >
      <v-card>
        <v-card-actions>
          <v-icon
            class="close-icon"
            @click="dialogAudio = false || pauseAudio()"
            >mdi-close</v-icon
          >
        </v-card-actions>
        <div class="player">
          <div
            class="hold-spectre"
            @click.prevent="!playing ? playAudio() : pauseAudio()"
          >
            <img
              src="/images/resume_themes/theme302/icons/spectre.png"
              alt=""
            />
          </div>
          <a
            @click.prevent="!playing ? playAudio() : pauseAudio()"
            title="Play/Pause"
            href="#"
          >
            <v-icon v-if="!playing">mdi-play-circle</v-icon>
            <v-icon v-else>mdi-pause-circle</v-icon>
          </a>
          <audio
            style="display:none"
            ref="audioElem"
            id="audioElem"
            v-if="currentUser.media.find(s => s.type == 'audio')"
            :src="findAudio(currentUser.media)"
            @ended="playing = !playing"
          ></audio>
        </div>
      </v-card>
    </v-dialog>
    <v-dialog
      v-model="dialogVideo"
      persistent
      max-width="850"
      overlay-opacity="0.5"
      overlay-color="#202124"
    >
      <v-card>
        <v-card-actions>
          <v-icon class="close-icon" @click="dialogVideo = false"
            >mdi-close</v-icon
          >
        </v-card-actions>
        <div class="hold-video">
          <div class="poster-video" ref="videoPoster">
            <a href="#" @click.prevent="playVideo()">
              <v-icon>mdi-play-circle</v-icon>
            </a>
          </div>
          <video
            ref="videoElem"
            v-if="currentUser.media.find(s => s.type == 'video')"
            controls
            :src="findVideo(currentUser.media)"
          ></video>
        </div>
      </v-card>
    </v-dialog>
    <v-dialog
      v-model="dialogHireme"
      persistent
      max-width="850"
      overlay-opacity="0.5"
      overlay-color="#202124"
    >
      <v-card class="payment-wrap">
        <v-card-actions>
          <v-icon class="close-icon" @click="dialogHireme = false"
            >mdi-close</v-icon
          >
        </v-card-actions>
        <v-container>
          <h3>Select Payment Method :</h3>
          <v-row class="hold-payment">
            <v-col cols="12" lg="12">
              <v-radio-group
                v-model="radioGroup"
                :row="true"
                class="pay-method"
              >
                <span class="item-pay">
                  <v-radio
                    value="1"
                    name="opt-paypal"
                    off-icon="mdi-checkbox-blank-circle"
                    :ripple="false"
                  >
                  </v-radio>
                  <img
                    src="/images/resume_themes/theme302/icons/icon-paypal.png"
                    alt=""
                  />
                </span>
                <span class="item-pay">
                  <v-radio
                    color="#d8d8d8"
                    value="2"
                    name="opt-payonner"
                    off-icon="mdi-checkbox-blank-circle"
                    :ripple="false"
                  >
                  </v-radio>
                  <img
                    src="/images/resume_themes/theme302/icons/icon-payonner.png"
                    alt=""
                  />
                </span>
              </v-radio-group>
            </v-col>
          </v-row>
        </v-container>
      </v-card>
    </v-dialog>
  </v-app>
</template>
<style lang="scss">
@import "resources/sass/themes/theme302.scss";
</style>
<style lang="scss" scoped>
@import url("https://fonts.googleapis.com/css?family=Raleway:300,400,500,700,800,900&display=swap");
@import "https://fonts.googleapis.com/css?family=Actor:300,400,500,700,800,900&display=swap";

@font-face {
  font-family: "Gotham Pro";
  src: url("/fonts/gotham-pro/GothaProRegular.otf") format("opentype");
  font-weight: normal;
  font-style: normal;
}

$max_wTheme: 1420px;
$tab_OneColor: #d93025;
$tab_TwoColor: #0f9d58;
$tab_ThreeColor: #f4b400;
$tab_FourColor: #4285f4;

$colorBlue: #104efb;

.container {
  margin: 0 auto !important;
  padding: 0;
  max-width: 100%;

  .freelancerCard {
    width: 100%;
    background: #f5f7f7;
    margin: 0 auto;

    .resumeCardRight {
      padding: 0;
    }
  }

  &.hold_theme13 {
    .showOnlyOnmd {
      justify-content: center;
      display: flex;
      align-items: center;
      border-bottom: 1px solid #e5e5e5;
      background: #ffffff;
    }
  }
}

.hold-contents {
  background: #fff;
  overflow: hidden;
  min-height: 870px;
  margin-top: -1px;

  .v-tabs-items {
    max-width: 1800px;
    margin: 55px auto 0px auto;
    background: transparent;
  }

  @media screen and (max-width: 768px) {
    padding-top: 55px;

    .hold-slider {
      margin-top: 0;
    }
  }
}

.content-wrap {
  position: relative;

  > div {
    /** Position scroll content */
    &:nth-child(2) {
      position: absolute;
      z-index: 2;
      bottom: -4vh;
      z-index: 2;
      right: 26vw;
      padding: 5px;
      border-radius: 100px;
      background: #fff;
    }
  }

  @media screen and (max-width: 768px) {
    .nav-slider {
      position: static !important;
      right: auto;
    }
  }
}

.head-section {
  align-items: center;
  padding: 0px;
  min-height: 180px;
  padding: 0px 2%;
  justify-content: space-between;

  .col {
    display: flex;
    align-items: center;
  }

  @media screen and (max-width: 768px) {
    min-height: 319px;
    padding: 0px 45px;

    .col {
      justify-content: center;

      &.hold-hireme {
        padding: 0;
      }
    }
  }
}

.social-section {
  flex-flow: column;
}

.imageCol {
  position: relative;
  align-items: center;
  display: flex;
  justify-content: center;

  .profile-img {
    width: 110px;
    height: 110px;
    display: block;
    background-position: center;
    background-size: cover;
    border-radius: 100%;
    background-color: $colorBlue;
  }
  .chat-option {
    position: absolute;
    bottom: -22px;
    width: 55px;
    height: 55px;
    left: 20%;

    border-radius: 100%;
    text-decoration: none;
    border: 5px solid #fff;
    background: #f1f3f4;
    justify-content: center;
    display: flex;
    align-items: center;

    i {
      color: #d93025;
      vertical-align: middle;
    }
  }
  @media screen and (max-width: 768px) {
    .profile-img {
      width: 122px;
      height: 122px;
    }
  }
}

.profileCol {
  display: flex;
  flex-flow: column;
  margin-left: 30px;

  @media screen and (max-width: 768px) {
    margin-left: 35px;

    .head-profile {
      line-height: 20px;
    }
  }
}

.actionsSection {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  margin-left: 64px;

  a {
    display: inline-flex;
    margin-right: 45px;

    &:last-child {
      margin: 0;
    }

    img {
      width: 23px;
    }
  }

  @media screen and (max-width: 768px) {
    margin-left: 80px;
    justify-content: flex-end;

    a {
      margin-right: 70px;

      img {
        width: 34px;
        height: 34px;
      }
    }
  }
}

.head-name {
  font-family: "Raleway", sans-serif;
  font-weight: 500;
  font-size: 24px;
  line-height: 28px;
  color: $colorBlue;
}
.head-profile {
  font-family: "Raleway", sans-serif;
  font-size: 14px;
  line-height: 16px;
  color: $colorBlue;
}

.interviewSection {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-flow: column;
  margin-top: 20px;

  border-left: 1px solid #e5e5e5;
  border-right: 1px solid #e5e5e5;
  .option-wrap {
    margin-top: 25px;

    .btn-default {
      margin: 0 15px;
    }
  }
}

.rateSection {
  justify-content: flex-end;
  display: flex;
  align-items: center;
  color: $colorBlue;
  margin-right: 45px;

  .price,
  .hours {
    font-weight: bold;
    text-transform: uppercase;
    font-family: "Gotham Pro";
    font-size: 12px;
    letter-spacing: 0px;
  }

  .text_price,
  .text_hours {
    font-size: 9px;
    line-height: 10px;
    text-transform: lowercase;
    font-family: "Raleway";
    font-style: normal;
    text-align: center;
    margin: 0px 0px 0px 0px;
    letter-spacing: 0px;
  }
  span {
    &:nth-child(3) {
      padding-left: 38px;
      border-left: 1px solid rgba(16, 78, 251, 0.2);
      margin-left: 38px;
    }
    &:nth-child(odd) {
      margin-right: 10px;
    }
  }

  @media screen and (max-width: 768px) {
    span {
      &:nth-child(3) {
        padding-left: 30px;
        margin-left: 30px;
      }
      &:nth-child(odd) {
        margin-right: 5px;
      }
    }

    .price,
    .hours {
      font-size: 24px;
    }
    .text_price,
    .text_hours {
      font-size: 18px;
    }
  }
}

.hireSection {
  justify-content: center;
  display: flex;

  .hire-wrap {
    .col {
      justify-content: center;
      align-items: center;
      display: flex;
    }
  }

  .btn-outline {
    border-radius: 0;
  }
}

.social-hold {
  min-height: 88px;
  background: #104efb;
  justify-content: center;
  align-items: center;
  display: flex;

  a {
    margin-right: 45px;
    max-height: 24px;

    &:last-child {
      margin: 0;
    }

    img {
      width: 24px;
      max-height: 24px;
    }
  }

  @media screen and (max-width: 768px) {
    min-height: 120px;

    a {
      margin: 0px 20px;
      max-height: 34px;

      img {
        width: 24px;
        max-height: 24px;
      }

      &:last-child {
        margin: 0px 20px;
      }
    }
  }
}

.hold-tabs {
  background: #fff;
  padding-top: 55px;
}

.main-tabs_theme13 {
  background: #fff;
  margin: 0px auto;

  .v-tab {
    text-transform: capitalize;
    font-family: "Raleway", sans-serif;
    font-style: normal;
    font-weight: 300;
    font-size: 16px;
    line-height: 16px;
    letter-spacing: 0px;
    padding: 0px;
    min-width: 333px;
    color: $colorBlue !important;
    transition: all 0.1s ease-in;
    display: flex;

    &:nth-child(1) {
      order: 1;
    }
    &:nth-child(2) {
      order: 3;
    }
    &:nth-child(3) {
      order: 4;
    }
    &:nth-child(4) {
      order: 2;
    }

    &:hover {
      &::before {
        opacity: 0;
      }
    }

    &::before {
      opacity: 0;
    }

    &:focus {
      &::before {
        opacity: 0;
      }
    }

    &.v-tab--active {
      font-weight: 300;
      font-size: 40px;
      line-height: 40px;

      &::after {
        content: "";
        min-width: 180px;
        height: 1px;
        background: rgba(16, 78, 251, 0.2);
        position: absolute;
        bottom: 0px;
      }

      &:hover {
        &::before {
          opacity: 0;
        }
      }
      &::before {
        opacity: 0;
      }
    }
  }

  @media screen and (max-width: 768px) {
    .v-tab {
      min-width: 130px;

      &.v-tab--active {
        margin: 0px 1%;
      }
    }
  }
}

.contentSection {
  padding-top: 145px;
  color: $colorBlue;

  .col {
    display: flex;
    flex-flow: row;
    align-items: flex-start;
    justify-content: center;
    margin-bottom: 125px;
  }

  .hold-titles,
  .hold-text {
    display: flex;
    flex-flow: column;
  }
  .hold-titles {
    min-width: 22%;
    justify-content: space-between;
    align-items: flex-start;
    height: 100%;
  }
  .hold-text {
    width: 60%;
  }

  .title-work {
    font-family: "Gotham Pro";
    font-style: normal;
    font-weight: 300;
    font-size: 16px;
    line-height: 18px;
    text-transform: capitalize;
    max-width: 140px;
  }

  .title-company {
    font-family: "Actor";
    font-style: normal;
    font-weight: 500;
    font-size: 30px;
    line-height: 28px;
  }

  .list-tasks {
    font-family: "Actor";
    font-style: normal;
    font-weight: normal;
    font-size: 20px;
    line-height: 28px;
    margin-top: 1em;
  }

  .years-work {
    font-family: "Actor";
    font-style: normal;
    font-weight: normal;
    font-size: 16px;
    line-height: 19px;
  }

  @media screen and (max-width: 768px) {
    padding-top: 0px;
  }
}

.title-medium {
  font-size: 24px;
  font-family: "Roboto-Medium";
  color: #202124;
}

.btn-default {
  background: #f1f3f4;
  border: 1px solid #d8d8d8;
  text-align: center;
  border-radius: 3px;
  font-size: 14px;
  font-family: "Roboto-Medium";
  text-decoration: none;
  color: #5f6368;
  min-width: 173px;
  min-height: 45px;
  line-height: 45px;
  display: inline-block;
  margin: 0px 5px;

  &:hover {
    opacity: 0.8;
  }

  i {
    margin-right: 10px;
  }
}
.btn-action {
  min-width: 267px;
  min-height: 50px;
  text-align: center;
  color: #fff;
  background: #d93025;
  border-radius: 3px;
  display: inline-block;
  line-height: 50px;
  padding: 0;
  text-decoration: none;
  font-size: 20px;
  font-family: "Roboto";

  &:hover {
    opacity: 0.8;
  }
}

.btn-outline {
  min-width: 150px;
  text-align: center;
  min-height: 50px;
  border: 2px solid #104efb;
  font-family: "Raleway";
  font-size: 16px;
  line-height: 16px;
  text-transform: uppercase;
  color: $colorBlue;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  justify-content: center;
}
.portfolio-wrap {
  justify-content: space-between;

  .col-12 {
    max-width: 700px;
  }

  .box-photo {
    padding: 16px 15px;
    background: #fff;
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.16);
    margin-bottom: 20px;
    display: flex;

    img {
      max-width: 100%;
    }
  }
  @media screen and (max-width: 960px) {
    .col-12 {
      max-width: 100%;
    }

    .box-photo {
      margin-bottom: 10px;
      max-height: 372px;
      padding: 10px;

      img {
        width: 100%;
      }
    }
  }
}

.skills-wrap {
  .main-subtabs_skills {
    max-width: 1200px;
    margin: 0px auto 0px auto;

    .v-tab {
      position: relative;
      text-transform: capitalize;
      min-height: 30px;
      padding: 0px;
      display: flex;
      font-family: "Gotham Pro";
      font-style: normal;
      font-weight: 300;
      font-size: 24px;
      line-height: 23px;
      color: rgba(16, 78, 251, 0.6) !important;
      opacity: 0.5;
      margin-right: 6%;
      letter-spacing: 0;

      &:last-child {
        margin: 0;
      }

      &.v-tab--active {
        color: rgba(16, 78, 251, 0.8) !important;
        opacity: 1;
        font-weight: bold;

        &:focus,
        &:hover {
          &::before {
            opacity: 0 !important;
          }
        }
      }

      &:focus,
      &:hover {
        &::before,
        &::after {
          opacity: 0 !important;
        }
      }
    }

    @media screen and (max-width: 768px) {
      .v-tab {
        margin: 0 2%;
        min-width: auto;
        white-space: nowrap;

        &:last-child {
          margin: 0 2%;
          padding-right: 150px;
        }
      }
    }
  }
  .mc-subtabs_skills {
    width: 100%;
    margin: 106px auto 0 auto;

    .hold-skills {
      width: 1200px;
      margin: 0 auto;

      .item-skill {
        margin: 0;

        align-items: center;
        justify-content: center;
        flex-flow: column;

        img {
          max-width: 100%;
          margin-top: 8%;
        }
      }

      > div {
        &:nth-child(2) {
          margin-top: 286px;
          justify-content: flex-end;
          padding-right: 10%;
        }
      }
    }
  }

  @media screen and (max-width: 768px) {
    .mc-subtabs_skills {
      .hold-skills {
        width: 100%;

        .item-skill {
          img {
            margin-top: 15px;
          }
        }
      }
    }
  }
}

/** Slider section */

/** Modals styles */
.v-dialog {
  .v-card {
    padding-bottom: 80px;

    &.form-wrap {
      padding: 0;

      .container {
        padding: 20px;
      }

      .form-actions {
        justify-content: center;
        margin-top: 10px;
      }

      .v-btn {
        &.btn-send {
          max-width: 255px;
          text-align: center;
          border: 2px solid $colorBlue;
          font-family: "Raleway";
          font-size: 24px;
          line-height: 28px;
          color: $colorBlue;
          text-decoration: none;
          background: #fff;
          outline: none;
        }

        min-width: 255px;
        font-family: "Raleway";
        font-style: normal;
        font-weight: normal;
        font-size: 24px;
        line-height: 28px;
        color: #104efb;
        min-height: 75px;
        text-transform: capitalize;
        letter-spacing: normal;
        text-indent: 0px;
        border-radius: 0px;
      }
    }

    .v-card__actions {
      padding: 30px;
      display: flex;
      justify-content: flex-end;
    }
    .close-icon {
      color: $colorBlue;
      font-size: 46px;
    }

    .container {
      padding: 70px;
    }
  }

  /** Only dialogs fixes on mobile */
  @media only screen and (max-width: 768px) {
    .v-card {
      padding-bottom: 50px;

      .container {
        padding: 20px;
      }
      &.form-wrap {
        .v-btn {
          min-width: 180px;
          font-size: 18px;
          min-height: 50px;

          &.btn-send {
            font-size: 18px;
          }
        }
      }
      .v-card__actions {
        padding: 20px;
      }
      .hold-video {
        max-width: 80%;
      }
    }

    .player {
      .hold-spectre {
        max-width: 80%;
        background: #f7f7f7;
        margin-bottom: 20px;

        img {
          max-width: 100%;
        }
      }

      i {
        color: $colorBlue;
      }
    }
  }

  @media only screen and (max-width: 480px) {
    .v-card {
      .container {
        padding: 0 20px;
      }
      &.form-wrap {
        .v-btn {
          min-width: 100px;
          font-size: 14px;
          padding: 0 15px;

          &.btn-send {
            font-size: 14px;
          }
        }
      }
      .close-icon {
        font-size: 30px;
      }
    }

    .player {
      i {
        font-size: 50px;
      }
    }
  }
}

/** Player styles */
.player {
  justify-content: center;
  align-items: center;
  flex-direction: column;
  display: flex;

  .hold-spectre {
    background: #f5f7f7;
    padding: 15px 22px;
    margin-bottom: 50px;
    &:hover {
      cursor: pointer;
    }
  }

  a {
    text-decoration: none;
  }

  i {
    font-size: 76px;
    color: #202124;
  }
}
.hold-video {
  position: relative;
  max-width: 613px;
  max-height: 373px;
  margin: 0 auto;

  .poster-video {
    position: absolute;
    z-index: 2;
    width: 100%;
    height: 100%;
    background: #000;
    justify-content: center;
    align-items: center;
    display: flex;
    a {
      text-decoration: none;
      i {
        font-size: 65px;
        color: #d8d8d8;
      }
    }
  }

  video {
    position: relative;
    z-index: 1;
    max-width: 100%;
  }
}

.payment-wrap {
  .container {
    padding: 0px;
  }

  h3 {
    font-size: 24px;
    font-family: "Gotham Pro";
    color: #5f6368;
    font-weight: normal;
  }

  .hold-payment {
    margin-top: 20px;
    background: #f5f7f7;
    max-width: 710px;
    min-height: 160px;

    .pay-method {
      width: 100%;

      .item-pay {
        display: flex;
        align-items: center;
      }

      .v-radio {
        margin-right: 0px;
        margin-left: 0;
      }
    }

    .col-12 {
      align-items: center;
      display: flex;
    }
  }
}

/** Only mobile version */
@media only screen and (max-width: 480px) {
  /* Helper class **/
  .only-mob {
    display: block !important;
  }

  .container.hold_theme13 .showOnlyOnmd {
    border: 0;
  }

  .head-section {
    padding: 0 10px;
    min-height: 153px;
  }
  .imageCol {
    .profile-img {
      width: 81px;
      height: 81px;
    }
  }
  .profileCol {
    min-width: 135px;
    margin-left: 16px;
  }

  .actionsSection {
    margin-left: 5%;

    a {
      margin: 0px 10px;

      &:last-child {
        margin: 0px 10px;
      }

      img {
        width: 18px;
      }
    }
  }

  .hold-hireme {
    display: none !important;

    &.only-mob {
      display: block !important;
    }
  }
  .social-hold {
    min-height: 75px;
    width: 100%;
    flex-wrap: wrap;

    a {
      margin: 0px 15px;

      &:nth-child(1) {
        img {
          width: 25.6px;
          height: 16.6px;
        }
      }
      &:nth-child(2) {
        img {
          width: 24px;
          height: 24px;
        }
      }
      &:nth-child(3) {
        img {
          width: 18px;
          height: 23px;
        }
      }
      &:nth-child(4) {
        img {
          width: 22px;
          height: 22px;
        }
      }
      &:nth-child(5) {
        img {
          width: 20.5px;
          height: 20.5px;
        }
      }

      :last-child {
        margin: 0;
      }
    }
  }

  .main-tabs_theme13 {
    .v-tab {
      font-size: 14px;
      min-width: auto;
      align-items: flex-end;
      padding: 0 3%;

      &.v-tab--active {
        font-size: 36px;
        line-height: 30px;

        &::after {
          height: 0;
        }
      }
    }
  }

  .hold-tabs {
    padding-top: 60px;
  }

  .rateSection {
    justify-content: space-around;
    margin: 40px auto;

    .hold_rate_price {
      display: flex;
      flex-flow: column;
      align-items: center;

      span {
        margin: 0;
      }
    }
    .hold_rate_hours {
      display: flex;
      flex-flow: column;
      align-items: center;

      span {
        margin: 0;
      }
    }
  }
  .hold-contents {
    padding: 60px 5% 0px;

    .v-tabs-items {
      margin-top: 0;
    }

    .hold-slider {
      height: auto;

      .nav-slider {
        position: relative;
        left: 0;
        margin: 5% auto;

        a {
          display: flex;
        }
      }
    }
  }

  .skills-wrap {
    .main-subtabs_skills {
      .v-tab {
        font-size: 18px;
      }
    }
  }

  .contentSection {
    flex-flow: column;

    .col {
      margin-bottom: 100px;
      justify-content: space-between;
      min-height: 194px;
      overflow-y: hidden;
    }

    .hold-titles {
      justify-content: flex-start;
      width: 38%;
    }

    .years-work {
      padding-top: 50%;
    }
    .title-company {
      font-size: 20px;
      line-height: 30px;
    }
    .list-tasks {
      font-size: 16px;
      line-height: 18px;
      font-family: "Gotham Pro";
    }
  }
  .payment-wrap {
    h3 {
      font-size: 18px;
    }
    .hold-payment {
      .pay-method {
        width: 100%;

        .item-pay {
          align-items: center;

          img {
            max-width: 100px;
          }
        }
      }
    }
  }
}

@media only screen and (max-width: 360px) {
  .actionsSection {
    margin-left: 2%;
  }
}

.only-mob {
  display: none;
}
</style>
<script>
import Slick from "vue-slick";

export default {
  name: "theme302",
  props: ["user", "is_preview", "currentTab"],
  components: {
    Slick
  },
  data() {
    return {
      activeTab: "portfolio",
      tabmodel: null,
      resume_tabs: [
        { name: "portfolio", label: "Portfolio" },
        { name: "work-experience", label: "Work" },
        { name: "education", label: "Education" },
        { name: "skills", label: "Skills" }
      ],
      skills: [
        {
          id: 1,
          skill_title: "php",
          percentage: "80"
        },
        {
          id: 2,
          skill_title: "css3",
          percentage: "50"
        },
        {
          id: 3,
          skill_title: "html5",
          percentage: "50"
        },
        {
          id: 4,
          skill_title: "js",
          percentage: "40"
        }
      ],
      typeSkill: "",
      itemsPerRow: 4,
      skillFiltered: [],

      items: [
        {
          id: 1,
          name: "Programming Languages",
          value: "programming_languages"
        },
        {
          id: 2,
          name: "Frameworks/ Databases",
          value: "frameworks"
        },
        {
          id: 3,
          name: "Design Skills",
          value: "design"
        },
        {
          id: 4,
          name: "Software",
          value: "software"
        }
      ],
      currentUser: this.user,
      slides: [],
      activeTabSkill: null,
      itemsTabSkills: null,
      slideNumber: 1,
      slickOptions: {
        slidesToShow: 3,
        slidesToScroll: 1,
        variableWidth: true,
        infinite: false,
        arrows: false,
        dots: false,
        swipe: true,
        speed: 500,
        appendDots: ".navDots",
        responsive: [
          {
            breakpoint: 786,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
              variableWidth: false,
              vertical: true,
              verticalSwiping: true,
              infinite: true
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
              variableWidth: false,
              vertical: true,
              verticalSwiping: true,
              infinite: true
            }
          }
        ]
      },
      slickContents: {
        slidesToShow: 4,
        slidesToScroll: 4,
        arrows: false,
        infinite: false,
        dots: true,
        swipe: true,
        speed: 500,
        appendDots: ".navDotsContents",
        responsive: [
          {
            breakpoint: 780,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1
            }
          }
        ]
      },
      formMessage: {
        name: "",
        nameRules: [
          v => !!v || "Name is required",
          v => (v && v.length <= 10) || "Name must be less than 10 characters"
        ],
        email: "",
        emailRules: [
          v => !!v || "E-mail is required",
          v => /.+@.+\..+/.test(v) || "E-mail must be valid"
        ],
        message: ""
      },
      formHasErrors: false,

      // --Dialog
      dialogMessage: false,
      dialogAudio: false,
      dialogVideo: false,
      dialogHireme: false,
      // --Player
      playing: false,
      radioGroup: 1
    };
  },
  watch: {
    // if current tab changed, change the active tab as well.
    currentTab: function(val) {
      this.activeTab = val;
    }
  },
  methods: {
    skillCategory(skillName) {
      var filteredSkill = this.currentUser.skills.filter(
        s => s.category === skillName
      );
      return filteredSkill;
    },
    findAudio(audio) {
      var url = audio.find(s => s.type === "audio").url;
      return url;
    },
    findVideo(video) {
      var url = video.find(s => s.type === "video").url;
      return url;
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
    nextSlide(name) {
      switch (name) {
        case "contentSlides":
          this.$refs.contentSlides.next();
          break;
        default:
          this.$refs.slick.next();
          break;
      }
    },
    prevSlide(name) {
      switch (name) {
        case "contentSlides":
          this.$refs.contentSlides.prev();
          break;
        default:
          this.$refs.slick.prev();
          break;
      }
    },
    reInit(name) {
      switch (name) {
        case "contentSlides":
          this.$refs.contentSlides.reSlick();
          break;
        default:
          this.$refs.slick.reSlick();
          break;
      }
    },
    getFullYear(date) {
      let newDate = new Date(date);
      let yyyy = newDate.getUTCFullYear();
      return yyyy;
    },

    isMobile() {
      if (
        /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
          navigator.userAgent
        )
      ) {
        return true;
      } else {
        return false;
      }
    },
    playAudio() {
      this.playing = true;
      this.$refs.audioElem.play();
    },
    pauseAudio() {
      this.playing = false;
      if (this.$refs.audioElem) {
        this.$refs.audioElem.pause();
      }
    },
    playVideo() {
      this.$refs.videoPoster.style.display = "none";
      this.$refs.videoElem.play();
    },
    submitForm() {
      /** Logic data send */
    },
    cancelForm() {
      this.dialogMessage = false;
      this.$refs.formMessages.reset();
    },
    filteredSkillsByType(name) {
      const skillsFiltered = this.skills.reduce(
        (acc, cur) => (
          cur.type == name &&
            acc.push({
              id: cur.id,
              skill_title: cur.skill_title,
              percentage: cur.percentage
            }),
          acc
        ),
        []
      );
      this.skillFiltered = skillsFiltered;
    },
    itemCountInRow(index) {
      return this.skillFiltered.slice(
        (index - 1) * this.itemsPerRow,
        index * this.itemsPerRow
      );
    },
    countSlide() {
      return this.slideCount;
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
