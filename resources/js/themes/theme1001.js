window.Vue = require('vue');

$('document').ready(function(){

    $('#menu-open').on('click', openMenu );
    $('#menu-close').on('click', closeMenu);
    $('.menu-tab').on('click', changeTab);
    $('.single-category').on('click', changeCategory);

    setDefaultActiveTab('media');

});

function openMenu() {
    $('#menu-body').css('right', 0);
    $('#menu').addClass('opened');
}

function closeMenu() {
    $('#menu-body').css('right', '-650px');
    $('#menu').removeClass('opened');

}

function changeTab(event) {
    let tabName     = event.currentTarget.dataset.name;
    updateTab(tabName);
    closeMenu();
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

function setDefaultActiveTab(tabName) {
    updateTab(tabName);
}

// needed vue components:
import MediaTab from './components/theme1001/Media'

new Vue({
    el: "#mediaTab",
    components: {
        "media-tab": MediaTab
    }
});