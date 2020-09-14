<template>
    <div class="main-content">
        <div class="d-flex justify-content-end w-100">
            <tab-switcher currentTabTitle="references"></tab-switcher>
        </div>
        <div style="width:100%;">
            <v-card class="card-ref pa-xl-10 pa-lg-5 pa-5 resume-builder__scroll reference-content" flat>
                <div>

                    <div class="reference-external-link-wrapper">
                        <div class="reference-external-link-input">
                            <v-text-field
                                    class="resume-builder__input civie-input"
                                    outlined
                                    color="#001CE2"
                                    label="Reference link"
                                    :disabled="true"
                                    hint="Share with your former employers for your reference"
                                    persistent-hint
                                    :value="`https://civ.ie/${$store.state.user.username}/reference`"
                                    :error="!!errors.type"
                                    :error-messages="errors.type"
                            ></v-text-field>
                        </div>
                        <div class="reference-external-link-button">
                            <v-btn class="resume-builder__btn civie-btn filled" raised @click="copyReferenceLink">
                                Copy Link
                            </v-btn>
                        </div>
                    </div>

                    <v-form>
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
                                        label="Reference Type"
                                        v-model="editedReference.type"
                                        :error="!!errors.type"
                                        :error-messages="errors.type"
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
                                        label="Full Name"
                                        v-model="editedReference.name"
                                        :error="!!errors.name"
                                        :error-messages="errors.name"
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
                                        label="Title/Position"
                                        v-model="editedReference.title"
                                        :error="!!errors.title"
                                        :error-messages="errors.title"
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
                                        label="Phone"
                                        v-model="editedReference.phone"
                                        :error="!!errors.phone"
                                        :error-messages="errors.phone"
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
                                        v-model="editedReference.email"
                                        label="Email"
                                        :error="!!errors.email"
                                        :error-messages="errors.email"
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
                                        label="Company"
                                        v-model="editedReference.company"
                                        :error="!!errors.company"
                                        :error-messages="errors.company"
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
                                        label="Address"
                                        v-model="editedReference.address"
                                        :error="!!errors.address"
                                        :error-messages="errors.address"
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
                                        label="URL"
                                        v-model="editedReference.url"
                                        :error="!!errors.url"
                                        :error-messages="errors.url"
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
                                <label  :class="{'error' : !!errors.file || !!errors.image}" style="position: absolute; top: -14px; color: #888DB1;font-size: 15px;">Upload Image</label>
                                <v-input
                                        class="resume-builder__input civie-dropzone"
                                        outlined
                                        :class="{'error' : !!errors.file || !!errors.image}"
                                        hint="(Maximum 5 files)"
                                        height="146"
                                        style="margin-top: -21px;"
                                >
                                    <vue-dropzone
                                            class="civie-dropzone-input sm-image"
                                            ref="myVueDropzone"
                                            id="dropzone"
                                            v-on:vdropzone-file-added="handlingEvent"
                                            v-on:vdropzone-drop="checkMaximumFiles"
                                            v-on:vdropzone-removed-file="removeFile"
                                            :options="dropzoneOptions"
                                            :useCustomSlot="true"
                                            v-model="editedReference.image"
                                            :error="!!errors.imag"
                                            :error-messages="errors.image"
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
                                        label="Reference Text"
                                        v-model="editedReference.reference_text"
                                        :error="!!errors.reference_text"
                                        :error-messages="errors.reference_text"
                                ></v-textarea>
                            </v-col>
                        </v-row>
                        <div class="col-12 d-flex flex-column" style="transform: translateX(-9px)">
                            <div class="d-flex">
                                <v-btn class="resume-builder__btn civie-btn filled" raised @click="saveReference">
                                    {{editedReference.id !== '' ? 'Update' : 'Add New'}}
                                </v-btn>

                                <v-btn class="resume-builder__btn civie-btn ml-4" raised @click="clearReference" v-show="editedReference.id !== '' ">
                                    Cancel
                                </v-btn>
                            </div>
                        </div>
                    </v-form>

                    <draggable class="projects-list" v-if="references" v-model="references" @start="drag=true" @end="drag=false"  handle=".drag-handler">
                        <div class="project ml-md-4" v-for="reference in references" :class="{'half-opacity' : !reference.is_public}">
                            <div class="project__header">
                                <v-btn
                                        depressed
                                        class="drag-and-drop-handler drag-handler"
                                >
                                    <svg-vue
                                            :icon="'drag-and-drop-icon'"
                                            class="icon"
                                    ></svg-vue>
                                </v-btn>
                                <div
                                        class="resume-builder__action-buttons-container"
                                >
                                    <v-btn
                                            class="btn-icon civie-btn"
                                            depressed @click="toggleReference(reference)"
                                    >
                                        <svg-vue
                                                icon="eye-icon"
                                                :class="{'visible' : reference.is_public}"
                                                class="icon"
                                        ></svg-vue>
                                    </v-btn>
                                    <v-btn
                                            class="btn-icon civie-btn"
                                            @click="editReference(reference)"
                                            depressed
                                    >
                                        <svg-vue
                                                icon="edit-icon"
                                                class="icon"
                                                :class="{'visible' : reference.id === editedReference.id}"
                                        ></svg-vue>
                                    </v-btn>
                                    <v-btn
                                            class="btn-icon civie-btn"
                                            @click="deleteReference(reference)"
                                            depressed
                                    >
                                        <svg-vue
                                                icon="trash-delete-icon"
                                                class="icon"
                                        ></svg-vue>
                                    </v-btn>
                                </div>
                            </div>
                            <div class="project__body">
                                <div class="project__img">
                                    <div class="project__name">{{reference.title}}</div>
                                    <img
                                            :src="reference.image"
                                            alt="achievement img">
                                </div>
                                <div class="project__info">
                                    <div class="project__name">{{reference.title}}</div>
                                    <div class="project__url">
                                        <b>URL:</b> <a :href="reference.url">{{reference.url}}</a>
                                    </div>
                                    <div class="project__skills">
                                        <b>Company:</b> {{reference.company}}
                                    </div>
                                    <div class="project__skills">
                                        <b>Name:</b> {{reference.name}}
                                    </div>
                                    <div class="project__skills">
                                        <b>Title:</b> {{reference.title}}
                                    </div>
                                    <div class="project__skills">
                                        <b>Phone:</b> {{reference.phone}}
                                    </div>
                                    <div class="project__skills">
                                        <b>Email:</b> {{reference.email}}
                                    </div>
                                    <div class="project__skills">
                                        <b>Address:</b> {{reference.address}}
                                    </div>
                                    <div class="project__description">
                                        <b>Reference text: </b>
                                        {{reference.reference_text}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </draggable>
                </div>
            </v-card>
        </div>
    </div>
</template>

<script>
    import vue2Dropzone from "vue2-dropzone";
    import "vue2-dropzone/dist/vue2Dropzone.min.css";
    import tabSwitcher from "./includes/TabSwitcher";

    export default {
        name: "References",
        components: {
            vueDropzone: vue2Dropzone,
            'tab-switcher' : tabSwitcher
        },
        data() {
            return {
                windowWidth: window.innerWidth,
                dropzoneOptions: {
                    url: "https://httpbin.org/post",
                    thumbnailWidth: 150,
                    maxFilesize: 0.5,
                    maxFiles: 1,
                    acceptedFiles: "image/*",
                    addRemoveLinks: true
                },
                errors: {},
                importImage: "",
                tempReferenceImage: '',
                editedReference: {
                    id: '',
                    type: '',
                    name: '',
                    title: '',
                    phone: '',
                    email: '',
                    company: '',
                    address: '',
                    url: '',
                    images: [],
                    reference_text: ''
                },
            };
        },
        computed: {
            references: {
                get() {
                    return this.$store.state.user.references;
                },
                set(references) {
                    this.$store.commit('updateReferences', references);
                }
            }
        },
        props: ["selectProps", "inputProps", "textareaProps"],
        mounted() {
            window.onresize = () => {
                this.windowWidth = window.innerWidth;
            };
        },
        methods: {

            copyReferenceLink() {
                let $temp = $("<input>");
                $("body").append($temp);
                $temp.val(this.baseUrl() + this.$store.state.user.username + '/reference').select();
                document.execCommand("copy");
                $temp.remove();
                this.$store.dispatch("flyingNotification", {
                    message: "Copied",
                    iconSrc: "/images/resume_builder/tick.svg"
                });
            },
            baseUrl() {
                let getUrl = window.location;
                return getUrl.protocol + "//" + getUrl.host + "/";
            },
            // references list functions:
            deleteReference(reference) {
                if (!confirm('Do you want to delete this reference ?')) {
                    return;
                }
                axios.delete('/api/user/references/' + reference.id)
                    .then((response) => {
                        this.$store.dispatch('flyingNotificationDelete');
                        this.references.forEach((myReference, index) => {
                            if (myReference.id === response.data.data.id) {
                                this.references.splice(index, 1);
                            }
                        });
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },
            editReference(reference){
                $.each(reference, (field) => {
                    this.editedReference[field] = reference[field];
                } );
            },
            toggleReference(reference) {
                reference.is_public = !reference.is_public;
                axios.put("/api/user/references", reference)
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


            // new reference functions
            handlingEvent: function (file) {
                if (this.editedReference.images.length < 1) {
                    this.editedReference.images.push(file);
                    this.editedReference.image = 'Temporary URL';
                }else{

                }
            },
            checkMaximumFiles(){
                if (this.editedReference.images.length >= 1) {
                }
            },
            removeFile(){
                this.editedReference.image = '';
            },
            saveReference() {
                this.errors = {};
                let formData = new FormData();

                $.each(this.editedReference, (field) => {
                    if (field !== 'images') {
                        formData.append(field, this.editedReference[field]);
                    }
                });

                this.editedReference.images.forEach((image) => {
                    formData.append('file', image);
                });

                let edit = false;
                if (this.editedReference.id !== "") {
                    edit = true;
                }

                formData.append('user_id', this.$store.state.user.id);
                formData.append('id', this.editedReference.id);


                axios.post('/api/user/references', formData, {headers: {'Content-Type': 'multipart/form-data'}})
                    .then((response) => {
                        if (!edit) {
                            response.data.data.is_public = true ;
                            this.references.push(response.data.data);
                        } else {
                            this.references.forEach((reference, index) => {
                                if (reference.id === response.data.data.id) {
                                    this.references.splice(index, 1, response.data.data);
                                }
                            });
                        }

                        this.$store.dispatch('flyingNotification');
                        this.clearReference();
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = 'Something went wrong. Please try again.';
                        }

                        this.$store.dispatch('flyingNotification', {
                            message: 'Error',
                            iconSrc: '/images/resume_builder/error.png'
                        });
                    });
            },
            clearReference() {
                this.editedReference = {
                    id: '',
                    type: '',
                    name: '',
                    title: '',
                    phone: '',
                    email: '',
                    company: '',
                    address: '',
                    url: '',
                    images: [],
                    reference_text: ''
                };
                this.$refs.myVueDropzone.removeAllFiles();
            }
        }
    };
</script>

<style scoped lang="scss">
    @import '../../../../../sass/variables';
    @import '../../../../../sass/media-queries';
    $mainBlue: #001ce2;
    .main-content {
        @include lt-sm {
            max-width: 94%;
            margin-right: auto;
            margin-left: auto;
        }
    }

    .reference-external-link-wrapper{
        display: flex;
        align-items: center;
        justify-content: flex-start;
        flex-wrap: wrap;
        margin-bottom: 30px;
        .reference-external-link-input{
            width:450px;
            margin-right: 30px;
        }
        .reference-external-link-button{

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
        height: 450px;
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
            margin-right: 0;
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

    .custom-label {
        font-family: "Noto Sans" !important;
        font-style: normal;
        font-weight: 500;
        font-size: 15px !important; // adjusted | 18px
        line-height: 25px;
        color: #888db1;
    }

    .projects-list {
        width: 100%;
        padding: 20px;

        .project {
            max-width: 620px;
            width: 100%;
            box-shadow: 0px 5px 20px rgba(0, 16, 131, 0.06);
            background: white;
            min-height: 225px;
            padding: 10px 15px;
            margin-bottom: 20px;

            &__header {
                display: flex;
                justify-content: space-between;
                width: 100%;

                .drag-and-drop-handler {
                    background-color: $auxBgColor-gray;
                    border-radius: 5px;
                    height: 25px;
                    width: 25px;

                    // Reset default props of v-btn class
                    min-width: auto !important;
                    padding: 0 !important;

                    .icon {
                        height: 10px;
                        width: 3px;
                    }
                }

                .resume-builder__action-buttons-container {
                    .btn-icon {
                        width: 25px;
                        height: 25px !important;

                    }
                }
            }

            &__body {
                margin-top: 10px;
                display: flex;
                justify-content: space-between;

                .project__img {
                    img {
                        min-width: 120px;
                        max-width: 220px;
                    }

                    .project {
                        &__name {
                            display: none;

                            @include lt-sm {
                                display: block;
                                font-size: 20px;
                                font-weight: normal;
                                color: $mainColor;
                                margin-bottom: 10px;
                            }
                        }
                    }

                    @include lt-sm {
                        width: 100%;

                        img,
                        .project__name {
                            width: 100%;
                        }

                        img {
                            margin-bottom: 15px;
                        }
                    }
                }

                .project__info {
                    margin-left: 20px;
                    margin-top: 14px;

                    .project {
                        &__name {
                            font-size: 24px;
                            font-weight: 700;
                            color: $mainColor;
                            margin-bottom: 10px;

                            @include lt-sm {
                                display: none;
                            }
                        }

                        &__url,
                        &__skills,
                        &__softwares,
                        &__description {
                            color: $inputTextColor;
                        }
                    }

                    @include lt-sm {
                        width: 100%;
                        margin-left: 0;
                    }
                }

                @include lt-sm {
                    flex-wrap: wrap;
                }
            }

        }
    }
</style>