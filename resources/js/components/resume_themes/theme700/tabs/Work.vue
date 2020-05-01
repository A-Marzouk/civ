<template>
  <div class="tm700-work tw-mt-20" v-if="currentTab === 2">
    <div
      class="tm700-work--inner tw-grid tw-grid-cols-1 lg:tw-grid-cols-2 tw-w-full tw-max-w-1396px tw-my-0 tw-mx-auto tw-row-gap-6 md:tw-row-gap-128px lg:tw-row-gap-174px md:tw-pl-52px lg:tw-pl-0"
    >
      <div
        v-for="({id}) in works"
        v-bind:key="id"
        class="tm700-works tw-flex tw-flex-row tw-items-start tw-font-gothampro"
      >
        <span
          class="tm700-works--span tw-rounded-full tw-p-2 tw-text-white tw-flex tw-items-center tw-bg-tm700-1 tw-mr-18px tw-w-44px tw-h-44px tw-flex-none"
        >{{id}}.</span>
        <div class="flex flex-col justify-between">
          <div class="tm700-works--info tw-mb-35px">
            <h3
              class="tm700-works--title tw-not-italic tw-text-24px tw-text-tmbg-tm700-1 tw-font-normal tw-leading-6 tw-text-tm700-1"
            >Google Inc. Introduction Google</h3>
            <span
              class="tm700-works--slogan tw-text-black tw-capitalize tw-not-italic tw-font-normal tw-text-xs tw-leading-11px"
            >User interface designer</span>
          </div>
          <span class="tm700-works--when tw-text-xs tw-leading-11px">2012- Current</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["currentTab"],
  data() {
    return {
      works: [{ id: 1 }, { id: 2 }, { id: 3 }, { id: 4 }]
    };
  }
};
</script>

<style lang="scss">
.tm700-work {
  .tm700-work--inner {
    justify-items: start;
  }
}
</style>
