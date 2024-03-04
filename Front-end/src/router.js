import { createRouter, createWebHistory } from "vue-router";

import login from './pages/login.vue';
import ApiContent from './components/ApiContent.vue';
import tags from "./pages/tags.vue";
import show from "./pages/show.vue";
import about from "./pages/about.vue";



const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'home',
            component: ApiContent
        },
        {
            path: '/login',
            name: 'login',
            component: login
        },
        {
            path: '/tags',
            name: 'tags',
            component: tags
        },
        {
            path: '/show',
            name: 'show',
            component: show
        },
        {
            path: '/about',
            name: 'about',
            component: about
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