import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Login from '../components/login'
import Signup from '../components/login/signup.vue'
import Logout from '../components/login/Logout.vue'
const routes = [
    { path: '/', component: Login },
    { path: '/signup', component: Signup, name: 'signup' },
    { path: '/logout', component: Logout, name: 'logout' }
]


// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
    routes, // short for `routes: routes`
    hashbang : false,
    mode : 'history'
  })


  export default router
