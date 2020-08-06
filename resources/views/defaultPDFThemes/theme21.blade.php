<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @font-face {
            font-family: 'Raleway';
            src: url({{ public_path('/fonts/Raleway-Regular.ttf') }}) format("truetype");
            /* font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
            font-style: normal; // use the matching font-style here */
        }

        @font-face {
            font-family: 'Montserrat';
            src: url({{ public_path('/fonts/Montserrat/Montserrat-Regular.ttf') }}) format("truetype");
            /* font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
            font-style: normal; // use the matching font-style here */
        }

        @font-face {
            font-family: 'Montserrat Bold';
            src: url({{ public_path('/fonts/Montserrat/Montserrat-Bold.ttf') }}) format("truetype");
            /* font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
            font-style: normal; // use the matching font-style here */
        }
        
        @font-face {
            font-family: 'Actor';
            src: url({{ public_path('/fonts/Actor/Actor-Regular.ttf') }}) format("truetype");
            /* font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
            font-style: normal; // use the matching font-style here */
        }
        
        @font-face {
            font-family: 'Gotham Pro';
            src: url({{ public_path('/fonts/gotham-pro/GothamProRegular.ttf') }}) format("truetype");
            /* font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
            font-style: normal; // use the matching font-style here */
        }

        @page {
            margin: 56px 65px;
        }
        
        html {
            margin: 56px 65px;
        }

        main {
            font-family: Raleway, Arial, Helvetica, sans-serif;
        }
        
        .user-img img {
            border-radius: 20px;
            border: 6px solid rgba(209, 205, 199, 0.4);
            width: 160px;
            height: 160px;
        }

        .user-info {
            vertical-align: top;
            padding-left: 40px;
            width: 500px;
        }

        .user-name {
            font-size: 30px;
            font-family: 'Montserrat Bold', Arial, Helvetica, sans-serif;
            text-transform: uppercase;
            letter-spacing: 0.18em;
            vertical-align: top;
            color: #575757;
        }

        .user-profession {
            font-family: 'Montserrat', Arial, Helvetica, sans-serif;
            font-size: 12px;
            line-height: 0px;
            margin-top: 15px;
            /* identical to box height, or 0% */

            letter-spacing: 0.18em;
            color: #575757;
        }

        .user-contact {
            padding-top: 25px;
        }

        .user-contact .contact {
            font-size: 14px;
            color: #2B2B2B;
            margin-bottom: 2px;
            vertical-align: middle;
        }

        .user-contact a {
            color: #1D1D1D;
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
            font-family: 'Montserrat', Arial, Helvetica, sans-serif;
            width: 350px;
        }

        .user-social a {
            color: #1D1D1D;
            vertical-align: middle;
        }

        .user-social .social {
            margin-bottom: 10px;
        }

        .user-social .social:last-child {
            margin-bottom: 0px;
        }

        .user-social .img-wrapper {
            padding: 8px;
            display: inline-block;
            background: #F8F8F8;
            border-radius: 10px;
            margin-top: 5px;
            margin-right: 10px;
            border: 1px solid rgb(228, 227, 227);
        }

        section {
            margin-top: 60px;
        }

        .section-title {
            width: 303px;
            height: 72px;
            line-height: 55px;
            background: #F8F8F8;
            border: 4px solid rgb(228, 227, 227);
            border-radius: 15px;
            text-align: center;
            vertical-align: middle;
            color: #545454;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            font-size: 24px;
            font-family: 'Montserrat Bold', Arial, Helvetica, sans-serif;
        }

        .container {
            margin-left: 35px;
            margin-top: 40px;
            border-radius: 15px;
        }

        .about .container {
            background: #F8F8F8;
            border: 4px solid rgb(228, 227, 227);
            padding: 71px 40px;
            font-size: 14px;
            line-height: 15px;
            font-family: Raleway, Arial, Helvetica, sans-serif;
            color: #5B5B5B;
        }

        .about {
            margin-top: 40px;
        }

        .about .container p {
            margin-bottom: 20px;
            margin-top: 0;
        }

        .container p:last-child {
            margin-bottom: 0;
        }

        .work,
        .education {
            background: #F8F8F8;
            border: 4px solid rgb(228, 227, 227);
            padding: 50px 40px 40px 50px;
            border-radius: 15px;
            width: 100%;
        }

        .job-title,
        .grade-title {
            font-family: 'Gotham Pro', Arial, Helvetica, sans-serif;
            font-size: 18px;
            line-height: 17px;
            margin-bottom: 15px;
            color: #4F78E5;
        }

        .date {
            font-size: 12px;
            font-family: 'Montserrat', Arial, Helvetica, sans-serif;
            color: #474747;
            margin-bottom: 12px;
        }

        .company-name,
        .school-name {
            font-family: Actor, Arial, Helvetica, sans-serif;
            font-size: 24px;
            line-height: 14px;
            margin-bottom: 25px;
            /* or 58% */


            color: #474747;
        }

        .work .description,
        .education .description {
            font-size: 14px;
            line-height: 18px;
            font-family: Actor, Arial, Helvetica, sans-serif;
            /* or 58% */


            color: #474747;
        }

        .education-container table tr td:first-child,
        .work-experience table tr td:first-child {
            border-right: 30px solid transparent;
        }
        
        .education-container table tr td:last-child,
        .work-experience table tr td:last-child {
            border-left: 30px solid transparent;
        }
        
        .education-container table tr td,
        .work-experience table tr td {
            border-bottom: 40px solid transparent;
        }
        
        .education-container table:last-child tr td,
        .work-experience table:last-child tr td {
            border-bottom: 0;
        }

        .skill {
            border: 2px solid rgba(166, 166, 166, 0.1);
            border-radius: 15px;
        }

        .skill .inner-box {
            border-radius: 15px;
            border: 6px solid #fff;
            background: #F8F8F8;
            padding: 10px;
        }

        .skills table tr td {
            border: 10px 17.5px 10px 17.5px solid transparent;
        }
        
        .skills table tr td:first-child {
            border-left: 0;
        }
        
        .skills table tr td:last-child {
            border-right: 0;
        }
        
    </style>
</head>
<body>
    <main>
        <table class="theme-header">
            <tr>
                <td class="user-img">
                    <img src="{{ public_path('images/resume_builder/default-user.jpg') }}" alt="">
                </td>
                <td class="user-info">
                    <div class="user-name">José Quintero</div>
                    <div class="user-profession">Fullstack Developer</div>

                    <div class="user-contact">
                        <div class="contact">
                            <a href="" class='no-decoration'>
                                <div class="icon-wrapper">
                                    <img src="{{ public_path('images/resume_themes/theme21/location-icon.png') }}" alt="" class="icon" />
                                </div>
                                Av. Panteon, Caracas. Venezuela.
                            </a>
                        </div>
                        <div class="contact">
                            <a href="" class='no-decoration'>
                                <div class="icon-wrapper">
                                    <img src="{{ public_path('images/resume_themes/theme21/whatsapp-icon.png') }}" alt="" class="icon" />
                                </div>
                                +584241714022
                            </a>
                        </div>
                        <div class="contact">
                            <a href="https://civ.ie/josedan10" >
                                <div class="icon-wrapper">
                                    <img src="{{ public_path('images/resume_themes/theme21/google-icon.png') }}" alt="" class="icon" />
                                </div>
                                civ.ie/josedan10
                            </a>
                        </div>
                    </div>
                </td>

                <td class="user-social">
                    <div class="social">
                        <a href="https://behance.com">
                            <div class="img-wrapper">
                                <img src="{{ public_path('images/resume_themes/theme21/behance-icon.png') }}" alt="">
                            </div>
                            Behance username
                        </a>
                    </div>
                    <div class="social">
                        <a href="https://dribbble.com">
                            <div class="img-wrapper">
                                <img src="{{ public_path('images/resume_themes/theme21/dribbble-icon.png') }}" alt="">
                            </div>
                            Dribbble username
                        </a>
                    </div>
                    <div class="social">
                        <a href="https://instagram.com">
                            <div class="img-wrapper">
                                <img src="{{ public_path('images/resume_themes/theme21/instagram-icon.png') }}" alt="">
                            </div>
                            Instagram username
                        </a>
                    </div>
                    <div class="social">
                        <a href="https://behance.com">
                            <div class="img-wrapper">
                                <img src="{{ public_path('images/resume_themes/theme21/behance-icon.png') }}" alt="">
                            </div>
                            LinkedIn username
                        </a>
                    </div>
                </td>
            </tr>
        </table>
        <section class="about">
            <div class="section-title">ABOUT</div>
            <div class="container">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni consequatur, ex at est quibusdam hic numquam delectus repudiandae impedit veniam dignissimos, a expedita? Dolorem commodi tempore iste ullam, placeat nemo!</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates magni facere placeat aut odio beatae, non dolores quae aliquid commodi voluptas, molestias saepe alias accusantium ex laborum possimus, necessitatibus assumenda!</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi illo magni placeat, omnis suscipit odio ab quod? Voluptate eius accusamus voluptatibus non consequuntur reprehenderit ut sint, provident, incidunt aspernatur impedit.</p>
            </div>
        </section>

        <section class="work-experience">

            <div class="section-title">Work</div>
            
            <div class="container">
                <table>
                    <tr>
                        <td>
                            <div class="work">
                                <div class="date">
                                    <div class="decorator"></div>
                                    2019 - Now
                                </div>
                                <div class="job-title">Fullstack Developer</div>
                                <div class="company-name">Civie</div>
                                <div class="description">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi, veniam molestiae. Dolores tenetur sequi ratione est velit, dolore natus molestias quos optio quo saepe recusandae iste nulla neque accusamus officiis.
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="work">
                                <div class="date">
                                    <div class="decorator"></div>
                                    2019 - Now
                                </div>
                                <div class="job-title">Fullstack Developer</div>
                                <div class="company-name">Civie</div>
                                <div class="description">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi, veniam molestiae. Dolores tenetur sequi ratione est velit, dolore natus molestias quos optio quo saepe recusandae iste nulla neque accusamus officiis.
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>
                            <div class="work">
                                <div class="date">
                                    <div class="decorator"></div>
                                    2019 - Now
                                </div>
                                <div class="job-title">Fullstack Developer</div>
                                <div class="company-name">Civie</div>
                                <div class="description">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi, veniam molestiae. Dolores tenetur sequi ratione est velit, dolore natus molestias quos optio quo saepe recusandae iste nulla neque accusamus officiis.
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="work">
                                <div class="date">
                                    <div class="decorator"></div>
                                    2019 - Now
                                </div>
                                <div class="job-title">Fullstack Developer</div>
                                <div class="company-name">Civie</div>
                                <div class="description">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi, veniam molestiae. Dolores tenetur sequi ratione est velit, dolore natus molestias quos optio quo saepe recusandae iste nulla neque accusamus officiis.
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </section>

        <section class="education-container">

            <div class="section-title">Education</div>
            
            <div class="container">
                <table>
                    <tr>
                        <td>
                            <div class="education">
                                <div class="date">
                                    <div class="decorator"></div>
                                    2014 - 2019
                                </div>
                                <div class="grade-title">Computing mathematics and statistics</div>
                                <div class="school-name">Simon Bolivar University</div>
                                <div class="description">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi, veniam molestiae. Dolores tenetur sequi ratione est velit, dolore natus molestias quos optio quo saepe recusandae iste nulla neque accusamus officiis.
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="education">
                                <div class="date">
                                    <div class="decorator"></div>
                                    2014 - 2019
                                </div>
                                <div class="grade-title">Computing mathematics and statistics</div>
                                <div class="school-name">Simon Bolivar University</div>
                                <div class="description">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi, veniam molestiae. Dolores tenetur sequi ratione est velit, dolore natus molestias quos optio quo saepe recusandae iste nulla neque accusamus officiis.
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>
                            <div class="education">
                                <div class="date">
                                    <div class="decorator"></div>
                                    2014 - 2019
                                </div>
                                <div class="grade-title">Computing mathematics and statistics</div>
                                <div class="school-name">Simon Bolivar University</div>
                                <div class="description">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi, veniam molestiae. Dolores tenetur sequi ratione est velit, dolore natus molestias quos optio quo saepe recusandae iste nulla neque accusamus officiis.
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="education">
                                <div class="date">
                                    <div class="decorator"></div>
                                    2014 - 2019
                                </div>
                                <div class="grade-title">Computing mathematics and statistics</div>
                                <div class="school-name">Simon Bolivar University</div>
                                <div class="description">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi, veniam molestiae. Dolores tenetur sequi ratione est velit, dolore natus molestias quos optio quo saepe recusandae iste nulla neque accusamus officiis.
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </section>

        <section class="skills">
            <div class="section-title">Skills</div>
            <div class="container">
                <table>
                    <tr>
                        <td>
                            <div class="skill">
                                <div class="inner-box">
                                    <img src="{{ public_path('/images/resume_themes/theme21/illustrator-icon.png') }}" alt="">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="skill">
                                <div class="inner-box">
                                    <img src="{{ public_path('/images/resume_themes/theme21/photoshop-icon.png') }}" alt="">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="skill">
                                <div class="inner-box">
                                    <img src="{{ public_path('/images/resume_themes/theme21/sketch-icon.png') }}" alt="">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="skill">
                                <div class="inner-box">
                                    <img src="{{ public_path('/images/resume_themes/theme21/illustrator-icon.png') }}" alt="">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="skill">
                                <div class="inner-box">
                                    <img src="{{ public_path('/images/resume_themes/theme21/photoshop-icon.png') }}" alt="">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="skill">
                                <div class="inner-box">
                                    <img src="{{ public_path('/images/resume_themes/theme21/sketch-icon.png') }}" alt="">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="skill">
                                <div class="inner-box">
                                    <img src="{{ public_path('/images/resume_themes/theme21/illustrator-icon.png') }}" alt="">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="skill">
                                <div class="inner-box">
                                    <img src="{{ public_path('/images/resume_themes/theme21/photoshop-icon.png') }}" alt="">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="skill">
                                <div class="inner-box">
                                    <img src="{{ public_path('/images/resume_themes/theme21/sketch-icon.png') }}" alt="">
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </section>
    </main>
</body>
</html>