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

    export default {
        name: "Main",
        props: ['user'],
        components: {
            ProfileHeader,
            ProfileDetail,
        },
        computed:{

        },
        mounted() {
            // this line to make the user accessible on $store for included components.
            let user = {} ;
            if (!this.user) {
                user = this.$store.state.dummyUser;
            }else{
                user = this.user ;
            }

            this.$store.dispatch('updateThemeUser', user);
        }
    }
</script>

<style lang="scss">
    // already files scoped by using ID wrappers
    @import "resources/sass/themes/theme201.scss";
</style>

