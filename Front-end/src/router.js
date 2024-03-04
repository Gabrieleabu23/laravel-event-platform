import { createRouter, createWebHistory } from "vue-router";

import login from './pages/login.vue';
import Home from './App.vue';



const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/login',
            name: 'login',
            component: login
        },

       
    ]
});
window.addEventListener('load', () => {
    // Controlla l'URL corrente
    const currentPath = window.location.pathname;
  
    // Se l'URL è diverso dalla tua rotta principale, reimposta alle rotte originali
    if (currentPath !== '/') {
      router.push('/');
    }
});


export {router};