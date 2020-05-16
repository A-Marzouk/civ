<template>
    <div>

        <v-row justify="center"
        >

            <v-dialog

                    v-model="dialog"
                    width="700"

            >
                <v-card style="border-radius: 15px" flat class="mx-auto" >
                    <v-img  :src="'/images/resume_themes/theme1101/'+this.image"></v-img>
                </v-card>
            </v-dialog>
            {{hello}}
            {{check}}
        </v-row>
    </div>
</template>
<script>


    export default {
        props: ['data', 'image'],

        data() {
            return {
                dialog: null,
                dataimage: null
            }
        },
        computed:
            {
                hello() {
                    this.dialog = this.data;
                    this.dataimage = this.image;

                },
                check() {
                    if (this.dialog == false) {
                        this.checkvalue();

                    }
                }
            },
        methods: {
            checkvalue() {

                this.dialog = false;
                EventBus.$emit('closeImage', this.dialog);

            }
        }


    }
</script>
<style scoped>

</style>
