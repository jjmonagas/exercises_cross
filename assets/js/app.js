import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import DashBoard from './components/DashBoard';
import ExerciseList from './components/ExerciseList.vue';
// import ExerciseRMList from './components/ExerciseRMList';

const routes = [
    {
        path: '/exercise/list',
        name: 'exercise-list',
        component: ExerciseList
    },
    // { path: '/exercise/:id/rm/list', component: ExerciseRMList }
];

const router = new VueRouter({
    routes,
    linkActiveClass: 'active',
    mode: 'history'
});


new Vue({
    el: '#app',
    router,
    components: {DashBoard}
});
