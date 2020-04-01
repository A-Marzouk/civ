<template>
  <div id="wrapper_theme700">
    <Header></Header>
    <Main></Main>
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

<style lang="scss">
#wrapper_theme700 {
  background: linear-gradient(135.49deg, #ffffff 10.06%, #ffffff 75.33%);
  width: 100%;
  max-width: 120rem;
  margin: 0 auto;
  font-family: Montserrat;
  .inner {
    width: 100%;
    max-width: 106.5625rem;
    margin: 0 auto;
  }
}
</style>
