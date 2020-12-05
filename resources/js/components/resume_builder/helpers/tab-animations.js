/**
 *
 * @export
 * @param {Event} e
 * @param {String} wrapperId
 * @param {VueComponent} component
 * 
 * @pre the VueComponent needs have the "setActiveTab" method and "activeTab" property
 * @pre the target element needs have the "data-target" attribute and this the tabname
 * 
 * @description
 *      The function get a tabwrapper and assign to this the active tabs to made the transtions between tabs.
 * 
 *      IMPORTANT!!!!
 *      Use v-if render instead v-show to avoid render conflicts
 * 
 * 
 */
export function moveTabsHelper (e, wrapperId, component) {

    // Move decorator on tabs
    let linksWrapper = document.getElementById(wrapperId)
    let { target } = e

    component.setActiveTab(target.getAttribute('data-target'))

    let decorator = linksWrapper.querySelector('.decorator');
    if (decorator !== null) {
        decorator.style.width = target.offsetWidth + 'px';
    
        // Complete move of the decorator
        decorator.style.transform = `translateX(${target.offsetLeft}px)`;
    }

}
