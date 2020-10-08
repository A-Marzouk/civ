<template>
  <v-app>
    <v-container fluid ma-0 pa-0 style="background-color: #f1f1f1">
      <v-row class="borpad pt-md-4" no-gutters justify-sm="end">
        <v-col md="6" sm="12" cols="12">
          <v-container>
            <v-row
              no-gutters
              justify="center"
              :class="{ 'active-indicator': currentTab === 'profile' }"
            >
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
                <div class="user-name font-weight-regular">
                  {{ currentUser.personal_info.first_name }}
                  {{ currentUser.personal_info.last_name }}
                </div>
                <div class="job-title py-2 pb-sm-2">
                  {{ currentUser.personal_info.designation }}
                </div>
                <div class="bio padrgt">
                  {{ currentUser.personal_info.about }}
                </div>
              </v-col>
            </v-row>
          </v-container>
        </v-col>
        <v-col
          md="6"
          sm="10"
          cols="12"
          class="hidden-sm-only"
          :class="{ 'active-indicator': currentTab === 'pay-availability' }"
        >
          <v-container>
            <v-row>
              <v-col md="6">
                <v-row no-gutters justify="center" class="hidden-xs-only">
                  <v-col cols="5" md="5" lg="5" align="center">
                    <v-img
                      class="info-img"
                      src="/images/resume_themes/theme5/time.svg"
                      alt
                    ></v-img>
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
                        <span class="title" v-if="available == index">
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
                  </v-col>
                  <v-col cols="2" md="1" align="center">
                    <div
                      style="
                        width: 2px;
                        height: 2.5rem;
                        background-color: #cbcbcb;
                        margin-top: 50%;
                      "
                    ></div>
                  </v-col>
                  <v-col cols="5" md="5" lg="5" align="center">
                    <v-img
                      class="info-img"
                      src="/images/resume_themes/theme5/payment.svg"
                      alt
                    ></v-img>

                    <div>
                      <v-icon small @click="paymentInfoPrev()"
                        >navigate_before</v-icon
                      >
                      <div
                        v-for="(payment_Info,
                        index) in currentUser.payment_info"
                        :key="index"
                        v-show="payment_Info.is_public"
                        class="d-inline-block"
                      >
                        <span class="title" v-if="paymentInfo == index">
                          {{ payment_Info.salary_frequency }}
                        </span>
                      </div>
                      <v-icon small @click="paymentInfoNext()"
                        >navigate_next</v-icon
                      >
                    </div>
                    <div>
                      <div
                        v-for="(payment_Info,
                        index) in currentUser.payment_info"
                        :key="index"
                        v-show="payment_Info.is_public"
                      >
                        <span class="title" v-if="paymentInfo == index">
                          $ {{ payment_Info.salary }}
                        </span>
                      </div>
                    </div>
                  </v-col>
                  <v-col cols="8" align="center" class="mt-4">
                    <v-btn
                      dark
                      style="
                        height: 60px;
                        width: 202px;
                        border-radius: 6px;
                        background: #fc5185;
                        box-shadow: #fc7ea4 0px 10px 30px -8px;
                      "
                      @click.prevent="hireMeModal = !hireMeModal"
                    >
                      <img
                        style="width: 22.5px; height: 18px; margin-right: 7.5px"
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
                      <v-icon small @click="paymentInfoPrev()"
                        >navigate_before</v-icon
                      >
                      <div
                        v-for="(payment_Info,
                        index) in currentUser.payment_info"
                        :key="index"
                        v-show="payment_Info.is_public"
                        class="d-inline-block"
                      >
                        <span class="title" v-if="paymentInfo == index">
                          {{ payment_Info.salary_frequency }}
                        </span>
                      </div>
                      <v-icon small @click="paymentInfoNext()"
                        >navigate_next</v-icon
                      >
                    </div>
                    <div class="headline font-weight-bold txtcol">
                      <div
                        v-for="(payment_Info,
                        index) in currentUser.payment_info"
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
                      style="
                        width: 2px;
                        height: 2.2rem;
                        background: rgba(31, 93, 228, 0.4);
                        margin-top: 30%;
                      "
                    ></div>
                  </v-col>
                  <v-col cols="5" align="center">
                    <div class="subtitle-1">Available for</div>
                    <div class="headline font-weight-bold txtcol">
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
                      style="
                        height: 60px;
                        width: 202px;
                        border-radius: 6px;
                        background: #fc5185;
                        box-shadow: rgba(252, 81, 133, 0.4) 0px 10px 30px -8px;
                      "
                      @click.prevent="hireMeModal = !hireMeModal"
                    >
                      <img
                        style="width: 22.5px; height: 18px; margin-right: 7.5px"
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
                      style="
                        height: 50px;
                        width: 150px;
                        border-radius: 6px;
                        background: #5f45ff;
                        box-shadow: #9180ff 0px 10px 30px -8px;
                      "
                      @click.stop="audioModal = true"
                      dark
                      class="mx-1 ct-buttom-mrg"
                    >
                      <img
                        src="/images/resume_themes/theme5/call.svg"
                        alt="voice call"
                        style="width: 18px; height: 18px; margin-right: 7.5px"
                      />
                      <div class="text-capitalize" style="font-size: 14px">
                        Audio
                      </div>
                    </v-btn>

                    <v-btn
                      class="mx-1"
                      style="
                        height: 50px;
                        width: 150px;
                        border-radius: 6px;
                        background: #e7e5f6;
                        box-shadow: #e7e5f6 0px 10px 30px -8px;
                      "
                      @click.stop="videoModal = true"
                    >
                      <img
                        src="/images/resume_themes/theme5/video.svg"
                        alt="video call"
                        style="width: 27px; height: 18px; margin-right: 7.5px"
                      />

                      <div
                        class="text-capitalize"
                        style="font-size: 14px; color: #5f45ff"
                      >
                        Video
                      </div>
                    </v-btn>
                  </v-col>

                  <v-col cols="12" class="text-center hidden-sm-and-up">
                    <div class="text-center my-2">Take an interview</div>
                    <v-btn
                      style="
                        height: 50px;
                        width: 150px;
                        border-radius: 6px;
                        background: #5f45ff;
                        box-shadow: #9180ff 0px 10px 30px -8px;
                      "
                      @click.stop="audioModal = true"
                      dark
                      class="mx-1 ct-buttom-mrg"
                    >
                      <img
                        src="/images/resume_themes/theme5/call.svg"
                        alt="voice call"
                        style="width: 18px; height: 18px; margin-right: 7.5px"
                      />
                      <div class="text-capitalize" style="font-size: 14px">
                        Audio
                      </div>
                    </v-btn>

                    <v-btn
                      class="mx-1"
                      style="
                        height: 50px;
                        width: 150px;
                        border-radius: 6px;
                        background: #e7e5f6;
                        box-shadow: #e7e5f6 0px 10px 30px -8px;
                      "
                      @click.stop="videoModal = true"
                    >
                      <img
                        src="/images/resume_themes/theme5/video.svg"
                        alt="video call"
                        style="width: 27px; height: 18px; margin-right: 7.5px"
                      />

                      <div
                        class="text-capitalize"
                        style="font-size: 14px; color: #5f45ff"
                      >
                        Video
                      </div>
                    </v-btn>
                  </v-col>
                </v-row>
                <v-row no-gutters justify="center" class="mt-6">
                  <v-col cols="12">
                    <SocialLinks :currentUser="currentUser"></SocialLinks>
                  </v-col>
                </v-row>
              </v-col>
            </v-row>
          </v-container>
        </v-col>
        <v-col
          sm="10"
          class="d-none d-sm-flex d-md-none"
          :class="{ 'active-indicator': currentTab === 'pay-availability' }"
        >
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
                      style="
                        width: 2px;
                        height: 1.5rem;
                        background-color: #cbcbcb;
                        margin-top: 20%;
                        margin: auto;
                      "
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
                          v-for="(payment_Info,
                          index) in currentUser.payment_info"
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
                          v-for="(payment_Info,
                          index) in currentUser.payment_info"
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
                    <SocialLinks :currentUser="currentUser"></SocialLinks>
                  </v-col>
                </v-row>
              </v-col>
              <v-col md="6">
                <v-row no-gutters justify="center">
                  <v-col cols="12" class="text-center">
                    <v-btn
                      dark
                      style="
                        height: 60px;
                        width: 202px;
                        border-radius: 6px;
                        background: #fc5185;
                        box-shadow: #fc7ea4 0px 10px 30px -8px;
                      "
                      @click.prevent="hireMeModal = !hireMeModal"
                    >
                      <img
                        style="width: 22.5px; height: 18px; margin-right: 7.5px"
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
                      style="
                        height: 60px;
                        width: 93px;
                        border-radius: 6px;
                        background: #5f45ff;
                        box-shadow: #9180ff 0px 10px 30px -8px;
                      "
                      @click.stop="audioModal = true"
                      dark
                      class="mx-1"
                    >
                      <img
                        src="/images/resume_themes/theme5/call.svg"
                        alt="voice call"
                        style="width: 18px; height: 18px; margin-right: 7.5px"
                      />
                    </v-btn>

                    <v-btn
                      class="mx-1"
                      style="
                        height: 60px;
                        width: 93px;
                        border-radius: 6px;
                        background: #e7e5f6;
                        box-shadow: #e7e5f6 0px 10px 30px -8px;
                      "
                      @click.stop="videoModal = true"
                    >
                      <img
                        src="/images/resume_themes/theme5/video.svg"
                        alt="video call"
                        style="width: 27px; height: 18px; margin-right: 7.5px"
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
      <v-row class="borpad" no-gutters style="height: 100%">
        <v-col md="12" sm="12" cols="12">
          <v-container fluid ma-0 pa-0 style="max-width: 100%">
            <v-row no-gutters justify="center">
              <v-col
                md="10"
                cols="11"
                sm="11"
                style="
                  background-color: #f1f1f1;
                  margin: 1rem;
                  border-radius: 5px;
                  padding: 1rem;
                "
                class="text-center"
              >
                <v-tabs background-color="transparent" hide-slider centered>
                  <v-tab
                    v-for="tab in tabs"
                    :key="tab.value"
                    @click="activeTab = tab.value"
                    :class="{ 'active-indicator': currentTab === tab.value }"
                  >
                    <span v-if="tab.value === activeTab" class="left">[</span>
                    {{ tab.text }}
                    <span v-if="tab.value === activeTab" class="right">]</span>
                  </v-tab>
                </v-tabs>
              </v-col>
            </v-row>
          </v-container>
        </v-col>
        <v-col md="12" sm="12" cols="12" class="mt-4">
          <v-container fluid ma-0 pa-0 style="max-width: 100%">
            <v-row no-gutters justify="center">
              <v-col v-if="activeTab === 'portfolio'" md="11" sm="11" cols="11">
                <v-row no-gutters justify="center">
                  <v-col
                    md="4"
                    sm="12"
                    cols="12"
                    v-for="project in currentUser.projects"
                    :key="project.id + '_project'"
                    class="pa-4"
                    align="center"
                    v-show="project.is_public"
                  >
                    <ImagesCarouselModal :images="project.images">
                      <v-img
                              :src="getProjectMainImage(project)"
                              alt="portfolio img"
                              :aspect-ratio="1.2"
                              cover
                      ></v-img>
                    </ImagesCarouselModal>
                  </v-col>
                </v-row>
              </v-col>
              <v-col
                v-if="activeTab === 'work-experience'"
                md="6"
                sm="12"
                cols="12"
                class="pb-12"
              >
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
                          style="color: rgba(0, 0, 0, 0.87)"
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

              <v-col
                v-if="activeTab === 'education'"
                md="11"
                sm="11"
                cols="11"
                class="pb-12"
              >
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
                      <div class="subtitle-2 pb-1" style="color: #1f5de4">
                        {{ education.university_name }},
                        {{ education.date_from }} - {{ education.date_to }}
                      </div>
                      <div class="subtitle-2 pb-2" style="color: #707070">
                        {{ education.degree_title }}
                      </div>
                    </v-card>
                  </v-col>
                </v-row>
              </v-col>
              <v-col v-if="activeTab === 'skills'" md="11" sm="11" cols="11">
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

              <!-- about section start -->
              <v-col
                v-if="activeTab === 'about'"
                md="10"
                sm="11"
                cols="11"
                class="pb-12"
              >
                <div class="about-container">
                  <!-- short info -->
                  <div class="short-info">
                    <div
                      class="short-info-item mb-4"
                      v-if="currentUser.personal_info.date_of_birth"
                    >
                      <div class="short-info-title">Date of Birth</div>
                      <div class="short-info-value">
                        {{ currentUser.personal_info.date_of_birth }}
                      </div>
                    </div>
                    <div
                      class="short-info-item mb-4"
                      v-if="currentUser.personal_info.nationality"
                    >
                      <div class="short-info-title">Nationality</div>
                      <div class="short-info-value">
                        {{ currentUser.personal_info.nationality }}
                      </div>
                    </div>
                    <div
                      class="short-info-item mb-4"
                      v-if="currentUser.personal_info.hometown"
                    >
                      <div class="short-info-title">Hometown</div>
                      <div class="short-info-value">
                        {{ currentUser.personal_info.hometown }}
                      </div>
                    </div>
                    <div
                      class="short-info-item mb-4"
                      v-if="currentUser.languages[0]"
                    >
                      <div class="short-info-title">Languages</div>
                      <div
                        class="short-info-value"
                        v-for="(language, i) in currentUser.languages"
                        :key="i"
                      >
                        {{ language.label }}
                      </div>
                    </div>
                  </div>

                  <!-- summary info -->
                  <div class="summary-info">
                    <div
                      class="summary-info-item mb-6"
                      v-if="currentUser.personal_info.overview"
                    >
                      <div class="summary_title">Overview Sumary</div>
                      <div class="summary_value">
                        {{ currentUser.personal_info.overview }}
                      </div>
                    </div>
                    <div
                      class="summary-info-item mb-6"
                      v-if="currentUser.personal_info.about"
                    >
                      <div class="summary_title">About Me</div>
                      <div class="summary_value">
                        {{ currentUser.personal_info.about }}
                      </div>
                    </div>
                    <div
                      class="summary-info-item mb-6"
                      v-if="currentUser.personal_info.quote"
                    >
                      <div class="summary_title">Quote</div>
                      <div class="summary_value">
                        {{ currentUser.personal_info.quote }}
                      </div>
                    </div>
                    <div
                      class="summary-info-item mb-6"
                      v-if="currentUser.personal_info.location"
                    >
                      <div class="summary_title">Location</div>
                      <div class="summary_value">
                        {{ currentUser.personal_info.location }}
                      </div>
                    </div>
                  </div>
                </div>
              </v-col>

              <!-- about section end -->

              <!-- hobbies -->
              <v-col
                v-if="activeTab === 'hobbies'"
                md="11"
                sm="11"
                cols="11"
                class="pb-12"
              >
                <div class="hobby-container">
                  <div
                    class="hobby"
                    v-for="(hobby, index) in currentUser.hobbies"
                    :key="index"
                    v-show="hobby.is_public"
                  >
                    <div
                      class="hobby__layer"
                      :class="[
                        index % 2 === 0
                          ? 'hobby_item--even'
                          : 'hobby_item--odd',
                      ]"
                    ></div>

                    <div class="hobby__content">
                      <img
                        src="/images/resume_themes/theme5/ball.png"
                        class="hobby_img"
                        alt="hobby_img"
                      />
                      <div class="text-capitalize">{{ hobby.title }}</div>
                    </div>
                  </div>
                </div>
              </v-col>
              <!-- hobbies end-->

              <!-- references -->
              <v-col
                v-if="activeTab === 'references'"
                md="11"
                sm="11"
                cols="11"
                class="pb-12"
              >
                <div class="reference-container">
                  <div
                    class="reference__card"
                    v-for="(reference, index) in currentUser.references"
                    :key="index"
                    v-show="reference.is_public"
                  >
                    <div class="d-flex justify-space-between">
                      <!-- card left -->
                      <div>
                        <div class="ref__username font-weight-bold">
                          {{ reference.name }}
                        </div>
                        <div class="ref__position mb-3">
                          {{ reference.title }}
                        </div>

                        <div class="mb-6">
                          <div class="ref_smalltext">
                            <span class="ref_company font-weight-bold pr-2">{{
                              reference.company
                            }}</span>
                            {{ reference.created_at }}
                          </div>
                          <div class="ref_smalltext">
                            {{ reference.reference_text }}
                          </div>
                        </div>
                      </div>

                      <!-- card right -->
                      <div class="ref_address">
                        {{ reference.address }}
                      </div>
                    </div>
                    <div class="ref_smalltext">{{ reference.description }}</div>
                  </div>
                </div>
              </v-col>
              <!-- references end-->

              <!-- Achievement section -->
              <v-col
                v-if="activeTab === 'achievements'"
                md="11"
                sm="11"
                cols="11"
                class="pb-12"
              >
                <div class="achievement-container">
                  <div
                    class="achievement__card"
                    v-for="(achievement, index) in currentUser.achievements"
                    :key="index"
                    v-show="achievement.is_public"
                  >
                    <div class="achievement__content">
                      <!-- card left -->
                      <img
                        class="achievement_img"
                        :src="achievement.image_src"
                        alt="certificate"
                      />
                      <!-- card right -->
                      <div>
                        <div class="award_title font-weight-bold">
                          {{ achievement.title }}
                        </div>
                        <div class="award_year mb-2">
                          {{ achievement.year }}
                        </div>
                        <div class="award_url font-weight-bold my-2">
                          URL: {{ achievement.url }}
                        </div>
                        <div class="award_desc">
                          {{ achievement.description }}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </v-col>
              <!-- Achievement end-->
            </v-row>

            <!-- video modal -->
            <v-dialog
              v-model="videoModal"
              max-width="1690"
              max-height="740"
              persistent
            >
              <v-card
                class="card-modal-video-holder pa-lg-10 pa-md-5 pa-sm-2 pa-0"
                align="center"
              >
                <div
                  class="audio-header video-2 d-flex justify-space-between mb-12"
                >
                  <div class="my-audio">My Video</div>

                  <img
                    style="height: 1.4rem; width: auto; cursor: pointer"
                    @click.stop="videoModal = false"
                    src="/images/resume_themes/theme5/close.png"
                    alt="close"
                  />
                </div>

                <div class="video-container">
                  <video-player
                    v-for="(video, i) in filterVideo(currentUser.media)"
                    :video_num="i"
                    :key="i"
                    :modalOpen="videoModal"
                    link="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4"
                  ></video-player>
                </div>
              </v-card>
            </v-dialog>
            <!-- Video modal end-->

            <!-- Audio Modal -->
            <v-dialog
              v-model="audioModal"
              :elevation="0"
              max-width="1690"
              persistent
              content-class="ct-dialog"
            >
              <div class="audio-modal-main-card">
                <div class="audio-header d-flex justify-space-between mb-12">
                  <div class="my-audio">My Audio</div>

                  <img
                    style="height: 1.4rem; width: auto; cursor: pointer"
                    @click.stop="audioModal = false"
                    src="/images/resume_themes/theme5/close.png"
                    alt="close"
                  />
                </div>

                <audio-player
                  :modalOpen="audioModal"
                  color="#FC5C8A"
                  v-for="(audio, i) in filterAudio(currentUser.media)"
                  :key="i"
                  :audio_num="i"
                  file="https://file-examples-com.github.io/uploads/2017/11/file_example_MP3_700KB.mp3"
                ></audio-player>
              </div>
            </v-dialog>
            <!-- Audio Modal -->
          </v-container>
        </v-col>
      </v-row>
      <!-- hire modal start -->

      <!--<hire-modal-->

      <updated-hire-modal
        @modalClosed="hireMeModal = false"
        :hireMeModal.sync="hireMeModal"
        :closeHireMeModal="closeHireMeModal"
        :user="currentUser"
      ></updated-hire-modal>

      <!-- hire modal end -->
    </v-container>
  </v-app>
</template>
<style lang="scss" scoped>
#resumeTheme5 {
  .theme--light.v-application {
    background: #f1f1f1;
    color: rgba(0, 0, 0, 0.87);
    height: 100vh;
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
  .job-title {
    font-size: 1.1rem;
    font-weight: 400;
  }

  .bio {
    font-size: 0.8rem;
    line-height: 23px;
    color: #6b6b6b;
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

  // hobbies section start -------

  .hobby-container {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-gap: calc(10px + 10%) calc(10px + 5%);
  }

  .hobby__layer {
    height: 8px;
    width: 100%;
    border-top-left-radius: 0.8rem;
    border-top-right-radius: 0.8rem;
  }

  .hobby__content {
    height: 5.4rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    font-weight: bold;
    background-color: #f8f8f8;
  }

  .hobby_img {
    height: 1.6rem;
    width: auto;
    margin-right: 10px;
  }

  .hobby_item--odd {
    background-color: #fc5185;
  }

  .hobby_item--even {
    background-color: #5f45ff;
  }

  //media quries ----
  @media only screen and (max-width: 1284px) {
    .hobby-container {
      grid-template-columns: repeat(2, 1fr);
    }
  }

  @media only screen and (max-width: 640px) {
    .hobby-container {
      grid-template-columns: repeat(1, 1fr);
      grid-gap: 2rem calc(10px + 5%);
    }
  }
  //media quries end ----

  // hobbies section end --------

  // reference section start ------

  .reference-container {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 20px 40px;
  }

  .reference__card {
    background-color: #f8f8f8;
    padding: 1.5rem 1rem;
    border-radius: 8px;
  }

  .detail__container {
    display: flex;
    justify-content: space-between;
  }

  .ref__username {
    font-size: 1.4rem;
    font-weight: 500;
  }

  .ref__position {
    font-size: 1rem;
    color: #1f5de4;
  }

  .ref_company {
    // font-weight: 500;
    color: #3c3748;
  }

  .ref_address {
    font-size: 0.8rem;
    color: #1f5de4;
    max-width: 42%;
  }

  .ref_smalltext {
    font-size: 0.8rem;
    color: #3c3748;
  }

  //about me section start

  .about-container {
    padding: 2.6rem 4rem;
    display: grid;
    grid-template-columns: 15% 85%;
    background-color: #f8f8f8;
    border-radius: 8px;
  }

  //short info start
  .short-info-title {
    color: #fc5185;
  }

  .short-info-value {
    color: #918f97;
    font-size: 1.2rem;
  }
  //short info end

  //summary info start

  .summary_title {
    color: #5f45ff;
  }

  .summary_value {
    color: #3c3748;
    font-size: 0.9rem;
  }

  //summary info end

  //media queries

  //md screen
  @media only screen and (max-width: 1060px) {
    .about-container {
      grid-template-columns: 22% 78%;
    }
  }

  //sm screen
  @media only screen and (max-width: 700px) {
    .about-container {
      grid-template-columns: 1fr;
      padding: 1rem 1rem;
    }

    .short-info {
      display: grid;
      grid-template-columns: 3.8fr 1fr;
    }
  }

  //about me section end

  //media queries
  @media only screen and (max-width: 850px) {
    .reference-container {
      grid-template-columns: repeat(1, 1fr);
      grid-gap: 20px 30px;
    }
  }

  //bottom margin
  @media only screen and (max-width: 1438px) and (min-width: 435px) {
    .ct-buttom-mrg {
      margin-bottom: 10px;
    }
  }

  @media only screen and (max-width: 365px) {
    .ct-buttom-mrg {
      margin-bottom: 10px;
    }
  }

  //media queries end ---

  // reference section end ------

  // Achievement section start
  .achievement-container {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 20px 40px;
  }

  .achievement__content {
    display: flex;
  }

  .achievement__card {
    padding: 1.8rem 1rem;
    background-color: #f8f8f8;
    border-radius: 8px;
  }

  .achievement_img {
    height: 8.1rem;
    width: auto;
    margin-right: 2rem;
  }

  .award_title {
    font-size: 1.3rem;
    font-weight: 500;
    color: #3c3748;
  }

  .award_year {
    font-size: 0.8rem;
    color: #1f5de4;
  }

  .award_url {
    font-size: 1rem;
    color: #3c3748;
  }

  .award_desc {
    font-size: 0.8rem;
  }

  //media queries
  @media only screen and (max-width: 1184px) {
    .achievement-container {
      grid-template-columns: repeat(1, 1fr);
      grid-gap: 20px 30px;
      max-width: 38rem;
      margin: 0 auto;
    }
  }

  @media only screen and (max-width: 522px) {
    .achievement__content {
      display: block;
    }

    .achievement_img {
      margin: 0 auto;
      margin-bottom: 1rem;
    }
  }
  // Achievement section end

  // audio video modals start
  .ct-dialog {
    border-radius: 2rem;
    background-color: rgb(248, 237, 80) !important;
  }

  .my-audio {
    font-size: 1.6rem;
    font-weight: 700;
    color: #5f45ff;
  }

  .card-modal-video-holder {
    padding: 3rem 5.5rem;

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
  }

  .video-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 1.4rem;
  }

  .audio-modal-main-card {
    min-height: 500px;
    padding: 3rem 4rem;
    background-color: #ffffff;

    @media screen and (max-width: 599px) {
      padding: 1.5rem;
    }
  }

  .audio-slick .slick-list {
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

  // small screen

  @media screen and (max-width: 1297px) {
    .card-modal-video-holder {
      padding: 1.4rem;
    }

    .video-container {
      padding: 1rem;
      grid-template-columns: repeat(2, 1fr);
    }
  }

  @media screen and (max-width: 900px) {
    .video-container {
      grid-template-columns: repeat(1, 1fr);
    }

    .video-2 {
      padding: 1rem;
    }
  }

  // audio video modals end
}
</style>


<script>
import Slick from "vue-slick";
import VueSlickCarousel from "vue-slick-carousel";
import AudioPlayer from "./media/AudioPlayer";
import VideoPlayer from "./media/VideoPlayer";
import UpdatedHireModal from "../includes/HireMeModal";
import SocialLinks from "./SocialLinks";
import ImagesCarouselModal from "../reusable/ImagesCarouselModal";

export default {
  name: "theme8",
  props: ["user", "is_preview", "currentTab"],
  components: {
    Slick,
    VueSlickCarousel,
    AudioPlayer,
    VideoPlayer,
    "updated-hire-modal": UpdatedHireModal,
    SocialLinks,
    ImagesCarouselModal
  },
  data() {
    return {
      windowWidth: window.innerWidth,
      hireMeModal: false,
      videoModal: false,
      audioModal: false,
      tabs: [
        {
          text: "Portfolio",
          value: "portfolio",
        },
        {
          text: "Work Ex.",
          value: "work-experience",
        },
        {
          text: "Education",
          value: "education",
        },
        {
          text: "Skills",
          value: "skills",
        },
        {
          text: "About",
          value: "about",
        },
        {
          text: "Hobbies",
          value: "hobbies",
        },
        {
          text: "References",
          value: "references",
        },
        {
          text: "Achievements",
          value: "achievements",
        },
      ],
      available: 0,
      activeTab: "portfolio",
      paymentInfo: 0,

      skillColor: [
        {
          color: "#3C327B",
        },
        {
          color: "#FF26BE",
        },
        {
          color: "#D291FF",
        },
        {
          color: "#FF7C00",
        },
        {
          color: "#0D47A1",
        },
        {
          color: "#004D40",
        },
        {
          color: "#3C327B",
        },
        {
          color: "#FF26BE",
        },
        {
          color: "#D291FF",
        },
        {
          color: "#FF7C00",
        },
        {
          color: "#0D47A1",
        },
        {
          color: "#004D40",
        },
        {
          color: "#3C327B",
        },
        {
          color: "#FF26BE",
        },
        {
          color: "#D291FF",
        },
        {
          color: "#FF7C00",
        },
        {
          color: "#0D47A1",
        },
        {
          color: "#004D40",
        },
      ],

      //audio Modal
      slickOptionsAudioModal: {
        infinite: false,
        dots: true,
        arrows: false,
        slidesPerRow: 1,
        slidesToScroll: 1,
        rows: 3,
      },
      currentUser: this.user,
    };
  },
  watch: {
    // if current tab changed, change the active tab as well.
    currentTab: function (val) {
      this.activeTab = val;
    },
  },
  methods: {
    goToExternalLink(link) {
      if (!link.includes("http")) {
        link = "http://" + link;
      }
      window.location.href = link;
    },
    closeHireMeModal() {
      this.hireMeModal = false;
    },
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
    filterAudio(audios) {
      var filterArray = audios.filter((a) => a.type === "audio");
      return filterArray;
    },
    filterVideo(videos) {
      var filterArray = videos.filter((a) => a.type === "video");
      return filterArray;
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