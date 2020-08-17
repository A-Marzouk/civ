<template>
    <v-app>
        <v-container class="main-bar">
            <v-app-bar color="transparent" style="background: white;" flat tile height="100">
                <v-spacer></v-spacer>
                <a href="/" class="link-back2">Home</a>
            </v-app-bar>
        </v-container>

        <h1 class="container external-reference-header">
            You have been named as a referee for <b>{{user.name}}</b>, <br>
            <span>
                please can you complete the following online form to leave a reference.
            </span>
        </h1>

        <div class="container external-reference-content-wrapper">
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
                            class=""
                    >
                        <label  :class="{'dropzone-error' : !!errors.file || !!errors.image}" style="position: absolute; top: -16px; color: #888DB1;font-size: 18px;">Upload Image</label>
                        <v-input
                                class="resume-builder__input civie-dropzone"
                                outlined
                                :class="{'dropzone-error' : !!errors.file || !!errors.image}"
                                hint="(Maximum 5 files)"
                                height="157"
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
                                label="Description"
                                v-model="editedReference.reference_text"
                                :error="!!errors.reference_text"
                                :error-messages="errors.reference_text"
                        ></v-textarea>
                    </v-col>
                </v-row>
                <div class="col-12 d-flex flex-column" style="transform: translateX(-9px)">
                    <div class="d-flex">
                        <v-btn class="resume-builder__btn civie-btn filled" raised @click="saveReference">
                            Submit
                        </v-btn>

                        <v-btn class="resume-builder__btn civie-btn ml-4" raised @click="clearReference" v-show="editedReference.id !== '' ">
                            Cancel
                        </v-btn>
                    </div>
                </div>
            </v-form>


        </div>


        <!-- Footer -->
        <v-footer color="#0F4CEE" class="custom-footer">
            <v-container class="footer-container">
                <v-row justify="center" align="center" class="justify-space-around">
                    <v-col md="2" cols="12" :align="windowWidth <=959 ?'center':'left' ">
                        <v-card flat color="transparent" tile>
                            <img
                                    class="logo-footer hidden-sm-and-down"
                                    src="/images/welcome_landing_page/logo/civie_logo-01.png"
                            />
                            <img
                                    class="logo-footer hidden-md-and-up"
                                    src="/images/welcome_landing_page/logo/civie_logo-01.png"
                            />
                        </v-card>
                    </v-col>
                    <v-col md="6" cols="6" align="right" class="hidden-sm-and-down">
                        <v-card flat tile color="transparent">
                            <v-card-text class="follow-us-text">
                                <label>Follow Us:</label>
                                <v-btn fab x-small color="#ffffff" class="footer-social-icon ml-md-2 ml-sm-0 ml-0"  href="https://www.facebook.com/civieapp">
                                    <img
                                            src="/images/welcome_landing_page/icons/social_icons/facebook.png"
                                            alt="facebook"
                                    />
                                </v-btn>
                                <span class="followers">14,044 Followers</span>
                                <v-btn fab x-small color="#ffffff" class="footer-social-icon ml-md-1 ml-sm-0 ml-0">
                                    <img
                                            src="/images/welcome_landing_page/icons/social_icons/instagram.png"
                                            alt="instagram"
                                    />
                                </v-btn>
                                <span>733 Followers</span>
                            </v-card-text>
                        </v-card>
                    </v-col>

                    <v-col md="4" cols="12" align="right" class="hidden-sm-and-down">
                        <v-card color="transparent" flat tile>
                            <v-card-text class="follow-us-text">
                                <label>Contact Us:</label>
                                <v-btn
                                        fab
                                        x-small
                                        color="#ffffff"
                                        class="footer-social-icon mx-1"
                                        v-for="icon in contactIcons"
                                        :key="icon.title"
                                        :href="icon.url"
                                >
                                    <img :src="getContactIcons(icon.title)" />
                                </v-btn>
                            </v-card-text>
                        </v-card>
                    </v-col>

                    <v-col sm="4" cols="4" class="hidden-md-and-up mt-n12">
                        <v-card flat tile color="transparent" align="center" class>
                            <v-card-subtitle class="follow-us-text">Follow Us</v-card-subtitle>
                            <v-card-subtitle>
                                <v-btn fab x-small color="#ffffff" class="footer-social-icon mx-sm-2 mx-1 mt-n2"  href="https://www.facebook.com/civieapp">
                                    <img
                                            src="/images/welcome_landing_page/icons/social_icons/facebook.png"
                                            alt="facebook"
                                    />
                                </v-btn>
                                <v-btn fab x-small color="#ffffff" class="footer-social-icon mx-sm-2 mx-auto mt-n2">
                                    <img
                                            src="/images/welcome_landing_page/icons/social_icons/instagram.png"
                                            alt="instagram"
                                    />
                                </v-btn>
                            </v-card-subtitle>
                        </v-card>
                    </v-col>

                    <v-col sm="8" cols="8" class="hidden-md-and-up mt-n12" align="right">
                        <v-card flat tile color="transparent" class="ml-md-0 ml-sm-0 ml-8">
                            <v-card-subtitle class="follow-us-text" align="center">Contact Us</v-card-subtitle>
                            <v-card-subtitle align="center">
                                <v-btn
                                        fab
                                        x-small
                                        color="#ffffff"
                                        class="footer-social-icon mx-sm-2 mx-1 mt-n2"
                                        v-for="icon in contactIcons"
                                        :key="icon.title"
                                        :href="icon.url"
                                >
                                    <img :src="getContactIcons(icon.title)" />
                                </v-btn>
                            </v-card-subtitle>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </v-footer>
        <!-- footer -->

    </v-app>
</template>

<script>
    import vue2Dropzone from "vue2-dropzone";
    import "vue2-dropzone/dist/vue2Dropzone.min.css";

    export default {
        name: "externalReference",
        props:['user'],
        components: {
            vueDropzone: vue2Dropzone
        },
        data(){
            return{
                windowWidth: window.innerWidth,
                contactIcons: [
                    { id: 1, title: "email", url:'mailto:hi@civ.ie' },
                    { id: 2, title: "messenger", url: "https://www.facebook.com/civieapp" },
                    { id: 3, title: "skype", url:'skype:magictime.uk'},
                    { id: 4, title: "whatsapp", url: 'https://wa.me/353868447832'},
                    { id: 4, title: "telegram", url: 'https://t.me/conormarjoram'},
                ],

                dropzoneOptions: {
                    url: "https://httpbin.org/post",
                    thumbnailWidth: 150,
                    maxFilesize: 0.5,
                    maxFiles: 1,
                    acceptedFiles: "image/*",
                    addRemoveLinks: true
                },
                errors: {},
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
            }
        },
        methods:{
            getContactIcons(title) {
                return `/images/welcome_landing_page/icons/contact_icons/${title}.png`;
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

                formData.append('user_id', this.user.id);
                formData.append('id', this.editedReference.id);


                axios.post('/api/user/references', formData, {headers: {'Content-Type': 'multipart/form-data'}})
                    .then((response) => {
                        console.log('Successfully added reference...');
                        console.log(response.data);
                        this.clearReference();
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = 'Something went wrong. Please try again.';
                        }
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
        },
        computed:{},
        mounted() {


        }

    }
</script>

<style lang="scss" scoped>
    .main-bar {
        display: flex;
        width: 100%;
        justify-content: space-between;
        align-items: center;
        padding: 25px 25px 0 25px;

        .back-btn {
            img {
                width: 54px;
                height: 54px;
            }
            &:hover {
                cursor: pointer;
            }
        }

        .home-text {
            a {
                font-family: Montserrat, sans-serif;
                font-style: normal;
                font-weight: bold;
                font-size: 18px;
                line-height: 22px;
                color: #0046fe;

                &:hover {
                    text-decoration: none;
                }
            }
        }
        //
        .div-back-btn {
            .btn-back {
                width: 54px !important;
                height: 54px !important;
                border: 5px solid #f8f8f8 !important;
                box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15) !important;
                margin-top: -7px;
                @media screen and (max-width: 599px) {
                    width: 35px !important;
                    height: 35px !important;
                    img {
                        width: 14px !important;
                        height: 11px !important;
                    }
                }
            }

            .link-back {
                font-family: "Montserrat" !important;
                font-weight: 500;
                font-size: 18px;
                line-height: 22px;
                color: #0046fe !important;
                margin-left: 8px;
            }
        }
        .link-back2 {
            font-family: "Montserrat" !important;
            font-weight: 500;
            font-size: 18px;
            line-height: 22px;
            color: #0046fe !important;
        }
    }

    .external-reference-header{
        font-size: 36px;
        color: grey;
        span{
            font-size: 30px;
        }
    }

    .external-reference-content-wrapper{
        min-height:72vh;
    }
</style>