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
            height="70px"
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
      <Education :currentTab="currentTab" />
      <Skills :currentTab="currentTab" />
      <About :currentTab="currentTab" />
    </div>
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
      right: false,
      icons: false,
      tabs: [
        { title: "Portfolio", id: 1 },
        { title: "Work", id: 2 },
        { title: "Education", id: 3 },
        { title: "Skills", id: 4 },
        { title: "About", id: 5 }
      ]
    };
  }
};
</script>
<style lang="scss" scoped>
.back {
  background: linear-gradient(to right, #7a39db, #6048ff);
}
#wrapper_theme700 .theme--light.v-tabs > .v-tabs-bar {
  background-color: transparent !important;
}
#wrapper_theme700 .theme--light.v-tabs > .v-tabs-bar {
  background-color: transparent !important;
}
.tab-active {
  background-color: #fff;
  color: #6545f9;
}
@media only screen and (max-width: 425px) {
  #wrapper_theme700 .v-slide-group__prev .v-slide-group__prev--disabled {
    display: none !important;
    visibility: hidden;
  }
}
</style>