window.Vue = require('vue');


$('document').ready(function () {

    let tabs = $('.single-tab');
    tabs.on('click', changeTab);
    $('.next-arrow').on('click', showNextTab);
    $('.prev-arrow').on('click', showPrevTab);
    $(window).on('resize', initiateValues);
    let videoElement = $('#tabVideo');
    videoElement.on('ended', goToNextTab);
    videoElement.on('loadeddata', videoLoaded);


});

let step = 155;
let tabsWrapper = $('#tabs-wrapper');
let prevArrow   = $('#prev-arrow');
let nextArrow   = $('#next-arrow');
let tabsWidth   = tabsWrapper.innerWidth();
let windowWidth = $(window).innerWidth();
let showNext = true;
let showPrev = true;
let currentActiveTab = 'get_found';


function initiateValues() {
    tabsWrapper = $('#tabs-wrapper');
    tabsWidth = tabsWrapper.innerWidth();
    windowWidth = $(window).innerWidth();
}

function changeTab(event) {
    hideFlyingText();
    currentActiveTab = event.currentTarget.dataset.tab;
    let tabs = $('.single-tab');

    for (let i = 0; i < tabs.length; i++) {
        if ($(tabs[i]).hasClass('active')) {
            $(tabs[i]).removeClass('active')
        }
        if (tabs[i].dataset.tab.toLowerCase() === currentActiveTab.toLowerCase()) {
            $(tabs[i]).addClass('active');
        }
    }
    // change video source:
   changeVideo();
}

function goToNextTab() {
    let newIndex = 0 ;
    hideFlyingText();
    let tabs = $('.single-tab');

    for (let i = 0; i < tabs.length; i++) {
        if ($(tabs[i]).hasClass('active')) {
            $(tabs[i]).removeClass('active');
            newIndex = i+1 ;
            if(newIndex >= tabs.length){
                newIndex = 0 ;
            }
        }
    }

    currentActiveTab = tabs[newIndex].dataset.tab.toLowerCase();
    $(tabs[newIndex]).addClass('active');
    changeVideo();

}

function changeVideo() {
    let videoSrcBase = '/videos/homepage/features/';
    let videoElement = $('#tabVideo');
    videoElement.attr('src', videoSrcBase + currentActiveTab + '.mp4');
}

function showNextTab() {
    prevArrow.css('display', 'block');

    let currentLeftValue = parseInt(tabsWrapper.css('left'));
    let currentRightValue = parseInt(tabsWrapper.css('right'));

    if(currentRightValue > -step && currentRightValue < step) {
        showNext = false;
        tabsWrapper.css('left', 'auto');
        tabsWrapper.css('right', 0);
        // disable next:
        nextArrow.css('display', 'none');
    } else {
        showNext = true;
    }

    if (!showNext) {
        return;
    }

    tabsWrapper.css('left', currentLeftValue - step + 'px');
}

function showPrevTab() {
    nextArrow.css('display', 'block');

    let currentLeftValue = parseInt(tabsWrapper.css('left'));
    let newValue = currentLeftValue + 150;

    if (currentLeftValue + step >= 0) {
        showPrev = false;
        tabsWrapper.css('right', 'auto');
        tabsWrapper.css('left', 0);
        // disable prev:
        prevArrow.css('display', 'none');
    } else {
        showPrev = true;
    }

    if (!showPrev) {
        return;
    }

    tabsWrapper.css('left', newValue + 'px');
}

function videoLoaded(){
    let flyingTexts = $('.flying-text');

    for (let i = 0; i < flyingTexts.length; i++) {
        if ($(flyingTexts[i]).hasClass('active')) {
            $(flyingTexts[i]).removeClass('active')
        }
        if (flyingTexts[i].dataset.flying.toLowerCase() === currentActiveTab.toLowerCase()) {
            $(flyingTexts[i]).addClass('active');
        }
    }
}

function hideFlyingText() {
    let flyingTexts = $('.flying-text');

    for (let i = 0; i < flyingTexts.length; i++) {
        if ($(flyingTexts[i]).hasClass('active')) {
            $(flyingTexts[i]).removeClass('active')
        }
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
