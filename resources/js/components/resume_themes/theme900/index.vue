<template>
<v-app id="hold-theme900" >
    <div>
        <v-row class="header-section-tm900 align-center " >
            <v-col class="tm900-avatar" lg="2" md="2" sm="3" cols="3" >
                    <img class="tm900-avatar-image" src="/images/resume_themes/theme900/Ellipse27.png" alt="">
            </v-col>
            <v-col lg="5" md="4" sm="5" cols="5"  class="profile" >
                <p class="name" > carol swift </p>
                <p class="job" > graphic designer </p>
                <p class="description" >Donec a augue gravida, vulputate ligula et, pellentesque arcu. </p>
            </v-col>
            <v-col lg="5" md="6" sm="4" cols="4" >
                <div class="contact-button">
                    <v-row>
                        <v-col class="contact-button-items" cols="12" >
                            <v-btn color="#F9F9F9" class="tm900-sc mr-xl-10 mr-lg-4 mr-md-3" height="50">
                                <v-icon color="#69C8FD" > mdi-twitter </v-icon>
                            </v-btn>
                            <v-btn color="#F9F9F9" class="tm900-sc mr-xl-10 mr-lg-4 mr-md-3" height="50">
                                <v-icon color="#3C58E9" > mdi-facebook </v-icon>
                            </v-btn>
                            <v-btn  color="#F9F9F9" class="tm900-sc mr-xl-10 mr-lg-4 mr-md-3" height="50">
                                <v-icon color="#FF6523" > mdi-instagram </v-icon>
                            </v-btn>
                            <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
                            <template v-slot:activator="{ on }">
                                <v-btn v-on="on" @click="sended=false" class="get-touch">
                                    <v-icon> mdi-email </v-icon>&nbsp;her me
                                </v-btn>
                            </template>
                                <div class="tm900-payment">
                                    <v-row justify="center">
                                        <v-col cols lg="5" class="tm900-dialog-left">
                                            <span> choose your payment method </span>
                                            <img src="/images/resume_themes/theme900/Frame 1.png" alt="">
                                        </v-col>
                                        <v-col lg="6" sm="9" class="tm900-dialog-right">
                                            <v-btn class="button-close" icon color="#000" @click="dialog = false">
                                                <v-icon>mdi-close</v-icon>
                                            </v-btn>
                                            <div v-if="!sended">
                                                <v-tabs v-model="payment_tabs" background-color="#ffffff00" class="tm900-tabs-payment">
                                                    <v-tabs-slider :color="color_payment"></v-tabs-slider>
                                                    <v-tab class="tm900-tab-payment">
                                                        <span>paypal</span>
                                                    </v-tab>
                                                    <v-tab class="tm900-tab-payment">
                                                        <span>stripe</span>
                                                    </v-tab>
                                                </v-tabs>
                                                <v-row class="form-payment" justify="center">
                                                    <v-col lg="6" xs="4">
                                                        <v-form ref="form" v-model="valid">
                                                            <v-text-field v-model="email" :rules="emailRules" label="E-mail" single-line outlined required></v-text-field>
                                                            <v-text-field v-model="password" :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'" :rules="[rules.required, rules.min]" :type="show1 ? 'text' : 'password'" name="input-10-1" label="Normal with hint text" hint="At least 8 characters" counter single-line
                                                                outlined @click:append="show1 = !show1"></v-text-field>
                                                            <a class="forget-password" href="">Did you forget your password ?</a><br>
                                                            <v-row justify='center'>
                                                                <v-btn :disabled="!valid" :color="color_payment" class="payment-submit align-center" @click="validate" large flat>send pay</v-btn>
                                                            </v-row>
                                                        </v-form>
                                                    </v-col>
                                                </v-row>
                                            </div>
                                            <v-row justify="center" v-else>
                                                <p class="tm900-message">Thank you, your payment was successful </p>
                                                <v-icon size="400" :color="color_payment">mdi-check-circle-outline</v-icon>
                                            </v-row>
                                        </v-col>
                                    </v-row>
                                </div>
                            </v-dialog>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col lg="12" md="12" sm="8" class="information">
                            <v-row>
                                <v-col cols="5">
                                    <p class="info-title">hour rate </p>
                                    <span class="info-subtitle">$5</span>
                                </v-col>
                                <v-col>
                                    <p class="info-title"> weekly availability </p>
                                    <span class="info-subtitle"> 500 </span>
                                </v-col>
                            </v-row>
                        </v-col>
                    </v-row>
                    <!-- <v-row>
                        <v-col class="contact-button-items" lg="12" >
                            <v-btn color="#F9F9F9" class="tm900-sc mr-xl-10 mr-lg-4 mr-md-3" height="50">
                                <v-icon color="#69C8FD" > mdi-twitter </v-icon>
                            </v-btn>
                            <v-btn color="#F9F9F9" class="tm900-sc mr-xl-10 mr-lg-4 mr-md-3" height="50">
                                <v-icon color="#3C58E9" > mdi-facebook </v-icon>
                            </v-btn>
                            <v-btn  color="#F9F9F9" class="tm900-sc mr-xl-10 mr-lg-4 mr-md-3" height="50">
                                <v-icon color="#FF6523" > mdi-instagram </v-icon>
                            </v-btn>
                            <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
                            <template v-slot:activator="{ on }">
                                <v-btn v-on="on" @click="sended=false" class="get-touch">
                                    <v-icon> mdi-email </v-icon>&nbsp;her me
                                </v-btn>
                            </template>
                                <div class="tm900-payment">
                                    <v-row justify="center">
                                        <v-col cols lg="5" class="tm900-dialog-left">
                                            <span> choose your payment method </span>
                                            <img src="/images/resume_themes/theme900/Frame 1.png" alt="">
                                        </v-col>
                                        <v-col lg="6" sm="9" class="tm900-dialog-right">
                                            <v-btn class="button-close" icon color="#000" @click="dialog = false">
                                                <v-icon>mdi-close</v-icon>
                                            </v-btn>
                                            <div v-if="!sended">
                                                <v-tabs v-model="payment_tabs" background-color="#ffffff00" class="tm900-tabs-payment">
                                                    <v-tabs-slider :color="color_payment"></v-tabs-slider>
                                                    <v-tab class="tm900-tab-payment">
                                                        <span>paypal</span>
                                                    </v-tab>
                                                    <v-tab class="tm900-tab-payment">
                                                        <span>stripe</span>
                                                    </v-tab>
                                                </v-tabs>
                                                <v-row class="form-payment" justify="center">
                                                    <v-col lg="6" xs="4">
                                                        <v-form ref="form" v-model="valid">
                                                            <v-text-field v-model="email" :rules="emailRules" label="E-mail" single-line outlined required></v-text-field>
                                                            <v-text-field v-model="password" :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'" :rules="[rules.required, rules.min]" :type="show1 ? 'text' : 'password'" name="input-10-1" label="Normal with hint text" hint="At least 8 characters" counter single-line
                                                                outlined @click:append="show1 = !show1"></v-text-field>
                                                            <a class="forget-password" href="">Did you forget your password ?</a><br>
                                                            <v-row justify='center'>
                                                                <v-btn :disabled="!valid" :color="color_payment" class="payment-submit align-center" @click="validate" large flat>send pay</v-btn>
                                                            </v-row>
                                                        </v-form>
                                                    </v-col>
                                                </v-row>
                                            </div>
                                            <v-row justify="center" v-else>
                                                <p class="tm900-message">Thank you, your payment was successful </p>
                                                <v-icon size="400" :color="color_payment">mdi-check-circle-outline</v-icon>
                                            </v-row>
                                        </v-col>
                                    </v-row>
                                </div>
                            </v-dialog>
                        </v-col>
                        <v-col lg="7" sm="5" class="information">
                            <v-row>
                                <v-col>
                                    <p class="info-title">hour rate </p>
                                    <span class="info-subtitle">$5</span>
                                </v-col>
                                <v-col>
                                    <p class="info-title"> weekly availability </p>
                                    <span class="info-subtitle"> 500 </span>
                                </v-col>
                            </v-row>
                        </v-col>
                    </v-row> -->
                </div>
            </v-col>
        </v-row>
    </div>
    <div class="content-theme900" >
        <v-row justify="center" class="divider-tm900 mt-12">
            <v-col lg="9">
                <v-divider hight></v-divider>
            </v-col>
        </v-row>
<v-row justify="center" class="mt-5">
    <v-col cols lg="9" md="12" sm="12" xs="12">
        <v-tabs v-model="tab"
        fixed-tabs
        centered
        hide-slider
        :show-arrows="false" 
        background-color="#fff" class="tm900-tabs">
            <v-tab v-for="item in items" :key="item.name" class="tm900-tab" :style="'background:'+item.color+';color:#fff'">
                <v-icon :size="iconsize" :color="iconcolor" class="tm900-tab-icon"> {{ item.icon }} </v-icon>
                <span class="tm900-tab-title mr-auto ml-auto">{{ item.name }}</span>
            </v-tab>
        </v-tabs>
    </v-col>
</v-row>
<v-tabs-items class="mt-12" v-model="tab">
    <v-tab-item key="Portfolio">
        <div>
            <p class="tm900-title"> portfolio </p>
            <v-row>
                <v-col 
                    v-for="(value,index) in portfolio" 
                    :key="index" 
                    cols="6" 
                    lg="3" 
                    md="6" 
                    xs="6" 
                    class="tm900-tab-item mt-2">
                    <v-img class="tm900-img" :src="value"></v-img>
                </v-col>
            </v-row>
        </div>
    </v-tab-item>
    <v-tab-item key="Education">
        <div>
            <p class="tm900-title">education</p>
            <v-row>
                <v-col v-for="(value , index) in education" :key="index" cols lg="4" md="12" xs="12">
                    <v-sheet class="tm900-box-content mt-2" :class="`d-flex align-center`">
                        <img v-if="value.img" class="tm900-box-pic" :src="value.img">
                        <img v-else class="tm900-box-pic" src="/images/resume_themes/theme900/Rectangle 47.png">
                            <v-icon color="#fff" :size="iconsize" class="d-flex align-center " left>mdi-school-outline</v-icon>
                        
                        <div>
                            <p class="tm900-box-text ml-5 "> {{ value.title }} </p>
                            <p class="tm900-box-text font-weight-bold ml-5"> {{ value.subtitle }} </p>
                            <p class="tm900-box-text ml-5 "> {{ value.text }} </p>
                        </div>
                    </v-sheet>
                </v-col>
            </v-row>
        </div>
    </v-tab-item>
    <v-tab-item key="Experience ">
        <div>
            <p class="tm900-title">experience</p>
            <v-row>
                <v-col v-for="(value , index) in experience" :key="index" cols lg="4" md="12" xs="12">
                    <v-sheet class="tm900-box-content mt-2" :class="`d-flex align-center`">
                        <img v-if="value.img" class="tm900-box-pic" :src="value.img">
                        <img v-else class="tm900-box-pic" src="/images/resume_themes/theme900/Rectangle 47.png">
                            <v-icon color="#fff" :size="iconsize" class="d-flex align-center " left>mdi-school-outline</v-icon>
                        
                        <div>
                            <p class="tm900-box-text ml-5 "> {{ value.title }} </p>
                            <p class="tm900-box-text font-weight-bold ml-5"> {{ value.subtitle }} </p>
                            <p class="tm900-box-text ml-5 "> {{ value.text }} </p>
                        </div>
                    </v-sheet>
                </v-col>
            </v-row>
        </div>
    </v-tab-item>
    <v-tab-item key="Skills">
        <div>
            <p class="tm900-title">skills</p>
            <v-row>
                <v-col>
                    <v-tabs v-model="tab_skills" background-color="#FFF" class="tm900-skills-tabs mt-2 ml-2">
                        <v-tabs-slider color="#AA5DF7"></v-tabs-slider>
                        <v-tab class="tm900-skills-tab" v-for="(value,index) in skills" :key="index">
                            <span>{{ value }}</span>
                        </v-tab>
                    </v-tabs>
                </v-col>
            </v-row>
            <v-tabs-items v-model="tab_skills">
                <v-tab-item key="programming languages">
                </v-tab-item>
                <v-tab-item key="frameworks">
                    <v-row>
                        <v-col cols xl="8" lg="12" md="10" xs="12">
                            <v-row>
                                <v-col v-for="(item,index) in frameworks" :key="index" cols lg="6" md="6" xs="12">
                                    <v-sheet height="100px" color="#fff" class="tm900-framework" :class="`d-flex align-center `">
                                        <v-avatar class="ml-7" height="50" width="50" tile>
                                            <img :src="item.img" :alt="item.img">
                                        </v-avatar>
                                        <p class="ml-10 mt-2"> {{ item.title }} </p>
                                        <v-spacer></v-spacer>
                                        <v-progress-circular class="mr-6 mt-4 mb-4" color="#41B883" :size="70" :value="item.level">
                                            <p class="mt-3"> {{ item.level }}% </p>
                                        </v-progress-circular>
                                    </v-sheet>
                                </v-col>
                            </v-row>
                        </v-col>
                    </v-row>
                </v-tab-item>
                <v-tab-item key="design skills">
                </v-tab-item>
                <v-tab-item key="softwore">
                </v-tab-item>
            </v-tabs-items>
        </div>
    </v-tab-item>
    <v-tab-item key="Audios&Video">
        <div>
            <p class="tm900-title">portfolio</p>
            <v-row class="tm900-tab-portfolio2 mt-2">
                <v-col cols lg="4" sm="6" class="tm900-tab-portfolio2-first-col">
                    <img class="tm900-tab-portfolio2-img" src="/images/resume_themes/theme900/Rectangle 41.png" />
                </v-col>
                <v-col lg="4" sm="6" cols="12" class="tm900-tab-portfolio2-second-col">
                    <v-row>
                        <v-col lg="12" sm="10" cols="12">
                            <span class="tm900-tab-portfolio2-title"> UXUI - Theme CV </span><br>
                            <span class="tm900-tab-portfolio2-text mt-7"> with civie you can generate your CV and give it an incredible and professional appearance. </span>
                        </v-col>
                        <v-col lg="12" sm="4" cols="12">
                            <div class="tm900-tab-seemore-section">
                                <span class="tm900-tab-seemore-section-title">See more</span>
                                <v-row class="tm900-tab-seemore-content">
                                    <v-col v-for="(value, index) in portfolio" :key="index" lg="3" sm="3" cols="3">
                                        <img class="tm900-tab-seemore-content-img" :src="value" />
                                    </v-col>
                                </v-row>
                            </div>
                        </v-col>
                    </v-row>
                </v-col>
            </v-row>
        </div>
    </v-tab-item>
</v-tabs-items>
</div>
</v-app>
</template>
<script >
export default {
    name:"theme900",
    data () {
      return {
        tab: null,
        tab_skills:null,
        payment_tabs:null,
        portfolio: [
          '/images/resume_themes/theme900/Rectangle 32.png','/images/resume_themes/theme900/Rectangle 41.png', '/images/resume_themes/theme900/Rectangle 43.png', '/images/resume_themes/theme900/Rectangle 40.png','/images/resume_themes/theme900/Rectangle 41.png','/images/resume_themes/theme900/Rectangle 40.png'
        ],
        dialog: false,
        notifications: false,
        sound: true,
        widgets: false,
        education:[
                { title:"2010-2013", subtitle:"Ryeson University", text:"Parallel to the postgraduate degree in computer security , i studied Digital Marketing.", img:"/images/resume_themes/theme900/Rectangle 44.png" },
                { title:"2010-2013", subtitle:"Ryeson University", text:"Parallel to the postgraduate degree in computer security , i studied Digital Marketing.", img:"" },
                { title:"2010-2013", subtitle:"Ryeson University", text:"Parallel to the postgraduate degree in computer security , i studied Digital Marketing.", img:"" }
            ],
        experience:[
            { title:"2018-2020", subtitle:"Platzi", text:"Parallel to the postgraduate degree in computer security , i studied Digital Marketing.", img:"/images/resume_themes/theme900/Rectangle 441.png" },
                { title:"2018-2020", subtitle:"IBM Lab", text:"Parallel to the postgraduate degree in computer security , i studied Digital Marketing.", img:"/images/resume_themes/theme900/Rectangle 471.png" },
                { title:"2019-2019", subtitle:"Relevo", text:"Parallel to the postgraduate degree in computer security , i studied Digital Marketing.", img:"/images/resume_themes/theme900/Rectangle 51.png" },
                { title:"2019-2019", subtitle:"Aerolab", text:"Parallel to the postgraduate degree in computer security , i studied Digital Marketing.", img:"/images/resume_themes/theme900/Rectangle 53.png" },
                { title:"2020-2020", subtitle:"Orizon", text:"Parallel to the postgraduate degree in computer security , i studied Digital Marketing.", img:"/images/resume_themes/theme900/Rectangle 57.png" }
        ],
        items: [
          {name:'Portfolio', color:'#FFA722', icon:'mdi-image-outline'},
          {name:'Education', color:'#FF5252', icon:'mdi-school-outline'},
          {name:'Experience', color:'#2E91DA', icon:'mdi-briefcase-outline'},
          {name:'Skills', color:'#AA5DF7', icon:'mdi-brush'},
          {name:'Audios&Video', color:'#62FB49', icon:'mdi-play-box-multiple-outline'}
        ],
        skills:['programming languages', 'frameworks','design skills', 'softwore'],
        frameworks:[
                { title:"React",level:"85",img:"/images/resume_themes/theme900/image 3.png" },
                { title:"Vue JS",level:"85",img:"/images/resume_themes/theme900/image.png" },
                { title:"Angular",level:"75",img:"/images/resume_themes/theme900/image 1.png" },
                { title:"Meteor JS",level:"50",img:"/images/resume_themes/theme900/image 2.png" }
            ],
        text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad maxim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
     
      valid: true,
      name: '',
      nameRules: [
        v => !!v || 'Name is required',
        v => (v && v.length <= 10) || 'Name must be less than 10 characters',
      ],
      email: '',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
      ],
      select: null,
      checkbox: false,
      sended:false,
      show1: false,
        show2: true,
        show3: false,
        show4: false,
        password: 'Password',
        rules: {
          required: value => !!value || 'Required.',
          min: v => v.length >= 8 || 'Min 8 characters',
          emailMatch: () => ('The email and password you entered don\'t match'),
        },
    }
     },
    methods: {
      validate () {
        this.$refs.form.validate()
        return this.sended = true
      },
      reset () {
        this.$refs.form.reset()
      },
      resetValidation () {
        this.$refs.form.resetValidation()
      },
    },
    computed: {
      tabs_margin () {
        switch (this.$vuetify.breakpoint.name) {
          case 'xs': return 'mr-4'
          case 'sm': return 'mr-5'
          case 'md': return 'mr-10'
          case 'lg': return 'mr-10'
          case 'xl': return 'mr-10'
        }
      },
      iconsize () {
        switch (this.$vuetify.breakpoint.name) {
          case 'xs': return '20'
          case 'sm': return '14'
          case 'md': return '35'
          case 'lg': return '35'
          case 'xl': return '35'
        }
      },
      iconcolor () {
        switch (this.$vuetify.breakpoint.name) {
          case 'xs': return '#fff'
          case 'sm': return '#000'
          case 'md': return '#fff'
          case 'lg': return '#fff'
          case 'xl': return '#fff'
        }
      },
      color_payment () {
        switch (this.$vuetify.breakpoint.name) {
          case 'xs': return '#2E91DA'
          case 'sm': return '#AA5DF7'
          case 'md': return '#AA5DF7'
          case 'lg': return '#FF5252'
          case 'xl': return '#FF5252'
        }
      }
    }
}
</script>
<style lang="scss" >
@import url("https://fonts.googleapis.com/css?family=Open+Sans&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");

 #hold-theme900{
    max-width: 1920px;
    margin-left: auto;
    margin-right: auto;
.content-theme900{
    padding: 0px 40px 0px;
        @media only screen and (max-width: 1024px){
           padding: 0 20px 0; 
        }
        @media only screen and (max-width: 424px){
           padding: 0 10px 0; 
        }
}
         .tm900-img{
             box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.1);
             border-radius: 9px;
        }
        .v-tabs:not(.v-tabs--vertical):not(.v-tabs--right) > .v-slide-group--is-overflowing.v-tabs-bar--is-mobile:not(.v-tabs-bar--show-arrows):not(.v-slide-group--has-affixes) .v-slide-group__prev{
            display:none !important;
        }
     .tm900-payment{
         background: #fff;
         height: 100%;
         @media only screen and (max-width: 992px) {
             background: #F9F9F9;
             opacity: 0.95;
             max-width: 834px;
        }
    }
     .tm900-message{
         font-family: Poppins;
         font-style: normal;
         font-weight: 800;
         font-size: 40px;
         line-height: 60px;
         color: #000000;
         @media only screen and (max-width: 992px) {
             color: #AA5DF7;
        }
         @media only screen and (max-width: 597px) {
             font-weight: 800;
             font-size: 30px;
             line-height: 45px;
             color: #2E91DA;
        }
    }
     .tm900-dialog-left{
         background: #F9F9F9;
         height: 1080px;
         font-family: Poppins;
         font-style: normal;
         font-weight: 800;
         font-size: 40px;
         line-height: 60px;
         color: #000000;
         text-align: center;
         padding-top: 169px;
         @media only screen and (max-width: 992px) {
             display: none;
        }
    }
     .tm900-dialog-right{
         padding-top: 264px;
         @media only screen and (max-width: 597px) {
             padding-top: 164px;
        }
         .form-payment{
             margin-top: 89px;
             .payment-submit{
                 margin-top: 90px;
                 width: 280px;
                 height: 80px;
                 border-radius: 5px;
                 font-family: Poppins;
                 font-style: normal;
                 font-weight: bold;
                 font-size: 20px;
                 line-height: 30px;
                 color: #FFFFFF;
                 @media only screen and (max-width: 992px) {
                     width: 280px;
                     height: 60px;
                }
            }
             .forget-password{
                 float: right;
                 text-decoration: none;
                 font-family: Poppins;
                 font-style: normal;
                 font-weight: 600;
                 font-size: 16px;
                 line-height: 24px;
                 color: #2E91DA;
            }
             .v-text-field--outlined > .v-input__control > .v-input__slot {
                 background: transparent;
                 border: 1px solid #A8ABB7;
                 box-sizing: border-box;
                 border-radius: 5px;
            }
             .v-application--is-ltr .v-text-field .v-label {
                 transform-origin: top left;
                 font-family: Poppins;
                 font-style: normal;
                 font-weight: normal;
                 font-size: 16px;
                 line-height: 24px;
                 color: #A8ABB7;
            }
        }
         .button-close{
             position: absolute;
             top: 0;
             right: 0;
        }
         .tm900-tabs-payment{
             margin-left: 280px;
             @media only screen and (max-width: 992px) {
                 margin-left: 120px;
            }
             .v-slide-group__wrapper {
                 contain: none;
                 display: inline;
                 @media only screen and (max-width: 597px) {
                     display: grid;
                }
            }
             .tm900-tab-payment{
                 margin-right: 173px;
                 padding: 0 0px;
                 @media only screen and (max-width: 992px) {
                     margin-right: 173px;
                }
                 @media only screen and (max-width: 597px) {
                     margin-right: 10px;
                }
                 span{
                     font-family: Poppins;
                     font-style: normal;
                     font-weight: 600;
                     font-size: 30px;
                     line-height: 45px;
                     color: #000000;
                     text-transform: capitalize;
                     @media only screen and (max-width: 992px) {
                         font-size: 30px;
                    }
                     @media only screen and (max-width: 597px) {
                         font-size:10px;
                         line-height: 40px;
                    }
                }
            }
        }
    }
     .divider-tm900{
         @media only screen and (max-width: 992px) {
             display: none;
        }
    }
     .header-section-tm900{
         text-transform: capitalize;
         color: #111111;
         margin-top: 27px;
         padding: 0px 40px 0px;
        @media only screen and (max-width: 1024px){
           padding: 0 20px 0; 
        }
        @media only screen and (max-width: 424px){
           padding: 0 10px 0; 
        }
         @media only screen and (max-width: 992px) {
             background: #F9F9F9;
             height: 250px;
             margin-top: -10px;
        }
         @media only screen and (max-width: 597px) {
             background: #F9F9F9;
            height: 150px;
        }
         .tm900-avatar{
        max-width: 10.666667%;
        @media only screen and (max-width: 992px) {
                 max-width: 16.6666666667%;
                 }
            
        @media only screen and (max-width: 597px) {
                max-width: 25%;
        }
         .tm900-avatar-image{
         border-radius: 50%;
            width: 100%;
            height: 100%;
            max-width: 150px;
            max-height: 150px;
             @media only screen and (max-width: 992px) {
                 width: 100%;
                 height: 100%;
            }
            @media only screen and (max-width: 597px) {
             margin-top: -30px;
            }
         }
        }
         .profile{
            // padding-left: 40px;
             font-family: Open Sans;
             font-style: normal;
             font-weight: bold;
             @media only screen and (max-width: 1600px) {
                 padding-left: 60px;
             }
             @media only screen and (max-width: 992px) {
                 padding-left: 0px;
                    padding-top: 60px;
            }
             @media only screen and (max-width: 597px) {
                padding-left: 0px;
                 padding-top: 0px;
            }
             .name{
                 font-size: 40px;
                 @media only screen and (max-width: 597px) {
                     font-family: Open Sans;
                     font-style: normal;
                     font-weight: bold;
                     font-size: 20px;
                }
            }
             .job{
                 font-size: 20px;
                 @media only screen and (max-width: 992px) {
                     font-size: 20px;
                }
                 @media only screen and (max-width: 597px) {
                     font-weight: normal;
                     font-size: 16px;
                }
            }
             .description{
                 @media only screen and (max-width: 992px) {
                     font-weight: normal;
                     font-size: 18px;
                     width: 175%;
                }
                 @media only screen and (max-width: 597px) {
                     display: none;
                }
            }
        }
         .information{
             //margin-left: 235px;
             text-align: center;
             float: right;
             @media only screen and (max-width: 992px) {
                 margin-left: 0px;
                 position: absolute;
                 left: 15.5%;
                 top: 200px;

            }
             @media only screen and (max-width: 597px) {
                 left: 0px;
                 top: 100px;
                 max-width: 90%;
            }
             .info-title{
                 font-family: Open Sans;
                 font-style: normal;
                 font-weight: normal;
                 font-size: 15px;
                 line-height: 20px;
                 opacity: 0.5;
                 @media only screen and (max-width: 992px) {
                     display: flex;
                     float: left;
                     line-height: 0px;
                     margin-right: 15px;
                }
                 @media only screen and (max-width: 597px) {
                     font-size: 16px;
                     margin-right: 16px;
                }
            }
             .info-subtitle{
                 font-family: Open Sans;
                 font-style: normal;
                 font-weight: 600;
                 font-size: 40px;
                 line-height: 54px;
                 align-items: center;
                 text-align: center;
                 @media only screen and (max-width: 992px) {
                     font-size: 30px;
                     line-height: 45px;
                     display: flex;
                     line-height: 0px;
                }
                 @media only screen and (max-width: 597px) {
                     font-size: 16px;
                }
            }
        }
         .contact-button{
             font-family: Poppins;
             font-style: normal;
             font-weight: normal;
             font-size: 16px;
             line-height: 24px;
             float: right;
             .contact-button-items{
                 //margin-left: 48px;
                 @media only screen and (max-width: 597px) {
                 margin-left: 0px;
                 padding-top: 30px;
                 }
             }
             @media only screen and (max-width: 992px) {
                 margin-top: -60px;
                 margin-left: 0px;
                 .tm900-sc{
                     display: none;
                }
                 .theme--light.v-btn:not(.v-btn--flat):not(.v-btn--text):not(.v-btn--outlined) {
                     background-color: #fff;
                }
            }
             @media only screen and (max-width: 597px) {
                 margin-top: -62px;
                 margin-left: -24px;

            }
             .get-touch{
                 width: 180px;
                 height: 50px;
                 background: #F9F9F9;
                 border-radius: 9px;
                 text-transform: capitalize;
                 @media only screen and (max-width: 992px) {
                     width: 125px;
                     height: 40px;
                     border: 1px solid #000000;
                     box-sizing: border-box;
                     border-radius: 5px;
                }
            }
        }
    }
     .tm900-tabs{
         .v-tab{
             @media only screen and (max-width: 597px) {
                 min-width: 46.5px;
            }
        }
         .v-tabs-bar {
             height: 60px;
             @media only screen and (max-width: 992px) {
                 height: 40px;
            }
             @media only screen and (max-width: 597px) {
                 height: 46.5px;
            }
        }
         .tm900-tab{
             border-radius: 9px;
            margin-right:auto;
            max-width: 250px;
            margin-left:auto;
             color: #fff;

             @media only screen and (max-width: 1800px) {
                 width: auto;
                 margin-right: 45px;
             }
             @media only screen and (max-width: 1500px) {
                 margin-right:15px;
            margin-left:15px;
             }
             @media only screen and (max-width: 992px) {
                margin-right:15px;
                 width: auto;
                 margin-left:0px;
            }
             @media only screen and (max-width: 597px) {
                margin-right:18.6px;
            }
        }
         .tm900-tab-icon{
             .v-icon .v-icon{
                 font-size: 25px;
                 color:#fff;
                 @media only screen and (max-width: 1800px) {
                     font-size: 16px;
                }
                @media only screen and (max-width: 1500px) {
                 font-size: 10px;
             }
                 @media only screen and (max-width: 992px) {
                     font-size: 16px;
                     color: #000;
                     margin-right: 10px;
                }
                 @media only screen and (max-width: 768px) {
                     font-size: 80px;
                     margin-right: 8px;
                }
                 @media only screen and (max-width: 597px) {
                     font-size: 22px;
                     margin-right: 0px;
                     color:#fff;
                }
            }
        }
         .tm900-tab-title{
             text-transform: capitalize;
             font-family: Poppins;
             font-style: normal;
             font-weight: 500;
             font-size: 20px;
             line-height: 30px;
             color: #FFFFFF;
             @media only screen and (max-width: 1800px) {
                     font-size: 16px;
                }
                @media only screen and (max-width: 1500px) {
                 font-size: 14px;
             }
             @media only screen and (max-width: 992px) {
                 font-weight: normal;
                 font-size: 16px;
                 line-height: 24px;
                 color: #000000;
            }
             @media only screen and (max-width: 768px) {
                 font-size: 13px;
            }
             @media only screen and (max-width: 597px) {
                 display: none;
            }
        }
    }
     .tm900-title{
         text-transform: capitalize;
         font-family: Poppins;
         font-style: normal;
         font-weight: normal;
         font-size: 36px;
         line-height: 54px;
         color: #111111;
         @media only screen and (max-width: 597px) {
             font-weight: 600;
             font-size: 16px;
             line-height: 24px;
             color: #1D1D1D;
        }
    }
     .tm900-box-pic{
         border-radius: 9px;
         display: flex;
         justify-content: center;
         align-items: center;
         width: 200px;
         height: 200px;
         max-height: 100%;
         font-size: 0;
         margin: 0px 0px 0 0px;
         @media only screen and (max-width: 597px) {
             width: 100px;
             height: 100px;
        }
    }
     p{
         color: #000000;
         font-family: Roboto;
         line-height: 23px;
         font-style: normal;
    }
     .tm900-box-content{
         box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.1);
         border-radius: 9px;
         background: #F9F9F9;
         @media only screen and (max-width: 992px) {
             background: #FFF;
        }
         .tm900-box-text{
             font-family: Roboto;
             font-style: normal;
             font-weight: normal;
             font-size: 20px;
             color: #000000;
             @media only screen and (max-width: 597px) {
                 font-size:12px;
                 line-height: 14px;
            }
        }
    }
     .tm900-skills-tabs{
         .v-tab--active {
             @media only screen and (max-width: 597px) {
                 border: 1px solid #000000;
                 height: 30px;
            }
        }
         .v-tabs-bar {
             @media only screen and (max-width: 597px) {
                 height: 30px;
            }
        }
         .v-slide-group__wrapper {
             contain: none;
             display: inline;
             @media only screen and (max-width: 597px) {
                 display: grid;
            }
        }
         .v-tabs-slider{
             height: 10px;
             border-radius: 50px;
             @media only screen and (max-width: 992px) {
                 height: 5px;
            }
             @media only screen and (max-width: 597px) {
                 opacity: 0;
            }
        }
         .tm900-skills-tab{
             margin-right: 96px;
             padding: 0 0px;
             @media only screen and (max-width: 992px) {
                 margin-right: 26px;
            }
             @media only screen and (max-width: 597px) {
                 margin-right: 10px;
            }
             span{
                 white-space: nowrap;
                 height: 39px;
                 font-family: Poppins;
                 font-style: normal;
                 font-weight: normal;
                 font-size: 26px;
                 line-height: 39px;
                 color: #111111;
                 text-transform: capitalize;
                 @media only screen and (max-width: 992px) {
                     font-size: 12px;
                     color: #000000;
                }
                 @media only screen and (max-width: 597px) {
                     font-size:10px;
                     line-height: 40px;
                }
            }
        }
    }
     .tm900-framework{
         box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.1);
         border-radius: 9px;
         p{
             font-family: Roboto;
             font-style: normal;
             font-weight: bold;
             font-size: 20px;
             line-height: 23px;
             color: #000000;
             @media only screen and (max-width: 597px) {
                 font-size:18px;
            }
        }
    }
     .tm900-tab-portfolio2{
         .tm900-tab-portfolio2-first-col{
             padding: 0;
             .tm900-tab-portfolio2-img{
                 margin-top: 40px;
                 height: 660px;
                 widows: 660px;
                 box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.1);
                 border-radius: 9px;
                 @media only screen and (max-width: 992px) {
                     height: 369px;
                     widows: 369px;
                }
            }
        }
         .tm900-tab-portfolio2-second-col{
             margin-left: 100px;
             @media only screen and (max-width: 992px) {
                 margin-left: 0px;
            }
             .tm900-tab-portfolio2-title{
                 font-family: Roboto;
                 font-style: normal;
                 font-weight: bold;
                 font-size: 30px;
                 color: #000000;
                 @media only screen and (max-width: 992px) {
                     font-size: 24px;
                }
            }
             .tm900-tab-portfolio2-text{
                 margin-top: 30px;
                 font-family: Roboto;
                 font-style: normal;
                 font-weight: normal;
                 font-size: 24px;
                 line-height: 28px;
                 color: #000000;
                 @media only screen and (max-width: 992px) {
                     font-size: 18px;
                }
            }
             .tm900-tab-seemore-section{
                 margin-top: 175px;
                 @media only screen and (max-width: 992px) {
                     margin-top: 239px;
                     margin-left: -420px;
                }
                 @media only screen and (max-width: 768px) {
                     margin-top: 260px;
                     margin-left: -390px;
                }
                 @media only screen and (max-width: 597px) {
                     margin-top: 0px;
                     margin-left: 0px;
                }
                 .tm900-tab-seemore-section-title{
                     width: 560px;
                     height: 30px;
                     font-family: Roboto;
                     font-style: normal;
                     font-weight: bold;
                     font-size: 20px;
                     color: #000000;
                     @media only screen and (max-width: 992px) {
                         font-weight: normal;
                    }
                }
                 .tm900-tab-seemore-content{
                     margin-top: 30px;
                     .tm900-tab-seemore-content-img{
                         box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.1);
                         border-radius: 9px;
                         height: 130px;
                         width: 130px;
                         @media only screen and (max-width: 597px) {
                             height: 80px;
                             width: 80px;
                        }
                    }
                }
            }
        }
    }
}
</style>