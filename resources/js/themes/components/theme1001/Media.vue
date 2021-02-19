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
                                00:00:00
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

                    <audio controls :id="'media_element' + media.id" preload="auto" class="mediaElement audio" style="display: none;">
                        <source :src="media.url"/>
                        <source :src="media.url" type="audio/webm">
                    </audio>

                </div>
                <div v-else class="single-media video">
                    <template v-if="playingMedia.id !== media.id" >
                        <img class="preview" :src="media.media_preview" alt="preview" >
                        <img class="play-icon" @click="playMedia(media)" src="/images/themes/theme1001/media/audio-play-btn.png" alt="play btn">
                    </template>

                    <video width="auto" height="auto" @ended="mediaEnded" controls :id=" 'media_element' + media.id" v-show="playingMedia.id === media.id" class="mediaElement video">
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
                        AUD17/01/2021
                    </div>
                    <div class="name">
                        Hean Prinsloo
                    </div>
                    <div class="time">
                        00:00:00
                    </div>
                </div>
            </div>

            <div class="buttons">
                <img src="/images/themes/theme1001/media/shuffle-button.png" alt="shuffle">
                <img class="prev" src="/images/themes/theme1001/media/buttun-prev.png" alt="prev">
                <img src="/images/themes/theme1001/media/button-play.png" alt="play">
                <img class="next"  src="/images/themes/theme1001/media/button-next.png" alt="next">
                <img src="/images/themes/theme1001/media/repeat-button.png" alt="repeat">
            </div>
            <div class="playing">
                <div class="time">00:00</div>
                <img src="/images/themes/theme1001/media/music-action.png" alt="music">
                <div class="time">5:38</div>
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
                playingMedia: {}
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
                let d = new Date(date);
                return d.getDate() + '.' + (d.getMonth()+1) + '.' + d.getFullYear() ;
            },
            playMedia(media){
                this.playingMedia  = media;

                $('.mediaElement').each(function() {
                    $(this).get(0).pause();
                });

                let currentAudioID = "media_element" + media.id;

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
        },
        mounted() {

        }
    }
</script>
