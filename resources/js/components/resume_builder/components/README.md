# List of components

* [Inputs](#Inputs)
* [Textareas](#Textareas)
* Selects
* Checkboxes
* ScrollBars
* Tabs
* Icons
* Edit, Delete, Enable (help buttons on items)
* Buttons (Toggle buttons, outline and filled)
* Move handler icon
---

## Inputs

**class:** resume-builder__input

**component:** [vuetify text field](https://vuetifyjs.com/en/components/text-fields/)

Use the same props of an vuetify textfield.

### Example:

```html
<template>
    <v-text-field
        class="resume-builder__input"
        v-bind="inputProps"
        :outlined="inputProps.outlined || true"
        :color="inputProps.color || '#001CE2'"
        :rules="inputProps.rules !== undefined || rules"
        :class="{'resume-builder__input--disabled': disabledInput}"
        :disabled="disabledInput"
    >
        <!-- Use this when you need the eye icon on the inputs -->
        <button
            v-if="inputProps.showToggleInputIcon"
            class="tick-icon trigger-icon icon"
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
```

![input image](https://github.com/A-Marzouk/civ/blob/resume-builder-components/resources/js/components/resume_builder/components/utils/assets/input.png "Input Demo Image")
---

## Textareas

**class:** resume-builder__input

**component:** [vuetify text field](https://vuetifyjs.com/en/components/text-areas/)

Use the same props of an vuetify textarea. You can pass the properties using the `textarea-props` prop.

### Example:

```html
<template>
    <v-app style="margin-top: 60px">
        <ResumeBuilderTextarea
            :textarea-props="textareaProps"
        ></ResumeBuilderTextarea>
    </v-app>
</template>

<script>
import ResumeBuilderTextarea from './textarea'

export default {
    components: {
        ResumeBuilderTextarea
    },
    data: () => ({
        textareaProps: {
            value:"I'm a fullstack Developer",
            label:"First Textarea",
            color:"#001CE2",
            outlined: true,
            showToggleTextareaIcon: true // use it to show the disable or enable icon
        }
    })
}
</script>
```

![textarea image](https://github.com/A-Marzouk/civ/blob/resume-builder-components/resources/js/components/resume_builder/components/utils/assets/textarea.png "Textarea Demo Image")
