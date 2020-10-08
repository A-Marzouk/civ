<template>
  <div class="tabs-content">
    <component v-bind:is="builderCurrentTabTitle.toLowerCase()" :currentUser="currentUser"></component>
  </div>
</template>

<script>
import about_me from "./../views/AboutMe";
import media from "./../views/Media";
import portfolio from "./../views/Portfolio";
import skills from "./../views/Skills";
import hobbies from "./../views/Hobbies";
import references from "./../views/References";
import achievements from "./../views/Achievement";
import work_experience from "./ExperienceEducation/Experience";
import education from "./ExperienceEducation/Education";


export default {
  name: "TabsContent",

  components: {
    about_me,
    media,
    portfolio,
    work_experience,
    skills,
    hobbies,
    references,
    achievements,
    education
  },

  props: {
    builderCurrentTabTitle: {
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
