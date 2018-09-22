<template>
    <section class="hero is-primary is-medium">
        <div class="hero-body">
            <div class="container">
                <h3 class="title has-text-centered">
                    {{ message }}
                </h3>
            </div>
        </div>
        <div class="box">

            <div class="level">
                <div class="level-left">
                    <div class="level-item">
                        <exercise-search :search-text.sync="searchText" ></exercise-search>
                    </div>
                </div>
                <div class="level-right">
                    <div class="level-item">
                        <a class="bd-tw-button button" @click="toggleModal"><span class="icon">
                            <i class="fas fa-plus"></i>
                        </span>
                            <span>
                                Add Exercise
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <div v-if="successMessage" class="notification is-success">
                <button class="delete" @click="closeNoti"></button>
                {{successMessage}}
            </div>
            <span class="help is-info"  v-if="isLoading">Loading Exercises...</span>
            <exercise v-else
                      v-for="exercise in filteredList"
                      :exercise="exercise"
                      :key="exercise.id"
                      @delete-exercise="handleDeleteExercise"
            >
            </exercise>
        </div>
        <exercise-add-modal v-if="isModalActive" :isModalActive="isModalActive" @close-modal="handleCreateExercise"></exercise-add-modal>
    </section>
</template>

<script>
    import Exercise from "./Exercise";
    import ExerciseSearch from "./ExerciseSearch";
    import ExerciseAddModal from './ExerciseAddModal';
    import api from '../../api/api';


    export default {
        name: "ExerciseList",
        components: {Exercise, ExerciseSearch, ExerciseAddModal},
        data() {
            return {
                message: 'Exercises list',
                exercises: [],
                searchText : '',
                searchPlaceHolder: 'Find an exercise',
                isLoading: true,
                isModalActive: false,
                successMessage: '',
            }
        },
        watch: {
            exercises: function(pre, post) {
                // console.info('EXERCISES');
                // console.info(this.exercises)
            }
        },
        created: function () {
            var vm = this;
            api.getExercises('/exercises?order[name]=asc').getAll()
                .then( response => {
                    console.log(response);
                    this.exercises = response.data;
                    this.isLoading = false;
                } )
                .catch(function (error) {
                    vm.exercises = [{ name: 'No exercises'}];
                })
        },
        methods: {
            toggleModal(){
                this.isModalActive = !this.isModalActive;
            },
            handleCreateExercise(exercise) {
                this.toggleModal();
                this.successMessage = 'New Exercise created!';
                this.exercises.push(exercise);
            },
            handleDeleteExercise(id) {
                api.getExercises().delete({ id })
                    .then( () => {
                        this.exercises = this.exercises.filter(exercise => exercise.id !== id);
                    } )
                    .catch(function (error) {
                        this.exercises = [{ name: 'No exercises'}];
                    });
            },
            closeNoti() {
                this.successMessage = '';
            }
        },
        computed: {
            filteredList() {
                const filteredExercises = this.exercises.filter(exercise => {
                    return exercise.name.toLowerCase().includes(this.searchText.toLowerCase())
                });
                return _.sortBy(filteredExercises, [function(e) { return e.name; }]);
            }
        }
    }
</script>

<style scoped>

</style>