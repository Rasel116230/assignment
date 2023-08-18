import './bootstrap';

import { createApp } from 'vue';
import router from './routes/index';
import axios from 'axios';

import app from './layouts/app.vue';
import bootstrap from 'bootstrap/dist/js/bootstrap';


///base url --------------------
axios.defaults.baseURL='http://127.0.0.1:8000/';


createApp(app).use(router,bootstrap).mount('#app');
