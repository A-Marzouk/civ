<template>
  <div id="wrapper_theme1001">
    <Header :activeTab="activeTab" :currentUser="currentUser" />

    <TabsNavigation
      :activeTab="activeTab"
      :currentUser="currentUser"
      @tab-changed="activeTab = $event"
      :currentTab="currentTab"
    />

    <TabsContent :activeTab="activeTab" :currentUser="currentUser" />
  </div>
</template>

<script>
import Header from "./components/Header";
import TabsNavigation from "./components/TabsNavigation";
import TabsContent from "./components/TabsContent";

export default {
  name: "resume-theme-1001",

  components: { Header, TabsNavigation, TabsContent },
  props: ["user", "is_preview", "currentTab"],
  data() {
    return {
      activeTab: "portfolio",
      currentUser: this.user
    };
  },
  watch: {
    // if current tab changed, change the active tab as well.
    currentTab: function(val) {
      this.activeTab = val;
    }
  },
  methods: {
    setDummyUser() {
      this.currentUser = this.$store.state.dummyUser;
    },
    setActiveTabByURL(){
      let currentParam = this.$route.query['current-view'];

      if(currentParam.includes('education') || currentParam.includes('experience')){
        this.activeTab = 'experience-education';
      }

      if(currentParam.includes('skills') || currentParam.includes('languages')){
        this.activeTab = 'skills-languages';
      }

      if(currentParam.includes('media') || currentParam.includes('audio') || currentParam.includes('video')){
        this.activeTab = 'media';
      }

      if(currentParam.includes('about') || currentParam.includes('profile')){
        this.activeTab = 'about-me';
      }
    }
  },
  mounted() {
    // if there is no user or the preview is true, set dummy user
    if (!this.currentUser || this.is_preview) {
      this.setDummyUser();
    }

    // let user accessible in included components.
    this.$store.dispatch("updateThemeUser", this.currentUser);

    // set active tab
    this.setActiveTabByURL();
  }
};
</script>
