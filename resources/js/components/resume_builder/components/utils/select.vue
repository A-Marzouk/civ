<template>
    <v-select
        class="resume-builder__input civie-select"
        outlined
        placeholder="Select an option"
        :items="items"
        label="Select a profession"
        color="#001CE2"
    >
        <button
            v-if="selectProps.showToggleSelectIcon"
            class="dropdown-icon icon"
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
        items: [
            {
                text: 'Fullstack Developer',
                value: 'fullstack_dev'
            },
            {
                text: 'Backend Developer',
                value: 'backend_dev'
            },
            {
                text: 'Frontend Developer',
                value: 'frontend_dev'
            },
            {
                text: 'Data Sciencist',
                value: 'data_scientist'
            }
        ]
    }),
    props: ['selectProps'],
    methods: {
        toggleSelect () {
            this.disabledSelect = !this.disabledSelect
        }
    }
}
</script>