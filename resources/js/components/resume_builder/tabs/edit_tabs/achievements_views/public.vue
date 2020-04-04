<template>
    <div class="certificates-section">
        <div class="add-certificate hideOnMd">
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
            <div class="certification-item"  v-for="(achievement,index) in achievements" :key="index + '_achievements'">
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
                        <a href="">
                            <svg-vue class='icon' :icon="'edit-icon'"></svg-vue>
                        </a>

                        <a href="">
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
            category: 'public_speaking',
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

            let formData = new FormData();
            $.each(this.addCertificateForm, (field) => {
                formData.append(field, this.addCertificateForm[field])
            });

            axios.post('/api/user/achievements', formData)
                .then((response) => {
                    let addedAchievement = response.data.data;
                    this.$emit('achievementAdded',addedAchievement);
                    this.$store.dispatch('fullScreenNotification');
                    this.clearPublic();
                })
                .catch((error) =>{
                    if (typeof error.response.data === 'object') {
                        this.errors.new = error.response.data.errors;
                    } else {
                        this.errors.new  = 'Something went wrong. Please try again.';
                    }
                    this.$store.dispatch('flyingNotification',{message:'Error',iconSrc:'/images/resume_builder/error.png'});

                });
        },
        clearPublic(){
            this.addCertificateForm ={
                category: 'public_speaking',
                title: '',
                description: '',
                file: null
            }
        },
        deleteCertificate(achievement){
            console.log('delete');
            this.$emit('achievementDeleted', achievement);
        }
    }
}
</script>

<style lang="scss" scoped>
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
</style>
