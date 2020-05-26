<template>
  <v-app>
    <div class="back" id="wrapper_theme508">
      <Header></Header>
      <Main class="mt-n4 mt-sm-0"></Main>
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
.back {
  background: linear-gradient(to right, #7a39db, #6048ff);
  font-family: "'SF UI Text Regular'";
}
#wrapper_theme508 .v-slide-group__next,
#wrapper_theme508 .v-slide-group__prev {
  min-width: 0 !important;
  flex-basis: 8px;
}

@media only screen and (max-width: 425px) {
  .back {
    background: linear-gradient(to bottom, #7a39db, #6048ff);
    font-family: "'SF UI Text Regular'";
  }
}
</style>
