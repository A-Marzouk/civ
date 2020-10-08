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

        body {
            padding: 40px 50px;
        }

        main {
            color: #707070;
            font-family: 'Noto Sans', Arial, Helvetica, sans-serif;
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

        .educations table td {
            width: 50%;
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

        .skills-container .skills-row {
            width: 100%;
        }

        .skills-row  .column {
            width: 50%;
        }

        .skill-percentage {
            text-align: right;
        }

        .skill {
            width: 100%;
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
                    <img src="{{$user->personalInfo->profile_pic}}" alt="">
                </td>
                <td class="user-info">
                    <div class="user-name">{{ $user->personalInfo->first_name.' '.$user->personalInfo->last_name }}</div>
                    <div class="user-profession">{{ $user->personalInfo->designation }}</div>

                    <div class="user-contact">
                        <div class="contact">
                            <a href="#" class='no-decoration'>
                                {{ $user->personalInfo->location }}
                            </a>
                        </div>
                        <div class="contact">
                            <a href="#" class='no-decoration'>
                                {{ $user->personalInfo->phone }}
                            </a>
                        </div>
                        <div class="contact">
                            <a href="{{ $user->getPersonalWebsite()->link }}" >
                                {{ $user->getPersonalWebsite()->link }}
                            </a>
                        </div>
                    </div>
                </td>

                <td class="user-social">
                    @foreach ($user->getSocialLinks()->toArray() as $item)
                        <div class="social">
                            <a data-icon="{{strtolower($item['link_title'])}}"
                                href="{{ $item['link'] }}"
                            >
                                <div class="img-wrapper">
                                    <img src="{{ public_path('images/resume_themes/theme5/'.strtolower($item['link_title']).'-icon.png') }}" alt="">
                                </div>
                                {{ $item['link_title'] }} username
                            </a>
                        </div>
                    @endforeach
                </td>
            </table>
        </div>

        @php
            $visibleWorks = $user->getPublicWorkExperience();
        @endphp

        @if ($visibleWorks->count() > 0)
            <section class="work-experience">
                <div class="section-title">[ Work Experience ]</div>

                <div class="works">
                    @foreach ($visibleWorks as $item)
                        @php
                            $dateFrom = strtotime($item->date_from);
                            $dateTo = strtotime($item->date_to);
                        @endphp
                    
                        <div class="work">
                            <div class="work-header">
                                <div class="decorator"></div>
                                <div class="job-title">{{ $item->job_title }}</div>
                                <div class="company-name">{{ $item->company_name }} <span class="date">{{ date('M Y', $dateFrom) }} - {{ ($item->present == 1) ? 'Present' : date('M Y', $dateTo) }}</span></div>
                                <div class="description">{{ $item->description }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        @php
            $visibleEducations = $user->getPublicEducation();
        @endphp


        @if ($visibleEducations->count() > 0)
            <section class="education-experience">
                <div class="section-title">[ Education ]</div>
                <div class="educations">
                    @foreach ($visibleEducations as $education)
                        @if ($loop->last && $loop->index % 2 == 0)
                            <table>
                                <tr>
                                    <td>
                                        <div class="education">
                                            <div class="education-header">
                                                <div class="decorator"></div>
                                                <div class="grade-title">{{ $education->degree_title }}</div>
                                                <div class="school-name">{{ $education->university_name }} <span class="date">{{ date('M Y', $dateFrom) }} - {{ ($education['present'] == 1) ? 'Present' : date('M Y', $dateTo) }}</span></div>
                                                <div class="description">{{ $education->description }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="education"></div>
                                    </td>
                                </tr>
                            </table>
                        @elseif ($loop->index % 2 == 0)
                            <table>
                                <tr>
                                    <td>
                                        <div class="education">
                                            <div class="education-header">
                                                <div class="decorator"></div>
                                                <div class="grade-title">{{ $education->degree_title }}</div>
                                                <div class="school-name">{{ $education->university_name }} <span class="date">{{ date('M Y', $dateFrom) }} - {{ ($education->present == 1) ? 'Present' : date('M Y', $dateTo) }}</span></div>
                                                <div class="description">{{ $education->description }}</div>
                                            </div>
                                        </div>
                                    </td>
                        @else
                                    <td>
                                        <div class="education">
                                            <div class="education-header">
                                                <div class="decorator"></div>
                                                <div class="grade-title">{{ $education->degree_title }}</div>
                                                <div class="school-name">{{ $education->university_name }} <span class="date">{{ date('M Y', $dateFrom) }} - {{ ($education->present == 1) ? 'Present' : date('M Y', $dateTo) }}</span></div>
                                                <div class="description">{{ $education->description }}</div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        @endif
                    @endforeach
                </div>
            </section>
        @endif

        @php
            $visibleSkills = $user->getPublicSkills();
        @endphp

        @if ($visibleSkills->count() > 0)

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
                    @foreach ($visibleSkills as $skill)
                        @if ($loop->last && $loop->index % 2 == 0)
                            <table class="skills-row">
                                <tr>
                                    <td class="column">
                                        <table
                                            class="skill"
                                            style="color: {{ "#".generateUniqueRandomColor() }}"
                                        >
                                            <tr>
                                                <td class="skill-name">
                                                    {{ $skill->title }}
                                                </td>
                                                <td class="skill-percentage">
                                                    {{ $skill->percentage }}%
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="column">
                                    </td>
                                </tr>
                            </table>
                        @elseif ($loop->index % 2 == 0)
                            <table class="skills-row">
                                <tr>
                                    <td class="column">
                                        <table
                                            class="skill"
                                            style="color: {{ "#".generateUniqueRandomColor() }}"
                                        >
                                            <tr>
                                                <td class="skill-name">
                                                    {{ $skill->title }}
                                                </td>
                                                <td class="skill-percentage">
                                                    {{ $skill->percentage }}%
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                        @else
                                    <td class="column">
                                        <table
                                            class="skill"
                                            style="color: {{ "#".generateUniqueRandomColor() }}"
                                        >
                                            <tr>
                                                <td class="skill-name">
                                                    {{ $skill->title }}
                                                </td>
                                                <td class="skill-percentage">
                                                    {{ $skill->percentage }}%
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        @endif
                    @endforeach
                </div>
            </section>
        @endif

        <section class="about">
            <div class="section-title">[ About ]</div>
            <div class="content">
                <h2>About Me</h2>
                {{ $user->personalInfo->overview }}

                <div class="contact">
                    <h2>Contact</h2>
                    <div class="contact-item"><b>Email:</b> {{ $user->personalInfo->email }}</div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>