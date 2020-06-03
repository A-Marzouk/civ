<template>
   <div>
       <div class="d-flex">
           <div @click="() => false" class="aside-bar d-flex flex-column mr-5">
               <div @click="setActive($event,section.name)" v-for="(section) in asideSections" :key="section.name" class="aside-link d-flex align-items-center" :class="{ active: activeTab === section.name }">
                   <img :src="activeTab === section.name ? '/images/new_resume_builder/icons/tabs_icons/' + section.name + '.png' : '/images/new_resume_builder/icons/tabs_icons/' + section.name + '-1.png'" class="icon" alt="">
                   <router-link :to="`/resume-builder/edit/${section.name}`">
                    {{formatSectionString(section.name)}}
                </router-link>
               </div>
               <div id="scrollItem"></div>
           </div>
           <transition  name="fade" mode="out-in">
               <router-view></router-view>
           </transition>
       </div>
   </div>
</template>

<script>

    export default {
        name: "EditCV",
        data: () => ({
            asideSections: [
                {
                    name: 'profile',
                    icon: null
                },
                {
                    name: 'links',
                    icon: null
                },
                {
                    name: 'work-experience',
                    icon: null
                },
                {
                    name: 'education',
                    icon: null
                },
                {
                    name: 'skills',
                    icon: null
                },
                {
                    name: 'portfolios',
                    icon: null
                },
                {
                    name: 'achievements',
                    icon: null
                },
                {
                    name: 'hobbies',
                    icon: null
                },
                {
                    name: 'audio-video',
                    icon: null
                },
                {
                    name: 'imports',
                    icon: null
                },
                {
                    name: 'references',
                    icon: null
                },
                {
                    name: 'pay-availability',
                    icon: null
                }
            ],
            activeTab:'profile'
        }),
        methods: {
            formatSectionString: (str) => {
                /**
                 * Convert the url in a friendly text
                 * @param String str
                 * @returns String formated
                 */

                let strArray = str.split('-');

                let formatedString = "";

                strArray.forEach((strItem, idx) => {
                    formatedString += strItem.charAt(0).toUpperCase() + strItem.slice(1)
                    if (idx < strArray.length - 1) formatedString += " "
                });

                return formatedString;
            },
            setActive (e,section_name) {
                console.log('here');
                this.activeTab = section_name ;
                let activeNow = document.querySelector('.aside-link.active');
                activeNow && activeNow.classList.toggle('active');
                e.target.parentNode.classList.toggle('active');
                this.scrollHandler(e.target.parentNode);

                $([document.documentElement, document.body]).animate({
                    scrollTop: 0
                }, 600);

            },
            scrollHandler (target) {
                let scrollItem = document.getElementById('scrollItem');
                // let scrollItemHeight = scrollItem.style.height !== "" ? parseFloat(scrollItem.style.height.replace('px', '')) : 0;
                let scrollItemPos = scrollItem.style.top !== "" ? parseFloat(scrollItem.style.top.replace('px', '')) : 0;

                // diff between actual size and the target size
                // let heightDiff = target.offsetHeight - scrollItemHeight;

                // diff between actual pos and target pos
                let posDiff = target.offsetTop - scrollItemPos;

                // To position and height gradually during 0.5 secs
                let moveInterval = posDiff / 15;
                // let growInterval = heightDiff / 15;

                let count = 1

                let interval = setInterval(() => {

                    scrollItemPos += moveInterval
                    // scrollItemHeight += growInterval

                    scrollItem.style.top = scrollItemPos + "px";
                    // scrollItem.style.height = scrollItemHeight + "px";
                }, 20);

                setTimeout(() => {
                    if (scrollItem.style.top !== target.offsetTop) {
                        scrollItem.style.top = target.offsetTop + "px"
                    }
                    clearInterval(interval)
                }, 301);

            }
        },
        mounted () {
            let _this = this;
            setTimeout(() => {
                _this.scrollHandler(document.querySelector('.aside-link.active'))
            }, 100);

            this.activeTab = window.location.pathname.split('/')[3] ;
        }
    }
</script>

<style lang="scss" scoped>
$activeColor: #001CE2;
$disabledColor: #9f9e9e;

@import '../../../../sass/media-queries';

.aside-bar {
    min-width: 290px;
    position: relative;
    max-height: calc(61px * 12);
    // Check it
    overflow-y: auto;

    @include lt-lg {
        display: none !important;
    }

    &::after {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        height: 100%;
        width: 6px;
        background-color: #E2E5FC;
    }

    #scrollItem {
        position: absolute;
        top: 0;
        right: 0;
        width: 6px;
        height: 61px;
        z-index: 5;
        background-color: $activeColor;
    }
}
.aside-link {
    font-size: 22px;
    padding-right: 32px;

    .icon{
        width:45px;
        height:45px;
        margin-right:20px;
    }

    .aside-icon {
            path {
                fill: none;
                stroke: $disabledColor;
                transition: all .5s ease;
            }

            circle {
                fill: none;
                stroke: $disabledColor;
                transition: all .5s ease;
            }
        }

    &.active {
        a {
            color: $activeColor;
            transition: all 1s ease;
        }

        .aside-icon {
            path {
                fill: $activeColor;
                stroke: #fff;
                transition: all .5s ease;
            }

            circle {
                fill: $activeColor;
                stroke: #fff;
                transition: all .5s ease;
            }
        }
    }

    a {
        padding: 13px 0;
        color: $disabledColor;
        transition: all 1s ease;
        display: block;
        width: 100%;
        height: 100%;

        &:active,
        &:hover {
            text-decoration: none;
            cursor: pointer;
        }
    }
}
.aside-icon {
    margin-right: 22px;
    width: 40px;
}


.fade-enter-active {
    transition: all .6s ease;
}

.fade-leave-active {
    transition: all .6s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}

.fade-enter, .fade-leave-to
    /* .fade-leave-active below version 2.1.8 */
{
    opacity: 0;
}
</style>
