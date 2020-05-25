<template>
  <v-container fluid class="pa-0">
    <v-row no-gutters justify="center" justify-md="left" justify-lg="left" class="mt-lg-6 mt-sm-2">
      <v-col sm="11" md="12" lg="11">
        <div
          class="text-lg-left text-md-left ml-lg-12 ml-md-6 ml-sm-3 subtitle-1 white--text"
        >Find Me on</div>
      </v-col>
      <v-col sm="11" md="12" class="ml-sm-2 ml-md-6 ml-lg-0" lg="11">
        <div class="text-lg-center text-md-left">
          <v-btn v-for="b in media" :key="b.name" text class="btnwidth">
            <v-img :src="b.icon" class="social" contain></v-img>
          </v-btn>
        </div>
      </v-col>
      <v-col
        sm="10"
        md="10"
        lg="7"
        class="text-lg-center text-md-left mt-12 mt-sm-4 mt-md-8 mt-lg-10"
      >
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
  width: 20px;
  height: 20px;
}
.btnwidth {
  width: 24px;
  min-width: 40px !important;
}
.button {
  width: 100%;
  height: 45px !important;
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
    height: 40px !important;
  }
}
@media screen and (max-width: 768px) {
  .title {
    font-size: 1rem !important;
    line-height: 0.75rem !important;
  }
  .social {
    width: 16px;
    height: 16px;
  }
  .btnwidth {
    height: 18px;
    min-width: 18px !important;
  }
  .button {
    width: 100%;
    height: 40px !important;
  }
  .subtitle-1 {
    font-size: 0.75rem !important;
  }
}
</style>