<template>
  <v-layout row wrap v-if="user.personal_info">
    <v-flex xs12 class="hidden-sm-and-up">
      <v-card class flat color="transparent">
        <v-list-item two-line>
          <v-list-item-avatar size="85">
            <v-img :src="user.personal_info.profile_pic"></v-img>
          </v-list-item-avatar>
          <v-list-item-content>
            <v-list-item-title
              class="headline title-text"
              style="overflow:visible !important;"
            >{{user.personal_info.full_name}}</v-list-item-title>
            <v-list-item-subtitle style="color:black;">{{user.personal_info.designation}}</v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>
      </v-card>
    </v-flex>

    <v-flex sm12 md8 class="hidden-xs-only">
      <v-card class="mx-auto" flat color="transparent">
        <v-card-text>
          <v-layout row justify-space-between>
            <v-flex xs9 md11 sm9 class="mobile-center">
              <v-list-item class>
                <v-list-item-avatar size="120">
                  <v-img :src="user.personal_info.profile_pic"></v-img>
                </v-list-item-avatar>
                <v-list-item-content class="title-row">
                  <v-list-item-title class="headline title-text ml-sm-1">
                    <span class="title-text-tablet">{{user.personal_info.full_name}}</span>
                    <span class="ml-md-6 hidden-sm-and-down">
                      <v-btn
                        class="mx-2 custom-btn"
                        style="margin-top:-13px !important;"
                        fab
                        dark
                        small
                        color="black"
                      >
                        <v-icon>mdi-map-marker</v-icon>
                      </v-btn>
                      <v-btn
                        class="mx-2 custom-btn"
                        fab
                        dark
                        small
                        color="black"
                        style="margin-top:-13px !important;"
                      >
                        <img
                          width="14"
                          src="/images/resume_themes/theme201/social_icons/whatsapp.webp"
                        />
                      </v-btn>
                      <v-btn
                        class="mx-2 custom-btn"
                        fab
                        dark
                        small
                        color="black"
                        style="margin-top:-13px !important;"
                      >
                        <img
                          width="16"
                          src="/images/resume_themes/theme201/social_icons/google-plus.webp"
                        />
                      </v-btn>
                    </span>
                  </v-list-item-title>

                  <v-list-item-subtitle
                    class="subtitle-text mt-sm-n2 ml-sm-1"
                  >{{user.personal_info.designation}}</v-list-item-subtitle>
                  <div class="profile-btn mt-sm-2 NoDecor">
                    <v-btn
                      :href="'mailto:' + user.personal_info.email"
                      class="ml-n1 mr-md-4 mr-sm-3 custom-btn hidden-sm-and-down"
                      fab
                      dark
                      color="black"
                    >
                      <v-icon>mdi-email</v-icon>
                    </v-btn>

                    <!-- hidden in medium devices -->
                    <v-btn
                      class="mr-md-4 mr-sm-3 custom-btn hidden-md-and-up"
                      fab
                      dark
                      color="black"
                    >
                      <v-icon>mdi-email</v-icon>
                    </v-btn>
                    <!-- hidden in medium devices -->
                    <v-btn class="mr-md-4 mr-sm-3 custom-btn" fab dark small color="white">
                      <v-img
                        src="/images/resume_themes/theme201/pdf-download.png"
                        class="custom-icon"
                      ></v-img>
                    </v-btn>

                    <!-- Hire Me Btn -->
                    <v-btn
                      depressed
                      class="text-capitalize btn-hire-me hidden-xs-only"
                      color="#1D1D1D"
                      dark
                      @click="hireMeModal=true"
                    >Hire Me</v-btn>
                    <!-- Hire Me Btn -->
                  </div>
                </v-list-item-content>
              </v-list-item>
            </v-flex>
          </v-layout>
        </v-card-text>
      </v-card>
    </v-flex>

    <v-flex xs12 sm4 md3 offset-md1 class="hidden-sm-and-down mobile-center">
      <v-card flat>
        <v-card-text>
          <div class="btn-align">
            <v-btn
              class="mx-2 custom-btn"
              fab
              dark
              small
              color="black"
              :href="item.link"
              v-for="item in socialLinks"
              :key="item.id + '_link'"
              target="_blank"
              v-show="item.is_active"
            >
              <img
                width="16"
                :src="`/images/resume_themes/theme201/social_icons/${item.link_title.toLowerCase()}.webp`"
              />
            </v-btn>
          </div>
        </v-card-text>
      </v-card>
    </v-flex>

    <!-- For Tablet -->
    <v-flex sm12 xs12 class="tablet-mobile-social-icon d-none d-sm-flex d-md-none">
      <v-card flat>
        <v-card-text>
          <div class="tablet-align">
            <v-btn class="mx-2" fab dark color="black">
              <v-icon>mdi-map-marker</v-icon>
            </v-btn>
            <v-btn class="mx-2" fab dark color="black">
              <img width="20" src="/images/resume_themes/theme201/social_icons/google-plus.webp" />
            </v-btn>

            <v-btn class="mx-2" fab dark color="black">
              <img width="20" src="/images/resume_themes/theme201/social_icons/linkedin.webp" />
            </v-btn>

            <v-btn class="mx-2" fab dark color="black">
              <img width="20" src="/images/resume_themes/theme201/social_icons/whatsapp.webp" />
            </v-btn>

            <v-btn class="mx-2" fab dark color="black">
              <img width="22" src="/images/resume_themes/theme201/social_icons/dribbble.webp" />
            </v-btn>
          </div>
        </v-card-text>
      </v-card>
    </v-flex>
    <!-- For tablet view -->

    <!-- For Mobile -->
    <v-flex sm12 xs12 class="tablet-mobile-social-icon hidden-sm-and-up">
      <v-card flat>
        <v-card-text>
          <div class="mobile-align">
            <v-btn class="mx-1" fab small dark color="black">
              <v-icon>mdi-map-marker</v-icon>
            </v-btn>

            <v-btn class="mx-1" fab dark small color="black">
              <img width="14" src="/images/resume_themes/theme201/social_icons/google-plus.webp" />
            </v-btn>

            <v-btn class="mx-1" fab dark small color="black">
              <img width="14" src="/images/resume_themes/theme201/social_icons/linkedin.webp" />
            </v-btn>

            <v-btn class="mx-1" fab dark small color="black">
              <img width="14" src="/images/resume_themes/theme201/social_icons/behance.webp" />
            </v-btn>

            <v-btn class="mx-1" fab dark small color="black">
              <img width="14" src="/images/resume_themes/theme201/social_icons/whatsapp.webp" />
            </v-btn>

            <v-btn class="mx-1" fab small dark color="black">
              <img width="14" src="/images/resume_themes/theme201/social_icons/dribbble.webp" />
            </v-btn>
          </div>
        </v-card-text>
      </v-card>
    </v-flex>
    <!-- For mobile view -->

    <!-- for xs devices only -->
    <v-flex sm12 xs12 class="tablet-mobile-social-icon hidden-sm-and-up">
      <v-card flat>
        <v-card-text>
          <v-btn class="mx-2 custom-btn" fab dark color="black">
            <v-icon>mdi-email</v-icon>
          </v-btn>

          <v-btn class="mx-2 custom-btn" fab dark small color="white">
            <v-img src="/images/resume_themes/theme201/pdf-download.png" class="custom-icon"></v-img>
          </v-btn>

          <!-- Hire Me Btn -->
          <v-btn
            depressed
            class="text-capitalize btn-hire-me hidden-sm-and-up mt-3"
            color="#1D1D1D"
            dark
            @click="hireMeModal=true"
          >Hire Me</v-btn>
          <!-- Hire Me Btn -->
        </v-card-text>
      </v-card>
    </v-flex>
    <!-- for xs devices only -->
    <!-- Hire Me Modal -->
    <div>
      <v-dialog
        class="hireMeModal"
        style="overflow-x: hidden !important;border-radius:30px;"
        v-model="hireMeModal"
        persistent
        max-width="800"
      >
        <v-card>
          <v-card-title class="headline">
            <v-spacer></v-spacer>
            <v-btn fab class="hidden-md-and-up" icon @click="hireMeModal=false">
              <img width="25" src="/images/resume_themes/theme201/close.png" />
            </v-btn>
          </v-card-title>

          <v-card-text align="center">
            <v-container style="max-width: 1785px;">
              <v-row justify="center" align="center">
                <!-- new 1st column -->
                <v-col cols="12" sm="8" md="2">
                  <v-row no-gutters>
                    <v-col cols="4" md="12">
                      <span class="hire-modal-contact-type">MONTHLY</span>
                    </v-col>
                    <v-col cols="4" md="12">
                      <span class="hire-modal-contact-type custom-active">WEEKLY</span>
                    </v-col>
                    <v-col cols="4" md="12">
                      <span class="hire-modal-contact-type">HOURLY</span>
                    </v-col>
                  </v-row>
                </v-col>
                <!-- new 1st column -->
                <!-- Column 1 -->
                <v-col cols="5" sm="6" md="2">
                  <div>Rate $USD</div>
                  <!-- <div class="custom-modal-subtitle">{{user.payment_info.salary_frequency}} rate</div> -->
                  <div class="font-weight-bold custom-modal-title">${{user.payment_info.salary}}</div>
                </v-col>
                <!-- Column 1 -->
                <v-col cols="12" sm="8" md="2">
                  <v-row no-gutters>
                    <v-col cols="4" md="12">
                      <span class="hire-modal-contact-type">MONTHLY</span>
                    </v-col>
                    <v-col cols="4" md="12">
                      <span class="hire-modal-contact-type custom-active">WEEKLY</span>
                    </v-col>
                    <v-col cols="4" md="12">
                      <span class="hire-modal-contact-type">HOURLY</span>
                    </v-col>
                  </v-row>
                </v-col>
                <!-- 2nd Column -->
                <v-col cols="12" sm="8" md="3">
                  <!-- <div
                    class="custom-modal-subtitle"
                  >{{user.payment_info.available_hours_frequency}} availability</div>-->
                  <div class>Availibility hours</div>
                  <div
                    class="font-weight-bold custom-modal-title"
                  >{{user.payment_info.available_hours}} HOURS</div>
                </v-col>
                <!-- 3rd column -->
                <v-col cols="12" sm="12" md="2">
                  <v-btn depressed class="text-capitalize btn-hire-me" color="#1D1D1D" dark>Hire Me</v-btn>
                </v-col>
                <!-- 3rd column -->
                <!-- 4th column -->
                <v-col  align="right" class="hidden-sm-and-down" sm="2" md="1">
                  <v-btn fab class icon @click="hireMeModal=false">
                    <img width="30" src="/images/resume_themes/theme201/close.png" />
                  </v-btn>
                </v-col>
                <!-- 4th column-->
              </v-row>
            </v-container>
          </v-card-text>
        </v-card>
      </v-dialog>
    </div>

    <!-- Hire Me Modal -->
  </v-layout>
</template>

<script>
export default {
  data() {
    return {
      hireMeModal: false,
      currentUser: {}
    };
  },
  computed: {
    user() {
      return this.$store.state.themeUser;
    },
    socialLinks() {
      return this.user.links.filter(link => {
        return link.category === "social_link" ? link : false;
      });
    }
  },
  methods: {
    getProviderLink(provider) {
      let links = this.user.links;
      let providerLink = "";
      links.forEach(link => {
        if (link.category === "social_link") {
          if (link.link_title.toLowerCase() === provider.toLowerCase()) {
            providerLink = link.link;
          }
        }
      });

      return providerLink;
    },
    sendEmail() {}
  },
  mounted() {}
};
</script>

<style scoped lang="scss">
.custom-modal-title {
  font-size: 1rem;
  color: #000000 !important;
  line-height: 30px;
}
.custom-modal-subtitle {
  font-size: 12px !important;
}
.custom-mobile-icon {
  margin-left: -12px !important;
}
.btn-hire-me {
  border-radius: 50px !important;
  font-size: 12px !important;
  width: 100px;
  height: 31px !important;
  margin-top: 3px;
}
.v-dialog {
  overflow-x: hidden !important;
  overflow-y: hidden !important;
  border-radius: 30px !important;
}

.vertical-line {
  border-left: 1.5px solid grey;
  height: 30px;
  margin-top: 20px;
}

.hire-modal-contact-type {
  font-size: 14px;
  color: #1d1d1d !important;
  line-height: 19px;
  letter-spacing: 0.05rem;
  text-transform: uppercase;
}
.custom-active {
  font-weight: 800 !important;
}

@media screen and (min-width: 747px) and (max-width: 754px) {
  .custom-name-section {
    margin-left: -57px;
  }
}
</style>

<style>
#resumeTheme201 .v-dialog {
  border-radius: 30px;
}
</style>

