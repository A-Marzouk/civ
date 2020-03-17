<template>
    <form class="new-project-images">
        <vue2Dropzone
                id="projects"
                :options="dropzoneOptions"
                :useCustomSlot=true
                v-on:vdropzone-file-added="handlingEvent"
                ref="newImages"
        >
            <svg-vue class="download-dropzone-icon" icon='download-dropzone-icon'></svg-vue>
            <div class="text-blue">Upload image</div>
        </vue2Dropzone>

        <div class="d-flex align-items-center images-preview">
            <div v-for="item in 3" :key="'preview-' + item" src="" alt="" class="project-image-preview"></div>
        </div>

        <button class="btn filled" type="submit">
            <svg-vue class="save-icon icon" icon="save-icon"></svg-vue>
            Save all information
        </button>
    </form>
</template>
<script>
    export default {
        data() {
            return {
                dropzoneOptions: {
                    url: 'https://httpbin.org/post',
                    thumbnailWidth: 150,
                    maxFilesize: 25,
                    acceptedFiles: 'image/*'
                },
                newProject:{
                    images:[],

                }
            }
        },

        methods: {
            handlingEvent: function (file) {
                if(this.newProject.images.length > 2){
                    console.log('more than 2');
                    this.$refs.newImages.disable();
                    return;
                }
                console.log(file);
                this.newProject.images.push(file);
            },
        }
    }
</script>
<style scoped lang="scss">
    $mainBlue: #001CE2;
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
            margin: 27px 0 43px;

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
</style>
