<template>
    <div>
        <div class="hold-tab wrapp">
            <div class="input-field">
                <label for="location">Location</label>
                <input type="text" name="location" id="location">
            </div>
            <a href="javascript:void(0)" class="btn-blue"><img alt="location" src="/images/resume_builder/profile/icon-check.png">Save location</a>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{

            }
        },
        methods:{

        },
        computed: {
            location() {
                return this.$store.state.user;
            }
        },
    }
</script>
