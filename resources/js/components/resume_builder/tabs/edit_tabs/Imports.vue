<template>
    <div>
        <div class="pa-md-0 pa-sm-0 pa-3 content-container">
            <v-tabs class="resume-builder__tab-bar" hide-slider v-model="importTab">
                <v-tab
                        class="resume-builder__tab"
                        v-for="(tabName,i) in tabs"
                        :key="i"
                >{{tabName.replace('_',' ')}}
                </v-tab>
            </v-tabs>
            <v-card class="card-main pa-10 resume-builder__scroll pay-content" flat id="payContent">
                <v-tabs-items v-model="importTab">
                    <v-tab-item class="import-tab-item">
                        PDF/DOC

                    </v-tab-item>

                    <v-tab-item class="import-tab-item">

                        Behance

                    </v-tab-item>

                    <v-tab-item class="import-tab-item">

                        Linkedin

                    </v-tab-item>
                </v-tabs-items>
            </v-card>
        </div>


        <div class="outer-container">
            <div class="title">
                <img src="/icons/edit-cv-sidebar/imports-table.svg" alt="downloads icon">
                <span>Manage Imports</span>
            </div>
            <div class="dns-main-content-container resume-builder__scroll">
                <div class="dns-main-content">
                    <table class="table table-bordered dns-table table-responsive-sm">
                        <thead>
                        <tr>
                            <th scope="col">
                                <div class="left-col">
                                    File Name
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
                            <tr v-for="i in 10" :key="i">
                                <td>
                                    <div class="table-file">
                                        <img src="/icons/edit-cv-sidebar/drag-btn-icon.svg" alt="drag" class="drag-handler">
                                        <span>Theme_0{{i}}_file.pdf</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="center-col">
                                        01/03/2020
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
    </div>
</template>

<script>
    import draggable from "vuedraggable";

    export default {
        name: "Imports",
        components: {
            draggable
        },
        data() {
            return {
                tabs: ["PDF/DOC", "Behance", "LinkedIn"],
                importTab: 0,

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

    .content-container{
        width: 100%;
        @include lt-sm {
            width: 96%;
            margin: auto;
        }
    }
    .pay-content {
        height: 420px;
        background: #fff;
        box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1);
        padding: 50px;
        margin-bottom: 70px;
        scroll-behavior: smooth;
    }

    .card-main {
        box-shadow: 0 5px 100px rgba(0, 16, 131, 0.1) !important;
        @media screen and (max-width: 1903px) {
            width: auto;
        }
    }


    .outer-container {
        width: 100%;
        background: #FFFFFF;
        padding: 40px 30px 40px 40px;
        border: solid whitesmoke 0.5px;
        box-shadow: 0 5px 100px rgba(0, 16, 131, 0.1);

        @media screen and (max-width: 1024px){
            padding: 20px 10px 20px 20px;
        }

        .title {
            display: flex;
            align-items: flex-end;

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
