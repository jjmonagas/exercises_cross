<template>
    <form @submit.prevent="onSubmit">
        <span class="help is-danger" v-text="errors"></span>

        <div class="field">
            <div class="control">
                <input class="input" placeholder="enter exercise name..." v-model="name" @keydown="errors = ''">
            </div>
        </div>

        <button class="button is-primary" v-bind:class="{ 'is-loading' : isLoading }">Add Exercise</button>
    </form>
</template>

<script>
    import api from '../../api/api';

    export default {
        name: "ExerciseForm",
        data() {
            return {
                name: '',
                errors: '',
                isLoading: false
            }
        },
        methods: {
            onSubmit() {
                this.isLoading = true;
                this.postExercise();
            },
            postExercise() {
                api.getExercises().create(this.$data)
                    .then(response => {
                        this.name = '';
                        this.isLoading = false;
                        this.$emit('completed', response.data);
                    })
                    .catch(error => {
                        // handle authentication and validation errors here
                        this.errors = error.response.data.errors;
                        this.isLoading = false;
                    })
            }
        }

    }
</script>

<style scoped>

</style>