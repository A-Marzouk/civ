<template>
    <div style="margin-top: 40px">
        <v-text-field
            class="resume-builder__input"
            v-bind="inputProps"
            :rules="[rules.required]"
        ></v-text-field>
    </div>
</template>

<script>
import 'vuetify/dist/vuetify.min.css'

export default {
    name: "ResumeBuilderInput",
    data: () => ({
        rules: {
            required: value => !!value || 'Please fill this field.',
        }
    }),
    props: ['inputProps']
}
</script>

<style lang="scss">
$mainColor: #001CE2;
$errorColor: #ff5252;
$inputTextColor: #888DB1;
$inputBorderColor: #E6E8FC;

.resume-builder__input.v-input.v-text-field--outlined.v-text-field {

    // Default styles ------------------------------------------------------------
    max-width: 430px;

    & > .v-input__control > .v-input__slot {
        fieldset {
            // Border fieldset

            border: 2px solid $inputBorderColor;
            border-radius: 10px;
            height: 50px;
            transition: border .3s cubic-bezier(.25,.8,.5,1);

            legend {
                // Remove space of default transition animation of lable to fieldset border

                width: 0 !important;
                margin: 0 !important;
            }
        }

        .v-label {
            color: $inputTextColor;
            left: -10px !important;     // refactoring inline styles
            top: -29px;
            font-size: 16px;
            margin-bottom: 10px;

            &--active {
                transform: none;
            }
        }

        input {
            color: $inputTextColor;
            font-size: 16px;
            padding: 16px 21px 16px 13px;
            margin-top: -10px;
        }
    }
    
    
    // Focused input -------------------------------------------------------------
    &--is-focused > .v-input__control > .v-input__slot {
        fieldset {
            // Change fieldset border on focus input

            border: 2px solid $mainColor !important;
        }
    }

    // Error event --------------------------------------------------------------
    &.error--text > .v-input__control > .v-input__slot {
        fieldset {
            // Change fieldset border on error input

            border: 2px solid $errorColor !important;
        }
    }
}    
</style>