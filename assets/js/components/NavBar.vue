<template>
    <nav class="navbar is-transparent" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <router-link class="navbar-item" to="/">
                <!--<img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">-->
                <img src="../../img/exerciseLogo1.ico" alt="Exercises List" width="112" height="88">
            </router-link>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div class="navbar-menu">
            <div class="navbar-start">
                <router-link class="navbar-item" :to="{ name: 'exercise-list' }">Exercises</router-link>
                <!--<router-link class="navbar-item" to="/exercise/rm/list">RMs</router-link>-->
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        name: "NavBar"
    }
</script>

<style scoped>

</style>