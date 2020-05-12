<template>
  <div id="wrapper_theme701">
    <Header />
    <Main />
  </div>
</template>

<script>
import Header from "./Header";
import Main from "./Main";
export default {
  components: { Header, Main },
  data() {
    return {};
  },

  methods: {}
};
</script>

<style lang="scss" scoped>
@font-face {
  font-family: "Lato", sans-serif;
  src: "https://fonts.googleapis.com/css2?family=Muli:wght@300;400;600&display=swap";
}
#wrapper_theme701 {
  --blue-1: #28404a;
  width: 100%;
  background-color: #fff;
  font-family: Muli, sans-serif;
  box-sizing: border-box;
}
* {
  font-family: Muli, sans-serif;
}
</style>
