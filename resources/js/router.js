import { createWebHistory, createRouter } from "vue-router";
import Account from './pages/Account.vue'
import Notification from './pages/Notification.vue'
import Setting from './pages/Setting.vue'

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
        name:'settings',
        path:'/settings',
        component: Setting
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router