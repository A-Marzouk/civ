<template>
  <div class="tm700-left md:tw-pl-96px md:tw-py-16 tw-py-12 tw-flex tw-justify-end tw-bg-tm700-1 tw-relative md:tw-items-center">
    <img class="tw-rounded-full tw-max-w-xs tw-absolute tw-border-14 tw-border-white tw-right-minus-80px tw-top-24px md:tw-top-34px tw-w-140px md:tw-w-auto tw-h-140px md:tw-h-auto" v-bind:src="logo" />
  </div>
  </template>

<script>
export default {
  data() {
    return {
      logo: "/images/resume_themes/theme700/header-icon.png"
    };
  },
}
</script>
