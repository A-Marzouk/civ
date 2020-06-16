<template>
  <v-container fluid class="mt-6">
    <v-row justify-lg="center">
      <v-col lg="11" style="border-bottom: 1px solid rgba(122, 169, 239, 0.45);">
        <v-tabs
          v-model="tab"
          background-color="#FFF"
          grow
          hide-slider
          height="80"
          center-active
          class="tabmarg"
        >
          <v-tabs-slider></v-tabs-slider>
          <v-tab
            @click="currentTab = id"
            :class="[
              currentTab == id
                ? 'tm702-active-tab'
                : 'tm702-inactive-tab',
                'tm702-default-tab',
            ]"
            v-for="{ title, id } in tabs"
            :key="id"
            :href="`#tab-${id}`"
          >
            <div class="tabtitle">{{ title }}</div>
          </v-tab>
        </v-tabs>
      </v-col>

      <About :currentTab="currentTab" />
      <Portfolio :currentTab="currentTab" />
      <Work :currentTab="currentTab" />
      <Education :currentTab="currentTab" />
      <Skills :currentTab="currentTab" />
    </v-row>
  </v-container>
</template>
<script>
import Portfolio from "./tabs/Portfolio";
import Work from "./tabs/Work";
import Education from "./tabs/Education";
import Skills from "./tabs/Skills";
import About from "./tabs/About";
export default {
  components: {
    Portfolio,
    Work,
    Education,
    Skills,
    About
  },
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
        {
          title: "About",
          id: 1
        },
        {
          title: "Portfolio",
          id: 2
        },
        {
          title: "Work",
          id: 3
        },
        {
          title: "Education",
          id: 4
        },
        {
          title: "Skills",
          id: 5
        }
      ]
    };
  }
};
</script>
<style lang="scss" scoped>
.tabtitle {
  font-family: Open Sans;
  font-style: normal;
  font-weight: bold;
  font-size: 1.5rem;
  line-height: 54px;
  text-transform: capitalize;
  position: relative;
}

.tm702-inactive-tab {
  color: rgba(0, 91, 209, 0.3) !important;
}
.tm702-active-tab {
  color: #005bd1;
  position: relative;
}
.tm702-active-tab .tabtitle:after {
  content: "";
  position: absolute;
  left: 0;
  top: 45px;
  width: 40px;
  height: 3px;
  background: #005bd1;
}
.theme--light.v-tabs .v-tab--active:before,
.theme--light.v-tabs .v-tab--active:hover:before,
.theme--light.v-tabs .v-tab:focus:before {
  opacity: 0;
}
@media screen and (min-width: 768px) and (max-width: 1024px) {
  .tm702-active-tab .tabtitle:after {
    content: "";
    position: absolute;
    left: 0;
    top: 45px;
    width: 40px;
    height: 3px;
    background: #005bd1;
  }
}
@media screen and (min-width: 320px) and (max-width: 475px) {
  .v-tabs-bar.v-slide-group--is-overflowing.v-tabs-bar--is-mobile:not(.v-tabs-bar--show-arrows):not(.v-slide-group--has-affixes)
    .v-slide-group__prev {
    display: none !important;
    visibility: hidden;
  }
  .tm702-active-tab .tabtitle:after {
    content: "";
    position: absolute;
    left: 0;
    top: 45px;
    width: 40px;
    height: 3px;
    background: #005bd1;
  }
  .tabmarg {
    margin-left: -50px;
  }
}
</style>
