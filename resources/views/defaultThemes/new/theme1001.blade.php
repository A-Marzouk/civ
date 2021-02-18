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
                    <div id="messageModal"><message-modal></message-modal></div>
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
                        <div class="single-icon">
                            <a href="#">
                                <img src="/images/themes/theme1001/social/behance.svg" alt="social icon">
                            </a>
                        </div>
                        <div class="single-icon">
                            <a href="#">
                                <img src="/images/themes/theme1001/social/dribbble.svg" alt="social icon">
                            </a>
                        </div>
                        <div class="single-icon">
                            <a href="#">
                                <img src="/images/themes/theme1001/social/facebook.svg" alt="social icon">
                            </a>
                        </div>
                        <div class="single-icon">
                            <a href="#">
                                <img src="/images/themes/theme1001/social/linkedin.svg" alt="social icon">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="menu" class="menu">
                <div id="menu-open" class="menu-icon">
                    <img src="/images/themes/theme1001/menu.png" alt="">
                </div>
                <div class="menu-body" id="menu-body">
                    <div class="close-icon">
                        <img  src="/images/themes/theme1001/menu-icons/small-x.png" alt="close" id="menu-close">
                    </div>

                    <div class="menu-tabs-wrapper" id="menu-tabs-elements">
                        <div class="menu-tab " data-name="portfolio">
                            <img src="/images/themes/theme1001/menu-icons/portfolio.svg" alt="tab icon">
                            <div class="tab-name">
                                Portfolio
                            </div>
                        </div>
                        <div class="menu-tab"  data-name="work">
                            <img src="/images/themes/theme1001/menu-icons/work_experience.svg" alt="tab icon">
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
                            <img src="/images/themes/theme1001/menu-icons/about_me.svg" alt="tab icon">
                            <div class="tab-name">
                                About me
                            </div>
                        </div>
                        <div class="menu-tab"  data-name="hobbies">
                            <img src="/images/themes/theme1001/menu-icons/hobbies.svg" alt="tab icon">
                            <div class="tab-name">
                                Hobbies
                            </div>
                        </div>
                        <div class="menu-tab"  data-name="media">
                            <img src="/images/themes/theme1001/menu-icons/media.svg" alt="tab icon">
                            <div class="tab-name">
                                Media
                            </div>
                        </div>
                        <div class="menu-tab"  data-name="references">
                            <img src="/images/themes/theme1001/menu-icons/references.svg" alt="tab icon">
                            <div class="tab-name">
                                References
                            </div>
                        </div>
                        <div class="menu-tab"  data-name="achievements">
                            <img src="/images/themes/theme1001/menu-icons/achievements.svg" alt="tab icon">
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
                <div class="single-tab-content portfolio" data-name="portfolio">
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
                    <div class="exp-work-wrapper">
                        <div class="experience">
                            <div class="single-tab-title">
                                <div class="main-title">
                                    Experience
                                </div>
                                <div class="sub-title">
                                    What I've Worked
                                </div>
                            </div>
                            <div class="exp-work-wrapper">
                                <div class="single-info">
                                    <div class="icon">
                                        <img src="/images/themes/theme1001/work/work-icon.png" alt="work icon">
                                    </div>
                                    <div class="divider"></div>
                                    <div class="info">
                                       <div class="work-header">
                                           <div class="title">
                                               Google
                                           </div>
                                           <div class="date">
                                               September 2017 - Present
                                           </div>
                                       </div>
                                        <div class="work-sub-header">
                                            Senior UX UI Designer
                                        </div>
                                        <div class="work-description">
                                            Get, keoo and grow more customers with customer engagement Automation by kissmetrics.
                                        </div>
                                    </div>
                                </div>
                                <div class="single-info">
                                    <div class="icon">
                                        <img src="/images/themes/theme1001/work/work-icon.png" alt="work icon">
                                    </div>
                                    <div class="divider"></div>
                                    <div class="info">
                                       <div class="work-header">
                                           <div class="title">
                                               Google
                                           </div>
                                           <div class="date">
                                               September 2017 - Present
                                           </div>
                                       </div>
                                        <div class="work-sub-header">
                                            Senior UX UI Designer
                                        </div>
                                        <div class="work-description">
                                            Get, keoo and grow more customers with customer engagement Automation by kissmetrics.
                                        </div>
                                    </div>
                                </div>
                                <div class="single-info">
                                    <div class="icon">
                                        <img src="/images/themes/theme1001/work/work-icon.png" alt="work icon">
                                    </div>
                                    <div class="divider"></div>
                                    <div class="info">
                                       <div class="work-header">
                                           <div class="title">
                                               Google
                                           </div>
                                           <div class="date">
                                               September 2017 - Present
                                           </div>
                                       </div>
                                        <div class="work-sub-header">
                                            Senior UX UI Designer
                                        </div>
                                        <div class="work-description">
                                            Get, keoo and grow more customers with customer engagement Automation by kissmetrics.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="education">
                            <div class="single-tab-title">
                                <div class="main-title">
                                    Education
                                </div>
                                <div class="sub-title">
                                    What I've Learned
                                </div>
                            </div>
                            <div class="exp-work-wrapper">
                                <div class="single-info">
                                    <div class="icon">
                                        <img src="/images/themes/theme1001/work/edu-icon.png" alt="work icon">
                                    </div>
                                    <div class="divider"></div>
                                    <div class="info">
                                        <div class="work-header">
                                            <div class="title">
                                                Technical University
                                            </div>
                                            <div class="date">
                                                2017 - Present
                                            </div>
                                        </div>
                                        <div class="work-sub-header">
                                            Computer Science Engineering
                                        </div>
                                        <div class="work-description">
                                            Get, keoo and grow more customers with customer engagement Automation by kissmetrics.
                                        </div>
                                    </div>
                                </div>
                                <div class="single-info">
                                    <div class="icon">
                                        <img src="/images/themes/theme1001/work/edu-icon.png" alt="work icon">
                                    </div>
                                    <div class="divider"></div>
                                    <div class="info">
                                        <div class="work-header">
                                            <div class="title">
                                                Technical University
                                            </div>
                                            <div class="date">
                                                2017 - Present
                                            </div>
                                        </div>
                                        <div class="work-sub-header">
                                            Computer Science Engineering
                                        </div>
                                        <div class="work-description">
                                            Get, keoo and grow more customers with customer engagement Automation by kissmetrics.
                                        </div>
                                    </div>
                                </div>
                                <div class="single-info">
                                    <div class="icon">
                                        <img src="/images/themes/theme1001/work/edu-icon.png" alt="work icon">
                                    </div>
                                    <div class="divider"></div>
                                    <div class="info">
                                        <div class="work-header">
                                            <div class="title">
                                                Technical University
                                            </div>
                                            <div class="date">
                                                2017 - Present
                                            </div>
                                        </div>
                                        <div class="work-sub-header">
                                            Computer Science Engineering
                                        </div>
                                        <div class="work-description">
                                            Get, keoo and grow more customers with customer engagement Automation by kissmetrics.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-tab-content skills" data-name="skills">
                    <div class="single-tab-title">
                        <div class="main-title">
                            Skills & Languages
                        </div>
                        <div class="sub-title">
                            What I Bring To The Table
                        </div>
                    </div>
                    <div class="categories">
                        <div class="single-category active" data-category="all">
                            All
                        </div>
                        <div class="single-category" data-category="language">
                            Language
                        </div>
                        <div class="single-category" data-category="personal">
                            Personal
                        </div>
                        <div class="single-category" data-category="professional">
                            Professional
                        </div>
                        <div class="single-category" data-category="management">
                            Management
                        </div>
                        <div class="single-category" data-category="leadership">
                            Leadership
                        </div>
                    </div>

                    <div class="skills-wrapper">
                        <div class="single-skill">
                            <div class="skill-info">
                                <div class="skill-icon">
                                    <img src="/images/themes/theme1001/skills/adobe_sketch.png" alt="skill icon">
                                </div>
                                <div class="title">
                                    <div class="main">
                                        Adobe Sketch
                                    </div>
                                    <div class="sub">
                                        Xd, Design, App, Site, Prototype, Mobile, Responsive, Ui, Ux
                                    </div>
                                </div>
                                <div class="percentage">
                                    75%
                                </div>
                            </div>
                            <div class="skill-percentage-bar">
                                <div class="default-bar"></div>
                                <div class="bar-percentage-achieved" style="width: 75%"></div>
                            </div>
                        </div>
                        <div class="single-skill">
                            <div class="skill-info">
                                <div class="skill-icon">
                                    <img src="/images/themes/theme1001/skills/photoshop.png" alt="skill icon">
                                </div>
                                <div class="title">
                                    <div class="main">
                                        Adobe Photoshop
                                    </div>
                                    <div class="sub">
                                        Xd, Design, App, Site, Prototype, Mobile, Responsive, Ui, Ux
                                    </div>
                                </div>
                                <div class="percentage">
                                    90%
                                </div>
                            </div>
                            <div class="skill-percentage-bar">
                                <div class="default-bar"></div>
                                <div class="bar-percentage-achieved" style="width: 90%"></div>
                            </div>
                        </div>
                        <div class="single-skill">
                            <div class="skill-info">
                                <div class="skill-icon">
                                    <img src="/images/themes/theme1001/skills/adobe_after_effects.png" alt="skill icon">
                                </div>
                                <div class="title">
                                    <div class="main">
                                        Adobe After Effect
                                    </div>
                                    <div class="sub">
                                        Xd, Design, App, Site, Prototype, Mobile, Responsive, Ui, Ux
                                    </div>
                                </div>
                                <div class="percentage">
                                    55%
                                </div>
                            </div>
                            <div class="skill-percentage-bar">
                                <div class="default-bar"></div>
                                <div class="bar-percentage-achieved" style="width: 55%"></div>
                            </div>
                        </div>
                        <div class="single-skill">
                            <div class="skill-info">
                                <div class="skill-icon">
                                    <img src="/images/themes/theme1001/skills/figma.png" alt="skill icon">
                                </div>
                                <div class="title">
                                    <div class="main">
                                        Figma
                                    </div>
                                    <div class="sub">
                                        Xd, Design, App, Site, Prototype, Mobile, Responsive, Ui, Ux
                                    </div>
                                </div>
                                <div class="percentage">
                                    75%
                                </div>
                            </div>
                            <div class="skill-percentage-bar">
                                <div class="default-bar"></div>
                                <div class="bar-percentage-achieved" style="width: 75%"></div>
                            </div>
                        </div>
                        <div class="single-skill">
                            <div class="skill-info">
                                <div class="skill-icon">
                                    <img src="/images/themes/theme1001/skills/adobe_xd.png" alt="skill icon">
                                </div>
                                <div class="title">
                                    <div class="main">
                                        Adobe XD
                                    </div>
                                    <div class="sub">
                                        Xd, Design, App, Site, Prototype, Mobile, Responsive, Ui, Ux
                                    </div>
                                </div>
                                <div class="percentage">
                                    25%
                                </div>
                            </div>
                            <div class="skill-percentage-bar">
                                <div class="default-bar"></div>
                                <div class="bar-percentage-achieved" style="width: 25%"></div>
                            </div>
                        </div>
                        <div class="single-skill">
                            <div class="skill-info">
                                <div class="skill-icon">
                                    <img src="/images/themes/theme1001/skills/adobe_illustrator.png" alt="skill icon">
                                </div>
                                <div class="title">
                                    <div class="main">
                                        Adobe Illustrator
                                    </div>
                                    <div class="sub">
                                        Xd, Design, App, Site, Prototype, Mobile, Responsive, Ui, Ux
                                    </div>
                                </div>
                                <div class="percentage">
                                    75%
                                </div>
                            </div>
                            <div class="skill-percentage-bar">
                                <div class="default-bar"></div>
                                <div class="bar-percentage-achieved" style="width: 75%"></div>
                            </div>
                        </div>
                        <div class="single-skill">
                            <div class="skill-info">
                                <div class="skill-icon">
                                    <img src="/images/themes/theme1001/skills/adobe_indesign.png" alt="skill icon">
                                </div>
                                <div class="title">
                                    <div class="main">
                                        Adobe InDesign
                                    </div>
                                    <div class="sub">
                                        Xd, Design, App, Site, Prototype, Mobile, Responsive, Ui, Ux
                                    </div>
                                </div>
                                <div class="percentage">
                                    85%
                                </div>
                            </div>
                            <div class="skill-percentage-bar">
                                <div class="default-bar"></div>
                                <div class="bar-percentage-achieved" style="width: 85%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="skills-divider"></div>

                    <div class="skills-wrapper languages">
                        <div class="single-skill">
                            <div class="skill-info">
                                <div class="skill-icon">
                                    <img src="/images/themes/theme1001/languages/english.png" alt="skill icon">
                                </div>
                                <div class="title">
                                    <div class="main">
                                        English
                                    </div>
                                    <div class="sub">
                                        Perfect Language knowledge, real time translations.
                                    </div>
                                </div>
                                <div class="percentage">
                                    90%
                                </div>
                            </div>
                            <div class="skill-percentage-bar">
                                <div class="default-bar"></div>
                                <div class="bar-percentage-achieved" style="width: 90%"></div>
                            </div>
                        </div>
                        <div class="single-skill">
                            <div class="skill-info">
                                <div class="skill-icon">
                                    <img src="/images/themes/theme1001/languages/french.png" alt="skill icon">
                                </div>
                                <div class="title">
                                    <div class="main">
                                       French
                                    </div>
                                    <div class="sub">
                                        Perfect Language knowledge, real time translations.
                                    </div>
                                </div>
                                <div class="percentage">
                                    90%
                                </div>
                            </div>
                            <div class="skill-percentage-bar">
                                <div class="default-bar"></div>
                                <div class="bar-percentage-achieved" style="width: 90%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-tab-content about" data-name="about">
                    <div class="about-info-wrapper">
                        <div class="personal-info">
                            <div class="single-data">
                                <img src="/images/themes/theme1001/about/birthday-cake.png" alt="Date icon">
                                <div class="title">
                                    Date of Birth
                                </div>
                                <div class="sub-title">
                                    01/14/1990
                                </div>
                            </div>
                            <div class="single-data">
                                <img src="/images/themes/theme1001/about/flags.png" alt="Nationality icon">
                                <div class="title">
                                    Nationality
                                </div>
                                <div class="sub-title">
                                    Indian
                                </div>
                            </div>
                            <div class="single-data">
                                <img src="/images/themes/theme1001/about/home.png" alt="Hometown icon">
                                <div class="title">
                                    Hometown
                                </div>
                                <div class="sub-title">
                                    Kiev
                                </div>
                            </div>
                            <div class="single-data">
                                <img src="/images/themes/theme1001/about/translate.png" alt="languages icon">
                                <div class="title">
                                    Languages
                                </div>
                                <div class="sub-title">
                                    English<br/>
                                    Arabic<br/>
                                    French
                                </div>
                            </div>
                        </div>
                        <div class="professional-info">
                            <div class="main-info-wrapper">
                                <div class="single-main-info">
                                    <div class="title">
                                        Overview
                                    </div>
                                    <div class="sub-title">
                                        A lot of things to be said here in the overview section, speak about yourself and what you want to achieve in the future.
                                    </div>
                                </div>
                                <div class="single-main-info">
                                    <div class="title">
                                        About me
                                    </div>
                                    <div class="sub-title">
                                        A lot of things to be said here in the overview section, speak about yourself and what you want to achieve in the future.
                                    </div>
                                </div>
                            </div>
                            <div class="sub-info-wrapper">
                                <div class="single-sub-info">
                                    <div class="icon">
                                        <img src="/images/themes/theme1001/about/left-quotes-sign.png" alt="icon">
                                    </div>
                                    <div class="details">
                                        <div class="title">
                                            Quote
                                        </div>
                                        <div class="sub-title">
                                            A lot of things to be said here in the Quote section.
                                        </div>
                                    </div>
                                </div>
                                <div class="single-sub-info">
                                    <div class="icon">
                                        <img src="/images/themes/theme1001/about/pin.png" alt="icon">
                                    </div>
                                    <div class="details">
                                        <div class="title">
                                            Location
                                        </div>
                                        <div class="sub-title">
                                            Ireland, Dublin
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-tab-content hobbies" data-name="hobbies">
                    <div class="single-tab-title">
                        <div class="main-title">
                            Hobbies
                        </div>
                        <div class="sub-title">
                            What I Love To Do
                        </div>
                    </div>
                    <div class="hobbies-wrapper">
                        <div class="single-hobby">
                            <div class="hobby-header">
                                <img src="/images/themes/theme1001/hobbies/bicycle.png" alt="">
                                <div class="title">
                                    Cycling
                                </div>
                            </div>
                            <div class="hobby-description">
                                Cycling, also called bicycling or biking,
                                is the use of bicycles for transport, recreation,exercise or sport.
                                People engaged in cycling are referred HPVs.
                            </div>
                        </div>
                        <div class="single-hobby">
                            <div class="hobby-header">
                                <img src="/images/themes/theme1001/hobbies/book.png" alt="">
                                <div class="title">
                                    Reading
                                </div>
                            </div>
                            <div class="hobby-description">
                                Cycling, also called bicycling or biking,
                                is the use of bicycles for transport, recreation,exercise or sport.
                                People engaged in cycling are referred HPVs.
                            </div>
                        </div>
                        <div class="single-hobby">
                            <div class="hobby-header">
                                <img src="/images/themes/theme1001/hobbies/suitcase.png" alt="">
                                <div class="title">
                                    Travelling
                                </div>
                            </div>
                            <div class="hobby-description">
                                Cycling, also called bicycling or biking,
                                is the use of bicycles for transport, recreation,exercise or sport.
                                People engaged in cycling are referred HPVs.
                            </div>
                        </div>
                        <div class="single-hobby">
                            <div class="hobby-header">
                                <img src="/images/themes/theme1001/hobbies/writing.png" alt="">
                                <div class="title">
                                    Writing
                                </div>
                            </div>
                            <div class="hobby-description">
                                Cycling, also called bicycling or biking,
                                is the use of bicycles for transport, recreation,exercise or sport.
                                People engaged in cycling are referred HPVs.
                            </div>
                        </div>
                        <div class="single-hobby">
                            <div class="hobby-header">
                                <img src="/images/themes/theme1001/hobbies/bicycle.png" alt="">
                                <div class="title">
                                    Cycling
                                </div>
                            </div>
                            <div class="hobby-description">
                                Cycling, also called bicycling or biking,
                                is the use of bicycles for transport, recreation,exercise or sport.
                                People engaged in cycling are referred HPVs.
                            </div>
                        </div>
                        <div class="single-hobby">
                            <div class="hobby-header">
                                <img src="/images/themes/theme1001/hobbies/bicycle.png" alt="">
                                <div class="title">
                                    Cycling
                                </div>
                            </div>
                            <div class="hobby-description">
                                Cycling, also called bicycling or biking,
                                is the use of bicycles for transport, recreation,exercise or sport.
                                People engaged in cycling are referred HPVs.
                            </div>
                        </div>

                    </div>
                </div>
                <div class="single-tab-content media" data-name="media">
                    <div id="mediaTab">
                        <media-tab></media-tab>
                    </div>
                </div>
                <div class="single-tab-content references" data-name="references">
                    <div class="single-tab-title">
                        <div class="main-title">
                            References
                        </div>
                    </div>
                    <div class="references-wrapper">
                        <div class="single-reference">
                            <div class="reference-header">
                                John Doe - Ui Designer
                            </div>
                            <div class="details">
                                <div class="location">
                                    <div>CEO, IT Software Park</div>
                                    <div>Texas, USA</div>
                                </div>
                                <div class="contact">
                                    <div>johndoe@gmail.com</div>
                                    <div>+960525252525</div>
                                </div>
                            </div>
                            <div class="description">
                                Reference is a relationship between objects in which one object designates, or acts as a means by which to connect to or link to, another object. The first object in this relation is said to refer
                                to the second object. It is called a name for the second object. The first object in this relation is said to refer to the second object.
                            </div>
                        </div>
                        <div class="single-reference">
                            <div class="reference-header">
                                John Doe - Ui Designer
                            </div>
                            <div class="details">
                                <div class="location">
                                    <div>CEO, IT Software Park</div>
                                    <div>Texas, USA</div>
                                </div>
                                <div class="contact">
                                    <div>johndoe@gmail.com</div>
                                    <div>+960525252525</div>
                                </div>
                            </div>
                            <div class="description">
                                Reference is a relationship between objects in which one object designates, or acts as a means by which to connect to or link to, another object. The first object in this relation is said to refer
                                to the second object. It is called a name for the second object. The first object in this relation is said to refer to the second object.
                            </div>
                        </div>
                        <div class="single-reference">
                            <div class="reference-header">
                                John Doe - Ui Designer
                            </div>
                            <div class="details">
                                <div class="location">
                                    <div>CEO, IT Software Park</div>
                                    <div>Texas, USA</div>
                                </div>
                                <div class="contact">
                                    <div>johndoe@gmail.com</div>
                                    <div>+960525252525</div>
                                </div>
                            </div>
                            <div class="description">
                                Reference is a relationship between objects in which one object designates, or acts as a means by which to connect to or link to, another object. The first object in this relation is said to refer
                                to the second object. It is called a name for the second object. The first object in this relation is said to refer to the second object.
                            </div>
                        </div>
                        <div class="single-reference">
                            <div class="reference-header">
                                John Doe - Ui Designer
                            </div>
                            <div class="details">
                                <div class="location">
                                    <div>CEO, IT Software Park</div>
                                    <div>Texas, USA</div>
                                </div>
                                <div class="contact">
                                    <div>johndoe@gmail.com</div>
                                    <div>+960525252525</div>
                                </div>
                            </div>
                            <div class="description">
                                Reference is a relationship between objects in which one object designates, or acts as a means by which to connect to or link to, another object. The first object in this relation is said to refer
                                to the second object. It is called a name for the second object. The first object in this relation is said to refer to the second object.
                            </div>
                        </div>
                        <div class="single-reference">
                            <div class="reference-header">
                                John Doe - Ui Designer
                            </div>
                            <div class="details">
                                <div class="location">
                                    <div>CEO, IT Software Park</div>
                                    <div>Texas, USA</div>
                                </div>
                                <div class="contact">
                                    <div>johndoe@gmail.com</div>
                                    <div>+960525252525</div>
                                </div>
                            </div>
                            <div class="description">
                                Reference is a relationship between objects in which one object designates, or acts as a means by which to connect to or link to, another object. The first object in this relation is said to refer
                                to the second object. It is called a name for the second object. The first object in this relation is said to refer to the second object.
                            </div>
                        </div>
                        <div class="single-reference">
                            <div class="reference-header">
                                John Doe - Ui Designer
                            </div>
                            <div class="details">
                                <div class="location">
                                    <div>CEO, IT Software Park</div>
                                    <div>Texas, USA</div>
                                </div>
                                <div class="contact">
                                    <div>johndoe@gmail.com</div>
                                    <div>+960525252525</div>
                                </div>
                            </div>
                            <div class="description">
                                Reference is a relationship between objects in which one object designates, or acts as a means by which to connect to or link to, another object. The first object in this relation is said to refer
                                to the second object. It is called a name for the second object. The first object in this relation is said to refer to the second object.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-tab-content achievements" data-name="achievements">
                    <div class="single-tab-title">
                        <div class="main-title">
                            Achievements
                        </div>
                    </div>
                    <div class="achievements-wrapper">
                        <div class="single-achievement">
                            <div class="certificate">
                                <img src="/images/themes/theme1001/achievements/certificate-sample.png" alt="certificate">
                            </div>
                            <div class="details">
                                <div class="title">
                                    National Award, 2015
                                </div>
                                <div class="url">
                                    URL: https://awwwards.com
                                </div>
                                <div class="description">
                                    Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo consequuntur. Lorem ipsum
                                    dolor sit amet, consectetur adipisicing elit. Explicabo consequuntur. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                </div>
                            </div>
                        </div>
                        <div class="single-achievement">
                            <div class="certificate">
                                <img src="/images/themes/theme1001/achievements/certificate-sample.png" alt="certificate">
                            </div>
                            <div class="details">
                                <div class="title">
                                    National Award, 2015
                                </div>
                                <div class="url">
                                    URL: https://awwwards.com
                                </div>
                                <div class="description">
                                    Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo consequuntur. Lorem ipsum
                                    dolor sit amet, consectetur adipisicing elit. Explicabo consequuntur. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                </div>
                            </div>
                        </div>
                        <div class="single-achievement">
                            <div class="certificate">
                                <img src="/images/themes/theme1001/achievements/certificate-sample.png" alt="certificate">
                            </div>
                            <div class="details">
                                <div class="title">
                                    National Award, 2015
                                </div>
                                <div class="url">
                                    URL: https://awwwards.com
                                </div>
                                <div class="description">
                                    Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo consequuntur. Lorem ipsum
                                    dolor sit amet, consectetur adipisicing elit. Explicabo consequuntur. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                </div>
                            </div>
                        </div>
                        <div class="single-achievement">
                            <div class="certificate">
                                <img src="/images/themes/theme1001/achievements/certificate-sample.png" alt="certificate">
                            </div>
                            <div class="details">
                                <div class="title">
                                    National Award, 2015
                                </div>
                                <div class="url">
                                    URL: https://awwwards.com
                                </div>
                                <div class="description">
                                    Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo consequuntur. Lorem ipsum
                                    dolor sit amet, consectetur adipisicing elit. Explicabo consequuntur. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="/js/themes/theme1001.js"></script>

</body>
</html>

