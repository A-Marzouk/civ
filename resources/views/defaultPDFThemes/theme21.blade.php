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
        }

        .user-contact .icon-wrapper {
            margin-right: 9px;
            padding: 7px 4px;
            box-sizing: border-box;
            width: 17px;
            height: 11px;
            background-color: #F8F8F8;
            display: inline-block;
            border-radius: 13px;
            text-align: center;
            margin-top: 5px;
            border: 1px solid rgb(228, 227, 227);
        }

        .user-contact .icon {
            vertical-align: middle;
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

        .user-social .img-wrapper {
            padding: 8px;
            display: inline-block;
            background: #F8F8F8;
            border-radius: 10px;
            margin-top: 5px;
            margin-right: 10px;
            border: 1px solid rgb(228, 227, 227);
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
                        <div class="contact" class="contact-link">
                            <div class="icon-wrapper">
                                <img src="{{ public_path('images/resume_themes/theme21/location-icon.png') }}" alt="" class="icon">
                            </div>
                            Av. Panteon, Caracas. Venezuela.
                        </div>
                        <div class="contact" class="contact-link">
                            <div class="icon-wrapper">
                                <img src="{{ public_path('images/resume_themes/theme21/whatsapp-icon.png') }}" alt="" class="icon">
                            </div>
                            +584241714022
                        </div>
                        <a href="https://civ.ie/josedan10" class="contact">
                            <div class="icon-wrapper">
                                <img src="{{ public_path('images/resume_themes/theme21/google-icon.png') }}" alt="" class="icon">
                            </div>
                            civ.ie/josedan10
                        </a>
                    </div>
                </td>

                <td class="user-social">
                    <div class="social">
                        <a href="">
                            <div class="img-wrapper">
                                <img src="{{ public_path('images/resume_themes/theme21/behance-icon.png') }}" alt="">
                            </div>
                            Behance username
                        </a>
                    </div>
                    <div class="social">
                        <a href="">
                            <div class="img-wrapper">
                                <img src="{{ public_path('images/resume_themes/theme21/dribbble-icon.png') }}" alt="">
                            </div>
                            Dribbble username
                        </a>
                    </div>
                    <div class="social">
                        <a href="">
                            <div class="img-wrapper">
                                <img src="{{ public_path('images/resume_themes/theme21/instagram-icon.png') }}" alt="">
                            </div>
                            Instagram username
                        </a>
                    </div>
                    <div class="social">
                        <a href="">
                            <div class="img-wrapper">
                                <img src="{{ public_path('images/resume_themes/theme21/behance-icon.png') }}" alt="">
                            </div>
                            LinkedIn username
                        </a>
                    </div>
                </td>
            </tr>
        </table>
    </main>
</body>
</html>