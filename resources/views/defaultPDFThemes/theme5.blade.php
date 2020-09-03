<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Theme 5 PDF</title>

    <style>
        @font-face {
            font-family: 'Noto Sans';
            src: url({{ public_path('/fonts/Noto_Sans/NotoSans-Regular.ttf') }}) format("truetype");
            /* font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
            font-style: normal; // use the matching font-style here */
        }
        
        @font-face {
            font-family: 'Noto Sans Bold';
            src: url({{ public_path('/fonts/Noto_Sans/NotoSans-Bold.ttf') }}) format("truetype");
            /* font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
            font-style: normal; // use the matching font-style here */
        }

        html,
        body {
            margin: 0;
            padding: 0;
            background-color: #F1F1F1;
        }

        main {
            color: #707070;
            font-family: 'Noto Sans', Arial, Helvetica, sans-serif;
            padding: 40px 50px;
        }

        .theme-header {
            padding: 30px 30px 50px;
            border-radius: 25px;
            background-color: white;
        }

        .user-img img {
            border-radius: 115px;
            width: 230px;
            height: 230px;
        }

        .user-info {
            vertical-align: top;
            padding-left: 40px;
            width: 500px;
        }

        .user-name {
            font-size: 38px;
            font-family: 'Noto Sans Bold', Arial, Helvetica, sans-serif;
            vertical-align: top;
            color: #3C3748;
        }

        .user-profession {
            color: #3C3748;
            font-size: 24px;
            line-height: 0px;
            margin-top: 35px;
            /* identical to box height, or 0% */
        }

        .user-contact {
            padding-top: 25px;
        }

        .user-contact .contact {
            font-size: 18px;
            margin-bottom: 2px;
            vertical-align: middle;
        }

        .user-contact a {
            color: #6B6B6B;
            vertical-align: middle;
        }

        .no-decoration {
            text-decoration: none;
        }

        .user-contact .contact:last-child {
            margin-bottom: 0;
        }

        .user-contact .icon-wrapper {
            margin-right: 9px;
            margin-top: 5px;
            padding: 7px 4px;
            box-sizing: border-box;
            width: 17px;
            height: 11px;
            background-color: #F8F8F8;
            display: inline-block;
            border-radius: 13px;
            text-align: center;
            border: 1px solid rgb(228, 227, 227);
        }

        .user-contact .icon-wrapper img {
            height: 10px;
        }

        .user-social {
            font-size: 14px;
            line-height: 17px;
            width: 350px;
            padding-top: 55px;
        }

        .user-social a {
            color: #5F45FF;
            vertical-align: middle;
        }

        .user-social a[data-icon="linkedin"] img {
            margin-bottom: 5px;
        }

        .user-social .social {
            margin-bottom: 10px;
        }

        .user-social .social:last-child {
            margin-bottom: 0px;
        }

        .user-social .img-wrapper {
            display: inline-block;
            border-radius: 10px;
            margin-top: 5px;
            margin-right: 10px;
        }

        .user-social .img-wrapper img {
            width: 20px;
        }

        /* Sections */

        section {
            background-color: white;
            padding: 30px;
            border-radius: 25px;
            margin-top: 20px;
        }

        .section-title {
            background-color: #F8F8F8;
            padding: 35px 40px;
            font-size: 20px;
            border-radius: 8px;
            font-family: 'Noto Sans Bold', Arial, Helvetica, sans-serif;
            color: #1F5DE4;
            margin-bottom: 42px;
        }

        .work-experience {

        }

        .works {
            padding: 0 28px;
        }

        .work {
            padding: 0 88px 30px;
            border-left: dashed 1px #007BFF;
            position: relative;
        }

        .work:last-child {
            border: 0;
        }

        .work-header .decorator {
            background-color: #1F5DE4;
            height: 33px;
            width: 33px;
            border-radius: 16.5px;
            position: absolute;
            left: -16.5px;
            top: 0px;
        }

        .job-title,
        .grade-title {
            color: #3C3748;
            font-family: 'Noto Sans Bold', Arial, Helvetica, sans-serif;
            font-size: 24px;
        }
        
        .company-name {
            color: #3C3748;
            font-family: 'Noto Sans', Arial, Helvetica, sans-serif;
            font-size: 18px;        
            margin-bottom: 20px;
        }

        .school-name {
            color: #1F5DE4;
            font-family: 'Noto Sans', Arial, Helvetica, sans-serif;
            font-size: 18px;        
            margin-bottom: 20px;
        }

        .work .description,
        .education .description {
            color: #787878;
            font-size: 19px;
        }

        .education {
            border-radius: 8px;
            background-color: #F8F8F8;
            padding: 30px;
        }

        .educations table td:first-child {
            border-right: 10px solid transparent;
        }
        
        .educations table td:last-child {
            border-left: 10px solid transparent;
        }

        /* Skills */

        .skills-container > table td:first-child {
            border-right: 10px solid transparent;
        }
        
        .skills-container > table td:last-child {
            border-left: 10px solid transparent;
        }

        .skill {
            border-radius: 8px;
            background: #F8F8F8;
            width: 100%;
            padding: 40px 50px;
        }

        .skills-container > table {
            width: 100%;
        }

        .skills-row > tr > table {
            width: 50%;
        }

        .skill-percentage {
            text-align: right;
        }

        .skill {
            font-size: 25px;
            font-family: 'Noto Sans Bold', Arial, Helvetica, sans-serif;
        }

        /* About */
        .about .content {
            font-family: 'Noto Sans', Arial, Helvetica, sans-serif;
            font-size: 18px;
            padding:  0 100px 50px;
        }

        .about .content h2 {
            font-family: 'Noto Sans Bold', Arial, Helvetica, sans-serif;
            font-size: 24px;
            color: #3C3748;
        }

        .about .content .contact-item {
            color: #1F5DE4;
            font-size: 20px;
        }

    </style>
</head>
<body>
    <main>
        <div class="theme-header">
            <table>
                <td class="user-img">
                    <img src="{{ public_path('images/resume_builder/default-user.jpg') }}" alt="">
                </td>
                <td class="user-info">
                    <div class="user-name">José Quintero</div>
                    <div class="user-profession">Fullstack Developer</div>

                    <div class="user-contact">
                        <div class="contact">
                            <a href="" class='no-decoration'>
                                Av. Panteon, Caracas. Venezuela.
                            </a>
                        </div>
                        <div class="contact">
                            <a href="" class='no-decoration'>
                                +584241714022
                            </a>
                        </div>
                        <div class="contact">
                            <a href="https://civ.ie/josedan10" >
                                civ.ie/josedan10
                            </a>
                        </div>
                    </div>
                </td>

                <td class="user-social">
                    <div class="social">
                        <a data-icon="behance" href="https://behance.net">
                            <div class="img-wrapper">
                                <img src="{{ public_path('images/resume_themes/theme5/behance-icon.png') }}" alt="">
                            </div>
                            Behance username
                        </a>
                    </div>
                    <div class="social">
                        <a data-icon="dribble" href="https://dribbble.com">
                            <div class="img-wrapper">
                                <img src="{{ public_path('images/resume_themes/theme5/dribbble-icon.png') }}" alt="">
                            </div>
                            Dribbble username
                        </a>
                    </div>
                    <div class="social">
                        <a data-icon="isntagram" href="https://instagram.com">
                            <div class="img-wrapper">
                                <img src="{{ public_path('images/resume_themes/theme5/instagram-icon.png') }}" alt="">
                            </div>
                            Instagram username
                        </a>
                    </div>
                    <div class="social">
                        <a data-icon="linkedin" href="https://linkedin.com">
                            <div class="img-wrapper">
                                <img src="{{ public_path('images/resume_themes/theme5/linkedin-icon.png') }}" alt="">
                            </div>
                            LinkedIn username
                        </a>
                    </div>
                </td>
            </table>
        </div>

        <section class="work-experience">
            <div class="section-title">[ Work Experience ]</div>
            <div class="works">
                <div class="work">
                    <div class="work-header">
                        <div class="decorator"></div>
                        <div class="job-title">Fullstack Developer</div>
                        <div class="company-name">Google <span class="date">Dec 2019 - Present</span></div>
                        <div class="description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe ab exercitationem voluptates incidunt excepturi esse quis itaque? Animi modi magni repudiandae porro?</div>
                    </div>
                </div>
                <div class="work">
                    <div class="work-header">
                        <div class="decorator"></div>
                        <div class="job-title">Fullstack Developer</div>
                        <div class="company-name">Google <span class="date">Dec 2019 - Present</span></div>
                        <div class="description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe ab exercitationem voluptates incidunt excepturi esse quis itaque? Animi modi magni repudiandae porro?</div>
                    </div>
                </div>
                <div class="work">
                    <div class="work-header">
                        <div class="decorator"></div>
                        <div class="job-title">Fullstack Developer</div>
                        <div class="company-name">Google <span class="date">Dec 2019 - Present</span></div>
                        <div class="description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe ab exercitationem voluptates incidunt excepturi esse quis itaque? Animi modi magni repudiandae porro?</div>
                    </div>
                </div>
            </div>
        </section>
        <section class="education-experience">
            <div class="section-title">[ Education ]</div>
            <div class="educations">
                <table>
                    <tr>
                        <td>
                            <div class="education">
                                <div class="education-header">
                                    <div class="decorator"></div>
                                    <div class="grade-title">Fullstack Developer</div>
                                    <div class="school-name">Google <span class="date">Dec 2019 - Present</span></div>
                                    <div class="description">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="education">
                                <div class="education-header">
                                    <div class="decorator"></div>
                                    <div class="grade-title">Fullstack Developer</div>
                                    <div class="school-name">Google <span class="date">Dec 2019 - Present</span></div>
                                    <div class="description">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </section>
        
        @php
            function random_color_part() {
                return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
            }

            function random_color() {
                return random_color_part() . random_color_part() . random_color_part();
            }

            function generateUniqueRandomColor() {
                $rnd_color = random_color();

                if ($rnd_color != "F8F8F8") {
                    return $rnd_color;
                } else {
                    return generateUniqueRandomColor();
                }
            }
        @endphp

        <section class="skills">
            <div class="section-title">[ Skills ]</div>
            <div class="skills-container">
                <table class="skills-row">
                    <tr>
                        <td>
                            <table class="skill" style="color: {{ "#".generateUniqueRandomColor() }}">
                                <tr>
                                    <td class="skill-name">
                                        Php
                                    </td>
                                    <td class="skill-percentage">
                                        80%
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table class="skill" style="color: {{ "#".generateUniqueRandomColor() }}">
                                <tr>
                                    <td class="skill-name">
                                        Php
                                    </td>
                                    <td class="skill-percentage">
                                        80%
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table class="skills-row">
                    <tr>
                        <td>
                            <table class="skill" style="color: {{ "#".generateUniqueRandomColor() }}">
                                <tr>
                                    <td class="skill-name">
                                        Php
                                    </td>
                                    <td class="skill-percentage">
                                        80%
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table class="skill" style="color: {{ "#".generateUniqueRandomColor() }}">
                                <tr>
                                    <td class="skill-name">
                                        Php
                                    </td>
                                    <td class="skill-percentage">
                                        80%
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </section>

        <section class="about">
            <div class="section-title">[ About ]</div>
            <div class="content">
                <h2>About Me</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae incidunt inventore beatae pariatur. Nemo, sequi iste molestias, sint impedit, iusto consectetur cupiditate provident vel quasi incidunt nobis quisquam sunt ipsum!</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum a expedita eveniet! Modi, corporis necessitatibus. Autem blanditiis, vel magni in neque commodi enim harum quasi, tempora at rerum adipisci velit.</p>

                <div class="contact">
                    <h2>Contact</h2>
                    <div class="contact-item"><b>Gmail:</b> josedanq100@gmail.com</div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>