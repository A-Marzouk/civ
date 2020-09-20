<template>
  <v-app-bar color="transparent" flat tile :height="windowWidth<=599?'80':'100'">
    <img class="logo" src="/images/welcome_landing_page/logo/civie_logo-011.svg" alt="logo" />
    <v-spacer></v-spacer>
    <a class="btn-appbar-login" href="/login">Login</a>
  </v-app-bar>
</template>
<script>
export default {
  name: "HomeNavbar",
  props: {
    windowWidth: {
      type: Number,
    },
  },
};
</script>

<style lang="scss" scoped>
//logo
.logo {
  width: 163px;
  height: 69px;
  @media screen and (min-width: 1600px) {
    margin-left: 78px;
  }
  @media screen and (max-width: 599px) {
    width: 126px;
    height: 53px;
  }
}
</style>