<template>
    <v-app style="width: 100%" v-if="user">
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
        props:['user'],
        name: "Main",
        components:{
            ProfileHeader,
            ProfileDetail,
        },
        methods:{

        },
        mounted() {
            // this line to make the user accessible on $store.
            this.$store.dispatch('updateThemeUser', this.user);
        }
    }
</script>

<style lang="scss">
    @import "resources/sass/themes/theme201.scss";
</style>
