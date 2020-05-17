<template>
    <v-row justify="end">
        <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
            <template v-slot:activator="{ on }">
                <v-btn color="primary" dark v-on="on">Add a theme</v-btn>
            </template>
            <v-card :loading="loading">
                <v-toolbar dark color="primary">
                    <v-btn icon dark @click="dialog = false">
                        <v-icon>mdi-close</v-icon>
                    </v-btn>
                    <v-toolbar-title>Theme information</v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-toolbar-items>
                        <v-btn dark text @click="saveTheme">Save</v-btn>
                    </v-toolbar-items>
                </v-toolbar>
                <v-card-text>
                    <v-container>
                        <v-row>
                            <v-col cols="12" sm="6" md="6">
                                <v-text-field label="Title*" required v-model="new_theme_item.title" :error="errors.title"></v-text-field>
                                <div class="custom-error" v-if="errors.title">
                                    {{ Array.isArray(errors.title) ? errors.title[0] : errors.title}}
                                </div>
                            </v-col>
                            <v-col cols="12" sm="6" md="6">
                                <v-text-field label="Category*" required v-model="new_theme_item.category" :error="errors.category"></v-text-field>
                                <div class="custom-error" v-if="errors.category">
                                    {{ Array.isArray(errors.category) ? errors.category[0] : errors.category}}
                                </div>
                            </v-col>
                            <v-col cols="12" sm="6" md="6">
                                <v-text-field label="Color*" :error="errors.color" persistent-hint required v-model="new_theme_item.color"></v-text-field>
                                <div class="custom-error" v-if="errors.color">
                                    {{ Array.isArray(errors.color) ? errors.color[0] : errors.color}}
                                </div>
                            </v-col>
                            <v-col cols="12" sm="6" md="6">
                                <v-text-field label="Developer of this theme*" :error="errors.developer" persistent-hint required v-model="new_theme_item.developer"></v-text-field>
                                <div class="custom-error" v-if="errors.developer">
                                    {{ Array.isArray(errors.developer) ? errors.developer[0] : errors.developer}}
                                </div>
                            </v-col>
                            <v-col cols="12" sm="6" md="6">
                                <v-select
                                        :items="availableCodes"
                                        label="Theme Code*"
                                        required
                                        v-model="new_theme_item.code"
                                        :error="errors.code"
                                ></v-select>
                                <div class="custom-error" v-if="errors.code">
                                    {{ Array.isArray(errors.code) ? errors.code[0] : errors.code}}
                                </div>
                            </v-col>
                            <v-col cols="12" sm="6" md="6">
                                <v-select
                                        :items="['Developer', 'Designer']"
                                        label="Job title*"
                                        required
                                        v-model="new_theme_item.job_title"
                                        :error="errors.job_title"
                                ></v-select>
                                <div class="custom-error" v-if="errors.job_title">
                                    {{ Array.isArray(errors.job_title) ? errors.job_title[0] : errors.job_title}}
                                </div>
                            </v-col>
                            <v-col cols="12" sm="6" md="6">
                                <v-select
                                        :items="['Modern', 'Professional']"
                                        label="Design style*"
                                        required
                                        v-model="new_theme_item.design_style"
                                        required
                                        :error="errors.design_style"
                                ></v-select>
                                <div class="custom-error" v-if="errors.design_style">
                                    {{ Array.isArray(errors.design_style) ? errors.design_style[0] : errors.design_style}}
                                </div>
                            </v-col>
                            <v-col cols="12" sm="6" md="6">
                                <v-autocomplete
                                        :items="['Happy', 'Sad', 'Fearless']"
                                        label="emotions"
                                        v-model="new_theme_item.emotions"
                                        multiple
                                        required
                                        :error="errors.emotions"
                                ></v-autocomplete>
                                <div class="custom-error" v-if="errors.emotions">
                                    {{ Array.isArray(errors.emotions) ? errors.emotions[0] : errors.emotions}}
                                </div>
                            </v-col>
                        </v-row>
                    </v-container>
                    <small>*indicates required field</small>
                </v-card-text>
                <v-divider></v-divider>
                <v-container>
                    <h1 class="mb-4">
                        Theme image preview
                    </h1>
                    <v-file-input
                            label="File input"
                            filled
                            prepend-icon="mdi-camera"
                            v-model="new_theme_item.image"
                            ref="file"
                            @change="handleFileUpload"
                            :error="errors.image"
                    ></v-file-input>

                    <div class="custom-error" v-if="errors.image">
                        {{ Array.isArray(errors.image) ? errors.image[0] : errors.image}}
                    </div>

                    <img v-if="new_theme_item.image" class="theme-preview" :src="image_url" alt="theme preview">
                </v-container>
            </v-card>
        </v-dialog>
    </v-row>
</template>
<script>
    export default {
        name: "CreateTheme",
        data(){
            return{
                dialog: false,
                notifications: false,
                sound: true,
                widgets: false,
                image_url : '',
                new_theme_item : {
                    title:'',
                    category:'',
                    color:'',
                    code:'',
                    job_title:'',
                    developer:'',
                    design_style:'',
                    emotions:'',
                    image:null
                },
                errors:{},
                loading:true,
                availableCodes:[]
            }
        },
        methods:{
            handleFileUpload() {
                if(this.new_theme_item.image){
                    this.image_url = window.URL.createObjectURL(this.new_theme_item.image);
                }
            },
            saveTheme(){
                this.errors = {} ;
                let formData = new FormData();
                $.each(this.new_theme_item, (field) => {
                    formData.append(field, this.new_theme_item[field]);
                });
                axios.post('/api/user/themes', formData)
                    .then( (response) => {
                        console.log(response.data);
                        this.$store.dispatch('flyingNotification');
                        this.dialog = false ;
                    })
                    .catch( (error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = ['Something went wrong. Please try again.'];
                        }
                        this.$store.dispatch('flyingNotification', {
                            message: 'Error',
                            iconSrc: '/images/resume_builder/error.png'
                        });
                    })
            },
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
            }
        },
        mounted() {
            this.getAvailableThemes();
        }
    }
</script>

<style scoped lang="scss">
    .theme-preview{
        margin: 25px;
        width: 420px;
        height: auto;
        border-radius: 25px;
    }

    .custom-error{
        margin-top: -10px;
        color: red;
    }
</style>
