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
    'name','description','link','skills','software','user_id'
];

relations = ['images'];
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
            "id": 5,
            "name": "lviv city",
            "description": "testtttt",
            "link": "project url",
            "skills": "tesssss",
            "software": "sdfsdf",
            "user_id": 2,
            "created_at": "2020-05-06 08:51:05",
            "updated_at": "2020-05-06 08:51:05",
            "images": [
                {
                    "id": 6,
                    "src": "/uploads/projectImages/1588755065_0.jfif",
                    "is_main": 1,
                    "project_id": 5,
                    "created_at": "2020-05-06 08:51:05",
                    "updated_at": "2020-05-06 08:51:05"
                }
            ]
        }
    ],
    "links": {
        "first": "http://localhost:8080/api/user/projects?page=1",
        "last": "http://localhost:8080/api/user/projects?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http://localhost:8080/api/user/projects",
        "per_page": 5,
        "to": 1,
        "total": 1
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
        name:'project API',
        description:'Project uploaded from the API postman',
        link:'no-link',
        skills:'PHP, LARAVEL, API',
        software:'Postman, PHPStorm',
        images[0]:file_1,
        images[1]:file_2,
        images[2]:file_3,
        user_id: 2
    }
);
                        </code>

                        <div class="overline mb-4 mt-5"><b>Example response</b> | JSON</div>

                        <code class="prettyprint p-4 lang-js">
{
    "data": {
        "name": "project API",
        "description": "Project uploaded from the API postman",
        "link": "no-link",
        "skills": "PHP, LARAVEL, API",
        "software": "Postman, PHPStorm",
        "user_id": "2",
        "updated_at": "2020-05-06 08:59:45",
        "created_at": "2020-05-06 08:59:45",
        "id": 6,
        "images": [
            {
                "id": 7,
                "src": "/uploads/projectImages/1588755585_1.png",
                "is_main": 1,
                "project_id": 6,
                "created_at": "2020-05-06 08:59:45",
                "updated_at": "2020-05-06 08:59:45"
            },
            {
                "id": 8,
                "src": "/uploads/projectImages/1588755585_2.jpeg",
                "is_main": 0,
                "project_id": 6,
                "created_at": "2020-05-06 08:59:45",
                "updated_at": "2020-05-06 08:59:45"
            },
            {
                "id": 9,
                "src": "/uploads/projectImages/1588755585_3.png",
                "is_main": 0,
                "project_id": 6,
                "created_at": "2020-05-06 08:59:45",
                "updated_at": "2020-05-06 08:59:45"
            }
        ]
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
        name: "Projects",
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
                current_endpoint: 'Projects',
                current_endpoint_single: 'project',
                current_endpoint_url: 'projects',
            }
        }
    }
</script>

<style scoped>

</style>
