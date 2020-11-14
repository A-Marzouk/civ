<template>
  <v-col class="social-links">
    <a
      href="javascript:void(0)"
      @click="goToExternalLink(userLink.link)"
      v-for="userLink in links"
      :key="userLink.id + '_link'"
      target="_blank"
      v-show="userLink.is_active && userLink.is_public"
    >
      <img
        :src="`/images/resume_themes/theme302/social_icons/${userLink.link_title.toLowerCase()}.webp`"
        alt="social icons"
      />
    </a>
  </v-col>
</template>

<script>
export default {
  props: {
    links: { type: Array }
  }
};
</script>

<style lang="scss" scoped>
@import '../scss/variables';

.social-links {
  width: 100%;
  display: flex;
  flex-wrap: wrap;
  min-height: 75px;
  align-items: center;
  justify-content: center;
  background-color: $colorBlue;

  a {
    width: 30px;
    height: 30px;
    display: flex;
    margin-left: 10px;
    margin-right: 10px;
    align-items: center;
    justify-content: center;

    img {
      width: 24px;
    }
  }

  @media screen and (max-width: 768px) {
    min-height: 88px;

    a {
      margin-left: 15px;
      margin-right: 15px;
    }
  }
}
</style>
