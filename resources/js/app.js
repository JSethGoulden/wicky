import './bootstrap';
import { createApp } from 'vue';
import ActivityList from './components/ActivityList.vue';
import ActivityItem from './components/ActivityItem.vue';
import FlashEventWidget from './components/FlashEventWidget.vue';

createApp({})
    .component('ActivityList', ActivityList)
    .component('ActivityItem', ActivityItem)
    .component('FlashEventWidget', FlashEventWidget)
    .mount('#app');
