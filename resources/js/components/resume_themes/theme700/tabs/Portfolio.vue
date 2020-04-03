<template>
<div class="tm700-portfolio tw-mt-47px" v-if="currentTab === 1">
    <div class="inner">
    <div class="tm700-portfolios tw-grid md:tw-grid-cols-1 lg:tw-grid-cols-2 xl:tw-grid-cols-3 tw-row-gap-24 tw-col-gap-25px">
        <div v-for="(portfolio,id) in portfolios" v-bind:key="id">
            <img class="tw-w-full" v-bind:src="portfolio.url" />
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
.tm700-portfolios {
    justify-items: center;
}
</style>