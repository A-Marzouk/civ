<template>
    <div class="video-player">
        <video
            controls
            :src="videoSrc"
            ref="videoElem"
            :poster="videoPreview"
        />
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
        },
        details: {
            type: String,
            default: null
        }
    },
    computed: {
        videoSrc() {
            return this.link.slice(this.link.indexOf("http"));
        },
        videoPreview() {
            return (
                this.img ||
                "/images/resume_themes/theme201/fitness_club-statics_schedule_2x 1.png"
            );
        }
    }
};
</script>

<style lang="scss" scoped>
.video-player {
    video {
        width: 100%;
        &:focus {
            outline: none;
        }
    }
}
</style>
