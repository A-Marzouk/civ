<template>
  <v-app class="w-100">
    <div class="themeWrapper" v-if="currentUser">
      <!-- Header Row -->
      <v-row no-gutters>
        <!-- Column for header section -->
        <v-col cols="12">
          <v-card color="#6152CF" class="parent-card" dark flat>
            <v-card-text>
              <div fluid ma-0 pa-0>
                <v-row no-gutters>
                  <!-- Column 1 Profile -->
                  <v-col cols="8" md="5" sm="2">
                    <v-card color="transparent" flat class="mx-md-5 ml-xs-n12 ml-sm-n4">
                      <v-card-text>
                        <div class="d-flex">
                          <v-list-item>
                            <!-- avatar -->
                            <v-list-item-avatar
                              color="grey darken-3"
                              class="profile-avatar"
                              max-width="150"
                            >
                              <img
                                class="elevation-6"
                                src="/images/resume_themes/theme200/images/avatar.png"
                              />
                            </v-list-item-avatar>
                            <!-- Avatar -->
                            <!-- Name -->
                            <v-list-item-content>
                              <v-list-item-title class="ml-md-4">
                                <span class="profile-title">{{currentUser.personal_info.full_name}}</span>
                              </v-list-item-title>
                              <v-list-item-subtitle class="ml-md-5">
                                <span
                                  class="profile-subtitle"
                                >{{currentUser.personal_info.designation}}</span>
                              </v-list-item-subtitle>

                              <v-list-item-icon class="hidden-md-and-up">
                                <a
                                  :href="item.link"
                                  v-for="item in socialLinks"
                                  class="mr-3"
                                  :key="item.id + '_link'"
                                  target="_blank"
                                  v-show="item.is_active"
                                >
                                  <img
                                    :class="item.link_title == 'Behance'? 'mobile-social-icon-image-behance' : 'mobile-social-icon-image' "
                                    :src="`/images/resume_themes/theme200/social_icons/${item.link_title.toLowerCase()}.webp`"
                                    alt="social icon"
                                  />
                                </a>
                              </v-list-item-icon>

                              <!-- Hidden in sm and xs devices -->
                              <v-list-item-icon class="hidden-sm-and-down">
                                <a
                                  :href="item.link"
                                  v-for="item in socialLinks"
                                  class="mr-3"
                                  :key="item.id + '_link'"
                                  target="_blank"
                                  v-show="item.is_active"
                                >
                                  <img
                                    :class="item.link_title == 'Behance'? 'mobile-social-icon-image-behance' : 'mobile-social-icon-image' "
                                    :src="`/images/resume_themes/theme200/social_icons/${item.link_title.toLowerCase()}.webp`"
                                    alt="social icon"
                                  />
                                </a>
                              </v-list-item-icon>
                            </v-list-item-content>
                            <!-- Hidden in sm and xs devices -->
                            <!-- Name -->
                          </v-list-item>
                        </div>
                        <v-btn color="#FF5231" class="chat-btn">
                          TAP TO CHAT
                          <v-img
                            src="/images/resume_themes/theme200/icons/chat.png"
                            class="chat-btn-img ml-1"
                          ></v-img>
                        </v-btn>
                      </v-card-text>
                    </v-card>
                  </v-col>
                  <!-- Column 1 Profile -->

                  <!-- Hidden in sm and up phone icons -->
                  <v-col col="1" class="hidden-sm-and-up" align="right">
                    <v-card flat color="transparent">
                      <v-btn small color="#00CDF7" class="phone-btn" @click.stop="audioModal=true">
                        <img src="/images/resume_themes/theme200/icons/volume.svg" />
                      </v-btn>
                    </v-card>
                    <v-card flat color="transparent" class="mt-6">
                      <v-btn small color="#E8E5F6" class="video-btn" @click.stop="videoModal=true">
                        <img src="/images/resume_themes/theme200/icons/camera.svg" />
                      </v-btn>
                    </v-card>
                  </v-col>
                  <!-- Hourly rate -->
                  <v-col cols="12" class="hidden-sm-and-up">
                    <v-container fluid style="width:100%">
                      <v-card color="white" light class="mr-1 pa-5" height="280">
                        <v-row no-gutters justify="center" align="center">
                          <!-- mobile parent hire me tab -->
                          <v-col cols="12" align="center">
                            <v-tabs dense centered hide-slider color="#343434" v-model="tabRate">
                              <v-tab class="caption text-capitalize">Monthly</v-tab>
                              <v-tab class="caption text-capitalize">Weekly</v-tab>
                              <v-tab class="caption text-capitalize">Hourly</v-tab>
                            </v-tabs>
                          </v-col>
                          <!-- mobile parent hire me tab -->
                          <v-col cols="12" align="center">
                            <v-tabs-items v-model="tabRate">
                              <v-tab-item v-for="n in 3" :key="n">
                                <v-row align="center" justify="center">
                                  <v-col cols="4">
                                    <img
                                      class="custom-hour-img"
                                      style="width:18px !important; position:absolute;"
                                      src="/images/resume_themes/theme200/icons/hour.png"
                                    />
                                    <span
                                      style="font-size:3.5vw;"
                                    >{{currentUser.payment_info.available_hours}}$</span>
                                  </v-col>
                                </v-row>
                              </v-tab-item>
                            </v-tabs-items>
                          </v-col>

                          <v-col cols="12" align="center">
                            <v-tabs centered hide-slider color="#343434" v-model="tabFrequency">
                              <v-tab class="caption text-capitalize">Monthly</v-tab>
                              <v-tab class="caption text-capitalize">Weekly</v-tab>
                              <v-tab class="caption text-capitalize">Hourly</v-tab>
                            </v-tabs>
                          </v-col>

                          <v-col cols="12" align="center">
                            <v-tabs-items v-model="tabFrequency">
                              <v-tab-item v-for="n in 3" :key="n">
                                <v-list-item class="center">
                                  <v-list-item-content>
                                    <v-list-item-subtitle>
                                      <v-icon color="#00CDF7" class="mx-1" small>mdi-calendar-check</v-icon>
                                      <span
                                        style="font-size:3.5vw;"
                                      >{{currentUser.payment_info.salary}}$/hour</span>
                                    </v-list-item-subtitle>
                                  </v-list-item-content>
                                </v-list-item>
                              </v-tab-item>
                            </v-tabs-items>
                          </v-col>

                          <v-col cols="6" align="center">
                            <v-btn
                              color="#FF5231"
                              dark
                              class="text-capitalize mb-3 mobile-hire-me-btn"
                              style="font-size:4.5vw;"
                            >
                              Hire Me
                              <img
                                class="ml-2"
                                width="18"
                                src="/images/resume_themes/theme200/icons/chat2.png"
                              />
                            </v-btn>
                          </v-col>
                        </v-row>
                      </v-card>
                    </v-container>
                  </v-col>
                  <!-- Hourly Rate -->
                  <!-- Hideen in sm and up phone icons -->

                  <!-- Column 2 Interview-->
                  <v-col
                    cols="6"
                    md="6"
                    sm="6"
                    offset-sm="4"
                    class="desktop-row ml-md-10 mt-md-n8 mt-sm-n12 hidden-xs-only"
                  >
                    <v-card flat color="transparent">
                      <v-card-text>
                        <v-row no-gutters>
                          <!-- Only shows on tablet and dekstop version -->
                          <v-col cols="12" md="10" sm="12" class="interview-flex">
                            <v-card
                              flat
                              color="transparent"
                              class="mt-xl-0 mt-lg-0 mt-md-10 mt-sm-0 mt-0"
                            >
                              <v-card-text align="center">
                                <v-row align="center">
                                  <v-col cols="12" md="4" class="interview-col hidden-sm-and-down">
                                    <div class="interview-text">Your Interviews:</div>
                                  </v-col>
                                  <v-spacer class="hidden-md-only"></v-spacer>
                                  <v-col cols="12" md="4" sm="5" class>
                                    <v-card color="transparent" flat class="mt-md-0 mt-sm-7 mt-0">
                                      <v-btn
                                        color="#03CA9F"
                                        class="btn-voice-call"
                                        @click.stop="audioModal=true"
                                      >
                                        <img
                                          class="mr-2"
                                          src="/images/resume_themes/theme200/icons/volume.svg"
                                        />Audio
                                      </v-btn>
                                    </v-card>
                                  </v-col>

                                  <v-col cols="12" md="4" sm="5" class>
                                    <v-card flat color="transparent" class="mt-md-0 mt-sm-7 mt-0">
                                      <v-btn
                                        color="#2400FF"
                                        class="btn-upload"
                                        @click.stop="videoModal=true"
                                      >
                                        <img
                                          src="/images/resume_themes/theme200/icons/camera.png"
                                          class="mr-2"
                                        />Video
                                      </v-btn>
                                    </v-card>
                                  </v-col>
                                </v-row>
                              </v-card-text>
                            </v-card>
                          </v-col>
                          <!-- Only shows on tablet desktop version -->

                          <!-- Only shows in desktop  -->
                          <v-col cols="10" md="11" sm="12" class="hidden-md-and-down">
                            <v-card
                              flat
                              tile
                              class="card-hire-me mt-md-3"
                              color="rgba(37, 0, 0, 0.1)"
                            >
                              <v-card-text>
                                <v-row no-gutters align="center">
                                  <!-- for desktop -->
                                  <v-col md="2" class>
                                    <img
                                      width="15"
                                      class="mt-md-1"
                                      style="position:absolute;"
                                      src="/images/resume_themes/theme200/icons/hourly-rate.png"
                                    />
                                    <!-- tab 1 -->
                                    <v-tabs
                                      class="hire-me-parent-tab"
                                      height="60"
                                      v-model="tabRate"
                                      center-active
                                      vertical
                                      hide-slider
                                      dense
                                      background-color="transparent"
                                    >
                                      <v-tab class="caption text-capitalize">Monthly</v-tab>
                                      <v-tab class="caption text-capitalize">Weekly</v-tab>
                                      <v-tab class="caption text-capitalize">Hourly</v-tab>
                                    </v-tabs>
                                    <!-- tab 1 -->
                                  </v-col>
                                  <!-- For desktop -->

                                  <v-col align="center" md="2" sm="12">
                                    <!-- tab 1 items -->
                                    <v-tabs-items v-model="tabRate" style="background:transparent;">
                                      <v-tab-item v-for="n in 3" :key="n">
                                        <div class="hire-me-subtitle">Rate $ USD</div>
                                        <div
                                          class="hire-me-title hire-me-frequency-active mt-2"
                                        >{{currentUser.payment_info.available_hours}}$</div>
                                      </v-tab-item>
                                    </v-tabs-items>
                                    <!-- tab 1 items -->
                                  </v-col>
                                  <!-- Show on desktop -->
                                  <v-col md="2" class>
                                    <div class="hire-card-frequency2">
                                      <img
                                        width="15"
                                        class="mt-md-1"
                                        style="position:absolute;"
                                        src="/images/resume_themes/theme200/icons/availibility.png"
                                      />
                                      <!-- tab2 -->
                                      <v-tabs
                                        class="ml-md-1 hire-me-parent-tab"
                                        height="60"
                                        v-model="tabFrequency"
                                        center-active
                                        vertical
                                        hide-slider
                                        dense
                                        background-color="transparent"
                                      >
                                        <v-tab class="caption text-capitalize">Monthly</v-tab>
                                        <v-tab class="caption text-capitalize">Weekly</v-tab>
                                        <v-tab class="caption text-capitalize">Hourly</v-tab>
                                      </v-tabs>
                                      <!-- tab2 -->
                                    </div>
                                  </v-col>
                                  <!-- Show on desktop -->

                                  <v-col align="center" md="3" sm="12">
                                    <v-tabs-items
                                      v-model="tabFrequency"
                                      style="background:transparent;"
                                    >
                                      <v-tab-item v-for="n in 3" :key="n">
                                        <div class="hire-me-subtitle">Availibilty Hourly</div>
                                        <div
                                          class="hire-me-title hire-me-frequency-active mt-2"
                                        >{{currentUser.payment_info.salary}}$</div>
                                      </v-tab-item>
                                    </v-tabs-items>
                                  </v-col>
                                  <v-col md="3" sm="12" align="center">
                                    <v-card flat color="transparent" align="center">
                                      <v-btn block color="#00CDF7" height="50" class="btn-hire-me">
                                        Hire Me
                                        <img
                                          class="mx-1"
                                          src="/images/resume_themes/theme200/icons/chat2.png"
                                        />
                                      </v-btn>
                                    </v-card>
                                  </v-col>
                                </v-row>
                              </v-card-text>
                            </v-card>
                          </v-col>
                          <!-- only shows on desktop  -->
                        </v-row>
                      </v-card-text>
                    </v-card>
                  </v-col>
                  <!-- Column 2 -->

                  <!-- Availibility only for tablet version -->
                  <v-col cols="12" class="availibility-tablet mt-n5 mb-2" align="center">
                    <v-container fluid ma-0 pa-0 style="width:100%">
                      <v-card class color="rgba(37, 0, 0, 0.1)" flat width="705">
                        <v-row align="center" justify="center">
                          <!--tab1 column -->
                          <v-col cols="4" class="ml-n11">
                            <v-card color="transparent" flat>
                              <v-row align="center" justify="center">
                                <v-col cols="6">
                                  <v-tabs
                                    class="hire-me-parent-tab"
                                    height="60"
                                    v-model="tabRate"
                                    center-active
                                    vertical
                                    hide-slider
                                    dense
                                    background-color="transparent"
                                  >
                                    <v-tab class="body-2 text-capitalize">Monthly</v-tab>
                                    <v-tab class="body-2 text-capitalize">Weekly</v-tab>
                                    <v-tab class="body-2 text-capitalize">Hourly</v-tab>
                                  </v-tabs>
                                </v-col>
                                <v-col cols="6">
                                  <v-card flat color="transparent" class>
                                    <v-tabs-items v-model="tabRate" style="background:transparent;">
                                      <v-tab-item v-for="n in 3" :key="n">
                                        <div class="hire-me-subtitle">Rate $ USD</div>
                                        <div
                                          class="hire-me-title hire-me-frequency-active"
                                        >{{currentUser.payment_info.available_hours}}$</div>
                                      </v-tab-item>
                                    </v-tabs-items>
                                  </v-card>
                                </v-col>
                              </v-row>
                            </v-card>
                          </v-col>

                          <v-col cols="5">
                            <v-card color="transparent" flat>
                              <v-row align="center" justify="center">
                                <v-col cols="6">
                                  <v-tabs
                                    class="hire-me-parent-tab"
                                    height="60"
                                    v-model="tabFrequency"
                                    center-active
                                    vertical
                                    hide-slider
                                    dense
                                    background-color="transparent"
                                  >
                                    <v-tab class="body-2 text-capitalize">Monthly</v-tab>
                                    <v-tab class="body-2 text-capitalize">Weekly</v-tab>
                                    <v-tab class="body-2 text-capitalize">Hourly</v-tab>
                                  </v-tabs>
                                </v-col>
                                <v-col cols="6">
                                  <v-tabs-items
                                    v-model="tabFrequency"
                                    style="background:transparent;"
                                  >
                                    <v-tab-item v-for="n in 3" :key="n">
                                      <div class="hire-me-subtitle">Availibilty Hourly</div>
                                      <div
                                        class="hire-me-title hire-me-frequency-active"
                                      >{{currentUser.payment_info.salary}}$</div>
                                    </v-tab-item>
                                  </v-tabs-items>
                                </v-col>
                              </v-row>
                            </v-card>
                          </v-col>
                          <v-col cols="2">
                            <v-card flat color="transparent" align="center" class>
                              <v-btn block color="#00CDF7" height="50" class="btn-hire-me">
                                Hire Me
                                <img
                                  class="mx-1"
                                  src="/images/resume_themes/theme200/icons/chat2.png"
                                />
                              </v-btn>
                            </v-card>
                          </v-col>
                        </v-row>
                      </v-card>
                    </v-container>
                  </v-col>
                  <!-- Availibility only for tablet version -->

                  <!-- Coumn 3 tabs -->
                  <v-col cols="12" md="12" sm="12" class="mt-n5 mb-n11 hidden-xs-only">
                    <v-row align="center" justify="center">
                      <v-col md="10">
                        <v-card color="transparent" flat class="w-100 mt-md-n2 mt-sm-0 mt-0">
                          <v-card-text>
                            <!-- tabs -->
                            <v-tabs
                              height="55"
                              v-model="dataTabs"
                              background-color="#00CDF7"
                              grow
                              class="parent-tab"
                              centered
                              dark
                              hide-slider
                            >
                              <v-tab
                                v-for="tab in tabs"
                                :key="tab.id"
                                @click="currentTab = tab.id"
                                class="ct-tab-title text-capitalize"
                                :class="[
                        currentTab == tab.id ? 'active-tab' : '',
                        tab.id == 1 ? 'round-left-custom' : '',
                        tab.id == 6 ? 'round-right-custom' : '',

                      ]"
                              >
                                <v-avatar tile height="16" width="15">
                                  <img
                                    :src="[currentTab == tab.id ? getImgUrlIconActive(tab.id):getImgUrlIcon(tab.id) ]"
                                    class="mr-md-2 mr-sm-n2"
                                  />
                                </v-avatar>
                                {{tab.title}}
                              </v-tab>
                              <!-- tabs -->
                            </v-tabs>
                          </v-card-text>
                        </v-card>
                      </v-col>
                    </v-row>
                  </v-col>
                  <!-- Column3 tabs-->
                </v-row>
              </div>
            </v-card-text>
          </v-card>
        </v-col>
        <!-- Column for header section -->
      </v-row>
      <!-- header row -->

      <!-- tabs details row -->
      <v-row no-gutters>
        <!-- Mobile Tabs -->
        <!-- Skill Tab  -->
        <v-col cols="12" class="hidden-sm-and-up" :class="[currentTab == 4?'':'d-none']">
          <v-card flat>
            <v-tabs
              v-model="skillTab"
              background-color="#F15959"
              show-arrows
              grow
              dark
              style="border-radius:0px !important;"
            >
              <v-tab
                class="text-capitalize caption"
                v-for="skill in skillTabs"
                :key="skill.id"
              >{{skill.title}}</v-tab>
            </v-tabs>
          </v-card>
        </v-col>
        <!-- Skill Tab -->
        <v-col cols="12" class="hidden-sm-and-up mt-12" align="center">
          <v-card flat>
            <v-tabs
              background-color="transparent"
              height="100"
              v-model="dataTabs"
              hide-slider
              center-active
              dark
            >
              <v-tab v-for="item in tabs" :key="item.title">
                <div class="d-flex flex-column">
                  <div>
                    <v-btn
                      x-small
                      fab
                      :color="currentTab == item.id ? '#FF5231':'#FFA797'"
                      @click="currentTab = item.id"
                      :class="[currentTab == item.id ? 'tab-mobile-btn-active':'']"
                      dark
                      depressed
                    >
                      <img width="15" :src="getImgUrlIcon(item.id)" />
                    </v-btn>
                  </div>
                  <div
                    :class="currentTab == item.id ? 'active-mobile-tab-text':'inactive-mobile-tab-text'"
                  >{{item.title}}</div>
                </div>
              </v-tab>
            </v-tabs>
          </v-card>
        </v-col>
        <!-- <v-col cols="12" align="center" class="hidden-sm-and-up">
          <span
            class="mt-2"
            :class="[currentTab === dot.id?'tab-dot-active':'tab-dot']"
            v-for="dot in tabs"
            :key="dot.id"
          ></span>
        </v-col>-->

        <!-- Mobile Tabs -->

        <!-- Tab Details -->
        <v-col cols="12" md="12">
          <v-container style="max-width: 95%;">
            <v-card flat color="#F5F5F5">
              <!-- tab items -->
              <v-tabs v-model="dataTabs">
                <!-- Tab Item Portfolio -->
                <v-tab-item>
                  <div>
                    <v-card flat color="transparent" class="mt-n10" style="z-index:1;">
                      <v-card-text>
                        <VueSlickCarousel v-bind="slickOptions" ref="slick">
                          <div
                            v-for="project in currentUser.projects"
                            :key="project.id"
                            class="mb-10"
                          >
                            <v-card elevation-12 class="card-portfolio">
                              <v-img
                                :src="getProjectMainImage(project)"
                                @mouseover="hoveredProjectId = project.id"
                                @mouseleave="hoveredProjectId = 0"
                              >
                                <v-overlay
                                  :absolute="absolute"
                                  :value="project.id === hoveredProjectId"
                                  opacity="0.8"
                                  color="#6152CF"
                                >
                                  <v-btn fab small color="#ffffff" @click="zoomPhoto(project)">
                                    <img
                                      src="/images/resume_themes/theme200/icons/overlay-icon.png"
                                    />
                                  </v-btn>
                                </v-overlay>
                              </v-img>

                              <v-card-title>{{project.name}}</v-card-title>
                              <v-card-subtitle align="left">{{project.description}}</v-card-subtitle>
                            </v-card>
                          </div>
                        </VueSlickCarousel>

                        <!-- Pagination -->
                        <v-row class="mt-5">
                          <v-col cols="12">
                            <div class="text-center">
                              <v-btn
                                dark
                                x-small
                                class="mx-8"
                                fab
                                color="#6152CF"
                                @click="prevPortfolio"
                                :disabled="portfolioPage==1? true : false "
                              >
                                <v-icon disabled>mdi-arrow-left</v-icon>
                              </v-btn>
                              <span
                                class="title pagination-text"
                              >{{portfolioPage}}/{{currentUser.projects.length/6 | floor}}</span>
                              <v-btn
                                dark
                                x-small
                                class="mx-8"
                                :disabled="currentUser.projects.length/6<=1? true:false"
                                fab
                                color="#6152CF"
                                @click="nextPortfolio"
                                :class="currentUser.projects.length/6==1? 'btn-pagination-disabled':''"
                              >
                                <v-icon>mdi-arrow-right</v-icon>
                              </v-btn>
                            </div>
                          </v-col>
                        </v-row>
                        <!-- Pagination -->
                      </v-card-text>
                    </v-card>
                  </div>
                </v-tab-item>
                <!-- tab item portfolio -->

                <!-- Tab Item For Work -->
                <v-tab-item>
                  <div>
                    <v-card flat color="transparent" class="mt-n10">
                      <v-card-text>
                        <v-row>
                          <v-col
                            cols="12"
                            md="6"
                            sm="12"
                            v-for="(work,index) in currentUser.work_experience"
                            :key="index"
                          >
                            <v-card flat color="transparent" class="mx-md-10">
                              <v-card-text>
                                <v-list-item>
                                  <v-list-item-icon class="mt-2">
                                    <v-img
                                      style="z-index:1;"
                                      width="40"
                                      :src="getIconWork(index+1)"
                                    ></v-img>
                                  </v-list-item-icon>
                                  <div class="v-line"></div>
                                  <v-list-item-content>
                                    <v-list-item-title class="work-title">{{work.job_title}}</v-list-item-title>
                                    <v-list-item-subtitle
                                      class="work-subtitle mt-2"
                                    >{{ work.company_name }}</v-list-item-subtitle>
                                    <div class="float-xs-left mt-4 work-text">
                                      {{
                                      work.description }}
                                    </div>
                                  </v-list-item-content>
                                </v-list-item>
                              </v-card-text>
                            </v-card>
                          </v-col>
                        </v-row>
                      </v-card-text>
                    </v-card>
                  </div>
                </v-tab-item>
                <!-- Tab Item for work -->

                <!-- Tab Item For Education -->
                <v-tab-item>
                  <div>
                    <v-card flat color="transparent" class="mt-n10">
                      <v-card-text>
                        <v-row>
                          <v-col
                            cols="12"
                            md="6"
                            v-for="(education,index) in currentUser.education"
                            :key="index"
                          >
                            <v-card flat color="transparent" class="mx-md-10">
                              <v-card-text>
                                <v-list-item>
                                  <v-list-item-icon class="mt-2">
                                    <v-img
                                      style="z-index:1;"
                                      width="40"
                                      :src="getIconEducation(index+1)"
                                    ></v-img>
                                  </v-list-item-icon>
                                  <div class="v-line"></div>
                                  <v-list-item-content>
                                    <v-list-item-title
                                      class="work-title"
                                    >{{education.university_name}}</v-list-item-title>
                                    <v-card flat>
                                      <div class="work-text mt-2">{{ education.institution_type }}</div>
                                    </v-card>
                                    <v-list-item-subtitle
                                      v-if="education.degree_title"
                                      class="work-subtitle mt-2"
                                    >{{ education.degree_title}}</v-list-item-subtitle>
                                    <div
                                      class="float-xs-left mt-4 work-text"
                                    >{{education.date_from }} - {{education.present ? 'Present' : education.date_to}}</div>
                                  </v-list-item-content>
                                </v-list-item>
                              </v-card-text>
                            </v-card>
                          </v-col>
                        </v-row>
                      </v-card-text>
                    </v-card>
                  </div>
                </v-tab-item>
                <!-- Tab Item For Education -->

                <v-tab-item>
                  <div>
                    <v-card flat color="transparent" class="mt-n10">
                      <v-card-text>
                        <!-- Skill Child Tabs -->
                        <v-toolbar flat class="ml-md-5 hidden-xs-only">
                          <v-tabs
                            color="#6152CF"
                            v-model="skillTab"
                            background-color="transparent"
                            align-with-title
                            mobile-break-point="599"
                          >
                            <v-tab
                              v-for="item in skillTabs"
                              :key="item.id"
                              class="skill-tab-text mx-md-4 mr-sm-n4"
                            >{{item.title}}</v-tab>
                          </v-tabs>
                          <v-spacer></v-spacer>
                          <!-- <v-btn icon class="mx-md-3">
                            <img
                              width="40"
                              src="/images/resume_themes/theme200/icons/skills/arrange.png"
                            />
                          </v-btn>
                          <v-btn icon small class="mr-sm-3">
                            <img
                              height="16"
                              width="20"
                              src="/images/resume_themes/theme200/icons/skills/view-list.png"
                            />
                          </v-btn>-->
                        </v-toolbar>
                        <!-- Inner Tab Items -->
                        <v-tabs-items v-model="skillTab">
                          <!-- Inner tab first item -->
                          <v-tab-item v-for="n in 4" :key="n">
                            <v-card color="transparent" flat>
                              <v-card-title
                                style="font-weight: 600; color: rgba(0,0,0,.87);"
                              >{{skillTabs[skillTab].title}}</v-card-title>
                              <v-card-text>
                                <v-row>
                                  <v-col
                                    cols="12"
                                    md="3"
                                    sm="6"
                                    class="skill-item"
                                    v-for="skill in currentUser.skills"
                                    :key="skill.id"
                                  >
                                    <v-card flat color="#D5EEFF" class="pa-0">
                                      <v-card-text>
                                        <v-list-item>
                                          <v-list-item-icon>
                                            <v-img width="35" :src="getSkillIcon(skill.title)"></v-img>
                                          </v-list-item-icon>

                                          <v-list-item-content class="ml-n6">
                                            <v-list-item-subtitle>
                                              <v-row no-gutters>
                                                <v-col cols="9">{{skill.title}}</v-col>
                                                <v-col
                                                  cols="3"
                                                  class="hidden-sm-and-up caption"
                                                  align="right"
                                                >{{skill.percentage}}%</v-col>
                                              </v-row>
                                            </v-list-item-subtitle>
                                            <v-list-item-subtitle>
                                              <v-row no-gutters>
                                                <v-col cols="12" md="9" sm="9">
                                                  <v-progress-linear
                                                    height="8"
                                                    background-color="#C5C5C5"
                                                    color="green"
                                                    :value="skill.percentage"
                                                  ></v-progress-linear>
                                                </v-col>
                                                <v-col
                                                  cols="4"
                                                  md="2"
                                                  sm="2"
                                                  offset="1"
                                                  class="mt-n1 caption hidden-xs-only"
                                                >{{skill.percentage}}%</v-col>
                                              </v-row>
                                            </v-list-item-subtitle>
                                          </v-list-item-content>
                                        </v-list-item>
                                      </v-card-text>
                                    </v-card>
                                  </v-col>
                                </v-row>

                                <!-- Pagination -->
                                <v-row class="mt-5">
                                  <v-col cols="12">
                                    <div class="text-center">
                                      <v-btn dark x-small class="mx-8" fab color="#6152CF">
                                        <v-icon disabled>mdi-arrow-left</v-icon>
                                      </v-btn>
                                      <span class="title pagination-text">1/5</span>
                                      <v-btn dark x-small class="mx-8" fab color="#6152CF">
                                        <v-icon>mdi-arrow-right</v-icon>
                                      </v-btn>
                                    </div>
                                  </v-col>
                                </v-row>
                                <!-- Pagination -->
                              </v-card-text>
                            </v-card>
                          </v-tab-item>
                          <!-- inner tab 1st item -->
                        </v-tabs-items>
                        <!-- Inner tab Items -->
                      </v-card-text>
                    </v-card>
                  </div>
                </v-tab-item>
                <!-- Tab Item For Skills -->

                <!-- Tab Item For About Me -->
                <v-tab-item>
                  <div>
                    <v-card flat color="transparent" class="mt-n10">
                      <v-card-text>
                        <v-row>
                          <!-- About me pic shows only mobile devices -->
                          <v-col cols="12" md="5" sm="6" class="hidden-sm-and-up">
                            <v-card flat color="transparent">
                              <v-card-text align>
                                <div class="pic-box">
                                  <v-img
                                    src="/images/resume_themes/theme200/images/about-me/men.png"
                                  ></v-img>
                                </div>
                              </v-card-text>
                            </v-card>
                          </v-col>
                          <!-- About me pic shows only mobile devices -->

                          <!-- About Me Me Name and Designation -->
                          <v-col cols="12" md="6" sm="6">
                            <v-card color="transparent" flat class="w-100">
                              <v-card-text>
                                <div class="hello-text">Hello I'm</div>
                                <div class="hello-title">{{currentUser.personal_info.full_name}}</div>
                                <div class="display-2 hello-designation">
                                  <div class="designation-for-tab">
                                    a
                                    <span
                                      style="color:#6152CF;"
                                    >{{currentUser.personal_info.designation}}</span>
                                  </div>
                                </div>
                              </v-card-text>
                            </v-card>
                          </v-col>
                          <!-- ABout Me Name and Designation -->

                          <!-- About Me Picture -->
                          <v-col cols="12" md="5" sm="6" class="hidden-xs-only">
                            <v-card flat color="transparent">
                              <v-card-text align="right">
                                <div class="pic-box">
                                  <v-img
                                    :src="currentUser.personal_info.profile_pic"
                                    style="border-radius: 10px;"
                                  ></v-img>
                                </div>
                              </v-card-text>
                            </v-card>
                          </v-col>
                          <!-- About Me Picture -->
                          <!-- About Me Main Text -->
                          <v-col cols="12" md="8" sm="12" class="about-me-flex">
                            <v-card flat color="transparent">
                              <v-card-title class="display-1">
                                About Me
                                <span style="color:#69C03E;">.</span>
                              </v-card-title>
                              <v-card-text>
                                <v-row>
                                  <v-col cols="12" md="1" sm="1">
                                    <v-img
                                      class="about-me-line"
                                      height="2.5"
                                      width="35"
                                      src="/images/resume_themes/theme200/images/about-me/line85.png"
                                    ></v-img>
                                  </v-col>
                                  <v-col cols="12" md="10" sm="11" class="mt-n7 ml-n7">
                                    <v-card flat color="transparent" class="pa-0">
                                      <v-card-text
                                        class="body-1"
                                      >{{currentUser.personal_info.about}}</v-card-text>
                                      <v-card-actions class="ml-2">
                                        <a
                                          :href="item.link"
                                          v-for="item in socialLinks"
                                          class="mr-3"
                                          :key="item.id + '_link'"
                                          target="_blank"
                                          v-show="item.is_active"
                                        >
                                          <img
                                            width="25"
                                            :src="`/images/resume_themes/theme200/social_icons/${item.link_title.toLowerCase()}.webp`"
                                            alt="social icon"
                                          />
                                        </a>
                                      </v-card-actions>
                                    </v-card>
                                  </v-col>
                                </v-row>
                              </v-card-text>
                            </v-card>
                          </v-col>
                          <!-- About Me Main Text -->
                        </v-row>
                      </v-card-text>
                    </v-card>
                  </div>
                </v-tab-item>
                <!-- Tab Item for About Me -->

                <!-- Tab item for achievement -->
                <v-tab-item>
                  <div>
                    <v-card flat color="transparent" class="mt-n10">
                      <v-card-text>
                        <VueSlickCarousel :options="slickOptionsAchievements" ref="slickAchivement">
                          <div
                            v-for="(achievement,index) in currentUser.achievements"
                            :key="index + '_achievement'"
                          >
                            <v-row justify="center">
                              <v-col cols="12" md="6" sm="6">
                                <v-card flat color="transparent" elevation-12>
                                  <v-img :src="achievement.image_src"></v-img>
                                </v-card>
                              </v-col>

                              <v-col cols="12" md="6" sm="6">
                                <v-card flat color="transparent" class="certification">
                                  <v-card-title>
                                    <span class="achievement-title">{{achievement.title}}</span>
                                  </v-card-title>
                                  <v-card-subtitle
                                    class="achievement-subtitle"
                                  >{{achievement.category}}</v-card-subtitle>
                                  <v-card-text
                                    class="achievement-text caption"
                                  >{{achievement.description}}</v-card-text>
                                </v-card>
                              </v-col>
                            </v-row>
                          </div>
                        </VueSlickCarousel>
                        <!-- Pagination -->
                        <v-row class="mt-5">
                          <v-col cols="12">
                            <div class="text-center">
                              <v-btn
                                dark
                                x-small
                                class="mx-8"
                                fab
                                color="#6152CF"
                                @click="prevAchievement()"
                                :disabled="achivementPage==1?true:false"
                              >
                                <v-icon disabled>mdi-arrow-left</v-icon>
                              </v-btn>
                              <span
                                class="title pagination-text"
                              >{{achivementPage}}/{{currentUser.achievements.length}}</span>
                              <v-btn
                                dark
                                x-small
                                class="mx-8"
                                fab
                                color="#6152CF"
                                @click="nextAchievement()"
                                :disabled="achivementPage==this.currentUser.achievements.length?true:false"
                              >
                                <v-icon>mdi-arrow-right</v-icon>
                              </v-btn>
                            </div>
                          </v-col>
                        </v-row>
                        <!-- Pagination -->
                      </v-card-text>
                    </v-card>
                  </div>
                </v-tab-item>

                <!-- Tab item for achievement -->
              </v-tabs>
              <!-- Main Tab -->
            </v-card>
          </v-container>
        </v-col>
      </v-row>
      <!-- Tab Details Row -->
      <!-- footer row -->
      <!-- n -->
      <!-- footer row -->
      <!-- Photo Zoom Dialog -->
      <v-dialog v-model="zoomModal" max-width="600" align="center" style="border-radius:50px;">
        <img :src="currentImgObj != null ? getProjectMainImage(currentImgObj) : ''" />
      </v-dialog>
      <!-- Photo Zoom Dialog -->
      <!-- video modal -->
      <v-dialog v-model="videoModal" max-width="1690" max-height="740" persistent>
        <v-card class="card-modal-video-holder pa-sm-10 pa-0" align="center">
          <v-card-subtitle align="right">
            <v-btn
              color="transparent"
              class="btn-video-close mb-xl-8 mb-lg-8 mr-md-0 mr-sm-0 mr-n5 mt-sm-0 mt-2"
              fab
              @click.stop="videoModal=false"
              depressed
            >
              <img src="/images/resume_themes/theme200/icons/close.svg" />
            </v-btn>
          </v-card-subtitle>
          <!-- <slick ref="slick" :options="slickOptionsVideoModal" v-if="currentUser.media.length>0">
            <template v-for="video in currentUser.media">
              <div
                :key="video.id"
                class
                align="center"
                v-if="video.type=='video' && video.is_public==1"
              >
                <v-card class="card-video mb-md-0 md-sm-0 mb-5">
                  <video style="width:100%;" controls>
                    <source :src="video.url" type="video/mp4" />
                  </video>
                  <v-card-title class="video-window-title">{{video.title}}</v-card-title>
                  <v-card-subtitle
                    class="video-window-subtitle mt-n5"
                    align="left"
                  >{{video.transcript}}</v-card-subtitle>
                </v-card>
              </div>
            </template>
          </slick>-->
          <VueSlickCarousel v-bind="slickOptionsVideoModal" class="video-slick">
            <video-player v-for="i in 6" :key="i"></video-player>
          </VueSlickCarousel>
        </v-card>
      </v-dialog>
      <!-- Video modal -->

      <!-- Audio Modal -->
      <v-dialog v-model="audioModal" max-width="1690" persistent>
        <v-card class="audio-modal-main-card pa-xl-12 pa-lg-12 pa-md-8 pa-sm-0 pa-0" align="center">
          <v-card-subtitle align="right">
            <v-btn
              color="transparent"
              class="btn-video-close mb-xl-1 mb-lg-1 mt-xl-5 mt-lg-5 mt-md-0 mt-sm-5 mt-5"
              @click.stop="audioModal=false"
              depressed
              icon
            >
              <img src="/images/resume_themes/theme200/icons/close.svg" />
            </v-btn>
          </v-card-subtitle>
          <!-- <vueSlickCarousel v-bind="slickOptionsAudioModal" v-if="currentUser.media.length>0">
            <template v-for="audio in currentUser.media">
              <div class="mb-5" :key="audio.id" v-if="audio.type=='audio' && audio.is_public==1">
                <audio controls style="width:100%;">
                  <source :src="audio.url" type="audio/mpeg" />Your browser does not support the audio element.
                </audio>
              </div>
            </template>
          </vueSlickCarousel>-->
          <vueSlickCarousel v-bind="slickOptionsAudioModal" class="audio-slick">
            <audio-player
              :modalOpen="audioModal"
              color="#FC5C8A"
              v-for="i in 6"
              :key="i"
              file="https://file-examples-com.github.io/uploads/2017/11/file_example_MP3_700KB.mp3"
            ></audio-player>
          </vueSlickCarousel>
        </v-card>
      </v-dialog>
      <!-- Audio Modal -->
    </div>
  </v-app>
</template>

<script>
import Slick from "vue-slick";
import VueSlickCarousel from "vue-slick-carousel";
import AudioPlayer from "./media/AudioPlayer";
import VideoPlayer from "./media/VideoPlayer";
export default {
  props: ["user", "is_preview"],
  filters: {
    floor: function (value) {
      if (!value) return "";
      return Math.ceil(value);
    },
  },
  components: {
    Slick,
    VueSlickCarousel,
    AudioPlayer,
    VideoPlayer,
  },
  data() {
    return {
      windowWidth: window.innerWidth,
      videoModal: false,
      audioModal: false,
      portfolioPage: 1,
      skillPage: 1,
      totalSkillPages: 1,
      achivementPage: 1,
      skillTab: 0,
      page: 1,
      overlay: true,
      hoveredProjectId: 0,
      absolute: true,
      dataTabs: null,
      currentTab: 1,
      tabRate: null,
      tabFrequency: null,
      zoomModal: false,
      currentImgObj: null,
      tabs: [
        { title: "Portfolio", id: 1 },
        { title: "Works", id: 2 },
        { title: "Education", id: 3 },
        { title: "Skills", id: 4 },
        { title: "About Me", id: 5 },
        { title: "Achievement", id: 6 },
      ],
      skillTabs: [
        {
          title: "Programming Languages",
          value: "Programming_languages",
          id: 1,
        },
        { title: "Framework/Databases", value: "Frameworks", id: 2 },
        { title: "Software", value: "Software", id: 3 },
        { title: "Design Skills", value: "Design", id: 4 },
      ],
      skillDetails: [
        {
          title: "Softwares",
          softwareList: [
            {
              name: "Illustrator",
              icon: "illustrator",
              color: "#FF7C00",
              value: "90",
              valueText: "90%",
            },
            {
              name: "Adobe XD",
              icon: "xd",
              color: "#FF21AF",
              value: "70",
              valueText: "70%",
            },
            {
              name: "Photoshop",
              icon: "photoshop",
              color: "#00C8FF",
              value: "95",
              valueText: "95%",
            },
            {
              name: "Premier Pro",
              icon: "premier",
              color: "#E788FF",
              value: "50",
              valueText: "50%",
            },
          ],
        },
        {
          title: "Languages",
          softwareList: [
            {
              name: "HTML",
              icon: "html",
              color: "#E34F26",
              value: "90",
              valueText: "90%",
            },
            {
              name: "CSS",
              icon: "css",
              color: "#264DE4",
              value: "70",
              valueText: "70%",
            },
            {
              name: "Javascript",
              icon: "js",
              color: "#FDD83C",
              value: "95",
              valueText: "95%",
            },
            {
              name: "Magento",
              icon: "magento",
              color: "#EC6737",
              value: "50",
              valueText: "50%",
            },
          ],
        },
      ],
      portfolio: [
        {
          title: "Product Design",
          subtitle: "industrial,creative,idea",
          id: 1,
        },
        {
          title: "Website Design",
          subtitle: "industrial,creative,idea",
          id: 2,
        },
        {
          title: "Pattern Design",
          subtitle: "industrial,creative,idea",
          id: 3,
        },
        {
          title: "Product Design",
          subtitle: "industrial,creative,idea",
          id: 4,
        },
        {
          title: "Product Design",
          subtitle: "industrial,creative,idea",
          id: 5,
        },
        {
          title: "Product Design",
          subtitle: "industrial,creative,idea",
          id: 6,
        },
      ],
      work: [
        {
          id: 1,
          title: "Product Designer",
          subtitle1: "Gps Bangla",
          subtitle2: "Jan 2017 - Feb 2019",
          bodyText:
            "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt utlabore et dolore magna aliquyam erat,",
        },
        {
          id: 2,
          title: "Animation Designer",
          subtitle1: "Gps Bangla",
          subtitle2: "Jan 2017 - Feb 2019",
          bodyText:
            "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt utlabore et dolore magna aliquyam erat,",
        },
        {
          id: 3,
          title: "Visual Designer",
          subtitle1: "Gps Bangla",
          subtitle2: "Jan 2017 - Feb 2019",
          bodyText:
            "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt utlabore et dolore magna aliquyam erat,",
        },
        {
          id: 4,
          title: "Illustrator Designer",
          subtitle1: "Gps Bangla",
          subtitle2: "Jan 2017 - Feb 2019",
          bodyText:
            "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt utlabore et dolore magna aliquyam erat,",
        },
        {
          id: 5,
          title: "UX Designer",
          subtitle1: "Gps Bangla",
          subtitle2: "Jan 2017 - Feb 2019",
          bodyText:
            "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt utlabore et dolore magna aliquyam erat,",
        },
        {
          id: 6,
          title: "UX Designer",
          subtitle1: "Gps Bangla",
          subtitle2: "Jan 2017 - Feb 2019",
          bodyText:
            "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt utlabore et dolore magna aliquyam erat,",
        },
      ],

      // Education
      education: [
        {
          id: 1,
          title: "Graphic Art Institute",
          subtitle1: "Gps Bangla",
          subtitle2: "Jan 2017 - Feb 2019",
          bodyText:
            "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt utlabore et dolore magna aliquyam erat,",
        },
        {
          id: 2,
          title: "Edx Ltd",
          subtitle1: "Gps Bangla",
          subtitle2: "Jan 2017 - Feb 2019",
          bodyText:
            "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt utlabore et dolore magna aliquyam erat,",
        },
        {
          id: 3,
          title: "Visual Design ltd",
          subtitle1: "Gps Bangla",
          subtitle2: "Jan 2017 - Feb 2019",
          bodyText:
            "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt utlabore et dolore magna aliquyam erat,",
        },
        {
          id: 4,
          title: "teachable",
          subtitle1: "Gps Bangla",
          subtitle2: "Jan 2017 - Feb 2019",
          bodyText:
            "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt utlabore et dolore magna aliquyam erat,",
        },
        {
          id: 5,
          title: "Udemy",
          subtitle1: "Gps Bangla",
          subtitle2: "",
          bodyText:
            "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt utlabore et dolore magna aliquyam erat,",
        },
        {
          id: 6,
          title: "learnworlds",
          subtitle1: "Gps Bangla",
          subtitle2: "",
          bodyText:
            "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt utlabore et dolore magna aliquyam erat,",
        },
      ],

      socialMedia: [
        { title: "behance", icon: "fa-behance", color: "#217BFF" },
        { title: "dribbble", icon: "fa-dribbble", color: "#EE588A" },
        { title: "instagram", icon: "fa-instagram", color: "#DD24BC" },
        { title: "google", icon: "fa-google-plus", color: "#DC4E41" },
      ],

      currentUser: this.user,
      slickOptions: {
        infinite: false,
        dots: false,
        arrows: false,
        slidesPerRow: 3,
        rows: 2,
        responsive: [
          {
            breakpoint: 600,
            settings: {
              slidesPerRow: 1,
              rows: 6,
            },
          },
          {
            breakpoint: 960,
            settings: {
              slidesToScroll: 2,
              slidesPerRow: 2,
              rows: 3,
            },
          },
          {
            breakpoint: 1264,
            settings: {
              slidesToScroll: 3,
            },
          },
          {
            breakpoint: 1600,
            settings: {
              slidesToScroll: 3,
            },
          },
        ],
      },
      slickOptionsSkills: {
        infinite: false,
        dots: false,
        arrows: false,
        slidesPerRow: 4,
        rows: 2,
        responsive: [
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              rows: 4,
            },
          },
          {
            breakpoint: 960,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
              rows: 4,
            },
          },
          {
            breakpoint: 1264,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
            },
          },
          {
            breakpoint: 1600,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 4,
            },
          },
        ],
      },

      slickOptionsAchievements: {
        infinite: false,
        dots: false,
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        rows: 1,
        responsive: [
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              rows: 1,
              simple: true,
            },
          },
          {
            breakpoint: 960,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              rows: 1,
            },
          },
          {
            breakpoint: 1264,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              rows: 1,
            },
          },
          {
            breakpoint: 1600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
        ],
      },
      //video modal
      slickOptionsVideoModal: {
        infinite: false,
        dots: true,
        arrows: false,
        slidesPerRow: 2,
        slidesToScroll: 1,
        rows: 1,
        responsive: [
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              rows: 2,
              centerPadding: "80px",
            },
          },
          {
            breakpoint: 960,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              rows: 2,
              centerPadding: "80px",
            },
          },
          {
            breakpoint: 1264,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              rows: 1,
            },
          },
        ],
      },
      //audio Modal
      slickOptionsAudioModal: {
        infinite: false,
        dots: true,
        arrows: false,
        slidesPerRow: 1,
        slidesToScroll: 1,
        rows: 3,
      },
    };
  },

  methods: {
    getImgUrlIcon(icon) {
      return `/images/resume_themes/theme200/icons/tabs/${icon}.png`;
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

    getImgUrlIconActive(icon) {
      return `/images/resume_themes/theme200/icons/tabs-active/${icon}.png`;
    },
    // portfolio image
    getImgUrlPortfolio(id) {
      return `/images/resume_themes/theme200/images/portfolio/${id}.png`;
    },

    //work icons
    getIconWork(id) {
      return `/images/resume_themes/theme200/icons/work/${id}.png`;
    },

    //education icons
    getIconEducation(id) {
      return `/images/resume_themes/theme200/icons/education/${id}.png`;
    },

    //skills icons
    getIconSkill(icon) {
      return `/images/resume_themes/theme200/icons/skills/${icon}.png`;
    },

    //get social media image icons
    getIconSocial(icon) {
      return `/images/resume_themes/theme200/social_icons/${icon}.webp`;
    },
    setDummyUser() {
      this.currentUser = this.$store.state.dummyUser;
    },
    getSkillIcon(skill_title) {
      let arrayOfSkillImages = {
        "ui design": "/images/skills_icons/user_interface.png",
        "ux design": "/images/skills_icons/user_experience.png",
        "logo design": "/images/skills_icons/logo_design.png",
        animation: "/images/skills_icons/animation.jpg",
        "motion graphics": "/images/skills_icons/motion_graphics.png",
        illustration: "/images/skills_icons/illustration.png",
        advertising: "/images/skills_icons/advertising.png",
        branding: "/images/skills_icons/branding.png",
        "brochure Design": "/images/skills_icons/brochure_design.png",
        "website design": "/images/skills_icons/web_design.png",
        "game designer": "/images/skills_icons/game_designer.png",
        "character design": "/images/skills_icons/character_design.png",
        "digital painting": "/images/skills_icons/digital_painting.png",
        "creative director": "/images/skills_icons/creative_director.png",
        "html / css": "/images/skills_icons/HTML.png",
        // 2-

        "adobe after effects": "/images/skills_icons/AE.png",
        sketch: "/images/skills_icons/Sketch.png",
        "adobe illustrator": "/images/skills_icons/Illustrator.png",
        "adobe xd": "/images/skills_icons/AdobeXD.png",
        photoshop: "/images/skills_icons/Photoshop.png",
        autocad: "/images/skills_icons/autocad.png",
        solidworks: "/images/skills_icons/solid_works.png",
        "adobe flash": "/images/skills_icons/adobe_flash.png",
        "digital drawing Tablet":
          "/images/skills_icons/digital_drawing_tablet.png",
        "adobe indesign": "/images/skills_icons/indesign.png",
        coreldraw: "/images/skills_icons/corel_draw.png",
        "3d max": "/images/skills_icons/3d_max.png",

        // developer :
        // 1-
        javascript: "/images/skills_icons/javascript.png",
        sql: "/images/skills_icons/mysql.png",
        java: "resumeApp/resources/assets/images/skills_icons/java.png",
        "c#": "/images/skills_icons/c#.png",
        python: "/images/skills_icons/python.png",
        php: "/images/skills_icons/php.png",
        "c++": "/images/skills_icons/c_language.png",
        c: "/images/skills_icons/c_language.png",
        typescript: "/images/skills_icons/typescript.png",
        ruby: "/images/skills_icons/ruby.png",
        "objective-C": "/images/skills_icons/objective_c.png",
        swift: "/images/skills_icons/swift.png",
        "vb.net": "/images/skills_icons/vb_net.png",
        go: "/images/skills_icons/go.png",
        perl: "/images/skills_icons/perl.png",
        scala: "/images/skills_icons/scala.png",
        groovy: "/images/skills_icons/groovy.png",
        assembly: "/images/skills_icons/assembly.png",
        coffeescript: "/images/skills_icons/coffeeScript.png",
        vba: "/images/skills_icons/vba.png",
        r: "/images/skills_icons/r_lang.png",
        matlab: "/images/skills_icons/matlab.png",
        "visual basic 6": "/images/skills_icons/matlab.png",
        lua: "/images/skills_icons/lua.png",
        haskell: "/images/skills_icons/haskell.png",
        html: "/images/skills_icons/HTML.png",
        css: "/images/skills_icons/CSS.png",
        laravel: "/images/skills_icons/laravel.png",
        phpstorm: "/images/skills_icons/phpstorm.png",

        //2-
        angularjs: "/images/skills_icons/Angularjs.png",
        "angular.js": "/images/skills_icons/Angularjs.png",
        "node.js": "/images/skills_icons/node_js.png",
        nodejs: "/images/skills_icons/node_js.png",
        ".net Core": "/images/skills_icons/netcore.png",
        react: "/images/skills_icons/react.png",
        cordova: "/images/skills_icons/cordava.png",
        firebase: "",
        xamarin: "",
        hadoop: "/images/skills_icons/hadoop.png",
        spark: "/images/skills_icons/spark.png",
        mysql: "/images/skills_icons/mysql.png",
        "sql server": "/images/skills_icons/sql server.png",
        postgresql: "/images/skills_icons/postgreSQL.png",
        sqlite: "/images/skills_icons/SQLite.png",
        mongodb: "/images/skills_icons/mongoDB.png",
        oracle: "/images/skills_icons/Oracle.png",
        redis: "/images/skills_icons/redis.png",
        cassandra: "/images/skills_icons/cassandra.png",
      };
      if (arrayOfSkillImages.hasOwnProperty(skill_title.toLowerCase())) {
        return arrayOfSkillImages[skill_title.toLowerCase()];
      }
      return "/images/skills_icons/skill.png";
    },
    zoomPhoto(obj) {
      this.zoomModal = true;
      this.currentImgObj = obj;
    },
    //slick carousel
    nextPortfolio() {
      this.$refs.slick.next();
      if (this.portfolioPage < this.currentUser.projects.length / 6) {
        this.portfolioPage++;
      }
    },
    prevPortfolio() {
      this.$refs.slick.prev();
      if (this.portfolioPage > 1) {
        this.portfolioPage--;
      }
    },
    prevSkill() {
      if (this.skillPage > 1) {
        this.$refs.carousel[0].prev();
        this.skillPage--;
      }
    },
    nextSkill() {
      if (this.skillPage < this.totalSkillPages) {
        this.$refs.carousel[0].next();
        this.skillPage++;
      }
    },
    nextAchievement() {
      this.$refs.slickAchivement.next();
      if (this.achivementPage < this.currentUser.achievements.length) {
        this.achivementPage++;
      }
    },
    prevAchievement() {
      this.$refs.slickAchivement.prev();
      if (this.achivementPage > 1) {
        this.achivementPage--;
      }
    },
  },
  computed: {
    socialLinks() {
      return this.currentUser.links.filter((link) => {
        return link.category === "social_link" ? link : false;
      });
    },
  },

  mounted() {
    window.onresize = () => {
      this.windowWidth = window.innerWidth;
    };
    // if there is no user or the preview is true, set dummy user
    if (!this.currentUser || this.is_preview) {
      this.setDummyUser();
    }

    // let user accessible in included components.
    this.$store.dispatch("updateThemeUser", this.currentUser);
  },
};
</script>

<style lang="scss" scoped>
.themeWrapper {
  width: 100%;
}

@import "resources/sass/themes/theme200.scss";
.theme--dark.v-btn.v-btn--disabled:not(.v-btn--flat):not(.v-btn--text):not(.v-btn--outlined) {
  background-color: #6152cf !important;
}

.hire-me-frequency {
  color: white;
  font-size: 12px !important;
}
.hire-me-frequency-active {
  font-weight: bold;
  color: white;
  line-height: 10px;
}

.hire-card-frequency2 {
  margin-left: 13px !important;
}

.mobile-hire-me-btn {
  margin-top: 6px;
}

//mobile -tab
.active-mobile-tab-text {
  color: #ff5231 !important;
  font-size: 14px !important;
  font-weight: bold;
}

.inactive-mobile-tab-text {
  color: #ffa797 !important;
  font-size: 12px !important;
}
.card-modal-video-holder {
  height: 734px;
  @media screen and (min-width: 1264px) and (max-width: 1903px) {
    height: 80%;
  }
  @media screen and (max-width: 959px) {
    height: auto;
  }
  @media screen and (max-width: 599px) {
    height: 682px;
  }
  .btn-video-close {
    img {
      width: 50px;
      height: 50px;
      @media screen and (max-width: 959px) {
        width: 63px;
        height: 62px;
      }
      @media screen and (max-width: 599px) {
        width: 38px;
        height: 38px;
      }
    }
  }
  .card-video {
    max-width: 674px;
    max-height: 476px;
    border-radius: 12px !important;
    @media screen and (min-width: 1264px) and (max-width: 1903px) {
      width: 90%;
      height: 90%;
    }
    @media screen and (min-width: 960px) and (max-width: 1263px) {
      max-width: 750px;
    }
    @media screen and (max-width: 959px) {
      width: 90%;
    }
    @media screen and (max-width: 599px) {
      max-width: 361px;
      max-height: 263px;
    }
    .video-window-title {
      font-family: "Open Sans" !important;
      font-size: 30px;
      color: #2e2e2e !important;
      @media screen and (min-width: 1264px) and (max-width: 1903px) {
        font-size: 24px;
      }
      @media screen and (max-width: 959px) {
        font-size: 32px;
      }
      @media screen and (max-width: 599px) {
        font-size: 18px;
      }
    }
    .video-window-subtitle {
      font-family: "Open Sans" !important;
      font-size: 19px;
      color: #7d7d7d !important;
      text-transform: capitalize !important;
      @media screen and (min-width: 1264px) and (max-width: 1903px) {
        font-size: 14px;
      }
      @media screen and (max-width: 959px) {
        font-size: 18px;
      }
      @media screen and (max-width: 599px) {
        font-size: 10px;
      }
    }
  }
}

.audio-modal-main-card {
  min-height: 500px;
  @media screen and (min-width: 960px) and (max-width: 1263px) {
    min-height: 600px;
  }

  @media screen and (max-width: 959px) {
    min-height: 670px;
  }

  @media screen and (max-width: 599px) {
    min-height: 734px;
  }
}

//mobile tab
</style>

<style lang="scss">
#resumeTheme200 .v-slide-group__prev {
  display: none;
}

#resumeTheme200 .v-slide-group__next {
  display: none;
}

#resumeTheme200 .slick-dots li.slick-active button {
  background-color: #6152cf !important;
  opacity: 1 !important;
}

#resumeTheme200 .slick-dots li button {
  background-color: #6152cf !important;
  opacity: 0.57 !important;
}
// #resumeTheme200 .slick-dots{
//   @media screen and (max-width: 959px){
//     bottom: -140px !important;
//   }
// }
#resumeTheme200 .audio-slick .slick-list {
  @media screen and (min-width: 960px) and (max-width: 1263px) {
    padding-bottom: 40px !important;
  }
  @media screen and (max-width: 959px) {
    padding-bottom: 80px !important;
  }
  @media screen and (max-width: 599px) {
    padding-bottom: 180px !important;
  }
}
</style>

