<template>
  <v-container fluid pa-0>
    <v-row no-gutters class="my-10" justify="center">
      <v-col cols="11" sm="11" lg="12">
        <v-tabs
          v-model="tab"
          background-color="#FFF"
          class="tabs--top tw-bg-tm700-7 tabmarg"
          grow
          hide-slider
          center-active
          color="#513ECD"
        >
          <v-tabs-slider></v-tabs-slider>
          <v-tab
            @click="currentTab = id"
            :class="[
                            currentTab == id ? 'tm700-active-tab' : '',
                            'tm700-tabs--one tw-mr-82px tw-font-montserrat tw-leading-37px w-font-bold tw-not-italic tw-text-tm700-3 tw-normal-case tw-list-none tw-text-3xl'
                        ]"
            v-for="{ title, id } in tabs"
            :key="id"
            :href="`#tab-${id}`"
          >
            <span
              :class="[
                                currentTab == id
                                    ? 'tw-bg-tm700-1'
                                    : 'tw-bg-tm700-2',
                                'tw-rounded-full tw-p-2 tw-text-white  tw-w-8 tw-h-8   tw-text-sm text-left mr-3'
                            ]"
            >{{ id }}.</span>

            <div class="text-capitalize tabtitle">{{ title }}</div>
          </v-tab>
        </v-tabs>
      </v-col>
    </v-row>
    <v-row>
      <v-col>
        <Portfolio :currentTab="currentTab" />
        <Work :currentTab="currentTab" />
        <Education :currentTab="currentTab" />
        <Skills :currentTab="currentTab" />
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
  components: {Portfolio, Work, Education, Skills },
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

<style lang="scss" scoped>
@import url("https://fonts.googleapis.com/css2?family=Montserrat&display=swap");
#wrapper_theme700 {
  .v-tab {
    align-items: center;
    display: flex;
    flex: 0 1 auto;
    font-size: 0.875rem;
    font-weight: 500;
    justify-content: center;
    letter-spacing: 0.0892857143em;
    line-height: normal;
    min-width: 90px;
    max-width: 360px;
    outline: none;
    padding: 0 16px 0 0;
    margin: 0 40px 0 0;
    position: relative;
    text-align: center;
    text-decoration: none;
    text-transform: uppercase;
    transition: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }
  .tabtitle {
    font-family: Montserrat;
    font-style: normal;
    font-weight: bold;
    font-size: 1.3rem;
    line-height: 37px;
    /* identical to box height */

    font-feature-settings: "tnum" on, "lnum" on;
  }
  @media screen and (min-width: 768px) and (max-width: 1024px) {
    .tabmarg {
      margin-left: -10px;
    }
    .v-tab {
      align-items: center;
      display: flex;
      flex: 0 1 auto;
      font-size: 0.875rem;
      font-weight: 500;
      justify-content: center;
      letter-spacing: 0.0892857143em;
      line-height: normal;
      min-width: 90px;
      max-width: 360px;
      outline: none;
      padding: 0 16px 0 0;
      margin: 0 20px 0 0;
      position: relative;
      text-align: center;
      text-decoration: none;
      text-transform: uppercase;
      transition: none;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }
  }
  @media screen and (min-width: 320px) and (max-width: 767px) {
    .tabmarg {
      margin-left: -50px;
    }
    .v-tab {
      align-items: center;
      display: flex;
      flex: 0 1 auto;
      font-size: 0.875rem;
      font-weight: 500;
      justify-content: center;
      letter-spacing: 0.0892857143em;
      line-height: normal;
      min-width: 90px;
      max-width: 360px;
      outline: none;
      padding: 0 16px 0 0;
      margin: 0 30px 0 0;
      position: relative;
      text-align: center;
      text-decoration: none;
      text-transform: uppercase;
      transition: none;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }
  }
}
</style>
