<template>
    <v-app style="width: 100%">
        <v-container style="max-width: 1785px;">
            <profile-header></profile-header>
            <profile-detail></profile-detail>
        </v-container>
    </v-app>

</template>
<script>
    import ProfileHeader from './includes/ProfileHeader'
    import ProfileDetail from './includes/ProfileDetail'

    export default{
        name: "Main",
        components:{
            ProfileHeader,
            ProfileDetail,
        }
    }
</script>

<style lang="scss" scoped>
    @import "resources/sass/themes/theme201.scss";
</style>

