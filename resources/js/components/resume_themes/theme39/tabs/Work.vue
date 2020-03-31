<template>
  <div class="tm39-work" v-if="currentTab === 2">
    <div class="tm39-work--inner grid grid-cols-2">
      <div v-for="({id}) in works" v-bind:key="id" class="tm39-works flex flex-row items-start">
        <span
          class="tm39-works--span rounded-full p-2 text-white flex items-center bg-tm39-1"
        >{{id}}.</span>
        <div class="flex flex-col justify-between">
          <div class="tm39-works--info">
            <h3
              class="tm39-works--title not-italic text-2xl text-tmbg-tm39-1 font-normal"
            >Google Inc. Introduction Google</h3>
            <span
              class="tm39-works--slogan text-black capitalize not-italic font-normal"
            >User interface designer</span>
          </div>
          <span class="tm39-works--when">2012- Current</span>
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
.tm39-work {
  margin-top: 189px;
  .tm39-work--inner {
    width: 100%;
    max-width: 87.25rem;
    margin: 0 auto;
    grid-row-gap: 174px;
  }
  .tm39-works {
    font-family: "Gotham Pro", "Montserrat";
    span.tm39-works--span {
      margin-right: 19px;
      min-width: 44px;
      height: 44px;
      border-radius: 50%;
      font-size: 18px;
      flex: 0;
    }
    .tm39-works--info {
      margin-bottom: 35px;
      .tm39-works--title {
        line-height: 23px;
      }
      .tm39-works--slogan {
        font-size: 12px;
        line-height: 11px;
      }
    }
    span.tm39-works--when {
      font-size: 12px;
      line-height: 11px;
    }
  }
}
</style>
