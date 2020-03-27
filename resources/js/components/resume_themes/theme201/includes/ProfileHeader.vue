<template>
  <v-layout row wrap>
    <v-flex xs12 class="hidden-sm-and-up">
      <v-card class flat>
        <v-list-item two-line>
          <v-list-item-avatar size="85">
            <v-img src="/images/resume_themes/theme201/Screenshot_1 1.png"></v-img>
          </v-list-item-avatar>
          <v-list-item-content>
            <v-list-item-title class="headline title-text">Beverly Andrews</v-list-item-title>
            <v-list-item-subtitle>User interface designer</v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>
      </v-card>
    </v-flex>

    <v-flex sm8 md8 class="hidden-xs-only custom-name-row">
      <v-card class flat>
        <v-card-text>
          <v-list-item>
            <v-layout row wrap>
              <v-flex xs3 md3 sm3 class="mobile-center">
                <v-avatar size="120">
                  <v-img src="/images/resume_themes/theme201/Screenshot_1 1.png"></v-img>
                </v-avatar>
              </v-flex>

              <v-flex xs9 md6 sm9 class="mobile-center custom-name-section">
                <v-list-item class="ml-sm-2">
                  <v-list-item-content class="title-row">
                    <v-list-item-title class="headline title-text ml-sm-1">
                      <span class="title-text-tablet">Beverly Andrews</span>
                    </v-list-item-title>

                    <v-list-item-subtitle class="subtitle-text mt-sm-n2 ml-sm-1">User interface designer</v-list-item-subtitle>
                    <div class="profile-btn mt-sm-2">
                      <v-btn
                        class="ml-n1 mr-md-4 mr-sm-3 custom-btn hidden-sm-and-down"
                        fab
                        dark
                        color="black"
                      >
                        <v-icon>mdi-email</v-icon>
                      </v-btn>

                      <!-- hidden in medium devices -->
                      <v-btn class="mr-md-4 mr-sm-3 custom-btn hidden-md-and-up" fab dark color="black">
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

              <v-flex sm12 md3 class="hidden-sm-and-down">
                <div class="social-icon">
                  <v-btn class="mx-2 custom-btn" fab dark small color="black">
                    <v-icon>mdi-map-marker</v-icon>
                  </v-btn>
                  <v-btn class="mx-2 custom-btn" fab dark small color="black">
                    <img width="14" src="/images/resume_themes/theme201/social_icons/whatsapp.webp" />
                  </v-btn>
                  <v-btn class="mx-2 custom-btn" fab dark small color="black">
                    <img
                      width="16"
                      src="/images/resume_themes/theme201/social_icons/google-plus.webp"
                    />
                  </v-btn>
                </div>
              </v-flex>
            </v-layout>
          </v-list-item>
        </v-card-text>
      </v-card>
    </v-flex>

    <v-flex xs12 sm4 md4 class="hidden-sm-and-down mobile-center">
      <v-card flat>
        <v-card-text>
          <div class="btn-align">
            <v-btn class="mx-2 custom-btn" fab dark small color="black">
              <v-icon style="font-size:14px !important;">fa-behance</v-icon>
            </v-btn>
            <v-btn class="mx-2 custom-btn" fab dark small color="black">
              <img width="16" src="/images/resume_themes/theme201/social_icons/dribbble.webp" />
            </v-btn>
            <v-btn class="mx-2 custom-btn" fab dark small color="black">
              <img width="14" src="/images/resume_themes/theme201/social_icons/instagram.webp" />
            </v-btn>
            <v-btn class="mx-2 custom-btn" fab dark small color="black">
                <img width="12" src="/images/resume_themes/theme201/social_icons/linkedin.webp" />
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
              <v-icon>fa-linkedin</v-icon>
            </v-btn>
            <v-btn class="mx-2" fab dark color="black">
              <img width="20" src="/images/resume_themes/theme201/social_icons/whatsapp.webp" />
            </v-btn>

            <v-btn class="mx-2" fab dark color="black">
              <v-icon>fa-behance</v-icon>
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
            <v-btn class="mx-1" fab small dark color="black">
              <v-icon>mdi-google-plus</v-icon>
            </v-btn>
            <v-btn class="mx-1" fab small dark color="black">
              <v-icon style="font-size:12px;">fa-linkedin</v-icon>
            </v-btn>
            <v-btn class="mx-1" fab dark small color="black">
              <img width="14" src="/images/resume_themes/theme201/social_icons/whatsapp.webp" />
            </v-btn>

            <v-btn class="mx-1" fab dark small color="black">
              <v-icon style="font-size:12px !important;">fa-behance</v-icon>
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
        style="overflow-x: hidden !important;"
        v-model="hireMeModal"
        persistent
        max-width="600"
      >
        <v-card>
          <v-card-title class="headline">
            <v-spacer></v-spacer>
            <v-btn fab class="hidden-sm-and-up" icon @click="hireMeModal=false">
              <img width="25" src="/images/resume_themes/theme201/close.png" />
            </v-btn>
          </v-card-title>

          <v-card-text align="center">
            <v-container style="max-width: 1785px;">
              <v-row justify="center" align="center">
                <v-col cols="5" sm="3" md="3">
                  <div class="font-weight-bold custom-modal-title">$35</div>
                  <div class="custom-modal-subtitle">hourly rate</div>
                </v-col>
                <div class="vertical-line mx-2"></div>
                <v-col cols="5" sm="3" md="3">
                  <div class="font-weight-bold custom-modal-title">35 HOURS</div>
                  <div class="custom-modal-subtitle">weekly availibility</div>
                </v-col>
                <v-col cols="6" sm="3" md="3">
                  <v-btn depressed class="text-capitalize btn-hire-me" color="#1D1D1D" dark>Hire Me</v-btn>
                </v-col>
                <v-col align="right" class="hidden-xs-only" sm="2" md="2">
                  <v-btn fab class icon @click="hireMeModal=false">
                    <img width="30" src="/images/resume_themes/theme201/close.png" />
                  </v-btn>
                </v-col>
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
      hireMeModal: false
    };
  }
};
</script>

<style scoped lang="scss">
.custom-modal-title{
  color: #000000 !important;
}
.custom-modal-subtitle{
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

@media screen and (min-width: 747px) and (max-width: 754px) {
  .custom-name-section {
    margin-left: -57px;
  }
}
</style>

