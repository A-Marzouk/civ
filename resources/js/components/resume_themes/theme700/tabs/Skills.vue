<template>
  <div class="tm700-skill" v-if="currentTab === 4">
    <div class="tm700-skill--tabs">
      <div class="tm700-skill--inner-tabs">
        <v-tabs
          v-model="tab"
          background-color="#FFF"
          class="tm700-skill-tabs--top"
          :centered="centered"
          :grow="grow"
          :vertical="vertical"
          :right="right"
          :icons-and-text="icons"
        >
          <v-tabs-slider></v-tabs-slider>
          <v-tab
            @click="currentSkillsTab = id"
            :class="[
                currentSkillsTab == id ? 'tm700-skill-tabs-active--tab tw-text-tm700-1' : 'tm700-skill-tabs-inactive--tab', 'tm700-skill-tabs--default',
                id === 4 ? 'tm700-skill-tabs-last-child': 'tm700-skill-tabs-not-last-child'
            ]"
            v-for="{title, id} in Skillstabs"
            :key="id"
            :href="`#tab-${id}`"
          >{{ title }}</v-tab>
        </v-tabs>
      </div>
    </div>
    <div class="tm700-skill--proglang" v-if="currentSkillsTab === 1">
      <div class="tm700-skill-proglang--inner">
        <div
          v-for="{id, name, percentage} in programingLanguages"
          :key="id"
          class="tm700-skill-proglangs"
        >
          <span class="tm700-skill-proglangs--name">{{name}}</span>
          <span class="tm700-skill-proglangs--bar">
            <span class="tm700-skill-proglangs-bar--blue" :style="{width:percentage + '%'}"></span>
          </span>
          <span class="tm700-skill-proglangs-percentage">{{percentage}}%</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["currentTab"],
  data() {
    return {
      skills: [{ id: 1 }, { id: 2 }, { id: 3 }, { id: 4 }],
      currentSkillsTab: 1,
      tab: null,
      centered: false,
      grow: false,
      vertical: false,
      right: false,
      icons: false,
      Skillstabs: [
        { title: "Programming Languages", id: 1 },
        { title: "Frameworks/ Databases", id: 2 },
        { title: "Design Skills", id: 3 },
        { title: "Software", id: 4 }
      ],
      programingLanguages: [
        { id: 1, name: "Photoshop", percentage: 90 },
        { id: 2, name: "Illustrator", percentage: 80 },
        { id: 3, name: "Figma", percentage: 50 },
        { id: 4, name: "Adobe XD", percentage: 90 }
      ]
    };
  }
};
</script>

<style lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Lato");

.tm700-skill {
  span,
  a {
    font-family: "Lato";
  }

  .tm700-skill--tabs {
    margin-top: 67px;
    margin-bottom: 60px;
    .v-tabs-slider-wrapper {
      height: 0;
      width: 0 !important;
    }
    .tm700-skill-tabs--top {
      display: flex;
      justify-content: center;
      background-color: var(--gray-gradient-1);
      .v-tabs-slider-wrapper {
        height: 0;
        width: 0;
      }
    }
    .tm700-skill-tabs-active--tab {
      color: var(--tm700-blue-1);
    }
    .tm700-skill-tabs-inactive--tab {
      color: var(--tm700-gray-2);
    }
    .tm700-skill-tabs--default {
      font-style: normal;
      font-weight: bold;
      font-size: 14px;
      line-height: 17px;
      padding: 0;
      text-transform: capitalize;
      display: flex;
      flex-direction: column;
      @media screen and (min-width: 768px) {
        font-size: 24px;
        line-height: 29px;
      }
      &:after {
        content: "";
        width: 80%;
        height: 4px;
        margin-top: 28px;
        background-color: var(--tm700-blue-1);
        border-radius: 2px;
        @media screen and (min-width: 768px) {
          width: 80%;
        }
      }
    }
    .tm700-skill-tabs-last-child {
      margin-right: 0;
    }
    .tm700-skill-tabs-not-last-child {
      margin-right: 38px;
      @media screen and (min-width: 768px) {
        margin-right: 158px;
      }
    }
    .v-slide-group__next,
    .v-slide-group__prev {
      min-width: 0 !important;
    }
  }
  .tm700-skill--proglang {
    .tm700-skill-proglang--inner {
      display: grid;
      grid-template-columns: repeat(1, minmax(0, 1fr));
      grid-row-gap: 47px;
      @media screen and (min-width: 768px) {
        grid-row-gap: 71px;
      }
    }
    .tm700-skill-proglangs {
      display: grid;
      grid-gap: 2rem;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      grid-template-rows: auto auto;
      grid-row-gap: 7px;
      align-items: center;
      width: 90%;
      justify-self: center;
      @media screen and (min-width: 768px) {
        margin-left: 2.1875‬rem;
        margin-right: 2.1875‬rem;
      }
      @media screen and (min-width: 1200px) {
        margin-left: 0;
        margin-right: 0;
        grid-template-columns: 150px 17fr 1fr;
        grid-template-rows: auto;
        grid-row-gap: 15px;
      }
      span {
        --grid-column: 1 / 2;
        --grid-row: 1 / 2;
        --font-size: 14px;
        --line-height: 17px;
        grid-column: var(--grid-column);
        grid-row: var(--grid-row);
        font-size: var(--font-size);
        line-height: var(--line-height);
        @media screen and (min-width: 768px) {
          --font-size: 24px;
          --line-height: 29px;
        }
      }
      .tm700-skill-proglangs--name {
        font-style: normal;
        font-weight: 800;
        color: var(--tm700-blue-1);
      }
      .tm700-skill-proglangs--bar {
        --grid-column: 1 / 3;
        --grid-row: 2 / 3;
        background-color: var(--gray-3);
        display: flex;
        border-radius: 15px;
        @media screen and (min-width: 1200px) {
          --grid-column: 2 / 3;
          --grid-row: 1 / 2;
        }
        .tm700-skill-proglangs-bar--blue {
          background-color: var(--tm700-blue-1);
          border-radius: 15px;
          height: 7px;
          @media screen and (min-width: 768px) {
            height: 14px;
          }
        }
      }
      .tm700-skill-proglangs-percentage {
        --grid-column: 2 / 3;
        --grid-row: 1 / 2;
        justify-self: flex-end;
        font-style: normal;
        font-weight: bold;
        color: var(--tm700-blue-1);
        @media screen and (min-width: 1200px) {
          --grid-column: 3 / 4;
          --grid-row: 1 / 2;
        }
      }
    }
  }
}
</style>
