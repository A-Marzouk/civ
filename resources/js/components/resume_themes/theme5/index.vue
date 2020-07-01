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
                  :src="currentUser.personal_info.profile_pic"
                  alt="profile pic"
                  class="imgradius"
                />
              </v-col>
              <v-col
                md="8"
                sm="9"
                cols="11"
                class="text-md-left text-center text-sm-left"
              >
                <div class="user-name font-weight-bold">
                  {{ currentUser.personal_info.full_name }}
                </div>
                <div class="job-title py-1 pb-sm-2">
                  {{ currentUser.personal_info.designation }}
                </div>
                <div class="bio padrgt">
                  {{ currentUser.personal_info.about }}
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
                  <v-col cols="5" md="3" lg="4" align="center">
                    <v-img
                      class="info-img"
                      src="/images/resume_themes/theme5/time.svg"
                      alt
                    ></v-img>
                    <div>
                      <v-icon @click="availablePrev()">navigate_before</v-icon>
                      <div
                        v-for="(availability_info,
                        index) in currentUser.availability_info"
                        :key="index"
                        v-show="availability_info.is_public"
                        class="d-inline-block"
                      >
                        <span class="title" v-if="available == index">
                          {{ availability_info.available_hours_frequency }}
                        </span>
                      </div>
                      <v-icon @click="availableNext()">navigate_next</v-icon>
                    </div>
                    <div>
                      <div
                        v-for="(availability_info,
                        index) in currentUser.availability_info"
                        :key="index"
                        v-show="availability_info.is_public"
                      >
                        <span class="title" v-if="available == index">
                          {{ availability_info.available_hours }} hrs
                        </span>
                      </div>
                    </div>
                  </v-col>
                  <v-col cols="2" md="1" align="center">
                    <div
                      style="width:2px; height:2.5rem; background-color:#CBCBCB;margin-top:50%"
                    ></div>
                  </v-col>
                  <v-col cols="5" md="3" lg="4" align="center">
                    <v-img
                      class="info-img"
                      src="/images/resume_themes/theme5/payment.svg"
                      alt
                    ></v-img>

                    <div>
                      <v-icon @click="paymentInfoPrev()"
                        >navigate_before</v-icon
                      >
                      <div
                        v-for="(payment_Info, index) in currentUser.payment_info"
                        :key="index"
                        v-show="payment_Info.is_public"
                        class="d-inline-block"
                      >
                        <span class="title" v-if="paymentInfo == index">
                          {{ payment_Info.salary_frequency }}
                        </span>
                      </div>
                      <v-icon @click="paymentInfoNext()">navigate_next</v-icon>
                    </div>
                    <div>
                      <div
                        v-for="(payment_Info, index) in currentUser.payment_info"
                        :key="index"
                        v-show="payment_Info.is_public"
                      >
                        <span class="title" v-if="paymentInfo == index">
                          $ {{ payment_Info.salary }}
                        </span>
                      </div>
                    </div>
                    <!-- <div class="title mt-3">$ 20/hr</div> -->
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
                    <div class="subtitle-1">Rate</div>
                    <div class="subtitle-1 txtcol">
                      <v-icon @click="paymentInfoPrev()"
                        >navigate_before</v-icon
                      >
                      <div
                        v-for="(payment_Info, index) in currentUser.payment_info"
                        :key="index"
                        v-show="payment_Info.is_public"
                        class="d-inline-block"
                      >
                        <span class="title" v-if="paymentInfo == index">
                          {{ payment_Info.salary_frequency }}
                        </span>
                      </div>
                      <v-icon @click="paymentInfoNext()">navigate_next</v-icon>
                    </div>
                    <div class="headline mt-3 font-weight-bold txtcol">
                      <div
                        v-for="(payment_Info, index) in currentUser.payment_info"
                        :key="index"
                        v-show="payment_Info.is_public"
                      >
                        <span class="title" v-if="paymentInfo == index">
                          $ {{ payment_Info.salary }}
                          {{ payment_Info.currency }}
                        </span>
                      </div>
                    </div>
                  </v-col>
                  <v-col cols="2" align="center">
                    <div
                      style="width:2px; height:2.2rem; background:rgba(31,93,228,0.4);margin-top:30%"
                    ></div>
                  </v-col>
                  <v-col cols="5" align="center">
                    <div class="subtitle-1">Available for</div>
                    <div class="headline mt-3 font-weight-bold txtcol">
                      <div>
                        <v-icon @click="availablePrev()"
                          >navigate_before</v-icon
                        >
                        <div
                          v-for="(availability_info,
                          index) in currentUser.availability_info"
                          :key="index"
                          v-show="availability_info.is_public"
                          class="d-inline-block"
                        >
                          <span class="title" v-if="available == index">
                            {{ availability_info.available_hours_frequency }}
                          </span>
                        </div>
                        <v-icon @click="availableNext()">navigate_next</v-icon>
                      </div>
                      <div>
                        <div
                          v-for="(availability_info,
                          index) in currentUser.availability_info"
                          :key="index"
                          v-show="availability_info.is_public"
                        >
                          <span class="title" v-if="available == index">
                            {{ availability_info.available_hours }} hrs
                          </span>
                        </div>
                      </div>
                    </div>
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
                      <div class="text-capitalize" style="font-size:14px;">
                        Voice call
                      </div>
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
                      <div class="text-capitalize" style="font-size:14px;">
                        Video call
                      </div>
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
                      <div class="text-capitalize" style="font-size:14px;">
                        Audio call
                      </div>
                    </v-btn>
                  </v-col>
                </v-row>
                <v-row no-gutters justify="center" class="mt-6">
                  <v-col cols="12">
                    <div class="text-center">Follow me</div>
                    <div class="text-center mt-2">
                      <v-btn
                        :href="Userlink.link"
                        v-for="Userlink in currentUser.links"
                        :key="Userlink.id + '_link'"
                        target="_blank"
                        class="mx-1"
                        style="width:40px;min-width:40px;height:40px;box-shadow: rgba(81, 91, 212, 0.4) 0px 10px 30px -8px;"
                        v-show="Userlink.is_active && Userlink.is_public"
                      >
                        <img
                          :src="
                            `/images/resume_themes/theme5/social_icons/${Userlink.link_title.toLowerCase()}.svg`
                          "
                          alt="social-icon"
                        />
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
                  <v-col sm="5" align="center" class="mt-4">
                    <v-img
                      class="info-img"
                      src="/images/resume_themes/theme5/time.svg"
                      alt
                    ></v-img>
                    <div class="subtitle-1 text-capitalize mt-2">
                      <div>
                        <v-icon small @click="availablePrev()"
                          >navigate_before</v-icon
                        >
                        <div
                          v-for="(availability_info,
                          index) in currentUser.availability_info"
                          :key="index"
                          v-show="availability_info.is_public"
                          class="d-inline-block"
                        >
                          <span class="subtitle-1" v-if="available == index">
                            {{ availability_info.available_hours_frequency }}
                          </span>
                        </div>
                        <v-icon small @click="availableNext()"
                          >navigate_next</v-icon
                        >
                      </div>
                      <div>
                        <div
                          v-for="(availability_info,
                          index) in currentUser.availability_info"
                          :key="index"
                          v-show="availability_info.is_public"
                        >
                          <span class="title" v-if="available == index">
                            {{ availability_info.available_hours }} hrs
                          </span>
                        </div>
                      </div>
                    </div>
                  </v-col>
                  <v-col sm="2" align="center" class="ml-n4 mr-n4 mt-4">
                    <div
                      style="width:2px; height:1.5rem; background-color:#CBCBCB;margin-top:20%;margin:auto;"
                    ></div>
                  </v-col>
                  <v-col sm="5" align="center" class="mt-4">
                    <v-img
                      class="info-img"
                      src="/images/resume_themes/theme5/payment.svg"
                      alt
                    ></v-img>
                    <div class="subtitle-1 text-capitalize mt-2">
                      <div>
                        <v-icon small @click="paymentInfoPrev()"
                          >navigate_before</v-icon
                        >
                        <div
                          v-for="(payment_Info, index) in currentUser.payment_info"
                          :key="index"
                          v-show="payment_Info.is_public"
                          class="d-inline-block"
                        >
                          <span class="subtitle-1" v-if="paymentInfo == index">
                            {{ payment_Info.salary_frequency }}
                          </span>
                        </div>
                        <v-icon small @click="paymentInfoNext()"
                          >navigate_next</v-icon
                        >
                      </div>
                      <div>
                        <div
                          v-for="(payment_Info, index) in currentUser.payment_info"
                          :key="index"
                          v-show="payment_Info.is_public"
                        >
                          <span class="title" v-if="paymentInfo == index">
                            $ {{ payment_Info.salary }}
                          </span>
                        </div>
                      </div>
                    </div>
                  </v-col>
                  <v-col cols="11" align="center" class="mt-6 ml-2">
                    <div class="text-center">Follow me</div>
                    <div class="text-center mt-2">
                      <v-btn
                        :href="Userlink.link"
                        v-for="Userlink in currentUser.links"
                        :key="Userlink.id + '_link'"
                        target="_blank"
                        class="mx-1"
                        style="width:40px;min-width:40px;height:40px;box-shadow: rgba(81, 91, 212, 0.4) 0px 10px 30px -8px;"
                        v-show="Userlink.is_active && Userlink.is_public"
                      >
                        <img
                          :src="
                            `/images/resume_themes/theme5/social_icons/${Userlink.link_title.toLowerCase()}.svg`
                          "
                          alt="social-icon"
                        />
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
                <v-tabs
                  v-model="tab"
                  background-color="transparent"
                  hide-slider
                  centered
                >
                  <v-tab class="text-capitalize">
                    <span v-if="tab == 0" class="left">[</span>
                    Portfolio
                    <span v-if="tab == 0" class="right">]</span>
                  </v-tab>
                  <v-tab class="text-capitalize">
                    <span v-if="tab == 1" class="left">[</span>
                    Work Experience
                    <span v-if="tab == 1" class="right">]</span>
                  </v-tab>
                  <v-tab class="text-capitalize">
                    <span v-if="tab == 2" class="left">[</span>
                    Education
                    <span v-if="tab == 2" class="right">]</span>
                  </v-tab>
                  <v-tab class="text-capitalize">
                    <span v-if="tab == 3" class="left">[</span>
                    Skills
                    <span v-if="tab == 3" class="right">]</span>
                  </v-tab>
                  <v-tab class="text-capitalize">
                    <span v-if="tab == 4" class="left">[</span>
                    About
                    <span v-if="tab == 4" class="right">]</span>
                  </v-tab>
                </v-tabs>
              </v-col>
            </v-row>
          </v-container>
        </v-col>
        <v-col md="12" sm="12" cols="12" class="mt-4">
          <v-container fluid ma-0 pa-0 style="max-width:100%">
            <v-row no-gutters justify="center">
              <v-col v-if="tab == 0" md="11" sm="11" cols="11">
                <v-row no-gutters justify="center">
                  <v-col
                    md="4"
                    sm="12"
                    cols="12"
                    v-for="project in currentUser.projects"
                    :key="project.id"
                    class="pa-4"
                    align="center"
                    v-show="project.is_public"
                  >
                    <v-img
                      :src="project.images[0].src"
                      alt="portfolio img"
                      :aspect-ratio="1.2"
                      cover
                    ></v-img>
                  </v-col>
                </v-row>
              </v-col>
              <v-col v-if="tab == 1" md="6" sm="12" cols="12" class="pb-12">
                <v-timeline
                  dense
                  align-top
                  v-for="work in currentUser.work_experience"
                  :key="work.id"
                  v-show="work.is_public"
                  class="ml-n4 ml-sm-0"
                >
                  <v-timeline-item small fill-dot color="#1F5DE4">
                    <div class="ml-n5 ml-sm-0">
                      <div class="head mt-n1">{{ work.company_name }}</div>
                      <div class="subtitle-2 pb-sm-4 pt-2">
                        {{ work.job_title }},
                        <span
                          class="hidden-xs-only pl-sm-4 subtitle-2"
                          style="color: rgba(0, 0, 0, 0.87);"
                          >{{ work.date_from }} - {{ work.date_to }}</span
                        >
                      </div>
                      <div class="hidden-sm-and-up subtitle-2 pb-4">
                        {{ work.date_from }} -
                        {{ work.date_to }}
                      </div>
                      <div class="subtitle-2 grey--text lighten-2">
                        {{ work.description }}
                      </div>
                    </div>
                  </v-timeline-item>
                </v-timeline>
              </v-col>
              <v-col v-if="tab == 2" md="11" sm="11" cols="11" class="pb-12">
                <v-row no-gutters justify="center">
                  <v-col
                    v-for="education in currentUser.education"
                    :key="education.id"
                    v-show="education.is_public"
                    md="5"
                    sm="12"
                    cols="12"
                    class="ma-md-4 ma-sm-4 ma-4"
                  >
                    <v-card
                      color="#F8F8F8"
                      elevation="0"
                      class="px-sm-10 py-sm-4 px-4 py-2"
                    >
                      <div class="edu-type">
                        {{ education.institution_type }}
                      </div>
                      <div class="edu-name font-weight-bold py-1">
                        {{ education.university_name }}
                      </div>
                      <div class="subtitle-2 pb-1" style="color:#1F5DE4">
                        {{ education.university_name }},
                        {{ education.date_from }} - {{ education.date_to }}
                      </div>
                      <div class="subtitle-2 pb-2" style="color:#707070;">
                        {{ education.degree_title }}
                      </div>
                    </v-card>
                  </v-col>
                </v-row>
              </v-col>
              <v-col v-if="tab == 3" md="11" sm="11" cols="11">
                <v-row no-gutters justify="center">
                  <v-col
                    v-for="(s, index) in currentUser.skills"
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
                          <div class="skillname mb-1 font-weight-bold">
                            {{ s.title }}
                          </div>
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
                            :color="skillColor[index].color"
                            :value="s.percentage"
                            class="pro"
                          ></v-progress-linear>
                        </v-col>
                        <v-col cols="2" sm="2">
                          <v-btn text :color="skillColor[index].color">
                            <div
                              class="skillname font-weight-bold mr-0 mr-md-n12 mr-sm-n12"
                            >
                              {{ s.percentage }}%
                            </div>
                          </v-btn>
                        </v-col>
                      </v-row>
                    </v-card>
                  </v-col>
                </v-row>
              </v-col>
              <v-col v-if="tab == 4" md="6" sm="11" cols="11" class="pb-12">
                <v-row no-gutters justify="center" class="shade py-12">
                  <v-col md="10" sm="11" cols="11" class="pb-8">
                    <div class="headline">About Me</div>
                  </v-col>
                  <v-col md="10" sm="11" cols="11" class="pb-8">
                    <div class="subtitle-1 grey--text lighten-2">
                      {{ currentUser.personal_info.overview }}
                    </div>
                  </v-col>

                  <v-col md="10" sm="11" cols="11" class="pb-8">
                    <div class="headline">Contact</div>
                  </v-col>
                  <v-col md="10" sm="11" cols="11">
                    <div class="title">
                      Gmail: {{ currentUser.personal_info.email }}
                    </div>
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
      available: 0,
      paymentInfo: 0,
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
      skillColor: [
        {
          color: "#3C327B"
        },
        {
          color: "#FF26BE"
        },
        {
          color: "#D291FF"
        },
        {
          color: "#FF7C00"
        },
        {
          color: "#0D47A1"
        },
        {
          color: "#004D40"
        },
        {
          color: "#3C327B"
        },
        {
          color: "#FF26BE"
        },
        {
          color: "#D291FF"
        },
        {
          color: "#FF7C00"
        },
        {
          color: "#0D47A1"
        },
        {
          color: "#004D40"
        },
        {
          color: "#3C327B"
        },
        {
          color: "#FF26BE"
        },
        {
          color: "#D291FF"
        },
        {
          color: "#FF7C00"
        },
        {
          color: "#0D47A1"
        },
        {
          color: "#004D40"
        }
      ],
      currentUser: this.user
    };
  },
  methods: {
    availableNext() {
      if (this.available == 2) {
        this.available = 0;
      } else this.available++;
    },
    availablePrev() {
      if (this.available == 0) {
        this.available = 0;
      } else this.available--;
    },
    paymentInfoNext() {
      if (this.paymentInfo == 2) {
        this.paymentInfo = 0;
      } else this.paymentInfo++;
    },
    paymentInfoPrev() {
      if (this.paymentInfo == 0) {
        this.paymentInfo = 0;
      } else this.paymentInfo--;
    },
    setDummyUser() {
      this.currentUser = this.$store.state.dummyUser;
    }
  },
  mounted(){
    // if there is no user or the preview is true, set dummy user
    if (!this.currentUser || this.is_preview) {
      this.setDummyUser();
    }
  }
};
</script>