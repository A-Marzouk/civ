<template>
    <v-select
        class="resume-builder__input civie-select"
    >
        <button
            v-if="selectProps.showToggleSelectIcon"
            class="dropdown-icon icon"
            :class="{'icon--disabled': disabledSelect}"
            slot="append"
            @click="toggleSelect"
        >
        <svg-vue
            :icon="`dropdown-caret`"
        ></svg-vue>
    </button>
    </v-select>
</template>

<script>
import 'vuetify/dist/vuetify.min.css'

export default {
    name: "ResumeBuilderSelect",
    data: () => ({
        rules: [
            value => !!value || 'Please fill this field.',
        ],
        disabledSelect: false
    }),
    props: ['selectProps'],
    methods: {
        toggleSelect () {
            this.disabledSelect = !this.disabledSelect
        }
    }
}
</script>