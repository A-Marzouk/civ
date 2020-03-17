<template>
    <section class="section-view">
        <div class="section-title">
            <div class="title-light">Add</div>
            <h2>Portfolio</h2>
        </div>

        <transition class="mt-5" name="fade" mode="out-in">
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
    $mainBlue: #001CE2;

    .btns-wrapper {
        margin-top: 26px;

        a {
            color: $mainBlue;

            &:hover {
                text-decoration: none;
            }
        }

        .btn {
            margin-right: 12px;
        }
    }
</style>
