<template>
    <div class="outer-container">
        <div class="title">
            <div class="d-flex align-items-center">
                <img src="/icons/edit-cv-sidebar/downloads.svg" alt="downloads icon">
                <span>Manage Downloads</span>
            </div>
            <v-btn class="resume-builder__btn civie-btn filled download-btn" raised>
                Download My CV
            </v-btn>
        </div>
        <div class="dns-main-content-container resume-builder__scroll">
            <div class="dns-main-content">
                <table class="table table-bordered dns-table table-responsive-sm">
                    <thead>
                    <tr>
                        <th scope="col">
                            <div class="left-col">
                                Saved Downloads
                            </div>
                        </th>
                        <th scope="col" class="sm-col">
                            <div class="center-col">
                                Date
                            </div>
                        </th>

                        <!-- hide on screens smaller than medium -->
                        <th scope="col" class="sm-col d-none d-lg-table-cell">
                            <div class="center-col">
                                View
                            </div>
                        </th>
                        <th scope="col" class="sm-col d-none d-lg-table-cell">
                            <div class="center-col">
                                Download
                            </div>
                        </th>
                        <th scope="col" class="sm-col d-none d-lg-table-cell">
                            <div class="center-col">
                                Delete
                            </div>
                        </th>

                        <!-- hide on screens wider than medium -->
                        <th scope="col" class="sm-col d-lg-none">
                            <div class="center-col">
                                Options
                            </div>
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    <draggable @start="drag=true" @end="drag=false" handle=".drag-handler" style="display: contents">
                        <tr v-for="download in downloads" :key="download.id" v-if="downloads">
                            <td>
                                <div class="table-file">
                                    <img src="/icons/edit-cv-sidebar/drag-btn-icon.svg" alt="drag" class="drag-handler">
                                    <span>{{download.label}}</span>
                                </div>
                            </td>
                            <td>
                                <div class="center-col">
                                    {{getFormattedData(download.created_at)}}
                                </div>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <div class="center-col">
                                    <img src="/icons/view.svg" alt="view icon">
                                </div>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <div class="center-col">
                                    <img src="/icons/download.svg" alt="download icon">
                                </div>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <div class="center-col">
                                    <img src="/icons/delete.svg" alt="delete icon">
                                </div>
                            </td>
                            <td class="d-lg-none">
                                <div class="center-col">
                                    <img src="/icons/view.svg" alt="view icon">
                                    <img src="/icons/download.svg" alt="download icon">
                                    <img src="/icons/delete.svg" alt="delete icon">
                                </div>
                            </td>

                        </tr>
                    </draggable>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import draggable from "vuedraggable";

    export default {
        name: "Downloads",
        components: {
            draggable
        },
        data() {
            return {}
        },
        computed: {
            downloads: {
                get() {
                    return this.$store.state.user.downloads;
                },
                set(downloads) {
                    this.$store.commit("updateDownloads", downloads);
                }
            }
        },
        methods: {
            getFormattedData(date) {
                let d = new Date(date);
                return d.getDate() + '-' + d.getMonth() + '-' + d.getFullYear() ;
            }
        },
        mounted() {

        }
    }
</script>

<style scoped lang="scss">
    @import '../../../../../sass/media-queries';

    .outer-container {
        width: 100%;
        background: #FFFFFF;

        .title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-right: 20px;


            @include lt-sm {
                flex-wrap: wrap;
                .download-btn{
                    margin-top: 25px;
                }
            }


            .download-btn.v-btn{
                width: 200px !important;
            }

            img {
                width: 24px;
                height: 24px;
                margin-right: 6px;
            }

            span {
                font-weight: 500;
                font-size: 22px;
                line-height: 30px;
                color: #888DB1;
            }
        }

        @include lt-sm {
            width: 96%;
            margin: auto;
        }

        .dns-main-content-container {
            margin-top: 25px;
            border-radius: 0;
            height: 350px;

            .dns-main-content {
                margin-right: 20px;

                .dns-table {
                    width: 100%;
                    border: 1px solid #E6E8FC;
                    box-shadow: 0px 5px 20px rgba(0, 16, 131, 0.06);

                    .center-col {
                        display: flex;
                        width: 100%;
                        height: 100%;
                        align-items: center;
                        justify-content: center;

                        img:hover {
                            cursor: pointer;
                        }

                        @media screen and (max-width: 1024px){
                           img{
                               width: 25px;
                               height: 25px;
                               margin-right: 5px;
                           }
                        }
                    }

                    .left-col {
                        display: flex;
                        width: 100%;
                        min-width:250px;
                        height: 100%;
                        align-items: center;
                        justify-content: flex-start;
                        padding-left: 20px;
                    }

                    .sm-col {
                        width: 130px;
                    }

                    thead {
                        background: #F2F3FF;

                        tr {
                            th {
                                font-weight: 600;
                                font-size: 18px;
                                line-height: 25px;
                                color: #888DB1;
                                border: 0;
                                height: 70px;
                            }
                        }
                    }

                    tbody {
                        tr {
                            td {
                                font-weight: normal;
                                font-size: 18px;
                                line-height: 25px;
                                color: #888DB1;
                                height: 70px;
                                @media screen and (max-width: 1024px){
                                    font-size: 14px;
                                    line-height: 14px;
                                }
                            }

                            &:hover {
                                background: rgba(249, 249, 255, 1);
                            }
                        }
                    }

                    .table-file {
                        display: flex;
                        align-items: center;
                        height: 100%;
                        padding-left: 20px;

                        img {
                            width: 30px;
                            height: 28px;
                            margin-right: 20px;

                            &:hover {
                                cursor: grab;
                            }
                        }

                        span {
                            font-weight: normal;
                            font-size: 18px;
                            line-height: 25px;
                            color: #888DB1;
                        }
                    }
                }

            }

        }
    }


</style>
