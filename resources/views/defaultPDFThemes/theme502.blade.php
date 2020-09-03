<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Theme 502 Template</title>

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
        }

        .decorator {
            height: 496px;
            width: 212px;
            position: absolute;
            z-index: 1;
            left: 0;
            top: 0;
            border-radius: 0 0 50px 0;
            background-color: #2943C7;
        }

        .decorator .dots-group {
            position: absolute;
            top: 370px;
            left: 60px;
            width: 90px;
        }

        .dots-group-bottom-right {
            position: absolute;
            bottom: -80px;
            right: 100px;
        }

        .theme-header {
            position: relative;
            z-index: 2;
            padding: 74px;
        }

        .user-img-wrapper {
            border-right: 66px solid transparent;
        }

        .img-user img {
            width: 220px;
            border-radius: 0 0 80px 0;
            position: relative;
            z-index: 2;
        }

        .user-data-wrapper {
            vertical-align: top;
        }

        .user-name {
            vertical-align: top;
            font-size: 32px;
            margin-top: 40px;
            margin-bottom: 11px;
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
            width: 44px;
            margin-right: 12px;
        }

        /* Sections */
        section {
            margin: 54px 74px;
        }

        .section-title {
            font-family: 'Open Sans Bold',  Arial, Helvetica, sans-serif;
            font-size: 32px;
            color: #2943C7;
        }

        .about .content {
            color: #373737;
            font-size: 20px;
            font-family: 'Open Sans Light', Arial, Helvetica, sans-serif;
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
            color: #2943C7;
            font-size: 28px;
            font-family: 'Poppins Medium', Arial, Helvetica, sans-serif;
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
            font-size: 16px;
            color: #1F1F1F;
            margin-bottom: 30px;
            font-family: 'Gotham Pro', Arial, Helvetica, sans-serif;
            width: 100%;
        }

        .skill-bar-container {
            width: 740px;
        }

        .skill-bar {
            width: 100%;
            height: 5px;
            border-radius: 2.5px;
            background-color: #D0D5EC;
        }

        .skill-value {
            background-color: #2943C7;
            height: 5px;
            border-radius: 2.5px;
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
                                <img src="{{ public_path('/images/resume_themes/theme502/social_icons/behance-icon.png') }}" alt=""><span class="social-nickname">Username</span>
                            </td>
                            <td class="social-icon-wrapper">
                                <img src="{{ public_path('/images/resume_themes/theme502/social_icons/linkedin-icon.png') }}" alt=""><span class="social-nickname">Username</span>
                            </td>
                            <td class="social-icon-wrapper">
                                <img src="{{ public_path('/images/resume_themes/theme502/social_icons/google-icon.png') }}" alt=""><span class="social-nickname">Username</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="social-icon-wrapper">
                                <img src="{{ public_path('/images/resume_themes/theme502/social_icons/dribbble-icon.png') }}" alt=""><span class="social-nickname">Username</span>
                            </td>
                            <td class="social-icon-wrapper">
                                <img src="{{ public_path('/images/resume_themes/theme502/social_icons/instagram-icon.png') }}" alt=""><span class="social-nickname">Username</span>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
    
    <div class="decorator">
        <div class="dots-group">
            <img src="{{ public_path('/images/resume_themes/theme502/dots-group-top-left.png') }}" alt="">
        </div>
    </div>

    <div class="dots-group-bottom-right">
        <img src="{{ public_path('/images/resume_themes/theme502/dots-group-bottom-right.png') }}" alt="">
    </div>

    <section class="about">
        <div class="section-title">About</div>
        <div class="content">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, maxime. Vero nesciunt iure praesentium excepturi exercitationem dolores officia nam, porro culpa consequatur aperiam velit rerum, perferendis cupiditate, eaque necessitatibus molestiae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque quidem, sit mollitia officiis deserunt placeat voluptates sapiente accusantium? Distinctio eum magnam dicta obcaecati exercitationem autem quidem corporis tempora. Non, dolores?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, tenetur eligendi? Placeat inventore accusamus dolorem nemo tempore architecto optio rerum aut aspernatur saepe ducimus obcaecati, ex nisi! Aspernatur, maxime porro. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste recusandae ratione corrupti vitae aspernatur assumenda tenetur ipsa fugit, facilis est dolorum, modi dolores delectus sapiente labore. Accusantium quibusdam tenetur perspiciatis.</p>
        </div>
    </section>

    <section class="work-experience">
        <div class="section-title">Work</div>
        <table>
            <tr>
                <td class="work">
                    <div class="work-header">
                        <div class="company-name">Civie</div>
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
                        <div class="company-name">Civie</div>
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
        <table>
            <tr>
                <td class="education">
                    <div class="school-name">
                        Simon Bolivar University
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
                        Simon Bolivar University
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
                        Simon Bolivar University
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
                        Simon Bolivar University
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

    <div class="dots-group-bottom-right">
        <img src="{{ public_path('/images/resume_themes/theme502/dots-group-bottom-right.png') }}" alt="">
    </div>

    <section class="skills">
        <div class="section-title">Skills</div>

        <div class="skill-category">Programming Languages</div>

        <table class="skill">
            <tr>
                <td class="skill-name">Javascript - 90%</td>
                <td class="skill-bar-container">
                    <div class="skill-bar">
                        <div class="skill-value" style="width: 90%"></div>
                    </div>
                </td>
            </tr>
        </table>
        <table class="skill">
            <tr>
                <td class="skill-name">Php - 80%</td>
                <td class="skill-bar-container">
                    <div class="skill-bar">
                        <div class="skill-value" style="width: 80%"></div>
                    </div>
                </td>
            </tr>
        </table>
        <table class="skill">
            <tr>
                <td class="skill-name">Python - 50%</td>
                <td class="skill-bar-container">
                    <div class="skill-bar">
                        <div class="skill-value" style="width: 50%"></div>
                    </div>
                </td>
            </tr>
        </table>
    </section>

</body>
</html>