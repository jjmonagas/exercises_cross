import axios from 'axios';

axios.defaults.baseURL = 'http://localhost:8000/api';
axios.defaults.headers.common['Content-Type'] = 'application/json';
axios.defaults.headers.common['Accept'] = 'application/json';

export default {

    getToken() {
        return axios.post('/login_check', {
                username: 'exercise',
                password: 'ex.Cr0ss'
        }).then(response => {
            const data = response.data;
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + data.token;
            /*localStorage.setItem('user-token', data.token);
            const token = localStorage.getItem('user-token');
            if (token) {
                axios.defaults.headers.common['Authorization'] = token
            }*/
        })
    },

    getExercises(url = '/exercises') {
        return {
            getOne: ({ id }) => axios.get(`${url}/${id}`),
            getAll: () => axios.get(url),
            update: (toUpdate) =>  axios.put(url,toUpdate),
            create: (toCreate) =>  axios.post(url,toCreate),
            delete: ({ id }) => axios.delete(`${url}/${id}`)
        }
    }
}