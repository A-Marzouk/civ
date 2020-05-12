<template>
  <div class="tm700-portfolio tw-mt-47px" v-if="currentTab === 1">
    <div class="tm700-portfolio__inner">
      <div v-for="(portfolio, id) in portfolios" v-bind:key="id">
        <img class="tw-w-full tw-rounded-25px" v-bind:src="portfolio.url" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["currentTab"],
  data() {
    return {
      portfolios: [
        {
          id: 1,
          url: "/images/resume_themes/theme700/portfolio1.png"
        },
        {
          id: 2,
          url: "/images/resume_themes/theme700/portfolio1.png"
        },
        {
          id: 3,
          url: "/images/resume_themes/theme700/portfolio1.png"
        },
        {
          id: 4,
          url: "/images/resume_themes/theme700/portfolio1.png"
        },
        {
          id: 5,
          url: "/images/resume_themes/theme700/portfolio1.png"
        },
        {
          id: 6,
          url: "/images/resume_themes/theme700/portfolio1.png"
        }
      ]
    };
  }
};
</script>

<style lang="scss">
.tm700-portfolio {
  padding-left: 16px;
  padding-right: 14px;
  .tm700-portfolio__inner {
    display: grid;
    grid-template-columns: repeat(1, minmax(0, 1fr));
    grid-row-gap: 50px;
    grid-column-gap: 25px;
    @media (min-width: 1200px) {
      grid-template-columns: repeat(3, minmax(0, 1fr));
    }
    > div {
      width: 95%;
      margin: auto;
      img {
        height: 282px;
        @media screen and (min-width: 768px) {
          min-height: 580px;
        }
      }
    }
  }
}
</style>
