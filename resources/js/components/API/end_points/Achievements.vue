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
    'is_public','type','title','year','description','image_src','url','user_id','category','order'
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
            "title": "Quia odit voluptates et.",
            "type": null,
            "year": null,
            "category": "Id ea et ut ut.",
            "order": 1,
            "description": "Quibusdam sint doloribus adipisci sunt deleniti est recusandae. Qui explicabo aut corporis.",
            "image_src": "https://lorempixel.com/640/480/?45386",
            "url": "http://www.cremin.com/molestiae-culpa-consequatur-et-corrupti-mollitia.html",
            "is_public": 1,
            "user_id": 2,
            "created_at": "2020-06-28T18:07:09.000000Z",
            "updated_at": "2020-06-28T18:07:09.000000Z"
        },
        {
            "id": 2,
            "title": "Animi aut corporis sint.",
            "type": null,
            "year": null,
            "category": "Est officiis officiis a.",
            "order": 1,
            "description": "Quo accusantium incidunt similique et. Voluptas aut consequuntur impedit voluptatibus. Neque dolore aut id.",
            "image_src": "https://lorempixel.com/640/480/?58149",
            "url": "https://www.hackett.com/quaerat-dolores-velit-vel-itaque-reprehenderit-maxime-sint-sit",
            "is_public": 1,
            "user_id": 2,
            "created_at": "2020-06-28T18:07:09.000000Z",
            "updated_at": "2020-06-28T18:07:09.000000Z"
        },
        {
            "id": 3,
            "title": "Molestias sed esse qui.",
            "type": null,
            "year": null,
            "category": "Animi omnis quia quasi.",
            "order": 1,
            "description": "Id fuga praesentium veritatis. Iusto eum rem dolor nobis saepe et ut. Quibusdam soluta ipsum velit nostrum amet quia.",
            "image_src": "https://lorempixel.com/640/480/?97255",
            "url": "http://runolfsdottir.info/et-debitis-sequi-expedita-velit-excepturi-voluptatem-placeat-ut",
            "is_public": 1,
            "user_id": 2,
            "created_at": "2020-06-28T18:07:09.000000Z",
            "updated_at": "2020-06-28T18:07:09.000000Z"
        }
    ],
    "links": {
        "first": "http://local.civ.mine/api/user/achievements?page=1",
        "last": "http://local.civ.mine/api/user/achievements?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http://local.civ.mine/api/user/achievements",
        "per_page": 10,
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
{{headers_after_auth_file}}
                        </code>

                        Request data:

                        <code class="prettyprint p-4 mb-5 lang-js code">
axios.post('/api/user/{{current_endpoint_url}}',
    {
        title:my certificate,
        category:certificates,
        type:course,
        year:2020,
        description:my certificate,
        user_id:2,
        order:2,
        is_public:1,
        url:https://www.hackett.com/quaerat-dolores-velit-vel-itaque-reprehenderit-maxime-sint-sit,
        file: 1.png
    }
);
                        </code>

                        <div class="overline mb-4 mt-5"><b>Example response</b> | JSON</div>

                        <code class="prettyprint p-4 lang-js">
{
    "data": {
        "title": "my certificate",
        "category": "certificates",
        "type": "course",
        "year": "2020",
        "description": "my certificate",
        "user_id": "2",
        "order": "2",
        "is_public": "1",
        "url": "https://www.hackett.com/quaerat-dolores-velit-vel-itaque-reprehenderit-maxime-sint-sit",
        "updated_at": "2020-06-30T07:32:33.000000Z",
        "created_at": "2020-06-30T07:32:33.000000Z",
        "id": 5,
        "image_src": "/uploads/certificates/file_2_1593502353.png"
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
                            {{headers_after_auth_file}}
                        </code>

                        Request data:

                        <code class="prettyprint p-4 mb-5 lang-js code">
axios.put('/api/user/{{current_endpoint_url}}',
    {
        id:5,
        title:my certificate - UPDATED,
        user_id:2,
        is_public:0
    }
);
                        </code>

                        <div class="overline mb-4 mt-5"><b>Example response</b> | JSON</div>

                        <code class="prettyprint p-4 lang-js">
{
    "data": {
        "id": 5,
        "title": "my certificate - UPDATED",
        "type": "course",
        "year": "2020",
        "category": "certificates",
        "order": 2,
        "description": "my certificate",
        "image_src": "/uploads/certificates/file_2_1593502353.png",
        "url": "https://www.hackett.com/quaerat-dolores-velit-vel-itaque-reprehenderit-maxime-sint-sit",
        "is_public": "0",
        "user_id": "2",
        "created_at": "2020-06-30T07:32:33.000000Z",
        "updated_at": "2020-06-30T07:52:44.000000Z"
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

                        <div class="overline mb-4 mt-5"><b>Example response</b> | JSON</div>

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
        name: "Achievements",
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
                headers_after_auth_file: "{ " +
                    "'Accept':'application/json', " +
                    "'Content-Type': 'multipart/form-data'" +
                    "}" +
                    "\n" +
                    "  ",
                current_endpoint: 'Achievements',
                current_endpoint_single: 'achievement',
                current_endpoint_url: 'achievements',
            }
        }
    }
</script>

<style scoped>

</style>
