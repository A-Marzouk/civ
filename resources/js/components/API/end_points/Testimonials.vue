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
    'name','company','title','description','user_id'
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
            "id": 2,
            "name": "Mr. Kelvin Hoppe",
            "company": "Jakubowski, Sanford and Deckow",
            "title": "Ipsum non quod quasi veritatis ut minima voluptatem. Placeat occaecati et et inventore et. Voluptatibus quod alias sit magnam dolor.",
            "description": "Qui necessitatibus aut provident voluptatibus facere aut quisquam. Alias repudiandae distinctio rerum. Occaecati culpa tenetur ex cum provident occaecati.",
            "user_id": 2,
            "created_at": "2020-04-29 13:46:36",
            "updated_at": "2020-04-29 13:46:36"
        },
        {
            "id": 3,
            "name": "Retha Olson III",
            "company": "Hayes LLC",
            "title": "Consequuntur iure et similique velit qui provident eaque. Omnis provident perspiciatis fugiat perferendis laboriosam sed. Molestiae et nihil voluptates sit est exercitationem dicta.",
            "description": "Cupiditate amet reiciendis adipisci debitis doloremque adipisci. Cupiditate velit consequatur officia similique. Et placeat suscipit quod est et ipsum.",
            "user_id": 2,
            "created_at": "2020-04-29 13:46:36",
            "updated_at": "2020-04-29 13:46:36"
        }
    ],
    "links": {
        "first": "http://localhost:8080/api/user/testimonials?page=1",
        "last": "http://localhost:8080/api/user/testimonials?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http://localhost:8080/api/user/testimonials",
        "per_page": 5,
        "to": 2,
        "total": 2
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
        name: "testimonial",
        company: "civ",
        title: "Secior developer",
        description: "this developer is a smart person and quick learner",
        user_id: 4
    }
);
                        </code>

                        <div class="overline mb-4 mt-5"><b>Example response</b> | JSON</div>

                        <code class="prettyprint p-4 lang-js">
{
    "data": {
        "user_id": "2",
        "name": "testimonial",
        "company": "civ",
        "title": "Secior developer",
        "description": "this developer is a smart person and quick learner",
        "updated_at": "2020-05-06 09:41:50",
        "created_at": "2020-05-06 09:41:50",
        "id": 4
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
    title: "Senior developer 2",
    user_id: 4
    id: 3
    }
);
                        </code>

                        <div class="overline mb-4 mt-5"><b>Example response</b> | JSON</div>

                        <code class="prettyprint p-4 lang-js">
{
    "data": {
        "id": 3,
        "name": "Retha Olson III",
        "company": "Hayes LLC",
        "title": "Senior developer 2",
        "description": "Cupiditate amet reiciendis adipisci debitis doloremque adipisci. Cupiditate velit consequatur officia similique. Et placeat suscipit quod est et ipsum.",
        "user_id": "2",
        "created_at": "2020-04-29 13:46:36",
        "updated_at": "2020-05-06 09:44:41"
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
          "id": 2
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
        name: "Testimonials",
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
                current_endpoint: 'Testimonials',
                current_endpoint_single: 'testimonial',
                current_endpoint_url: 'testimonials',
            }
        }
    }
</script>

<style scoped>

</style>
