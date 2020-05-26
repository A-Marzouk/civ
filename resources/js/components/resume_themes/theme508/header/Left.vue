<template>
  <v-container>
    <v-row dense>
      <v-col cols="12" sm="5" md="5" align="center" align-sm="start">
        <div class="avatar ma-0 ma-sm-1 ma-md-1 ma-lg-1">
          <v-img src="/images/resume_themes/theme508/avatar.png" class="profile" contain></v-img>
        </div>
      </v-col>
      <v-col cols="12" sm="7" md="7" class="pt-0 pt-sm-4 pt-md-8 text-center text-sm-left">
        <div class="head font-weight-bold white--text pl-sm-4">Wilkerson Doe</div>
        <div class="subhead white--text pl-sm-4">Web & visual Designer</div>
        <div class="mt-0 mt-sm-0 mt-md-4">
          <v-btn
            v-for="c in connect"
            :key="c.name"
            text
            dark
            class="pa-0 mr-lg-5 mr-md-1 mr-0 ml-0 iconsize"
            height="80"
          >
            <v-card color="transparent" flat class="text-center" align-self="center">
              <v-img :src="c.icon" contain class="connect ma-1"></v-img>
              <div class="d-block text-capitalize subtitle-1">{{c.name}}</div>
            </v-card>
          </v-btn>
          <v-row no-gutters class="hidden-sm-and-up text-center white--text" justify="center">
            <v-col cols="6">
              <div class="caption">
                Hourly
                <span class="subtitle-1 font-weight-bold ml-2">$50 USD</span>
              </div>
            </v-col>
            <v-col cols="6">
              <div class="caption">
                Weekly
                <span class="subtitle-1 font-weight-bold ml-2">15 Hours</span>
              </div>
            </v-col>
          </v-row>
        </div>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
export default {
  data() {
    return {
      connect: [
        {
          name: "Chat",
          icon: "/images/resume_themes/theme508/chat.svg"
        },
        {
          name: "Audio",
          icon: "/images/resume_themes/theme508/audio.svg"
        },
        {
          name: "Video",
          icon: "/images/resume_themes/theme508/video.svg"
        }
      ]
    };
  }
};
</script>

<style lang="scss" scoped>
.avatar {
  border-radius: 50%;
  border: 8px solid #fff;
}
.profile {
  border-radius: 50%;
  border: 8px solid #7734e3;
}
.head {
  font-size: 2.2rem;
  font-family: "trebuchet ms", Arial, Helvetica, sans-serif;
}
.subhead {
  font-size: 1.3rem;
  font-family: "Open Sans";
  font-weight: semi-bold;
}
.connect {
  width: 24px;
  height: 24px;
}
.iconsize {
  min-width: 64px;
  height: 80px;
}
@media screen and (max-width: 1024px) {
  .head {
    font-size: 1.5rem;
    font-family: "trebuchet ms", Arial, Helvetica, sans-serif;
  }
  .subhead {
    font-size: 1rem;
    font-family: "Open Sans";
    font-weight: semi-bold;
  }
  .avatar {
    border-radius: 50%;
    border: 4px solid #fff;
  }
  .profile {
    border-radius: 50%;
    border: 4px solid #7734e3;
  }
  .iconsize {
    min-width: 64px;
    height: 80px;
  }
}
@media screen and (max-width: 768px) {
  .head {
    font-size: 1rem;
    font-family: "trebuchet ms", Arial, Helvetica, sans-serif;
  }
  .subhead {
    font-size: 0.7rem;
    font-family: "Open Sans";
    font-weight: semi-bold;
  }
  .avatar {
    border-radius: 50%;
    border: 4px solid #fff;
  }
  .profile {
    border-radius: 50%;
    border: 4px solid #7734e3;
  }
  .connect {
    width: 18px;
    height: 18px;
  }
  .subtitle-1 {
    font-size: 0.75rem !important;
  }
  .iconsize {
    min-width: 50px !important;
    height: 80px;
  }
}
@media screen and (max-width: 425px) {
  .profile {
    border-radius: 50%;
    border: 5px solid #7734e3;
  }
  .avatar {
    width: 150px;
    height: 150px;

    border-radius: 50%;
    border: 5px solid #fff;
  }
  .subhead {
    font-size: 1rem;
    font-family: "Open Sans";
    font-weight: bold;
    margin-top: 5px;
  }
  .connect {
    width: 18px;
    height: 18px;
  }
  .subtitle-1 {
    font-size: 0.75rem !important;
  }
}
</style>