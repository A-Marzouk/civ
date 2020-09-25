<template>
    <v-app class="media-contents">
        <div style="width:100%;">
            <div class="d-flex">
                <v-tabs class="resume-builder__tab-bar" hide-slider height="51">
                    <v-tab class="resume-builder__tab" v-for="tab in tabs" :key="tab" @click="changeTab(tab)">
                        {{ tab === 'audio' ? 'Audio' : 'Video' }}
                    </v-tab>
                </v-tabs>
            </div>

            <div class="card-main pa-lg-10 pa-md-10 pa-sm-3 pa-3 mt-0 resume-builder__scroll main-content">
                <div>
                    <div v-if="mediaCategory === 'audio'">
                        <div style="width: 100%;" class="inputs-wrapper">
                            <div class="text-inputs">
                                <v-text-field
                                        class="resume-builder__input civie-input title-input"
                                        outlined
                                        v-model="newMedia.title"
                                        :error="!!errors.title"
                                        :error-messages="errors.title"
                                        color="#001CE2"
                                        label="Title"
                                >
                                </v-text-field>
                                <v-text-field
                                        class="resume-builder__input civie-input transcript-input"
                                        outlined
                                        v-model="newMedia.transcript"
                                        :error="!!errors.transcript"
                                        :error-messages="errors.transcript"
                                        color="#001CE2"
                                        label="Description / Transcript"
                                        hint="Optional"

                                >
                                </v-text-field>
                            </div>
                            <div class="media-inputs" :class="{ 'justify-content-end' : isEditing}">
                                <template v-if="!isEditing">
                                    <v-input
                                            class="resume-builder__input civie-dropzone title-input v-text-field v-text-field--outlined v-text-field--enclosed"
                                            outlined
                                            label="Upload Video"
                                            hint="(Maximum 1 files)"
                                            height="50"
                                            :error="!!errors.url"
                                            :error-messages="errors.url"

                                    >
                                        <vue-dropzone
                                                class="civie-dropzone-input"
                                                ref="filesDropZone_0"
                                                id="dropzone_0"
                                                :options="dropzoneOptions"
                                                :useCustomSlot="true"
                                                v-on:vdropzone-file-added="handlingEvent"

                                        >
                                            <div class="dropzone-custom-content d-flex flex-row" style="float:left;">
                                                <div class="mr-5">
                                                    <svg-vue class="icon" :icon="'upload-input-icon'"></svg-vue>
                                                </div>
                                                <div class="upload-text">Browse/Drag</div>
                                            </div>
                                        </vue-dropzone>
                                    </v-input>
                                    <span class="or-text">or</span>
                                    <v-text-field
                                            class="resume-builder__input civie-input title-input link-input"
                                            outlined
                                            v-model="newMedia.url"
                                            :error="!!errors.url"
                                            :error-messages="errors.url"
                                            placeholder="Link URL"
                                            color="#001CE2"
                                    >
                                        <template v-slot:prepend-inner>
                                            <img
                                                    class="ml-3 mt-n1"
                                                    src="/images/new_resume_builder/icons/main/link.svg"
                                            />
                                        </template>
                                    </v-text-field>
                                    <span class="or-text">or</span>
                                    <v-btn class="btn-record" depressed @click="toggleRecord">
                                        Record
                                    </v-btn>
                                </template>

                                <div class="w-100" v-if="currentUploadMethod == 'record'">
                                    <div class="w-100 d-flex justify-content-center audio-recorder mt-3">
                                        <audio-recorder :attempts="1" :time="3" :after-recording="recordingFinish"
                                                        :show-upload-button="false"/>
                                    </div>
                                </div>

                                <v-btn class="btn-new" depressed @click="uploadMedia">
                                    {{ isEditing ? 'Update' : 'Add New'}}
                                </v-btn>
                                <v-btn class="btn-new ml-3"  @click="cancelEdit" v-show="isEditing">
                                    Cancel
                                </v-btn>
                            </div>
                        </div>
                    </div>
                    <div v-if="mediaCategory === 'video'">
                        <div style="width: 100%;">
                            <div class="inputs-wrapper">
                                <div class="text-inputs">
                                    <v-text-field
                                            class="resume-builder__input civie-input title-input"
                                            outlined
                                            v-model="newMedia.title"
                                            :error="!!errors.title"
                                            :error-messages="errors.title"
                                            color="#001CE2"
                                            label="Title"
                                    >
                                    </v-text-field>
                                    <v-text-field
                                            class="resume-builder__input civie-input transcript-input"
                                            outlined
                                            v-model="newMedia.transcript"
                                            :error="!!errors.transcript"
                                            :error-messages="errors.transcript"
                                            color="#001CE2"
                                            label="Description / Transcript"
                                            hint="Optional"
                                    >
                                    </v-text-field>
                                </div>
                                <div class="upload-preview">
                                    <div class="input">
                                        <v-input
                                                class="resume-builder__input civie-dropzone title-input v-text-field v-text-field--outlined v-text-field--enclosed"
                                                outlined
                                                label="Upload Image Preview"
                                                hint="(Maximum 1 file)"
                                                height="50"
                                                :error="!!errors.mediaPreviewFile"
                                                :error-messages="errors.mediaPreviewFile"

                                        >
                                            <vue-dropzone
                                                    class="civie-dropzone-input"
                                                    ref="filesDropZone_image_preview"
                                                    id="dropzone_preview"
                                                    :options="dropzoneImagePreviewOptions"
                                                    :useCustomSlot="true"
                                                    v-on:vdropzone-file-added="handlingImageEvent"
                                                    v-on:success="removePreview"

                                            >
                                                <div class="dropzone-custom-content d-flex flex-row" style="float:left;">
                                                    <div class="mr-5">
                                                        <svg-vue class="icon" :icon="'upload-input-icon'"></svg-vue>
                                                    </div>
                                                    <div class="upload-text">Browse/Drag</div>
                                                </div>
                                            </vue-dropzone>
                                        </v-input>
                                    </div>
                                    <div class="file-name">
                                        {{newMedia.mediaPreviewFile ? 'Uploaded:' + newMedia.mediaPreviewFile.name : ''}}
                                    </div>
                                </div>
                                <div class="media-inputs" :class="{ 'justify-content-end' : isEditing}">

                                    <template v-if="!isEditing">
                                        <v-input
                                                class="resume-builder__input civie-dropzone title-input v-text-field v-text-field--outlined v-text-field--enclosed"
                                                outlined
                                                label="Upload File"
                                                hint="(Maximum 1 files)"
                                                height="50"
                                                :error="!!errors.url"
                                                :error-messages="errors.url"

                                        >
                                            <vue-dropzone
                                                    class="civie-dropzone-input"
                                                    ref="filesDropZone_1"
                                                    id="dropzone_1"
                                                    :options="dropzoneOptionsVideo"
                                                    :useCustomSlot="true"
                                                    v-on:vdropzone-file-added="handlingEvent"

                                            >
                                                <div class="dropzone-custom-content d-flex flex-row" style="float:left;">
                                                    <div class="mr-5">
                                                        <svg-vue class="icon" :icon="'upload-input-icon'"></svg-vue>
                                                    </div>
                                                    <div class="upload-text">Browse/Drag</div>
                                                </div>
                                            </vue-dropzone>
                                        </v-input>
                                        <span class="or-text">or</span>
                                        <v-text-field
                                                class="resume-builder__input civie-input title-input link-input"
                                                outlined
                                                v-model="newMedia.url"
                                                :error="!!errors.url"
                                                :error-messages="errors.url"
                                                placeholder="Link URL"
                                                color="#001CE2"
                                        >
                                            <template v-slot:prepend-inner>
                                                <img
                                                        class="ml-3 mt-n1"
                                                        src="/images/new_resume_builder/icons/main/link.svg"
                                                />
                                            </template>
                                        </v-text-field>
                                    </template>


                                    <v-btn class="btn-new" depressed @click="uploadMedia">
                                        {{ isEditing ? 'Update' : 'Add New'}}
                                    </v-btn>
                                    <v-btn class="btn-new ml-3"  @click="cancelEdit" v-show="isEditing">
                                        Cancel
                                    </v-btn>
                                </div>
                            </div>

                        </div>
                    </div>
                    <draggable v-if="medias" v-model="medias" @start="drag=true" @end="drag=false" class="mt-3" handle=".drag-handler">
                        <v-row align="center" dense v-for="media in medias" :key="media.id"
                               :class="{'half-opacity' : !media.is_public}">

                            <v-col xl="7" :lg="windowWidth<1440 ? '9' : '7' " md="9" sm="12" cols="12"
                                   v-show="mediaCategory === 'audio' && media.type === 'audio'">
                                <!-- audio card -->
                                <v-card class="card-holder pa-2 mb-3 mt-3">
                                    <v-row justify="center">
                                        <v-col
                                                xl="1"
                                                lg="1"
                                                md="1"
                                                sm="1"
                                                cols="4"
                                                class=" drag-handler mt-xl-n2 mt-lg-n2 mt-md-n3 mt-sm-n3 mt-0"
                                                :align="windowWidth<767?'left':'center'"
                                        >
                                            <v-btn color="#ffffff" class="btn-v_bar" depressed>
                                                <v-icon color="#888DB1">mdi-dots-vertical</v-icon>
                                            </v-btn>
                                        </v-col>
                                        <v-col
                                                xl="1"
                                                lg="1"
                                                md="1"
                                                sm="1"
                                                cols="1"
                                                class="mt-xl-n5 mt-lg-n5 mt-md-n5 mt-sm-n5 mt-0 hidden-xs-only"
                                        >
                                            <div class="vertical-line"></div>
                                        </v-col>
                                        <v-col
                                                xl="6"
                                                lg="7"
                                                md="7"
                                                :sm="windowWidth<=767?'6':'7'"
                                                cols="7"
                                                class="hidden-xs-only"
                                                style="margin-top:-15px;"
                                        >
                                            <audio controls class="audio-controller ml-xl-n4">
                                                <source :src="media.url"/>
                                            </audio>
                                        </v-col>
                                        <v-col
                                                xl="4"
                                                lg="3"
                                                md="3"
                                                :sm="windowWidth<=767?'4':'3'"
                                                cols="8"
                                                align="right"
                                                class="action-col d-flex justify-content-end resume-builder__action-buttons-container"
                                        >
                                            <v-btn
                                                    class="btn-icon civie-btn"
                                                    depressed @click="toggleMedia(media)"
                                            >
                                                <svg-vue
                                                        icon="eye-icon"
                                                        :class="{'visible' : media.is_public}"
                                                        class="icon"
                                                ></svg-vue>
                                            </v-btn>
                                            <v-btn
                                                    color="#F2F3FD"
                                                    depressed
                                                    @click="editMedia(media)"
                                                    class="btn-skill-action"
                                            >
                                                <svg-vue icon="edit-icon" class="icon"></svg-vue>
                                            </v-btn>
                                            <v-btn
                                                    class="btn-icon civie-btn"
                                                    @click="deleteMedia(media)"
                                                    depressed
                                            >
                                                <svg-vue
                                                        icon="trash-delete-icon"
                                                        class="icon"
                                                ></svg-vue>
                                            </v-btn>
                                        </v-col>
                                        <v-col cols="12" class="hidden-sm-and-up" align="center">
                                            <audio controls class="audio-controller">
                                                <source :src="media.url"/>
                                            </audio>
                                        </v-col>
                                    </v-row>
                                </v-card>
                                <!-- audio card -->
                            </v-col>

                            <v-col xl="6" lg="6" md="12" sm="12" cols="12"
                                   v-show="mediaCategory === 'video' && media.type === 'video'">
                                <!-- Video Card -->
                                <v-card class="card-holder pa-2 mb-3 mt-3" height="auto">
                                    <div class="video-item">
                                        <div class="video-action-row">
                                            <div class="drag-handler">
                                                <v-btn color="#ffffff" class="btn-v_bar ml-2" depressed>
                                                    <v-icon color="#888DB1">mdi-dots-vertical</v-icon>
                                                </v-btn>
                                            </div>
                                            <div>
                                                <v-col class="action-col resume-builder__action-buttons-container">
                                                    <v-btn
                                                            class="btn-icon civie-btn"
                                                            depressed @click="toggleMedia(media)"
                                                    >
                                                        <svg-vue
                                                                icon="eye-icon"
                                                                :class="{'visible' : media.is_public}"
                                                                class="icon"
                                                        ></svg-vue>
                                                    </v-btn>
                                                    <v-btn
                                                            color="#F2F3FD"
                                                            depressed
                                                            @click="editMedia(media)"
                                                            class="btn-skill-action"
                                                    >
                                                        <svg-vue icon="edit-icon" class="icon"></svg-vue>
                                                    </v-btn>
                                                    <v-btn
                                                            class="btn-icon civie-btn"
                                                            @click="deleteMedia(media)"
                                                            depressed
                                                    >
                                                        <svg-vue
                                                                icon="trash-delete-icon"
                                                                class="icon"
                                                        ></svg-vue>
                                                    </v-btn>
                                                </v-col>
                                            </div>
                                        </div>
                                        <div class="video-frame">
                                            <v-card flat color="transparent" tile class="pa-2">
                                                <img :src="media.media_preview" class="mediaPreview"  v-show="playingVideoId !== media.id" alt="media preview">
                                                <v-btn fab color="#F8F8F8" :ripple="false" large class="play-btn" @click="playVideo(media)"  v-show="playingVideoId !== media.id">
                                                    <img src="/images/welcome_landing_page/icons/play.svg"  />
                                                </v-btn>
                                                <video width="auto" height="auto" @ended="videoEnded" controls :id=" 'video_' + media.id" v-show="playingVideoId === media.id" class="video">
                                                    <source
                                                            :src="media.url"
                                                            type="video/mp4"
                                                    />
                                                </video>
                                            </v-card>
                                        </div>
                                    </div>
                                </v-card>
                                <!-- Video Card -->
                            </v-col>

                        </v-row>
                    </draggable>
                </div>
            </div>
        </div>
    </v-app>
</template>

<script>
    import vue2Dropzone from "vue2-dropzone";
    import "vue2-dropzone/dist/vue2Dropzone.min.css";
    import draggable from "vuedraggable";


    export default {
        name: "AudioVideo",
        components: {
            vueDropzone: vue2Dropzone,
            draggable,

        },
        data() {
            return {
                windowWidth: window.innerWidth,
                dropzoneOptions: {
                    url: "https://httpbin.org/post",
                    thumbnailWidth: 5,
                    maxFilesize: 25,
                    maxFiles: 1,
                    acceptedFiles: 'audio/*',
                    addRemoveLinks: false
                },
                dropzoneOptionsVideo: {
                    url: "https://httpbin.org/post",
                    thumbnailWidth: 5,
                    maxFilesize: 25,
                    maxFiles: 1,
                    acceptedFiles: 'video/*',
                    addRemoveLinks: false
                },
                dropzoneImagePreviewOptions: {
                    url: "https://httpbin.org/post",
                    thumbnailWidth: 150,
                    maxFilesize: 5,
                    disablePreview: true,
                    maxFiles: 1,
                    acceptedFiles: 'image/*',
                    addRemoveLinks: false
                },
                newMedia: {
                    id: "",
                    title: "",
                    type: "audio",
                    transcript: "",
                    url: "",
                    mediaPreviewFile: null,
                    mediaFile: null
                },
                currentUploadMethod: 'upload',
                tabs: ["audio", "video"],
                errors: {},
                mediaCategory: 'audio',
                playingVideoId: ''
            };
        },
        computed: {
            medias: {
                get() {
                    return this.$store.state.user.media;
                },
                set(medias) {
                    this.$store.commit('updateMedia', medias);
                }
            },
            isEditing(){
                return (this.newMedia.id !== "")
            }
        },
        methods: {
            changeTab(tab) {
                this.mediaCategory = tab;
                this.newMedia.type = tab.toLowerCase();
                this.clearMedia();
            },
            toggleRecord(){
                this.currentUploadMethod === 'record' ?   this.currentUploadMethod = 'upload' :   this.currentUploadMethod = 'record';
            },
            recordingFinish(data) {
                this.newMedia.mediaFile = data.blob;
                // auto select the audio
                setTimeout(() => {
                    $('.ar-records__record').click();
                }, 1000);
            },
            validateMedia() {
                if(this.isEditing){
                   return true;
                }
                let url = this.newMedia.url;

                let file_valid = true;
                let url_valid = true;
                if (this.newMedia.mediaFile === null) {
                    file_valid = false;
                }

                let urlRegex = /[(http(s)?):\/\/(www\.)?a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/;
                url_valid = url.match(urlRegex);

                return file_valid || url_valid;
            },
            editMedia(media){
                this.newMedia = {
                    id: media.id,
                    title: media.title,
                    type: media.type,
                    transcript: media.transcript,
                    mediaPreviewFile: {},
                    user_id: media.user_id
                };
            },
            cancelEdit() {
                this.clearMedia();
            },
            toggleMedia(media) {
                media.is_public = !media.is_public;
                axios.put("/api/user/media", media)
                    .then(() => {
                        this.$store.dispatch("flyingNotification");
                        this.clearMedia();
                    })
                    .catch(error => {
                        if (typeof error.response.data === "object") {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors =
                                "Something went wrong. Please try again.";
                        }
                        this.$store.dispatch("flyingNotification", {
                            message: "Error",
                            iconSrc: "/images/resume_builder/error.png"
                        });
                    });
            },
            handlingEvent: function (file) {
                this.newMedia.mediaFile = file;
            },
            handlingImageEvent: function (file) {
                this.newMedia.mediaPreviewFile = file;
                file.previewElement.innerHTML = "";
            },
            removePreview(file){
                console.log('here');
                file.previewElement.innerHTML = "";
            },
            uploadMedia() {
                this.errors = {};

                let formData = new FormData();
                $.each(this.newMedia, field => {
                    if (this.newMedia[field] !== null) {
                        formData.append(field, this.newMedia[field]);
                    }
                });

                formData.append("user_id", this.$store.state.user.id);

                const config = {
                    onUploadProgress: progressEvent => {
                        let progress = (progressEvent.loaded / progressEvent.total) * 100;
                        $("#progressBar").css("width", progress + "%");
                    },
                    headers: {"Content-Type": "multipart/form-data"}
                };

                if (!this.validateMedia()) {
                    this.errors.url = 'Not a valid url';
                    return;
                }

                axios.post("/api/user/media", formData, config)
                    .then( (response) => {

                        if (!this.isEditing) {
                            response.data.data.is_public = true;
                            this.medias.push(response.data.data);
                        } else {
                            this.medias.forEach((media, index) => {
                                if (media.id === response.data.data.id) {
                                    this.medias.splice(index, 1, response.data.data);
                                }
                            });
                        }

                        this.clearMedia();
                        $("#progressBar").css("width",'0%');
                        this.$store.dispatch("flyingNotification");
                    })
                    .catch( (error) => {
                        $("#progressBar").css("width",'0%');
                        if (typeof error.response.data === "object") {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = "Something went wrong. Please try again.";
                        }
                        this.$store.dispatch("flyingNotification", {
                            message: "Error",
                            iconSrc: "/images/resume_builder/error.png"
                        });
                    });
            },
            clearMedia() {
                try {
                    this.newMedia = {
                        id: "",
                        title: "",
                        type: this.mediaCategory,
                        transcript: "",
                        url: "",
                        mediaPreviewFile: null,
                        mediaFile: null
                    };
                    this.currentUploadMethod = 'upload';
                    if( this.$refs.filesDropZone_0){
                        this.$refs.filesDropZone_0.removeAllFiles();
                    }
                    if(this.$refs.filesDropZone_1){
                        this.$refs.filesDropZone_1.removeAllFiles();
                    }
                    if(this.$refs.filesDropZone_image_preview){
                        this.$refs.filesDropZone_image_preview.removeAllFiles();
                    }

                }catch(error){
                    console.log(error)
                }
            },
            deleteMedia(mdeia) {
                if (!confirm("Do you want to delete this Media file ?")) {
                    return;
                }
                axios
                    .delete("/api/user/media/" + mdeia.id)
                    .then(response => {
                        this.$store.dispatch("flyingNotificationDelete");
                        this.medias.forEach((media, index) => {
                            if (media.id === response.data.data.id) {
                                this.medias.splice(index, 1);
                            }
                        });
                    })
                    .catch(error => {
                        console.log(error);
                        this.$store.dispatch("flyingNotification", {
                            message: "Error",
                            iconSrc: "/images/resume_builder/error.png"
                        });
                    });
            },
            playVideo(media){
                this.playingVideoId = media.id;
                $('.video').each(function() {
                    $(this).get(0).pause();
                });
                document.getElementById("video_" + media.id).play();
            },
            videoEnded(){
                this.playingVideoId = '' ;
            }
        },
        mounted() {
            window.onresize = () => {
                this.windowWidth = window.innerWidth;
            }
        }
    };
</script>

<style scoped lang="scss">
    @import "../../../../../sass/media-queries";

    $mainBlue: #001ce2;
    .hidden-custom-mobile {
        @media screen and (max-width: 768px) {
            display: none;
        }
    }

    .media-contents {
        @include lt-sm {
            max-width: 94%;
            margin-right: auto;
            margin-left: auto;
        }
    }

    .inputs-wrapper {

        max-width: 930px;
        display: flex;
        flex-direction: column;

        @include lt-sm{
            margin-top:25px;
        }
        @include lt-md{
            margin-top:25px;
        }

        .upload-preview{
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            position: relative;

            .input{
                max-width: 300px;
                width: 100%;
            }

            .file-name{
                position: absolute;
                font-size: 16px;
                color: #9f9e9e;
                margin-left: 12px;
                margin-top: 6px;
                max-width: 270px;
                white-space: nowrap;
                overflow: hidden;
            }
        }
        .text-inputs{
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;

            .transcript-input {
                max-width: 590px;
                @media only screen and (min-width: 300px) and (max-width: 768px)  {
                    max-width: 300px;
                }
                @media only screen and (min-width: 769px) and (max-width: 1020px)  {
                    max-width: 350px;
                }
                @media only screen and (min-width: 1020px) and (max-width: 1440px)  {
                    max-width: 550px;
                }
            }

            .title-input{
                max-width:300px;
            }
        }

        .media-inputs{
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;

            @include lt-sm{
                flex-direction: column;
                align-items: flex-start;
            }
            @include lt-md{
                flex-direction: column;
                align-items: flex-start;
            }

            .title-input{
                max-width:300px;
                width:100%;

                @include lt-sm{
                    margin-bottom: -18px;
                }
                @include lt-md{
                    margin-bottom: -18px;
                }

                @include lt-lg{
                    margin-right: 10px;
                }

                &.link-input{
                    @include lt-sm{
                        margin-top: -18px;
                    }
                    @include lt-md{
                        margin-top: -18px;
                    }
                }
            }

            .or-text{
                color: #888DB1;
                font-weight: 500;
                font-size: 16px;
                line-height: 22px;
                margin-top: 6px;
                @include lt-sm{
                    margin-left:7px;
                }
                @include lt-md{
                    margin-left:7px;
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

            @include lt-sm{
                margin-top:10px;
            }
        }

        .btn-new {
            width: 120px;
            height: 49px !important;
            margin-top: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background-color: #001CE2 !important;

            font-weight: 500;
            font-size: 18px;
            line-height: 25px;
            color: white !important;

            @include lt-sm{
                margin-top:20px;
            }
            @include lt-md{
                margin-top:20px;
            }
        }
    }


    .hidden-custom-tablet-and-up {
        @media screen and (min-width: 768px) {
            display: none;
        }
    }

    .main-content {
        height: 450px;
        background: #fff;
        box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1);
        padding: 50px;
        margin-bottom: 10px;
        scroll-behavior: smooth;
    }

    .card-main {
        box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1) !important;
        @media screen and (max-width: 1903px) {
            width: auto;
        }

        .btn-add-new {
            font-family: "Noto Sans", sans-serif !important;
            width: 120px !important;
            height: 50px !important;
            font-size: 18px !important;
            font-weight: 500;
            box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1) !important;
            @media screen and (max-width: 767px) {
                width: 100px !important;
                height: 40px !important;
                font-size: 15px !important;
            }
        }

        .card-holder {

            .video-item{
                display: flex;
                flex-direction: column;
                .video-action-row{
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }
                .video-frame{

                    position: relative;

                    .mediaPreview{
                        
                    }

                    .play-btn{
                        position: absolute;
                        margin: auto;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;

                        img{
                            width:30px
                        }
                    }


                    display: flex;
                }
            }

            box-shadow: 0px 5px 20px rgba(0, 16, 131, 0.06);
            height: 50px;
            width: 523px;
            @media screen and (max-width: 1903px) {
                width: auto;
            }
            @media screen and (max-width: 599px) {
                height: auto;
                width: auto;
            }

            .btn-v_bar {
                min-width: 30px !important;
                min-height: 28px !important;
                width: 30px !important;
                height: 28px !important;
                margin-left: 2px;
                @media screen and (min-width: 1264px) and (max-width: 1903px) {
                    margin-left: 0px;
                }
                @media screen and (max-width: 1263px) {
                    margin-top: 4px;
                }
                @media screen and (min-width: 600px) and (max-width: 767px) {
                    margin-left: -4px;
                }
                @media screen and (max-width: 599px) {
                    min-width: 24px !important;
                    min-height: 24px !important;
                    width: 24px !important;
                    height: 30x !important;
                    margin-top: 2px;
                    margin-left: 0px;
                }
            }

            .card-holder-video {
                box-shadow: 0px 5px 20px rgba(0, 16, 131, 0.06);
                height: auto;
                width: 523px;
                @media screen and (max-width: 1903px) {
                    width: auto;
                }
                @media screen and (max-width: 599px) {
                    height: auto;
                    width: auto;
                }

                .btn-v_bar {
                    min-width: 30px !important;
                    min-height: 28px !important;
                    width: 30px !important;
                    height: 28px !important;
                    margin-left: 2px;
                    @media screen and (min-width: 1264px) and (max-width: 1903px) {
                        margin-left: 0px;
                    }
                    @media screen and (max-width: 1263px) {
                        margin-top: 4px;
                    }
                    @media screen and (min-width: 600px) and (max-width: 767px) {
                        margin-left: -4px;
                    }
                    @media screen and (max-width: 599px) {
                        min-width: 24px !important;
                        min-height: 24px !important;
                        width: 24px !important;
                        height: 30x !important;
                        margin-top: 2px;
                        margin-left: 0px;
                    }
                }
            }

            .vertical-line {
                border-left: 1px solid #e6e8fc;
                height: 50px;
                @media screen and (min-width: 600px) and (max-width: 767px) {
                    margin-left: -7px;
                }
            }

            .seekbar {
                border-radius: 10px !important;
            }

            .btn-skill-action {
                border-radius: 5px !important;
                min-width: 30px !important;
                min-height: 30px !important;
                width: 30px !important;
                height: 30px !important;
            }

            .action-col {
                margin-top: -10px;
                @media screen and (max-width: 599px) {
                    margin-top: 0px;
                }
            }

            .audio-controller {
                height: 40px !important;
            }
            .audio-controller:focus{
                outline: none;
            }
        }
    }

    .error {
        position: absolute;
        color: red;
        font-weight: 600;
        margin-left: 5px;
    }

    .label-or {
        margin-top: 25px;
        font-family: "Noto Sans" !important;
        font-weight: 500;
        font-size: 16px !important;
        line-height: 22px;
        color: #888db1 !important;
        margin-left: -16px;
        @media screen and (max-width: 599px) {
            margin-left: 0px;
        }
    }

    .dropzone-custom-content {
        margin-left: -18%;
        @media screen and (min-width: 1366px) and (max-width: 1903px) {
            margin-left: -15%;
        }
        @media screen and (min-width: 1264px) and (max-width: 1365px) {
            margin-left: -13%;
        }
        @media screen and (min-width: 960px) and (max-width: 1263px) {
            margin-left: -22%;
        }
        @media screen and (min-width: 600px) and (max-width: 767px) {
            margin-left: -8%;
        }
        @media screen and (min-width: 394px) and (max-width: 599px) {
            margin-left: -21% !important;
        }
    }

    .dropzone.dz-clickable {
        border: 2px solid #c4c9f5 !important;
        min-height: 48px !important;
        height: 48px !important;
        border: 2px solid #c4c9f5;
        border-radius: 10px;
        overflow: hidden !important;
    }

    .upload-text {
        font-family: "Noto Sans" !important;
        font-weight: 500;
        font-size: 18px;
        line-height: 25px;
        color: #888db1 !important;
        margin-top: 1px;
    }

    .fade-enter-active,
    .fade-leave-active {
        transition: opacity 0.5s;
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
    {
        opacity: 0;
    }

    .input-group {
        margin-right: 15px;

        &:nth-child(4),
        &:last-child {
            margin-right: none;
        }

        .civie-textarea,
        .civie-dropzone {
            margin-bottom: 35.5px;
            height: auto;

            .v-input__control,
            .v-input__slot {
                height: 165px;
            }
        }

        &.files {
            .v-label {
                position: absolute;
            }

            .civie-dropzone {
                width: 100%;
            }
        }
    }
</style>

<style>
    @media screen and (max-width: 599px) {
        #resumeBuilder .v-input__prepend-outer {
            display: none !important;
        }
    }
</style>
<style lang="scss">
    // recorder styles not scoped
    @import "../../../../../sass/media-queries";

    @include lt-sm {
        .ar-player > .ar-player-bar > .ar-player__progress {
            width: 40px !important;
        }

        .ar-content, .ar-player {
            width: 300px !important;
        }
    }


    .ar-icon {
        border: 1px solid #001CE2 !important;
    }

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
</style>