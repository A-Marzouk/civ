<template>
  <div id="wrapper_theme1001">
    <Header :currentTab="currentTab" :currentUser="currentUser" />

    <TabsNavigation :currentTab="currentTab" @tabChanged="currentTab=$event" />

    <TabsContent :currentTab="currentTab" />
  </div>
</template>

<script>
import Header from "./components/Header";
import TabsNavigation from "./components/TabsNavigation";
import TabsContent from "./components/TabsContent";

export default {
  name: "resume-theme-1001",
  props: ["user", "is_preview"],
  components: { Header, TabsNavigation, TabsContent },

  data: () => {
    return {
      currentTab: "portfolio",
      currentUser: this.user
    };
  },
  computed: {
    socialLinks() {
      return this.currentUser.links.filter(link => {
        return link.category === "social_link" ? link : false;
      });
    }
  }
};
</script>
