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