<template>
  <v-app id="theme512">
    <v-container fluid pa-0>
      <v-row no-gutters id="header">
        <v-col cols="12">
          <Header />
        </v-col>
      </v-row>
      <v-row no-gutters id="main">
        <v-col cols="12">
          <Main />
        </v-col>
      </v-row>
    </v-container>
  </v-app>
</template>

<script>
import Header from "./Header";
import Main from "./Main";
export default {
  components: {
    Header,
    Main
  }
};
</script>
<style lang="scss" scoped>
#theme512 {
  background: #11044a;
}
#header {
  background: #11044a;
  box-shadow: 0px 1px 100px #100182;
}
#main {
  background: rgba(#11044c, 0.1);
}

@media screen and (min-width: 200px) and (max-width: 599px) {
  #header {
    padding-bottom: 2.5rem;
  }
}
</style>