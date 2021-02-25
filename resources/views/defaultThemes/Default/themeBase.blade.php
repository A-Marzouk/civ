<div class="header">
    <div class="personal-info">
        <div class="profile-picture">
            <img class="main-photo" src="{{$user->personalInfo->profile_pic}}" alt="">
            <div id="messageModal">
                <message-modal></message-modal>
            </div>
            <img class="video-icon" src="/images/themes/theme{{$themeCode}}/video.png" alt="">
        </div>
        <div class="details">
            <div class="name">
                {{$user->personalInfo->first_name}} {{$user->personalInfo->last_name}}
            </div>
            <div class="job-title">
                {{$user->personalInfo->designation}}
            </div>
            <div class="social-icons">
                @foreach( $user->links as $link)
                    @if($link->is_public)
                        <div class="single-icon">
                            <a href="{{$link->link}}">
                                <img src="/images/themes/theme{{$themeCode}}/social/{{strtolower($link->link_title)}}.svg" alt="{{$link->link_title}} icon">
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div id="menu" class="menu">
        <div id="menu-open" class="menu-icon">
            <img src="/images/themes/theme{{$themeCode}}/menu.png" alt="">
        </div>
        <div class="menu-body" id="menu-body">
            <div class="close-icon">
                <img src="/images/themes/theme{{$themeCode}}/menu-icons/small-x.png" alt="close" id="menu-close">
            </div>

            <div class="menu-tabs-wrapper">
                @foreach( $user->tabs as $tab)
                    @if($tab->is_public && in_array($tab->title, ['portfolio', 'work_experience', 'education', 'about_me', 'skills', 'media', 'hobbies', 'references', 'achievements']))
                        <div class="menu-tab" data-name="{{$tab->title}}">
                            <img src="/images/themes/theme{{$themeCode}}/menu-icons/{{$tab->title}}.svg" alt="tab icon">
                            <div class="tab-name">
                                {{$tab->label}}
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
    </div>
</div>
<div class="header-line-footer"></div>
<div class="tabs-contents">
    <div class="tabs-contents-wrapper">
        <div class="single-tab-content portfolio" data-name="portfolio">
            <div class="portfolio-header">
                <div class="categories">
                    <div class="single-category portfolio active" data-category="all">
                        All
                    </div>
                    <div class="single-category portfolio" data-category="development">
                        Development
                    </div>
                    <div class="single-category portfolio" data-category="UX/UI Design">
                        UX/UI Design
                    </div>
                    <div class="single-category portfolio" data-category="branding">
                        Branding
                    </div>
                    <div class="single-category portfolio" data-category="Product Design">
                        Product Design
                    </div>
                    <div class="single-category portfolio" data-category="experimental">
                        Experimental
                    </div>
                </div>
                <div class="display-options">
                    <div class="option active" data-option="viewName">
                        <img src="/images/themes/theme{{$themeCode}}/option-title.png" alt="option title">
                    </div>
                    <div class="option" data-option="hideName">
                        <img src="/images/themes/theme{{$themeCode}}/option-no-title.png" alt="option no title">
                    </div>
                </div>
            </div>
            <div class="portfolio-content">
                @foreach($user->projects as $project)
                    @if($project->is_public)
                        <div class="single-portfolio" data-category="{{$project->category}}">
                            <div class="project-image">
                                @if(count($project->images) > 0)
                                    <img src="{{$project->images[0]->src}}" alt="portfolio image">
                                @endif
                            </div>
                            <div class="details">
                                <img src="/images/themes/theme{{$themeCode}}/portfolio/small-line.png" alt="line">
                                <div class="text">
                                    <div class="project-name">
                                        {{$project->name}} | {{$project->category}}
                                    </div>
                                    <div class="project-description">
                                        {{$project->description}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="single-tab-content work" data-name="work_experience">
            <div class="exp-work-wrapper">
                <div class="experience">
                    <div class="single-tab-title">
                        <div class="main-title">
                            Experience
                        </div>
                        <div class="sub-title">
                            What I've Worked
                        </div>
                    </div>
                    <div class="exp-work-wrapper">
                        @foreach($user->workExperience as $work)
                            @if($work->is_public)
                                <div class="single-info">
                                    <div class="icon">
                                        <img src="/images/themes/theme{{$themeCode}}/work/work-icon.png" alt="work icon">
                                    </div>
                                    <div class="divider"></div>
                                    <div class="info">
                                        <div class="work-header">
                                            <div class="title">
                                                {{$work->company_name}}
                                            </div>
                                            <div class="date">
                                                {{$work->date_from}}
                                                -
                                                {{$work->present ? 'Present' : $work->date_to}}
                                            </div>
                                        </div>
                                        <div class="work-sub-header">
                                            {{$work->job_title}}
                                        </div>
                                        <div class="work-description">
                                            {{$work->description}}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="single-tab-content work" data-name="education">
            <div class="exp-work-wrapper">
                <div class="education">
                    <div class="single-tab-title">
                        <div class="main-title">
                            Education
                        </div>
                        <div class="sub-title">
                            What I've Learned
                        </div>
                    </div>
                    <div class="exp-work-wrapper">
                        @foreach($user->education as $education)
                            @if($education->is_public)
                                <div class="single-info">
                                    <div class="icon">
                                        <img src="/images/themes/theme{{$themeCode}}/work/edu-icon.png" alt="work icon">
                                    </div>
                                    <div class="divider"></div>
                                    <div class="info">
                                        <div class="work-header">
                                            <div class="title">
                                                {{$education->university_name}}
                                            </div>
                                            <div class="date">
                                                2017 - Present
                                            </div>
                                        </div>
                                        <div class="work-sub-header">
                                            {{$education->degree_title}}, {{$education->institution_type}}
                                        </div>
                                        <div class="work-description">
                                            {{$education->description}}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="single-tab-content skills" data-name="skills">
            <div class="single-tab-title">
                <div class="main-title">
                    Skills & Languages
                </div>
                <div class="sub-title">
                    What I Bring To The Table
                </div>
            </div>
            <div class="categories">
                <div class="single-category skill active" data-category="all">
                    All
                </div>
                <div class="single-category skill" data-category="main skills">
                    Main
                </div>
                <div class="single-category skill" data-category="development">
                    Development
                </div>
                <div class="single-category skill" data-category="design">
                    Design
                </div>
                <div class="single-category skill" data-category="Professionalism">
                    Professional
                </div>
                <div class="single-category skill" data-category="Leadership">
                    Leadership
                </div>
            </div>

            <div class="skills-wrapper">
                @foreach( $user->skills as $skill)
                    @if($skill->is_public)
                        <div class="single-skill" data-category="{{$skill->category}}">
                            <div class="skill-info">
                                <div class="skill-icon">
                                    <img src="/images/themes/theme{{$themeCode}}/skills/skill-general.png" alt="skill icon">
                                </div>
                                <div class="title">
                                    <div class="main">
                                        {{$skill->title}}
                                    </div>
                                    <div class="sub">
                                        {{$skill->title}},   {{$skill->category}}
                                    </div>
                                </div>
                                <div class="percentage">
                                    {{$skill->percentage}}%
                                </div>
                            </div>
                            <div class="skill-percentage-bar">
                                <div class="default-bar"></div>
                                <div class="bar-percentage-achieved" style="width: {{$skill->percentage}}%"></div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="skills-divider"></div>

            <div class="skills-wrapper languages">
                @foreach($user->languages as $language)
                    <div class="single-skill">
                        <div class="skill-info">
                            <div class="skill-icon">
                                <img src="/images/themes/theme{{$themeCode}}/languages/language-general.png" alt="language icon">
                            </div>
                            <div class="title">
                                <div class="main">
                                    {{$language->label}}
                                </div>
                                <div class="sub">
                                    Perfect Language knowledge.
                                </div>
                            </div>
                            <div class="percentage">
                                90%
                            </div>
                        </div>
                        <div class="skill-percentage-bar">
                            <div class="default-bar"></div>
                            <div class="bar-percentage-achieved" style="width: 90%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="single-tab-content about" data-name="about_me">
            <div class="about-info-wrapper">
                <div class="personal-info">
                    @if($user->personalInfo->is_date_of_birth_active)
                        <div class="single-data">
                            <img src="/images/themes/theme{{$themeCode}}/about/birthday-cake.png" alt="Date icon">
                            <div class="title">
                                Date of Birth
                            </div>
                            <div class="sub-title">
                                {{$user->personalInfo->date_of_birth}}
                            </div>
                        </div>
                    @endif
                    @if($user->personalInfo->is_nationality_active)
                        <div class="single-data">
                            <img src="/images/themes/theme{{$themeCode}}/about/flags.png" alt="Nationality icon">
                            <div class="title">
                                Nationality
                            </div>
                            <div class="sub-title">
                                {{$user->personalInfo->nationality}}
                            </div>
                        </div>
                    @endif
                    @if($user->personalInfo->is_hometown_active)
                        <div class="single-data">
                            <img src="/images/themes/theme{{$themeCode}}/about/home.png" alt="Hometown icon">
                            <div class="title">
                                Hometown
                            </div>
                            <div class="sub-title">
                                {{$user->personalInfo->hometown}}
                            </div>
                        </div>
                    @endif
                    <div class="single-data">
                        <img src="/images/themes/theme{{$themeCode}}/about/translate.png" alt="languages icon">
                        <div class="title">
                            Languages
                        </div>
                        <div class="sub-title">
                            @foreach( $user->languages as $language)
                                {{$language->label}} <br/>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="professional-info">
                    <div class="main-info-wrapper">
                        @if($user->personalInfo->is_overview_active)
                            <div class="single-main-info">
                                <div class="title">
                                    Overview
                                </div>
                                <div class="sub-title">
                                    {{$user->personalInfo->overview}}
                                </div>
                            </div>
                        @endif
                        @if($user->personalInfo->is_about_active)
                            <div class="single-main-info">
                                <div class="title">
                                    About me
                                </div>
                                <div class="sub-title">
                                    {{$user->personalInfo->about}}
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="sub-info-wrapper">
                        @if($user->personalInfo->quote)
                            <div class="single-sub-info">
                                <div class="icon">
                                    <img src="/images/themes/theme{{$themeCode}}/about/left-quotes-sign.png" alt="icon">
                                </div>
                                <div class="details">
                                    <div class="title">
                                        Quote
                                    </div>
                                    <div class="sub-title">
                                        {{$user->personalInfo->quote}}
                                    </div>
                                </div>
                            </div>

                        @endif
                        @if($user->personalInfo->location)
                            <div class="single-sub-info">
                                <div class="icon">
                                    <img src="/images/themes/theme{{$themeCode}}/about/pin.png" alt="icon">
                                </div>
                                <div class="details">
                                    <div class="title">
                                        Location
                                    </div>
                                    <div class="sub-title">
                                        {{$user->personalInfo->location}}
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="single-tab-content hobbies" data-name="hobbies">
            <div class="single-tab-title">
                <div class="main-title">
                    Hobbies
                </div>
                <div class="sub-title">
                    What I Love To Do
                </div>
            </div>
            <div class="hobbies-wrapper">
                @foreach( $user->hobbies as $hobby)
                    @if($hobby->is_public)
                        <div class="single-hobby">
                            <div class="hobby-header">
                                <img src="/images/themes/theme{{$themeCode}}/hobbies/general-hobby.png" alt="">
                                <div class="divider"></div>
                                <div class="title">
                                    {{$hobby->title}}
                                </div>
                            </div>
                            <div class="hobby-description">
                                {{$hobby->title}}, {{$hobby->category}}
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
        <div class="single-tab-content media" data-name="media">
            <div id="mediaTab">
                <media-tab theme_code="{{$themeCode}}" :user="{{$user}}"></media-tab>
            </div>
        </div>
        <div class="single-tab-content references" data-name="references">
            <div class="single-tab-title">
                <div class="main-title">
                    References
                </div>
            </div>
            <div class="references-wrapper">
                @foreach( $user->references as $reference)
                    @if($reference->is_public)
                        <div class="single-reference">
                            <div class="reference-header">
                                <span>{{$reference->name}}</span> <span class="small-divider">-</span> <span>{{$reference->title}}</span>
                            </div>
                            <div class="details">
                                <div class="location">
                                    <div>{{$reference->name}}</div>
                                    <div> {{$reference->address}}</div>
                                </div>
                                <div class="contact">
                                    <div>{{$reference->email}}</div>
                                    <div>{{$reference->phone}}</div>
                                </div>
                            </div>
                            <div class="description">
                                {{$reference->reference_text}}
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="single-tab-content achievements" data-name="achievements">
            <div class="single-tab-title">
                <div class="main-title">
                    Achievements
                </div>
            </div>
            <div class="achievements-wrapper">
                @foreach( $user->achievements as $achievement)
                    @if($achievement->is_public)
                        <div class="single-achievement">
                            <div class="certificate">
                                <img src="{{$achievement->image_src}}" alt="certificate">
                            </div>
                            <div class="details">
                                <div class="title">
                                    {{$achievement->title}}, {{$achievement->year}}
                                </div>
                                <div class="url">
                                    URL: {{$achievement->url}}
                                </div>
                                <div class="description">
                                    {{$achievement->description}}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>