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
        <div class="media-wrapper">
            <div class="single-media audio">
                <div class="single-media-header">
                    <div class="preview">
                        <img src="/images/themes/theme1001/media/audio-preview.png" alt="preview">
                    </div>
                    <div class="details">
                        <div class="title">
                            AUD17/04/2020
                        </div>
                        <div class="name">
                            Hean Prinsloo
                        </div>
                        <div class="time">
                            00:00:00
                        </div>
                    </div>
                    <div class="play-icon">
                        <img src="/images/themes/theme1001/media/audio-play-btn.png" alt="play btn">
                    </div>
                </div>
                <div class="description">
                    Video is an electronic medium for therecording, copying,
                    playback, broadcasting,and display of moving visual media.
                </div>
            </div>
            <div class="single-media audio">
                <div class="single-media-header">
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
                    <div class="play-icon">
                        <img src="/images/themes/theme1001/media/audio-play-btn.png" alt="play btn">
                    </div>
                </div>
            </div>
            <div class="single-media audio">
                <div class="single-media-header">
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
                    <div class="play-icon">
                        <img src="/images/themes/theme1001/media/audio-play-btn.png" alt="play btn">
                    </div>
                </div>
            </div>
            <div class="single-media video">
                <img class="preview" src="/images/themes/theme1001/media/video-preview.png" alt="preview">
                <img class="play-icon" src="/images/themes/theme1001/media/audio-play-btn.png" alt="play btn">
            </div>
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
        data() {
            return {
                activeCategory: 'all'
            }
        },
        methods:{
            changeCategory(category){
                this.activeCategory = category;
            }
        }
    }
</script>
