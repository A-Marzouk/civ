<template>
  <div class="tm700-work tw-mt-20" v-if="currentTab === 2">
    <div class="tm700-work--inner">
      <div v-for="{ id } in works" v-bind:key="id" class="tm700-works">
        <span class="tm700-works--span">{{ id }}.</span>
        <div class="flex flex-col justify-between">
          <div class="tm700-works--info">
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
  // parent grid
  .tm700-work--inner {
    --row-gap: 82px;
    display: grid;
    grid-row-gap: var(--row-gap);
    grid-template-columns: 1fr;
    justify-items: center;
    @media screen and (min-width: 600px) {
    }
    @media screen and (min-width: 768px) {
      --row-gap: 128px;
    }
    @media screen and (min-width: 1200px) {
      grid-template-columns: 1fr 1fr;
      --row-gap: 174px;
      grid-column-gap: 100px;
    }
    @media screen and (min-width: 1800px) {
      --row-gap: 174px;
      grid-column-gap: 100px;
    }
  }
  .tm700-works {
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    margin: auto;
    width: 88%;
    @media screen and (min-width: 768px) {
      margin: 0;
      padding-left: 41px;
    }
    h3,
    span {
      font-family: "Gotham Pro";
    }
    .tm700-works--span {
      display: flex;
      align-items: center;
      border-radius: 9999px;
      padding: 0.5rem;
      color: #fff;
      background-color: var(--blue-1);
      margin-right: 13px;
      width: 28px;
      height: 28px;
      font-weight: bold;
      font-size: 12px;

      @media screen and (min-width: 640px) {
        width: 44px;
        height: 44px;
        font-size: 18px;
      }
    }
    .tm700-works--info {
      margin-bottom: 35px;
      .tm700-works--title {
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 13px;
        color: var(--blue-1);
        @media screen and (min-width: 640px) {
          font-size: 24px;
          line-height: 23px;
        }
      }
      .tm700-works--slogan {
        font-style: normal;
        font-weight: normal;
        font-size: 9px;
        line-height: 9px;
        text-transform: capitalize;
        color: #000000;
        @media screen and (min-width: 640px) {
          font-size: 12px;
          line-height: 11px;
        }
      }
    }
    .tm700-works--when {
      font-size: 9px;
      line-height: 11px;
      @media screen and (min-width: 640px) {
        font-size: 12px;
        line-height: 11px;
      }
    }
  }
}
</style>
