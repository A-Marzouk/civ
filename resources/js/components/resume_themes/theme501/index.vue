<template>
  <v-app>
    <v-card flat tile color="#623CEA" id="theme501">
      <v-row no-gutters class="mt-xl-12 mt-lg-12 mt-sm-6 mt-6">
        <v-col class="col-md-6 col-sm-12" cols="12">
          <v-row no-gutters class="justify-start" align="center">
            <v-col
              class="col-md-3 ml-sm-6 pl-3 pl-lg-0 pl-sm-1 pl-xl-0"
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
                style="border: 3px solid white;border-radius:50%;"
                class="profile"
                cover
              ></v-img>
            </v-col>
            <v-col
              cols="6"
              class="col-md-6 col-sm-6 pt-lg-12 pt-sm-6 pt-4 pl-xl-12 ml-xl-4 ml-lg-6 pl-6"
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

              <div class=" mt-sm-8">
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
            <v-col class="hidden-md-and-up pl-4 pl-sm-10" cols="2">
              <v-btn
                outlined
                dark
                x-small
                color="rgba(4, 199, 155,0.5)"
                class="px-0 my-4 d-block iconsize"
              >
                <v-icon dark small color="white">mdi-phone</v-icon>
              </v-btn>
              <v-btn
                outlined
                dark
                x-small
                color="rgba(4, 199, 155,0.5)"
                class="px-0 my-4 d-block iconsize"
              >
                <v-icon dark small color="white">mdi-video</v-icon>
              </v-btn>
            </v-col>
          </v-row>
          <v-col
            class="col-md-12 col-sm-12 mt-sm-n12 mx-auto hidden-xs-only pl-sm-9"
          >
            <v-btn color="#04C79B" dark rounded small>
              <span class="pl-4 pr-4">TAP TO CHAT</span>
            </v-btn>
          </v-col>
        </v-col>
        <v-col
          class="col-md-6 col-sm-12 mt-sm-12 my-6 my-xl-0 my-lg-0 my-sm-0 mt-lg-0 mt-xl-0"
        >
          <v-row
            no-gutters
            justify-lg="end"
            justify-sm="center"
            justify="center"
          >
            <v-col
              class="col-md-6 text-right mb-md-8 hidden-sm-and-down"
              lg="12"
            >
              <div
                class="subtitle-2 text-right mt-2 mr-4 d-inline-block"
                style="color: whitesmoke;"
              >
                Your Interviews :
              </div>
              <v-btn class="ma-2" outlined color="white">
                <v-img src="/images/resume_themes/theme501/audio.png"></v-img>
                <div class="ml-2 subtitle-1">Upload Audio</div>
              </v-btn>
              <v-btn class="ma-2" outlined color="white">
                <v-img src="/images/resume_themes/theme501/video.png"></v-img>
                <div class="ml-2 subtitle-1">Upload Video</div>
              </v-btn>
            </v-col>
            <v-col class="col-md-8 col-sm-11 mr-md-4" lg="10" cols="11">
              <v-row class="info-pad" dense>
                <v-col cols="auto" sm="4" lg="4">
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
                    <v-icon :dark="lightMobile" small @click="paymentInfoPrev()"
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
                    <v-icon :dark="lightMobile" small @click="paymentInfoNext()"
                      >navigate_next</v-icon
                    >
                  </div>
                </v-col>
                <v-col cols="auto" sm="4" lg="4">
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
                    <v-icon :dark="lightMobile" small @click="availablePrev()"
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
                        class="info-subtitle text-center text-capitalize "
                        v-if="available == index"
                      >
                        {{ availability_info.available_hours_frequency }}
                        Availability
                      </span>
                    </div>
                    <v-icon :dark="lightMobile" small @click="availableNext()"
                      >navigate_next</v-icon
                    >
                  </div>
                </v-col>

                <v-col cols="3" class="text-center" lg="4" align-self="center">
                  <v-btn dark color="#03CA9F" elevation="0" class="buttonsize">
                    <div class="subhead">Hire Me</div>
                  </v-btn>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
      <v-row class="hidden-sm-and-up">
        <v-tabs-items v-model="tab">
          <v-tab-item value="tab-4">
            <v-row class="justify-center text-center" no-gutters>
              <v-tabs
                v-model="activetab"
                slider-color="white"
                show-arrows
                background-color="#03CA9F"
                class="tabmob"
              >
                <v-tab
                  v-show="
                    currentUser.skills.find(
                      s => s.category == 'programming_languages'
                    )
                  "
                >
                  <div class="subhead">
                    Programming languages
                  </div>
                </v-tab>
                <v-tab
                  v-show="
                    currentUser.skills.find(s => s.category == 'frameworks')
                  "
                >
                  <div class="subhead">
                    Frameworks/ Databases
                  </div>
                </v-tab>
                <v-tab
                  v-show="
                    currentUser.skills.find(s => s.category == 'software')
                  "
                >
                  <div class="subhead">Software</div>
                </v-tab>
                <v-tab
                  v-show="currentUser.skills.find(s => s.category == 'design')"
                >
                  <div class="subhead">Design</div>
                </v-tab>
              </v-tabs>
            </v-row>
          </v-tab-item>
        </v-tabs-items>
      </v-row>
      <v-row no-gutters justify="center" class="mt-sm-8">
        <v-col md="8" sm="12" cols="12" class="hidden-xs-only">
          <v-tabs
            v-model="tab"
            background-color="rgb(255, 255, 255,0.0)"
            grow
            dark
            text
            hide-slider
          >
            <v-tab
              v-for="tab in tabs"
              :key="tab.link"
              :href="tab.link"
              class="tablet"
            >
              <v-icon left>{{ tab.icon }}</v-icon>
              <div class="title text-capitalize">{{ tab.name }}</div>
            </v-tab>
          </v-tabs>
        </v-col>
        <v-col cols="12" class="hidden-sm-and-up" align="center">
          <v-card flat tile>
            <v-tabs
              background-color="transparent"
              height="100"
              v-model="tab"
              hide-slider
              center-active
            >
              <v-tab
                class="text-center"
                v-for="tab in tabs"
                :key="tab.link"
                :href="tab.link"
              >
                <!-- <div
                  @click="currentTab = tab.id"
                  class="mt-2 body-2 d-block black--text text-capitalize font-weight-medium"
                >{{ tab.name }}</div>-->
                <v-btn
                  fab
                  class="text-center d-block"
                  :color="currentTab == tab.link ? '#623CEA' : '#AE97FF'"
                  @click="currentTab = tab.link"
                  :class="[
                    currentTab == tab.link ? 'tab-mobile-btn-active' : ''
                  ]"
                  dark
                  depressed
                  x-small
                >
                  <v-icon class="sicon">{{ tab.icon }}</v-icon>
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
              v-for="dot in tabs"
              :key="dot.link"
              @click="currentTab = dot.link"
            >
              <span
                class="mt-2"
                :class="[
                  currentTab === dot.link ? 'tab-dot-active' : 'tab-dot'
                ]"
              ></span>
            </v-btn>
          </v-card>
        </v-col>
      </v-row>
    </v-card>

    <v-tabs-items v-model="tab">
      <v-tab-item value="tab-1">
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
              <div style="padding:10px 10px;">
                <v-img
                  :aspect-ratio="0.96"
                  cover
                  :src="getProjectMainImage(project)"
                  style="border-radius: 10px;box-shadow: 0px 10px 23px rgba(0, 0, 0, 0.161);"
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
      <v-tab-item value="tab-2">
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
      <v-tab-item value="tab-3">
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
      <v-tab-item value="tab-4">
        <v-row class="justify-center mt-12 hidden-xs-only">
          <v-col
            class="col-md-7 col-sm-11 elevation-6 py-6"
            style="height:auto;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;"
          >
            <v-row class="justify-center text-center" no-gutters>
              <v-col
                md="3"
                sm="3"
                cols="3"
                v-on:click="activetab = 0"
                class="tabs"
                v-bind:class="[activetab === 0 ? 'active' : '']"
                v-show="
                  currentUser.skills.find(
                    s => s.category == 'programming_languages'
                  )
                "
              >
                <a class="tabtitle">
                  Programming languages
                </a>
              </v-col>
              <v-col
                md="3"
                sm="3"
                cols="3"
                v-on:click="activetab = 1"
                class="tabs"
                v-show="
                  currentUser.skills.find(s => s.category == 'frameworks')
                "
                v-bind:class="[activetab === 1 ? 'active' : '']"
              >
                <a class="tabtitle">
                  Frameworks/ Databases
                </a>
              </v-col>
              <v-col
                md="3"
                sm="3"
                cols="3"
                v-on:click="activetab = 2"
                class="tabs"
                v-show="currentUser.skills.find(s => s.category == 'software')"
                v-bind:class="[activetab === 2 ? 'active' : '']"
              >
                <a class="tabtitle">Software</a>
              </v-col>
              <v-col
                md="3"
                sm="3"
                cols="3"
                v-on:click="activetab = 3"
                class="tabs"
                v-show="currentUser.skills.find(s => s.category == 'design')"
                v-bind:class="[activetab === 3 ? 'active' : '']"
              >
                <a class="tabtitle">
                  Design Skills
                </a>
              </v-col>
            </v-row>
          </v-col>
        </v-row>
        <v-container>
          <v-row class="justify-center">
            <v-col sm="12" xl="10" lg="12" cols="12">
              <v-row v-if="activetab === 0" class="justify-center">
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
              <v-row v-if="activetab === 1" class="justify-center">
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
              <v-row v-if="activetab === 2" class="justify-center">
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
              <v-row v-if="activetab === 3" class="justify-center">
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
      <v-tab-item value="tab-5">
        <v-row
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
              <span style="color:#623CEA;">{{
                currentUser.personal_info.designation
              }}</span>
            </div>
            <div class="display-2 mt-md-12 mt-sm-8">About Me.</div>
            <v-row dense class="mt-md-12 mt-sm-8">
              <v-col cols="1">
                <div class="line"></div>
              </v-col>
              <v-col cols="11" sm="12" lg="9">
                <div class="title" style="color:#656565;">
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
        </v-row>
      </v-tab-item>
    </v-tabs-items>
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
export default {
  props: ["user", "is_preview"],
  data() {
    return {
      available: 0,
      paymentInfo: 0,
      currentUser: this.user,
      currentTab: null,
      activetab: 1,
      tab: "#tab-1",
      text: [
        "",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
        "asdasdasdasd"
      ],
      tabs: [
        {
          link: "#tab-1",
          name: "Portfolio",
          icon: "mdi-layers"
        },
        {
          link: "#tab-2",
          name: "Work",
          icon: "mdi-briefcase"
        },
        {
          link: "#tab-3",
          name: "Education",
          icon: "mdi-school"
        },
        {
          link: "#tab-4",
          name: "Skills",
          icon: "mdi-head-snowflake-outline"
        },
        {
          link: "#tab-5",
          name: "About Me",
          icon: "mdi-comment-edit"
        }
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
        { color: "#E64A19" }
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
        { icon: "mdi-ruler-square-compass" }
      ]
    };
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
    }
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
      images.forEach(image => {
        if (image.is_main) {
          mainImage = image;
        }
      });

      return mainImage.src;
    },
    setDummyUser() {
      this.currentUser = this.$store.state.dummyUser;
    }
  },
  mounted() {
    // if there is no user or the preview is true, set dummy user
    if (!this.currentUser || this.is_preview) {
      this.setDummyUser();
    }

    // let user accessible in included components.
    this.$store.dispatch("updateThemeUser", this.currentUser);
  }
};
</script>



