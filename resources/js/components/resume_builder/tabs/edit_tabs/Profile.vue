<template>
    <div class="profile-tab-upper" v-if="personalInfo" data-app>


        <div class="d-flex">
            <div class="profile-pic-row-wrapper">
                <div class="label">
                    Photo
                </div>
                <div class="profile-pic-row" v-if="personalInfo">
                    <div class="profile-pic">
                        <img :src="personalInfo.profile_pic" alt/>
                        <div class="photo-cover" @click="clickUploadInput">
                            <img src="/images/resume_builder/camera-icon.png" alt="camera icon">
                        </div>
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
            </div>
            <div class="d-flex flex-wrap w-100">
                <v-text-field
                        class="resume-builder__input profile-input"
                        label="First Name"
                        v-model="personalInfo.first_name"
                        :outlined="true"
                        :class="{'resume-builder__input--disabled': false}"
                        :error="!!errors.first_name"
                        @blur="applyEdit('auto')"
                ></v-text-field>

                <v-text-field
                        class="resume-builder__input profile-input"
                        label="Last Name"
                        v-model="personalInfo.last_name"
                        :outlined="true"
                        :class="{'resume-builder__input--disabled': false}"
                        :error="!!errors.last_name"
                        @blur="applyEdit('auto')"
                ></v-text-field>

                <v-text-field
                        class="resume-builder__input profile-input"
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
                                class="resume-builder__input civie-datepicker profile-input"
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
                        class="resume-builder__input profile-input"
                        label="Job Title"
                        v-model="personalInfo.designation"
                        :outlined="true"
                        :class="{'resume-builder__input--disabled': false}"
                        :error="!!errors.designation"
                        @blur="applyEdit('auto')"
                ></v-text-field>

                <v-select
                        class="resume-builder__input  profile-input civie-select"
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
            </div>
        </div>

       <div class="d-flex">
          <div class="d-flex flex-column">
              <v-text-field
                      class="resume-builder__input profile-input"
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
                      class="resume-builder__input profile-input"
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
          </div>

          <div class="d-flex">
              <v-textarea
                      class="resume-builder__input profile-input civie-textarea"
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
                      class="resume-builder__input profile-input civie-textarea"
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
                      class="resume-builder__input profile-input civie-textarea"
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
       </div>

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

    .profile-tab-upper {

        background: #FFFFFF;
        box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1);
        margin-bottom: 70px;
        padding: 50px 0 35px 40px;

        .profile-input{
            max-width: 300px;
            min-width: 300px;
            margin-right:40px;
            margin-top:20px;
        }

        .profile-pic-row-holder {
            height: 110px;
            width: 25%;
            background: whitesmoke;
        }

        .profile-pic-row-wrapper{
            width:33%;
            .label{
                font-size: 16px;
                line-height: 18px;
                margin-bottom:12px;
                margin-top: -8px;
                color: #888DB1;
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

                .photo-cover{
                    &:hover{
                        cursor: pointer;
                    }
                    width: 120px;
                    height: 50px;
                    background: #001CE2;
                    opacity: 0.5;
                    position: absolute;
                    bottom: 0px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    img{
                        width:25px;
                        height:25px;
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


</style>

