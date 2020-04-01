<template>
  <div class="tm700-work" v-if="currentTab === 2">
    <div class="tm700-work--inner grid grid-cols-2">
      <div v-for="({id}) in works" v-bind:key="id" class="tm700-works flex flex-row items-start">
        <span
          class="tm700-works--span rounded-full p-2 text-white flex items-center bg-tm700-1"
        >{{id}}.</span>
        <div class="flex flex-col justify-between">
          <div class="tm700-works--info">
            <h3
              class="tm700-works--title not-italic text-2xl text-tmbg-tm700-1 font-normal"
            >Google Inc. Introduction Google</h3>
            <span
              class="tm700-works--slogan text-black capitalize not-italic font-normal"
            >User interface designer</span>
          </div>
          <span class="tm700-works--when">2012- Current</span>
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
  margin-top: 189px;
  .tm700-work--inner {
    width: 100%;
    max-width: 87.25rem;
    margin: 0 auto;
    grid-row-gap: 174px;
  }
  .tm700-works {
    font-family: "Gotham Pro", "Montserrat";
    span.tm700-works--span {
      margin-right: 19px;
      min-width: 44px;
      height: 44px;
      border-radius: 50%;
      font-size: 18px;
      flex: 0;
    }
    .tm700-works--info {
      margin-bottom: 35px;
      .tm700-works--title {
        line-height: 23px;
      }
      .tm700-works--slogan {
        font-size: 12px;
        line-height: 11px;
      }
    }
    span.tm700-works--when {
      font-size: 12px;
      line-height: 11px;
    }
  }
}
</style>
