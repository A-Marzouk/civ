<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--<link href="/css/themes/theme1001.css" rel="stylesheet">--}}
    <title>civ.ie</title>
    <link href="/css/themes/theme1001.css" rel="stylesheet">
    <link rel="icon" href="/images/welcome_landing_page/logo/civie_logo_res-01.png" type="image/x-icon">
</head>
<body>

    <div class="theme1001-container">
        <div class="header">
            <div class="personal-info">
                <div class="profile-picture">
                    <img class="main-photo" src="/images/themes/theme1001/profile-photo.png" alt="">
                    <img class="message-icon" src="/images/themes/theme1001/message.png" alt="">
                    <img class="video-icon" src="/images/themes/theme1001/video.png" alt="">
                </div>
                <div class="details">
                    <div class="name">
                        Amber Salma Heard
                    </div>
                    <div class="job-title">
                        UX UI Designer
                    </div>
                    <div class="social-icons">
                        <img src="/images/themes/theme1001/social/behance.png" alt="social icon">
                        <img src="/images/themes/theme1001/social/dribbble.png" alt="social icon">
                        <img src="/images/themes/theme1001/social/facebook.png" alt="social icon">
                        <img src="/images/themes/theme1001/social/linkedin.png" alt="social icon">
                    </div>
                </div>
            </div>
            <div class="menu">
                <div id="menu-open" class="menu-icon">
                    <img src="/images/themes/theme1001/menu.png" alt="">
                </div>
                <div class="menu-body" id="menu-body">
                    <div class="close-icon">
                        <img  src="/images/themes/theme1001/menu-icons/small-x.png" alt="close" id="menu-close">
                    </div>

                    <div class="menu-tabs-wrapper">
                        <div class="menu-tab active" data-name="portfolio">
                            <img src="/images/themes/theme1001/menu-icons/image-gallery.svg" alt="tab icon">
                            <div class="tab-name">
                                Portfolio
                            </div>
                        </div>
                        <div class="menu-tab"  data-name="work">
                            <img src="/images/themes/theme1001/menu-icons/work.svg" alt="tab icon">
                            <div class="tab-name">
                                Work Experience & Education
                            </div>
                        </div>
                        <div class="menu-tab"  data-name="skills">
                            <img src="/images/themes/theme1001/menu-icons/skills.svg" alt="tab icon">
                            <div class="tab-name">
                                Skills & Languages
                            </div>
                        </div>
                        <div class="menu-tab"  data-name="about">
                            <img src="/images/themes/theme1001/menu-icons/user.svg" alt="tab icon">
                            <div class="tab-name">
                                About me
                            </div>
                        </div>
                        <div class="menu-tab"  data-name="hobbies">
                            <img src="/images/themes/theme1001/menu-icons/puzzle.svg" alt="tab icon">
                            <div class="tab-name">
                                Hobbies
                            </div>
                        </div>
                        <div class="menu-tab"  data-name="media">
                            <img src="/images/themes/theme1001/menu-icons/sound.svg" alt="tab icon">
                            <div class="tab-name">
                                Media
                            </div>
                        </div>
                        <div class="menu-tab"  data-name="references">
                            <img src="/images/themes/theme1001/menu-icons/refer.svg" alt="tab icon">
                            <div class="tab-name">
                                References
                            </div>
                        </div>
                        <div class="menu-tab"  data-name="achievements">
                            <img src="/images/themes/theme1001/menu-icons/trophy.svg" alt="tab icon">
                            <div class="tab-name">
                                Achievements
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-line-footer"></div>
        <div class="tabs-contents">
            <div class="tabs-contents-wrapper">
                <div class="single-tab-content active portfolio" data-name="portfolio">
                    <div class="portfolio-header">
                        <div class="categories">
                            <div class="single-category active" data-category="all">
                                All
                            </div>
                            <div class="single-category" data-category="development">
                                Development
                            </div>
                            <div class="single-category" data-category="design">
                                UX/UI Design
                            </div>
                            <div class="single-category" data-category="branding">
                                Branding
                            </div>
                            <div class="single-category" data-category="productDesign">
                                Product Design
                            </div>
                            <div class="single-category" data-category="experimental">
                                Experimental
                            </div>
                        </div>
                        <div class="display-options">
                            <div class="option">
                                <img src="/images/themes/theme1001/option-title.png" alt="option title">
                            </div>
                            <div class="option">
                                <img src="/images/themes/theme1001/option-no-title.png" alt="option no title">
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <div class="single-portfolio">
                            <img src="/images/themes/theme1001/portfolio/portfolio-sample-1.png" alt="portfolio image">
                            <div class="details">
                                <img src="/images/themes/theme1001/portfolio/small-line.png" alt="line">
                                <div class="text">
                                    <div class="project-name">
                                        Product Design
                                    </div>
                                    <div class="project-description">
                                        BeatsByDre.com - Leading a digitaltransformation & ecomm redesign
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-portfolio">
                            <img src="/images/themes/theme1001/portfolio/portfolio-sample-2.png" alt="portfolio image">
                            <div class="details">
                                <img src="/images/themes/theme1001/portfolio/small-line.png" alt="line">
                                <div class="text">
                                    <div class="project-name">
                                        BEATS BY DRY MOBILE APP
                                    </div>
                                    <div class="project-description">
                                        BeatsByDre.com - Leading a digitaltransformation
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-portfolio">
                            <img src="/images/themes/theme1001/portfolio/portfolio-sample-3.png" alt="portfolio image">
                            <div class="details">
                                <img src="/images/themes/theme1001/portfolio/small-line.png" alt="line">
                                <div class="text">
                                    <div class="project-name">
                                        Product Design
                                    </div>
                                    <div class="project-description">
                                        BeatsByDre.com - ecomm redesign
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-portfolio">
                            <img src="/images/themes/theme1001/portfolio/portfolio-sample-4.png" alt="portfolio image">
                            <div class="details">
                                <img src="/images/themes/theme1001/portfolio/small-line.png" alt="line">
                                <div class="text">
                                    <div class="project-name">
                                        BEATS BY DRY MOBILE APP
                                    </div>
                                    <div class="project-description">
                                        BeatsByDre.com - Leading a digitaltransformation & ecomm redesign
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-portfolio">
                            <img src="/images/themes/theme1001/portfolio/portfolio-sample-5.png" alt="portfolio image">
                            <div class="details">
                                <img src="/images/themes/theme1001/portfolio/small-line.png" alt="line">
                                <div class="text">
                                    <div class="project-name">
                                        Product Design
                                    </div>
                                    <div class="project-description">
                                        BeatsByDre.com - Leading a digitaltransformation & ecomm redesign
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-portfolio">
                            <img src="/images/themes/theme1001/portfolio/portfolio-sample-6.png" alt="portfolio image">
                            <div class="details">
                                <img src="/images/themes/theme1001/portfolio/small-line.png" alt="line">
                                <div class="text">
                                    <div class="project-name">
                                        Product Design
                                    </div>
                                    <div class="project-description">
                                        BeatsByDre.com - Leading a digitaltransformation & ecomm redesign
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-tab-content work" data-name="work">
                    Work
                </div>
                <div class="single-tab-content skills" data-name="skills">
                    skills
                </div>
                <div class="single-tab-content about" data-name="about">
                    about
                </div>
                <div class="single-tab-content media" data-name="media">
                    media
                </div>
                <div class="single-tab-content hobbies" data-name="hobbies">
                    hobbies
                </div>
                <div class="single-tab-content references" data-name="references">
                    references
                </div>
                <div class="single-tab-content achievements" data-name="achievements">
                    achievements
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="/js/themes/theme1001.js"></script>

</body>
</html>

