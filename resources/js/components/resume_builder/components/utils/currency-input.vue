<template>
    <v-text-field
        class="resume-builder__input civie-currency"
        outlined
        color="#001CE2"
        label="Currency Input"
    >
        <v-select
            slot="append"
            :items="currencies"
            color="#001CE2"
            :value="currencies[0]"
            outlined
        >
            <button
                class="dropdown-icon icon"
                slot="append"
            >
                <svg-vue
                    :icon="`dropdown-caret`"
                ></svg-vue>
            </button>
        </v-select>
    </v-text-field>
</template>

<script>
export default {
    data: () => ({
        currencies: [
            'USD',
            'EUR',
            'GBP',
            'CAD',
            'COP',
            'INR'
        ]
    })
}
</script>