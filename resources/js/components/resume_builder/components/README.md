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

**name:** ResumeBuilderInput

**class:** resume-builder__input

**component:** [vuetify text field](https://vuetifyjs.com/en/components/text-fields/)

Use the same props of an vuetify textfield. You can pass the properties using the `input-props` prop.

### Example:

```html
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
            showToggleInputIcon: true // use it to show the disable or enable icon
        }
    })
}
</script>
```

![input image](https://github.com/A-Marzouk/civ/blob/resume-builder-components/resources/js/components/resume_builder/components/utils/assets/input.png "Input Demo Image")
---

## Textaras

**name:** ResumeBuilderTextarea

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
