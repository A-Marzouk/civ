<template>
    <v-app style="max-height: 50px;">
        <div class="switch" v-if="userTabs">
            <div class="switch-text">ON/OFF</div>
            <v-switch v-for="tab in userTabs" :key="tab.id" v-if="tab.title === currentTabTitle" v-model="tab.is_public" @change="toggleTab(tab)"></v-switch>
        </div>
    </v-app>

</template>

<script>
    export default {
        name: "TabSwitcher",
        props:['currentTabTitle'],
        data(){
            return{

            }
        },
        methods:{
            toggleTab(tab){
                axios.put('/api/user/tabs/toggle-tab', tab)
                    .then( (response) => {
                        console.log(response.data);
                        this.$store.dispatch('flyingNotification');
                    });
            }
        },
        computed:{
            userTabs(){
                return this.$store.state.user.tabs;
            }
        }
    }
</script>

<style scoped lang="scss">
    @import '../../../../../../sass/media-queries';

    .switch{
        display: flex;
        align-items:center;
        margin-top: -3px;
        margin-right: 10px;

        .switch-text{
            margin-right: 10px;
            font-size: 18px;
            color: #888DB1;
        }

        @include lt-sm{
            .v-input--selection-controls.v-input--switch{
                margin-top: 0 !important;
                padding-top: 0 !important;
                .v-input__control{
                    height: 28px !important;
                    .v-input__slot{
                        margin-bottom: 0 !important;
                    }
                }
            }
        }
    }
</style>