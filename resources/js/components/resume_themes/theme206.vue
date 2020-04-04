<template>
  <v-app style="width:100%;">
    <v-container fluid ma-0 pa-0 style="width:100%;">
      <v-app-bar color="#fafafa" height="250">
        <v-avatar size="120" class>
          <v-img src="/images/resume_themes/theme206/avatar.png"></v-img>
        </v-avatar>
        <div class="half-circle"></div>
        <v-row class="mx-3" align="center" justify="center">
          <v-col md="4">
            <v-card flat color="transparent">
              <v-card-title class="custom-profile-title">Hean Prinsloo</v-card-title>
              <v-card-subtitle class="custom-profile-subtitle">Graphic Designer</v-card-subtitle>
              <v-card-text
                class="custom-profile-text"
              >Donec a augue gravida, vulputate ligula et, pellentesque arcu. Morbi feugiat eros nec sem ultrices...</v-card-text>
            </v-card>
          </v-col>
          <v-col md="4">
            <div class="d-flex flex-row">
              <!-- Hour rate -->
              <div class="">
                <v-list-item two-line>
                  <v-list-item-avatar size="18">
                    <img width="18" src="/images/resume_themes/theme206/icons/usd.png" />
                  </v-list-item-avatar>
                  <v-list-item-content>
                    <v-list-item-subtitle>
                      <v-card color="transparent" flat>
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
              </div>
              <!-- Hour Rate -->
              <!-- Weekly availibility -->
              <div class="">
                <v-list-item two-line>
                  <v-list-item-avatar size="18">
                    <img width="18" src="/images/resume_themes/theme206/icons/usd.png" />
                  </v-list-item-avatar>
                  <v-list-item-content>
                    <v-list-item-subtitle>
                      <v-card color="transparent" flat>
                        <span class="hour-rate">Weekly availibility</span>
                      </v-card>
                    </v-list-item-subtitle>
                    <v-list-item-subtitle>
                      <v-card color="transparent" flat>
                        <span class="rate">20</span>
                      </v-card>
                    </v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
              </div>
              <!-- Weekly availibility -->
            </div>
          </v-col>

          <!-- 3rd column -->
          <v-col md="4">
            <v-card flat color="transparent">
              <v-btn color="#FAFAFA" x-large>
                <v-icon color="#5843BE" small left>mdi-email</v-icon>Hire Me
              </v-btn>

              <!-- social buttons -->
              <!-- social buttons -->

            </v-card>
          </v-col>
          <!-- 3rd column -->
        </v-row>
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
.custom-profile-title {
  font-family: "Open Sans" !important;
  font-size: 2.5rem;
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

.hour-rate {
  font-family: "Poppins", sans-serif !important;
  color: rgba(88, 67, 190, 0.5) !important;
  font-size: 0.75rem;
  line-height: 1.313rem;
}
.rate {
  font-family: "Poppins", sans-serif !important;
  color: #5843be !important;
  font-size: 2.5rem;
  line-height: 3.75rem;
}
</style>