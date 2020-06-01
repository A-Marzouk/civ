<template>
  <div class="hold_theme_29v1">
    <b-container fluid class="header">
      <div class="hold_profile_wrapper">
        <img class="piramid_pattern" src="/images/resume_themes/theme601/img/piramid_patter.svg" alt="Piramid" />
        <img class="cylindar_pattern" src="/images/resume_themes/theme601/img/cilinder_pattern.svg" alt="Piramid" />
        <b-row class="d-flex align-items-center">
          <b-col lg="5" xl="5" md="12" sm="12" cols="12" class="profile_info">
            <b-row class="d-flex align-items-center">
              <b-col lg="3" xl="3" md="3" sm="3" cols="3">
                <b-img
                  class="user_pic"
                  fluid
                  src="/images/resume_themes/theme601/img/profile_picture.png"
                  rounded="circle"
                  alt="Profile_picture"
                ></b-img>
              </b-col>

              <b-col lg="8" xl="8" md="8" sm="8" cols="8">
                <div class="profile_desc">
                  <h3 class="name">Beverly Andrews</h3>
                  <p class="designation">User interface designer</p>
                  <div class="other_icons">
                    <div class="rounded_icon share_icon">
                      <b-img fluid src="/images/resume_themes/theme601/img/share_icon.svg" alt></b-img>
                    </div>
                    <div class="rounded_icon">
                      <b-img fluid src="/images/resume_themes/theme601/img/audio_icon.svg" alt></b-img>
                    </div>
                    <div class="rounded_icon">
                      <b-img fluid src="/images/resume_themes/theme601/img/camera_icon.svg" alt></b-img>
                    </div>
                  </div>
                </div>
              </b-col>
            </b-row>
          </b-col>

          <b-col lg="4" xl="4" md="12" sm="12" cols="12">
            <p class="link-text">link to my profiles</p>
            <div class="social_media_link">
              <a href="#" class="rounded_icon">
                <b-img fluid src="/images/resume_themes/theme601/img/behance_icon.svg"></b-img>
              </a>
              <a href="#" class="rounded_icon">
                <b-img fluid src="/images/resume_themes/theme601/img/dribble_icon.svg"></b-img>
              </a>

              <a href="#" class="rounded_icon">
                <b-img fluid src="/images/resume_themes/theme601/img/instagram_icon.svg"></b-img>
              </a>

              <a href="#" class="rounded_icon">
                <b-img fluid src="/images/resume_themes/theme601/img/linkedIn_icon.svg"></b-img>
              </a>

              <a href="#" class="rounded_icon">
                <b-img fluid src="/images/resume_themes/theme601/img/google_plus_icon.svg"></b-img>
              </a>
            </div>
          </b-col>

          <b-col lg="3" xl="3" md="12" sm="12" cols="12" class="hire_me_section">
            <b-row>
              <b-col lg="6" xl="6" md="6" sm="6" cols="6">
                <p class="hire_text">Hire Me</p>
                <span class="price">$ 25 USD</span>
              </b-col>

              <b-col lg="6" xl="6" md="6" sm="6" cols="6" class="text-right left-border">
                <p class="hire_text">Available For</p>
                <span class="price">8 hours</span>
              </b-col>
            </b-row>

            <div class="hire_btn">
              <b-button pill class="hr_btn">Hire Me</b-button>
            </div>
          </b-col>
        </b-row>
      </div>
    </b-container>

    <div class="navigation">
      <div class="body_icon">
        <img src="/images/resume_themes/theme601/img/body_icon.svg" alt />
      </div>
      <b-tabs v-model="tabIndex" content-class="mt-3" fill nav-class="nav-tab-29v1">
        <b-tab class="addHere" :title-link-class="[linkClass(0), 'tab_29v1']">
          <template v-slot:title>
            <div class="rounded_icon b-tab-icon">
              <b-img fluid src="/images/resume_themes/theme601/img/portfolio_icon.svg"></b-img>
            </div>
            <p>Portfolio</p>
          </template>

          <div class="tab-content-wrapper">
            <b-container fluid>
              <b-row>
                <b-col lg="4" xl="4" md="12" sm="12" cols="12" class="portfolio_img">
                  <b-img src="/images/resume_themes/theme601/img/portfolio_one.jpg" fluid-grow alt="Portfolio one"></b-img>
                </b-col>

                <b-col lg="4" xl="4" md="12" sm="12" cols="12" class="portfolio_img">
                  <b-img src="/images/resume_themes/theme601/img/portfolio_one.jpg" fluid-grow alt="Portfolio one"></b-img>
                </b-col>

                <b-col lg="4" xl="4" md="12" sm="12" cols="12" class="portfolio_img">
                  <b-img src="/images/resume_themes/theme601/img/portfolio_one.jpg" fluid-grow alt="Portfolio one"></b-img>
                </b-col>

                <b-col lg="4" xl="4" md="12" sm="12" cols="12" class="portfolio_img">
                  <b-img src="/images/resume_themes/theme601/img/portfolio_one.jpg" fluid-grow alt="Portfolio one"></b-img>
                </b-col>

                <b-col lg="4" xl="4" md="12" sm="12" cols="12" class="portfolio_img">
                  <b-img src="/images/resume_themes/theme601/img/portfolio_one.jpg" fluid-grow alt="Portfolio one"></b-img>
                </b-col>

                <b-col lg="4" xl="4" md="12" sm="12" cols="12" class="portfolio_img">
                  <b-img src="/images/resume_themes/theme601/img/portfolio_one.jpg" fluid-grow alt="Portfolio one"></b-img>
                </b-col>
              </b-row>
            </b-container>
          </div>
        </b-tab>
        <b-tab class="addHere" :title-link-class="[linkClass(1), 'tab_29v1']">
          <template v-slot:title>
            <div class="rounded_icon b-tab-icon">
              <b-img fluid src="/images/resume_themes/theme601/img/work_icon.svg"></b-img>
            </div>
            <p>Work</p>
          </template>

          <div class="tab-content-wrapper work_wrapper">
            <b-container fluid>
              <b-row>
                <b-col lg="6" xl="6" md="12" sm="12" cols="12">
                  <div class="job_experience">
                    <b-row class="d-flex align-items-center mb-5">
                      <b-col lg="5" xl="5" md="5" sm="5" cols="5">
                        <h2 class="job-title">Google</h2>
                      </b-col>

                      <b-col lg="7" xl="7" md="7" sm="7" cols="7">
                        <p class="job_designation">User Experience Designer</p>
                      </b-col>
                    </b-row>

                    <b-row>
                      <b-col lg="5" xl="5" md="5" sm="5" cols="5">
                        <div class="job-duration">
                          <span class="d-none d-lg-block d-xl-block">duration</span>
                          <p class="date">Dec 19 - Present</p>
                        </div>
                      </b-col>

                      <b-col lg="7" xl="7" md="7" sm="7" cols="7">
                        <p
                          class="exp_details"
                        >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
                      </b-col>
                    </b-row>
                  </div>
                </b-col>

                <b-col lg="6" xl="6" md="12" sm="12" cols="12">
                  <div class="job_experience">
                    <b-row class="d-flex align-items-center mb-5">
                      <b-col lg="5" xl="5" md="5" sm="5" cols="5">
                        <h2 class="job-title">Google</h2>
                      </b-col>

                      <b-col lg="7" xl="7" md="7" sm="7" cols="7">
                        <p class="job_designation">User Experience Designer</p>
                      </b-col>
                    </b-row>

                    <b-row>
                      <b-col lg="5" xl="5" md="5" sm="5" cols="5">
                        <div class="job-duration">
                          <span class="d-none d-lg-block d-xl-block">duration</span>
                          <p class="date">Dec 19 - Present</p>
                        </div>
                      </b-col>

                      <b-col lg="7" xl="7" md="7" sm="7" cols="7">
                        <p
                          class="exp_details"
                        >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
                      </b-col>
                    </b-row>
                  </div>
                </b-col>

                <b-col lg="6" xl="6" md="12" sm="12" cols="12">
                  <div class="job_experience">
                    <b-row class="d-flex align-items-center mb-5">
                      <b-col lg="5" xl="5" md="5" sm="5" cols="5">
                        <h2 class="job-title">Google</h2>
                      </b-col>

                      <b-col lg="7" xl="7" md="7" sm="7" cols="7">
                        <p class="job_designation">User Experience Designer</p>
                      </b-col>
                    </b-row>

                    <b-row>
                      <b-col lg="5" xl="5" md="5" sm="5" cols="5">
                        <div class="job-duration">
                          <span class="d-none d-lg-block d-xl-block">duration</span>
                          <p class="date">Dec 19 - Present</p>
                        </div>
                      </b-col>

                      <b-col lg="7" xl="7" md="7" sm="7" cols="7">
                        <p
                          class="exp_details"
                        >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
                      </b-col>
                    </b-row>
                  </div>
                </b-col>

                <b-col lg="6" xl="6" md="12" sm="12" cols="12">
                  <div class="job_experience">
                    <b-row class="d-flex align-items-center mb-5">
                      <b-col lg="5" xl="5" md="5" sm="5" cols="5">
                        <h2 class="job-title">Google</h2>
                      </b-col>

                      <b-col lg="7" xl="7" md="7" sm="7" cols="7">
                        <p class="job_designation">User Experience Designer</p>
                      </b-col>
                    </b-row>

                    <b-row>
                      <b-col lg="5" xl="5" md="5" sm="5" cols="5">
                        <div class="job-duration">
                          <span class="d-none d-lg-block d-xl-block">duration</span>
                          <p class="date">Dec 19 - Present</p>
                        </div>
                      </b-col>

                      <b-col lg="7" xl="7" md="7" sm="7" cols="7">
                        <p
                          class="exp_details"
                        >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
                      </b-col>
                    </b-row>
                  </div>
                </b-col>
              </b-row>
            </b-container>
          </div>
        </b-tab>
        <b-tab class="addHere" :title-link-class="[linkClass(2), 'tab_29v1']">
          <template v-slot:title>
            <div class="rounded_icon b-tab-icon">
              <b-img fluid src="/images/resume_themes/theme601/img/education_icon.svg"></b-img>
            </div>
            <p>Education</p>
          </template>

          <div class="tab-content-wrapper work_wrapper">
            <b-container fluid>
              <b-row>
                <b-col lg="6" xl="6" md="12" sm="12" cols="12" class="mb-5">
                  <div class="job_experience">
                    <b-col lg="12" xl="12" md="12" sm="12" cols="12">
                      <span>University</span>
                    </b-col>
                    <b-col lg="12" xl="12" md="12" sm="12" cols="12">
                      <h2 class="job-title mt-5 mb-5">California Institute of Technology</h2>
                    </b-col>

                    <b-col lg="12" xl="12" md="12" sm="12" cols="12">
                      <div class="job-duration">
                        <p class="u-duration mb-5">M.Sc in HCI, Dec 19 - Present</p>
                      </div>
                    </b-col>

                    <b-col lg="12" xl="12" md="12" sm="12" cols="12">
                      <p
                        class="exp_details"
                      >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
                    </b-col>
                  </div>
                </b-col>

                <b-col lg="6" xl="6" md="12" sm="12" cols="12" class="mb-5">
                  <div class="job_experience">
                    <b-col lg="12" xl="12" md="12" sm="12" cols="12">
                      <span>University</span>
                    </b-col>
                    <b-col lg="12" xl="12" md="12" sm="12" cols="12">
                      <h2 class="job-title mt-5 mb-5">California Institute of Technology</h2>
                    </b-col>

                    <b-col lg="12" xl="12" md="12" sm="12" cols="12">
                      <div class="job-duration">
                        <p class="u-duration mb-5">M.Sc in HCI, Dec 19 - Present</p>
                      </div>
                    </b-col>

                    <b-col lg="12" xl="12" md="12" sm="12" cols="12">
                      <p
                        class="exp_details"
                      >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
                    </b-col>
                  </div>
                </b-col>

                <b-col lg="6" xl="6" md="12" sm="12" cols="12" class="mb-5">
                  <div class="job_experience">
                    <b-col lg="12" xl="12" md="12" sm="12" cols="12">
                      <span>University</span>
                    </b-col>
                    <b-col lg="12" xl="12" md="12" sm="12" cols="12">
                      <h2 class="job-title mt-5 mb-5">California Institute of Technology</h2>
                    </b-col>

                    <b-col lg="12" xl="12" md="12" sm="12" cols="12">
                      <div class="job-duration">
                        <p class="u-duration mb-5">M.Sc in HCI, Dec 19 - Present</p>
                      </div>
                    </b-col>

                    <b-col lg="12" xl="12" md="12" sm="12" cols="12">
                      <p
                        class="exp_details"
                      >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
                    </b-col>
                  </div>
                </b-col>

                <b-col lg="6" xl="6" md="12" sm="12" cols="12" class="mb-5">
                  <div class="job_experience">
                    <b-col lg="12" xl="12" md="12" sm="12" cols="12">
                      <span>University</span>
                    </b-col>
                    <b-col lg="12" xl="12" md="12" sm="12" cols="12">
                      <h2 class="job-title mt-5 mb-5">California Institute of Technology</h2>
                    </b-col>

                    <b-col lg="12" xl="12" md="12" sm="12" cols="12">
                      <div class="job-duration">
                        <p class="u-duration mb-5">M.Sc in HCI, Dec 19 - Present</p>
                      </div>
                    </b-col>

                    <b-col lg="12" xl="12" md="12" sm="12" cols="12">
                      <p
                        class="exp_details"
                      >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
                    </b-col>
                  </div>
                </b-col>
              </b-row>
            </b-container>
          </div>
        </b-tab>
        <b-tab class="addHere" :title-link-class="[linkClass(3), 'tab_29v1']">
          <template v-slot:title>
            <div class="rounded_icon b-tab-icon">
              <b-img fluid src="/images/resume_themes/theme601/img/skills_icon.svg"></b-img>
            </div>
            <p>Skills</p>
          </template>

          <div class="tab_component_wrapper">
            <b-tabs v-model="skillTabIndex" content-class="mt-3" fill nav-class="skill-tab-29v1">
              <b-tab class="addHere" :title-link-class="[SkilllinkClass(0), 'skill_tab_29v1' ]">
                <template v-slot:title>
                  <p>Programming Language</p>
                </template>

                <div class="skill_component_wrapper">
                  <b-row class="d-flex align-items-center">
                    <b-col
                      lg="12"
                      xl="12"
                      sm="12"
                      md="12"
                      cols="12"
                      v-for="(bar,index) in bars"
                      :key="index"
                      class="mb-4"
                    >
                      <b-row>
                        <b-col
                          lg="3"
                          xl="3"
                          sm="3"
                          md="3"
                          cols="3"
                          class="text-center d-none d-lg-block"
                        >
                          <div class="skill_badge">{{bar.label}}</div>
                        </b-col>
                        <b-col lg="6" xl="6" sm="12" md="12" cols="12" align-self="center">
                          <div class="label d-flex d-lg-none">
                            <div class="skill_badge">{{bar.label}}</div>
                            <div>{{bar.value}} %</div>
                          </div>
                          <b-progress class="w-100">
                            <b-progress-bar
                              :value="bar.value"
                              :style="{backgroundColor:progressBg}"
                            ></b-progress-bar>
                          </b-progress>
                        </b-col>
                        <b-col
                          class="text-center d-none d-lg-block"
                          lg="3"
                          xl="3"
                          sm="3"
                          md="3"
                          cols="3"
                        >{{bar.value}} %</b-col>
                      </b-row>
                    </b-col>
                  </b-row>
                </div>
              </b-tab>

              <b-tab class="addHere" :title-link-class="[SkilllinkClass(1), 'skill_tab_29v1' ]">
                <template v-slot:title>
                  <p>Frameworks/Database</p>
                </template>
              </b-tab>

              <b-tab class="addHere" :title-link-class="[SkilllinkClass(2), 'skill_tab_29v1' ]">
                <template v-slot:title>
                  <p>Design Skills</p>
                </template>
              </b-tab>

              <b-tab class="addHere" :title-link-class="[SkilllinkClass(3), 'skill_tab_29v1' ]">
                <template v-slot:title>
                  <p>Software</p>
                </template>
              </b-tab>
            </b-tabs>
          </div>
        </b-tab>
      </b-tabs>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Theme703',
  data() {
    return {
      tabIndex: 0,
      skillTabIndex: 0,
      show: false,
      progressBg: '#71BFFF',
      bars: [
        { value: 75, label: 'Html', max: 100 },
        { value: 36, label: 'CSS', max: 100 },
        { value: 25, label: 'bootstrap', max: 100 },
        { value: 80, label: 'javascript', max: 100 }
      ]
    };
  },
  methods: {
    linkClass(idx) {
      if (this.tabIndex === idx) {
        return ['active-tab-29v1'];
      } else {
        return ['text-light'];
      }
    },
    SkilllinkClass(idx) {
      if (this.skillTabIndex === idx) {
        return ['active-skill-tab-29v1'];
      } else {
        return [''];
      }
    }
  }
};
</script>

<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css?family=Lato:400,700|Roboto:400,500,300,700&display=swap');

$primary-color: #3852ce;
$secondary-color: #e5f1ff;
$font-roboto: 'Roboto', sans-serif;
$font-lato: 'Lato', sans-serif;
* {
  box-sizing: border-box;
}
a {
  text-decoration: none;
  &:hover {
    text-decoration: none;
  }
}

h1,
h2,
h3,
h4,
h5,
h6,
p,
span {
  margin: 0;
  padding: 0;
}
.hold_theme_29v1 {
  width: 100%;
  height: 100vh;
  background: linear-gradient(125.55deg, #ffffff 10.06%, #ffffff 75.33%);
  color: #000;
  overflow-x: hidden;
}

.header {
  min-height: 450px;
  width: 100%;
  margin: 0 auto;
  position: relative;
  background: $secondary-color;

  @media (max-width: 576.98px) {
    padding-bottom: 3rem;
  }
}

.hold_profile_wrapper {
  min-height: 400px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  width: 95%;
  margin: 0 auto;
  padding: 5rem 0;
  padding-top: 0;
  position: relative;
  @media (max-width: 991.98px) {
    padding-top: 3rem;
  }

  .piramid_pattern {
    position: absolute;
    top: 15px;
    left: 50%;
    width: 80px;
    opacity: 0.5;

    @media (max-width: 991.98px) {
      right: -46px;
      left: inherit;
      width: 100px;
    }
  }

  .cylindar_pattern {
    position: absolute;
    bottom: 12px;
    right: 0;
    width: 80px;
    opacity: 0.5;
  }
}

.user_pic {
  min-width: 70px;
}

.profile_info {
  background: #ffffff;
  box-shadow: 0px 10px 30px rgba(52, 96, 191, 0.05);
  border-radius: 30px;
  padding: 3rem 2rem;
  @media (max-width: 576.98px) {
    padding: 3rem 1rem;
  }

  @media (max-width: 991.98px) {
    margin-bottom: 2rem;
  }
}

.name {
  font-family: $font-roboto;
  font-style: normal;
  font-weight: 900;
  font-size: 2.1rem;
  line-height: 50px;
  color: $primary-color;
  text-transform: capitalize;

  @media (max-width: 576.98px) {
    font-size: 1.3rem;
    line-height: 35px;
  }
}

.designation {
  font-family: $font-roboto;
  font-style: normal;
  font-weight: 400;
  font-size: 18px;
  line-height: 25px;
  color: #000000;
  text-transform: capitalize;
  margin-bottom: 1.1rem;

  @media (max-width: 576.98px) {
    font-size: 15px;
  }
}

.other_icons {
  display: flex;
  align-items: center;
}

.rounded_icon {
  background: #71bfff;
  box-shadow: 0px 15px 30px rgba(252, 214, 105, 0.19);
  width: 50px;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-right: 20px;

  &.b-tab-icon {
    background: #a5b4ff;
    margin-right: 0 !important;
  }

  &:last-child {
    margin-right: 0;
  }

  @media (max-width: 576.98px) {
    width: 40px;
    height: 40px;
  }
  &.share_icon {
    background: $primary-color;
    width: 55px;
    @media (max-width: 576.98px) {
      width: 45px;
    }
  }
  img {
    padding: 13px;
  }
}

.link-text {
  text-align: center;
  margin-bottom: 1.3rem;
  font-family: $font-lato;
  font-weight: 400;
  text-transform: capitalize;
  color: #000;
}

.social_media_link {
  display: flex;
  justify-content: center;
  .rounded_icon {
    box-shadow: 0px 15px 30px rgba(71, 170, 251, 0.2);
  }
}

.hire_text {
  font-family: $font-roboto;
  font-style: normal;
  font-weight: normal;
  font-size: 20px;
  line-height: 28px;
  color: $primary-color;
}

.price {
  font-family: $font-roboto;
  font-style: normal;
  font-weight: 900;
  font-size: 24px;
  line-height: 37px;
  color: #404040;
}

.hire_me_section {
  @media (max-width: 991.98px) {
    max-width: 70%;
    margin: 0 auto;
    margin-top: 2rem;
  }

  @media (max-width: 576.98px) {
    max-width: 100%;
  }
}

.hire_btn {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 1.5rem;
  .hr_btn {
    padding: 0.8rem 4rem;
    background: $primary-color;
    color: #fff;
    text-transform: uppercase;
    font-family: $font-roboto;
    font-weight: 900;
    font-size: 15px;
  }
}

.left-border {
  position: relative;
  &:before {
    position: absolute;
    top: 50%;
    left: 0;
    width: 1px;
    height: 45px;
    background: $primary-color;
    content: '';
    transform: translateY(-50%);
  }
}

.navigation {
  position: relative;
  .body_icon {
    position: absolute;
    top: 60px;
    left: 20px;
    width: 10%;
    max-width: 120px;
    min-width: 70px;

    @media (max-width: 576.98px) {
      top: -47px;
    }
    img {
      width: 100%;
    }
  }
}

.tab-content-wrapper {
  width: 90%;
  margin: 0 auto;
  margin-bottom: 2rem;
  margin-top: 6rem;

  @media (max-width: 576.98px) {
    margin-top: 3rem;
  }
}

.work_wrapper {
  @media (max-width: 576.98px) {
    width: 100%;
  }
}

.portfolio_img {
  padding-bottom: 30px;
  // box-shadow: 0px 15px 30px rgba(113, 130, 224, 0.19);
  img {
    box-shadow: 0px 15px 30px rgba(113, 130, 224, 0.19);
    border-radius: 36px;
  }
}

.job_experience {
  background: $secondary-color;
  color: #000;
  padding: 5rem;
  box-shadow: 6px 6px 30px rgba(0, 0, 0, 0.1);
  border-radius: 30px;

  @media (min-width: 992px) and (max-width: 1170.98px) {
    padding: 5rem 2rem;
  }

  @media (max-width: 767.98px) {
    padding: 3rem 2rem;
  }
}

.job_experience {
  margin: 30px;
  @media (max-width: 991.98px) {
    margin: 30px 0;
  }

  @media (min-width: 992px) and (max-width: 1170.98px) {
    margin: 30px 0;
  }

  .job-title {
    font-family: $font-roboto;
    font-style: normal;
    font-weight: 900;
    font-size: 36px;
    line-height: 42px;
    color: $primary-color;

    @media (max-width: 767.98px) {
      font-size: 24px;
    }
  }

  .job_designation,
  .job-duration,
  .exp_details {
    font-family: $font-roboto;
    font-style: normal;
    font-weight: 400;
    font-size: 17px;
    line-height: 24px;
    text-transform: inherit;

    @media (max-width: 767.98px) {
      font-size: 15px;
    }

    @media (max-width: 576.98px) {
      font-size: 13px;
    }
  }

  .job-duration {
    @media (max-width: 991.98px) {
      margin-bottom: 15px;
    }
    span {
      text-transform: capitalize;
    }
    .date {
      color: $primary-color;
      font-family: $font-roboto;
      font-weight: 900;
    }
  }
}

.exp_details {
  font-weight: 300 !important;
}

.u-duration {
  font-family: $font-lato;
  font-weight: 700;
  color: #4a4b4c;
}

.skill_component_wrapper {
  width: 70%;
  margin: 0 auto;
  color: $primary-color;
  font-family: $font-roboto;
  font-style: normal;
  font-weight: 400;
  font-size: 35px;
  text-transform: capitalize;
  line-height: 56px;
  margin-top: 3rem;

  @media (max-width: 767.98px) {
    width: 90%;
    font-size: 24px;
  }
}

.skill_badge {
  text-align: left;
}

.progress {
  background: #efefef;
  border-radius: 15px;
}

.progress-bar {
  box-shadow: 2px 5px 30px rgba(113, 191, 255, 0.24);
  border-radius: 15px;
}

.label {
  display: flex;
  justify-content: space-between;
}
</style>