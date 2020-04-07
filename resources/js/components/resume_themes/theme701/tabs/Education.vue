<template>
  <div class="tm700-education" v-if="currentTab === 3">
    <div class="tm700-education--inner tw-grid tw-grid-cols-1 lg:tw-grid-cols-2 tw-w-full tw-max-w-1396px tw-my-0 tw-mx-auto md:tw-row-gap-128px lg:tw-row-gap-174px md:tw-pl-52px lg:tw-pl-0">
      <div
        v-for="({id}) in educations"
        v-bind:key="id"
        class="tm700-educations tw-flex tw-flex-row tw-items-start tw-font-gothampro"
      >
        <span
          class="tm700-educations--span tw-rounded-full tw-p-2 tw-text-white tw-flex tw-items-center tw-bg-tm700-1 tw-mr-18px tw-w-44px tw-h-44px tw-flex-none"
        >{{id}}.</span>
        <div class="flex flex-col justify-between tw-max-w-1/2">
          <div class="tm700-educations--info">
            <h3
              class="tm700-educations--title not-italic text-2xl text-black font-normal"
            >California Institute of Technology</h3>
            <div
              class="tm700-educations--when flex flex-row capitalize not-italic font-normal capitalize not-italic font-bold"
            >
              <span class="tm700-educations--where text-tm700-1">M.Sc in HCI,</span>
              <span class="tm700-educations--time text-tm700-1">Dec 19 - Present</span>
            </div>
          </div>
          <p
            class="tm700-educations--desc text-tm700-6 text-xs not-italic font-light"
          >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
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
      educations: [{ id: 1 }, { id: 2 }, { id: 3 }, { id: 4 }]
    };
  }
};
</script>

<style lang="scss">
.tm700-education {
  margin-top: 172px;
  .tm700-education--inner {
    width: 100%;
    max-width: 87.25rem;
    margin: 0 auto;
    grid-row-gap: 99px;
  }
  .tm700-educations {
    font-family: "Gotham Pro", "Montserrat";
    span.tm700-educations--span {
      margin-right: 28px;
      min-width: 44px;
      height: 44px;
      border-radius: 50%;
      font-size: 18px;
      flex: 0;
    }
    .tm700-educations--info {
      margin-bottom: 30px;
      .tm700-educations--title {
        margin-bottom: 28px;
      }
      .tm700-educations--when {
        font-size: 14px;
        line-height: 23px;
        span.tm700-educations--where {
        }
        span.tm700-educations--time {
        }
      }
    }
    .tm700-educations--desc {
      font-size: 12px;
      line-height: 23px;
      color: #2d2d2d;
    }
  }
}
</style>
