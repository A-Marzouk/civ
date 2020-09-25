<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Theme 203 Template</title>

    <style>

        @font-face {
            font-family: 'Gotham Pro';
            src: url({{ public_path('/fonts/gotham-pro/GothamPro.ttf') }}) format("truetype");
        }
        
        @font-face {
            font-family: 'Gotham Pro Med';
            src: url({{ public_path('/fonts/gotham-pro/GothamProMed.ttf') }}) format("truetype");
        }

        @font-face {
            font-family: 'Open Sans Bold';
            src: url({{ public_path('/fonts/open-sans/OpenSans-Bold.ttf') }}) format("truetype");
        }
        
        @font-face {
            font-family: 'Open Sans Light';
            src: url({{ public_path('/fonts/open-sans/OpenSans-Light.ttf') }}) format("truetype");
        }
        
        @font-face {
            font-family: 'Poppins Medium';
            src: url({{ public_path('/fonts/Poppins/Poppins-Medium.ttf') }}) format("truetype");
        }

        @font-face {
            font-family: 'Poppins Regular';
            src: url({{ public_path('/fonts/Poppins/Poppins-Regular.ttf') }}) format("truetype");
        }

        html,
        body {
            margin: 0;
            position: relative;
        }

        body {
            padding-bottom: 200px;
            position: relative;
        }

        body::after {
            content: "";
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 60px;
            height: 120%;
            background-color: #E5BF4E;
            
        }

        .decorator-left {
            position: absolute;
            top: 0;
            left: 0;
            width: 60px;
            height: 120%;
            background-color: #E5BF4E;
        }

        .decorator-triangle {
            position: absolute;
            top: -20px;
            left: -20px;
        }

        .theme-header {
            position: relative;
            z-index: 2;
            width: 100%;
        }

        .user-img-wrapper {
            border-right: 66px solid transparent;
            vertical-align: top;
            padding-left: 50px;
            padding-top: 50px;
        }

        .img-user img {
            width: 160px;
            border-radius: 80px;
            position: relative;
            z-index: 2;
        }

        .user-data-wrapper {
            width: 100%;
            vertical-align: top;
        }

        .user-data {
            width: 100%;
        }

        .user-name {
            vertical-align: top;
            font-size: 46px;
            margin-top: 100px;
            margin-bottom: 11px;
            color: #000;
            width: 100%;
            font-family: 'Gotham Pro Med', Arial, Helvetica, sans-serif;
        }

        .user-profession {
            font-family: 'Gotham Pro', Arial, Helvetica, sans-serif;
            font-size: 20px;
            color: #444444;
        }

        .user-social {
            font-size: 20px;
            margin-top: 50px;
            font-family: 'Gotham Pro', Arial, Helvetica, sans-serif;
            width: 700px;
        }

        .user-social .social-icon-wrapper {
            vertical-align: top;
            border-right: 36px solid transparent;
            border-bottom: 20px solid transparent;
        }

        .user-social .social-icon-wrapper:last-child {
            border-right: 0;
        }
        
        .user-social .social-icon-wrapper .social-nickname {
            vertical-align: top;
            margin-top: 15px;
        }

        .user-social .social-icon-wrapper img {
            height: 44px;
            border-radius: 22px;
            margin-right: 12px;
        }

        /* Section */

        section {
            position: relative;
            z-index: 3;
            margin: 0 100px 0 150px;
            margin-top: 100px;
        }

        section .text-decoration {
            font-family: 'Poppins Bold', Arial, Helvetica, sans-serif;
            font-size: 150px;
            color: rgba(0, 0, 0, .03);
            position: absolute;
            left: 4%;
            top: 7%;
        }

        .section-title {
            font-family: 'Open Sans Bold', Arial, Helvetica, sans-serif;
            font-size: 38px;
            margin-bottom: 10px;
        }

        .about {
            margin-top: 50px;
        }

        .about .content {
            font-size: 20px;
            margin-left: 10px;
            color: #373737;
            font-family: 'Open Sans', Arial, Helvetica, sans-serif;
        }

        /* Work Experience */
        .work-experience table,
        .educations table {
            width: 100%;
            margin-bottom: 70px;
        }

        .work-experience table:last-child,
        .educations table:last-child {
            margin-bottom: 0;
        }

        .work,
        .education {
            /* width: 50%; */
            vertical-align: top;
            border-right: 60px solid transparent;
        }

        .work:last-child,
        .education:last-child {
            border-right: 0;
            border-left: 60px;
        }

        .work-header {
            position: relative;
            padding-right: 200px;
        }

        .work-header .date {
            font-family: 'Gotham Pro', Arial, Helvetica, sans-serif;
            font-size: 18px;
            color: #1F1F1F;
            position: absolute;
            right: 0;
            top: 28px;
        }

        .job-title {
            font-size: 18px;
            font-family: 'Poppins Regular', Arial, Helvetica, sans-serif;
            color: #1F1F1F;
            margin-top: 13px;
            width: 100%;
        }

        .company-name,
        .school-name {
            color: #000000;
            font-size: 28px;
            font-family: 'Poppins Medium', Arial, Helvetica, sans-serif;
            position: relative;
        }
        
        .company-name .circle-decorator,
        .school-name .circle-decorator {
            width: 14px;
            height: 14px;
            border-radius: 6px;
            background-color: #FCD259;
            position: absolute;
            left: -30px;
            top: 28px;
        }

        .work .description,
        .education .description {
            width: 100%;
            font-size: 16px;
            line-height: 26px;
            color: #6C6C6C;
            margin-top: 22px;
            font-family: 'Gotham Pro', Arial, Helvetica, sans-serif;
        }

        /* Educations */
        .education-header {
            vertical-align: top;
            margin-top: 13px;
            width: 100%;
            position: relative;
        }

        .education-header > div {
            display: inline-block;
            width: 50%;
            vertical-align: top;
        }

        .education-header .date {
            font-family: 'Gotham Pro', Arial, Helvetica, sans-serif;
            font-size: 20px;
            color: #1F1F1F;
        }

        .grade-title {
            font-size: 20px;
            font-family: 'Poppins Regular', Arial, Helvetica, sans-serif;
            color: #1F1F1F;
            vertical-align: top;
            position: absolute;
            top: -12px;
            right: 0;
        }

        /* Skills */
        .skills {

        }
        
        .skill-category {
            font-family: 'Poppins Regular', Arial, Helvetica, sans-serif;
            font-size: 28px;
            color: #000;
            margin-bottom: 35px;
        }

        .skill {
            font-size: 30px;
            color: #1F1F1F;
            margin-bottom: 60px;
            font-family: 'Gotham Pro', Arial, Helvetica, sans-serif;
            width: 100%;
        }

        .skill-bar-container {
            width: 740px;
            position: relative;
            border-top: 45px solid transparent;
        }

        .skill-icon {
            position: absolute;
            left: 0;
            top: -20px;
        }

        .skill-bar {
            width: 100%;
            height: 16px;
            border-radius: 6px;
            background-color: #D0D5EC;
        }

        .skill-value {
            background-color: #E5BF4E;
            height: 16px;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    
    <table class="theme-header">
        <tr>
            <td class="user-img-wrapper">
                <div class="img-user">
                    <img src="{{ public_path('/images/resume_builder/default-user.jpg') }}" alt="">
                </div>
            </td>
            <td class="user-data-wrapper">
                <div class="user-data">
                    <div class="user-name">José Daniel Quintero</div>
                    <div class="user-profession">Fullstack Developer</div>
                    <table class="user-social">
                        <tr>
                            <td class="social-icon-wrapper">
                                <img src="{{ public_path('/images/resume_themes/theme203/social_icons/behance-icon.png') }}" alt=""><span class="social-nickname">Username</span>
                            </td>
                            <td class="social-icon-wrapper">
                                <img src="{{ public_path('/images/resume_themes/theme203/social_icons/linkedin-icon.png') }}" alt=""><span class="social-nickname">Username</span>
                            </td>
                            <td class="social-icon-wrapper">
                                <img src="{{ public_path('/images/resume_themes/theme203/social_icons/google-icon.png') }}" alt=""><span class="social-nickname">Username</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="social-icon-wrapper">
                                <img src="{{ public_path('/images/resume_themes/theme203/social_icons/dribbble-icon.png') }}" alt=""><span class="social-nickname">Username</span>
                            </td>
                            <td class="social-icon-wrapper">
                                <img src="{{ public_path('/images/resume_themes/theme203/social_icons/instagram-icon.png') }}" alt=""><span class="social-nickname">Username</span>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>

    <div class="decorator-left"></div>

    <img src="{{ public_path('/images/resume_themes/theme203/triangle-decorator.png') }}" alt="" class="decorator-triangle">

    <section class="about">
        <div class="section-title">About</div>
        <div class="text-decoration">ABOUT</div>
        <div class="content">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus voluptas, adipisci minus, quod, unde distinctio accusantium laudantium autem aperiam quia ipsa! Quia ratione unde velit voluptatibus qui officia praesentium doloremque.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat quasi nobis quo laudantium dolores praesentium, reiciendis architecto sapiente ipsam, maiores eum et odit ut? Repellendus laborum ipsam laboriosam deleniti id! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea delectus assumenda magni architecto, sequi laborum possimus! Provident eaque omnis inventore incidunt quam eum, sit odio. Id quis assumenda magnam similique!</p>
        </div>
    </section>

    <section class="work-experience">
        <div class="section-title">Work</div>
        <div class="text-decoration">WORK</div>
        <table>
            <tr>
                <td class="work">
                    <div class="work-header">
                        <div class="company-name"><div class="circle-decorator"></div>Civie</div>
                        <div class="date">Dec 19 - Present</div>
                    </div>
                    <div class="job-title">Fullstack Developer</div>
                    <div class="description">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illo atque error quisquam distinctio libero voluptatem odit reprehenderit voluptas cumque accusantium.</p>
                        <p>Officiis, deleniti? Assumenda quibusdam praesentium delectus cupiditate, corrupti.</p>
                    </div>
                </td>
                <td class="work">
                    <div class="work-header">
                        <div class="company-name"><div class="circle-decorator"></div>Civie</div>
                        <div class="date">Dec 19 - Present</div>
                    </div>
                    <div class="job-title">Fullstack Developer</div>
                    <div class="description">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum ullam aut praesentium, odit inventore consequatur nemo soluta assumenda nam error?</p>
                        <p>Aspernatur earum possimus incidunt. Excepturi asperiores tenetur illo, blanditiis esse alias.</p>
                    </div>
                </td>
            </tr>
        </table>
    </section>

    <section class="educations">
        <div class="section-title">Education</div>
        <div class="text-decoration">EDUCATION</div>
        <table>
            <tr>
                <td class="education">
                    <div class="school-name">
                        <div class="circle-decorator"></div>Simon Bolivar University
                    </div>
                    <div class="education-header">
                        <div class="date">Dec 19 - Present</div>
                        <div class="grade-title">Computing Maths</div>
                    </div>
                    <div class="description">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid quibusdam voluptatem iste, minus accusamus velit adipisci dignissimos nostrum magni rem.
                    </div>
                </td>
                <td class="education">
                    <div class="school-name">
                        <div class="circle-decorator"></div>Simon Bolivar University
                    </div>
                    <div class="education-header">
                        <div class="date">Dec 19 - Present</div>
                        <div class="grade-title">Computing Maths</div>
                    </div>
                    <div class="description">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid quibusdam voluptatem iste, minus accusamus velit adipisci dignissimos nostrum magni rem.
                    </div>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="education">
                    <div class="school-name">
                        <div class="circle-decorator"></div>Simon Bolivar University
                    </div>
                    <div class="education-header">
                        <div class="date">Dec 19 - Present</div>
                        <div class="grade-title">Computing Maths</div>
                    </div>
                    <div class="description">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid quibusdam voluptatem iste, minus accusamus velit adipisci dignissimos nostrum magni rem.
                    </div>
                </td>
                <td class="education">
                    <div class="school-name">
                        <div class="circle-decorator"></div>Simon Bolivar University
                    </div>
                    <div class="education-header">
                        <div class="date">Dec 19 - Present</div>
                        <div class="grade-title">Computing Maths</div>
                    </div>
                    <div class="description">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid quibusdam voluptatem iste, minus accusamus velit adipisci dignissimos nostrum magni rem.
                    </div>
                </td>
            </tr>
        </table>
    </section>

    <section class="skills">
        <div class="section-title">Skills</div>
        <div class="text-decoration">SKILLS</div>

        <table class="skill">
            <tr>
                <td class="skill-name">Photoshop</td>
                <td class="skill-percentage">90%</td>
            </tr>
            <tr>
                <td class="skill-bar-container">
                    <div class="skill-icon">
                        <img src="{{ public_path('/images/resume_themes/theme203/photoshop-icon.png') }}" alt="">
                    </div>
                    <div class="skill-bar">
                        <div class="skill-value" style="width: 90%"></div>
                    </div>
                </td>
            </tr>
        </table>
        <table class="skill">
            <tr>
                <td class="skill-name">Figma</td>
                <td class="skill-percentage">80%</td>
            </tr>
            <tr>
                <td class="skill-bar-container">
                    <div class="skill-icon">
                        <img src="{{ public_path('/images/resume_themes/theme203/figma-icon.png') }}" alt="">
                    </div>
                    <div class="skill-bar">
                        <div class="skill-value" style="width: 80%"></div>
                    </div>
                </td>
            </tr>
        </table>
        <table class="skill">
            <tr>
                <td class="skill-name">IIllustrator</td>
                <td class="skill-percentage">50%</td>
            </tr>
            <tr>
                <td class="skill-bar-container">
                    <div class="skill-icon">
                        <img src="{{ public_path('/images/resume_themes/theme203/illustrator-icon.png') }}" alt="">
                    </div>
                    <div class="skill-bar">
                        <div class="skill-value" style="width: 50%"></div>
                    </div>
                </td>
            </tr>
        </table>
    </section>
</body>
</html>