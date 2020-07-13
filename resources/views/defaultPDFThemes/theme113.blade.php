<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>

    <style>

        @font-face {
            font-family: 'Muli';
            src: url("/fonts/Muli-VariableFont_wght.ttf") format("truetype");
            /* font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
            font-style: normal; // use the matching font-style here */
        }

        main {
            font-family: Muli, Arial, Helvetica, sans-serif;
            width: 100%;
            color: #28404A;
        }

        /* Header */
        .theme-header {
            background-position: -10px 300px;
            background-image: url('/images/resume_themes/theme113/mainBg.png');
            background-color: #FFF7F3;
            padding: 10px;
        }

        .theme-header td {
            vertical-align: top;
            color: #28404A;
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
            padding-top: 78px;
        }

        .user-img {
            width: 170px;
            height: 170px;
        }

        .user-name {
            font-size: 30px;
            margin-bottom: 15px;
            margin-top: 0;
        }

        .user-profession {
            margin-bottom: 20px;
        }

        .user-profession,
        .user-skills {
            font-size: 20px; 
        }

        .user-skills span {
            display: inline-block;
            position: relative;
            margin-right: 20px;
        }

        .user-skills span i {
            position: absolute;
            width: 6px;
            height: 6px;
            background-color: #28404A;
            border-radius: 3px;
            margin-left: 6px;
            top: 10px;
        }

        .user-skills span:last-child i {
            display: none;
            margin-right: 0;
        }

        .payment-details {
            width: 100%;
        }

        .payment-details td:last-child {
            text-align: right;
            width: 200px;
        }

        .payment-details div {
            font-size: 16px;
            margin-top: 3px;
        }

        .payment-details .hourly-rate,
        .payment-details .weekly-availability {
            margin-right: 10px;
            font-size: 24px;
        }

        .btn-hireMe {
            display: block;
            border: 0;
            border-radius: 9px;
            background-color: #686299;
            text-align: center;
            font-size: 18px;
            width: 200px;
            height: 62px;
            line-height: 42px;
            color: #fff;
            text-decoration: none;
        }

        .btn-hireMe img {
            margin-top: 3px;
            margin-right: 3px;
        }

        /* Theme body */
        .container {
            background-color: white;
        }

        .container table {
            width: 100%;
        }

        .section-title {
            width: 100%;
            color: white;
            background-color: #686299;
            text-align: center;
            padding: 20px;
            font-size: 26px;
            margin: 0;
            border-radius: 15px 15px 0 0;
        }

        .container table td {
            border: 10px solid white;
            vertical-align: top;
        }

        /* Portfolio */

        .portfolio .section-title {
            margin: -10px 0 0 0;
        }
        .portfolio table td:last-child .work {
            margin-left: 140px;
        }

        .portfolio .work {
            margin-bottom: 60px
        }

        .portfolio .work .title {
            font-size: 20px;
            font-weight: bold;
        }

        .portfolio .work .description {
            margin-top: 20px;
            font-size: 16px;
        }

        .portfolio-img {
            margin-bottom: 40px;
            max-height: 450px;
            overflow: hidden;
            width: 100%;
            position: relative;
        }
        
        .portfolio-img img {
            width: 450px;
        }

        /* Work Experience and Education */
        .work-experience,
        .education {
            background-color: white;
        }

        .work-experience table,
        .education table {
            width: 100%;
        }
        
        .work-experience td,
        .education td {
            width: 50%;
            border: 10px solid red;
            border-right: 50px solid red;
            padding-top: 20px;
        }

        .work-experience td:last-child,
        .education td:last-child {
            width: 50%;
            border: 10px solid red;
            border-left: 50px solid red;
            padding-top: 20px;
        }

        .work-header > *,
        .education-header > * {
            display: inline-block;
        }

        .work-header .work-icon,
        .education-header .education-icon {
            border: 1px solid #BEC2D4;
            border-radius: 22px;
            height: 44px;
            width: 44px;
        }

        .work-header .work-icon img {
            margin-top: 13px;
            margin-left: 13px;
        }

        .education-header .education-icon img {
            margin-top: 13px;
            margin-left: 9px;
        }

        .work-header .decorator,
        .education-header .decorator {
            width: 48px;
            height: 1px;
            background-color: #BEC2D4;
            margin-top: -22px;
            margin-left: 12px;
            margin-right: 12px;
        }

        .work-header .company-name,
        .education-header .school-name {
            font-size: 22px;
            color: #28404A;
            margin-top: -8px;
            margin-right: 5px;
        }

        .work-header .date,
        .education-header .date {
            font-size: 16px;
            color: #838BA4;
            margin-top: -8px;
        }

        .work-body,
        .education-body {
            margin-top: 20px;
        }

        .work-body .job-title,
        .education-body .grade-title {
            color: #455A51;
            font-size: 18px;
        }

        .work-body .description ,
        .education-body .description {
            margin-top: 10px;
            font-size: 18px;
            line-height: 1.5;
            padding-bottom: 20px;
        }

        .about {
            background-color: white;
        }

        .container {
            padding: 20px;
        }

        .container p {
            line-height: 1.5;
            font-size: 18px;
            margin-bottom: 20px 30px;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <main>
        <table class="theme-header">
            <tr>
                <td class="col-img">
                    <img class="user-img" src="{{public_path('images/resume_builder/default-user-round.png')}}" />
                </td>
                <td class="col-info">
                    <div class="user-info">
                        <h1 class="user-name">José Quintero</h1>
                        <div class="user-profession">Fullstack Developer</div>
                        <div class="user-skills">
                            <span>NodeJS <i></i></span>
                            <span>VueJS <i></i></span>
                            <span>ReactJS <i></i></span>
                        </div>
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
                            <td>
                                <a class="btn-hireMe" href="https://civ.ie/preview-by-code/theme113">
                                    <img src="{{ public_path('/images/resume_themes/theme113/hireMe-icon.png') }}" alt="" />
                                    Hire Me
                                </a>
                            </td>
                        </tr>
                    </table>                
                </td>
        </table>
        <div class="theme-body">
            <section class="portfolio">
                <h1 class="section-title">Portfolio</h1>
                <div class="container">
                  <table>
                      <tr>
                          <td>
                            <div class="work">
                                <div class="portfolio-img">
                                    <img src="{{ public_path('/images/resume_themes/theme113/portfolio-img1.png') }}" alt="">
                                </div>
                                <div class="title">Work 1</div>
                                <div class="description">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, est illum.
                                </div>
                            </div>
                            <div class="work">
                                <div class="portfolio-img">
                                    <img src="{{ public_path('/images/resume_themes/theme113/portfolio-img3.png') }}" alt="">
                                </div>
                                <div class="title">Work 3</div>
                                <div class="description">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, est illum.
                                </div>
                            </div>
                          </td>
                          <td>
                            <div class="work">
                                <div class="portfolio-img">
                                    <img src="{{ public_path('/images/resume_themes/theme113/portfolio-img2.png') }}" alt="">
                                </div>
                                <div class="title">Work 2</div>
                                <div class="description">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, est illum.
                                </div>
                            </div>
                            <div class="work">
                                <div class="portfolio-img">
                                    <img src="{{ public_path('/images/resume_themes/theme113/portfolio-img4.png') }}" alt="">
                                </div>
                                <div class="title">Work 4</div>
                                <div class="description">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, est illum.
                                </div>
                            </div>
                          </td>
                      </tr>
                  </table>
                </div>
            </section>

            <div class="page-break"></div>

            <section class="work-experience">
                <h1 class="section-title">Work Experience</h1>
                <div class="container" style="padding-bottom: 50px">
                    <table>
                        <tr>
                            <td>
                                <div class="work-header">
                                    <div class="work-icon">
                                        <img src="{{ public_path('/images/resume_themes/theme113/work-exp-icon.png') }}" alt="">
                                    </div>
                                    <div class="decorator"></div>
                                    <div class="company-name">123workforce</div>
                                    <div class="date">2019 - Now</div>
                                </div>
                                <div class="work-body">
                                    <div class="job-title">Fullstack Developer</div>
                                    <div class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut repellat assumenda, odio numquam ducimus qui illo iure nesciunt beatae cum, doloribus tempore provident similique amet reprehenderit voluptates nihil vitae voluptas.</div>
                                </div>
                            </td>
                            <td>
                                <div class="work-header">
                                    <div class="work-icon">
                                        <img src="{{ public_path('/images/resume_themes/theme113/work-exp-icon.png') }}" alt="">
                                    </div>
                                    <div class="decorator"></div>
                                    <div class="company-name">123workforce</div>
                                    <div class="date">2019 - Now</div>
                                </div>
                                <div class="work-body">
                                    <div class="job-title">Fullstack Developer</div>
                                    <div class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut repellat assumenda, odio numquam ducimus qui illo iure nesciunt beatae cum, doloribus tempore provident similique amet reprehenderit voluptates nihil vitae voluptas.</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="work-header">
                                    <div class="work-icon">
                                        <img src="{{ public_path('/images/resume_themes/theme113/work-exp-icon.png') }}" alt="">
                                    </div>
                                    <div class="decorator"></div>
                                    <div class="company-name">123workforce</div>
                                    <div class="date">2019 - Now</div>
                                </div>
                                <div class="work-body">
                                    <div class="job-title">Fullstack Developer</div>
                                    <div class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut repellat assumenda, odio numquam ducimus qui illo iure nesciunt beatae cum, doloribus tempore provident similique amet reprehenderit voluptates nihil vitae voluptas.</div>
                                </div>
                            </td>
                            <td>
                                <div class="work-header">
                                    <div class="work-icon">
                                        <img src="{{ public_path('/images/resume_themes/theme113/work-exp-icon.png') }}" alt="">
                                    </div>
                                    <div class="decorator"></div>
                                    <div class="company-name">123workforce</div>
                                    <div class="date">2019 - Now</div>
                                </div>
                                <div class="work-body">
                                    <div class="job-title">Fullstack Developer</div>
                                    <div class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut repellat assumenda, odio numquam ducimus qui illo iure nesciunt beatae cum, doloribus tempore provident similique amet reprehenderit voluptates nihil vitae voluptas.</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="work-header">
                                    <div class="work-icon">
                                        <img src="{{ public_path('/images/resume_themes/theme113/work-exp-icon.png') }}" alt="">
                                    </div>
                                    <div class="decorator"></div>
                                    <div class="company-name">123workforce</div>
                                    <div class="date">2019 - Now</div>
                                </div>
                                <div class="work-body">
                                    <div class="job-title">Fullstack Developer</div>
                                    <div class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut repellat assumenda, odio numquam ducimus qui illo iure nesciunt beatae cum, doloribus tempore provident similique amet reprehenderit voluptates nihil vitae voluptas.</div>
                                </div>
                            </td>
                            <td>
                                <div class="work-header">
                                    <div class="work-icon">
                                        <img src="{{ public_path('/images/resume_themes/theme113/work-exp-icon.png') }}" alt="">
                                    </div>
                                    <div class="decorator"></div>
                                    <div class="company-name">123workforce</div>
                                    <div class="date">2019 - Now</div>
                                </div>
                                <div class="work-body">
                                    <div class="job-title">Fullstack Developer</div>
                                    <div class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut repellat assumenda, odio numquam ducimus qui illo iure nesciunt beatae cum, doloribus tempore provident similique amet reprehenderit voluptates nihil vitae voluptas.</div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </section>
            {{-- Count how many schools and jobs there are --}}
            <section class="education">
                <h1 class="section-title">Education</h1>
                <div class="container">
                    <table>
                        <tr>
                            <td>
                                <div class="education-header">
                                    <div class="education-icon">
                                        <img src="{{ public_path('/images/resume_themes/theme113/education-icon.png') }}" alt="">
                                    </div>
                                    <div class="decorator"></div>
                                    <div class="school-name">Simon Bolivar University</div>
                                    <div class="date">2014 - 2019</div>
                                </div>
                                <div class="education-body">
                                    <div class="grade-title">Computing and Statistics Mathematics</div>
                                    <div class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut repellat assumenda, odio numquam ducimus qui illo iure nesciunt beatae cum, doloribus tempore provident similique amet reprehenderit voluptates nihil vitae voluptas.</div>
                                </div>
                            </td>
                            <td>
                                <div class="education-header">
                                    <div class="education-icon">
                                        <img src="{{ public_path('/images/resume_themes/theme113/education-icon.png') }}" alt="">
                                    </div>
                                    <div class="decorator"></div>
                                    <div class="school-name">Simon Bolivar University</div>
                                    <div class="date">2014 - 2019</div>
                                </div>
                                <div class="education-body">
                                    <div class="grade-title">Computing and Statistics Mathematics</div>
                                    <div class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut repellat assumenda, odio numquam ducimus qui illo iure nesciunt beatae cum, doloribus tempore provident similique amet reprehenderit voluptates nihil vitae voluptas.</div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </section>

            <div class="page-break"></div>

            <section class="about">
                <h1 class="section-title">About</h1>
                <div class="container">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos, dicta eaque deserunt earum consequuntur optio repudiandae voluptatum deleniti beatae voluptatem omnis, quaerat fugiat aliquid, nostrum ab unde vel! Ipsum, architecto!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, minima quaerat. Explicabo delectus, debitis saepe fugit itaque at maiores commodi error assumenda! Optio nisi ex deserunt debitis, iure quas. Doloribus.</p>
                    <p>Eius, ipsam et rerum, aut, vitae ipsa non illo nisi adipisci sit suscipit nemo sint est numquam sunt? Excepturi totam ex accusantium. Earum porro doloribus cupiditate, quia dolor facere officia.</p>
                </div>
            </section>
        </div>
    </main>
</body>
</html>