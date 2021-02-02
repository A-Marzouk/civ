<template>
    <div class="homepage-video-wrapper">
        <div class="video-preview">
            <video id="introVideo" controls v-show="videoOn">
                <source src="/videos/civ_intro_video.mp4" type="video/mp4"/>
                Your browser does not support the video tag.
            </video>

            <div v-show="!videoOn" class="video-image-holder">
                <img src="/images/homepage/video_preview.png" class="video image holder"/>

                <a href="javascript:void(0)">
                    <img src="/images/homepage/video_play_btn.png" @click="playIntroVideo" />
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "homepageVideo",
        data(){
            return{
                videoOn: false
            }
        },
        methods:{
            playIntroVideo() {
                this.videoOn = true;
                document.getElementById("introVideo").play();
            },
        }
    }
</script>

<style lang="scss" scoped>
    .homepage-video-wrapper{
        .video-preview{
            video{

            }

            .video-image-holder{
                img{

                }
                a{
                    img{

                    }
                }
            }
        }
    }
</style>