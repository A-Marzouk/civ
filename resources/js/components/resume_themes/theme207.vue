<template>
  <v-app style="width:100%; background:#212529;">
    <v-container fluid ma-0 pa-0 style="max-width:100% !important;">
      <!-- For Desktop and Tablet -->
      <v-app-bar color="#272B2F" :height="windowWidth > 599 ? 260 : '170' " dark>
        <v-avatar class="custom-avatar hidden-xs-only" left tile>
          <v-img src="/images/resume_themes/theme207/avatar.png"></v-img>
        </v-avatar>

        <v-container fluid pa-0 ma-0 style="width:100%">
          <v-row class align="center" justify="center" dense>
            <v-col cols="2" class="hidden-sm-and-up">
              <v-avatar class="custom-avatar-mobile hidden-sm-and-up mr-7" left size="80">
                <v-img src="/images/resume_themes/theme207/avatar.png"></v-img>
              </v-avatar>
            </v-col>
            <v-col md="4" sm="7" cols="6">
              <v-card
                class="pa-0 card-profile"
                :align="windowWidth > 599 ?'center': 'left'"
                color="transparent"
                tile
                flat
              >
                <div class="custom-profile-title">{{ personalData.name }}</div>
                <div class="custom-profile-subtitle">{{ personalData.designation }}</div>
                <div class="hr-line hidden-xs-only"></div>
              </v-card>

              <v-card class="pa-0 mt-3 hidden-xs-only" align="center" color="transparent" tile flat>
                <v-row justify="center" align="center">
                  <v-col cols="6" sm="5">
                    <div class="hour-rate">
                      <v-avatar left class="mt-n2 mr-n1">
                        <img src="/images/resume_themes/theme207/icons/usd.png" />
                      </v-avatar>
                      <span>$20</span>
                    </div>
                    <div class="hour-rate-text">Hour Rate</div>
                  </v-col>
                  <v-col cols="6" sm="5">
                    <div class="hour-rate">
                      <v-avatar left class="mt-n2 mr-n1">
                        <img src="/images/resume_themes/theme207/icons/time.png" />
                      </v-avatar>
                      <span>25</span>
                    </div>
                    <div class="hour-rate-text">Weekly Availibility</div>
                  </v-col>
                </v-row>
              </v-card>
            </v-col>
            <v-col cols="4" class="hidden-sm-and-up">
              <v-card color="transparent" flat tile>
                <v-btn color="#272B2F" class="btn-hire-me" x-large>Hire Me</v-btn>
              </v-card>
            </v-col>
            <!-- Social Buttons for tablet only -->
            <v-col sm="5" class="d-none d-sm-flex d-md-none">
              <v-card flat color="transparent" tile class="pa-0 hire-me-card">
                <v-btn color="#272B2F" class="btn-hire-me my-8 mt-n8 ml-2" x-large>
                  <v-icon color="#FC413C" left>mdi-email-outline</v-icon>
                </v-btn>

                <!-- social buttons -->
                <v-btn
                  class="custom-social-btn mx-2"
                  v-for="item in socialIcons"
                  :key="item.title"
                  color="#272B2F"
                >
                  <img
                    :width="item.title == 'facebook'? '12' : '20' "
                    x-large
                    :src="getSocialIcon(item.title)"
                  />
                </v-btn>
                <!-- social buttons -->
              </v-card>
            </v-col>
            <!-- Social Button for tablet only -->

            <!-- 3rd column -->
            <v-col md="7" class="hidden-sm-and-down" align="right">
              <v-card flat color="transparent" tile class="pa-0 hire-me-card">
                <!-- social buttons -->
                <v-btn
                  class="custom-social-btn mx-2 elevation-12"
                  v-for="item in socialIcons"
                  :key="item.title"
                  color="#272B2F"
                >
                  <img
                    :width="item.title == 'facebook'? '12' : '20' "
                    x-large
                    :src="getSocialIcon(item.title)"
                  />
                </v-btn>
                <!-- social buttons -->
                <v-btn color="#272B2F" class="btn-hire-me hidden-sm-and-down elevation-12" x-large>
                  <v-icon color="#FC413C" left>mdi-email-outline</v-icon>
                </v-btn>
              </v-card>
            </v-col>
            <!-- 3rd column -->
          </v-row>
          <v-row>
            <v-col cols="12" class="hidden-sm-and-up">
              <v-card color="transparent" flat tile class="card-hire-me-mobile">
                <v-card-subtitle>
                  <div class="d-flex flex-row justify-content-center align-items-center">
                    <div class="hour-rate-mobile-text">Hour rate</div>
                    <div class="hour-rate">$5</div>
                    <div class="hour-rate-mobile-text">Weekly availibilty</div>
                    <div class="hour-rate">300</div>
                  </div>
                </v-card-subtitle>
              </v-card>
            </v-col>
          </v-row>
        </v-container>
      </v-app-bar>
      <!-- For Desktop and Tablet Version -->
      <!-- ........................................................................................................ -->

      <!-- ....................................................................................................... -->

      <!-- Tab Container -->
      <v-container fluid style="width:100%;" class="mt-10">
        <v-row justify="center" align="center">
          <v-col cols="12" md="11">
            <!-- for mobile version  -->
            <!-- for mobile version  -->
            <!-- tab for desktop and tablet -->
            <v-tabs
              v-model="mainDataTab"
              centered
              grow
              class
              slider-color="#FC413C"
              background-color="transparent"
              tile
            >
              <v-tab
                v-for="tab in tabItems"
                :key="tab.id"
                @click="currentTab=tab.id"
                class="mx-md-2 mx-sm-2 text-capitalize"
                :class="[
                currentTab == tab.id ? 'custom-active-tab' : '', 'ct-tab',
              ]"
              >
                <v-avatar tile>
                  <img
                    :src="currentTab == tab.id ? getTabActiveIcon(tab.id): getTabIcon(tab.id)"
                    class="mr-md-4"
                  />
                </v-avatar>
                <span v-show="windowWidth>599">{{ tab.title }}</span>
              </v-tab>
            </v-tabs>
            <!-- Tab for desktop and tablet -->
          </v-col>
        </v-row>
        <!-- Main tab ends here -->
      </v-container>
      <!--Tab Container  -->
      <!-- tab items container -->
      <v-container fluid pa-md-10 mt-md-n6 mt-sm-n6 style="width:100%">
        <v-row align="center" justify="center">
          <v-col cols="12">
            <v-card flat color="transparent" tile>
              <v-tabs-items v-model="mainDataTab" style="background: transparent;">
                <!-- Portfolio -->
                <v-tab-item>
                  <v-container style="width: 100%" fluid class="pa-md-5 pa-sm-5 pa-0">
                    <!-- Will be hidden in tablets and mobile -->
                    <v-row class="hidden-sm-and-down">
                      <!-- column 1 -->
                      <v-col md="3" sm="5" cols="6">
                        <v-card color="transparent" tile class="card-portfolio" hover>
                          <v-speed-dial top right absolute>
                            <template v-slot:activator>
                              <v-btn icon color="transparent" tile>
                                <img
                                  width="20"
                                  src="/images/resume_themes/theme207/icons/zoom.png"
                                  alt
                                />
                              </v-btn>
                            </template>
                          </v-speed-dial>
                          <img
                            class="pofolio-lg-img"
                            src="/images/resume_themes/theme207/portfolio/1.png"
                            alt="Portfolio Image"
                          />
                        </v-card>
                      </v-col>
                      <!-- Column 1 -->
                      <!-- column 2 -->
                      <v-col md="4" sm="7" cols="6">
                        <v-row>
                          <v-col cols="6" v-for="n in 4" :key="n">
                            <v-card class="card-portfolio mt-n3 mb-3" hover>
                              <v-speed-dial top right absolute>
                                <template v-slot:activator>
                                  <v-btn icon color="transparent" tile>
                                    <img
                                      width="20"
                                      src="/images/resume_themes/theme207/icons/zoom.png"
                                      alt
                                    />
                                  </v-btn>
                                </template>
                              </v-speed-dial>
                              <v-img :src="getPortfolio(n+1)" alt="Portfolio Image"></v-img>
                            </v-card>
                          </v-col>
                        </v-row>
                      </v-col>
                      <!-- Column 2 -->

                      <!-- column 3 -->
                      <v-col md="3">
                        <v-card color="transparent" tile class="card-portfolio" hover>
                          <v-speed-dial top right absolute>
                            <template v-slot:activator>
                              <v-btn icon color="transparent" tile>
                                <img
                                  width="20"
                                  src="/images/resume_themes/theme207/icons/zoom.png"
                                  alt
                                />
                              </v-btn>
                            </template>
                          </v-speed-dial>
                          <v-img
                            src="/images/resume_themes/theme207/portfolio/1.png"
                            alt="Portfolio Image"
                          ></v-img>
                        </v-card>
                      </v-col>
                      <!-- Column 3 -->
                      <!-- column 4 -->
                      <v-col md="2">
                        <v-row>
                          <v-col cols="12" v-for="n in 2" :key="n">
                            <v-card class="card-portfolio mt-n3 mb-3" hover>
                              <v-speed-dial top right absolute>
                                <template v-slot:activator>
                                  <v-btn icon color="transparent" tile>
                                    <img
                                      width="20"
                                      src="/images/resume_themes/theme207/icons/zoom.png"
                                      alt
                                    />
                                  </v-btn>
                                </template>
                              </v-speed-dial>
                              <v-img :src="getPortfolio(n+1)" alt="Portfolio Image"></v-img>
                            </v-card>
                          </v-col>
                        </v-row>
                      </v-col>
                      <!-- Column 4 -->
                    </v-row>
                    <!-- Will be hidden in tablets and mobile devices -->

                    <!-- Only For tablet and mobile version -->
                    <template v-for="n in 2">
                      <v-row
                        class="hidden-md-and-up ml-sm-n2"
                        :key="n"
                        :class="[n>1 ?'mt-sm-n3 mt-n5':'']"
                      >
                        <!-- column 1 -->
                        <v-col md="3" sm="5" cols="6">
                          <v-card color="transparent" tile class="card-portfolio" hover>
                            <v-speed-dial top right absolute>
                              <template v-slot:activator>
                                <v-btn icon color="transparent" tile>
                                  <img
                                    width="20"
                                    src="/images/resume_themes/theme207/icons/zoom.png"
                                    alt
                                  />
                                </v-btn>
                              </template>
                            </v-speed-dial>
                            <img
                              class="pofolio-lg-img"
                              src="/images/resume_themes/theme207/portfolio/1.png"
                              alt="Portfolio Image"
                            />
                          </v-card>
                        </v-col>
                        <!-- Column 1 -->
                        <!-- column 2 -->
                        <v-col
                          md="4"
                          sm="7"
                          cols="6"
                          :class="[(n%2)==0 ? 'order-first':'ml-sm-0 ml-n3']"
                        >
                          <v-row>
                            <v-col cols="6" v-for="n in 4" :key="n">
                              <v-card class="card-portfolio mt-n3 mb-3" hover>
                                <v-speed-dial top right absolute>
                                  <template v-slot:activator>
                                    <v-btn icon color="transparent" tile>
                                      <img
                                        width="20"
                                        src="/images/resume_themes/theme207/icons/zoom.png"
                                        alt
                                      />
                                    </v-btn>
                                  </template>
                                </v-speed-dial>
                                <v-card flat style="border-radius: 10px;" class="card-small-img">
                                  <v-img
                                    class="portofolio-sm-img"
                                    :src="getPortfolio(n+1)"
                                    alt="Portfolio Image"
                                  ></v-img>
                                </v-card>
                              </v-card>
                            </v-col>
                          </v-row>
                        </v-col>
                        <!-- Column 2 -->
                      </v-row>
                    </template>
                    <!-- Only for tablet and mobile version -->
                  </v-container>
                </v-tab-item>
                <!-- Portfolio -->
                <!-- Education -->
                <v-tab-item>
                  <v-container style="width:100%" fluid class="pa-md-0 pa-sm-5 pa-0">
                    <v-row>
                      <v-col cols="12" sm="12" md="4" v-for="n in 6" :key="n">
                        <v-card class="pa-5 card-education" hover color="#272B2F">
                          <div
                            class="d-flex flex-no-wrap justify-space-between education-inner-block"
                          >
                            <v-avatar
                              class="mt-md-6 mt-sm-5 education-avatar"
                              tile
                              color="rgba(252, 65, 60, 0.1)"
                            >
                              <img src="/images/resume_themes/theme207/tabs/active/2.png" />
                            </v-avatar>
                            <div>
                              <v-card-title class="education-title mb-2">Ryerson University</v-card-title>
                              <v-card-subtitle
                                class="education-subtitle"
                              >Parallel to the Potsgraduate degree in computer security, I studied Digital Marketing.</v-card-subtitle>
                              <v-card-subtitle
                                class="education-session mt-n6"
                                align="right"
                              >2010-2013</v-card-subtitle>
                            </div>
                          </div>
                        </v-card>
                      </v-col>
                    </v-row>
                  </v-container>
                </v-tab-item>
                <!-- Education -->

                <!-- Experience -->
                <v-tab-item>
                  <v-container style="width:100%" fluid class="pa-md-0 pa-sm-5 pa-0">
                    <v-row>
                      <v-col cols="12" sm="12" md="4" v-for="n in 6" :key="n">
                        <v-card class="pa-5 card-education" hover color="#272B2F">
                          <div
                            class="d-flex flex-no-wrap justify-space-between education-inner-block"
                          >
                            <v-avatar
                              class="mt-md-6 mt-sm-5 education-avatar"
                              tile
                              color="rgba(252, 65, 60, 0.1)"
                            >
                              <img src="/images/resume_themes/theme207/tabs/active/3.png" />
                            </v-avatar>
                            <div>
                              <v-card-title class="education-title mb-2">Ryerson University</v-card-title>
                              <v-card-subtitle
                                class="education-subtitle"
                              >Parallel to the Potsgraduate degree in computer security, I studied Digital Marketing.</v-card-subtitle>
                              <v-card-subtitle
                                class="education-session mt-n6"
                                align="right"
                              >2010-2013</v-card-subtitle>
                            </div>
                          </div>
                        </v-card>
                      </v-col>
                    </v-row>
                  </v-container>
                </v-tab-item>
                <!-- Experience -->

                <!-- Skills -->
                <v-tab-item>
                  <v-container style="width:100%" fluid class="pa-md-0 pa-sm-5 pa-0">
                    <v-row>
                      <v-col cols="12">
                        <v-card color="transparent" tile flat>
                          <v-tabs
                            v-model="skillTab"
                            centered
                            background-color="transparent"
                            tile
                            color="#fc413c"
                          >
                            <v-tab
                              class="custom-skill-tab"
                              v-for="skill in skills"
                              :key="skill.id"
                              @click="currentSkillTab = skill.id"
                              :class="[currentSkillTab == skill.id ? 'skill-child-tab-active':'skill-child-tab' ]"
                            >{{skill.title}}</v-tab>
                          </v-tabs>
                        </v-card>
                        <!-- Child Tabs -->
                      </v-col>
                    </v-row>
                    <v-row>
                      <v-col cols="12">
                        <!-- Child Tab Items -->
                        <v-tabs-items v-model="skillTab" style="background:transparent;">
                          <!-- All Programming Languges -->
                          <v-tab-item v-for="n in 4" :key="n">
                            <v-card flat color="transparent" tile>
                              <v-card-text>
                                <v-row>
                                  <v-col
                                    md="4"
                                    sm="12"
                                    cols="12"
                                    v-for="item in childSkills"
                                    :key="item.id"
                                  >
                                    <v-card class="pa-5 card-education" hover color="#272B2F">
                                      <div class="d-flex flex-no-wrap mt-n3 mt-md-0 mt-sm-1">
                                        <v-avatar
                                          class="education-avatar"
                                          tile
                                          color="rgba(252, 65, 60, 0.1)"
                                        >
                                          <img
                                            src="/images/resume_themes/theme207/tabs/active/4.png"
                                          />
                                        </v-avatar>
                                        <div class="flex-fill">
                                          <v-card-title
                                            class="education-title mb-5"
                                            style="margin-top:-22px;"
                                          >PHP</v-card-title>
                                          <div class="ml-3 div-skillbar">
                                            <v-row align="center" justify="center">
                                              <v-col md="9" sm="10" cols="9">
                                                <v-progress-linear
                                                  tile
                                                  class="skill-progressbar"
                                                  color="#ffffff"
                                                  rounded
                                                  background-color="#FC413C"
                                                  height="15"
                                                  :value="item.value"
                                                ></v-progress-linear>
                                              </v-col>
                                              <v-col md="3" sm="2" cols="3">
                                                <span
                                                  class="progress-value-text"
                                                >{{item.value_text}}</span>
                                              </v-col>
                                            </v-row>
                                          </div>
                                        </div>
                                      </div>
                                    </v-card>
                                  </v-col>
                                </v-row>
                              </v-card-text>
                            </v-card>
                          </v-tab-item>
                        </v-tabs-items>
                        <!-- All Programming Languages -->
                        <!-- Child tab items -->
                      </v-col>
                    </v-row>
                  </v-container>
                </v-tab-item>
                <!-- Skills -->
                <!-- Media -->
                <v-tab-item>
                  <v-container style="width:100%" fluid class="pa-md-0 pa-sm-5 pa-0">
                    <!-- Media Main Row -->
                    <v-row>
                      <!-- Media Main Column 1 -->
                      <v-col md="3" sm="6">
                        <v-row class="flex-column">
                          <v-col cols="12" v-for="i in 3" :key="i">
                            <v-card class="pa-5 card-media" color="#272B2F" hover>
                              <div class="d-flex flex-no-wrap justify-content-center">
                                <v-avatar tile size="70" color="rgba(252, 65, 60, 0.1)">
                                  <v-btn icon depressed color="transparent">
                                    <img src="/images/resume_themes/theme207/icons/play.png" />
                                  </v-btn>
                                </v-avatar>
                                <div class="flex-fill mt-n5">
                                  <v-card-title class="media-title">AUDIO_04/08/2020</v-card-title>
                                  <v-card-subtitle class="media-subtitle">Heans Prinslo</v-card-subtitle>
                                  <v-card-subtitle class="media-duration mt-n7">1:05:00</v-card-subtitle>
                                </div>
                              </div>
                            </v-card>
                          </v-col>
                        </v-row>
                      </v-col>
                      <!-- Media Main Column 1-->

                      <!-- Media Main Column 2 -->
                      <v-col md="3" sm="6">
                        <v-row class="flex-column">
                          <v-col cols="12" class="col-video-1">
                            <v-card class="pa-5 card-video text-center" hover color="#272B2F">
                              <v-img
                                src="/images/resume_themes/theme207/video-preview1.png"
                                alt="Video"
                                class="white--text align-center preview-1"
                              >
                                <!-- Play Button -->
                                <v-avatar tile size="70" color="rgba(252, 65, 60, 0.25)">
                                  <v-btn icon depressed color="transparent">
                                    <v-img
                                      max-width="30"
                                      max-height="30"
                                      src="/images/resume_themes/theme207/icons/play.png"
                                    ></v-img>
                                  </v-btn>
                                </v-avatar>
                                <!-- Play button -->
                                <!-- duration -->
                                <div class="d-flex video-duration-preview-1">
                                  <v-card
                                    color="rgba(0, 0, 0, 0.8)"
                                    class="pa-0"
                                    justify="center"
                                    align="center"
                                    style="border-radius:3px;"
                                    dark
                                    height="40"
                                    width="80"
                                  >
                                    <div class="video-duration-text">15.00</div>
                                  </v-card>
                                </div>
                                <!-- duration -->
                              </v-img>
                            </v-card>
                          </v-col>
                          <v-col cols="12" class="col-video-1">
                            <v-card class="pa-5 card-media" hover color="#272B2F">
                              <div class="d-flex flex-no-wrap justify-content-center">
                                <v-avatar tile size="70" color="rgba(252, 65, 60, 0.1)">
                                  <v-btn icon depressed color="transparent">
                                    <img src="/images/resume_themes/theme207/icons/play.png" />
                                  </v-btn>
                                </v-avatar>
                                <div class="flex-fill mt-n5">
                                  <v-card-title class="media-title">AUDIO_04/08/2020</v-card-title>
                                  <v-card-subtitle class="media-subtitle">Heans Prinslo</v-card-subtitle>
                                  <v-card-subtitle class="media-duration mt-n7">1:05:00</v-card-subtitle>
                                </div>
                              </div>
                            </v-card>
                          </v-col>
                        </v-row>
                      </v-col>
                      <!-- Media Main Column 2 -->

                      <!-- Media Column 3 -->
                      <v-col md="3" sm="6" class="hidden-sm-and-down">
                        <v-row class="flex-column">
                          <v-col cols="12" v-for="i in 3" :key="i">
                            <v-card class="pa-5 card-media" hover color="#272B2F">
                              <div class="d-flex flex-no-wrap justify-content-center">
                                <v-avatar tile size="70" color="rgba(252, 65, 60, 0.1)">
                                  <v-btn icon depressed color="transparent">
                                    <img src="/images/resume_themes/theme207/icons/play.png" />
                                  </v-btn>
                                </v-avatar>
                                <div class="flex-fill mt-n5">
                                  <v-card-title class="media-title">AUDIO_04/08/2020</v-card-title>
                                  <v-card-subtitle class="media-subtitle">Heans Prinslo</v-card-subtitle>
                                  <v-card-subtitle class="media-duration mt-n7">1:05:00</v-card-subtitle>
                                </div>
                              </div>
                            </v-card>
                          </v-col>
                        </v-row>
                      </v-col>
                      <!-- Media Column 3 -->
                      <!-- Media 4th Column -->
                      <v-col md="3" sm="12" class>
                        <v-row class="flex-column">
                          <v-col cols="12">
                            <v-card class="pa-5 card-video-big text-center" hover color="#272B2F">
                              <v-img
                                class="white--text align-center preview-big"
                                min-height="332"
                                src="/images/resume_themes/theme207/video-preview2.png"
                                alt="Video"
                              >
                                <!-- Play Button -->
                                <v-avatar tile size="70" color="rgba(252, 65, 60, 0.25)">
                                  <v-btn icon depressed color="transparent">
                                    <v-img
                                      max-width="30"
                                      max-height="30"
                                      src="/images/resume_themes/theme207/icons/play.png"
                                    ></v-img>
                                  </v-btn>
                                </v-avatar>
                                <!-- Play button -->
                                <!-- duration -->
                                <div class="d-flex video-duration-preview-2">
                                  <v-card
                                    color="rgba(0, 0, 0, 0.8)"
                                    class="pa-0"
                                    justify="center"
                                    align="center"
                                    style="border-radius:3px;"
                                    dark
                                    height="40"
                                    width="80"
                                  >
                                    <div class="video-duration-text">15.00</div>
                                  </v-card>
                                </div>
                                <!-- duration -->
                              </v-img>
                            </v-card>
                          </v-col>
                        </v-row>
                      </v-col>
                      <!-- Media 4th Column -->
                    </v-row>
                    <!-- Media Main Row -->
                  </v-container>
                </v-tab-item>
                <!-- Media -->
                <!-- About Me -->
                <v-tab-item>
                  <v-card flat color="transparent" tile class="mt-5">
                    <v-container style="width:100%">
                      <v-row>
                        <v-col md="3" sm="3" cols="12" :align="windowWidth <=599 ? 'center':'left'">
                          <v-card-title class="about-me-title-mobile hidden-sm-and-up">About Me</v-card-title>
                          <v-avatar size="250" class="about-me-photo" tile>
                            <v-img src="/images/resume_themes/theme207/avatar.png"></v-img>
                          </v-avatar>
                        </v-col>
                        <v-col md="9" sm="9" cols="12">
                          <div
                            class="about-me-text"
                          >Donec a augue gravida, vulputate ligula et, pellentesque arcu. Morbi feugiat eros nec sem ultrices, et venenatis velit posuere. Donec bibendum commodo dui, eget sollicitudin urna sagittis non. Donec ac commodo tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris gravida laoreet lacus, non hendrerit elit suscipit a. Nunc ut ultricies massa, eu sollicitudin enim. Praesent quis ultrices nibh. Donec bibendum elit sed erat convallis, at feugiat arcu mollis. Nunc quam eros, venenatis id tristique malesuada, ornare eu augue. Aliquam volutpat eros id libero posuere vestibulum.</div>
                        </v-col>
                      </v-row>
                    </v-container>
                  </v-card>
                </v-tab-item>
                <!-- About Me -->
              </v-tabs-items>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
      <!-- Tab items container -->
    </v-container>
    <!-- Main container -->
    <v-footer class="hidden-sm-and-down" color="#272B2F" v-show="currentTab==5" height="100">
      <v-col cols="12">
        <div class="d-flex">
          <div class>
            <v-card flat tile color="transparent">
              <div class="d-flex flex-no-wrap">
                <v-avatar tile size="70" color="rgba(252, 65, 60, 0.1)">
                  <v-btn icon depressed color="transparent">
                    <v-img
                      max-width="30"
                      max-height="30"
                      src="/images/resume_themes/theme207/icons/play.png"
                    ></v-img>
                  </v-btn>
                </v-avatar>
                <div class="mt-n5">
                  <v-card-title class="media-title">AUDIO_04/08/2020</v-card-title>
                  <v-card-subtitle class="media-subtitle">Heans Prinslo</v-card-subtitle>
                </div>
              </div>
            </v-card>
          </div>
          <!-- spectrum -->
          <div class="mt-n3">
            <v-card flat tile color="transparent" class="pa-2">
              <v-img class="img-spectrum" src="/images/resume_themes/theme207/spectrum.png"></v-img>
            </v-card>
            <div class="d-flex justify-content-between">
              <div class="media-duration-footer white--text">0:00</div>
              <v-spacer></v-spacer>
              <div class="media-duration-footer white--text">5:38</div>
            </div>
          </div>
          <!-- spectrum -->
          <!-- Audio Controlls -->
          <div class="ml-12 flex-fill">
            <div class="d-flex justify-content-between mt-5">
              <div class="shuffle mx-2">
                <v-btn icon color="transparent" depressed>
                  <img src="/images/resume_themes/theme207/audio/shuffle.png" alt />
                </v-btn>
              </div>
              <div class="mx-10">
                <!-- previous button -->
                <v-btn color="#272B2F" class="prev-btn">
                  <img src="/images/resume_themes/theme207/audio/prev.png" />
                </v-btn>
                <v-btn color="#272B2F" class="pause-btn mx-n2" elevation="12">
                  <img src="/images/resume_themes/theme207/audio/pause.png" />
                </v-btn>
                <v-btn color="#272B2F" class="prev-btn">
                  <img src="/images/resume_themes/theme207/audio/next.png" />
                </v-btn>
                <!-- previous button -->
              </div>
              <!-- Repeat Button -->
              <div class="shuffle">
                <v-btn icon depressed color="transparent">
                  <img src="/images/resume_themes/theme207/audio/repeat.png" alt />
                </v-btn>
              </div>

              <div class="btn-fullscreen" align="right">
                <v-btn icon depressed color="transparent">
                  <img src="/images/resume_themes/theme207/icons/fullscreen.png" />
                </v-btn>
              </div>
              <!-- Repeat Button -->
            </div>
          </div>
          <!-- Audio Controls -->
        </div>
      </v-col>
    </v-footer>
    <!-- Only For tablet and mobile -->
    <v-footer class="hidden-md-and-up" color="#272B2F" v-show="currentTab==5">
      <v-container style="width:100%" fluid>
        <v-row align="center" justify="center" class="hidden-md-and-up">
          <v-col cols="12" align="center" class="mb-md-0 mb-sm-0 mb-n6">
            <!-- Audio Controlls -->
            <!-- Tablet mobile repeat button -->
            <v-btn icon color="transparent" class="shuffle mx-sm-5 mx-auto" depressed>
              <img src="/images/resume_themes/theme207/audio/shuffle.png" alt />
            </v-btn>
            <!-- tablet mobile repeat button -->

            <!-- Play controlls for tablet and mobile -->

            <v-btn color="#272B2F" class="prev-btn">
              <img src="/images/resume_themes/theme207/audio/prev.png" />
            </v-btn>
            <v-btn color="#272B2F" class="pause-btn mx-n2" elevation="12">
              <img src="/images/resume_themes/theme207/audio/pause.png" />
            </v-btn>
            <v-btn color="#272B2F" class="prev-btn">
              <img src="/images/resume_themes/theme207/audio/next.png" />
            </v-btn>
            <!-- play controlls for tablet and mobile -->
            <!-- Shuffle button -->
            <v-btn icon depressed color="transparent" class="shuffle mx-sm-5 mx-auto">
              <img src="/images/resume_themes/theme207/audio/repeat.png" alt />
            </v-btn>
            <!-- Shuffle button -->
            <!-- full screen button -->
            <v-btn class="btn-fullscreen" icon depressed color="transparent">
              <img src="/images/resume_themes/theme207/icons/fullscreen.png" />
            </v-btn>
            <!-- full screen button -->
            <!-- Audio Controls -->
          </v-col>
          <!-- 2nd column -->
          <v-col sm="12" cols="12">
            <v-row align="center" justify="center">
              <!-- 1st inner footer column -->
              <v-col sm="4" cols="3">
                <v-avatar
                  tile
                  size="30"
                  class="mx-sm-4 mx-auto hidden-xs-only"
                  color="rgba(252, 65, 60, 0.25)"
                >
                  <v-btn icon depressed color="transparent">
                    <v-img
                      max-width="15"
                      max-height="15"
                      src="/images/resume_themes/theme207/icons/play.png"
                    ></v-img>
                  </v-btn>
                </v-avatar>
                <span class="media-title-tablet mx-sm-2 mx-auto">AUDIO_04/09/2020</span>
              </v-col>
              <!-- 1st inner footer column -->
              <!-- 2nd inner footer column -->
              <v-col sm="6" cols="6">
                <v-card color="transparent" flat tile>
                  <v-progress-linear
                    class="media-progressbar"
                    color="#FEBC2C"
                    background-color="#272B2F"
                    rounded
                    height="10"
                    value="70"
                  ></v-progress-linear>
                </v-card>
              </v-col>
              <v-col sm="2" cols="3">
                <v-card class="transparent" flat tile alig="right">
                  <v-card-title class="media-duration-footer">1:05:00</v-card-title>
                </v-card>
              </v-col>
              <!-- 2nd inner footer column -->
            </v-row>
          </v-col>
          <!-- 2nd column -->
        </v-row>
      </v-container>
    </v-footer>
    <!-- Only For tablet and mobile -->
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      windowWidth: window.innerWidth,
      drawer: false,
      mainDataTab: "",
      skillTab: "",
      currentTab: 1,
      currentSkillTab: 1,
      personalData: {
        name: "Liam McDevitt",
        designation: "Graphic Designer",
        detail:
          "Donec a augue gravida, vulputate ligula et, pellentesque arcu. Morbi feugiat eros nec sem ultrices..."
      },
      socialIcons: [
        { id: 1, title: "twitter" },
        { id: 2, title: "facebook" },
        { id: 3, title: "instagram" }
      ],
      tabItems: [
        { id: 1, title: "Portfolio" },
        { id: 2, title: "Education" },
        { id: 3, title: "Experience" },
        { id: 4, title: "Skills" },
        { id: 5, title: "Media" },
        { id: 6, title: "About Me" }
      ],
      portfolioItems: [
        { id: 1, image: 1 },
        { id: 2, image: 2 },
        { id: 3, image: 3 },
        { id: 4, image: 4 },
        { id: 5, image: 1 },
        { id: 6, image: 2 },
        { id: 7, image: 3 },
        { id: 8, image: 4 }
      ],
      experienceItems: [
        {
          id: 1,
          title: "Front End Developer",
          detail:
            "Parallel to the Potsgraduate degree in computer security, I studied Digital Marketing.",
          session: "2010-2013"
        },
        {
          id: 2,
          title: "UX/UI Designer",
          detail:
            "Parallel to the Potsgraduate degree in computer security, I studied Digital Marketing.",
          session: "2010-2013"
        },
        {
          id: 2,
          title: "Graphic Design",
          detail:
            "Parallel to the Potsgraduate degree in computer security, I studied Digital Marketing.",
          session: "2010-2013"
        }
      ],
      skills: [
        { id: 1, title: "Programming Languages" },
        { id: 2, title: "Frameworks" },
        { id: 3, title: "Design Skills" },
        { id: 4, title: "Software" }
      ],
      childSkills: [
        { id: 1, title: "Flutter", value: 54, value_text: "54%" },
        { id: 2, title: "Angular", value: 54, value_text: "54%" },
        { id: 3, title: "React", value: 54, value_text: "54%" }
      ]
    };
  },
  //mounted
  mounted() {
    window.onresize = () => {
      this.windowWidth = window.innerWidth;
    };
  },
  //methods
  methods: {
    getSocialIcon(title) {
      return `/images/resume_themes/theme207/social_icons/${title}.webp`;
    },
    getTabIcon(id) {
      return `/images/resume_themes/theme207/tabs/${id}.png`;
    },
    getTabActiveIcon(id) {
      return `/images/resume_themes/theme207/tabs/active/${id}.png`;
    },
    getTabIconMobile(id) {
      return `/images/resume_themes/theme207/tabs-mobile/${id}.png`;
    },
    getPortfolio(image) {
      return `/images/resume_themes/theme207/portfolio/${image}.png`;
    }
  }
};
</script>

<style scoped lang="scss">
@import url("https://fonts.googleapis.com/css?family=Open+Sans&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");
.media-progressbar {
  border-radius: 15px !important;
  box-shadow: -5px -5px 9px rgba(113, 113, 113, 0.149) !important;
  border: 1px solid #272b2f !important;
  @media screen and (min-width: 600px) and (max-width: 800px) {
    margin-left: -20px;
  }

  @media screen and (max-width: 599px) {
    width: 45vw;
  }
}
.card-hire-me-mobile {
  margin-top: -16px;
  .hour-rate-mobile-text {
    font-family: "Open Sans" !important;
    font-weight: 600 !important;
    font-size: 12px !important;
    line-height: 16px;
    color: #ffffff;
    opacity: 0.5;
  }

  .hour-rate {
    font-size: 18px !important;
    color: #febc2c !important;
    opacity: 1;
    margin-left: 10px;
    margin-right: 20px;
    margin-top: -4px;
  }
}

.card-profile {
  @media screen and (max-width: 599px) {
    margin-left: 26px;
    margin-top: -30px;
  }
}

.hr-line {
  margin-top: 20px;
  width: 85%;
  border: 1px solid #ffffff;
  opacity: 0.1;
  @media screen and (max-width: 959px) {
    width: 60%;
  }
}
.custom-avatar {
  background: #272b2f;
  border: 10px solid #272b2f;
  box-shadow: -5px -5px 9px rgba(113, 113, 113, 0.149) !important;
  border-radius: 9px;
  width: 200px !important;
  height: 200px !important;
  max-height: 200px;
  max-width: 200px;
  @media screen and (max-width: 959px) {
    width: 120px !important;
    height: 120px !important;
    max-height: 120px;
    max-width: 120px;
  }
}

.custom-avatar-mobile {
  float: left;
  position: relative;
  background: #272b2f;
  border: 10px solid #272b2f;
  box-shadow: -5px -5px 9px rgba(113, 113, 113, 0.149) !important;
  margin-top: 24px;
}

.custom-profile-title {
  font-family: "Open Sans" !important;
  font-weight: bold;
  font-size: 2.5rem;
  line-height: 3.375rem;
  color: #ffffff !important;
  @media screen and (min-width: 960px) and (max-width: 1054px) {
    font-size: 1.8rem;
  }
  @media screen and(max-width:959px) {
    font-size: 1.8rem;
  }
  @media screen and (max-width: 599px) {
    font-size: 20px;
    line-height: 27px;
    margin-top: 44px;
  }
  @media screen and (max-width: 375px) {
    font-size: 16px;
    line-height: 20px;
  }
}

.custom-profile-subtitle {
  font-family: "Open Sans" !important;
  color: #fc413c !important;
  font-size: 1.25rem !important;
  font-weight: bold;
  line-height: 1.875rem;
  @media screen and(max-width:959px) {
    font-size: 1rem !important;
  }
  @media screen and (max-width: 599px) {
    font-size: 12px !important;
    line-height: 16px;
  }
  @media screen and (max-width: 375px) {
    font-size: 11px;
  }
}

.custom-profile-text {
  font-family: "Poppins" !important;
  color: #000000 !important;
  font-size: 0.9rem;
  line-height: 1.6888rem;
}
// Availibility
.hour-rate {
  font-family: "Poppins" !important;
  font-size: 2rem;
  color: #febc2c;
  img {
    width: 35px;
    height: 35px;
  }
  @media screen and (min-width: 960px) and (max-width: 1209px) {
    font-size: 1.2rem;
    img {
      width: 20px;
      height: 20px;
    }
  }

  @media screen and (max-width: 959px) {
    font-size: 1.5rem;
    img {
      width: 26px;
      height: 26px;
    }
  }
}
.hour-rate-text {
  font-family: "Poppins" !important;
  font-size: 0.875rem;
  color: #febc2c;
  @media screen and (min-width: 960px) and (max-width: 1209px) {
    font-size: 0.7rem;
  }
}
// Availibilty

.hour-card {
  margin-top: -92px !important;
  @media screen and (max-width: 959px) {
    margin-top: 0px !important;
  }
}
.hire-me-card {
  margin-top: -70px;
  @media screen and (max-width: 959px) {
    margin-top: 0px;
  }
}

.btn-hire-me {
  text-transform: capitalize !important;
  border-radius: 5px !important;
  width: 200px;
  box-shadow: -5px -5px 9px rgba(113, 113, 113, 0.149) !important;
  @media screen and (max-width: 1024px) {
    width: 120px;
  }
  @media screen and (max-width: 959px) {
    width: 225px;
  }
  @media screen and (max-width: 599px) {
    font-family: "Poppins" !important;
    font-size: 12px !important;
    font-weight: 600;
    width: 105px !important;
    height: 30px !important;
    color: #fc413c !important ;
    text-transform: capitalize !important;
    margin-top: 15px;
  }
}
.custom-social-btn {
  max-width: 36px !important;
  height: 51px !important;
  border-radius: 5px !important;
  box-shadow: -5px -5px 9px rgba(113, 113, 113, 0.149) !important;

  @media screen and (min-width: 960px) and (max-width: 1024px) {
    min-width: 45px !important;
  }

  @media screen and (max-width: 599px) {
    height: 30px !important;
    width: 30px !important;
    border-radius: 5px;
  }
}
// Tabs
.ct-tab {
  font-family: "Poppins" !important;
  font-weight: 500;
  line-height: 30px;
  color: #ffffff !important;
  img {
    width: 20px;
    height: 20px;
  }
  @media screen and (max-width: 959px) {
    span {
      display: none;
    }
  }
}
.custom-active-tab {
  font-family: "Poppins" !important;
  font-weight: bold;
  color: #fc413c !important;
  @media screen and (max-width: 959px) {
    span {
      font-size: 14px !important;
      display: inline;
    }
    img {
      width: 16px;
      height: 16px;
    }
  }
  @media screen and (max-width: 599px) {
    img {
      width: 20px;
      height: 20px;
    }
  }
}
// Tabs
// Portfolio
.card-portfolio {
  border-radius: 10px !important;
}
.card-small-img {
  @media screen and (max-width: 599px) {
    margin-bottom: -10px;
  }
}

img.pofolio-lg-img {
  @media screen and (max-width: 959px) {
    height: 394px;
  }
  @media screen and (max-width: 599px) {
    height: 238px;
    width: 100%;
  }
}
.portofolio-sm-img {
  @media screen and (max-width: 959px) {
    height: 185px;
  }
  @media screen and (max-width: 599px) {
    height: 112px;
    min-width: 113%;
  }
}
//Portfolio

//education
.card-education {
  border-radius: 9px !important;
  @media screen and (max-width: 959px) {
    height: 170px;
  }
  .education-inner-block {
    @media screen and (max-width: 959px) {
      margin-top: -12px !important;
    }
  }

  @media screen and (max-width: 599px) {
    height: 95px;
  }
}

.education-avatar {
  min-width: 100px !important;
  width: 100px !important;
  height: 120px !important;
  img {
    width: 50px;
    height: 50px;
  }
  @media screen and (max-width: 599px) {
    min-width: 67px !important;
    width: 67px !important;
    height: 67px !important;
    margin-top: 6px;
    img {
      width: 22px;
      height: 18px;
    }
  }
}

.education-title {
  font-family: "Roboto" !important;
  color: #ffffff !important;
  font-weight: bold !important;
  line-height: 30px !important;
  margin-bottom: 2px !important;
  img {
    width: 40px;
  }
  @media screen and (max-width: 599px) {
    font-size: 14px !important;
    margin-top: -15px;
  }
}
.experience-title {
  font-family: "Roboto" !important;
  color: #ffffff !important;
  font-weight: bold !important;
  line-height: 30px !important;
  img {
    width: 30px;
  }
}
.education-subtitle {
  font-family: "Roboto" !important;
  color: #ffffff !important;
  line-height: 23px;
  font-size: 0.875rem !important;
  @media screen and (max-width: 959px) {
    width: 60% !important;
  }
  @media screen and (max-width: 599px) {
    width: 100% !important;
    font-size: 10px !important;
    line-height: 12px;
  }
}
.education-session {
  font-family: "Roboto" !important;
  color: #ffffff !important;
  font-size: 0.75rem !important;
  @media screen and (max-width: 599px) {
    font-size: 9px !important;
    color: rgba(255, 255, 255, 0.5) !important;
    margin-top: -40px !important;
  }
}
//education
// Skill tab
.skill-child-tab {
  font-family: "Poppins" !important;
  color: #ffffff !important;
}

.skill-child-tab-active {
  font-family: "Poppins" !important;
  color: #fc413c;
  font-weight: 600;
}

.skill-title {
  font-family: "Roboto" !important;
  color: #ffffff !important;
  font-weight: bold;
  font-size: 1rem;
  line-height: 1.438rem;
}
.div-skillbar{
  @media screen and (max-width: 599px){
    margin-top: -20px;
  }
}
.skill-progressbar {
  border-radius: 50px !important;
  background: #fc413c !important;
  @media screen and (max-width: 599px){
    height: 7px !important;
  }
}
.progress-value-text {
  font-family: "Roboto" !important;
  font-style: normal;
  font-weight: normal;
  font-size: 20px !important;
  line-height: 28px;
  color: #ffffff !important;
  @media screen and (max-width: 599px){
    font-size: 12px !important;
  }
}
// Skill tab
// media
.media-title {
  font-family: "Roboto" !important;
  font-size: 0.9rem !important;
  color: #ffffff !important;
  font-weight: bold !important;
  line-height: 30px !important;
}

.media-subtitle {
  font-family: "Poppins" !important;
  font-size: 0.75rem !important;
  color: #ffffff !important;
  line-height: 18px;
}

.media-duration {
  font-family: "Poppins" !important;
  font-size: 0.75rem !important;
  color: #febc2c !important;
  line-height: 18px;
}
// .media-duration-footer {
//   font-family: "Poppins" !important;
//   font-size: 0.75rem !important;
//   color: #ffffff !important;
//   line-height: 18px;
//   @media screen and (max-width: 599px){
//     font-size: 8px !important;
//   }
// }
.img-spectrum {
  width: 280px;
  height: auto;
}

.shuffle {
  img {
    width: 20px;
    height: auto;
  }
  @media screen and (max-width: 959px) {
    img {
      width: 14px;
      height: auto;
    }
  }
}

.prev-btn {
  margin-top: -20px;
  width: 80px !important;
  height: 60px !important;
  border-radius: 5px !important;
  box-shadow: -5px -5px 9px rgba(113, 113, 113, 0.149) !important;
  img {
    width: 40px;
    height: auto;
  }
  @media screen and (max-width: 959px) {
    margin-top: 0px;
    width: 57.19px !important;
    height: 45px !important;
  }
}

.pause-btn {
  margin-top: -20px;
  width: 70px !important;
  height: 70px !important;
  border-radius: 5px !important;
  box-shadow: -5px -5px 9px rgba(113, 113, 113, 0.149) !important;
  z-index: 2;
  img {
    width: 20px;
    height: auto;
  }
  @media screen and (max-width: 959px) {
    margin-top: 0px;
    width: 60px !important;
    height: 60px !important;
    img {
      width: 15px;
    }
  }
}

.btn-fullscreen {
  img {
    width: 18px;
    height: auto;
  }
  @media screen and (max-width: 959px) {
    margin-left: 150px;
    position: absolute;
    margin-top: 58px;
    img {
      width: 14px;
      height: 14px;
    }
  }
  @media screen and (max-width: 599px) {
    margin-left: 1vw;
    margin-top: 12px;
  }
}

//media footer
.media-title-tablet {
  @media screen and (max-width: 959px) {
    font-family: "Poppins" !important;
    font-size: 0.75rem;
    color: #ffffff;
  }
  @media screen and (max-width: 599px) {
    font-size: 10px;
    @media screen and (max-width: 414px) {
      font-size: 8px;
    }
  }
}

.media-duration-footer {
  @media screen and (max-width: 959px) {
    font-family: "Poppins" !important;
    font-size: 0.75rem !important;
    color: #febc2c !important;
  }
  @media screen and (max-width: 599px) {
    font-size: 10px !important;
  }
  @media screen and (max-width: 414px) {
    font-size: 8px;
  }
}
// media footer

.card-media {
  border-radius: 9px !important;
  height: 108px;
  img {
    width: 30px;
    height: 30px;
  }
}

.card-video {
  border-radius: 9px !important;
  height: 240px;
  .v-responsive.v-image.preview-1 {
    min-height: 202px;
    min-width: 240px;
    @media screen and (max-width: 959px) {
      height: 0px;
      margin: -1px;
    }
  }
}

.card-video-big {
  border-radius: 9px !important;
  @media screen and(max-width: 959px) {
    width: 98.2%;
    margin-top: -24px;
  }
  .v-responsive.v-image.preview-big {
    height: 0px;
  }
}

.video-duration-preview-1 {
  position: absolute;
  bottom: 10px;
  right: 10px;
}

.video-duration-preview-2 {
  position: absolute;
  bottom: 15px;
  right: 15px;
}
.video-duration-text {
  margin-top: 11px;
  font-family: "Poppins" !important;
  font-size: 14px;
  color: #ffffff !important;
}
.col-video-1 {
  @media screen and(max-width: 959px) {
    margin-left: -14px;
  }
}
// media
// about me
.about-me-title {
  font-family: "Poppins" !important;
  color: #5843be !important;
  font-weight: bold !important;
}
.about-me-text {
  font-family: "Poppins" !important;
  color: #ffffff !important;
  font-size: 1.125rem !important;
  @media screen and (max-width: 599px) {
    font-size: 12px !important;
    line-height: 18px;
  }
}
// about me

// Mobile version
.custom-toolbar-title-mobile {
  font-family: "Open Sans" !important;
  font-weight: bold !important;
  color: #333333;
  font-size: 1rem !important;
}
.profile-text-mobile {
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  font-size: 20px;
  line-height: 30px;
  color: #5843be;
  opacity: 0.5;
}

.profile-title-mobile {
  font-family: "Open Sans" !important;
  font-style: normal;
  font-weight: bold;
  font-size: 1.25rem !important;
  line-height: 33px;
  color: #5843be !important;
}

.profile-subtitle-mobile {
  font-family: "Open Sans" !important;
  font-style: normal;
  font-weight: normal;
  font-size: 0.875rem !important;
  line-height: 33px;
  color: #5843be !important;
}
.about-me-photo {
  background: #272b2f;
  border: 15px solid #272b2f;
  box-shadow: -5px -5px 9px rgba(113, 113, 113, 0.149) !important;
  border-radius: 9px;
  @media screen and (max-width: 959px) {
    height: 175px !important;
    width: 175px !important;
    min-width: 175px !important;
  }
  @media screen and (max-width: 599px) {
    height: 120px !important;
    width: 120px !important;
    min-width: 120px !important;
    border: 10px solid #272b2f;
  }
}
.about-me-title-mobile {
  font-family: "Poppins" sans-serif !important;
  font-style: normal;
  font-weight: bold;
  font-size: 16px;
  line-height: 24px;
  color: #ffffff;
  @media screen and (max-width: 599px) {
    margin-top: -80px;
  }
}
.about-me-text-mobile {
  font-family: "Poppins" sans-serif !important;
  font-style: normal;
  font-weight: normal;
  font-size: 12px;
  line-height: 18px;
  color: #ffffff !important;
}
.active-mobile-tab {
  background: #eeeeee;
  border: 3px solid #eeeeee;
  box-shadow: inset 1.5px 1.5px 1px rgba(174, 174, 192, 0.2),
    inset -1px -1px 1px rgba(255, 255, 255, 0.7);
  border-radius: 5px;
  span {
    font-family: "Poppins" sans-serif !important;
    color: #5843be;
    font-size: 10px !important;
    text-transform: capitalize;
  }
}

.custom-skill-tab {
  @media screen and (max-width: 599px) {
    font-size: 12px !important;
  }
}

.availibilty-col {
  @media screen and (min-width: 1025px) {
    margin-left: -52px;
  }
  @media screen and (max-width: 1024px) {
    margin-left: -20px;
  }
}
</style>

<style>
#resumetheme207 .v-slide-group__prev.v-slide-group__prev--disabled {
  display: none !important;
}
#resumeTheme207 .skill-progressbar .v-progress-linear__determinate {
  border-radius: 50px !important;
}
@media screen and (max-width: 959px) {
  #resumeTheme207 .media-progressbar .v-progress-linear__determinate {
    border-top-right-radius: 5px !important;
    border-bottom-right-radius: 5px !important;
    margin-top: -1px !important;
  }
}

@media screen and (max-width: 599px) {
  #resumeTheme207 .v-slide-group__prev.v-slide-group__prev--disabled {
    display: none !important;
  }
}
</style>