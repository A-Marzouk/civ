<template>
    <v-app style="margin-top: 60px">
        <ResumeBuilderInput
            :input-props="inputProps"
        ></ResumeBuilderInput>
        <ResumeBuilderTextarea
            :textarea-props="textareaProps"
        ></ResumeBuilderTextarea>
        <ResumeBuilderSelect
            :select-props="selectProps"
        ></ResumeBuilderSelect>
        <ResumeBuilderCheckbox></ResumeBuilderCheckbox>
    </v-app>
</template>

<script>
import ResumeBuilderInput from './input'
import ResumeBuilderTextarea from './textarea'
import ResumeBuilderSelect from './select'
import ResumeBuilderCheckbox from './checkbox'

export default {
    components: {
        ResumeBuilderInput,
        ResumeBuilderSelect,
        ResumeBuilderTextarea,
        ResumeBuilderCheckbox
    },
    data: () => ({
        inputProps: {
            value:"Jose Quintero",
            label:"First Input",
            color:"#001CE2",
            outlined: true,
            rules: true,
            showToggleInputIcon: true
        },
        textareaProps: {
            value:"I'm a fullstack Developer",
            label:"First Textarea",
            color:"#001CE2",
            outlined: true,
            rules: true,
            showToggleTextareaIcon: true
        },
        selectProps: {
            value:"I'm a fullstack Developer",
            label:"First Select",
            color:"#001CE2",
            outlined: true,
            showToggleSelectIcon: true
        }
    })
}
</script>
