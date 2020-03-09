<template>
    <div class="certificates-section">
        <div class="add-certificate">
            <div class="upload-image">
                <div class="img-label">
                    Add Certificates
                </div>
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
            </div>
            <div class="certification-details-form">
                <div class="certification-input">
                    <label for="title">Title</label>
                    <input type="text" id="title" v-model="addCertificateForm.title">
                    <div class="text-animation title"></div>
                </div>
                <div class="certification-input">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" v-model="addCertificateForm.description"></textarea>
                    <div class="text-animation description"></div>
                </div>
                <div class="action-btns">
                    <div class="add-award-btn NoDecor">
                        <a href="javascript:void(0)">
                            <img src="/images/resume_builder/work-ex/mark.png" alt="mark">
                            Add certificate now
                        </a>
                    </div>
                    <div class="auto-import-btn NoDecor">
                        <a href="javascript:void(0)">
                            <img src="/images/resume_builder/work-ex/add-box.png" alt="add">
                            Auto import
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="certifications-list">
            <div class="certification-item"  v-for="(achievement,index) in achievements" :key="index + '_achievements'" v-show="achievement.category === 'certificates'">
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
                    <div class="options">
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
                            <div class="edit-btn NoDecor" @click="editAchievement(achievement)">
                                <img src="/images/resume_builder/edit-icon.png" alt="edit icon">
                                Edit
                            </div>
                            <div class="delete-btn NoDecor" @click="deleteAchievement(achievement)">
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
        errors: {
            new: {},
            edit: {}
        },
        addCertificateForm: {
            title: '',
            description: '',
            file: null
        },
        dropzoneOptions: {
            url: 'https://httpbin.org/post',
            thumbnailWidth: 150,
            uploadMultiple: false,
            maxFilesize: 0.5,
            addRemoveLinks: true,
            maxFiles: 1,
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
                <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                <div class="dz-error-message"><span data-dz-errormessage></span></div>
                <div class="dz-success-mark"><i class="fa fa-check"></i></div>
                <div class="dz-error-mark"><i class="fa fa-close"></i></div>
            </div>
        `
        },

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
        saveFile () {
            let titleAnimationBlock = document.querySelector('.text-animation.title');
            let descriptionAnimationBlock = document.querySelector('.text-animation.description');

            titleAnimationBlock.innerHTML = this.addCertificateForm.title;
            descriptionAnimationBlock.innerHTML = this.addCertificateForm.description

            // move to top using z-index

            titleAnimationBlock.style.zIndex = 1;
            descriptionAnimationBlock.style.zIndex = 1;


        }
    }
}
</script>

<style lang="scss">
    $activeColor: #001CE2;

    #certificateDropzone {
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

    .text-animation {
        position: absolute;
        bottom: 0;
        width: 807px;
        height: 76px;
        z-index: -1;

        &.description {
            height: 190px;
        }
    }

    .certifications-list{
        margin-top: 85px;
        .certification-item{
            display: flex;
            position:relative;
            .certification-preview{
                img{
                    width: 376px;
                    height: 290px;
                    margin-right: 36px;
                }
            }

            .certification-details{
                display: flex;
                flex-direction: column;
                .title{
                    font-family: "Noto Sans",serif;
                    font-weight: 600;
                    font-size: 30px;
                    text-align: left;
                    color: #001ce2;
                    margin-bottom: 30px;
                }

                .description{
                    font-family: "Noto Sans",serif;
                    font-weight: 500;
                    font-size: 18px;
                    text-align: left;
                    color: #001ce2;
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
                    height: 60px;
                    padding-top: 7px;
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
</style>
