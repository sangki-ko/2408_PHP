require('./bootstrap');

import { createApp } from 'vue';
import router from './router';
import AppComponent from '../views/components/AppComponent.vue';

createApp({
    components: {
        AppComponent, 
    }
})
.use(router)
.mount('#app');