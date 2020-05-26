<template>
<div class="video-tm901">
    <div ref="videoPoster">
        <v-img 
        src="/images/resume_themes/theme901/viceo_image.png"
        :lazy-src="`/images/resume_themes/theme901/viceo_image.png`"
        aspect-ratio="1" alt="">
            <v-btn class="b-play-tm901" large color="#5B5D60" @click.prevent="playVideo()" outlined fab >
                <v-icon large color="#5B5D60" > mdi-play </v-icon>
            </v-btn>
        </v-img>                        
    </div>
    <div ref="videotm901" class="videotm901" >
        <v-icon @click.prevent="stopVideo()" right >mdi-close</v-icon>
    <video width="100%"  ref="videoElem" controls src="/images/resume_themes/theme901/video.mp4"></video>
    </div>
</div>
</template>

<script>
export default {
  methods: {
      playVideo() {
            this.$refs.videotm901.style.display = "block"
            this.$refs.videoPoster.style.display = "none";
            this.$refs.videoElem.play();
        },
        stopVideo(){
            this.$refs.videotm901.style.display = "none"
            this.$refs.videoPoster.style.display = "block";
            this.$refs.videoElem.pause();
        }
    }
}
</script>

<style lang="scss" >
.video-tm901{
    .b-play-tm901{
        left: 45%; top:45%;
        @media only screen and (max-width: 597px) {
            left: 40%; top:40%
        }
    }
.videotm901{
    display: none;
}
    }
</style>