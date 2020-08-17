<template>
    <v-app class="main-content">
        <div style="width:100%;">
            <v-card class="card-ref pa-xl-10 pa-lg-5 pa-5 resume-builder__scroll reference-content" flat>
                <v-container class>
                    <v-form v-if="reference">
                        <v-row align="center">
                            <v-col
                                    xl="3"
                                    :lg="windowWidth<1300?'6':'3'"
                                    md="6"
                                    sm="6"
                                    cols="12"
                                    class="mt-xl-0 mt-lg-0 mt-md-0 mt-sm-0 mt-n6"
                            >
                                <v-text-field
                                        class="resume-builder__input civie-input"
                                        outlined
                                        color="#001CE2"
                                        :class="{'resume-builder__input--disabled': disabledInput}"
                                        :disabled="disabledInput"
                                        label="Reference Type"
                                        v-model="reference.type"
                                ></v-text-field>
                            </v-col>
                            <v-col
                                    xl="3"
                                    :lg="windowWidth<1300?'6':'3'"
                                    md="6"
                                    sm="6"
                                    cols="12"
                                    class="mt-xl-0 mt-lg-0 mt-md-0 mt-sm-0 mt-n6"
                            >
                                <v-text-field
                                        class="resume-builder__input civie-input"
                                        outlined
                                        color="#001CE2"
                                        :class="{'resume-builder__input--disabled': disabledInput}"
                                        :disabled="disabledInput"
                                        label="Full Name"
                                        v-model="reference.name"
                                ></v-text-field>
                            </v-col>
                            <v-col
                                    xl="3"
                                    :lg="windowWidth<1300?'6':'3'"
                                    md="6"
                                    sm="6"
                                    cols="12"
                                    class="mt-xl-0 mt-md-n6 mt-sm-n6 mt-n6"
                                    :class="windowWidth<1300?'mt-lg-n6':'mt-lg-0'"
                            >
                                <v-text-field
                                        class="resume-builder__input civie-input"
                                        outlined
                                        color="#001CE2"
                                        :class="{'resume-builder__input--disabled': disabledInput}"
                                        :disabled="disabledInput"
                                        label="Title/Position"
                                        v-model="reference.title"
                                ></v-text-field>
                            </v-col>

                            <v-col
                                    xl="3"
                                    :lg="windowWidth<1300?'6':'3'"
                                    md="6"
                                    sm="6"
                                    cols="12"
                                    class="mt-xl-0 mt-md-n6 mt-sm-n6 mt-n6"
                                    :class="windowWidth<1300?'mt-lg-n6':'mt-lg-0'"
                            >
                                <v-text-field
                                        class="resume-builder__input civie-input"
                                        outlined
                                        color="#001CE2"
                                        :class="{'resume-builder__input--disabled': disabledInput}"
                                        :disabled="disabledInput"
                                        label="Phone"
                                        v-model="reference.phone"
                                ></v-text-field>
                            </v-col>

                            <v-col
                                    xl="3"
                                    :lg="windowWidth<1300?'6':'3'"
                                    md="6"
                                    sm="6"
                                    cols="12"
                                    class="mt-xl-n6 mt-lg-n6 mt-md-n6 mt-sm-n6 mt-n6"
                            >
                                <v-text-field
                                        type="email"
                                        class="resume-builder__input civie-input"
                                        outlined
                                        color="#001CE2"
                                        v-model="reference.email"
                                        :class="{'resume-builder__input--disabled': disabledInput}"
                                        :disabled="disabledInput"
                                        label="Email"
                                ></v-text-field>
                            </v-col>
                            <v-col
                                    xl="3"
                                    :lg="windowWidth<1300?'6':'3'"
                                    md="6"
                                    sm="6"
                                    cols="12"
                                    class="mt-xl-n6 mt-lg-n6 mt-md-n6 mt-sm-n6 mt-n6"
                            >
                                <v-text-field
                                        class="resume-builder__input civie-input"
                                        outlined
                                        color="#001CE2"
                                        :class="{'resume-builder__input--disabled': disabledInput}"
                                        :disabled="disabledInput"
                                        label="Company"
                                        v-model="reference.company"
                                ></v-text-field>
                            </v-col>

                            <v-col
                                    xl="3"
                                    :lg="windowWidth<1300?'6':'3'"
                                    md="6"
                                    sm="6"
                                    class="mt-xl-n6 mt-lg-n6 mt-md-n6 mt-sm-n6 mt-n6"
                            >
                                <v-text-field
                                        class="resume-builder__input civie-input"
                                        outlined
                                        color="#001CE2"
                                        :class="{'resume-builder__input--disabled': disabledInput}"
                                        :disabled="disabledInput"
                                        label="Address"
                                        v-model="reference.address"
                                ></v-text-field>
                            </v-col>
                            <v-col
                                    xl="3"
                                    :lg="windowWidth<1300?'6':'3'"
                                    md="6"
                                    sm="6"
                                    cols="12"
                                    class="mt-xl-n6 mt-lg-n6 mt-md-n6 mt-sm-n6 mt-n6"
                            >
                                <v-text-field
                                        class="resume-builder__input civie-input"
                                        outlined
                                        color="#001CE2"
                                        :class="{'resume-builder__input--disabled': disabledInput}"
                                        :disabled="disabledInput"
                                        label="URL"
                                        v-model="reference.url"
                                ></v-text-field>
                            </v-col>
                            <v-col
                                    xl="3"
                                    :lg="windowWidth<1300?'6':'3'"
                                    md="6"
                                    sm="6"
                                    cols="12"
                                    class="mt-xl-n6 mt-lg-n6 mt-md-n6 mt-sm-n6 mt-n8"
                            >
                                <label class="mb-n12 custom-label">Import/Drag Image</label>
                                <v-input
                                        class="resume-builder__input civie-dropzone mt-n4"
                                        outlined
                                        hint="(Maximum 5 files)"
                                        height="155"
                                >
                                    <vue-dropzone
                                            class="civie-dropzone-input sm-image"
                                            ref="myVueDropzone"
                                            id="dropzone"
                                            v-on:vdropzone-file-added="handleFileUpload"
                                            :options="dropzoneOptions"
                                            :useCustomSlot="true"
                                            v-model="reference.image"
                                    >
                                        <div class="dropzone-custom-content">
                                            <svg-vue class="icon" :icon="'upload-input-icon'"></svg-vue>
                                        </div>
                                    </vue-dropzone>
                                </v-input>
                            </v-col>

                            <v-col
                                    xl="3"
                                    :lg="windowWidth<1300?'6':'3'"
                                    md="6"
                                    sm="6"
                                    cols="12"
                                    class="mt-xl-n4 mt-lg-n4 mt-md-n4 mt-sm-n4 mt-n8"
                            >
                                <v-textarea
                                        class="resume-builder__input civie-textarea"
                                        outlined
                                        color="#001CE2"
                                        :class="{'resume-builder__input--disabled': disabledTextarea}"
                                        :disabled="disabledTextarea"
                                        label="Description"
                                        v-model="reference.reference_text"
                                ></v-textarea>
                            </v-col>
                            <!-- <v-col
                                    xl="3"
                                    :lg="windowWidth<1300?'6':'3'"
                                    md="6"
                                    sm="6"
                                    cols="12"
                                    class="mt-xl-n4 mt-lg-n4 mt-md-n4 mt-sm-n4 mt-n8"
                            >
                                <div class="referenceImage" >
                                    <img :src="typeof reference.image === 'object' ? this.tempReferenceImage : reference.image " alt="reference image">
                                </div>
                            </v-col> -->
                            <v-col xl="12" lg="12" md="12" sm="12" cols="12">
                                <v-btn
                                        class="resume-builder__btn civie-btn filled btn-add-new mt-n5"
                                        @click="applyReferenceEdit"
                                >Save
                                </v-btn>
                            </v-col>
                        </v-row>
                    </v-form>
                </v-container>
            </v-card>
        </div>
    </v-app>
</template>

<script>
    import {moveTabsHelper} from "../../helpers/tab-animations";
    import vue2Dropzone from "vue2-dropzone";
    import "vue2-dropzone/dist/vue2Dropzone.min.css";

    export default {
        name: "References",
        components: {
            vueDropzone: vue2Dropzone
        },
        data() {
            return {
                windowWidth: window.innerWidth,
                activeTab: "References",
                tabs: ["References", "Referee", "Testimonials"],
                references: ["Reference", "Reference2"],
                dropzoneOptions: {
                    url: "https://httpbin.org/post",
                    thumbnailWidth: 150,
                    maxFilesize: 0.5,
                    maxFiles: 1,
                    acceptedFiles: "image/*",
                    addRemoveLinks: true
                },
                newTestimonial: {
                    title: "",
                    description: ""
                },
                editedTestimonial: {},
                optionTestimonialId: 0,
                errors: {},
                rules: [value => !!value || "Please fill this field."],
                disabledInput: false,
                disabledTextarea: false,
                addNewTestimonial: false,
                importImage: "",
                tempReferenceImage: ''
            };
        },
        computed: {
            reference() {
                return this.$store.state.user.reference;
            },
            referee() {
                return this.$store.state.user.referee;
            },
            testimonials() {
                return this.$store.state.user.testimonials;
            }
        },
        props: ["selectProps", "inputProps", "textareaProps"],
        mounted() {
            window.onresize = () => {
                this.windowWidth = window.innerWidth;
            };
        },
        methods: {
            toggleSelect() {
                this.disabledSelect = !this.disabledSelect;
            },
            handleFileUpload: function(file) {
                if(this.$refs.myVueDropzone.getAcceptedFiles().length < 1){
                    this.reference.image = file;
                    this.tempReferenceImage = URL.createObjectURL(file);
                }
            },
            applyReferenceEdit() {
                this.errors = {};
                let formData = new FormData();
                formData.append("_method", "put");
                formData.append("user_id", this.reference.user_id);

                $.each(this.reference, field => {
                    if (this.reference[field] !== null) {
                        if (this.reference[field].length) {
                            formData.append(field, this.reference[field]);
                        }
                    }

                    if(field === 'image'){
                        formData.append(field, this.reference[field]);
                    }

                });


                axios.post("/api/user/reference", formData, { headers: {"Content-Type": "multipart/form-data"}})
                    .then( (response) => {
                        this.$store.dispatch("flyingNotification");
                        this.reference.image = response.data.data.image ;
                        this.$refs.myVueDropzone.removeAllFiles();
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
            }
        }
    };
</script>

<style scoped lang="scss">
    @import "../../../../../sass/media-queries";

    $mainBlue: #001ce2;
    .main-content {
        @include lt-sm {
            max-width: 94%;
            margin-right: auto;
            margin-left: auto;
        }
    }

    .referenceImage{
        border-radius: 25px;
        height: 160px;
        width: 160px;
        overflow: hidden;
        img{
            height: inherit;
        }
    }

    .reference-content {
        background: #fff;
        box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1);
        height: 573px;
        padding: 50px;
        margin-bottom: 70px;
        scroll-behavior: smooth;
    }

    .card-ref {
        box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1) !important;
        @media screen and (min-width: 1264px) and (max-width: 1903px) {
            width: auto;
        }
        @media screen and (min-width: 960px) and (max-width: 1263px) {
            width: auto;
        }
        @media screen and (max-width: 768px) {
            width: auto;
        }

        .btn-add-new {
            font-family: "Noto Sans" !important;
            width: 120px !important;
            height: 50px !important;
            font-size: 18px !important;
            font-weight: 500;
            box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1) !important;
            @media screen and (max-width: 599px) {
                width: 100px !important;
                height: 40px !important;
                font-size: 15px !important;
            }
        }
    }

    .input-group {
        margin-right: 15px;

        &:nth-child(4),
        &:last-child {
            margin-right: none;
        }

        .civie-textarea,
        .civie-dropzone {
            margin-bottom: 35.5px;
            height: auto;

            .v-input__control,
            .v-input__slot {
                height: 100%;
            }
        }

        &.files {
            .v-label {
                position: absolute;
            }

            .civie-dropzone {
                width: 100%;
            }
        }
    }

    .error {
        color: red;
        padding-top: 5px;
        padding-left: 3px;
    }

    .custom-label {
        font-family: "Noto Sans" !important;
        font-style: normal;
        font-weight: 500;
        font-size: 15px !important; // adjusted | 18px
        line-height: 25px;
        color: #888db1;
    }
</style>