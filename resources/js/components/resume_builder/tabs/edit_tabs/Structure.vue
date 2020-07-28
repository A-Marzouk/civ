<template>
    <div class="str-main-content-container" v-if="tabs">
        <div class="str-main-content">
            <div class="title">
                <img src="/icons/edit-cv-sidebar/structure.svg" alt="structure icon">
                <span>Drag to order tab view</span>
            </div>
            <draggable class="str-content" v-model="tabs" @start="drag=true" @end="drag=false"  handle=".drag-handler">
                <div class="tab-chip" v-for="tab in tabs" :key="tab.label">
                    <img src="/icons/edit-cv-sidebar/drag-btn-icon.svg" alt="drag button icon" class="drag-handler">
                    <span>{{tab.label}}</span>
                </div>
            </draggable>
        </div>
    </div>
</template>

<script>
    import draggable from "vuedraggable";

    export default {

        name: "Structure",
        components: {
            draggable
        },
        data() {
            return {

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
            }
        },
        methods: {


        },
        mounted() {

        }
    }
</script>

<style scoped lang="scss">
    @import '../../../../../sass/media-queries';

    .str-main-content-container{
        width: 100%;
        min-height:250px;
        background: #FFFFFF;
        box-shadow: 0 5px 100px rgba(0, 16, 131, 0.1);
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
                justify-content: space-between;
                max-width: 1100px;
                flex-wrap: wrap;
                padding: 25px 30px;
                margin-top:40px;


                .tab-chip{
                    display:flex;
                    align-items: center;

                    @media screen and (max-width: 1024px){
                        width: 100%;
                        margin-bottom: 30px;
                    }


                    img{
                        width: 30px;
                        height: 30px;
                        margin-right:15px;
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
