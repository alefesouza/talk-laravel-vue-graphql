<template>
    <div class="container">
        <users></users>
    </div>
</template>

<script>
    import Users from './components/Users.vue';

    export default {
        components: {
            Users,
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
