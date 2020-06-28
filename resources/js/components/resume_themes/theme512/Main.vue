<template>
  <v-container fluid pa-0>
    <v-row no-gutters>
      <v-col cols="12">
        <v-tabs background-color="#0902E3" fixed-tabs hide-slider height="60">
          <v-tab
            v-for="(t, i) in tabs"
            :key="i"
            @click="currentTab = i"
            exact-active-class="tabActive"
          >
            <div class="tab-title">{{ t.title }}</div>
          </v-tab>
        </v-tabs>
      </v-col>
      <v-col cols="12" class="mt-6">
        <Skills></Skills>
      </v-col>
      <v-col cols="12" class="mt-1" style="background: rgba(3, 1, 252, 0.1);">
        <Portfolio style="height:100vh;" :currentTab="currentTab" />
        <Work :currentTab="currentTab" />
        <Education :currentTab="currentTab" />
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
import Portfolio from "./tabs/Portfolio";
import Work from "./tabs/Work";
import Education from "./tabs/Education";
import Skills from "./tabs/Skills";
export default {
  components: {
    Portfolio,
    Work,
    Education,
    Skills
  },
  data: () => ({
    currentTab: 0,
    tabs: [
      {
        title: "Portfolio"
      },
      {
        title: "Work"
      },
      {
        title: "Education"
      }
    ]
  })
};
</script>
<style lang="scss" scoped>
.tab-title {
  font-family: "Archivo", sans-serif;
  font-style: normal;
  font-weight: 500;
  font-size: 1rem;
  line-height: 26px;
  text-transform: capitalize;
  color: #5afee4;
}
.v-tab--active {
  background: linear-gradient(to bottom, #100263, #11044c);
  position: relative;
}
.v-tab--active:before {
  content: "";
  position: absolute;
  left: 0;
  top: 0%;
  width: 2rem;
  height: 100%;
  background: #0902e3;
  opacity: 1 !important;
  border-bottom-right-radius: 50px;
  border-top-right-radius: 50px;
}
.v-tab--active:after {
  content: "";
  position: absolute;
  right: 0;
  top: 0;
  width: 2rem;
  height: 100%;
  background: #0902e3;
  border-bottom-left-radius: 50px;
  border-top-left-radius: 50px;
}
.theme--light.v-tabs .v-tab:hover:before {
  opacity: 1;
}
.v-tab--active.v-tab:not(:focus):before {
  opacity: 1;
}
.v-tab--active.v-tab:not(:focus):before {
  opacity: 1;
}
.theme--light.v-tabs > .v-tabs-bar .v-tab:not(.v-tab--active),
.theme--light.v-tabs > .v-tabs-bar .v-tab:not(.v-tab--active) > .v-icon {
  color: rgba(0, 0, 0, 0);
}
</style>