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
			src: url({{ public_path('fonts/Raleway-Regular.ttf') }}) format("truetype");
            font-weight: normal;
        }
		
		body {
			font-family: Raleway, Arial, 'sans-serif';
            color: #104EFB;
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

        p {
            margin-top: 0;
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
            margin-right: 30px;
            vertical-align: bottom;

            color: #104EFB;
        }

        .user-social .link:last-child {
            margin: 0;
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

            margin-top: 40px;
        }

        .works-container,
        .educations-container {
            margin-top: 40px;
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

        .skills-container table {
            width: 100%;
        }

        .skills-container table tr .skill {
            border-top: 35px solid transparent;
            width: 25%;
            align-content: center;
			vertical-align: top;
        }

        .skills-container table tr .skill .percentage,
		.skills-container table tr .skill .skill-img {
			text-align: center;
			align-content: center;
        }


        .skills-container table tr .skill .percentage {
			margin-bottom: 15px;
            font-weight: bold;
		}

        .skills-container table tr .skill .skill-img {
            vertical-align: top;
        }

		.skills-container table tr .skill .skill-img img {
            display: block;
            vertical-align: middle;
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
                <div class="user-name">{{ $user->personalInfo->first_name.' '.$user->personalInfo->last_name }}</div>
                <div class="user-profession">{{ $user->personalInfo->designation }}</div>
            </div>

            <div class="user-data">
                <div class="link">
                    <img style="width: 8px;" src="{{public_path('images/resume_themes/theme302/location-icon.png')}}" alt="">
                    {{ $user->personalInfo->location }}
                </div>
                <a class="link" href='#'>
                    <img style="width: 12px;" src="{{public_path('images/resume_themes/theme302/whatsapp-icon.png')}}" alt="">
                    {{ $user->personalInfo->phone }}
                </a>
                <a class="link" href='{{ $user->getPersonalWebsite()->link }}'>
                    <img style="width: 10px;" src="{{public_path('images/resume_themes/theme302/google-icon.png')}}" alt="">
                    {{ $user->getPersonalWebsite()->link }}
                </a>
            </div>
        </div>

        <div class="user-social">
            @foreach ($user->getSocialLinks()->toArray() as $item)
                <a href="{{ $item['link'] }}" class="link">
                    <img src="{{public_path('images/resume_themes/theme302/'.strtolower($item['link_title']).'-icon.png')}}" alt="">
                    {{$item['link_title']}} user
                </a>
            @endforeach
        </div>
    </div>

    <div class="separator-decorator"></div>

    <section>
        <div class="section-title">
            About
            <div class="title-decorator" style="width: 85px;"></div>
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
                Works
                <div class="title-decorator" style="width: 90px"></div>
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
                                <div class="left">
                                    <div class="work-title">{{ $item->job_title }}</div>
                                    <div class="work-date">{{ date('Y', $dateFrom) }} - {{ ($item->present == 1) ? 'Now' : date('Y', $dateTo) }}</div>
                                </div>
                                <div class="right">
                                    <div class="company-name">{{ $item->company_name }}<</div>
                                    <div class="work-description">
                                        {{ $item->description }}
                                    </div>
                                </div>
                            </div>
                            <div class="work">
                            </div>
                        </div>
                    @elseif ($loop->index % 2 == 0)
                        <div class="row">
                            <div class="work">
                                <div class="left">
                                    <div class="work-title">{{ $item->job_title }}</div>
                                    <div class="work-date">{{ date('Y', $dateFrom) }} - {{ ($item->present == 1) ? 'Now' : date('Y', $dateTo) }}</div>
                                </div>
                                <div class="right">
                                    <div class="company-name">{{ $item->company_name }}<</div>
                                    <div class="work-description">
                                        {{ $item->description }}
                                    </div>
                                </div>
                            </div>
                    @else
                            <div class="work">
                                <div class="left">
                                    <div class="work-title">{{ $item->job_title }}</div>
                                    <div class="work-date">{{ date('Y', $dateFrom) }} - {{ ($item->present == 1) ? 'Now' : date('Y', $dateTo) }}</div>
                                </div>
                                <div class="right">
                                    <div class="company-name">{{ $item->company_name }}<</div>
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
        $visibleEducations = $user->getPublicEducation();
    @endphp

    @if ($visibleEducations->count() > 0)
        <section>
            <div class="section-title">
                Education
                <div class="title-decorator" style="width: 140px"></div>
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
                                <div class="left">
                                    <div class="school-title">{{ $item->degree_title }}</div>
                                    <div class="school-date">{{ date('Y', $dateFrom) }} - {{ ($item->present == 1) ? 'Now' : date('Y', $dateTo) }}</div>
                                </div>
                                <div class="right">
                                    <div class="school-name">{{ $item->university_name }}</div>
                                    <div class="education-description">
                                        {{ $item->description }}
                                    </div>
                                </div>
                            </div>
                            <div class="education"></div>
                        </div>
                    @elseif ($loop->index % 2 == 0)
                        <div class="row">
                            <div class="education">
                                <div class="left">
                                    <div class="school-title">{{ $item->degree_title }}</div>
                                    <div class="school-date">{{ date('Y', $dateFrom) }} - {{ ($item->present == 1) ? 'Now' : date('Y', $dateTo) }}</div>
                                </div>
                                <div class="right">
                                    <div class="school-name">{{ $item->university_name }}</div>
                                    <div class="education-  description">
                                        {{ $item->description }}
                                    </div>
                                </div>
                            </div>
                    @else
                            <div class="education">
                                <div class="left">
                                    <div class="school-title">{{ $item->degree_title }}</div>
                                    <div class="school-date">{{ date('Y', $dateFrom) }} - {{ ($item->present == 1) ? 'Now' : date('Y', $dateTo) }}</div>
                                </div>
                                <div class="right">
                                    <div class="school-name">{{ $item->university_name }}</div>
                                    <div class="education-description">
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

    @php
        $publicSkills = $user->getPublicSkills();
    @endphp

    @if ($publicSkills->count() > 0)
        <section>
            <div class="section-title">
                Skills
                <div class="title-decorator" style="width: 72px"></div>
            </div>
            <div class="skills-container">
                @foreach ($publicSkills as $skill)

                    @if ($loop->last && $loop->index % 4 == 0)
                        <table>
                            <tr>
                                <td class="skill">
                                    <div class="percentage">{{ $skill->percentage }}%</div>
                                    <div class="skill-img">{{ $skill->title }}</div>
                                </td>
                                @for ($i = 0; $i < 4; $i++)
                                    <td>
                                        <div class="skill"></div>
                                    </td>
                                @endforeach
                            </tr>
                        </table>
                    @elseif ($loop->last && $loop->index % 4 != 3)
                                <td class="skill">
                                    <div class="percentage">{{ $skill->percentage }}%</div>
                                    <div class="skill-img">{{ $skill->title }}</div>
                                </td>
                                @for ($i = 0; $i < 7 - $loop->index % 8; $i++)
                                    <td>
                                        <div class="skill"></div>
                                    </td>
                                @endforeach
                            </tr>
                        </table>
                    @elseif ($loop->index % 4 == 0)
                        <table>
                            <tr>
                                <td class="skill">
                                    <div class="percentage">{{ $skill->percentage }}%</div>
                                    <div class="skill-img">{{ $skill->title }}</div>
                                </td>
                    @elseif ($loop->index % 4 != 3)
                                <td class="skill">
                                    <div class="percentage">{{ $skill->percentage }}%</div>
                                    <div class="skill-img">{{ $skill->title }}</div>
                                </td>
                            </tr>
                        </table>
                    @else
                        <td class="skill">
                            <div class="percentage">{{ $skill->percentage }}%</div>
                            <div class="skill-img">{{ $skill->title }}</div>
                        </td>
                    @endif
                @endforeach
            </div>
        </section>
    @endif
</body>
</html>
