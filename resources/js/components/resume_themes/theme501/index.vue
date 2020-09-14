<template>
  <v-app>
    <v-card flat tile color="#623CEA" id="theme501">
      <!-- header start -->

      <v-row no-gutters class="mt-xl-12 mt-lg-12 mt-sm-6 mt-6">
        <!-- col 1 -->
        <v-col
          class="col-md-12 col-lg-6 col-sm-12"
          cols="12"
          :class="{ 'active-indicator': currentTab === 'profile' }"
        >
          <!-- <v-row no-gutters class="justify-start pink" align="center">

           


            <v-col
              class="col-md-3 ml-sm-6 pl-3 pl-lg-0 pl-sm-1 pl-xl-0 red"
              align-xl="center"
              sm="3"
              lg="3"
              xl="2"
              cols="4"
              align-lg="center"
              align-sm="start"
              align-content="end"
            >
              <v-img
                :src="currentUser.personal_info.profile_pic"
                style="border: 3px solid white; border-radius: 50%;"
                class="profile"
                cover
              ></v-img>
            </v-col>

            
            <v-col
              cols="6"
              class="col-md-6 col-sm-6 pt-lg-12 pt-sm-6 pt-4 pl-xl-12 ml-xl-4 ml-lg-6 pl-6 blue"
            >
              <div
                class="head font-weight-bold text-left mb-2"
                style="color: whitesmoke;"
              >
                {{ currentUser.personal_info.full_name }}
              </div>
              <div class="subhead text-left mb-4 white--text">
                {{ currentUser.personal_info.designation }}
              </div>

              <div class="mt-sm-8">
                <v-btn
                  fab
                  outlined
                  dark
                  x-small
                  v-for="Userlink in currentUser.links"
                  :key="Userlink.id + '_link'"
                  v-show="Userlink.is_active && Userlink.is_public"
                  :href="Userlink.link"
                  target="_blank"
                  :height="iconSize"
                  :width="iconSize"
                  color="rgba(4, 199, 155,0.5)"
                  class="mr-2 mt-1"
                >
                  <v-icon dark color="white"
                    >mdi-{{ Userlink.link_title.toLowerCase() }}</v-icon
                  >
                </v-btn>
              </div>
            </v-col>

            
            <v-col class="hidden-lg-and-up pl-4 pl-sm-10 green" cols="2">
              <img style="transform: translateY(7px)"
                alt="phone call" src="/images/resume_themes/theme501/phonecall.png" >
              
              <img alt="phone call" src="/images/resume_themes/theme501/videocall.png" >
            </v-col>

            
          </v-row> -->

          <!-- refactor -->
          <div
            class="d-flex align-center justify-space-between ct-info-container"
          >
            <!-- profile image -->
            <div class="d-flex">
              <div class="text-center mr-4">
                <v-img
                  :src="currentUser.personal_info.profile_pic"
                  style="border: 3px solid white; border-radius: 50%"
                  class="profile profile_img"
                  cover
                ></v-img>
                <v-btn
                  color="#04C79B"
                  @click="message = true"
                  dark
                  rounded
                  small
                  class="ct-transform hidden-sm-and-down"
                >
                  <span class="pl-4 pr-4">TAP TO CHAT</span>
                </v-btn>
              </div>

              <div class="ct-infotext">
                <div
                  class="head font-weight-bold text-left mb-2 user_name"
                  style="color: whitesmoke"
                >
                  {{ currentUser.personal_info.full_name }}
                </div>
                <div
                  class="subhead text-left mb-4 white--text user_designation"
                >
                  {{ currentUser.personal_info.designation }}
                </div>

                <!-- profile info -->
                <div class="mt-sm-8">
                  <v-btn
                    fab
                    outlined
                    dark
                    x-small
                    v-for="Userlink in currentUser.links"
                    :key="Userlink.id + '_link'"
                    v-show="Userlink.is_active && Userlink.is_public"
                    :href="Userlink.link"
                    target="_blank"
                    :height="iconSize"
                    :width="iconSize"
                    color="rgba(4, 199, 155,0.5)"
                    class="mr-2 mt-1"
                  >
                    <v-icon dark color="white"
                      >mdi-{{ Userlink.link_title.toLowerCase() }}</v-icon
                    >
                  </v-btn>
                </div>
              </div>
            </div>

            <!-- profile contact -->
            <div class="hidden-lg-and-up">
              <img
                style="transform: translateY(7px); cursor: pointer"
                class="phone_call"
                @click="audioModal = true"
                alt="phone call"
                src="/images/resume_themes/theme501/phonecall.png"
              />

              <img
                @click="videoModal = true"
                style="cursor: pointer"
                alt="phone call"
                src="/images/resume_themes/theme501/videocall.png"
              />
            </div>
          </div>

          <!-- <v-col
            class="col-md-12 col-sm-12 mt-sm-n12 mx-auto hidden-xs-only pl-sm-9"
          >
            <v-btn color="#04C79B" dark rounded small>
              <span class="pl-4 pr-4">TAP TO CHAT</span>
            </v-btn>
          </v-col> -->
        </v-col>

        <!-- col 2 -->
        <v-col
          class="col-lg-6 col-md-12 col-sm-12 mt-sm-12 my-6 my-xl-0 my-lg-0 my-sm-0 mt-lg-0 mt-xl-0"
        >
          <v-row
            no-gutters
            justify-lg="end"
            justify-sm="center"
            justify="center"
          >
            <v-col
              class="col-md-6 text-right mb-md-8 hidden-md-and-down"
              lg="12"
            >
              <div
                class="subtitle-2 text-right mt-2 mr-4 d-inline-block"
                style="color: whitesmoke"
              >
                Your Interviews :
              </div>
              <v-btn
                class="ma-2"
                outlined
                color="white"
                @click="audioModal = true"
              >
                <v-img src="/images/resume_themes/theme501/audio.png"></v-img>
                <div class="ml-2 subtitle-1">Upload Audio</div>
              </v-btn>
              <v-btn
                class="ma-2"
                outlined
                color="white"
                @click="videoModal = true"
              >
                <v-img src="/images/resume_themes/theme501/video.png"></v-img>
                <div class="ml-2 subtitle-1">Upload Video</div>
              </v-btn>
            </v-col>

            <v-col
              class="col-md-8 col-sm-11 mr-md-4"
              lg="10"
              cols="11"
              :class="{ 'active-indicator': currentTab === 'pay-availability' }"
            >
              <!-- fix start -- -->

              <v-row class="info-pad" dense justify="center">
                <v-col cols="12" sm="4" lg="4">
                  <div class="info-title text-center">
                    <div
                      v-for="(payment_Info, index) in currentUser.payment_info"
                      :key="index"
                      v-show="payment_Info.is_public"
                    >
                      <span
                        class="info-title text-center"
                        v-if="paymentInfo == index"
                      >
                        {{ payment_Info.salary }}$
                      </span>
                    </div>
                  </div>

                  <div class="info-subtitle text-center" style="opacity: 0.82">
                    <v-icon
                      :dark="lightMobile"
                      x-small
                      @click="paymentInfoPrev()"
                      right
                      >navigate_before</v-icon
                    >
                    <div
                      v-for="(payment_Info, index) in currentUser.payment_info"
                      :key="index"
                      v-show="payment_Info.is_public"
                      class="d-inline-block"
                    >
                      <span
                        class="info-subtitle text-center text-capitalize"
                        v-if="paymentInfo == index"
                      >
                        {{ payment_Info.salary_frequency }} Rate
                      </span>
                    </div>
                    <v-icon
                      :dark="lightMobile"
                      x-small
                      left
                      @click="paymentInfoNext()"
                      >navigate_next</v-icon
                    >
                  </div>
                </v-col>

                <v-col cols="12" sm="4" lg="4">
                  <div class="info-title text-center">
                    <div
                      v-for="(availability_info,
                      index) in currentUser.availability_info"
                      :key="index"
                      v-show="availability_info.is_public"
                    >
                      <span
                        class="info-title text-center"
                        v-if="available == index"
                      >
                        {{ availability_info.available_hours }} hours
                      </span>
                    </div>
                  </div>
                  <div class="info-subtitle text-center" style="opacity: 0.82">
                    <v-icon :dark="lightMobile" x-small @click="availablePrev()"
                      >navigate_before</v-icon
                    >
                    <div
                      v-for="(availability_info,
                      index) in currentUser.availability_info"
                      :key="index"
                      v-show="availability_info.is_public"
                      class="d-inline-block"
                    >
                      <span
                        class="info-subtitle text-center text-capitalize"
                        v-if="available == index"
                      >
                        {{ availability_info.available_hours_frequency }}
                        Availability
                      </span>
                    </div>
                    <v-icon :dark="lightMobile" x-small @click="availableNext()"
                      >navigate_next</v-icon
                    >
                  </div>
                </v-col>

                <v-col
                  cols="12"
                  sm="3"
                  class="text-center"
                  lg="4"
                  align-self="center"
                >
                  <v-btn
                    dark
                    color="#03CA9F"
                    @click="hireMeModal = true"
                    elevation="0"
                    class="buttonsize"
                  >
                    <div class="d-flex align-center px-2">
                      <span
                        class="subhead text-capitalize"
                        style="font-size: 1rem"
                        >Hire Me</span
                      >
                      <img
                        class="ml-2 message_img"
                        src="/images/resume_themes/theme501/message.png"
                        alt="hire me"
                      />
                    </div>
                  </v-btn>
                </v-col>
              </v-row>

              <!-- fix end -- -->
            </v-col>
          </v-row>
        </v-col>
      </v-row>

      <!-- header end -->
      <v-row class="hidden-sm-and-up">
        <v-tabs-items v-model="tabModel">
          <v-tab-item
            value="tab-3"
            :class="{ 'active-indicator': currentTab === 'skills' }"
          >
            <v-row class="justify-center text-center" no-gutters>
              <v-tabs
                v-model="skillTab"
                slider-color="white"
                show-arrows
                background-color="#03CA9F"
                class="tabmob"
              >
                <v-tab
                  v-show="
                    currentUser.skills.find(
                      (s) => s.category == 'programming_languages'
                    )
                  "
                >
                  <div class="subhead">Programming languages</div>
                </v-tab>
                <v-tab
                  v-show="
                    currentUser.skills.find((s) => s.category == 'frameworks')
                  "
                >
                  <div class="subhead">Frameworks/ Databases</div>
                </v-tab>
                <v-tab
                  v-show="
                    currentUser.skills.find((s) => s.category == 'software')
                  "
                >
                  <div class="subhead">Softwares</div>
                </v-tab>
                <v-tab
                  v-show="
                    currentUser.skills.find((s) => s.category == 'design')
                  "
                >
                  <div class="subhead">Design</div>
                </v-tab>
              </v-tabs>
            </v-row>
          </v-tab-item>
        </v-tabs-items>
      </v-row>
      <v-row no-gutters justify="center" class="mt-sm-8">
        <v-col md="12" sm="12" cols="12" class="hidden-xs-only">
          <v-tabs
            v-model="tabModel"
            background-color="rgb(255, 255, 255,0.0)"
            grow
            dark
            text
            hide-slider
          >
            <v-tab
              v-for="(tab, tabIndex) in tabs"
              :key="tabIndex"
              @click="activeTab = tab.value"
              :href="`#tab-${tabIndex}`"
              :class="[{ 'active-indicator': currentTab === tab.value }]"
              class="tablet"
            >
              <!-- <v-icon left>{{ tab.icon }}</v-icon> -->
              <v-img
                v-if="activeTab != tab.value"
                width="20"
                max-width="20"
                class="mx-2"
                :src="`/images/resume_themes/theme501/${tab.value}_white.svg`"
              ></v-img>
              <v-img
                v-else
                width="20"
                max-width="20"
                class="mx-2"
                :src="`/images/resume_themes/theme501/${tab.value}_green.svg`"
              ></v-img>
              <div class="title text-capitalize">{{ tab.name }}</div>
            </v-tab>
          </v-tabs>
        </v-col>
        <v-col cols="12" class="hidden-sm-and-up" align="center">
          <v-card flat tile>
            <v-tabs
              background-color="transparent"
              height="100"
              v-model="tabModel"
              hide-slider
              center-active
            >
              <v-tab
                class="text-center"
                v-for="(tab, tabIndex) in tabs"
                :key="tabIndex"
                :href="`#tab-${tabIndex}`"
                @click="activeTab = tab.value"
                :class="[{ 'active-indicator': currentTab === tab.value }]"
              >
                <!-- <div
                  @click="currentTab = tab.id"
                  class="mt-2 body-2 d-block black--text text-capitalize font-weight-medium"
                >{{ tab.name }}</div>-->
                <v-btn
                  fab
                  class="text-center d-block"
                  @click="activeTab = tab.value"
                  :color="activeTab == tab.value ? '#623CEA' : '#AE97FF'"
                  :class="[
                    activeTab == tab.value ? 'tab-mobile-btn-active' : '',
                  ]"
                  dark
                  depressed
                  small
                >
                  <!-- <v-icon class="sicon">{{ tab.icon }}</v-icon> -->
                  <v-img
                    v-if="activeTab != tab.value"
                    width="18"
                    max-width="18"
                    class="mx-2"
                    :src="`/images/resume_themes/theme501/${tab.value}_white.svg`"
                  ></v-img>
                  <v-img
                    v-else
                    width="26"
                    max-width="26"
                    class="mx-2"
                    :src="`/images/resume_themes/theme501/${tab.value}_white.svg`"
                  ></v-img>
                </v-btn>
              </v-tab>
            </v-tabs>
          </v-card>
        </v-col>
        <v-col cols="12" align="center" class="hidden-sm-and-up">
          <v-card flat tile>
            <v-btn
              fab
              text
              x-small
              v-for="(dot, dotIndex) in tabs"
              :key="dotIndex"
              @click="activeTab = dot.value"
            >
              <span
                class="mt-2"
                :class="[
                  activeTab === dot.value ? 'tab-dot-active' : 'tab-dot',
                ]"
              ></span>
            </v-btn>
          </v-card>
        </v-col>
      </v-row>
    </v-card>

    <v-tabs-items v-model="tabModel">
      <v-tab-item value="tab-0">
        <v-row
          class="justify-center mt-xl-6 mt-lg-12 mt-sm-4 mx-lg-12"
          no-gutters
        >
          <v-col
            class="col-md-4 col-sm-12 px-sm-12 py-sm-3 px-lg-8 my-3"
            cols="11"
            v-for="project in currentUser.projects"
            :key="project.id + '_project'"
            v-show="project.is_public"
          >
            <v-card elevation="8" class="mx-lg-4">
              <div style="padding: 10px 10px">
                <v-img
                  :aspect-ratio="0.96"
                  cover
                  :src="getProjectMainImage(project)"
                  style="
                    border-radius: 10px;
                    box-shadow: 0px 10px 23px rgba(0, 0, 0, 0.161);
                  "
                ></v-img>
              </div>
              <v-row class="justify-between">
                <v-col cols="9">
                  <v-card-title> {{ project.name }} </v-card-title>
                  <v-card-subtitle>{{ project.skills }}</v-card-subtitle>
                </v-col>
                <v-col cols="3" justify="end" align="end">
                  <v-btn target="_blank" text :href="project.link">
                    <v-icon color="#623CEA" large class="mt-6 mr-2"
                      >open_in_new</v-icon
                    >
                  </v-btn>
                </v-col>
              </v-row>
            </v-card>
          </v-col>
        </v-row>
      </v-tab-item>
      <v-tab-item value="tab-1">
        <v-container class="mt-md-6">
          <v-row no-gutters>
            <v-col
              cols="12"
              md="6"
              v-for="(work, workIndex) in currentUser.work_experience"
              :key="work.id"
              v-show="work.is_public"
            >
              <v-timeline align-top dense class="large_dot">
                <v-timeline-item
                  fill-dot
                  :color="Randomcolors[workIndex].color"
                  :icon="RandomIcon[workIndex].icon"
                >
                  <p class="title mt-1">{{ work.job_title }}</p>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div class="subtitle-2">{{ work.company_name }}</div>
                  <div class="subtitle-2">
                    {{ work.date_from }} - {{ work.date_to }}
                  </div>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div class="subtitle-2">
                    {{ work.description }}
                  </div>
                </v-timeline-item>
              </v-timeline>
            </v-col>
          </v-row>
        </v-container>
      </v-tab-item>
      <v-tab-item value="tab-2">
        <v-container class="mt-md-6">
          <v-row no-gutters>
            <v-col
              cols="12"
              md="6"
              v-for="(education, eduIndex) in currentUser.education"
              :key="education.id"
              v-show="education.is_public"
            >
              <v-timeline align-top dense class="large_dot">
                <v-timeline-item
                  fill-dot
                  :color="Randomcolors[eduIndex].color"
                  :icon="RandomIcon[eduIndex].icon"
                >
                  <p class="title mt-1">{{ education.university_name }}</p>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div class="subtitle-2">{{ education.institution_type }}</div>
                  <div class="subtitle-2">
                    {{ education.date_from }} - {{ education.date_to }}
                  </div>
                </v-timeline-item>
                <v-timeline-item right hide-dot>
                  <div class="subtitle-2">
                    {{ education.degree_title }}
                  </div>
                </v-timeline-item>
              </v-timeline>
            </v-col>
          </v-row>
        </v-container>
      </v-tab-item>
      <v-tab-item value="tab-3">
        <v-row class="justify-center mt-12 hidden-xs-only">
          <v-col
            class="col-md-7 col-sm-11 elevation-6 py-6"
            style="
              height: auto;
              border-bottom-left-radius: 5px;
              border-bottom-right-radius: 5px;
            "
          >
            <v-row class="justify-center text-center" no-gutters>
              <v-col
                md="3"
                sm="3"
                cols="3"
                v-on:click="skillTab = 0"
                class="tabs"
                v-bind:class="[skillTab === 0 ? 'active' : '']"
                v-show="
                  currentUser.skills.find(
                    (s) => s.category == 'programming_languages'
                  )
                "
              >
                <a class="tabtitle"> Programming languages </a>
              </v-col>
              <v-col
                md="3"
                sm="3"
                cols="3"
                v-on:click="skillTab = 1"
                class="tabs"
                v-show="
                  currentUser.skills.find((s) => s.category == 'frameworks')
                "
                v-bind:class="[skillTab === 1 ? 'active' : '']"
              >
                <a class="tabtitle"> Frameworks/ Databases </a>
              </v-col>
              <v-col
                md="3"
                sm="3"
                cols="3"
                v-on:click="skillTab = 2"
                class="tabs"
                v-show="
                  currentUser.skills.find((s) => s.category == 'software')
                "
                v-bind:class="[skillTab === 2 ? 'active' : '']"
              >
                <a class="tabtitle">Software</a>
              </v-col>
              <v-col
                md="3"
                sm="3"
                cols="3"
                v-on:click="skillTab = 3"
                class="tabs"
                v-show="currentUser.skills.find((s) => s.category == 'design')"
                v-bind:class="[skillTab === 3 ? 'active' : '']"
              >
                <a class="tabtitle"> Design Skills </a>
              </v-col>
            </v-row>
          </v-col>
        </v-row>
        <v-container>
          <v-row class="justify-center">
            <v-col sm="12" xl="10" lg="12" cols="12">
              <v-row v-if="skillTab === 0" class="justify-center">
                <v-col>
                  <div class="title text-left font-weight-bold">
                    Programming languages
                  </div>
                </v-col>

                <v-col class="col-md-12 col-sm-12" lg="12" cols="12">
                  <v-row
                    justify="space-around"
                    justify-lg="space-around"
                    justify-sm="space-around"
                    align="start"
                    dense
                  >
                    <v-col
                      class="col-md-3 col-sm-6"
                      cols="5"
                      v-for="(s, index) in currentUser.skills"
                      :key="index"
                      v-show="s.category == 'programming_languages'"
                    >
                      <v-row
                        dense
                        class="justify-start backlayer mx-xl-4 mx-lg-2 mx-sm-4"
                      >
                        <v-col cols="3" sm="3" md="3">
                          <v-img
                            src="https://i.ibb.co/G3zQ7md/Adobe-Illustrator-CC-icon.png"
                          ></v-img>
                        </v-col>
                        <v-col
                          cols="7"
                          sm="7"
                          md="7"
                          class="mb-2"
                          align-self="end"
                        >
                          <div class="mini text-left pb-2">{{ s.title }}</div>
                          <v-progress-linear
                            :color="Randomcolors[index].color"
                            :value="s.percentage"
                            height="10"
                            background-color="#C5C5C5"
                          ></v-progress-linear>
                        </v-col>
                        <v-col
                          cols="1"
                          sm="2"
                          md="2"
                          class="mb-1"
                          align-self="end"
                        >
                          <span class="text-left subhead"
                            >{{ s.percentage }}%</span
                          >
                        </v-col>
                      </v-row>
                    </v-col>
                  </v-row>
                </v-col>
              </v-row>
              <v-row v-if="skillTab === 1" class="justify-center">
                <v-col>
                  <div class="title text-left font-weight-bold">
                    Frameworks/ Databases
                  </div>
                </v-col>

                <v-col class="col-md-12 col-sm-12" lg="12" cols="12">
                  <v-row
                    justify="space-around"
                    justify-lg="space-around"
                    justify-sm="space-around"
                    align="start"
                    dense
                  >
                    <v-col
                      class="col-md-3 col-sm-6"
                      cols="5"
                      v-for="(s, index) in currentUser.skills"
                      :key="index"
                      v-show="s.category == 'frameworks'"
                    >
                      <v-row
                        dense
                        class="justify-start backlayer mx-xl-4 mx-lg-2 mx-sm-4"
                      >
                        <v-col cols="3" sm="3" md="3">
                          <v-img
                            src="/images/resume_themes/theme501/js.png"
                          ></v-img>
                        </v-col>
                        <v-col
                          cols="7"
                          sm="7"
                          md="7"
                          class="mb-2"
                          align-self="end"
                        >
                          <div class="mini text-left pb-2">{{ s.title }}</div>
                          <v-progress-linear
                            :color="Randomcolors[index].color"
                            :value="s.percentage"
                            height="10"
                            background-color="#C5C5C5"
                          ></v-progress-linear>
                        </v-col>
                        <v-col
                          cols="1"
                          sm="2"
                          md="2"
                          class="mb-1"
                          align-self="end"
                        >
                          <span class="text-left subhead"
                            >{{ s.percentage }}%</span
                          >
                        </v-col>
                      </v-row>
                    </v-col>
                  </v-row>
                </v-col>
              </v-row>
              <v-row v-if="skillTab === 2" class="justify-center">
                <v-col>
                  <div class="title text-left font-weight-bold">Software</div>
                </v-col>

                <v-col class="col-md-12 col-sm-12" lg="12" cols="12">
                  <v-row
                    justify="space-around"
                    justify-lg="space-around"
                    justify-sm="space-around"
                    align="start"
                    dense
                  >
                    <v-col
                      class="col-md-3 col-sm-6"
                      cols="5"
                      v-for="(s, index) in currentUser.skills"
                      :key="index"
                      v-show="s.category == 'software'"
                    >
                      <v-row
                        dense
                        class="justify-start backlayer mx-xl-4 mx-lg-2 mx-sm-4"
                      >
                        <v-col cols="3" sm="3" md="3">
                          <v-img
                            src="/images/resume_themes/theme501/js.png"
                          ></v-img>
                        </v-col>
                        <v-col
                          cols="7"
                          sm="7"
                          md="7"
                          class="mb-2"
                          align-self="end"
                        >
                          <div class="mini text-left pb-2">{{ s.title }}</div>
                          <v-progress-linear
                            :color="Randomcolors[index].color"
                            :value="s.percentage"
                            height="10"
                            background-color="#C5C5C5"
                          ></v-progress-linear>
                        </v-col>
                        <v-col
                          cols="1"
                          sm="2"
                          md="2"
                          class="mb-1"
                          align-self="end"
                        >
                          <span class="text-left subhead"
                            >{{ s.percentage }}%</span
                          >
                        </v-col>
                      </v-row>
                    </v-col>
                  </v-row>
                </v-col>
              </v-row>

              <v-row v-if="skillTab === 3" class="justify-center">
                <v-col>
                  <div class="title text-left font-weight-bold">
                    Design Skills
                  </div>
                </v-col>

                <v-col class="col-md-12 col-sm-12" lg="12" cols="12">
                  <v-row
                    justify="space-around"
                    justify-lg="space-around"
                    justify-sm="space-around"
                    align="start"
                    dense
                  >
                    <v-col
                      class="col-md-3 col-sm-6"
                      cols="5"
                      v-for="(s, index) in currentUser.skills"
                      :key="index"
                      v-show="s.category == 'design'"
                    >
                      <v-row
                        dense
                        class="justify-start backlayer mx-xl-4 mx-lg-2 mx-sm-4"
                      >
                        <v-col cols="3" sm="3" md="3">
                          <v-img
                            src="/images/resume_themes/theme501/js.png"
                          ></v-img>
                        </v-col>
                        <v-col
                          cols="7"
                          sm="7"
                          md="7"
                          class="mb-2"
                          align-self="end"
                        >
                          <div class="mini text-left pb-2">{{ s.title }}</div>
                          <v-progress-linear
                            :color="Randomcolors[index].color"
                            :value="s.percentage"
                            height="10"
                            background-color="#C5C5C5"
                          ></v-progress-linear>
                        </v-col>
                        <v-col
                          cols="1"
                          sm="2"
                          md="2"
                          class="mb-1"
                          align-self="end"
                        >
                          <span class="text-left subhead"
                            >{{ s.percentage }}%</span
                          >
                        </v-col>
                      </v-row>
                    </v-col>
                  </v-row>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-container>
      </v-tab-item>

      <v-tab-item value="tab-4">
        <!-- <v-row
          justify="start"
          justify-sm="start"
          justify-lg="center"
          class="mt-xl-6 mt-lg-10 mx-sm-6 mx-6 mx-lg-2"
          no-gutters
        >
          <v-col cols="9" sm="11" class="hidden-md-and-up mt-12">
            <v-img
              :src="currentUser.personal_info.profile_pic"
              class="box-layer"
              contain
            ></v-img>
          </v-col>
          <v-col md="6" sm="12" cols="11" class="mt-12 mt-sm-10">
            <div class="mt-sm-10 mt-10 mt-lg-10">Hello, I'm</div>
            <div class="display-2 mt-md-6 mt-sm-6">
              {{ currentUser.personal_info.full_name }}
            </div>
            <div class="display-2 mt-md-2 mt-sm-2">
              a
              <span style="color: #623cea;">{{
                currentUser.personal_info.designation
              }}</span>
            </div>
            <div class="display-2 mt-md-12 mt-sm-8">About Me.</div>
            <v-row dense class="mt-md-12 mt-sm-8">
              <v-col cols="1">
                <div class="line"></div>
              </v-col>
              <v-col cols="11" sm="12" lg="9">
                <div class="title" style="color: #656565;">
                  {{ currentUser.personal_info.about }}
                </div>
                <div class="mt-md-8 mt-sm-8 mt-6">
                  <v-btn
                    v-for="Userlink in currentUser.links"
                    :key="Userlink.id + '_link'"
                    v-show="Userlink.is_active && Userlink.is_public"
                    :href="Userlink.link"
                    target="_blank"
                    dark
                    class="px-0 mr-1"
                    min-width="30"
                    height="30"
                    color="#414143"
                  >
                    <v-icon dark small color="white"
                      >mdi-{{ Userlink.link_title.toLowerCase() }}</v-icon
                    >
                  </v-btn>
                </div>
              </v-col>
            </v-row>
          </v-col>
          <v-col md="2" sm="4" class="hidden-sm-and-down mt-12">
            <v-img
              :src="currentUser.personal_info.profile_pic"
              class="box-layer"
              contain
            ></v-img>
          </v-col>
        </v-row> -->

        <!-- about me refactor -->
        <div class="about_container">
          <!-- short info -->
          <div class="short-info">
            <div
              v-if="currentUser.personal_info.date_of_birth"
              class="short-info-item mb-4"
            >
              <div class="short-info-title">Date of Birth</div>
              <div class="short-info-value">
                {{ currentUser.personal_info.date_of_birth }}
              </div>
            </div>
            <div
              v-if="currentUser.personal_info.nationality"
              class="short-info-item mb-4"
            >
              <div class="short-info-title">Nationality</div>
              <div class="short-info-value">
                {{ currentUser.personal_info.nationality }}
              </div>
            </div>
            <div
              v-if="currentUser.personal_info.hometown"
              class="short-info-item mb-4"
            >
              <div class="short-info-title">Hometown</div>
              <div class="short-info-value">
                {{ currentUser.personal_info.hometown }}
              </div>
            </div>
            <div v-if="currentUser.languages[0]" class="short-info-item mb-4">
              <div class="short-info-title">Languages</div>
              <div
                class="short-info-value"
                v-for="(language, i) in currentUser.languages"
                :key="i"
              >
                {{ language }}
              </div>
            </div>
          </div>

          <!-- summary info -->
          <div class="summary-info">
            <div
              v-if="currentUser.personal_info.overview"
              class="summary-info-item mb-6"
            >
              <div class="summary_title">Overview Sumary</div>
              <div
                class="mt-4 mb-2"
                style="height: 4px; width: 4rem; background-color: #69c03e"
              ></div>
              <div class="summary_value">
                {{ currentUser.personal_info.overview }}
              </div>
            </div>
            <div
              v-if="currentUser.personal_info.about"
              class="summary-info-item mb-6"
            >
              <div class="summary_title">About Me</div>
              <div
                class="mt-4 mb-2"
                style="height: 4px; width: 4rem; background-color: #69c03e"
              ></div>
              <div class="summary_value">
                {{ currentUser.personal_info.about }}
              </div>
            </div>
            <div
              v-if="currentUser.personal_info.quote"
              class="summary-info-item mb-6"
            >
              <div class="summary_title">Quote</div>
              <div
                class="mt-4 mb-2"
                style="height: 4px; width: 4rem; background-color: #69c03e"
              ></div>
              <div class="summary_value">
                {{ currentUser.personal_info.quote }}
              </div>
            </div>
            <div
              v-if="currentUser.personal_info.location"
              class="summary-info-item mb-6"
            >
              <div class="summary_title">About Me</div>
              <div
                class="mt-4 mb-2"
                style="height: 4px; width: 4rem; background-color: #69c03e"
              ></div>
              <div class="summary_value">
                {{ currentUser.personal_info.location }}
              </div>
            </div>
          </div>

          <v-img
            src="/images/resume_themes/theme501/green.png"
            class="box-layer about_image"
            style="background-color: #2fd5b4"
          ></v-img>
        </div>
      </v-tab-item>

      <v-tab-item value="tab-5">
        <v-row
          justify="start"
          justify-sm="start"
          justify-lg="center"
          class="mt-xl-6 mt-lg-10 mx-sm-6 mx-3 mx-lg-2"
          no-gutters
        >
          <v-col
            md="8"
            sm="12"
            cols="12"
            class="mt-12 mt-sm-10 scrollbar"
            id="style-1"
          >
            <v-row
              no-gutters
              justify="start"
              class="mb-8 flex-md-row-reverse"
              v-for="(achievement, i) in currentUser.achievements"
              :key="i"
              v-show="achievement.is_public"
            >
              <v-col cols="2" md="1" class="mt-3 ml-sm-5 flex-md-row-reverse">
                <v-img
                  src="/images/resume_themes/theme501/achievement_green.svg"
                  contain
                  class="mx-auto"
                  :width="rowIconSize"
                ></v-img>
              </v-col>
              <v-col cols="10" sm="7">
                <div class="newTitle">{{ achievement.title }}</div>
                <div class="newSubtitle">
                  {{ achievement.description }}
                </div>
              </v-col>
            </v-row>
          </v-col>
          <v-col md="2" sm="4" class="hidden-sm-and-down mt-12">
            <img
              src="/images/resume_themes/theme501/achievement_white.svg"
              class="box-layer"
              style="background-color: #2fd5b4; width: 453px; padding: 100px"
            />
          </v-col>
        </v-row>
      </v-tab-item>
      <v-tab-item value="tab-6">
        <v-row
          justify="start"
          justify-sm="start"
          justify-lg="center"
          class="mt-xl-6 mt-lg-10 mx-sm-6 mx-6 mx-lg-2 fill-height"
          no-gutters
        >
          <v-col
            md="8"
            sm="12"
            cols="11"
            class="mt-12 mt-sm-10"
            id="style-1"
            align-self="center"
          >
            <v-row no-gutters>
              <v-col
                cols="12"
                sm="6"
                md="5"
                v-for="(hobby, i) in currentUser.hobbies"
                :key="i"
                v-show="hobby.is_public"
                class="mb-12"
              >
                <v-row no-gutters>
                  <v-col
                    cols="2"
                    align="center"
                    align-self="center"
                    class="mr-4"
                  >
                    <v-img
                      :src="`/images/resume_themes/theme501/${hobby.title}.svg`"
                      max-width="60"
                      class="ma-auto"
                    ></v-img
                  ></v-col>
                  <v-col cols="9"
                    ><div class="hobbyTitle">{{ hobby.title }}</div></v-col
                  >
                </v-row>
              </v-col>
            </v-row>
          </v-col>
          <v-col md="2" sm="4" class="hidden-sm-and-down mt-12">
            <img
              src="/images/resume_themes/theme501/hobbies_white.svg"
              class="box-layer"
              style="background-color: #2fd5b4; width: 453px; padding: 100px"
            />
          </v-col>
        </v-row>
      </v-tab-item>
      <v-tab-item value="tab-7">
        <v-row
          justify="start"
          justify-sm="start"
          justify-lg="center"
          class="mt-xl-6 mt-lg-10 mx-sm-6 mx-6 mx-lg-2"
          no-gutters
        >
          <v-col
            md="8"
            sm="12"
            cols="12"
            class="mt-12 mt-sm-10 scrollbar"
            id="style-1"
          >
            <v-row
              no-gutters
              justify="start"
              class="mb-8 flex-md-row-reverse"
              v-for="(reference, i) in currentUser.references"
              :key="i"
              v-show="reference.is_public"
            >
              <v-col cols="2" md="1" class="mt-3 ml-sm-3 flex-md-row-reverse">
                <v-img
                  src="/images/resume_themes/theme501/references_green.svg"
                  contain
                  class="mx-auto"
                  :width="rowIconSize"
                ></v-img>
              </v-col>
              <v-col cols="10" sm="7">
                <v-row no-gutters class="flex-md-row-reverse">
                  <v-col cols="8">
                    <div class="newTitle">
                      {{ reference.title }}
                    </div></v-col
                  >
                  <v-col cols="4">
                    <div
                      class="subtitle-2 grey--text text--darken-1 text-right mt-2"
                    >
                      {{ reference.created_at }}
                    </div></v-col
                  >
                  <v-col cols="12">
                    <div class="subtitle-2 grey--text text--darken-1 text-left">
                      {{ reference.email }}
                    </div></v-col
                  >
                  <v-col cols="12">
                    <div class="subtitle-2 grey--text text--darken-1 text-left">
                      {{ reference.phone }}
                    </div></v-col
                  >
                  <v-col cols="12">
                    <div class="newSubtitle">
                      {{ reference.reference_text }}
                    </div></v-col
                  >
                </v-row>
              </v-col>
            </v-row>
          </v-col>
          <v-col md="2" sm="4" class="hidden-sm-and-down mt-12">
            <img
              src="/images/resume_themes/theme501/references_white.svg"
              class="box-layer"
              style="background-color: #2fd5b4; width: 453px; padding: 100px"
            />
          </v-col>
        </v-row>
      </v-tab-item>
    </v-tabs-items>

    <!-- dialogs -->

    <!-- send message dialog -->
    <v-dialog v-model="message">
      <div>
        <div class="message_container"></div>

        <div class="white">
          <div class="msg_header px-5 d-flex justify-space-between">
            <div class="pa-2 px-12 white message_head">Message</div>
            <div>
              <img
                @click="message = false"
                style="height: 3.25rem; width: auto; cursor: pointer"
                class="white pa-4 close_style"
                src="/images/resume_themes/theme501/close.png"
                alt="close"
              />
            </div>
          </div>

          <div class="msg_body white">
            <input
              type="text"
              placeholder="Name"
              class="msg_input input_name"
            />
            <input
              type="text"
              placeholder="Email"
              class="msg_input input_email"
            />
            <textarea
              type="text"
              placeholder="Message"
              class="msg_input input_textarea pt-3"
            ></textarea>

            <div class="btn_container text-center">
              <button class="btn_send text-capitalize" flat depressed>
                Send
              </button>
            </div>
          </div>
        </div>
      </div>
    </v-dialog>
    <!-- audio dialog start-->

    <!-- send message dialog -->
    <v-dialog v-model="audioModal">
      <div>
        <div class="message_container"></div>

        <div class="white">
          <div class="msg_header px-5 d-flex justify-space-between">
            <div class="pa-2 px-12 white message_head">My Audio</div>
            <div>
              <img
                @click="audioModal = false"
                style="height: 3.25rem; width: auto; cursor: pointer"
                class="white pa-4 close_style"
                src="/images/resume_themes/theme501/close.png"
                alt="close"
              />
            </div>
          </div>

          <div class="audio_body white pb-4">
            <audio-player
              :modalOpen="audioModal"
              color="#FC5C8A"
              v-for="i in 3"
              :key="i"
              :audio_num="i"
              file="https://file-examples-com.github.io/uploads/2017/11/file_example_MP3_700KB.mp3"
            ></audio-player>

            <div
              class="paginate d-flex justify-center align-center mb-5"
              style="opacity: 0.2"
            >
              <img
                style="height: 1rem; width: auto"
                src="/images/resume_themes/theme501/arr-left.png"
                alt="left"
              />

              <div class="mx-2" style="color: #623cea; font-size: 24px">
                1/5
              </div>

              <img
                style="height: 1rem; width: auto"
                src="/images/resume_themes/theme501/arr-right.png"
                alt="left"
              />
            </div>
          </div>
        </div>
      </div>
    </v-dialog>

    <!-- audio dialog end -->

    <!-- video modal start -->
    <v-dialog v-model="videoModal" max-width="1690" max-height="740" persistent>
      <div>
        <div class="message_container"></div>

        <div class="white">
          <div class="msg_header px-5 d-flex justify-space-between">
            <div class="pa-2 px-12 white message_head">MyVideo</div>
            <div>
              <img
                @click="videoModal = false"
                style="height: 3.25rem; width: auto; cursor: pointer"
                class="white pa-4 close_style"
                src="/images/resume_themes/theme501/close.png"
                alt="close"
              />
            </div>
          </div>

          <div class="audio_body white pb-4">
            <div class="video-container">
              <video-player
                v-for="i in 3"
                :video_num="i"
                :key="i"
                :modalOpen="videoModal"
                link="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4"
              ></video-player>
            </div>

            <div
              class="paginate d-flex justify-center align-center mb-5"
              style="opacity: 0.2"
            >
              <img
                style="height: 1rem; width: auto"
                src="/images/resume_themes/theme501/arr-left.png"
                alt="left"
              />

              <div class="mx-2" style="color: #623cea; font-size: 24px">
                1/5
              </div>

              <img
                style="height: 1rem; width: auto"
                src="/images/resume_themes/theme501/arr-right.png"
                alt="left"
              />
            </div>
          </div>
        </div>
      </div>
    </v-dialog>
    <!-- Video modal end -->

    <!-- hire modal start -->

    <hire-modal
      :hireMeModal.sync="hireMeModal"
      :widowWidth="windowWidth"
    ></hire-modal>

    <!-- hire modal end -->
  </v-app>
</template>

<style lang="scss" scoped>
@import "https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css";
@import "https://fonts.googleapis.com/css?family=Material+Icons";
@import "resources/sass/themes/theme501.scss";
#resumeTheme501
  .v-slide-group__prev
  .v-slide-group__prev
  .v-slide-group__prev--disabled {
  display: none;
}
.v-tabs-bar.v-slide-group--is-overflowing.v-tabs-bar--is-mobile:not(.v-tabs-bar--show-arrows):not(.v-slide-group--has-affixes)
  .v-slide-group__prev {
  display: none !important;
  visibility: hidden;
}
.v-tabs-bar.v-slide-group--is-overflowing.v-tabs-bar--is-mobile:not(.v-tabs-bar--show-arrows):not(.v-slide-group--has-affixes)
  .v-slide-group__prev {
  display: none !important;
  visibility: hidden;
}

#resumeTheme501 .v-slide-group__next {
  display: none;
}
</style>
   
<script>
import AudioPlayer from "./media/AudioPlayer";
import VideoPlayer from "./media/VideoPlayer";
import HireModal from "./payment/HireModal";

export default {
  props: ["user", "is_preview", "currentTab"],
  components: {
    AudioPlayer,
    VideoPlayer,
    HireModal,
  },
  data() {
    return {
      available: 0,
      paymentInfo: 0,
      currentUser: this.user,
      skillTab: 0,
      activeTab: "portfolio",
      tabModel: null,
      message: false,
      audioModal: false,
      videoModal: false,
      windowWidth: window.innerWidth,
      hireMeModal: false,
      text: [
        "",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
        "asdasdasdasd",
      ],
      tabs: [
        {
          name: "Portfolio",
          value: "portfolio",
          icon: "mdi-layers",
        },
        {
          name: "Work",
          value: "work-experience",
          icon: "mdi-briefcase",
        },
        {
          name: "Education",
          value: "education",
          icon: "mdi-school",
        },
        {
          name: "Skills",
          value: "skills",
          icon: "mdi-head-snowflake-outline",
        },
        {
          name: "About Me",
          value: "about",
          icon: "mdi-comment-edit",
        },
        {
          name: "Achievement",
          value: "achievement",
          icon: "mdi-trophy",
        },
        {
          name: "Hobbies",
          value: "hobbies",
          icon: "mdi-puzzle-outline",
        },
        {
          name: "References",
          value: "references",
          icon: "mdi-account-arrow-right-outline",
        },
      ],
      Randomcolors: [
        { color: "#217BFF" },
        { color: "#EE588A" },
        { color: "#DD24BC" },
        { color: "#F57C00" },
        { color: "#00897B" },
        { color: "#00ACC1" },
        { color: "#E64A19" },
        { color: "#217BFF" },
        { color: "#EE588A" },
        { color: "#DD24BC" },
        { color: "#F57C00" },
        { color: "#00897B" },
        { color: "#00ACC1" },
        { color: "#E64A19" },
        { color: "#217BFF" },
        { color: "#EE588A" },
        { color: "#DD24BC" },
        { color: "#F57C00" },
        { color: "#00897B" },
        { color: "#00ACC1" },
        { color: "#E64A19" },
      ],
      RandomIcon: [
        { icon: "mdi-package-variant" },
        { icon: "mdi-ruler-square-compass" },
        { icon: "mdi-package-variant" },
        { icon: "mdi-ruler-square-compass" },
        { icon: "mdi-package-variant" },
        { icon: "mdi-ruler-square-compass" },
        { icon: "mdi-package-variant" },
        { icon: "mdi-ruler-square-compass" },
        { icon: "mdi-package-variant" },
        { icon: "mdi-ruler-square-compass" },
        { icon: "mdi-package-variant" },
        { icon: "mdi-ruler-square-compass" },
      ],
      hobbies: [
        { title: "Football", value: "football" },
        { title: "Basketball", value: "basketball" },
        { title: "Video Games", value: "video_games" },
        { title: "Travel", value: "travel" },
      ],
      reference: {
        title: "Jhone doe",
        date: "20 april 2020",
        gmail: "Jhone@gmail.com",
        phone: "+212082840542",
        description:
          "I have a great passion on designing and always love to create a new design. Thus now I am highly skilled, enthusiastic",
      },
      about_section: {
        short_info: [
          { title: "Date of Birth", value: ["01/14/90"] },
          { title: "Nationality", value: ["Ukrainian"] },
          { title: "Hometown", value: ["Kiev"] },
          { title: "Languages", value: ["English", "Arabic", "Franch"] },
        ],
        summary: [
          {
            title: "Overview Sumary",
            value:
              "В работе дизайнера есть много пространства для креатива, но это только на первый взгляд кажется, что такие специалисты полагаются исключительно на фантазию.",
          },
          {
            title: "About Me",
            value:
              "В работе дизайнера есть много пространства для креатива но это только на первый взгляд кажется, что такие специалисты полагаются исключительно на фантазию.",
          },
          { title: "Quote", value: "B создавать графический контент." },
          { title: "Location", value: "Ireland, Dublin" },
        ],
      },
    };
  },
  watch: {
    // if current tab changed, change the active tab as well.
    currentTab: function (val) {
      this.activeTab = val;
    },
  },
  computed: {
    iconSize() {
      switch (this.$vuetify.breakpoint.name) {
        case "xs":
          return "30px";
        case "sm":
          return "36px";
        case "md":
          return "36px";
        case "lg":
          return "32px";
        case "xl":
          return "32px";
      }
    },
    lightMobile() {
      switch (this.$vuetify.breakpoint.name) {
        case "xs":
          return false;
        case "sm":
          return false;
        case "md":
          return false;
        case "lg":
          return true;
        case "xl":
          return true;
      }
    },
    rowIconSize() {
      switch (this.$vuetify.breakpoint.name) {
        case "xs":
          return "34px";
        case "sm":
          return "40px";
        case "md":
          return "50px";
        case "lg":
          return "60px";
        case "xl":
          return "62px";
      }
    },
  },
  methods: {
    availableNext() {
      if (this.available == 2) {
        this.available = 0;
      } else this.available++;
    },
    availablePrev() {
      if (this.available == 0) {
        this.available = 2;
      } else this.available--;
    },
    paymentInfoNext() {
      if (this.paymentInfo == 2) {
        this.paymentInfo = 0;
      } else this.paymentInfo++;
    },
    paymentInfoPrev() {
      if (this.paymentInfo == 0) {
        this.paymentInfo = 2;
      } else this.paymentInfo--;
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
    setDummyUser() {
      this.currentUser = this.$store.state.dummyUser;
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
    this.$store.dispatch("updateThemeUser", this.currentUser);
  },
};
</script>

<style scoped>
.profile_img {
  max-width: 5rem;
}

.ct-transform {
  transform: translateY(-38px);
}

.ct-infotext {
  margin-top: 1.5rem;
}

.user_name {
  font-weight: 300;
}

/* about me section start */

.about_container {
  display: grid;
  grid-template-columns: 10% 60% 30%;
  grid-gap: 1rem;
  padding: 4rem 10rem;
  margin-bottom: 2rem;
}

.short-info-title {
  color: #623cea;
}

.short-info-value {
  color: #373737;
  font-size: 1.2rem;
}

.summary_title {
  color: #623cea;
}

.summary_value {
  color: #656565;
  font-size: 0.9rem;
}

.about_imag {
  max-height: 5rem !important;
  width: auto !important;
}

@media only screen and (max-width: 1222) {
  .about-container {
    padding: 4rem 7rem;
  }
}

@media only screen and (max-width: 1110px) {
  .about_container {
    grid-template-columns: 1fr 1fr;
    grid-column-gap: 15%;
  }

  .short-info {
    grid-column: 2 / 3;
    grid-row: 1 / 2;
  }

  .about_imag {
    grid-column: 1 / 2;
    grid-row: 1 / 2;
  }

  .summary-info {
    margin-top: 5rem;
    grid-row: 2/3;
    grid-column: 1 / 3;
  }
}

@media only screen and (max-width: 700px) {
  .about_container {
    padding: 2rem 2rem;
  }
}

@media only screen and (max-width: 500px) {
  .about_container {
    grid-column-gap: 30%;
  }
}

/* about me section end */

/* dialogs styles */

/* message dialog  start*/

.message_container {
  background-color: #623cea;
  height: 6rem;
}

.msg_header {
  transform: translateY(-50px);
}

.message_head {
  color: #623cea;
  font-size: 1.6rem;
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
}

.msg_body {
  padding: 3rem 14rem !important;
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-gap: 1.6rem;
  transform: translateY(-50px);
}

.msg_input {
  height: 3.4rem;
  background-color: #e9f6ff;
  color: #623cea;
  font-size: 1.34rem;
  padding: 0 22px;
  font-weight: 200;
}

.close_style {
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
}

.input_textarea {
  grid-column: 1 / 3;
  grid-row: 2 / 4;
  height: 8rem;
}

.btn_container {
  grid-column: 1 / 3;
}

.btn_send {
  background-color: #03ca9f;
  padding: 1.2rem 4rem;
  font-size: 1rem;
  border-radius: 6px;
  color: white;
}

/* audio */
.audio_body {
  padding: 0rem 14rem !important;
}

/* video */
.video_body {
  /* grid-template-columns: 1fr 1fr; */
}

.video-container {
  display: grid;
  grid-template-columns: 1fr 1fr;
}

@media only screen and (max-width: 1322px) {
  .video-container {
    display: grid;
    grid-template-columns: 1fr;
  }
}

@media only screen and (max-width: 1089px) {
  .msg_body {
    padding: 3rem 8rem !important;
  }

  .audio_body {
    padding: 0rem 8rem !important;
  }
}

@media only screen and (max-width: 882px) {
  .msg_body {
    padding: 3rem 2rem !important;
    grid-template-columns: 1fr;
  }

  .audio_body {
    padding: 0rem 2rem !important;
  }

  .input_name {
    grid-column: 1 / end;
  }

  .input_email {
    grid-row: 2 / 3;
    grid-column: 1 / end;
  }

  .input_textarea {
    grid-column: 1 / 3;
    grid-row: 3 / 5;
    height: 8rem;
  }

  .btn_container {
    grid-row: 5 / 6;
  }
}

@media only screen and (max-width: 400px) {
  .msg_body {
    padding: 3rem 1rem !important;
  }

  .audio_body {
    padding: 0rem 1rem !important;
  }
}

/* msg dialog end */

/* dialog style end */

/* sm screen  */
@media only screen and (max-width: 769px) {
  .ct-info-container {
    padding: 1rem;
  }

  .ct-infotext {
    margin-top: 0.8rem;
  }

  .user_name {
    font-size: 1.8rem !important;
    font-weight: 200 !important;
  }
}

/* mobile screen */
@media only screen and (max-width: 421px) {
  .profile_img {
    max-width: 2.8rem;
  }

  .ct-info-container {
    padding: 0.6rem;
  }

  .user_name {
    font-size: 1.2rem !important;
    font-weight: 100 !important;
  }

  .user_designation {
    font-size: 0.9rem;
  }
}
</style>