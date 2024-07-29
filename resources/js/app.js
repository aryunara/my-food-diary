import './bootstrap.js';
import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';

import PostComponent from "./components/PostComponent.vue";
import HomeComponent from "./components/HomeComponent.vue";
import MessageComponent from "./components/MessageComponent.vue";
import DialogComponent from "./components/DialogComponent.vue";
import FriendComponent from "./components/FriendComponent.vue";
import FriendRequestComponent from "./components/FriendRequestComponent.vue";

const routes = [
    {
        path: '/messages',
        name: 'Messages',
        component: MessageComponent
    },
    {
        path: '/dialog/:friendId',
        name: 'Dialog',
        component: DialogComponent,
        props: true
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

const app = createApp({});

app.component('post-component', PostComponent);
app.component('home-component', HomeComponent);
app.component('message-component', MessageComponent);
app.component('dialog-component', DialogComponent);
app.component('friend-component', FriendComponent);
app.component('friend-request-component', FriendRequestComponent);

app.use(router);
app.mount('#app');

