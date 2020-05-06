<template>
  <div class="tm700-center">
    <div
      class="tm700-center__inner md:tw-flex md:tw-flex-row lg:tw-flex-col md:tw-items-start md:tw-pb-0"
    >
      <div class="tw-flex tw-flex-col">
        <h1 class="tw-font-bold tw-not-italic tw-text-tm700-1">Carla Pipin Ranga</h1>
        <p
          class="tw-font-bold tw-text-xs md:tw-text-sm tw-not-italic tw-text-tm700-4 tw-leading-10 tw-font-medium tw-leading-10px md:tw-leading-4"
        >Web Ui/Ux Designer, Graphiс Designer</p>
      </div>
    </div>
  </div>
</template>
<script>
export default {};
</script>
<style lang="scss">
.tm700-center {
  display: flex;
  flex-direction: column;
  align-items: stretch;
  align-self: end;
  @media screen and (min-width: 1200px) {
    align-self: center;
  }
  .tm700-center__inner {
    > div {
      h1 {
        font-size: 18px;
        line-height: 1.4;
        @media screen and (min-width: 768px) {
          font-size: 36px;
        }
      }
    }
  }
}
</style>
