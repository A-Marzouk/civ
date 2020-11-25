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

.btn-appbar-login {
  font-family: "Montserrat" !important;
  padding: 0.76rem 2.6rem;
  border-radius: 7px;
  box-shadow: 0 10px 15px -3px rgba(0, 72, 254, 0.335);
  letter-spacing: 2px;
  background-color: rgb(0, 70, 254);
  font-size: 12px !important;
  font-weight: bold !important;
  text-transform: uppercase !important;
  color: white !important;

  @media screen and (min-width: 1600px) {
    margin-right: 100px;
  }
  @media screen and (max-width: 1263px) {
    padding: 0.5rem 1.6rem;
    font-size: 12px !important;
  }
}
</style>