<template>
  <v-container fluid>
    <v-row justify="center">
      <v-col lg="10" sm="12">
        <v-tabs
          background-color="transparent"
          v-model="currentTab"
          :slider-color="sliderColor()"
          slider-size="5"
          color="#000"
          center-active
          centered
        >
          <v-tab
            v-for="(tab, i) in tabs"
            :key="i"
            @click="currentTab = i"
            class="mx-auto"
          >
            <div class="text-capitalize tabtitle">{{ tab.name }}</div>
          </v-tab>
        </v-tabs>
      </v-col>
      <v-col lg="11">
        <Portfolio :currentTab="currentTab" />
        <Experience :currentTab="currentTab" />
        <Skills :currentTab="currentTab" />
        <Education :currentTab="currentTab" />
        <Media :currentTab="currentTab" />
        <About :currentTab="currentTab" />
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
import Portfolio from "./tabs/Portfolio";
import Experience from "./tabs/Experience";
import Education from "./tabs/Education";
import Skills from "./tabs/Skills";
import Media from "./tabs/Media";
import About from "./tabs/About";
export default {
  components: { Portfolio, Experience, Education, Skills, Media, About },
  data: () => ({
    currentTab: 0,
    tabs: [
      { name: "Portfolio" },
      { name: "Education" },
      { name: "Experience" },
      { name: "Skills" },
      { name: "Media" },
      { name: "About Me" },
      { name: "Hobbies" },
      { name: "References" },
      { name: "Achievement" },
    ]
  }),
  computed: {
    borderadius() {
      var border = document
        .querySelector(".v-tabs-slider")
        .borderRadius("50px");
      return border;
      console.log(border);
    }
  },
  methods: {
    sliderColor() {
      if (this.currentTab == 0) {
        return "#F7B301";
      }
      if (this.currentTab == 1) {
        return "#19AAC9";
      }
      if (this.currentTab == 2) {
        return "#6764C8";
      }
      if (this.currentTab == 3) {
        return "#F56068";
      }
      if (this.currentTab == 4) {
        return "#39E1AA";
      }
      if (this.currentTab == 5) {
        return "#F7B301";
      }
      if (this.currentTab == 6) {
        return "#F7B301";
      }
      if (this.currentTab == 7) {
        return "#F7B301";
      }
      if (this.currentTab == 8) {
        return "#F7B301";
      }
    }
  }
};
</script>
<style lang="scss" scoped>
.tabtitle {
  font-family: Poppins;
  font-style: normal;
  font-weight: bold;
  font-size: 20px;
  line-height: 30px;
}
.v-tabs-slider {
  border-radius: 50px !important;
}
</style>