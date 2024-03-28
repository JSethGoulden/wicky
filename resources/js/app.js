import './bootstrap';
import { createApp } from 'vue';
import ActivityList from './components/ActivityList.vue';
import ActivityItem from './components/ActivityItem.vue';

createApp({})
    .component('ActivityList', ActivityList)
    .component('ActivityItem', ActivityItem)
    .mount('#app');
