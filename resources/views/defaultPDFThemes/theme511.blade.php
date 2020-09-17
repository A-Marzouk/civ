<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Theme511</title>
    <style>
        @font-face {
            font-family: 'Poppins Bold';
			src: url({{ public_path('fonts/Poppins/Poppins-Bold.ttf') }}) format("truetype");
            font-weight: normal;
        }
        
        @font-face {
            font-family: 'Poppins SemiBold';
			src: url({{ public_path('fonts/Poppins/Poppins-SemiBold.ttf') }}) format("truetype");
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

        html {
            margin: 0;
        }

        body {
            background-color: #e4e1dc;
            background-image: url('/images/resume_themes/theme511/backgroundPDF.png');
            background-size: cover;
            padding: 70px 50px;
        }

        .theme-header {
            border-radius: 50px;
            padding: 50px;
            background-color: #FAF7F1;
            width: 100%;
            position: relative;
        }

        .theme-header .user-img {
            width: 200px;
            border-radius: 100px;
            position: absolute;
        }

        .theme-header .user-name {
            font-family: 'Poppins Bold', Arial, Helvetica, sans-serif;
            font-size: 35px;
            margin-top: -20px;
        }

        .theme-header .user-profession {
            font-family: 'Poppins Medium', Arial, Helvetica, sans-serif;
            font-size: 20px;
            margin-top: -5px;
            margin-bottom: 10px;
        }

        .theme-header .user-data {
            margin-left: 240px;
        }

        .theme-header .user-personal {
            width: 450px;
            vertical-align: top;
        }

        .theme-header .user-data a {
            color: #000;
            font-family: 'Poppins Regular', Arial, Helvetica, sans-serif;
            font-size: 16px;
            text-decoration: none;
            display: block;
        }

        .theme-header .user-social {
            width: 300px;
            border-left: 50px solid transparent;
            padding-top: 40px;
        }

        .theme-header .user-social a {
            display: block;
            margin-bottom: 15px;
            vertical-align: top;
        }

        .theme-header .user-social a img {
            height: 35px;
            margin-top: 5px;
            margin-right: 10px;
        }

        section {
            padding: 30px 50px 50px;
            border-radius: 50px;
            width: 100%;
            background-color: #FAF7F1;
            margin-top: 65px;
            font-family: 'Poppins Regular', Arial, Helvetica, sans-serif;
            font-size: 16px;
        }

        section .section-title {
            font-family: 'Poppins Bold', Arial, Helvetica, sans-serif;
            font-size: 30px;
            color: #3C3748;
        }

        section .section-title .title-decorator {
            height: 5px;
            margin-left: -3px;
            border-radius: 2.5px;
        }

        .about .section-title .title-decorator {
            background-color: #F7B301;
            width: 92px;
        }

        /* Work and Education */

        .work-experience .section-title .title-decorator {
            background-color: #6764C8;
            width: 165px;
            margin-top: 20px;
        }
        
        .educations .section-title .title-decorator {
            background-color: #19AAC9;
            width: 152px;
            margin-top: 20px;
        }

        .work,
        .education {
            border-bottom: 10px solid transparent;
            border-top: 10px solid transparent;
            width: 50%;
            vertical-align: top;
        }

        .work-wrapper,
        .education-wrapper {
            padding: 30px;
            
            background-color: #fff;
            border-radius: 20px;
            vertical-align: top;
        }

        .work:first-child,
        .education:first-child {
            border-right: 10px solid transparent;
        }
        
        .work:last-child,
        .education:last-child {
            border-left: 10px solid transparent;
        }

        .work .work-header,
        .education .education-header {
            position: relative;
        }

        .work .work-header .work-icon,
        .education .education-header .education-icon {
            position: absolute;
            right: 10px;
            top: 10px;
        }

        .work-header .job-title,
        .education-header .grade-title {
            color: #000;
            font-family: 'Poppins SemiBold', Arial, Helvetica, sans-serif;
            font-size: 20px;
        }

        .work-header .company-name,
        .education-header .school-name {
            color: #000;
            font-family: 'Poppins Medium', Arial, Helvetica, sans-serif;
            font-size: 16px;
        }

        .work .description,
        .education .description {
            margin-top: 10px;
        }

        .work .date,
        .education .date {
            margin-top: 10px;
            color: #B2B2B2;
            font-family: 'Poppins Regular', Arial, Helvetica, sans-serif;
            font-size: 14px;
        }

        /* Skills */
        .skills .title-decorator {
            background-color: #F56068;
            width: 85px;
        }

        .skills table {
            width: 100%;
        }

        .skill {
            width: 50%;
            position: absolute;
        }

        .skill:first-child {
            border-right: 10px solid transparent;
            border-top: 10px solid transparent;
        }
        
        .skill:last-child {
            border-left: 10px solid transparent;
            border-top: 10px solid transparent;
        }

        .skill-wrapper {
            background-color: #fff;
            border-radius: 20px;
            padding: 30px;
        }

        .skill-wrapper * {
            display: inline-block;
        }

        .skill-name {
            font-family: 'Poppins Bold', Arial, Helvetica, sans-serif;
            font-size: 20px;
            margin-top: -5px;
            width: 150px;
        }

        .skill-wrapper .decorator {
            height: 50px;
            width: 5px;
            border-radius: 2.5px;
            background-color: #F56068;
            margin: 8px 15px 0;
        }

        .skill-wrapper .percentage {
            color: #0D001A;
            opacity: 0.2;
            font-family: 'Poppins Bold', Arial, Helvetica, sans-serif;
            font-size: 30px;
            margin-top: 5px;
        }

        .skill-wrapper .skill-icon {
            position: absolute;
            right: 30px;
            top: 42px;
        }

    </style>
</head>
<body>

    <div class="theme-header">
        <img src="{{ public_path('/images/resume_builder/default-user.jpg') }}" alt="" class="user-img" />
        <table class="user-data">
            <tr>
                <td class="user-personal">
                    <div class="user-name">Jose Quintero</div>
                    <div class="user-profession">Fullstack Developer</div>
                    <div class="user-info">
                        <a href="#">94 Green Street Road, 7NB, London</a>
                        <a href="#">+880 1462849317</a>
                        <a href="#">josedanq100@gmail.com</a>
                    </div>
                </td>
                <td class="user-social">
                    <a href="https://twitter.com" class="social-link"><img src="{{ public_path('/images/resume_themes/theme511/social_icons/twitter-icon.png') }}" alt="">Twitter username</a>
                    <a href="https://facebook.com" class="social-link"><img src="{{ public_path('/images/resume_themes/theme511/social_icons/facebook-icon.png') }}" alt="">Facebook username</a>
                    <a href="https://instagram.com" class="social-link"><img src="{{ public_path('/images/resume_themes/theme511/social_icons/instagram-icon.png') }}" alt="">Instagram username</a>
                </td>
            </tr>
        </table>
    </div>

    <section class="about">
        <h1 class="section-title">
            About
            <div class="title-decorator"></div>
        </h1>

        <div class="content">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat repellat quidem voluptatum incidunt delectus vel doloremque eligendi excepturi aspernatur corporis quam facere, assumenda aperiam nemo necessitatibus, harum ipsa sequi repellendus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi libero earum iure nisi suscipit aliquam fuga totam maiores sed! Molestias eaque, ipsum at nobis facilis id maxime nam illum optio.
        </div>
    </section>

    <section class="work-experience">
        <h1 class="section-title">
            Experience
            <div class="title-decorator"></div>
        </h1>

        <table>
            <tr>
                <td class="work">
                    <div class="work-wrapper">
                        <div class="work-header">
                            <div class="job-title">Fullstack Developer</div>
                            <div class="company-name">Civie</div>
                            <img src="{{ public_path('/images/resume_themes/theme511/social_icons/work-icon.png') }}" alt="" class="work-icon">
                        </div>
                        <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem molestias minima eveniet atque.</div>
                        <div class="date">2019 - Now</div>
                    </div>
                </td>
                <td class="work">
                    <div class="work-wrapper">
                        <div class="work-header">
                            <div class="job-title">Fullstack Developer</div>
                            <div class="company-name">Civie</div>
                            <img src="{{ public_path('/images/resume_themes/theme511/social_icons/work-icon.png') }}" alt="" class="work-icon">
                        </div>
                        <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem molestias minima eveniet atque.</div>
                        <div class="date">2019 - Now</div>
                    </div>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="work">
                    <div class="work-wrapper">
                        <div class="work-header">
                            <div class="job-title">Fullstack Developer</div>
                            <div class="company-name">Civie</div>
                            <img src="{{ public_path('/images/resume_themes/theme511/social_icons/work-icon.png') }}" alt="" class="work-icon">
                        </div>
                        <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
                        <div class="date">2019 - Now</div>
                    </div>
                </td>
                <td class="work">
                    <div class="work-wrapper">
                        <div class="work-header">
                            <div class="job-title">Fullstack Developer</div>
                            <div class="company-name">Civie</div>
                            <img src="{{ public_path('/images/resume_themes/theme511/social_icons/work-icon.png') }}" alt="" class="work-icon">
                        </div>
                        <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque eligendi illo aspernatur corrupti? Est, nesciunt reiciendis beatae.</div>
                        <div class="date">2019 - Now</div>
                    </div>
                </td>
            </tr>
        </table>
    </section>

    <section class="educations">
        <h1 class="section-title">
            Education
            <div class="title-decorator"></div>
        </h1>

        <table>
            <tr>
                <td class="education">
                    <div class="education-wrapper">
                        <div class="education-header">
                            <div class="grade-title">Computing Mathematics</div>
                            <div class="school-name">Simon Bolivar University</div>
                            <img src="{{ public_path('/images/resume_themes/theme511/social_icons/education-icon.png') }}" alt="" class="education-icon">
                        </div>
                        <div class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium eius assumenda quas possimus ab, labore dolor. Culpa earum officiis, maxime eos quo similique dignissimos ad totam voluptates quae molestias facilis.</div>
                        <div class="date">2014 - 2019</div>
                    </div>
                </td>
                <td class="education">
                    <div class="education-wrapper">
                        <div class="education-header">
                            <div class="grade-title">Computing Mathematics</div>
                            <div class="school-name">Simon Bolivar University</div>
                            <img src="{{ public_path('/images/resume_themes/theme511/social_icons/education-icon.png') }}" alt="" class="education-icon">
                        </div>
                        <div class="description">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non, maiores ex numquam officia nisi molestiae ducimus suscipit veritatis odit, tempora nostrum provident eius.</div>
                        <div class="date">2014 - 2019</div>
                    </div>
                </td>
            </tr>
        </table>
        
        <table>
            <tr>
                <td class="education">
                    <div class="education-wrapper">
                        <div class="education-header">
                            <div class="grade-title">Computing Mathematics</div>
                            <div class="school-name">Simon Bolivar University</div>
                            <img src="{{ public_path('/images/resume_themes/theme511/social_icons/education-icon.png') }}" alt="" class="education-icon">
                        </div>
                        <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis esse facere earum animi, architecto fugit sit inventore.</div>
                        <div class="date">2014 - 2019</div>
                    </div>
                </td>
                <td class="education">
                    <div class="education-wrapper">
                        <div class="education-header">
                            <div class="grade-title">Computing Mathematics</div>
                            <div class="school-name">Simon Bolivar University</div>
                            <img src="{{ public_path('/images/resume_themes/theme511/social_icons/education-icon.png') }}" alt="" class="education-icon">
                        </div>
                        <div class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
                        <div class="date">2014 - 2019</div>
                    </div>
                </td>
            </tr>
        </table>
    </section>

    <section class="skills">
        <h1 class="section-title">
            Skills
            <div class="title-decorator"></div>
        </h1>

        <table>
            <tr>
                <td class="skill">
                    <div class="skill-wrapper">
                        <div class="skill-name">NodeJS</div>
                        <div class="decorator"></div>
                        <div class="percentage">80%</div>
                        <img src="{{ public_path('/images/resume_themes/theme511/social_icons/skill-icon.png') }}" alt="" class="skill-icon">
                    </div>
                </td>
                <td class="skill">
                    <div class="skill-wrapper">
                        <div class="skill-name">Laravel</div>
                        <div class="decorator"></div>
                        <div class="percentage">70%</div>
                        <img src="{{ public_path('/images/resume_themes/theme511/social_icons/skill-icon.png') }}" alt="" class="skill-icon">
                    </div>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="skill">
                    <div class="skill-wrapper">
                        <div class="skill-name">Javascript</div>
                        <div class="decorator"></div>
                        <div class="percentage">90%</div>
                        <img src="{{ public_path('/images/resume_themes/theme511/social_icons/skill-icon.png') }}" alt="" class="skill-icon">
                    </div>
                </td>
                <td class="skill">
                    <div class="skill-wrapper">
                        <div class="skill-name">Python</div>
                        <div class="decorator"></div>
                        <div class="percentage">50%</div>
                        <img src="{{ public_path('/images/resume_themes/theme511/social_icons/skill-icon.png') }}" alt="" class="skill-icon">
                    </div>
                </td>
            </tr>
        </table>
    </section>
</body>
</html>