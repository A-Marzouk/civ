<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Theme 501</title>
    
    <style>
        @font-face {
            font-family: 'Circular Medium';
			src: url({{ public_path('fonts/Circular Std/CircularStd-Medium.ttf') }}) format("truetype");
            font-weight: normal;
        }
        
        @font-face {
            font-family: 'Poppins Light';
			src: url({{ public_path('fonts/Poppins/Poppins-Light.ttf') }}) format("truetype");
            font-weight: normal;
        }

        @font-face {
            font-family: 'Poppins Medium';
			src: url({{ public_path('fonts/Poppins/Poppins-Medium.ttf') }}) format("truetype");
            font-weight: normal;
        }
        
        @font-face {
            font-family: 'Poppins Regular';
			src: url({{ public_path('fonts/Poppins/Poppins-Regular.ttf') }}) format("truetype");
            font-weight: normal;
        }
        
        @font-face {
            font-family: 'Circular Book';
			src: url({{ public_path('fonts/Circular Std/CircularStd-Book.ttf') }}) format("truetype");
            font-weight: normal;
        }
        
        @font-face {
            font-family: 'Averta';
			src: url({{ public_path('fonts/averta/AvertaDemoPE-Regular.ttf') }}) format("truetype");
            font-weight: normal;
        }

        body, html {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
        }

        .theme-header {
            padding: 40px;
            background-color: #623CEA;
            position: relative;
            min-height: 280px;
        }

        .profile-picture {
            position: absolute;
        }

        .profile-picture .circle {
            border-radius: 120px;
            background-color: #fff;
            width: 240px;
            height: 240px;
            position: absolute;
            top: -10px;
            left: -10px;
        }
        
        .profile-picture .user-img {
            position: relative;
            z-index: 1;
            height: 220px;
            width: 220px;
            border-radius: 110px;
        }

        .theme-header table {
            width: 100%;
        }

        .user-data {
            padding-left: 270px;
            vertical-align: top;
        }

        .user-name {
            font-family: 'Circular Medium', Arial, Helvetica, sans-serif;
            color: #fff;
            font-size: 50px;
            margin-top: -20px;
        }

        .user-profession {
            font-family: 'Circular Book', Arial, Helvetica, sans-serif;
            color: #fff;
            opacity: 0.82;
            margin-top: -10px;
            font-size: 32px;
        }

        .user-info {
            font-family: 'Circular Book', Arial, Helvetica, sans-serif;
            margin-top: 32px;
        }

        .user-info a {
            color: #fff;
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
        }

        .social-wrapper {
            font-family: 'Circular Book', Arial, Helvetica, sans-serif;
            margin-top: 133px;
        }

        .user-social a {
            display: block;
            vertical-align: top;
            color: #fff;
            font-size: 18px;
            line-height: 10px;
            margin-bottom: 10px;
        }

        .user-social img {
            height: 30px;
            margin-right: 10px;
            margin-top: 5px;
        }

        /* Sections */
        section {
            margin: 70px 40px;
        }

        .section-title {
            font-family: 'Averta', Arial, Helvetica, sans-serif;
            font-weight: bold;
            font-size: 28px;
            height: 80px;
            width: 300px;
            background-color: #623CEA;
            color: #fff;
            vertical-align: middle;
            text-align: center;
            line-height: 90px;
            margin-bottom: 60px;
        }

        .section-title img {
            margin-right: 10px;
        }

        /* About */

        .about {
            position: relative;
            width: 100%;
        }

        .about .section-title img {
            margin-top: -18px;
        }

        .about .content .small {
            color: #575757;
            font-size: 20px;
            font-family: 'Averta', Arial, Helvetica, sans-serif;
        }

        .about .content .name {
            font-size: 50px;
            font-family: 'Averta', Arial, Helvetica, sans-serif;
            color: #000;
            margin-left: 5px;
        }

        .about .content .description {
            color: #656565;
            font-size: 20px;
            font-family: 'Circular Book', Arial, Helvetica, sans-serif;
            margin-left: 5px;
            max-width: 55%;
        }

        .about .user-img-wrapper {
            position: absolute;
            display: inline-block;
            top: 120px;
            right: 100px;
        }

        .about .user-img {
            position: relative;
        }

        .about .user-img-wrapper img {
            height: 300px;
            border-radius: 15px;
            position: relative;
            z-index: 1;
        }

        .about .user-img-wrapper .decorator {
            background-color: #623CEA;
            border-radius: 15px;
            position: absolute;
            left: 40px;
            top: 40px;
            width: 100%;
            height: 300px;
            width: 300px;
        }

        /* Works and education */
        .works-container .section-title img,
        .educations-container .section-title img {
            margin-top: -24px;
        }

        .works-row,
        .educations-row {
            margin-left: 15px;
        }

        .work,
        .education {
            padding-left: 60px;
            padding-bottom: 50px;
            position: relative;
            vertical-align: top;
            border-left: 4px solid #A1A1A1;
            border-right: 20px solid transparent;
        }

        .works-row .work:last-child,
        .educations-row .education:last-child {
            border-right: 10px solid transparent;
        }

        .works-row:last-child .work,
        .educations-row:last-child .education {
            border-left: 4px solid transparent;
        }

        .work .decorator-side,
        .education .decorator-side {
            position: absolute;
            left: -27px;
            top: 6px;
            vertical-align: top;
        }

        .work .job-title,
        .education .grade-title {
            color: #414141;
            font-family: 'Poppins Medium', Arial, Helvetica, sans-serif;
            font-size: 32px;
            vertical-align: top;
            margin-top: -10px;
            margin-bottom: 3px;
        }

        .work .company-name,
        .education .school-name,
        .work .date,
        .education .date {
            color: #4B4B4B;
            font-family: 'Poppins Regular', Arial, Helvetica, sans-serif;
            font-size: 20px;
        }

        .work .company-name,
        .education .school-name {
            margin-bottom: 2px;
        }

        .work .description,
        .education .description {
            color: #656565;
            font-size: 26px;
            line-height: 20px;
            font-family: 'Poppins Light', Arial, Helvetica, sans-serif;
        }

        /* Skills */
        .skills table {
            width: 100%;
            margin-bottom: 8px;
        }

        .skills .section-title {
            margin-bottom: 0px;
        }

        .skills .section-title img {
            margin-top: -22px;
        }

        .skill-category {
            color: #414141;
            font-size: 56px;
            font-family: 'Averta', Arial, Helvetica, sans-serif;
            margin-bottom: 46px;
            margin-top: 40px;
        }

        .skill {
            position: relative;
            color: #414141;
            border-bottom: 5px solid white;
            border-right: 10px solid white;
            border-left: 10px solid white;
            font-family: 'Poppins Light', Arial, Helvetica, sans-serif;
        }

        .skill:first-child {
            border-left: 0;
        }

        .skill:last-child {
            border-right: 0;
        }

        .skill-info-wrapper {
            padding: 25px 30px 15px 100px;
            background-color: #E9F6FF;
        }

        .skill .skill-name {
            font-size: 18px;
            line-height: 18px;
            vertical-align: top;
        }

        .skill .skill-img {
            position: absolute;
            left: 20px;
            height: 60px;
        }

        .skill-wrapper {
            margin-top: -15px;
            position: relative;
        }

        .skill .skill-wrapper .skill-value {
            height: 10px;
            position: absolute;
            left: 0;
            top: 0;
        }

        .skill .skill-wrapper .skill-bar {
            display: inline-block;
            position: relative;
            width: 80%;
            height: 10px;
            margin-right: 5px;
            background-color: #C5C5C5;
        }

        .skill .skill-wrapper .skill-percentage {
            display: inline-block;
            font-size: 14px;
            margin-top: 6px;
        }
    </style>
</head>
<body>
    <div class="theme-header">
        <div class="profile-picture">
            <div class="circle"></div>
            <img src="{{ public_path('/images/resume_builder/default-user.jpg') }}" alt="" class="user-img">
        </div>
        <table>
            <tr>
                <td class="user-data">
                    <div class="user-name">Jose Quintero</div>
                    <div class="user-profession">Fullstack Developer</div>
                    <div class="user-info">
                        <a href="#">42 Great Windmill Street London W1D 7NB</a>
                        <a href="#">+584241714022</a>
                        <a href="https://josedan10.github.io">https://josedan10.github.io</a>
                    </div>
                </td>
                <td class="user-social">
                    <div class="social-wrapper">
                        <a href="https://behance.com">
                            <img src="{{ public_path('/images/resume_themes/theme501/behance-icon.png') }}" alt=""> Behance User
                        </a>
                        <a href="https://dribbble.com">
                            <img src="{{ public_path('/images/resume_themes/theme501/dribbble-icon.png') }}" alt=""> Dribbble User
                        </a>
                        <a href="https://instagram.com">
                            <img src="{{ public_path('/images/resume_themes/theme501/instagram-icon.png') }}" alt=""> Instagram User
                        </a>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <section class="about">
        <div class="section-title">
            <img src="{{ public_path('/images/resume_themes/theme501/about-section-icon.png') }}" alt="" class="section-icon">
            About me
        </div>

        <div class="content">
            <div class="small">Hello, I'm</div>
            <div class="name">Jose Daniel</div>
            <div class="description">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse, nemo laboriosam! Nostrum iste distinctio suscipit provident nulla ex in fugiat dolor doloremque voluptatem laboriosam omnis assumenda, molestias aliquid? Assumenda, debitis.</p>
            </div>

            <div class="user-img-wrapper">
                <div class="user-img">
                    <div class="decorator"></div>
                    <img src="{{ public_path('/images/resume_builder/default-user.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="works-container">
        <div class="section-title">
            <img src="{{ public_path('/images/resume_themes/theme501/work-section-icon.png') }}" alt="" class="section-icon">  
            Work
        </div>

        <table class="works-row">
            <tr>
                <td class="work">
                    <div class="decorator-side">
                        <img src="{{ public_path('/images/resume_themes/theme501/box-icon-bgBlue.png') }}" alt="" class="work-img">
                        <div class="decorator"></div>
                    </div>
                    <div class="job-title">Fullstack Developer</div>
                    <div class="company-name">Civie</div>
                    <div class="date">Nov 2019 - Now</div>
                    <div class="description">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</div>
                </td>
                <td class="work">
                    <div class="decorator-side">
                        <img src="{{ public_path('/images/resume_themes/theme501/tools-icon-bgCyan.png') }}" alt="" class="work-img">
                        <div class="decorator"></div>
                    </div>
                    <div class="job-title">Fullstack Developer</div>
                    <div class="company-name">Civie</div>
                    <div class="date">Nov 2019 - Now</div>
                    <div class="description">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</div>
                </td>
            </tr>
        </table>
        <table class="works-row">
            <tr>
                <td class="work">
                    <div class="decorator-side">
                        <img src="{{ public_path('/images/resume_themes/theme501/box-icon-bgBlue.png') }}" alt="" class="work-img">
                        <div class="decorator"></div>
                    </div>
                    <div class="job-title">Fullstack Developer</div>
                    <div class="company-name">Civie</div>
                    <div class="date">Nov 2019 - Now</div>
                    <div class="description">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</div>
                </td>
                <td class="work">
                    <div class="decorator-side">
                        <img src="{{ public_path('/images/resume_themes/theme501/tools-icon-bgCyan.png') }}" alt="" class="work-img">
                        <div class="decorator"></div>
                    </div>
                    <div class="job-title">Fullstack Developer</div>
                    <div class="company-name">Civie</div>
                    <div class="date">Nov 2019 - Now</div>
                    <div class="description">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</div>
                </td>
            </tr>
        </table>
    </section>

    <section class="educations-container">
        <div class="section-title">
            <img src="{{ public_path('/images/resume_themes/theme501/education-section-icon.png') }}" alt="" class="section-icon">  
            Education
        </div>

        <table class="educations-row">
            <tr>
                <td class="education">
                    <div class="decorator-side">
                        <img src="{{ public_path('/images/resume_themes/theme501/box-icon-bgBlue.png') }}" alt="" class="education-img">
                        <div class="decorator"></div>
                    </div>
                    <div class="grade-title">Computing Mathematics</div>
                    <div class="school-name">USB Venezuela</div>
                    <div class="date">Sep 2014 - Jan 2020</div>
                    <div class="description">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</div>
                </td>
                <td class="education">
                    <div class="decorator-side">
                        <img src="{{ public_path('/images/resume_themes/theme501/tools-icon-bgCyan.png') }}" alt="" class="education-img">
                        <div class="decorator"></div>
                    </div>
                    <div class="grade-title">Computing Mathematics</div>
                    <div class="school-name">USB Venezuela</div>
                    <div class="date">Sep 2014 - Jan 2020</div>
                    <div class="description">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</div>
                </td>
            </tr>
        </table>
        <table class="educations-row">
            <tr>
                <td class="education">
                    <div class="decorator-side">
                        <img src="{{ public_path('/images/resume_themes/theme501/box-icon-bgBlue.png') }}" alt="" class="education-img">
                        <div class="decorator"></div>
                    </div>
                    <div class="grade-title">Computing Mathematics</div>
                    <div class="school-name">USB Venezuela</div>
                    <div class="date">Sep 2014 - Jan 2020</div>
                    <div class="description">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</div>
                </td>
                <td class="education">
                    <div class="decorator-side">
                        <img src="{{ public_path('/images/resume_themes/theme501/tools-icon-bgCyan.png') }}" alt="" class="education-img">
                        <div class="decorator"></div>
                    </div>
                    <div class="grade-title">Computing Mathematics</div>
                    <div class="school-name">USB Venezuela</div>
                    <div class="date">Sep 2014 - Jan 2020</div>
                    <div class="description">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</div>
                </td>
            </tr>
        </table>
    </section>

    <section class="skills">
        <div class="section-title">
            <img src="{{ public_path('/images/resume_themes/theme501/skills-section-icon.png') }}" alt="" class="section-icon">
            Skills
        </div>

        <div class="skill-category">Softwares</div>

        <table>
            <tr>
                <td class="skill">
                    <div class="skill-info-wrapper">
                        <img src="{{ public_path('/images/resume_themes/theme501/adobe-illustrator-icon.png') }}" alt="" class="skill-img">
                        <div class="skill-data">
                            <div class="skill-name">Illustrator</div>
    
                            <div class="skill-wrapper">
                                <div class="skill-bar">
                                    <div class="skill-value" style="background-color: #FF7C00; width: 90%"></div>
                                </div>
    
                                <div class="skill-percentage">90%</div>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="skill">
                    <div class="skill-info-wrapper">
                        <img src="{{ public_path('/images/resume_themes/theme501/adobeXD-icon.png') }}" alt="" class="skill-img">
                        <div class="skill-data">
                            <div class="skill-name">Adobe XD</div>
    
                            <div class="skill-wrapper">
                                <div class="skill-bar">
                                    <div class="skill-value" style="background-color: #FF21AF; width: 70%"></div>
                                </div>
    
                                <div class="skill-percentage">70%</div>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="skill">
                    <div class="skill-info-wrapper">
                        <img src="{{ public_path('/images/resume_themes/theme501/photoshop-icon.png') }}" alt="" class="skill-img">
                        <div class="skill-data">
                            <div class="skill-name">Photoshop</div>
    
                            <div class="skill-wrapper">
                                <div class="skill-bar">
                                    <div class="skill-value" style="background-color: #00C8FF; width: 70%"></div>
                                </div>
    
                                <div class="skill-percentage">70%</div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>

        <div class="skill-category">Languages</div>

        <table>
            <tr>
                <td class="skill">
                    <div class="skill-info-wrapper">
                        <img src="{{ public_path('/images/resume_themes/theme501/html-icon.png') }}" alt="" class="skill-img">
                        <div class="skill-data">
                            <div class="skill-name">HTML</div>
    
                            <div class="skill-wrapper">
                                <div class="skill-bar">
                                    <div class="skill-value" style="background-color: #E34F26; width: 100%"></div>
                                </div>
    
                                <div class="skill-percentage">100%</div>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="skill">
                    <div class="skill-info-wrapper">
                        <img src="{{ public_path('/images/resume_themes/theme501/css-icon.png') }}" alt="" class="skill-img">
                        <div class="skill-data">
                            <div class="skill-name">CSS</div>
    
                            <div class="skill-wrapper">
                                <div class="skill-bar">
                                    <div class="skill-value" style="background-color: #264DE4; width: 90%"></div>
                                </div>
    
                                <div class="skill-percentage">90%</div>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="skill">
                    <div class="skill-info-wrapper">
                        <img src="{{ public_path('/images/resume_themes/theme501/javascript-icon.png') }}" alt="" class="skill-img">
                        <div class="skill-data">
                            <div class="skill-name">Javascript</div>
    
                            <div class="skill-wrapper">
                                <div class="skill-bar">
                                    <div class="skill-value" style="background-color: #FDD83C; width: 80%"></div>
                                </div>
    
                                <div class="skill-percentage">80%</div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="skill">
                    <div class="skill-info-wrapper">
                        <img src="{{ public_path('/images/resume_themes/theme501/html-icon.png') }}" alt="" class="skill-img">
                        <div class="skill-data">
                            <div class="skill-name">HTML</div>
    
                            <div class="skill-wrapper">
                                <div class="skill-bar">
                                    <div class="skill-value" style="background-color: #E34F26; width: 100%"></div>
                                </div>
    
                                <div class="skill-percentage">100%</div>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="skill">
                    <div class="skill-info-wrapper">
                        <img src="{{ public_path('/images/resume_themes/theme501/css-icon.png') }}" alt="" class="skill-img">
                        <div class="skill-data">
                            <div class="skill-name">CSS</div>
    
                            <div class="skill-wrapper">
                                <div class="skill-bar">
                                    <div class="skill-value" style="background-color: #264DE4; width: 90%"></div>
                                </div>
    
                                <div class="skill-percentage">90%</div>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="skill">
                    <div class="skill-info-wrapper">
                        <img src="{{ public_path('/images/resume_themes/theme501/javascript-icon.png') }}" alt="" class="skill-img">
                        <div class="skill-data">
                            <div class="skill-name">Javascript</div>
    
                            <div class="skill-wrapper">
                                <div class="skill-bar">
                                    <div class="skill-value" style="background-color: #FDD83C; width: 80%"></div>
                                </div>
    
                                <div class="skill-percentage">80%</div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </section>
</body>
</html>