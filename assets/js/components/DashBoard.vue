<template>
    <div class="container is-fluid">
        <nav-bar></nav-bar>
        <router-view></router-view>
    </div>
</template>

<script>
    import NavBar from './NavBar';
    import api from '../../api/api';

    export default {
        name: "DashBoard",
        components: {NavBar},
        methods: {
            goBack () {
                window.history.length > 1
                    ? this.$router.go(-1)
                    : this.$router.push('/')
            }
        },
        created: function() {
            api.getToken().then( response => {
                this.$router.push('/exercise/list')
            });
        }
    }
</script>

<style scoped>

</style>