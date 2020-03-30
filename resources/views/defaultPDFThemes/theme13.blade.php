<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        @font-face {
            font-family: Raleway;
            src: url(Raleway-Regular.ttf) format("truetype");
            font-weight: normal;
        }

        .page-break {
            page-break-after: always;
            margin-bottom: 0;
        }

        .user-img {
            width: 110px;
        }

        .user-info {
        }

        .user-info__personal-data,
        .user-img__container {
            vertical-align: top;
            display: inline-block;
        }

        .user-profile {
            margin-top: 6px;
            margin-left: 30px;
            display: inline-block;
            vertical-align: top;
        }

        .user-profession {
            font-family: Raleway;
            font-style: normal;
            font-weight: normal;
            font-size: 14px;
            line-height: 16px;
            color: #104EFB;

        }

        .user-name {
            font-family: Raleway;
            color: #104EFB;
            font-size: 24px;
            line-height: 28px;
        }
        .user-data {
            display: inline-block;
            position: absolute;
            right: 0;
            font-family: Raleway;
            font-style: normal;
            font-size: 14px;
            line-height: 16px;
            vertical-align: top;

            color: #104EFB;
        }

        .user-data .link {
            display: block;
            color: #104EFB;
            margin: 5px 0;  
        }

        .user-data .link img {
            margin-right: 14px;
        }

        .user-social {
            margin-top: 100px;
        }

        .user-social .link {
            font-family: Raleway;
            font-style: normal;
            font-size: 14px;
            line-height: 16px;
            text-decoration-line: underline;
            text-align: center;
            display: inline-block;

            color: #104EFB;
        }

        .user-social .link img {
            margin-right: 10px;
        }

        .separator-decorator {
            width: 100%;
            height: 1px;
            background: #104EFB;
            margin-top: 40px;
        }

        section {
            margin-top: 80px;
        }

        .section-title {
            font-family: Raleway;
            font-style: normal;
            font-size: 30px;
            line-height: 35px;
            position: relative;

            color: #104EFB;
        }

        .title-decorator {
            height: 1px;
            background: rgba(16, 78, 251, 0.2);
        }

        .content {
            font-family: Raleway;
            font-style: normal;
            font-size: 14px;
            line-height: 15px;
            color: #104EFB;

            margin-top: 10px;
        }

        .works-container,
        .educations-container {
            margin-top: 10px;
            width: 100%;
        }

        .row {
            width: 100%;
            margin-bottom: 50px;
        }

        .row:last-child {
            margin: 0;
        }

        .work,
        .education {
            color: #104EFB;
            width: 48%;
            font-family: Raleway;
            display: inline-block;
            vertical-align: top;
        }

        .work:last-child {
            margin-left: 30px;
        }
        
        .left {
            width: 115px;
            display: inline-block;
            vertical-align: top;
            margin-right: 15px;
            font-size: 16px;
        }

        .right {
            display: inline-block;
            vertical-align: top;
            width: 350px;
        }

        .work-title,
        .school-title {
            margin-bottom: 20px;
        }

        .company-name,
        .school-name {
            font-size: 20px;
        }

        .work-description,
        .education-description {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="user-info">
        <div class="user-img__container">
            <img class="user-img" src="{{public_path('images/resume_builder/user.png')}}" alt="">
        </div>

        <div class="user-info__personal-data">
            <div class="user-profile">
                <div class="user-name">José Quintero</div>
                <div class="user-profession">Fullstack Developer</div>
            </div>

            <div class="user-data">
                <div class="link">
                    <img src="{{public_path('images/resume_themes/theme13/location-icon.png')}}" alt="">
                    42 Great Windmill Street London W1D 7NB
                </div>
                <a class="link" href='#'>
                    <img src="{{public_path('images/resume_themes/theme13/whatsapp-icon.png')}}" alt="">
                    +584241714022
                </a>
                <a class="link" href='https://civ.ie'>
                    <img src="{{public_path('images/resume_themes/theme13/google-icon.png')}}" alt="">
                    Civie.com/myprofile
                </a>
            </div>
        </div>

        <div class="user-social">
            <a href="https://pinterest.com" class="link" style="width: 20%">
                <img src="{{public_path('images/resume_themes/theme13/pinterest-icon.png')}}" alt="">
                Pinterest user
            </a>
            <a href="https://pinterest.com" class="link" style="width: 20%">
                <img src="{{public_path('images/resume_themes/theme13/behance-icon.png')}}" alt="">
                Behance user
            </a>
            <a href="https://pinterest.com" class="link" style="width: 20%">
                <img src="{{public_path('images/resume_themes/theme13/dribbble-icon.png')}}" alt="">
                Dribbble user
            </a>
            <a href="https://pinterest.com" class="link" style="width: 20%">
                <img src="{{public_path('images/resume_themes/theme13/instagram-icon.png')}}" alt="">
                Instagram user
            </a>
            <a href="https://pinterest.com" class="link" style="width: 20%">
                <img src="{{public_path('images/resume_themes/theme13/linkedin-icon.png')}}" alt="">
                Linkedin user
            </a>
        </div>
    </div>

    <div class="separator-decorator"></div>

    <section>
        <div class="section-title">
            About
            <div class="title-decorator" style="width: 85px;"></div>
        </div>
        <div class="content">
            <p>Non in deserunt in fugiat ex mollit fugiat veniam cupidatat officia magna elit elit. Do elit anim aliquip sunt tempor cupidatat culpa dolor dolore nisi quis. Ut reprehenderit laboris quis aliqua mollit eiusmod ex. Laborum dolore elit enim reprehenderit aliqua aute. Laboris nisi mollit sit cupidatat.</p>

            <p>Proident consequat fugiat reprehenderit incididunt cupidatat nisi proident pariatur ad culpa culpa nulla. Quis in in deserunt veniam est sit ea tempor sint et magna dolore ad exercitation. Id ex nulla qui nulla sit dolor. Ea in dolore voluptate esse labore qui aute dolor commodo ipsum incididunt ullamco anim culpa.</p>

            <p>Labore amet in aliqua esse sunt aliquip est consequat elit ex. Ut pariatur dolore aliqua deserunt aliquip laborum non ut. Cupidatat velit est cillum elit quis sunt tempor minim.</p>
        </div>
    </section>

    <section>
        <div class="section-title">
            Works
            <div class="title-decorator" style="width: 90px"></div>
        </div>
        <div class="works-container">
            <div class="row">
                <div class="work">
                    <div class="left">
                        <div class="work-title">Fullstack Developer</div>
                        <div class="work-date">2019 - Now</div>
                    </div>
                    <div class="right">
                        <div class="company-name">123workforce</div>
                        <div class="work-description">
                            <p>Ullamco velit amet qui quis tempor magna. Laboris nostrud commodo sint Lorem et. Consectetur esse irure voluptate ex. Sit quis eiusmod ad eu non adipisicing in sit ad cillum laboris.</p>
                        </div>
                    </div>
                </div>
                <div class="work">
                    <div class="left">
                        <div class="work-title">Fullstack Developer</div>
                        <div class="work-date">2019 - Now</div>
                    </div>
                    <div class="right">
                        <div class="company-name">123workforce</div>
                        <div class="work-description">
                            <p>Ullamco velit amet qui quis tempor magna. Laboris nostrud commodo sint Lorem et. Consectetur esse irure voluptate ex. Sit quis eiusmod ad eu non adipisicing in sit ad cillum laboris.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="work">
                    <div class="left">
                        <div class="work-title">Fullstack Developer</div>
                        <div class="work-date">2019 - Now</div>
                    </div>
                    <div class="right">
                        <div class="company-name">123workforce</div>
                        <div class="work-description">
                            <p>Ullamco velit amet qui quis tempor magna. Laboris nostrud commodo sint Lorem et. Consectetur esse irure voluptate ex. Sit quis eiusmod ad eu non adipisicing in sit ad cillum laboris.</p>
                        </div>
                    </div>
                </div>
                <div class="work">
                    <div class="left">
                        <div class="work-title">Fullstack Developer</div>
                        <div class="work-date">2019 - Now</div>
                    </div>
                    <div class="right">
                        <div class="company-name">123workforce</div>
                        <div class="work-description">
                            <p>Ullamco velit amet qui quis tempor magna. Laboris nostrud commodo sint Lorem et. Consectetur esse irure voluptate ex. Sit quis eiusmod ad eu non adipisicing in sit ad cillum laboris.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="work">
                    <div class="left">
                        <div class="work-title">Fullstack Developer</div>
                        <div class="work-date">2019 - Now</div>
                    </div>
                    <div class="right">
                        <div class="company-name">123workforce</div>
                        <div class="work-description">
                            <p>Ullamco velit amet qui quis tempor magna. Laboris nostrud commodo sint Lorem et. Consectetur esse irure voluptate ex. Sit quis eiusmod ad eu non adipisicing in sit ad cillum laboris.</p>
                        </div>
                    </div>
                </div>
                <div class="work">
                    <div class="left">
                        <div class="work-title">Fullstack Developer</div>
                        <div class="work-date">2019 - Now</div>
                    </div>
                    <div class="right">
                        <div class="company-name">123workforce</div>
                        <div class="work-description">
                            <p>Ullamco velit amet qui quis tempor magna. Laboris nostrud commodo sint Lorem et. Consectetur esse irure voluptate ex. Sit quis eiusmod ad eu non adipisicing in sit ad cillum laboris.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="page-break"></div>

    <section>
        <div class="section-title">
            Education
            <div class="title-decorator" style="width: 140px"></div>
        </div>

        <div class="educations-container">
            <div class="row">
                <div class="education">
                    <div class="left">
                        <div class="school-title">Lic. Mathematics: Computing and Statistics</div>
                        <div class="school-date">2019 - Now</div>
                    </div>
                    <div class="right">
                        <div class="school-name">Simon Bolívar University</div>
                        <div class="education-description">
                            <p>Ullamco velit amet qui quis tempor magna. Laboris nostrud commodo sint Lorem et. Consectetur esse irure voluptate ex. Sit quis eiusmod ad eu non adipisicing in sit ad cillum laboris.</p>
                        </div>
                    </div>
                </div>
                <div class="education">
                    <div class="left">
                        <div class="school-title">Lic. Mathematics: Computing and Statistics</div>
                        <div class="school-date">2019 - Now</div>
                    </div>
                    <div class="right">
                        <div class="school-name">Simon Bolívar University</div>
                        <div class="education-description">
                            <p>Ullamco velit amet qui quis tempor magna. Laboris nostrud commodo sint Lorem et. Consectetur esse irure voluptate ex. Sit quis eiusmod ad eu non adipisicing in sit ad cillum laboris.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="education">
                    <div class="left">
                        <div class="school-title">Lic. Mathematics: Computing and Statistics</div>
                        <div class="school-date">2019 - Now</div>
                    </div>
                    <div class="right">
                        <div class="school-name">Simon Bolívar University</div>
                        <div class="education-description">
                            <p>Ullamco velit amet qui quis tempor magna. Laboris nostrud commodo sint Lorem et. Consectetur esse irure voluptate ex. Sit quis eiusmod ad eu non adipisicing in sit ad cillum laboris.</p>
                        </div>
                    </div>
                </div>
                <div class="education">
                    <div class="left">
                        <div class="school-title">Lic. Mathematics: Computing and Statistics</div>
                        <div class="school-date">2019 - Now</div>
                    </div>
                    <div class="right">
                        <div class="school-name">Simon Bolívar University</div>
                        <div class="education-description">
                            <p>Ullamco velit amet qui quis tempor magna. Laboris nostrud commodo sint Lorem et. Consectetur esse irure voluptate ex. Sit quis eiusmod ad eu non adipisicing in sit ad cillum laboris.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="section-title">
            Skills 
            <div class="title-decorator" style="width: 72px"></div>
        </div>
    </section>
</body>
</html>