<template>
    <div class="tm702-about" v-if="currentTab === 1">
        <div class="tm702-about-container">
            <h1>About</h1>
            <div>
                <p>
                    I'm Conor, I'm a product manager from London. I'm currently looking for new permanent job opportunities within London area that will allow my career to develop...
                </p>
                <p>
                    I'm Conor, I'm a product manager from London. I'm currently looking for new permanent job opportunities within London area that will allow my career to develop...
                </p>
                <p>
                    I'm Conor, I'm a product manager from London. I'm currently looking for new permanent job opportunities within London area that will allow my career to develop...
                </p>
                <p>
                    I'm Conor, I'm a product manager from London. I'm currently looking for new permanent job opportunities within London area that will allow my career to develop...
                </p>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ["currentTab"],
    };

</script>
<style lang="scss">
    .tm702-about {
        .tm702-about-container {
            padding-left: 12px;
            padding-right: 26px;
        }

        h1 {
            color: var(--blue);
            font-size: 18px;
            font-weight: bold;
            line-height: 1.4;
            padding-left: 5px;
            margin-bottom: 23px;
        }

        p {
            margin-bottom: 10px;
        }
    }

</style>
