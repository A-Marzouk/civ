<template>
  <div>
    <header class="tm700-header">
      <div class="tm700-header--inner">
        <div class="tm700-top">
          <!-- left -->
          <Left />
          <!-- center -->
          <Center />
          <!-- Media -->
          <Media />
          <!-- social media -->
          <SocialMedia />
          <!-- right -->
          <Right />
        </div>
      </div>
    </header>
  </div>
</template>
<script>
import Left from "./header/Left";
import Right from "./header/Right";
import Center from "./header/Center";
import Media from "./header/Media";
import SocialMedia from "./header/SocialMedia";
export default {
  components: {
    Left,
    Right,
    Center,
    Media,
    SocialMedia
  },
  data() {
    return {
      logo: "/images/resume_themes/theme700/header-icon.png"
    };
  }
};
</script>
<style lang="scss">
.tm700-header {
  .tm700-header--inner {
    padding: 0;
    @media screen and (min-width: 1800px) {
      padding-left: 113px;
      padding-right: 102px;
    }
  }
  .tm700-top {
    display: grid;
    align-items: stretch;
    grid-template-columns: 128px auto;
    grid-template-rows: auto auto auto auto;
    align-items: center;
    @media screen and (min-width: 768px) {
      grid-template-columns: 203px 383px auto;
      grid-template-rows: auto auto auto;
    }
    @media screen and (min-width: 1200px) {
      grid-template-columns: 268px 1fr 1fr 1fr;
      grid-template-rows: auto auto;
    }
  }
}
</style>
