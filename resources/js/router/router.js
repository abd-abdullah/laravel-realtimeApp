import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Login from '../components/auth/AppLogin'
const routes = [
    { path: '/login', component: Login },
]

const router = new VueRouter({
    routes, // short for `routes: routes`
    base : 'realtimeApp/public',
    hashbang : false,
    mode : 'history',
})

export default router