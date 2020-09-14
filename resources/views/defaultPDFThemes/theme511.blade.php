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
            background-color: #FAF7F1;
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
            padding: 50px;
            border-radius: 50px;
            width: 100%;
            background-color: #FAF7F1;
            margin-top: 65px;
        }

        section .section-title {
            font-family: 'Poppins Bold', Arial, Helvetica, sans-serif;
            font-size: 30px;
            color: #000;
            position: relative;
        }

        .about .section-title {
        }

        .about .section-title .title-decorator {
            height: 5px;
            border-radius: 2.5px;
            background-color: #F7B301;
            width: 100%;
            position: absolute;
            bottom: 0;
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
    </section>
    
</body>
</html>