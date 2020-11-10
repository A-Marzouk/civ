<template>
  <v-app style="width: 100%" v-if="currentUser">
    <v-container fluid ma-0 pa-0 style="width: 100%">
      <!-- For Desktop and Tablet -->
      <v-app-bar color="#fafafa" height="250" class="hidden-xs-only">
        <v-avatar size="120" class="mr-5">
          <v-img :src="currentUser.personal_info.profile_pic"></v-img>
        </v-avatar>
        <div class="half-circle"></div>
        <v-container
          fluid
          pa-0
          ma-lg-0
          ma-md-2
          ma-sm-4
          ma-0
          style="width: 100%"
        >
          <v-row class align="center" justify="center" dense>
            <v-col xl="4" lg="3" md="8" sm="7">
              <v-card flat color="transparent" class="pa-0">
                <v-card-title class="custom-profile-title">
                  {{ currentUser.personal_info.first_name }}
                  {{ currentUser.personal_info.last_name }}
                </v-card-title>
                <v-card-subtitle class="custom-profile-subtitle">
                  {{ currentUser.personal_info.designation }}
                </v-card-subtitle>
                <v-card-text
                  class="custom-profile-text hidden-md-and-down"
                  v-if="currentUser.personal_info.overview"
                >
                  {{ currentUser.personal_info.overview }}
                </v-card-text>
              </v-card>
            </v-col>

            <!-- Social Buttons for tablet only -->
            <v-col
              md="4"
              sm="5"
              class="d-none d-sm-flex d-md-flex d-lg-none mt-md-8 mt-sm-0"
            >
              <v-card
                flat
                color="transparent"
                class="pa-0 hire-me-card mt-md-2 mt-sm-0 ml"
              >
                    <v-btn
                        color="#FAFAFA"
                        class="btn-hire-me hidden-md-and-down"
                        x-large
                        @click="hireMeModal = !hireMeModal"
                    >
                        <v-icon color="#5843BE" left>mdi-email</v-icon>Hire Me
                    </v-btn>

                    <SocialButtons :links="currentUser.links" screen="tablet" />
                </v-card>
            </v-col>
            <!-- Social Button for tablet only -->

            <!-- Availibility -->
            <v-col xl="3" lg="4" md="5" sm="7" class>
              <!-- Hour rate -->
              <v-card
                class="d-flex flex-row hour-card mt-0 mt-sm-n5 mt-md-n10 ml-xl-0 ml-md-0"
                color="transparent"
                flat
                tile
              >
                <HourRate :paymentInfo="currentUser.payment_info" />
                <WeeklyAvailability :availabilityInfo="currentUser.availability_info" />
              </v-card>
            </v-col>
            <!-- Availibility  -->

            <!-- 3rd column -->
            <v-col
              lg="5"
              md="5"
              class="hidden-md-and-down mt-lg-0"
              align="right"
            >
              <v-card flat color="transparent" class="pa-0 hire-me-card d-flex align-items-center">
                <SocialButtons :links="currentUser.links" screen="desktop" />

                <v-btn
                  color="#FAFAFA"
                  class="btn-hire-me hidden-sm-and-down"
                  x-large
                  @click="hireMeModal = !hireMeModal"
                >
                  <v-icon color="#5843BE" left>mdi-email</v-icon>Hire Me
                </v-btn>
                <!-- social buttons -->
              </v-card>
            </v-col>
            <!-- 3rd column -->

            <!-- 4th column for tablet only -->
            <v-col
              md="3"
              sm="1"
              class="d-none d-sm-none d-md-flex d-lg-none"
            ></v-col>
            <v-col md="4" sm="5" class="d-none d-sm-flex d-md-flex d-lg-none">
              <v-card flat color="tranparent" class="ml-2 mt-0 mt-n5">
                <v-btn
                  class="btn-hire-me"
                  color="#FAFAFA"
                  width="212px"
                  x-large
                  @click="hireMeModal = !hireMeModal"
                >
                  <v-icon color="#5843BE" left>mdi-email</v-icon>Hire Me
                </v-btn>
              </v-card>
            </v-col>
            <!-- 4th column for tablet only -->
          </v-row>
        </v-container>
      </v-app-bar>
      <!-- For Desktop and Tablet Version -->
      <!-- ........................................................................................................ -->
      <!-- For mobile version only -->
      <v-app-bar class="hidden-sm-and-up" color="#fafafa">
        <v-btn icon color="#333333" @click.stop="drawer = !drawer">
          <v-app-bar-nav-icon color="#333333"></v-app-bar-nav-icon>
        </v-btn>
        <v-toolbar-title class="custom-toolbar-title-mobile"
          >{{ currentUser.personal_info.first_name }}
          {{ currentUser.personal_info.last_name }}</v-toolbar-title
        >
      </v-app-bar>
      <v-navigation-drawer
        app
        color="#fafafa"
        v-model="drawer"
        temporary
        absolute
        width="350"
      >
        <v-card flat color="transparent">
          <v-card-title class="profile-text-mobile">Profile</v-card-title>
          <v-list-item class="mt-n12">
            <v-list-item-avatar size="80">
              <v-img :src="currentUser.personal_info.profile_pic"></v-img>
            </v-list-item-avatar>
            <div class="half-circle-mobile"></div>
            <v-list-item-content class="mt-12">
              <v-list-item-title>
                <v-card color="transparent" class="pa-5" flat>
                  <span class="profile-title-mobile"
                    >{{ currentUser.personal_info.first_name }}
                    {{ currentUser.personal_info.last_name }}</span
                  >
                </v-card>
              </v-list-item-title>
              <v-list-item-subtitle>
                <v-card flat color="transparent" class="pa-5 mt-n5">
                  <span class="profile-subtitle-mobile">{{
                    currentUser.personal_info.designation
                  }}</span>
                </v-card>
              </v-list-item-subtitle>
              <v-list-item-title>
                <v-card height="50" flat color="transparent" class="mt-2">
                    <SocialButtons :links="currentUser.links" screen="mobile" />
                </v-card>
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
          <v-card-text>
            <v-btn
              color="#FAFAFA"
              class="btn-hire-me"
              block
              @click="hireMeModal = !hireMeModal"
            >
              <v-icon color="#5843BE" left>mdi-email-outline</v-icon>Hire Me
            </v-btn>
          </v-card-text>
        </v-card>
        <v-card flat color="transparent">
          <v-card-title class="about-me-title-mobile">About Me</v-card-title>
          <v-card-text class="about-me-text-mobile">{{
            currentUser.personal_info.about
          }}</v-card-text>
        </v-card>
      </v-navigation-drawer>
      <!-- For mobile version only -->
      <!-- ....................................................................................................... -->

      <!-- Tab Container -->
      <v-container fluid style="width: 100%">
        <v-row justify="center" align="center">
          <v-col cols="12" md="11" lg="12">
            <!-- for mobile version  -->
            <v-tabs
              v-model="indexOfActiveTab"
              centered
              center-active
              hide-slider
              class="hidden-sm-and-up my-10"
            >
              <v-tab
                v-for="tab in currentUser.tabs"
                :key="tab.title"
                v-if="!excludedTabs.includes(tab.title)"
                v-show="tab.is_public"
                @click="activeTab = tab.title"
                :class="[activeTab === tab.title ? 'active-mobile-tab' : '']"
              >
                <v-avatar tile size="16">
                  <img :src="getTabIcon(tab.title)" width="16" />
                </v-avatar>
                <span class="ml-2" v-if="activeTab === tab.title">{{
                  tab.label
                }}</span>
              </v-tab>
            </v-tabs>
            <!-- for mobile version  -->
            <!-- tab for desktop and tablet -->
            <v-tabs
              centered
              v-model="indexOfActiveTab"
              center-active
              hide-slider
              show-arrows
              class="hidden-xs-only mt-md-10 my-md-0 my-sm-3"
            >
              <v-tab
                v-for="tab in currentUser.tabs"
                :key="tab.title"
                v-if="!excludedTabs.includes(tab.title)"
                v-show="tab.is_public"
                @click="activeTab = tab.title"
                class="mx-md-2 mx-sm-2 text-capitalize"
                :class="[
                  activeTab === tab.title ? 'custom-active-tab' : '',
                  'ct-tab',
                ]"
              >
                <v-avatar tile>
                  <img :src="getTabIcon(tab.title)" class="mr-md-4" />
                </v-avatar>
                <span>{{ tab.label }}</span>
              </v-tab>
            </v-tabs>
            <!-- Tab for desktop and tablet -->
          </v-col>
        </v-row>
        <!-- Main tab ends here -->
      </v-container>
      <!--Tab Container  -->
      <!-- tab items container -->
      <v-container fluid pa-md-10 mt-n12 style="width: 100%">
        <v-row align="center" justify="center">
          <v-col cols="12">
            <v-card flat color="transparent">
              <v-tabs-items v-model="indexOfActiveTab">
                <!-- Portfolio -->
                <v-tab-item :value="getTabIndex('portfolio')">
                  <Portfolio :currentUser="currentUser" />
                </v-tab-item>
                <!-- Portfolio -->
                <!-- Education -->
                <v-tab-item :value="getTabIndex('education')">
                  <v-row>
                    <v-col
                      cols="12"
                      sm="6"
                      md="6"
                      lg="4"
                      v-for="education in currentUser.education"
                      :key="education.id"
                      v-show="education.is_public"
                    >
                      <v-card class="card-education pa-xl-5 pa-lg-3 pa-5" hover>
                        <v-card-title class="education-title">
                          <v-row>
                            <v-col cols="10">
                              <div class="education-title">
                                {{ education.university_name }}
                              </div>
                            </v-col>
                            <v-col cols="2" align="right">
                              <img
                                src="/images/resume_themes/theme206/tabs/2.png"
                                alt
                              />
                            </v-col>
                          </v-row>
                        </v-card-title>
                        <v-card-text class="education-subtitle">{{
                          education.description
                        }}</v-card-text>
                        <v-card-actions class="education-session pl-4">
                          {{ getFullYear(education.date_from) }} -
                          {{ getFullYear(education.date_to) }}
                        </v-card-actions>
                      </v-card>
                    </v-col>
                  </v-row>
                </v-tab-item>
                <!-- Education -->

                <!-- Experience -->
                <v-tab-item :value="getTabIndex('work_experience')">
                  <v-row>
                    <v-col
                      cols="12"
                      sm="6"
                      md="6"
                      lg="4"
                      v-for="work in currentUser.work_experience"
                      :key="work.id"
                      v-show="work.is_public"
                    >
                      <v-card class="card-education pa-xl-5 pa-lg-2 pa-5" hover>
                        <v-card-title class="education-title">
                          <v-row>
                            <v-col cols="10">{{ work.job_title }}</v-col>
                            <v-col cols="2" align="right">
                              <img
                                src="/images/resume_themes/theme206/tabs/2.png"
                                alt
                              />
                            </v-col>
                          </v-row>
                        </v-card-title>
                        <v-card-text class="education-subtitle">{{
                          work.company_name
                        }}</v-card-text>
                        <v-card-actions class="education-session pl-4">
                          {{ getFullYear(work.date_from) }} -
                          {{ getFullYear(work.date_to) }}
                        </v-card-actions>
                      </v-card>
                    </v-col>
                  </v-row>
                </v-tab-item>
                <!-- Experience -->

                <!-- Skills -->
                <v-tab-item :value="getTabIndex('skills')">
                  <v-row>
                    <v-col cols="12">
                      <v-card color="transparent" flat>
                        <v-tabs v-model="skillTab" hide-slider centered>
                          <v-tab
                            class="custom-skill-tab"
                            v-for="skill in skills"
                            :key="skill.id"
                            @click="currentSkillTab = skill.id"
                            v-show="
                              currentUser.skills.find(
                                (s) => s.category == skill.value
                              )
                            "
                            :class="[
                              currentSkillTab == skill.id
                                ? 'skill-child-tab-active'
                                : 'skill-child-tab',
                            ]"
                            >{{ skill.title }}</v-tab
                          >
                        </v-tabs>
                      </v-card>
                      <!-- Child Tabs -->
                    </v-col>
                  </v-row>
                  <v-row>
                    <v-col cols="12">
                      <!-- Child Tab Items -->
                      <v-tabs-items v-model="skillTab">
                        <!-- All Programming Languges -->
                        <v-tab-item
                          v-for="skill in skills"
                          :key="skill.id"
                          v-show="
                            currentUser.skills.find(
                              (s) => s.category == skill.value
                            )
                          "
                        >
                          <v-card flat color="transparent">
                            <v-card-text>
                              <v-row>
                                <v-col
                                  md="4"
                                  sm="6"
                                  cols="12"
                                  v-for="(s, index) in skillCategory(
                                    skill.value
                                  )"
                                  :key="index"
                                  v-show="s.is_public"
                                >
                                  <v-card color="#FAFAFA">
                                    <v-card-text>
                                      <v-row>
                                        <v-col cols="6" class="skill-title">{{
                                          s.title
                                        }}</v-col>
                                        <v-col
                                          cols="6"
                                          align="right"
                                          class="skill-title"
                                          >{{ s.percentage }}%</v-col
                                        >
                                        <v-col cols="12">
                                          <v-progress-linear
                                            style="
                                              border: 3px solid #f0f0f3;
                                              border-radius: 12px;
                                            "
                                            class="custom-progress-bar"
                                            color="#5843BE"
                                            rounded
                                            background-color="#eeeeee"
                                            height="15"
                                            :value="s.percentage"
                                          ></v-progress-linear>
                                        </v-col>
                                      </v-row>
                                    </v-card-text>
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
                </v-tab-item>
                <!-- Skills -->
                <!-- Media -->
                <v-tab-item :value="getTabIndex('media')">
                  <v-card flat color="transparent" v-if="currentUser.media">
                    <v-card-text>
                      <v-row>
                        <v-col
                          cols="12"
                          sm="6"
                          md="4"
                          v-for="audio in filterAudio(currentUser.media)"
                          :key="audio.id"
                          v-show="audio.is_public"
                        >
                          <audioMedia :audioMedia="audio"></audioMedia>
                        </v-col>
                        <v-col cols="12">
                          <v-row justify="start">
                            <v-col
                              xl="4"
                              lg="4"
                              md="6"
                              sm="6"
                              cols="12"
                              v-for="item in filterVideo(currentUser.media)"
                              :key="item.id"
                            >
                              <v-card style="border-radius: 9px">
                                <video-player
                                  :title="item.title"
                                  :details="item.content"
                                  :file="item.url"
                                  :previewImg="item.media_preview"
                                ></video-player>
                              </v-card>
                            </v-col>
                          </v-row>
                        </v-col>
                      </v-row>
                    </v-card-text>
                  </v-card>
                </v-tab-item>
                <!-- Media -->
                <!-- About Me -->
                <v-tab-item :value="getTabIndex('about_me')">
                  <v-card flat color="transparent">
                    <v-card-title class="about-me-title">About Me</v-card-title>
                    <!-- <v-card-text
                      class="about-me-text"
                      v-if="currentUser.personal_info.about"
                    >{{ currentUser.personal_info.about }}</v-card-text>-->
                    <v-card class="about-me-child">
                      <v-row>
                        <v-col
                          xl="3"
                          lg="3"
                          md="3"
                          sm="4"
                          cols="12"
                          order-sm="1"
                          order="12"
                          class="about-left-column"
                        >
                          <v-card
                            class="card-about-left"
                            flat
                            color="transparent"
                          >
                            <v-card-subtitle
                              class="dob-text"
                              :align="windowWidth <= 599 ? 'left' : 'center'"
                              v-if="currentUser.personal_info.date_of_birth"
                            >
                              <div>Date Of Birth</div>

                              <div class>
                                <span class>{{
                                  currentUser.personal_info.date_of_birth
                                }}</span>
                              </div>
                            </v-card-subtitle>

                            <v-card-subtitle
                              class="dob-text"
                              :align="windowWidth <= 599 ? 'left' : 'center'"
                              v-if="currentUser.personal_info.nationality"
                            >
                              <div>Nationality</div>

                              <div class>
                                <span class>
                                  {{
                                    currentUser.personal_info.nationality
                                  }}</span
                                >
                              </div>
                            </v-card-subtitle>

                            <v-card-subtitle
                              class="dob-text"
                              :align="windowWidth <= 599 ? 'left' : 'center'"
                              v-if="currentUser.personal_info.hometown"
                            >
                              <div>Hometown</div>

                              <div class>
                                <span style="text-transform: uppercase">{{
                                  currentUser.personal_info.hometown
                                }}</span>
                              </div>
                            </v-card-subtitle>

                            <v-card-subtitle
                              class="dob-text"
                              :align="windowWidth <= 599 ? 'left' : 'center'"
                              v-if="currentUser.languages[0]"
                            >
                              <div>Languages</div>

                              <div class="d-flex flex-column">
                                <span
                                  v-for="(language, i) in currentUser.languages"
                                  :key="i"
                                  >{{ language.label }}</span
                                >
                              </div>
                            </v-card-subtitle>
                          </v-card>
                        </v-col>

                        <v-col
                          xl="6"
                          lg="9"
                          md="9"
                          sm="7"
                          cols="12"
                          order-sm="12"
                          order="1"
                        >
                          <v-card
                            class="card-about-right"
                            flat
                            color="transparent"
                          >
                            <v-card-subtitle
                              v-if="currentUser.personal_info.overview"
                              class="overview-title"
                              >Overview summary</v-card-subtitle
                            >
                            <!-- Overview -->
                            <v-card-text
                              v-if="currentUser.personal_info.overview"
                              class="overview-text mt-n4"
                              >{{
                                currentUser.personal_info.overview
                              }}</v-card-text
                            >
                            <!-- Overview -->

                            <!-- about me -->
                            <v-card-subtitle
                              class="overview-title"
                              v-if="currentUser.personal_info.about"
                              >About Me</v-card-subtitle
                            >
                            <v-card-text
                              class="overview-text mt-n4"
                              v-if="currentUser.personal_info.about"
                              >{{
                                currentUser.personal_info.about
                              }}</v-card-text
                            >
                            <!-- about me -->

                            <!-- quote -->
                            <v-card-subtitle
                              class="overview-title"
                              v-if="currentUser.personal_info.quote"
                              >Quote</v-card-subtitle
                            >
                            <v-card-text
                              class="overview-text mt-n4"
                              v-if="currentUser.personal_info.quote"
                              >{{
                                currentUser.personal_info.quote
                              }}</v-card-text
                            >
                            <!-- quote -->
                            <!-- location -->
                            <v-card-subtitle
                              class="overview-title"
                              v-if="currentUser.personal_info.location"
                              >Location</v-card-subtitle
                            >
                            <v-card-text
                              class="overview-text mt-n4"
                              v-if="currentUser.personal_info.location"
                              >{{
                                currentUser.personal_info.location
                              }}</v-card-text
                            >
                            <!-- location -->
                          </v-card>
                        </v-col>
                      </v-row>
                    </v-card>
                  </v-card>
                </v-tab-item>
                <!-- About Me -->

                <!-- Hobbies tab -->
                <v-tab-item :value="getTabIndex('hobbies')">
                  <v-container>
                    <v-row align="center" class="mx-auto">
                      <v-col
                        xl="3"
                        lg="4"
                        md="4"
                        sm="6"
                        cols="6"
                        v-for="(hobby, i) in currentUser.hobbies"
                        :key="i"
                        v-show="hobby.is_public"
                      >
                        <v-card
                          class="card-hobby pa-md-5 pa-sm-5 pa-0 mb-5"
                          hover
                        >
                          <v-card-text>
                            <div
                              class="d-flex flex-row justify-content-center align-items-center mt-md-0 mt-sm-0 mt-1"
                            >
                              <img
                                src="/images/resume_themes/theme206/football.svg"
                                alt="football"
                                class="mx-auto mr-lg-3 mr-md-3 mr-sm-2 mr-2"
                              />
                              <div class="hobby-title mx-auto my-auto">
                                {{ hobby.title }}
                              </div>
                            </div>
                          </v-card-text>
                        </v-card>
                      </v-col>
                    </v-row>
                  </v-container>
                </v-tab-item>
                <!-- Hobbies tab -->
                <!-- References tab -->
                <v-tab-item :value="getTabIndex('references')">
                  <v-container>
                    <v-row align="center" class="mx-auto">
                      <v-col
                        xl="6"
                        lg="6"
                        md="12"
                        sm="12"
                        cols="12"
                        v-for="(reference, i) in currentUser.references"
                        :key="i"
                        v-show="reference.is_public"
                      >
                        <v-card
                          class="card-reference mb-5 pa-xl-10 pa-lg-8 pa-md-10 pa-sm-10 pa-5"
                          hover
                        >
                          <v-row align="center" justify="space-between">
                            <!-- 1st column -->
                            <v-col md="6" sm="6" cols="12">
                              <div class="d-flex flex-column">
                                <h3 class="reference-title">
                                  {{ reference.name }}
                                </h3>
                                <p class="reference-subtitle mt-2">
                                  {{ reference.title }}
                                </p>
                              </div>
                            </v-col>
                            <!-- 1st column -->
                            <!-- 2nd column -->
                            <v-col md="6" sm="6" cols="12">
                              <div class="d-flex flex-column">
                                <p class="reference-address">
                                  {{ reference.address }}
                                </p>
                                <p class="reference-address mt-n3">
                                  {{ reference.phone }}
                                </p>
                                <p class="reference-address mt-n3">
                                  {{ reference.url }}
                                </p>
                              </div>
                            </v-col>
                            <!-- 2nd column -->
                            <!-- 3rd column -->
                            <v-col xl="9" lg="11" md="9" sm="10" cols="12">
                              <v-card flat color="transparent pa-0">
                                <div class="reference-duration">
                                  <div class="d-flex flex-row">
                                    <p>{{ reference.company }}</p>
                                    <p class="ml-2">
                                      Duration:
                                      {{ getFullYear(reference.created_at) }}
                                    </p>
                                  </div>
                                </div>
                                <div class="reference-desc">
                                  {{ reference.reference_text }}
                                </div>
                              </v-card>
                            </v-col>
                            <!-- 3rd column -->
                          </v-row>
                        </v-card>
                      </v-col>
                    </v-row>
                  </v-container>
                </v-tab-item>
                <!-- References tab -->
                <!-- Achievements tab -->
                <v-tab-item :value="getTabIndex('achievements')">
                  <v-container
                    :fluid="windowWidth <= 959 ? true : false"
                    class="achievement-container"
                  >
                    <v-row align="center" justify="center" class="mx-auto">
                      <v-col
                        lg="6"
                        md="12"
                        sm="12"
                        cols="12"
                        v-for="(achievement, i) in currentUser.achievements"
                        :key="i"
                        v-show="achievement.is_public"
                      >
                        <v-card
                          class="card-achievement pa-xl-10 pa-lg-6 pa-md-12 pa-sm-9 pa-5 mb-6"
                          hover
                        >
                          <div class="d-flex flex-row my-auto">
                            <img
                              class="mt-sm-0 mt-3"
                              :src="achievement.image_src"
                              style="max-width: 300px"
                              alt="certificate"
                            />
                            <div class="ml-md-6 ml-sm-3 ml-1">
                              <p
                                class="year mt-md-0 mt-sm-4 mt-0 hidden-xs-only"
                              >
                                {{ getFullYear(achievement.created_at) }}
                              </p>
                              <v-row>
                                <v-col md="12" sm="12" cols="12">
                                  <h3 class="title mt-xl-0 mt-lg-n8">
                                    {{ achievement.title }}
                                  </h3>
                                </v-col>
                                <v-col cols="3" class="hidden-sm-and-up">
                                  <p class="year">
                                    {{ achievement.created_at }}
                                  </p>
                                </v-col>
                              </v-row>

                              <p class="address mt-xl-0 mt-lg-n5 mt-sm-0 mt-n7">
                                URL: {{ achievement.url }}
                              </p>
                              <p class="desc hidden-xs-only">
                                {{ achievement.description }}
                              </p>
                            </div>
                          </div>
                          <p class="desc hidden-sm-and-up mt-3">
                            {{ achievement.description }}
                          </p>
                        </v-card>
                      </v-col>
                    </v-row>
                  </v-container>
                </v-tab-item>
                <!-- Achievements Tab -->
              </v-tabs-items>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
      <!-- Tab items container -->
      <!-- All Modals -->
      <hire-modal
        :hireMeModal.sync="hireMeModal"
        :widowWidth="windowWidth"
        :currentUser="currentUser"
      ></hire-modal>
      <!-- All Modals -->
    </v-container>
    <!-- Main container -->
  </v-app>
</template>

<script>
import audioMedia from "./media/audioMedia";
import VideoPlayer from "./media/VideoPlayer";
import HireModal from "../theme203/payment/HireModal";
import Portfolio from "./tabs/Portfolio";
import SocialButtons from "./common/SocialButtons";
import HourRate from "./common/HourRate";
import WeeklyAvailability from "./common/WeeklyAvailability";

export default {
  props: ["user", "is_preview", "builderCurrentTabTitle"],
  components: {
    audioMedia,
    HireModal,
    Portfolio,
    VideoPlayer,
    SocialButtons,
    HourRate,
    WeeklyAvailability,
  },
  data() {
    return {
      windowWidth: window.innerWidth,
      drawer: false,
      skillTab: "",
      activeTab: "portfolio",
      currentUser: this.user,
      indexOfActiveTab: 0,
      currentSkillTab: 1,
      hireMeModal: false,
      skills: [
        {
          id: 1,
          title: "Programming Languages",
          value: "programming_languages",
        },
        { id: 2, title: "Frameworks", value: "frameworks" },
        { id: 3, title: "Design Skills", value: "design" },
        { id: 4, title: "Software", value: "software" },
      ],
    };
  },
  watch: {
    // if current tab changed, change the active tab as well.
    builderCurrentTabTitle: function (val) {
      if (!this.defaultTabs.includes(val)) {
        this.activeTab = this.getFirstActiveTabTitle();
      } else {
        this.activeTab = val;
      }

      this.setTabIndex();
    },
  },
  computed: {
    defaultTabs() {
      return this.$store.state.defaultTabs;
    },
    excludedTabs() {
      return this.$store.state.excludedTabs;
    },
  },
  methods: {
    getFirstActiveTabTitle() {
      let title = "";
      this.currentUser.tabs.forEach((tab) => {
        if (tab.is_public && !this.excludedTabs.includes(tab.title)) {
          if (title === "") {
            title = tab.title;
          }
        }
      });

      return title;
    },
    filterVideo(dataArray) {
      var filterArray = dataArray.filter((a) => a.type === "video");
      return filterArray;
    },
    setTabIndex() {
      this.indexOfActiveTab = this.currentUser.tabs.findIndex(
        (tab) => tab.title === this.activeTab
      );
    },
    getTabIndex(tabTitle) {
      let index = this.currentUser.tabs.findIndex(
        (tab) => tab.title === tabTitle
      );
      return index;
    },
    goToExternalLink(link) {
      if (!link.includes("http")) {
        link = "http://" + link;
      }
      window.location.href = link;
    },
    skillCategory(skillName) {
      var filteredSkill = this.currentUser.skills.filter(
        (s) => s.category === skillName
      );
      return filteredSkill;
    },
    findAudio(audio) {
      var url = audio.find((s) => s.type === "audio").url;
      return url;
    },
    filterAudio(audios) {
      var filterArray = audios.filter((a) => a.type === "audio");
      return filterArray;
    },
    findVideo(video) {
      var url = video.find((s) => s.type === "video").url;
      return url;
    },
    getFullYear(date) {
      let newDate = new Date(date);
      let yyyy = newDate.getUTCFullYear();
      return yyyy;
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
    getSocialIcon(title) {
      return `/images/resume_themes/theme206/social_icons/${title.toLowerCase()}.webp`;
    },
    getTabIcon(id) {
      return `/images/resume_themes/theme206/tabs/${id}.png`;
    },
    getTabIconMobile(id) {
      return `/images/resume_themes/theme206/tabs-mobile/${id}.png`;
    },
    getPortfolio(image) {
      return `/images/resume_themes/theme206/portfolio/${image}.png`;
    },
    setDummyUser() {
      this.currentUser = this.$store.state.dummyUser;
    },
    setActiveTabByURL() {
      const pathSplit = this.$route.path.split("/");
      let currentActiveTab = pathSplit[pathSplit.length - 1];
      if (!this.defaultTabs.includes(currentActiveTab)) {
        this.activeTab = this.getFirstActiveTabTitle();
      } else {
        this.activeTab = currentActiveTab;
      }
    },
  },
  mounted() {
    // if there is no user or the preview is true, set dummy user
    if (!this.currentUser || this.is_preview) {
      this.setDummyUser();
    }

    // set active tab
    this.setActiveTabByURL();

    // let user accessible in included components.
    this.$store.dispatch("updateThemeUser", this.currentUser);
    window.onresize = () => {
      this.windowWidth = window.innerWidth;
    };
  },
};
</script>

<style scoped lang="scss">
@import url("https://fonts.googleapis.com/css?family=Open+Sans&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");

.half-circle {
  position: absolute;
  width: 136px;
  height: 68px; /* as the half of the width */
  border-radius: 100px 100px 0px 0;
  border-left: 5px solid #5843be;
  border-right: 5px solid #5843be;
  border-top: 5px solid #5843be;
  margin-top: 37px;
  margin-left: 22px;
  transform: rotate(122deg);
  z-index: 1;

  @-moz-document url-prefix() {
    margin-top: 37px !important;
    margin-left: 23px !important;
  }
}

.half-circle-mobile {
  position: absolute;
  width: 100px;
  height: 50px; /* as the half of the width */
  border-radius: 100px 100px 0px 0;
  border-left: 3px solid #5843be;
  border-right: 3px solid #5843be;
  border-top: 3px solid #5843be;
  margin-top: 23px;
  margin-left: 10px;
  transform: rotate(122deg);
  z-index: 1;

  @-moz-document url-prefix() {
    margin-top: 23px !important;
    margin-left: 9px !important;
  }
}

.custom-profile-title {
  font-family: "Open Sans" !important;
  font-weight: bold;
  font-size: 2rem;
  line-height: 3.375rem;
  color: #333333 !important;
  @media screen and (min-width: 960px) and (max-width: 1263px) {
    font-size: 1.75rem;
  }
  @media screen and(max-width:959px) {
    font-size: 1.5rem;
  }
}

.custom-profile-subtitle {
  font-family: "Poppins", sans-serif !important;
  color: #333333 !important;
  font-size: 18px !important;
  font-weight: normal;
  line-height: 27px;
  @media screen and(max-width:959px) {
    font-size: 1rem !important;
  }
}

.custom-profile-text {
  font-family: "Poppins", sans-serif !important;
  color: #000000 !important;
  font-size: 0.9rem;
  line-height: 1.6888rem;
}

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
  width: 180px;
  height: 50px !important;

  @media screen and (max-width: 1263px) {
    width: 240px;
  }
  text-transform: capitalize !important;
  @media screen and (max-width: 599px) {
    width: 299px;
    color: #5843be !important;
  }
}
// Tabs
.ct-tab {
  font-family: "Poppins", sans-serif !important;
  background: #f0f0f3;
  box-shadow: 1.5px 1.5px 3px rgba(174, 174, 192, 0.4), -1px -1px 3px #ffffff;
  border-radius: 5px;
  color: #5843be !important;
  font-size: 20px;
  line-height: 30px;
  img {
    width: 20px;
    height: 20px;
  }
  @media screen and (min-width: 1264px) and (max-width: 1903px) {
    font-size: 14px;
  }
  @media screen and (max-width: 959px) {
    span {
      display: none;
    }
  }
}
.custom-active-tab {
  font-family: "Poppins", sans-serif !important;
  background: #eeeeee;
  border: 5px solid #eeeeee;
  box-shadow: inset 1.5px 1.5px 1px rgba(174, 174, 192, 0.2),
    inset -1px -1px 1px rgba(255, 255, 255, 0.7);
  border-radius: 5px;
  img {
    width: 24px;
    height: 24px;
    transition: 1s !important;
  }
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
}
// Tabs
// Portfolio
.card-portfolio {
  border-radius: 30px !important;
}
//Portfolio

//education
.card-education {
  background: linear-gradient(0deg, #fafafa, #fafafa) !important;
  box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.1) !important;
  border-radius: 30px !important;
}
.education-title {
  font-family: "Roboto", sans-serif !important;
  color: #333333 !important;
  font-weight: bold !important;
  line-height: 30px !important;
  font-size: 26px;
  word-break: break-word;
  @media screen and (max-width: 411px){
    font-size: 20px;
  }
  @media screen and (max-width: 374px){
    font-size: 16px;
  }
  img {
    width: 40px;
  }
}
.experience-title {
  font-family: "Roboto", sans-serif !important;
  color: #333333 !important;
  font-weight: bold !important;
  line-height: 30px !important;
  img {
    width: 30px;
  }
}
.education-subtitle {
  font-family: "Roboto", sans-serif !important;
  color: #333333 !important;
  line-height: 23px;
  font-size: 1.125rem !important;
  @media screen and (max-width: 411px){
    font-size: 1rem !important;
  }
  @media screen and (max-width: 374px){
    font-size: 14px !important;
  }
}
.education-session {
  font-family: "Roboto", sans-serif !important;
  color: rgba(51, 51, 51, 0.5) !important;
  font-size: 20px !important;
  @media screen and (max-width: 374px){
    font-size: 12px !important;
  }
}
//education
// Skill tab
.skill-child-tab {
  font-family: "Poppins", sans-serif !important;
  color: #333333 !important;
}

.skill-child-tab-active {
  font-family: "Poppins", sans-serif !important;
  color: #5843be;
  font-weight: 600;
  background: #eeeeee;
  box-shadow: inset 1.5px 1.5px 1px rgba(174, 174, 192, 0.2),
    inset -1px -1px 1px rgba(255, 255, 255, 0.7);
  border-radius: 5px;
}

.skill-title {
  font-family: "Roboto", sans-serif !important;
  color: #333333 !important;
  font-weight: bold;
  font-size: 1rem;
  line-height: 1.438rem;
}
.custom-progress-bar {
  background: #eeeeee !important;
  box-shadow: inset 1px 1px 2px rgba(174, 174, 192, 0.2),
    inset -1px -1px 1px rgba(255, 255, 255, 0.7) !important;
  border-radius: 12px !important;
}
// Skill tab
// about me
.about-me-title {
  font-family: "Poppins", sans-serif !important;
  color: #5843be !important;
  font-weight: bold !important;
}
// .about-me-text {
//   font-family: "Poppins", sans-serif !important;
//   color: #000000 !important;
// }
//about section
.about-me-child {
  background: linear-gradient(0deg, #fafafa, #fafafa) !important;
  box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.1) !important;
  border-radius: 30px !important;
  .card-about-left {
    .dob-text {
      font-family: "Open Sans" !important;
      font-style: normal;
      font-weight: normal;
      font-size: 14px;
      line-height: 25px;
      color: #5843be !important;
      @media screen and (max-width: 667px) {
        font-size: 17px;
        line-height: 16px;
      }
      span {
        font-family: "Poppins" !important;
        font-style: normal;
        font-weight: normal;
        font-size: 20px;
        line-height: 30px;
        color: #333333 !important;
        @media screen and (max-width: 667px) {
          font-size: 17px;
          line-height: 35px;
        }
      }
    }
  }
  .card-about-right {
    .overview-title {
      font-family: "Open Sans" !important;
      font-style: normal;
      font-weight: normal;
      font-size: 14px;
      line-height: 25px;
      color: #5843be !important;
      @media screen and (max-width: 667px) {
        font-size: 20px;
        line-height: 19px;
      }
    }
    .overview-text {
      font-family: "Open Sans" !important;
      font-size: 18px;
      line-height: 25px;
      color: #333333 !important;
      @media screen and (max-width: 667px) {
        font-size: 13px;
        line-height: 23px;
      }
    }
  }
}
// about me
//media
.audio-title {
  font-family: "Poppins", sans-serif !important;
  line-height: 27px;
}
.audio-duration {
  font-family: "Poppins", sans-serif !important;
  color: rgba(88, 67, 190, 0.55) !important;
  font-size: 0.75rem !important;
}
.video-duration {
  font-family: Poppins;
  position: absolute;
  bottom: 8px;
  left: 16px;
  font-size: 12px !important;
  border-radius: 3px;
}

.play-btn {
  img {
    width: 16px;
  }
}
.video-play-btn {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  img {
    width: 16px;
  }
}

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
.about-me-title-mobile {
  font-family: "Poppins" sans-serif !important;
  font-style: normal;
  font-weight: bold;
  font-size: 12px;
  line-height: 18px;
  color: #5843be;
}
.about-me-text-mobile {
  font-family: "Poppins" sans-serif !important;
  font-style: normal;
  font-weight: normal;
  font-size: 12px;
  line-height: 18px;
  color: #5843be !important;
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

//hobbies tab
.card-hobby {
  background: linear-gradient(0deg, #fafafa, #fafafa) !important;
  box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.1);
  border-radius: 20px !important;
  width: 323px;
  height: 130px;
  @media screen and (max-width: 599px) {
    width: 180px;
    height: 73px;
    img {
      width: 35.61px;
      height: 35.61px;
    }
  }
}

.hobby-title {
  font-family: "Poppins";
  font-size: 18px;
  line-height: 27px;
  text-transform: uppercase;
  color: #000000;
  word-break: break-word;
  @media screen and (max-width: 599px) {
    font-size: 14px;
    line-height: 21px;
  }
}

.card-reference {
  width: 753px;
  height: 339px;
  background: linear-gradient(0deg, #fafafa, #fafafa) !important;
  box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.1);
  border-radius: 30px !important;
  font-family: "Open Sans" !important;
  @media screen and (max-width: 599px) {
    width: auto;
    height: auto;
  }
  .reference-title {
    font-weight: bold;
    font-size: 30px;
    line-height: 41px;
    color: #333333 !important;
  }
  .reference-subtitle {
    font-size: 18px;
    line-height: 25px;
    color: #333333 !important;
  }
  .reference-address {
    font-size: 14px;
    line-height: 19px;
    /* identical to box height */
    text-decoration-line: underline;
    color: #5843be !important;
  }
  .reference-duration {
    font-size: 14px;
    line-height: 19px;
    color: #5843be !important;
  }
  .reference-desc {
    font-size: 18px;
    line-height: 23px;
    color: #333333;
  }
}
// hobbies tab

//achievement tab
.achievement-container {
  @media screen and (max-width: 959px) {
    margin: 0 !important;
    padding: 0 !important;
  }
  .card-achievement {
    background: linear-gradient(0deg, #fafafa, #fafafa);
    box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.1);
    border-radius: 30px !important;
    font-family: "Open Sans" !important;
    @media screen and (min-width: 1264px) and (max-width: 1903px) {
      width: auto !important;
      height: auto !important;
    }
    @media screen and (max-width: 599px) {
      width: 375px !important;
    }
    .title {
      font-weight: bold;
      font-size: 30px !important;
      line-height: 41px;
      color: #333333 !important;
      @media screen and (min-width: 1264px) and (max-width: 1903px) {
        font-size: 24px !important;
      }
      @media screen and (max-width: 599px) {
        font-size: 18px !important;
        line-height: 25px;
      }
      span {
        font-size: 14px !important;
        line-height: 19px !important;
        color: #4c4c4c !important;
      }
    }
    .subtitle {
      font-size: 18px;
      line-height: 25px;
      color: #333333 !important;
    }
    .address {
      font-size: 14px;
      line-height: 19px;
      /* identical to box height */
      text-decoration-line: underline;
      color: #5843be !important;
    }
    .year {
      font-size: 18px;
      line-height: 25px;
      color: #4c4c4c !important;
      @media screen and (min-width: 1264px) and (max-width: 1903px) {
        font-size: 14px;
        line-height: 18px;
      }
      @media screen and (max-width: 599px) {
        font-size: 14px;
      }
    }
    .desc {
      font-size: 18px;
      line-height: 23px;
      color: #333333;
      @media screen and (min-width: 1264px) and (max-width: 1903px) {
        font-size: 14px;
        line-height: 18px;
      }
    }
    img {
      @media screen and (min-width: 1264px) and (max-width: 1903px) {
        width: 50%;
        height: auto;
      }
      @media screen and (min-width: 600px) and (max-width: 959px) {
        width: 321px;
        height: 248px;
        margin-top: 11px;
      }
      @media screen and (max-width: 599px) {
        width: 104px;
        height: 81px;
      }
    }
  }
}

//achievement tab
</style>

<style>
#resumeTheme206 .v-progress-linear__determinate {
  border-color: #eeeeee !important;
}

#resumeTheme206 .v-progress-linear__background {
  background: #eeeeee !important;
  box-shadow: inset 1px 1px 2px rgba(174, 174, 192, 0.2),
    inset -1px -1px 1px rgba(255, 255, 255, 0.7) !important;
}

/* #resumeTheme206 .v-slide-group__prev.v-slide-group__prev--disabled {
  display: none !important;
} */
</style>
