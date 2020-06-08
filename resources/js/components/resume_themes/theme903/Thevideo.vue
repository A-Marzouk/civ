<template>
<div class="video-tm903">
    <div ref="videoPoster">
        <v-img class="img-video-tm903" :src="img" alt="">
            <v-btn class="b-play-tm903" large color="#0D001A" @click.prevent="playVideo()"  fab >
                <v-icon large color="#FFD43B" > mdi-play </v-icon>
            </v-btn>
        </v-img>                        
    </div>
    <div ref="videotm903" class="videotm903" >
        <v-icon @click.prevent="stopVideo()" right >mdi-close</v-icon>
    <video width="100%"  ref="videoElem" controls :src="link"></video>
    </div>
</div>
</template>

<script>
export default {
    props: {
            link: {
                type: String,
                default: null
            },
            img: {
                type: String,
                default: null
            }
        },
  methods: {
      playVideo() {
            this.$refs.videotm903.style.display = "block"
            this.$refs.videoPoster.style.display = "none";
            this.$refs.videoElem.play();
        },
        stopVideo(){
            this.$refs.videotm903.style.display = "none"
            this.$refs.videoPoster.style.display = "block";
            this.$refs.videoElem.pause();
        }
    }
}
</script>

<style lang="scss" >
.video-tm903{
.img-video-tm903{
box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.15);
border-radius: 10px;}
    .b-play-tm903{
        left: 40%; top:40%;
        @media only screen and (max-width: 597px) {
            left: 40%; top:40%
        }
    }
.videotm903{
    display: none;
}
    }
</style>