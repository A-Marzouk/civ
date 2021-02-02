<template>
    <div class="username-input-wrapper">
        <div class="username-input-group">
            <div class="username-input-field">
                <span class="fixed-text">civ.ie</span>
                <input type="text" v-model="username" @keyup="validateUsername">
                <img src="/images/homepage/correct_icon.png" alt="feedback icon" v-show="is_username_valid">
                <img src="/images/homepage/wrong_icon.png" alt="feedback icon"   v-show="!is_username_valid && is_username_valid !== null && username !== ''">
            </div>
            <div class="username-input-btn">
                <a href="#"> Start My Page</a>
            </div>
        </div>

        <div class="input-hint-text">
            Choose your resume page address... its free and easy to start
        </div>
    </div>

</template>

<script>
    export default {
        name: "UsernameInput",
        data(){
            return{
                username: '',
                validUserName: "",
                is_username_valid: null,
            }
        },
        methods:{
            validateUsername() {
                axios
                    .post("/validate-username", { username: this.username })
                    .then((response) => {
                        this.validUserName = this.username;
                        this.is_username_valid = true;
                    })
                    .catch((response) => {
                        this.validUserName = "";
                        this.is_username_valid = false;
                    });
            }
        }
    }
</script>

<style lang="scss" scoped>

    .username-input-wrapper{

        .user-input-group{

            .username-input-field{
                span.fixed-text{

                }
                input{

                }
                img{

                }
            }

            .username-input-btn{
                a{

                }
            }
        }

        .input-hint-text{

        }
    }
</style>