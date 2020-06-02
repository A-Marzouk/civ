<template>
    <v-app style="margin-top: 60px">
        <ResumeBuilderInput
            :input-props="inputProps"
        ></ResumeBuilderInput>
        <ResumeBuilderTextarea
            :textarea-props="textareaProps"
        ></ResumeBuilderTextarea>
    </v-app>
</template>

<script>
import ResumeBuilderInput from './input'
import ResumeBuilderTextarea from './textarea'

export default {
    components: {
        ResumeBuilderInput,
        ResumeBuilderTextarea
    },
    data: () => ({
        inputProps: {
            value:"Jose Quintero",
            label:"First Input",
            color:"#001CE2",
            outlined: true,
            showToggleInputIcon: true
        },
        textareaProps: {
            value:"I'm a fullstack Developer",
            label:"First Textarea",
            color:"#001CE2",
            outlined: true,
            showToggleTextareaIcon: true
        }
    })
}
</script>