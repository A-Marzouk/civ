<template>
    <div class="hold-edit" v-if="personalInfo">
        <img class="user-cover" :src="getProfilePicSrc()" id="profilePic" alt="">
        <div class="upload-section">
            <h5>Change profile photo</h5>
            <p>Only use images that are greater than 500 pixels in both height and width.</p>
            <div class="choose-photo-btn NoDecor">
                <a href="javascript:void(0)" @click="clickUploadInput">
                    <img src="/images/resume_builder/profile/icon-file.png" alt="">
                    Choose photo now
                </a>
                <input type="file" ref="profile_picture" id="profile_picture"
                       style="width: 1px; height: 1px; opacity: 0; right:145%;"
                       @change=handleProfilePictureUpload>
            </div>
            <div class="error" v-if="profile_pic_error">
                {{profile_pic_error}}
            </div>
        </div>
        <form class="form-edit_profile">
            <div class="input-field">
                <label for="fullname">My full-name</label>
                <input type="text" placeholder="" id="fullname" name="fullname" v-model="personalInfo.full_name">
                <div class="error" v-if="errors.full_name">
                    {{ Array.isArray(errors.full_name) ? errors.full_name[0] :
                    errors.full_name}}
                </div>
            </div>
            <div class="input-field">
                <label for="email">Email adress</label>
                <input type="email" id="email" placeholder="" name="email" v-model="personalInfo.email" :disabled="canEditEmail()">
                <div class="error" v-if="errors.email">
                    {{ Array.isArray(errors.email) ? errors.email[0] :
                    errors.email}}
                </div>
            </div>
            <div class="input-field">
                <label for="designation">Designation</label>
                <input type="text" id="designation" placeholder="" name="designation" v-model="personalInfo.designation">
                <div class="error" v-if="errors.designation">
                    {{ Array.isArray(errors.designation) ? errors.designation[0] :
                    errors.designation}}
                </div>
            </div>
            <div class="input-field">
                <label for="phone">Phone</label>
                <input type="tel" id="phone" placeholder="" name="phone" v-model="personalInfo.phone">
                <div class="error" v-if="errors.phone">
                    {{ Array.isArray(errors.phone) ? errors.phone[0] :
                    errors.phone}}
                </div>
            </div>
            <div class="input-field">
                <label for="aboutmyself">About myself <i class="hint-message">Maximum 80 words</i></label>
                <textarea name="aboutmyself"  id="aboutmyself" v-model="personalInfo.about"></textarea>
                <div class="error" v-if="errors.about">
                    {{ Array.isArray(errors.about) ? errors.about[0] :
                    errors.about}}
                </div>
            </div>
            <div class="actions">
                <a href="javascript:void(0)" @click="applyEdit" class="btn-blue"><img src="/images/resume_builder/profile/icon-save.png">Save all information</a>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name:"Personal",
    data(){
        return{
            errors:{},
            tempPic:'',
            profile_pic_error:''
        }
    },
    computed: {
        personalInfo() {
            return this.$store.state.user.personal_info;
        },
        user(){
            return this.$store.state.user;
        }
    },
    methods:{
        applyEdit() {
            let formData = new FormData();
            formData.append("_method", "put");
            $.each(this.personalInfo, (field) => {
                field !== 'email' ? formData.append(field, this.personalInfo[field]) : '' ;
            });

            this.errors={};

            axios.post('/api/user/personal-info',formData,{headers:{'Content-Type': 'multipart/form-data'}})
                .then((response) => {
                    console.log(response.data);
                })
                .catch((error) => {
                    if (typeof error.response.data === 'object') {
                        console.log(error.response.data.errors);
                        this.errors = error.response.data.errors;
                    } else {
                        this.errors = 'Something went wrong. Please try again.';
                    }
                });
        },
        handleProfilePictureUpload() {
            // validate uploaded file :
            let isValid = this.validateUploadedFile(this.$refs.profile_picture.files[0]);
            if(isValid){
                this.personalInfo.profile_pic = this.$refs.profile_picture.files[0];
                this.tempPic =  URL.createObjectURL(this.personalInfo.profile_pic) ;
                this.profile_pic_error = '';
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
            if(file.size > 250000){
                isValid = false;
            }
            return isValid;
        },
        clickUploadInput(){
            $('#profile_picture').click();
        },
        getProfilePicSrc(){
            if(this.tempPic.length > 0){
                return this.tempPic;
            }

            if (this.personalInfo.profile_pic !== null){
                if(this.personalInfo.profile_pic.search('uploads/pictures') !== -1){
                    return '/' + this.personalInfo.profile_pic
                }
            }

            return  '/images/resume_builder/profile/holder.jpg' ;

        },
        canEditEmail() {
            return !(this.user.instagram_id !== null && !this.isEmail(this.personalInfo.email));
        },
        isEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }
    }
}
</script>

<style scoped lang="scss">
    .input-field {
        input,textarea{
            color: black;
        }
    }

    .choose-photo-btn{
        a:hover{
            color:white;
        }
    }

    .hold-edit .user-cover {
        width: 144px;
        height: 144px;
    }

    .error {
        color: red;
        font-weight: 600;
        margin-left: 5px;
    }
</style>
