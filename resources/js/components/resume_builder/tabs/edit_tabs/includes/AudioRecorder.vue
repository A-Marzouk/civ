<template>
    <v-dialog
            v-model="recordDialog"
            width="500"
    >
        <template v-slot:activator="{ on, attrs }">
            <v-btn
                    class="btn-record" depressed
                    v-bind="attrs"
                    v-on="on"
            >
                RECORD
            </v-btn>
        </template>

        <div class="custom-audio-recorder">
            <div class="step-1">
                <div class="d-flex">
                    <img src="/icons/audio-recorder/mic-icon.svg" alt="record"
                         v-if="currentAudioStep === 1 || !recording" @click="startRecording">
                    <img src="/icons/audio-recorder/pause-icon.svg" @click="pauseRecording"
                         v-if="currentAudioStep === 2 && recording" alt="pause">
                    <img src="/icons/audio-recorder/stop-icon.svg" @click="stopRecording" alt="stop" class="ml-3"
                         v-if="currentAudioStep === 2">
                </div>

                <div class="time">
                    <span v-if="!this.timestamp.getSeconds()">00:00</span>
                    <div v-else>
                        0{{timestamp.getMinutes()}}:<span v-if="timestamp.getSeconds() < 10">0</span>{{timestamp.getSeconds()}}
                    </div>
                </div>
                <div class="time-limit">
                    Record duration is limited to: 3 mins
                </div>
            </div>
            <div class="step-3" v-if="currentAudioStep === 3">
                <audio controls preload="auto" id="audioElement">
                    <source :src="tempAudioUrl" type="audio/webm">
                    Your browser does not support the audio element.
                </audio>
                <img src="/icons/audio-recorder/download-record-icon.svg" alt="download icon"
                     @click="downloadRecording">
                <img src="/icons/audio-recorder/delete-record-icon.svg" alt="delete icon" @click="removeRecording">
                <div class="ready-btn">
                    <a href="javascript:void(0)" @click="recordReady">
                        Ready
                    </a>
                </div>
            </div>

        </div>

    </v-dialog>
</template>

<script>
    import moment from 'moment'

    export default {
        name: "AudioRecorder",
        data() {
            return {
                // audio recorder:
                recording: false,
                currentAudioStep: 1,
                tempAudioUrl: '',
                recordDialog: false,
                recordedFileBlob: '',
                blobs: [],
                mediaRecorder: null,
                audioChunks: [],

                // timer
                timer: null,
                timestamp: new Date(0, 0, 0, 0, 0, 0),
            }
        },

        methods: {
            // recorder functions :

            startRecording() {
                this.currentAudioStep = 2;
                if (this.mediaRecorder) {
                    // resume
                    this.resumeRecording();
                    return;
                }
                navigator.mediaDevices.getUserMedia({audio: true})
                    .then(stream => {
                        const options = {
                            mimeType: 'audio/webm'
                        };

                        this.mediaRecorder = new MediaRecorder(stream, options);
                        this.mediaRecorder.start();

                        this.mediaRecorder.addEventListener("dataavailable", event => {
                            this.audioChunks.push(event.data);
                        });

                        this.mediaRecorder.addEventListener("start", event => {
                            this.startTimer();
                            this.recording = true;
                        });

                        this.mediaRecorder.addEventListener("resume", event => {
                            console.log('resume fired');
                            this.recording = true;
                        });

                        this.mediaRecorder.addEventListener("pause", event => {
                            this.recording = false;
                        });

                        this.mediaRecorder.addEventListener("stop", () => {
                            this.recordedFileBlob = new Blob(this.audioChunks, {'type': 'audio/ogg; codecs=opus'});
                            this.tempAudioUrl = URL.createObjectURL(this.recordedFileBlob);
                            this.stopTimer();
                            this.setAudioRecordDuration();
                            this.mediaRecorder = null;
                        });

                    });
            },

            setAudioRecordDuration() {
                let aud = document.getElementById('audioElement');
                this.calculateMediaDuration( aud );
            },

            calculateMediaDuration(media) {
                return new Promise((resolve, reject) => {
                    media.onloadedmetadata = function () {
                        // set the mediaElement.currentTime  to a high value beyond its real duration
                        media.currentTime = Number.MAX_SAFE_INTEGER;
                        // listen to time position change
                        media.ontimeupdate = function () {
                            media.ontimeupdate = function () {
                            };
                            // setting player currentTime back to 0 can be buggy too, set it first to .1 sec
                            media.currentTime = 0.1;
                            media.currentTime = 0;
                            // media.duration should now have its correct value, return it...
                            resolve(media.duration);
                        }
                    }
                });
            },

            stopRecording() {
                this.mediaRecorder.stop();
                this.currentAudioStep = 3;
                this.recording = false;
            },

            resumeRecording() {
                this.mediaRecorder.resume();
            },

            pauseRecording() {
                this.mediaRecorder.pause();
            },
            recordReady() {
                this.$emit('recordReady', this.recordedFileBlob);
                this.recordDialog = false;
                this.removeRecording();
            },
            removeRecording() {
                this.currentAudioStep = 1;
                this.tempAudioUrl = '';
                this.recordedFileBlob = '';
                this.mediaRecorder = null;
                this.audioChunks = [];
            },
            downloadRecording() {
                let a = document.createElement("a");
                document.body.appendChild(a);
                a.style = "display: none";
                let url = window.URL.createObjectURL(this.recordedFileBlob);
                a.href = url;
                a.download = 'Record civie.webm';
                a.click();
                window.URL.revokeObjectURL(url);
            },

            // timer
            startTimer() {
                let duration = moment.duration({
                    'seconds': 0,
                    'minutes': 0
                });

                let interval = 1;

                if (!this.timer) {
                    this.timer = setInterval(() => {
                        if (this.recording) {
                            this.timestamp = new Date(this.timestamp.getTime() + interval * 1000);
                            duration = moment.duration(duration.asSeconds() + interval, 'seconds');
                        }
                    }, 1000);
                }


            },
            stopTimer() {
                if (this.timer) {
                    clearInterval(this.timer);
                    this.timestamp = new Date(0, 0, 0, 0, 0, 0);
                    this.timer = null;
                }
            },
            moment: function () {
                return moment();
            }
        },
        mounted() {

        }
    }
</script>

<style lang="scss" scoped>
    @import "../../../../../../sass/media-queries";

    /* Audio recorder styles */

    .custom-audio-recorder {
        width: 500px;
        height: 300px;
        background: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border-radius: 20px;

        @include lt-sm{
            width: 100%;
            height: 400px;
        }

        .step-1 {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;

            img {
                width: 70px;
                height: 70px;

                &:hover {
                    cursor: pointer;
                }
            }

            .time {
                font-weight: 500;
                font-size: 24px;
                line-height: 41px;
                color: #888DB1;
                margin: 10px;
            }

            .time-limit {
                font-weight: 500;
                font-size: 18px;
                line-height: 27px;
                text-align: center;
                color: #888DB1;
            }


        }

        .step-3 {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            height: 40px;
            margin-top: 50px;
            width: 100%;
            padding-left: 35px;
            padding-right: 35px;

            @include lt-sm{
                justify-content: space-around;
            }

            audio {
                height: 40px;
                width: 250px;

                &:focus {
                    outline: none;
                }

                @include lt-sm{
                    width: 100%;
                    margin-bottom: 20px;
                }
            }

            img {
                &:hover {
                    cursor: pointer;
                }
            }
        }
    }

    .btn-record {
        width: 120px;
        height: 49px !important;
        margin-top: 7px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid #C4C9F5;
        border-radius: 10px;
        background-color: white !important;

        font-weight: 500;
        font-size: 18px;
        line-height: 25px;
        color: #888DB1 !important;

        @include lt-sm {
            margin-top: 10px;
        }
    }

    .ready-btn {
        a {
            color: white;
            background: #001CE2;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 40px;
            width: 70px;
            font-size: 16px;
            border-radius: 5px;

            &:hover {
                text-decoration: none;
            }
        }
    }
</style>