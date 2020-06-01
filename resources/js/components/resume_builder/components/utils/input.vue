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
$mainColor: #001CE2;
$disabledColor: #888DB1;
$errorColor: #ff5252;
$inputTextColor: #888DB1;
$inputBorderColor--enabled: #C4C9F5;
$inputBorderColor--disabled: #E6E8FC;

.resume-builder__input.v-input.v-text-field--outlined.v-text-field {

    // Default styles ------------------------------------------------------------
    pointer-events: auto !important;
    max-width: 430px;

    & > .v-input__control > .v-input__slot {
        fieldset {
            // Border fieldset

            border: 2px solid $inputBorderColor--enabled; // Default state of inputs
            border-radius: 10px;
            height: 50px;
            transition: border .3s cubic-bezier(.25,.8,.5,1);

            legend {
                // Remove space of default transition animation of lable to fieldset border

                width: 0 !important;
                margin: 0 !important;
            }
        }

        // append icon to enable or disable the input
        .v-input__append-inner {
            margin-top: 12px;
            padding: 0;
            height: 20px;
            width: 20px;
            position: absolute;
            right: 15px;
            z-index: 20;

            .tick-icon {
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 50%;
                box-shadow: 0 5px 10px rgba($color: #001083, $alpha: 0.15);
                transition: all 0.3s ease;

                svg {
                    width: 12px;

                    path {
                        stroke: $mainColor;
                        color: none;
                        fill: transparent;
                        transition: all 0.3s ease;
                    }
                }
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

    // Disabled input
    &.resume-builder__input--disabled {

        & > .v-input__control > .v-input__slot {
            fieldset {
                border: 2px solid $inputBorderColor--disabled; // change borders when input is disabled
            }
        }


        input {
            pointer-events: none;
        }

        // append icon to enable or disable the input
        .v-input__append-inner {

            .tick-icon {
                &.icon--disabled {
                    box-shadow: 0 0 5px rgba($color: #001083, $alpha: 0.10);
                    transition: all 0.3s ease;

                    svg {
                        path {
                            stroke: $disabledColor;
                            transition: all 0.3s ease;
                        }
                    }
                }

            }
        }
    }
}    
</style>