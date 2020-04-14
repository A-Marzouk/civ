<template>
    <div>
        <div class="hold-tab wrapp">
            <div class="input-field">
                <label for="location">Location</label>
                <input type="text" name="location" id="location" v-model="personalInfo.location" @blur="updateLocation('auto')">
                <div class="error" v-if="errors.location">
                    {{ Array.isArray(errors.location) ? errors.location[0] : errors.location}}
                </div>
            </div>
            <a href="javascript:void(0)" class="btn btn-filled" @click="updateLocation('manual')">
                <img class='icon' alt="location" src="/images/resume_builder/profile/icon-check.png" >
                Save location
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                errors:{}
            }
        },
        methods:{
            updateLocation(savingType){
                axios.put('/api/user/personal-info/location',{location : this.personalInfo.location, user_id:this.$store.state.user.id})
                    .then((response) => {
                        savingType === 'manual' ? this.$store.dispatch('fullScreenNotification') :  this.$store.dispatch('flyingNotification')
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
            }
        },
        computed: {
            personalInfo() {
                return this.$store.state.user.personal_info;
            }
        },
    }
</script>
