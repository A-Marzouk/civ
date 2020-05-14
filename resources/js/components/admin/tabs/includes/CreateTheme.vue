<template>
    <v-row justify="start">
        <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
            <template v-slot:activator="{ on }">
                <v-btn color="primary" dark v-on="on">Add a theme</v-btn>
            </template>
            <v-card>
                <v-toolbar dark color="primary">
                    <v-btn icon dark @click="dialog = false">
                        <v-icon>mdi-close</v-icon>
                    </v-btn>
                    <v-toolbar-title>Theme information</v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-toolbar-items>
                        <v-btn dark text @click="dialog = false">Save</v-btn>
                    </v-toolbar-items>
                </v-toolbar>
                <v-card-text>
                    <v-container>
                        <v-row>
                            <v-col cols="12" sm="6" md="6">
                                <v-text-field label="Title*" required></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="6">
                                <v-text-field label="Category*" hint="example of helper text only on focus"></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="6">
                                <v-text-field
                                        label="Color*"
                                        hint="colorful | black and white | red .."
                                        persistent-hint
                                        required
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="6">
                                <v-text-field type="number" label="Theme Code*"></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="6">
                                <v-select
                                        :items="['Developer', 'Designer']"
                                        label="Job title*"
                                        required
                                ></v-select>
                            </v-col>
                            <v-col cols="12" sm="6" md="6">
                                <v-select
                                        :items="['Modern', 'Professional']"
                                        label="Design style*"
                                        required
                                ></v-select>
                            </v-col>
                            <v-col cols="12" sm="6">
                                <v-autocomplete
                                        :items="['Happy', 'Sad', 'Fearless']"
                                        label="emotions"
                                        multiple
                                ></v-autocomplete>
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
                            v-model="image"
                            ref="file"
                            @change="handleFileUpload"
                    ></v-file-input>

                    <img v-if="image" class="theme-preview" :src="image_url" alt="theme preview">
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
                image:null,
                image_url : ''
            }
        },
        methods:{
            handleFileUpload() {
                this.image_url = window.URL.createObjectURL(this.image);
            },
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
</style>
