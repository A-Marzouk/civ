<template>
    <div class="container">

        <div class="main-steps">
            <div class="title">
                Each user has personal info object that can be updated.
            </div>
            <div class="steps">
                <div>
                    Note that to update user's personal info use the method PUT. <small>(Example included)</small>
                </div>
                <div>
                    <div class="mb-2">
                        Fields that can be updated in Personal info object :
                    </div>
                    <code class="p-4">
personal_info_contains = [
    'full_name','email','designation','profile_pic','location', 'phone','about'
];
                    </code>
                </div>
            </div>
        </div>

        <v-card class="mx-auto mb-5" max-width="95%" outlined>
            <v-list-item three-line>
                <v-list-item-content>
                    <div class="overline mb-4">Update User's personal info | <b>Example request</b> | Javascript</div>
                    <v-list-item-title class="headline mb-1 mb-3"> PUT: api/user/personal-info </v-list-item-title>
                    <v-list-item-subtitle class="d-flex flex-column">

                        Headers:

                        <code class="mb-5 prettyprint lang-js p-4">
{{headers_after_auth}}
                        </code>

                        Request data:

                        <code class="prettyprint p-4 mb-5 lang-js code">
axios.put('/api/user/personal-info',
    {

    }
);
                        </code>

                        <div class="overline mb-4 mt-5"><b>Example response</b> | JSON</div>

                        <code class="prettyprint p-4 lang-js">
{

}
                        </code>

                        <div class="overline mb-4 mt-5"><b>Example ERROR response</b> | JSON</div>


                        <code class="prettyprint p-4 lang-js">
{
    "error": ""
}
                        </code>


                    </v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>
        </v-card>

        <hr>

    </div>
</template>

<script>
    export default {
        name: "PersonalInfo",
        data() {
            return {
                headers_after_auth: "{ " +
                    "'Accept':'application/json'," +
                    "'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhb.....'" +
                    "}" +
                    "\n" +
                    "  ",
                headers_before_auth: "{ " +
                    "'Accept':'application/json'" +
                    "}" +
                    "\n" +
                    "  ",
            }
        }
    }
</script>

<style scoped>

</style>
