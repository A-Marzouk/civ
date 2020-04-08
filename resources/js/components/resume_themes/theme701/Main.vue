<template>
  <section class="tm701-main">
    <div class="tm701-tabs xl:tw-py-50px">
      <div class="tm701-inner">
        <v-tabs
          v-model="tab"
          background-color="#FFF"
          class="tabs--top xl:tw-flex xl:tw-justify-center tw-font-muli"
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
                currentTab == id ? 'tm701-active-tab' : '', 'tm701-tabs--one tw-mr-100px tw-leading-64px w-font-bold tw-not-italic tw-text-tm701-6 tw-normal-case tw-list-none tw-text-30px',
            ]"
            v-for="{title, id} in tabs"
            :key="id"
            :href="`#tab-${id}`"
          >
            {{ title }}
          </v-tab>
        </v-tabs>
      </div>
    </div>
    <!--
    <Portfolio :currentTab="currentTab" />
    <Work :currentTab="currentTab" />
    <Education :currentTab="currentTab" />
    <Skills :currentTab="currentTab" />
    -->
  </section>
</template>
<script>
import Portfolio from "./tabs/Portfolio";
import Work from "./tabs/Work";
import Education from "./tabs/Education";
import Skills from "./tabs/Skills";
export default {
  components: { Portfolio, Work, Education, Skills },
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
  .tm701-main {
    // Start Tabs
    .tm701-tabs {
      .tm701-tabs--one {
        span {
          margin-right: 10px;
          font-size: 18px;
        }
        .tm701-active-tab-span {
          background-color: #ebebeb;
        }
        &:hover {
          background: none;
        }
      }
      .tm701-active-tab {
        background: none;
        color: #513ecd;
      }
      .v-tabs-slider {
        background: none;
      }
    }
  }

</style>
