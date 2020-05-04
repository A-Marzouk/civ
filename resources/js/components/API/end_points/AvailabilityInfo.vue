<template>
    <div class="container">

        <div class="main-steps">
            <div class="title">
                {{current_endpoint}} | Each user has {{current_endpoint}} object that can be retrieved or updated.
            </div>
            <div class="steps">
                <div>
                    Note: allowed methods: GET & PUT <small>(Examples included)</small>
                </div>
                <div>
                    Note: Please make sure to include current user_id in your request data when updating user. <small>(Examples included)</small>
                </div>
                <div>
                    <div class="mb-2">
                        Fields that can be retrieved or updated in {{current_endpoint}} object : <small>(Examples included)</small>
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
                    <div class="overline mb-4">Retrieve {{current_endpoint}} of current user | <b>Example request</b> | Javascript</div>
                    <v-list-item-title class="headline mb-1 mb-3"> GET: api/user/{{current_endpoint_url}} </v-list-item-title>
                    <v-list-item-subtitle class="d-flex flex-column">

                        Headers:

                        <code class="mb-5 prettyprint lang-js p-4">
                            {{headers_after_auth}}
                        </code>

                        Request example:

                        <code class="prettyprint p-4 mb-5 lang-js code">
                            axios.get('/api/user/{{current_endpoint_url}}');
                        </code>

                        <div class="overline mb-4 mt-5"><b>Example response</b> | JSON</div>

                        <code class="prettyprint p-4 lang-js">
                            {
                            "data": {
                            "id": 4,
                            "full_name": "Agent -11",
                            "email": "agent11@civ.ie",
                            "designation": null,
                            "profile_pic": "/images/resume_builder/profile/holder.png",
                            "phone": null,
                            "location": null,
                            "about": null,
                            "user_id": 4,
                            "created_at": "2020-05-03 12:38:43",
                            "updated_at": "2020-05-03 12:38:43"
                            },
                            "version": "1.0.0",
                            "author_url": "https://civ.ie"
                            }
                        </code>

                        <div class="overline mb-4 mt-5"><b>Example ERROR response</b> | JSON</div>


                        <code class="prettyprint p-4 lang-js">
                            {
                            "message": "Unauthenticated."
                            }
                        </code>


                    </v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>
        </v-card>

        <hr>

        <v-card class="mx-auto mt-5" max-width="95%" outlined>
            <v-list-item three-line>
                <v-list-item-content>
                    <div class="overline mb-4">Update User's {{current_endpoint}} | <b>Example request</b> | Javascript</div>
                    <v-list-item-title class="headline mb-1 mb-3"> PUT: api/user/{{current_endpoint_url}} </v-list-item-title>
                    <v-list-item-subtitle class="d-flex flex-column">

                        Headers:

                        <code class="mb-5 prettyprint lang-js p-4">
                            {{headers_after_auth}}
                        </code>

                        Request data:

                        <code class="prettyprint p-4 mb-5 lang-js code">
                            axios.put('/api/user/{{current_endpoint_url}}',
                            {
                            'full_name':'Updated user name',
                            'user_id': 4
                            }
                            );
                        </code>

                        <div class="overline mb-4 mt-5"><b>Example response</b> | JSON</div>

                        <code class="prettyprint p-4 lang-js">
                            {
                            "data": {
                            "id": 4,
                            "full_name": "Agent 4",
                            "email": "agent11@civ.ie",
                            "designation": null,
                            "profile_pic": "/images/resume_builder/profile/holder.png",
                            "phone": null,
                            "location": null,
                            "about": null,
                            "user_id": "4",
                            "created_at": "2020-05-03 12:38:43",
                            "updated_at": "2020-05-04 13:24:11"
                            },
                            "version": "1.0.0",
                            "author_url": "https://civ.ie"
                            }
                        </code>

                        <div class="overline mb-4 mt-5"><b>Example ERROR response</b> | JSON</div>


                        <code class="prettyprint p-4 lang-js">
                            {
                            "message": "Not Authenticated!"
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
        name: "AvailabilityInfo",
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
                current_endpoint: 'Availability Info',
                current_endpoint_single: 'Availability Info',
                current_endpoint_url: 'availability-info',
            }
        }
    }
</script>

<style scoped>

</style>
