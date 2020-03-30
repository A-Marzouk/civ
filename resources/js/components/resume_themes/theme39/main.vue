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
                currentTab == id ? 'tm39-active-tab' : '', 'tm39-tabs--one font-bold not-italic font-gray-302 normal-case list-none',
            ]"
            v-for="{title, id} in tabs"
            :key="id"
            :href="`#tab-${id}`"
          >
            <span
              :class="[currentTab == id ? 'bg-purple-501': 'bg-gray-301','rounded p-2 text-white flex items-center']"
            >{{id}}.</span>
            {{ title }}
          </v-tab>
        </v-tabs>
      </div>
    </div>
    <div class="tm39-portfolio" v-if="currentTab === 1">
      <div class="inner">
        <div class="tm39-portfolios grid grid-cols-3">
          <div v-for="(portfolio,id) in portfolios" v-bind:key="id">
            <img class="w-full" v-bind:src="portfolio.url" />
          </div>
        </div>
      </div>
    </div>
    <div class="tm39-work" v-if="currentTab === 2">
      <div class="tm39-work--inner grid grid-cols-2">
        <div v-for="({id}) in works" v-bind:key="id" class="tm39-works flex flex-row items-start">
          <span
            class="tm39-works--span rounded p-2 text-white flex items-center bg-purple-501"
          >{{id}}.</span>
          <div class="flex flex-col justify-between">
            <div class="tm39-works--info">
              <h3
                class="tm39-works--title not-italic text-2xl text-purple-501 font-normal"
              >Google Inc. Introduction Google</h3>
              <span
                class="tm39-works--slogan text-black capitalize not-italic font-normal"
              >User interface designer</span>
            </div>
            <span class="tm39-works--when">2012- Current</span>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import EllipseTab1 from "../../../../../public/images/resume_themes/theme39/ellipse-tab1.svg";
export default {
  components: { EllipseTab1 },
  data() {
    return {
      tab: null,
      text:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
      icons: false,
      centered: false,
      grow: false,
      vertical: false,
      prevIcon: false,
      nextIcon: false,
      right: false,
      currentTab: 1,
      tabs: [
        {
          title: "Portfolio",
          id: 1,
          image: "layer",
          height: 20,
          width: 20,
          icon: "icon"
        },
        { title: "Work", id: 2, image: "portfolio", height: 20, width: 22 },
        { title: "Education", id: 3, image: "book", height: 20, width: 22 },
        { title: "Skills", id: 4, image: "idea", height: 20, width: 20 }
      ],
      portfolios: [
        {
          id: 1,
          url: "/images/resume_themes/theme39/portfolio1.png"
        },
        {
          id: 2,
          url: "/images/resume_themes/theme39/portfolio2.png"
        },
        {
          id: 3,
          url: "/images/resume_themes/theme39/portfolio3.png"
        },
        {
          id: 4,
          url: "/images/resume_themes/theme39/portfolio4.png"
        },
        {
          id: 5,
          url: "/images/resume_themes/theme39/portfolio5.png"
        },
        {
          id: 6,
          url: "/images/resume_themes/theme39/portfolio6.png"
        }
      ],
      works: [{ id: 1 }, { id: 2 }, { id: 3 }, { id: 4 }]
    };
  }
};
</script>

<style lang="scss">
#wrapper_theme39 {
  .main {
    margin-top: 54px;
    margin-bottom: 54px;
    .tm39-tabs {
      .tabs--top {
        background-color: linear-gradient(
          135.49deg,
          #ffffff 10.06%,
          #ffffff 75.33%
        );
      }
      .tm39-tabs--one {
        font-style: normal;
        font-weight: bold;
        font-size: 30px;
        line-height: 37px;
        /* identical to box height */
        font-feature-settings: "tnum" on, "lnum" on;
        font-family: Montserrat;
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
    .tm39-portfolio {
      margin-top: 78px;
      .tm39-portfolios {
        grid-row-gap: 93px;
        grid-column-gap: 25px;
        > div {
          img {
          }
        }
      }
    }
    .tm39-work {
      margin-top: 189px;
      .tm39-work--inner {
        width: 100%;
        max-width: 87.25rem;
        margin: 0 auto;
        grid-row-gap: 174px;
      }
      .tm39-works {
        font-family: "Gotham Pro", "Montserrat";
        span.tm39-works--span {
          margin-right: 19px;
          width: 44px;
          height: 44px;
          border-radius: 50%;
          font-size: 18px;
          flex: 0;
        }
        .tm39-works--info {
          margin-bottom: 35px;
          .tm39-works--title {
            line-height: 23px;
          }
          .tm39-works--slogan {
            font-size: 12px;
            line-height: 11px;
          }
        }
        span.tm39-works--when {
          font-size: 12px;
          line-height: 11px;
        }
      }
    }
  }
}
</style>
