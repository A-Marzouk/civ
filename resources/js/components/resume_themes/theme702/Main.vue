<template>
  <section class="tm702-main">
    <div class="tm702-tabs--inner">
      <v-tabs
        v-model="tab"
        background-color="#FFF"
        class="tabs--top"
        :centered="centered"
        :grow="grow"
        :vertical="vertical"
        :right="right"
        :icons-and-text="icons"
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
        >{{ title }}</v-tab>
      </v-tabs>
    </div>
    <About :currentTab="currentTab" />
    <Portfolio :currentTab="currentTab" />
    <Work :currentTab="currentTab" />
    <Education :currentTab="currentTab" />
    <Skills :currentTab="currentTab" />
  </section>
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
.tm702-main {
  .tm702-tabs--inner {
    background-color: var(--white);
    @media screen and (min-width: 1280px) {
      margin-left: 30px;
      margin-right: 30px;
    }
  }

  .v-slide-group__next,
  .v-slide-group__prev {
    max-width: 16px;
    min-width: 0;
    @media screen and(min-width: 1200px) {
      min-width: 52px;
      max-width: auto;
    }
  }

  // Start Tabs

  .tabs--top {
    border-bottom: 1px solid rgba(122, 169, 239, 0.45);
    padding-bottom: 26px;
  }

  .tm702-default-tab {
    font-size: 24px;
    line-height: 33px;
    font-weight: bold;
    background: none;
    text-transform: capitalize;
    padding: 0;
    margin-right: 38px;
    font-style: normal;
    &:hover {
      background: none;
    }
  }

  .tm702-active-tab {
    color: var(--blue) !important;
  }

  .tm702-inactive-tab {
    color: var(--gray-tab) !important;
  }

  .v-tabs-slider-wrapper {
    height: 4px !important;
  }

  .v-tabs-slider {
    height: 4px;
    left: 0px;
    width: 35px;
    color: var(--blue);
  }
}
</style>
