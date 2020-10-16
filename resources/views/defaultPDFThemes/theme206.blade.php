<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Theme 206 PDF</title>

    <style>

        html {
            margin: 26px 40px;
            background: #FAFAFA;
        }

        * {
            font-family: 'Poppins', Arial, Helvetica, sans-serif;
        }

        @font-face {
            font-family: 'Open Sans';
            src: url({{ public_path('/fonts/open-sans/OpenSans-Regular.ttf') }}) format("truetype");
            /* font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
            font-style: normal; // use the matching font-style here */
        }

        @font-face {
            font-family: 'Open Sans Bold';
            src: url({{ public_path('/fonts/open-sans/OpenSans-Bold.ttf') }}) format("truetype");
            /* font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
            font-style: normal; // use the matching font-style here */
        }
        
        @font-face {
            font-family: 'Poppins Bold';
            src: url({{ public_path('/fonts/Poppins/Poppins-Bold.ttf') }}) format("truetype");
            /* font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
            font-style: normal; // use the matching font-style here */
        }
        
        @font-face {
            font-family: 'Poppins';
            src: url({{ public_path('/fonts/Poppins/Poppins-Regular.ttf') }}) format("truetype");
            /* font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
            font-style: normal; // use the matching font-style here */
        }
        
        @font-face {
            font-family: 'Roboto';
            src: url({{ public_path('/fonts/Roboto/Roboto-Regular.ttf') }}) format("truetype");
            /* font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
            font-style: normal; // use the matching font-style here */
        }
        
        @font-face {
            font-family: 'Roboto Bold';
            src: url({{ public_path('/fonts/Roboto/Roboto-Bold.ttf') }}) format("truetype");
            /* font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
            font-style: normal; // use the matching font-style here */
        }

        .user-img {
            width: 144px;
            vertical-align: top;
        }

        .user-img .img-wrapper {
            border-radius: 74.5px;
            border: 5px solid #5843BE;
            width: 144px;
            height: 144px;
        }

        .user-img img {
            width: 132px;
            height: 132px;
            border-radius: 64px;
            margin: 6px;
            display: block;
        }

        .user-data {
            width: 600px;
            border-left: 20px solid transparent;
        }

        .user-name {
            font-size: 40px;
            line-height: 40px;
            font-family: 'Open Sans Bold', Arial, Helvetica, sans-serif;
        }

        .user-profession {
            font-family: 'Poppins Bold', Arial, Helvetica, sans-serif;
            font-size: 20px;
            line-height: 17px;
        }

        .user-info {
            margin-top: 10px;
        }

        .user-info a {
            display: block;
            font-family: 'Poppins', Arial, Helvetica, sans-serif;
            font-size: 18px;
            color: #5843BE;
        }

        .user-social {
            padding-top: 20px;
        }

        .user-social a {
            color: #5843BE;
            display: block;
            position: relative;
            padding-left: 40px;
            vertical-align: middle;
            font-size: 18px;
            line-height: 27px;
        }

        .user-social img {
            position: absolute;
            width: 31px;
            left: 0px;
            top: 11px;
        }


        /* Sections */

        section {
            margin-top: 47px;
        }

        .section-title {
            color: #5843BE;
            font-size: 22px;
            line-height: 30px;
            margin-bottom: 28px;
            width: 230px;
            height: 50px;
            border-radius: 5px;
            background: #F0F0F3;
            text-align: center;
            vertical-align: top;
        }

        .section-title img {
            vertical-align: middle;
            margin-right: 20px;
            margin-top: 6px;
        }

        .section-title span {
            vertical-align: middle;
        }

        .about-title {
            font-family: 'Poppins Bold', Arial, Helvetica, sans-serif;
            font-size: 26px;
            line-height: 26px;
            color: #5843BE;
        }

        .about .content {
            font-size: 18px;
            line-height: 18px;
        }

        /* Education and Work */
        .educations-container,
        .works-container
        {
            margin-left: 22px;
        }

        .educations-container table,
        .works-container table
        {
            margin-bottom: 28px;
        }

        .educations-container table:last-child,
        .works-container table:last-child
        {
            margin-bottom: 0;
        }

        .educations-container table td,
        .works-container table td
        {
            width: 50%;
            position: relative;
            vertical-align: top;
        }
        
        .educations-container table td:first-child,
        .works-container table td:first-child
        {
            border-right: 22px solid transparent;
        }
        
        .educations-container table td:last-child,
        .works-container table td:last-child
        {
            border-left: 22px solid transparent;
        }

        .education,
        .work {
            background: #FAFAFA;
            border-radius: 30px;
            padding: 30px 40px 20px;
            vertical-align: top;
        }

        .education-header,
        .work-header {
            margin-bottom: 26px;
            position: relative;
            padding-right: 20px;
        }

        .education-header img,
        .work-header img {
            position: absolute;
            right: 0;
            top: 4px;
            height: 38px;
        }

        .education-header .title,
        .work-header .title {
            font-family: 'Roboto Bold', Arial, Helvetica, sans-serif;
            color: #333333;
            font-size: 26px;
        }

        .education .description,
        .work .description {
            font-size: 20px;
            line-height: 18px;
        }

        .education .date,
        .work .date {
            margin-top: 26px;
            font-size: 20px;
            line-height: 23px;
            color: rgba(51, 51, 51, 0.5);
        }

        /* Skills */
        
        .skills {

        }

        .skill-category {
            font-family: Poppins, Arial, Helvetica, sans-serif;
            font-size: 26px;
            line-height: 39px;
            margin-bottom: 27px;
            color: #333333;
        }

        .skills table {
            width: 100%;
            margin-bottom: 22px;
            margin-left: 22px;
        }

        .skills table td {
            width: 50%;
        }

        .skills table td:first-child {
            border-right: 11px solid transparent;
        }
        
        .skills table td:last-child {
            border-left: 11px solid transparent;
        }

        .skill {
            height: 120px;
            width: 100%;
            padding: 20px 40px;
            background: #FAFAFA;
            border-radius: 9px;
        }

        .skill .header {
            margin-bottom: 40px;
            font-family: 'Roboto Bold', Arial, Helvetica, sans-serif;
            font-size: 20px;
            position: relative;
        }

        .skill-name {
            display: block;
        }

        .skill-percentage {
            text-align: right;
            position: absolute;
            right: 0;
            top: 0px;
        }

        .skill-bar {
            width: 100%;
            height: 12px;
            border-radius: 8px;
            border: solid 3px #F0F0F3;
            background: #eee;
            position: relative;
        }

        .skill-value {
            height: 12px;
            background: #5843BE;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <table class="theme-header">
        <tr>
            <td class="user-img">
                <div class="img-wrapper">
                    <img src="{{ public_path('/images/resume_builder/default-user.jpg') }}" alt="" />
                </div>
            </td>
            <td class="user-data">
                <div class="user-name">{{ $user->personalInfo->first_name.' '.$user->personalInfo->last_name }}</div>
                <div class="user-profession">{{ $user->personalInfo->designation }}</div>
                <div class="user-info">
                    <a href="#">{{ $user->personalInfo->location }}</a>
                    <a href="#">{{ $user->personalInfo->phone }}</a>
                    <a href="{{ $user->getPersonalWebsite()->link }}" target="_blank">{{ $user->getPersonalWebsite()->link }}</a>
                </div>
            </td>
            <td class="user-social">
                @foreach ($user->getSocialLinks()->toArray() as $item)
                    <a href="{{ $item['link'] }}" target="_blank">
                        <img src="{{ public_path('/images/resume_themes/theme206/'.$item['link_title'].'-icon.png') }}" alt="">
                        <span>{{ $item['link_title'] }}</span>
                    </a>
                @endforeach
            </td>
        </tr>
    </table>
    <section class="about">
        <div class="section-title">
            <img src="{{ public_path('/images/resume_themes/theme206/about-icon.png') }}" alt="" class="icon">
            <span>About me</span>
        </div>

        <div class="about-title">About me</div>

        <div class="content">
            {{ $user->personalInfo->overview }}
        </div>
    </section>

    @php
        $visibleEducations = $user->getPublicEducation();
    @endphp

    @if ($visibleEducations->count() > 0)
        <section class="education-section">
            <div class="section-title">
                <img src="{{ public_path('/images/resume_themes/theme206/education-icon.png') }}" alt="">
                <span>Education</span>
            </div>
            <div class="educations-container">
                @foreach ($visibleEducations as $item)
                    @if ($loop->last && $loop->index % 2 == 0)
                        <table>
                            <tr>
                                <td>
                                    <div class="education">
                                        <div class="education-header">
                                            <span class="title">{{ $item->degree_title }}</span>
                                            <img src="{{ public_path('/images/resume_themes/theme206/education-icon2.png') }}" alt="" class="education-icon">
                                        </div>
                                        <div class="description">
                                            {{ $item->description }}
                                        </div>
                                        <div class="date">
                                            {{ date('Y', $dateFrom) }} - {{ ($item->present == 1) ? 'Now' : date('Y', $dateTo) }}
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
                                            <span class="title">{{ $item->degree_title }}</span>
                                            <img src="{{ public_path('/images/resume_themes/theme206/education-icon2.png') }}" alt="" class="education-icon">
                                        </div>
                                        <div class="description">
                                            {{ $item->description }}
                                        </div>
                                        <div class="date">
                                            {{ date('Y', $dateFrom) }} - {{ ($item->present == 1) ? 'Now' : date('Y', $dateTo) }}
                                        </div>
                                    </div>
                                </td>
                    @else
                                <td>
                                    <div class="education">
                                        <div class="education-header">
                                            <span class="title">{{ $item->degree_title }}</span>
                                            <img src="{{ public_path('/images/resume_themes/theme206/education-icon2.png') }}" alt="" class="education-icon">
                                        </div>
                                        <div class="description">
                                            {{ $item->description }}
                                        </div>
                                        <div class="date">
                                            {{ date('Y', $dateFrom) }} - {{ ($item->present == 1) ? 'Now' : date('Y', $dateTo) }}
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
        $visibleWorks = $user->getPublicWorkExperience();
    @endphp

    @if ($visibleWorks->count() > 0)
        <section class="work-experience">
            <div class="section-title">
                <img src="{{ public_path('/images/resume_themes/theme206/work-icon.png') }}" alt="">
                <span>Work</span>
            </div>

            <div class="works-container">
                @foreach ($visibleWorks as $item)
                    @php
                        $dateFrom = strtotime($item->date_from);
                        $dateTo = strtotime($item->date_to);
                        
                    @endphp

                    @if ($loop->last && $loop->index % 2 == 0)
                        <table>
                            <tr>
                                <td>
                                    <div class="work">
                                        <div class="work-header">
                                            <span class="title">{{ $item->degree_title }}</span>
                                            <img src="{{ public_path('/images/resume_themes/theme206/work-icon2.png') }}" alt="" class="work-icon">
                                        </div>
                                        <div class="description">
                                            {{ $item->description }}
                                        </div>
                                        <div class="date">
                                            {{ date('Y', $dateFrom) }} - {{ ($item->present == 1) ? 'Now' : date('Y', $dateTo) }}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="work"></div>
                                </td>
                            </tr>
                        </table>
                    @elseif ($loop->index % 2 == 0)
                        <table>
                            <tr>
                                <td>
                                    <div class="work">
                                        <div class="work-header">
                                            <span class="title">{{ $item->degree_title }}</span>
                                            <img src="{{ public_path('/images/resume_themes/theme206/work-icon2.png') }}" alt="" class="work-icon">
                                        </div>
                                        <div class="description">
                                            {{ $item->description }}
                                        </div>
                                        <div class="date">
                                            {{ date('Y', $dateFrom) }} - {{ ($item->present == 1) ? 'Now' : date('Y', $dateTo) }}
                                        </div>
                                    </div>
                                </td>
                    @else
                                <td>
                                    <div class="work">
                                        <div class="work-header">
                                            <span class="title">{{ $item->degree_title }}</span>
                                            <img src="{{ public_path('/images/resume_themes/theme206/work-icon2.png') }}" alt="" class="work-icon">
                                        </div>
                                        <div class="description">
                                            {{ $item->description }}
                                        </div>
                                        <div class="date">
                                            {{ date('Y', $dateFrom) }} - {{ ($item->present == 1) ? 'Now' : date('Y', $dateTo) }}
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
        $publicSkills = $user->getPublicSkills();
    @endphp

    @if ($publicSkills->count() > 0)
        @php
            $skillCategories = \App\Skill::filterCategories($visibleSkills);
        @endphp

        <section class="skills">
            <div class="section-title">
                <img src="{{ public_path('/images/resume_themes/theme206/skills-icon.png') }}" alt="" class="icon">
                <span>Skills</span>
            </div>

            @foreach ($skillCategories as $category)
                <div class="skill-category">{{ $category }}</div>

                @php
                    $skillsFiltered = array_filter($visibleSkills, $category);
                @endphp

                @foreach ($skillsFiltered as $skill)
                    @if ($loop->last && $loop->index % 2 == 0)
                        <table>
                            <tr>
                                <td>
                                    <div class="skill">
                                        <div class="header">
                                            <div class="skill-name">
                                                {{ $skill->title }}
                                            </div>
                                            <div class="skill-percentage">
                                                {{ $skill->percentage }}%
                                            </div>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-value" style="{{'width: '.$skill->percentage.'%'}}"></div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="skill"></div>
                                </td>
                            </tr>
                        </table>
                    @elseif ($loop->index % 2 == 0)
                        <table>
                            <tr>
                                <td>
                                    <div class="skill">
                                        <div class="header">
                                            <div class="skill-name">
                                                {{ $skill->title }}
                                            </div>
                                            <div class="skill-percentage">
                                                {{ $skill->percentage }}%
                                            </div>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-value" style="{{'width: '.$skill->percentage.'%'}}"></div>
                                        </div>
                                    </div>
                                </td>
                    @else
                                <td>
                                    <div class="skill">
                                        <div class="header">
                                            <div class="skill-name">
                                                {{ $skill->title }}
                                            </div>
                                            <div class="skill-percentage">
                                                {{ $skill->percentage }}%
                                            </div>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-value" style="{{'width: '.$skill->percentage.'%'}}"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    @endif
                @endforeach

            @endforeach
        </section>
    @endif
</body>
</html>