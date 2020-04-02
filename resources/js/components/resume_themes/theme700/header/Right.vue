<template>
  <div class="tm700-right tw-py-12 md:tw-col-start-2 md:tw-row-start-3 lg:tw-col-start-3 lg:tw-row-start-1 xl:tw-col-start-3 xl:tw-row-start-1">
    <div class="tw-flex tw-items-center tw-justify-between">
      <div class="hourly--rate tw-flex tw-flex-row tw-items-center md:tw-ml-5 lg:tw-ml-0">
        <div class="tw-flex tw-flex-col">
          <span class="tw-text-tm700-5 tw-not-italic tw-text-civ-18 tw-leading-civ-22">Hourly Rate</span>
          <span class="tw-text-tm700-1 tw-font-bold tw-text-2xl tw-leading-civ-29">$25 USD</span>
        </div>
      </div>
      <div class="tm700-vertical md:tw-ml-18px md:tw-mr-15px lg:tw-m-0"></div>
      <div class="available--for tw-flex tw-flex-col tw-items-center">
        <span class="text-tm700-5 tw-not-italic tw-text-civ-18 tw-leading-civ-22">Available for</span>
        <span class="tw-text-tm700-1 tw-font-bold tw-text-2xl tw-leading-civ-29">8 Hours</span>
      </div>
      <button class="tw-bg-tm700-1 tw-text-white tw-font-bold tw-text-civ-18 tw-leading-civ-22 tw-rounded-civ-50p tw-pt-5 tw-pr-66px tw-pb-18px tw-pl-60px md:tw-ml-60px lg:tw-m-0">Hire Me</button>
    </div>
  </div>
</template>

<script>
export default {

}
</script>

<style lang="scss">
  .tm700-vertical {
      content: "";
      border: 1px solid #d7d7d7;
      height: 41px;
      width: 1px;
  }
  .tm700-right {
      @media (min-width: 768px) {
        justify-self: start;
      }
      @media (min-width: 1024px) {
        justify-self: normal;
      }
      @media (min-width: 1280px) {
        justify-self: normal;
      }
  }
</style>
