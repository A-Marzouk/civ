<template>
    <div>
        <div class="hold-tab wrapp">
            <div class="input-field">
                <label for="location">Location</label>
                <input type="text" name="location" id="location" v-model="personalInfo.location">
                <div class="error" v-if="errors.location">
                    {{ Array.isArray(errors.location) ? errors.location[0] : errors.location}}
                </div>
            </div>
            <a href="javascript:void(0)" class="btn-blue" @click="updateLocation">
                <img alt="location" src="/images/resume_builder/profile/icon-check.png" >
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
            updateLocation(){
                axios.put('/api/user/personal-info/location',{location : this.personalInfo.location})
                    .then((response) => {
                        this.$store.dispatch('fullScreenNotification');
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = 'Something went wrong. Please try again.';
                        }
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
