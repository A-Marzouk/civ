<template>
  <div class="tabs-content">
    <keep-alive>
      <component v-bind:is="componentName" :currentUser="currentUser"></component>
    </keep-alive>
  </div>
</template>

<script>
import AboutMe from './../tabs/AboutMe';
import Education from './../tabs/Education';
import WorkExperience from './../tabs/WorkExperience';
import Media from './../tabs/Media';
import Portfolio from './../tabs/Portfolio';
import Skills from './../tabs/Skills';

export default {
  name: 'TabsContent',

  components: { AboutMe, Education, WorkExperience, Media, Portfolio, Skills },

  props: {
    currentTab: {
      type: String,
      required: true
    },
    currentUser: {
      type: Object,
      required: true
    }
  },

  computed: {
    componentName() {
      return this.currentTab
        .toLowerCase()
        .split('_')
        .map(substr => {
          return substr.charAt(0).toUpperCase() + substr.slice(1);
        })
        .join('');
    }
  }
};
</script>

<style lang="scss" scoped>
@import './../scss/variables';

.tabs-content {
  padding: 25px 10px;

  @include lg {
    padding: 40px 15px;
  }
}
</style>
