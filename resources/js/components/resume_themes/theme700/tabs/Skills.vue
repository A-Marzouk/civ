<template>
  <div class="tm700-skill" v-if="currentTab === 4">
    <div class="tm700-skill--tabs tw-font-lato tw-mb-tm700-2">
      <div class="tm700-skill--inner-tabs tw-w-full tw-my-0 tw-mx-auto xl:tw-mx-336px">
        <v-tabs
          v-model="tab"
          background-color="#FFF"
          class="tm700-skill-tabs--top tw-flex tw-flex-row tw-justify-center tw-bg-tm700-7 tw-mt-113px"
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
                currentSkillsTab == id ? 'tm700-skill-tabs-active--tab tw-text-tm700-1' : 'tw-text-tm700-3', 'tm700-skill-tabs--one  tw-font-bold tw-not-italic tw-text-2xl tw-list-none tw-normal-case tw-p-0 tw-tracking-normal tw-font-lato',
                id === 4 ? 'tw-mr-0': 'tw-mr-tm700-1'
            ]"
            v-for="{title, id} in Skillstabs"
            :key="id"
            :href="`#tab-${id}`"
          >{{ title }}</v-tab>
        </v-tabs>
      </div>
    </div>
    <div class="tm700-skill--proglang" v-if="currentSkillsTab === 1">
      <div class="tm700-skill-proglang--inner tw-w-full tw-max-w-tm700-dw-1 tw-my-0 tw-mx-auto tw-grid tw-grid-cols-1">
        <div
          v-for="{id, name, percentage} in programingLanguages"
          v-bind:key="id"
          class="tm700-skill-proglangs tw-grid tw-gap-8 tw-font-lato tw-grid-cols-tm700-d-skills-bar tw-mb-tm700-6 tw-items-center md:tw-mx-35px lg:tw-mx-0"
        >
          <span
            class="tm700-skill-proglangs--name tw-text-tm700-1 tw-not-italic tw-font-extrabold tw-text-2xl tw-leading-29px"
          >{{name}}</span>
          <span class="tm700-skill-proglangs--bar tw-bg-tm700-2 tw-h-tm700-7 tw-flex">
            <span
              class="tw-h-tm700-5 tw-bg-tm700-1 tw-rounded-civ-15"
              v-bind:style="{width:percentage + '%'}"
            ></span>
          </span>
          <span
            class="tm700-skill-proglangs-percentage tw-text-tm700-1 tw-not-italic tw-font-bold tw-text-2xl tw-leading-29px"
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
      .v-tabs-slider {
        @apply bg-tm700-1 my-0 mx-auto w-2/4 h-tm700-3;
        box-shadow: 2px 5px 30px rgba(192, 18, 159, 0.37);
        border-radius: 15px;
      }
    }
  }
}
</style>
