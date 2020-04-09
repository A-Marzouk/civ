<template>
  <div>
  <header class="tm700-header">
    <div class="tm700-inner tw-p-0 tw-w-full tw-my-0 xl:tw-mx-auto sm:tw-m-0 xl:tw-max-w-tm700-xl-2">
      <div class="tm700-top tw-grid tw-items-stretch">
        <!-- left -->
        <Left />
        <!-- center -->
        <Center />
        <!-- right -->
        <Right />
      </div>
    </div>
  </header>
    </div>
</template>

<script>
import Left from './header/Left';
import Right from './header/Right';
import Center from './header/Center';
export default {
  components: {Left, Right, Center},
  data() {
    return {
      logo: "/images/resume_themes/theme700/header-icon.png"
    };
  },
};
</script>

<style lang="scss">
.tm700-header {
  .tm700-top {
    @media (min-width: 320px) {
      grid-template-columns: 87px auto;
      grid-template-rows: auto auto;
    }
    @media (min-width: 768px) {
      grid-template-columns: 107px auto;
      grid-template-rows: auto auto;
    }
    @media (min-width: 1024px) {
      grid-template-columns: 98px 3fr 2fr;
        grid-template-rows: auto;
    }
    @media (min-width: 1280px) {
      grid-template-columns: 172px 4fr 2fr;
        grid-template-rows: auto;
    }
  }
}
</style>
