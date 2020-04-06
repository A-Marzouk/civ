<template>
    <div class="certificates-section">
        <div class="add-certificate hideOnMd">
            <div class="upload-image">
                <label class="img-label">
                    Add Certificates
                </label>
                <vue2Dropzone class="upload-image-box d-flex justify-content-center align-items-center"
                    id="certificateDropzone"
                    :options="dropzoneOptions"
                    :useCustomSlot=true
                    v-on:vdropzone-file-added="handlingEvent"
                    v-on:vdropzone-thumbnail="thumbnail"
                    ref="newCertificate"
                >
                    <img src="/images/resume_builder/achievements/download.png" alt="download">
                    <div class="upload-text">
                        Upload image
                    </div>
                </vue2Dropzone>
                <div class="error" v-if="errors.new.file">
                    {{ Array.isArray(errors.new.file) ? errors.new.file[0] : errors.new.file}}
                </div>
            </div>
            <div class="certification-details-form">
                <div class="certification-input input-field">
                    <label for="title">Title</label>
                    <input type="text" id="title" v-model="addCertificateForm.title">
                    <div class="error" v-if="errors.new.title">
                        {{ Array.isArray(errors.new.title) ? errors.new.title[0] : errors.new.title}}
                    </div>
                </div>
                <div class="certification-input input-field">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" v-model="addCertificateForm.description"></textarea>
                    <div class="error" v-if="errors.new.description">
                        {{ Array.isArray(errors.new.description) ? errors.new.description[0] : errors.new.description}}
                    </div>
                </div>
                <div class="action-btns">
                    <div class="add-award-btn NoDecor">
                        <a href="javascript:void(0)" @click="addCertificate">
                            <img src="/images/resume_builder/work-ex/mark.png" alt="mark">
                            Add certificate now
                        </a>
                    </div>
                    <!--<div class="auto-import-btn NoDecor">-->
                        <!--<a href="javascript:void(0)">-->
                            <!--<img src="/images/resume_builder/work-ex/add-box.png" alt="add">-->
                            <!--Auto import-->
                        <!--</a>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
        <transition name='fadeCustom'>
            <div v-if='addNewCertificate' class="add-certificate showOnMd">
                <div class="upload-image">
                    <label class="img-label">
                        Add Certificates
                    </label>
                    <vue2Dropzone class="upload-image-box d-flex justify-content-center align-items-center"
                        id="certificateDropzone"
                        :options="dropzoneOptions"
                        :useCustomSlot=true
                        v-on:vdropzone-file-added="handlingEvent"
                        v-on:vdropzone-thumbnail="thumbnail"
                        ref="newCertificate"
                    >
                        <img src="/images/resume_builder/achievements/download.png" alt="download">
                        <div class="upload-text">
                            Upload image
                        </div>
                    </vue2Dropzone>
                    <div class="error" v-if="errors.new.file">
                        {{ Array.isArray(errors.new.file) ? errors.new.file[0] : errors.new.file}}
                    </div>
                </div>
                <div class="certification-details-form">
                    <div class="certification-input input-field">
                        <label for="title">Title</label>
                        <input type="text" v-model="addCertificateForm.title">
                        <div class="error" v-if="errors.new.title">
                            {{ Array.isArray(errors.new.title) ? errors.new.title[0] : errors.new.title}}
                        </div>
                    </div>
                    <div class="certification-input input-field">
                        <label for="description">Description</label>
                        <textarea name="description" v-model="addCertificateForm.description"></textarea>
                        <div class="error" v-if="errors.new.description">
                            {{ Array.isArray(errors.new.description) ? errors.new.description[0] : errors.new.description}}
                        </div>
                    </div>
                </div>
                <div class="action-btns">
                    <a class="btn btn-filled" href="javascript:void(0)" @click="addCertificate">
                        <img class='icon' src="/images/resume_builder/work-ex/mark.png" alt="mark">
                        Add certificate now
                    </a>
                    <a class="btn btn-outline" href="javascript:void(0)" @click="addNewCertificate = false">
                        Cancel
                    </a>
                    <!--<div class="auto-import-btn NoDecor">-->
                        <!--<a href="javascript:void(0)">-->
                            <!--<img src="/images/resume_builder/work-ex/add-box.png" alt="add">-->
                            <!--Auto import-->
                        <!--</a>-->
                    <!--</div>-->
                </div>
            </div>
        </transition>
        <div class="add-certificate-btn showOnMd">
            <div v-show='!addNewCertificate' class="btn-wrapper">
                <a class="btn btn-filled" href="javascript:void(0)" @click="addNewCertificate = true">
                    <img class='icon' src="/images/resume_builder/work-ex/mark.png" alt="mark">
                    Add certificate now
                </a>
            </div>
        </div>
        <div class="certifications-list" v-if="achievements">
            <div class="certification-item mt-5"  v-for="(achievement,index) in achievements" :key="index + '_achievements'">
                <div class="certification-preview">
                    <img :src="achievement.image_src" alt="certification-preview">
                </div>
                <div class="certification-details">
                    <div class="title">
                        {{achievement.title}}
                    </div>
                    <div class="description">
                        {{achievement.description}}
                    </div>
                    <div class="optionsBtns showOnMd">
                        <!-- <a href="">
                            <svg-vue class='icon' :icon="'edit-icon'"></svg-vue>
                        </a> -->

                        <a href="javascript:;" @click="deleteCertificate(achievement)">
                            <svg-vue class='icon' :icon="'trash-delete-icon'"></svg-vue>
                        </a>
                    </div>
                    <div class="options hideOnMd">
                        <div class="options-btn NoDecor"
                             @click="optionAchievementId === achievement.id ? optionAchievementId=0 : optionAchievementId=achievement.id">
                            <a href="javascript:void(0)" :class="{'opened':optionAchievementId === achievement.id}">
                                Options
                                <img src="/images/resume_builder/arrow-down.png" alt=""
                                     :class="{'optionsOpened':optionAchievementId === achievement.id}">
                            </a>
                        </div>
                        <div class="extended-options" v-show="optionAchievementId === achievement.id"
                             :class="{'opened':optionAchievementId === achievement.id}">
                            <!--<div class="edit-btn NoDecor" @click="editAchievement(achievement)">-->
                                <!--<img src="/images/resume_builder/edit-icon.png" alt="edit icon">-->
                                <!--Edit-->
                            <!--</div>-->
                            <div class="delete-btn NoDecor" @click="deleteCertificate(achievement)">
                                <img src="/images/resume_builder/delete-icon.png" alt="delete icon">
                                Delete
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:['achievements'],
    data: () => ({
        optionAchievementId: 0,
        editedAchievement: {},
        showInputHelpers: false,
        addNewCertificate: false,
        errors: {
            new: {},
            edit: {}
        },
        addCertificateForm: {
            category: 'certificates',
            title: '',
            description: '',
            file: null
        },
        dropzoneOptions: {
            url: 'https://httpbin.org/post',
            thumbnailWidth: 150,
            uploadMultiple: false,
            maxFilesize: 25,
            addRemoveLinks: true,
            maxFiles: 1,
            autoProcessQueue: false,
            acceptedFiles: 'application/pdf, image/*',
            previewTemplate: `
            <div class="dz-preview dz-file-preview">
                <div class="dz-image">
                    <div class="thumbnail" data-dz-thumbnail-bg></div>
                </div>
                <div class="dz-details">
                    <div class="dz-size"><span data-dz-size></span></div>
                    <div class="dz-filename"><span data-dz-name></span></div>
                </div>
            </div>
        `
        },
        previewFile: null
    }),
    methods: {
        handlingEvent: function (file) {
            if (file.type === 'application/pdf') {

                // Set default bg for pdf files
                let thumbnail = document.querySelector('.thumbnail');

                // create the file URL to embembed
                let fileURL = URL.createObjectURL(file);
                let embedElement = document.createElement('embed');

                embedElement.type = file.type;
                embedElement.src = fileURL;


                thumbnail.style.background = `url(${fileURL})`;
                thumbnail.appendChild(embedElement);
            }

            this.addCertificateForm.file = file
        },
        thumbnail: function(file, dataUrl) {
            var j, len, ref, thumbnailElement;

            if (file.previewElement) {
                file.previewElement.classList.remove("dz-file-preview");
                ref = file.previewElement.querySelectorAll("[data-dz-thumbnail-bg]");

                for (j = 0, len = ref.length; j < len; j++) {
                    thumbnailElement = ref[j];
                    thumbnailElement.alt = file.name;
                    thumbnailElement.style.backgroundImage = 'url("' + dataUrl + '")';
                }

                return setTimeout(((function(_this) {
                    return function() {
                        return file.previewElement.classList.add("dz-image-preview");
                    };
                })(this)), 1);
            }
        },
        addCertificate () {
            // Axios request here
            this.errors= { new: {}, edit: {}};
            let formData = new FormData();
            $.each(this.addCertificateForm, (field) => {
                formData.append(field, this.addCertificateForm[field])
            });

            axios.post('/api/user/achievements', formData)
                .then((response) => {
                    let addedAchievement = response.data.data;
                    this.$emit('achievementAdded',addedAchievement);
                    this.$store.dispatch('fullScreenNotification');
                    this.clearCertificate();
                })
                .catch((error) => {
                    if (typeof error.response.data === 'object') {
                        this.errors.new = error.response.data.errors;
                    } else {
                        this.errors.new  = 'Something went wrong. Please try again.';
                    }
                    this.$store.dispatch('flyingNotification',{message:'Error',iconSrc:'/images/resume_builder/error.png'});

                });
        },
        clearCertificate(){
            this.addCertificateForm = {
                category: 'certificates',
                title: '',
                description: '',
                file: null
            };
            this.$refs.newCertificate.removeAllFiles();
        },
        deleteCertificate(achievement){
            console.log('delete');
            this.$emit('achievementDeleted', achievement);
        }
    }
}
</script>

<style lang="scss" scoped>
    $activeColor: #001CE2;
    @import '../../../../../../sass/media-queries';

    .certificates-section{
        margin-top: 72.5px;

        .add-certificate{
            display: flex;
            justify-content: flex-start;

            .upload-image{
                display: flex;
                flex-direction: column;
                margin-right: 45px;
                .img-label{
                    font-family: "Noto Sans", serif;
                    font-weight: 600;
                    font-size: 22px;
                    text-align: left;
                    color: #505050;
                    margin-bottom: 12px;
                }
                .upload-image-box{
                    width:412px;
                    height:518px;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    border: 2px solid #505050;
                    border-radius: 10px;
                    img{
                        width:95px;
                        height:89px;
                    }
                    .upload-text{
                        font-family: "Noto Sans", serif;
                        font-weight: bold;
                        font-size: 30px;
                        letter-spacing: 0.02em;
                        line-height: 67px;
                        text-align: left;
                        color: #747474;
                    }
                }
            }

            .certification-details-form{
                margin-top: 37px;
                .certification-input{
                    display: flex;
                    flex-direction: column;
                    margin-bottom: 33px;
                    input,textarea {
                        width: 807px;
                        height: 76px;
                        border: 2px solid #505050;
                        border-radius: 10px;
                        opacity: 1;
                        padding-left: 18px;
                    }
                    textarea{
                        padding-top: 18px;
                        height: 190px;
                    }
                    input:focus,textarea:focus {
                        outline: none;
                    }

                    label {
                        text-align: left;
                        font: 600 22px Noto Sans;
                        letter-spacing: 0;
                        color: #505050;
                        opacity: 1;
                    }
                }

                .action-btns{
                    display: flex;
                    .add-award-btn{
                        margin-right: 20px;
                        a {
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            width: 256px;
                            height: 62px;

                            background: #001CE2 0% 0% no-repeat padding-box;
                            border-radius: 8px;

                            font: 600 19px Noto Sans;
                            letter-spacing: 0;
                            color: #FFFFFF;
                            opacity: 1;

                            img {
                                width: 27px;
                                height: 27px;
                                margin-right: 10px;
                            }
                        }

                        a.short{
                            width:163px;
                        }
                    }

                    .auto-import-btn{
                        a {
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            width: 226px;
                            height: 62px;

                            border: 2px solid #001CE2;
                            border-radius: 8px;
                            opacity: 1;

                            font: 600 19px Noto Sans;
                            letter-spacing: 0;
                            color: #001CE2;

                            img {
                                width: 27px;
                                height: 27px;
                                margin-right: 10px;
                            }
                        }
                    }
                }
            }
        }
    }

    #certificateDropzone {
        position: relative;

        .dz-preview {
            width: 100%;
            height: 100%;
            background: none;
            display: flex;
            justify-content: center;
            align-items: center;

            .dz-details {
                padding: 50px 10px;
                height: 45%;
                display: none;
                top: auto;
                bottom: 0;
                border-radius: 5px;
                background: rgba($color: $activeColor, $alpha: .8);
            }

            .dz-progress {
                bottom: 70px;
                top: auto;
            }

            .dz-error-mark,
            .dz-success-mark {
                bottom: 40px;
            }

            .dz-image {
                background: none;
                z-index: 3;
                border-radius: 0;
                display: flex;
                justify-content: center;
                align-items: center;

                .thumbnail {
                    width: 100%;
                    height: 50%;
                    overflow: hidden;
                    background-position: center ;
                }
                
                embed {
                    width: calc(100% + 15px);
                    height: 100%;
                    overflow:hidden !important;
                }
            }

            .dz-remove {
                bottom: 20px;
                top: auto;
                border-radius: 5px;
                margin: 0;
                color: $activeColor;
                border-color: $activeColor;
            }
        }

        .dz-image img {
            width: 100%;
            height: auto;
        }

        .dz-image-preview .dz-details,
        .dz-preview .dz-details {
            // background: rgba($color: $activeColor, $alpha: .8);
            // background: none;
        }
    }

    .certification-input {
        position: relative;
    }

    .certifications-list{
        margin-top: 85px;
        max-width: 920px;
        width: 100%;
        display: flex;
        flex-wrap: wrap;

        .certification-item{
            display: flex;
            position:relative;
            justify-content: space-between;
            width: 100%;

            @include lt-md {
                flex-direction: column;
                width: 48%;
                margin-right: 10px;
            }

            @include lt-sm {
                width: 100%;
                margin-right: 0;
            }

            .certification-preview{
                width: 45%;

                @include lt-md {
                    width: 100%;
                }

                img{
                    max-width: 376px;
                    width: 100%;
                    height: auto;
                    margin-right: 36px;

                    @include lt-md {
                        margin: 0 auto;
                    }
                }
            }

            .certification-details{
                display: flex;
                flex-direction: column;
                width: 50%;

                @include lt-md {
                    width: 100%;
                    margin-top: 1rem;
                }

                .title{
                    font-family: "Noto Sans",serif;
                    font-weight: 600;
                    font-size: 30px;
                    text-align: left;
                    color: #001ce2;
                    margin-bottom: 30px;

                    @include lt-md {
                        font-size: 19px;
                    }

                    @include lt-sm {
                        font-size: 16px;
                    }
                }

                .description{
                    font-family: "Noto Sans",serif;
                    font-weight: 500;
                    font-size: 18px;
                    text-align: left;
                    color: #001ce2;

                    @include lt-md {
                        font-size: 14px;
                    }

                    @include lt-sm {
                        font-size: 12px;
                    }
                }
            }

            .options {
                position: absolute;
                right: 14px;
                top: 0;

                .options-btn {
                    a {
                        width: 88px;
                        height: 29px;

                        display: flex;
                        justify-content: center;
                        align-items: center;

                        background: #FFFFFF 0 0 no-repeat padding-box;
                        border: 1px solid #505050;
                        border-radius: 5px;
                        opacity: 1;

                        font: 600 13px Noto Sans;
                        letter-spacing: 0;
                        color: #505050;

                        img {
                            width: 13.3px;
                            height: 6.8px;
                            margin-left: 8px;
                        }

                        img.optionsOpened {
                            -webkit-transform: scaleY(-1);
                            transform: scaleY(-1);
                        }
                    }

                    a.opened {
                        border: 1px solid #1F5DE4;
                    }

                    a:focus {
                        outline: none !important;
                        box-shadow: none !important;
                    }
                }

                .extended-options {
                    background: #FFFFFF 0 0 no-repeat padding-box;
                    border: 1px solid #505050;
                    border-radius: 5px;
                    opacity: 1;
                    margin-top: 8px;
                    width: 88px;
                    height: 45px;
                    padding-top: 5px;
                    padding-left: 8px;

                    .edit-btn, .delete-btn {
                        display: flex;
                        justify-content: flex-start;
                        align-items: center;
                        font: 600 13px Noto Sans;
                        letter-spacing: 0;
                        color: #505050;

                        img {
                            width: 15.75px;
                            height: 14px;
                            margin-right: 6px;
                        }

                        &:hover {
                            cursor: pointer;
                        }
                    }

                    .delete-btn {
                        margin-top: 8px;

                        img {
                            width: 10.89px;
                            height: 14px;
                            margin-right: 9.5px;
                        }
                    }
                }

                .extended-options.opened {
                    border: 1px solid #1F5DE4;
                }
            }
        }
    }

    .error {
        color: red;
        font-weight: 500;
        margin-left: 5px;
    }
</style>
