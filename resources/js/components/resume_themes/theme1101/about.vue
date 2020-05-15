<template>
    <div style="margin-top: 50px;
            margin-left: 5%;margin-right: 5% ">

        <h1 class="name hidden-md-and-up">Samuel Raita</h1>
        <h3 class="professions hidden-md-and-up">Graphic Designer</h3>

        <div class="description text-justify">
            Donec a augue gravida, vulputate ligula et, pellentesque arcu. Morbi feugiat eros nec sem ultrices, et
            venenatis velit posuere. Donec bibendum commodo dui, eget sollicitudin urna sagittis non. Donec ac commodo
            tortor..Donec a augue gravida, vulputate ligula et, pellentesque arcu. Morbi feugiat eros nec sem ultrices,
            et
            venenatis velit posuere. Donec bibendum commodo dui, eget sollicitudin urna sagittis non. Donec ac commodo
            tortor..Donec a augue gravida, vulputate ligula et, pellentesque arcu. Morbi feugiat eros nec sem ultrices,
            et
            venenatis velit posuere. Donec bibendum commodo dui, eget sollicitudin urna sagittis non. Donec ac commodo
            tortor..

        </div>

        <div class="main hidden-md-and-up" style="display: inline">
            <p class="rate">Hour Rate</p>
            <p class="rate1">$20 </p>
            <p class="avail">weekly Availability</p>
            <p class="rate1">250</p>
        </div>


        <div class="social hidden-md-and-up">
            <h4 class="mb-2">Follow me</h4>
            <button class="social_icon mr-4">
                <twitter class="social_icon1" style="fill: #7EC3D2;"></twitter>
            </button>
            <button class="social_icon mr-4">
                <facebook class="social_icon1" style="fill: #7EC3D2;"></facebook>

            </button>
            <button class="social_icon mr-md-3">
                <insta class="social_icon1" style="fill: #7EC3D2;"></insta>

            </button>

        </div>


    </div>
</template>
<script>
    import facebook from './icons/facebook.vue'
    import insta from './icons/insta.vue'
    import twitter from './icons/twitter.vue'

    export default {
        components: {facebook, insta, twitter}
    }
</script>
<style scoped>
    .social_icon1 {
        height: 16px;
        width: 16px;
    }

    .social_icon {
        padding: 8px 8px 8px 8px;
        background: #052137;
        border-radius: 3px;
    }

    .social {
        padding-top: 30px;
        padding-right: 30px;
    }

    .name {
        font-size: 160%;
        font-weight: 800;
        line-height: 6px;
        color: #052137;
        margin-bottom: 10px;
    }

    .professions {

        font-style: normal;
        font-weight: bold;
        font-size: 90%;
        color: #052137;
        margin-bottom: 15px;


    }

    .description {
        font-style: normal;
        font-weight: normal;
        font-size: 80%;
        color: #052137;
        margin-bottom: 25px;

    }

    .rate {


        font-weight: normal;
        font-size: 90%;
        line-height: 21px;
        display: inline-flex;
        margin-right: 10px;
    }

    .rate1 {


        font-weight: 900;
        font-size: 110%;
        line-height: 30px;
        display: inline-flex;
        color: #052137;
        margin-right: 15px;
    }

    .avail {

        font-weight: normal;
        font-size: 90%;
        line-height: 21px;
        display: inline-flex;
        margin-right: 10px;

    }
</style>
