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
        <div style="margin-top: 60px">
            <ResumeBuilderDatePicker></ResumeBuilderDatePicker>
        </div>
        <ResumeBuilderTab></ResumeBuilderTab>

        <div style="height: 200px; margin-top: 60px; padding: 10px; position: relative;" class="resume-builder__scroll">
            <ResumeBuilderActionIcons></ResumeBuilderActionIcons>
            <div style="border: 2px solid blue; height: 400px; width: 100%; padding: 10px;">
                <ResumeBuilderButton style="margin-top: 40px;"></ResumeBuilderButton>
            </div>
        </div>

        <ResumeBuilderFileInput
            style="margin-bottom: 120px"
        ></ResumeBuilderFileInput>
        <ResumeBuilderCurrencyInput></ResumeBuilderCurrencyInput>
    </v-app>
</template>

<script>
import ResumeBuilderInput from './input'
import ResumeBuilderTextarea from './textarea'
import ResumeBuilderSelect from './select'
import ResumeBuilderCheckbox from './checkbox'
import ResumeBuilderDatePicker from './datepicker'
import ResumeBuilderTab from './tab'
import ResumeBuilderButton from './button'
import ResumeBuilderActionIcons from './action-icons'
import ResumeBuilderFileInput from './file-input'
import ResumeBuilderCurrencyInput from './currency-input'

export default {
    components: {
        ResumeBuilderInput,
        ResumeBuilderSelect,
        ResumeBuilderTextarea,
        ResumeBuilderFileInput,
        ResumeBuilderCurrencyInput,
        ResumeBuilderCheckbox,
        ResumeBuilderDatePicker,
        ResumeBuilderTab,
        ResumeBuilderButton,
        ResumeBuilderActionIcons
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
