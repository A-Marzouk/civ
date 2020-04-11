<template>
    <div>
        <div class="content d-flex justify-content-between">
            <div class="upload-container d-flex flex-column">
                <h3 class="text-blue hideOnMd">Upload my video</h3>
                <div id="audio_and_video" class="vue-dropzone">
                    <svg-vue class="upload-audio-icon hideOnMd" icon="upload-audio-icon"></svg-vue>
                    <div class="empty-text">
                        <br/>
                    </div>
                    <b-button class="btn btn-filled btn-upload hideOnMd" @click="$bvModal.show('main-upload-modal')">
                        <svg-vue class="upload-icon icon" icon="upload-icon"></svg-vue>
                        <span>Browse video file</span>
                    </b-button>
                    <b-button class="btn btn-filled btn-upload showOnMd" @click="$bvModal.show('main-upload-modal')">
                        <svg-vue class="upload-icon icon" icon="upload-icon"></svg-vue>
                        <span>Add video</span>
                    </b-button>
                </div>
                <!-- Insert icon -->
            </div>

            <!-- Preview video -->
            <div class="upload-container d-flex flex-column">
                <div class="audios-preview-container">
                    <div class="video-element" v-for="(video,index) in videos" :key="video.id" v-if="video.type === 'video'">
                        <div class="video-name">{{video.title}}</div>
                        <div class="video-player d-flex align-items-center">
                            <div v-show="video.id === playingVideo">
                                <iframe src="https://www.youtube.com/embed/tgbNymZ7vqY" frameborder="0" v-if="video.url.includes('youtube')"></iframe>
                                <video controls v-show="video.id === playingVideo" :id="video.id + '_videoPlayback'"  v-else>
                                    <source :src="video.url" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>

                            <a class="play-btn" href="javascript:void(0)" @click="loadVideo(video.id)"  v-show="video.id !== playingVideo">
                                <svg-vue class="video-play-icon" icon="play-media-icon"></svg-vue>
                            </a>

                            <div class="optionsBtns justify-content-center">
                                <a href="javascript:void(0)" @click="deleteMedia(video)">
                                    <svg-vue class="option-icon icon" icon="trash-delete-icon"></svg-vue>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- preview video -->

            <!-- Video Upload Main Modal -->
            <div>
                <b-modal class="media-upload-modal" id="main-upload-modal" hide-footer hide-header>
                    <div class="d-block">
                        <b-row class='upload-header'>
                            <b-col cols="2" align-h="start">
                                <button
                                        type="button"
                                        align="left"
                                        aria-label="Close"
                                        @click="$bvModal.hide('main-upload-modal')"
                                        class="btn-close"
                                >×
                                </button>

                                <button
                                        type="button"
                                        align="left"
                                        aria-label="Close"
                                        class="btn-close"
                                        @click="currentUploadMethod = 'general'"
                                        v-if="currentUploadMethod === 'linkUrl' "
                                >
                                    <svg-vue class="audio-back-icon" icon="audio-back-icon"></svg-vue>
                                </button>
                            </b-col>
                            <b-col cols="10" class="upload-audio-title text-center">
                                Upload
                                <span>Video</span>
                                <svg-vue class="video-icon" icon="video-icon"></svg-vue>
                            </b-col>
                        </b-row>
                        <!-- Main Function Buttons -->
                        <transition name="bounce">
                            <b-container class="bv-example-row" v-if="currentUploadMethod === 'general'">
                                <b-row class="text-center">
                                    <!-- Link Url -->
                                    <b-col class="upload-option">
                                        <div class="d-flex-inline upload-audio-subtitle">Link URL</div>
                                        <div class="d-flex-inline">
                                            <button @click="currentUploadMethod ='linkUrl' ">
                                                <svg-vue class="upload-url-icon" icon="upload-url-icon"></svg-vue>
                                            </button>
                                        </div>
                                    </b-col>
                                    <!-- Link URL -->

                                    <!-- Upload Video -->
                                    <b-col class="upload-option">
                                        <div class="d-flex-inline upload-audio-subtitle">Upload Video</div>
                                        <div class="d-flex-inline">
                                            <input
                                                    type="file"
                                                    ref="video"
                                                    style="display: none"
                                                    accept=".webm, .ogg, .mp4"
                                                    @change="handleVideoUpload"
                                            />
                                            <button @click="$refs.video.click()">
                                                <svg-vue class="video-upload-icon" icon="video-upload-icon"></svg-vue>
                                            </button>
                                        </div>
                                    </b-col>
                                    <!-- Upload Video -->
                                </b-row>
                            </b-container>
                        </transition>

                        <!-- Main Function Buttons -->
                        <!-- Link Upload Child -->
                        <b-container v-if="currentUploadMethod === 'linkUrl'" class="bv-example-row">
                            <b-row align-v="center">
                                <b-col cols="2" class="link-title-text">Link URL</b-col>
                                <b-col cols="8">
                                    <b-form-input type="url" class="link-input" placeholder="link here" v-model="newVideo.url"></b-form-input>
                                </b-col>
                                <b-col cols="2">
                                    <a href="javascript:void(0)" @click="uploadMedia">
                                        Upload
                                    </a>
                                </b-col>
                            </b-row>
                        </b-container>
                    </div>
                </b-modal>
            </div>
            <!-- Audio Upload Main Modal -->

            <!-- video play modal -->

        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                newVideo: {
                    title: 'new video',
                    type: 'video',
                    url:'',
                    mediaFile: null
                },
                errors: {},
                playingVideo:0,
                currentUploadMethod: 'general',
            }
        },
        computed: {
            videos() {
                return this.$store.state.user.media;
            }
        },
        methods: {
            loadVideo(id){
                this.playingVideo = id ;
            },
            closeVideo(id){
              this.playingVideo = 0 ;
              console.log('#' + id + '_videoPlayback');
              $('#' + id + '_videoPlayback').get(0).pause();
            },
            handleVideoUpload() {
                this.newVideo.mediaFile = this.$refs.video.files[0];
                this.uploadMedia();
            },
            uploadMedia() {
                let formData = new FormData();

                $.each(this.newVideo, (field) => {
                    if(this.newVideo[field] !== null){
                        formData.append(field, this.newVideo[field]);
                    }
                });
                formData.append('user_id', this.$store.state.user.id);


                this.$bvModal.hide('main-upload-modal');
                this.currentUploadMethod = 'general';

                const config = {
                    onUploadProgress: progressEvent => {
                        let progress = (progressEvent.loaded/progressEvent.total) * 100 ;
                        $('#progressBar').css('width',progress + '%');
                    } ,
                    headers:{'Content-Type': 'multipart/form-data'}
                };

                axios.post('/api/user/media', formData , config)
                    .then((response) => {
                        let addedMedia = response.data.data;
                        this.videos.push(addedMedia);
                        this.clearMedia();
                        setTimeout(() => {
                            $('#progressBar').css('width',0);
                        }, 2000);
                        this.$store.dispatch('flyingNotification');
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors.new = error.response.data.errors;
                        } else {
                            this.errors.new = 'Something went wrong. Please try again.';
                        }
                        this.$store.dispatch('flyingNotification',{message:'Error',iconSrc:'/images/resume_builder/error.png'});
                    });
            },
            clearMedia() {
                this.newVideo = {
                    title: 'Video',
                    type: 'video',
                    mediaFile: null
                };
            },
            deleteMedia(mdeia){
                if (!confirm('Do you want to delete this Video ?')) {
                    return;
                }
                axios.delete('/api/user/media/' + mdeia.id)
                    .then((response) => {
                        this.$store.dispatch('flyingNotificationDelete');
                        this.videos.forEach( (video,index) => {
                            if(video.id === response.data.data.id){
                                this.videos.splice(index,1);
                            }
                        });
                    })
                    .catch(error => {
                        console.log(error);
                        this.$store.dispatch('flyingNotification',{message:'Error',iconSrc:'/images/resume_builder/error.png'});
                    })
            }
        },
    };
</script>

<style scoped lang="scss">
    @import '../../../../../../sass/media-queries';
    $mainBlue: #001ce2;

    .optionsBtns {
        display: flex;
        margin: 0;
        width: 30px;
        height: 30px;
        background: #F9F9F9;
        box-shadow: 0 9px 12px rgba(0,0,0,.03);
        justify-content: center;
        align-items: center;
        padding: 12px;
        border-radius: 2px;
        position: absolute;

        top: 10px;
        right: 10px;

        @include lt-md {
        }

        @include lt-sm {
            width: 20px;
            height: 20px;
        }

        a {
            height: 24px;
            display: block;

            @include lt-sm {
                height: 16px;
            }

            .icon {
                height: 100%;
                color: $mainBlue;
                fill: $mainBlue;

                path {
                    fill: $mainBlue;
                }
            }
        }
    }
    
    .content {
        flex-wrap: wrap;

        @include lt-md {
            max-width: 650px;
            margin: 0 auto;
        }
    }

    .upload-container {
        position: relative;
        max-width: 354px;
        width: 48%;

        @include lt-md {
            width: 100%;
            margin: 0 auto;
            max-width: 100%;

            .showOnMd {
                display: flex !important;
                width: 100%;
                max-width: 100%;
            }
        }

        h3 {
            font-size: 28px;
            position: relative;
            width: 100%;
            text-align: center;

            &::after {
                position: absolute;
                bottom: -30px;
                left: 0;
                content: "";
                width: 100%;
                height: 2px;
                background: $mainBlue;
            }
        }
    }

    .vue-dropzone {
        box-sizing: border-box;
        max-width: 100%;
        padding-top: 30px;
        height: 225px;
        margin-top: 98px;
        display: flex;
        flex-direction: column;
        justify-content: center;

        @include lt-md {
            border: none;
            height: auto;
            margin: 0 auto;
            width: 100%;
            margin-top: 6px;
            max-width: 418px;
        }
    }

    .upload-audio-icon {
        height: 48px;
        margin-bottom: 10px;
    }

    .upload-icon {
        width: 25px;
    }

    .btn-upload {
        width: 214px;
        margin: 0 auto;
        font-size: 16px !important;
    }

    .audios-preview-container {
        margin-top: 40px;
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }

    /* aninamtion */
    .bounce-enter-active {
        animation: bounce-in 0.5s;
    }

    .bounce-leave-active {
        animation: bounce-in 0.5s reverse;
    }

    @keyframes bounce-in {
        0% {
            transform: scale(0);
        }
        50% {
            transform: scale(1.5);
        }
        100% {
            transform: scale(1);
        }
    }

    /* animation */

    /* new css */
    .modal-content {
        border: 2px solid #001ce2 !important;
        border-radius: 20px !important;
    }

    .modal.show .modal-dialog {
        max-width: 55% !important;

        &.modal-md {

            @include lt-md {
                max-width: 100% !important;
                width: 70%;
            }
        }

    }

    .btn-close {
        color: #001ad6;
        font-size: 1.5rem;
        margin-top: -10px;
        border: none !important;
    }

    .upload-header {

        @include lt-md {
            display: none;
        }
    }

    .container .row {
        @include lt-md {
            display: flex;
            flex-direction: column;

            .upload-option {
                display: flex;
                width: 100%;
                justify-content: space-between;
                align-items: center;
                background: #B9B9B9;
                border-radius: 8px;
                margin-bottom: 32px;
                padding: 10px 50px;
                font-size: 19px;

                &:last-of-type {
                    margin-bottom: 0;
                }

                @include lt-sm {
                    padding: 10px 30px;
                    font-size: 16px;
                }
            }
        }
    }

    .upload-audio-title {
        font-size: 2rem;
        margin-left: -48px;
        color: #001ce2;

    }

    .upload-audio-title span {
        font-weight: bold;
    }

    .upload-audio-subtitle {
        font-size: 1.3rem !important;
        font-weight: bold;
        color: #001ce2;

        @include lt-md {
            color: #54585E;
        }
    }

    .upload-url-icon {
        width: 50px !important;
        height: auto;
        margin-top: 15px;
        
    }

    .video-upload-icon {
        width: 40px !important;
        margin-top: 15px;
    }

    .video-icon {
        width: 40px !important;
        margin-left: 15px;
        // margin-top: -18px;
        display: inline-block
    }

    /* Child Modal */

    /* Child Modal */

    .video-element {
        position: relative;
        margin-bottom: 50px;
        max-width: 300px;
        min-width: 280px;

        @include lt-md {
            width: 46%;
        }

        .video-name {
            font-family: "Noto Sans", Arial, Helvetica, sans-serif;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .order-controls {
            right: -27px;
            position: absolute;
            z-index: 2;

            .icon {
                padding: 0 !important;
                background: none;
                border: none;
                outline: none;
                position: relative;
                display: flex;
                justify-content: center;
                align-items: center;

                svg {
                    width: 12px;
                    height: 15px;
                    margin-right: 97px;
                }

                &:first-child {
                    margin-bottom: 15px;
                }
            }
        }

        .select-audio-options {
            position: absolute;
            bottom: -30px;
            right: 100px;
            height: 22px;
            border-radius: 5px;
            border: 1px solid $mainBlue;
            width: 67px;
            display: flex;
            align-items: center;

            .caret-icon {
                position: absolute;
                z-index: 3;
                height: 5px;
                width: 10px;
                right: 6px;
            }
        }
    }

    .video-player {
        border: 5px solid white;
        border-radius: 22px;
        height: 150px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0px 0px 16px rgba(0, 0, 0, 0.16);
        background: #cccccc;
        position: relative;

        .play-btn {
            padding: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50px;
            height: 50px;
            background: white;
            box-shadow: -2px 10px 16px rgba(0, 0, 0, 0.16);
            border-radius: 14px;
        }

        .video-play-icon {
            width: 100%;
        }

        video,iframe{
            height: 150px;
            width: 260px;
            border-radius: 22px;
            border: 5px solid black;
            margin-top: 5px;
            &:focus{
                outline: none;
            }
        }

    }

    /* new css */


</style>
