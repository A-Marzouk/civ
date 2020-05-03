<template>
    <v-app id="inspire">
        <v-navigation-drawer
                v-model="drawer"
                app
        >
            <v-list dense class="NoDecor">
                <v-list-item link to="/api/docs/auth">
                    <v-list-item-content>
                        <v-list-item-title>Authentication</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item link>
                    <v-list-item-content>
                        <v-list-item-title>Endpoint</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>

        <v-app-bar
                app
                color="indigo"
                dark
        >
            <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
            <v-toolbar-title>Application</v-toolbar-title>
        </v-app-bar>

        <v-content>
            <v-container>

                <router-view></router-view>

            </v-container>
        </v-content>
        <v-footer
                color="indigo"
                app
        >
            <span class="white--text">&copy; 2019</span>
        </v-footer>
    </v-app>
</template>

<script>
    export default {
        name: "Docs",
        data(){
            return{
                drawer: null,
            }
        }
    }
</script>

<style lang="scss" scoped>
    .api-wrapper{

        .api-menu{
            position: absolute;
            left: 0;
            height:100%;

        }
    }
</style>
