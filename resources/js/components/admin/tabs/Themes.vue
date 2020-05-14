<template>
    <div>
        <create-theme></create-theme>
    </div>
</template>

<script>

    import createTheme from './includes/CreateTheme'

    export default {
        name: "Themes",
        components:{
            'create-theme' :createTheme
        }
    }
</script>

<style scoped>

</style>
