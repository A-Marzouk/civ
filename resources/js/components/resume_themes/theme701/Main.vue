<template>
  <section class="tm701-main">
    <div class="tm701-tabs--container">
      <div
        class="tm701-tabs tw-pt-50px tw-pb-80px tw-border-t-14 tw-border-tm701-5 tw-rounded-t-5rem tw-bg-white"
      >
        <div class="tm701-inner">
          <v-tabs
            v-model="tab"
            background-color="#FFF"
            class="tabs--top tw-flex tw-justify-center tw-font-muli"
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
                ? 'tm701-active-tab tw-border tw-border-tm701-7  tw-rounded-lg  tw-py-10px  tw-px-30px'
                : 'tw-text-black',
              'tm701-tabs--one  tw-mr-100px  tw-leading-64px w-font-bold tw-not-italic tw-text-tm701-6 tw-normal-case tw-list-none tw-text-20px',
            ]"
              v-for="{ title, id } in tabs"
              :key="id"
              :href="`#tab-${id}`"
            >{{ title }}</v-tab>
          </v-tabs>
        </div>
      </div>
    </div>
    <div>
      <div class="tw-w-full tw-max-w-1727px tw-mx-auto">
        <div class="tw-flex tw-justify-between tw-max-h-screen-xl tw-items-center">
          <div class="tw-flex tw-flex-col tw-items-center">
            <span
              class="tw-transform tw--rotate-90 tw-block tw-mb-4 tw-text-18px font-bold leading-40px"
            >scroll</span>
            <span class>
              <FontAwesomeIcon :icon="['fa', 'arrow-down']" />
            </span>
          </div>
          <div class="tw-flex-1 tw-pr-265px tw-pl-180px">
            <Portfolio :currentTab="currentTab" />
            <Work :currentTab="currentTab" />
            <Education :currentTab="currentTab" />
            <Skills :currentTab="currentTab" />
            <AboutMe :currentTab="currentTab" />
          </div>
          <div class="tw-flex tw-flex-col tw-items-center">
            <div class="tw-mb-6">
              <span
                class="tw-transform tw-rotate-90 tw-block tw-pr-6 tw-text-18px tw-font-bold leading-17px tw-mb-8 tw-text-tm701-5"
              >Social</span>
              <span
                class="tw-transform tw-rotate-90 tw-block tw-pr-6 tw-text-18px tw-font-bold leading-17px tw-text-tm701-5"
              >media</span>
            </div>
            <div class="line tw-mb-28px">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="1"
                height="112.728"
                viewBox="0 0 1 112.728"
              >
                <path
                  id="Path_4959"
                  data-name="Path 4959"
                  d="M16823.158,2454.041v112.728"
                  transform="translate(-16822.659 -2454.041)"
                  fill="none"
                  stroke="#dbe0c2"
                  stroke-width="1"
                />
              </svg>
            </div>
            <div class="tw-flex tw-flex-col tw-text-tm701-5">
              <FontAwesomeIcon
                class="tw-mb-26px tw-transform tw-rotate-90"
                :icon="['fab', 'facebook-f']"
              />
              <FontAwesomeIcon
                class="tw-mb-26px tw-transform tw-rotate-90"
                :icon="['fab', 'linkedin-in']"
              />
              <FontAwesomeIcon
                class="tw-mb-26px tw-transform tw-rotate-90"
                :icon="['fab', 'behance']"
              />
              <FontAwesomeIcon
                class="tw-mb-26px tw-transform tw-rotate-90"
                :icon="['fab', 'twitter']"
              />
              <FontAwesomeIcon
                class="tw-mb-26px tw-transform tw-rotate-90"
                :icon="['fab', 'dribbble']"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import Portfolio from "./tabs/Portfolio";
import Work from "./tabs/Work";
import Education from "./tabs/Education";
import Skills from "./tabs/Skills";
import AboutMe from "./tabs/AboutMe";
import {
  faFacebookF,
  faLinkedinIn,
  faBehance,
  faTwitter,
  faDribbble
} from "@fortawesome/free-brands-svg-icons";
import { library } from "@fortawesome/fontawesome-svg-core";
import { faArrowDown } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
library.add(
  faFacebookF,
  faLinkedinIn,
  faBehance,
  faTwitter,
  faDribbble,
  faArrowDown
);
export default {
  components: { Portfolio, Work, Education, Skills, AboutMe, FontAwesomeIcon },
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
        { title: "Work Experience", id: 2 },
        { title: "Education", id: 3 },
        { title: "Skills and languages", id: 4 },
        { title: "About me and Awards", id: 5 }
      ]
    };
  }
};
</script>

<style lang="scss">
.tm701-main {
  .tm701-tabs--container {
    background-image: url("../../../../../public/images/resume_themes/theme701/header-mask.png");
    background-color: #dbdec4;
  }
  // Start Tabs
  .tm701-tabs {
    .tm701-tabs--one {
      font-size: 20px;
      color: #000000 !important;
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
      color: #2f5e5e;
      font-size: 20px;
    }
    .v-tabs-slider {
      background: none;
    }
  }
}
</style>
