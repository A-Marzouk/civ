<template>
  <div class="hold_theme_30">
    <header>
      <img class="header_bg" src="/images/resume_themes/theme602/img/header-bg.png" alt />
      <b-container fluid class="wrapper_padding header_section">
        <b-row>
          <b-col sm="12" cols="12" md="8" lg="8" xl="8">
            <div class="profile-info">
              <b-row class="hold_on_mobile">
                <b-col md="3" lg="2" xl="2" sm="3" cols="4">
                  <div class="pro_pic">
                    <img src="/images/resume_themes/theme602/img/profile_pic.png" alt="Profile pic" />
                  </div>
                </b-col>

                <b-col md="9" xl="9" lg="9" sm="6" cols="8" class="d-flex">
                  <div class="name_details">
                    <h3 class="title">Beverly Andrews</h3>
                    <p class="designation">User interface designer</p>
                    <div class="after_tab_screen">
                      <div class="download_area">
                        <div class="email icon">
                          <img src="/images/resume_themes/theme602/img/Icon material-email.svg" alt />
                        </div>

                        <div class="download icon">
                          <p>PDF</p>
                          <img src="/images/resume_themes/theme602/img/download_icon.svg" alt />
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="contact_media">
                    <div class="icon location">
                      <img src="/images/resume_themes/theme602/img/location_icon.svg" alt />
                    </div>

                    <div class="icon">
                      <img src="/images/resume_themes/theme602/img/whatsapp_icon.svg" alt />
                    </div>

                    <div class="icon google_plus">
                      <img src="/images/resume_themes/theme602/img/google-plus 3.svg" alt />
                    </div>
                  </div>
                </b-col>
              </b-row>
            </div>
          </b-col>
          <b-col sm="12" cols="12" md="12" lg="4" xl="4" class="after_tab_screen">
            <div class="social_icon">
              <div class="icon">
                <img src="/images/resume_themes/theme602/img/linkedIn_icon.svg" alt />
              </div>
              <div class="icon">
                <img src="/images/resume_themes/theme602/img/behance_icon.svg" alt />
              </div>
              <div class="icon">
                <img src="/images/resume_themes/theme602/img/dribble_icon.svg" alt />
              </div>
              <div class="icon">
                <img src="/images/resume_themes/theme602/img/instagram_icon.svg" alt />
              </div>
            </div>
          </b-col>

          <b-col sm="12" cols="12" md="12" lg="4" xl="4" class="upto_tab_screen">
            <div class="social_icon">
              <div class="icon location">
                <img src="/images/resume_themes/theme602/img/location_icon.svg" alt />
              </div>

              <div class="icon">
                <img src="/images/resume_themes/theme602/img/whatsapp_icon.svg" alt />
              </div>

              <div class="icon google_plus">
                <img src="/images/resume_themes/theme602/img/google-plus 3.svg" alt />
              </div>

              <div class="icon">
                <img src="/images/resume_themes/theme602/img/linkedIn_icon.svg" alt />
              </div>
              <div class="icon">
                <img src="/images/resume_themes/theme602/img/behance_icon.svg" alt />
              </div>
              <div class="icon">
                <img src="/images/resume_themes/theme602/img/dribble_icon.svg" alt />
              </div>
              <div class="icon">
                <img src="/images/resume_themes/theme602/img/instagram_icon.svg" alt />
              </div>
            </div>
          </b-col>

          <b-col sm="12" cols="12" class="upto_tab_screen">
            <div class="download_area">
              <div class="email icon">
                <img src="/images/resume_themes/theme602/img/Icon material-email.svg" alt />
              </div>

              <div class="download icon">
                <p>PDF</p>
                <img src="/images/resume_themes/theme602/img/download_icon.svg" alt />
              </div>
            </div>
          </b-col>
        </b-row>
      </b-container>
    </header>

    <div class="navigation">
      <b-tabs v-model="tabIndex" content-class="mt-3" fill nav-class="nav-tab-30">
        <b-tab class="addHere" :title-link-class="[linkClass(0), 'tab_30' ]">
          <template v-slot:title>
            <span class="tab_icon">a</span>
            <p>About</p>
          </template>

          <div class="tab_component_wrapper">
            <b-row>
              <b-col>
                <div class="section_title">
                  <span class="title_icon">a</span>
                  <p>About</p>
                </div>
                <p
                  class="about_details"
                >I'm Conor, I'm a product manager from London. I'm currently looking for new permanent job opportunities within London area that will allow my career to develop...</p>

                <p
                  class="about_details"
                >I'm Conor, I'm a product manager from London. I'm currently looking for new permanent job opportunities within London area that will allow my career to develop...</p>

                <p
                  class="about_details"
                >I'm Conor, I'm a product manager from London. I'm currently looking for new permanent job opportunities within London area that will allow my career to develop...</p>

                <p
                  class="about_details"
                >I'm Conor, I'm a product manager from London. I'm currently looking for new permanent job opportunities within London area that will allow my career to develop...</p>
              </b-col>
            </b-row>
          </div>
        </b-tab>
        <b-tab :title-link-class="[linkClass(1),'tab_30']">
          <template v-slot:title>
            <span class="tab_icon">p</span>
            <p>Portfolio</p>
          </template>

          <div class="tab_component_wrapper">
            <div class="portfolio-work">
              <b-container fluid>
                <b-row>
                  <b-col md="12" lg="4" xl="4" sm="12" cols="12" class="custom-image-margin">
                    <div class="image-wrap">
                      <img src="/images/resume_themes/theme602/img/portfolio-one.png" alt />
                    </div>
                  </b-col>

                  <b-col md="12" lg="4" xl="4" sm="12" cols="12" class="custom-image-margin">
                    <div class="image-wrap">
                      <img src="/images/resume_themes/theme602/img/portfolio-four.png" alt />
                    </div>
                  </b-col>

                  <b-col md="12" lg="4" xl="4" sm="12" cols="12" class="custom-image-margin">
                    <div class="image-wrap">
                      <img src="/images/resume_themes/theme602/img/portfolio-three.jpg" alt />
                    </div>
                  </b-col>

                  <b-col md="12" lg="4" xl="4" sm="12" cols="12" class="custom-image-margin">
                    <div class="image-wrap">
                      <img src="/images/resume_themes/theme602/img/portfolio-four.png" alt />
                    </div>
                  </b-col>

                  <b-col md="12" lg="4" xl="4" sm="12" cols="12" class="custom-image-margin">
                    <div class="image-wrap">
                      <img src="/images/resume_themes/theme602/img/portfolio-three.jpg" alt />
                    </div>
                  </b-col>

                  <b-col md="12" lg="4" xl="4" sm="12" cols="12" class="custom-image-margin">
                    <div class="image-wrap">
                      <img src="/images/resume_themes/theme602/img/portfolio-four.png" alt />
                    </div>
                  </b-col>
                </b-row>
              </b-container>
            </div>
          </div>
        </b-tab>
        <b-tab :title-link-class="[linkClass(2), 'tab_30']">
          <template v-slot:title>
            <span class="tab_icon">w</span>
            <p>Work</p>
          </template>

          <div class="tab_component_wrapper">
            <b-row>
              <b-col lg="5" md="12" xl="5" sm="12" cols="12" offset-lg="1" offset-xl="1">
                <div class="timeline_details">
                  <div class="timeline_title_section">
                    <h3 class="t-title">Google</h3>
                    <p class="t-designation">User Interface Designer</p>
                  </div>

                  <div class="t-duration">
                    <div class="time_duration">
                      <span>Duration</span>
                      <p>Dec 19 - Present</p>
                    </div>
                    <p
                      class="t-info"
                    >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
                  </div>
                </div>
              </b-col>

              <b-col lg="5" md="12" xl="5" sm="12" cols="12" offset-lg="1" offset-xl="1">
                <div class="timeline_details">
                  <div class="timeline_title_section">
                    <h3 class="t-title">Google</h3>
                    <p class="t-designation">User Interface Designer</p>
                  </div>

                  <div class="t-duration">
                    <div class="time_duration">
                      <span>Duration</span>
                      <p>Dec 19 - Present</p>
                    </div>
                    <p
                      class="t-info"
                    >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
                  </div>
                </div>
              </b-col>

              <b-col lg="5" md="12" xl="5" sm="12" cols="12" offset-lg="1" offset-xl="1">
                <div class="timeline_details">
                  <div class="timeline_title_section">
                    <h3 class="t-title">Google</h3>
                    <p class="t-designation">User Interface Designer</p>
                  </div>

                  <div class="t-duration">
                    <div class="time_duration">
                      <span>Duration</span>
                      <p>Dec 19 - Present</p>
                    </div>
                    <p
                      class="t-info"
                    >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
                  </div>
                </div>
              </b-col>

              <b-col lg="5" md="12" xl="5" sm="12" cols="12" offset-lg="1" offset-xl="1">
                <div class="timeline_details">
                  <div class="timeline_title_section">
                    <h3 class="t-title">Google</h3>
                    <p class="t-designation">User Interface Designer</p>
                  </div>

                  <div class="t-duration">
                    <div class="time_duration">
                      <span>Duration</span>
                      <p>Dec 19 - Present</p>
                    </div>
                    <p
                      class="t-info"
                    >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
                  </div>
                </div>
              </b-col>
            </b-row>
          </div>
        </b-tab>
        <b-tab :title-link-class="[linkClass(3),'tab_30']">
          <template v-slot:title>
            <span class="tab_icon">e</span>
            <p>Education</p>
          </template>

          <div class="tab_component_wrapper">
            <b-row>
              <b-col lg="5" md="12" xl="5" sm="12" cols="12" offset-lg="1" offset-xl="1">
                <div class="education_details">
                  <div class="education_title_section">
                    <h3 class="e-title">California Institute of Technology</h3>
                  </div>

                  <div class="e-duration">
                    <div class="e_time_duration">
                      <span>M.Sc in HCI,Dec 19 - Present</span>
                      <p class="university_name">University</p>
                    </div>
                    <p
                      class="e-info"
                    >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
                  </div>
                </div>
              </b-col>

              <b-col lg="5" md="12" xl="5" sm="12" cols="12" offset-lg="1" offset-xl="1">
                <div class="education_details">
                  <div class="education_title_section">
                    <h3 class="e-title">California Institute of Technology</h3>
                  </div>

                  <div class="e-duration">
                    <div class="e_time_duration">
                      <span>M.Sc in HCI,Dec 19 - Present</span>
                      <p class="university_name">University</p>
                    </div>
                    <p
                      class="e-info"
                    >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
                  </div>
                </div>
              </b-col>

              <b-col lg="5" md="12" xl="5" sm="12" cols="12" offset-lg="1" offset-xl="1">
                <div class="education_details">
                  <div class="education_title_section">
                    <h3 class="e-title">California Institute of Technology</h3>
                  </div>

                  <div class="e-duration">
                    <div class="e_time_duration">
                      <span>M.Sc in HCI,Dec 19 - Present</span>
                      <p class="university_name">University</p>
                    </div>
                    <p
                      class="e-info"
                    >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
                  </div>
                </div>
              </b-col>

              <b-col lg="5" md="12" xl="5" sm="12" cols="12" offset-lg="1" offset-xl="1">
                <div class="education_details">
                  <div class="education_title_section">
                    <h3 class="e-title">California Institute of Technology</h3>
                  </div>

                  <div class="e-duration">
                    <div class="e_time_duration">
                      <span>M.Sc in HCI,Dec 19 - Present</span>
                      <p class="university_name">University</p>
                    </div>
                    <p
                      class="e-info"
                    >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
                  </div>
                </div>
              </b-col>
            </b-row>
          </div>
        </b-tab>

        <b-tab :title-link-class="[linkClass(4),'tab_30']">
          <template v-slot:title>
            <span class="tab_icon">s</span>
            <p>Skills</p>
          </template>

          <div class="tab_component_wrapper">
            <b-tabs v-model="skillTabIndex" content-class="mt-3" fill nav-class="skill-tab-30">
              <b-tab class="addHere" :title-link-class="[SkilllinkClass(0), 'skill_tab_30' ]">
                <template v-slot:title>
                  <p>Programming Language</p>
                </template>

                <div class="tab_component_wrapper">
                  <b-row>
                    <b-col
                      md="5"
                      offset-md="1"
                      offset-sm="0"
                      class="card_item-703"
                      align-self="end"
                      v-for="(bar,index) in bars"
                      :key="index"
                    >
                      <div class="margin_bottom">
                        <div class="progress_label">
                          <div class="badge_icon">ph</div>
                          <p class="label">{{bar.label}}</p>
                          <p>{{bar.value}}%</p>
                        </div>
                        <b-progress :max="max" :key="bar.variant" class="bg_progress">
                          <b-progress-bar :value="bar.value" :style="{backgroundColor:bar.variant}"></b-progress-bar>
                        </b-progress>
                      </div>
                    </b-col>
                  </b-row>
                </div>
              </b-tab>

              <b-tab class="addHere" :title-link-class="[SkilllinkClass(1), 'skill_tab_30' ]">
                <template v-slot:title>
                  <p>Frameworks/Database</p>
                </template>
              </b-tab>

              <b-tab class="addHere" :title-link-class="[SkilllinkClass(2), 'skill_tab_30' ]">
                <template v-slot:title>
                  <p>Design Skills</p>
                </template>
              </b-tab>

              <b-tab class="addHere" :title-link-class="[SkilllinkClass(3), 'skill_tab_30' ]">
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
      bars: [
        { variant: '#ED0000', value: 75, label: 'Html', max: 100 },
        { variant: '#ED0000', value: 36, label: 'CSS', max: 100 },
        { variant: '#ED0000', value: 25, label: 'bootstrap', max: 100 },
        { variant: '#ED0000', value: 80, label: 'javascript', max: 100 }
      ]
    };
  },
  methods: {
    linkClass(idx) {
      if (this.tabIndex === idx) {
        return ['active-tab-30'];
      } else {
        return ['text-light'];
      }
    },

    SkilllinkClass(idx) {
      if (this.skillTabIndex === idx) {
        return ['active-skill-tab-30'];
      } else {
        return ['text-light'];
      }
    }
  }
};
</script>

<style lang='scss' scoped>
@import url('https://fonts.googleapis.com/css?family=Open+Sans|Roboto:900|Rubik:400,700&display=swap');

$primary_color: #ed0000;
$font-rubik: 'Rubik', sans-serif;
$font-roboto: 'Roboto', sans-serif;
$font-open-sans: 'Open Sans', sans-serif;

* {
  box-sizing: border-box;
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

.wrapper_padding {
  padding: 0rem 5rem !important;
  @media (max-width: 991.98px) {
    padding: 0 2rem !important;
  }
}

.header_section {
  min-height: 300px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  position: relative;

  @media (max-width: 991.98px) {
    min-height: 450px;
  }
  @media (max-width: 576.98px) {
    min-height: 350px;
  }
}

.hold_theme_30 {
  width: 100%;
  height: 100vh;
  overflow-x: hidden;
}

.tab_component_wrapper {
  width: 85%;
  margin: 0 auto;
  padding-bottom: 2rem;
  padding-top: 2rem;
}

header {
  width: 100%;
  color: #fff;
  min-height: 300px;
  position: relative;

  &::before {
    position: absolute;
    top: 25px;
    left: 0;
    width: 100%;
    height: 4px;
    background: #fff;
    content: '';
    z-index: 2;
  }

  .header_bg {
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    object-fit: cover;
  }
}

.pro_pic {
  height: auto;
  border-radius: 50%;
  margin: 0 auto;
  max-width: 150px;

  @media (max-width: 576.98px) {
    max-width: auto;
    height: 80px;
    width: 80px;
  }
  img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
  }
}

.download_area,
.contact_media {
  display: flex;
}

.download_area {
  @media (max-width: 991.98px) {
    margin-top: 4rem;
    width: 100%;
    justify-content: center;
  }
}

.contact_media {
  margin-left: 25px;
  @media (max-width: 991.98px) {
    display: none;
  }
}

.icon {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  border: 3px solid #fff;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin-right: 15px;

  @media (max-width: 576.98px) {
    width: 35px;
    height: 35px;
    border: 2px solid #fff;
    margin-right: 0px;
  }
  &:last-child {
    margin-right: 0;
  }
  img {
    width: 17px;

    @media (max-width: 576.98px) {
      width: 15px;
    }
  }
}

.email {
  background: $primary_color;
  border: 0px solid transparent;
  @media (max-width: 991.98px) {
    margin-right: 15px;
  }
  img {
    width: 21px;
    margin-top: 5px;

    @media (max-width: 576.98px) {
      width: 20px;
    }
  }
}

.download {
  border: 4px solid $primary_color;

  @media (max-width: 576.98px) {
    border: 2px solid $primary_color;
  }
  p {
    font-size: 9px;
    text-transform: uppercase;
    @media (max-width: 576.98px) {
      font-size: 9px;
    }
  }

  img {
    width: 10px;
    @media (max-width: 576.98px) {
      width: 10px;
    }
  }
}

img {
  width: 14px;
  @media (max-width: 576.98px) {
    width: 13px;
  }
}

.social_icon {
  display: flex;
  justify-content: flex-end;
  width: 100%;

  @media (max-width: 991.98px) {
    justify-content: center;
  }

  @media (max-width: 576.98px) {
    justify-content: space-between;
  }
}

.after_tab_screen {
  display: none;
  @media (min-width: 992px) {
    display: block;
  }
}

.upto_tab_screen {
  display: none;
  @media (max-width: 991.98px) {
    display: flex;
    justify-content: center;
  }
}

.google_plus {
  img {
    width: 21px;

    @media (max-width: 576.98px) {
      width: 18px;
    }
  }
}

.hold_on_mobile {
  @media (max-width: 576.98px) {
    display: flex;
    align-items: center;
    margin-bottom: 23px;
  }

  @media (max-width: 991.98px) {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 2rem;
  }
}

.name_details {
  .title {
    font-family: $font-rubik;
    font-weight: 700;
    font-size: 2rem;

    @media (max-width: 576.98px) {
      font-size: 1.2rem;
    }
  }

  .designation {
    font-family: $font-rubik;
    font-weight: 300;
    font-size: 1.2rem;
    margin-top: 10px;
    margin-bottom: 0px;

    @media (min-width: 992px) {
      margin-bottom: 25px;
    }

    @media (max-width: 576.98px) {
      font-size: 0.8rem;
      margin-top: 7px;
      margin-bottom: 0px;
    }
  }
}

.section_title {
  display: flex;
  align-items: center;
  margin-bottom: 2rem;

  .title_icon {
    width: 25px;
    height: 25px;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 2px solid #ed0000;
    margin-right: 15px;
    font-size: 12px;
    border-radius: 50%;
    text-transform: uppercase;
    font-family: $font-roboto;
    font-style: normal;
    font-weight: 900;
  }

  p {
    font-family: $font-roboto;
    font-style: normal;
    font-weight: 900;
    font-size: 36px;
    line-height: 42px;

    color: #ed0000;
  }
}

.about_details {
  font-family: $font-open-sans;
  font-style: normal;
  font-weight: normal;
  font-size: 1.1rem;
  line-height: 25px;
  margin-bottom: 15px;
}

.custom-image-margin {
  margin-bottom: 30px;
}

.portfolio-work {
  .image-wrap {
    width: 100%;
    height: 100%;
    position: relative;
    overflow: hidden;
    padding-bottom: 75%;
  }
  img {
    width: 100%;
    border-radius: 30px;
    position: absolute;
    top: 0;
    height: 100%;
    margin-bottom: 30px;
  }
}

.timeline_title_section,
.t-duration {
  display: flex;
  align-items: center;
  justify-content: space-between;

  @media (max-width: 992px) {
    flex-direction: column;
    align-items: flex-start;
  }
}

.timeline_title_section {
  margin-bottom: 5rem;

  @media (max-width: 992px) {
    margin-bottom: 3rem;
  }
}

.t-designation,
.t-info {
  flex-basis: 70%;
}

.t-info {
  font-family: $font-roboto;
  font-size: 14px;
  line-height: 30px;
}

.t-title,
.e-title {
  font-family: $font-roboto;
  font-style: normal;
  font-weight: 900;
  font-size: 2.2rem;
  line-height: 42px;
  color: $primary_color;
}

.e-title {
  font-size: 1.5rem;
}

.t-designation {
  font-family: $font-roboto;
  font-style: normal;
  font-size: 18px;
  color: #000;
}

.time_duration {
  font-family: $font-roboto;
  font-size: 14px;
  @media (max-width: 992px) {
    margin-bottom: 2rem;
  }
  p {
    color: $primary_color;
    font-weight: 900;
  }
}

.timeline_details {
  padding-bottom: 5rem;
  padding-left: 4rem;
  position: relative;
  &:before {
    position: absolute;
    top: 0;
    width: 3px;
    background: $primary_color;
    height: 100%;
    content: '';
    left: 0;
  }

  &:after {
    position: absolute;
    top: -5px;
    width: 50px;
    height: 50px;
    content: '';
    border: 1px solid $primary_color;
    border-radius: 50%;
    left: -23px;
    background: url('/images/resume_themes/theme602/img/works_icon.svg') no-repeat;
    background-position: center center;
    background-color: #ffff;
  }
}

.e_time_duration {
  display: flex;
  justify-content: space-between;
  margin: 2rem 0;
  span {
    color: #000;
    font-weight: 900;
    font-family: $font-roboto;
    font-size: 14px;
  }
}

.university_name {
  color: $primary_color;
  font-weight: 900;
  font-family: $font-roboto;
  font-size: 14px;
}

.e-info {
  color: #000;
  font-family: $font-roboto;
  font-size: 14px;
}

.education_details {
  padding-bottom: 5rem;
  padding-left: 4rem;
  position: relative;
  &:before {
    position: absolute;
    top: 0;
    width: 3px;
    background: $primary_color;
    height: 100%;
    content: '';
    left: 0;
  }

  &:after {
    position: absolute;
    top: -5px;
    width: 50px;
    height: 50px;
    content: '';
    border: 1px solid $primary_color;
    border-radius: 50%;
    left: -23px;
    background: url('/images/resume_themes/theme602/img/education_icon.svg') no-repeat;
    background-position: center center;
    background-color: #ffff;
  }
}

.progress_label {
  display: flex;
  justify-content: space-between;
  text-transform: uppercase;
  font-size: 15px;
  position: relative;
  .label {
    margin-left: 10px;
  }
  .badge_icon {
    position: absolute;
    top: 3px;
    left: -40px;
    text-transform: initial;
    width: 50px;
    height: 50px;
    border: 4px solid $primary_color;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #000;
    color: #fff;
  }
  p {
    text-transform: uppercase;
    color: #000;
    font-family: $font-roboto;
    font-weight: 900;
  }
}

.margin_bottom {
  margin-bottom: 5rem;
}

.bg_progress {
  border-radius: 30px;
  background-color: #e4e4e4;
}
</style>