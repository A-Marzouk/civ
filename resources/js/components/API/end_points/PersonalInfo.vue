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
        'first_name', 'last_name', 'email', 'designation', 'user_id', 'profile_pic', 'nationality', 'is_nationality_active', 'quote', 'is_quote_active', 'hometown', 'is_hometown_active', 'date_of_birth',
        'is_date_of_birth_active', 'location', 'is_location_active', 'phone', 'is_phone_active', 'about', 'is_about_active', 'overview', 'is_overview_active'
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
        "id": 2,
        "first_name": "Civ Agent",
        "last_name": null,
        "email": "agent@civ.ie",
        "designation": null,
        "profile_pic": "/images/resume_builder/profile/holder.png",
        "phone": null,
        "is_phone_active": 1,
        "nationality": null,
        "is_nationality_active": 1,
        "quote": null,
        "is_quote_active": 1,
        "hometown": null,
        "is_hometown_active": 1,
        "date_of_birth": null,
        "is_date_of_birth_active": 1,
        "location": null,
        "is_location_active": 1,
        "about": null,
        "is_about_active": 1,
        "overview": null,
        "is_overview_active": 1,
        "user_id": 2,
        "created_at": "2020-06-28T18:07:08.000000Z",
        "updated_at": "2020-06-28T18:07:08.000000Z",
        "full_name": "Civ Agent "
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

                        Please not that when updating profile picture you need to add this to your header:
                        <code class="mb-5 prettyprint lang-js p-4">
'Content-Type': 'multipart/form-data'
                        </code>

                        Request data:

                        <code class="prettyprint p-4 mb-5 lang-js code">
axios.put('/api/user/{{current_endpoint_url}}',
    {
        'first_name':'Updated AGENT API',
        'last_name':'CIV',
        'user_id': 4
    }
);
                        </code>

                        <div class="overline mb-4 mt-5"><b>Example response</b> | JSON</div>

                        <code class="prettyprint p-4 lang-js">
{
    "data": {
        "id": 2,
        "first_name": "Updated AGENT API",
        "last_name": CIV,
        "email": "agent@civ.ie",
        "designation": "PHP developer",
        "profile_pic": "/images/resume_builder/profile/holder.png",
        "phone": null,
        "is_phone_active": 1,
        "nationality": null,
        "is_nationality_active": 1,
        "quote": null,
        "is_quote_active": 1,
        "hometown": null,
        "is_hometown_active": 1,
        "date_of_birth": null,
        "is_date_of_birth_active": 1,
        "location": null,
        "is_location_active": 1,
        "about": null,
        "is_about_active": 1,
        "overview": null,
        "is_overview_active": 1,
        "user_id": "2",
        "created_at": "2020-06-28T18:07:08.000000Z",
        "updated_at": "2020-06-30T06:59:46.000000Z",
        "full_name": "Updated AGENT API CIV"
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
        name: "PersonalInfo",
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
                current_endpoint: 'Personal Info',
                current_endpoint_single: 'personal info',
                current_endpoint_url: 'personal-info',
            }
        }
    }
</script>

<style scoped>

</style>
