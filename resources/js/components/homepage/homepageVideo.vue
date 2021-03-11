<template>
    <div class="homepage-video-wrapper">
        <div class="video-preview">
            <video id="introVideo" controls v-show="videoOn">
                <source src="/videos/homepage/homepage_promo_video.mp4" type="video/mp4"/>
                Your browser does not support the video tag.
            </video>

            <div v-show="!videoOn" class="video-image-holder">
                <img class="preview" src="/images/homepage/video_preview.png"/>
                <img class="play-btn" src="/images/homepage/video_play_btn.png" @click="playIntroVideo" />
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
                width: 100%;
            }

            .video-image-holder{
                position: relative;
                display: flex;
                justify-content: center;
                filter: drop-shadow(0px 4.69805px 46.9805px rgba(0, 28, 226, 0.12));
                border: 8px solid #FFFFFF;
                border-radius: 23.4902px;

                img.preview{
                    border-radius: 20px;
                    max-height: 900px;
                    width: 100%;
                }

                img.play-btn{
                    position: absolute;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin: auto;
                    left: 0;
                    right: 0;
                    top: 0;
                    bottom: 0;
                    opacity: 1;

                    // mobile
                    @media screen and (max-width: 599px) {
                        width: 57px;
                    }
                    // tablet:
                    @media screen and (max-width: 1439px) and (min-width: 600px) {
                        width: 98px;
                    }

                    // laptop:
                    @media screen and (max-width: 1700px) and (min-width: 1440px) {


                    }
                    &:hover{
                        cursor: pointer;
                    }
                }
            }
        }
    }
</style>