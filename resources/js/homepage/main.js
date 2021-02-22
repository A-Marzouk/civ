window.Vue = require('vue');


$('document').ready(function(){

    let tabs = $('.single-tab');
    tabs.on('click', changeTab);
    $('.next-arrow').on('click', showNextTab);
    $('.prev-arrow').on('click', showPrevTab);
    $(window).on('resize', setTabCount);
    setTabCount();

});

let tabsCount = 0;
let maxCount  = 11;
let step  = 155;
let maxMinus = 0 ;

function setTabCount() {
    let windowWidth = $(window).width();

    if(windowWidth < 1024 ){
        maxCount  = 14;
    }

    if(windowWidth < 599 ){
        maxCount  = 9;
    }

    maxMinus =  - maxCount * step ;

    console.log(maxMinus);
}


function changeTab(event) {
    let tabName = event.currentTarget.dataset.tab ;
    let tabs    = $('.single-tab');

    for (let i = 0; i < tabs.length ; i++) {
        if($(tabs[i]).hasClass('active')){
            $(tabs[i]).removeClass('active')
        }
        if(tabs[i].dataset.tab.toLowerCase() === tabName.toLowerCase()){
            $(tabs[i]).addClass('active');
        }
    }
}

function showNextTab() {
    let tabsWrapper      = $('#tabs-wrapper');
    let currentLeftValue = parseInt(tabsWrapper.css('left'));

    tabsWrapper.css('left', currentLeftValue - step + 'px');
    tabsCount++;

    toggleArrows();
}

function showPrevTab() {
    let tabsWrapper      = $('#tabs-wrapper');

    let currentLeftValue = parseInt(tabsWrapper.css('left'));
    let newValue =  currentLeftValue + 150;

    if(newValue > 0){
        newValue = 0 ;
    }

    tabsWrapper.css('left', newValue + 'px')
    tabsCount--;

    toggleArrows();
}

function toggleArrows() {
    let tabsWrapper         = $('#tabs-wrapper');
    let currentTabPosition  = parseInt(tabsWrapper.css('left'));

    console.log(currentTabPosition);

    if(currentTabPosition < maxMinus){
        $('#next-arrow').css('display', 'none');
    }else{
        $('#next-arrow').css('display', 'block');
    }

    if(currentTabPosition >= 0){
        $('#prev-arrow').css('display', 'none');
    }else{
        $('#prev-arrow').css('display', 'block');
    }
}

// cookies:  ( for login page )
import VueCookies from 'vue-cookies'
Vue.use(VueCookies);

// axios:
window.axios = require('axios');

// auth form ( in homepage and standalone page )
import AuthForm from '../components/auth/AuthForm';

if ($("#AuthForm").length !== 0) {
    new Vue({
        el: '#AuthForm',
        components: {
            'auth-form': AuthForm
        }
    });
}

// Home page components:
import homepageUsernameInput from '../components/homepage/UsernameInput';
import homepageVideo from '../components/homepage/homepageVideo';

if ($("#ah-homepage").length !== 0) {
    // username input
    new Vue({
        el: '#homepage_username_input',
        components: {
            'username-input': homepageUsernameInput
        }
    });

    // homepage video
    new Vue({
        el: '#homepage_video',
        components: {
            'homepage-video': homepageVideo
        }
    });
}
