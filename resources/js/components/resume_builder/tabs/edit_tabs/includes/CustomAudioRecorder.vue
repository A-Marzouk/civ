<template>
    <div>
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

            <audio-recorder :attempts="1" style="display: none;" :time="3" :after-recording="finished"
                            :show-upload-button="false"/>

        </v-dialog>
    </div>

</template>

<script>
    import moment from 'moment'

    export default {
        name: "CustomAudioRecorder",
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

                // vue recorder buttons:
                startBtn: null,
                stopBtn: null,
                removeBtn: null,
                audioLoadTimer: null,
            }
        },

        methods: {

            // recorder functions :
            startRecording() {
                if(this.recordedFileBlob !== ''){
                    return ;
                }
                this.currentAudioStep = 2;
                this.recording = true ;
                document.getElementsByClassName('ar-icon ar-icon__lg')[0].click();
                this.startTimer();
            },


            stopRecording() {
                document.getElementsByClassName('ar-recorder__stop')[0].click();
                this.stopTimer();
            },

            finished(data){
                this.recordedFileBlob = data.blob;
                this.tempAudioUrl = URL.createObjectURL(data.blob);
                this.currentAudioStep = 3;
                this.recording = false;

                setTimeout(() => {
                    $('.ar-records__record').click();
                }, 1000);
            },

            pauseRecording(){
                document.getElementsByClassName('ar-icon ar-icon__lg ar-icon--rec')[0].click();
                this.recording = false ;
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
                document.getElementsByClassName('ar__rm')[0].click();
            },

            downloadRecording() {
                let a = document.createElement("a");
                document.body.appendChild(a);
                a.style = "display: none";
                let url = window.URL.createObjectURL(this.recordedFileBlob);
                a.href = url;
                a.download = 'Record civie.mp3';
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
            },
        },
        computed:{
            recordTimer(){
                return document.getElementsByClassName('ar-recorder__duration')[0].innerHTML ;
            },
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