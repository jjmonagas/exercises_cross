<template>
    <div class="modal" :class="{ 'is-active': isModalActive }">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Create Exercise</p>
                <button class="delete" aria-label="close" @click="closeModal"></button>
            </header>
            <section class="modal-card-body">
                <exercise-form @completed="closeModal"></exercise-form>
            </section>
        </div>
    </div>
</template>

<script>
    import ExerciseForm from './ExerciseForm';

    export default {
        name: "ExerciseAddModal",
        props: ['isModalActive'],
        components: {ExerciseForm},
        methods: {
            closeModal(exercise) {
                this.$emit('close-modal', exercise)
            }
        }
    }
</script>

<style scoped>

</style>