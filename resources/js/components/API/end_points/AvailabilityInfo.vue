<template>
    <div class="container">

        <div class="main-steps">
            <div class="title">
                {{current_endpoint}} | Each user by default has 3 {{current_endpoint}} records that can be retrieved or updated,<br/>
                These 3 records are providing information about the {{current_endpoint}} with different frequencies ( Yearly, Monthly and Weekly ).
                <small class="NoDecor">Please check the <a href="#example-response">example response</a></small>
            </div>
            <div class="steps">
                <div>
                    Note: allowed methods: GET & PUT <small>(Examples included)</small>
                </div>
                <div>
                    Note: Please make sure to include current user_id in your request data when making PUT request. <small>(Examples included)</small>
                </div>
                <div>
                    <div class="mb-2">
                        Fields that can be retrieved or updated in {{current_endpoint}} object : <small>(Examples included)</small>
                    </div>
                    <code class="p-4">
{{current_endpoint_url}}_contains = [
    'available_hours', 'available_hours_frequency', 'user_id'
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

                        <code class="mb-5 prettyprint lang-js p-4" id="example-response">
{{headers_after_auth}}
                        </code>

                        Request example:

                        <code class="prettyprint p-4 mb-5 lang-js code">
axios.get('/api/user/{{current_endpoint_url}}');
                        </code>

                        <div class="overline mb-4 mt-5"><b>Example response</b> | JSON</div>

                        <code class="prettyprint p-4 lang-js">
{
    "data": [
        {
            "id": 10,
            "available_hours": 40,
            "available_hours_frequency": "weekly",
            "user_id": 4,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 11,
            "available_hours": 400,
            "available_hours_frequency": "monthly",
            "user_id": 4,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 12,
            "available_hours": 4000,
            "available_hours_frequency": "yearly",
            "user_id": 4,
            "created_at": null,
            "updated_at": null
        }
    ],
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
        id:10 // id of the {{current_endpoint_single}} record
        available_hours: 10,
        user_id: 4
    }
);
                        </code>

                        <div class="overline mb-4 mt-5"><b>Example response</b> | JSON</div>

                        <code class="prettyprint p-4 lang-js">
{
    "data": {
        "id": 10,
        "available_hours": "10",
        "available_hours_frequency": "weekly",
        "user_id": "4",
        "created_at": null,
        "updated_at": "2020-05-05 08:03:44"
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
