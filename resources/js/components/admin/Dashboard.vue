<template>
    <div>
        Dashoboard of  the admin <br/>

        <a href="#" @click="logout">
            Logout
        </a>
    </div>
</template>

<script>
    export default {
        name: "Dashboard",
        methods:{
            logout(){
                axios.post('/logout').then((response) =>{
                        // remove access token from cookies:
                        Vue.$cookies.remove('access_token');
                        window.location.href = '/';
                    }
                )
            }
        }
    }
</script>

<style scoped>

</style>
