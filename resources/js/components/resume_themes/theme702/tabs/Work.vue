<template>
  <div class="tm702-work" v-if="currentTab === 3">
    <div class="tm702-work--inner">
      <div v-for="{id, name} in works" class="tm702-work-data">
        <div class="tm702-left">
          <h1>{{name}}</h1>
          <div>
            <span>Duration:</span>
            <span>Dec 19 - Present</span>
          </div>
        </div>
        <div class="tm702-right">
          <span>User interface designer</span>
          <p>I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
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
      works: [
        {
          id: 1,
          name: "google",
          dateFrom: new Date(),
          dateTo: new Date()
        },
        {
          id: 2,
          name: "google",
          dateFrom: new Date(),
          dateTo: new Date()
        },
        {
          id: 3,
          name: "google",
          dateFrom: new Date(),
          dateTo: new Date()
        },
        {
          id: 4,
          name: "google",
          dateFrom: new Date(),
          dateTo: new Date()
        },
        {
          id: 5,
          name: "google",
          dateFrom: new Date(),
          dateTo: new Date()
        },
        {
          id: 5,
          name: "google",
          dateFrom: new Date(),
          dateTo: new Date()
        }
      ]
    };
  }
};
</script>
<style lang="scss">
.tm702-work {
  .tm702-work--inner {
    padding-left: 15px;
    padding-right: 4px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmap(300px, 1fr));
    grid-row-gap: 58px;
    @media screen and (min-width: 768px) {
      padding-left: 34px;
      padding-right: 21px;
    }
  }

  .tm702-work-data {
    display: flex;

    .tm702-left {
      flex: 1;

      h1 {
        color: var(--blue);
        font-size: 18px;
        font-weight: normal;
        line-height: 1.4;
        display: flex;
        flex-direction: column;
        margin-bottom: 42px;

        &::after {
          content: " ";
          width: 35px;
          height: 3px;
          background-color: var(--blue);
          margin-top: 4px;
        }
      }

      > div {
        display: flex;
        flex-direction: column;

        span {
          font-size: 14px;
          font-weight: 300;
          line-height: 2.2;

          &:last-child {
            font-size: 12px;
            color: var(--blue);
          }
        }
      }
    }

    .tm702-right {
      flex: 2;

      span {
        font-size: 18px;
        margin-bottom: 52px;
        display: block;
      }

      p {
        font-size: 14px;
        line-height: 1.9;
      }
    }
  }
}
</style>
