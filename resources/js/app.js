require('./bootstrap');

import { createApp } from 'vue';
import router from './router'
//Import Sweetalert2
import Swal from 'sweetalert2'

import DashboardIndex from './components/dashboard/DashboardIndex.vue';
//moment
var moment = require('moment');

createApp({
    components: {
        DashboardIndex
    }
}).use(router).mount('#app')
