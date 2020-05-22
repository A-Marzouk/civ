<template>
    <v-app style="width:100%;" class="app-container">
        <!-- main container -->
        <v-container class="main-container">
            <register-form></register-form>
        </v-container>
    </v-app>
</template>

<script>
    import RegisterForm from './partials/RegisterForm'
    export default {
        name: "Register",
        components:{
            'register-form' : RegisterForm
        },
    }
</script>
