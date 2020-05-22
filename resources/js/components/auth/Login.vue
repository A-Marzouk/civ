<template>
    <v-app style="width:100%;" class="app-container">
        <!-- main container -->
        <v-container class="main-container" style="margin-top: 80px;">
            <login-form></login-form>
        </v-container>
    </v-app>
</template>

<script>
    import LoginForm from './partials/LoginForm'
    export default {
        name: "Login",
        components:{
            'login-form' : LoginForm
        },
    }
</script>
