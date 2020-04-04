<template>
    <section class="section-view">
        <div class="section-title">
            <div class="title-light">Edit</div>
            <h2>Portfolio</h2>
        </div>

        <transition class="mt-5" name="fadeCustom" mode="out-in">
            <router-view></router-view>
        </transition>

    </section>
</template>

<script>
    export default {
        name: 'Projects',
        data() {
            return {}
        },
        mounted() {

        },
    }
</script>

<style lang="scss" scoped>
    .section-view {
        width: 100%;
        max-width: 1450px;
    }
</style>
