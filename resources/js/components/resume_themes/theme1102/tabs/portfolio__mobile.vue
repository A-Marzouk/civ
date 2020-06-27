<template>
    <div class="mobile__portfolio">
        <img class="portfolio__image" src="/images/resume_themes/theme1102/portfolio/1.jpg"
             alt="portfolio image">
        <img class="portfolio__image" src="/images/resume_themes/theme1102/portfolio/1.jpg"
             alt="portfolio image">
        <img class="portfolio__image" src="/images/resume_themes/theme1102/portfolio/1.jpg"
             alt="portfolio image">
        <img class="portfolio__image" src="/images/resume_themes/theme1102/portfolio/1.jpg"
             alt="portfolio image">
        <img class="portfolio__image" src="/images/resume_themes/theme1102/portfolio/1.jpg"
             alt="portfolio image">
        <img class="portfolio__image" src="/images/resume_themes/theme1102/portfolio/1.jpg"
             alt="portfolio image">
        <img class="portfolio__image" src="/images/resume_themes/theme1102/portfolio/1.jpg"
             alt="portfolio image">
        <img class="portfolio__image" src="/images/resume_themes/theme1102/portfolio/1.jpg"
             alt="portfolio image">
        <img class="portfolio__image" src="/images/resume_themes/theme1102/portfolio/1.jpg"
             alt="portfolio image">

    </div>

</template>
<style lang="scss" scoped>
    .mobile__portfolio {
        display: none;
        visibility: hidden;
    @media only screen and (max-width: 700px) {
        display: flex;
        visibility: visible;
        flex-direction: column;
        justify-content: center;
        align-items: center;

        .portfolio__image {
            height: 400px;
            width: 300px;

    &:not(:last-child) {
         margin-bottom: 30px;
     }
    }
    }


    }
</style>
