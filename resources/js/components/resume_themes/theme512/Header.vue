<template>
  <v-container fluid class="pa-0 pa-lg-2 pa-sm-2">
    <v-row no-gutters>
      <v-col lg="6" sm="12" cols="12">
        <v-container class="left pa-0 pa-lg-2 pa-sm-2" fluid>
          <v-row no-gutters>
            <v-col cols="4" sm="3" lg="3" align-self="center" class="pa-2">
              <v-img :src="profile" id="avatar"> </v-img>
              <v-btn fab id="chat-btn" color="#100083" outlined>
                <v-img
                  src="/images/resume_themes/theme512/chat.svg"
                  contain
                  max-width="16"
                ></v-img>
              </v-btn>
            </v-col>
            <v-col cols="6" lg="9" class="pl-lg-10 pl-2" align-self="center">
              <div class="head py-1 py-sm-2 py-lg-2">Zoyee Allena</div>
              <div class="subhead py-1 py-sm-2 py-lg-2">Visual Designer</div>
              <div class="social-group pt-3 pt-sm-4 pt-lg-4">
                <v-btn
                  fab
                  class="social-btn mr-4"
                  outlined
                  color="#100083"
                  v-for="(s, i) in social"
                  :key="i"
                  :width="socialBtnSize"
                  :height="socialBtnSize"
                >
                  <v-img
                    :src="s.src"
                    :max-width="socialBtnImgSize"
                    :min-width="socialBtnImgSize"
                    contain
                  ></v-img>
                </v-btn>
              </div>
            </v-col>
            <v-col
              cols="2"
              class="hidden-lg-and-up ml-sm-auto pt-12"
              align="center"
            >
              <div class="py-2">
                <v-btn text large>
                  <v-img
                    src="/images/resume_themes/theme512/audio.svg"
                    max-width="24"
                    contain
                  ></v-img>
                </v-btn>
              </div>
              <div class="py-2">
                <v-btn text large
                  ><v-img
                    src="/images/resume_themes/theme512/video.svg"
                    max-width="24"
                    contain
                  ></v-img
                ></v-btn>
              </div>
            </v-col>
          </v-row>
        </v-container>
      </v-col>
      <v-spacer></v-spacer>
      <v-col lg="5" xl="5" sm="12" cols="12">
        <v-container class="right" fluid>
          <v-row
            justify-lg="end"
            justify-sm="center"
            justify="center"
            class="pr-lg-12 hidden-md-and-down "
            dense
          >
            <v-col
              cols="auto"
              sm="auto"
              lg="3"
              align-self="center"
              class="text-lg-right"
            >
              <div class="media-title">Your Interviews :</div>
            </v-col>
            <v-col cols="auto" sm="auto" lg="4" xl="3" class="text-lg-right">
              <v-btn class="meida-btn" color="#0e0185" dark>
                <v-img
                  src="/images/resume_themes/theme512/audio.svg"
                  max-width="18"
                  contain
                ></v-img>
                <div class="meida-btn-title pl-2">UPLOAD AUDIO</div>
              </v-btn>
            </v-col>
            <v-col cols="auto" sm="auto" lg="4" xl="3" class="text-lg-center">
              <v-btn class="meida-btn" color="#0e0185" dark>
                <v-img
                  src="/images/resume_themes/theme512/video.svg"
                  max-width="18"
                  contain
                ></v-img>
                <div class="meida-btn-title pl-2">UPLOAD VIDEO</div>
              </v-btn>
            </v-col>
          </v-row>
          <v-row
            justify-lg="end"
            justify-sm="end"
            justify="space-around"
            class="pr-lg-12 pt-lg-8 pt-6 pr-sm-12"
            dense
          >
            <v-col
              cols="auto"
              sm="3"
              lg="4"
              xl="3"
              class="text-lg-right text-center"
            >
              <div class="rate-info d-lg-inline-block d-block mt-lg-2">
                15$
                <div class="rate-title d-lg-inline-block d-block ">
                  Hourly rate
                </div>
              </div>
            </v-col>
            <v-col
              cols="auto"
              sm="3"
              lg="4"
              xl="4"
              class="text-lg-right text-center"
            >
              <div class="rate-info d-lg-inline-block d-block mt-lg-2">
                35hr
                <div class="rate-title d-lg-inline-block d-block ">
                  Weekly Availability
                </div>
              </div>
            </v-col>
            <v-col
              cols="auto"
              sm="3"
              lg="4"
              xl="3"
              class="text-lg-center text-center"
              align-self="center"
            >
              <v-btn class="meida-btn" color="#0e0185" dark>
                <div class="meida-btn-title ">Hire Me</div>
              </v-btn>
            </v-col>
          </v-row>
        </v-container>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
export default {
  data: () => ({
    profile: "/images/resume_themes/theme512/profile.png",
    social: [
      {
        src: "/images/resume_themes/theme512/social_icons/behance.svg"
      },
      {
        src: "/images/resume_themes/theme512/social_icons/dribbble.svg"
      },
      {
        src: "/images/resume_themes/theme512/social_icons/instagram.svg"
      }
    ]
  }),
  computed: {
    socialBtnSize() {
      switch (this.$vuetify.breakpoint.name) {
        case "xs":
          return 30;
        case "sm":
          return 40;
        case "lg":
          return 50;
      }
    },
    socialBtnImgSize() {
      switch (this.$vuetify.breakpoint.name) {
        case "xs":
          return 16;
        case "sm":
          return 18;
        case "lg":
          return 24;
        case "xl":
          return 24;
      }
    }
  }
};
</script>
<style lang="scss" scoped>
@import url("https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;600;700&display=swap");
#avatar {
  border: 8px solid #dc266c;
  box-sizing: border-box;
  border-radius: 500px;
  position: relative;
}
#chat-btn {
  position: absolute;
  background: #100083;
  border: 4px solid #51e9f1;
  box-shadow: 0px 4px 20px #0902df !important;
  border-radius: 200px;
  top: 11rem;
  left: 12rem;
  width: 40px;
  height: 40px;
}
.social-btn {
  background: #100083;
  border: 2px solid #51e9f1;
  box-shadow: 0px 4px 20px #0a03e1 !important;
  border-radius: 200px;
}
.head {
  font-family: "Archivo", sans-serif;
  font-style: normal;
  font-weight: bold;
  font-size: 2rem;
  line-height: 39px;
  color: #dc266c;
}
.subhead {
  font-family: "Archivo", sans-serif;
  font-style: normal;
  font-weight: 500;
  font-size: 1rem;
  line-height: 22px;
  color: #2bf1e9;
}
.media-title {
  font-family: "Archivo", sans-serif;
  font-style: normal;
  font-weight: 600;
  font-size: 1rem;
  line-height: 26px;
  text-align: right;
  color: #dc266c;
}
.meida-btn {
  min-width: 170px !important;
  max-width: 170px !important;
  height: 60px !important;
  background: #0e0185;
  border-radius: 6px;
}
.meida-btn-title {
  font-family: "Archivo", sans-serif;
  font-style: normal;
  font-weight: 600;
  font-size: 0.8rem;
  line-height: 15px;
  display: flex;
  align-items: center;
  text-align: center;
  color: #2bf1e9;
}
.rate-info {
  font-family: "Archivo", sans-serif;
  font-style: normal;
  font-weight: normal;
  font-size: 1.6rem;
  line-height: 46px;
  color: #2bf1e9;
}
.rate-title {
  font-family: "Archivo", sans-serif;
  font-style: normal;
  font-weight: normal;
  font-size: 0.9rem;
  line-height: 20px;
  color: #dc266c;
}
@media screen and (max-width: 1600px) {
  #chat-btn {
    position: absolute;
    background: #100083;
    border: 4px solid #51e9f1;
    box-shadow: 0px 4px 20px #0902df !important;
    border-radius: 200px;
    top: 9rem;
    left: 10rem;
    width: 40px;
    height: 40px;
  }
}

@media screen and (min-width: 768px) and (max-width: 1024px) {
  #chat-btn {
    position: absolute;
    background: #100083;
    border: 4px solid #51e9f1;
    box-shadow: 0px 4px 20px #0902df !important;
    border-radius: 200px;
    top: 9rem;
    left: 9rem;
    width: 40px;
    height: 40px;
  }
}

@media screen and (min-width: 200px) and (max-width: 599px) {
  #avatar {
    border: 6px solid #dc266c;
    box-sizing: border-box;
    border-radius: 500px;
    position: relative;
  }
  .head {
    font-family: "Archivo", sans-serif;
    font-style: normal;
    font-weight: bold;
    font-size: 1.5rem;
    line-height: 39px;
    color: #dc266c;
  }
  .subhead {
    font-family: "Archivo", sans-serif;
    font-style: normal;
    font-weight: 500;
    font-size: 0.9rem;
    line-height: 22px;
    color: #2bf1e9;
  }

  #chat-btn {
    position: absolute;
    background: #100083;
    border: 2px solid #51e9f1;
    box-shadow: 0px 4px 20px #0902df !important;
    border-radius: 200px;
    top: 7rem;
    left: 6rem;
    width: 30px;
    height: 30px;
  }
  .meida-btn {
    min-width: 140px !important;
    max-width: 140px !important;
    height: 50px !important;
    background: #0e0185;
    border-radius: 6px;
  }
}
</style>