<template>
    <div class="item-view" :style="`background-image: url(${thumbnail})`">

    </div>
</template>

<script>
    export default {
        name: "ItemView",

        props: {
            thumbnail: {
                type: String,
                default: "default.png"
            },

        }
    };
</script>

<style lang="scss" scoped>
    @import "./../../scss/variables";

    .item-view {
        display: flex;
        align-items: flex-end;
        width: 300px;
        height: 400px;
        margin-left: auto;
        margin-right: auto;
        border-radius: 5px;
        background-size: cover;
        background-color: #e6edfc;
        background-repeat: no-repeat;
        background-position: center;
        transition: width, height 0.3s;


        &:focus {
            border: 1px solid #205de5;
        }


    }

    @media (min-width: $sm) {
        .item-view {
            width: 300px;
            height: 400px;
        }
    }

    @media (min-width: $md) {
        .item-view {
            width: 300px;
            height: 400px;

        }
    }

    @media (min-width: 992px) {
        .item-view {
            width: 300px;
            height: 400px;
        }
    }

    @media (min-width: $lg) {
        .item-view {
            width: 230px;
            height: 330px;


        }
    }

    @media (min-width: $semi-lg) {
        .item-view {
            width: 300px;
            height: 400px;


        }
    }

    @media (min-width: $xl) {
        .item-view {
            width: 400px;
            height: 500px;


        }
    }

    @media (min-width: $xxl) {
        .item-view {
            width: 500px;
            height: 600px;


        }
    }
</style>
