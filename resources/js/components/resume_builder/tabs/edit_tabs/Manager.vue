<template>
    <div class="outer-container" data-app>
        <div class="title">
            <!-- Tabs -->
            <v-tabs class="resume-builder__tab-bar" hide-slider height="51" style="margin-top: 4px;">
                <v-tab class="resume-builder__tab tabName" v-for="tab in tabs" :key="tab" @click="setActiveTab(tab)">
                    {{tab}}
                </v-tab>
            </v-tabs>

            <v-btn class="resume-builder__btn civie-btn filled download-btn" raised v-if="activeTab === 'Downloads'">
                Download My CV
            </v-btn>
        </div>
        <div class="dns-main-content-container resume-builder__scroll" v-if="activeTab === 'Downloads'">
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

        <div class="links-content resume-builder__scroll" v-if="activeTab === 'URLs'">

            <div class="link-inputs-row">
                <v-text-field class="resume-builder__input civie-input" outlined color="#001CE2" :class="{'resume-builder__input--disabled': false}" :disabled="false" label="URL" placeholder="Unique URL segment" :error="!!errors.url" :error-messages="errors.url" v-model="editedResumeLink.url">
                </v-text-field>

                <div class="d-flex mt-1">
                    <v-btn class="resume-builder__btn civie-btn filled" depressed raised @click="saveLink">
                        {{editedResumeLink.id !== '' ? 'Update' : 'Add New'}}
                    </v-btn>

                    <v-btn
                            class="resume-builder__btn civie-btn cancel-btn" depressed raised @click="clearLink" v-show="editedResumeLink.id !== '' ">
                        Cancel
                    </v-btn>
                </div>
            </div>

            <div style="max-width: 600px; margin-bottom:40px;">
                <v-select
                        class="resume-builder__input civie-select"
                        outlined
                        placeholder="Default resume currently edited"
                        :items="resumeLinks"
                        item-text="url"
                        item-value="id"
                        label="Select default resume"
                        color="#001CE2"
                        @change="updateDefaultResumeURl"
                        v-model="defaultResumeLinkID"
                >
                    <button class="dropdown-icon icon" slot="append" @click.prevent>
                        <svg-vue :icon="`dropdown-caret`"></svg-vue>
                    </button>
                </v-select>
            </div>

            <draggable class="links-items" v-model="resumeLinks" @start="drag=true" @end="drag=false"  handle=".mover">
                <div class="link-item" v-for="link in resumeLinks" :key="link.id" :class="{'half-opacity' : !link.is_public}">
                    <div class="link-data">
                        <div class="mover">
                            <img src="/images/new_resume_builder/three-dots.svg" alt="mover icon">
                        </div>
                        <div class="link-text">
                            <span>https://civ.ie/{{user.username}}/<b>{{link.url}}</b></span>
                        </div>
                    </div>
                    <div class="action-btns">
                        <div class="resume-builder__action-buttons-container">
                            <v-btn class="btn-icon civie-btn" depressed @click="toggleLink(link)">
                                <svg-vue icon="eye-icon" class="icon" :class="{'visible' : link.is_public}"></svg-vue>
                            </v-btn>
                            <v-btn class="btn-icon civie-btn" depressed @click="editLink(link)">
                                <svg-vue icon="edit-icon" class="icon" :class="{'visible' : link.id === editedResumeLink.id}"></svg-vue>
                            </v-btn>

                            <v-btn class="btn-icon civie-btn" depressed @click="deleteLink(link)">
                                <svg-vue icon="trash-delete-icon" class="icon"></svg-vue>
                            </v-btn>
                        </div>
                    </div>
                </div>
            </draggable>

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
            return {
                tabs:[
                    'URLs','Downloads'
                ],
                activeTab: 'URLs',
                editedResumeLink:{
                    id: "",
                    title: "",
                    url: "",
                    is_public: true
                },
                errors:{},
                defaultResumeLinkID: ''
            }
        },
        computed: {
            downloads: {
                get() {
                    return this.$store.state.user.downloads;
                },
                set(downloads) {
                    this.$store.commit("updateDownloads", downloads);
                }
            },
            resumeLinks: {
                get() {
                    return this.$store.state.user.resume_links;
                },
                set(resumeLinks) {
                    this.$store.commit("updateResumeLinks", resumeLinks);
                }
            },
            user() {
                let User = this.$store.state.user;
                this.defaultResumeLinkID = User.resume_link_id;
                return User;
            }
        },
        methods: {
            getFormattedData(date) {
                let d = new Date(date);
                return d.getDate() + '-' + d.getMonth() + '-' + d.getFullYear() ;
            },
            setActiveTab(tab){
                this.activeTab = tab;
            },
            updateDefaultResumeURl(){
                if (this.user.resume_link_id === this.defaultResumeLinkID) {
                    return;
                }
                axios.put("/api/user/update-default-resume", { resume_link_id: this.defaultResumeLinkID, user_id: this.user.id })
                    .then( (response) => {
                        console.log(response);
                        this.$store.dispatch("flyingNotification");
                    })
                    .catch(error => {
                        if (typeof error.response.data === "object") {
                            console.log(error.response.data.errors);
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = "Something went wrong. Please try again.";
                        }
                        this.$store.dispatch("flyingNotification", {
                            message: "Error",
                            iconSrc: "/images/resume_builder/error.png"
                        });
                    });
            },
            // CRUD:
            editLink(link) {
                this.editedResumeLink.id = link.id;
                this.editedResumeLink.url = link.url;
            },
            deleteLink(link) {
                if (
                    !confirm(
                        "Do you want to delete this link [" + link.url + "] ?"
                    )
                ) {
                    return;
                }
                axios.delete("/api/user/resume-links/" + link.id)
                    .then(response => {
                        this.$store.dispatch("flyingNotificationDelete");
                        this.resumeLinks.forEach((link, index) => {
                            if (link.id === response.data.data.id) {
                                this.resumeLinks.splice(index, 1);
                            }
                        });

                        this.closeOptionsBtn();
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            saveLink() {
                this.errors = {};

                let edit = false;
                if (this.editedResumeLink.id !== "") {
                    edit = true;
                }
                this.editedResumeLink.user_id = this.user.id;

                axios.post("/api/user/resume-links", this.editedResumeLink)
                    .then(response => {
                        if (!edit) {
                            let addedLink = response.data.data;
                            this.resumeLinks.push(addedLink);
                        } else {
                            console.log(response.data);
                            this.resumeLinks.forEach((link, index) => {
                                if (link.id === response.data.data.id) {
                                    this.resumeLinks.splice(index, 1, response.data.data);
                                }
                            });
                        }
                        this.clearLink();
                        this.$store.dispatch('flyingNotification');
                    })
                    .catch(error => {
                        if (typeof error.response.data === "object") {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = "Something went wrong. Please try again.";
                        }
                        this.$store.dispatch("flyingNotification", {
                            message: "Error",
                            iconSrc: "/images/resume_builder/error.png"
                        });
                    });
            },
            toggleLink(link) {
                link.is_public = !link.is_public;
                axios.put("/api/user/resume-links", link)
                    .then(response => {
                        this.$store.dispatch("flyingNotification");
                        this.closeOptionsBtn();
                    })
                    .catch(error => {
                        if (typeof error.response.data === "object") {
                            this.errors.edit = error.response.data.errors;
                        } else {
                            this.errors.edit =
                                "Something went wrong. Please try again.";
                        }
                        this.$store.dispatch("flyingNotification", {
                            message: "Error",
                            iconSrc: "/images/resume_builder/error.png"
                        });
                    });
            },

            clearLink() {
                this.editedResumeLink = {
                    id: "",
                    title: "",
                    url: "",
                    is_public: true
                };
            },
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

            @include lt-sm {
                flex-wrap: wrap;
                .download-btn{
                    margin-top: 25px;
                }
            }


            .download-btn.v-btn{
                margin-bottom: 10px;
                margin-right: 20px;
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



    .links-content {
        height: 323px;
        background: #fff;
        box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1);
        padding: 50px;
        margin-bottom: 70px;


        @include lt-sm {
            height: 400px;
            padding: 20px;
        }
    }

    .tabName {
        text-transform: capitalize;
    }

    .link-inputs-row {
        display: grid;
        align-items: center;
        grid-auto-rows: 78px;
        grid-template-columns: minmax(0px, 210px) minmax(0, 350px) auto;
        grid-gap: 20px;
        margin-bottom: 10px;

        .civie-select {
            max-width: 210px;

            .v-input__slot {
                padding-left: 30px !important;
            }

            .input-prepended-icon {
                position: absolute;
                top: 37px; // adjusted | 39px
                left: 5px;

                img {
                    width: 33px;
                }
            }
        }

        .civie-input {
            max-width: 350px;
        }

        .civie-btn {
            width: 120px;
            align-self: end;
        }

        @include lt-md {
            display: flex;
            align-items:center;
            flex-wrap: wrap;
            margin-bottom: 25px;
            // .civie-select {
            // 	margin-right: 30px;
            // }

            // .civie-input {
            // 	margin-right: 30px;
            // }
        }

        @include lt-sm {
            .civie-select {
                grid-column: span 3;
                max-width: 100%;
                width: 100%;
            }

            .civie-input {
                max-width: 100%;
                width: 100%;
                grid-column: span 3;
                grid-row: 2 / 3;
                // margin-top: 15px;
            }

            .civie-btn {
                grid-column: span 3;
                grid-row: 3 / 4;
            }
        }
    }

    .links-items {
        max-width: 714px;
        width: 100%;

        .link-item {
            width: 100%;
            height: 50px;
            display: flex;
            margin-bottom: 30px;
            align-items: center;
            justify-content: space-between;
            background: white;
            box-shadow: 0 5px 20px rgba(0, 16, 131, 0.15);

            .link-data {
                display: flex;
                height: 50px;
                max-width: calc(100% - 125px);

                .mover {
                    width: 50px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    border-right: 1px solid #e6e8fc;

                    img {
                        width: 12px;
                        height: 16px;
                    }

                    &:hover {
                        cursor: grab;
                    }

                    @include lt-sm {
                        width: 22px;
                    }
                }

                .link-text {
                    display: flex;
                    align-items: center;
                    margin-left: 10px;
                    font-size: 18px;
                    line-height: 25px;
                    color: #888db1;
                    overflow: hidden;
                    white-space: nowrap;
                    text-overflow: ellipsis;

                    img {
                        width: 45px;
                        height: auto;
                        // TODO: Don't leave spaces in the image
                    }

                    span {
                        padding-right: 10px;
                        display: block;
                        overflow: hidden;
                        white-space: nowrap;
                        text-overflow: ellipsis;
                    }

                    @include lt-sm {
                        font-size: 13px;
                        margin-left: 0;
                    }
                }
            }

            .action-btns {
                margin-right: 10px;

                .resume-builder__action-buttons-container {
                    position: static;
                }
            }

        }
    }

</style>