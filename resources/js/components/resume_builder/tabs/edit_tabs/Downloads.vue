<template>
    <div class="outer-container">
        <div class="title">
            <img src="/icons/edit-cv-sidebar/downloads.svg" alt="downloads icon">
            <span>Manage Downloads</span>
        </div>
        <div class="dns-main-content-container resume-builder__scroll">
            <div class="dns-main-content">
                <table class="table table-bordered dns-table table-responsive-md">
                    <thead>
                        <tr>
                            <th scope="col" >
                               <div class="left-col">
                                   Save Downloads
                               </div>
                            </th>
                            <th scope="col" class="sm-col">
                                <div class="center-col">
                                    Date
                                </div>
                            </th>
                            <th scope="col" class="sm-col">
                                <div class="center-col">
                                    View
                                </div>
                            </th>
                            <th scope="col" class="sm-col">
                                <div class="center-col">
                                    Download
                                </div>
                            </th>
                            <th scope="col" class="sm-col">
                                <div class="center-col">
                                    Delete
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <draggable @start="drag=true" @end="drag=false"  handle=".drag-handler" style="display: contents">
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
                            <td>
                                <div class="center-col">
                                    <img src="/icons/view.svg" alt="delete icon">
                                </div>
                            </td>
                            <td>
                                <div class="center-col">
                                    <img src="/icons/download.svg" alt="delete icon">
                                </div>
                            </td>
                            <td>
                                <div class="center-col">
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
        methods: {},
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
                    
                    .center-col{
                        display: flex;
                        width:100%;
                        height: 100%;
                        align-items: center;
                        justify-content: center;
                        img:hover{
                            cursor: pointer;
                        }
                    }

                    .left-col{
                        display: flex;
                        width:100%;
                        height: 100%;
                        align-items: center;
                        justify-content: flex-start;
                        padding-left:20px;
                    }

                    .sm-col{
                        width: 130px;
                    }

                    thead{
                        background: #F2F3FF;
                        tr{
                            th{
                                font-weight: 600;
                                font-size: 18px;
                                line-height: 25px;
                                color: #888DB1;
                                border: 0;
                                height:70px;
                            }
                        }
                    }

                    tbody{
                        tr{
                            td{
                                font-weight: normal;
                                font-size: 18px;
                                line-height: 25px;
                                color: #888DB1;
                                height:70px;
                            }

                            &:hover{
                                background: rgba(249, 249, 255, 1);
                            }
                        }
                    }

                    .table-file {
                        display: flex;
                        align-items: center;
                        height: 100%;
                        padding-left:20px;

                        img {
                            width: 30px;
                            height: 28px;
                            margin-right: 20px;
                            &:hover{
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
