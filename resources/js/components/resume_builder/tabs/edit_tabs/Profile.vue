<template>
    <div class="profile-tab-upper" v-if="personalInfo" data-app>


        <div class="profile-pic-row" v-if="personalInfo">
            <div class="profile-pic" @click="clickUploadInput">
                <img :src="personalInfo.profile_pic" alt/>
            </div>
        </div>

        <div class="error" v-if="profile_pic_error">{{profile_pic_error}}</div>
        <input
                type="file"
                ref="profile_picture"
                id="profile_picture"
                style="width: 1px; height: 1px; opacity: 0; right:145%;"
                @change="handleProfilePictureUpload"
        />

        <v-text-field
                class="resume-builder__input"
                label="First Name"
                v-model="personalInfo.first_name"
                :outlined="true"
                :class="{'resume-builder__input--disabled': false}"
                :error="!!errors.first_name"
                @blur="applyEdit('auto')"
        ></v-text-field>


        <v-text-field
                class="resume-builder__input"
                label="Last Name"
                v-model="personalInfo.last_name"
                :outlined="true"
                :class="{'resume-builder__input--disabled': false}"
                :error="!!errors.last_name"
                @blur="applyEdit('auto')"
        ></v-text-field>


        <v-text-field
                class="resume-builder__input"
                label="Current Location"
                v-model="personalInfo.location"
                :outlined="true"
                :class="{'resume-builder__input--disabled': false}"
                :error="!!errors.location"
                @blur="applyEdit('auto')"
        >
            <button
                    class="eye-icon trigger-icon icon"
                    :class="{'icon--disabled': false}"
                    slot="append"
                    @click=""
            >
                <svg-vue
                        :icon="`eye-icon`"
                ></svg-vue>
            </button>
        </v-text-field>

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
                        class="resume-builder__input civie-datepicker"
                        label="Date"
                        color="#001CE2"
                        readonly
                        v-on="on"
                        outlined
                        placeholder="yyyy-mm-dd"
                >
                    <button
                            class="dropdown-icon icon"
                            slot="append"
                            @click="menu = true"
                    >
                        <svg-vue
                                :icon="`dropdown-caret`"
                        ></svg-vue>
                    </button>
                </v-text-field>
            </template>
            <v-date-picker v-model="personalInfo.date_of_birth" no-title scrollable color="#001CE2">
                <v-spacer></v-spacer>
                <v-btn text color="primary" @click="menu = false">Cancel</v-btn>
                <v-btn text color="primary" @click="saveDate">OK</v-btn>
            </v-date-picker>
        </v-menu>


        <v-text-field
                class="resume-builder__input"
                label="Job Title"
                v-model="personalInfo.designation"
                :outlined="true"
                :class="{'resume-builder__input--disabled': false}"
                :error="!!errors.designation"
                @blur="applyEdit('auto')"
        ></v-text-field>


        <v-select
                class="resume-builder__input civie-select"
                outlined
                placeholder="Select an option"
                :items="languageItems"
                label="Languages"
                color="#001CE2"
        >
            <button
                    class="dropdown-icon icon"
                    slot="append"
            >
                <svg-vue
                        :icon="`dropdown-caret`"
                ></svg-vue>
            </button>
        </v-select>


        <v-text-field
                class="resume-builder__input"
                label="Hometown"
                v-model="personalInfo.hometown"
                :outlined="true"
                :class="{'resume-builder__input--disabled': false}"
                :error="!!errors.hometown"
                @blur="applyEdit('auto')"
        >
            <button
                    class="eye-icon trigger-icon icon"
                    :class="{'icon--disabled': false}"
                    slot="append"
                    @click=""
            >
                <svg-vue
                        :icon="`eye-icon`"
                ></svg-vue>
            </button>
        </v-text-field>


        <v-text-field
                class="resume-builder__input"
                label="Nationality"
                v-model="personalInfo.nationality"
                :outlined="true"
                :class="{'resume-builder__input--disabled': false}"
                :error="!!errors.nationality"
                @blur="applyEdit('auto')"
        >
            <button
                    class="eye-icon trigger-icon icon"
                    :class="{'icon--disabled': false}"
                    slot="append"
                    @click=""
            >
                <svg-vue
                        :icon="`eye-icon`"
                ></svg-vue>
            </button>
        </v-text-field>


        <v-textarea
                class="resume-builder__input civie-textarea"
                outlined
                color="#001CE2"
                :class="{'resume-builder__input--disabled': false}"
                :disabled="false"
                v-model="personalInfo.about"
                label="About Me"
                @blur="applyEdit('auto')"
        >
            <button
                    class="eye-icon trigger-icon"
                    :class="{'icon--disabled': false}"
                    slot="append"
            >
                <svg-vue
                        :icon="`eye-icon`"
                ></svg-vue>
            </button>
        </v-textarea>

        <v-textarea
                class="resume-builder__input civie-textarea"
                outlined
                color="#001CE2"
                :class="{'resume-builder__input--disabled': false}"
                :disabled="false"
                v-model="summary.overview"
                label="Overview Summary"
                @blur="applyEdit('auto')"
        >
            <button
                    class="eye-icon trigger-icon"
                    :class="{'icon--disabled': false}"
                    slot="append"
            >
                <svg-vue
                        :icon="`eye-icon`"
                ></svg-vue>
            </button>
        </v-textarea>

        <v-textarea
                class="resume-builder__input civie-textarea"
                outlined
                color="#001CE2"
                :class="{'resume-builder__input--disabled': false}"
                :disabled="false"
                label="Quote"
                v-model="personalInfo.quote"
                @blur="applyEdit('auto')"
        >
            <button
                    class="eye-icon trigger-icon"
                    :class="{'icon--disabled': false}"
                    slot="append"
            >
                <svg-vue
                        :icon="`eye-icon`"
                ></svg-vue>
            </button>
        </v-textarea>

    </div>
</template>

<script>

    export default {
        name: "Personal",
        data(vm) {
            return {
                errors: {},
                tempPic: '',
                profile_pic_error: '',
                savingType: 'manual',
                menu: false,
                languageItems: [
                    {
                        text: 'English',
                        value: 'english'
                    }
                ]
            }
        },
        computed: {
            personalInfo() {
                return this.$store.state.user.personal_info;
            },
            summary() {
                return this.$store.state.user.summary;
            },
            user() {
                return this.$store.state.user;
            },

        },
        methods: {
            // date functions
            saveDate() {
                this.$refs.menu.save(this.personalInfo.date_of_birth);
                this.applyEdit('auto');
            },
            // date functions end
            manualSave() {
                this.applyEdit('manual');
            },
            applyEdit(savingType) {
                let formData = new FormData();
                formData.append("_method", "put");
                formData.append("user_id", this.user.id);

                $.each(this.personalInfo, (field) => {
                    if (this.personalInfo[field] !== null) {
                        if (field !== 'email' && this.personalInfo[field].length) {
                            formData.append(field, this.personalInfo[field]);
                        }
                        if (field === 'profile_pic') {
                            formData.append(field, this.personalInfo[field]);
                        }
                    }
                });

                this.errors = {};

                axios.post('/api/user/personal-info', formData, {headers: {'Content-Type': 'multipart/form-data'}})
                    .then((response) => {
                        console.log(response.data);
                        if (savingType === 'manual') {
                            this.$store.dispatch('fullScreenNotification');
                        } else {
                            this.$store.dispatch('flyingNotification');
                        }
                        this.personalInfo.profile_pic = response.data.data.profile_pic;
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            console.log(error.response.data.errors);
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
            handleProfilePictureUpload() {
                // validate uploaded file :
                let isValid = this.validateUploadedFile(this.$refs.profile_picture.files[0]);
                if (isValid) {
                    this.personalInfo.profile_pic = this.$refs.profile_picture.files[0];
                    this.tempPic = URL.createObjectURL(this.$refs.profile_picture.files[0]);
                    this.profile_pic_error = '';
                    this.applyEdit('auto');
                } else {
                    console.log('error in pic');
                    this.profile_pic_error = 'Incorrect file chosen!';
                }
            },
            validateUploadedFile(file) {
                let isValid = true;
                if (file.type.search('image') === -1) {
                    isValid = false;
                }
                if (file.size > 25000000) {
                    isValid = false;
                }
                return isValid;
            },
            clickUploadInput() {
                $('#profile_picture').click();
            },
            canEditEmail() {
                return !(this.user.instagram_id !== null && !this.isEmail(this.personalInfo.email));
            },
            isEmail(email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            },
        },
        mounted() {
        }
    }

</script>

<style lang="scss" scoped>

    .profile-tab-upper{
        .profile-pic-row-holder {
            height: 110px;
            width: 25%;
            background: whitesmoke;
        }
        .profile-pic-row {
            display: flex;
            align-items: center;

            .profile-pic {
                img {
                    width: 120px;
                    height: 120px;
                    border-radius: 50%;
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

    .input-margins{
        margin-left: 40px;
        margin-top: 20px;
    }


</style>

