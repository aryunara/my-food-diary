<script>
export default {
    name: "PostComponent",

    data() {
        return {
            name: 'Vasya',
        }
    },

    methods: {
        sayHello() {
          console.log('Hello')
        },
    },
}
</script>

<template>
    <div>
        name: {{ name }}
    </div>
    <button @click="sayHello">Hello</button>
</template>

<style scoped>

</style>
