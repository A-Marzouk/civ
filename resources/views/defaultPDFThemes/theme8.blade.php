<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        @font-face {
            font-family: 'Thabit';
            src: url({{ public_path('/fonts/Thabit/thabit/Thabit.ttf') }}) format("truetype");
            /* font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
            font-style: normal; // use the matching font-style here */
        }
        
        @font-face {
            font-family: 'Thabit Bold';
            src: url({{ public_path('/fonts/Thabit/thabit/Thabit-Bold.ttf') }}) format("truetype");
            /* font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
            font-style: normal; // use the matching font-style here */
        }

        html,
        body {
            margin: 0;
            padding: 0;
            background-image: url('/images/resume_themes/theme8/background.png');
        }

        main {
            color: white;
            font-family: 'Thabit', 'Courier New', Courier, monospace;
        }

        .theme-header {
            padding: 65px 65px 0;
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
            font-size: 40px;
            font-family: 'Thabit', 'Courier New', Courier, monospace;
            vertical-align: top;
            color: #005BD1;
        }

        .user-profession {
            font-size: 21px;
            line-height: 0px;
            margin-top: 15px;
            /* identical to box height, or 0% */
        }

        .user-contact {
            padding-top: 25px;
        }

        .user-contact .contact {
            font-size: 14px;
            color: #005BD1;
            margin-bottom: 2px;
            vertical-align: middle;
        }

        .user-contact a {
            color: #005BD1;
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
            color: #005BD1;
            vertical-align: middle;
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

        /* Theme body */

        section {
            margin-top: 40px;
        }

        .section-title {
            font-size: 40px;
            font-family: 'Thabit Bold', 'Courier New', Courier, monospace;
            padding: 25px 65px;
            color: #005bd1;
            width: 100vw;
            background: #333232;
        }

        .container {
            font-size: 16px;
            padding: 30px 65px 0;
        }

        /* Work Experience and Education */

        .work-experience .work,
        .education .school {
            background: #333232;
            border-radius: 20px;
            padding: 20px 30px 40px;
        }

        .company-name,
        .school-name {
            font-size: 40px;
            line-height: 45px;
            margin-bottom: 5px;
        }

        .job-title,
        .grade-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .education .date,
        .work-experience .date {
            color: #005bd1;
            font-size: 18px;
            font-style: italic;
            margin-bottom: 20px;
        }

        .education table td,
        .work-experience table td {
            border-bottom: 35px solid transparent;
        }

        .education table:last-child td,
        .work-experience table:last-child td {
            border-bottom: 0;
        }

        .education table td:last-child,
        .work-experience table td:last-child {
            border-left: 22px solid transparent;
        }
        
        .education table td:first-child,
        .work-experience table td:first-child {
            border-right: 22px solid transparent;
        }

        .skills table {
            width: 100%;
        }

        .skills table td {
            width: 50%;
        }

        .skills table td {
            border-bottom: 22px solid transparent;
        }
        
        .skills table:last-child td {
            border-bottom: 0;
        }

        .skills table td:last-child {
            border-left: 22px solid transparent;
        }
        
        .skills table td:first-child {
            border-right: 22px solid transparent;
        }

        .skill {
            background: #333232;
            border-radius: 20px;
            padding: 49px 38px;
        }

        .skill-data {
            font-size: 40px;
        }

        .skill .percentage {
            text-align: right;
        }

        .skill-bar {
            position: relative;
            background: #C4C4C4;
            height: 22px;
            border-radius: 10px;
            margin-top: 25px;
        }

        .skill-bar .fill {
            background: #005BD1;
            height: 22px;
            border-radius: 10px;
        }

        .page-break {
            page-break-after: always;
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
                        <a href="https://behance.net">
                            <div class="img-wrapper">
                                <img src="{{ public_path('images/resume_themes/theme8/behance-icon.png') }}" alt="">
                            </div>
                            Behance username
                        </a>
                    </div>
                    <div class="social">
                        <a href="https://dribbble.com">
                            <div class="img-wrapper">
                                <img src="{{ public_path('images/resume_themes/theme8/dribbble-icon.png') }}" alt="">
                            </div>
                            Dribbble username
                        </a>
                    </div>
                    <div class="social">
                        <a href="https://instagram.com">
                            <div class="img-wrapper">
                                <img src="{{ public_path('images/resume_themes/theme8/instagram-icon.png') }}" alt="">
                            </div>
                            Instagram username
                        </a>
                    </div>
                    <div class="social">
                        <a href="https://behance.net">
                            <div class="img-wrapper">
                                <img src="{{ public_path('images/resume_themes/theme8/linkedin-icon.png') }}" alt="">
                            </div>
                            LinkedIn username
                        </a>
                    </div>
                </td>
            </table>
        </div>
        <section class="about">
            <h1 class="section-title">About Me</h1>
            <div class="container">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Labore, obcaecati. Minima blanditiis animi quia distinctio illo asperiores officiis, iste culpa ullam nostrum neque? Molestias eaque et natus, tempora a quasi.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde repudiandae voluptatem reiciendis velit nulla autem veniam voluptates quo earum deleniti ipsum itaque, obcaecati facere neque nihil, consequuntur id dolores labore!</p>
            </div>
        </section>
        <section class="work-experience">
            <h1 class="section-title">Work Experience</h1>
            <div class="container">
                <table>
                    <tr>
                        <td>
                            <div class="work">
                                <div class="company-name">Civie</div>
                                <div class="job-title">Fullstack Developer</div>
                                <div class="date">2019 - Now</div>
                                <div class="description">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat in quaerat aperiam dignissimos eos. Sit, est obcaecati laboriosam nulla, a ipsum saepe fugit, suscipit placeat dolore nostrum deserunt amet veritatis.
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="work">
                                <div class="company-name">Civie</div>
                                <div class="job-title">Fullstack Developer</div>
                                <div class="date">2019 - Now</div>
                                <div class="description">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat in quaerat aperiam dignissimos eos. Sit, est obcaecati laboriosam nulla, a ipsum saepe fugit, suscipit placeat dolore nostrum deserunt amet veritatis.
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>
                            <div class="work">
                                <div class="company-name">Civie</div>
                                <div class="job-title">Fullstack Developer</div>
                                <div class="date">2019 - Now</div>
                                <div class="description">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat in quaerat aperiam dignissimos eos. Sit, est obcaecati laboriosam nulla, a ipsum saepe fugit, suscipit placeat dolore nostrum deserunt amet veritatis.
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="work">
                                <div class="company-name">Civie</div>
                                <div class="job-title">Fullstack Developer</div>
                                <div class="date">2019 - Now</div>
                                <div class="description">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat in quaerat aperiam dignissimos eos. Sit, est obcaecati laboriosam nulla, a ipsum saepe fugit, suscipit placeat dolore nostrum deserunt amet veritatis.
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </section>
        <section class="education">
            <h1 class="section-title">Education</h1>
            <div class="container">
                <table>
                    <tr>
                        <td>
                            <div class="school">
                                <div class="school-name">Simon Bolivar University</div>
                                <div class="grade-title">Computing Mathematics</div>
                                <div class="date">2014 - 2019</div>
                                <div class="description">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat in quaerat aperiam dignissimos eos. Sit, est obcaecati laboriosam nulla, a ipsum saepe fugit.
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="school">
                                <div class="school-name">Simon Bolivar University</div>
                                <div class="grade-title">Computing Mathematics</div>
                                <div class="date">2014 - 2019</div>
                                <div class="description">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat in quaerat aperiam dignissimos eos. Sit, est obcaecati laboriosam nulla, a ipsum saepe fugit.
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>
                            <div class="school">
                                <div class="school-name">Simon Bolivar University</div>
                                <div class="grade-title">Computing Mathematics</div>
                                <div class="date">2014 - 2019</div>
                                <div class="description">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat in quaerat aperiam dignissimos eos. Sit, est obcaecati laboriosam nulla, a ipsum saepe fugit.
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="school">
                                <div class="school-name">Simon Bolivar University</div>
                                <div class="grade-title">Computing Mathematics</div>
                                <div class="date">2014 - 2019</div>
                                <div class="description">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat in quaerat aperiam dignissimos eos. Sit, est obcaecati laboriosam nulla, a ipsum saepe fugit.
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
                                <table class="skill-data">
                                    <tr>
                                        <td class="skill-name">Node.js</td>
                                        <td class="percentage">84%</td>
                                    </tr>
                                </table>
                                <div class="skill-bar">
                                    <div class="fill" style="width: 84%"></div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="skill">
                                <table class="skill-data">
                                    <tr>
                                        <td class="skill-name">Laravel</td>
                                        <td class="percentage">70%</td>
                                    </tr>
                                </table>
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
                                <table class="skill-data">
                                    <tr>
                                        <td class="skill-name">Node.js</td>
                                        <td class="percentage">84%</td>
                                    </tr>
                                </table>
                                <div class="skill-bar">
                                    <div class="fill" style="width: 84%"></div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="skill">
                                <table class="skill-data">
                                    <tr>
                                        <td class="skill-name">Laravel</td>
                                        <td class="percentage">70%</td>
                                    </tr>
                                </table>
                                <div class="skill-bar">
                                    <div class="fill" style="width: 70%"></div>
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