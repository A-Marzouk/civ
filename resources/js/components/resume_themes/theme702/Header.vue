<template>
  <v-container fluid pa-0>
    <v-row class="box-layout" justify-sm="center" justify-lg="start" justify="center">
      <v-col lg="6" sm="12" cols="12" class="ml-lg-12">
        <v-row>
          <v-col lg="3" sm="3" cols="4" align="center" class="ml-lg-0 ml-sm-12 ml-6">
            <v-img :src="logo" class="avatar"></v-img>
          </v-col>
          <v-col lg="9" sm="7" cols="7">
            <div class="head">
              Beverly Andrews
              <div class="mt-lg-3 ml-6 d-lg-inline-block d-sm-none d-none">
                <v-btn
                  v-for="(m,i) in media"
                  :key="i"
                  fab
                  :width="m.width"
                  :height="m.width"
                  class="mx-2"
                  color="#fff"
                  style="box-shadow: 0px 0px 16px rgba(36, 102, 202, 0.3);"
                >
                  <v-img :src="m.src" contain :width="m.imgwd" :height="m.imgwd"></v-img>
                </v-btn>
              </div>
            </div>
            <div class="subhead">User interface designer</div>
            <div class="mt-lg-3 mt-3">
              <v-btn
                fab
                color="#6AEFBF"
                class="mr-5"
                style="box-shadow: 2px 5px 30px rgba(106, 239, 191, 0.5);"
              >
                <v-img
                  src="/images/resume_themes/theme702/email.svg"
                  width="20"
                  height="20"
                  contain
                ></v-img>
              </v-btn>
              <v-btn
                elevation="0"
                fab
                class="mr-5"
                width="40"
                height="40"
                style="border: 2px solid #005BD1;"
              >
                <v-img src="/images/resume_themes/theme702/pdf.svg" width="24" height="24" contain></v-img>
              </v-btn>
            </div>
          </v-col>
        </v-row>
      </v-col>
      <v-col lg="3" sm="9" class="ml-lg-auto mt-lg-8 mt-sm-0 mb-sm-12">
        <div class="text-center hidden-md-and-down">
          <v-btn
            v-for="(m,i) in social"
            :key="i"
            class="mx-2"
            fab
            :width="40"
            :height="40"
            color="#fff"
            style="box-shadow: 0px 0px 16px rgba(36, 102, 202, 0.3);"
          >
            <v-img :src="m.src" contain :width="18" :height="18"></v-img>
          </v-btn>
        </div>
        <v-sheet class="iconmarg hidden-md-and-up" width="auto" color="transparent">
          <v-slide-group multiple align="center" align-content="center">
            <v-slide-item v-for="(icon,i) in sheet" :key="i" class="mx-4 hidden-md-and-up">
              <v-btn
                fab
                :width="40"
                :height="40"
                color="#fff"
                class="my-3"
                style="box-shadow: 0px 0px 16px rgba(36, 102, 202, 0.3);"
              >
                <v-img :src="icon.src" contain :width="18" :height="18"></v-img>
              </v-btn>
            </v-slide-item>
          </v-slide-group>
        </v-sheet>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
import Logo from "./header/Logo";
import Profile from "./header/Profile";
import Contact from "./header/Contact";
export default {
  components: {
    Logo,
    Contact,
    Profile
  },
  data: () => ({
    logo: "/images/resume_themes/theme702/profile.png",
    media: [
      {
        src: "/images/resume_themes/theme702/pin.svg",
        width: 40,
        imgwd: 18
      },
      {
        src: "/images/resume_themes/theme702/whatsapp.svg",
        width: 40,
        imgwd: 18
      },
      {
        src: "/images/resume_themes/theme702/google-plus.svg",
        width: 40,
        imgwd: 24
      }
    ],
    source: [
      {
        src: "/images/resume_themes/theme702/email.svg",
        color: "#6AEFBF",
        imgwd: 14,
        box: "2px 5px 30px rgba(106, 239, 191, 0.5);"
      },
      {
        src: "/images/resume_themes/theme702/pdf.svg",
        width: 40,
        imgwd: 14,
        border: "2px solid #005BD1;"
      }
    ],
    social: [
      {
        src: "/images/resume_themes/theme702/behance.svg"
      },
      {
        src: "/images/resume_themes/theme702/dribbble.svg"
      },
      {
        src: "/images/resume_themes/theme702/instagram.svg"
      },
      {
        src: "/images/resume_themes/theme702/linkdin.svg"
      }
    ],
    sheet: [
      {
        src: "/images/resume_themes/theme702/pin.svg",
        width: 40,
        imgwd: 14
      },
      {
        src: "/images/resume_themes/theme702/whatsapp.svg",
        width: 40,
        imgwd: 12
      },
      {
        src: "/images/resume_themes/theme702/google-plus.svg",
        width: 40,
        imgwd: 14
      },
      {
        src: "/images/resume_themes/theme702/behance.svg"
      },
      {
        src: "/images/resume_themes/theme702/dribbble.svg"
      },
      {
        src: "/images/resume_themes/theme702/instagram.svg"
      },
      {
        src: "/images/resume_themes/theme702/linkdin.svg"
      }
    ]
  })
};
</script>
<style lang="scss" scoped>
.avatar {
  border-radius: 50%;
  width: 210px;
}
.box-layout {
  background: #f9f9f9;
  // border: 2px solid rgba(0, 91, 209, 0.05);
  // box-sizing: border-box;
  box-shadow: 0px 10px 10px 0px rgba(0, 0, 0, 0.1);
  border-bottom-left-radius: 35px;
  border-bottom-right-radius: 35px;
}
.head {
  font-family: Open Sans;
  font-style: normal;
  font-weight: bold;
  font-size: 2rem;
  line-height: 54px;
  color: #005bd1;
}
.subhead {
  font-family: Open Sans;
  font-style: normal;
  font-weight: normal;
  font-size: 1rem;
  line-height: 29px;
  /* identical to box height */

  color: #828282;
}
@media screen and (min-width: 320px) and (max-width: 475px) {
  .head {
    font-family: Open Sans;
    font-style: normal;
    font-weight: bold;
    font-size: 1.5rem;
    line-height: 54px;
    color: #005bd1;
  }
  .subhead {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 1rem;
    line-height: 29px;
    /* identical to box height */

    color: #828282;
  }
}
</style>
