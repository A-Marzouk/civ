<template>
    <v-text-field
        class="resume-builder__input civie-input"
        outlined
        color="#001CE2"
        :rules="rules"
        :class="{'resume-builder__input--disabled': disabledInput}"
        :disabled="disabledInput"
    >
        <button
            v-if="inputProps.showToggleInputIcon"
            class="eye-icon trigger-icon icon"
            :class="{'icon--disabled': disabledInput}"
            slot="append"
            @click="toggleInput"
        >
            <svg-vue
                :icon="`eye-icon`"
            ></svg-vue>
        </button>
    </v-text-field>
</template>

<script>
import 'vuetify/dist/vuetify.min.css'

export default {
    name: "ResumeBuilderInput",
    data: () => ({
        rules: [
            value => !!value || 'Please fill this field.',
        ],
        disabledInput: false
    }),
    props: ['inputProps'],
    methods: {
        toggleInput () {
            this.disabledInput = !this.disabledInput
        }
    }
}
</script>