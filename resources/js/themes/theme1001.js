window.Vue = require('vue');
const body = $('body');
let currentTouchPosition = 0 ;

$('document').ready(function(){

    let menuTab  = $('.menu-tab');
    let menuBody = $('#menu-body');
    $('#menu-open').on('click mouseover', openMenu );
    $('#menu-close').on('click', closeMenu);

    menuBody.on('mouseleave', closeMenu );
    menuTab.on('mouseover', changeTab);
    menuTab.on('click', closeMenu);

    menuBody.on('touchstart', touchStart);
    menuBody.on('touchmove', touchMove);

    $('.single-category').on('click', changeCategory);

    setDefaultActiveTab();

});


function openMenu() {
    $('#menu-body').css('right', 0);
    $('#menu').addClass('opened');
    stopBodyScrolling()
}

function closeMenu() {
    $('#menu-body').css('right', '-650px');
    $('#menu').removeClass('opened');
    startBodyScrolling();
}

function changeTab(event) {
    let tabName     = event.currentTarget.dataset.name;
    updateTab(tabName);
}

function changeCategory(event) {
    let categoryName     = event.currentTarget.dataset.category;
    let categories        = $('.single-category');

    for (let i = 0; i < categories.length ; i++) {
        if($(categories[i]).hasClass('active')){
            $(categories[i]).removeClass('active')
        }
        if(categories[i].dataset.category === categoryName){
            $(categories[i]).addClass('active');
        }
    }
}

function updateTab(tabName) {
    let tabs        = $('.menu-tab');
    let tabsContent = $('.single-tab-content');

    for (let i = 0; i < tabs.length ; i++) {
        if($(tabs[i]).hasClass('active')){
            $(tabs[i]).removeClass('active')
        }
        if($(tabsContent[i]).hasClass('active')){
            $(tabsContent[i]).removeClass('active')
        }

        if(tabs[i].dataset.name === tabName){
            $(tabs[i]).addClass('active');
            $(tabsContent[i]).addClass('active');
        }
    }
}

function setDefaultActiveTab() {

    let tabName = 'portfolio';
    let queryString = window.location.search;
    let urlParams = new URLSearchParams(queryString);
    let defaultTabs = ['portfolio', 'work', 'skills', 'hobbies','about', 'media', 'references', 'achievements'];

    if(urlParams.has('tab')){
         let tabParam = urlParams.get('tab');
         if(defaultTabs.includes(tabParam)){
             tabName = tabParam;
         }
    }

    updateTab(tabName);
}

function stopBodyScrolling(){
    body.addClass('stop-scrolling')
    document.addEventListener("touchmove", body.bind(this), { passive: false });
}

function startBodyScrolling(){
    body.removeClass('stop-scrolling')
    body.unbind('touchmove')
}

// touch events:
function touchStart(e){
    currentTouchPosition = e.changedTouches[0].clientX;
}

function touchMove(e){
    if(e.changedTouches[0].clientX - currentTouchPosition > 30){
        closeMenu();
    }
}



// needed vue components:
import MediaTab from './components/theme1001/Media'
import messageModal from './components/theme1001/MessageModal'


new Vue({
    el: "#mediaTab",
    components: {
        "media-tab": MediaTab
    }
});

new Vue({
    el: "#messageModal",
    components: {
        "message-modal": messageModal
    }
});