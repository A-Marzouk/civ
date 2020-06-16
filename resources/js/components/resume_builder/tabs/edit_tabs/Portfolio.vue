<template>
    <div class="resume-builder__scroll" id="portfolio-tab">
        <div class="data-container">
            <v-card class="view-container resume-builder__scroll">
                <v-form
                    class="flex-form"
                    ref="form"
                >
                    <div class="input-group">
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
                            id="skills"
                            v-model="form.skills.value"
                            class="resume-builder__input civie-input"
                            outlined
                            label="Skills"
                            color="#001CE2"
                            :rules="form.skills.rules"
                        >
                        </v-text-field>
                    </div>
                    <div class="input-group">
                        <v-text-field
                            id="url"
                            v-model="form.url.value"
                            class="resume-builder__input civie-input"
                            outlined
                            label="URL"
                            color="#001CE2"
                            :rules="form.url.rules"
                        >
                        </v-text-field>
                        <v-text-field
                            id="software"
                            v-model="form.software.value"
                            class="resume-builder__input civie-input"
                            outlined
                            label="Software"
                            color="#001CE2"
                            :rules="form.software.rules"
                        >
                        </v-text-field>
                    </div>

                    <div class="input-group">
                        <v-textarea
                            id="description"
                            v-model="form.description.value"
                            class="resume-builder__input civie-textarea"
                            outlined
                            label="Description"
                            color="#001CE2"
                            :rules="form.description.rules"
                        ></v-textarea>
                    </div>
                    <div class="input-group files">
                        <!-- Using v-input classes -->
                        <div class="v-input v-text-field--outlined resume-builder__input theme--light v-text-field v-text-field--is-booted v-text-field--enclosed civie-dropzone">
                            <div class="v-input__control">
                                <div class="v-input__slot">
                                    <fieldset aria-hidden="true"></fieldset>
                                    <div class="v-text-field__slot">    
                                        <label class="v-label" for="">Upload Images</label>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <v-btn
                            class="resume-builder__btn civie-btn filled"
                            depressed
                        >Add New</v-btn>
                    </div>
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

        .flex-form {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 50px 46px;

            .input-group {
                width: 23.5%;
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
                        height: 100%;
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

                @include lt-md {
                    width: 48%;
                    margin-right: 0;
                    justify-content: space-between;
                }

                @include lt-sm {
                    width: 100%;
                    max-width: 100%;

                    .civie-btn {
                        width: 100%;
                    }
                }

            }
        }
    }
}
</style>
