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
                <img @click="openTheme(theme)" :src="`/images/resume_themes/theme${theme.code}/preview.png`" alt="theme-preview" :class="{ 'active' :  parseInt(user.theme_code) === theme.code}">

                <div class="theme-action-btns">
                    <a href="javascript:void(0)" class="active-btn" :class="{ 'active' : parseInt(user.theme_code) === theme.code}"  @click="activateTheme(theme.code)">
                        {{ parseInt(user.theme_code) === theme.code ? 'Current theme' : 'Make as default theme'}}
                    </a>
                    <!--<a :href="'/' + user.username" target="_blank" v-if="parseInt(user.theme_code) === theme.code">-->
                        <!--Open-->
                    <!--</a>-->
                    <!--<a :href="'/preview/theme' + theme.code" target="_blank" v-else>-->
                        <!--Preview-->
                    <!--</a>-->
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
                img{
                    width:642px;
                    height:451px;
                    border-radius:25px;
                    transition: all 2s;

                    &.active{
                        -webkit-box-shadow: 0px 59px 70px -20px rgba(7, 211, 38, 0.48);
                        -moz-box-shadow: 0px 59px 70px -20px rgba(7, 211, 38, 0.48);
                        box-shadow:  0px 59px 70px -20px rgba(7, 211, 38, 0.48);
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
                        background-color: #cccccc;
                        color: #666666;
                        margin-top: -25px;
                    }
                    a.active-btn.active{
                        background-color: #07D326;
                        color: white;
                        font-weight: 600;
                        &:hover{
                            cursor: default;
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
            }

            margin-bottom: 100px;
        }
    }
</style>
