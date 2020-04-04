<template>
    <div>
        <div class="content d-flex justify-content-between">
             <div class="upload-container d-flex flex-column">
                <h3 class="text-blue hideOnMd">Upload my audio</h3>
                <div id="audio_and_video" class="vue-dropzone">
                    <svg-vue class="upload-audio-icon hideOnMd" icon="upload-audio-icon"></svg-vue>
                    <div class="empty-text">
                        <br/>
                    </div>
                    <b-button class="btn btn-filled btn-upload hideOnMd" @click="$bvModal.show('main-upload-modal')">
                        <svg-vue class="upload-icon icon" icon="upload-icon"></svg-vue>
                        <span>Browse audio file</span>
                    </b-button>
                    <b-button class="btn btn-filled btn-upload showOnMd" @click="$bvModal.show('main-upload-modal')">
                        <svg-vue class="upload-icon icon" icon="upload-icon"></svg-vue>
                        <span>Add audio</span>
                    </b-button>
                </div>
                <!-- Insert icon -->
            </div>

            <div class="upload-container d-flex flex-column">
                <div class="audios-preview-container">
                    <div class="audio-element" v-for="(audio,index) in audios" :key="audio.id" v-if="audio.type === 'audio'">
                        <div class="audio-name">{{audio.title}}</div>
                        <div class="audio-player d-flex">
                            <audio controls preload="auto" >
                                <source :src="audio.url">
                            </audio>

                            <!--<div class="order-controls d-flex flex-column">-->
                            <!--<button class="icon">-->
                            <!--<svg-vue icon="arrow-up"></svg-vue>-->
                            <!--</button>-->
                            <!--<button class="icon">-->
                            <!--<svg-vue icon="arrow-down"></svg-vue>-->
                            <!--</button>-->
                            <!--</div>-->

                            <a class="play-btn" href="javascript:void(0)" @click="loadVideo(audio.id)"  v-show="audio.id !== playingVideo">
                                <svg-vue class="audio-play-icon" icon="play-media-icon"></svg-vue>
                            </a>

                            <div class="optionsBtns justify-content-center">
                                <a href="javascript:void(0)" @click="deleteMedia(audio)">
                                    <svg-vue class="option-icon icon" icon="trash-delete-icon"></svg-vue>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Audio Upload Main Modal -->
            <div>
                <b-modal id="main-upload-modal" hide-footer hide-header>
                    <div class="d-block">
                        <b-row class="justify-content-center upload-header">
                            <div class="action-btn">
                                <button type="button" aria-label="Close" @click="$bvModal.hide('main-upload-modal')"
                                        class="btn-close" v-if="currentUploadMethod == null">×
                                </button>

                                <button type="button" align="left" aria-label="Close" @click="currentUploadMethod=null"
                                        class="btn-close" v-if="currentUploadMethod != null">
                                    <svg-vue class="audio-back-icon" icon="audio-back-icon"></svg-vue>
                                </button>
                            </div>

                            <div class="upload-audio-title text-center">
                                Upload
                                <span>Audio</span>
                                <svg-vue class="voice-icon" icon="voice-icon"></svg-vue>
                            </div>
                        </b-row>
                        <!-- Main Function Buttons -->
                        <transition name="bounce">
                            <b-container class="bv-example-row" v-if="currentUploadMethod==null">
                                <b-row class="text-center">
                                    <!-- Link Url -->
                                    <b-col class="upload-option">
                                        <div class="d-flex-inline upload-audio-subtitle">Link URL</div>
                                        <div class="d-flex-inline">
                                            <button @click="currentUploadMethod='linkUrl' ">
                                                <svg-vue class="upload-url-icon" icon="upload-url-icon"></svg-vue>
                                            </button>
                                        </div>
                                    </b-col>
                                    <!-- Link URL -->
                                    <!-- MP3 -->
                                    <b-col class="upload-option">
                                        <div class="d-flex-inline upload-audio-subtitle">Upload Mp3</div>
                                        <div class="d-flex-inline">
                                            <input type="file" ref="audio" style="display: none"
                                                   @change="handleAudioUpload" accept=".mp3"/>
                                            <button @click="$refs.audio.click()">
                                                <svg-vue class="mp3-icon" icon="mp3-icon"></svg-vue>
                                            </button>
                                        </div>
                                    </b-col>
                                    <!-- MP3 -->
                                    <!-- Record -->
                                    <b-col class="upload-option">
                                        <div class="d-flex-inline upload-audio-subtitle">Record</div>
                                        <div class="d-flex-inline">
                                            <button @click="currentUploadMethod='record'">
                                                <svg-vue class="microphone-icon" icon="microphone-icon"></svg-vue>
                                            </button>
                                        </div>
                                    </b-col>
                                    <!-- Record -->
                                </b-row>
                            </b-container>
                        </transition>
                        <!-- Main Function Buttons -->
                        <!-- Link Upload Child -->

                        <b-container v-if="currentUploadMethod=='linkUrl'" class="bv-example-row">
                            <b-row align-v="center">
                                <b-col cols="2" class="link-title-text">Link URL</b-col>
                                <b-col cols="8">
                                    <b-form-input type="url" class="link-input" placeholder="link here"
                                                  v-model="newAudio.url"></b-form-input>
                                </b-col>
                                <b-col>
                                    <button @click="uploadMedia">
                                        <svg-vue class="link-btn-icon" icon="link-btn-icon"></svg-vue>
                                    </button>
                                </b-col>
                            </b-row>
                        </b-container>

                        <b-container v-show="currentUploadMethod=='record'">
                            <div class="audio-recorder d-flex justify-content-center w-100">
                                <audio-recorder :attempts="1" :time="3" :after-recording="recordingFinish"
                                                :show-upload-button="false"/>
                            </div>
                        </b-container>
                    </div>
                </b-modal>
            </div>


        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                newAudio: {
                    title: 'Audio',
                    type: 'audio',
                    url: '',
                    mediaFile: null
                },
                errors: {},
                currentUploadMethod: null,
            }
        },
        computed: {
            audios() {
                return this.$store.state.user.media;
            }
        },
        methods: {
            callback(data) {
                console.log(data);
            },
            recordingFinish(data) {
                this.newAudio.mediaFile = data.blob;
                // auto select the audio
                setTimeout(() => {
                    $('.ar-records__record').click();

                    // add upload button :
                    let uploadBtn = '<img alt="upload" id="uploadRecord" src="/icons/done-record-icon.svg"/>';
                    $('.ar-records__record').prepend(uploadBtn);
                    $('#uploadRecord').on('click', this.uploadMedia);

                }, 1000);
            },

            handleAudioUpload() {
                this.newAudio.mediaFile = this.$refs.audio.files[0];
                this.uploadMedia();
            },
            uploadMedia() {
                let formData = new FormData();

                $.each(this.newAudio, (field) => {
                    if (this.newAudio[field] !== null) {
                        formData.append(field, this.newAudio[field]);
                    }
                });

                this.$bvModal.hide('main-upload-modal');
                this.currentUploadMethod = null;

                const config = {
                    onUploadProgress: progressEvent => {
                        let progress = (progressEvent.loaded / progressEvent.total) * 100;
                        $('#progressBar').css('width', progress + '%');
                    },
                    headers: {'Content-Type': 'multipart/form-data'}
                };

                axios.post('/api/user/media', formData, config)
                    .then((response) => {
                        let addedMedia = response.data.data;
                        this.audios.push(addedMedia);
                        this.clearMedia();
                        setTimeout(() => {
                            $('#progressBar').css('width', 0);
                        }, 2000);
                        this.$store.dispatch('flyingNotification');
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors.new = error.response.data.errors;
                        } else {
                            this.errors.new = 'Something went wrong. Please try again.';
                        }
                        this.$store.dispatch('flyingNotification', {
                            message: 'Error',
                            iconSrc: '/images/resume_builder/error.png'
                        });
                    });
            },
            clearMedia() {
                this.newAudio = {
                    title: 'Audio',
                    type: 'audio',
                    mediaFile: null
                };
            },
            deleteMedia(mdeia) {
                if (!confirm('Do you want to delete this Audio ?')) {
                    return;
                }
                axios.delete('/api/user/media/' + mdeia.id)
                    .then((response) => {
                        this.$store.dispatch('flyingNotificationDelete');
                        this.audios.forEach((audio, index) => {
                            if (audio.id === response.data.data.id) {
                                this.audios.splice(index, 1);
                            }
                        });
                    })
                    .catch(error => {
                        console.log(error);
                        this.$store.dispatch('flyingNotification', {
                            message: 'Error',
                            iconSrc: '/images/resume_builder/error.png'
                        });
                    })
            }
        },
    }
    ;
</script>

<style lang="scss">
    // recorder styles not scoped
    .audio-recorder {
        .ar-recorder__records-limit {
            display: none !important;
        }

        .ar-records {
            height: auto !important;
        }

        .ar-recorder__duration {
            margin-top: 10px;
        }

        #uploadRecord {
            width: 25px;
            height: auto;

            &:hover {
                cursor: pointer;
            }
        }
    }


    // .modal.show .modal-dialog.modal-md {
    //     max-width: 55% !important;
    // }
</style>

<style lang="scss" scoped>
    $mainBlue: #001ce2;
    @import '../../../../../../sass/media-queries';

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

    .optionsBtns {
        display: flex;
        margin: 0;
        width: 30px;
        height: 30px;
        background: transparent;
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
        width: 100%;

        @include lt-md {
            max-width: 418px;
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


    .action-btn {
        position: absolute;
        left: 10px;

        .btn-close {
            color: #001ad6;
            font-size: 1.5rem;
            border: none !important;
        }
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

    .mp3-icon {
        width: 50px !important;
        margin-top: 15px;
    }

    .microphone-icon {
        width: 30px !important;
        margin-top: 15px;
    }

    .voice-icon {
        width: 20px !important;
        margin-left: 15px;
        display: inline-block;
    }

    .audio-back-icon {
        width: 10px !important;
    }

    /* Child Modal */
    .link-title-text {
        color: #001ce2 !important;
        font-size: 1rem !important;
        font-weight: bold !important;
    }

    .link-input {
        border: 1px solid #001ce2 !important;
    }

    .link-btn-icon {
        width: 60%;
    }

    .red-dot-icon {
        width: 10px;
    }

    .red-dot {
        color: #ff0707;
        font-size: 3rem;
    }

    .recording-time-text {
        font-size: 1.8rem;
        color: #001ce2;
    }

    .cancel-record-icon {
        width: 50px;
        margin-top: 16px;
    }

    .done-record-icon {
        width: 50px;
        margin-top: 16px;
    }

    .time-col {
        margin-right: 37px;
        margin-top: -2px;
    }

    /* Child Modal */

    .audio-element {
        position: relative;
        margin-bottom: 50px;

        .audio-name {
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
                    height: 6px;
                }

                &:first-child {
                    margin-bottom: 15px;
                }
            }
        }

        .select-audio-options {
            position: absolute;
            bottom: 7px;
            right: 19px;
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

    .audio-player {
        border-radius: 8px;
        background: #F7F5F5;
        height: 100px;
        max-width: 350px;
        width: 100%;
        justify-content:center;
        align-items: flex-start;
        padding-top: 11px;
        box-shadow: 0 0 10px rgba(0, 0, 0, .16);
        border: 5px solid white;

        .play-icon {
            width: 30px;
        }

        audio{
            // border: 1px $mainBlue solid;
            // border-radius: 25px;
            background: transparent;
        }

        .sound-frecuency {
            width: 210px;
            margin-left: 25px;
        }
    }

</style>
