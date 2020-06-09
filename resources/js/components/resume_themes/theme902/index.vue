<template>
	<v-app id="hold-theme902" >
		<div
        class="head-parallax-tm902"
        :height="head_parallax"
        >
			<div class="header-tm902" >
				<v-row>
					<v-col lg="2" md="2" sm="2" cols="3">
						<v-img class="profile-image-tm902" src="/images/resume_themes/theme902/profile.png" ></v-img>
					</v-col>
					<v-col lg="6" md="6" sm="5" cols="8">
						<div class="info-tm902" >
							<p class="name-tm902" > amber salma heard </p>
							<p class="job-tm902" > UX UI Designer </p>
							<div class="skills-tm902 mt-2" >
								<span>Adobe XD</span>&nbsp;
                                <span class="point-tm903" >.</span>&nbsp;
								<span>Adobe Sketch</span>&nbsp;
                                <span class="point-tm903" >.</span>&nbsp;
								<span>Figma</span>
							</div>

							<v-row v-show="right_menu" >
                                <v-col>
								<v-menu
                                    v-model="menu"
                                    :close-on-content-click="false"
                                    :nudge-width="341"
                                    offset-y
                                    class="mx-auto"

                                    style="box-shadow: none;"
                                    >
									<template v-slot:activator="{ on }">
                                        <a href="#" class="menu-btn-tm902" v-on="on">
											<svg
												xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 20">
												<g transform="translate(-318.538 -40)">
													<circle cx="4" cy="4" r="4" transform="translate(318.538 40)" fill="#958C89" />
													<circle cx="4" cy="4" r="4" transform="translate(332.538 40)" fill="#958C89" />
													<circle cx="4" cy="4" r="4" transform="translate(332.538 52)" fill="#958C89" />
													<circle cx="4" cy="4" r="4" transform="translate(318.538 52)" fill="#958C89" />
												</g>
											</svg>
										</a>
									</template>
									<v-card
                                        class="mx-auto"
                                        style="padding-left:40px;padding-top:40px;padding-bottom:40px;border-radius: 25px;font-size:18px;color: #28404A;"
                                    >
										<v-list  >
											<v-list-item-group v-model="item" >
												<v-list-item
                                                    v-for="(item, i) in items"
                                                    :key="i"
                                                    >
													<v-list-item-icon>
														<v-icon color="#28404A" v-text="item.icon"></v-icon>
													</v-list-item-icon>
													<v-list-item-content>
														<v-list-item-title v-text="item.text"></v-list-item-title>
													</v-list-item-content>
												</v-list-item>
											</v-list-item-group>
										</v-list>
									</v-card>
								</v-menu>
                                </v-col>
							</v-row>
						</div>
					</v-col>
					<v-col lg="4" md="4" sm="5" cols="12">
						<div class="header-right-902" >
							<v-row v-show="top_btn_902" >
								<v-col  lg="6" md="6" sm="6" >
									<v-btn class="top-btn-902" >
										<v-icon class="icon-btn-902" left>mdi-email-check</v-icon>
                                    start a chat!
                                
									</v-btn>
								</v-col>
								<v-col lg="6" md="6" sm="6" >
									<v-btn class="top-btn-902" >
										<v-icon class="icon-btn-902" left>mdi-email-check</v-icon>
                                    Upload Interviews
                                
									</v-btn>
								</v-col>
							</v-row>
							<v-row>
								<v-col>
									<v-row class="bottom-info-902" >
										<v-col class="about-902" >
											<p class="title-902" >$45</p>
											<p class="subtitle-902" >hourly rate</p>
										</v-col>
										<v-col class="about-902" >
											<p class="title-902" >45 hr</p>
											<p class="subtitle-902" >weekly avaibility</p>
										</v-col>
									</v-row>
								</v-col>
								<v-col cols="6" >
									<v-btn class="bottom-btn-902" >
										<v-icon class="icon-btn-902" left>mdi-account-box</v-icon>
                                    hire me
									</v-btn>
								</v-col>
							</v-row>
						</div>
					</v-col>
				</v-row>
			</div>
            </div>
            <div class="tm903-scroll" >
                <div class="scroll-to-tm902" >
                    <span @click="top" class="d-flex  " >
                        <div class="tm902-scroll-line1" ></div><div class="tm902-scroll-line2" ></div> &nbsp;&nbsp;&nbsp;Scroll to top
                    </span>
                </div>
                <br>
                <div class="follow-us-tm902" >
                    <span class="d-flex" >
                        follow us&nbsp; <div class="tm902-follow-line" ></div>&nbsp; be / dribbble / in.
                    </span>
                </div>
            </div>
		<div class="content-tm902" >
			<v-tabs
                class="tabs-902"
                v-model="tabs_model"
                centered
                hide-slider
                :show-arrows="false"
                >
				<v-tab
                    v-for="value in tabs"
                    :key="value"
                >
                    {{ value }}
                </v-tab>
			</v-tabs>
		</div>
		<v-row justify="center" class="the-content-902" >
			<v-col cols="10" >
				<div  class="content-tabs-tm902" >
					<v-tabs-items class="tabs-items-902" v-model="tabs_model">
						<v-tab-item key="portfolio">
							<v-row class="portfolio-tm902" >
								<v-col
                            v-for="(value,index) in profile"
                            :key="index"
                            lg="4"
                            sm="4"
                            cols="12"
                            >
									<v-img class="portfolio-img-tm902" :src="value.img" ></v-img>
									<center>
										<p class="portfolio-title-tm902" > {{ value.title }} </p>
										<p class="portfolio-subtitle-tm902" > {{ value.subtitle }} </p>
									</center>
								</v-col>
							</v-row>
						</v-tab-item>
						<v-tab-item key="work experience" >
							<p class="tab-title-902" > experience </p>
							<p class="tab-subtitle-902" > where i've worked </p>
							<v-row class="boxes-902" >
								<v-col
                            class="boxe-902"
                            v-for="i in 3"
                            :key="i"
                            lg="4" 
                            sm="6"
                            cols="12"
                            >
									<span class="boxes-date-902 d-flex" >
										<div class="boxes-line-902" ></div> &nbsp;septembre 2017 - present
									</span>
									<p class="boxes-title-902" > quantum computer services </p>
									<p class="boxes-subtitle-902" > senior UX UI desiner </p>
									<p class="boxes-text-902" > Get, keoo and grow more customers with customer engagement Automation by kissmetrics. Get, keoo and grow more customers with customer engagement Automation by kissmetrics. </p>
									<p class="boxes-location-902" >
										<v-icon>mdi-location</v-icon>
                                    washington &nbsp;
										<span style="color:#D3D6E4;" >|</span>&nbsp; full time
                                
									</p>
								</v-col>
							</v-row>
						</v-tab-item>
						<v-tab-item key="education" >
							<p class="tab-title-902" > education </p>
							<p class="tab-subtitle-902" > where i've learned </p>
							<v-row class="boxes-902" >
								<v-col
                            class="boxe-902"
                            v-for="i in 3"
                            :key="i"
                            lg="4" 
                            sm="6"
                            cols="12" >
                                    <span class="boxes-date-902 d-flex" >
										<div class="boxes-line-902" ></div> &nbsp; 2017 - 2015
									</span>
									<p class="boxes-title-902" > quantum computer services </p>
									<p class="boxes-subtitle-902" > senior UX UI desiner </p>
									<p class="boxes-text-902" > Get, keoo and grow more customers with customer engagement Automation by kissmetrics. Get, keoo and grow more customers with customer engagement Automation by kissmetrics. </p>
									<p class="boxes-location-902" >
										<v-icon>mdi-location</v-icon>
                                    washington &nbsp;
										<span style="color:#D3D6E4;" >|</span>&nbsp; private
                                
									</p>
								</v-col>
							</v-row>
						</v-tab-item>
						<v-tab-item key="skills and languages" >
							<v-row class="skills-902">
								<v-col class="skills-left-tm902" lg="4" >
									<p class="skill-title-902" >services</p>
									<p class="active-skille-title-902">skills and languages</p>
									<p class="skill-title-902">what i bring to the table</p>
								</v-col>
								<v-col lg="8" sm="12" >
									<v-row class="skills-right-tm902" >
										<v-col 
                                    v-for="(value , index) in skills"
                                    :key="index"
                                    lg="4"
                                    sm="4"
                                    cols="6"
                                    >
											<v-progress-circular  color="#000" :size="circular_size" :value="value.level">
												<span class="skills-abr-tm902" > {{ value.brev }} </span>
											</v-progress-circular>
											<p class="skills-title-tm902" > {{ value.title }} </p>
											<p class="skills-level-tm902" >
												{{ value.level }}%
											</p>
										</v-col>
									</v-row>
								</v-col>
							</v-row>
						</v-tab-item>
						<v-tab-item key="about me & awards">
							<v-row class="aboutme-902" >
								<v-col lg="4" sm="4" cols="12">
									<p class="aboutme-title-902" >welcome to my profile</p>
								</v-col>
								<v-col lg="8" sm="8" cols="12">
									<v-row>
										<v-col
                                        v-for="i in 4"
                                        :key="i"
                                        lg="6"
                                        sm="6"
                                        cols="12"
                                        >
											<p  class="aboutme-text-902">
                                            Currently I'm a freelance designer and web developer, who works with a variety of clients and on many diverse projects.
                                        </p>
										</v-col>
									</v-row>
								</v-col>
							</v-row>
						</v-tab-item>
					</v-tabs-items>
				</div>
			</v-col>
		</v-row>
	</v-app>
</template>

<script>
export default {
name:"hold-theme902",
data(){
    return{
        item: 1,
        showit:null,
        items: [
            { text: 'Start a chat!', icon: 'mdi-email-check' },
            { text: 'Uploads interviews', icon: 'mdi-briefcase' }
        ],
        fav: true,
        menu: false,
        message: false,
        hints: true,
        
        tabs_model:null,
        tabs:
        [
            'portfolio','work experience','education','skills and languages','about me & awards'
        ],
        profile:[
            {title:"Corporate",subtitle:"Agency, Corporate",img:"/images/resume_themes/theme902/profile1.png"},
            {title:"Corporate",subtitle:"Agency, Corporate",img:"/images/resume_themes/theme902/profile2.png"},
            {title:"Corporate",subtitle:"Agency, Corporate",img:"/images/resume_themes/theme902/profile3.png"},
            {title:"Corporate",subtitle:"Agency, Corporate",img:"/images/resume_themes/theme902/profile4.png"},
            {title:"Corporate",subtitle:"Agency, Corporate",img:"/images/resume_themes/theme902/profile5.png"},
            {title:"Corporate",subtitle:"Agency, Corporate",img:"/images/resume_themes/theme902/profile6.png"}
        ],
        skills:[
            {title:"Adobe XD",brev:"xd",level:"90"},
            {title:"Adobe indesign",brev:"id",level:"89"},
            {title:"Adobe illustrator",brev:"ai",level:"59"},
            {title:"Adobe photoshop",brev:"ps",level:"89"},
            {title:"Adobe indesign",brev:"id",level:"30"}
        ]
    }
},
methods:{
      top(){
             window.scrollTo(0,0);
           }
        },
computed: {
      head_parallax () {
        switch (this.$vuetify.breakpoint.name) {
          case 'xs': return '130'
          case 'sm': return '202'
          case 'md': return '202'
          case 'lg': return '344'
          case 'xl': return '344'
        }
      },
      top_btn_902(){
        switch (this.$vuetify.breakpoint.name) {
          case 'xs': return false
          case 'sm': return true
          case 'md': return true
          case 'lg': return true
          case 'xl': return true
        }
      },
      right_menu(){
        switch (this.$vuetify.breakpoint.name) {
          case 'xs': return true
          case 'sm': return false
          case 'md': return false
          case 'lg': return false
          case 'xl': return false
        }
      },
      circular_size(){
          switch (this.$vuetify.breakpoint.name) {
          case 'xs': return "40"
          case 'sm': return "60"
          case 'md': return "70"
          case 'lg': return "70"
          case 'xl': return "70"
        }
      }
}
}
</script>

<style lang="scss" >
@import url("https://fonts.googleapis.com/css2?family=Muli&display=swap");
#hold-theme902{
    .tm903-scroll{
        margin: 0 30px 0;
        @media only screen and (max-width: 1024px){
           padding: 0 20px 0; 
        }
        @media only screen and (max-width: 424px){
           padding: 0 10px 0; 
        }
        display: inline-block;
        z-index: 999;
        .scroll-to-tm902{
            float: right;
            cursor: pointer;
            text-transform: capitalize;
            font-family: "Muli", sans-serif;
            transform: rotate(270deg);
            font-size: 20px;
            font-weight: bold;
            letter-spacing: 0px;
            color: #1D1C22;
            left: -30px;
            top: 666px;
            position: absolute;
            z-index: 999;
            .tm902-scroll-line1{
                border-top: 1px solid #000;
                width: 60px;
                margin-top: auto;
                margin-bottom: auto;
                position: relative;
                opacity: 0.5;
            }
            .tm902-scroll-line2{
                border-top: 3px solid #000;
                width: 20px;
                margin-top: auto;
                margin-bottom: auto;
                position: relative;
            }
            @media only screen and (max-width: 1024px){
                left: -60px;
                top: 425px;
                font-size: 12px;
            }
            @media only screen and (max-width: 425px){
                display: none;
            }
        }
        .follow-us-tm902{
            float: right;
            cursor: pointer;
            text-transform: capitalize;
            font-family: "Muli", sans-serif;
            transform: rotate(270deg);
            font-size: 20px;
            font-weight: bold;
            letter-spacing: 0px;
            color: #1D1C22;
            right: -60px;
            top: 700px;
            position: absolute;
            z-index: 999;
            .tm902-follow-line{
                border-top: 3px solid #000;
                width: 17px;
                margin-top: auto;
                margin-bottom: auto;
                position: relative;
            }
            @media only screen and (max-width: 1024px){
                right: -60px;;
                top: 430px;
                font-size: 12px;
            }
            @media only screen and (max-width: 425px){
                display: none;
            }
        }
    }
    .v-menu__content{
        border-radius: 25px;
    }
    .head-parallax-tm902{
        background-image: url("/images/resume_themes/theme902/bg_header.png");
        background-size: cover;
        max-height: 344px;
        color: #fff;
        @media only screen and (max-width: 1024px){
            max-height: 202px;
        }
        @media only screen and (max-width: 424px){
            max-height: 130px;
        }
        .div__content{
        padding: 0;
        padding-top: 20px;
        }}
    .header-tm902{
        padding: 55px 70px 55px;
        @media only screen and (max-width: 1024px){
           padding: 0 20px 0; 
        }
        @media only screen and (max-width: 424px){
           padding: 0 10px 0; 
        }
        .profile-image-tm902{
            margin-top: auto;
            margin-bottom: auto;
            max-width: 232px;
            max-height: 232px;
            border: 4px solid #FFFFFF;
            border-radius: 50%;
            @media only screen and (max-width: 1024px)
            {
                margin-top: 30px;
            }
            @media only screen and (max-width:  600px){
                margin-top: 0px;
            }
        }
        .info-tm902{
            margin-top: 38px;
            text-transform: capitalize;
            letter-spacing: 0px;
            font-family: 'Muli', sans-serif;
            @media only screen and (min-width:  1618px){
                margin-left: -2%;
            }
            @media only screen and (max-width:  600px){
                margin-top: 0px;
            }
            .name-tm902{
                color:#fff;
                font-weight: bold;
                font-size: 30px;
                @media only screen and (max-width: 1264px){
                    font-size: 20px;
                }
                @media only screen and (max-width: 764px)
                {
                    font-size: 12px;
                    margin-bottom: 0px;
                }
            }
            .job-tm902{
                color: #fff;
                font-size: 26px;
                opacity: 0.67;
                margin-bottom: 0px;
                @media only screen and (max-width: 1264px){
                    font-size: 16px;
                }
                @media only screen and (max-width: 764px)
                {
                    font-size: 10px;
                    margin-bottom: 0px;
                }
            }
            .skills-tm902{
                font-size: 26px;
                opacity: 0.67;
                .point-tm903{
                    font-weight: bolder;
                    position: relative;
                    top: -5px;
                }
                @media only screen and (max-width: 1264px){
                    font-size: 16px;
                }
                @media only screen and (max-width: 1024px){
                    font-size: 10px;
                }
                @media only screen and (max-width:  600px)
                {
                    display:none;
                }
                li
                {
                    text-align: left;
                    display:inline;
                }
            }
        }
        .menu-btn-tm902{
            display: block;
            position: absolute;
            top: 15px;
            right: 10px;
            width: 22px;
            height: 20px;
            @media only screen and (min-width: 425px){
                right: 20px;
            }
        }
        .header-right-902{
            margin-top: 26px;
            float: right;
            @media only screen and (max-width:  600px){
                margin-left: 30%;
                margin-top: -17%;
                float: initial;
            }
            .icon-btn-902{
                font-size: 20px;
                @media only screen and (max-width: 1600px){
                font-size: 16px;
            }
            @media only screen and (max-width: 1264px){
                font-size: 14px;
            }
            @media only screen and (max-width: 1024px){
                font-size: 12px;
            }
            }
        .top-btn-902{
            width: 219px;
            height: 68px;
            background: #080808 0% 0% no-repeat padding-box;
            border-radius: 9px;
            font-family: 'Muli', sans-serif;
            font-size: 18px;
            text-transform: capitalize;
            letter-spacing: 0px;
            color: #FFFFFF;
            @media only screen and (max-width: 1600px){
                width: 100%;
                padding: 0px 40px 0;
                font-size: 14px;
            }
            @media only screen and (max-width: 1264px){
                font-size: 12px;
                width: 100%;
                height: 50px;
            }
            @media only screen and (max-width: 1024px){
                font-size: 10px;
                width: 100%;
                height: 39px;
            }
            @media only screen and (max-width: 600px){
                height: 30px;
            }
            
        }
        .bottom-info-902{
            position: relative;
            left:-50px;
            @media only screen and (max-width: 1264px){
                left: 0;
            }
        }
        .bottom-btn-902{
            width: 100%;
            max-width: 219px;
            height: 68px;
            background: #958C89 0% 0% no-repeat padding-box;
            border-radius: 9px;
            font-family: 'Muli', sans-serif;
            font-size: 18px;
            text-transform: capitalize;
            letter-spacing: 0px;
            color: #FFFFFF;
            font-weight: bold;
             @media only screen and (max-width: 1600px){
                width: 100%;
                padding: 0px 40px 0;
                font-size: 15px;
            }
            @media only screen and (max-width: 1600px){
                font-size: 14px;
            }
            @media only screen and (max-width: 1264px){
                font-size: 12px;
                width: 100%;
                height: 50px;
            }
            @media only screen and (max-width: 1024px){
                font-size: 10px;
                height: 39px;
            }
            @media only screen and (max-width: 600px){
                height: 30px;
            }
        }
        .about-902{
            font-family: 'Muli', sans-serif;
            text-transform: capitalize;
            padding: 0;
            .title-902{
                color: #fff;
                font-size: 26px;
                font-weight: bold;
                //margin-bottom: 0px;
                @media only screen and (max-width: 1264px){
                    font-size: 20px;
                    margin-bottom: -3px;
                }
                @media only screen and (max-width: 764px){
                    font-size: 15px;
                    margin-bottom: 0px;
                }
            }
            .subtitle-902{
                font-size: 15px;
                color: #BEC2D4;
                @media only screen and (max-width: 1600px){
                    font-size: 12px;
                }
                @media only screen and (max-width: 1264px){
                    font-size: 9px;
                }
                @media only screen and (max-width: 764px){
                    font-size: 8px;
                    margin-bottom: 0px;
                }
            }
        }
        }
    }
    .content-tm902{
        padding: 0 70px 0;
        @media only screen and (max-width: 1024px){
           padding: 0 20px 0; 
        }
        @media only screen and (max-width: 424px){
           padding: 0 10px 0; 
        }
        margin-top: 35px;
        @media only screen and (max-width: 1024px){
            margin-top: 16px;
        }
        .tabs-902{
            .v-slide-group__prev {
                display: none;
            }
            .v-tab{
                text-transform: capitalize;
                font-size: 20px;
                font-family: 'Muli', sans-serif;
                letter-spacing: 0.62px;
                color: #000000;
                padding-left: 45px;
                padding-right: 45px;
                @media only screen and (max-width: 1024px){
                    letter-spacing: 0.31px;
                    font-size: 10px;
                    padding-left: 16px;
                    padding-right: 16px;
                    height: 23px;
                    }
                    @media only screen and (max-width: 764px){
                    }
            }
            .v-tab--active {
                font-weight: bold;
                border: 1px solid #000000;
                border-radius: 8px;
            }
        }
    }
    .the-content-902
    {
        background-image: url("/images/resume_themes/theme902/bg.png");
        @media only screen and (max-width: 764px){
            background: transparent;
                    }
        .content-tabs-tm902{
        margin-top: 35px;
        @media only screen and (max-width: 1024px){
            margin-top: 16px;
        }
        .theme--light.v-tabs-items{
            background-color: transparent;
        }
        .tabs-items-902{
            .tab-title-902{
                text-transform: capitalize;
                font-weight: bold;
                font-family: 'Muli', sans-serif;
                font-size: 40px;
                @media only screen and (max-width: 1024px){
                font-size: 26px;
                    margin-bottom: 0;
                    }
            }
            .tab-subtitle-902{
                text-transform: capitalize;
                font-family: 'Muli', sans-serif;
                font-size: 24px;
                font-style: Italic;
                color: #BEC2D4;
                @media only screen and (max-width: 764px){
                font-size: 15px;
                    }
            }
            .portfolio-tm902
            {
                text-transform: capitalize;
                .portfolio-img-tm902{
                    border-radius: 9px;
                }
                .portfolio-title-tm902{
                    margin-top: 30px;
                    font-size:25px ;
                    font-family: 'Muli', sans-serif;
                    font-weight: bold;
                    @media only screen and (max-width: 1024px){
                        font-size: 13px;
                        margin-bottom: 5px;
                    }
                    @media only screen and (max-width: 764px){
                        font-size: 13px;
                        margin-bottom: 4px;
                    }
                }
                .portfolio-subtitle-tm902{
                    font-size:18px ;
                    font-family: 'Muli', sans-serif;
                    color: #555456;
                    @media only screen and (max-width: 1024px){
                        font-size: 9px;
                    }
                    @media only screen and (max-width: 764px){
                        font-size: 11px;
                    }
                }
            }
            .boxes-902{
                margin-top: 80px;
                @media only screen and (max-width: 1024px){
                   margin-top: 50px; 
                }
                .boxe-902{
                    font-family: 'Muli', sans-serif;
                    text-transform: capitalize;
                    .boxes-date-902{
                        .boxes-line-902{
                        border-top: 2px #616887 solid;
                        width: 33px;
                        margin-top: auto;
                        margin-bottom: auto;
                        }
                        font-weight: bold;
                        font-size: 19px;
                        letter-spacing: -0.19px;
                        color: #616887;
                        @media only screen and (max-width: 1024px){
                        font-size: 15px;
                        letter-spacing: -0.15px;
                        }
                        @media only screen and (max-width: 764px){
                            font-size: 13px;
                            letter-spacing: -0.13px;
                        }
                    }
                    .boxes-title-902{
                        font-weight: bolder;
                        font-size: 32px;
                        letter-spacing: -0.32px;
                        color: #000000;
                        @media only screen and (max-width: 1024px){
                        font-size: 26px;
                        letter-spacing: -0.26px;
                        }
                        @media only screen and (max-width: 764px){
                            font-size: 22px;
                            letter-spacing: -0.22px;
                        }
                    }
                    .boxes-subtitle-902{
                        font-weight: bold;
                        font-size: 20;
                        letter-spacing: -0.2px;
                        color: #000000;
                        @media only screen and (max-width: 1024px){
                        font-size: 16px;
                        letter-spacing: -0.16px;
                        }
                        @media only screen and (max-width: 764px){
                        font-size: 13px;
                        letter-spacing: -0.13px;
                        }
                    }
                    .boxes-text-902{
                        margin-top: 30px;
                        font-size: 17px;
                        letter-spacing: 0px;
                        color: #838BA4;
                        @media only screen and (max-width: 1024px){
                        font-size: 14px;
                        }
                        @media only screen and (max-width: 764px){
                        font-size: 13px;
                        letter-spacing: 0px;
                        }
                    }
                    .boxes-location-902{
                        margin-top: 25px;
                        font-size: 16px;
                        letter-spacing: 0.5px;
                        color: #000000;
                        @media only screen and (max-width: 1024px){
                        font-size: 13px;
                        letter-spacing: 0.5px;
                        }
                        @media only screen and (max-width: 764px){
                        font-size: 11px;
                        letter-spacing: 0.34px;
                        }
                    }
                }
            }
        }
        .skills-902
        {
            font-family: 'Muli', sans-serif;
            text-transform: capitalize;
            .skills-left-tm902
            {
            .skill-title-902{
                font-size: 24px;
                letter-spacing: 0px;
                color: #616887;
                max-width: 200px;
            }
            .active-skille-title-902{
                font-weight: bold;
                font-size: 40px;
                letter-spacing: 0px;
                color: #000000;
                max-width: 200px;
            }
            @media only screen and (max-width: 1024px){
            display: none;
            }
            }
            .skills-right-tm902{
            font-family: 'Muli', sans-serif;
            text-transform: capitalize;
            .skills-abr-tm902{
                border: 1px solid #000;
                padding: 2px;
                padding-left: 5px;
                padding-right: 5px;
                @media only screen and (max-width: 1024px){
                    font-size: 13px;
                }
                @media only screen and (max-width: 764px){
                    padding: 1px;
                padding-left: 2px;
                padding-right: 2px;
                    font-size: 10px;
                }
            }
            .skills-title-tm902
            {
            font-size: 30px;
            font-weight: bolder;
            color: #15181A;
            @media only screen and (max-width: 1024px){
                margin-bottom: 0px;
                font-size: 23px;
            }
            @media only screen and (max-width: 764px){
                font-size: 16px;
            }
            }
            .skills-level-tm902
            {
            font-size: 20px;
            font-weight: bold;
            color: #616887;
            @media only screen and (max-width: 1024px){
                font-size: 15px;
            }
            @media only screen and (max-width: 764px){
                font-size: 10px;
            }
            }
        }
        }
        .aboutme-902{
            font-family: 'Muli', sans-serif;
            .aboutme-title-902{
            text-transform: capitalize;
                font-weight: bolder;
                font-size: 40px;
                max-width: 236px;
                justify-content: center;
                margin-left: auto;
                margin-right: auto;
                @media only screen and (max-width: 1024px){
                    font-size: 25px;
                    max-width: 147px;
                    color: #1D1C22;
                }
                @media only screen and (max-width: 764px){
                    font-size: 18px;
                    float: left;
                    max-width: 100%;
                }
            }
            .aboutme-text-902{
                text-align: left;
                font-size: 20px;
                color: #616887;
                @media only screen and (max-width: 1024px){
                    font-size: 12px;
                }
            }
        }
    }
    }
}
</style>