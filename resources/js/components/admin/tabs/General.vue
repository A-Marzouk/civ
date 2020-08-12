<template>
    <div class="mt-5 w-100">
        <v-data-table
                :headers="headers"
                :items="promocodes"
                sort-by="name"
                class="elevation-1 users-table"
        >
            <template v-slot:top>
                <v-toolbar flat color="white">
                    <v-toolbar-title>CIV Promo Codes</v-toolbar-title>
                    <v-divider
                            class="mx-4"
                            inset
                            vertical
                    ></v-divider>
                    <v-spacer></v-spacer>
                    <v-dialog v-model="dialog" max-width="500px">
                        <template v-slot:activator="{ on }">
                            <v-btn color="primary" dark class="mb-2" v-on="on">Add Promo Code</v-btn>
                        </template>
                        <v-card>
                            <v-card-title>
                                <span class="headline">{{ formTitle }}</span>
                            </v-card-title>

                            <v-card-text>
                                <v-container>
                                    <v-row>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-text-field
                                                v-model="editedItem.name" label="Code"
                                                :error="!!errors.name"
                                                :error-messages="errors.name"
                                            >
                                            </v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-menu
                                                    v-model="menu"
                                                    :close-on-content-click="false"
                                                    :nudge-right="40"
                                                    transition="scale-transition"
                                                    offset-y
                                                    min-width="290px"
                                            >
                                                <template v-slot:activator="{ on, attrs }">
                                                    <v-text-field
                                                            v-model="editedItem.expires_at"
                                                            label="Expires at"
                                                            prepend-icon="event"
                                                            readonly
                                                            v-bind="attrs"
                                                            v-on="on"
                                                            :error="!!errors.expires_at"
                                                            :error-messages="errors.expires_at"
                                                    ></v-text-field>
                                                </template>
                                                <v-date-picker v-model="editedItem.expires_at" @input="menu = false" :min="new Date().toISOString().substr(0, 10)"></v-date-picker>
                                            </v-menu>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-text-field
                                                    v-model="editedItem.free_period"
                                                    label="Free period"
                                                    :error="!!errors.free_period"
                                                    persistent-hint
                                                    hint="Optional"
                                                    :error-messages="errors.free_period"
                                            >
                                            </v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-checkbox v-model="editedItem.is_active" label="Active"></v-checkbox>
                                        </v-col>
                                    </v-row>
                                </v-container>
                            </v-card-text>

                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="blue darken-1" text @click="close">Cancel</v-btn>
                                <v-btn color="blue darken-1" text @click="save">Save</v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                </v-toolbar>
            </template>
            <template v-slot:item.is_active="{ item }">
                {{item.is_active ? 'Active' : 'Not Active'}}
            </template>
            <template v-slot:item.free_period="{ item }">
                <div style="text-transform: capitalize;">
                    {{item.free_period}}
                </div>
            </template>
            <template v-slot:item.actions="{ item }">
                <div class="d-flex align-items-center justify-content-between">
                    <v-icon
                            small
                            class="mr-3"
                            @click="editItem(item)"
                    >
                        mdi-pencil
                    </v-icon>
                    <v-icon
                            small
                            @click="deleteItem(item)"
                    >
                        mdi-delete
                    </v-icon>
                </div>
            </template>
            <template v-slot:no-data>
                No available data
            </template>
        </v-data-table>

    </div>
</template>

<script>
    export default {
        name: "General",
        data(){
            return{
                promocodes: [],
                dialog: false,
                headers: [
                    { text: 'Code', align: 'start', sortable: false, value: 'name'},
                    { text: 'Free period', value: 'free_period' },
                    { text: 'Is active', value: 'is_active'},
                    { text: 'Expiring date', value: 'expires_at'},
                    { text: 'Actions', value: 'actions', sortable: false }
                ],
                editedIndex: -1,
                editedItem: {
                    id: '',
                    name: '',
                    free_period: '',
                    is_active: true,
                    expires_at: '',
                },
                defaultItem: {
                    id: '',
                    name: '',
                    free_period: '',
                    is_active: true,
                    expires_at: '',
                },
                errors:[],
                menu:false,
            }
        },

        computed:{
            formTitle () {
                return this.editedIndex === -1 ? 'New Promo Code' : 'Edit Promo Code'
            },
        },

        watch: {
            dialog (val) {
                val || this.close()
            },
        },

        methods:{
            getAllPromoCodes(){
                axios.get('/api/admin/promocodes').then( (response) => {
                    this.promocodes = response.data.data ;
                    console.log(response.data.data);
                });
            },

            editItem (item) {
                this.editedIndex = this.promocodes.indexOf(item);
                this.editedItem  = Object.assign({}, item);
                this.dialog = true;
            },

            deleteItem (item) {
                const index = this.promocodes.indexOf(item);
                if (!confirm('Are you sure you want to permanently delete this promo code?')) {
                    return;
                }

                // delete item:
                axios.delete('/api/admin/delete-promocode/' + item.id).then( (response) => {
                    this.$store.dispatch('flyingNotificationDelete');
                    this.promocodes.splice(index, 1);
                });
            },

            close () {
                this.dialog = false;
                setTimeout(() => {
                    this.editedItem = Object.assign({}, this.defaultItem)
                    this.editedIndex = -1
                }, 300)
            },

            save () {
                this.errors = [] ;
                if (this.editedIndex > -1) {
                    // edit item
                    axios.post('/api/admin/promocode', this.editedItem)
                        .then( (response) => {
                            Object.assign(this.promocodes[this.editedIndex], this.editedItem);
                            this.$store.dispatch('flyingNotification');
                            this.close();
                        })
                        .catch(error => {
                            if (typeof error.response.data === 'object') {
                                this.errors = error.response.data.errors;
                            } else {
                                this.errors = ['Something went wrong. Please try again.'];
                            }
                            this.$store.dispatch('flyingNotification', {
                                message: 'Error',
                                iconSrc: '/images/resume_builder/error.png'
                            });
                        });

                } else {
                    // new item
                    axios.post('/api/admin/promocode', this.editedItem)
                        .then( (response) => {
                            this.promocodes.push(response.data.data);
                            this.$store.dispatch('flyingNotification');
                            this.close();
                        })
                        .catch(error => {
                            if (typeof error.response.data === 'object') {
                                this.errors = error.response.data.errors;
                            } else {
                                this.errors = ['Something went wrong. Please try again.'];
                            }
                            this.$store.dispatch('flyingNotification', {
                                message: 'Error',
                                iconSrc: '/images/resume_builder/error.png'
                            });
                        });
                }
            },
        },

        mounted() {
            this.getAllPromoCodes();
        }


    }
</script>

<style lang="scss" scoped>
    .users-table{
        margin-top: 37px;
    }

    .error{
        color: red;
    }
</style>
