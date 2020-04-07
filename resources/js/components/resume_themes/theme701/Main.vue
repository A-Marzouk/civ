<template>
  <section class="main tw-my-52px">
    <div class="tm700-tabs">
      <div class="tm700-inner lg:tw-ml-113px">
        <v-tabs
          v-model="tab"
          background-color="#FFF"
          class="tabs--top tw-bg-tm700-7"
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
                currentTab == id ? 'tm700-active-tab' : '', 'tm700-tabs--one tw-mr-82px tw-font-montserrat tw-leading-37px w-font-bold tw-not-italic tw-text-tm700-3 tw-normal-case tw-list-none tw-text-3xl',
            ]"
            v-for="{title, id} in tabs"
            :key="id"
            :href="`#tab-${id}`"
          >
            <span
              :class="[currentTab == id ? 'tw-bg-tm700-1': 'tw-bg-tm700-2','tw-rounded-full tw-p-2 tw-text-white tw-flex tw-items-center tw-w-44px tw-h-44px tw-w-54px tw-mr-10px tw-text-18px']"
            >{{id}}.</span>
            {{ title }}
          </v-tab>
        </v-tabs>
      </div>
    </div>
    <Portfolio :currentTab="currentTab" />
    <Work :currentTab="currentTab" />
    <Education :currentTab="currentTab" />
    <Skills :currentTab="currentTab" />
  </section>
</template>
<script>
import EllipseTab1 from "../../../../../public/images/resume_themes/theme700/ellipse-tab1.svg";
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
#wrapper_theme700 {
  .main {
    // Start Tabs
    .tm700-tabs {
      .tm700-tabs--one {
        span {
          margin-right: 10px;
          font-size: 18px;
        }
        .tm700-active-tab-span {
          background-color: #ebebeb;
        }
        &:hover {
          background: none;
        }
      }
      .tm700-active-tab {
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
