<template>
  <div class="tm702-education" v-if="currentTab === 4">
    <div class="tm702-education--inner">
      <div v-for="{id} in educations" :key="id">
        <span>University</span>
        <h1>California Institute of Technology</h1>
        <div>
          <span>M.Sc in HCI,</span>
          <span>Dec 19 - Present</span>
        </div>
        <p>I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["currentTab"],
  data() {
    return {
      educations: [
        {
          id: 1,
          university: "California Institute of Technology"
        },
        {
          id: 2,
          university: "California Institute of Technology"
        },
        {
          id: 3,
          university: "California Institute of Technology"
        },
        {
          id: 4,
          university: "California Institute of Technology"
        }
      ]
    };
  }
};
</script>
<style lang="scss">
.tm702-education {
  * {
    font-family: "Open Sans", sans-serif;
  }

  .tm702-education--inner {
    padding-left: 25px;
    padding-right: 21px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    grid-row-gap: 35px;
    margin-top: 69px;
    @media screen and (min-width: 768px) {
      margin-top: 84px;
    }
    @media screen and (min-width: 1200px) {
      margin-top: 104px;
    }
    > div {
      span {
        font-style: normal;
        font-weight: 300;
        font-size: 14px;
        line-height: 19px;
        color: var(--gray-2);
        padding-bottom: 10px;
        display: block;
        @media screen and (min-width: 768px) {
          font-size: 24px;
          line-height: 33px;
        }
      }
      h1 {
        color: var(--blue);
        font-weight: normal;
        display: flex;
        flex-direction: column;
        margin-bottom: 40px;
        font-style: normal;
        font-weight: 300;
        font-style: normal;
        font-weight: normal;
        font-size: 21px;
        line-height: 29px;
        color: var(--blue);
        @media screen and (min-width: 768px) {
          font-size: 32px;
          line-height: 44px;
        }
        &::after {
          content: " ";
          width: 57px;
          height: 4px;
          background-color: var(--blue);
        }
      }
      > div {
        display: flex;
        margin-bottom: 14px;
        span {
          font-weight: 300;
          font-size: 18px;
          font-style: normal;
          line-height: 25px;
          color: var(--blue);
          @media screen and (min-width: 768px) {
            font-size: 18px;
            line-height: 25px;
          }
          &:first-child {
            margin-right: 6px;
          }
        }
      }
      p {
        color: var(--gray-p);
        font-style: normal;
        font-weight: 300;
        font-size: 12px;
        line-height: 23px;
        @media screen and (min-width: 768px) {
          font-size: 14px;
          line-height: 23px;
        }
      }
    }
  }
}
</style>
