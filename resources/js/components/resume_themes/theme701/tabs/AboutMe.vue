<template>
  <div class="tm701-aboutme xl:tw-pl-20 xl:tw-pr-24 tw-font-muli" v-if="currentTab === 5">
    <div
      class="xl:tw-grid xl:tw-grid-cols-2 xl:tw-col-gap-247px xl:tw-grid-cols-tm701-skills--inner xl:tw-mb-20"
    >
      <div class="xl:tw-w-3/4">
        <h2 class="tw-text-tm701-6 tw-text-40px tw-leading-50px xl:tw-mb-10">
          Welcome to
          My profile!
        </h2>
      </div>
      <div class="tw-grid xl:tw-grid-cols-2 xl:tw-gap-16 tw-text-tm701-11">
        <div>
          <p
            class="tw-text-20px tw-font-light tw-leading-35px xl:tw-mb-44px"
          >Currently I'm a freelance designer and web developer, who works with a variety of clients and on many diverse projects.</p>
          <p
            class="tw-text-20px tw-font-light tw-leading-35px"
          >I work to create innovative solutions that inspire, and foster memorable relationships between brands and their clients. With a focus on branding and UI / Web, I strive to create usable and polished products through passionate and deliberate design</p>
        </div>
        <div>
          <p
            class="tw-text-20px tw-font-light tw-leading-35px xl:tw-mb-44px"
          >Currently I'm a freelance designer and web developer, who works with a variety of clients and on many diverse projects.</p>
          <p
            class="tw-text-20px tw-font-light tw-leading-35px"
          >I work to create innovative solutions that inspire, and foster memorable relationships between brands and their clients.</p>
        </div>
      </div>
    </div>
    <div class="tw-grid xl:tw-grid-cols-4 xl:tw-col-gap-112px">
      <div>
        <span class="xl:tw-block tw-text-40px tw-leading-64px tw-font-semibold tw-text-tm701-6">23</span>
        <span
          class="xl:tw-block tw-text-30px tw-leading-64px tw-font-regular tw-text-tm701-1"
        >Projects Done</span>
        <p class="xl:tw-block tw-text-20px tw-leading-30px tw-font-regular tw-text-tm701-11">
          I enthusiastically create
          unique designs and brands.
        </p>
      </div>
      <div>
        <span class="xl:tw-block tw-text-40px tw-leading-64px tw-font-semibold tw-text-tm701-6">400</span>
        <span
          class="xl:tw-block tw-text-30px tw-leading-64px tw-font-regular tw-text-tm701-1"
        >Projects Done</span>
        <p class="xl:tw-block tw-text-20px tw-leading-30px tw-font-regular tw-text-tm701-11">
          I enthusiastically create
          unique designs and brands.
        </p>
      </div>
      <div>
        <span class="xl:tw-block tw-text-40px tw-leading-64px tw-font-semibold tw-text-tm701-6">23</span>
        <span
          class="xl:tw-block tw-text-30px tw-leading-64px tw-font-regular tw-text-tm701-1"
        >Projects Done</span>
        <p class="xl:tw-block tw-text-20px tw-leading-30px tw-font-regular tw-text-tm701-11">
          I enthusiastically create
          unique designs and brands.
        </p>
      </div>
      <div>
        <span class="xl:tw-block tw-text-40px tw-leading-64px tw-font-semibold tw-text-tm701-6">23</span>
        <span
          class="xl:tw-block tw-text-30px tw-leading-64px tw-font-regular tw-text-tm701-1"
        >Projects Done</span>
        <p class="xl:tw-block tw-text-20px tw-leading-30px tw-font-regular tw-text-tm701-11">
          I enthusiastically create
          unique designs and brands.
        </p>
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
</style>
