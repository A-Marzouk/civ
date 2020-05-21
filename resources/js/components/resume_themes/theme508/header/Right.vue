<template>
  <v-container fluid class="pa-0">
    <v-row no-gutters justify="center" justify-md="left" justify-lg="left" class="mt-lg-6">
      <v-col sm="8" md="12" lg="11">
        <div class="text-lg-left text-md-left ml-lg-12 ml-md-6 subtitle-1 white--text">Find Me on</div>
      </v-col>
      <v-col sm="8" md="12" class="my-1 ml-md-6 ml-lg-0" lg="11">
        <div class="text-lg-center text-md-left">
          <v-btn v-for="b in media" :key="b.name" text class="btnwidth">
            <v-img :src="b.icon" class="social" contain></v-img>
          </v-btn>
        </div>
      </v-col>
      <v-col sm="7" md="10" lg="8" class="text-lg-center text-md-left mt-12">
        <v-btn class="button" tile elevation="0" color="#FFFFFF">
          <div class="title text-capitalize textcol">Hire Me</div>
        </v-btn>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
export default {
  data() {
    return {
      media: [
        {
          name: "behance",
          icon: "/images/resume_themes/theme508/behance.svg"
        },
        {
          name: "dribbble",
          icon: "/images/resume_themes/theme508/dribbble.svg"
        },
        {
          name: "insta",
          icon: "/images/resume_themes/theme508/insta.svg"
        },
        {
          name: "linkedin",
          icon: "/images/resume_themes/theme508/linkedin.svg"
        },
        {
          name: "pinterest",
          icon: "/images/resume_themes/theme508/pinterest.svg"
        }
      ]
    };
  }
};
</script>
<style lang="scss" scoped>
.social {
  width: 24px;
  height: 24px;
}
.btnwidth {
  width: 24px;
  min-width: 55px !important;
}
.button {
  width: 100%;
  height: 60px !important;
}

.textcol {
  color: #6247fd;
}
@media screen and (max-width: 1024px) {
  .social {
    width: 24px;
    height: 24px;
  }
  .btnwidth {
    width: 24px;
    min-width: 40px !important;
  }
  .button {
    width: 100%;
    height: 50px !important;
  }
}
</style>