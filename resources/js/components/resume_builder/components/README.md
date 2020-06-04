# List of components

* [Inputs](#Inputs)
* [Textareas](#Textareas)
* [Selects](#Selects)
* [Checkboxes](#Checkboxes)
* [Datepicker](#Datepicker)
* [Tabs](#Tabs)
* [ScrollBars](#Scrollbars)
* Buttons (Toggle buttons, outline and filled)
* Edit, Delete, Enable (help buttons on items)
* Move handler icon

## <span style="color: red">IMPORTANT!</span>
Limit the inputs width on the parent container. 

The responsive only modify the font size, the icons size, and the relative distance between input elements (ex: label). So you must handle the responsive behavior using the parent container.



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

**component:** [vuetify select](https://vuetifyjs.com/en/components/selects/)

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
---

## Checkboxes

**class:** resume-builder__input civie-checkbox

**component:** [vuetify checkbox](https://vuetifyjs.com/en/components/selection-controls/#checkboxes-boolean)

Use the same props of an vuetify checkbox.

### Example:

```html
<template>
    <v-checkbox
        v-model="disabled"
        class="resume-builder__input civie-checkbox"
        label="Working on civie platform"
        color="#001CE2"
    ></v-checkbox>
</template>

<script>
export default {
    data: () => ({
        disabled: false
    })
}
</script>
```
---

## Datepicker

**class:** resume-builder__input civie-datepicker

**component:** [vuetify menu datepicker](https://vuetifyjs.com/en/components/date-pickers/#date-month-pickers)

Use the same props of an vuetify datepicker.

### Example:

```html
<v-menu
        ref="menu"
        v-model="menu"
        :close-on-content-click="false"
        :return-value.sync="date"
        transition="scale-transition"
        offset-y
        min-width="290px"
        >
        <template v-slot:activator="{ on }">
            <v-text-field
                v-model="dateFormatted"
                class="resume-builder__input civie-datepicker"
                label="Date"
                color="#001CE2"
                readonly
                v-on="on"
                outlined
                placeholder="dd/mm/yyyy"
                @blur="date = parseDate(dateFormatted)"
            >
                <button
                    class="dropdown-icon icon"
                    slot="append"
                >
                    <svg-vue
                        :icon="`dropdown-caret`"
                    ></svg-vue>
                </button>
            </v-text-field>
        </template>
        <v-date-picker v-model="date" no-title scrollable color="#001CE2">
            <v-spacer></v-spacer>
            <v-btn text color="primary" @click="menu = false">Cancel</v-btn>
            <v-btn text color="primary" @click="$refs.menu.save(date)">OK</v-btn>
        </v-date-picker>
    </v-menu>
</template>

<script>
export default {
    data: vm => ({
        date: null,
        dateFormatted: vm.formatDate(new Date().toISOString().substr(0, 10)),
        menu: false
    }),
    computed: {
      computedDateFormatted () {
        return this.formatDate(this.date)
      },
    },
    watch: {
      date (val) {
        this.dateFormatted = this.formatDate(this.date)
      },
    },
    methods: {
        formatDate (date) {
            if (!date) return null

            const [year, month, day] = date.split('-')
            return `${month}/${day}/${year}`
        },
        parseDate (date) {
            if (!date) return null

            const [month, day, year] = date.split('/')
            return `${year}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`
        },
    }
}
</script>
```

## Tabs

**class:** resume-builder__tab-bar

**children class:** resume-builder__tab

**component:** [vuetify tabs](https://vuetifyjs.com/en/components/tabs/)

Use the same props of an vuetify tabs.

### Example:

```html
<template>
    <v-tabs
        class="resume-builder__tab-bar"
        hide-slider
    >
        <v-tab
            class="resume-builder__tab"
        >Item One</v-tab>
        <v-tab
            class="resume-builder__tab"
        >Item Two</v-tab>
        <v-tab
            class="resume-builder__tab"
        >Item Three</v-tab>
    </v-tabs>
</template>
```

---

## Scrollbars

**class:** resume-builder__scroll

**component:** None

Use this class on scrollable containers to add scrollbars styled

```html
<div 
    class="resume-builder__scroll"
    style="height: 200px; margin-top: 60px; padding: 10px;">
    <div style="border: 2px solid blue; height: 400px; width: 100%;">
        Scroll div
    </div>
</div>
```
---

## Buttons

**class:** resume-builder__btn civie-btn

**component:** [vuetify btn](https://vuetifyjs.com/en/components/buttons/)

Use the `filled` class to reset default styles of v-btn.
For outlined btns, you can use simply the `outlined` prop of v-btn component

```html
<template>
    <div>
        <v-btn
            class="resume-builder__btn civie-btn filled"
            raised
        >Hello, I'm a button</v-btn>

        <v-btn
            class="resume-builder__btn civie-btn"
            outlined
        >Hello, I'm a button outlined</v-btn>
    </div>
</template>

<script>
export default {
    data: vm => ({})
}
</script>
```