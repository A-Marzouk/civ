<template>
    <div>

        <div class="btns-wrapper d-flex align-items-center">
            <router-link to="/resume-builder/edit/projects" class="btn outline" >
                <b>Cancel</b>
            </router-link>
        </div>

       <div class="steps-container">
           <div v-show="activeStep === 1" class="first-step mt-4">
               <div class="text-hint mb-3">Only use images that are greater than 500 pixels in both height and 300 pixels in width.</div>
               <div class="new-project-images">
                   <vue2Dropzone id="projects" :options="dropZoneOptions" :useCustomSlot=true v-on:vdropzone-file-added="handlingEvent" ref="newImages">
                       <svg-vue class="download-dropzone-icon" icon='download-dropzone-icon'></svg-vue>
                       <div class="text-blue">Upload image</div>
                   </vue2Dropzone>

                   <div class="d-flex align-items-center images-preview">
                       <div v-for="item in 3" :key="'preview-' + item" src="" alt="" class="project-image-preview"></div>
                   </div>


               </div>
           </div>

           <div v-show="activeStep === 2" class="second-step mt-4">
               <div class="new-project-form">
                   <div class="input-field">
                       <label for="projectName">
                           Project name <br/><span style="opacity:0.5; font-size:13px;">You don’t have to use the project’s official title, but try to keep it brief.</span>
                       </label>
                       <input id="projectName" type="text" class="--blue">
                   </div>

                   <div class="input-field">
                       <label for="projectDescription">
                           Description
                           <br/><span style="opacity:0.5; font-size:13px;">Give a quick primer of this project, and your involvement.</span>
                       </label>
                       <textarea rows="10" id="projectDescription" class="--blue"></textarea>
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
                       <input id="projectUrl" type="text" class="--blue">
                   </div>

                   <div class="input-field">
                       <label for="skils">
                           Skills used in this project
                           <br/><span style="opacity:0.5; font-size:13px;">What skills did you put to use for this project?</span>
                       </label>
                       <input id="skils" type="text" class="--blue">
                   </div>

                   <div class="input-field">
                       <label for="software">
                           Software used in this project
                           <br/><span style="opacity:0.5; font-size:13px;">Give a quick primer of this project, and your involvement</span>
                       </label>
                       <input id="software" type="text" class="--blue">
                   </div>
               </div>
           </div>
       </div>

       <div class="d-flex  align-items-center">
            <a class="btn filled" href="javascript:void(0)">
                <svg-vue class="save-icon icon" icon="save-icon"></svg-vue>
                Save all information
            </a>
            <div class="d-flex">
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
                    maxFiles:4,
                    acceptedFiles: 'image/*'
                },
                newProject:{
                    images:[],
                },
                activeStep:1
            }
        },
        methods:{
            handlingEvent: function (file) {
                console.log(file);
                if(this.newProject.images.length < 4){
                    this.newProject.images.push(file);
                }
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
            }

        }
    }
</script>

<style scoped lang="scss">
    $mainBlue: #001CE2;

    .step-indicator {
        margin-left: 142px;
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

    // step one styles :
    .new-project-images {
        max-width: 1048px;
        width: 100%;

        .dropzone {
            position: relative;
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

</style>
