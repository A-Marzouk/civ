<template>
    <div class="resume-builder__scroll" id="portfolio-tab">
        <div class="data-container">
            <v-card class="view-container resume-builder__scroll">
                <v-form
                    class="gird-form"
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
                        class="resume-builder__input civie-dropzone v-text-field v-text-field--outlined v-text-field--is-booted v-text-field--enclosed theme--light"
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

        .gird-form {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-auto-rows: 104px;
            grid-gap: 15px;
            padding: 50px 46px;
            height: 300px;

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
    }
}
</style>
