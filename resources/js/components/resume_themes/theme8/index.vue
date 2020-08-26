<template>
  <v-app class="theme-container" v-if="currentUser">
    <vue-particles></vue-particles>
    <HeaderTheme8 :currentUser="currentUser" @toogleAudioPopup="toogleAudioPopup" :isVisibleAudioPopup="isVisibleAudioPopup"></HeaderTheme8>

    <div class="tabs-bar-wrapper">
      <v-tabs
        centered
        show-arrows
        grow
      >
        <v-tabs-slider
          height="4px"
        ></v-tabs-slider>

        <v-tab
          class="v-tab"
          v-for="tab in tabs"
          :key="tab.value"
          @click="activeTab = tab.value"
          :ripple="false"
        >
          {{ tab.text }}
        </v-tab>
      </v-tabs>
    </div>

    <div class="tabs-wrapper">
      <div class="tab-content-wrapper">
        <Portfolio
          :currentUser="currentUser"
          v-show="activeTab === 'portfolio'"
          :class="{ active: activeTab === 'portfolio' }"
        ></Portfolio>
        <div
          class="work-experience"
          v-show="activeTab === 'work-experience'"
          :class="{ active: activeTab === 'work-experience' }"
        >
          <div
            class="work-item"
            v-for="work in currentUser.work_experience"
            :key="work.id + '_work'"
          >
            <div class="company">{{ work.company_name }}</div>
            <div class="title">{{ work.job_title }}</div>
            <div class="duration">
              Duration: {{ work.date_from }} -
              {{ work.present ? "present" : work.date_to }}
            </div>
            <div class="work-info">{{ work.description }}</div>
          </div>
        </div>
        <div
          class="education"
          v-show="activeTab === 'education'"
          :class="{ active: activeTab === 'education' }"
        >
          <div
            class="education-item"
            v-for="education in currentUser.education"
            :key="education.id + '_education'"
          >
            <div class="education-name">{{ education.university_name }}</div>
            <div class="education-date">
              {{ education.date_from }} -
              {{ education.present ? "present" : education.date_to }}
            </div>
            <div class="education-info">{{ education.degree_title }}</div>
            <div class="education-type">{{ education.institution_type }}</div>
          </div>
        </div>
        <div
          class="skills-tab"
          v-show="activeTab === 'skills'"
          :class="{ active: activeTab === 'skills' }"
        >
          <div
            class="skill-item skills d-flex align-items-end"
            v-for="skill in currentUser.skills"
            :key="skill.id + '_skill'"
          >
            <div class="skill">
              <div class="skill-title">{{ skill.title }}</div>
              <!-- bar -->
              <div class="skill-bar" :data-bar="skill.percentage">
                <span :style="getRandomColor()"></span>
              </div>
            </div>

            <div
              style="font-size:32px; font-weight: bold; margin-left:75px; margin-bottom: 19px;"
              class="percentage"
            >
              {{ skill.percentage }}%
            </div>
          </div>
        </div>
        <div
          class="about"
          v-show="activeTab === 'about'"
          :class="{ active: activeTab === 'about' }"
        >
          <div class="about-me">
            <div class="about-title">About me</div>
            <vue-markdown class="about-text">{{ currentUser.personal_info.about }}</vue-markdown>
          </div>
          <div class="contact">
            <div class="contact-title">Contact</div>
            <div class="email">
              Email: {{ currentUser.personal_info.email }}
            </div>
          </div>
        </div>
        <Hobbies
          v-show="activeTab === 'hobbies'"
		      :class="{ active: activeTab === 'hobbies' }"
          :currentUser="currentUser"
        ></Hobbies>
        <References
          v-show="activeTab === 'references'"
		      :class="{ active: activeTab === 'references' }"
          :currentUser="currentUser"
        ></References>
        <Achievements
          v-show="activeTab === 'achievements'"
		      :class="{ active: activeTab === 'achievements' }"
          :currentUser="currentUser"
        ></Achievements>
      </div>
    </div>
  </v-app>
</template>

<script>
import Slick from "vue-slick";
import VueMarkdown from 'vue-markdown';
import Audio from './media/Audio'

import HeaderTheme8 from './header';
import Portfolio from './portfolio';
import Hobbies from './hobbies';
import References from './references';
import Achievements from './achievements';

export default {
  name: "theme8",
  props: ["user", "is_preview", "currentTab"],
  components: {
    Slick,
    'vue-markdown': VueMarkdown,
    HeaderTheme8,
    Portfolio,
    Hobbies,
    References,
    Achievements,
  },
  data() {
    return {
      tabs: [
        {
          text: "Portfolio",
          value: "portfolio"
        },
        {
          text: "Work",
          value: "work-experience"
        },
        {
          text: "Education",
          value: "education"
        },
        {
          text: "Skills",
          value: "skills"
        },
        {
          text: "Hobbies",
          value: "hobbies"
        },
        {
          text: "References",
          value: "references"
        },
        {
          text: "Achievements",
          value: "achievements"
        },
        {
          text: "About",
          value: "about"
        },
      ],
      isVisibleAudioPopup: false,
      activeTab: "portfolio",
      slickOptions: {
        dots: false,
        arrows: false,
        slidesToShow: 5,
        responsive: [
          {
            breakpoint: 991,
            settings: {
              dots: false,
              arrows: false,

              centerMode: true,
              slidesToShow: 1
            }
          }
        ]
      },
      currentUser: this.user
    };
  },
  methods: {
    toogleAudioPopup () {
      this.isVisibleAudioPopup = !this.isVisibleAudioPopup;
    },
    stringToLowerCase(string) {
      if (string) {
        return string.toLowerCase();
      }
      return "social_icon";
    },

    skillsBar() {
      $(".skills .skill .skill-bar span").each(function() {
        $(this).animate(
          {
            width:
              $(this)
                .parent()
                .attr("data-bar") + "%"
          },
          1000
        );
      });
    },
    getRandomColor() {
      return "background:#" + Math.floor(Math.random() * 16777215).toString(16);
    },
    setDummyUser() {
      this.currentUser = this.$store.state.dummyUser;
    }
  },
  watch: {
    // if current tab changed, change the active tab as well.
    currentTab: function(val) {
      this.activeTab = val;
    }
  },
  computed: {
    socialLinks() {
      return this.user.links.filter(link => {
        return link.category === "social_link" ? link : false;
      });
    }
  },
  mounted() {
    this.skillsBar();
    // if there is no user or the preview is true, set dummy user
    if (!this.currentUser || this.is_preview) {
      this.setDummyUser();
    }
    // let user accessible in included components.
    this.$store.dispatch("updateThemeUser", this.currentUser);
  }
};
</script>

<style lang="scss">
@import url(//fonts.googleapis.com/earlyaccess/thabit.css);

#resumeTheme8 {
  font-family: 'Thabit', 'Courier New', Courier, monospace;


  .hideOnNotTablet {
    @media only screen and (min-width: 768px) {
      display: none !important;
    }
  }
  .hideOnNotPhone {
    @media only screen and (min-width: 760px) {
      display: none !important;
    }
  }

  .v-application--wrap {
    width: 100%;
  }

  .theme-container {
    display: flex;
    position: relative;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    width: 100vw;
    overflow-x: hidden;
    background-image: url("/images/resume_themes/theme8/background.svg");
    background-attachment: fixed;
    font-family: "Thabit", monospace !important;
    max-width: 1920px;

    .tabs-bar-wrapper {
      width: 100%;
      height: 119px;
      position: relative;
      z-index: 1;
      background: #333232;
      box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
      
      .v-tabs {
        height: 100%;
        background: transparent;

        .v-tabs-bar {
          height: 100%;
          background: transparent;

        }

        .v-tabs-slider {
          background-color: #005bd1;
          height: 4px;
        }


        .v-tab {
          font-style: italic;
          font-weight: bold;
          font-size: 24px;
          line-height: 48px;
          color: white;
          position: relative;
          padding: 0 20px;
          text-transform: none !important;

          &--active {
            color: #005bd1;
          }

          &::before {
            display: none;
          }
        }

        .v-tab:hover {
          cursor: pointer;
          color: #005bd1;
          text-shadow: 0px 0px 16px rgba(142, 192, 255, 0.3);
        }

        .v-slide-group__next .v-icon,
        .v-slide-group__prev .v-icon {
          color: #fff !important;

          &--disabled {
            color: rgba(255, 255, 255, 0.2) !important;
          }
        }
      }
    }


    .tabs-wrapper {
      position: relative;
      z-index: 1;
      width: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 0 150px 67px 150px;
      overflow-x: hidden;

      .tab-content-wrapper {
        width: 100%;
        margin-top: 115px;

        .portfolio.active,
        .skills.active,
        .about.active,
        .work-experience.active,
        .education.active {
          opacity: 1;
        }

        .portfolio,
        .about,
        .work-experience,
        .education {
          opacity: 0;
          transition: all 0.6s ease;
        }

        .work-experience {
          display: flex;
          flex-wrap: wrap;
          justify-content: space-between;
          width: 100%;

          .work-item {
            margin-bottom: 29px;
            max-width: 790px;
            width: 49%;
            background: #333232;
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
            border-radius: 30px;
            padding: 38px 75px;

            .company {
              font-style: normal;
              font-weight: bold;
              font-size: 36px;
              line-height: 48px;
              color: #ffffff;
              margin-bottom: 14px;
            }

            .title {
              font-family: 'Thabit', 'Courier New', Courier, monospace;
              font-weight: bold;
              font-size: 32px;
              line-height: 42px;
              color: #ffffff;
              margin-bottom: 18px;
            }

            .duration {
              font-weight: bold;
              font-size: 22px;
              line-height: 29px;
              color: #1f5de4;
              margin-bottom: 30px;
            }

            .work-info {
              font-weight: 500;
              font-size: 20px;
              line-height: 26px;
              color: #ffffff;
            }
          }
        }

        .education {
          display: flex;
          flex-wrap: wrap;
          justify-content: space-between;
          width: 100%;

          .education-item {
            margin-bottom: 29px;
            max-width: 790px;
            width: 49%;
            background: #333232;
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
            border-radius: 30px;
            padding: 38px 75px;

            .education-type {
              font-style: normal;
              font-weight: bold;
              font-size: 18px;
              line-height: 24px;
              color: #1f5de4;
              margin-bottom: 10px;
              margin-top: 10px;
            }

            .education-name {
              font-weight: bold;
              font-size: 32px;
              line-height: 42px;
              color: #ffffff;
              margin-bottom: 12px;
            }

            .education-date {
              font-weight: bold;
              font-size: 22px;
              line-height: 29px;
              color: #1f5de4;
              margin-bottom: 25px;
            }

            .education-info {
              font-weight: 500;
              font-size: 20px;
              line-height: 26px;
              color: #ffffff;
            }
          }
        }

        .skills-tab {
          display: flex;
          justify-content: space-between;
          flex-wrap: wrap;

          .skill-item {
            max-width: 790px;
            width: 49%;
            height: 287px;
            padding-left: 58px;
            padding-right: 58px;
            padding-bottom: 58px;
            margin-bottom: 25px;
            background: #333232;
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
            border-radius: 30px;
          }

          .percentage {
            font-weight: bold;
            font-size: 42px !important;
            line-height: 56px;
            color: #ffffff !important;
          }
        }

        .about {
          width: 100%;
          margin-top: 0;
          background: #333232;
          box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
          border-radius: 30px;
          padding: 58px;

          .about-me {
            .about-title {
              font-weight: bold;
              font-size: 26px;
              line-height: 36px;
              color: #ffffff;
            }

            .about-text {
              margin-top: 30px;
              font-size: 18px;
              color: #ffffff;
            }
          }

          .contact {
            margin-top: 68px;

            .contact-title {
              line-height: 33px;
              font-size: 24px;
              color: #ffffff;
              font-weight: 500;
              margin-bottom: 33px;
            }

            .email {
              line-height: 33px;
              font-size: 20px;
              color: #ffffff;
              font-weight: 500;
            }
          }
        }

        
      }
    }
  }

  @media only screen and (max-width: 1200px) {
    .theme-container {
      .tabs-wrapper {
        padding: 0 80px 67px 80px;
      }
    }
  }

  @media only screen and (max-width: 768px) {
    /* CSS that should be displayed if width is equal to or less than 1600px and larger
          than 760px goes here */

    .theme-container {
      display: flex;
      justify-content: center;
      flex-direction: column;
      align-items: center;
      width: 100%;
      background: #201f1f;
      font-family: "Thabit", monospace !important;
      max-width: 1920px;

      .v-tabs {
        height: 101px;
        padding: 0 20px;

        .v-tab {
          font-size: 26px;
          padding: 0 10px;
          line-height: 32px;
        }
      }

      .tabs-wrapper {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 0 20px 50px 20px;

        .tab-content-wrapper {
          margin-top: 60px;

          .portfolio.active,
          .skills.active,
          .about.active,
          .work-experience.active,
          .education.active {
            opacity: 1;
          }

          .portfolio,
          .about,
          .work-experience,
          .education {
            opacity: 0;
            transition: all 0.6s ease;
          }

          .work-experience {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            width: 100%;

            .work-item {
              margin-bottom: 29px;
              width: 657px;
              background: #333232;
              box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
              border-radius: 30px;
              padding: 50px 30px;

              .company {
                font-style: normal;
                font-weight: bold;
                font-size: 36px;
                line-height: 48px;
                color: #ffffff;
                margin-bottom: 20px;
              }

              .title {
                font-size: 20px;
                line-height: 24px;
                margin-bottom: 27px;
              }

              .duration {
                font-weight: bold;
                font-size: 20px;
                line-height: 24px;
                color: #1f5de4;
                margin-bottom: 40px;
              }

              .work-info {
                font-weight: 500;
                font-size: 14px;
                line-height: 18px;
                color: #ffffff;
              }
            }
          }

          .education {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            width: 100%;

            .education-item {
              margin-bottom: 29px;
              width: 657px;
              background: #333232;
              box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
              border-radius: 30px;
              padding: 50px 30px;

              .education-type {
                font-style: normal;
                font-weight: bold;
                font-size: 18px;
                line-height: 24px;
                color: #1f5de4;
                margin-bottom: 20px;
                margin-top: 20px;
              }

              .education-name {
                font-weight: bold;
                font-size: 36px;
                line-height: 48px;
                color: #ffffff;
                margin-bottom: 32px;
              }

              .education-date {
                font-weight: bold;
                font-size: 24px;
                line-height: 32px;
                color: #1f5de4;
                margin-bottom: 10px;
              }

              .education-info {
                font-weight: 500;
                font-size: 18px;
                line-height: 23px;
                color: #ffffff;
              }
            }
          }

          .skills-tab {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;

            .skill-item {
              width: 656px;
              height: 234px;
              padding-left: 50px;
              padding-right: 50px;
              padding-bottom: 58px;
              margin-bottom: 50px;
              background: #333232;
              box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
              border-radius: 30px;
            }

            .percentage {
              font-weight: bold;
              font-size: 36px !important;
              line-height: 48px;
              color: #ffffff !important;
            }
          }

          .about {
            width: 100%;
            margin-top: 0;
            background: #333232;
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
            border-radius: 30px;
            padding: 58px;

            .about-me {
              .about-title {
                font-weight: bold;
                font-size: 26px;
                line-height: 36px;
                color: #ffffff;
              }

              .about-text {
                margin-top: 30px;
                font-size: 18px;
                color: #ffffff;
              }
            }

            .contact {
              margin-top: 68px;

              .contact-title {
                line-height: 33px;
                font-size: 24px;
                color: #ffffff;
                font-weight: 500;
                margin-bottom: 33px;
              }

              .email {
                line-height: 33px;
                font-size: 20px;
                color: #ffffff;
                font-weight: 500;
              }
            }
          }
        }
      }
    }

    .hideMeOnTablet {
      display: none !important;
    }
  }

  @media only screen and (max-width: 610px) {
    .theme-container {
      display: flex;
      position: relative;
      justify-content: center;
      flex-direction: column;
      align-items: center;
      width: 100%;
      background-image: url("/images/resume_themes/theme8/background.svg");
      background-attachment: fixed;
      font-family: "Thabit", monospace !important;
      max-width: 1920px;

      .tabs-bar {
        height: 90px;
        padding: 0 20px;

        .v-tab {
          font-size: 18px;
          line-height: 48px;
        }
      }

      .tabs-wrapper {
        position: relative;
        z-index: 1;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;

        .tab-content-wrapper {
          width: 100%;
          margin-top: 115px;

          .portfolio.active,
          .skills.active,
          .about.active,
          .work-experience.active,
          .education.active {
            opacity: 1;
          }

          .portfolio,
          .about,
          .work-experience,
          .education {
            opacity: 0;
            transition: all 0.6s ease;
          }

          .work-experience {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            width: 100%;

            .work-item {
              margin-bottom: 29px;
              width: 790px;
              background: #333232;
              box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
              border-radius: 30px;
              padding: 38px 75px;

              .company {
                font-style: normal;
                font-weight: bold;
                font-size: 36px;
                line-height: 48px;
                color: #ffffff;
                margin-bottom: 14px;
              }

              .title {
                font-size: 32px;
                line-height: 42px;
                margin-bottom: 18px;
              }

              .duration {
                font-weight: bold;
                font-size: 22px;
                line-height: 29px;
                color: #1f5de4;
                margin-bottom: 30px;
              }

              .work-info {
                font-weight: 500;
                font-size: 20px;
                line-height: 26px;
                color: #ffffff;
              }
            }
          }

          .education {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            width: 100%;

            .education-item {
              margin-bottom: 29px;
              width: 790px;
              background: #333232;
              box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
              border-radius: 30px;
              padding: 38px 75px;

              .education-type {
                font-style: normal;
                font-weight: bold;
                font-size: 18px;
                line-height: 24px;
                color: #1f5de4;
                margin-bottom: 10px;
                margin-top: 10px;
              }

              .education-name {
                font-weight: bold;
                font-size: 32px;
                line-height: 42px;
                color: #ffffff;
                margin-bottom: 12px;
              }

              .education-date {
                font-weight: bold;
                font-size: 22px;
                line-height: 29px;
                color: #1f5de4;
                margin-bottom: 25px;
              }

              .education-info {
                font-weight: 500;
                font-size: 20px;
                line-height: 26px;
                color: #ffffff;
              }
            }
          }

          .skills-tab {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;

            .skill-item {
              width: 790px;
              height: 287px;
              padding-left: 58px;
              padding-right: 58px;
              padding-bottom: 58px;
              margin-bottom: 25px;
              background: #333232;
              box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
              border-radius: 30px;
            }

            .percentage {
              font-weight: bold;
              font-size: 42px !important;
              line-height: 56px;
              color: #ffffff !important;
            }
          }

          .about {
            width: 100%;
            margin-top: 0;
            background: #333232;
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
            border-radius: 30px;
            padding: 58px;

            .about-me {
              .about-title {
                font-weight: bold;
                font-size: 26px;
                line-height: 36px;
                color: #ffffff;
              }

              .about-text {
                margin-top: 30px;
                font-size: 18px;
                color: #ffffff;
              }
            }

            .contact {
              margin-top: 68px;

              .contact-title {
                line-height: 33px;
                font-size: 24px;
                color: #ffffff;
                font-weight: 500;
                margin-bottom: 33px;
              }

              .email {
                line-height: 33px;
                font-size: 20px;
                color: #ffffff;
                font-weight: 500;
              }
            }
          }
        }
      }
    }
  }

  //slick css

  // end of slick

  // skills bar css :
  .skills,
  .skills .skill,
  .skills .skill .skill-title,
  .skills .skill .skill-bar {
    width: 100%;
    float: left;
  }

  .skills {
    padding: 0px 15px 10px 15px;
  }

  .skills .skill {
    margin-bottom: 30px;
  }

  .skills .skill .skill-title {
    font-weight: bold;
    font-size: 32px;
    line-height: 42px;
    color: #ffffff;
    margin-bottom: 25px;

    @media only screen and (max-width: 1600px) and (min-width: 760px) {
      color: #ffffff;
      font-size: 32px;
      line-height: 42px;
      font-weight: bold;
      margin-bottom: 25px;
    }
    @media only screen and (max-width: 765px) {
      line-height: 20px;
      font-size: 14px;
    }
  }

  .skills .skill .skill-bar {
    width: 100%;
    height: 20px;
    border-radius: 23px;
    background: #c4c1d7;
    transition: 1s cubic-bezier(1, 0, 0.5, 1);
    -webkit-transition: 1s cubic-bezier(1, 0, 0.5, 1);
    -ms-transition: 1s cubic-bezier(1, 0, 0.5, 1);

    @media only screen and (max-width: 1600px) and (min-width: 760px) {
      height: 16px;
    }
    @media only screen and (max-width: 765px) {
      height: 10px;
    }
  }

  .skills .skill .skill-bar.orange {
    background: #ffd7b2;
  }

  .skills .skill .skill-bar span.orange {
    background: #ff7c00;
  }

  .skills .skill .skill-bar.red {
    background: #ffc1ec;
  }

  .skills .skill .skill-bar span.red {
    background: #ff26be;
  }

  .skills.active .skill .skill-bar {
    width: 100%;
  }

  .skills .skill .skill-bar span {
    float: left;
    width: 0;
    background: #3c327b;
    height: 20px;
    border-radius: 23px;
    position: relative;
    transition: 1s cubic-bezier(1, 0, 0.5, 1);
    -webkit-transition: 1s cubic-bezier(1, 0, 0.5, 1);
    -ms-transition: 1s cubic-bezier(1, 0, 0.5, 1);

    @media only screen and (max-width: 1600px) and (min-width: 760px) {
      height: 16px;
    }
    @media only screen and (max-width: 765px) {
      height: 10px;
    }
  }

  .skills .skill .skill-bar span b {
    float: left;
    width: 100%;
    position: relative;
    text-align: right;
    opacity: 1;
    font-size: 14px;
    color: #3c327b;
    font-weight: 400;
    top: -13px;
  }

  // particles styles
  #particles-js {
    position: absolute;
    height: 100%;
    width: 100%;
  }

  @mixin modalPostion {
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
  @mixin modalPostionTablet {
    position: absolute;
    top: 50%;
    left: 46%;
    transform: translate(-50%, -50%);
  }
  @mixin modalPostionMobile {
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-54%, -50%);
  }
  .media {
    width: 100%;
    height: 100vh;
    z-index: 9999;
    position: fixed;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.5);
    &__content {
      @include modalPostion;
      width: 95%;
      height: 40rem;
      background-color: #fff;
      border-radius: 30px;
      @media only screen and (min-width: 650px) and (max-width: 1024px) {
        @include modalPostionTablet;
        width: 88%;
        height: 30rem;
      }
      @media only screen and (min-width: 320px) and (max-width: 500px) {
        @include modalPostionMobile;
        width: 85%;
        height: 30rem;
      }
      &_close {
        width: 30px;
        height: 30px;

        border-radius: 50%;
        background: #5289e7;
        color: #fff;
        float: right;
        margin-top: 1.5rem;
        margin-right: 1.5rem;

        a > img {
          width: 25px;
          height: 25px;
          margin: auto;
          margin-top: 2px;
        }
      }
      &__audio {
        margin-top: 6%;
        @media only screen and (min-width: 650px) and (max-width: 1024px) {
          margin-top: 7%;
        }
        @media only screen and (min-width: 320px) and (max-width: 500px) {
          margin-top: 12%;
        }
      }
    }
    &__contentV {
      @include modalPostion;
      width: 95%;
      height: 40rem;
      background-color: #fff;
      border-radius: 30px;
      @media only screen and (min-width: 650px) and (max-width: 1024px) {
        @include modalPostionTablet;
        width: 88%;
        height: 60rem;
      }
      @media only screen and (min-width: 320px) and (max-width: 500px) {
        top: 52%;
        left: 50%;
        transform: translate(-55%, -50%);
        width: 85%;
        height: 43rem;
      }
      &_close {
        width: 30px;
        height: 30px;

        border-radius: 50%;
        background: #5289e7;
        color: #fff;
        float: right;
        margin-top: 1.5rem;
        margin-right: 1.5rem;

        a > img {
          width: 25px;
          height: 25px;
          margin: auto;
          margin-top: 2px;
        }
      }

      &__video {
        margin-top: 6%;
        @media only screen and (min-width: 650px) and (max-width: 1024px) {
          margin-top: 7%;
        }
        @media only screen and (min-width: 320px) and (max-width: 500px) {
          margin-top: 10%;
        }
      }
    }
  }
}
</style>
