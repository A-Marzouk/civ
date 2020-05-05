<template>
  <header class="tm701-header">
    <div
      class="tm701-inner tw-p-0 tw-w-full tw-my-0 tw-mx-auto tw-max-w-full xl:tw-max-w-1767px tw-pt-56px tw-pb-56px"
    >
      <div
        class="tm701-top tw-grid tw-items-center tw-grid-cols-3 tw-grid-cols-tm701-header font-muli"
      >
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
import Left from "./header/Left";
import Right from "./header/Right";
import Center from "./header/Center";
export default {
  components: { Left, Right, Center }
};
</script>

<style lang="scss" scoped>
.tm701-header {
  background-image: url("../../../../../public/images/resume_themes/theme701/header-mask.png");
  background-color: #dbdec4;
  .tm701-top {
    @media (min-width: 1280px) {
      grid-template-columns: 1fr 4fr 3fr;
      grid-template-rows: auto;
    }
  }
}
</style>
