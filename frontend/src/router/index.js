import Vue from 'vue'
import Router from 'vue-router'
import Registration from '@/components/Registration'
import Login from '@/components/Login'
import Dashboard from '@/components/Dashboard'
Vue.use(Router)
export default new Router({
  routes: [
    {
      path: '/Registration',
      name: 'Registration',
      component: Registration
    },
    {
      path: '/Login',
      name: 'Login',
      component: Login
    },
    {
      path: '/',
      name: 'Login',
      component: Login
    },
    {
      path: '/Dashboard',
      name: 'Dashboard',
      component: Dashboard
    },
  ]
})
