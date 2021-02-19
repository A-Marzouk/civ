<template>
    <div class="media-component-wrapper">
        <div class="categories">
            <div class="single-category active" data-category="all" @click.prevent="changeCategory('all')">
                View All
            </div>
            <div class="single-category" data-category="video" @click.prevent="changeCategory('video')">
                Video
            </div>
            <div class="single-category" data-category="audio" @click.prevent="changeCategory('audio')">
                Audio
            </div>
        </div>
        <div class="media-wrapper" v-if="medias">
            <template v-for="media in medias">
                <div v-if="media.type === 'audio' " class="single-media audio">
                    <div class="single-media-header">
                        <div class="preview">
                            <img src="/images/themes/theme1001/media/audio-preview.png" alt="preview">
                        </div>
                        <div class="details">
                            <div class="title">
                                {{media.title}}
                            </div>
                            <div class="name">
                                {{getFormattedDate(media.created_at)}}
                            </div>
                            <div class="time">
                                {{time.mediaID === media.id ? time.current : ''}}
                            </div>
                        </div>
                        <div class="play-icon">
                            <img v-if="playingMedia.id !== media.id"  @click="playMedia(media)" src="/images/themes/theme1001/media/audio-play-btn.png" alt="play btn">
                            <img v-else  @click="pauseMedia(media)" src="/images/themes/theme1001/media/audio-pause-btn.png" alt="pause btn">
                        </div>
                    </div>
                    <div class="description">
                        {{media.transcript}}
                    </div>

                    <audio  @ended="mediaEnded"  @timeupdate="updateTime($event, media)" controls :id="'media_element' + media.id" preload="auto" class="mediaElement audio" style="display: none;">
                        <source :src="media.url"/>
                        <source :src="media.url" type="audio/webm">
                    </audio>

                </div>
                <div v-else class="single-media video">
                    <template v-if="playingMedia.id !== media.id" >
                        <img class="preview" :src="media.media_preview" alt="preview" >
                        <img class="play-icon" @click="playMedia(media)" src="/images/themes/theme1001/media/audio-play-btn.png" alt="play btn">
                    </template>

                    <video width="auto" height="auto" @ended="mediaEnded" @timeupdate="updateTime($event, media)" controls :id=" 'media_element' + media.id" v-show="playingMedia.id === media.id" class="mediaElement video">
                        <source
                                :src="media.url"
                                type="video/mp4"
                        />
                    </video>
                </div>
            </template>
        </div>

        <div class="media-player-footer">
            <div class="media-info">
                <div class="preview">
                    <img src="/images/themes/theme1001/media/audio-preview.png" alt="preview">
                </div>
                <div class="details">
                    <div class="title">
                        {{playingMedia.title ? playingMedia.title : 'Audio player'}}
                    </div>
                    <div class="name">
                        {{getFormattedDate(playingMedia.created_at)}}
                    </div>
                    <div class="time">
                        {{time.mediaID === playingMedia.id ? time.current : '0:00'}}
                    </div>
                </div>
            </div>

            <div class="buttons">
                <img src="/images/themes/theme1001/media/shuffle-button.png" alt="shuffle">
                <img class="prev" src="/images/themes/theme1001/media/buttun-prev.png" alt="prev">
                <img v-if="playingMedia.id" src="/images/themes/theme1001/media/media-pause-icon.png" alt="pause" @click="pauseMedia(playingMedia)">
                <img v-else src="/images/themes/theme1001/media/button-play.png" alt="play" @click="playMedia(playingMedia.id ? playingMedia : medias[0])">
                <img class="next"  src="/images/themes/theme1001/media/button-next.png" alt="next">
                <img src="/images/themes/theme1001/media/repeat-button.png" alt="repeat">
            </div>
            <div class="playing">
                <div class="time">
                    {{time.mediaID === playingMedia.id ? time.current : '0:00'}}
                </div>
                <div class="music-effect" :class="{'stop' : !playingMedia.id}"></div>
                <div class="time">
                    {{time.mediaID === playingMedia.id ? time.duration : '0:00'}}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Media",
        props:['user'],
        data() {
            return {
                activeCategory: 'all',
                playingMedia: {},
                time: {
                    current: '0:00',
                    duration: '0:00',
                }
            }
        },
        computed:{
            medias(){
                return this.user.media;
            }
        },
        methods:{
            changeCategory(category){
                this.activeCategory = category;
            },
            getFormattedDate(date) {
                if(!date){
                    return 'Uploaded at'
                }
                let d = new Date(date);
                return d.getDate() + '.' + (d.getMonth()+1) + '.' + d.getFullYear() ;
            },
            playMedia(media){
                this.playingMedia  = media;
                let currentAudioID = "media_element" + media.id;

                $(".mediaElement:not(currentAudioID)").each(function() {
                    $(this).get(0).pause();
                });


                let currentAudioElement = document.getElementById(currentAudioID) ;

                currentAudioElement.play();
            },
            pauseMedia(media){
                this.playingMedia = {};

                let currentAudioID = "media_element" + media.id;

                let currentAudioElement = document.getElementById(currentAudioID) ;

                currentAudioElement.pause();
            },
            stopMedia(){

            },
            mediaEnded(){
                setTimeout( () => {
                    this.playingMedia = {} ;
                },1000);
            },
            updateTime(e, media){
                let timeInSeconds = e.target.currentTime.toFixed();
                let formattedTime =  this.formatTime(timeInSeconds);
                let duration = this.formatTime(document.getElementById("media_element" + media.id).duration.toFixed());

                this.time = {
                    mediaID: media.id,
                    current: formattedTime,
                    duration: duration
                };
            },
            formatTime(timeInSeconds){
                return (timeInSeconds - (timeInSeconds %= 60))/60 + (9<timeInSeconds?':':':0') + timeInSeconds;
            }
        },
        mounted() {

        }
    }
</script>

<style lang="scss" scoped>
    .music-effect{
        width: 706px;
        height: 98px;
        background-image: url("/images/themes/theme1001/media/music-action.png");
        background-repeat: repeat;
        background-size: cover;
        background-position-x: 0;
        animation-name: changewidth;
        animation-direction: normal;
        animation-duration: 100s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
    }

    .stop{
        -moz-animation-name: none;
        -webkit-animation-name: none;
        -ms-animation-name: none;
        animation-name: none;
    }

    @keyframes changewidth {
        from {
            background-position-x: 0;
        }

        to {
            background-position-x: 5000px;
        }
    }

</style>
