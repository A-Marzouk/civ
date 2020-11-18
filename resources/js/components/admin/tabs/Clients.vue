<template>
    <div>
        <template>
            <v-data-table
                    :headers="headers"
                    :items="tableClients"
                    :items-per-page="10"
                    class="elevation-1 clients-table"
            >

                <template v-slot:item.actions="{ item }">
                    <div class="d-flex align-items-center justify-content-between">
                        <v-icon
                                small
                                class="mr-3"
                                @click="openInfo(item)"
                        >
                            mdi-dots-vertical
                        </v-icon>
                    </div>
                </template>


            </v-data-table>
        </template>

        <div class="text-center">
            <v-dialog
                    v-model="dialog"
                    width="950"
            >

                <v-card class="p-4">

                   <div v-if="dialogClient">
                       <div class="payments pa-5 mb-3">
                           <h2 class="sub-heading">Payments:</h2>
                           <div class="payment-element" v-for="payment in dialogClient.payments" :key="payment.id">
                               <ul>
                                   <li>
                                       Method: <b>{{payment.payment_method}}</b>
                                   </li>
                                   <li>
                                       Payment ID: <b>{{payment.away_payment_id}}</b>
                                   </li>
                                   <li>
                                       Status: <b>{{payment.status}}</b>
                                   </li>
                                   <li>
                                       Amount: <b>{{payment.amount}}</b>
                                   </li>
                                   <li>
                                       Notes: <b>{{payment.notes}}</b>
                                   </li>
                               </ul>
                           </div>
                       </div>
                       <hr>
                       <div class="subscriptions pa-5">
                           <h2 class="sub-heading">Subscriptions:</h2>
                           <div class="subscription-element" v-for="subscription in dialogClient.subscriptions" :key="subscription.id">
                               <ul>
                                   <li>
                                       Method: <b>{{subscription.payment_method}}</b>
                                   </li>
                                   <li>
                                       Frequency: <b>{{subscription.sub_frequency}}</b>
                                   </li>
                                   <li>
                                       Status: <b>{{subscription.sub_status}}</b>
                                   </li>
                                   <li>
                                       Sub ID: <b>{{subscription.paypal_agreement_id}} {{stripe_subscription_id}}</b>
                                   </li>
                               </ul>
                           </div>
                       </div>
                   </div>

                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn
                                color="primary"
                                text
                                @click="dialog = false"
                        >
                            Close
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Clients",
        props:['clients'],
        data(){
            return{
                headers: [
                    {text: 'Full name', align: 'start', sortable: false, value: 'name'},
                    {text: 'Email', value: 'email'},
                    {text: 'Sign up date', value: 'created_at'},
                    {text: 'Payment Information', value: 'actions'},
                ],
                tableClients: [],
                dialog: false,
                dialogClient: {}
            }
        },
        methods:{
            initialize() {
                this.tableClients = this.clients;
            },
            openInfo(client){
                this.dialog = true;
                this.dialogClient = client;
            }
        },
        created() {
            this.initialize()
        },
    }
</script>


<style lang="scss" scoped>
    .clients-table {
        margin-top: 37px;
    }

    .payment-element, .subscription-element{
        border-bottom: solid 1px lightblue;
        padding: 10px;
        &:last-child{
            border: none;
        }
    }
    .sub-heading{
        font-size: 18px;
        font-weight: 600;
        color: grey;
        border-bottom: 1px solid lightgray;
        width: 120px;
    }
</style>