<template>
    <div>
        subscription component
    </div>
</template>

<script>
    import {loadStripe} from '@stripe/stripe-js';

    export default {
        name: "Main",
        props:['stripe_key'],
        data(){
            return{

            }
        },
        async mounted(){
            console.log('hi subs');
            console.log(this.stripe_key);
            const stripe = await loadStripe('pk_test_ONs0RLUvvsJy9P3XWHOkCWRB');
        }
    }
</script>

<style scoped>

</style>
