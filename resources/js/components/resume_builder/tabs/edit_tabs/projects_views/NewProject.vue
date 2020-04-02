<template>
    <div>

       <div class="steps-container">
           <div v-show="activeStep === 2" class="first-step mt-4">
               <div class="text-hint mb-3">
                   Please use images that are greater than 500 pixels in both height and 300 pixels in width. (Max of 5 images)
               </div>
               <div class="new-project-images">
                   <vue2Dropzone id="projects" :options="dropZoneOptions" :useCustomSlot=true v-on:vdropzone-file-added="handlingEvent" ref="newImages">
                       <svg-vue class="download-dropzone-icon" icon='download-dropzone-icon'></svg-vue>
                       <div class="text-blue">Upload image</div>
                   </vue2Dropzone>

                   <a class="btn outline mt-3 mb-3 remove-btn" href="javascript:void(0)" @click="removeFiles">
                       Remove all files
                   </a>
               </div>
           </div>

           <div v-show="activeStep === 1" class="second-step mt-4">
               <div class="new-project-form">
                   <div class="input-field">
                       <label for="projectName">
                           Project name <br/><span style="opacity:0.5; font-size:13px;">You don’t have to use the project’s official title, but try to keep it brief.</span>
                       </label>
                       <input id="projectName" type="text" class="--blue" v-model="newProject.name">
                       <div class="error" v-if="errors.new.name">
                           {{ Array.isArray(errors.new.name) ? errors.new.name[0] : errors.new.name}}
                       </div>
                   </div>

                   <div class="input-field">
                       <label for="projectDescription">
                           Description
                           <br/><span style="opacity:0.5; font-size:13px;">Give a quick primer of this project, and your involvement.</span>
                       </label>
                       <textarea rows="10" id="projectDescription" class="--blue" v-model="newProject.description"></textarea>
                       <div class="error" v-if="errors.new.description">
                           {{ Array.isArray(errors.new.description) ? errors.new.description[0] : errors.new.description}}
                       </div>
                   </div>
               </div>
           </div>

           <div v-show="activeStep === 3" class="third-step mt-4">
               <div class="new-project-form">
                   <div class="input-field">
                       <label for="projectName">
                           Project URL
                           <br/><span style="opacity:0.5; font-size:13px;">Is there an active link where this project can be viewed without a password?</span>
                       </label>
                       <input id="projectUrl" type="text" class="--blue" v-model="newProject.link">
                       <div class="error" v-if="errors.new.link">
                           {{ Array.isArray(errors.new.link) ? errors.new.link[0] : errors.new.link}}
                       </div>
                   </div>

                   <div class="input-field">
                       <label for="skils">
                           Skills used in this project
                           <br/><span style="opacity:0.5; font-size:13px;">What skills did you put to use for this project?</span>
                       </label>
                       <input id="skils" type="text" class="--blue" v-model="newProject.skills">
                       <div class="error" v-if="errors.new.skills">
                           {{ Array.isArray(errors.new.skills) ? errors.new.skills[0] : errors.new.skills}}
                       </div>
                   </div>

                   <div class="input-field">
                       <label for="software">
                           Software used in this project
                           <br/><span style="opacity:0.5; font-size:13px;">Give a quick primer of this project, and your involvement</span>
                       </label>
                       <input id="software" type="text" class="--blue" v-model="newProject.software">
                       <div class="error" v-if="errors.new.software">
                           {{ Array.isArray(errors.new.software) ? errors.new.software[0] : errors.new.software}}
                       </div>
                   </div>
               </div>
           </div>
       </div>

       <div class="d-flex align-items-center justify-content-between ctrls-wrapper" style="max-width:1048px;">
            <div class="d-flex btns-wrapper">
                <a class="btn btn-filled" href="javascript:void(0)" @click="addNewProject" :class="{'disabled-btn': !canSubmit()}">
                    <svg-vue class="save-icon icon" icon="save-icon"></svg-vue>
                    Add Project
                </a>
                <router-link to="/resume-builder/edit/projects" class="btn outline ml-3" >
                    <b>Cancel</b>
                </router-link>
            </div>
            <div class="d-flex indicator-wrapper">
                <div  class="step-indicator">
                    <a href="javascript:void(0)" @click="stepBack">
                        <svg-vue class="step-arrow-icon" icon="left-arrow-icon"></svg-vue>
                    </a>
                    <span @click="goToStep(step)" class="step-dot" :class="{active: step === activeStep}" v-for="step in 3"
                          :key="step + 'step'"></span>
                    <a href="javascript:void(0)" @click="stepNext">
                        <svg-vue class="step-arrow-icon" icon="right-arrow-icon"></svg-vue>
                    </a>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "NewProject",
        data(){
            return{
                dropZoneOptions: {
                    url: 'https://httpbin.org/post',
                    thumbnailWidth: 150,
                    maxFilesize: 25,
                    maxFiles:5,
                    acceptedFiles: 'image/*',
                    addRemoveLinks:true,
                },
                newProject:{
                    images:[],
                    name:'',
                    description:'',
                    link:'',
                    skills:'',
                    software:'',
                },
                activeStep:1,
                errors:{
                    new:{},
                    edit:{}
                }
            }
        },
        methods:{
            handlingEvent: function (file) {
                if(this.newProject.images.length < 5){
                    this.newProject.images.push(file);
                }
            },
            removeFiles(){
              this.newProject.images = [];
                this.$refs.newImages.removeAllFiles();
            },
            stepNext(){
                if(this.activeStep < 3){
                    this.activeStep++;
                }
            },
            stepBack(){
                if(this.activeStep > 1){
                    this.activeStep--;
                }
            },
            goToStep(step){
                this.activeStep = step ;
            },

            addNewProject(){
                if(!this.canSubmit()){
                    return;
                }
                this.errors = {  new: {}, edit: {}};
                let formData = new FormData();

                $.each(this.newProject, (field) => {
                    if(this.newProject[field].length && field !== 'images'){
                        formData.append(field, this.newProject[field]);
                    }
                });

                this.newProject.images.forEach( (image) => {
                    formData.append('images[]', image);
                });

                axios.post('/api/user/projects', formData, {headers:{'Content-Type': 'multipart/form-data'}})
                    .then((response) => {
                        this.clearProject();
                        this.$store.dispatch('fullScreenNotification');
                        this.$store.state.user.projects.push(response.data.data);
                        this.$router.replace('/resume-builder/edit/projects');
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
            clearProject(){
                this.newProject = {
                    images:[],
                        name:'',
                        description:'',
                        link:'',
                        skills:'',
                        software:''
                };
                this.$refs.newImages.removeAllFiles();
            },
            canSubmit(){
                let canSubmit = true;

                $.each(this.newProject, (field) => {
                    if(!this.newProject[field].length){
                       canSubmit = false;
                    }
                });

                return canSubmit ;
            }

        },
        mounted(){
        }
    }
</script>

<style scoped lang="scss">
    @import '../../../../../../sass/media-queries';
    $mainBlue: #001CE2;


    .ctrls-wrapper {
        
        @include lt-md {
            flex-wrap: wrap;

            div {
                width: 100%;
            }
        }

        .btns-wrapper {
            @include lt-md {
                justify-content: space-between;

                .btn {
                    width: 48%;
                    min-width: 200px;
                }
            }
        }

        .indicator-wrapper {
            margin-left: 24px;

            @include lt-md {
                margin-left: 0;
                margin-top: 3rem;
                justify-content: center;
            }
    
            .step-indicator {
                display: flex;
                align-items: center;
                justify-content: space-between;
                width: 300px;
        
                .step-arrow-icon {
                    height: 22px;
        
                    &:hover {
                        cursor: pointer;
                    }
                }
        
                .step-dot {
                    border-radius: 50%;
                    width: 22px;
                    height: 22px;
                    display: block;
                    background: #C9CFF8;
                    transition: all .5s ease;
        
                    &.active {
                        background: #001CE2;
                        transition: all .5s ease;
                    }
        
                    &:hover {
                        cursor: pointer;
                    }
                }
            }
        }
    }

    // step one styles :
    .new-project-images {
        max-width: 1048px;
        width: 100%;

        .dropzone {
            position: relative;
            overflow: auto;
            height: 588px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: white;

            .download-dropzone-icon {
                height: 88px;
            }

            .text-blue {
                font-family: "NexaBold", Arial, Helvetica, sans-serif;
                font-size: 30px;
            }
        }

        .images-preview {
            margin: 27px 0 25px;

            .project-image-preview {
                margin-right: 109px;
                height: 86px;
                width: 101px;
                border: solid 1px $mainBlue;

                &:last-child {
                    margin: 0;
                }
            }
        }
    }

    // step three styles:




    .new-project-form {
        max-width: 1048px;
        width: 100%;

        @include lt-md {
            .input-field {
                width: 100%;
                max-width: 100%;

                input,
                textarea {
                    width: 100%;
                    max-width: 100%;
                }
            }
        }
    }

    .icon-container {
        display: block;
        border-radius: 5px;
        background: white;
        width: 27px;
        height: 27px;
        margin-right: 21px;
    }

    .checkmark-icon {
        height: 12px;

        path {
            fill: $mainBlue !important;
            height: 12px;
        }
    }

    // container

    .steps-container{
        max-width:1048px;
    }


    .disabled-btn{
        opacity: .5;
        border: none !important;
        &:hover{
            cursor: not-allowed;
        }
    }

    .input-field{
        textarea,input{
            color: black;
        }
    }

    .remove-btn{
        width: fit-content;
    }
</style>
