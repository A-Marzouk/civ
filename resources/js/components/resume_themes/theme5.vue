<template>
  <v-app>
    <v-container fluid ma-0 pa-0 style="background-color:#f1f1f1;">
      <v-row class="borpad pt-md-4" no-gutters justify-sm="end">
        <v-col md="6" sm="12" cols="12">
          <v-container>
            <v-row no-gutters justify="center">
              <v-col
                md="3"
                sm="2"
                cols="11"
                class="pa-md-6 pa-sm-2 mt-0 mt-sm-n2 mt-md-n6"
                align="center"
              >
                <img
                  :aspect-ratio="1"
                  src="/images/resume_themes/theme5/profile.png"
                  alt
                  class="imgradius"
                />
              </v-col>
              <v-col md="8" sm="9" cols="11" class="text-md-left text-center text-sm-left">
                <div class="user-name font-weight-bold">Emma Pearson</div>
                <div class="job-title py-1 pb-sm-2">UX Designer</div>
                <div class="bio padrgt">
                  I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text”
                  or double click me to add your own content and make changes.
                </div>
              </v-col>
            </v-row>
          </v-container>
        </v-col>
        <v-col md="6" sm="10" cols="12" class="hidden-sm-only">
          <v-container>
            <v-row>
              <v-col md="6">
                <v-row no-gutters justify="center" class="hidden-xs-only">
                  <v-col cols="5" md="3" align="center">
                    <v-img class="info-img" src="/images/resume_themes/theme5/time.svg" alt></v-img>
                    <div class="title mt-3">8 hours</div>
                  </v-col>
                  <v-col cols="2" md="1" align="center">
                    <div style="width:2px; height:2.5rem; background-color:#CBCBCB;margin-top:50%"></div>
                  </v-col>
                  <v-col cols="5" md="3" align="center">
                    <v-img class="info-img" src="/images/resume_themes/theme5/payment.svg" alt></v-img>
                    <div class="title mt-3">$ 20/hr</div>
                  </v-col>
                  <v-col cols="8" align="center" class="mt-4">
                    <v-btn
                      dark
                      style="height: 60px;width: 202px;border-radius: 6px;background: #fc5185;box-shadow: #fc7ea4 0px 10px 30px -8px;"
                    >
                      <img
                        style="width:22.5px;height:18px;margin-right: 7.5px;"
                        src="/images/resume_themes/theme5/email.svg"
                        alt
                      />
                      <div class="text-capitalize">Hire Me</div>
                    </v-btn>
                  </v-col>
                </v-row>
                <v-row no-gutters justify="center" class="hidden-sm-and-up">
                  <v-col cols="5" align="center">
                    <div class="subtitle-1">Hourly rate</div>
                    <div class="headline mt-3 font-weight-bold txtcol">$ 25 USD</div>
                  </v-col>
                  <v-col cols="2" align="center">
                    <div
                      style="width:2px; height:2.2rem; background:rgba(31,93,228,0.4);margin-top:30%"
                    ></div>
                  </v-col>
                  <v-col cols="5" align="center">
                    <div class="subtitle-1">Available for</div>
                    <div class="headline mt-3 font-weight-bold txtcol">8 Hours</div>
                  </v-col>
                  <v-col cols="8" align="center" class="mt-4">
                    <v-btn
                      dark
                      style="height: 60px;width: 202px;border-radius: 6px;background: #fc5185;box-shadow: rgba(252,81,133,0.4) 0px 10px 30px -8px;"
                    >
                      <img
                        style="width:22.5px;height:18px;margin-right: 7.5px;"
                        src="/images/resume_themes/theme5/email.svg"
                        alt
                      />
                      <div class="text-capitalize">Hire Me</div>
                    </v-btn>
                  </v-col>
                </v-row>
              </v-col>
              <v-col md="6">
                <v-row no-gutters justify="center">
                  <v-col cols="12" class="text-center hidden-xs-only">
                    <v-btn
                      style="height: 50px;width: 150px;border-radius: 6px;background: #5f45ff;box-shadow: #9180ff 0px 10px 30px -8px;"
                      dark
                      class="mx-1"
                    >
                      <img
                        src="/images/resume_themes/theme5/call.svg"
                        alt="voice call"
                        style="width: 18px;height: 18px;margin-right: 7.5px;"
                      />
                      <div class="text-capitalize" style="font-size:14px;">Voice call</div>
                    </v-btn>

                    <v-btn
                      class="mx-1"
                      style="height: 50px;width: 90px;border-radius: 6px;background: #e7e5f6;box-shadow: #e7e5f6 0px 10px 30px -8px;"
                    >
                      <img
                        src="/images/resume_themes/theme5/video.svg"
                        alt="video call"
                        style="width: 27px;height: 18px;margin-right: 7.5px;"
                      />
                    </v-btn>
                  </v-col>
                  <v-col cols="12" class="text-center hidden-sm-and-up">
                    <div class="text-center my-2">Take an interview</div>
                    <v-btn
                      dark
                      outlined
                      color="#5F45FF"
                      class="mx-1"
                      style="height: 50px;width: 150px;border-radius: 6px;box-shadow: rgba(253,253,254,0.6) 0px 10px 30px -8px;"
                    >
                      <v-icon left>mdi-video</v-icon>
                      <div class="text-capitalize" style="font-size:14px;">Video call</div>
                    </v-btn>

                    <v-btn
                      class="mx-1"
                      dark
                      style="height: 50px;width: 150px;border-radius: 6px;background: #5f45ff;box-shadow: rgba(253,253,254,0.6) 0px 10px 30px -8px;"
                    >
                      <img
                        src="/images/resume_themes/theme5/call.svg"
                        alt="voice call"
                        style="width: 18px;height: 18px;margin-right: 7.5px;"
                      />
                      <div class="text-capitalize" style="font-size:14px;">Audio call</div>
                    </v-btn>
                  </v-col>
                </v-row>
                <v-row no-gutters justify="center" class="mt-6">
                  <v-col cols="12">
                    <div class="text-center">Follow me</div>
                    <div class="text-center mt-2">
                      <v-btn
                        class="mx-1"
                        style="width:40px;min-width:40px;height:40px;box-shadow: rgba(234, 76, 137, 0.4) 0px 10px 30px -8px;"
                      >
                        <img src="/images/resume_themes/theme5/dribble.svg" alt="social-icon" />
                      </v-btn>
                      <v-btn
                        class="mx-1"
                        style="width:40px;min-width:40px;height:40px;box-shadow: rgba(5, 62, 255, 0.4) 0px 10px 30px -8px;"
                      >
                        <img src="/images/resume_themes/theme5/behance.svg" alt="social-icon" />
                      </v-btn>
                      <v-btn
                        class="mx-1"
                        style="width:40px;min-width:40px;height:40px;box-shadow: rgba(81, 91, 212, 0.4) 0px 10px 30px -8px;"
                      >
                        <img src="/images/resume_themes/theme5/instagram.svg" alt="social-icon" />
                      </v-btn>
                      <v-btn
                        class="mx-1"
                        style="width:40px;min-width:40px;height:40px;box-shadow: rgba(14, 118, 168, 0.4) 0px 10px 30px -8px;"
                      >
                        <img src="/images/resume_themes/theme5/linkedin.svg" alt="social-icon" />
                      </v-btn>
                      <v-btn
                        class="mx-1"
                        style="width:40px;min-width:40px;height:40px;box-shadow: rgba(221, 75, 57, 0.4) 0px 10px 30px -8px;"
                      >
                        <img src="/images/resume_themes/theme5/google_plus.svg" alt="social-icon" />
                      </v-btn>
                    </div>
                  </v-col>
                </v-row>
              </v-col>
            </v-row>
          </v-container>
        </v-col>
        <v-col sm="10" class="d-none d-sm-flex d-md-none">
          <v-container>
            <v-row>
              <v-col md="6">
                <v-row no-gutters justify="center">
                  <v-col sm="5" align="start" class="mt-4">
                    <v-btn text>
                      <v-img
                        class="info-img d-inline-block"
                        src="/images/resume_themes/theme5/time.svg"
                        alt
                      ></v-img>
                      <div class="subtitle-1 text-capitalize ml-1">8 hours</div>
                    </v-btn>
                  </v-col>
                  <v-col sm="2" align="center" class="ml-n4 mr-n4 mt-4">
                    <div
                      style="width:2px; height:1.5rem; background-color:#CBCBCB;margin-top:20%;margin-right:-30px;margin-left:-20px;"
                    ></div>
                  </v-col>
                  <v-col sm="5" align="start" class="mt-4">
                    <v-btn text>
                      <v-img
                        class="info-img d-inline-block"
                        src="/images/resume_themes/theme5/payment.svg"
                        alt
                      ></v-img>
                      <div class="subtitle-1 text-capitalize ml-1">$ 20/hr</div>
                    </v-btn>
                  </v-col>
                  <v-col cols="11" align="center" class="mt-6 ml-2">
                    <div class="text-center">Follow me</div>
                    <div class="text-center mt-2">
                      <v-btn
                        class="mx-1"
                        style="width:40px;min-width:40px;height:40px;box-shadow: rgba(234, 76, 137, 0.4) 0px 10px 30px -8px;"
                      >
                        <img src="/images/resume_themes/theme5/dribble.svg" alt="social-icon" />
                      </v-btn>
                      <v-btn
                        class="mx-1"
                        style="width:40px;min-width:40px;height:40px;box-shadow: rgba(5, 62, 255, 0.4) 0px 10px 30px -8px;"
                      >
                        <img src="/images/resume_themes/theme5/behance.svg" alt="social-icon" />
                      </v-btn>
                      <v-btn
                        class="mx-1"
                        style="width:40px;min-width:40px;height:40px;box-shadow: rgba(81, 91, 212, 0.4) 0px 10px 30px -8px;"
                      >
                        <img src="/images/resume_themes/theme5/instagram.svg" alt="social-icon" />
                      </v-btn>
                      <v-btn
                        class="mx-1"
                        style="width:40px;min-width:40px;height:40px;box-shadow: rgba(14, 118, 168, 0.4) 0px 10px 30px -8px;"
                      >
                        <img src="/images/resume_themes/theme5/linkedin.svg" alt="social-icon" />
                      </v-btn>
                      <v-btn
                        class="mx-1"
                        style="width:40px;min-width:40px;height:40px;box-shadow: rgba(221, 75, 57, 0.4) 0px 10px 30px -8px;"
                      >
                        <img src="/images/resume_themes/theme5/google_plus.svg" alt="social-icon" />
                      </v-btn>
                    </div>
                  </v-col>
                </v-row>
              </v-col>
              <v-col md="6">
                <v-row no-gutters justify="center">
                  <v-col cols="12" class="text-center">
                    <v-btn
                      dark
                      style="height: 60px;width: 202px;border-radius: 6px;background: #fc5185;box-shadow: #fc7ea4 0px 10px 30px -8px;"
                    >
                      <img
                        style="width:22.5px;height:18px;margin-right: 7.5px;"
                        src="/images/resume_themes/theme5/email.svg"
                        alt
                      />
                      <div class="text-capitalize">Hire Me</div>
                    </v-btn>
                  </v-col>
                </v-row>
                <v-row no-gutters justify="center" class="mt-6">
                  <v-col cols="12" class="text-center">
                    <v-btn
                      style="height: 60px;width: 93px;border-radius: 6px;background: #5f45ff;box-shadow: #9180ff 0px 10px 30px -8px;"
                      dark
                      class="mx-1"
                    >
                      <img
                        src="/images/resume_themes/theme5/call.svg"
                        alt="voice call"
                        style="width: 18px;height: 18px;margin-right: 7.5px;"
                      />
                    </v-btn>

                    <v-btn
                      class="mx-1"
                      style="height: 60px;width: 93px;border-radius: 6px;background: #e7e5f6;box-shadow: #e7e5f6 0px 10px 30px -8px;"
                    >
                      <img
                        src="/images/resume_themes/theme5/video.svg"
                        alt="video call"
                        style="width: 27px;height: 18px;margin-right: 7.5px;"
                      />
                    </v-btn>
                  </v-col>
                </v-row>
              </v-col>
            </v-row>
          </v-container>
        </v-col>
      </v-row>
    </v-container>
    <v-container fluid ma-0 pa-0>
      <v-row class="borpad" no-gutters style="height:100%;">
        <v-col md="12" sm="12" cols="12">
          <v-container fluid ma-0 pa-0 style="max-width:100%">
            <v-row no-gutters justify="center">
              <v-col
                md="6"
                cols="11"
                sm="11"
                style="background-color:#f1f1f1;margin:1rem;border-radius:5px;padding:1rem;"
                class="text-center"
              >
                <v-tabs v-model="tab" background-color="transparent" hide-slider centered>
                  <v-tab class="text-capitalize">
                    <span v-if="tab ==0" class="left">[</span>
                    Portfolio
                    <span v-if="tab ==0" class="right">]</span>
                  </v-tab>
                  <v-tab class="text-capitalize">
                    <span v-if="tab ==1" class="left">[</span>
                    Work Experience
                    <span v-if="tab ==1" class="right">]</span>
                  </v-tab>
                  <v-tab class="text-capitalize">
                    <span v-if="tab ==2" class="left">[</span>
                    Education
                    <span v-if="tab ==2" class="right">]</span>
                  </v-tab>
                  <v-tab class="text-capitalize">
                    <span v-if="tab ==3" class="left">[</span>
                    Skills
                    <span v-if="tab ==3" class="right">]</span>
                  </v-tab>
                  <v-tab class="text-capitalize">
                    <span v-if="tab ==4" class="left">[</span>
                    About
                    <span v-if="tab ==4" class="right">]</span>
                  </v-tab>
                </v-tabs>
              </v-col>
            </v-row>
          </v-container>
        </v-col>
        <v-col md="12" sm="12" cols="12" class="mt-4">
          <v-container fluid ma-0 pa-0 style="max-width:100%">
            <v-row no-gutters justify="center">
              <v-col v-if="tab==0" md="11" sm="11" cols="11">
                <v-row no-gutters justify="center">
                  <v-col
                    md="4"
                    sm="12"
                    cols="12"
                    v-for="p in portfolio"
                    :key="p.id"
                    class="pa-4"
                    align="center"
                  >
                    <v-img :src="p.src" alt="portfolio img" :aspect-ratio="1.2"></v-img>
                  </v-col>
                </v-row>
              </v-col>
              <v-col v-if="tab==1" md="6" sm="12" cols="12" class="pb-12">
                <v-timeline dense align-top v-for="n in 3" :key="n" class="ml-n4 ml-sm-0">
                  <v-timeline-item small fill-dot color="#1F5DE4">
                    <div class="ml-n5 ml-sm-0">
                      <div class="head mt-n1">Google</div>
                      <div class="subtitle-2 pb-sm-4 pt-2">
                        User interface designer,
                        <span
                          class="hidden-xs-only pl-sm-4 subtitle-2"
                          style="color: rgba(0, 0, 0, 0.87);"
                        >Oct 2018 - Nov 2019</span>
                      </div>
                      <div class="hidden-sm-and-up subtitle-2 pb-4">Oct 2018 - Nov 2019</div>
                      <div class="subtitle-2 grey--text lighten-2">
                        I'm a paragraph. Click here to add your own text and edit me. It’s
                        easy. Just click “Edit Text” or double click me to add your own content and make
                        changes.
                      </div>
                    </div>
                  </v-timeline-item>
                </v-timeline>
              </v-col>
              <v-col v-if="tab==2" md="11" sm="11" cols="11" class="pb-12">
                <v-row no-gutters justify="center">
                  <v-col
                    v-for="n in 4"
                    :key="n"
                    md="5"
                    sm="12"
                    cols="12"
                    class="ma-md-4 ma-sm-4 ma-4"
                  >
                    <v-card color="#F8F8F8" elevation="0" class="px-sm-10 py-sm-4 px-4 py-2">
                      <div class="edu-type">University</div>
                      <div class="edu-name font-weight-bold py-1">California Institute of Technology</div>
                      <div
                        class="subtitle-2 pb-1"
                        style="color:#1F5DE4"
                      >M.Sc in HCI, Dec 19 - present</div>
                      <div class="subtitle-2 pb-2" style="color:#707070;">CGPA - 3.70 out of 4.0</div>
                    </v-card>
                  </v-col>
                </v-row>
              </v-col>
              <v-col v-if="tab==3" md="11" sm="11" cols="11">
                <v-row no-gutters justify="center">
                  <v-col
                    v-for="(s,index) in skills"
                    :key="index"
                    md="5"
                    sm="11"
                    cols="12"
                    class="ma-md-4 my-sm-3 my-2"
                  >
                    <v-card color="#F8F8F8" elevation="0">
                      <v-row
                        no-gutters
                        justify="center"
                        class="py-sm-8 pr-sm-6 pl-sm-2 py-3 pr-2 pl-2"
                      >
                        <v-col cols="11" sm="11">
                          <div class="skillname mb-1 font-weight-bold">{{s.name}}</div>
                        </v-col>
                        <v-col
                          cols="9"
                          sm="9"
                          class="text-center"
                          justify="center"
                          align-self="center"
                        >
                          <v-progress-linear
                            :background-opacity="0.2"
                            :color="s.color"
                            :value="s.value"
                            class="pro"
                          ></v-progress-linear>
                        </v-col>
                        <v-col cols="2" sm="2">
                          <v-btn text :color="s.color">
                            <div
                              class="skillname font-weight-bold mr-0 mr-md-n12 mr-sm-n12"
                            >{{s.value}}%</div>
                          </v-btn>
                        </v-col>
                      </v-row>
                    </v-card>
                  </v-col>
                </v-row>
              </v-col>
              <v-col v-if="tab==4" md="6" sm="11" cols="11" class="pb-12">
                <v-row no-gutters justify="center" class="shade py-12">
                  <v-col md="10" sm="11" cols="11" class="pb-8">
                    <div class="headline">About Me</div>
                  </v-col>
                  <v-col md="10" sm="11" cols="11" class="pb-8">
                    <div class="subtitle-1 grey--text lighten-2">
                      I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit
                      Text” or double click me to add your own content and make changes to the font. Feel free to
                      drag and drop me anywhere you like on your page. I’m a great place for you to tell a story
                      and let your users know a little more about you.
                    </div>
                  </v-col>
                  <v-col md="10" sm="11" cols="11" class="pb-12">
                    <div class="subtitle-1 grey--text lighten-2">
                      This is a great space to write long text
                      about your company and your services. You can use this space to go into a little more detail
                      about your company. Talk about your team and what services you provide. Tell your visitors
                      the story of how you came up with the idea for your business and what makes you different
                      from your competitors.
                    </div>
                  </v-col>
                  <v-col md="10" sm="11" cols="11" class="pb-8">
                    <div class="headline">Contact</div>
                  </v-col>
                  <v-col md="10" sm="11" cols="11">
                    <div class="title">Gmail: Carolyn_meyer2@gmail.com</div>
                  </v-col>
                </v-row>
              </v-col>
            </v-row>
          </v-container>
        </v-col>
      </v-row>
    </v-container>
  </v-app>
</template>
<style lang="scss" scoped>
#resumeTheme5 {
  .theme--light.v-application {
    background: #f1f1f1;
    color: rgba(0, 0, 0, 0.87);
  }
  .borpad {
    background-color: #ffffff;
    margin: 1.5rem 1.5rem 0 2.5rem;
    border-radius: 10px;
  }
  .imgradius {
    width: 184px;
    height: auto;
    border-radius: 50%;
  }
  .v-progress-linear {
    border-radius: 50px;
  }
  .pro .v-progress-linear__determinate {
    border-radius: 50px !important;
  }
  .shade {
    background: #f8f8f8;
    border-radius: 5px;
  }
  .v-tab {
    span.left {
      padding-right: 4px;
      font-size: 20px;
      color: #1f5de4;
      transition: all 0.5s ease;
    }

    span.right {
      padding-left: 4px;
      font-size: 20px;
      color: #1f5de4;
      transition: all 0.5s ease;
    }
  }

  .v-tab:hover {
    cursor: pointer;

    span.left {
      padding-right: 7px;
      font-size: 20px;
      color: #1f5de4;
    }

    span.right {
      padding-left: 7px;
      font-size: 20px;
      color: #1f5de4;
    }
  }
  .v-tab:before {
    background-color: transparent;
    bottom: 0;
    content: "";
    left: 0;
    opacity: 0;
    pointer-events: none;
    position: absolute;
    right: 0;
    top: 0;
    transition: 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
  }
  //Desktop Screen
  .user-name {
    font-size: 1.5rem;
  }
  .bio {
    font-size: 0.8rem;
    line-height: 25px;
  }
  .padrgt {
    padding-right: 8rem;
  }
  .head {
    font-family: Noto Sans;
    font-size: 1.3rem;
    font-weight: bold;
  }
  .info-img {
    width: 40px;
    height: 32px;
  }
  .v-tabs .v-tab {
    align-items: center;
    display: flex;
    flex: 0 1 auto;
    font-size: 0.875rem;
    font-weight: 500;
    justify-content: center;
    letter-spacing: 0.0892857143em;
    line-height: normal;
    min-width: 8rem;
    max-width: 12rem;
    outline: none;
    padding: 0 16px;
    position: relative;
    text-align: center;
    text-decoration: none;
    text-transform: uppercase;
    transition: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }
  .v-timeline:before {
    bottom: 0;
    content: "";
    height: 100%;
    position: absolute;
    top: 25px;
    width: 2px;
    background: linear-gradient(
      to bottom,
      #548aff 40%,
      rgba(255, 255, 255, 0) 20%
    );
    background-position: left;
    background-size: 1.5px 18px;
    background-repeat: repeat-y;
  }
  .v-tab-active {
    position: relative;
  }
  .edu-type {
    width: 80px;
    height: 30px;
    background: #e7ecf7;
    border-radius: 5px;

    font-size: 12px;
    color: #1f5de4;
    display: flex;
    justify-content: center;
    align-items: center;

    margin-bottom: 18px;
  }
  .skillname {
    font-size: 1.5rem;
    letter-spacing: normal;
  }
  .v-progress-linear {
    height: 15px !important;
  }
  .edu-name {
    font-size: 1.5rem;
  }
  .txtcol {
    color: #5f45ff;
  }

  // Tablet Version
  @media only screen and (max-width: 768px) {
    .borpad {
      background-color: #ffffff;
      margin: 1rem 1rem 0 1rem;
      border-radius: 10px;
    }
    .padrgt {
      padding-right: 2rem;
    }
    .imgradius {
      width: 86px;
      height: 86px;
      border-radius: 50%;
    }
    .bio {
      font-size: 1rem;
      line-height: 25px;
    }
    .v-tabs .v-tab {
      align-items: center;
      display: flex;
      flex: 0 1 auto;
      font-size: 0.875rem;
      font-weight: 500;
      justify-content: center;
      letter-spacing: 0.0892857143em;
      line-height: normal;
      min-width: 6rem;
      max-width: 12rem;
      outline: none;
      padding: 0 16px;
      position: relative;
      text-align: center;
      text-decoration: none;
      text-transform: uppercase;
      transition: none;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }
    .skillname {
      font-size: 1.5rem;
      letter-spacing: normal;
    }
    .v-progress-linear {
      height: 15px;
    }
    .edu-name {
      font-size: 1.5rem;
    }
  }

  // Mobile Version
  @media only screen and (max-width: 425px) {
    .borpad {
      background-color: #ffffff;
      margin: 0.7rem 0.7rem 0 0.7rem;
      border-radius: 10px;
    }
    .padrgt {
      padding-right: 0rem;
    }
    .padleft {
      padding-left: 6rem;
    }
    .imgradius {
      width: 86px;
      height: 86px;
      border-radius: 50%;
    }
    .v-tabs .v-tab {
      align-items: center;
      display: flex;
      flex: 0 1 auto;
      font-size: 0.7rem;
      font-weight: 500;
      justify-content: center;
      letter-spacing: 0.0892857143em;
      line-height: normal;
      min-width: 6rem;
      max-width: 12rem !important;
      outline: none;
      padding: 0 4px !important;
      position: relative;
      text-align: center;
      text-decoration: none;
      text-transform: uppercase;
      transition: none;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }
    .v-tabs .v-tab {
      align-items: center;
      display: flex;
      flex: 0 1 auto;
      font-size: 0.875rem;
      font-weight: 500;
      justify-content: center;
      letter-spacing: 0.0892857143em;
      line-height: normal;
      min-width: 6rem;
      max-width: 10rem;
      outline: none;
      padding: 0 16px;
      position: relative;
      text-align: center;
      text-decoration: none;
      text-transform: uppercase;
      transition: none;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }
    .skillname {
      font-size: 0.8rem;

      letter-spacing: normal;
    }
    .edu-name {
      font-size: 1rem;
    }
    .v-progress-linear {
      height: 8px !important;
    }
  }
}
</style>

<script>
export default {
  name: "theme8",
  props: ["user", "is_preview"],
  data() {
    return {
      tab: null,
      portfolio: [
        {
          id: 0,
          src: "/images/resume_themes/theme5/portfolio-1.png"
        },
        {
          id: 1,
          src: "/images/resume_themes/theme5/portfolio-2.png"
        },
        {
          id: 2,
          src: "/images/resume_themes/theme5/portfolio-3.png"
        },
        {
          id: 3,
          src: "/images/resume_themes/theme5/portfolio-4.png"
        },
        {
          id: 4,
          src: "/images/resume_themes/theme5/portfolio-5.png"
        },
        {
          id: 5,
          src: "/images/resume_themes/theme5/portfolio-6.png"
        }
      ],
      skills: [
        {
          name: "Adobe Photoshop",
          value: 90,
          color: "#3C327B"
        },
        {
          name: "Adobe After Effect",
          value: 65,
          color: "#FF26BE"
        },
        {
          name: "Adobe Premiere pro",
          value: 70,
          color: "#D291FF"
        },
        {
          name: "Adobe Illustrator",
          value: 50,
          color: "#FF7C00"
        },
        {
          name: "Adobe XD",
          value: 80,
          color: "#0D47A1"
        },
        {
          name: "Adobe Dreamwaver",
          value: 75,
          color: "#004D40"
        }
      ]
    };
  }
};
</script>