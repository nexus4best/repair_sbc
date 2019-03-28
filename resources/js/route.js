import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import DashBoard from './components/DashBoard.vue'
import User from './components/User.vue'
import Setup from './components/Setup.vue'
import Area from './components/Area.vue'
import Cts from './components/Cts.vue'
import Revenue from './components/Revenue.vue'
import Dhl from './components/Dhl.vue'

const routes = [
    { path: '/dashboard', name: 'dashboard', component: DashBoard }, 
    { path: '/user', name: 'user', component: User }, 
    { path: '/setup', name: 'setup', component: Setup },
    { path: '/area', name: 'area', component: Area },
    { path: '/cts', name: 'cts', component: Cts },
    { path: '/revenue', name: 'revenue', component: Revenue },
    { path: '/dhl', name: 'dhl', component: Dhl },
]

const router = new VueRouter({
    mode: 'history',
    routes
})

export default router