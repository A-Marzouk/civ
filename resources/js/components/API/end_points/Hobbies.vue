<template>
    <div class="container">

        <div class="main-steps">
            <div class="title">
                {{current_endpoint}}
            </div>
            <div class="steps">
                <div>
                    Note: allowed methods: GET, POST & DELETE <small>(Examples included)</small>
                </div>
                <div>
                    Note: Please make sure to include current user_id in your request data when sending any POST request. <small>(Examples included)</small>
                </div>
                <div>
                    <div class="mb-2">
                        Fields of {{current_endpoint_single}} object :
                    </div>
                    <code class="p-4">
Object_contains = [
     'title','category','user_id','order','is_public'
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
    "data": [
        {
            "id": 1,
            "title": "Id a et in.",
            "category": "Sports",
            "is_public": 1,
            "order": 1,
            "user_id": 2,
            "created_at": "2020-06-28T18:07:08.000000Z",
            "updated_at": "2020-06-28T18:07:08.000000Z"
        },
        {
            "id": 2,
            "title": "Hic deleniti quis ea in.",
            "category": "Sports",
            "is_public": 1,
            "order": 1,
            "user_id": 2,
            "created_at": "2020-06-28T18:07:08.000000Z",
            "updated_at": "2020-06-28T18:07:08.000000Z"
        },
        ....
    ],
    "links": {
        "first": "http://local.civ.mine/api/user/hobbies?page=1",
        "last": "http://local.civ.mine/api/user/hobbies?page=2",
        "prev": null,
        "next": "http://local.civ.mine/api/user/hobbies?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 2,
        "path": "http://local.civ.mine/api/user/hobbies",
        "per_page": 5,
        "to": 5,
        "total": 10
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
        title: "Football",
        category: "Sport",
        order: 1,
        is_public: 1,
        user_id: 4
    }
);
                        </code>

                        <div class="overline mb-4 mt-5"><b>Example response</b> | JSON</div>

                        <code class="prettyprint p-4 lang-js">
{
    "data": {
        "user_id": "2",
        "title": "Football",
        "category": "Sport",
        "order": "1",
        "is_public": "1",
        "updated_at": "2020-06-30T09:01:58.000000Z",
        "created_at": "2020-06-30T09:01:58.000000Z",
        "id": 11
    },
    "version": "1.0.0",
    "author_url": "https://civ.ie"
}
                        </code>

                        <div class="overline mb-4 mt-5"><b>Example ERROR response</b> | JSON</div>


                        <code class="prettyprint p-4 lang-js">
{
    "message": "The given data was invalid.",
    "errors": {
        "title": [
            "The title field is required."
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
        id:11,
        user_id:2,
        title:Football - UPDATED
    }
);
                        </code>

                        <div class="overline mb-4 mt-5"><b>Example response</b> | JSON</div>

                        <code class="prettyprint p-4 lang-js">
{
    "data": {
        "id": 11,
        "title": "Football - UPDATED",
        "category": "Sport",
        "is_public": 1,
        "order": 1,
        "user_id": "2",
        "created_at": "2020-06-30T09:01:58.000000Z",
        "updated_at": "2020-06-30T09:05:48.000000Z"
    },
    "version": "1.0.0",
    "author_url": "https://civ.ie"
}
                        </code>

                        <div class="overline mb-4 mt-5"><b>Example ERROR response</b> | JSON</div>


                        <code class="prettyprint p-4 lang-js">
    // Wrong Model ID sent.
{
    "message": "No query results for model [App\\Hobby] 88",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    ....
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
        name: "Hobbies",
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
                current_endpoint: 'Hobbies',
                current_endpoint_single: 'hobby',
                current_endpoint_url: 'hobbies',
            }
        }
    }
</script>

<style scoped>

</style>
