<template>
    <v-input
      class="resume-builder__input civie-dropzone"
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
</template>

<script>
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
export default {
  name: 'Dropzone',
  components: {
    vueDropzone: vue2Dropzone
  },
  data: function () {
    return {
      dropzoneOptions: {
          url: 'https://httpbin.org/post',
          thumbnailWidth: 150,
          maxFilesize: 0.5,
      }
    }
  }
}
</script>