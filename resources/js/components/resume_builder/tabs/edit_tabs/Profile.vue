<template>
    <div class="profile" v-if="personalInfo" data-app>

        <photoUploader @crop-success="cropSuccess" v-model="showImageUpload" langType="en"></photoUploader>

        <div class="profile-fields-wrapper">
            <div class="profile-fields">
                <div class="profile-picture">
                    <div class="profile-label">
                        <div class="label" style="font-size: 15px">Photo</div>

                        <div class="profile-pic">
                            <img :src="personalInfo.profile_pic"/>
                            <div class="photo-cover" @click="showImageUpload = true">
                                <img src="/images/resume_builder/camera-icon.png" alt="camera icon">
                            </div>
                        </div>

                    </div>
                    <div class="error" v-if="profile_pic_error">{{profile_pic_error}}</div>
                </div>

                <div class="profile-input-field input-field--username input-field--group-1">
                    <span class="v-label v-label--active theme--light" style="color: #888DB1; font-size:16px;">
                        My URL
                    </span>
                    <v-text-field
                            class="resume-builder__input top-input-margin url min-height"  style="margin-top: -21px;"
                            v-model="usernameCurrentValue"
                            @blur="updateUsername"
                            :outlined="true"
                            :class="{'resume-builder__input--disabled': false}"
                            :error="!!errors.username"
                            :error-messages="errors.username"
                    >
                        <template slot="prepend-inner">
                            <span class="inner-text" style="margin-top:-4.8px;">www.civ.ie/</span>
                        </template>
                    </v-text-field>
                </div>

                <div class="profile-input-field input-field--firstname input-field--group-1">
                    <v-text-field
                            class="resume-builder__input civie-input"
                            :class="{'resume-builder__input--disabled': false}"
                            label="First Name"
                            v-model="personalInfo.first_name"
                            :error="!!errors.first_name"
                            :error-messages="errors.first_name"
                            @blur="applyEdit()"
                            hide-details="auto"
                            outlined
                    ></v-text-field>
                </div>

                <div class="profile-input-field input-field--lastname input-field--group-1">
                    <v-text-field
                            class="resume-builder__input civie-input"
                            label="Last Name"
                            v-model="personalInfo.last_name"
                            :class="{'resume-builder__input--disabled': false}"
                            :error="!!errors.last_name"
                            :error-messages="errors.last_name"
                            @blur="applyEdit()"
                            hide-details="auto"
                            outlined
                    ></v-text-field>
                </div>

                <div class="profile-input-field input-field--job-title input-field--group-1">
                    <v-text-field
                            class="resume-builder__input civie-input"
                            label="Job Title"
                            v-model="personalInfo.designation"
                            :class="{'resume-builder__input--disabled': false}"
                            :error="!!errors.designation"
                            :error-messages="errors.designation"
                            outlined
                            hide-details="auto"
                            @blur="applyEdit()"
                    ></v-text-field>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import photoUploader from './includes/PhotoUploader';

    export default {
        name: "profile",
        components: {
            photoUploader
        },
        data(vm) {
            return {
                errors: {},
                tempPic: "",
                profile_pic_error: "",
                menu: false,
                showImageUpload: false,
                updatedUsername: ''
            };
        },
        computed: {
            personalInfo() {
                return this.$store.state.user.personal_info;
            },
            user() {
                return this.$store.state.user;
            },
            usernameCurrentValue:{
                get(){
                    return this.$store.state.user.username;
                },
                set(value){
                   this.updatedUsername = value;
                }
            }
        },

        methods: {
            // Image cropping
            cropSuccess(imgDataUrl) {
                return;
                this.personalInfo.profile_pic_file = this.dataURLtoFile(imgDataUrl, 'profile');
                this.applyEdit();
            },

            dataURLtoFile(dataURL, filename) {
                var arr = dataURL.split(','), mime = arr[0].match(/:(.*?);/)[1],
                    bstr = atob(arr[1]), n = bstr.length, u8arr = new Uint8Array(n);
                while (n--) {
                    u8arr[n] = bstr.charCodeAt(n);
                }
                return new File([u8arr], filename, {type: mime});
            },

            //
            updateVisibility(field_name){
                this.personalInfo['is_' + field_name + '_active'] = !this.personalInfo['is_' + field_name + '_active'];
                this.applyEdit();
            },
            updateUsername(){
                this.errors = {};
                if( this.updatedUsername === ''){
                    return;
                }
                axios.post("/api/user/account/submit", {username: this.updatedUsername, id: this.user.id})
                    .then(() => {
                        this.user.username = this.updatedUsername ;
                        this.$store.dispatch("flyingNotification");
                    })
                    .catch(error => {
                        if (typeof error.response.data === "object") {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = ["Something went wrong. Please try again."];
                        }
                        this.$store.dispatch("flyingNotification", {
                            message: "Error",
                            iconSrc: "/images/resume_builder/error.png"
                        });
                    });
            },
            applyEdit() {
                this.errors = {};

                let formData = new FormData();
                formData.append("_method", "put");
                formData.append("user_id", this.user.id);

                $.each(this.personalInfo, field => {
                    if (this.personalInfo[field] !== null) {
                        if (field !== "email" && this.personalInfo[field].length) {
                            formData.append(field, this.personalInfo[field]);
                        }
                        if (field === "profile_pic_file") {
                            formData.append('profile_pic', this.personalInfo['profile_pic_file']);
                        }
                    }
                });

                this.errors = {};

                axios.post("/api/user/personal-info", formData, {
                        headers: {"Content-Type": "multipart/form-data"}
                    })
                    .then(response => {
                        this.$store.dispatch("flyingNotification");
                        this.personalInfo.profile_pic = response.data.data.profile_pic;
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
            handleProfilePictureUpload() {
                // validate uploaded file :
                let isValid = this.validateUploadedFile(
                    this.$refs.profile_picture.files[0]
                );
                if (isValid) {
                    this.personalInfo.profile_pic = this.$refs.profile_picture.files[0];
                    this.tempPic = URL.createObjectURL(this.$refs.profile_picture.files[0]);
                    this.profile_pic_error = "";
                    this.applyEdit();
                } else {
                    this.profile_pic_error = "Incorrect file chosen!";
                }
            },
            validateUploadedFile(file) {
                let isValid = true;
                if (file.type.search("image") === -1) {
                    isValid = false;
                }
                if (file.size > 25000000) {
                    isValid = false;
                }
                return isValid;
            },
            canEditEmail() {
                return !(
                    this.user.instagram_id !== null &&
                    !this.isEmail(this.personalInfo.email)
                );
            },
            isEmail(email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }
        }
    };
</script>

<style lang="scss" scoped>
    @import "../../../../../sass/media-queries";

    .profile-eye-icon {
        margin-top: -2px;
        background: whitesmoke;
        border-radius: 50%;
        padding: 4px;
        width: 25px;
        box-shadow: 5px -5px 14px -5px rgba(0, 16, 131, 0.1),;
        height: 25px;

        stroke: #888DB1 !important;
        fill: transparent;

        &.visible {
            stroke: rgb(21, 45, 228) !important;
        }
    }

    .mt-custom6 {
        margin-top: 6px !important;
    }

    .profile {
        max-width: 94%;
        margin-right: auto;
        margin-left: auto;

        .profile-fields-wrapper {
            padding: 10px;
            max-height: 450px;
            overflow-y: scroll;

            .profile-fields {
                padding: 10px;
                background: #ffffff;
                box-shadow: 5px -5px 14px -5px rgba(0, 16, 131, 0.1),
                -5px 5px 14px -5px rgba(0, 16, 131, 0.1);

                .profile-pic {
                    position: relative;
                    overflow-y: hidden;
                    border-radius: 50%;
                    width: 110px;
                    min-width: 110px;
                    min-height: 110px;

                    img {
                        width: 110px;
                        height: 110px;
                        border-radius: 50%;
                    }

                    .photo-cover {
                        &:hover {
                            cursor: pointer;
                        }

                        width: 110px;
                        height: 45px;
                        background: #001CE2;
                        opacity: 0.5;
                        position: absolute;
                        bottom: 0px;
                        display: flex;
                        align-items: center;
                        justify-content: center;

                        img {
                            width: 25px;
                            height: 25px;
                            opacity: 1;
                            border-radius: 0;
                        }
                    }
                }

                .profile-picture {
                    padding-top: 13px;
                    padding-bottom: 15px;

                    .profile-label {
                        .label {
                            color: #888db1;
                            font-size: 19px;
                            line-height: 18px;
                            margin-bottom: 12px;
                        }
                    }
                }

                .profile-input-field {
                    margin-bottom: 15px;

                    &:last-child {
                        margin-bottom: unset;
                    }
                }
            }

            &::-webkit-scrollbar {
                width: 5px;
                background: #e5e5e5;
                border-radius: 5px 0 0 5px;
            }

            &::-webkit-scrollbar-thumb {
                background: #001ce2;
                border-radius: 5px 0 0 5px;
            }
        }

        @include gt-xs {
            max-width: unset;
            margin-left: -10px;

            .profile-fields-wrapper {
                padding-right: 20px;
                margin-top: 30px;

                .profile-fields {
                    padding: 20px;
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    gap: 20px;

                    .profile-picture {
                        grid-row-start: 1;
                        grid-row-end: 2;
                        grid-column-start: 1;
                        grid-column-end: 2;
                        padding-top: 5px;
                        padding-bottom: 5px;
                    }

                    .profile-input-field {
                        margin-bottom: unset;

                        &.input-field--group-1 {
                            &.input-field--firstname {
                                grid-column-start: 1;
                                grid-column-end: 2;
                                grid-row-start: 3;
                                grid-row-end: 4;
                            }

                            &.input-field--username {
                                grid-column-start: 2;
                                grid-column-end: 3;
                                grid-row-start: 1;
                                grid-row-end: 2;
                            }

                            &.input-field--lastname {
                                grid-column-start: 2;
                                grid-column-end: 3;
                                grid-row-start: 3;
                                grid-row-end: 4;
                            }

                            &.input-field--job-title {
                                grid-column-start: 1;
                                grid-column-end: 2;
                                grid-row-start: 4;
                                grid-row-end: 5;
                            }
                        }

                        &.input-field--group-2 {


                        }

                        &.input-field--group-3 {


                        }
                    }
                }

                &::-webkit-scrollbar {
                    width: 10px;
                    border-radius: 10px 0 0 10px;
                }

                &::-webkit-scrollbar-thumb {
                    border-radius: 10px 0 0 10px;
                }
            }
        }

        @include gt-md {
            .profile-fields-wrapper {
                max-height: unset;
                margin-top: unset;

                .profile-fields {
                    padding: 30px;
                    grid-template-columns: 1fr 1fr 1fr 1fr;
                    box-shadow: 0 0 7px -3px rgba(0, 0, 0, 0.24);

                    .profile-picture {
                        grid-row-end: 3;
                    }

                    .profile-input-field {
                        margin-bottom: unset;

                        &.input-field--group-1 {
                            &.input-field--firstname {
                                grid-row-start: 1;
                                grid-row-end: 2;
                                grid-column-start: 3;
                                grid-column-end: 4;
                            }

                            &.input-field--username{
                                grid-row-start: 1;
                                grid-row-end: 2;
                                grid-column-start: 2;
                                grid-column-end: 3;
                            }

                            &.input-field--lastname {
                                grid-row-start: 1;
                                grid-row-end: 2;
                                grid-column-start: 4;
                                grid-column-end: 5;
                            }

                            &.input-field--job-title {
                                grid-column-start: 2;
                                grid-column-end: 3;
                                grid-row-start: 2;
                                grid-row-end: 3;
                            }

                        }

                        &.input-field--group-2 {
                            &.input-field--languages {
                                grid-row-start: 3;
                                grid-row-end: 4;
                                grid-column-start: 1;
                                grid-column-end: 2;
                            }

                            &.input-field--hometown {
                                grid-row-start: 4;
                                grid-row-end: 5;
                                grid-column-start: 1;
                                grid-column-end: 2;
                            }
                        }

                        &.input-field--group-3 {
                            &.input-field--about {
                                grid-row-start: 3;
                                grid-row-end: 5;
                                grid-column-start: 2;
                                grid-column-end: 3;
                            }

                            &.input-field--overview {
                                grid-row-start: 3;
                                grid-row-end: 5;
                                grid-column-start: 3;
                                grid-column-end: 4;
                            }

                            &.input-field--quote {
                                grid-row-start: 3;
                                grid-row-end: 5;
                                grid-column-start: 4;
                                grid-column-end: 5;
                            }
                        }
                    }
                }
            }
        }

        @include gt-lg {
            .profile-fields-wrapper {
                .profile-fields {
                    padding: 45px;
                }
            }
        }
    }

    .picture-preview .old {
        .profile-tab-upper {
            background: #ffffff;
            box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1);
            margin-bottom: 70px;
            padding: 50px 0 35px 40px;

            .profile-input {
                max-width: 300px;
                min-width: 300px;
                margin-right: 40px;
                margin-top: 20px;
            }

            .profile-pic-row-holder {
                height: 110px;
                width: 25%;
                background: whitesmoke;
            }

            .profile-pic-row-wrapper {
                width: 33%;

                .label {
                    font-size: 16px;
                    line-height: 18px;
                    margin-bottom: 12px;
                    margin-top: -8px;
                    color: #888db1;
                }
            }

            .profile-pic-row {
                display: flex;
                align-items: center;

                .profile-pic {
                    position: relative;
                    overflow-y: hidden;
                    border-radius: 50%;

                    img {
                        width: 120px;
                        height: 120px;
                        border-radius: 50%;
                    }

                    .photo-cover {
                        &:hover {
                            cursor: pointer;
                        }

                        width: 120px;
                        height: 50px;
                        background: #001ce2;
                        opacity: 0.5;
                        position: absolute;
                        bottom: 0px;
                        display: flex;
                        align-items: center;
                        justify-content: center;

                        img {
                            width: 25px;
                            height: 25px;
                            opacity: 1;
                            border-radius: 0;
                        }
                    }
                }

                .info-my-account {
                    margin-left: 21px;

                    .name {
                        font-family: Noto Sans, sans-serif;
                        font-style: normal;
                        font-weight: 600;
                        font-size: 24px;
                        line-height: 36px;
                        color: #888db1;
                    }

                    .job-title {
                        font-family: Noto Sans, sans-serif;
                        font-style: normal;
                        font-weight: 600;
                        font-size: 18px;
                        line-height: 25px;
                        color: #888db1;
                    }
                }
            }

            display: flex;
            flex-wrap: wrap;
        }

        .input-margins {
            margin-left: 40px;
            margin-top: 20px;
        }
    }
</style>

<style lang="scss">
    .profile .profile-fields .profile-input-field {
        .v-textarea.v-text-field--box {
            &.v-text-field--outlined:not(.v-input--dense) textarea,
            &.v-text-field--single-line:not(.v-input--dense) textarea {
                max-height: 100%;
                margin-top: unset;

                &::-webkit-scrollbar,
                &::-webkit-scrollbar-thumb {
                    display: none;
                    width: 0;
                }
            }
        }

        .v-textarea.v-text-field--enclosed {
            &.v-text-field--outlined:not(.v-input--dense) textarea,
            &.v-text-field--single-line:not(.v-input--dense) textarea {
                max-height: 100%;
                margin-top: unset;

                &::-webkit-scrollbar,
                &::-webkit-scrollbar-thumb {
                    display: none;
                    width: 0;
                }
            }
        }

        @media screen and (min-width: 1280px) {
            &.input-field--about .v-input__control {
                height: auto;
            }
        }
    }

    #resumeBuilder .v-chip--select .v-chip .v-chip--clickable .v-chip--no-color .theme--light .v-size--default {
        margin-left: -7px;
    }

    .resume-builder__input.url.min-height > .v-input__control > .v-input__slot {
        min-height: 47px !important;
    }
</style>