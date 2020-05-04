<template>
  <div class="tm700-work tw-mt-20" v-if="currentTab === 2">
    <div class="tm700-work--inner">
      <div v-for="({id}) in works" v-bind:key="id" class="tm700-works">
        <span class="tm700-works--span">{{id}}.</span>
        <div class="flex flex-col justify-between">
          <div class="tm700-works--info tw-mb-35px">
            <h3 class="tm700-works--title">Google Inc. Introduction Google</h3>
            <span class="tm700-works--slogan">User interface designer</span>
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
  .tm700-work--inner {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    @media screen and (min-width: 768px) {
      grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    }
    @media screen and (min-width: 1200px) {
      grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
    }
  }
  .tm700-works {
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    margin: auto;
    @media screen and (min-width: 768px) {
      margin: 0;
      padding-left: 41px;
    }
    .tm700-works--span {
      display: flex;
      align-items: center;
      border-radius: 9999px;
      padding: 0.5rem;
      color: #fff;
      background-color: var(--tm700-blue-1);
      margin-right: 18px;
      width: 28px;
      height: 28px;
      font-weight: bold;
      font-size: 12px;
      @media screen and (min-width: 768px) {
        width: 44px;
        height: 44px;
        font-size: 18px;
      }
    }
    .tm700-works--info {
      .tm700-works--title {
        font-size: 14px;
        font-weight: 500;
        line-height: 0.9;
        color: var(--tm700-blue-1);
        @media screen and (min-width: 768px) {
          font-size: 24px;
        }
      }
      .tm700-works--slogan {
        color: #000;
        text-transform: capitalize;
        font-weight: 400;
        font-size: 9px;
        line-height: 11px;
      }
    }
    .tm700-works--when {
      font-size: 9px;
      line-height: 11px;
    }
  }
}
</style>
