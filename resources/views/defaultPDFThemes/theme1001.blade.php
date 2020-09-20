<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Theme 1001</title>
    <style>
        @font-face {
            font-family: 'Mulish Bold';
			src: url({{ public_path('fonts/Mulish/static/Mulish-Bold.ttf') }}) format("truetype");
            font-weight: normal;
        }
        
        @font-face {
            font-family: 'Mulish SemiBold';
			src: url({{ public_path('fonts/Mulish/static/Mulish-SemiBold.ttf') }}) format("truetype");
            font-weight: normal;
        }
        
        @font-face {
            font-family: 'Mulish Medium';
			src: url({{ public_path('fonts/Mulish/static/Mulish-Medium.ttf') }}) format("truetype");
            font-weight: normal;
        }
        
        @font-face {
            font-family: 'Mulish Regular';
			src: url({{ public_path('fonts/Mulish/static/Mulish-Regular.ttf') }}) format("truetype");
            font-weight: normal;
        }

        html {
            margin: 0;
        }

        body {
            background-color: #fff;
        }

        .theme-header {
            padding: 25px 50px 30px;
            background-image: url('/images/resume_themes/theme10001/bg-header.png');
            background-color: #3D5ED4;
            width: 100%;
            position: relative;
            color: #F3F5FC;
        }

        .theme-header .user-img {
            width: 250px;
            border-radius: 126px;
            position: absolute;
            border: 2px solid #fff;
        }

        .theme-header .user-name {
            font-family: 'Mulish Bold', Arial, Helvetica, sans-serif;
            font-size: 30px;
            margin-top: -15px;
        }

        .theme-header .user-profession {
            font-family: 'Mulish Regular', Arial, Helvetica, sans-serif;
            font-size: 26px;
            margin-top: -2px;
            margin-bottom: 10px;
        }

        .theme-header .user-data {
            margin-left: 270px;
        }

        .theme-header .user-personal {
            width: 450px;
            padding-top: 40px;
            vertical-align: top;
        }

        .theme-header .user-data a {
            color: #fff;
            font-family: 'Mulish Regular', Arial, Helvetica, sans-serif;
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
            height: 30px;
            margin-top: 2px;
            margin-right: 10px;
        }

        section {
            padding: 70px 50px 0;
            width: 100%;
            font-family: 'Mulish Regular', Arial, Helvetica, sans-serif;
            font-size: 16px;
            color: #838BA4;
            margin-left: 50px;
        }

        section .section-title {
            font-family: 'Mulish SemiBold', Arial, Helvetica, sans-serif;
            font-size: 25px;
            width: 180px;
            height: 48px;
            padding-top: 12px;
            /* padding-left: 50px; */
            margin-left: -50px;
            color: #F3F5FC;
            text-align: center;
            background-color: #3D5ED4;
        }

        section .section-title .title-decorator {
            display: none;            
            height: 5px;
            margin-top: 13px;
            margin-left: -3px;
            border-radius: 2.5px;
            background-color: #F3F5FC;
        }

        .about .section-title .title-decorator {
            width: 80px;
        }

        /* Work and Education */

        .work-experience .section-title .title-decorator {
            width: 140px;
        }
        
        .educations .section-title .title-decorator {
            width: 128px;
        }

        .work,
        .education {
            border-bottom: 50px solid transparent;
            border-top: 10px solid transparent;
            border-left: 30px solid transparent;
            border-right: 20px solid transparent;
            width: 50%;
            vertical-align: top;
        }

        .work:last-child,
        .education:last-child {
            border-right: 0px solid transparent;
            border-left: 50px solid transparent;
        }

        .work-wrapper,
        .education-wrapper {
            padding: 30px;
            border-radius: 20px;
            vertical-align: top;
        }

        .work .work-header,
        .education .education-header {
            position: relative;
        }

        .work-header .decorator,
        .education-header .decorator {
            display: none;
            height: 1px;
            background-color: #BEC2D4;
            width: 40px;
            position: absolute;
            left: -47px;
            top: 22px;
        }

        .work .work-header .work-icon,
        .education .education-header .education-icon {
            display: none;
            height: 0;
            width: 0;
            position: absolute;
            left: -85px;
            top: 10px;
        }

        .work .job-title,
        .education .grade-title {
            color: #172C7A;
            font-family: 'Mulish SemiBold', Arial, Helvetica, sans-serif;
            font-size: 18px;
            padding-right: 100px;
            margin-top: 30px;
            position: relative;
        }

        .job-title .decorator,
        .grade-title .decorator {
            display: none;
            position: absolute;
            left: -25px;
            top: 10px;
            background-color: #172C7A;
            height: 15px;
            width: 15px;
            border-radius: 7.5px;
        }

        .job-title .badge,
        .grade-title .badge {
            position: absolute;
            right: 40px;
            top: -5px;
            color: #F8AE11;
            height: 30px;
            padding: 0 14px;
            margin-top: 4px;
            border-radius: 15px;
            font-family: 'Mulish Regular', Arial, Helvetica, sans-serif;
            font-size: 15px;
            background-color: #FDEAC1;
        }

        .work-header .company-name,
        .education-header .school-name {
            color: #172C7A;
            font-family: 'Mulish Bold', Arial, Helvetica, sans-serif;
            font-size: 22px;
            padding-right: 100px;
        }

        .work .description,
        .education .description {
            margin-top: 10px;
        }

        .work .date,
        .education .date {
            position: absolute;
            right: 40px;
            top: 10px;
            color: #838BA4;
            font-family: 'Mulish Regular', Arial, Helvetica, sans-serif;
            font-size: 14px;
        }

        /* Skills and Languages */
        .skills .section-title .title-decorator, {
            width: 80px;
        }

        .languages .section-title .title-decorator, {
            width: 140px;
        }

        .skills table,
        .languages table {
            width: 100%;
        }

        .skills table td,
        .languages table td {
            width: 50%;
        }

        .skills table td,
        .languages table td {
            border-bottom: 0 solid transparent;
        }
        
        .skills table:last-child td,
        .languages table:last-child td {
            border-bottom: 0;
        }

        .skills table td:last-child,
        .languages table td:last-child {
            border-left: 22px solid transparent;
        }
        
        .skills table td:first-child,
        .languages table td:first-child {
            border-right: 22px solid transparent;
        }

        .skills .container,
        .languages .container {
            margin-top: 50px;
        }

        .skill,
        .language {
            padding: 15px 58px;
            font-family: 'Mulish Bold', Arial, Helvetica, sans-serif;
            font-size: 22px;
        }

        .skill-data,
        .language-data {
            color: #172C7A;
            position: relative;
            margin-bottom: 20px;
        }

        .skill .percentage,
        .language .percentage {
            position: absolute;
            right: 0;
            top: 4px;
            color: #F8AB08;
        }

        .skill-bar,
        .language-bar {
            position: relative;
            background: #D3D6E4;
            height: 10px;
            border-radius: 5px;
            margin-top: 5px;
        }

        .skill-bar .fill,
        .language-bar .fill {
            background: #3D5ED4;
            height: 10px;
            border-radius: 5px;
        }

    </style>
</head>
<body>

    <div class="theme-header">
        <img src="{{ public_path('/images/resume_builder/default-user.jpg') }}" alt="" class="user-img" />
        <table class="user-data">
            <tr>
                <td class="user-personal">
                    <div class="user-name">Jose Daniel Quintero</div>
                    <div class="user-profession">Fullstack Developer</div>
                    <div class="user-info">
                        <a href="#">94 Green Street Road, 7NB, London</a>
                        <a href="#">+880 1462849317</a>
                        <a href="#">josedanq100@gmail.com</a>
                    </div>
                </td>
                <td class="user-social">
                    <a href="https://behance.com" class="social-link"><img src="{{ public_path('/images/resume_themes/theme1001/social_icons/behance-icon.png') }}" alt="">Behance username</a>
                    <a href="https://dribbble.com" class="social-link"><img src="{{ public_path('/images/resume_themes/theme1001/social_icons/dribbble-icon.png') }}" alt="">Dribbble username</a>
                    <a href="https://facebook.com" class="social-link"><img src="{{ public_path('/images/resume_themes/theme1001/social_icons/facebook-icon.png') }}" alt="">Facebook username</a>
                    <a href="https://linkedin.com" class="social-link"><img src="{{ public_path('/images/resume_themes/theme1001/social_icons/linkedin-icon.png') }}" alt="">LinkedIn username</a>
                </td>
            </tr>
        </table>
    </div>

    <section class="about">
        <h1 class="section-title">
            About
            {{-- <div class="title-decorator"></div> --}}
        </h1>

        <div class="content">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, cum maxime, libero molestiae fugit vel quas laudantium soluta facere blanditiis rem similique numquam consequatur odio illum ut. Amet, laborum! Voluptatem.</p>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis quisquam eum temporibus fuga deserunt esse qui exercitationem reiciendis delectus inventore expedita fugiat ipsum aut odit sequi cum, earum perferendis. Maxime?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima possimus ea sint omnis reprehenderit ex quasi ut perspiciatis quae architecto! Modi quibusdam at delectus dolor quidem, iusto neque ab explicabo!</p>
        </div>
    </section>

    <section class="work-experience">
        <h1 class="section-title">
            Experience
            {{-- <div class="title-decorator"></div> --}}
        </h1>

        <table>
            <tr>
                <td class="work">
                        <div class="work-header">
                            <div class="company-name">Civie</div>
                            <div class="decorator"></div>
                            {{-- <img src="{{ public_path('/images/resume_themes/theme1001/work-icon.png') }}" alt="" class="work-icon"> --}}
                            <div class="date">2019 - Now</div>
                        </div>
                        <div class="job-title">
                            <div class="decorator"></div>Fullstack Developer
                            <div class="badge">Full Time</div>
                        </div>
                        <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem molestias minima eveniet atque.</div>
                        <div class="job-title">
                            <div class="decorator"></div>Fullstack Developer Jr.
                            <div class="badge">Full Time</div>
                        </div>
                        <div class="description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores, ea. Cum id dicta, sunt fugiat atque tempore quaerat.</div>
                </td>
                <td class="work">
                        <div class="work-header">
                            <div class="company-name">Civie</div>
                            <div class="decorator"></div>
                            {{-- <img src="{{ public_path('/images/resume_themes/theme1001/work-icon.png') }}" alt="" class="work-icon"> --}}
                            <div class="date">2019 - Now</div>
                        </div>
                        <div class="job-title">
                            <div class="decorator"></div>Fullstack Developer
                            <div class="badge">Full Time</div>
                        </div>
                        <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem molestias minima eveniet atque.</div>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="work">
                        <div class="work-header">
                            <div class="company-name">Civie</div>
                            <div class="decorator"></div>
                            {{-- <img src="{{ public_path('/images/resume_themes/theme1001/work-icon.png') }}" alt="" class="work-icon"> --}}
                            <div class="date">2019 - Now</div>
                        </div>
                        <div class="job-title">
                            <div class="decorator"></div>Fullstack Developer
                            <div class="badge">Full Time</div>
                        </div>
                        <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
                        <div class="job-title">
                            <div class="decorator"></div>Frontend Developer
                            <div class="badge">Full Time</div>
                        </div>
                        <div class="description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ea optio unde, suscipit fugiat laborum cupiditate voluptas veniam.</div>
                </td>
                <td class="work">
                        <div class="work-header">
                            <div class="company-name">Civie</div>
                            <div class="decorator"></div>
                            {{-- <img src="{{ public_path('/images/resume_themes/theme1001/work-icon.png') }}" alt="" class="work-icon"> --}}
                            <div class="date">2019 - Now</div>
                        </div>
                        <div class="job-title">
                            <div class="decorator"></div>Fullstack Developer
                            <div class="badge">Full Time</div>
                        </div>
                        <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque eligendi illo aspernatur corrupti? Est, nesciunt reiciendis beatae.</div>
                </td>
            </tr>
        </table>
    </section>

    <section class="educations">
        <h1 class="section-title">
            Education
            {{-- <div class="title-decorator"></div> --}}
        </h1>

        <table>
            <tr>
                <td class="education">
                    <div class="education-wrapper">
                        <div class="education-header">
                            <div class="school-name">Simon Bolivar University</div>
                            <div class="decorator"></div>
                            {{-- <img src="{{ public_path('/images/resume_themes/theme1001/education-icon.png') }}" alt="" class="education-icon"> --}}
                            <div class="date">2014 - 2019</div>
                        </div>
                        <div class="grade-title">Computing Mathematics</div>
                        <div class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium eius assumenda quas possimus ab, labore dolor. Culpa earum officiis, maxime eos quo similique dignissimos ad totam voluptates quae molestias facilis.</div>
                    </div>
                </td>
                <td class="education">
                    <div class="education-wrapper">
                        <div class="education-header">
                            <div class="school-name">Simon Bolivar University</div>
                            <div class="decorator"></div>
                            {{-- <img src="{{ public_path('/images/resume_themes/theme1001/education-icon.png') }}" alt="" class="education-icon"> --}}
                            <div class="date">2014 - 2019</div>
                        </div>
                        <div class="grade-title">Computing Mathematics</div>
                        <div class="description">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non, maiores ex numquam officia nisi molestiae ducimus suscipit veritatis odit, tempora nostrum provident eius.</div>
                    </div>
                </td>
            </tr>
        </table>
        
        <table>
            <tr>
                <td class="education">
                    <div class="education-wrapper">
                        <div class="education-header">
                            <div class="school-name">Simon Bolivar University</div>
                            <div class="decorator"></div>
                            {{-- <img src="{{ public_path('/images/resume_themes/theme1001/education-icon.png') }}" alt="" class="education-icon"> --}}
                            <div class="date">2014 - 2019</div>
                        </div>
                        <div class="grade-title">Computing Mathematics</div>
                        <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis esse facere earum animi, architecto fugit sit inventore.</div>
                    </div>
                </td>
                <td class="education">
                    <div class="education-wrapper">
                        <div class="education-header">
                            <div class="school-name">Simon Bolivar University</div>
                            <div class="decorator"></div>
                            {{-- <img src="{{ public_path('/images/resume_themes/theme1001/education-icon.png') }}" alt="" class="education-icon"> --}}
                            <div class="date">2014 - 2019</div>
                        </div>
                        <div class="grade-title">Computing Mathematics</div>
                        <div class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
                    </div>
                </td>
            </tr>
        </table>
    </section>

    <section class="skills">
        <h1 class="section-title">
            Skills
            {{-- <div class="title-decorator"></div> --}}
        </h1>

        <div class="container">
            <table>
                <tr>
                    <td>
                        <div class="skill">
                            <div class="skill-data">
                                <div class="skill-name">Node.js</div>
                                <div class="percentage">84%</div>
                            </div>
                            <div class="skill-bar">
                                <div class="fill" style="width: 84%"></div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="skill">
                            <div class="skill-data">
                                <div class="skill-name">Laravel</div>
                                <div class="percentage">70%</div>
                            </div>
                            <div class="skill-bar">
                                <div class="fill" style="width: 70%"></div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>
                        <div class="skill">
                            <div class="skill-data">
                                <div class="skill-name">C++</div>
                                <div class="percentage">86%</div>
                            </div>
                            <div class="skill-bar">
                                <div class="fill" style="width: 86%"></div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="skill">
                            <div class="skill-data">
                                <div class="skill-name">MySQL</div>
                                <div class="percentage">90%</div>
                            </div>
                            <div class="skill-bar">
                                <div class="fill" style="width: 90%"></div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>
                        <div class="skill">
                            <div class="skill-data">
                                <div class="skill-name">Python</div>
                                <div class="percentage">72%</div>
                            </div>
                            <div class="skill-bar">
                                <div class="fill" style="width: 72%"></div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="skill">
                            <div class="skill-data">
                                <div class="skill-name">MongoDB</div>
                                <div class="percentage">70%</div>
                            </div>
                            <div class="skill-bar">
                                <div class="fill" style="width: 70%"></div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </section>
    <section class="languages">
        <h1 class="section-title">
            Languages
            {{-- <div class="title-decorator"></div> --}}
        </h1>

        <div class="container">
            <table>
                <tr>
                    <td>
                        <div class="language">
                            <div class="language-data">
                                <div class="language-name">Spanish</div>
                                <div class="percentage">100%</div>
                            </div>
                            <div class="language-bar">
                                <div class="fill" style="width: 100%"></div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="language">
                            <div class="language-data">
                                <div class="language-name">English</div>
                                <div class="percentage">70%</div>
                            </div>
                            <div class="language-bar">
                                <div class="fill" style="width: 70%"></div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </section>
</body>
</html>