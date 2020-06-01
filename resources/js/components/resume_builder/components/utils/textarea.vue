<template>
    <v-textarea
        class="resume-builder__input"
        v-bind="textareaProps"
        :outlined="textareaProps.outlined || true"
        :color="textareaProps.color || '#001CE2'"
        :rules="textareaProps.rules !== undefined || rules"
        :class="{'resume-builder__input--disabled': disabledTextarea}"
        :disabled="disabledTextarea"
    >
        <button
            v-if="textareaProps.showToggleTextareaIcon"
            class="tick-icon trigger-icon"
            :class="{'icon--disabled': disabledTextarea}"
            slot="append"
            @click="toggleTextarea"
        >
            <svg-vue
                :icon="`tick-icon`"
            ></svg-vue>
        </button>
    </v-textarea>
</template>

<script>
import 'vuetify/dist/vuetify.min.css'

export default {
    name: "ResumeBuilderTextarea",
    data: () => ({
        rules: [
            value => !!value || 'Please fill this field.',
        ],
        disabledTextarea: false
    }),
    props: ['textareaProps'],
    methods: {
        toggleTextarea () {
            this.disabledTextarea = !this.disabledTextarea
        }
    }
}
</script>

<style lang="scss">
$mainColor: #001CE2;
$disabledColor: #888DB1;
$errorColor: #ff5252;
$inputTextColor: #888DB1;
$inputBorderColor--enabled: #C4C9F5;
$inputBorderColor--disabled: #E6E8FC;
</style>