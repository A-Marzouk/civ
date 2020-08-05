<template>
    <div class="profile" v-if="personalInfo" data-app>
        <div class="profile-fields-wrapper">
            <div class="profile-fields">
                <div class="profile-picture">
                    <div class="profile-label">
                        <div class="label">Photo</div>

                        <div
                                class="picture-preview"
                                :style="`background-image: url(${personalInfo.profile_pic})`"
                        >
                        </div>
                    </div>
                    <div class="error" v-if="profile_pic_error">{{profile_pic_error}}</div>
                </div>

                <div class="profile-input-field input-field--firstname input-field--group-1">
                    <v-text-field
                            class="resume-builder__input profile-input"
                            :class="{'resume-builder__input--disabled': false}"
                            label="First Name"
                            v-model="personalInfo.first_name"
                            :error="!!errors.first_name"
                            :error-messages="errors.first_name"
                            @blur="applyEdit('auto')"
                            hide-details="auto"
                            outlined
                    ></v-text-field>
                </div>

                <div class="profile-input-field input-field--lastname input-field--group-1">
                    <v-text-field
                            class="resume-builder__input profile-input"
                            label="Last Name"
                            v-model="personalInfo.last_name"
                            :class="{'resume-builder__input--disabled': false}"
                            :error="!!errors.last_name"
                            :error-messages="errors.last_name"
                            @blur="applyEdit('auto')"
                            hide-details="auto"
                            outlined
                    ></v-text-field>
                </div>

                <div class="profile-input-field input-field--current-location input-field--group-1">
                    <v-text-field
                            class="resume-builder__input profile-input"
                            label="Current Location"
                            v-model="personalInfo.location"
                            :class="{'resume-builder__input--disabled': false, 'half-opacity' : ! personalInfo.is_location_active}"
                            :error="!!errors.location"
                            :error-messages="errors.location"
                            @blur="applyEdit('auto')"
                            hide-details="auto"
                            outlined
                    >
                        <button
                                class=" trigger-icon icon mt-custom6"
                                slot="append"
                                @click="updateVisibility('location')"
                        >
                            <svg-vue class="profile-eye-icon" :icon="`eye-icon`"
                                     :class="{'visible' : personalInfo.is_location_active}"></svg-vue>
                        </button>
                    </v-text-field>
                </div>

                <div class="profile-input-field input-field--date-of-birth input-field--group-1">
                    <v-menu
                            ref="menu"
                            v-model="menu"
                            :close-on-content-click="false"
                            :return-value.sync="personalInfo.date_of_birth"
                            transition="scale-transition"
                            offset-y
                            min-width="290px"
                    >
                        <template v-slot:activator="{ on }">
                            <v-text-field
                                    v-model="personalInfo.date_of_birth"
                                    class="resume-builder__input civie-datepicker profile-input"
                                    label="Date Of Birth"
                                    color="#001CE2"
                                    readonly
                                    v-on="on"
                                    hide-details="auto"
                                    outlined
                                    placeholder="yyyy-mm-dd"
                            >
                                <button class="dropdown-icon icon mt-custom6" slot="append" @click="menu = true">
                                    <svg-vue :icon="`dropdown-caret`"></svg-vue>
                                </button>
                            </v-text-field>
                        </template>
                        <v-date-picker v-model="personalInfo.date_of_birth" no-title scrollable color="#001CE2">
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="menu = false">Cancel</v-btn>
                            <v-btn text color="primary" @click="saveDate">OK</v-btn>
                        </v-date-picker>
                    </v-menu>
                </div>

                <div class="profile-input-field input-field--job-title input-field--group-1">
                    <v-text-field
                            class="resume-builder__input profile-input"
                            label="Job Title"
                            v-model="personalInfo.designation"
                            :class="{'resume-builder__input--disabled': false}"
                            :error="!!errors.designation"
                            :error-messages="errors.designation"
                            outlined
                            hide-details="auto"
                            @blur="applyEdit('auto')"
                    ></v-text-field>
                </div>

                <div class="profile-input-field input-field--nationality input-field--group-1">
                    <v-text-field
                            class="resume-builder__input profile-input"
                            label="Nationality"
                            v-model="personalInfo.nationality"
                            :class="{'resume-builder__input--disabled': false, 'half-opacity' : ! personalInfo.is_nationality_active}"
                            :error="!!errors.nationality"
                            :error-messages="errors.nationality"
                            hide-details="auto"
                            outlined
                            @blur="applyEdit('auto')"
                    >
                        <button
                                class=" trigger-icon icon mt-custom6"
                                :class="{'icon--disabled': false}"
                                slot="append"
                                @click="updateVisibility('nationality')"
                        >
                            <svg-vue :icon="`eye-icon`" class="profile-eye-icon"
                                     :class="{'visible' : personalInfo.is_nationality_active}"></svg-vue>
                        </button>
                    </v-text-field>
                </div>

                <div class="profile-input-field input-field--languages input-field--group-2">
                    <v-select
                            class="resume-builder__input profile-input civie-select multiple-selection"
                            multiple
                            chips
                            placeholder="Select an option"
                            @blur="syncLanguages"
                            v-model="selectedLanguages"
                            item-text="label"
                            item-value="id"
                            :items="defaultLanguages"
                            label="Languages"
                            color="#001CE2"
                            outlined
                            hide-details="auto"
                    >
                        <button class="dropdown-icon icon" slot="append">
                            <svg-vue :icon="`dropdown-caret`"></svg-vue>
                        </button>
                    </v-select>
                </div>
                <div class="profile-input-field input-field--hometown input-field--group-2">
                    <v-text-field
                            class="resume-builder__input profile-input"
                            label="Hometown"
                            v-model="personalInfo.hometown"
                            :class="{'resume-builder__input--disabled': false, 'half-opacity' : ! personalInfo.is_hometown_active}"
                            :error="!!errors.hometown"
                            :error-messages="errors.hometown"
                            hide-details="auto"
                            outlined
                            @blur="applyEdit('auto')"
                    >
                        <button
                                class=" trigger-icon icon mt-custom6"
                                :class="{'icon--disabled': false}"
                                slot="append"
                                @click="updateVisibility('hometown')"
                        >
                            <svg-vue :icon="`eye-icon`" class="profile-eye-icon"
                                     :class="{'visible' : personalInfo.is_hometown_active}"></svg-vue>
                        </button>
                    </v-text-field>
                </div>

                <div class="profile-input-field input-field--about input-field--group-3">
                    <v-textarea
                            class="resume-builder__input profile-input civie-textarea"
                            color="#001CE2"
                            :class="{'resume-builder__input--disabled': false, 'half-opacity' : ! personalInfo.is_about_active}"
                            :disabled="false"
                            v-model="personalInfo.about"
                            label="About Me"
                            hide-details="auto"
                            outlined
                            @blur="applyEdit('auto')"
                    >
                        <button class=" trigger-icon" :class="{'icon--disabled': false}" slot="append" @click="updateVisibility('about')">
                            <svg-vue :icon="`eye-icon`" class="profile-eye-icon"
                                     :class="{'visible' : personalInfo.is_about_active}"></svg-vue>
                        </button>
                    </v-textarea>
                </div>

                <div class="profile-input-field input-field--overview input-field--group-3">
                    <v-textarea
                            class="resume-builder__input profile-input civie-textarea"
                            color="#001CE2"
                            :class="{'resume-builder__input--disabled': false, 'half-opacity' : ! personalInfo.is_overview_active}"
                            :disabled="false"
                            v-model="personalInfo.overview"
                            label="Overview Summary"
                            hide-details="auto"
                            outlined
                            @blur="applyEdit('auto')"
                    >
                        <button class=" trigger-icon" :class="{'icon--disabled': false}" slot="append" @click="updateVisibility('overview')">
                            <svg-vue :icon="`eye-icon`" class="profile-eye-icon"
                                     :class="{'visible' : personalInfo.is_overview_active}"></svg-vue>
                        </button>
                    </v-textarea>
                </div>

                <div class="profile-input-field input-field--quote input-field--group-3">
                    <v-textarea
                            class="resume-builder__input profile-input civie-textarea"
                            color="#001CE2"
                            :class="{'resume-builder__input--disabled': false, 'half-opacity' : ! personalInfo.is_quote_active}"
                            :disabled="false"
                            label="Quote"
                            v-model="personalInfo.quote"
                            hide-details="auto"
                            outlined
                            @blur="applyEdit('auto')"
                    >
                        <button class=" trigger-icon" :class="{'icon--disabled': false}" slot="append"   @click="updateVisibility('quote')">
                            <svg-vue :icon="`eye-icon`" class="profile-eye-icon"
                                     :class="{'visible' : personalInfo.is_quote_active}"></svg-vue>
                        </button>
                    </v-textarea>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Personal",
        data(vm) {
            return {
                errors: {},
                tempPic: "",
                profile_pic_error: "",
                savingType: "manual",
                menu: false,
                defaultLanguages: [],
                selectedLanguages: []
            };
        },
        computed: {
            personalInfo() {
                return this.$store.state.user.personal_info;
            },
            languages() {
                return this.$store.state.user.languages.map(a => a.id);
            },
            user() {
                return this.$store.state.user;
            }
        },

        methods: {
            // date functions
            saveDate() {
                this.$refs.menu.save(this.personalInfo.date_of_birth);
                this.applyEdit("auto");
            },
            updateVisibility(field_name){
                this.personalInfo['is_' + field_name + '_active'] = !this.personalInfo['is_' + field_name + '_active'];
                this.applyEdit("auto");
            },

            syncLanguages() {
                axios
                    .post("/api/user/languages-sync", {
                        IDs: this.selectedLanguages,
                        user_id: this.user.id
                    })
                    .then(() => {
                        this.$store.dispatch("flyingNotification");
                    })
                    .catch(e => {
                        this.$store.dispatch("flyingNotification", {
                            message: "Error",
                            iconSrc: "/images/resume_builder/error.png"
                        });
                    });
            },
            applyEdit(savingType) {
                let formData = new FormData();
                formData.append("_method", "put");
                formData.append("user_id", this.user.id);

                $.each(this.personalInfo, field => {
                    if (this.personalInfo[field] !== null) {
                        if (field !== "email" && this.personalInfo[field].length) {
                            formData.append(field, this.personalInfo[field]);
                        }
                        if (field === "profile_pic") {
                            formData.append(field, this.personalInfo[field]);
                        }
                    }
                });

                this.errors = {};

                axios.post("/api/user/personal-info", formData, {
                        headers: {"Content-Type": "multipart/form-data"}
                    })
                    .then(response => {
                        if (savingType === "manual") {
                            this.$store.dispatch("flyingNotification");
                        } else {
                            this.$store.dispatch("flyingNotification");
                        }
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
                    this.applyEdit("auto");
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
            },
            setUserPreSelectedLanguages() {
                if (this.$store.state.user.languages) {
                    this.selectedLanguages = this.$store.state.user.languages.map(a => a.id);
                }
            }
        },
        mounted() {
            axios
                .get("/api/user/languages-list")
                .then(response => {
                    this.defaultLanguages = response.data.data;
                    this.defaultLanguages.sort((a, b) => (a.label > b.label) * 2 - 1);
                })
                .then(() => {
                    this.setUserPreSelectedLanguages();
                });
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

                .profile-picture {
                    padding-top: 13px;
                    padding-bottom: 15px;

                    .profile-label {
                        .picture-preview {
                            position: relative;
                            overflow: hidden;
                            height: 120px;
                            width: 120px;
                            background-color: #f2f3fd;
                            background-size: cover;
                            background-position: center;
                            background-repeat: no-repeat;
                            border-radius: 100px;

                            .preview-cover {
                                position: absolute;
                                bottom: 0;
                                left: 0;
                                width: 100%;
                                height: 50px;
                                margin-bottom: 0;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                transition: background-color 0.3s;

                                svg {
                                    opacity: 0;
                                    transition: opacity 0.3s;
                                }
                            }

                            input[type="file"] {
                                height: 0;
                                width: 0;
                            }
                        }

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
                            grid-column-start: 1;
                            grid-column-end: 2;

                            &.input-field--firstname {
                                grid-row-start: 2;
                                grid-row-end: 3;
                            }

                            &.input-field--lastname {
                                grid-row-start: 3;
                                grid-row-end: 4;
                            }

                            &.input-field--current-location {
                                grid-row-start: 4;
                                grid-row-end: 5;
                            }

                            &.input-field--date-of-birth {
                                grid-row-start: 5;
                                grid-row-end: 6;
                            }

                            &.input-field--job-title {
                                grid-row-start: 6;
                                grid-row-end: 7;
                            }

                            &.input-field--nationality {
                                grid-row-start: 7;
                                grid-row-end: 8;
                            }
                        }

                        &.input-field--group-2 {
                            grid-column-start: 2;
                            grid-column-end: 3;

                            &.input-field--languages {
                                grid-row-start: 6;
                                grid-row-end: 7;
                            }

                            &.input-field--hometown {
                                grid-row-start: 7;
                                grid-row-end: 8;
                            }
                        }

                        &.input-field--group-3 {
                            grid-column-start: 2;
                            grid-column-end: 3;

                            &.input-field--about {
                                grid-row-start: 1;
                                grid-row-end: 2;
                            }

                            &.input-field--overview {
                                grid-row-start: 2;
                                grid-row-end: 4;
                            }

                            &.input-field--quote {
                                grid-row-start: 4;
                                grid-row-end: 6;
                            }
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
                                grid-column-start: 2;
                                grid-column-end: 3;
                            }

                            &.input-field--lastname {
                                grid-row-start: 1;
                                grid-row-end: 2;
                                grid-column-start: 3;
                                grid-column-end: 4;
                            }

                            &.input-field--current-location {
                                grid-row-start: 1;
                                grid-row-end: 2;
                                grid-column-start: 4;
                                grid-column-end: 5;
                            }

                            &.input-field--date-of-birth {
                                grid-row-start: 2;
                                grid-row-end: 3;
                                grid-column-start: 2;
                                grid-column-end: 3;
                            }

                            &.input-field--job-title {
                                grid-row-start: 2;
                                grid-row-end: 3;
                                grid-column-start: 3;
                                grid-column-end: 4;
                            }

                            &.input-field--nationality {
                                grid-row-start: 2;
                                grid-row-end: 3;
                                grid-column-start: 4;
                                grid-column-end: 5;
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
        &.input-field--about .v-input__control {
            height: 159px;
        }

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
</style>
