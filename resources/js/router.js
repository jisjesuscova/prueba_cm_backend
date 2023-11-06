import { createWebHistory, createRouter } from "vue-router";
import Account from './pages/Account.vue';
import Notification from './pages/Notification.vue';
import CreateNotification from './pages/CreateNotification.vue';
import Setting from './pages/Setting.vue';
import User from './pages/User.vue';

const routes = [
    {
        name:'/',
        path:'/',
        component: Account
    },
    {
        name:'notifications',
        path:'/notifications',
        component: Notification
    },
    {
        name:'notification/create',
        path:'/notification/create',
        component: CreateNotification
    },
    {
        name:'settings',
        path:'/settings',
        component: Setting
    },
    {
        name:'users',
        path:'/users',
        component: User
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router