<template>
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