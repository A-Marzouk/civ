<template>
    <div>
        <v-btn color="primary" dark class="mt-2" @click="clearWorkforceRefresh">Refresh 123workforce homepage profiles</v-btn>

        <v-data-table
                :headers="headers"
                :items="tableUsers"
                sort-by="name"
                class="elevation-1 users-table"
                :single-expand="singleExpand"
                :expanded.sync="expanded"
                item-key="name"
                show-expand
        >
            <template v-slot:top>
                <v-toolbar flat color="white">
                    <v-toolbar-title>CIV Users</v-toolbar-title>
                    <v-divider
                            class="mx-4"
                            inset
                            vertical
                    ></v-divider>
                    <v-spacer></v-spacer>
                    <v-dialog v-model="dialog" max-width="500px">
                        <template v-slot:activator="{ on }">
                            <v-btn color="primary" dark class="mb-2" v-on="on">Create new user</v-btn>
                        </template>
                        <v-card>
                            <v-card-title>
                                <span class="headline">{{ formTitle }}</span>
                            </v-card-title>

                            <v-card-text>
                                <v-container>
                                    <v-row>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-text-field v-model="editedItem.name" label="Name"></v-text-field>
                                            <div class="error" style="background-color: white !important;"
                                                 v-if="errors.name">
                                                {{ Array.isArray(errors.name) ? errors.name[0] : errors.name}}
                                            </div>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-text-field v-model="editedItem.email" label="Email"></v-text-field>
                                            <div class="error" style="background-color: white !important;"
                                                 v-if="errors.email">
                                                {{ Array.isArray(errors.email) ? errors.email[0] : errors.email}}
                                            </div>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-text-field v-model="editedItem.username" label="Username"></v-text-field>
                                            <div class="error" style="background-color: white !important;"
                                                 v-if="errors.username">
                                                {{ Array.isArray(errors.username) ? errors.username[0] :
                                                errors.username}}
                                            </div>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="4" v-show="canEditPassword">
                                            <v-text-field type="password" v-model="editedItem.password"
                                                          label="Password"></v-text-field>
                                            <div class="error" style="background-color: white !important;"
                                                 v-if="errors.password">
                                                {{ Array.isArray(errors.password) ? errors.password[0] :
                                                errors.password}}
                                            </div>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="4" v-show="canEditPassword">
                                            <v-text-field type="password" v-model="editedItem.password_confirmation"
                                                          label="Password Confirmation"></v-text-field>
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
            <template v-slot:item.tester="{ item }">
                <v-checkbox v-model="item.can_test_builder" label="Can open builder without subscription"
                            @change="toggleUserPermissionToTestBuilder(item)"></v-checkbox>
            </template>
            <template v-slot:item.profileLink="{ item }">
                <div class="NoDecor">
                    <a :href="'/workforce-admin/' + item.username + '/resume-builder'"
                       target="_blank">{{item.username}}</a>
                </div>
            </template>
            <template v-slot:item.lastActivity="{ item }">
                {{item.last_activity}}
            </template>
            <template v-slot:no-data>
                No available data
            </template>
            <template v-slot:item.subscription="{ item }">
                <!-- dialogs -->

                <a href="javascript:void(0)" @click="setCurrentSubscription(item)">View subscription</a>

                <v-dialog
                        v-model="item.id === subscriptionModalUserID"
                        max-width="550"
                        style="box-shadow: 0px 0px 130px rgba(0, 16, 133, 0.07);border-radius: 10px; z-index:1000; overflow-y:hidden;">
                    <v-card>
                        <v-card-text align="center" class="padding-sm-1">
                            <v-row align="center" justify="center" class="p-5 d-flex flex-column"
                                   v-if="item.subscription">
                                <div>
                                    <b style="text-transform: capitalize;">{{item.subscription.sub_frequency}}</b>
                                    subscription
                                </div>
                                <div>
                                    Price: <b style="text-transform: capitalize;">{{item.subscription.sub_frequency ===
                                    'monthly' ? '5 USD/month' : '50 USD/year'}}</b>
                                </div>
                                <div>
                                    Expires at: <b
                                        style="text-transform: capitalize;">{{item.subscription.expires_at}}</b>
                                </div>
                                <div v-if="item.subscription">
                                    Payment method: <b style="text-transform: capitalize;">{{item.subscription.payment_method}}
                                    | <span v-if="item.subscription.promocode">{{item.subscription.promocode.name}}</span>   </b>
                                </div>
                            </v-row>
                            <v-row class="d-flex justify-center m-5" v-else>
                                Not subscribed
                            </v-row>
                            <hr class="hr-line"/>
                        </v-card-text>
                    </v-card>
                </v-dialog>
                <!-- dialogs -->
            </template>

            <template v-slot:expanded-item="{item}">
                <td :colspan="headers.length" style="padding:0;">
                    <v-data-table
                            :headers="resumeHeaders"
                            :items="item.resumeLinks"
                            item-key="id"
                            class="elevation-1"
                            :hide-default-footer="true"
                            disable-pagination
                    >
                        <template v-slot:item.url="{ item }">
                            https://civ.ie/{{getUsernameByID(item.user_id)}}/{{item.url}}
                        </template>
                        <template v-slot:item.workforce_public="{ item }">
                            <v-checkbox v-model="item.is_123workforce_public" label="Public"
                                        @change="toggleWorkForcePublicity(item)">
                            </v-checkbox>

                        </template>
                    </v-data-table>
                </td>
            </template>
        </v-data-table>


        <v-data-table
                :headers="headers"
                :items="tableDeletedUsers"
                sort-by="name"
                class="elevation-1 users-table"
        >
            <template v-slot:top>
                <v-toolbar flat color="white">
                    <v-toolbar-title style="color:red">Deactivated Users</v-toolbar-title>
                    <v-divider
                            class="mx-4"
                            inset
                            vertical
                    ></v-divider>
                    <v-spacer></v-spacer>
                </v-toolbar>
            </template>
            <template v-slot:item.actions="{ item }">
                <div class="d-flex align-items-center justify-content-between">
                    <v-btn small class="mr-3" color="error" style="color: white !important;"
                           @click="forceDeleteUser(item)">Permanently Delete
                    </v-btn>
                    <v-btn small color="success" @click="restoreUser(item)">Restore</v-btn>
                </div>
            </template>
            <template v-slot:item.profileLink="{ item }">
                <div class="NoDecor">
                    <a :href="'/workforce-admin/' + item.username + '/resume-builder'"
                       target="_blank">{{item.username}}</a>
                </div>
            </template>
            <template v-slot:item.lastActivity="{ item }">
                {{item.last_activity}}
            </template>
            <template v-slot:no-data>
                No available data
            </template>
            <template v-slot:item.subscription="{ item }">
                <!-- dialogs -->

                <a href="javascript:void(0)" @click="setCurrentSubscription(item)">View subscription</a>

                <v-dialog
                        v-model="item.id === subscriptionModalUserID"
                        max-width="550"
                        style="box-shadow: 0px 0px 130px rgba(0, 16, 133, 0.07);border-radius: 10px; z-index:1000; overflow-y:hidden;">
                    <v-card>
                        <v-card-subtitle align="right">
                            <v-btn icon class="btn-close-modal" absolute>
                                <img src="/images/new_resume_builder/icons/main/close.svg" alt="close icon"/>
                            </v-btn>
                        </v-card-subtitle>
                        <v-card-text align="center" class="padding-sm-1">
                            <v-row align="center" justify="center" class="p-5 d-flex flex-column"
                                   v-if="item.subscription">
                                <div>
                                    <b style="text-transform: capitalize;">{{item.subscription.sub_frequency}}</b>
                                    subscription
                                </div>
                                <div>
                                    Price: <b style="text-transform: capitalize;">{{item.subscription.sub_frequency ===
                                    'monthly' ? '5 USD/month' : '50 USD/year'}}</b>
                                </div>
                                <div>
                                    Expires at: <b
                                        style="text-transform: capitalize;">{{item.subscription.expires_at}}</b>
                                </div>
                                <div>
                                    Payment method: <b style="text-transform: capitalize;">{{item.subscription.payment_method}}
                                    | <span v-if="item.subscription.promocode">{{item.subscription.promocode.name}}</span>   </b>
                                </div>
                            </v-row>
                            <v-row class="d-flex justify-center m-5" v-else>
                                Not subscribed
                            </v-row>
                            <hr class="hr-line"/>
                        </v-card-text>
                    </v-card>
                </v-dialog>
                <!-- dialogs -->
            </template>
        </v-data-table>
    </div>
</template>

<script>

    export default {
        name: 'usersTable',
        props: ['users', 'deletedUsers'],
        data: () => ({
            dialog: false,
            singleExpand: false,
            singleSelect: false,
            selected: [],
            expanded: [],
            headers: [
                {text: 'Full name', align: 'start', sortable: false, value: 'name'},
                {text: 'Email', value: 'email'},
                {text: 'Link to resume builder', value: 'profileLink'},
                {text: 'Sub. Status', value: 'subscription'},
                {text: 'Signup date', value: 'created_at'},
                {text: 'Last activity', value: 'lastActivity'},
                {text: 'Actions', value: 'actions', sortable: false},
                {text: 'Tester', value: 'tester', sortable: false},
            ],
            resumeHeaders:[
                {text: 'Resume URL', value:'url'},
                {text: 'is public on 123workforce homepage', value:'workforce_public'},
            ],
            tableUsers: [],
            tableDeletedUsers: [],
            subscriptionModalUserID: '',
            editedIndex: -1,
            editedItem: {
                id: '',
                name: '',
                email: '',
                username: '',
                password: '',
                password_confirmation: ''
            },
            defaultItem: {
                id: '',
                name: '',
                email: '',
                username: '',
                password: '',
                password_confirmation: ''
            },
            errors: [],
        }),

        computed: {
            formTitle() {
                return this.editedIndex === -1 ? 'New User' : 'Edit User'
            },
            canEditPassword() {
                return this.editedIndex === -1;
            }
        },

        watch: {
            dialog(val) {
                val || this.close()
            },
        },

        created() {
            this.initialize()
        },

        methods: {
            // restore
            restoreUser(item) {
                const index = this.tableDeletedUsers.indexOf(item);

                if (!confirm('Are you sure you want to restore this deleted user?')) {
                    return;
                }

                // restore item:
                axios.post('/api/admin/restore-user', item).then((response) => {
                    this.$store.dispatch('flyingNotification');
                    this.tableDeletedUsers.splice(index, 1);
                    this.tableUsers.push(item);
                });
            },
            clearWorkforceRefresh(){
                axios.get('/api/search/send-invalidate-cache').then( (r) => { console.log(r.data)});
            },
            getUsernameByID(id){
                let username = '' ;
                this.users.forEach( (user) => {
                    if(user.id == id){
                        username = user.username;
                    }
                });
                return username;
            },
            toggleWorkForcePublicity(item){
                if(item.is_123workforce_public === 0 ||  item.is_123workforce_public === '0') item.is_123workforce_public = false;
                if(item.is_123workforce_public === 1 ||  item.is_123workforce_public === '1') item.is_123workforce_public = true ;
                axios.put('/api/user/resume-links/update-workforce-publicity', item)
                    .then()
                    .catch();
            },
            // permanently  delete
            forceDeleteUser(item) {
                const index = this.tableDeletedUsers.indexOf(item);
                if (!confirm('Are you sure you want to permanently delete this user?')) {
                    return;
                }

                // delete item:
                axios.delete('/api/admin/force-delete-user/' + item.id).then((response) => {
                    this.$store.dispatch('flyingNotificationDelete');
                    this.tableDeletedUsers.splice(index, 1);
                });
            },

            initialize() {
                this.tableUsers = this.users;
                this.tableDeletedUsers = this.deletedUsers;
            },

            setCurrentSubscription(user) {
                this.subscriptionModalUserID = user.id;
            },


            toggleUserPermissionToTestBuilder(user) {
                axios.post('/api/admin/give-test-permission', {user_id: user.id}).then((response) => {
                    this.$store.dispatch('flyingNotification');
                });
            },
            editItem(item) {
                this.editedIndex = this.tableUsers.indexOf(item);
                this.editedItem = Object.assign({}, item);
                this.dialog = true;
            },

            deleteItem(item) {
                const index = this.tableUsers.indexOf(item);
                if (!confirm('Are you sure you want to delete this user?')) {
                    return;
                }

                // delete item:
                axios.delete('/api/admin/delete-user/' + item.id).then((response) => {
                    this.$store.dispatch('flyingNotificationDelete');
                    this.tableUsers.splice(index, 1);
                    this.tableDeletedUsers.push(item);
                });
            },

            close() {
                this.dialog = false;
                setTimeout(() => {
                    this.editedItem = Object.assign({}, this.defaultItem)
                    this.editedIndex = -1
                }, 300)
            },

            save() {
                this.errors = [];
                if (this.editedIndex > -1) {
                    // edit item
                    axios.put('/api/admin/update-user', this.editedItem)
                        .then((response) => {
                            Object.assign(this.tableUsers[this.editedIndex], this.editedItem);
                            this.$store.dispatch('flyingNotification');
                            this.close();
                        })
                        .catch(error => {
                            this.canSubmit = true;
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
                    axios.post('/api/admin/create-user', this.editedItem)
                        .then((response) => {
                            this.tableUsers.push(response.data.user);
                            this.$store.dispatch('flyingNotification');
                            this.close();
                        })
                        .catch(error => {
                            this.canSubmit = true;
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
            }
        },

        mounted() {
            // console.log(this.users);
        }
    }
</script>

<style lang="scss" scoped>
    .users-table {
        margin-top: 37px;
    }

    .error {
        color: red;
    }
</style>
