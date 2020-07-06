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
            background-image: url('/images/resume_themes/theme113/mainBg.png');
            background-color: #FFF7F3;
            background-position: -10px 300px;
            font-family: Muli, Arial, Helvetica, sans-serif;
            width: 100%;
        }

        /* Header */
        .theme-header {
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
        section {
            background-color: white;
        }

        .section-title {
            width: 100%;
            color: white;
            background-color: #686299;
            margin: 10px 0 0 0;
            text-align: center;
            padding: 20px;
            font-size: 26px;
            border-radius: 15px 15px 0 0;
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
            </section>
        </div>
    </main>
</body>
</html>