<template>
<div class="tm700-portfolio" v-if="currentTab === 1">
    <div class="inner">
    <div class="tm700-portfolios grid grid-cols-3">
        <div v-for="(portfolio,id) in portfolios" v-bind:key="id">
            <img class="w-full" v-bind:src="portfolio.url" />
        </div>
    </div>
    </div>
</div>
</template>

<script>
export default {
    props: ["currentTab"],
    data(){
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
            ],
        }
    }
}
</script>

<style lang="scss">
    .tm700-portfolio {
      margin-top: 78px;
      .tm700-portfolios {
        grid-row-gap: 93px;
        grid-column-gap: 25px;
        > div {
          img {
          }
        }
      }
    }
</style>
