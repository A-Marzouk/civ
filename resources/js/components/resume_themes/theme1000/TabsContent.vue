<template>
    <div>Active tab: {{ currentTab }}</div>
</template>

<script>
export default {
    name: "TabsContent",

    props: {
        currentTab: {
            type: String,
            required: true
        }
    }
};
</script>
