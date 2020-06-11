<template>
  <v-app id="wrapper_theme702">
    <Header />
    <Main />
  </v-app>
</template>
<script>
import Header from "./Header";
import Main from "./Main";
export default {
  components: {
    Header,
    Main
  },
  data() {
    return {};
  },
  methods: {}
};
</script>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap");

#wrapper_theme702 {
  --blue: #005bd1;
  --gray: #767676;
  --gray-1: #6d6d6d;
  --gray-2: #1f2021;
  --gray-shadow: #2466ca;
  --gray-tab: #b3cef1;
  --gray-about: #828282;
  --gray-p: #4e4e4e;
  --bg-color: #f9f9f9;
  --bg-gray: #e5e5e5;
  --green: #6aefbf;
  --yellow: #ffb340;
  --white: #fff;
  --size: 24px;
  --breakpoint-xs: 0;
  --breakpoint-sm: 640px;
  --breakpoint-md: 768px;
  --breakpoint-lg: 1024px;
  --breakpoint-xl: 1280px;
  --breakpoint-xxl: 1800px;
}

* {
  font-family: "Open Sans", sans-serif;
}
</style>
