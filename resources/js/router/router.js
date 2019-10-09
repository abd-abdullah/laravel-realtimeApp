import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Login from '../components/auth/AppLogin'
import signUp from '../components/auth/AppSignup'
import Forum from '../components/forum/AppForum'

const routes = [
    { path: '/login', component: Login },
    { path: '/signup', component: signUp },
    { path: '/forum', component: Forum, name:'forum' },
]

const router = new VueRouter({
    routes, // short for `routes: routes`
    base : 'realtimeApp/public',
    hashbang : false,
    mode : 'history',
})

export default router