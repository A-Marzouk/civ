<template>
  <v-app class="margdesk">
    <div id="wrapper_theme700">
      <Header></Header>
      <Main></Main>
    </div>
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
<style lang="scss" scoped>
#wrapper_theme700 {
  --blue-1: #513ecd;
  --gray-1: #2d2d2d;
  --gray-2: #d9d9d9;
  --gray-3: #ebebeb;
}
@font-face {
  font-family: "Lato", sans-serif;
  src: "https://fonts.googleapis.com/css2?family=Lato&display=swap";
}
@font-face {
  font-family: "Montserrat", sans-serif;
  src: "https://fonts.googleapis.com/css2?family=Montserrat&display=swap";
}
@font-face {
  font-family: "Gotham Pro";
  src: local("Gotham Pro"), url("/fonts/GothaProReg.woff") format("woff");
}
@import url("https://fonts.googleapis.com/css2?family=Montserrat&display=swap");
#wrapper_theme700 .v-slide-group__next,
#wrapper_theme700 .v-slide-group__prev {
  min-width: 0 !important;
  flex-basis: 8px;
}
.theme--light.v-application {
  background: linear-gradient(
    135.49deg,
    #ffffff 10.06%,
    #ffffff 75.33%
  ) !important;
  color: rgba(0, 0, 0, 0.87);
}
@media screen and (min-width: 1025px) {
  .margdesk {
    padding: 0 5rem !important;
  }
}
@media screen and (min-width: 320px) {
  .margdesk {
    padding: 0 0;
  }
}
</style>
