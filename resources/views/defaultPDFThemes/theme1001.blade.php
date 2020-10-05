<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Theme 1001</title>
    <style>
        @font-face {
            font-family: 'Mulish Bold';
			src: url({{ public_path('fonts/Mulish/static/Mulish-Bold.ttf') }}) format("truetype");
            font-weight: normal;
        }
        
        @font-face {
            font-family: 'Mulish SemiBold';
			src: url({{ public_path('fonts/Mulish/static/Mulish-SemiBold.ttf') }}) format("truetype");
            font-weight: normal;
        }
        
        @font-face {
            font-family: 'Mulish Medium';
			src: url({{ public_path('fonts/Mulish/static/Mulish-Medium.ttf') }}) format("truetype");
            font-weight: normal;
        }
        
        @font-face {
            font-family: 'Mulish Regular';
			src: url({{ public_path('fonts/Mulish/static/Mulish-Regular.ttf') }}) format("truetype");
            font-weight: normal;
        }

        html {
            margin: 0;
        }

        body {
            padding: 80px 0;
            background-color: #fff;
        }

        .theme-header {
            padding: 25px 50px 30px;
            height: 255px;
            background-image: url('/images/resume_themes/theme10001/bg-header.png');
            background-color: #3D5ED4;
            width: 100%;
            margin-top: -80px;
            position: relative;
            color: #F3F5FC;
        }

        .theme-header .user-img {
            width: 250px;
            border-radius: 126px;
            position: absolute;
            border: 2px solid #fff;
        }

        .theme-header .user-name {
            font-family: 'Mulish Bold', Arial, Helvetica, sans-serif;
            font-size: 30px;
            margin-top: -15px;
        }

        .theme-header .user-profession {
            font-family: 'Mulish Regular', Arial, Helvetica, sans-serif;
            font-size: 26px;
            margin-top: -2px;
            margin-bottom: 10px;
        }

        .theme-header .user-data {
            margin-left: 270px;
        }

        .theme-header .user-personal {
            width: 450px;
            padding-top: 40px;
            vertical-align: top;
        }

        .theme-header .user-data a {
            color: #fff;
            font-family: 'Mulish Regular', Arial, Helvetica, sans-serif;
            font-size: 16px;
            text-decoration: none;
            display: block;
        }

        .theme-header .user-social {
            width: 300px;
            border-left: 50px solid transparent;
            padding-top: 40px;
        }

        .theme-header .user-social a {
            display: block;
            margin-bottom: 15px;
            vertical-align: top;
        }

        .theme-header .user-social a img {
            height: 30px;
            margin-top: 2px;
            margin-right: 10px;
        }

        section {
            padding: 70px 50px 0;
            width: 100%;
            font-family: 'Mulish Regular', Arial, Helvetica, sans-serif;
            font-size: 16px;
            color: #838BA4;
            margin-left: 50px;
        }

        section .section-title {
            font-family: 'Mulish SemiBold', Arial, Helvetica, sans-serif;
            font-size: 25px;
            width: 180px;
            height: 48px;
            padding-top: 12px;
            /* padding-left: 50px; */
            margin-left: -50px;
            color: #F3F5FC;
            text-align: center;
            background-color: #3D5ED4;
        }

        section .section-title .title-decorator {
            display: none;            
            height: 5px;
            margin-top: 13px;
            margin-left: -3px;
            border-radius: 2.5px;
            background-color: #F3F5FC;
        }

        .about .section-title .title-decorator {
            width: 80px;
        }

        /* Work and Education */

        .work-experience .section-title .title-decorator {
            width: 140px;
        }
        
        .educations .section-title .title-decorator {
            width: 128px;
        }

        .work-experience table,
        .educations table {
            width: 100%;
        }

        .work,
        .education {
            border-bottom: 50px solid transparent;
            border-top: 10px solid transparent;
            border-left: 30px solid transparent;
            border-right: 20px solid transparent;
            width: 50%;
            vertical-align: top;
        }

        .work:last-child,
        .education:last-child {
            border-right: 0px solid transparent;
            border-left: 50px solid transparent;
        }

        .work-wrapper,
        .education-wrapper {
            padding: 30px;
            border-radius: 20px;
            vertical-align: top;
        }

        .work .work-header,
        .education .education-header {
            position: relative;
        }

        .work-header .decorator,
        .education-header .decorator {
            display: none;
            height: 1px;
            background-color: #BEC2D4;
            width: 40px;
            position: absolute;
            left: -47px;
            top: 22px;
        }

        .work .work-header .work-icon,
        .education .education-header .education-icon {
            display: none;
            height: 0;
            width: 0;
            position: absolute;
            left: -85px;
            top: 10px;
        }

        .work .job-title,
        .education .grade-title {
            color: #172C7A;
            font-family: 'Mulish SemiBold', Arial, Helvetica, sans-serif;
            font-size: 18px;
            padding-right: 100px;
            margin-top: 30px;
            position: relative;
        }

        .job-title .decorator,
        .grade-title .decorator {
            display: none;
            position: absolute;
            left: -25px;
            top: 10px;
            background-color: #172C7A;
            height: 15px;
            width: 15px;
            border-radius: 7.5px;
        }

        .job-title .badge,
        .grade-title .badge {
            position: absolute;
            right: 40px;
            top: -5px;
            color: #F8AE11;
            height: 30px;
            padding: 0 14px;
            margin-top: 4px;
            border-radius: 15px;
            font-family: 'Mulish Regular', Arial, Helvetica, sans-serif;
            font-size: 15px;
            background-color: #FDEAC1;
        }

        .work-header .company-name,
        .education-header .school-name {
            color: #172C7A;
            font-family: 'Mulish Bold', Arial, Helvetica, sans-serif;
            font-size: 22px;
            padding-right: 100px;
        }

        .work .description,
        .education .description {
            margin-top: 10px;
        }

        .work .date,
        .education .date {
            position: absolute;
            right: 40px;
            top: 10px;
            color: #838BA4;
            font-family: 'Mulish Regular', Arial, Helvetica, sans-serif;
            font-size: 14px;
        }

        /* Skills and Languages */
        .skills .section-title .title-decorator, {
            width: 80px;
        }

        .languages .section-title .title-decorator, {
            width: 140px;
        }

        .skills table,
        .languages table {
            width: 100%;
        }

        .skills table td,
        .languages table td {
            width: 50%;
        }

        .skills table td,
        .languages table td {
            border-bottom: 0 solid transparent;
        }
        
        .skills table:last-child td,
        .languages table:last-child td {
            border-bottom: 0 solid transparent;
        }

        .skills table td:last-child,
        .languages table td:last-child {
            border-left: 22px solid transparent;
        }
        
        .skills table td:first-child,
        .languages table td:first-child {
            border-right: 22px solid transparent;
        }

        .skills .container,
        .languages .container {
            margin-top: 50px;
        }

        .skill,
        .language {
            padding: 15px 58px;
            font-family: 'Mulish Bold', Arial, Helvetica, sans-serif;
            font-size: 22px;
        }

        .skill-data,
        .language-data {
            color: #172C7A;
            position: relative;
            margin-bottom: 20px;
        }

        .skill .percentage,
        .language .percentage {
            position: absolute;
            right: 0;
            top: 4px;
            color: #F8AB08;
        }

        .skill-bar,
        .language-bar {
            position: relative;
            background: #D3D6E4;
            height: 10px;
            border-radius: 5px;
            margin-top: 5px;
        }

        .skill-bar .fill,
        .language-bar .fill {
            background: #3D5ED4;
            height: 10px;
            border-radius: 5px;
        }

    </style>
</head>
<body>

    <div class="theme-header">
        <img src="{{$user->personalInfo->profile_pic}}" alt="" class="user-img" />
        <table class="user-data">
            <tr>
                <td class="user-personal">
                    <div class="user-name">{{ $user->personalInfo->first_name.' '.$user->personalInfo->last_name }}</div>
                    <div class="user-profession">{{ $user->personalInfo->designation }}</div>
                    <div class="user-info">
                        <a href="#">{{ $user->personalInfo->location }}</a>
                        <a href="#">{{ $user->personalInfo->phone }}</a>
                        <a href="#">{{ $user->personalInfo->email }}</a>
                    </div>
                </td>
                <td class="user-social">
                    @foreach ($user->getSocialLinks()->toArray() as $item)
                        <a 
                            href="{{ $item['link'] }}"
                            class="social-link">
                                <img 
                                    src="{{ public_path('images/resume_themes/theme1001/social_icons/'.strtolower($item['link_title']).'-icon.png') }}"
                                    alt=""
                                >
                                {{ $item['link_title'] }} username
                        </a>
                    @endforeach
                </td>
            </tr>
        </table>
    </div>

    <section class="about">
        <h1 class="section-title">
            About
            {{-- <div class="title-decorator"></div> --}}
        </h1>

        <div class="content">
            {{-- Split paragraphs --}}
            {{ $user->personalInfo->overview }}
        </div>
    </section>

    @if ($user->workExperience->count() > 0)
        <section class="work-experience">
            <h1 class="section-title">
                Experience
                {{-- <div class="title-decorator"></div> --}}
            </h1>
            
            @foreach ($user->workExperience->toArray() as $item)
                @php
                    $dateFrom = strtotime($item['date_from']);
                    $dateTo = strtotime($item['date_to']);
                @endphp

                @if ($loop->last && $loop->index % 2 == 0)
                    <table>
                        <tr>
                            <td class="work">
                                <div class="work-wrapper">
                                    <div class="work-header">
                                        <div class="company-name">{{ $item['company_name'] }}</div>
                                        <div class="decorator"></div>
                                        {{-- <img src="{{ public_path('/images/resume_themes/theme1001/work-icon.png') }}" alt="" class="work-icon"> --}}
                                        <div class="date">{{ date('Y', $dateFrom) }} - {{ ($item['present'] == 1) ? date('Y') : date('Y', $dateTo) }}</div>
                                    </div>
                                    <div class="job-title">
                                        <div class="decorator"></div>{{ $item['job_title'] }}
                                        {{-- <div class="badge">Full Time</div> --}}
                                    </div>
                                    <div class="description">{{ $item['description'] }}</div>
                                    {{-- <div class="job-title">
                                        <div class="decorator"></div>Fullstack Developer Jr.
                                        <div class="badge">Full Time</div>
                                    </div>
                                        <div class="description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores, ea. Cum id dicta, sunt fugiat atque tempore quaerat.</div> --}}
                                </div>
                            </td>
                            <td class="work">
                                <div class="work-wrapper"></div>
                            </td>
                        </tr>
                    </table>

                @elseif ($loop->index % 2 == 0)
                    <table>
                        <tr>
                            <td class="work">
                                <div class="work-wrapper">
                                    <div class="work-header">
                                        <div class="company-name">{{ $item['company_name'] }}</div>
                                        <div class="decorator"></div>
                                        {{-- <img src="{{ public_path('/images/resume_themes/theme1001/work-icon.png') }}" alt="" class="work-icon"> --}}
                                        <div class="date">{{ date('Y', $dateFrom) }} - {{ ($item['present'] == 1) ? date('Y') : date('Y', $dateTo) }}</div>
                                    </div>
                                    <div class="job-title">
                                        <div class="decorator"></div>{{ $item['job_title'] }}
                                        {{-- <div class="badge">Full Time</div> --}}
                                    </div>
                                    <div class="description">{{ $item['description'] }}</div>
                                    {{-- <div class="job-title">
                                        <div class="decorator"></div>Fullstack Developer Jr.
                                        <div class="badge">Full Time</div>
                                    </div>
                                        <div class="description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores, ea. Cum id dicta, sunt fugiat atque tempore quaerat.</div> --}}
                                </div>
                            </td>
                @else
                            <td class="work">
                                <div class="work-wrapper">
                                    <div class="work-header">
                                        <div class="company-name">{{ $item['company_name'] }}</div>
                                        <div class="decorator"></div>
                                        {{-- <img src="{{ public_path('/images/resume_themes/theme1001/work-icon.png') }}" alt="" class="work-icon"> --}}
                                        <div class="date">{{ date('Y', $dateFrom) }} - {{ ($item['present'] == 1) ? date('Y') : date('Y', $dateTo) }}</div>
                                    </div>
                                    <div class="job-title">
                                        <div class="decorator"></div>{{ $item['job_title'] }}
                                        {{-- <div class="badge">Full Time</div> --}}
                                    </div>
                                    <div class="description">{{ $item['description'] }}</div>
                                </div>
                            </td>
                        </tr>
                    </table>
                @endif
            @endforeach
        </section>
    @endif

    @if ($user->education->count() > 0)
        <section class="educations">
            <h1 class="section-title">
                Education
                {{-- <div class="title-decorator"></div> --}}
            </h1>

            @foreach ($user->education->toArray() as $item)
                @php
                    $dateFrom = strtotime($item['date_from'])    ;
                    $dateTo = strtotime($item['date_to'])
                    
                @endphp

                @if ($loop->last && $loop->index % 2 == 0)
                    <table>
                        <tr>
                            <td class="education">
                                <div class="education-wrapper">
                                    <div class="education-header">
                                        <div class="school-name">{{ $item['university_name'] }}</div>
                                        <div class="decorator"></div>
                                        {{-- <img src="{{ public_path('/images/resume_themes/theme1001/education-icon.png') }}" alt="" class="education-icon"> --}}
                                        <div class="date">{{ date('Y', $dateFrom) }} - {{ ($item['present'] == 1) ? date('Y') : date('Y', $dateTo) }}</div>
                                    </div>
                                    <div class="grade-title">{{ $item['degree_title'] }}</div>
                                    <div class="description">{{ $item['description'] }}</div>
                                </div>
                            </td>
                            <td class="education">
                                <div class="education-wrapper"></div>
                            </td>
                        </tr>
                    </table>

                @elseif ($loop->index % 2 == 0)
                    <table>
                        <tr>
                            <td class="education">
                                <div class="education-wrapper">
                                    <div class="education-header">
                                        <div class="school-name">{{ $item['university_name'] }}</div>
                                        <div class="decorator"></div>
                                        {{-- <img src="{{ public_path('/images/resume_themes/theme1001/education-icon.png') }}" alt="" class="education-icon"> --}}
                                        <div class="date">{{ date('Y', $dateFrom) }} - {{ ($item['present'] == 1) ? date('Y') : date('Y', $dateTo) }}</div>
                                    </div>
                                    <div class="grade-title">{{ $item['degree_title'] }}</div>
                                    <div class="description">{{ $item['description'] }}</div>
                                </div>
                            </td>
                @else
                            <td class="education">
                                <div class="education-wrapper">
                                    <div class="education-header">
                                        <div class="school-name">{{ $item['university_name'] }}</div>
                                        <div class="decorator"></div>
                                        {{-- <img src="{{ public_path('/images/resume_themes/theme1001/education-icon.png') }}" alt="" class="education-icon"> --}}
                                        <div class="date">{{ date('Y', $dateFrom) }} - {{ ($item['present'] == 1) ? date('Y') : date('Y', $dateTo) }}</div>
                                    </div>
                                    <div class="grade-title">{{ $item['degree_title'] }}</div>
                                    <div class="description">{{ $item['description'] }}</div>
                                </div>
                            </td>
                        </tr>
                    </table>
                @endif
            @endforeach
        </section>
    @endif

    @if ($user->skills->count() > 0)
        <section class="skills">
            <h1 class="section-title">
                Skills
                {{-- <div class="title-decorator"></div> --}}
            </h1>

            <div class="container">
                @foreach ($user->skills as $skill)
                    @if ($loop->last && $loop->index % 2 == 0)
                        <table>
                            <tr>
                                <td>
                                    <div class="skill">
                                        <div class="skill-data">
                                            <div class="skill-name">{{ $skill->title }}</div>
                                            <div class="percentage">{{ $skill->percentage }}%</div>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="fill" style="{{ 'width: '.$skill->percentage.'%' }}"></div>
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
                                        <div class="skill-data">
                                            <div class="skill-name">{{ $skill->title }}</div>
                                            <div class="percentage">{{ $skill->percentage }}%</div>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="fill" style="{{ 'width: '.$skill->percentage.'%' }}"></div>
                                        </div>
                                    </div>
                                </td>
                    @else
                                <td>
                                    <div class="skill">
                                        <div class="skill-data">
                                            <div class="skill-name">{{ $skill->title }}</div>
                                            <div class="percentage">{{ $skill->percentage }}%</div>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="fill" style="{{ 'width: '.$skill->percentage.'%' }}"></div>
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

    @if ($user->languages->count() > 0)
        <section class="languages">
            <h1 class="section-title">
                Languages
                {{-- <div class="title-decorator"></div> --}}
            </h1>

            <div class="container">
                @foreach ($user->languages as $language)
                    @if ($loop->last && $loop->index % 2 == 0)
                        <table>
                            <tr>
                                <td>
                                    <div class="language">
                                        <div class="language-data">
                                            <div class="language-name">{{$language->label}}</div>
                                            <div class="percentage">100%</div>
                                        </div>
                                        <div class="language-bar">
                                            <div class="fill" style="width: 100%"></div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="language"></div>
                                </td>
                            </tr>
                        </table>
                    @elseif ($loop->index % 2 == 0)
                        <table>
                            <tr>
                                <td>
                                    <div class="language">
                                        <div class="language-data">
                                            <div class="language-name">{{$language->label}}</div>
                                            <div class="percentage">100%</div>
                                        </div>
                                        <div class="language-bar">
                                            <div class="fill" style="width: 100%"></div>
                                        </div>
                                    </div>
                                </td>
                    @else
                                <td>
                                    <div class="language">
                                        <div class="language-data">
                                            <div class="language-name">{{$language->label}}</div>
                                            <div class="percentage">100%</div>
                                        </div>
                                        <div class="language-bar">
                                            <div class="fill" style="width: 100%"></div>
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
</body>
</html>