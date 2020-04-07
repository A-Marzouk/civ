<template>
  <header class="tm701-header tw-bg-tm701-2">
    <div class="tm701-inner xl:tw-p-0 xl:tw-w-full xl:tw-my-0 xl:tw-mx-auto xl:tw-max-w-1767px xl:tw-pt-56px xl:tw-pb-56px">
      <div class="tm701-top xl:tw-grid xl:tw-items-center xl:tw-grid-cols-tm701-header">
        <!-- left -->
        <Left />
        <!-- center -->
        <Center />
        <!-- right -->
        <Right />
      </div>
    </div>
  </header>
</template>

<script>
import Left from './header/Left';
import Right from './header/Right';
import Center from './header/Center';
export default {
  components: {Left, Right, Center}
};
</script>

<style lang="scss">
.tm701-header {
  .tm701-top {
    @media (min-width: 1280px) {
      grid-template-columns: 1fr 4fr 2fr;
      grid-template-rows: auto;
    }
  }
}
</style>
