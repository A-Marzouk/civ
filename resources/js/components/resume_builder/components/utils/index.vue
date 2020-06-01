<template>
    <v-app style="margin-top: 60px">
        <ResumeBuilderInput
            :input-props="inputProps"
        ></ResumeBuilderInput>
    </v-app>
</template>

<script>
import ResumeBuilderInput from './input'

export default {
    components: {
        ResumeBuilderInput
    },
    data: () => ({
        inputProps: {
            value:"John Doe",
            label:"First Input",
            color:"#001CE2",
            outlined: true,
            showToggleInputIcon: true
        }
    })
}
</script>