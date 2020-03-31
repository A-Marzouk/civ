<template>
  <section class="main">
    <div class="tm39-tabs">
      <div class="inner">
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
                currentTab == id ? 'tm39-active-tab' : '', 'tm39-tabs--one font-bold not-italic text-tm39-3 normal-case list-none text-3xl',
            ]"
            v-for="{title, id} in tabs"
            :key="id"
            :href="`#tab-${id}`"
          >
            <span
              :class="[currentTab == id ? 'bg-tm39-1': 'bg-tm39-2','rounded p-2 text-white flex items-center']"
            >{{id}}.</span>
            {{ title }}
          </v-tab>
        </v-tabs>
      </div>
    </div>
    <Portfolio v-bind:currentTab="currentTab"></Portfolio>
    <Work v-bind:currentTab="currentTab"></Work>
    <Education v-bind:currentTab="currentTab"></Education>
    <Skills v-bind:currentTab="currentTab"></Skills>
  </section>
</template>
<script>
import EllipseTab1 from "../../../../../public/images/resume_themes/theme39/ellipse-tab1.svg";
import Portfolio from "./tabs/Portfolio";
import Work from "./tabs/Work";
import Education from "./tabs/Education";
import Skills from "./tabs/Skills";
export default {
  components: { EllipseTab1, Portfolio, Work, Education, Skills },
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
        { title: "Skills", id: 4 }
      ]
    };
  }
};
</script>

<style lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Montserrat&display=swap");
#wrapper_theme39 {
  .main {
    margin-top: 54px;
    margin-bottom: 54px;
    // Start Tabs
    .tm39-tabs {
      .tabs--top {
        background-color: linear-gradient(
          135.49deg,
          #ffffff 10.06%,
          #ffffff 75.33%
        );
      }
      .tm39-tabs--one {
        line-height: 37px;
        font-family: "Montserrat", sans-serif;
        font-feature-settings: "tnum" on, "lnum" on;
        margin-right: 82px;
        span {
          margin-right: 10px;
          width: 44px;
          height: 44px;
          border-radius: 50%;
          font-size: 18px;
        }
        .tm39-active-tab-span {
          background-color: #ebebeb;
        }
        &:hover {
          background: none;
        }
      }
      .tm39-active-tab {
        background: none;
        color: #513ecd;
      }
      .v-tabs-slider {
        background: none;
      }
    }
  }
}
</style>
