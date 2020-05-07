<template>
  <div class="tm700-education" v-if="currentTab === 3">
    <div class="tm700-education--inner">
      <div v-for="{ id } in educations" v-bind:key="id" class="tm700-educations">
        <span class="tm700-educations--span">{{ id }}.</span>
        <div class="tw-flex tw-flex-col tw-justify-between">
          <div class="tm700-educations--info">
            <h3 class="tm700-educations--title">California Institute of Technology</h3>
            <div class="tm700-educations--when">
              <span class="tm700-educations--where">M.Sc in HCI,</span>
              <span class="tm700-educations--time">Dec 19 - Present</span>
            </div>
          </div>
          <p class="tm700-educations--desc">
            I'm a paragraph. Click here to add your own text and
            edit me. It’s easy. Just click “Edit Text” or double
            click me to add your own content and make changes.
          </p>
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
  margin-top: 81px;
  .tm700-education--inner {
    display: grid;
    grid-template-columns: repeat(1, minmax(0, 1fr));
    margin: 0 auto;
    grid-row-gap: 99px;
    padding-left: 0;
    @media screen and (min-width: 600px) {
      grid-row-gap: 128px;
      padding-left: 3.25rem;
    }
    @media screen and (min-width: 768px) {
      grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
      grid-row-gap: 128px;
      padding-left: 3.25rem;
    }
    @media screen and (min-width: 1200px) {
      grid-template-columns: repeat(2, minmax(0, 1fr));
      grid-row-gap: 174px;
    }
  }
  .tm700-educations {
    h3,
    span,
    p {
      font-family: "Gotham Pro", "Montserrat";
    }
    display: flex;
    align-items: flex-start;
    justify-content: center;
    // span numbers in left - first
    .tm700-educations--span {
      display: flex;
      align-items: center;
      justify-content: flex-start;
      background-color: var(--blue-1);
      color: #fff;
      border-radius: 9999px;
      padding: 0.5rem;
      margin-right: 9px;
      max-width: 21px;
      height: 21px;
      font-family: "Montserrat", "Open Sans";
      font-style: normal;
      font-weight: bold;
      font-size: 12px;
      line-height: 15px;
      @media screen and (min-width: 768px) {
        max-width: 44px;
        height: 44px;
        width: 44px;
        font-size: 18px;
        line-height: 22px;
        margin-right: 19px;
      }
    }
    > div {
      width: 75%;
      .tm700-educations--info {
        margin-bottom: 15px;
        .tm700-educations--title {
          font-style: normal;
          font-weight: bold;
          font-size: 14px;
          line-height: 13px;
          margin-bottom: 13px;
          @media screen and (min-width: 768px) {
            font-size: 24px;
            line-height: 23px;
          }
        }
        .tm700-educations--when {
          font-style: normal;
          font-weight: bold;
          font-size: 8px;
          line-height: 23px;
          margin-bottom: 15px;
          @media screen and (min-width: 768px) {
            font-size: 14px;
          }
          span {
            color: var(--blue-1);
          }
        }
      }
      .tm700-educations--desc {
        font-style: normal;
        font-weight: 300;
        font-size: 8px;
        line-height: 23px;
        color: var(--gray-1);
        @media screen and (min-width: 768px) {
          font-size: 12px;
        }
      }
    }
  }
}
</style>
