<template>
    <div class="ref_container my-5">
        <div v-for="(reference, index) in references" :key="index" class="reference_card">
            <div class="ref__details">
                <div class="ref__details--left">
                    <div class="user_name mb-2 font-weight-bold">{{ reference.name }}</div>
                    <div class="user_address">{{ reference.address }}</div>
                </div>

                <div class="ref__details--right">
                    <div>{{ reference.email }}</div>
                    <div>{{ reference.number }}</div>
                </div>
            </div>
            <div class="refs__body mt-3">{{ reference.description }}</div>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => ({
            references: [
                {
                    name: "John Doe",
                    address: "CEO, IT Software Park 284/6B, Texas, USA",
                    email: "johndoe@gmail.com",
                    number: "+9606987564889",
                    description: "Reference is a relationship between objects in which one object designates, or acts as a means by which to connect to or link to, another object. The first object in this relation is said to refer to the second object. It is called a name for the second object. The first object in this relation is said to refer to the second object."
                },
                {
                    name: "John Doe",
                    address: "CEO, IT Software Park 284/6B, Texas, USA",
                    email: "johndoe@gmail.com",
                    number: "+9606987564889",
                    description: "Reference is a relationship between objects in which one object designates, or acts as a means by which to connect to or link to, another object. The first object in this relation is said to refer to the second object. It is called a name for the second object. The first object in this relation is said to refer to the second object."
                },
                {
                    name: "John Doe",
                    address: "CEO, IT Software Park 284/6B, Texas, USA",
                    email: "johndoe@gmail.com",
                    number: "+9606987564889",
                    description: "Reference is a relationship between objects in which one object designates, or acts as a means by which to connect to or link to, another object. The first object in this relation is said to refer to the second object. It is called a name for the second object. The first object in this relation is said to refer to the second object."
                },
                {
                    name: "John Doe",
                    address: "CEO, IT Software Park 284/6B, Texas, USA",
                    email: "johndoe@gmail.com",
                    number: "+9606987564889",
                    description: "Reference is a relationship between objects in which one object designates, or acts as a means by which to connect to or link to, another object. The first object in this relation is said to refer to the second object. It is called a name for the second object. The first object in this relation is said to refer to the second object."
                }
            ]
        })
    }
</script>

<style scoped>
    .ref_container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 1.5rem;
    }

    .reference_card {
        padding: 2.4rem;
        background-color: #F1F4FF;
        border-radius: 8px;
        color: #172C7A;
    }

    .ref__details {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
    }

    .ref__details--right {
        font-size: 0.8rem;
    }

    .refs__body {
        font-size: 0.8rem;
    }

    .user_name {
        font-size: 1.2rem;
    }

    .user_address {
        max-width: 10rem;
        font-size: 0.8rem;
    }


    /* media queries */

    /* sm screen  */
    @media only screen and (max-width: 700px) {
        .ref_container {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            grid-gap: 1.2rem;
            margin-top: 1.5rem;
        }
    }

    
</style>