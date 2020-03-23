<template>
    <v-app class="w-100">
        <div class="themeWrapper">
            <!-- Header Row -->
            <v-row no-gutters>
                <!-- Column for header section -->
                <v-col cols="12">
                    <v-card color="#6152CF" class="parent-card" dark flat>
                        <v-card-text>
                            <div class="m-0 p-0">
                                <v-row no-gutters>
                                    <!-- Column 1 Profile -->
                                    <v-col cols="8" md="5" sm="2">
                                        <v-card color="transparent" flat class="mx-md-5 ml-xs-n12 ml-sm-n4">
                                            <v-card-text>
                                                <div class="d-flex">
                                                    <v-list-item>
                                                        <!-- avatar -->
                                                        <v-list-item-avatar
                                                                color="grey darken-3"
                                                                class="profile-avatar"
                                                                max-width="150"
                                                        >
                                                            <img class="elevation-6" :src="personalInfo.profile_pic" />
                                                        </v-list-item-avatar>
                                                        <!-- Avatar -->
                                                        <!-- Name -->
                                                        <v-list-item-content>
                                                            <v-list-item-title class="ml-md-4">
                                                                <span class="profile-title">{{personalInfo.full_name}}</span>
                                                            </v-list-item-title>
                                                            <v-list-item-subtitle class="ml-md-5">
                                                                <span class="profile-subtitle">{{personalInfo.designation}}</span>
                                                            </v-list-item-subtitle>

                                                            <v-list-item-icon class="hidden-md-and-up">
                                                                <v-btn
                                                                        height="30"
                                                                        x-small
                                                                        class="mr-sm-1 social-sm-icon-btn"
                                                                        v-for="icon in socialMedia"
                                                                        :key="icon.title"
                                                                        :color="icon.color"
                                                                >
                                                                    <v-icon small v-text="icon.icon" class="social-sm-icon"></v-icon>
                                                                </v-btn>
                                                            </v-list-item-icon>

                                                            <!-- Hidden in sm and xs devices -->
                                                            <v-list-item-icon class="hidden-sm-and-down">
                                                                <v-btn
                                                                        small
                                                                        icon
                                                                        class="mr-2"
                                                                        v-for="icon in socialMedia"
                                                                        :key="icon.title"
                                                                >
                                                                    <v-img class="social-icon" :src="getIconSocial(icon.title)"></v-img>
                                                                </v-btn>
                                                            </v-list-item-icon>
                                                        </v-list-item-content>
                                                        <!-- Hidden in sm and xs devices -->
                                                        <!-- Name -->
                                                    </v-list-item>
                                                </div>
                                                <v-btn color="#FF5231" class="chat-btn">
                                                    TAP TO CHAT
                                                    <v-img src="/images/resume_themes/theme200/icons/chat.png" class="chat-btn-img ml-1"></v-img>
                                                </v-btn>
                                            </v-card-text>
                                        </v-card>
                                    </v-col>
                                    <!-- Column 1 Profile -->

                                    <!-- Hidden in sm and up phone icons -->
                                    <v-col col="4" class="hidden-sm-and-up ml-12">
                                        <v-card flat color="transparent">
                                            <v-btn small color="#00CDF7" class="phone-btn">
                                                <v-icon color="#6D1CFF" class="phone-icon">fa-phone</v-icon>
                                            </v-btn>
                                        </v-card>
                                        <v-card flat color="transparent" class="mt-6">
                                            <v-btn small color="#E8E5F6" class="video-btn">
                                                <img src="/images/resume_themes/theme200/icons/youtube-camera.png" />
                                            </v-btn>
                                        </v-card>
                                    </v-col>
                                    <!-- Hourly rate -->
                                    <v-col cols="12" class="hidden-sm-and-up">
                                        <v-card color="white" light height="50">
                                            <v-row no-gutters>
                                                <v-col cols="4" class>
                                                    <v-list-item align="center">
                                                        <v-list-item-icon>
                                                            <img style="width:18px !important; " src="/images/resume_themes/theme200/icons/hour.png" />
                                                            <!-- <v-icon color="#00CDF7" small>mdi-clock-check</v-icon> -->
                                                        </v-list-item-icon>
                                                        <v-list-item-content class="ml-n10">
                                                            <v-list-item-subtitle style="font-size:3.5vw;">{{paymentInfo.salary}}$/{{paymentInfo.salary_frequency}}</v-list-item-subtitle>
                                                        </v-list-item-content>
                                                    </v-list-item>
                                                </v-col>

                                                <v-col cols="4">
                                                    <v-list-item class="center">
                                                        <v-list-item-icon>
                                                            <v-icon color="#00CDF7" small>mdi-calendar-check</v-icon>
                                                        </v-list-item-icon>
                                                        <v-list-item-content class="ml-n10">
                                                            <v-list-item-subtitle style="font-size:3.5vw;">{{paymentInfo.salary}}$/{{paymentInfo.salary_frequency}}</v-list-item-subtitle>
                                                        </v-list-item-content>
                                                    </v-list-item>
                                                </v-col>

                                                <v-col cols="4" align="center">
                                                    <v-btn
                                                            color="#FF5231"
                                                            dark
                                                            class="text-capitalize mt-2"
                                                            style="font-size:2.5vw;"
                                                    >
                                                        Hire Me
                                                        <img class="ml-2" width="18" src="/images/resume_themes/theme200/icons/chat2.png" />
                                                    </v-btn>
                                                </v-col>
                                            </v-row>
                                        </v-card>
                                    </v-col>
                                    <!-- Hourly Rate -->
                                    <!-- Hideen in sm and up phone icons -->

                                    <!-- Column 2 Interview-->
                                    <v-col
                                            cols="6"
                                            md="6"
                                            sm="6"
                                            offset-sm="4"
                                            class="desktop-row ml-md-10 mt-md-n8 mt-sm-n12 hidden-xs-only"
                                    >
                                        <v-card flat color="transparent">
                                            <v-card-text>
                                                <v-row no-gutters>
                                                    <!-- Only shows on tablet and dekstop version -->
                                                    <v-col cols="12" md="10" sm="12" class="interview-flex">
                                                        <v-card flat color="transparent">
                                                            <v-card-text align="center">
                                                                <v-row align="center">
                                                                    <v-col cols="12" md="4" class="interview-col hidden-sm-and-down">
                                                                        <div class="interview-text">Your Interviews:</div>
                                                                    </v-col>
                                                                    <v-spacer class="hidden-md-only"></v-spacer>
                                                                    <v-col cols="12" md="4" sm="5" class>
                                                                        <v-btn color="#03CA9F" class="btn-voice-call">
                                                                            <img class="mr-2" src="/images/resume_themes/theme200/icons/phone.png" />Audio
                                                                        </v-btn>
                                                                    </v-col>

                                                                    <v-col cols="12" md="4" sm="5" class>
                                                                        <v-btn color="#2400FF" class="btn-upload">
                                                                            <img src="/images/resume_themes/theme200/icons/camera.png" class="mr-2" /> Video
                                                                        </v-btn>
                                                                    </v-col>
                                                                </v-row>
                                                            </v-card-text>
                                                        </v-card>
                                                    </v-col>
                                                    <!-- Only shows on tablet desktop version -->

                                                    <!-- Only shows in desktop and tablet version -->
                                                    <v-col cols="10" md="11" sm="12">
                                                        <v-card flat class="card-hire-me" height="80" color="rgba(37, 0, 0, 0.1)">
                                                            <v-card-text>
                                                                <v-row no-gutters align="center">
                                                                    <v-col
                                                                            cols="12"
                                                                            md="1"
                                                                            sm="1"
                                                                            class="mt-md-n5 mr-md-n4 mt-sm-n5 mr-sm-n2"
                                                                    >
                                                                        <v-img class="img-hour" src="/images/resume_themes/theme200/icons/hourly-rate.png"></v-img>
                                                                    </v-col>
                                                                    <v-col cols="12" md="3" sm="3">
                                                                        <div class="hire-me-title">{{paymentInfo.salary}}$</div>
                                                                        <div class="hire-me-subtitle">{{paymentInfo.salary_frequency}} Rate</div>
                                                                    </v-col>
                                                                    <v-col
                                                                            cols="12"
                                                                            md="1"
                                                                            sm="1"
                                                                            class="mt-md-n5 mr-md-n4 mt-sm-n5 mr-sm-n2"
                                                                    >
                                                                        <v-img class="img-hour" src="/images/resume_themes/theme200/icons/availibility.png"></v-img>
                                                                    </v-col>
                                                                    <v-col cols="12" md="3" sm="4">
                                                                        <div class="hire-me-title">{{paymentInfo.available_hours}} Hours</div>
                                                                        <div class="hire-me-subtitle">{{paymentInfo.available_hours_frequency}} Availibility</div>
                                                                    </v-col>

                                                                    <v-col cols="12" md="4" sm="2" class="ml-md-8">
                                                                        <v-btn block color="#00CDF7" height="50" class="btn-hire-me">
                                                                            Hire Me
                                                                            <img class="mx-1" src="/images/resume_themes/theme200/icons/chat2.png" />
                                                                        </v-btn>
                                                                    </v-col>
                                                                </v-row>
                                                            </v-card-text>
                                                        </v-card>
                                                    </v-col>
                                                    <!-- only shows on desktop and tablet version -->
                                                </v-row>
                                            </v-card-text>
                                        </v-card>
                                    </v-col>
                                    <!-- Column 2 -->
                                    <!-- Coumn 3 tabs -->
                                    <v-col cols="12" md="10" sm="12" offset-md="1" class="mb-n8 hidden-xs-only">
                                        <v-card color="transparent" flat>
                                            <v-card-text>
                                                <!-- tabs -->
                                                <v-tabs
                                                        height="55"
                                                        v-model="dataTabs"
                                                        background-color="#00CDF7"
                                                        grow
                                                        class="parent-tab"
                                                        centered
                                                        dark
                                                        hide-slider
                                                        mobile-break-point="599"
                                                >
                                                    <v-tab
                                                            v-for="tab in tabs"
                                                            :key="tab.id"
                                                            @click="currentTab = tab.id"
                                                            class="ct-tab-title text-capitalize"
                                                            :class="[
                        currentTab == tab.id ? 'active-tab' : '',
                        tab.id == 1 ? 'round-left' : '',
                        tab.id == 6 ? 'round-right' : '',

                      ]"
                                                    >
                                                        <v-avatar tile height="16" width="15">
                                                            <img
                                                                    :src="[currentTab == tab.id ? getImgUrlIconActive(tab.id):getImgUrlIcon(tab.id) ]"
                                                                    class="mr-md-4 mr-sm-n4"
                                                            />
                                                        </v-avatar>
                                                        {{tab.title}}
                                                    </v-tab>
                                                    <!-- tabs -->
                                                </v-tabs>
                                            </v-card-text>
                                        </v-card>
                                    </v-col>
                                    <!-- Column3 tabs-->
                                </v-row>
                            </div>
                        </v-card-text>
                    </v-card>
                </v-col>
                <!-- Column for header section -->
            </v-row>
            <!-- header row -->

            <!-- tabs details row -->
            <v-row no-gutters>
                <!-- Mobile Tabs -->
                <!-- Skill Tab  -->
                <v-col cols="12" class="hidden-sm-and-up" :class="[currentTab == 4?'':'d-none']">
                    <v-card flat>
                        <v-tabs
                                
                                background-color="#F15959"
                                show-arrows
                                grow
                                dark
                                style="border-radius:0px !important;"
                        >
                            <v-tab @click="activeSkillTab = skillTab"
                                    class="text-capitalize caption"
                                    v-for="skillTab in skillTabs"
                                    :key="skillTab.value"
                            >{{skillTab.title}}</v-tab>
                        </v-tabs>
                    </v-card>
                </v-col>
                <!-- Skill Tab -->
                <v-col cols="12" class="hidden-sm-and-up mt-12" align="center">
                    <v-card flat>
                        <v-tabs
                                background-color="transparent"
                                height="100"
                                v-model="dataTabs"
                                hide-slider
                                center-active
                                style="margin-left:-55px;"
                        >
                            <v-tab v-for="item in tabs" :key="item.title" class>
                                <v-btn
                                        x-small
                                        fab
                                        :color="currentTab == item.id ? '#FF5231':'#FFA797'"
                                        @click="currentTab = item.id"
                                        :class="[currentTab == item.id ? 'tab-mobile-btn-active':'']"
                                        dark
                                        depressed
                                >
                                    <img width="15" :src="getImgUrlIcon(item.id)" />
                                </v-btn>
                            </v-tab>
                        </v-tabs>
                    </v-card>
                </v-col>
                <v-col cols="12" align="center" class="hidden-sm-and-up">
        <span
                class="mt-2"
                :class="[currentTab === dot.id?'tab-dot-active':'tab-dot']"
                v-for="dot in tabs"
                :key="dot.id"
        ></span>
                </v-col>

                <!-- Mobile Tabs -->

                <!-- Tab Details -->
                <v-col cols="12" md="12">
                    <v-card flat color="#F5F5F5">
                        <!-- tab items -->
                        <v-tabs v-model="dataTabs">
                            <!-- Tab Item Portfolio -->
                            <v-tab-item>
                                <v-container>
                                    <v-card flat color="transparent" class="mt-n10" style="z-index:1;">
                                        <v-card-text align="center">
                                            <v-row>
                                                <v-col md="4" sm="6" v-for="item in portfolio" :key="item.id">
                                                    <v-card elevation-12 class="card-portfolio">
                                                        <v-img aspect-ratio="1.4" :src="getImgUrlPortfolio(item.id)">
                                                            <v-overlay
                                                                    :absolute="absolute"
                                                                    :value="item.id==1 ? overlay : false"
                                                                    opacity="0.8"
                                                                    color="#6152CF"
                                                            >
                                                                <v-btn fab small color="#ffffff">
                                                                    <img src="/images/resume_themes/theme200/icons/overlay-icon.png" />
                                                                </v-btn>
                                                            </v-overlay>
                                                        </v-img>

                                                        <v-card-title>{{item.title}}</v-card-title>
                                                        <v-card-subtitle align="left">{{ item.subtitle }}</v-card-subtitle>
                                                    </v-card>
                                                </v-col>
                                            </v-row>
                                        </v-card-text>
                                    </v-card>
                                </v-container>
                            </v-tab-item>
                            <!-- tab item portfolio -->

                            <!-- Tab Item For Work -->
                            <v-tab-item>
                                <v-container>
                                    <v-card flat color="transparent" class="mt-n10">
                                        <v-card-text>
                                            <v-row>
                                                <v-col cols="12" md="6" sm="12" v-for="(work,index) in works" :key="index">
                                                    <v-card flat color="transparent" class="mx-md-10">
                                                        <v-card-text>
                                                            <v-list-item>
                                                                <v-list-item-icon class="mt-2">
                                                                    <v-img width="40" :src="getIconWork(index+1)"></v-img>
                                                                </v-list-item-icon>
                                                                <div
                                                                        class="v-line"
                                                                        :class="[
                                  works.length-(index+1) <2 ? 'hidden-md-and-up':''
                                ]"
                                                                ></div>
                                                                <v-list-item-content>
                                                                    <v-list-item-title class="work-title">{{work.job_title}}</v-list-item-title>
                                                                    <v-list-item-subtitle
                                                                            class="work-subtitle mt-2"
                                                                    >{{ work.company_name }}</v-list-item-subtitle>
                                                                    <v-list-item-subtitle class="work-subtitle">{{ work.company_name}}</v-list-item-subtitle>
                                                                    <div class="float-xs-left mt-4 work-text">{{ work.description }}</div>
                                                                </v-list-item-content>
                                                            </v-list-item>
                                                        </v-card-text>
                                                    </v-card>
                                                </v-col>
                                            </v-row>
                                        </v-card-text>
                                    </v-card>
                                </v-container>
                            </v-tab-item>
                            <!-- Tab Item for work -->

                            <!-- Tab Item For Education -->
                            <v-tab-item>
                                <v-container>
                                    <v-card flat color="transparent" class="mt-n10">
                                        <v-card-text>
                                            <v-row>
                                                <v-col cols="12" md="6" v-for="(education,index) in educations" :key="index">
                                                    <v-card flat color="transparent" class="mx-md-10">
                                                        <v-card-text>
                                                            <v-list-item>
                                                                <v-list-item-icon class="mt-2">
                                                                    <v-img width="40" :src="getIconEducation(index+1)"></v-img>
                                                                </v-list-item-icon>
                                                                <div class="v-line" v-if="educations.length-(index+1) >1"></div>
                                                                <v-list-item-content>
                                                                    <v-list-item-title class="work-title">{{education.degree_title}}</v-list-item-title>
                                                                    <v-list-item-subtitle
                                                                            class="work-subtitle mt-2"
                                                                    >{{ education.university_name }}</v-list-item-subtitle>
                                                                    <div class="float-xs-left mt-4 work-text">{{ education.institution_type }}</div>
                                                                </v-list-item-content>
                                                            </v-list-item>
                                                        </v-card-text>
                                                    </v-card>
                                                </v-col>
                                            </v-row>
                                        </v-card-text>
                                    </v-card>
                                </v-container>
                            </v-tab-item>
                            <!-- Tab Item For Education -->

                            <!-- Tab Item for skills -->
                            <v-tab-item>
                                <v-container>
                                    <v-card flat color="transparent" class="mt-n10">
                                        <v-card-text>
                                            <!-- Skill Child Tabs -->
                                            <v-toolbar flat class="ml-md-5 hidden-xs-only">
                                                <v-tabs
                                                        color="#6152CF"
                                                        
                                                        background-color="transparent"
                                                        align-with-title
                                                        mobile-break-point="599"
                                                >
                                                    <v-tab @click="activeSkillTab = skillTab" v-for="skillTab in skillTabs" :key="skillTab.value" class="skill-tab-text mx-md-4 mr-sm-n4">{{skillTab.title}}</v-tab>
                                                </v-tabs>
                                                <v-spacer></v-spacer>
                                                <v-btn icon class="mx-md-3">
                                                    <img width="40" src="/images/resume_themes/theme200/icons/skills/arrange.png" />
                                                </v-btn>
                                                <v-btn icon small class="mr-sm-3">
                                                    <img height="16" width="20" src="/images/resume_themes/theme200/icons/skills/view-list.png" />
                                                </v-btn>
                                            </v-toolbar>
                                            <!-- Inner Tab Items -->
                                            <v-card color="transparent" flat class="w-100">
                                                <v-card-text>
                                                    <v-row>
                                                        <v-card flat color="transparent" class="w-100">
                                                            <v-card-text>
                                                                <v-row>
                                                                    <v-col class="skill-item" cols="12" md="3" sm="6" v-for="skill in skills" :key="skill.title" v-if="activeSkillTab.value === skill.category">
                                                                        <v-card flat color="#D5EEFF" class="pa-0" >
                                                                            <v-card-text>
                                                                                <v-list-item>
                                                                                    <v-list-item-icon>
                                                                                        <v-img
                                                                                                width="35"
                                                                                                :src="getSkillIcon(skill.title)"
                                                                                        ></v-img>
                                                                                    </v-list-item-icon>

                                                                                    <v-list-item-content class="ml-n6">
                                                                                        <v-list-item-subtitle>
                                                                                            <v-row no-gutters>
                                                                                                <v-col cols="9">{{skill.title}}</v-col>
                                                                                                <v-col
                                                                                                        cols="3"
                                                                                                        class="hidden-sm-and-up caption"
                                                                                                        align="right"
                                                                                                >{{skill.title}}</v-col>
                                                                                            </v-row>
                                                                                        </v-list-item-subtitle>
                                                                                        <v-list-item-subtitle>
                                                                                            <v-row no-gutters>
                                                                                                <v-col cols="12" md="9" sm="9">
                                                                                                    <v-progress-linear
                                                                                                            height="8"
                                                                                                            background-color="#C5C5C5"
                                                                                                            color="blue"
                                                                                                            :value="skill.percentage"
                                                                                                    ></v-progress-linear>
                                                                                                </v-col>
                                                                                                <v-col
                                                                                                        cols="4"
                                                                                                        md="2"
                                                                                                        sm="2"
                                                                                                        offset="1"
                                                                                                        class="mt-n1 caption hidden-xs-only"
                                                                                                >{{skill.percentage}}%</v-col>
                                                                                            </v-row>
                                                                                        </v-list-item-subtitle>
                                                                                    </v-list-item-content>
                                                                                </v-list-item>
                                                                            </v-card-text>
                                                                        </v-card>
                                                                    </v-col>
                                                                </v-row>
                                                            </v-card-text>
                                                        </v-card>
                                                    </v-row>
                                                </v-card-text>
                                            </v-card>
                                        </v-card-text>
                                    </v-card>
                                </v-container>
                            </v-tab-item>
                            <!-- Tab Item For Skills -->

                            <!-- Tab Item For About Me -->
                            <v-tab-item>
                                <v-container>
                                    <v-card flat color="transparent" class="mt-n10">
                                        <v-card-text>
                                            <v-row>
                                                <!-- About me pic shows only mobile devices -->
                                                <v-col cols="12" md="5" sm="6" class="hidden-sm-and-up">
                                                    <v-card flat color="transparent">
                                                        <v-card-text align>
                                                            <div class="pic-box">
                                                                <v-img :src="personalInfo.profile_pic"></v-img>
                                                            </div>
                                                        </v-card-text>
                                                    </v-card>
                                                </v-col>
                                                <!-- About me pic shows only mobile devices -->

                                                <!-- About Me Me Name and Designation -->
                                                <v-col cols="12" md="6" sm="6">
                                                    <v-card color="transparent" flat>
                                                        <v-card-text>
                                                            <div class="hello-text">Hello I'm</div>
                                                            <div class="hello-title">{{personalInfo.full_name}}</div>
                                                            <div class="display-2 hello-designation">
                                                                <div class="designation-for-tab">
                                                                    <span style="color:#6152CF;">{{personalInfo.designation}}</span>
                                                                </div>
                                                            </div>
                                                        </v-card-text>
                                                    </v-card>
                                                </v-col>
                                                <!-- ABout Me Name and Designation -->

                                                <!-- About Me Picture -->
                                                <v-col cols="12" md="5" sm="6" class="hidden-xs-only">
                                                    <v-card flat color="transparent">
                                                        <v-card-text align="right">
                                                            <div class="pic-box">
                                                                <v-img :src="personalInfo.profile_pic"></v-img>
                                                            </div>
                                                        </v-card-text>
                                                    </v-card>
                                                </v-col>
                                                <!-- About Me Picture -->
                                                <!-- About Me Main Text -->
                                                <v-col cols="12" md="8" sm="12" class="about-me-flex">
                                                    <v-card flat color="transparent">
                                                        <v-card-title class="display-1">
                                                            About Me
                                                            <span style="color:#69C03E;">.</span>
                                                        </v-card-title>
                                                        <v-card-text>
                                                            <v-row>
                                                                <v-col cols="12" md="1" sm="1">
                                                                    <v-img
                                                                            class="about-me-line"
                                                                            height="2.5"
                                                                            width="35"
                                                                            src="/images/resume_themes/theme200/images/about-me/line85.png"
                                                                    ></v-img>
                                                                </v-col>
                                                                <v-col cols="12" md="10" sm="11" class="mt-n7 ml-n7">
                                                                    <v-card flat color="transparent" class="pa-0">
                                                                        <v-card-text
                                                                                class="body-1"
                                                                        >
                                                                            {{personalInfo.about}}

                                                                        </v-card-text>
                                                                        <v-card-actions class="ml-2">
                                                                            <v-btn
                                                                                    color="#414143"
                                                                                    height="35"
                                                                                    x-small
                                                                                    dark
                                                                                    v-for="media in socialMedia"
                                                                                    :key="media.title"
                                                                            >
                                                                                <v-icon small v-text="media.icon"></v-icon>
                                                                            </v-btn>
                                                                        </v-card-actions>
                                                                    </v-card>
                                                                </v-col>
                                                            </v-row>
                                                        </v-card-text>
                                                    </v-card>
                                                </v-col>
                                                <!-- About Me Main Text -->
                                            </v-row>
                                        </v-card-text>
                                    </v-card>
                                </v-container>
                            </v-tab-item>
                            <!-- Tab Item for About Me -->

                            <!-- Tab item for achievement -->
                            <v-tab-item>
                                <v-container>
                                    <v-card flat color="transparent" class="mt-n10" v-for="(achievement, index) in achievements" :key="achievement.id">
                                        <v-card-text class="mt-54">
                                            <v-row>
                                                <v-col cols="12" md="6" sm="6">
                                                    <v-card flat color="transparent" elevation-12>
                                                        <v-img :src="achievement.image_src"></v-img>
                                                    </v-card>
                                                </v-col>

                                                <v-col cols="12" md="6" sm="6">
                                                    <v-card flat color="transparent" class="certification">
                                                        <v-card-title>
                                                            <span class="achievement-title">{{achievement.title}}</span>
                                                        </v-card-title>

                                                        <v-card-text
                                                                class="achievement-text caption"
                                                        >The bearer of this certificate is hereby deemed proficient in crafting responsive, styled templates using HubSpot's design tools. The bearer has demonstrated that he/she can effectively apply template and style knowledge to HubSpot blog, page, landing page and email templates and is approved to sell these assets in the HubSpot Marketplace. Certification is active for 13 months after month issued.</v-card-text>
                                                    </v-card>
                                                </v-col>
                                            </v-row>
                                            <!-- Pagination  | Not working pagination commented-->
                                            <!--<v-row class="mt-5">-->
                                                <!--<v-col cols="12">-->
                                                    <!--<div class="text-center">-->
                                                        <!--<v-btn dark x-small class="mx-8" fab color="#6152CF">-->
                                                            <!--<v-icon disabled>mdi-arrow-left</v-icon>-->
                                                        <!--</v-btn>-->
                                                        <!--<span class="title pagination-text">1/5 7</span>-->
                                                        <!--<v-btn dark x-small class="mx-8" fab color="#6152CF">-->
                                                            <!--<v-icon>mdi-arrow-right</v-icon>-->
                                                        <!--</v-btn>-->
                                                    <!--</div>-->
                                                <!--</v-col>-->
                                            <!--</v-row>-->
                                            <!-- Pagination -->
                                        </v-card-text>
                                    </v-card>
                                </v-container>
                            </v-tab-item>

                            <!-- Tab item for achievement -->
                        </v-tabs>
                        <!-- Main Tab -->
                    </v-card>
                </v-col>
            </v-row>
            <!-- Tab Details Row -->
            <!-- footer row -->
            <!-- n -->
            <!-- footer row -->
        </div>
    </v-app>
</template>

<script>
    export default {
        props:['user'],
        data() {
            return {
                activeSkillTab: {title: "Programming Languages", value: 'Programming_languages', id: 1},
                page: 1,
                overlay: true,
                absolute: true,
                dataTabs: null,
                currentTab: 1,
                tabs: [
                    { title: "Portfolio", id: 1 },
                    { title: "Works", id: 2 },
                    { title: "Education", id: 3 },
                    { title: "Skills", id: 4 },
                    { title: "About Me", id: 5 },
                    { title: "Achievement", id: 6 }
                ],
                skillTabs: [
                    {title: "Programming Languages", value: 'Programming_languages', id: 1},
                    { title: "Framework/Databases", value: 'Frameworks', id: 2 },
                    { title: "Software", value: 'Software', id: 3 },
                    { title: "Design Skills", value: 'Design', id: 4 }
                ],
                portfolio: [
                    {
                        title: "Product Design",
                        subtitle: "industrial,creative,idea",
                        id: 1
                    },
                    {
                        title: "Website Design",
                        subtitle: "industrial,creative,idea",
                        id: 2
                    },
                    {
                        title: "Pattern Design",
                        subtitle: "industrial,creative,idea",
                        id: 3
                    },
                    {
                        title: "Product Design",
                        subtitle: "industrial,creative,idea",
                        id: 4
                    },
                    {
                        title: "Product Design",
                        subtitle: "industrial,creative,idea",
                        id: 5
                    },
                    {
                        title: "Product Design",
                        subtitle: "industrial,creative,idea",
                        id: 6
                    }
                ],
                work: [
                    {
                        id: 1,
                        title: "Product Designer",
                        subtitle1: "Gps Bangla",
                        subtitle2: "Jan 2017 - Feb 2019",
                        bodyText:
                            "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt utlabore et dolore magna aliquyam erat,"
                    },
                    {
                        id: 2,
                        title: "Animation Designer",
                        subtitle1: "Gps Bangla",
                        subtitle2: "Jan 2017 - Feb 2019",
                        bodyText:
                            "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt utlabore et dolore magna aliquyam erat,"
                    },
                    {
                        id: 3,
                        title: "Visual Designer",
                        subtitle1: "Gps Bangla",
                        subtitle2: "Jan 2017 - Feb 2019",
                        bodyText:
                            "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt utlabore et dolore magna aliquyam erat,"
                    },
                    {
                        id: 4,
                        title: "Illustrator Designer",
                        subtitle1: "Gps Bangla",
                        subtitle2: "Jan 2017 - Feb 2019",
                        bodyText:
                            "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt utlabore et dolore magna aliquyam erat,"
                    },
                    {
                        id: 5,
                        title: "UX Designer",
                        subtitle1: "Gps Bangla",
                        subtitle2: "Jan 2017 - Feb 2019",
                        bodyText:
                            "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt utlabore et dolore magna aliquyam erat,"
                    },
                    {
                        id: 6,
                        title: "UX Designer",
                        subtitle1: "Gps Bangla",
                        subtitle2: "Jan 2017 - Feb 2019",
                        bodyText:
                            "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt utlabore et dolore magna aliquyam erat,"
                    }
                ],
                socialMedia: [
                    { title: "behance", icon: "fa-behance", color: "#217BFF" },
                    { title: "dribbble", icon: "fa-dribbble", color: "#EE588A" },
                    { title: "instagram", icon: "fa-instagram", color: "#DD24BC" },
                    { title: "google", icon: "fa-google-plus", color: "#DC4E41" }
                ],

                // user real data:
                personalInfo:this.user.personal_info,
                paymentInfo:this.user.payment_info,
                skills: this.user.skills,
                achievements: this.user.achievements,
                educations: this.user.education,
                works: this.user.work_experience,

            };
        },
        methods: {
            getImgUrlIcon(icon) {
                return `/images/resume_themes/theme200/icons/tabs/${icon}.png`;
            },

            getImgUrlIconActive(icon) {
                return `/images/resume_themes/theme200/icons/tabs-active/${icon}.png`;

            },
            // portfolio image
            getImgUrlPortfolio(id) {
                return `/images/resume_themes/theme200/images/portfolio/${id}.png`;
            },

            //work icons
            getIconWork(id) {
                return `/images/resume_themes/theme200/icons/work/${id}.png`;
            },

            //education icons
            getIconEducation(id) {
                return `/images/resume_themes/theme200/icons/education/${id}.png`;
            },

            //skills icons
            getIconSkill(icon) {
                return `/images/resume_themes/theme200/icons/skills/${icon}.png`;
            },

            //get social media image icons
            getIconSocial(icon) {
                return `/images/resume_themes/theme200/icons/${icon}.png`;
            },
            getSkillIcon(skill_title) {
                let arrayOfSkillImages = {
                    'ui design': '/images/skills_icons/user_interface.png',
                    'ux design': '/images/skills_icons/user_experience.png',
                    'logo design': '/images/skills_icons/logo_design.png',
                    'animation': '/images/skills_icons/animation.jpg',
                    'motion graphics': '/images/skills_icons/motion_graphics.png',
                    'illustration': '/images/skills_icons/illustration.png',
                    'advertising': '/images/skills_icons/advertising.png',
                    'branding': '/images/skills_icons/branding.png',
                    'brochure Design': '/images/skills_icons/brochure_design.png',
                    'website design': '/images/skills_icons/web_design.png',
                    'game designer': '/images/skills_icons/game_designer.png',
                    'character design': '/images/skills_icons/character_design.png',
                    'digital painting': '/images/skills_icons/digital_painting.png',
                    'creative director': '/images/skills_icons/creative_director.png',
                    'html / css': '/images/skills_icons/HTML.png',
                    // 2-

                    'adobe after effects': '/images/skills_icons/AE.png',
                    'sketch': '/images/skills_icons/Sketch.png',
                    'adobe illustrator': '/images/skills_icons/Illustrator.png',
                    'adobe xd': '/images/skills_icons/AdobeXD.png',
                    'photoshop': '/images/skills_icons/Photoshop.png',
                    'autocad': '/images/skills_icons/autocad.png',
                    'solidworks': '/images/skills_icons/solid_works.png',
                    'adobe flash': '/images/skills_icons/adobe_flash.png',
                    'digital drawing Tablet': '/images/skills_icons/digital_drawing_tablet.png',
                    'adobe indesign': '/images/skills_icons/indesign.png',
                    'coreldraw': '/images/skills_icons/corel_draw.png',
                    '3d max': '/images/skills_icons/3d_max.png',

                    // developer :
                    // 1-
                    'javascript': '/images/skills_icons/javascript.png',
                    'sql': '/images/skills_icons/mysql.png',
                    'java': 'resumeApp/resources/assets/images/skills_icons/java.png',
                    'c#': '/images/skills_icons/c#.png',
                    'python': '/images/skills_icons/python.png',
                    'php': '/images/skills_icons/php.png',
                    'c++': '/images/skills_icons/c_language.png',
                    'c': '/images/skills_icons/c_language.png',
                    'typescript': '/images/skills_icons/typescript.png',
                    'ruby': '/images/skills_icons/ruby.png',
                    'objective-C': '/images/skills_icons/objective_c.png',
                    'swift': '/images/skills_icons/swift.png',
                    'vb.net': '/images/skills_icons/vb_net.png',
                    'go': '/images/skills_icons/go.png',
                    'perl': '/images/skills_icons/perl.png',
                    'scala': '/images/skills_icons/scala.png',
                    'groovy': '/images/skills_icons/groovy.png',
                    'assembly': '/images/skills_icons/assembly.png',
                    'coffeescript': '/images/skills_icons/coffeeScript.png',
                    'vba': '/images/skills_icons/vba.png',
                    'r': '/images/skills_icons/r_lang.png',
                    'matlab': '/images/skills_icons/matlab.png',
                    'visual basic 6': '/images/skills_icons/matlab.png',
                    'lua': '/images/skills_icons/lua.png',
                    'haskell': '/images/skills_icons/haskell.png',
                    'html': '/images/skills_icons/HTML.png',
                    'css': '/images/skills_icons/CSS.png',
                    'laravel': '/images/skills_icons/laravel.png',
                    'phpstorm': '/images/skills_icons/phpstorm.png',

                    //2-
                    'angularjs': '/images/skills_icons/Angularjs.png',
                    'angular.js': '/images/skills_icons/Angularjs.png',
                    'node.js': '/images/skills_icons/node_js.png',
                    'nodejs': '/images/skills_icons/node_js.png',
                    '.net Core': '/images/skills_icons/netcore.png',
                    'react': '/images/skills_icons/react.png',
                    'cordova': '/images/skills_icons/cordava.png',
                    'firebase': '',
                    'xamarin': '',
                    'hadoop': '/images/skills_icons/hadoop.png',
                    'spark': '/images/skills_icons/spark.png',
                    'mysql': '/images/skills_icons/mysql.png',
                    'sql server': '/images/skills_icons/sql server.png',
                    'postgresql': '/images/skills_icons/postgreSQL.png',
                    'sqlite': '/images/skills_icons/SQLite.png',
                    'mongodb': '/images/skills_icons/mongoDB.png',
                    'oracle': '/images/skills_icons/Oracle.png',
                    'redis': '/images/skills_icons/redis.png',
                    'cassandra': '/images/skills_icons/cassandra.png'
                };
                if (arrayOfSkillImages.hasOwnProperty(skill_title.toLowerCase())) {
                    return arrayOfSkillImages[skill_title.toLowerCase()];
                }
                return '/images/skills_icons/skill.png';
            },
        },
    };
</script>

<style lang="scss" scoped>
    .themeWrapper{
        width: 100%;
    }
    @import "resources/sass/themes/theme200.scss";
</style>

