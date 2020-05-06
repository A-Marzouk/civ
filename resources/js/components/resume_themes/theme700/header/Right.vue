<template>
  <div class="tm700-right">
    <div class="tw-flex tw-items-center tw-justify-between">
      <div class="hourly--rate tw-flex tw-flex-row tw-items-center md:tw-ml-5 lg:tw-ml-0">
        <div class="tw-flex tw-flex-col">
          <span
            class="tw-text-tm700-5 tw-not-italic tw-text-xs sm:tw-text-civ-18 tw-leading-civ-22"
          >Hourly Rate</span>
          <span
            class="tw-text-tm700-1 tw-font-bold tw-text-18px sm:tw-text-2xl tw-leading-civ-29"
          >$25 USD</span>
        </div>
      </div>
      <div class="tm700-vertical md:tw-ml-18px md:tw-mr-15px lg:tw-m-0"></div>
      <div class="available--for tw-flex tw-flex-col tw-items-center">
        <span
          class="tw-text-tm700-5 tw-not-italic tw-text-xs sm:tw-text-civ-18 tw-leading-civ-22"
        >Available for</span>
        <span
          class="tw-text-tm700-1 tw-font-bold tw-text-18px sm:tw-text-2xl tw-leading-civ-29"
        >8 Hours</span>
      </div>
      <button
        class="tw-bg-tm700-1 tw-text-white tw-font-bold tw-text-xs sm:tw-text-civ-18 tw-leading-civ-22 tw-rounded-civ-50p md:tw-ml-60px lg:tw-m-0"
      >Hire Me</button>
    </div>
  </div>
</template>
<script>
export default {};
</script>
<style lang="scss">
.tm700-vertical {
  content: "";
  border: 1px solid #d7d7d7;
  height: 41px;
  width: 1px;
}
.tm700-right {
  padding-top: 55px;
  padding-left: 16px;
  padding-right: 14px;
  grid-column-start: 1;
  grid-column-end: 3;
  grid-row-start: 4;
  grid-row-end: 5;
  @media only screen and (min-width: 768px) {
    padding-left: 128px;
    padding-right: 127px;
    grid-column-end: 4;
    grid-row-start: 3;
    grid-row-end: 4;
  }
  @media screen and (min-width: 1200px) {
    grid-column-start: 4;
    grid-row-start: 1;
    grid-row-end: 2;
    padding: 0;
  }
  button {
    //tw-pt-5 tw-pr-66px tw-pb-18px tw-pl-60px
    padding: 16px 46px 13px 47px;
    @media (min-width: 768px) {
      padding: 21px 61px 18px 65px;
    }
  }
}
</style>
