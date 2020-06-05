<template>
    <div class="hold-edit" v-if="personalInfo"  data-app>
        <div class="profile-pic-row" v-if="personalInfo">
            <div class="profile-pic" @click="clickUploadInput">
                <img :src="personalInfo.profile_pic" alt />
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



        <div>

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
            ></v-text-field>

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



            <div class="input-field">
                <label for="phone">Phone</label>
                <input type="tel" id="phone" placeholder="" name="phone" v-model="personalInfo.phone" @blur="applyEdit('auto')">
                <div class="error" v-if="errors.phone">
                    {{ Array.isArray(errors.phone) ? errors.phone[0] :
                    errors.phone}}
                </div>
            </div>
            <div class="input-field">
                <label for="aboutmyself">About myself <i class="hint-message">Maximum 80 words</i></label>
                <textarea name="aboutmyself"  id="aboutmyself" v-model="personalInfo.about" @blur="applyEdit('auto')"></textarea>
                <div class="error" v-if="errors.about">
                    {{ Array.isArray(errors.about) ? errors.about[0] :
                    errors.about}}
                </div>
            </div>
            <div class="actions">
                <a href="javascript:void(0)" @click="manualSave" class="btn btn-filled"><img class='icon' src="/images/resume_builder/profile/icon-save.png">Save all information</a>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name:"Personal",
        data(vm){
            return{
                errors:{},
                tempPic:'',
                profile_pic_error:'',
                savingType: 'manual',
                menu: false
            }
        },
        computed: {
            personalInfo() {
                return this.$store.state.user.personal_info;
            },
            user(){
                return this.$store.state.user;
            },

        },
        methods:{
            // date functions
            saveDate(){
                this.$refs.menu.save(this.personalInfo.date_of_birth);
                this.applyEdit('auto');
            },
            // date functions end
            manualSave(){
                this.applyEdit('manual');
            },
            applyEdit(savingType) {
                let formData = new FormData();
                formData.append("_method", "put");
                formData.append("user_id", this.user.id);

                $.each(this.personalInfo, (field) => {
                    if(this.personalInfo[field] !== null){
                        if(field !== 'email' && this.personalInfo[field].length){
                            formData.append(field, this.personalInfo[field]);
                        }
                        if(field === 'profile_pic'){
                            formData.append(field,this.personalInfo[field]);
                        }
                    }
                });

                this.errors={};

                axios.post('/api/user/personal-info',formData,{headers:{'Content-Type': 'multipart/form-data'}})
                    .then((response) => {
                        console.log(response.data);
                        if(savingType === 'manual'){
                            this.$store.dispatch('fullScreenNotification');
                        }else{
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
                if(isValid){
                    this.personalInfo.profile_pic = this.$refs.profile_picture.files[0];
                    this.tempPic =  URL.createObjectURL(this.$refs.profile_picture.files[0]) ;
                    this.profile_pic_error = '';
                    this.applyEdit('auto');
                }else{
                    console.log('error in pic');
                    this.profile_pic_error = 'Incorrect file chosen!';
                }
            },
            validateUploadedFile(file){
                let isValid = true ;
                if(file.type.search('image') === -1){
                    isValid = false;
                }
                if(file.size > 25000000){
                    isValid = false;
                }
                return isValid;
            },
            clickUploadInput(){
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
</style>

