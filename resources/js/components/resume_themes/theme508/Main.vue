<template>
  <v-app>
    <v-container fluid pa-0 ma-0 class="back">
      <v-row justify="start" no-gutters>
        <v-col cols="12" style="background-color:white;height:5px"></v-col>
        <v-col md="12">
          <v-tabs
            v-model="tab"
            centered
            grow
            id="wrapper_theme700"
            background-color="transparent"
            color="#FFFFFF"
            hide-slider
            :height="imageHeight"
            class="tabmargn"
          >
            <v-tabs-slider></v-tabs-slider>
            <v-tab
              @click="currentTab = id"
              :class="[
              currentTab == id
                ? 'tab-active  deep-purple--text text--accent-4'
                : 'white--text',
              'text-capitalize title ',
            ]"
              v-for="{ title, id } in tabs"
              :key="id"
              :href="`#tab-${id}`"
            >{{ title }}</v-tab>
          </v-tabs>
        </v-col>
      </v-row>
    </v-container>
    <div style="background:#fff;height:100vh;">
      <Portfolio :currentTab="currentTab" />
      <Work :currentTab="currentTab" />
      <Skills :currentTab="currentTab" />
      <Education :currentTab="currentTab" />
      <About :currentTab="currentTab" />
    </div>
    <v-container fluid>
      <v-speed-dial
        v-model="fab"
        bottom
        left
        fixed
        direction="right"
        transition="slide-y-reverse-transition"
        class="speed"
      >
        <template v-slot:activator>
          <v-btn
            v-model="fab"
            :color="fab === true ? '#FFFFFF' : '#6644F5'"
            dark
            tile
            elevation="0"
            class="btnsize pr-n12"
          >
            <div v-if="fab" class="ibtn">i</div>
            <div v-else class="iwbtn">i</div>
          </v-btn>
        </template>

        <v-btn v-for="b in media" :key="b.name" tile dark class="btnsize" color="#6644F5">
          <v-img :src="b.icon" class="social" contain></v-img>
        </v-btn>
      </v-speed-dial>

      <v-btn fixed bottom right tile dark color="#6545f9" class="hire">
        <div class="text-capitalize subtitle-2">Hire Me!</div>
      </v-btn>
    </v-container>
  </v-app>
</template>
<script>
import Portfolio from "./tabs/Portfolio";
import Work from "./tabs/Work";
import Education from "./tabs/Education";
import Skills from "./tabs/Skills";
import About from "./tabs/About";
export default {
  components: { Portfolio, Work, Education, Skills, About },
  data() {
    return {
      currentTab: 1,
      tab: null,
      centered: false,
      grow: false,
      vertical: false,

      icons: false,

      tabs: [
        { title: "Portfolio", id: 1 },
        { title: "Experience", id: 2 },
        { title: "Skills", id: 3 },
        { title: "Education", id: 4 },
        { title: "About", id: 5 }
      ],

      fab: false,

      media: [
        {
          name: "linkedin",
          icon: "/images/resume_themes/theme508/linkedin.svg"
        },
        {
          name: "dribbble",
          icon: "/images/resume_themes/theme508/dribbble.svg"
        },
        {
          name: "twitter",
          icon: "/images/resume_themes/theme508/twitter.svg"
        },
        {
          name: "facebook",
          icon: "/images/resume_themes/theme508/facebook.svg"
        }
      ]
    };
  },
  computed: {
    imageHeight() {
      switch (this.$vuetify.breakpoint.name) {
        case "xs":
          return "30px";
        case "sm":
          return "40px";
        case "md":
          return "50px";
        case "lg":
          return "60px";
        case "xl":
          return "70px";
      }
    }
  }
};
</script>
<style lang="scss" scoped>
@import url("./scss/_variables.scss");

.back {
  background: linear-gradient(to right, #7a39db, #6048ff);
}
#wrapper_theme700 .theme--light.v-tabs > .v-tabs-bar {
  background-color: transparent !important;
}
#wrapper_theme700 .theme--light.v-tabs > .v-tabs-bar {
  background-color: transparent !important;
}
.tabhigh {
  height: 70px;
}
.tab-active {
  background-color: #fff;
  color: #6545f9;
}
.v-tabs-bar {
  border-radius: inherit;
  height: 70px;
}
.v-slide-group__content .v-tabs-bar__content {
  height: 70px;
}
@media only screen and (max-width: 425px) {
  .tabmargn {
    margin-left: -60px;
  }
  .v-tabs-bar {
    border-radius: inherit;
    height: 40px;
  }
  .title {
    font-size: 0.8rem !important;
  }
  #wrapper_theme700 .v-slide-group__prev .v-slide-group__prev--disabled {
    display: none !important;
    visibility: hidden;
  }
  .fixed {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
  }
  .ibtn {
    font-size: 1.5rem;
    text-transform: lowercase;
    color: #6545f9;
  }
  .iwbtn {
    font-size: 1.5rem;
    text-transform: lowercase;
    color: #fff;
  }
  .btnsize {
    width: 40px !important;
    min-width: 40px !important;
    height: 40px !important;
  }
  .hire {
    height: 40px !important;
  }
  .social {
    width: 18px;
    height: 18px;
  }
  .v-btn--active {
    position: relative;
  }
  .v-speed-dial__list .v-btn {
    margin: 0px !important;
  }
  .v-btn--active:after {
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    border: 1px solid #6545f9;
  }
}
</style>