<template>
  <header class="tm701-header tw-border-b-14 tw-border-tm701-5">
    <div class="tm701-inner xl:tw-p-0 xl:tw-w-full xl:tw-my-0 xl:tw-mx-auto xl:tw-max-w-1767px xl:tw-pt-56px xl:tw-pb-56px">
      <div class="tm701-top xl:tw-grid xl:tw-items-center xl:tw-grid-cols-tm701-header font-muli">
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
  background-image: url("../../../../../public/images/resume_themes/theme701/header-mask.png");
  background-color: #DBDEC4;
  .tm701-top {
    @media (min-width: 1280px) {
      grid-template-columns: 1fr 4fr 3fr;
      grid-template-rows: auto;
    }
  }
}
</style>
