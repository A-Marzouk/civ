<template>
  <div class="tm700-portfolio tw-mt-47px" v-if="currentTab === 1">
    <div class="tm700-portfolio__inner">
      <div class="tm700-portfolios">
        <div v-for="(portfolio,id) in portfolios" v-bind:key="id">
          <img class="tw-w-full tw-rounded-25px" v-bind:src="portfolio.url" />
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
      portfolios: [
        {
          id: 1,
          url: "/images/resume_themes/theme700/portfolio1.png"
        },
        {
          id: 2,
          url: "/images/resume_themes/theme700/portfolio2.png"
        },
        {
          id: 3,
          url: "/images/resume_themes/theme700/portfolio3.png"
        },
        {
          id: 4,
          url: "/images/resume_themes/theme700/portfolio4.png"
        },
        {
          id: 5,
          url: "/images/resume_themes/theme700/portfolio5.png"
        },
        {
          id: 6,
          url: "/images/resume_themes/theme700/portfolio6.png"
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
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  grid-gap: 25px;
  @media (min-height: 768px) {
    padding-left: 41px;
    padding-right: 44px;
  }
  @media (min-height: 1024px) {
    padding-left: 113px;
    padding-right: 106px;
  }
  .tm700-portfolios {
    justify-items: center;
  }
}
</style>
