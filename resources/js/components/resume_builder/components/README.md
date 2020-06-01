# List of components

* [Inputs](#Inputs)
* Selects
* Textareas
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
            showToggleInputIcon: true
        }
    })
}
</script>
```

![input image](https://github.com/A-Marzouk/civ/blob/resume-builder-components/resources/js/components/resume_builder/components/utils/assets/input.png "Input Demo Image")
