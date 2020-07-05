<template>
    <div class="skill">
        <v-tabs
            v-model="tab"
            background-color="rgba(0, 0, 0, 0)"
            grow
            show-arrows
            center-active
            centered
            hide-slider
            height="80"
            class="main-tabs"
        >
            <v-tab

            >
                <div class="tab-item">
                    <div class="tab-item__text">
                        Programing Languages
                    </div>
                </div>
            </v-tab>
            <v-tab

            >
                <div class="tab-item">
                    <div class="tab-item__text">
                        FrameWorks/
                    </div>
                    <div class="tab-item__text">
                        Database
                    </div>
                </div>
            </v-tab>
            <v-tab

            >
                <div class="tab-item">

                    <div class="tab-item__text">
                                Design Skills
                </div>
                </div>
            </v-tab>
            <v-tab
                class="tab-item"
            >
                <div class="tab-item">
                    <div class="tab-item__text">
                                Software
                    </div>
                </div>
            </v-tab>
        </v-tabs>
        <v-tabs-items class="main-tab-items" v-model="tab">
            <v-tab-item
                transition="fade-transition"
                reverse-transition="fade-transition"
            >
                <div class="skill__programming">
                    <div class="skill__list">
                        <div class="skill__logo">
                            Ae
                        </div>
                        <div class="skill__details">
                            after effect
                            <div class="skill__progress">

                            </div>
                        </div>
                        <div class="skill__percentage">
                            92
                        </div>

                    </div>
                    <div class="skill__list">
                        <div class="skill__logo">
                            xd
                        </div>
                        <div class="skill__details">
                            Adobe xd
                            <div class="skill__progress">

                            </div>
                        </div>
                        <div class="skill__percentage">
                            92
                        </div>

                    </div>
                </div>
                <div class="skill__programming">
                    <div class="skill__list">
                        <div class="skill__logo">
                            Ae
                        </div>
                        <div class="skill__details">
                            after effect
                            <div class="skill__progress">

                            </div>
                        </div>
                        <div class="skill__percentage">
                            92
                        </div>

                    </div>
                    <div class="skill__list">
                        <div class="skill__logo">
                            xd
                        </div>
                        <div class="skill__details">
                            Adobe xd
                            <div class="skill__progress">

                            </div>
                        </div>
                        <div class="skill__percentage">
                            92
                        </div>

                    </div>
                </div>

            </v-tab-item>
            <v-tab-item
                transition="fade-transition"
                reverse-transition="fade-transition"
            >
                <div class="skill__programming">
                    <div class="skill__list">
                        <div class="skill__logo">
                            Ae
                        </div>
                        <div class="skill__details">
                            after effect
                            <div class="skill__progress">

                            </div>
                        </div>
                        <div class="skill__percentage">
                            92
                        </div>

                    </div>
                    <div class="skill__list">
                        <div class="skill__logo">
                            xd
                        </div>
                        <div class="skill__details">
                            Adobe xd
                            <div class="skill__progress">

                            </div>
                        </div>
                        <div class="skill__percentage">
                            92
                        </div>

                    </div>
                </div>

            </v-tab-item>
            <v-tab-item
                transition="fade-transition"
                reverse-transition="fade-transition"
            >
                <div class="skill__programming">
                    <div class="skill__list">
                        <div class="skill__logo">
                            Ae
                        </div>
                        <div class="skill__details">
                            after effect
                            <div class="skill__progress">

                            </div>
                        </div>
                        <div class="skill__percentage">
                            92
                        </div>

                    </div>
                    <div class="skill__list">
                        <div class="skill__logo">
                            xd
                        </div>
                        <div class="skill__details">
                            Adobe xd
                            <div class="skill__progress">

                            </div>
                        </div>
                        <div class="skill__percentage">
                            92
                        </div>

                    </div>
                </div>

            </v-tab-item>
            <v-tab-item
                transition="fade-transition"
                reverse-transition="fade-transition"
            >
                <div class="skill__programming">
                    <div class="skill__list">
                        <div class="skill__logo">
                            Ae
                        </div>
                        <div class="skill__details">
                            after effect
                            <div class="skill__progress">

                            </div>
                        </div>
                        <div class="skill__percentage">
                            92
                        </div>

                    </div>
                    <div class="skill__list">
                        <div class="skill__logo">
                            xd
                        </div>
                        <div class="skill__details">
                            Adobe xd
                            <div class="skill__progress">

                            </div>
                        </div>
                        <div class="skill__percentage">
                            92
                        </div>

                    </div>
                </div>

            </v-tab-item>
        </v-tabs-items>

    </div>
</template>
<script>
    export default {
        data() {
            return {
                tab: null,
            }
        },
    }
</script>
<style scoped lang="scss">
    @import "resources/sass/themes/theme1102/skills.scss";

</style>
