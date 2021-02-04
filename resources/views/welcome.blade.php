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
                        <div class="civ-text">
                            civ.ie:
                        </div>
                        <div class="banner-text">
                            the new and better way to make, manage and share your resume
                        </div>
                        <div class="banner-sub-text">
                            Express yourself & build a resume that you can be proud of
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
                    <div class="ah-homepage-banner">
                        <img src="/images/homepage/homepage_banner_1.png" alt="">
                    </div>
                </div>

                <div class="section-four-second-text">
                    <div class="second-text-container">
                        <div class="text-one">
                            <span>civ.ie</span> will help you to stand out , get noticed and make a great first
                            impression
                        </div>
                        <div class="text-two">
                            Sending a civ.ie with your job application will increase your chances of being interviewed or
                            hired by 350 %
                        </div>
                        <div class="action-btn">
                            <a href="#">
                                Start My Page <img src="/images/homepage/white_right_arrow.png" alt="right arrow">
                            </a>
                        </div>
                    </div>
                    <div class="standing-bobby-image">
                        <img src="/images/homepage/standing_bobby_image.png" alt="standing bobby image">
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
                    <div class="single-review">
                        <div class="stars">
                            <img src="/images/homepage/stars.png" alt="stars image">
                        </div>
                        <div class="review-text">
                            "Perfect solution for remote terms"
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
        
        <div class="get-started-bar">
            <div class="get-started-text">
                Get Started - <span>It's Free</span> <img src="/images/homepage/blue_right_arrow.png" alt="Right arrow">
            </div>
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
