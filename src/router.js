import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from './views/Home.vue'
import SingleBlog from './views/SingleBlog.vue'
import Contato from './views/Contato.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/blog/:slug',
    name: 'SingleBlog',
    component: SingleBlog,
    props: true
  },
  {
    path: '/contato',
    name: 'Contato',
    component: Contato
  },
  
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
