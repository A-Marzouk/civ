<template>
  <v-app style="width:100%;">
    <v-container fluid ma-0 pa-0 style="width:100%;">
      <v-app-bar color="#fafafa" height="250">
        <v-avatar size="120" class="mr-5">
          <v-img src="/images/resume_themes/theme206/avatar.png"></v-img>
        </v-avatar>
        <div class="half-circle"></div>
        <v-container fluid pa-0 ma-0 style="width:100%">
          <v-row class align="center" justify="center">
            <v-col md="4">
              <v-card flat color="transparent">
                <v-card-title class="custom-profile-title">Muha Nishad Islam</v-card-title>
                <v-card-subtitle class="custom-profile-subtitle">Graphic Designer</v-card-subtitle>
                <v-card-text
                  class="custom-profile-text"
                >Donec a augue gravida, vulputate ligula et, pellentesque arcu. Morbi feugiat eros nec sem ultrices...</v-card-text>
              </v-card>
            </v-col>
            <v-col md="3">
              <!-- Hour rate -->
              <v-card class="d-flex flex-row hour-card" color="transparent" flat>
                <v-list-item two-line class>
                  <v-list-item-avatar size="18">
                    <img width="18" src="/images/resume_themes/theme206/icons/usd.png" />
                  </v-list-item-avatar>
                  <v-list-item-content>
                    <v-list-item-subtitle>
                      <v-card color="transparent" flat class="pa-0 ma-0">
                        <span class="hour-rate">Hour Rate</span>
                      </v-card>
                    </v-list-item-subtitle>
                    <v-list-item-subtitle>
                      <v-card color="transparent" flat>
                        <span class="rate">20</span>
                      </v-card>
                    </v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>

                <!-- Hour Rate -->
                <!-- Weekly availibility -->

                <v-list-item two-line class="ml-n10">
                  <v-list-item-avatar size="16">
                    <img width="16" src="/images/resume_themes/theme206/icons/watch.png" />
                  </v-list-item-avatar>
                  <v-list-item-content>
                    <v-list-item-subtitle>
                      <v-card color="transparent" flat>
                        <span class="hour-rate">Weekly availibility</span>
                      </v-card>
                    </v-list-item-subtitle>
                    <v-list-item-subtitle>
                      <v-card color="transparent" class="pa-0 ma-0" flat>
                        <span class="rate">250</span>
                      </v-card>
                    </v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
                <!-- Weekly availibility -->
              </v-card>
            </v-col>

            <!-- 3rd column -->
            <v-col md="5">
              <v-card flat color="transparent" class="pa-0 hire-me-card">
                <v-btn color="#FAFAFA" class="btn-hire-me" x-large>
                  <v-icon color="#5843BE" left>mdi-email</v-icon>Hire Me
                </v-btn>

                <!-- social buttons -->
                <v-btn
                  class="custom-social-btn mx-md-2"
                  v-for="item in socialIcons"
                  :key="item.title"
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
            <!-- 3rd column -->
          </v-row>
        </v-container>
      </v-app-bar>
    </v-container>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      socialIcons: [
        { id: 1, title: "twitter" },
        { id: 2, title: "facebook" },
        { id: 3, title: "instagram" }
      ]
    };
  },
  methods: {
    getSocialIcon(title) {
      return `/images/resume_themes/theme206/social_icons/${title}.webp`;
    }
  }
};
</script>

<style scoped lang="scss">
@import url("https://fonts.googleapis.com/css?family=Open+Sans&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

.half-circle {
  position: absolute;
  width: 136px;
  height: 68px; /* as the half of the width */
  border-radius: 100px 100px 0px 0;
  border-left: 5px solid #5843BE;
  border-right: 5px solid #5843BE;
  border-top: 5px solid #5843BE;
  margin-top:19px;
  margin-left: 22px;
  transform: rotate(122deg);
  
  z-index: 1;
}
.custom-profile-title {
  font-family: "Open Sans" !important;
  font-size: 2rem;
  line-height: 3.375rem;
  color: #333333 !important;
}

.custom-profile-subtitle {
  font-family: "Poppins", sans-serif !important;
  color: #333333 !important;
  font-size: 1.25rem !important;
  font-weight: bold;
  line-height: 1.875rem;
}

.custom-profile-text {
  font-family: "Poppins", sans-serif !important;
  color: #000000 !important;
  font-size: 0.9rem;
  line-height: 1.6888rem;
}

.hour-card {
  margin-top: -100px;
}
.hire-me-card {
  margin-top: -70px;
}

.hour-rate {
  font-family: "Poppins", sans-serif !important;
  color: rgba(88, 67, 190, 0.5) !important;
  font-size: 0.625rem !important;
  line-height: 1.313rem;
}
.rate {
  font-family: "Poppins", sans-serif !important;
  color: #5843be !important;
  font-size: 2.5rem;
  line-height: 3rem;
  font-weight: bold;
}
.btn-hire-me {
  text-transform: capitalize !important;
  width: 200px;
}
.custom-social-btn {
  max-width: 40px !important;
  height: 51px !important;
}
</style>