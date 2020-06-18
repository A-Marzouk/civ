<template>
    <div class="resume-builder__scroll" id="portfolio-tab">
        <div class="data-container">
            <v-card class="view-container resume-builder__scroll">
                <v-form
                    class="grid-form"
                    ref="form"
                >
                    <v-text-field
                        id="projectName"
                        v-model="form.projectName.value"
                        class="resume-builder__input civie-input"
                        outlined
                        label="Project Name"
                        color="#001CE2"
                        :rules="form.projectName.rules"
                    >
                    </v-text-field>
                    <v-text-field
                        id="url"
                        v-model="form.url.value"
                        class="resume-builder__input civie-input"
                        outlined
                        label="URL"
                        hint="(Active link of the project)"
                        color="#001CE2"
                        :rules="form.url.rules"
                    >
                    </v-text-field>                    
                    <v-textarea
                        id="description"
                        v-model="form.description.value"
                        class="resume-builder__input civie-textarea"
                        outlined
                        label="Description"
                        color="#001CE2"
                        :rules="form.description.rules"
                    ></v-textarea>
                    <!-- Using v-input classes -->
                    <v-input
                        class="resume-builder__input civie-dropzone v-text-field v-text-field--outlined v-text-field--enclosed"
                        outlined
                        label="Upload Images"
                        hint="(Maximum 5 files)"
                    >
                        <vue-dropzone
                            class="civie-dropzone-input"
                            ref="myVueDropzone"
                            id="dropzone"
                            :options="dropzoneOptions"
                            :useCustomSlot="true"
                        >
                            <div class="dropzone-custom-content">
                                <svg-vue class="icon" :icon="'upload-input-icon'"></svg-vue>
                            </div>
                        </vue-dropzone>
                    </v-input>
                    <v-text-field
                        id="skills"
                        v-model="form.skills.value"
                        class="resume-builder__input civie-input"
                        outlined
                        label="Skills"
                        hint="(Skills you use in the project)"
                        color="#001CE2"
                        :rules="form.skills.rules"
                    >
                    </v-text-field>
                    <v-text-field
                        id="software"
                        v-model="form.software.value"
                        class="resume-builder__input civie-input"
                        outlined
                        label="Software"
                        hint="(Software used for this project)"
                        color="#001CE2"
                        :rules="form.software.rules"
                    >
                    </v-text-field>
                    <v-btn
                        class="resume-builder__btn civie-btn filled"
                        depressed
                    >Add New</v-btn>
                </v-form>
                <div class="projects-list">
                    <div class="project">
                        <div class="project__header">
                            <v-btn
                                depressed
                                class="drag-and-drop-handler"
                            >
                                <svg-vue 
                                    :icon="'drag-and-drop-icon'"
                                    class="icon"
                                ></svg-vue>
                            </v-btn>
                            <div
                                class="resume-builder__action-buttons-container"
                            >
                                <v-btn
                                    class="btn-icon civie-btn"
                                    depressed
                                >
                                    <svg-vue
                                        icon="eye-icon"
                                        class="icon"
                                    ></svg-vue>
                                </v-btn>
                                <v-btn
                                    class="btn-icon civie-btn"
                                    depressed
                                >
                                    <svg-vue
                                        icon="edit-icon"
                                        class="icon"
                                    ></svg-vue>
                                </v-btn>
                                <v-btn
                                    class="btn-icon civie-btn"
                                    depressed
                                >
                                    <svg-vue
                                        icon="trash-delete-icon"
                                        class="icon"
                                    ></svg-vue>
                                </v-btn>
                            </div>
                        </div>
                        <div class="project__body">
                            <picture class="project__img">
                                <img 
                                    src="/images/new_resume_builder/portfolio/portfolio-img.png"
                                    alt="portfolio img">
                            </picture>
                            <div class="project__info">
                                <div class="project__name">My Personal Website</div>
                                <div class="project__url">
                                    <b>URL:</b> <a href="https://josedan10.github.io">https://josedan10.github.io</a>
                                </div>
                                <div class="project__skills">
                                    <b>Skills:</b> React.js
                                </div>
                                <div class="project__softwares">
                                    <b>Software:</b> VSCode, Github Pages
                                </div>
                                <div class="project__description">
                                    <b>Description: </b>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero qui distinctio temporibus ea voluptas impedit consequatur dolore ducimus earum illum velit ipsa perspiciatis maxime tenetur illo, tempora doloremque modi dolorem.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </v-card>
        </div>
    </div>
</template>

<script>
import vue2Dropzone from 'vue2-dropzone'

    export default {
        name: 'Portfolio',
        components: {
            vueDropzone: vue2Dropzone
        },
        data: () => ({
            form: {
                projectName: {
                    value: '',
                    rules: [
                        value => !!value || 'Please fill this field.',
                    ]
                },
                skills: {
                    value: '',
                    rules: [
                        value => !!value || 'Please fill this field.',
                    ]
                },
                url: {
                    value: '',
                    rules: [
                        value => !!value || 'Please fill this field.',
                    ]
                },
                software: {
                    value: '',
                    rules: [
                        value => !!value || 'Please fill this field.',
                    ]
                },
                description: {
                    value: '',
                    rules: [
                        value => !!value || 'Please fill this field.',
                    ]
                },
                uploadImages: {
                    value: '',
                    rules: [
                        value => !!value || 'Please fill this field.',
                    ]
                },
            },
            dropzoneOptions: {
                url: 'https://httpbin.org/post',
                thumbnailWidth: 150,
                maxFilesize: 0.5,
            }
        }),
        mounted() {

        },
    }
</script>

<style lang="scss">
@import '../../../../../sass/variables';
@import '../../../../../sass/media-queries';

#portfolio-tab {
    .view-container {
        max-height: 678px;
        overflow: auto;
        box-shadow: 0 5px 100px rgba($color: #001083, $alpha: 0.1);

        .grid-form {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-auto-rows: 104px;
            grid-gap: 15px;
            padding: 50px 46px;

            .resume-builder__input {
                column-span: 1;

                &.civie-textarea,
                &.civie-dropzone {
                    grid-row-start: 1;
                    grid-row-end: 3;
                    height: 100%;

                    .v-input__control,
                    .v-input__slot {
                        height: 100%;
                    }
                }

                &.civie-dropzone {
                    width: 100%;
                    grid-column-start: 4;
                }

                &.civie-textarea {
                    grid-column-start: 3;
                }

                .v-label {
                    position: absolute;
                }

                @include lt-md {
                    width: 48%;
                    margin-right: 0;
                    justify-content: space-between;
                }

                @include lt-sm {
                    width: 100%;
                    max-width: 100%;
                }

            }

            .civie-btn {
                align-self: start;
                justify-self: start;

                @include lt-sm {
                    align-self: stretch;
                    justify-self: stretch;
                }
            }
        }

        .projects-list {
            width:  100%;

            .project {
                max-width: 620px;
                width: 100%;
                box-shadow: 0px 5px 20px rgba(0, 16, 131, 0.06);
                background: white;
                min-height: 225px;
                padding: 10px 15px;
                margin-bottom: 20px;

                &__header {
                    display: flex;
                    justify-content: space-between;
                    width: 100%;

                    .drag-and-drop-handler {
                        background-color: $auxBgColor-gray;
                        border-radius: 5px;
                        height: 25px;
                        width: 25px;

                        // Reset default props of v-btn class
                        min-width: auto !important;
                        padding: 0 !important;

                        .icon {
                            height: 10px;
                            width: 3px;
                        }
                    }

                    .resume-builder__action-buttons-container {
                        .btn-icon {
                            width: 25px;
                            height: 25px !important;
                            
                        }
                    }
                }

                &__body {
                    margin-top: 10px;
                    display: flex;
                    justify-content: space-between;

                    .project__img {
                        img {
                            min-width: 220px;
                        }
                    }

                    .project__info {
                        margin-left: 20px;
                        margin-top: 14px;

                        .project {
                            &__name {
                                font-size: 24px;
                                font-weight: 700;
                                color: $mainColor;
                                margin-bottom: 10px;
                            }

                            &__url,
                            &__skills,
                            &__softwares,
                            &__description {
                                color: $inputTextColor;
                            }
                        }
                    }

                }
            }
        }
    }
}
</style>
