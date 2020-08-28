<template>
  <v-app style="width:100%;">
    <div class="triangle-top-left"></div>
    <div class="verical-sidebar"></div>
    <v-container ma-0 pa-0 fluid style="max-width:100% !important;" v-if="currentUser">
      <!-- Header Row -->
      <v-row no-gutters>
        <v-col cols="12">
          <!-- Main header card -->
          <v-card flat color="transparent" tile>
            <!-- Child Row -->
            <v-container fluid ma-0 pa-0 style="max-width:100%">
              <v-row no-gutters align="center" justify="center">
                <!-- 1st column profile pic and icons -->
                <v-col md="8" cols="12" sm="7">
                  <v-card color="transparent" tile flat style="z-index:2;" class="pa-0 ma-0">
                    <v-card-text>
                      <v-list-item two-line>
                        <v-list-item-avatar class="hidden-xs-only custom-avatar">
                          <v-img :src="currentUser.personal_info.profile_pic"></v-img>
                        </v-list-item-avatar>
                        <v-list-item-avatar size="80" class="hidden-sm-and-up mr-2">
                          <v-img :src="currentUser.personal_info.profile_pic"></v-img>
                        </v-list-item-avatar>
                        <v-list-item-content>
                          <v-list-item-title class="profile-title">
                            <v-card class="pa-0" flat color="transparent" tile>
                              {{ currentUser.personal_info.full_name }}
                              <span
                                class="mx-8 hidden-sm-and-down email-icon-block"
                              >
                                <v-btn
                                  fab
                                  color="#FCD259"
                                  small
                                  depressed
                                  class="mx-md-auto mx-sm-2 btn-email"
                                  :href="'mailto:' + currentUser.personal_info.email"
                                >
                                  <v-icon class="icon-email">mdi-email</v-icon>
                                </v-btn>

                                <v-btn
                                  fab
                                  color="#FCD259"
                                  x-small
                                  depressed
                                  class="mx-md-auto mx-sm-2 btn-video-player"
                                >
                                  <img
                                    width="15"
                                    src="/images/resume_themes/theme203/icons/video-player.webp"
                                  />
                                </v-btn>

                                <v-btn
                                  fab
                                  color="#FCD259"
                                  x-small
                                  depressed
                                  class="btn-headphone mx-auto mx-sm-2 mx-md-auto"
                                  align="center"
                                >
                                  <img
                                    class
                                    width="15"
                                    src="/images/resume_themes/theme203/icons/headphones.webp"
                                  />
                                </v-btn>
                              </span>
                              <span class="social-media-block hidden-sm-and-down">
                                <v-btn
                                  fab
                                  color="#FCD259"
                                  small
                                  class="mx-md-1 mx-sm-2 social-btn"
                                  depressed
                                  v-for="item in socialLinks"
                                  :key="item.id + '_link'"
                                  target="_blank"
                                  v-show="item.is_active"
                                >
                                  <img
                                    width="15"
                                    :src="`/images/resume_themes/theme203/social_icons/${item.link_title.toLowerCase()}.webp`"
                                  />
                                </v-btn>
                              </span>
                            </v-card>
                          </v-list-item-title>
                          <v-list-item-title>
                            <v-card flat color="transparent" tile>
                              <span
                                class="profile-subtitle"
                              >{{ currentUser.personal_info.designation }}</span>
                            </v-card>
                          </v-list-item-title>
                        </v-list-item-content>
                      </v-list-item>
                    </v-card-text>
                  </v-card>
                </v-col>
                <!-- 1st column profile pic and icons -->

                <!-- 2nd column only for tab and mobile version version -->
                <v-col sm="5" cols="12" class="tablet-audio-video-flex">
                  <v-card
                    flat
                    color="transparent"
                    tile
                    class="mr-sm-5 mt-sm-n5 my-sm-0 my-10 mt-n8 audio-video-card"
                    style="z-index:2"
                  >
                    <v-btn
                      fab
                      color="#FCD259"
                      small
                      depressed
                      class="mx-md-1 mx-sm-2 mx-1 btn-email"
                      :href="'mailto:' + currentUser.personal_info.email"
                    >
                      <v-icon class="icon-email">mdi-email</v-icon>
                    </v-btn>

                    <v-btn
                      fab
                      color="#FCD259"
                      x-small
                      depressed
                      class="mx-md-0 mx-sm-2 mx-1 btn-video-player"
                    >
                      <img width="15" src="/images/resume_themes/theme203/icons/video-player.webp" />
                    </v-btn>

                    <v-btn fab color="#FCD259" x-small depressed class="btn-headphone mx-1 mx-sm-2">
                      <img
                        width="15"
                        style="margin-left:1px;"
                        class
                        src="/images/resume_themes/theme203/icons/headphones.webp"
                      />
                    </v-btn>
                  </v-card>
                </v-col>
                <!-- 2nd column only for tab and mobile version version -->

                <!-- 2nd column social media icons -->
                <v-col md="3" sm="12" cols="12" class="mt-n3 pa-0 hidden-md-and-up" align="center">
                  <v-card flat color="tranparent">
                    <v-card-text class>
                      <v-btn
                        fab
                        color="#FCD259"
                        small
                        class="mx-md-1 mx-sm-2 mx-1 social-btn"
                        depressed
                        :href="item.link"
                        v-for="item in socialLinks"
                        :key="item.id + '_link'"
                        target="_blank"
                        v-show="item.is_active"
                      >
                        <img
                          :width="item.title == 'map-markup'?11:15"
                          :src="`/images/resume_themes/theme203/social_icons/${item.link_title.toLowerCase()}.webp`"
                        />
                      </v-btn>
                    </v-card-text>
                  </v-card>
                </v-col>
                <!-- Social media icons -->

                <v-col md="4" sm="8" cols="12">
                  <v-card flat color="transparent" tile class="ma-0 pa-0">
                    <v-card-text class="ml-md-n5">
                      <v-row no-gutters align="center" justify="center">
                        <v-col cols="4" class="d-flex">
                          <v-card flat class="text-center" color="tranparent">
                            <v-card-title
                              class="hire-me-title"
                            >{{ currentUser.payment_info[0].salary_frequency | capitalize }} rate</v-card-title>
                            <v-card-subtitle
                              class="hire-me-subtitle"
                            >{{ currentUser.payment_info[0].salary }} {{ currentUser.payment_info[0].currency.toUpperCase() }}</v-card-subtitle>
                          </v-card>
                        </v-col>
                        <div style="height:41px; border:1px solid #D7D7D7;"></div>
                        <v-col cols="4" class="d-flex">
                          <v-card flat class="text-center" color="transparent" tile>
                            <v-card-title class="hire-me-title">Available for</v-card-title>
                            <v-card-subtitle
                              class="hire-me-subtitle"
                            >{{currentUser.availability_info[0].available_hours}} Hours</v-card-subtitle>
                          </v-card>
                        </v-col>

                        <v-col cols="3" class="d-flex">
                          <v-card flat color="transparent" tile>
                            <v-card-text>
                              <v-btn
                                color="#FCD259"
                                class="mx-n6 btn-hire-me"
                                height="45"
                                depressed
                                @click="hireMeModal = true"
                              >Hire Me</v-btn>
                            </v-card-text>
                          </v-card>
                        </v-col>
                      </v-row>
                    </v-card-text>
                  </v-card>
                </v-col>
              </v-row>
            </v-container>
            <!-- Child Row -->
          </v-card>
        </v-col>
        <!-- main header card -->
      </v-row>
      <!-- Header Row -->

      <!-- tab bar row -->
      <v-container style="width:100%">
        <!-- main Navigation tab -->
        <v-row no-gutters align="center" justify="center">
          <v-col cols="12" md="10">
            <v-card flat color="transparent" tile>
              <v-card-text>
                <v-tabs v-model="mainDataTab" color="black" centered grow show-arrows hide-slider>
                  <v-tab
                    v-for="item in mainTabs"
                    :key="item.id"
                    class="text-capitalize custom-tab-text"
                  >{{item.title}}</v-tab>
                </v-tabs>
              </v-card-text>
            </v-card>
          </v-col>
        </v-row>
        <!-- Main navigation tab -->
      </v-container>
      <!-- ....................Tab Items ..........................-->
      <v-container style="width:100%">
        <v-row class="mx-md-10 mx-sm-10 mx-1">
          <v-col cols="12">
            <v-card flat color="transparent" tile style="z-index:1;">
              <v-tabs-items v-model="mainDataTab" style="background-color:transparent;">
                <!-- ................Portfolio............................... -->
                <v-tab-item>
                  <div class="watermark-text text-center">Portfolio</div>
                  <v-card flat color="transparent" tile align="center">
                    <v-row align="center" justify="center">
                      <v-col cols="12">
                        <masonry
                          :cols="{default: 4, 959: 1, 599: 1}"
                          :gutter="{default: '30px', 700: '15px'}"
                        >
                          <template v-for="item in currentUser.projects">
                            <v-card
                              class="mb-2"
                              align="left"
                              flat
                              color="transparent"
                              tile
                              :key="item.id"
                              v-show="item.is_public == 1"
                            >
                              <v-img class="custom-portfolio-img" :src="getProjectMainImage(item)"></v-img>
                              <v-card-title class="custom-portfolio-title">{{item.name}}</v-card-title>
                              <v-card-subtitle
                                class="custom-portfolio-subtitle"
                              >{{item.description}}</v-card-subtitle>
                            </v-card>
                          </template>
                        </masonry>
                      </v-col>
                    </v-row>
                  </v-card>
                </v-tab-item>
                <!-- .......................Portfolio.................................. -->

                <!-- ...................Tab Item Work............................. -->
                <v-tab-item>
                  <div class="watermark-text text-center">Work</div>
                  <v-card color="transparent" tile flat>
                    <v-card-text class>
                      <v-container fluid ma-0 pa-0 style="width:100%">
                        <v-row align="center">
                          <template v-for="(work,index) in currentUser.work_experience">
                            <v-col
                              cols="12"
                              sm="12"
                              md="6"
                              class="mb-12"
                              :key="index"
                              v-show="work.is_public==1"
                            >
                              <v-card flat color="transparent" tile>
                                <v-list-item three-line>
                                  <v-list-item-icon>
                                    <img
                                      class="work-icon"
                                      src="/images/resume_themes/theme203/images/ellipse.png"
                                    />
                                  </v-list-item-icon>
                                  <v-list-item-content>
                                    <v-list-item-title class="custom-work-title">
                                      <v-card flat color="transparent" tile>{{work.company_name}}</v-card>
                                    </v-list-item-title>
                                    <v-list-item-subtitle class="custom-work-subtitle">
                                      <v-card flat color="transparent" tile>{{work.job_title}}</v-card>
                                    </v-list-item-subtitle>
                                    <v-list-item-subtitle class="custom-work-duration mt-6">
                                      <v-card color="transparent" tile flat>
                                        {{work.date_from}}-
                                        <span v-if="work.present == 1">Present</span>
                                        <span v-else>{{work.to}}</span>
                                      </v-card>
                                    </v-list-item-subtitle>
                                  </v-list-item-content>
                                </v-list-item>
                              </v-card>
                            </v-col>
                          </template>
                        </v-row>
                      </v-container>
                    </v-card-text>
                  </v-card>
                </v-tab-item>
                <!--................... Tab item Work............................... -->

                <!-- ...................Tab Item Education............................. -->
                <v-tab-item>
                  <div class="watermark-text text-center">Education</div>
                  <v-card color="transparent" tile flat>
                    <v-container ma-0 pa-0 fluid style="width:100%">
                      <v-row align="center">
                        <template v-for="(education,index) in currentUser.education">
                          <v-col
                            cols="12"
                            sm="12"
                            md="6"
                            class="mb-12"
                            :key="index"
                            v-show="education.is_public==1"
                          >
                            <v-card flat color="transparent" tile>
                              <v-list-item three-line>
                                <v-list-item-icon>
                                  <img
                                    class="work-icon"
                                    src="/images/resume_themes/theme203/images/ellipse.png"
                                  />
                                </v-list-item-icon>
                                <v-list-item-content>
                                  <v-list-item-title class="custom-work-title">
                                    <v-card
                                      flat
                                      color="transparent"
                                      tile
                                    >{{education.university_name}}</v-card>
                                  </v-list-item-title>
                                  <v-list-item-subtitle class="custom-education-subtitle">
                                    <v-card flat color="transparent" tile style="color:#fbd76d;">
                                      {{ education.degree_title }},
                                      <span class="ml-5">
                                        {{education.date_from}} -
                                        <span
                                          v-if="education.present == true"
                                        >Present</span>
                                        <span v-else>{{education.date_to}}</span>
                                      </span>
                                    </v-card>
                                  </v-list-item-subtitle>
                                  <v-list-item-subtitle class="mt-6">
                                    <v-card
                                      color="transparent"
                                      tile
                                      flat
                                      class="custom-education-details"
                                    >{{education.institution_type}}</v-card>
                                  </v-list-item-subtitle>
                                </v-list-item-content>
                              </v-list-item>
                            </v-card>
                          </v-col>
                        </template>
                      </v-row>
                    </v-container>
                  </v-card>
                </v-tab-item>
                <!--................... Tab item Education............................... -->

                <!-- ...................Tab Item Skills............................. -->
                <v-tab-item>
                  <div class="watermark-text text-center">Skills</div>
                  <v-card color="transparent" tile flat>
                    <v-row align="center">
                      <template v-for="skill in currentUser.skills">
                        <v-col
                          cols="12"
                          sm="12"
                          md="5"
                          class="mb-12"
                          :key="skill.id"
                          v-show="skill.is_public"
                        >
                          <v-card flat color="transparent" tile class="mx-auto">
                            <v-card-text>
                              <v-list-item>
                                <v-list-item-avatar
                                  class="skill-circle mr-n1 mt-sm-2"
                                  style="z-index:1;"
                                >
                                  <span>{{skillSubString(skill.title)}}</span>
                                </v-list-item-avatar>
                                <v-list-item-content class="mt-n6">
                                  <v-list-item-subtitle>
                                    <v-row no-gutters>
                                      <v-col cols="6" class="skill-title-text">
                                        <span class="ml-2">{{ skill.title }}</span>
                                      </v-col>
                                      <v-col
                                        cols="6"
                                        align="right"
                                        class="skill-title-text"
                                      >{{skill.percentage}}</v-col>
                                    </v-row>
                                  </v-list-item-subtitle>
                                  <v-list-item-subtitle>
                                    <v-progress-linear
                                      color="#FCD259"
                                      height="12"
                                      rounded
                                      :value="skill.percentage"
                                    ></v-progress-linear>
                                  </v-list-item-subtitle>
                                </v-list-item-content>
                              </v-list-item>
                            </v-card-text>
                          </v-card>
                        </v-col>
                      </template>
                    </v-row>
                  </v-card>
                </v-tab-item>
                <!--................... Tab item Skills............................... -->

                <!-- ...... Tab item hobbies ..... -->
                <v-tab-item>
                  <div class="watermark-text text-center">Hobbies</div>
                  <v-card color="transparent" tile flat>
                    <v-container ma-0 pa-0 fluid style="width:100%">
                      <v-row align="center">
                        <template v-for="(hobby,index) in currentUser.hobbies">
                          <v-col
                            lg="4"
                            md="6"
                            sm="6"
                            cols="6"
                            class="mb-5"
                            :key="index"
                            v-show="hobby.is_public==1"
                          >
                            <v-list-item>
                              <v-list-item-avatar class="hobbies-avatar">
                                <img
                                  src="/images/resume_themes/theme203/icons/hobby.svg"
                                  alt="hobby icon"
                                />
                              </v-list-item-avatar>
                              <v-list-item-content>
                                <v-list-item-title class="hobby-title ml-xl-5">
                                  <v-card flat color="transparent">{{hobby.title}}</v-card>
                                </v-list-item-title>
                              </v-list-item-content>
                            </v-list-item>
                          </v-col>
                        </template>
                      </v-row>
                    </v-container>
                  </v-card>
                </v-tab-item>
                <!--  tab item hobbies  -->
                <!-- ...... Tab item achievement ..... -->
                <v-tab-item>
                  <div class="watermark-text text-center">Achievement</div>
                  <v-card color="transparent" tile flat>
                    <v-container ma-0 pa-0 style="width:100%">
                      <v-row align="center" justify="space-between">
                        <template v-for="(achievement,index) in currentUser.achievements">
                          <v-col
                            xl="6"
                            lg="6"
                            md="12"
                            sm="12"
                            cols="12"
                            class="mb-5"
                            :key="index"
                            v-show="achievement.is_public"
                          >
                            <div
                              class="d-flex achievement"
                              :class="[windowWidth<=1263?'flex-column':'flex-row']"
                            >
                              <div :align="windowWidth<=1263?'center':'left'">
                                <img
                                  class="mt-5"
                                  :src="achievement.image_src"
                                  alt="achievement image"
                                />
                              </div>
                              <v-card flat color="transparent">
                                <v-card-subtitle
                                  class="achievement-title"
                                >{{achievement.title}}{{windowWidth}}</v-card-subtitle>
                                <v-card-subtitle
                                  class="achievement-subtitle mt-xl-0 mt-n5"
                                >{{achievement.description}}</v-card-subtitle>
                              </v-card>
                            </div>
                          </v-col>
                        </template>
                      </v-row>
                    </v-container>
                  </v-card>
                </v-tab-item>
                <!--  tab item achivement  -->
                <!-- ...... Tab item Reference ..... -->
                <v-tab-item>
                  <div class="watermark-text text-center">Referenes</div>
                  <v-card color="transparent" tile flat>
                    <v-container ma-0 pa-0 style="width:100%">
                      <v-row align="center" justify="space-between">
                        <template v-for="(reference,index) in currentUser.references">
                          <v-col xl="5" lg="5" md="12" sm="12" cols="12" class="mb-5" :key="index">
                            <v-card flat color="transparent">
                              <v-row>
                                <v-col cols="7">
                                  <div class="reference-title">{{reference.name}}</div>
                                </v-col>
                                <v-col cols="5" align="right">
                                  <div
                                    class="reference-date"
                                  >{{reference.created_at | getFormattedData}}</div>
                                </v-col>
                                <v-col cols="12">
                                  <div class="reference-email">{{reference.email}}</div>
                                </v-col>
                                <v-col cols="12">
                                  <div class="reference-desc">{{reference.reference_text}}</div>
                                </v-col>
                              </v-row>
                            </v-card>
                          </v-col>
                        </template>
                      </v-row>
                    </v-container>
                  </v-card>
                </v-tab-item>
                <!--  tab item Reference  -->
              </v-tabs-items>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
      <!-- ......................................Tab Items .........................-->
      <!-- All Modals -->
      <!-- Hire Me Modal -->
      <v-dialog v-model="hireMeModal" max-width="567" persistent>
        <v-card color="#F6F9FF" class="card-hire-me-modal pa-3">
          <div align="right">
            <v-btn icon @click="hireMeModal = close">
              <img src="/images/resume_themes/theme203/icons/close.svg" alt="close button" />
            </v-btn>
          </div>
          <v-card-title class="title mt-n5">Book Conor on an</v-card-title>
          <v-card-subtitle>
            <!-- Hire me tab -->
            <v-row>
              <v-col xl="9" lg="9" cols="12">
                <v-tabs
                  center-active
                  grow
                  hide-slider
                  v-model="hireMeTab"
                  active-class="hire-me-tab-active"
                  background-color="transparent"
                >
                  <v-tab
                    v-for="tab in hireOptions"
                    :key="tab.id"
                    class="text-capitalize hire-me-tab-text"
                    :class="[
                      tab.title == 'Hourly'?'custom-tab-round-left':'',
                      tab.title == 'Monthly'?'custom-tab-round-right':''
                    ]"
                  >{{tab.title}}</v-tab>
                </v-tabs>
              </v-col>
              <v-col xl="9" lg="9" cols="12" class="mt-n5">
                <v-card flat align="center">
                  <v-tabs-items v-model="hireMeTab">
                    <v-tab-item class="tab-item">$10</v-tab-item>
                    <v-tab-item class="tab-item">$20</v-tab-item>
                    <v-tab-item class="tab-item">$30</v-tab-item>
                  </v-tabs-items>
                </v-card>
              </v-col>
            </v-row>
            <!-- hire me tab -->
          </v-card-subtitle>
          <v-card-subtitle class="select-hour mt-5">
            Select the number of Hours you need per week:
            <div class="d-flex flex-row align-items-center mt-5">
              <div class="align-self-center mx-xl-2 mx-lg-3 btn-holder">
                <v-btn color="#F2F3FD" class="btn-decreament" icon>
                  <img src="/images/resume_themes/theme203/icons/tick-minus.svg" alt />
                </v-btn>
              </div>
              <div class="align-self-center mx-xl-2 mx-lg-3 mx-md-3 mx-sm-2 mx-2">
                <v-text-field
                  background-color="#ffffff"
                  class="input-hour"
                  height="47"
                  hide-details
                  value="40 hours"
                  outlined
                ></v-text-field>
              </div>
              <div class="align-self-center mx-xl-2 mx-lg-3 mx-md-3 mx-sm-2 mx-2 btn-holder">
                <v-btn color="#F2F3FD" class="btn-decreament" icon>
                  <img src="/images/resume_themes/theme203/icons/tick-plus.svg" alt />
                </v-btn>
              </div>
            </div>
          </v-card-subtitle>
          <!-- Weekly -->
          <v-card-subtitle class="select-hour mt-5">
            How many weeks would you like to book for?
            <div class="d-flex flex-row align-items-center mt-5">
              <div class="align-self-center mx-xl-2 mx-lg-3 btn-holder">
                <v-btn color="#F2F3FD" class="btn-decreament" icon>
                  <img src="/images/resume_themes/theme203/icons/tick-minus.svg" alt />
                </v-btn>
              </div>
              <div class="align-self-center mx-xl-2 mx-lg-3 mx-md-3 mx-sm-2 mx-2">
                <v-text-field
                  background-color="#ffffff"
                  class="input-hour"
                  height="47"
                  hide-details
                  value="10 weeks"
                  outlined
                ></v-text-field>
              </div>
              <div class="align-self-center mx-xl-2 mx-lg-3 mx-md-3 mx-sm-2 mx-2 btn-holder">
                <v-btn color="#F2F3FD" class="btn-decreament" icon>
                  <img src="/images/resume_themes/theme203/icons/tick-plus.svg" alt />
                </v-btn>
              </div>
            </div>
          </v-card-subtitle>
          <!-- Weekly -->

          <!-- Total Payment -->
          <v-card-subtitle class="total-payment mt-5">
            <v-card flat class="card-payment pa-5">
              <div class="subtitle">Your total payment will be</div>
              <div class="total-payment-text">
                <span class="mr-2">$</span>400
              </div>
              <div class="subtitle">10 usd per hour x 40 hours</div>
            </v-card>
          </v-card-subtitle>
          <!-- Total Payment -->
          <!-- Payment Method -->
          <v-card-subtitle>
            <div class="d-flex flex-row">
              <div class="payment-logo mx-2 align-self-center">
                <a href="#">
                  <img
                    @mouseover="stripeHover=true"
                    @mouseleave="stripeHover=false"
                    :src="stripeHover?'/images/resume_themes/theme203/icons/stripe-active.svg':'/images/resume_themes/theme203/icons/stripe.svg'"
                    alt="Stripe Logo"
                  />
                </a>
              </div>
              <div class="payment-logo mx-4 align-self-center">
                <a href="#">
                  <img
                    @mouseover="paypalHover=true"
                    @mouseleave="paypalHover=false"
                    :src="paypalHover?'/images/resume_themes/theme203/icons/paypal-active.svg':'/images/resume_themes/theme203/icons/paypal.svg'"
                    alt="Paypal Logo"
                  />
                </a>
              </div>
              <div class="mx-4">
                <v-btn class="payment-btn" depressed color="#001CE2">Pay Now</v-btn>
              </div>
            </div>
          </v-card-subtitle>
          <!-- Payment Method -->
        </v-card>
      </v-dialog>
      <!-- Hire Me Modal -->
      <!-- All Modals  -->

      <!-- tab bar row -->
      <!-- Right Bottom bar -->
      <div class="triangle-bottom-right" style="text-align:right"></div>
      <!-- Right bottom bar -->
    </v-container>
  </v-app>
</template>
<script>
export default {
  name: "ResumeTheme203",
  props: ["user", "is_preview"],
  filters: {
    capitalize: function (value) {
      if (!value) return "";
      value = value.toString();
      return value.charAt(0).toUpperCase() + value.slice(1);
    },
    getFormattedData(date) {
      let d = new Date(date);
      return d.getDate() + "-" + d.getMonth() + "-" + d.getFullYear();
    },
  },
  data() {
    return {
      stripeHover: false,
      paypalHover: false,
      hireMeModal: false,
      windowWidth: window.innerWidth,
      currentUser: this.user,
      hireOptions: [
        { id: 1, title: "Hourly" },
        { id: 2, title: "Weekly" },
        { id: 3, title: "Monthly" },
      ],
      socialIcons: [
        { id: 1, title: "behance" },
        { id: 2, title: "dribbble" },
        { id: 3, title: "instagram" },
        { id: 4, title: "linkedin" },
        { id: 5, title: "google-plus" },
      ],
      mainDataTab: null,
      hireMeTab: null,
      progressBarColor: "yellow",
      mainTabs: [
        {
          id: 1,
          title: "Portfolio",
        },
        {
          id: 2,
          title: "Work",
        },
        {
          id: 3,
          title: "Education",
        },
        {
          id: 4,
          title: "Skills",
        },
        {
          id: 5,
          title: "Hobbies",
        },
        {
          id: 6,
          title: "Achievements",
        },
        {
          id: 7,
          title: "References",
        },
      ],
      portfolioItems: [
        {
          id: 1,
          title: "Mobile App-Ice Cream",
          subtitle: "Mobile app concept",
        },
        {
          id: 2,
          title: "Mobile App-Ice Cream",
          subtitle: "Mobile app concept",
        },
        {
          id: 3,
          title: "Made market Concept",
          subtitle: "Made market concept",
        },
        {
          id: 4,
          title: "Tracking App-Traq",
          subtitle: "Tracking App-Traq",
        },
        {
          id: 5,
          title: "Made market Concept",
          subtitle: "Made market concept",
        },

        {
          id: 6,
          title: "Made market Concept",
          subtitle: "Made market concept",
        },
        {
          id: 7,
          title: "Made market Concept",
          subtitle: "Made market concept",
        },
        {
          id: 8,
          title: "Love custom app",
          subtitle: "Love custom app",
        },
        {
          id: 9,
          title: "Love custom app",
          subtitle: "Love custom app",
        },
      ],
      skills: [
        {
          id: 1,
          title: "Photoshop",
          skill_value: 90,
          skill_value_text: "90%",
          icon_text: "ph",
        },
        {
          id: 2,
          title: "Photoshop",
          skill_value: 90,
          skill_value_text: "90%",
          icon_text: "ph",
        },
        {
          id: 3,
          title: "Illustrator",
          skill_value: 90,
          skill_value_text: "90%",
          icon_text: "ill",
        },
        {
          id: 4,
          title: "Illustrator",
          skill_value: 90,
          skill_value_text: "90%",
          icon_text: "ill",
        },
        {
          id: 5,
          title: "Figma",
          skill_value: 90,
          skill_value_text: "90%",
          icon_text: "fig",
        },
        {
          id: 6,
          title: "Figma",
          skill_value: 50,
          skill_value_text: "80%",
          icon_text: "fig",
        },
      ],
    };
  },
  computed: {
    socialLinks() {
      return this.currentUser.links.filter((link) => {
        return link.category === "social_link" ? link : false;
      });
    },
  },
  mounted() {
    // if there is no user or the preview is true, set dummy user
    if (!this.currentUser || this.is_preview) {
      this.setDummyUser();
    }
    window.onresize = () => {
      this.windowWidth = window.innerWidth;
    };
    // let user accessible in included components.
    this.$store.dispatch("updateThemeUser", this.user);
  },

  methods: {
    skillSubString(string) {
      let result = string.substring(0, 2);
      return result.toLowerCase();
    },
    getSocialIcon(name) {
      return `/images/resume_themes/theme203/social_icons/${name}.webp`;
    },
    getPortfolioItems(id) {
      return `/images/resume_themes/theme203/portfolio/${id}.png`;
    },
    getProviderLink(provider) {
      let links = this.user.links;
      let providerLink = "";
      links.forEach((link) => {
        if (link.category === "social_link") {
          if (link.link_title.toLowerCase() === provider.toLowerCase()) {
            providerLink = link.link;
          }
        }
      });
      return providerLink;
    },
    sendEmail() {},
    setDummyUser() {
      this.currentUser = this.$store.state.dummyUser;
    },
    getProjectMainImage(project) {
      let mainImage = "";
      let images = project.images;
      images.forEach((image) => {
        if (image.is_main) {
          mainImage = image;
        }
      });
      return mainImage.src;
    },
  },
};
</script>

<style scoped lang="scss">
@import url("https://fonts.googleapis.com/css?family=Montserrat&display=swap");
@import url("https://fonts.googleapis.com/css?family=Rubik&display=swap");
/*@import url("//db.onlinewebfonts.com/c/07a38bbad54db72a40b406bed1c72f53?family=Gotham+Pro");*/
@import url("https://fonts.googleapis.com/css?family=Montserrat");
/* prefixed by https://autoprefixer.github.io (PostCSS: v7.0.26, autoprefixer: v9.7.3) */

/* Shapes */
.triangle-top-left {
  left: 0;
  top: 0;
  padding: 0;
  margin: 0;
  position: absolute;
  background: #fcd259;
  height: 18.75rem;
  width: 27rem;
  -webkit-clip-path: polygon(100% 0, 0% 100%, 0 0);
  clip-path: polygon(100% 0, 0% 100%, 0 0);
  -webkit-box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.1);
  box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.1);
  z-index: 2;
  float: left;
  @media screen and (min-width: 960px) and (max-width: 1200px) {
    width: 17rem;
    height: 16rem;
  }

  @media screen and (max-width: 599px) {
    width: 15.5rem;
    height: 13.75rem;
  }
  @media screen and (max-width: 322px) {
    width: 14.5rem;
    height: 12.75rem;
  }
}

.triangle-bottom-right {
  position: fixed;
  right: 0;
  bottom: 0;
  margin: 0;
  padding: 0;
  background: #fcd259;
  height: 15.75rem;
  width: 10rem;
  background-position: right bottom !important;
  -webkit-clip-path: polygon(100% 0, 0% 100%, 100% 100%);
  clip-path: polygon(100% 0, 0% 100%, 100% 100%);
  -webkit-box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.1);
  box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.1);
  float: right;
  @media screen and(max-width:959px) {
    width: 8rem;
    height: 7.75rem;
  }
}

.verical-sidebar {
  position: fixed;
  background: #e6bf4e;
  width: 2rem;
  height: 100vh;
  z-index: 1;
  bottom: 0;
  @media screen and (max-width: 599px) {
    width: 1rem;
  }
}
/* Shapes */

.custom-avatar {
  border: 5px solid white;
  width: 120px !important;
  height: 120px !important;
  max-width: 120px;
  max-height: 120px;
  @media screen and (min-width: 960px) and (max-width: 1200px) {
    width: 60px !important;
    height: 60px !important;
  }
}

.profile-title {
  font-family: "Gotham Pro" !important;
  font-size: 1.53rem !important;
  @media screen and (min-width: 960px) and (max-width: 1200px) {
    font-size: 1rem !important;
    margin-bottom: -10px;
  }
  @media screen and(max-width:599px) {
    font-size: 1.12rem !important;
  }
}

.profile-subtitle {
  font-family: "Gotham Pro" !important;
  font-size: 0.8rem !important;
  color: #444444 !important;
  @media screen and (min-width: 960px) and (max-width: 1200px) {
    font-size: 0.6rem !important;
  }
  @media screen and(max-width:599px) {
    font-size: 0.56rem !important;
  }
}

.email-icon-block {
  @media screen and (min-width: 960px) and (max-width: 1200px) {
    margin-left: 30px;
  }
}
.btn-email {
  width: 2.56rem !important;
  height: 2.56rem !important;
}
.icon-email {
  font-size: 1.25 !important;
  margin-top: 1px;
}

.btn-video-player {
  width: 1.81rem !important;
  height: 1.81rem !important;
}

.btn-headphone {
  width: 1.87rem !important;
  height: 1.81rem !important;
  img {
    @media screen and (min-width: 1264px) and (max-width: 1903px) {
      margin-left: 1px;
    }
  }
}

/* Social Btn */
.social-media-block {
  margin-left: 7vw;
  @media screen and (max-width: 1280px) {
    margin-left: 1vw;
  }
}
.social-btn {
  width: 2rem !important;
  height: 2rem !important;
  @media screen and (max-width: 959px) {
    width: 2.56rem !important;
    height: 2.56rem !important;
    img {
      width: 18px;
    }
  }

  @media screen and (max-width: 599px) {
    width: 2rem !important;
    height: 2rem !important;
    img {
      width: 14px;
    }
  }
}
/* Social Btn */

// audio video card

//audio video card

/* Hire Me card */
.hire-me-title {
  font-family: "Montserrat", sans-serif !important;
  font-size: 0.9rem !important;
  color: #8b8b8b !important;
  text-align: center !important;
  @media screen and (min-width: 960px) and (max-width: 1200px) {
    font-size: 0.6rem !important;
  }
  @media screen and (max-width: 959px) {
    font-size: 0.7rem !important;
  }
  @media screen and (max-width: 330px) {
    font-size: 0.6rem !important;
  }
}

.hire-me-subtitle {
  font-family: "Montserrat", sans-serif !important;
  font-size: 1rem !important;
  color: #000000 !important;
  @media screen and (max-width: 959px) {
    font-size: 0.8rem !important;
  }
  @media screen and (max-width: 330px) {
    font-size: 0.7rem !important;
  }
}

.btn-hire-me {
  width: 7.5rem;
  border-radius: 50px !important;
  font-weight: 100px !important;
  @media screen and (max-width: 599px) {
    width: 6.5rem;
    font-size: 12px;
  }

  @media screen and (max-width: 330px) {
    width: 5.5rem;
    font-size: 12px;
  }
}

/* Hire Me Card */

/* Profile */

// ............................ Main Navigation Tab...........................//
.custom-tab-text {
  font-size: 1.2rem;
  @media screen and (max-width: 599px) {
    font-size: 1rem;
  }
}
// ............................ Main Navigation Tab ...........................//
// ..........................Desktop Portfolio.........................
.custom-portfolio-img {
  border-radius: 10px;
  width: 100% !important;
  height: 100% !important;
}
.custom-portfolio-title {
  font-family: "Montserrat" !important;
  font-size: 16px !important;
  font-weight: bold;
  margin-bottom: -20px;
  margin-top: -20px;
  @media screen and (min-width: 960px) and (max-width: 1200px) {
    font-size: 12px !important;
  }
  @media screen and (max-width: 959px) {
    font-size: 16px !important;
  }
}
.custom-portfolio-subtitle {
  font-family: "Montserrat" !important;
  color: #000000 !important;
  font-size: 12px;
  @media screen and (min-width: 960px) and (max-width: 1200px) {
    font-size: 10px !important;
  }
}
// .........................Desktop Portfolio...........................

// ................... Work Desktop......................................
.work-icon {
  width: 16px;
  margin-top: 6px;
}
.custom-work-title {
  font-size: 24px;
  line-height: 2.6875rem;
}
.custom-work-subtitle {
  font-size: 12px;
  color: #000000 !important;
  text-align: left;
  text-transform: capitalize;
}
.custom-work-duration {
  font-size: 12px;
  color: #000000 !important;
  text-align: left !important;
}
//...................... Work Desktop.....................................

// ................ Education Desktop............................
.custom-education-subtitle {
  font-size: 0.875rem;
  color: #fbd76d !important;
  line-height: 1.4375rem;
  font-weight: bold;

  @media screen and (max-width: 599px) {
    font-size: 0.7rem;
  }
}
.custom-education-details {
  font-size: 0.75rem;
  line-height: 1.4375rem;
  font-weight: 300;
  color: #2d2d2d !important;
}
// ................ Education Desktop............................
// ................Skills Desktop..................................

.skill-circle {
  width: 3.1rem;
  height: 3rem;
  border-radius: 50%;
  background: #000000;
  border: 5px solid #e0bb4c;
  box-sizing: border-box;
  text-align: center;
  padding: 3px 8px 5px 8px;
  span {
    font-family: "Rubik", sans-serif;
    font-size: 0.9rem;
    color: #ffffff;
  }
}

.skill-title-text {
  font-family: "Rubik", sans-serif !important;
  font-size: 1rem;
  line-height: 1.6875rem;
  color: #222d68 !important;
  @media screen and (max-width: 599px) {
    font-size: 0.7rem;
  }
}
.tablet-audio-video-flex {
  display: none;
  @media screen and (max-width: 959px) {
    display: inline;
    text-align: right;
  }
  @media screen and (max-width: 599px) {
    display: inline;
    text-align: center;
  }
}

//..................Skills Desktop.....................................
// Watermark text
.watermark-text {
  position: absolute;
  font-size: 10vw;
  width: 100%;
  opacity: 0.1;
  white-space: nowrap;
  display: inline-block;
  margin-top: 200px;
  left: 50%;
  transform: translate(-50%, -50%);
}
//hobby tab
.hobby-title {
  font-family: "Gotham Pro" !important;
  font-weight: 500;
  font-size: 40px;
  line-height: 38px;
  color: #000000 !important;
  letter-spacing: 0.05em;
  @media screen and (max-width: 1903px) and (min-width: 1264px) {
    font-size: 30px;
  }

  @media screen and (min-width: 600px) and (max-width: 960px) {
    font-size: 24px;
  }
  @media screen and(max-width: 599px) {
    font-size: 16px;
  }
}
.hobbies-avatar {
  min-width: 63.44px !important;
  min-height: 63.44px !important;
  height: 63.44px !important;
  width: 63.44px !important;
  @media screen and (max-width: 1903px) and (min-width: 1264px) {
    min-width: 63.44px !important;
    min-height: 63.44px !important;
    height: 63.44px !important;
    width: 63.44px !important;
  }
  @media screen and (min-width: 600px) and (max-width: 959px) {
    min-width: 47.08px !important;
    min-height: 47.08px !important;
    height: 47.08px !important;
    width: 47.08px !important;
  }
  @media screen and(max-width: 599px) {
    min-width: 45px !important;
    min-height: 45px !important;
    height: 45px !important;
    width: 45px !important;
  }
}
// hobbies tab
// achievement tab
.achievement {
  img {
    min-width: 160px !important;
    min-height: 124px !important;
    height: 124px !important;
    width: 160px !important;
    @media screen and (max-width: 1263px) and (min-width: 600px) {
      min-width: auto !important;
      min-height: auto !important;
      height: auto !important;
      width: auto !important;
    }
    @media screen and (max-width: 959px) {
      min-width: auto !important;
      min-height: auto !important;
      height: auto !important;
      width: auto !important;
    }
  }
}
.achievement-title {
  font-family: "Gotham Pro" !important;
  font-weight: 500;
  font-size: 45px;
  line-height: 43px;
  letter-spacing: 0.05em;
  color: #000000 !important;
  @media screen and (min-width: 1264px) and (max-width: 1903px) {
    font-size: 24px;
    line-height: 36px;
  }
  @media screen and (min-width: 960px) and (max-width: 1263px) {
    font-size: 22px;
  }
  @media screen and (max-width: 959px) {
    font-size: 40px;
    line-height: 40px;
    margin-bottom: 15px;
  }
  @media screen and (max-width: 599px) {
    font-size: 18px;
    line-height: 18px;
    margin-bottom: 5px;
  }
}
.achievement-subtitle {
  font-family: "Gotham Pro" !important;
  font-weight: 300;
  font-size: 17px;
  line-height: 23px;
  color: #4e4e4e !important;
  @media screen and(max-width: 599px) {
    font-size: 14px;
    line-height: 20px;
  }
}

// achievement tab
// reference tab
.reference-title {
  font-family: "Gotham Pro" !important;
  font-style: normal;
  font-weight: 500;
  font-size: 38px;
  line-height: 36px;
  letter-spacing: 0.05em;
  font-feature-settings: "tnum" on, "lnum" on;
  color: #000000 !important;
  @media screen and (max-width: 599px) {
    font-size: 24px;
    line-height: 23px;
  }
}
.reference-date {
  font-family: "Gotham Pro" !important;
  font-style: normal;
  font-weight: normal;
  font-size: 21px;
  line-height: 20px;
  letter-spacing: 0.05em;
  font-feature-settings: "tnum" on, "lnum" on;
  color: #262626 !important;
  @media screen and (max-width: 599px) {
    font-size: 18px;
    line-height: 14px;
  }
}
.reference-email {
  font-family: "Open Sans" !important;
  font-style: normal;
  font-weight: 300;
  font-size: 21px;
  line-height: 20px;
  color: #4e4e4e !important;
}
.reference-desc {
  font-family: "Open Sans" !important;
  font-style: normal;
  font-weight: 300;
  font-size: 17px;
  line-height: 23px;
  color: #4e4e4e !important;
  @media screen and (max-width: 599px) {
    font-size: 14px;
  }
}
// reference tab
//hire me modal
.card-hire-me-modal {
  .title {
    font-family: "Noto Sans" !important;
    font-style: normal;
    font-weight: 500;
    font-size: 26px;
    line-height: 35px;
    color: #888db1 !important;
  }
  border-radius: 10px !important;
  .hire-me-tab-text {
    font-family: "Noto Sans" !important;
    font-style: normal;
    font-weight: normal;
    font-size: 18px;
    line-height: 25px;
    color: #888db1 !important;
    background: #ffffff;
    margin-left: 1px;
    margin-right: 1px;
  }
  .hire-me-tab-active {
    background: #001ce2 !important;
    font-family: "Noto Sans" !important;
    font-size: 18px;
    line-height: 25px;
    color: #ffffff !important;
  }
  .custom-tab-round-left {
    border-top-left-radius: 10px;
  }
  .custom-tab-round-right {
    border-top-right-radius: 10px;
  }
  .tab-item {
    font-family: "Noto Sans" !important;
    font-style: normal;
    font-weight: 500;
    font-size: 18px;
    line-height: 25px;
    color: #001ce2 !important;
  }

  .select-hour {
    font-family: "Noto Sans" !important;
    font-style: normal;
    font-weight: normal;
    font-size: 18px;
    line-height: 25px;
    color: #888db1 !important;
    .btn-holder {
      display: block;
      width: 47px;
      height: 47px;
      background: #f2f3fd;
      border-radius: 5px;
      padding: 6px;
      margin-top: 10px;
    }
    .input-hour {
      border-radius: 10px !important;
      width: 160px;
      height: 47px;
    }
  }
  // total payment
  .total-payment {
    .card-payment {
      width: 279px;
      height: 142px;
      box-shadow: 0px 0px 50px rgba(0, 19, 156, 0.05);
      border-radius: 10px;
      @media screen and (min-width: 960px) and (max-width: 1903px) {
        height: auto;
      }
      .subtitle {
        font-family: "Noto Sans" !important;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 19px;
        color: #888db1 !important;
      }
      .total-payment-text {
        font-family: "Noto Sans" !important;
        font-weight: bold;
        font-size: 36px;
        line-height: 49px;
        color: #001ce2 !important;
        span {
          font-size: 14px;
          line-height: 19px;
        }
      }
    }
  }
  .payment-btn {
    width: 220px;
    height: 60px !important;
    border-radius: 5px !important;
    font-family: "Noto Sans" !important;
    font-style: normal;
    font-weight: 500;
    font-size: 18px;
    line-height: 18px;
    color: #ffffff !important;
    text-transform: capitalize !important;
  }
}
// hire me modal
</style>

<style lang="scss">
#resumeTheme203 .v-progress-linear__determinate {
  background-color: -moz-linear-gradient(
    138.05deg,
    #fcd259 1.07%,
    #e5bf4e 51.95%,
    #ffde81 89.88%
  ) !important;
  background-color: linear-gradient(
    138.05deg,
    #fcd259 1.07%,
    #e5bf4e 51.95%,
    #ffde81 89.88%
  ) !important;
}
#resumeTheme203 {
  .select-hour {
    .v-text-field input {
      font-family: "Noto Sans" !important;
      font-style: normal;
      font-weight: normal;
      font-size: 18px;
      line-height: 25px;
      color: #888db1 !important;
      text-align: center !important;
    }
    .theme--light.v-text-field--outlined:not(.v-input--is-focused):not(.v-input--has-state)
      > .v-input__control
      > .v-input__slot
      fieldset {
      border: 2px solid #e6e8fc !important;
    }
  }
}
</style>