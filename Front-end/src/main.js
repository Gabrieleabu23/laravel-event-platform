// main.js

import { createApp } from 'vue';
import App from './App.vue';
import './style.css'; // Importa il file CSS di stile
import { router } from './router'
import 'bootstrap/dist/css/bootstrap.min.css'; // Importa il file CSS di Bootstrap
import 'bootstrap'; // Importa il pacchetto JavaScript di Bootstrap

const app = createApp(App);

// Usa il router nell'applicazione
app.use(router);

// Monta l'applicazione sull'elemento con id "app"
app.mount('#app');
