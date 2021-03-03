window.Vue = require('vue');
const body = $('body');
let currentTouchPosition = 0 ;

$('document').ready(function(){

    let menuTab  = $('.menu-tab');
    let menuBody = $('#menu-body');
    $('#menu-open').on('click mouseover', openMenu);
    $('#menu-close').on('click', closeMenu);

    $('#video-open, #video-open-1001').on('click', openVideo);
    $('#video-close').on('click', closeVideo);

    menuBody.on('mouseleave', closeMenu);
    menuTab.on('mouseover', changeTab);
    menuTab.on('click', closeMenu);

    menuBody.on('touchstart', touchStart);
    menuBody.on('touchmove', touchMove);

    $('.single-category.portfolio').on('click', changePortfolioCategory);
    $('.single-category.skill').on('click', changeSkillCategory);

    $('.option').on('click', changePortfoliosViewOption);


    setDefaultActiveTab();

});


function openMenu() {
    $('#menu').addClass('opened');
    stopBodyScrolling()
}

function closeMenu() {
    $('#menu').removeClass('opened');
    startBodyScrolling();
}

function openVideo() {
    $('#video').addClass('opened');
    stopBodyScrolling()
}

function closeVideo() {
    $('#video').removeClass('opened');
    document.getElementById('main-video').pause();
    startBodyScrolling();
}

function changeTab(event) {
    let tabName     = event.currentTarget.dataset.name;
    updateTab(tabName);
}

function changePortfolioCategory(event) {
    let categoryName     = event.currentTarget.dataset.category;
    let portfolioCategories        = $('.single-category.portfolio');

    for (let i = 0; i < portfolioCategories.length ; i++) {
        if($(portfolioCategories[i]).hasClass('active')){
            $(portfolioCategories[i]).removeClass('active')
        }
        if(portfolioCategories[i].dataset.category === categoryName){
            $(portfolioCategories[i]).addClass('active');
        }
    }

    hideOtherPortfolioCategories(categoryName);

}

function hideOtherPortfolioCategories(categoryName){
    let portfolioElements = $('.single-portfolio');

    for (let i = 0; i < portfolioElements.length ; i++) {
        if($(portfolioElements[i]).hasClass('hide')){
            $(portfolioElements[i]).removeClass('hide')
        }

        if(portfolioElements[i].dataset.category.toLowerCase() !== categoryName.toLowerCase() && categoryName.toLowerCase() !== 'all'){
            $(portfolioElements[i]).addClass('hide');
        }
    }

}



function changeSkillCategory(event) {
    let categoryName     = event.currentTarget.dataset.category;
    let skillCategories        = $('.single-category.skill');


    for (let i = 0; i < skillCategories.length ; i++) {
        if($(skillCategories[i]).hasClass('active')){
            $(skillCategories[i]).removeClass('active')
        }
        if(skillCategories[i].dataset.category === categoryName){
            $(skillCategories[i]).addClass('active');
        }
    }

    hideOtherSkillCategories(categoryName);
}

function hideOtherSkillCategories(categoryName){
    let skillsElements = $('.single-skill');

    for (let i = 0; i < skillsElements.length ; i++) {
        if($(skillsElements[i]).hasClass('hide')){
            $(skillsElements[i]).removeClass('hide')
        }

        if(skillsElements[i].dataset.category.toLowerCase() !== categoryName.toLowerCase() && categoryName.toLowerCase() !== 'all'){
            $(skillsElements[i]).addClass('hide');
        }
    }

}

function changePortfoliosViewOption(event) {
    let option     = event.currentTarget.dataset.option;
    let options = $('.option');
    for (let i = 0; i < options.length ; i++) {
        if($(options[i]).hasClass('active')){
            $(options[i]).removeClass('active')
        }
        if(options[i].dataset.option.toLowerCase() === option.toLowerCase()){
            $(options[i]).addClass('active');
        }
    }

    togglePortfolioNames(option);
}

function togglePortfolioNames(option) {
    if(option === 'hideName'){
        $('.portfolio-content > .single-portfolio > .details').css('display', 'none');
    }else{
        $('.portfolio-content > .single-portfolio > .details').css('display', 'flex');
    }
}

function updateTab(tabName) {
    let tabs        = $('.menu-tab');
    let tabsContent = $('.single-tab-content');

    for (let i = 0; i < tabs.length ; i++) {
        if($(tabs[i]).hasClass('active')){
            $(tabs[i]).removeClass('active')
        }
        if(tabs[i].dataset.name === tabName){
            $(tabs[i]).addClass('active');
        }
    }

    for (let i = 0; i < tabsContent.length ; i++) {
        if($(tabsContent[i]).hasClass('active')){
            $(tabsContent[i]).removeClass('active')
        }

        if(tabsContent[i].dataset.name === tabName){
            $(tabsContent[i]).addClass('active');
        }
    }
}

function setDefaultActiveTab() {

    let tabName = $('.menu-tab').first().data().name;
    let queryString = window.location.search;
    let urlParams = new URLSearchParams(queryString);
    let defaultTabs = ['portfolio', 'work_experience', 'skills', 'hobbies','about_me', 'media', 'references', 'achievements'];

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
    if(e.changedTouches[0].clientX - currentTouchPosition > 60){
        closeMenu();
    }
}



// needed vue components:
import MediaTab from './components/theme1001/Media'
import messageModal from './components/theme1001/MessageModal'
import projectSlider from './components/theme1001/projectSlider'


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

new Vue({
    el: "#projectSlider",
    components: {
        "project-slider": projectSlider
    }
});