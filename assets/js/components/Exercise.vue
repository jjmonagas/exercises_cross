<template>
    <div class="card">
        <div class="card-content" v-if="">
            {{ exercise.name }}
            <span class="icon is-pulled-right">
              <a @click="deleteExercise(exercise.id, $event)"><i class="fas fa-trash"></i></a>
            </span>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'exercise',
        props: ['exercise'],
        methods: {
            deleteExercise(exerciseId, event) {
                this.$emit('delete-exercise', exerciseId);
            }
        }
    }
</script>

<style scoped>

</style>