import { createRouter, createWebHashHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import WelcomeView from '../views/Welcome.vue'
import AboutView from '../views/AboutView.vue';
import Login from '../views/Login.vue';
import Signup from '../views/Signup.vue';

const routes = [

  {
    path: '/',
    name: 'wlecome',
    component: WelcomeView
  },
  {
    path: '/home',
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'about',
    component: AboutView
  },
  {
    path: '/login',
    name: 'login',
    component: Login
  },
  {
    path: '/signup',
    name: 'signup',
    component: Signup
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
