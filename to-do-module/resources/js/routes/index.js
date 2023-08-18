import { createWebHistory, createRouter } from 'vue-router';
import Home from '../pages/Home.vue';


const routes = [
    {
        path : '/',
        name : 'home',
        component : Home
    },
    
];

const router = createRouter({
    history: createWebHistory(),
    linkExactActiveClass: 'active',
    routes
});

export default router;