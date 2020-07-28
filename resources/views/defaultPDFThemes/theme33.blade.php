<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        * {
            color: #1D1D1D;
        }

        @font-face {
            font-family: 'Open Sans';
            src: url({{ public_path('/fonts/OpenSans-Regular.ttf' }}) format("truetype");
            /* font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
            font-style: normal; // use the matching font-style here */
        }
        .user-info {
            margin-top: 12px;
        }

        .user-info .user-img__container {
            height: 210px;
            display: inline-block;
        }

        .user-img {
            height: 100%;
            margin-right: 30px;
        }

        .user-info__personal__data {
            display: inline-block;
        }

        .user-name {
            font-family: 'Open Sans', Arial, sans-serif;
            font-size: 40px;
            margin-bottom: 10px;
        }

        .user-profession {
            font-family: 'Open Sans', Arial, sans-serif;
            margin-bottom: 32px;
        }

        .user-contact{
            font-size: 14px;
            line-height: 1.2;
            font-family: Open Sans;
            margin-left: 37px;
        }

        .user-social {
            display: inline-block;
            float: right;
            font-family: Open Sans;
            font-size: 14px;
            line-height: 19px;
            margin-top: 60px;
        }

        .user-social .link {
            margin-bottom: 8px;
        }

        .user-social img {
            margin-right: 14px;
            height: 16px;
        }

        .line-decorator {
            height: 1px;
            width: 100%;
            background: solid rgba(33, 33, 33, 0.45);
            margin: 40px 0 0;
        }

        .section-title {
            font-family: 'Open Sans';
            font-size: 36px;
            line-height: 49px;            
        }
        .title-decorator {
            margin-top: 7px;
            width: 61px;
            height: 5px;
            background: #1D1D1D;
        }
        section {
            width:  100%;
            margin-top: 80px;
            vertical-align: top;
            /* border: 1px solid yellow; */
        }

        section .content {
            font-size: 14px;
            font-family: Open Sans;
            line-height: 1.2;
        }

        .works-container {
            width: 100%;
            /* border: 1px solid yellow; */
            margin-top: 80px;
        }
        .row {
            width: 100%;
            margin-bottom: 60px;
            vertical-align: top;
        }

        .works-container .row:last-child,
        .educations-container .row:last-child {
            margin: 0;
        }

        .work {
            width: 47%;
            /* margin: 0 auto; */
            display: inline-block;
            vertical-align: top;
            padding-right: 1rem;
            box-sizing: border-box;
        }

        .work-header,
        .work-details {
            vertical-align: top;
        }

        .work .company-name,
        .work .job-title,
        .work .work-date,
        .work .work-description {
            display: inline-block;
            width: 48.5%;
            vertical-align: top;
        }

        .work-header {
            margin-bottom: 35px;
        }

        .company-name {
            font-family: Open Sans;
            font-style: normal;
            font-size: 24px;
        }

        .job-title {
            font-family: Open Sans;
            font-style: normal;
            font-size: 18px;
        }

        .work-date {
            font-family: Open Sans;
            font-style: normal;
            font-size: 13px;
        }

        .work-description {
            font-family: Open Sans;
            font-style: normal;
            font-size: 11px;
            line-height: 1.2;
            text-align: justify;
        }

        .work-description p {
            margin-top: 0;
        }

        .work-description p:last-child {
            margin-bottom: 0px;
        }
        
        .education-section {
            margin-top: 0;
        }

        .educations-container {
            width: 100%;
            vertical-align: top;
            margin-top: 100px;
        }

        .education {
            width: 46%;
            display: inline-block;
            vertical-align: top;
        }

        .education:first-child {
            margin-right: 2.2rem;
        }

        .institute-name {
            font-family: Open Sans;
            font-style: normal;
            font-size: 32px;
            line-height: 44px;
        }

        .grade-and-date {
            margin-top: 50px;
            font-family: Open Sans;
            font-style: normal;
            font-size: 18px;
            line-height: 25px;
            margin-bottom: 30px;
        }

        .education-description {
            font-family: Open Sans;
            font-size: 14px;
            line-height: 1.2;
        }

        .page-break {
            page-break-after: always;
            margin-bottom: 0;
        }

        .skills-container {
            margin-top: 40px;
            vertical-align: top;
            padding: 0 0.5rem;
        }

        .skill {
            vertical-align: top;
            width: 47%;
            display: inline-block;
        }

        .skill:last-child {
            /* margin-left: 10px; */
            float: right;
        }

        .skill-header {
            margin-bottom: 15px;
        }

        .skill-category {
            font-family: Open Sans;
            font-size: 24px;
            margin-bottom: 25px;
            width: 100%;
            vertical-align: top;
        }

        .skill-category .title-decorator {
            margin-top: 25px !important;
        }

        .skill-header div {
            display: inline-block;
            font-family: Open Sans;
        }


        .skill-header .percentage {
            float: right;
        }

        .skill-bar {
            border: 1.5px solid #1D1D1D;
            height: 16px;
            width: 100%;
        }

        .skill-total {
            display: inline-block;
            background: #1D1D1D;
            height: 16px;
            vertical-align: top;
        }

        .skills-list {
            width: 100%;
            display: inline-block;
            vertical-align: top;
        }

        .skill-list .row {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="user-info">
        <div class="user-info__personal">
            <div class="user-img__container">
                <img class="user-img" src="{{public_path('images/resume_builder/user.png')}}" alt="">
            </div>
            <div class="user-info__personal__data">
                <div class="user-name">José Quintero</div>
                <div class="user-profession">Fullstack Developer</div>

                <div class="user-contact">
                    <div>42 Great Windmill Street London W1D 7NB</div>
                    <div>+584241714022</div>
                    <div><a href='https://civ.ie'>civ.ie/myprofile</a></div>
                </div>
            </div>
            <div class="user-social">
                <div class="link"><a href="https://behance.net"><img src="{{public_path('images/resume_themes/theme33/behance.png')}}" alt=""><span>behance user</span></a></div>
                <div class="link"><a href="https://dribbble.com"><img src="{{public_path('images/resume_themes/theme33/dribbble.png')}}" alt=""><span>dribble user</span></a></div>
                <div class="link"><a href="https://instagram.com"><img src="{{public_path('images/resume_themes/theme33/instagram.png')}}" alt=""><span>instagram user</span></a></div>
                <div class="link"><a href="https://linkedin.com"><img src="{{public_path('images/resume_themes/theme33/linkedin.png')}}" alt=""><span>linkedin user</span></a></div>
            </div>
        </div>
        
        <div class="line-decorator"></div>

        <section>
            <div class="section-title">
                About
                <div class="title-decorator"></div>
            </div>
            <div class="content">
                <p>Quis enim elit aliquip eiusmod veniam. Officia cillum labore ipsum est sunt aute sunt reprehenderit Lorem eiusmod enim ex. Tempor esse sint tempor aute.</p>

                <p>Tempor deserunt elit aliquip dolor exercitation deserunt sint fugiat amet. Sunt in occaecat aute quis. Eiusmod commodo aute aliquip commodo et est ea do labore ea fugiat aliquip proident.</p>

                <p>Qui consectetur voluptate excepteur aliquip elit eiusmod magna cillum amet tempor. Qui qui id culpa esse commodo pariatur esse sit sunt. Et id velit tempor laborum.</p>

                <p>Voluptate adipisicing nisi proident qui tempor ipsum reprehenderit nulla nostrud dolor id. Id deserunt et officia nostrud aliquip voluptate quis magna ea esse. Do officia cupidatat cupidatat elit. Excepteur dolore excepteur ex ex exercitation ut minim ullamco nostrud duis incididunt sit ullamco. Mollit est magna reprehenderit duis aute irure nisi sit adipisicing. Quis sunt voluptate in aliquip sint elit consectetur incididunt deserunt ad officia laboris. Nulla aute ipsum commodo sit.</p>
            </div>
        </section>

        <section>
            <div class="section-title">
                Work
                <div class="title-decorator"></div>
            </div>
            <div class="works-container">
                <div class="row">
                    <div class="work">
                        <div class="work-header">
                            <div class="company-name">
                                Groowly
                                <div class="title-decorator"></div>
                            </div>
                            <div class="job-title">Jr. Fullstack Developer</div>
                        </div>
                        <div class="work-details">
                            <div class="work-date">
                                <div class="date">Duration:</div>
                                <div class="duration">Dec 19 - Present</div>
                            </div>
                            <div class="work-description">
                                <p>Mollit enim aute duis ipsum do laborum id commodo ad cupidatat pariatur officia id. Incididunt dolor consectetur ea incididunt qui sunt anim deserunt id duis magna non. Aliquip ullamco ea Lorem est reprehenderit eu duis minim nisi eu incididunt magna non veniam. Irure velit amet enim velit ullamco non et dolore.</p>
                            </div>
                        </div>
                    </div>
                    <div class="work">
                        <div class="work-header">
                            <div class="company-name">
                                Google
                                <div class="title-decorator"></div>
                            </div>
                            <div class="job-title">Fullstack Developer</div>
                        </div>
                        <div class="work-details">
                            <div class="work-date">
                                <div class="date">Duration:</div>
                                <div class="duration">Dec 19 - Present</div>
                            </div>
                            <div class="work-description">
                                <p>Deserunt dolore nostrud non labore ipsum sunt. Mollit sit do id eu cillum officia ex deserunt pariatur enim. Lorem id et laboris proident deserunt adipisicing commodo labore magna consectetur non tempor ad commodo. Laboris incididunt laborum velit eiusmod culpa do enim magna.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="work">
                        <div class="work-header">
                            <div class="company-name">
                                Google
                                <div class="title-decorator"></div>
                            </div>
                            <div class="job-title">Fullstack Developer</div>
                        </div>
                        <div class="work-details">
                            <div class="work-date">
                                <div class="date">Duration:</div>
                                <div class="duration">Dec 19 - Present</div>
                            </div>
                            <div class="work-description">
                                <p>Nulla anim sint veniam ea aliqua eiusmod do et cillum amet proident reprehenderit. Duis do velit sit anim consectetur est anim. Dolore veniam enim in mollit irure aliquip anim labore laborum esse irure cupidatat dolor. Excepteur nulla anim occaecat proident consectetur. Minim fugiat nisi do id. Minim proident sit incididunt minim.</p>
                            </div>
                        </div>
                    </div>
                    <div class="work">
                        <div class="work-header">
                            <div class="company-name">
                                Google
                                <div class="title-decorator"></div>
                            </div>
                            <div class="job-title">Fullstack Developer</div>
                        </div>
                        <div class="work-details">
                            <div class="work-date">
                                <div class="date">Duration:</div>
                                <div class="duration">Dec 19 - Present</div>
                            </div>
                            <div class="work-description">
                                <p>Tempor in commodo ullamco ipsum eu culpa dolore. Voluptate aute et excepteur id minim elit sunt quis ut ipsum. Laboris occaecat ea officia reprehenderit dolore ullamco amet pariatur aliqua veniam fugiat velit irure.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="page-break"></div>

        <section class="education-section">
            <div class="section-title">
                Education
                <div class="title-decorator"></div>
            </div>
            <div class="educations-container">
                <div class="row">
                    <div class="education">
                        <div class="institute-name">California Institute of Technology</div>
                        <div class="grade-and-date">M.Sc in HCI, Dec 19 - Present</div>
                        <div class="education-description">Nisi sint reprehenderit qui ex sint id. Tempor velit consequat aliquip voluptate Lorem aute. Consectetur excepteur veniam anim sunt irure. Ex Lorem incididunt veniam esse sunt. Occaecat eu do in velit duis veniam consequat. Anim et exercitation proident consequat labore duis magna. Anim minim anim nostrud et ad laborum dolore Lorem nulla id eu commodo aliquip voluptate.</div>
                    </div>
                    <div class="education">
                        <div class="institute-name">California Institute of Technology</div>
                        <div class="grade-and-date">M.Sc in HCI, Dec 19 - Present</div>
                        <div class="education-description">Laboris sunt in esse ullamco ea sit culpa officia eiusmod sunt ut esse Lorem do. Do velit commodo nostrud do aute id. Proident magna minim est nostrud excepteur eu irure duis dolore. Nulla voluptate deserunt proident in ut. Esse dolor do nostrud ex sint reprehenderit sint elit ipsum aute dolore. Consectetur officia et aliqua proident culpa amet eu ut aliquip reprehenderit. Do fugiat dolor quis sint est.</div>
                    </div>
                </div>
                <div class="row">
                    <div class="education">
                        <div class="institute-name">California Institute of Technology</div>
                        <div class="grade-and-date">M.Sc in HCI, Dec 19 - Present</div>
                        <div class="education-description">Voluptate nulla exercitation nulla quis ex tempor proident elit. Labore consequat tempor commodo reprehenderit labore velit incididunt labore dolor mollit adipisicing laboris officia anim. Nisi nulla labore veniam ad sunt enim irure officia in tempor ipsum. Tempor et ea aliqua est est ex fugiat nisi ex culpa aute nisi cupidatat.</div>
                    </div>
                    <div class="education">
                        <div class="institute-name">California Institute of Technology</div>
                        <div class="grade-and-date">M.Sc in HCI, Dec 19 - Present</div>
                        <div class="education-description">Aliquip amet mollit duis mollit. Est id et laborum mollit do. Commodo minim nulla proident aliquip aliqua id sunt qui laboris aute laborum laborum. Mollit officia cupidatat et reprehenderit quis dolor commodo sint. Commodo veniam pariatur incididunt et eiusmod sit. Nulla amet ad velit amet velit consequat labore eiusmod eu voluptate ad. Aliquip tempor adipisicing tempor exercitation consequat cupidatat ullamco anim proident.</div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="section-title">
                Skills
                <div class="title-decorator"></div>
            </div>
            <div class="skills-container">
                <div class="skill-category">Programming Languages
                    <div class="title-decorator"></div>
                </div>

                <div class="skills-list">
                    <div class="row">
                        <div class="skill">
                            <div class="skill-header">
                                <div class="skill-name">Javascript</div>
                                <div class="percentage">90%</div>
                            </div>
                            <div class="skill-bar">
                                <div class="skill-total" style="width: 90%;"></div>
                                <div class="skill-rest"></div>
                            </div>
                        </div>
                        <div class="skill">
                            <div class="skill-header">
                                <div class="skill-name">Php</div>
                                <div class="percentage">70%</div>
                            </div>
                            <div class="skill-bar">
                                <div class="skill-total" style="width: 70%;"></div>
                                <div class="skill-rest"></div>
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="skill">
                            <div class="skill-header">
                                <div class="skill-name">Python</div>
                                <div class="percentage">60%</div>
                            </div>
                            <div class="skill-bar">
                                <div class="skill-total" style="width: 60%;"></div>
                                <div class="skill-rest"></div>
                            </div>
                        </div>
                        <div class="skill">
                            <div class="skill-header">
                                <div class="skill-name">C#</div>
                                <div class="percentage">30%</div>
                            </div>
                            <div class="skill-bar">
                                <div class="skill-total" style="width: 30%;"></div>
                                <div class="skill-rest"></div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="skill-category">
                    Databases/Frameworks
                    <div class="title-decorator"></div>
                </div>

                <div class="skills-list">
                    <div class="row">
    
                        <div class="skill">
                            <div class="skill-header">
                                <div class="skill-name">Php</div>
                                <div class="percentage">70%</div>
                            </div>
                            <div class="skill-bar">
                                <div class="skill-total" style="width: 70%;"></div>
                                <div class="skill-rest"></div>
                            </div>
                        </div>
                        <div class="skill">
                            <div class="skill-header">
                                <div class="skill-name">Python</div>
                                <div class="percentage">60%</div>
                            </div>
                            <div class="skill-bar">
                                <div class="skill-total" style="width: 60%;"></div>
                                <div class="skill-rest"></div>
                            </div>
                        </div>
                    </div>
                </div>

                    
                <div class="skill-category">
                    Softwares
                    <div class="title-decorator"></div>
                </div>
                <div class="skills-list">
                    <div class="row">
    
                        <div class="skill">
                            <div class="skill-header">
                                <div class="skill-name">Javascript</div>
                                <div class="percentage">90%</div>
                            </div>
                            <div class="skill-bar">
                                <div class="skill-total" style="width: 90%;"></div>
                                <div class="skill-rest"></div>
                            </div>
                        </div>
                        <div class="skill">
                            <div class="skill-header">
                                <div class="skill-name">Php</div>
                                <div class="percentage">70%</div>
                            </div>
                            <div class="skill-bar">
                                <div class="skill-total" style="width: 70%;"></div>
                                <div class="skill-rest"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="skill-category">
                    Design
                    <div class="title-decorator"></div>
                </div>

                <div class="skills-list">
                    <div class="row">
    
                        <div class="skill">
                            <div class="skill-header">
                                <div class="skill-name">Python</div>
                                <div class="percentage">60%</div>
                            </div>
                            <div class="skill-bar">
                                <div class="skill-total" style="width: 60%;"></div>
                                <div class="skill-rest"></div>
                            </div>
                        </div>
                        <div class="skill">
                            <div class="skill-header">
                                <div class="skill-name">Javascript</div>
                                <div class="percentage">90%</div>
                            </div>
                            <div class="skill-bar">
                                <div class="skill-total" style="width: 90%;"></div>
                                <div class="skill-rest"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="skill">
                            <div class="skill-header">
                                <div class="skill-name">Php</div>
                                <div class="percentage">70%</div>
                            </div>
                            <div class="skill-bar">
                                <div class="skill-total" style="width: 70%;"></div>
                                <div class="skill-rest"></div>
                            </div>
                        </div>
                        <div class="skill">
                            <div class="skill-header">
                                <div class="skill-name">Python</div>
                                <div class="percentage">60%</div>
                            </div>
                            <div class="skill-bar">
                                <div class="skill-total" style="width: 60%;"></div>
                                <div class="skill-rest"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
</body>
</html>