<template>
  <div class="themeWrapper">
    <div class="mainThemeBar">
      <div class="left">
        <div class="d-flex">
          <div class="avatar">
            <img src="/images/resume_themes/theme4/person.png" alt="profile pic" />
          </div>
          <div class="info">
            <div class="user-name">Zoyee Allena</div>
            <div class="job-title">Visual deisgner</div>
            <div class="social-icons">
              <img src="/images/resume_themes/theme4/Behance-icon.png" alt />
              <img src="/images/resume_themes/theme4/Dribbble-icon.png" alt />
              <img src="/images/resume_themes/theme4/Instagram-icon.png" alt />
            </div>
          </div>
        </div>
        <div class="interviews hideOnNotPhone">
          <div
            class="interview-text hideMeOnTablet hideMeOnPhone"
            style="margin-right:20px;"
          >Your interviews:</div>
          <div class="upload-btn-box" style="margin-bottom:20px;">
            <img src="/images/resume_themes/theme4/Icon-1.svg" alt />
            <div class="hideMeOnPhone">AUDIO</div>
          </div>
          <div class="upload-btn-box">
            <img src="/images/resume_themes/theme4/Icon.svg" alt />
            <div class="hideMeOnPhone">VIDEO</div>
          </div>
        </div>
      </div>

      <div class="right">
        <div class="interviews hideMeOnPhone">
          <div
            class="interview-text hideMeOnTablet hideMeOnPhone"
            style="margin-right:20px;"
          >Your interviews:</div>
          <div class="upload-btn-box" style="margin-right:10px;">
            <img src="/images/resume_themes/theme4/Icon-1.svg" alt />
            <div class="hideMeOnPhone">AUDIO</div>
          </div>
          <div class="upload-btn-box">
            <img src="/images/resume_themes/theme4/Icon.svg" alt />
            <div class="hideMeOnPhone">VIDEO</div>
          </div>
        </div>
        <div class="prof-info">
          <div class="hourly-rate d-flex">
            <div class="hourly-rate-text">15$</div>
            <div class="hourly-rate-text light text-center">Hourly Rate</div>
          </div>
          <div class="weekly-availability d-flex">
            <div class="hourly-rate-text">35hr</div>
            <div class="hourly-rate-text light text-center">Weekly Availability</div>
          </div>
          <div class="hire-me-btn NoDecor">
            <a href="javascript:void(0)">HIRE ME</a>
          </div>
        </div>
      </div>
    </div>
    <div class="tabs-bar">
      <div class="tab-text w-100" :class="{borderRight : activeTab === 'portfolio'}">
        <span style="opacity:0">text</span>
      </div>
      <div
        class="tab-text"
        @click="setActiveTab('portfolio')"
        style="margin-left: -1px;"
        :class="{active : activeTab === 'portfolio',borderRight : activeTab === 'work'}"
      >Portfolio</div>
      <div
        class="tab-text"
        @click="setActiveTab('work')"
        style="margin-right: -1px; margin-left: -1px;"
        :class="{active : activeTab === 'work', borderLeft : activeTab === 'portfolio',borderRight : activeTab === 'education'}"
      >Work</div>
      <div
        class="tab-text"
        @click="setActiveTab('education')"
        style="margin-right: -1px;"
        :class="{active : activeTab === 'education',borderLeft : activeTab === 'work'}"
      >Education</div>
      <div class="tab-text w-100" :class="{borderLeft : activeTab === 'education'}">
        <span style="opacity:0">text</span>
      </div>
    </div>
    <div class="main-tab-content">
      <div class="skills">
        <div class="skills-tabs d-flex justify-content between">
          <div
            class="skills-tab-text"
            :class="{active : activeSkillTab === 'programming-languages'}"
            @click="setActiveSkillTab('programming-languages')"
          >Programming Languages</div>
          <div
            class="skills-tab-text"
            :class="{active : activeSkillTab === 'framewroks-databases'}"
            @click="setActiveSkillTab('framewroks-databases')"
          >Frameworks</div>
          <div
            class="skills-tab-text"
            :class="{active : activeSkillTab === 'design-skills'}"
            @click="setActiveSkillTab('design-skills')"
          >Design Skills</div>
          <div
            class="skills-tab-text mr-0"
            :class="{active : activeSkillTab === 'software'}"
            @click="setActiveSkillTab('software')"
          >Software</div>
        </div>
        <div class="skills-icons-bar" id="style-1">
          <img class="icon" src="/images/resume_themes/theme4/skills/PS.png" alt="skill-icon" />
          <img class="icon" src="/images/resume_themes/theme4/skills/Ai.png" alt="skill-icon" />
          <img class="icon" src="/images/resume_themes/theme4/skills/Lr.png" alt="skill-icon" />
          <img class="icon" src="/images/resume_themes/theme4/skills/Xd.png" alt="skill-icon" />
          <img class="icon" src="/images/resume_themes/theme4/skills/Id.png" alt="skill-icon" />
        </div>
      </div>

      <div class="portfolio" v-show="activeTab === 'portfolio'">
        <slick class="portfolioSlides" ref="slick" :options="slickOptions">
          <img src="/images/resume_themes/theme4/portfolio1.png" alt="portfolio image" />
          <img src="/images/resume_themes/theme4/portfolio1.png" alt="portfolio image" />
          <img src="/images/resume_themes/theme4/portfolio1.png" alt="portfolio image" />
        </slick>
      </div>
      <!-- Work -->
      <div class="work mt-5" v-show="activeTab === 'work'">
        <div class="container" style="width:100%">
          <div class="row">
            <div class="col-md-12 col-sm-10 col-xs-10 mx-auto work-column" v-for="n in 3" :key="n">
              <section class="work-timeline">
                <div class="work-content">
                  <div class="work-title">Senior UI/UX Designer</div>
                  <div class="work-subtitle">
                    <span>Big Bang Design</span> / May 2018 -Present
                  </div>
                  <div
                    class="work-text"
                  >Partners with clients, ranging from small businesses to Fortune 500 companies, to create cutting-edge digital marketing designs targeting the American market. Forms a creative vision and clearly conveys ideas using both visual and verbal communication. Collaborates with a creative team consisting of web developers, content creators, and digital designers, to create engaging digital collateral. Creates the end-to-end design for responsive websites using a mobile-first approach.</div>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
      <!-- Work -->
      <!-- Education -->
      <div class="work mt-5" v-show="activeTab === 'education'">
        <div class="container" style="width:100%">
          <div class="row">
            <div class="col-12 mx-auto work-column" v-for="n in 3" :key="n">
              <section class="work-timeline">
                <div class="work-content">
                  <div class="work-title">Udemy</div>
                  <div class="work-subtitle">
                    <span>UI/UX DESIGN COURSE</span> / September 2015 - December 2015
                  </div>
                  <div
                    class="work-text"
                  >Partners with clients, ranging from small businesses to Fortune 500 companies, to create cutting-edge digital marketing designs targeting the American market. Forms a creative vision and clearly conveys ideas using both visual and verbal communication. Collaborates with a creative team consisting of web developers, content creators, and digital designers, to create engaging digital collateral. Creates the end-to-end design for responsive websites using a mobile-first approach.</div>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>

      <!-- Education -->
    </div>
  </div>
</template>

<script>
import Slick from "vue-slick";

export default {
  props: ["user"],
  components: {
    Slick
  },
  data() {
    return {
      activeTab: "portfolio",
      activeSkillTab: "programming-languages",
      slickOptions: {
        centerMode: true,
        infinite: true,
        dots: true,
        arrows: false,
        slidesToShow: 2,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 786,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 991,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      }
    };
  },
  methods: {
    setActiveTab(tabName) {
      this.activeTab = tabName;
    },
    setActiveSkillTab(tabName) {
      this.activeSkillTab = tabName;
    }
  },
  mounted() {}
};
</script>

<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Archivo&display=swap"');
.hideOnNotPhone {
  @media only screen and (min-width: 765px) {
    display: none !important;
  }
}

.themeWrapper {
  counter-reset: my-sec-counter;
  width: 100%;
  max-width: 1920px;
  background: white;
  // work
  .work-column {
    margin-top: -100px;
    @media only screen and (max-width: 599px){
      margin-top: 0px;
    }
  }
  .work-title {
    font-family: "Archivo" !important;
    font-weight: bold;
    font-size: 24px;
    line-height: 26px;
    color: #222b4c;
  }
  .work-subtitle {
    margin-top: 15px;
    margin-bottom: 30px;
    font-family: "Archivo" !important;
    font-size: 14px;
    line-height: 15px;
    font-style: italic;
    color: #a4a6ae;
    span {
      font-weight: 600;
      color: #01a2fe;
      font-style: normal;
    }
  }
  .work-text {
    font-family: "Archivo" !important;
    font-size: 18px;
    line-height: 30px;
    color: #9ca4c1;
    @media only screen and (max-width:599px){
      font-size:14px;
    }
  }

  .work-timeline {
    height: 300px;
    margin: 90px auto;
    padding: 0 20px 0 80px;
    border-left: 2px solid #c6e8fc;
    @media only screen and (max-width:599px) {
      margin: 28px auto;
      margin-left:30px;
      padding: 0 20px 0 30px;
      height:416px
    }
  }

  .work-content::before {
    font-family: "Archivo" !important;
    counter-increment: my-sec-counter;
    content: "0" counter(my-sec-counter);
    font-size: 72px;
    color: rgba(1, 162, 254, 0.2);
    display: block;
    width: 60px;
    height: 60px;
    position: absolute;
    top: -8px;
    left: -15px;
    @media screen and (max-width: 599px){
      font-size: 40px;
      top:-33px;
      left:24px
    }
  }
  // work
  .mainThemeBar {
    padding-top: 40px;
    padding-left: 70px;
    padding-right: 70px;
    flex-wrap: wrap;
    display: flex;
    justify-content: space-between;
    align-items: center;

    .left {
      display: flex;

      .avatar {
        margin-right: 56px;

        img {
          width: 226px;
          height: 226px;
          border-radius: 50%;
        }

        @media only screen and (max-width: 600px) {
          margin-right: 15px;
          img {
            width: 50px;
            height: 50px;
          }
        }
      }

      .info {
        margin-top: 35px;
        display: flex;
        flex-direction: column;

        .user-name {
          margin-left: -2px;
          font-size: 36px;
          font-weight: bold;
          line-height: 39px;
          color: #222b4c;
          @media only screen and (max-width: 600px) {
            font-size: 16px;
            line-height: 24px;
          }
        }

        .job-title {
          margin-top: 15px;
          font-weight: 500;
          font-size: 20px;
          line-height: 22px;
          color: #9ca4c1;
          @media only screen and (max-width: 600px) {
            font-size: 12px;
            line-height: 15px;
          }
        }

        .social-icons {
          display: flex;
          margin-top: 30px;
          img {
            width: 50px;
            height: 50px;
            margin-right: 20px;
            border-radius: 50%;
          }
          img:last-child {
            margin-right: 0;
          }
        }
      }
    }

    .right {
      .interviews {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        width: 100%;
        .interview-text {
          font-weight: 600;
          font-size: 24px;
          line-height: 26px;
          color: #222b4c;
        }

        .upload-btn-box {
          display: flex;
          justify-content: center;
          align-items: center;
          background: #e7f6ff;
          border-radius: 6px;
          width: 170px;
          height: 60px;

          font-weight: 600;
          font-size: 14px;
          line-height: 15px;
          text-align: center;
          color: #00a3ff;

          img {
            width: 20px;
            height: 16px;
            margin-right: 10px;
          }
        }
      }

      .prof-info {
        display: flex;
        align-items: center;
        margin-top: 40px;

        .hourly-rate {
          margin-right: 30px;
          align-items: baseline;
        }

        .weekly-availability {
          margin-right: 30px;
          align-items: baseline;
        }

        .hourly-rate-text {
          font-weight: 500;
          font-size: 42px;
          line-height: 46px;
          color: #222b4c;
          margin-right: 10px;
        }

        .hourly-rate-text.light {
          font-weight: 500;
          font-size: 18px;
          line-height: 20px;
          color: #9ca4c1;
        }

        .hire-me-btn {
          a {
            font-weight: 600;
            font-size: 14px;
            line-height: 15px;
            text-align: center;
            color: #ffffff;
            background: #00a3ff;
            border-radius: 6px;
            height: 60px;
            width: 170px;
            display: flex;
            justify-content: center;
            align-items: center;
          }
        }
      }
    }
  }

  .tabs-bar {
    display: flex;
    margin-top: 30px;
    width: 100%;
    background: white;
    height: 80px;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    .tab-text {
      font-family: inherit;
      font-style: normal;
      font-weight: 500;
      font-size: 32px;
      line-height: 35px;
      color: #ffffff;
      padding-top: 25px;
      padding-bottom: 25px;
      padding-right: 45px;
      padding-left: 45px;
      position: relative;
      background: #00a3ff;
    }

    .tab-text:not(:last-child) {
    }

    .tab-text.active {
      color: #00a3ff;
      background-color: white;
    }

    .tab-text.borderLeft {
      border-radius: 100px 0px 0px 100px;
    }

    .tab-text.borderRight {
      border-radius: 0px 100px 100px 0px;
    }

    .tab-text:hover {
      cursor: pointer;
    }

    .arrow {
      img {
        width: 30px;
        height: 30px;
      }
    }
  }

  .main-tab-content {
    margin-top: 60px;
    padding-bottom: 45px;

    .skills {
      .skills-tabs {
        display: flex;
        justify-content: center;
        overflow-x: auto;
        width: 100%;
        .skills-tab-text {
          font-weight: 600;
          font-size: 20px;
          line-height: 22px;
          color: #9ca4c1;
          padding-bottom: 20px;
          padding-left: 20px;
          padding-right: 20px;
          white-space: nowrap;
        }

        .skills-tab-text:hover {
          cursor: pointer;
        }

        .skills-tab-text.active {
          font-weight: 600;
          font-size: 20px;
          line-height: 22px;
          color: #01a2ff;
          border-bottom: 3px solid #01a2ff;
        }
      }

      .skills-icons-bar {
        margin-top: 45px;
        padding-bottom: 10px;
        display: flex;
        justify-content: center;
        overflow-x: auto;

        img {
          width: 70px;
          height: 70px;
          margin-right: 40px;
        }

        img:last-child {
          margin-right: 0;
        }
      }
    }

    .portfolio {
      .portfolioSlides {
        padding-left: 40px;
        padding-right: 40px;
        display: flex;
        justify-content: center;
        flex-direction: column;
        @media only screen and (max-width: 765px) {
          padding-left: 0px;
          padding-right: 0px;
        }
        @media only screen and (min-width: 1600px) {
          padding-left: 135px;
          padding-right: 135px;
        }
        img {
          margin-top: 25px;
          margin-right: 25px;
          margin-left: 25px;
          width: 510px !important;
          height: 400px;
          border-radius: 30px;
          @media only screen and (max-width: 765px) {
            width: 177px !important;
            height: 139px;
          }
        }

        .slide-text {
          margin-top: 15px;
          font-style: normal;
          font-weight: normal;
          font-size: 20px;
          line-height: 23px;
          color: #333333;
        }
      }
    }

    .work {
    }

    .education {
    }
  }
}

@media only screen and (max-width: 1280px) and (min-width: 760px) {
  /* CSS that should be displayed if width is equal to or less than 1280 px and larger
         than 425px goes here */

  .hideMeOnTablet {
    display: none !important;
  }

  .themeWrapper {
    width: 100%;

    .mainThemeBar {
      padding: 20px;
      .left {
        .avatar {
          margin-right: 30px;
          img {
            width: 150px;
            height: 150px;
          }
        }

        .info {
          .user-name {
            font-size: 28px;
          }

          .job-title {
            font-size: 16px;
          }

          .social-icons {
            margin-top: 20px;
            img {
              width: 34px;
              height: 34px;
            }
            img:last-child {
            }
          }
        }
      }

      .right {
        align-items: center;
        display: flex;
        flex-direction: column;
        .interviews {
          display: flex;
          justify-content: flex-end;
          width: 100%;
          margin-top: 30px;
          .interview-text {
          }

          .upload-btn-box {
            width: 150px;
            height: 40px;
            img {
              width: 14px;
              height: 11px;
            }
          }
        }
        .prof-info {
          display: flex;
          align-items: center;
          justify-content: space-between;
          width: 100%;
          margin-top: 30px;
          .hourly-rate {
            display: flex;
            flex-direction: column;
            align-items: center;
          }

          .weekly-availability {
            display: flex;
            flex-direction: column;
            align-items: center;
          }

          .hourly-rate-text {
            font-size: 24px;
            line-height: 30px;
          }

          .hourly-rate-text.light {
            font-size: 12px;
          }

          .hire-me-btn {
            a {
              width: 120px;
              height: 40px;
              font-size: 12px;
            }
          }
        }
      }
    }

    .tabs-bar {
      margin-top: 21px;
      .tab-text {
        font-size: 24px;
      }

      .tab-text:not(:last-child) {
      }

      .tab-text.active {
      }

      .tab-text:hover {
      }

      .arrow {
        img {
        }
      }
    }

    .main-tab-content {
      margin-top: 40px;

      .skills {
        .skills-tabs {
          .skills-tab-text {
            font-size: 16px;
          }

          .skills-tab-text:hover {
          }

          .skills-tab-text.active {
            font-size: 16px;
          }
        }
        .skills-icons-bar {
          margin-top: 30px;
          img {
            width: 50px;
            height: 50px;
          }

          img:last-child {
          }
        }
      }

      .portfolio {
        margin-top: 30px;
        .portfolioSlides {
          margin-top: 0;
          img {
            width: 450px !important;
            height: 400px;
          }

          .slide-text {
          }
        }
      }

      .work {
      }

      .education {
      }
    }
  }
}

@media only screen and (max-width: 765px) {
  /* CSS that should be displayed if width is equal to or less than 765px */
  .hideMeOnPhone {
    display: none !important;
  }
  .themeWrapper {
    .mainThemeBar {
      padding: 20px;
      .left {
        display: flex;
        justify-content: space-between;
        width: 100%;
        align-items: center;
        .avatar {
          img {
            width: 120px;
            height: 120px;
          }
        }

        .info {
          margin-top: 16px;
          .user-name {
            font-size: 24px;
            line-height: 26px;
          }

          .job-title {
            margin-top: 10px;
            font-size: 16px;
            line-height: 17px;
          }

          .social-icons {
            margin-top: 14px;
            img {
              width: 30px;
              height: 30px;
              margin-right: 11px;
            }
            img:last-child {
            }
          }
        }
      }

      .right {
        width: 100%;

        .interviews {
          display: flex;
          flex-direction: column;

          .interview-text {
          }

          .upload-btn-box {
            width: 20px;
            height: 16px;
            background: none;
            margin-right: 0 !important;
            margin-bottom: 20px;
            img {
              margin-right: 0;
            }
          }
        }
        .prof-info {
          margin-top: 30px;
          justify-content: space-between;
          align-items: center;
          width: 100%;

          .hourly-rate {
            display: flex;
            flex-direction: column;
            align-items: center;
          }

          .weekly-availability {
            display: flex;
            flex-direction: column;
            align-items: center;
          }

          .hourly-rate-text {
            font-size: 24px;
            line-height: 26px;
          }

          .hourly-rate-text.light {
            font-size: 12px;
            line-height: 14px;
          }

          .hire-me-btn {
            a {
              width: 112px;
              height: 40px;
            }
          }
        }
      }
    }

    .tabs-bar {
      margin-top: 25px;
      .tab-text {
        font-size: 18px;
        padding-right: 25px;
        padding-left: 25px;
      }

      .tab-text:not(:last-child) {
      }

      .tab-text.active {
      }

      .tab-text:hover {
      }

      .arrow {
        img {
        }
      }
    }

    .main-tab-content {
      .skills {
        .skills-tabs {
          overflow: scroll;
          justify-content: flex-start !important;

          .skills-tab-text {
            font-size: 20px;
          }

          .skills-tab-text:hover {
          }

          .skills-tab-text.active {
            font-size: 20px;
          }
        }
        .skills-icons-bar {
          img {
            width: 45px;
            height: 45px;
          }

          img:last-child {
          }
        }
      }

      .portfolio {
        .portfolioSlides {
          margin-top: 20px;
          img {
            width: 300px !important;
            height: 290px;
          }

          .slide-text {
          }
        }
      }

      .work {
      }

      .education {
      }
    }
  }
}

//slick slides :

.slick-dots {
  bottom: -27px !important;
}

.slick-dots li button:before {
  font-size: 10px !important;
  @media only screen and (max-width: 600px) {
    font-size: 6px !important;
  }
}

.slick-dots li.slick-active button:before {
  opacity: 1;
  color: #5289e7;
}

.slick-slide.slick-current.slick-active {
  display: flex;
  justify-content: center;
}

/* scroll bar styles */

#style-2::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
  border-radius: 0;
}

#style-2::-webkit-scrollbar {
  width: 4px;
  background-color: rgba(255, 255, 255, 0.35);
}

#style-2::-webkit-scrollbar-thumb {
  border-radius: 1px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: white;
}

#style-1::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
  border-radius: 0;
}

#style-1::-webkit-scrollbar {
  height: 4px;
  background-color: rgba(255, 255, 255, 0.35);
}

#style-1::-webkit-scrollbar-thumb {
  border-radius: 1px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: white;
}
</style>
