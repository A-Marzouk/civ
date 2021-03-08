@extends('layouts.homepage.main')

@section('content')

    <div id="ah-homepage">

        <div class="ah-navbar">
            <div class="navbar-elements-wrapper">
                <div class="ah-logo">
                    <img src="/images/homepage/civ_logo.png" alt="Logo">
                </div>
                <div class="ah-btns">
                    <a href="/login?tab=signin" class="login-btn">Log In</a>
                    <a href="/register" class="register-btn">Sign Up</a>
                </div>
            </div>

        </div>

        <div class="ah-main-container">

            <div class="sections-wrapper">
                <div class="section-one-main">
                    <div class="main-text-container">
                        <div class="banner-text">
                            the new and better way to
                            create, update & share
                            your online resume
                        </div>
                        <div class="banner-sub-text">
                            Build your resume website
                        </div>
                    </div>
                    <div class="bobby-image desktop">
                        <img src="/images/homepage/bobby_image.png" alt="bobby image">
                    </div>
                </div>

                <div class="section-two-input">
                    <div id="homepage_username_input">
                        <username-input></username-input>
                    </div>
                </div>

                <div class="bobby-image mobile">
                    <img src="/images/homepage/bobby_image.png" alt="bobby image">
                </div>

                <div class="section-three-image">

                    <div class="ah-tabs">
                        <div class="prev-arrow" id="prev-arrow">
                            <img src="/images/homepage/prev-arrow.png" alt="next arrow">
                        </div>
                        <div class="tabs-outer-container" id="tabs-outer-container">
                            <div class="tabs-wrapper" id="tabs-wrapper">
                                <div class="single-tab active" data-tab="get_found">
                                    Get Found
                                </div>
                                <div class="single-tab" data-tab="portfolio">
                                    Portfolio
                                </div>
                                <div class="single-tab" data-tab="webpage">
                                    Webpage
                                </div>
                                <div class="single-tab" data-tab="responsive">
                                    Responsive
                                </div>
                                <div class="single-tab" data-tab="themes">
                                    Themes
                                </div>
                                <div class="single-tab" data-tab="pdf">
                                    PDF
                                </div>
                                <div class="single-tab" data-tab="links">
                                    Links
                                </div>
                                <div class="single-tab" data-tab="messages">
                                    Messages
                                </div>
                                <div class="single-tab" data-tab="storage">
                                    Storage
                                </div>
                                <div class="single-tab" data-tab="import">
                                    Import
                                </div>
                                <div class="single-tab" data-tab="interactive">
                                    Interactive
                                </div>
                            </div>
                        </div>
                        <div class="next-arrow" id="next-arrow">
                            <img src="/images/homepage/next-arrow.png" alt="next arrow">
                        </div>
                    </div>
                    
                    <div class="ah-homepage-banner">
                        <div class="video-banner">
                            <div class="video-wrapper">
                                <div class="video-inside-wrapper">
                                    <video id="tabVideo" autoplay="" muted="" playsinline="" src="/videos/homepage/features/get_found.mp4"></video>
                                </div>
                                <div class="flying-text blue" data-flying="get_found">
                                    Get your civ.ie page on google
                                </div>
                                <div class="flying-text purple" data-flying="portfolio">
                                    Add a beautiful designed portfolio with ease!
                                    <div class="highlighted-text"></div>
                                </div>
                                <div class="flying-text orange" data-flying="webpage">
                                    Personalise and share your link with employers easily!
                                    <div class="highlighted-text"></div>
                                </div>
                                <div class="flying-text purple" data-flying="responsive">
                                    With responsive design employers can read your data in a beautiful way on every device!
                                    <div class="highlighted-text"></div>
                                </div>
                                <div class="flying-text blue" data-flying="themes">
                                    Personalise the look of your resume with  beautifully designed themes!
                                    <div class="highlighted-text"></div>
                                </div>
                                <div class="flying-text orange" data-flying="pdf">
                                    Easy to export your resume to a pdf version!
                                    <div class="highlighted-text"></div>
                                </div>
                                <div class="flying-text blue" data-flying="links">
                                    Add all your links and integrate them to ensure employers can contact you!
                                    <div class="highlighted-text"></div>
                                </div>
                                <div class="flying-text purple" data-flying="messages">
                                    Ensure employers can contact you!
                                    <div class="highlighted-text"></div>
                                </div>
                                <div class="flying-text orange" data-flying="storage">
                                    Update your CV anytime!
                                    <div class="highlighted-text"></div>
                                </div>
                                <div class="flying-text purple" data-flying="import">
                                    Easy to build your data fast!
                                    <div class="highlighted-text"></div>
                                </div>
                                <div class="flying-text blue" data-flying="interactive">
                                    Upload audio or video recordings to showcase your skills and experience!
                                    <div class="highlighted-text"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="section-four-second-text">
                    <div class="second-text-container">
                        <div class="text-one">
                            Get responses , get noticed and get hired. <br/>
                            <span>Make your resume stand out.</span>
                        </div>

                        <div class="action-btn">
                            <a href="#">
                                Start My Page <img src="/images/homepage/white_right_arrow.png" alt="right arrow">
                            </a>
                        </div>
                    </div>
                    <div class="standing-bobby-image">
                        <img src="/images/homepage/standing_bobby_image_2.png" alt="standing bobby image">
                    </div>
                </div>

                <div class="section-five-video">

                    <div id="homepage_video">
                        <homepage-video></homepage-video>
                    </div>

                </div>

                <div class="section-six-companies">
                    <div class="promo-text">
                        <span>civ.ie</span> resume's help people to get hired at the world's top companies
                    </div>
                    <div class="companies-logos">
                        <img src="/images/homepage/companies/tesla.png" alt="company logo">
                        <img src="/images/homepage/companies/google.png" alt="company logo">
                        <img src="/images/homepage/companies/facebook.png" alt="company logo">
                        <img src="/images/homepage/companies/spotify.png" alt="company logo">
                        <img src="/images/homepage/companies/youtube.png" alt="company logo">
                        <img src="/images/homepage/companies/spacex.png" alt="company logo">
                    </div>
                </div>

                <div class="section-seven-reviews">
                    <div class="reviews-wrapper">
                        <div class="single-review">
                            <div class="stars">
                                <img src="/images/homepage/stars.png" alt="stars image">
                            </div>
                            <div class="review-text">
                                "Perfect solution for freelancers"
                            </div>
                        </div>
                        <div class="single-review">
                            <div class="stars">
                                <img src="/images/homepage/stars.png" alt="stars image">
                            </div>
                            <div class="review-text">
                                "Really good!!!"
                            </div>
                        </div>
                        <div class="single-review">
                            <div class="stars">
                                <img src="/images/homepage/stars.png" alt="stars image">
                            </div>
                            <div class="review-text">
                                "Amazing concept, thanks"
                            </div>
                        </div>
                        <div class="single-review">
                            <div class="stars">
                                <img src="/images/homepage/stars.png" alt="stars image">
                            </div>
                            <div class="review-text">
                                "Really great platform"
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
        <div class="get-started-bar">
            <a class="get-started-text" href="/register">
                Get Started - <span>It's Free</span> <img src="/images/homepage/blue_right_arrow.png" alt="Right arrow">
            </a>
        </div>
        
        <div class="custom-footer">
            <div class="footer-wrapper">
                <div class="footer-logo-wrapper">
                    <img class="logo-footer" src="/images/homepage/civie_logo_white.png"/>
                </div>

                <div class="follow-us-text">
                    <label>Follow Us:</label>
                    <a
                            class="footer-social-icon"
                            href="https://www.facebook.com/civieapp"
                    >
                        <img
                                src="/images/welcome_landing_page/icons/social_icons/facebook.png"
                                alt="facebook"
                        />
                    </a>
                    <span class="followers">14,044 Followers</span>
                    <a
                            class="footer-social-icon"
                            href="https://www.instagram.com/civ.ie_/"
                    >
                        <img
                                src="/images/welcome_landing_page/icons/social_icons/instagram.png"
                                alt="instagram"
                        />
                    </a>
                    <span>733 Followers</span>
                </div>
                <div class="follow-us-text">
                    <label>Contact Us:</label>
                    <a class="footer-social-icon" href="mailto:hi@civ.ie">
                        <img src="/images/welcome_landing_page/icons/contact_icons/email.png"/>
                    </a>
                    <a class="footer-social-icon" href="https://www.facebook.com/civieapp">
                        <img src="/images/welcome_landing_page/icons/contact_icons/messenger.png"/>
                    </a>
                    <a class="footer-social-icon" href="skype:magictime.uk">
                        <img src="/images/welcome_landing_page/icons/contact_icons/skype.png"/>
                    </a>
                    <a class="footer-social-icon" href="https://wa.me/353868447832">
                        <img src="/images/welcome_landing_page/icons/contact_icons/whatsapp.png"/>
                    </a>
                    <a class="footer-social-icon" href="https://t.me/conormarjoram">
                        <img src="/images/welcome_landing_page/icons/contact_icons/telegram.png"/>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
