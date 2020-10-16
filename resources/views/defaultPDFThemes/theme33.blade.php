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
        .user-info {
            margin-top: 12px;
        }

        .user-info .user-img__container {
            height: 210px;
            vertical-align: top;
            padding-right: 30px;
        }

        .user-img {
            height: 100%;
        }

        .user-name {
            font-family: 'Open Sans Bold', Arial, sans-serif;
            font-size: 40px;
            margin-bottom: 0;
        }

        .user-info__personal__data {
            width: 600px;
        }

        .user-profession {
            font-family: 'Open Sans', Arial, sans-serif;
            margin-bottom: 20px;
            margin-top: -10px;
        }

        .user-contact{
            font-size: 14px;
            line-height: 1.2;
            font-family: 'Open Sans';
        }

        .user-social {
            font-family: 'Open Sans';
            font-size: 14px;
            line-height: 19px;
            width: 300px;
        }

        .user-social .link {
            margin-bottom: 8px;
        }

        .user-social img {
            margin-top: 2px;
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
            font-family: 'Open Sans Bold';
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
            font-family: 'Open Sans', Arial, Helvetica, sans-serif;
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
            font-family: 'Open Sans', Arial, Helvetica, sans-serif;
            font-style: normal;
            font-size: 24px;
        }

        .job-title {
            font-family: 'Open Sans', Arial, Helvetica, sans-serif;
            font-style: normal;
            font-size: 18px;
        }

        .work-date {
            font-family: 'Open Sans', Arial, Helvetica, sans-serif;
            font-style: normal;
            font-size: 13px;
        }

        .work-description {
            font-family: 'Open Sans', Arial, Helvetica, sans-serif;
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
            font-family: 'Open Sans', Arial, Helvetica, sans-serif;
            font-style: normal;
            font-size: 32px;
            line-height: 44px;
        }

        .grade-and-date {
            margin-top: 50px;
            font-family: 'Open Sans', Arial, Helvetica, sans-serif;
            font-style: normal;
            font-size: 18px;
            line-height: 25px;
            margin-bottom: 30px;
        }

        .education-description {
            font-family: 'Open Sans', Arial, Helvetica, sans-serif;
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
            font-family: 'Open Sans', Arial, Helvetica, sans-serif;
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
            font-family: 'Open Sans', Arial, Helvetica, sans-serif;
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
        <table class="user-info__personal">
            <tr>
                <td class="user-img__container">
                    <img class="user-img" src="{{$user->personalInfo->profile_pic}}" alt="">
                </td>
                <td class="user-info__personal__data">
                    <div class="user-name">{{ $user->personalInfo->first_name.' '.$user->personalInfo->last_name }}</div>
                    <div class="user-profession">{{ $user->personalInfo->designation }}</div>
    
                    <div class="user-contact">
                        <div>{{ $user->personalInfo->location }}</div>
                        <div>{{ $user->personalInfo->phone }}</div>
                        <div><a href="{{ $user->getPersonalWebsite()->link }}">{{ $user->getPersonalWebsite()->link }}</a></div>
                    </div>
                </td>
                <td class="user-social">
                    @foreach ($user->getSocialLinks()->toArray() as $item)
                        <div class="link"><a href="{{ $item['link'] }}"><img src="{{public_path('images/resume_themes/theme33'.strtolower($item['link_title']).'.png')}}" alt=""><span>{{$item['link_title']}} user</span></a></div>
                    @endforeach
                </td>
            </tr>
        </table>
        
        <div class="line-decorator"></div>

        <section>
            <div class="section-title">
                About
                <div class="title-decorator"></div>
            </div>
            <div class="content">
                {{ $user->personalInfo->overview }}
            </div>
        </section>

        @php
            $visibleWorks = $user->getPublicWorkExperience();
        @endphp

        @if ($visibleWorks->count() > 0)
            <section>
                <div class="section-title">
                    Work
                    <div class="title-decorator"></div>
                </div>
                <div class="works-container">

                    @foreach ($visibleWorks as $item)
                        @php
                            $dateFrom = strtotime($item->date_from);
                            $dateTo = strtotime($item->date_to);
                        @endphp

                        @if ($loop->last && $loop->index % 2 == 0)
                            <div class="row">
                                <div class="work">
                                    <div class="work-header">
                                        <div class="company-name">
                                            {{ $item->company_name }}
                                            <div class="title-decorator"></div>
                                        </div>
                                        <div class="job-title">{{ $item->job_title }}</div>
                                    </div>
                                    <div class="work-details">
                                        <div class="work-date">
                                            <div class="date">Duration:</div>
                                            <div class="duration">{{ date('Y', $dateFrom) }} - {{ ($item->present == 1) ? 'Present' : date('Y', $dateTo) }}</div>
                                        </div>
                                        <div class="work-description">
                                            {{ $item->description }}
                                        </div>
                                    </div>
                                </div>
                                <div class="work"></div>
                            </div>
                        @elseif ($loop->index % 2 == 0)
                            <div class="row">
                                <div class="work">
                                    <div class="work-header">
                                        <div class="company-name">
                                            {{ $item->company_name }}
                                            <div class="title-decorator"></div>
                                        </div>
                                        <div class="job-title">{{ $item->job_title }}</div>
                                    </div>
                                    <div class="work-details">
                                        <div class="work-date">
                                            <div class="date">Duration:</div>
                                            <div class="duration">{{ date('Y', $dateFrom) }} - {{ ($item->present == 1) ? 'Present' : date('Y', $dateTo) }}</div>
                                        </div>
                                        <div class="work-description">
                                            {{ $item->description }}
                                        </div>
                                    </div>
                                </div>
                        @else
                                <div class="work">
                                    <div class="work-header">
                                        <div class="company-name">
                                            {{ $item->company_name }}
                                            <div class="title-decorator"></div>
                                        </div>
                                        <div class="job-title">{{ $item->job_title }}</div>
                                    </div>
                                    <div class="work-details">
                                        <div class="work-date">
                                            <div class="date">Duration:</div>
                                            <div class="duration">{{ date('Y', $dateFrom) }} - {{ ($item->present == 1) ? 'Present' : date('Y', $dateTo) }}</div>
                                        </div>
                                        <div class="work-description">
                                            {{ $item->description }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </section>
        @endif

        <div class="page-break"></div>

        @php
            $visibleEducations = $user->getPublicEducation()
        @endphp

        @if ($visibleEducations->count() > 0)
            <section class="education-section">
                <div class="section-title">
                    Education
                    <div class="title-decorator"></div>
                </div>
                <div class="educations-container">

                    @foreach ($visibleEducations as $item)
                        @php
                            $dateFrom = strtotime($item->date_from);
                            $dateTo = strtotime($item->date_to);
                        @endphp

                        @if ($loop->last && $loop->index % 2 == 0)
                            <div class="row">
                                <div class="education">
                                    <div class="institute-name">{{ $item->university_name }}</div>
                                    <div class="grade-and-date">{{ $item->degree_title }}, {{ date('Y', $dateFrom) }} - {{ ($item->present == 1) ? 'Now' : date('Y', $dateTo) }}</div>
                                    <div class="education-description">{{ $item->description }}</div>
                                </div>
                                <div class="education"></div>
                            </div>
                        @elseif ($loop->index % 2 == 0)
                            <div class="row">
                                <div class="education">
                                    <div class="institute-name">{{ $item->university_name }}</div>
                                    <div class="grade-and-date">{{ $item->degree_title }}, {{ date('Y', $dateFrom) }} - {{ ($item->present == 1) ? 'Now' : date('Y', $dateTo) }}</div>
                                    <div class="education-description">{{ $item->description }}</div>
                                </div>
                        @else
                                <div class="education">
                                    <div class="institute-name">{{ $item->university_name }}</div>
                                    <div class="grade-and-date">{{ $item->degree_title }}, {{ date('Y', $dateFrom) }} - {{ ($item->present == 1) ? 'Now' : date('Y', $dateTo) }}</div>
                                    <div class="education-description">{{ $item->description }}</div>
                                </div>
                            </div>
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
            $skillCategories = \App\Skill::filterCategories($visibleSkills);
        @endphp
            <section>
                <div class="section-title">
                    Skills
                    <div class="title-decorator"></div>
                </div>

                <div class="skills-container">
                    @foreach ($skillCategories as $category)
                        <div class="skill-category">{{ $category }}
                            <div class="title-decorator"></div>
                        </div>
    
                        <div class="skills-list">
                            @php
                                $skillsFiltered = array_filter($visibleSkills, $category);
                            @endphp

                            @foreach ($skillsFiltered as $skill)
                                @if ($loop->last && $loop->index % 2 == 0)
                                    <div class="row">
                                        <div class="skill">
                                            <div class="skill-header">
                                                <div class="skill-name">{{ $skill->title }}</div>
                                                <div class="percentage">{{ $skill->percentage }}</div>
                                            </div>
                                            <div class="skill-bar">
                                                <div class="skill-total" style="{{ 'width: '.$skill->percentage }}"></div>
                                                <div class="skill-rest"></div>
                                            </div>
                                        </div>
                                        <div class="skill"></div>
                                    </div>
                                @elseif ($loop->index % 2 == 0)
                                    <div class="row">
                                        <div class="skill">
                                            <div class="skill-header">
                                                <div class="skill-name">{{ $skill->title }}</div>
                                                <div class="percentage">{{ $skill->percentage }}</div>
                                            </div>
                                            <div class="skill-bar">
                                                <div class="skill-total" style="{{ 'width: '.$skill->percentage }}"></div>
                                                <div class="skill-rest"></div>
                                            </div>
                                        </div>
                                @else
                                        <div class="skill">
                                            <div class="skill-header">
                                                <div class="skill-name">{{ $skill->title }}</div>
                                                <div class="percentage">{{ $skill->percentage }}</div>
                                            </div>
                                            <div class="skill-bar">
                                                <div class="skill-total" style="{{ 'width: '.$skill->percentage }}"></div>
                                                <div class="skill-rest"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
    </div>
</body>
</html>