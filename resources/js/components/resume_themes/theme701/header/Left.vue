<template>
    <div class="tm701-left">
        <img v-bind:src="logo" />
    </div>
</template>

<script>
export default {
    data() {
        return {
            logo: "/images/resume_themes/theme701/profile.png"
        };
    }
};
</script>
<style lang="scss">
.tm701-left {
    img {
        border-radius: 9999px;
        max-width: 20rem;
    }
}
</style>
