<template>
    <v-text-field
        class="resume-builder__input"
        v-bind="inputProps"
        :outlined="inputProps.outlined || true"
        :color="inputProps.color || '#001CE2'"
        :rules="[inputProps.rules]"
        :class="{'resume-builder__input--disabled': disabledInput}"
        :disabled="disabledInput"
    >
        <button
            v-if="inputProps.showToggleInputIcon"
            class="tick-icon trigger-icon"
            :class="{'icon--disabled': disabledInput}"
            slot="append"
            @click="toggleInput"
        >
            <svg-vue
                :icon="`tick-icon`"
            ></svg-vue>
        </button>
    </v-text-field>
</template>

<script>
import 'vuetify/dist/vuetify.min.css'

export default {
    name: "ResumeBuilderInput",
    data: () => ({
        rules: {
            required: value => !!value || 'Please fill this field.',
        },
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

<style lang="scss">

</style>