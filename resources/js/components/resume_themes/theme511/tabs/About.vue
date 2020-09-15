<template>
  <v-container fluid v-if="activeTab === 'about'" class="pb-sm-12">
    <v-row no-gutters>
      <v-col lg="2" cols="12" sm="3">
        <v-row dense>
          <v-col
            cols="6"
            sm="12"
            lg="12"
            v-if="user.personal_info.date_of_birth"
          >
            <div class="left-title">Date of Birth</div>
            <div class="left-subtitle">
              {{ user.personal_info.date_of_birth }}
            </div>
          </v-col>
          <v-col cols="6" sm="12" lg="12" v-if="user.personal_info.nationality">
            <div class="left-title">Nationality</div>
            <div class="left-subtitle">
              {{ user.personal_info.nationality }}
            </div>
          </v-col>
          <v-col cols="6" sm="12" lg="12" v-if="user.personal_info.hometown">
            <div class="left-title">Hometown</div>
            <div class="left-subtitle">
              {{ user.personal_info.hometown }}
            </div>
          </v-col>
          <v-col cols="6" sm="12" lg="12" v-if="user.languages[0]">
            <div class="left-title">Languages</div>
            <div
              class="left-subtitle"
              v-for="(language, i) in user.languages"
              :key="i"
            >
              {{ language.label }}
            </div>
          </v-col>
        </v-row>
      </v-col>
      <v-col lg="10" cols="12" sm="9">
        <v-row no-gutters>
          <v-col cols="12" class="mb-5 mt-2" v-if="user.personal_info.overview">
            <div class="right-title">Overview Sumary</div>
            <div class="right-subtitle mt-2">
              {{ user.personal_info.overview }}
            </div>
          </v-col>
          <v-col cols="12" class="mb-5 mt-2" v-if="user.personal_info.about">
            <div class="right-title">About Me</div>
            <div class="right-subtitle mt-2">
              {{ user.personal_info.about }}
            </div>
          </v-col>
          <v-col cols="12" class="mb-5 mt-2" v-if="user.personal_info.quote">
            <div class="right-title">Quote</div>
            <div class="right-subtitle mt-2">
              {{ user.personal_info.quote }}
            </div>
          </v-col>
          <v-col cols="12" class="mb-5 mt-2" v-if="user.personal_info.location">
            <div class="right-title">Location</div>
            <div class="right-subtitle mt-2">
              {{ user.personal_info.location }}
            </div>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
export default {
  props: ["activeTab", "user"],
  data: () => ({
    social: [
      { src: "/images/resume_themes/theme511/twitter.svg" },
      { src: "/images/resume_themes/theme511/facebook.svg" },
      { src: "/images/resume_themes/theme511/instagram.svg" },
    ],
    socialGreen: [
      { src: "/images/resume_themes/theme511/twitterGreen.svg" },
      { src: "/images/resume_themes/theme511/facebookGreen.svg" },
      { src: "/images/resume_themes/theme511/instagramGreen.svg" },
    ],
  }),
};
</script>
<style lang="scss" scoped>
.left-title {
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  font-size: 18px;
  line-height: 25px;
  color: #39e1aa;
}
.left-subtitle {
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  font-size: 24px;
  line-height: 36px;
  color: #333333;
}
.right-title {
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  font-size: 24px;
  line-height: 25px;
  color: #39e1aa;
}
.right-subtitle {
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  font-size: 18px;
  line-height: 25px;
  color: #333333;
}
@media screen and (max-width: 699px) and (min-width: 200px) {
  .para {
    font-family: Poppins;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 18px;

    color: #333333;
  }
}
</style>