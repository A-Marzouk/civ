<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        @font-face {
            font-family: 'Fira';
            src: url({{ public_path('/fonts/fira-mono/FiraMono-Medium.ttf') }}) format("truetype");
            /* font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
            font-style: normal; // use the matching font-style here */
        }

        main {
            background-image: url('/images/resume_themes/theme8/background.png');
            color: white;
            font-family: 'Fira', 'Courier New', Courier, monospace;
        }

        .theme-header {
            padding: 10px;
        }

        .theme-header td {
            vertical-align: top;
        }

        .col-img {
            width: 170px;
        }

        .col-info {
            width: 362px;
            padding-top: 20px;
            padding-left: 10px;
        }

        .col-payment {
            width: 520px;
            padding-top: 25px;
        }

        .user-img {
            width: 170px;
            height: 170px;
        }

        .user-name {
            color: #005bd1;
            font-size: 30px;
            margin-top: -10px;
        }

        .user-profession {
            font-size: 20px;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        .social img {
            height: 25px;
        }

        .payment-details {
            width: 100%;
            margin-top: -10px;
        }

        .payment-details td {
            text-align: center;
        }

        .payment-details tr:last-child td {
            border-top: solid transparent 5px;
        }

        .payment-details div {
            font-size: 20px;
            margin-top: 8px;
        }

        .payment-details b {
            color: #005bd1;
            font-size: 26px;
        }

        .payment-details .hourly-rate,
        .payment-details .weekly-availability {
            margin-right: 10px;
            font-size: 24px;
            text-align: center;
        }

        .btn-hireMe {
            display: block;
            border: 0;
            border-radius: 31px;
            background-color: #005bd1;
            text-align: center;
            font-size: 18px;
            width: 200px;
            height: 62px;
            line-height: 35px;
            color: #fff;
            margin: 0 auto;
            text-decoration: none;
        }

        /* Theme body */

        section {
            padding: 0 40px;
        }

        .section-title {
            font-size: 28px;
            color: #005bd1;
            text-align: center;
        }

        .container {
            font-size: 16px;
        }

        /* Work Experience and Education */

        .company-name,
        .school-name {
            font-size: 22px;
            margin-bottom: 5px;
        }

        .job-title,
        .grade-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 2px;
        }

        .education .date,
        .work-experience .date {
            color: #005bd1;
            font-size: 18px;
            font-style: italic;
            margin-bottom: 10px;
        }

        .education table td,
        .work-experience table td {
            border-bottom: 35px solid transparent;
        }

        .education table tr:last-child td,
        .work-experience table tr:last-child td {
            border-bottom: 0;
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
                <td class="col-img">
                    <img class="user-img" src="{{public_path('images/resume_builder/default-user-round.png')}}" />
                </td>
                <td class="col-info">
                    <div class="user-name">José Quintero</div>
                    <div class="user-profession">Fullstack Developer</div>
                    <div class="social">
                        <a href="https://www.instagram.com/josedanqf" target="_blank">
                            <img src="{{ public_path('/images/resume_themes/theme8/instagram.png') }}" alt="instagram">
                        </a>
                        <a href="https://api.whatsapp.com/send?phone=584241714022
                        " target="_blank">
                            <img src="{{ public_path('/images/resume_themes/theme8/whatsapp.png') }}" alt="whatsapp">
                        </a>
                    </div>
                </td>
                <td class="col-payment">
                    <table class="payment-details">
                        <tr>
                            <td>
                                <div class="hourly-rate">
                                    <b>$8</b>
                                    <div>Hourly Rate</div>
                                </div>
                            </td>
                            <td>
                                <div class="weekly-availability">
                                    <b>40 Hrs</b>
                                    <div>Weekly Availability</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <a class="btn-hireMe" href="https://civ.ie/josedan10">
                                    Hire Me
                                </a>
                            </td>
                        </tr>
                    </table>   
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
                            <div class="company-name">Civie</div>
                            <div class="job-title">Fullstack Developer</div>
                            <div class="date">2019 - Now</div>
                            <div class="description">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat in quaerat aperiam dignissimos eos. Sit, est obcaecati laboriosam nulla, a ipsum saepe fugit, suscipit placeat dolore nostrum deserunt amet veritatis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque itaque dolorem dolorum eaque nesciunt facilis enim fugit odio maiores minima? Placeat optio mollitia earum asperiores perferendis voluptate rerum eveniet magnam!
                            </div>
                        </td>
                        <td>
                            <div class="company-name">Civie</div>
                            <div class="job-title">Fullstack Developer</div>
                            <div class="date">2019 - Now</div>
                            <div class="description">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat in quaerat aperiam dignissimos eos. Sit, est obcaecati laboriosam nulla, a ipsum saepe fugit, suscipit placeat dolore nostrum deserunt amet veritatis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque itaque dolorem dolorum eaque nesciunt facilis enim fugit odio maiores minima? Placeat optio mollitia earum asperiores perferendis voluptate rerum eveniet magnam!
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="company-name">Civie</div>
                            <div class="job-title">Fullstack Developer</div>
                            <div class="date">2019 - Now</div>
                            <div class="description">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat in quaerat aperiam dignissimos eos. Sit, est obcaecati laboriosam nulla, a ipsum saepe fugit, suscipit placeat dolore nostrum deserunt amet veritatis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque itaque dolorem dolorum eaque nesciunt facilis enim fugit odio maiores minima? Placeat optio mollitia earum asperiores perferendis voluptate rerum eveniet magnam!
                            </div>
                        </td>
                        <td>
                            <div class="company-name">Civie</div>
                            <div class="job-title">Fullstack Developer</div>
                            <div class="date">2019 - Now</div>
                            <div class="description">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat in quaerat aperiam dignissimos eos. Sit, est obcaecati laboriosam nulla, a ipsum saepe fugit, suscipit placeat dolore nostrum deserunt amet veritatis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque itaque dolorem dolorum eaque nesciunt facilis enim fugit odio maiores minima? Placeat optio mollitia earum asperiores perferendis voluptate rerum eveniet magnam!
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
                            <div class="school-name">Civie</div>
                            <div class="grade-title">Fullstack Developer</div>
                            <div class="date">2019 - Now</div>
                            <div class="description">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat in quaerat aperiam dignissimos eos. Sit, est obcaecati laboriosam nulla, a ipsum saepe fugit, suscipit placeat dolore nostrum deserunt amet veritatis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque itaque dolorem dolorum eaque nesciunt facilis enim fugit odio maiores minima? Placeat optio mollitia earum asperiores perferendis voluptate rerum eveniet magnam!
                            </div>
                        </td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </section>
        <div class="page-break"></div>
    </main>
</body>
</html>