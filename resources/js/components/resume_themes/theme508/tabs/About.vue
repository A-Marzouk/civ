<template>
  <v-container fluid v-if="currentTab === 5" class="bgimg">
    <v-row class="fill-height" justify="end">
      <v-col cols="12" md="7" lg="5" class="text-right white--text padding">
        <div class="headline">About Me</div>
        <div
          class="ptext my-sm-12 my-1"
        >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</div>
        <div
          class="ptext my-sm-12 my-1"
        >Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</div>
      </v-col>
      <v-col md="12" align="end" class="hidden-xs-only">
        <v-btn width="300" height="70" color="#6346FB" dark class="margin" elevation="0" tile>
          <div class="text-capitalize display-1">Hire Me</div>
        </v-btn>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  props: ["currentTab"],
  data() {
    return {
      skills: [{ id: 1 }, { id: 2 }, { id: 3 }, { id: 4 }],
      currentSkillsTab: 1,
      tab: null,
      centered: false,
      grow: false,
      vertical: false,
      right: false,
      icons: false,
      Skillstabs: [
        { title: "Programming Languages", id: 1 },
        { title: "Frameworks/ Databases", id: 2 },
        { title: "Design Skills", id: 3 },
        { title: "Software", id: 4 }
      ],
      programingLanguages: [
        { id: 1, name: "Photoshop", percentage: 90 },
        { id: 2, name: "Illustrator", percentage: 80 },
        { id: 3, name: "Figma", percentage: 50 },
        { id: 4, name: "Adobe XD", percentage: 90 }
      ]
    };
  }
};
</script>

<style lang="scss" scoped>
.bgimg {
  background-image: url("/images/resume_themes/theme508/about.png");
  background-size: 100vw 100vh;
  background-position: center center;
  height: 100vh;
}
.padding {
  padding-right: 120px;
  padding-left: 20px;
  padding-top: 90px;
}
.margin {
  margin-bottom: 20px;
  margin-top: 250px;
  margin-right: 40px;
}
.ptext {
  font-size: 1.2rem;
  line-height: 40px;
}
@media screen and (max-width: 1024px) {
  .bgimg {
    background-image: url("/images/resume_themes/theme508/aboutab.png");
    background-size: 100% 80%;
    background-position: top center;
    height: 100vh;
  }
}
@media screen and (max-width: 425px) {
  .bgimg {
    background-image: url("/images/resume_themes/theme508/aboutab.png");
    background-size: contain;
    background-position: top center;
    height: 100vh;
  }
  .padding {
    padding-right: 20px;
    padding-left: 20px;
    padding-top: 10px;
  }
  .headline {
    font-size: 1rem !important;
  }
  .ptext {
    font-size: 0.6rem;
    line-height: 20px;
  }
}
</style>
