<template>
    <div class="view-cv-wrapper">
        <div class="action-btns">
            <div class="change-structure-btn NoDecor">
                <a href="javascript:void(0)">
                    <img src="/images/resume_builder/viewCV/grid.png" alt="icon">
                    Change Structure
                </a>
            </div>
            <div class="change-theme-btn NoDecor">
                <a href="javascript:void(0)">
                    <img src="/images/resume_builder/viewCV/img-holder.png" alt="icon">
                    Change Theme
                </a>
            </div>
        </div>
        <div class="change-structure-text">
            <img src="/images/resume_builder/viewCV/img-holder.png" alt="icon">
            Change Theme
        </div>
        
        <div class="themes">
            <div class="theme-item" v-for="(theme,index) in availableThemes" :key="theme.code">
                <img @click="openTheme(theme)" class="theme-image" :src="`/images/resume_themes/theme${theme.code}/preview.png`" alt="theme-preview" :class="{ 'active' :  parseInt(user.theme_code) === theme.code}">

                <div class="theme-action-btns" v-if="parseInt(user.theme_code) === theme.code">
                    <a :href="'/' + user.username " target="_blank" class="active-btn">
                        Open
                        <img src="/images/resume_builder/viewCV/checkmark.png" alt="checkmark">
                    </a>
                </div>

                <div class="theme-action-btns-wrapper" v-else>
                    <div class="left">
                        <div class="activate-btn NoDecor">
                            <a href="javascript:void(0)" @click="activateTheme(theme.code)">
                                Activate
                                <img src="/images/resume_builder/viewCV/checkmark.png" alt="checkmark">
                            </a>
                        </div>
                    </div>
                    <div class="right">
                        <div class="my-data-btn NoDecor">
                            <a :href="'/preview/theme' + theme.code +'?real=true'" target="_blank">
                                My data
                                <img src="/images/resume_builder/viewCV/eye.png" alt="eye">
                            </a>
                        </div>
                        <div class="preview-btn NoDecor">
                            <a :href="'/preview/theme' + theme.code" target="_blank">
                                Preview
                                <img src="/images/resume_builder/viewCV/eye-white.png" alt="eye-white">
                            </a>
                        </div>


                    </div>
                </div>

            </div>
        </div>
        
    </div>
</template>

<script>
    export default {
        name: "ViewCV",
        data(){
            return{
                availableThemes:[
                    {
                        code:201
                    },
                    {
                        code:3
                    },
                    {
                        code:200
                    },
                    {
                        code:8
                    },
                    {
                        code:300
                    },
                ]
            }
        },
        computed:{
            user(){
                return this.$store.state.user;
            }
        },
        methods:{
            openTheme(theme){
                let url  = '/preview/theme'+theme.code ;
                window.open(url, "_blank") || window.location.replace(url);

            },
            activateTheme(theme_code){
                if(this.user.theme_code === theme_code){
                    return;
                }
                axios.put('/api/user/update-theme',{theme_code : theme_code})
                    .then((response) => {
                        console.log(response.data);
                        this.user.theme_code  = theme_code ;
                        this.$store.dispatch('flyingNotification');
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            console.log(error.response.data.errors);
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = 'Something went wrong. Please try again.';
                        }
                    });
            }
        }
    }
</script>

<style scoped lang="scss">
    .view-cv-wrapper{
        .action-btns{
            display: flex;
            justify-content: flex-end;

            .change-structure-btn{
                margin-right: 55px;

                a{

                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 221px;
                    height: 79px;
                    background: #001CE2;
                    border-radius: 50px;


                    font-family: "Noto Sans", serif;
                    font-weight: 500;
                    font-size: 16px;
                    text-align: left;
                    color: #ffffff;


                    img{
                        width: 25px;
                        height: 25px;
                        margin-right: 15px;
                    }
                }
            }
            .change-theme-btn{
                a{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 253px;
                    height: 79px;
                    border:2px solid #001CE2;
                    border-radius: 50px;

                    font-family: "Noto Sans", serif;
                    font-weight: 500;
                    font-size: 16px;
                    text-align: left;
                    color: #001ce2;

                    img{
                        width: 25px;
                        height: 25px;
                        margin-right: 15px;
                    }
                }
            }
        }
        .change-structure-text{
            margin-top:50px;
            display: flex;
            justify-content: flex-start;
            margin-left:140px;
            align-items: center;
            font-family: "Noto Sans",serif;
            font-weight: 500;
            font-size: 47px;
            text-align: left;
            color: #001ce2;

            img{
                width:90px;
                height:90px;
                margin-right: 55px;
            }
        }
        .themes{
            justify-content: space-around;
            display: flex;
            flex-wrap: wrap;
            .theme-item{
                margin-top:100px;
                display: flex;
                align-items: center;
                flex-direction: column;
                img.theme-image{
                    border: 1px solid black;
                    width:634px;
                    height:451px;
                    border-radius:25px;
                    transition: all 2s;
                    -webkit-box-shadow: 0px 35px 70px -20px rgba(25, 69, 213, 0.3);
                    -moz-box-shadow:  0px 35px 70px -20px rgba(25, 69, 213, 0.3);
                    box-shadow:   0px 35px 70px -20px rgba(25, 69, 213, 0.3);

                    &.active{
                        -webkit-box-shadow: 0px 35px 70px -20px rgba(7, 211, 38, 0.3);
                        -moz-box-shadow: 0px 35px 70px -20px rgba(7, 211, 38, 0.3);
                        box-shadow:  0px 35px 70px -20px rgba(7, 211, 38, 0.3);
                    }

                    &:hover{
                        cursor: pointer;
                    }
                }

                .theme-action-btns{
                    display: flex;
                    align-items: center;
                    justify-content: center;

                    a.active-btn{
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin-top: -23px;
                        height: 47.19px;
                        width: 113.67px;
                        font-weight: 500;
                        font-size: 21px;
                        text-align: left;
                        color: #fff;
                        background-color: #07D326;

                        img{
                            width:17.06px;
                            height:13.33px;
                            margin-left: 15px;
                        }
                    }


                    a{
                        width: auto;
                        padding-left: 15px;
                        padding-right: 15px;
                        height: 50px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        border-radius: 10px;
                        margin-right: 20px;
                        background: blue;
                        color: white;

                        &:hover{
                            text-decoration: none;
                        }
                    }
                }

                .theme-action-btns-wrapper{
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    padding-left:32px;
                    padding-right:23px;
                    background: whitesmoke;
                    border-radius: 10px;
                    width: 619px;
                    height: 70px;
                    margin-top: -35px;
                    background: linear-gradient(#f8f8f8 0%, #f4f4f4 100%);

                    .left{
                        .activate-btn{
                           a{
                               display: flex;
                               align-items: center;
                               justify-content: center;
                               width:156px;
                               height:42px;
                               border-radius: 21px;
                               background: #1945D5;
                               font-weight: 600;
                               font-size: 15px;
                               text-align: left;
                               color: #fff;

                               img{
                                   width:15.72px;
                                   height:12.28px;
                                   margin-left: 24.7px;
                               }
                           }
                        }
                    }

                    .right{
                        display: flex;
                        .my-data-btn{
                            margin-right: 19px;
                           a{
                               display: flex;
                               align-items: center;
                               justify-content: center;
                               width: 139px;
                               height: 42px;
                               font-weight: 600;
                               font-size: 15px;
                               letter-spacing: 0.01em;
                               text-align: left;
                               color: #1b4bd2;
                               background: white;
                               border-radius: 21px;
                               border: 1px solid #1945d5;
                               img{
                                   width:22.51px;
                                   height:14.35px;
                                   margin-left: 22.9px;
                               }
                           }
                        }

                        .preview-btn{
                          a{
                              display: flex;
                              align-items: center;
                              justify-content: center;
                              border-radius: 21px;
                              background: #1945D5;
                              font-weight: 600;
                              font-size: 15px;
                              text-align: left;
                              color: #fff;
                              width: 139px;
                              height: 42px;

                              img{
                                  width:22.51px;
                                  height:14.35px;
                                  margin-left: 19.9px;
                              }
                          }
                        }
                    }


                }

            }

            margin-bottom: 100px;
        }
    }
</style>
