<template>
  <div class="tm700-skill" v-if="currentTab === 4">
    <div class="tm700-skill--tabs font-lato mb-tm700-2">
      <div class="tm700-skill--inner-tabs w-full my-0 mx-auto">
        <v-tabs
          v-model="tab"
          background-color="#FFF"
          class="tm700-skill-tabs--top flex flex-row justify-center"
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
                currentSkillsTab == id ? 'tm700-skill-tabs-active--tab text-tm700-1' : 'text-tm700-3', 'tm700-skill-tabs--one  font-bold not-italic text-2xl list-none normal-case p-0 tracking-normal font-lato',
                id === 4 ? 'mr-0': 'mr-tm700-1'
            ]"
            v-for="{title, id} in Skillstabs"
            :key="id"
            :href="`#tab-${id}`"
          >{{ title }}</v-tab>
        </v-tabs>
      </div>
    </div>
    <div class="tm700-skill--proglang" v-if="currentSkillsTab === 1">
      <div class="tm700-skill-proglang--inner w-full max-w-tm700-dw-1 my-0 mx-auto grid grid-cols-1">
        <div
          v-for="{id, name, percentage} in programingLanguages"
          v-bind:key="id"
          class="tm700-skill-proglangs grid gap-8 font-lato grid-cols-tm700-d-skills-bar mb-tm700-6 items-center"
        >
          <span
            class="tm700-skill-proglangs--name text-tm700-1 not-italic font-extrabold text-2xl"
          >{{name}}</span>
          <span class="tm700-skill-proglangs--bar bg-tm700-2 h-tm700-7 flex">
            <span
              class="h-tm700-5 bg-tm700-1 rounded-civ-15"
              v-bind:style="{width:percentage + '%'}"
            ></span>
          </span>
          <span
            class="tm700-skill-proglangs-percentage text-tm700-1 not-italic font-bold text-2xl"
          >{{percentage}}%</span>
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
  .tm700-skill--tabs {
    .tm700-skill-tabs--top {
      background-color: linear-gradient(
        135.49deg,
        #ffffff 10.06%,
        #ffffff 75.33%
      );
      margin-top: 113px;
      .tm700-skill-tabs--one {
      }
      .tm700-skill-tabs-active--tab {
        color: #513ecd;
      }
      .v-tabs-slider {
        @apply bg-tm700-1 my-0 mx-auto w-2/4 h-tm700-3;
        box-shadow: 2px 5px 30px rgba(192, 18, 159, 0.37);
        border-radius: 15px;
      }
    }
  }
  .tm700-skill--proglang {
    .tm700-skill-proglangs {
      .tm700-skill-proglangs--name {
        line-height: 29px;
      }
      .tm700-skill-proglangs--bar {
        progress[value] {
          height: 20px;
          border-radius: 15px;
        }
        progress[value]::-webkit-progress-value,
        progress[value]::-moz-progress-value {
          color: red;
          @apply bg-tm700-1;
        }
        span:nth-child(1) {
        }
        span:nth-child(2) {
        }
      }
      .tm700-skill-proglangs-percentage {
        line-height: 29px;
      }
    }
  }
}
</style>
