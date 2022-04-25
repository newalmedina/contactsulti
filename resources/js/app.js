require('./bootstrap');

import { createApp } from 'vue';
import router from './router'

import DashboardIndex from './components/dashboard/DashboardIndex.vue';

createApp({
    components: {
        DashboardIndex
    }
}).use(router).mount('#app')