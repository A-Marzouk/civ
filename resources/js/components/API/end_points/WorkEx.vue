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
    'company_name','job_title','description','website','date_from','date_to','present','user_id'
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
            "company_name": "Adipisci ut et enim.",
            "job_title": "Et perspiciatis qui et.",
            "description": "Exercitationem et et omnis velit sed qui. Neque placeat voluptatem delectus et. Expedita magni dolores recusandae sit.",
            "website": "Sed fuga aut nihil.",
            "date_from": "2003-07-20",
            "date_to": "1992-03-23",
            "present": 1,
            "user_id": 2,
            "created_at": "2020-04-29 13:46:35",
            "updated_at": "2020-04-29 13:46:35"
        },
        {
            "id": 2,
            "company_name": "Dolor est eos magni.",
            "job_title": "Consequatur aut sit ut.",
            "description": "Vel natus harum animi ullam id ea. Necessitatibus ea rerum quia beatae. Et quae provident omnis in et quibusdam unde.",
            "website": "Quos laborum sed et ut.",
            "date_from": "1992-06-28",
            "date_to": "1970-06-02",
            "present": 1,
            "user_id": 2,
            "created_at": "2020-04-29 13:46:35",
            "updated_at": "2020-04-29 13:46:35"
        }
    ],
    "links": {
        "first": "http://localhost:8080/api/user/work-experience?page=1",
        "last": "http://localhost:8080/api/user/work-experience?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http://localhost:8080/api/user/work-experience",
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
        company_name": "civ",
        job_title: "Secior developer",
        description: "Secior developer",
        website: "civ.ie",
        date_from: "2005-10-11",
        date_to: null,
        present: 1,
        user_id: 4
    }
);
                        </code>

                        <div class="overline mb-4 mt-5"><b>Example response</b> | JSON</div>

                        <code class="prettyprint p-4 lang-js">
{
    "data": {
        "user_id": "2",
        "company_name": "civ",
        "job_title": "Secior developer",
        "description": "Secior developer",
        "website": "civ.ie",
        "date_from": "2005-10-11",
        "date_to": null,
        "present": "1",
        "updated_at": "2020-05-06 09:51:38",
        "created_at": "2020-05-06 09:51:38",
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
        id:3
        company_name: "civ-new",
        user_id: 4
    }
);
                        </code>

                        <div class="overline mb-4 mt-5"><b>Example response</b> | JSON</div>

                        <code class="prettyprint p-4 lang-js">
{
    "data": {
        "id": 3,
        "company_name": "civ-new",
        "job_title": "Esse doloribus qui et.",
        "description": "Quis exercitationem impedit facere odio aliquid quis ipsa. Id ratione explicabo ex dolorem.",
        "website": "Vero molestiae sunt eum.",
        "date_from": "1989-11-30",
        "date_to": "1970-03-03",
        "present": 0,
        "user_id": "2",
        "created_at": "2020-04-29 13:46:35",
        "updated_at": "2020-05-06 09:52:57"
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
        "id": 1
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
        name: "WorkEx",
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
                current_endpoint: 'Work Experience',
                current_endpoint_single: 'work-experience',
                current_endpoint_url: 'work-experience',
            }
        }
    }
</script>

<style scoped>

</style>
