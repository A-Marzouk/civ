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
        props: ['user', 'is_preview'],
        data() {
            return {
                currentUser: this.user
            }
        },
        components: {
            ProfileHeader,
            ProfileDetail,
        },
        computed: {},
        methods: {
            setDummyUser() {
                this.currentUser = this.$store.state.dummyUser;
            }
        },
        mounted() {

            // if there is no user or the preview is true, set dummy user
            if (!this.currentUser || this.is_preview) {
                this.setDummyUser();
            }

            // let user accessible in included components.
            this.$store.dispatch('updateThemeUser', this.currentUser);
        }
    }
</script>

<style lang="scss">
    // already files scoped by using ID wrappers
    @import "resources/sass/themes/theme201.scss";
</style>

