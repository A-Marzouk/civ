const account = {
    username: 'civ.build.resume@gmail.com',
    password: 'civ123456789'
}

const selector = {
    moreOption: '.pv-s-profile-actions__overflow-toggle',
    download: '[type="download-icon"]'
}

const loginSelector = {
   login: '[data-tracking-control-name="guest_homepage-basic_nav-header-signin"]',
   input1: '[name="session_key"]',
   input2: '[name="session_password"]',
   signin: '.btn__primary--large',
}

const link = 'https://www.linkedin.com/login?trk=homepage-basic_conversion-modal-signin'

module.exports = {
    selector,
    account,
    loginSelector,
    link
}
