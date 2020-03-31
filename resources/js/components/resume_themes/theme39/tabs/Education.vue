<template>
  <div class="tm39-education" v-if="currentTab === 3">
    <div class="tm39-education--inner grid grid-cols-2">
      <div
        v-for="({id}) in educations"
        v-bind:key="id"
        class="tm39-educations flex flex-row items-start"
      >
        <span
          class="tm39-educations--span rounded p-2 text-white flex items-center bg-tm39-1"
        >{{id}}.</span>
        <div class="flex flex-col justify-between">
          <div class="tm39-educations--info">
            <h3
              class="tm39-educations--title not-italic text-2xl text-black font-normal"
            >California Institute of Technology</h3>
            <div
              class="tm39-educations--when flex flex-row capitalize not-italic font-normal capitalize not-italic font-bold"
            >
              <span class="tm39-educations--where text-tm39-1">M.Sc in HCI,</span>
              <span class="tm39-educations--time text-tm39-1">Dec 19 - Present</span>
            </div>
          </div>
          <p
            class="tm39-educations--desc text-tm39-6 text-xs not-italic font-light"
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
.tm39-education {
  margin-top: 172px;
  .tm39-education--inner {
    width: 100%;
    max-width: 87.25rem;
    margin: 0 auto;
    grid-row-gap: 99px;
  }
  .tm39-educations {
    font-family: "Gotham Pro", "Montserrat";
    span.tm39-educations--span {
      margin-right: 28px;
      min-width: 44px;
      height: 44px;
      border-radius: 50%;
      font-size: 18px;
      flex: 0;
    }
    .tm39-educations--info {
      margin-bottom: 30px;
      .tm39-educations--title {
        margin-bottom: 28px;
      }
      .tm39-educations--when {
        font-size: 14px;
        line-height: 23px;
        span.tm39-educations--where {
        }
        span.tm39-educations--time {
        }
      }
    }
    .tm39-educations--desc {
      font-size: 12px;
      line-height: 23px;
      color: #2d2d2d;
    }
  }
}
</style>
