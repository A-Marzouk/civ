<template>
    <div class="container">

        <div class="main-steps">
            <div class="title">
                How CIV API actually works ?
            </div>
            <div class="steps">
                <div>
                    1- Get <b>CLIENT_ID</b> and <b>CLIENT_SECRET</b> for your website/application from CIV admin.
                </div>
                <div>
                    2- Make a request to authenticate a user. <br/>

                    <small> (Make sure In this step to send your <b>CLIENT_ID</b> and <b>CLIENT_SECRET</b> along with
                        the request data - example included).</small>
                </div>
                <div>
                    3- From the previous request you will get an access_token that you will use in all coming requests. <br/>
                    <small> ( you will need to save this access_token and send as a
                        header in all API requests, you will find example of a header with access_token in these docs)</small>
                </div>
                <div>
                    4- As soon as you have authenticated your website/application and got user access_token back, you will be able to access all CIV API end points.
                </div>
            </div>
        </div>

        <v-card class="mx-auto mb-5" max-width="95%" outlined>
            <v-list-item three-line>
                <v-list-item-content>
                    <div class="overline mb-4">Login a User | <b>Example request</b> | Javascript</div>
                    <v-list-item-title class="headline mb-1 mb-3"> POST: api/login </v-list-item-title>
                    <v-list-item-subtitle class="d-flex flex-column">

                        Headers:

                        <code class="mb-5 prettyprint lang-js p-4">
{{headers_before_auth}}
                        </code>

                        Request data:

                        <code class="prettyprint p-4 mb-5 lang-js code">
axios.post('/api/login',
    {
        email: 'agent@civ.ie',
        password: '123456789',
        client_id: 0,
        client_secret: 'RRw0LTbc9Q83Lv68ffp9VHa7mDpjZgip4IRbBBed'
    }
);

                        </code>

                        <div class="overline mb-4 mt-5"><b>Example response</b> | JSON</div>

                        <code class="prettyprint p-4 lang-js">
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIzIiwianRpIjoiYmJhOTRjODBiMDMyMzU0Mjc2MDlmNGMyZWNhOTlkZDIxOGUxZTRiNDE4Nzk0MDMxNmZmYjM4ZWRmZmNmMjNkZjdjMDU0YTY4YWNlNmFkZWMiLCJpYXQiOjE1ODg1MDg4NjIsIm5iZiI6MTU4ODUwODg2MiwiZXhwIjoxNjIwMDQ0ODYyLCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.IOJHag3XmNcDrIc6G0kcgfj0IOUN3E96EVqDEYRnl-MBKoirY3SdP1i-tF4Lh0tUoJPgdhwCJueEo5_QIhg_cTNfNJP4tJmLYi4oi371gd3c72KiXuQ8fP1hntLyaT9DdCtQThpktA811p8kHgQEnpQ-_ojmr2U92PL2KfoX6xxbERiwSl4r43kESncCPdErJCP7cAu9LJAbJjMNQIPu6k4UUoAJPb8-AC3vR0RMCkA5kDT4ZdWXmKITbQwvi0gEVxhoGVgIKchsDBSWxFaLJ8UwMqQVgVEDp_vBQvMjjHB5nLgrowfVMAQKe_Eurn2xfZSN7VC9KW3YzKLJOSaOIWOUfHiH73Uv_JSZVy2-k3ljTE1b1TzUBB9MTC9BScgKrIjb2qiCXIpgXTGXRZMmySt4_4ai6SJKBwNP4LfOH_o5JlInLtuvuzT9c4S6smo5AHteNNQp1KffplEbpn6oCYUTNln8YXExMxRxjU6FUXrfUXwm1cU2YJhGZFeO-ifB3joWzTJ66PM-SfTyb7KWUnxUJ6K6AeAh893AcQPpRaFOHLKuKjka0JDLW7BmCIcQyMKG9EBqnejY_OxBF7f8_WcBKCk9PvRKPvtpc751Ppo13PRMniKbN0LKpofo9_PGuG6dT8gSl3oU_OPbQ3vyKEKzr7IsXDVyJ2DEtpGY6l0"
}

                        </code>

                        <div class="overline mb-4 mt-5"><b>Example ERROR response</b> | JSON</div>


                        <code class="prettyprint p-4 lang-js">
{
        "error": "UnAuthorised"
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
                    <div class="overline mb-4">Register a User | <b>Example request</b> | Javascript</div>
                    <v-list-item-title class="headline mb-1 mb-3"> POST: api/register </v-list-item-title>
                    <v-list-item-subtitle class="d-flex flex-column">

                        Headers:

                        <code class="mb-5 prettyprint lang-js p-4">
{{headers_before_auth}}
                        </code>

                        Request data:

                        <code class="prettyprint p-4 mb-5 lang-js code">
axios.post('/api/register',
    {
        name: 'AGENT - API',
        email: 'agent_new@civ.ie',
        username: 'agent_new',
        password: '123456789',
        password_confirmation: '123456789',
        client_id: 0,
        client_secret: 'RRw0LTbc9Q83Lv68ffp9VHa7mDpjZgip4IRbBBed',
    }
);

                        </code>

                        <div class="overline mb-4 mt-5"><b>Example response</b> | JSON</div>

                        <code class="prettyprint p-4 lang-js">
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIzIiwianRpIjoiYmJhOTRjODBiMDMyMzU0Mjc2MDlmNGMyZWNhOTlkZDIxOGUxZTRiNDE4Nzk0MDMxNmZmYjM4ZWRmZmNmMjNkZjdjMDU0YTY4YWNlNmFkZWMiLCJpYXQiOjE1ODg1MDg4NjIsIm5iZiI6MTU4ODUwODg2MiwiZXhwIjoxNjIwMDQ0ODYyLCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.IOJHag3XmNcDrIc6G0kcgfj0IOUN3E96EVqDEYRnl-MBKoirY3SdP1i-tF4Lh0tUoJPgdhwCJueEo5_QIhg_cTNfNJP4tJmLYi4oi371gd3c72KiXuQ8fP1hntLyaT9DdCtQThpktA811p8kHgQEnpQ-_ojmr2U92PL2KfoX6xxbERiwSl4r43kESncCPdErJCP7cAu9LJAbJjMNQIPu6k4UUoAJPb8-AC3vR0RMCkA5kDT4ZdWXmKITbQwvi0gEVxhoGVgIKchsDBSWxFaLJ8UwMqQVgVEDp_vBQvMjjHB5nLgrowfVMAQKe_Eurn2xfZSN7VC9KW3YzKLJOSaOIWOUfHiH73Uv_JSZVy2-k3ljTE1b1TzUBB9MTC9BScgKrIjb2qiCXIpgXTGXRZMmySt4_4ai6SJKBwNP4LfOH_o5JlInLtuvuzT9c4S6smo5AHteNNQp1KffplEbpn6oCYUTNln8YXExMxRxjU6FUXrfUXwm1cU2YJhGZFeO-ifB3joWzTJ66PM-SfTyb7KWUnxUJ6K6AeAh893AcQPpRaFOHLKuKjka0JDLW7BmCIcQyMKG9EBqnejY_OxBF7f8_WcBKCk9PvRKPvtpc751Ppo13PRMniKbN0LKpofo9_PGuG6dT8gSl3oU_OPbQ3vyKEKzr7IsXDVyJ2DEtpGY6l0"
}

                        </code>


                        <div class="overline mb-4 mt-5"><b>Example ERROR response</b> | JSON</div>


                        <code class="prettyprint p-4 lang-js">
{
    "error": {
        "password": [
            "The password confirmation does not match."
        ]
    }
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
        name: "Auth",
        data(){
            return{
                headers_after_auth:"{ " +
                    "'Accept':'application/json'," +
                    "'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhb.....'" +
                    "}" +
                    "\n" +
                    "  ",
                headers_before_auth:"{ " +
                    "'Accept':'application/json'" +
                    "}" +
                    "\n" +
                    "  ",
            }
        }
    }
</script>

<style lang="scss">

    .code{
        white-space: pre;
    }

    .main-steps{
        margin-bottom: 25px;

        .title{
            font-size: 24px;
            margin-bottom: 16px;
            font-weight: bold;
        }

        .steps{
            margin-left:25px;
            font-size: 18px;
            div{
                margin-bottom: 20px;
            }
        }
    }

</style>
