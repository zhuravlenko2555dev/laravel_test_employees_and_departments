import Vue from 'vue';
import VueRouter from 'vue-router';
import Employes from '../components/Employes'

Vue.use(VueRouter);

let router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            redirect: 'employes'
        },
        {
            path: '/employes',
            name: 'employes',
            component: Employes,
        },
        // {
        //     path: '/departments',
        //     name: 'departments',
        //     component: Departments,
        // },
    ]
});

export default router;
