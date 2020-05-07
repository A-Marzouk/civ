<template>
  <div class="tm700-left">
    <div>
      <img v-bind:src="logo" />
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      logo: "/images/resume_themes/theme700/header-icon.png"
    };
  }
};
</script>
<style lang="scss">
.tm700-left {
  grid-column-start: 1;
  grid-column-end: 2;
  grid-row-start: 1;
  grid-row-end: 3;
  > div {
    --height: 169px;
    --width: 66px;
    position: relative;
    background-color: var(--tm700-blue-1);
    height: var(--height);
    width: var(--width);
    @media screen and (min-width: 768px) {
      --height: 220px;
      --width: 107px;
    }
    @media screen and (min-width: 1200px) {
      --height: 225px;
      --width: 178px;
    }
    img {
      --left: 5px;
      --top: 24px;
      border-radius: 9999px;
      position: absolute;
      border-width: 14px;
      border-color: #fff;
      left: var(--left);
      top: var(--top);
      min-width: 124px;
      --height: 124px;
      @media screen and (min-width: 768px) {
        --left: 23px;
        --top: 33px;
        min-width: 166px;
        --height: 166px;
      }
      @media screen and (min-width: 1200px) {
        --left: 96px;
      }
    }
  }
}
</style>
