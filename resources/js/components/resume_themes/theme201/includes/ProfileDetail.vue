<template>
  <v-card flat class="custom-tab">
    <v-tabs v-model="tab" grow centered show-arrows color="rgba(92,92,92,1)">
      <v-tab class="tab-text">About</v-tab>

      <v-tab class="tab-text">Portfolio</v-tab>

      <v-tab class="tab-text">Work</v-tab>
      <v-tab class="tab-text">Education</v-tab>
      <v-tab class="tab-text">Skills</v-tab>
    </v-tabs>
    <hr class="custom-line" />
    <v-tabs-items v-model="tab">
      <!-- About Tab -->
      <v-tab-item>
        <v-card flat>
          <v-card-text>
            <about></about>
          </v-card-text>
        </v-card>
      </v-tab-item>
      <!-- About Tab -->

      <!-- Portfolio -->
      <v-tab-item>
        <v-card flat>
          <v-card-text>
            <portfolio></portfolio>
          </v-card-text>
        </v-card>
      </v-tab-item>
      <!-- Portfolio -->

      <!-- Work -->
      <v-tab-item>
        <v-card flat>
          <v-card-text>
            <work></work>
          </v-card-text>
        </v-card>
      </v-tab-item>

      <!-- Work -->

      <!-- Education -->
      <v-tab-item>
        <v-card flat>
          <v-card-text>
            <education></education>
          </v-card-text>
        </v-card>
      </v-tab-item>
      <!-- Education -->

      <!-- Skills -->
      <v-tab-item>
        <v-card flat>
          <v-card-text>
            <skills></skills>
          </v-card-text>
        </v-card>
      </v-tab-item>

      <!-- Skills -->
    </v-tabs-items>
  </v-card>
</template>

<script>
//for about tab
import About from "./tabs/About";
//for portfolio tab
import Portfolio from "./tabs/Portfolio";
//for work tab
import Work from "./tabs/Work";
//for education
import Education from "./tabs/Education";
//for skills
import Skills from "./tabs/Skills";

export default {
  components: {
    About,
    Portfolio,
    Work,
    Education,
    Skills
  },
  data() {
    return {
      tab: null,
    };
  }
};
</script>

<style scoped lang="scss">
  hr.custom-line {
    margin: 51px auto 0;
    border: 1px solid  #d3d3d3;
    height: 0;
    width: 100%;
    opacity: 0.5;
  }
</style>
