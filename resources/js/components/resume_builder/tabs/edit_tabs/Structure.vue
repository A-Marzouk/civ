<template>
    <div class="str-main-content-container resume-builder__scroll" v-if="tabs">
        <div class="str-main-content">
            <div class="title">
                <img src="/icons/edit-cv-sidebar/structure.svg" alt="structure icon">
                <span>Drag to order tab view</span>
            </div>

            <div class="str-content" >
                <div class="tab-chip" v-for="preference in preferences" :key="preference.title" :class="{ 'half-opacity' : !isPreferenceActive(preference.title)}">
                    <span>{{preference.label}}</span>
                    <img class="eye-icon-btn" src="/icons/eye-blue.svg" alt="eye-icon" :class="{'blackAndWhite' : !isPreferenceActive(preference.title)}" @click.prevent="togglePreference(preference.title)">
                </div>
            </div>

            <draggable class="str-content" v-model="tabs" @start="drag=true" @end="drag=false"  handle=".drag-handler">
                <div class="tab-chip" v-for="tab in tabs" v-if="!excludedTabs.includes(tab.title)" :key="tab.label" :class="{ 'half-opacity' : !isTabActive(tab.title)}">
                    <img src="/icons/drag-dots.svg" alt="drag button icon" class="drag-handler">
                    <span>{{tab.label}}</span>
                    <img class="eye-icon-btn" src="/icons/eye-blue.svg" alt="eye-icon" :class="{'blackAndWhite' : !isTabActive(tab.title)}" @click.prevent="toggleTab(tab.title)">
                </div>
            </draggable>
        </div>
    </div>
</template>

<script>
    import draggable from "vuedraggable";

    export default {
        name: "structure",
        components: {
            draggable
        },
        data() {
            return {
                excludedTabs:[
                    'structure',
                    'imports',
                    'manager',
                    'themes',
                    'links',
                    'pay_availability',
                    'profile', // main tab | can not be hidden
                ]
            }
        },
        computed: {
            tabs: {
                get() {
                    return this.$store.state.user.tabs;
                },
                set(tabs) {
                    this.$store.commit("updateTabs", tabs);
                }
            },
            preferences: {
                get() {
                    return this.$store.state.user.preferences;
                }
            }
        },
        methods: {
            toggleTab(tabTitle) {
                let currentTab = {};

                this.tabs.forEach((tab) => {
                    if (tab.title === tabTitle) {
                        currentTab = tab;
                        currentTab.is_public = !currentTab.is_public;
                    }
                });

                if (currentTab.id) {
                    axios.put('/api/user/tabs/toggle-tab', currentTab)
                        .then((response) => {
                            this.$store.dispatch('flyingNotification');
                        });
                }

            },
            togglePreference(preferenceTitle) {
                let currentPreference = {};

                this.preferences.forEach((preference) => {
                    if (preference.title === preferenceTitle) {
                        currentPreference = preference;
                        currentPreference.is_public = !currentPreference.is_public;
                    }
                });

                if (currentPreference.id) {
                    axios.put('/api/user/preferences/toggle-visibility', currentPreference)
                        .then((response) => {
                            this.$store.dispatch('flyingNotification');
                        });
                }

            },
            isTabActive(tabTitle) {
                let active = false;
                this.tabs.forEach((tab) => {
                    if (tab.title === tabTitle && tab.is_public) {
                        active = true;
                    }
                });
                return active;
            },
            isPreferenceActive(preferenceTitle) {
                let active = false;
                this.preferences.forEach((preference) => {
                    if (preference.title === preferenceTitle && preference.is_public) {
                        active = true;
                    }
                });
                return active;
            },

        },
        mounted() {

        }
    }
</script>

<style scoped lang="scss">
    @import '../../../../../sass/media-queries';

    .eye-icon-btn{
        margin-left: 10px;
        &:hover{
            cursor: pointer;
        }
    }
    .str-main-content-container{
        width: 100%;
        height: 450px;
        overflow: auto;
        background: #FFFFFF;
        box-shadow: 0 5px 20px rgba(0, 16, 131, 0.1);
        border-radius: 0;
        padding:50px 40px;

        @include lt-sm{
            width: 96%;
            margin: auto;
            padding:40px 0 40px 20px;
        }

        .str-main-content{
            display: flex;
            flex-direction: column;

            .title{
                display:flex;
                align-items: flex-end;

                img{
                    width: 24px;
                    height: 24px;
                    margin-right:6px;
                }

                span{
                    font-weight: 500;
                    font-size: 22px;
                    line-height: 30px;
                    color: #888DB1;
                }
            }

            .str-content{
                display: flex;
                justify-content: flex-start;
                max-width: 1500px;
                flex-wrap: wrap;
                padding: 25px 30px;
                margin-top:40px;
                background: #FBFBFF;

                .tab-chip{
                    display: flex;
                    align-items: center;
                    background: #E6E8FC;
                    border-radius: 8px;
                    padding: 12px 15px;
                    margin: 12px 15px;

                    @media screen and (max-width: 1024px){
                        width: 100%;
                        margin-bottom: 30px;
                    }


                    img.drag-handler{
                        width: 20px;
                        height: 20px;
                        margin-right: 5px;
                        &:hover{
                            cursor: grab;
                        }
                    }

                    span{
                        font-weight: 500;
                        font-size: 18px;
                        line-height: 25px;
                        color: #888DB1;
                    }
                }
            }
        }

    }


</style>
