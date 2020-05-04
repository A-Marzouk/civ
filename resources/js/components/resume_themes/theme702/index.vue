<template>
  <div id="wrapper_theme702" class="index-container">
    <Header />
    <Main />
  </div>
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
  --gray-shadow: #2466ca;
  --gray-tab: #b3cef1;
  --gray-about: #828282;
  --gray-p: #4e4e4e;
  --bg-color: #f9f9f9;
  --bg-gray: #e5e5e5;
  --green: #6aefbf;
  --white: #fff;
  --size: 24px;
  --breakpoint-xs: 0;
  --breakpoint-sm: 600px;
  --breakpoint-md: 768px;
  --breakpoint-lg: 992px;
  --breakpoint-xl: 1200px;
  --breakpoint-xxl: 1800px;
}

* {
  font-family: "Open Sans", sans-serif;
}

h2 {
  color: var(--blue);
  font-size: 22px;
  font-weight: bold;
}

span {
  color: var(--gray);
  font-weight: normal;
  font-size: 12px;
}

p {
  color: var(--gray-about);
  font-weight: normal;
  font-size: 14px;
  line-height: 1.4;
}

.index-container {
  width: 100%;
  /*max-width: 375px; */
  box-sizing: border-box;
  font-family: "Open Sans", sans-serif;
}
</style>
