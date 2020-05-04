<template>
    <v-app id="inspire" class="api-wrapper">
        <v-navigation-drawer
                v-model="drawer"
                app
        >
            <div class="nav-title">
                CIV API ENDPOINTS
            </div>
            <v-list dense class="NoDecor">
                <v-list-item link to="/api/docs/auth">
                    <v-list-item-content>
                        <v-list-item-title>Authentication</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item link to="/api/docs/personal-info">
                    <v-list-item-content>
                        <v-list-item-title>PersonalInfo</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item link>
                    <v-list-item-content>
                        <v-list-item-title>Achievements</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item link>
                    <v-list-item-content>
                        <v-list-item-title>AvailabilityInfo</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item link>
                    <v-list-item-content>
                        <v-list-item-title>Education</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item link>
                    <v-list-item-content>
                        <v-list-item-title>Hobbies</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item link>
                    <v-list-item-content>
                        <v-list-item-title>Imports</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item link>
                    <v-list-item-content>
                        <v-list-item-title>Languages</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item link>
                    <v-list-item-content>
                        <v-list-item-title>Links</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item link>
                    <v-list-item-content>
                        <v-list-item-title>Media</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item link>
                    <v-list-item-content>
                        <v-list-item-title>PaymentInfo</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item link>
                    <v-list-item-content>
                        <v-list-item-title>Projects</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item link>
                    <v-list-item-content>
                        <v-list-item-title>Referee</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item link>
                    <v-list-item-content>
                        <v-list-item-title>References</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item link>
                    <v-list-item-content>
                        <v-list-item-title>Skills</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item link>
                    <v-list-item-content>
                        <v-list-item-title>Summary</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item link>
                    <v-list-item-content>
                        <v-list-item-title>Testimonials</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item link>
                    <v-list-item-content>
                        <v-list-item-title>WorkEx</v-list-item-title>
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
            <v-toolbar-title>CIV API Docs</v-toolbar-title>
        </v-app-bar>

        <v-content style="background:none">
            <v-container>

                <router-view></router-view>

            </v-container>
        </v-content>
        <v-footer
                color="indigo"
                app
        >
            <span class="white--text">civ.ie</span>
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

        .nav-title{
            font-weight: bold;
            text-align: center;
            padding-top: 15px;
            padding-bottom: 30px;
        }

        .api-menu{
            position: absolute;
            left: 0;
            height:100%;

        }
    }
</style>
