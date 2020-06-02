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

**class:** resume-builder__input civie-input

**component:** [vuetify text field](https://vuetifyjs.com/en/components/text-fields/)

Use the same props of an vuetify textfield.

### Example:

```html
<template>
    <v-text-field
        class="resume-builder__input civie-input"
        outlined
        color="#001CE2"
        :rules="rules"
        :class="{'resume-builder__input--disabled': disabledInput}"
        :disabled="disabledInput"
    >
        <button
            v-if="inputProps.showToggleInputIcon"
            class="eye-icon trigger-icon icon"
            :class="{'icon--disabled': disabledInput}"
            slot="append"
            @click="toggleInput" 
        >
            <!-- Use this icon when you want enable or disable function on the input -->
            <svg-vue
                :icon="`eye-icon`" 
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

**class:** resume-builder__input civie-textarea

**component:** [vuetify textarea](https://vuetifyjs.com/en/components/text-areas/)

Use the same props of an vuetify textarea.

### Example:

```html
<template>
    <v-textarea
        class="resume-builder__input civie-textarea"
        outlined
        color="#001CE2"
        :rules="rules"
        :class="{'resume-builder__input--disabled': disabledTextarea}"
        :disabled="disabledTextarea"
    >
        <button
            v-if="textareaProps.showToggleTextareaIcon"
            class="eye-icon trigger-icon"
            :class="{'icon--disabled': disabledTextarea}"
            slot="append"
            @click="toggleTextarea"
        >
            <!-- Use this icon when you want enable or disable function on the input -->
            <svg-vue
                :icon="`eye-icon`"
            ></svg-vue>
        </button>
    </v-textarea>
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
---

## Selects

**class:** resume-builder__input civie-select

**component:** [vuetify select](https://vuetifyjs.com/en/components/text-areas/)

Use the same props of an vuetify select.

### Example:

```html
<template>
    <v-select
        class="resume-builder__input civie-select"
        outlined
        placeholder="Select an option"
        :items="items"
        label="Select a profession"
    >
        <button
            v-if="selectProps.showToggleSelectIcon"
            class="dropdown-icon icon"
            :class="{'icon--disabled': disabledSelect}"
            slot="append"
            @click="toggleSelect"
        >
            <svg-vue
                :icon="`dropdown-caret`"
            ></svg-vue>
        </button>
    </v-select>
</template>

<script>
import 'vuetify/dist/vuetify.min.css'

export default {
    name: "ResumeBuilderSelect",
    data: () => ({
        rules: [
            value => !!value || 'Please fill this field.',
        ],
        disabledSelect: false,
        items: [
            {
                text: 'Fullstack Developer',
                value: 'fullstack_dev'
            },
            {
                text: 'Backend Developer',
                value: 'backend_dev'
            },
            {
                text: 'Frontend Developer',
                value: 'frontend_dev'
            },
            {
                text: 'Data Sciencist',
                value: 'data_scientist'
            }
        ]
    }),
    props: ['selectProps'],
    methods: {
        toggleSelect () {
            this.disabledSelect = !this.disabledSelect
        }
    }
}
</script>
```

![select image](https://github.com/A-Marzouk/civ/blob/resume-builder-components/resources/js/components/resume_builder/components/utils/assets/select.png "Select Demo Image")
