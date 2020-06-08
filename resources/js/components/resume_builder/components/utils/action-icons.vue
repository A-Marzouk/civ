<template>
    <div
        class="resume-builder__action-buttons-container"
    >
        <v-btn
            class="btn-icon civie-btn"
            depressed
        >
            <svg-vue
                icon="eye-icon"
                class="icon"
            ></svg-vue>
        </v-btn>
        <v-btn
            class="btn-icon civie-btn"
            depressed
        >
            <svg-vue
                icon="edit-icon"
                class="icon"
            ></svg-vue>
        </v-btn>
        <v-btn
            class="btn-icon civie-btn"
            depressed
        >
            <svg-vue
                icon="trash-delete-icon"
                class="icon"
            ></svg-vue>
        </v-btn>
        <v-btn
            class="btn-icon mainBg civie-btn toogleDropdownBtn"
            :class="{opened: openMenu}"
            @click="openMenu = !openMenu"
            depressed
        ></v-btn>
    </div>
</template>

<script>
export default {
    data: () => ({
        openMenu: false
    })
}
</script>