require('./modules');

let token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI1IiwianRpIjoiNDY4YTAwMWYwMDA4ZDNkZTBjZWMyOWFmYjk0NjI3YWJiNWNiMDIyZWViYTZjODEzNTIwYmI0N2FhZWNkZGNhNDFlMGJlYTA2ZGUyNGIwYTMiLCJpYXQiOjE1ODI2NTgxNDIsIm5iZiI6MTU4MjY1ODE0MiwiZXhwIjoxNjE0MjgwNTQyLCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.RnLSO2iV2OoW0ntNbge80vdwW-8y62aoKoniHHfXV-2cmcG8MX0_PG3kEU-Z_1W4Wt5Vu7ZUns-LrqwkFhrCk2QDugROL3IYxg-jxxAHW-0I1Wx2vjxKWm_LENkW_sKkPc_H9JkMi0AJAOafW1L-0_ePGlelG4VSTZEYgW60hxglAzee52GfyzqqCil-99Gx2dUyTDbRPd34sClb49ai7XbZj7xhJdvRfWPDKlyanWYhyCmsp27JdNadjb-3GvMZeTqp0ZPA6mlxBK3ncutKPwjEmfglucG6KmXzXLzhtDfTxadiX-ukUJ7PqcboQ_DwJo_FFKGKJRBaGFDBemnLNp98eYOlJqJEpXVzXI_cmgJUHOymeO4uY_bTVpHySTmeJgaVz_R0QfJzvy1gISeLHk8VaQ4qs0OTj_Wh9ypNCAYZjcSAXUL335OpcYBhh2nDxXSwQgZi4O8fr8MRkGLYmpco2F5_h1ygGHzsFXHt5d-KU3FGL4S9dD092QzDIY2D3G2pBaVwFtnvy8li04rgcxza_AXbG_GuMJ5ajcgtKbUtYLFuORhfZa2iJZ3nApmIWd7v2lb-hp4xooiWqz8HxToWEEY6FZiBPsxSCM0fvplyMpDnrEAHh6XY6C5K8NKOysUQQGslhBQDaokmwrHa6xvwe8aGVbPvKec6GTLrRWA';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Authorization':'Bearer ' + token,
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

