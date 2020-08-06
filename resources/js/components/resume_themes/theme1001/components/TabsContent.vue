<template>
  <div class="tabs-content">
    <component v-bind:is="activeTab" :currentUser="currentUser"></component>
  </div>
</template>

<script>
import AboutMe from "./../views/AboutMe";
import Media from "./../views/Media";
import Portfolio from "./../views/Portfolio";
import SkillsLanguages from "./../views/SkillsLanguages";
import ExperienceEducation from "./ExperienceEducation/ExperienceEducation";

export default {
  name: "TabsContent",

  components: {
    Media,
    AboutMe,
    Portfolio,
    ExperienceEducation,
    SkillsLanguages
  },

  props: {
    activeTab: {
      type: String,
      required: true
    },
    currentUser: {
      type: undefined,
      required: true
    }
  }
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

.tabs-content {
  padding-left: 20px;
  padding-right: 20px;
}

@media (max-width: 475px) {
  .tabs-content {
    padding-left: 1rem;
    padding-right: 1rem;
  }
}

@media (min-width: $lg) {
  .tabs-content {
    max-width: $lg;
    padding-left: 50px;
    padding-right: 50px;
    margin: 0 auto;
  }
}

@media (min-width: 1600px) {
  .tabs-content {
    max-width: 1600px;
    padding-left: 100px;
    padding-right: 100px;
  }
}

@media (min-width: $xl) {
  .tabs-content {
    max-width: $xl;
  }
}
</style>
