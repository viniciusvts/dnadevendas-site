
import Vue from 'vue'
import VueRouter from 'vue-router'
/*
import Blog from './views/Blog.vue'
import SingleBlog from './views/SingleBlog.vue'
import Talk from './views/Talk.vue'
import Workshops from './views/Workshops.vue'
import Trainning from './views/Trainning.vue'
import Categories from './views/Categories.vue'
import About from './views/About.vue'
import Videos from './views/Videos.vue'
import Materials from './views/Materials.vue'
import Contact from './views/Contact.vue'
import Search from './views/Search.vue'
import Clients from './views/Clients.vue'
import ForSmall from './views/ForSmall.vue'*/

const Home = () => import('./views/Home.vue')
const Blog = () => import('./views/Blog.vue')
const SingleBlog = () => import('./views/SingleBlog.vue')
const Talk = () => import('./views/Talk.vue')
const Workshops = () => import('./views/Workshops.vue')
const Trainning = () => import('./views/Trainning.vue')
const Categories = () => import('./views/Categories.vue')
const About = () => import('./views/About.vue')
const Videos = () => import('./views/Videos.vue')
const Materials = () => import('./views/Materials.vue')
const Contact = () => import('./views/Contact.vue')
const Search = () => import('./views/Search.vue')
const Clients = () => import('./views/Clients.vue')
const ForSmall = () => import('./views/ForSmall.vue')

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/consultoria-for-small',
    name: 'ForSmall',
    component: ForSmall
  }, 
  {
    path: '/blog',
    name: 'Blog',
    alias: ['/o-melhor-blog-de-vendas'],
    component: Blog
  },
  
  {
    path: '/busca',
    name: 'Search',
    component: Search
  },
  {
    path: '/categorias',
    name: 'Categories',
    component: Categories
  },
  {
    path: '/quem-somos',
    name: 'About',
    component: About
  },
  {
    path: '/clientes',
    name: 'Clients',
    component: Clients
  },
  {
    path: '/treinamentos',
    name: 'Trainning',
    component: Trainning
  },
  {
    path: '/materiais-de-vendas',
    name: 'Materials',
    component: Materials
  },
  {
    path: '/videos',
    name: 'Videos',
    component: Videos
  },
  {
    path: '/blog/:slug',
    name: 'SingleBlog',
    component: SingleBlog,
    props: {default: true, post: false}
  },
  {
    path: '/palestras-de-vendas',
    alias: ['/fabrica-de-conteudo', '/treinamento-de-vendas', '/programas-de-lideranca', '/formacao-de-trainees', '/multiplicadores-internos'],
    name: 'Talk',
    component: Talk
  },
  
  {
    path: '/workshops',
    alias: ['/vendas', '/negociacao', '/lideranca', '/eficacia-pessoal', '/gestao'],
    name: 'Workshops',
    component: Workshops
  },
  {
    path: '/contato',
    name: 'Contact',
    component: Contact
  },  
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
  scrollBehavior() {
    return window.scrollTo({ top: 0, behavior: "smooth" });
  }
})

export default router