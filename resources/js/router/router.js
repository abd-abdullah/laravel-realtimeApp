import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Login from '../components/auth/AppLogin'
import signUp from '../components/auth/AppSignup'
import Forum from '../components/forum/AppForum'
import Logout from '../components/auth/AppLogout'
import Show from '../components/forum/AppShow'
import Create from '../components/forum/Create'

const routes = [
    { path: '/login', component: Login },
    { path: '/signup', component: signUp },
    { path: '/forum', component: Forum, name:'forum' },
    { path: '/logout', component:Logout},
    { path: '/question/:id', component:Show, name:'show'},
    { path: '/ask', component:Create, name:'create'},
]

const router = new VueRouter({
    routes, // short for `routes: routes`
    base: '/',
    hashbang : false,
    mode : 'history',
})


export default router