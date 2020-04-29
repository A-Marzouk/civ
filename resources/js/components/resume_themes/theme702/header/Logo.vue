<template>
  <div class="tm702-logo">
    <img class="logo" v-bind:src="logo" />
  </div>
</template>
<script>
export default {
  data() {
    return {
      logo: "/images/resume_themes/theme702/profile.png"
    };
  }
};
</script>
<style lang="scss">
.tm702-logo {
  .logo {
    border-radius: 9999px;
    width: 78px;
    height: 78px;
    @media screen and (min-width: 768px) {
      width: 236px;
      height: 236px;
    }
    @media screen and (min-width: 1200px) {
      width: 210px;
      height: 210px;
    }
  }
}
</style>
