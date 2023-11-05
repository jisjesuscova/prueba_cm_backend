import { createWebHistory, createRouter } from "vue-router";
import Account from './pages/Account.vue'
import CreateNotification from './pages/CreateNotification.vue'
import Setting from './pages/Setting.vue'

const routes = [
    {
        name:'/',
        path:'/',
        component: Account
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
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router