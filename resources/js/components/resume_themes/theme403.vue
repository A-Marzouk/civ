<template>
<v-app style="width: 100%">
  <!-- Header -->

  <div class="header-cont d-flex align-center mb-6">

      <div class="d-flex header-left">
        
        <div class="ct-block-1 d-flex justify-end align-end">
          <div class="ct-block-2 hidden-sm-and-down">
              <div class="ct-block-3">
                <img src="/images/resume_themes/theme403/earth.png" alt="world" class="world-img" >
                
                <div class="image-cont">
                  <img src="/images/resume_themes/theme403/profileimg.png" alt="profilepic" class="profile-img">
                </div>

                <v-avatar class="msg-icon" height="200" width="200">
                   <img src="/images/resume_themes/theme403/msg.png" alt="msgpic" id="msg-icon-img">
                </v-avatar>
              </div>
          </div>
        </div>       

      </div>

      <div class="d-flex header-left-2">

        <div class="ct-block-1-2 d-flex justify-end align-end">
          <div class="ct-block-2-2 hidden-md-and-up">
             <div class="ct-block-3-2">
              
                <img src="/images/resume_themes/theme403/earth.png" alt="world" class="world-img-2" >

                <v-avatar class="image-cont-2" height="80" width="80">
                  <img src="/images/resume_themes/theme403/profileimg.png" alt="profilepic" id="profile-img-2">
                </v-avatar>

                <div class="msg-icon-2" height="20" width="20">
                   <img src="/images/resume_themes/theme403/msg.png" alt="msgpic" id="msg-icon-img-2">
                </div>

             </div>
          </div>
        </div>       
        
      </div>

   <!-- Header text info -->
      <div class="ct-primary ct-nav-menu d-flex">
        <div class="make-space hidden-sm-and-down"></div>
        <div class="make-small-space hidden-md-and-up"></div>
        
        <div class="pt-4 child-hr-comp pl-12 pr-8">
      
          <div class="d-flex justify-space-between">
              <div class="d-flex justify-space-between" style="width: 100%">
                <div>
                  <div class="subtitle-1 font-weight-bold white--text mb-1 ml-md-4">Tanbir Ahemd</div>
                  <div class="caption mb-3 white--text ml-md-2">User Interface Designer</div>
                </div>
  
                <div class="d-flex justify-start">             
                  <v-avatar size="30" color="#6884F3" class="hidden-md-and-up">
                    <img src="/images/resume_themes/theme403/audio.png" alt="audio" class="ct-icon" >                  
                  </v-avatar>

                  <v-avatar size="30" color="#6884F3" class="ml-2 hidden-md-and-up">
                    <img src="/images/resume_themes/theme403/video.png" alt="video" class="ct-icon" >
                  </v-avatar>
                </div>
                
              </div>

              

              <div class="d-flex justify-end align-center hidden-sm-and-down ct-tran-hr-text">
                <v-avatar size="32" color="#6884F3" class='hidden-sm-and-down'>
                  <img src="/images/resume_themes/theme403/audio.png" alt="audio" class="ct-icon" >
                </v-avatar>
                <v-avatar size="32" color="#6884F3" class="ml-6 hidden-sm-and-down">
                  <img src="/images/resume_themes/theme403/video.png" alt="video" class="ct-icon" >
                </v-avatar>

                <div class="text-center ml-6 hidden-sm-and-down">
                  <div class="font-weight-bold white--text">$15</div>
                  <div class="white--text body-2" style="width: 5rem">Hourly rate</div>
                </div>

                <div class="text-center ml-6 hidden-sm-and-down">
                  <div class="font-weight-bold white--text">10 hours</div>
                  <div class="white--text body-2" style="width: 8rem">Weekly Availability</div>
                </div>

                <v-btn 
                  color="#6884F3" 
                  depressed 
                  rounded 
                  class="text-capitalize white--text hidden-sm-and-down ml-6">
                    Hire me
                </v-btn>
                <div class="mx-6 hidden-sm-and-down"></div>
              </div> 
            </div>

            <div class="d-flex">
              <v-avatar size="30" color="#6884F3" class="mr-2 hidden-sm-and-down">
                <v-icon dark size="20" color="white">mdi-twitter</v-icon>
              </v-avatar>
              
              <v-avatar size="30" color="#6884F3" class="mr-2 hidden-sm-and-down">
                <v-icon dark size="20" color="white">mdi-instagram</v-icon>
              </v-avatar>

              <v-avatar size="30" color="#6884F3" class="hidden-sm-and-down">
                <v-icon dark size="20" color="white">mdi-linkedin</v-icon>
              </v-avatar>
            </div>

            <div class="d-flex align-center justify-space-between">
              <div class="d-flex">
                <div class="text-center mr-5 hidden-md-and-up">
                  <div class="font-weight-bold body-2 white--text">$15</div>
                  <div class="white--text caption">Hourly</div>
                </div>

                <div class="text-center hidden-md-and-up">
                  <div class="font-weight-bold body-2 white--text">10 hours</div>
                  <div class="white--text caption">Weekly</div>
                </div>
              </div>

             
              <v-btn 
                color="#6884F3" 
                depressed 
                small
                rounded 
                class="text-capitalize white--text hidden-md-and-up ml-5">
                  Hire me
              </v-btn>
            </div>            
        </div>

      </div>
    <!-- Header text info end-->
  </div>

  <!-- Header end -->

  <!-- Tabs start -->

  <!-- Mobile tab -->
    <v-layout class="make-scroll hidden-md-and-up mt-12">
      <v-flex 
        v-for="tab in tabs"
        :key="tab.id"
        @click="currentTab = tab.id"
        :class="[
          currentTab == tab.id ? 'active-tab--403' : '', 'ct-tab-small mr-2 caption',
          tab.id == 1 ? 'round-left ml-2' : '',
          tab.id == 4 ? 'round-right' : '',
        ]"
      >
        <v-avatar tile height="14" width="auto">
          <img :src="getImgUrlIcon(currentTab == tab.id ? tab.image + '1': tab.image)" class="mr-2">
        </v-avatar>
        {{tab.title }}</v-flex>
    </v-layout>
  <!-- Mobile tab end-->

  <!-- Desktop tab start -->
  <v-container class="mt-12 hidden-sm-and-down">
    <v-tabs
      grow
      center-active
      rounded
      hide-slider
    >
      <v-tab
        v-for="tab in tabs"
        :key="tab.id"
        @click="currentTab = tab.id"
        class="text-capitalize"
        id="ct-tab-title"
        :class="[
          currentTab == tab.id ? 'active-tab--403' : '', 'ct-tab',
          tab.id == 1 ? 'round-left' : '',
          tab.id == 4 ? 'round-right' : '',
          tab.id != 4 ? 'mr-xs-2 mr-md-12' : ''
        ]"
      >
        <v-avatar tile :height="tab.height" :width="tab.width">
          <img :src="getImgUrlIcon(currentTab == tab.id ? tab.image + '1': tab.image)" class="mr-4">
        </v-avatar>
        {{ tab.title }}
      </v-tab>
    </v-tabs>
  </v-container>
  <!-- Desktop tab start -->
  <!-- Tabs end -->

  <!-- Tab content 1 Portfolio start -->
  <v-container>
    <div class="content mt-8">
      <div v-if="currentTab == 1" class="ct-primary--text">
          <v-tabs
            centered
            color="#4E6EF1"
            class="ct-sec-tab"
          >
            <v-tab class="text-capitalize">All</v-tab>
            <v-tab class="text-capitalize">Web Design</v-tab>
            <v-tab class="text-capitalize">Resume</v-tab>
            <v-tab class="text-capitalize">UX Design</v-tab>
            <v-tab class="text-capitalize">Animation</v-tab>
          </v-tabs>

          <v-row class="mt-10">
            <v-col
              v-for="n in 6"
              :key="n"
              cols="12"
              sm="6"
              md="4"
            >
               <v-img :src="getImgUrl(n)" 
                  max-height="300" max-width="340" 
                  min-height="270" min-width="270" 
                  aspect-ratio="1" class="ct-image mx-auto mb-8"></v-img>
            </v-col>
          </v-row>
      </div>

    <!-- Tab content 1 end -->

    <!-- Tab content 2 start -->

      <div v-if="currentTab == 2">     
        <div class="mb-6">
          <div class="subtitle-2">Work Experiance</div>
          <v-divider></v-divider>
        </div>

        <v-row no-gutters v-for="item in educations" :key="item.id">
          <v-col cols="2" class="ct-left-timeline">
           <div class="body-2 hidden-sm-and-down">{{ item.duration }}</div>
           <div class="caption hidden-md-and-up"> {{ item.duration }}</div>
          </v-col>

          <v-col cols="3" sm="1" :class="[item.id == 3 ? 'middle-line-2' : 'middle-line']"></v-col>

          <v-col cols="3" sm="1" id="dot-cont">
            <div class="ct-dot mb-5"></div>
            <div class="ct-dot"></div>
          </v-col>
 
          <v-col cols="8" class="ml-md-6 ml-sm-1 ml-xs-1" >
           <div class="right-panel">
              <div class="title pt-0">Staff Asia Sylhet</div>
              <div class="ct-caption">Web Designer</div>
              <p class="caption pt-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolor.</p>
            </div>
          </v-col>
        </v-row>
      </div>

    <!-- Tab content 2 end -->

    <!-- Tab content 3 start -->

      <div v-if="currentTab == 3">
        <div class="mb-6">
          <div class="subtitle-2">Educational Qualifications</div>
          <v-divider></v-divider>
        </div>

        <v-row no-gutters v-for="item in educations" :key="item.id">
          <v-col cols="2" class="ct-left-timeline">
           <div class="body-2 hidden-sm-and-down">{{ item.duration }}</div>
           <div class="caption hidden-md-and-up"> {{ item.duration }}</div>
          </v-col>

          <v-col cols="3" sm="1" :class="[item.id == 3 ? 'middle-line-2' : 'middle-line']"></v-col>

          <v-col cols="3" sm="1" id="dot-cont" >
            <div class="ct-dot mb-5"></div>
            <div class="ct-dot"></div>
          </v-col>

          <v-col cols="8" class="ml-md-6 ml-sm-1 ml-xs-1" >
           <div class="right-panel">
              <div class="title pt-0">{{ item.institute }}</div>
              <div class="ct-caption">{{ item.degree }}</div>
              <p class="caption pt-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolor.</p>
            </div>
          </v-col>
        </v-row>
      </div>

    <!-- Tab content 3 end -->

    <!-- Tab content 4 start -->

      <div v-if="currentTab == 4">
        <div>
          <div class="subtitle-2">Design Skills</div>
          <v-divider></v-divider>
          <div class="d-flex justify-space-around mt-12">
            <div class="body-1 hidden-sm-and-down">100%</div>
            <div class="bar-cont d-flex align-end light-it" v-for="skill in skills" :key="skill.id">
              
              <div>
                <div :style="{ height: skill.value/5.8 + 'rem' }" id="progress-2010" class="ct-primary pt-2 text-center">{{ skill.value }}%</div>
                <div class="text-center caption white black--text pt-2">{{ skill.skill }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Tab content 4 end -->

  </v-container>
</v-app>
</template>

<script>
  export default {
    data () {
      return {
        currentTab: 1,
        tabs: [
          { title: 'Portfolio', id: 1, image: 'layer', height: 20, width: 20 }, 
          { title: 'Works', id: 2, image: 'portfolio', height: 20, width: 22 },
          { title: 'Education', id: 3, image: 'book', height: 20, width: 22 }, 
          { title: 'Design Skill', id: 4, image: 'idea', height: 20, width: 20 }
        ],
        skills: [
          { skill: "PS", value: 80, id: 1 },
          { skill: "Al", value: 35, id: 2 },
          { skill: "XD", value: 92, id: 3 },
          { skill: "UI", value: 55, id: 4 },
          { skill: "UX", value: 72, id: 5 }
        ],
        alignTop: true,
        avatar: false,
        dense: false,
        fillDot: true,
        hideDot: false,
        icon: true,
        iconColor: true,
        left: false,
        reverse: false,
        right: true,
        small: true,
        educations: [
          { 
            id: 1, 
            institute: 'Sylhet Ideal College',
            degree: 'Higher Secondary Certificate',
            duration: 'May 2017 - June 2018'
          },
          { 
            id: 2, 
            institute: 'Modanmohon College',
            degree: 'Bachelor Degree of Computer Science',
            duration: 'May 2017 - June 2018'
          },
          { 
            id: 3, 
            institute: 'Leading University',
            degree: 'Master Degree of CSC',
            duration: 'May 2017 - June 2018'
          }
        ],
      }
    },

    methods: {
        getImgUrl(id) {
           let image = '/images/resume_themes/theme403/portfolio/'
           return image + id + ".png"
        },
        getImgUrlIcon(icon) {
           let image = '/images/resume_themes/theme403/icons/tabs/'
           return image + icon + ".png"
        }
    }
  }
</script>

<style scoped>

/* Global style */
.ct-primary { background-color: #4E6EF1 }
.ct-primary--text { color: #4E6EF1 }
.light-it  { background-color:rgb(229, 229, 231) }
.light-it--text { color: rgb(233, 233, 236) }

/* Header styles */

.header-cont {
  background-color: #4E6EF1;
  height: 8rem;
  width: 100%;
  position: relative;
  z-index: 1;
}

.make-space {
  width: 18rem;
  height: 1px;
}

.make-small-space {
  width: 8.1rem;
  height: 4px;
}

.header-left {
  /* background-color: #375AE8; */
  position: absolute;
  height: 12.5rem;
  width: 18rem;
}

.child-hr-comp {
  width: 100%;
}

.ct-tran-hr-text {
  transform: translateY(1rem);
}

/* header-left small screen */

.header-left-2 {
  /* background-color: #375AE8; */
  position: absolute;
  height: 12.5rem;
  width: 8.5rem;
}

.world-img-2 {
  height: 4rem;
  width: 7rem;
  margin-top: 4rem;
}

.ct-rounded {
  /* border-radius: 10rem; */
  height: 10px;
  width: 10px;
}

/* header-left small screen end*/

.header-right--image {
  height: 9rem;
}

/* polygon shape */
.ct-block-1 {
  clip-path: polygon(100% 0, 100% 82%, 84% 100%, 0 100%, 0 0);
  height: 100%;
  width: 100%;
}

.ct-block-2 {
  height: 100%;
  width: 100%;
  /* background: #294DDF; */
  background: linear-gradient(to bottom, #375AE8 0%,#375AE8 50%,#375AE8 50%,#294DDF 50%,#294DDF 100%);
  clip-path: polygon(100% 0, 83.4% 82%, 100% 81.8%, 79.3% 100%, 0 100%, 0 0);
}

.ct-block-3 {
  height: 100%;
  width: 100%;
  background-color: #375AE8;
  clip-path: polygon(0 0, 100% 0%, 72% 100%, 0% 100%);
}

/* small screen  */
.ct-block-1-2 {
  clip-path: polygon(100% 0, 100% 82%, 84% 90%, 0 90.2%, 0 0);
  height: 100%;
  width: 100%;
}

.ct-block-2-2 {
  height: 100%;
  width: 100%;
  background: linear-gradient(to bottom, #375AE8 0%,#375AE8 50%,#375AE8 50%,#294DDF 50%,#294DDF 100%);;
  clip-path: polygon(100% 0, 83.1% 82%, 100% 81.8%, 60% 100%, 0 100%, 0 0);
}

.ct-block-3-2 {
  height: 100%;
  width: 100%;
  background-color: #375AE8;
  clip-path: polygon(0 0, 97% 0%, 68% 100%, 0% 100%);;
}


/* inside polygon */
.world-img {
  height: 8rem;
  width: 14rem;
  margin-top: 3rem;
}


/* image inside polygon */
.image-cont {
  transform: translateY(-7.8rem) translateX(7rem);
  height: 6.75rem;
  width: 6.75rem;
  border-radius: 7rem;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: white;
}

.profile-img {
  height: 6.3rem;
  width: 6.2rem;
  border-radius: 6.1rem;
}

/* small screen */
.image-cont-2 {
  transform: translateY(-4rem) translateX(1.3rem);
  height: 6.9rem;
  width: 6.9rem;
  border-radius: 7rem;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: white;
}

#profile-img-2 {
  height: 4.6rem;
  width: 4.6rem;
  border-radius: 6.1rem;
}

.msg-icon {
  transform: translateY(-15.2rem) translateX(6.5rem);
}

#msg-icon-img {
  height: 2.2rem;
  width: 2.2rem;
}

.msg-icon-2 {
  transform: translateY(-5.6rem) translateX(4.5rem);
}

#msg-icon-img-2 {
  height: 1.9rem;
  width: 1.9rem;
}





/* polygon shape end */

.ct-icon {
  height: 2rem;
  width: 2rem;
}
/* content */
.ct-nav-menu {
  height: 100%;
  width: 100%;
}

/* Header styles end*/

/* Tab styles */

.ct-tab {
  background-color: rgb(233, 233, 233);
  color: rgb(87, 86, 86);
  transition: 0.2s;
}

.ct-tab-small {
  background-color: rgb(226, 226, 226);
  color: rgb(87, 86, 86);
  height: 2rem;
  min-width: 160px;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  transition: 0.2s;
}

.make-scroll {
  overflow-y: scroll;
  scrollbar-width: none;  /* Firefox */
}

::-webkit-scrollbar {
  display: none;
}


#ct-tab-title {
  font-size: 1.2rem;
  font-weight: 400;
}

.active-tab--403 {
  background-color: #4E6EF1;
  color: white !important;
}

.ct-mobile-style {
  transform: translateX(-2rem);
}


/* Corners */
.round-left {
  border-top-left-radius: 4rem;
  border-bottom-left-radius: 4rem;
}

.round-right {
  border-top-right-radius: 4rem;
   border-bottom-right-radius: 4rem;
}

/* Tab styles end*/

/* Contents style */

/* Content 1 style */

.ct-sec-tab {
  border-bottom: solid 1px rgb(184, 184, 184);

}

.ct-image {
  border-top-right-radius: 2rem;
  border-bottom-left-radius: 2rem;
}

/* Content 2 style */

.ct-left-timeline {
  /* transform: translateX(0px) !important; */
  min-width: 5.8rem; 
  margin-right: 0.2rem;
}

.middle-line {
  max-width: 2px !important;
  background-color: #4E6EF1;
  position: relative;
}

.middle-line-2 {
  height: 2rem;
  max-width: 2px !important;
  background-color: #4E6EF1;
  position: relative;
}


.ct-dot {
  height: 0.6rem;
  width: 0.6rem;
  border-radius: 1rem;
  background-color: #4E6EF1;
}

#dot-cont {
  max-width: 0.8rem;
  transform: translateX(-0.35rem);
}

.ct-caption {
  font-size: 0.8rem;
  color: grey;
  font-weight: 300;
}

.right-panel {
  max-width: 30rem;
  transform: translateY(-8px)
}

/* Design skill style */
.bar-cont {
  height: 20rem;
  width: 8rem !important;
}

#progress-2010 {
  width: 8rem !important;
  font-size: 0.8rem;
  color: white;
}

@media only screen and (max-width: 945px) {
  .bar-cont {
  height: 20rem;
  width: 6rem !important;
}

#progress-2010 {
  width: 6rem !important;
  font-size: 0.8rem;
  color: white;
}
}

@media only screen and (max-width: 520px) {
  .bar-cont {
  height: 20rem;
  width: 2rem !important;
}

#progress-2010 {
  width: 2rem !important;
  font-size: 0.8rem;
  color: white;
}
}

</style>
