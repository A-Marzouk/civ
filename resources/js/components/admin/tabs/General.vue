<template>
    <div class="mt-5">
        <h1>Promocodes</h1>
    </div>
</template>

<script>
    export default {
        name: "General",
        data(){
            return{
                promocodes: []
            }
        },
        computed:{},
        methods:{
            getAllPromoCodes(){
                axios.get('/api/admin/promocodes').then( (response) => {
                    this.promocodes = response.data.data ;
                    console.log(response.data.data);
                });
            }
        },
        mounted() {
            this.getAllPromoCodes();
        }
    }
</script>

<style scoped>

</style>
