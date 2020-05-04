<template>
  <div
    id="wrapper_theme700"
    class="w-full font-montserrat my-0 xl:mx-auto md:mx-0 max-w-tm700-xl-1 bg-tm700-7"
  >
    <Header></Header>
    <Main></Main>
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
<style lang="scss" scoped>
:root {
  --tm700-blue-1: #513ecd;
  --tm700-blue-2: #ebebeb;
  --tm700-gray-1: #2d2d2d;
  --tm700-gray-2: #d9d9d9;
}
@font-face {
  font-family: "Lato", sans-serif;
  src: "https://fonts.googleapis.com/css2?family=Lato&display=swap";
}
@font-face {
  font-family: "Lato", sans-serif;
  src: "https://fonts.googleapis.com/css2?family=Montserrat&display=swap";
}
@import url("https://fonts.googleapis.com/css2?family=Montserrat&display=swap");
#wrapper_theme700 .v-slide-group__next,
#wrapper_theme700 .v-slide-group__prev {
  min-width: 0 !important;
  flex-basis: 8px;
}
</style>
