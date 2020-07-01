<template>
    <div class="container">

        <div class="main-steps">
            <div class="title">
                {{current_endpoint}}
            </div>
            <div class="steps">
                <div>
                    Note: allowed methods: GET, POST, PUT & DELETE <small>(Examples included)</small>
                </div>
                <div>
                    Note: Please make sure to include current user_id in your request data when sending any POST or PUT request. <small>(Examples included)</small>
                </div>
                <div>
                    <div class="mb-2">
                        Fields of {{current_endpoint_single}} object :
                    </div>
                    <code class="p-4">
Object_contains = [
    'is_public','institution_type','university_name','degree_title','date_from','date_to','present','user_id','website','description','category','order','location'
];
                    </code>
                </div>
            </div>
        </div>

        <v-card class="mx-auto mb-5" max-width="95%" outlined>
            <v-list-item three-line>
                <v-list-item-content>
                    <div class="overline mb-4">Retrieve {{current_endpoint}} | <b>Example request</b> | Javascript</div>
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
    "data":
        [
            {
                "id": 1,
                "institution_type": "Ut et nobis ut.",
                "university_name": "Ut neque ex a occaecati.",
                "degree_title": "Vel quisquam sed ad.",
                "website": null,
                "location": null,
                "category": null,
                "description": null,
                "date_from": "1985-11-29",
                "date_to": "1994-11-04",
                "present": 1,
                "is_public": 1,
                "order": 1,
                "user_id": 2,
                "created_at": "2020-06-28T18:07:08.000000Z",
                "updated_at": "2020-06-28T18:07:08.000000Z"
            },
            ...
        ],
        "links": {
            "first": "http://local.civ.mine/api/user/education?page=1",
            "last": "http://local.civ.mine/api/user/education?page=1",
            "prev": null,
            "next": null
        },
        "meta": {
            "current_page": 1,
            "from": 1,
            "last_page": 1,
            "path": "http://local.civ.mine/api/user/education",
            "per_page": 5,
            "to": 3,
            "total": 3
    }
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
                    <div class="overline mb-4">Create {{current_endpoint}} record | <b>Example request</b> | Javascript</div>
                    <v-list-item-title class="headline mb-1 mb-3"> POST: api/user/{{current_endpoint_url}} </v-list-item-title>
                    <v-list-item-subtitle class="d-flex flex-column">

                        Headers:

                        <code class="mb-5 prettyprint lang-js p-4">
{{headers_after_auth}}
                        </code>

                        Request data:

                        <code class="prettyprint p-4 mb-5 lang-js code">
axios.post('/api/user/{{current_endpoint_url}}',
    {
        institution_type:University,
        university_name:new university,
        degree_title:Bachelor,
        date_from:2005-10-11,
        date_to:,
        present:1,
        order:1,
        category:Online,
        location:Ukraine,
        user_id:2

    }
);
                        </code>

                        <div class="overline mb-4 mt-5"><b>Example response</b> | JSON</div>

                        <code class="prettyprint p-4 lang-js">
{
    "data": {
        "user_id": "2",
        "institution_type": "University",
        "university_name": "new university",
        "degree_title": "Bachelor",
        "date_from": "2005-10-11",
        "date_to": null,
        "present": "1",
        "order": "1",
        "category": "Online",
        "location": "Ukraine",
        "updated_at": "2020-06-30T08:05:35.000000Z",
        "created_at": "2020-06-30T08:05:35.000000Z",
        "id": 4
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

                        <code class="prettyprint p-4 lang-js">
{
    "message": "The given data was invalid.",
    "errors": {
        "date_from": [
            "The date from is not a valid date."
        ]
    }
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
                    <div class="overline mb-4">Update {{current_endpoint}} record | <b>Example request</b> | Javascript</div>
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
        id:4, // id of the edited record
        university_name: Updated name
        user_id: 4
    }
);
                        </code>

                        <div class="overline mb-4 mt-5"><b>Example response</b> | JSON</div>

                        <code class="prettyprint p-4 lang-js">
{
    "data": {
        "id": 4,
        "institution_type": "Ipsa officia ea eum hic.",
        "university_name": "UPDATED - university",
        "degree_title": "Ut aut qui ea magni.",
        "website": null,
        "location": null,
        "category": null,
        "description": null,
        "date_from": "2020-06-06",
        "date_to": "1988-04-13",
        "present": 0,
        "is_public": 1,
        "order": 1,
        "user_id": "2",
        "created_at": "2020-06-28T18:07:08.000000Z",
        "updated_at": "2020-06-30T08:09:47.000000Z"
    },
    "version": "1.0.0",
    "author_url": "https://civ.ie"
}
                        </code>

                        <div class="overline mb-4 mt-5"><b>Example ERROR response</b> | JSON</div>


                        <code class="prettyprint p-4 lang-js">
        // Wrong Model ID sent
{
    "message": "No query results for model [App\\Education] 5",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    .....
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
                    <div class="overline mb-4">Delete {{current_endpoint}} record | <b>Example request</b> | Javascript</div>
                    <v-list-item-title class="headline mb-1 mb-3"> DELETE: api/user/{{current_endpoint_url}}/{id} </v-list-item-title>
                    <v-list-item-subtitle class="d-flex flex-column">

                        Headers:

                        <code class="mb-5 prettyprint lang-js p-4">
{{headers_after_auth}}
                        </code>

                        Request data:

                        <code class="prettyprint p-4 mb-5 lang-js code">
axios.delete('/api/user/{{current_endpoint_url}}/' + {{current_endpoint_single}}.id)
                        </code>

                        <div class="overline mb-4 mt-5"><b>Example response</b> | JSON | ID of the deleted record</div>

                        <code class="prettyprint p-4 lang-js">
{
    "data": {
        "id": 5
    }
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


    </div>
</template>


<script>
    export default {
        name: "Education",
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
                current_endpoint: 'Education',
                current_endpoint_single: 'education',
                current_endpoint_url: 'education',
            }
        }
    }
</script>

<style scoped>

</style>
