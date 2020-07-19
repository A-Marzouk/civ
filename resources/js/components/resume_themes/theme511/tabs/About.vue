<template>
  <v-container fluid v-if="activeTab === 'about'" class="pb-sm-12">
    <v-row>
      <v-col lg="12" cols="12" sm="12">
        <vue-markdown class="para">
          {{ user.personal_info.about }}
        </vue-markdown>
      </v-col>
      <v-col cols="12" class="d-sm-block d-none d-lg-none py-4">
        <div>
          <v-btn
            v-for="Userlink in user.links"
            :key="Userlink.id + '_link'"
            v-show="Userlink.is_active && Userlink.is_public"
            :href="Userlink.link"
            target="_blank"
            class="socialRed mr-6"
            fab
            elevation="0"
          >
            <v-img
              :src="
                `/images/icons/${Userlink.link_title.toLowerCase()}-icon.svg`
              "
              contain
              max-width="24"
              height="24"
            ></v-img>
          </v-btn>
        </div>
      </v-col>
      <v-col class="hidden-sm-and-up" cols="12">
        <div class="py-8">
          <div class="info-text d-inline-block mr-6 mr-sm-2">
            hour rate
            <div class="info-rate d-inline-block mx-2 mx-sm-1">$20</div>
          </div>
          <div class="info-text d-inline-block">
            Weekly availability
            <div class="info-rate d-inline-block mx-2 mx-sm-1">250</div>
          </div>
        </div>
        <div class="follow py-2">Follow me</div>
        <div class="py-6">
          <v-btn
            v-for="Userlink in user.links"
            :key="Userlink.id + '_link'"
            v-show="Userlink.is_active && Userlink.is_public"
            :href="Userlink.link"
            class="socialGreen mr-6"
            fab
            elevation="0"
          >
            <v-img
              :src="
                `/images/resume_themes/theme511/social_icons/${Userlink.link_title.toLowerCase()}Green.svg`
              "
              contain
              max-width="24"
              height="24"
            ></v-img>
          </v-btn>
        </div>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
import VueMarkdown from 'vue-markdown'

export default {
  props: ["activeTab", "user"],
  components: {
    'vue-markdown': VueMarkdown
  },
  data: () => ({
    social: [
      { src: "/images/resume_themes/theme511/twitter.svg" },
      { src: "/images/resume_themes/theme511/facebook.svg" },
      { src: "/images/resume_themes/theme511/instagram.svg" }
    ],
    socialGreen: [
      { src: "/images/resume_themes/theme511/twitterGreen.svg" },
      { src: "/images/resume_themes/theme511/facebookGreen.svg" },
      { src: "/images/resume_themes/theme511/instagramGreen.svg" }
    ]
  })
};
</script>
<style lang="scss" scoped>
.para {
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  font-size: 18px;
  line-height: 27px;

  color: #333333;
}
.socialGreen {
  background: #fbffff;
  border: 5px solid #39e1aa;
  box-sizing: border-box;
  border-radius: 50px;
}
.socialRed {
  background: #fbffff;
  border: 5px solid #f56068;
  box-sizing: border-box;
  border-radius: 50px;
}
.follow {
  font-family: Poppins;
  font-style: normal;
  font-weight: bold;
  font-size: 12px;
  line-height: 18px;
  /* identical to box height */

  color: #000000;
}
.info-text {
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  font-size: 12px;
  line-height: 18px;
  display: flex;
  align-items: center;
  text-transform: uppercase;

  color: #000000;
}
.info-rate {
  font-family: Poppins;
  font-style: normal;
  font-weight: bold;
  font-size: 14px;
  line-height: 21px;
  display: flex;
  align-items: center;

  color: #000000;
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