<template>
    
</template>

<script>
    export default {
        name: "ExerciseRMList",
        data() {
            return {
                rmList: []
            }
        },
        computed: {
            exercise () {
                // We will see what `params` is shortly
                return this.$route.params.id
            }
        }
    }
</script>

<style scoped>

</style>