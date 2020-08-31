<template>
    <v-app class="main-content">
        <div class="d-flex justify-content-end w-100">
            <tab-switcher currentTabTitle="hobbies"></tab-switcher>
        </div>
        <div style="width:100%;">
            <v-card
                    class="card-main-hobbies pa-lg-10 pa-md-10 pa-sm-10 pa-3 resume-builder__scroll hobbies-content"
                    flat
                    id="hobbiesContent"
            >
                <v-tabs-items>
                    <v-container style="width: 100%;">
                        <v-form>
                            <v-row align="center">
                                <v-col xl="3" lg="4" md="6" sm="6" cols="12">
                                    <v-select
                                            class="resume-builder__input civie-select"
                                            outlined
                                            placeholder="Select an option"
                                            :items="categoryOptions"
                                            label="Type"
                                            color="#001CE2"
                                            v-model="editedHobby.category"
                                            :error="!!errors.category"
                                            :error-messages="errors.category"
                                    >
                                        <button class="dropdown-icon icon" slot="append" @click.prevent>
                                            <svg-vue :icon="`dropdown-caret`"></svg-vue>
                                        </button>
                                    </v-select>
                                </v-col>

                                <v-col xl="3" lg="4" md="6" sm="6" cols="12">
                                    <v-text-field
                                            class="resume-builder__input civie-input"
                                            outlined
                                            placeholder="Select an option"
                                            label="Name"
                                            color="#001CE2"
                                            v-model="editedHobby.title"
                                            :error="!!errors.title"
                                            :error-messages="errors.title"
                                    >
                                    </v-text-field>
                                </v-col>

                                <v-col xl="3" lg="4" md="6" sm="6" cols="12">
                                    <v-btn class="resume-builder__btn civie-btn filled" depressed raised @click="saveHobby">
                                        {{editedHobby.id !== '' ? 'Update' : 'Add New'}}
                                    </v-btn>

                                    <v-btn class="resume-builder__btn civie-btn cancel-btn" depressed raised @click="clearHobby" v-show="editedHobby.id !== '' ">
                                        Cancel
                                    </v-btn>
                                </v-col>

                            </v-row>
                        </v-form>
                        <draggable v-model="hobbies" @start="drag=true" @end="drag=false"  handle=".drag-btn">
                            <v-row align="center" v-for="hobby in hobbies" :key="hobby.id" v-if="hobbies" :class="{'half-opacity' : !hobby.is_public}">
                                <v-col xl="6" lg="8" md="8" sm="10" cols="12">
                                    <v-card class="card-holder pa-2 mb-3">
                                        <v-row justify="center">
                                            <v-col xl="1" lg="1" md="1" sm="1" cols="1" class="mt-xl-n2 mt-lg-n2 mt-n3" align="center">
                                                <v-btn color="#ffffff" class="btn-v_bar drag-btn" depressed>
                                                    <v-icon color="#888DB1">mdi-dots-vertical</v-icon>
                                                </v-btn>
                                            </v-col>
                                            <v-col xl="1" lg="1" md="1" sm="1" cols="1" class="mt-n5">
                                                <div class="vertical-line"></div>
                                            </v-col>
                                            <v-col xl="5" lg="5" md="5" sm="5" cols="5" class="mt-n2">
                                                <div class="hobby-title">{{hobby.title}}</div>
                                            </v-col>
                                            <v-col xl="5" lg="5" md="5" sm="5" cols="5" align="right" class="action-col resume-builder__action-buttons-container">
                                                <v-btn
                                                        class="btn-icon civie-btn"
                                                        depressed @click="toggleHobby(hobby)"
                                                >
                                                    <svg-vue
                                                            icon="eye-icon"
                                                            :class="{'visible' : hobby.is_public}"
                                                            class="icon"
                                                    ></svg-vue>
                                                </v-btn>
                                                <v-btn
                                                        class="btn-icon civie-btn"
                                                        @click="editHobby(hobby)"
                                                        depressed
                                                >
                                                    <svg-vue
                                                            icon="edit-icon"
                                                            class="icon"
                                                            :class="{'visible' : hobby.id === editedHobby.id}"
                                                    ></svg-vue>
                                                </v-btn>
                                                <v-btn
                                                        class="btn-icon civie-btn"
                                                        @click="deleteHobby(hobby)"
                                                        depressed
                                                >
                                                    <svg-vue
                                                            icon="trash-delete-icon"
                                                            class="icon"
                                                    ></svg-vue>
                                                </v-btn>
                                            </v-col>
                                        </v-row>
                                    </v-card>
                                </v-col>
                            </v-row>
                        </draggable>

                    </v-container>
                </v-tabs-items>
            </v-card>
        </div>
    </v-app>
</template>

<script>
    import draggable from "vuedraggable";
    import tabSwitcher from "./includes/TabSwitcher";

    export default {
        name: "Hobbies",
        components: {
            draggable,
            'tab-switcher' : tabSwitcher,
        },
        data() {
            return {
                editedHobby: {
                    id: "",
                    category: "",
                    title: ""
                },
                categoryOptions: [
                    {
                        text: "Sports",
                        value: "sports"
                    },
                    {
                        text: "Ice skating",
                        value: "ice_skating"
                    },
                    {
                        text: "Cycling",
                        value: "cycling"
                    },
                    {
                        text: "Parkour",
                        value: "parkour"
                    }
                ],
                optionHobbyId: 0,
                errors: {}
            };
        },
        computed: {
            hobbies: {
                get() {
                    return this.$store.state.user.hobbies;
                },
                set(hobbies) {
                    this.$store.commit('updateHobbies', hobbies);
                }
            },
        },
        methods: {
            toggleHobby(hobby){
                hobby.is_public = !hobby.is_public;
                axios.put("/api/user/hobbies", hobby)
                    .then( () => {
                        this.$store.dispatch("flyingNotification");
                    })
                    .catch(error => {
                        if (typeof error.response.data === "object") {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors =
                                "Something went wrong. Please try again.";
                        }
                        this.$store.dispatch("flyingNotification", {
                            message: "Error",
                            iconSrc: "/images/resume_builder/error.png"
                        });
                    });
            },
            saveHobby() {

                let edit = false;
                if (this.editedHobby.id !== "") {
                    edit = true;
                }

                if (!this.validateHobby()) { return;}

                this.editedHobby.user_id = this.$store.state.user.id;
                axios.post("/api/user/hobbies", this.editedHobby)
                    .then(response => {
                        if(!edit){
                            response.data.data.is_public = 1 ;
                            this.hobbies.unshift(response.data.data);
                        }else{
                            this.hobbies.forEach((hobby, index) => {
                                if (hobby.id === response.data.data.id) {
                                    this.hobbies.splice(index, 1, response.data.data);
                                }
                            });
                        }

                        this.clearHobby();
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
            validateHobby() {
                this.errors = {};

                if (this.editedHobby.title && this.editedHobby.category) {
                    return true;
                }

                if (!this.editedHobby.title) {
                    this.errors.title = "Title required.";
                }
                if (!this.editedHobby.category) {
                    this.errors.category = "Category required.";
                }

                return false;
            },

            clearHobby() {
                this.editedHobby = {
                    id: "",
                    category: "",
                    title: ""
                };
            },

            editHobby(hobby) {
                $.each(hobby, (field) => {
                    this.editedHobby[field] = hobby[field] ;
                });
            },

            deleteHobby(hobby) {
                if (
                    !confirm("Do you want to delete this hobby [" + hobby.title + "] ?")
                ) {
                    return;
                }
                axios
                    .delete("/api/user/hobbies/" + hobby.id)
                    .then(response => {
                        this.$store.dispatch("flyingNotificationDelete");
                        this.hobbies.forEach((hobby, index) => {
                            if (hobby.id === response.data.data.id) {
                                this.hobbies.splice(index, 1);
                            }
                        });

                        this.closeOptionsBtn();
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },

        },
        mounted() {
            $("#hobbiesSection").on("click", e => {
                if (
                    this.showCategoryOptions &&
                    !$(e.target).parents(".civ-input").length
                ) {
                    this.showCategoryOptions = false;
                }
            });
        }
    };
</script>

<style scoped lang="scss">
    @import "../../../../../sass/media-queries";

    .main-content{
        @include lt-sm{
            max-width: 94%;
            margin-right: auto;
            margin-left: auto;
        }
    }

    $mainBlue: #001ce2;
    .hobbies-content {
        height: 323px;
        background: #fff;
        box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1);
        padding: 50px;
        margin-bottom: 70px;
        scroll-behavior: smooth;
        @media screen and (max-width: 599px) {
            height: 462px;
        }
    }

    .card-main-hobbies {
        box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1) !important;
        @media screen and (max-width: 1903px) {
            width: auto;
        }

        .btn-add-new {
            font-family: "Noto Sans" !important;
            width: 120px !important;
            height: 50px !important;
            font-size: 18px !important;
            font-weight: 500;
            box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1) !important;
            @media screen and (max-width: 767px) {
                width: 100px !important;
                height: 40px !important;
                font-size: 15px !important;
            }
        }

        .card-holder {
            box-shadow: 0px 5px 20px rgba(0, 16, 131, 0.06);
            height: 50px;

            .btn-v_bar {
                min-width: 30px !important;
                min-height: 28px !important;
                width: 30px !important;
                height: 28px !important;
                margin-left: 2px;
                @media screen and (min-width: 1264px) and (max-width: 1903px) {
                    margin-left: 10px;
                }

                @media screen and (max-width: 599px) {
                    min-width: 24px !important;
                    min-height: 24px !important;
                    width: 24px !important;
                    height: 30x !important;
                    margin-top: 2px;
                    margin-left: -5px;
                }
            }

            .vertical-line {
                border-left: 1px solid #e6e8fc;
                height: 50px;
            }

            .hobby-title {
                font-family: "Noto Sans" !important;
                font-size: 18px;
                line-height: 25px;
                color: #888db1 !important;
                @media screen and (min-width:1264px) and (max-width:1440px){
                    font-size: 14px;
                }
                @media screen and (min-width: 600px) and (max-width: 767px) {
                    font-size: 14px;
                }
                @media screen and (max-width: 374px) {
                    font-size: 14px;
                }
            }

            .btn-skill-action {
                border-radius: 5px !important;
                min-width: 30px !important;
                min-height: 30px !important;
                width: 30px !important;
                height: 30px !important;
                @media screen and (max-width: 369px) {
                    margin-left: -11px;
                }
            }

            .action-col {
                margin-top: -10px;
            }
        }
    }

    .error {
        position: absolute;
        color: red;
        font-weight: 600;
        margin-left: 5px;
    }

    .fade-enter-active,
    .fade-leave-active {
        transition: opacity 0.5s;
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
    {
        opacity: 0;
    }
    
    .drag-btn:hover{
        cursor: grab;
    }
</style>
<style>
    @media screen and (max-width: 959px) {
        #resumeBuilder .v-slide-group__prev.v-slide-group__prev--disabled {
            display: none !important;
        }
    }
</style>