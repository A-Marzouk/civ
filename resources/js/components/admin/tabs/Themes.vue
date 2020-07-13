<template>
    <div>
        <create-theme @themeCreated="themeCreated" ref="createThemeComponent"></create-theme>

        <h1 class="mt-5">
            List of <b>Accepted</b> themes on civ.ie
        </h1>

        <v-simple-table class="mt-4">
            <template v-slot:default>
                <thead>
                <tr>
                    <th class="text-left">Theme link</th>
                    <th class="text-left">Code</th>
                    <th class="text-left">Category</th>
                    <th class="text-left">Color</th>
                    <th class="text-left">Design style</th>
                    <th class="text-left">Emotions</th>
                    <th class="text-left">Job title</th>
                    <th class="text-left">Developer</th>
                    <th class="text-left">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in acceptedThemes" :key="item.id">
                    <td class="NoDecor"><a :href="'/preview/' + item.id " target="_blank">{{item.title}}</a></td>
                    <td>{{ item.code }}</td>
                    <td>{{ item.category }}</td>
                    <td>{{ item.color }}</td>
                    <td>{{ item.design_style }}</td>
                    <td>{{ item.emotions }}</td>
                    <td>{{ item.job_title }}</td>
                    <td>{{ item.developer }}</td>
                    <td>
                       <v-btn icon depressed  class="mr-2" @click="editTheme(item)">
                           <v-icon small>
                               mdi-pencil
                           </v-icon>
                       </v-btn>
                       <v-btn icon depressed @click="deleteTheme(item)">
                           <v-icon small>
                               mdi-delete
                           </v-icon>
                       </v-btn>
                    </td>

                </tr>
                </tbody>
            </template>
        </v-simple-table>

        <v-divider class="mt-5 mb-5"></v-divider>

        <h1 class="mt-5">
            List of all <b>Available</b> themes on civ.ie
        </h1>

        <v-simple-table class="mt-4">
            <template v-slot:default>
                <thead>
                <tr>
                    <th class="text-left">Theme link</th>
                    <th class="text-left">Code</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in availableCodes" :key="item">
                    <td class="NoDecor"><a :href="'/preview-by-code/theme' + item " target="_blank"> Theme - {{item}}</a></td>
                    <td>{{ item }}</td>
                </tr>
                </tbody>
            </template>
        </v-simple-table>


    </div>
</template>

<script>

    import createTheme from './includes/CreateTheme'

    export default {
        name: "Themes",
        components:{
            'create-theme' :createTheme
        },
        data(){
          return{
              availableCodes: [],
              acceptedThemes: []
          }
        },
        methods:{
            getAvailableThemes(){
                this.errors = {};
                axios.get('/api/user/available-themes')
                    .then( (response) => {
                        this.availableCodes = response.data.sort((a, b) => {
                            // console.log('a ' + a + ' b ' + b);
                            if (a === "K" || b === "N") {
                                return -1;
                            }
                            if (a === "N" || b === "K") {
                                return 1;
                            }
                            return +a - +b;
                        });
                    })
                    .catch( (error) => {
                        this.errors = ['Something went wrong. Please try again.'];
                    });
            },
            getAcceptedThemes(){
                this.errors = {};
                axios.get('/api/user/themes-list')
                    .then( (response) => {
                        this.acceptedThemes = response.data.data;
                    })
                    .catch( (error) => {
                        this.errors = ['Something went wrong. Please try again.'];
                    });
            },
            deleteTheme(theme){
                if (!confirm("Do you want to delete this theme [" + theme.title + "] ?")) {return;}
                axios
                    .delete("/api/user/themes/" + theme.id)
                    .then(response => {
                        this.$store.dispatch("flyingNotificationDelete");
                        this.acceptedThemes.forEach((theme, index) => {
                            if (theme.id === response.data.data.id) {
                                this.acceptedThemes.splice(index, 1);
                            }
                        });
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            themeCreated(theme){
                this.acceptedThemes.push(theme);
            },
            editTheme(theme){
                this.$refs.createThemeComponent.editTheme(theme);

            }
        },
        mounted() {
            this.getAvailableThemes();
            this.getAcceptedThemes();
        }
    }
</script>

<style scoped>

</style>
