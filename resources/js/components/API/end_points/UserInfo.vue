<template>
   <div class="container">
       Updated soon <br> Functions : [ change active theme | update user password ]
   </div>
</template>

<script>
    export default {
        name: "UserInfo",
        data() {
            return {
                headers_after_auth: "{ " +
                    "'Accept':'application/json', " +
                    " 'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhb.....'" +
                    " }" +
                    "\n" +
                    "  ",
                headers_before_auth: "{ " +
                    "'Accept':'application/json'" +
                    "}" +
                    "\n" +
                    "  ",
                current_endpoint: 'User Info',
                current_endpoint_single: 'User info',
                current_endpoint_url: 'user',
            }
        }
    }
</script>

<style scoped>

</style>
