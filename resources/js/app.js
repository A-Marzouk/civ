require('./modules');

let token = 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI1IiwianRpIjoiOWI2NzEyMGY0NGMwYTg2MjEwZTY2NmVlMjUyYWM2ODA1ZmIxZjNjNjg0ZWFmOTU4YTVkMTc4MjdjZjJkZTllMDc0NjIzNjcyY2I1ODhhMjEiLCJpYXQiOjE1ODI2NzY4MTksIm5iZiI6MTU4MjY3NjgxOSwiZXhwIjoxNjE0Mjk5MjE5LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.XBxaP0TCi-medx6qvwQ9o0aIw0-UypC4u-Mw44JiqbhRPZqn5in32Rb67aK2CmApotuHr8y47_0miZcx7vKELop-f93efBhKYTWWfBdYg3icSYhAXynptyvCzUfIiS0YUA6iF-N8uU3bUuuY8cPaPc1uK57c8V2BM6XwjVpC_tOQ_Agm-nTiqJGeix1voGkQwcm_GjGh5hevlrXPZZdjcbqojASSBHv0uUXp6p0TWK3XQ9lF1O1_I9MqsZ_QW9HHJ27gP2rhk0YyZ56-Da6wjGI6R0jNfXqQxxZd-eF7gHNwv7ZF5S2uB6pEJlYpmvFhw7Jk5IMez_J4vA7I8AwK1-ad8A44iL0itJUbkKDp8C4K60ij-2eER3rbzNjKburHO7Ln_5UHIlBSc61EUdA2v8qq_PTBEUmRvqxeaGL_zfTU6KY9Qt7xqZT4CflakeU3whD6D5H2ReNGqhBnXNOlReB4b5U_RXONLnR0h-Tnt3TK3rBbWcsoWJ5CyLFFi2oshrTpiLVL-iR8oGEE6wD2aJyDDpHIPhksDOkhIa7xD531lCiy-HBKSvHKwjs4NPU5WwlrjMTH8FJrj7xBN_mMTsFX_LolEXFD6yXcgqBNg0oJRwhYoOIcJ5uvBRPphCT5jduscmV1PH1f5ThmTDLb02X8t33hPj2DfsglzYkljhE';
axios.defaults.headers.Authorization = token;

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Accept':'application/json'
    }
});

// welcome page view component registration:
import welcomeView from './components/welcome-view/welcome';
if ($("#welcomeView").length !== 0) {
    new Vue({
        el: '#welcomeView',
        components:{
            'welcome-view':welcomeView
        }
    });
}


// Default themes preview components registrations:
require('./default-themes');

// Resume builder components register
require('./resume-builder');

// passport and Auth components register
require('./passport');

