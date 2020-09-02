
import Vue from 'vue'
import VueRouter from 'vue-router'
import ApiRest from "@/services/ApiRest.js";

import Home from './views/Home.vue'
import Blog from './views/Blog.vue'
import SingleBlog from './views/SingleBlog.vue'
import Talk from './views/Talk.vue'
import Workshops from './views/Workshops.vue'
import Categories from './views/Categories.vue'
import About from './views/About.vue'
import Videos from './views/Videos.vue'
import Materials from './views/Materials.vue'
import Contact from './views/Contact.vue'
import Search from './views/Search.vue'
import Clients from './views/Clients.vue'
import ForSmall from './views/ForSmall.vue'
import Training from './views/Training.vue'
import FullService from './views/FullService.vue'
import Page from './views/Page.vue'
import Mentoring from './views/Mentoring.vue'
import ContentFabric from './views/ContentFabric.vue'
import SalesTraining from './views/SalesTraining.vue'
import LeaderPrograms from './views/LeaderPrograms.vue'
import InternalMultipliers from './views/InternalMultipliers.vue'
import NaoEncontrado from './views/NaoEncontrado.vue'

Vue.use(VueRouter)
Vue.prototype.$http = ApiRest

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
    path: '/o-melhor-blog-de-vendas',
    name: 'Blog',
    alias: ['/blog'],
    component: Blog
  },
  {
    path: '/o-melhor-blog-de-vendas/page/:page',
    name: 'BlogPage',
    alias: ['/page/:page'],
    component: Blog,
    props: {default: true, page: true}
  },
  {
    path: '/o-melhor-blog-de-vendas/categoria/:cat/page/:page',
    alias: ['/categorias/:cat/page/:page'],
    name: 'BlogCat',
    component: Blog,
    props: {default: true, cat: true, page: false}
  },
  {
    path: '/o-melhor-blog-de-vendas/categoria/:cat',
    alias: ['/categorias/:cat'],
    name: 'BlogCat',
    component: Blog,
    props: {default: true, cat: true}
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
    path: '/sobre',
    name: 'About',
    component: About
  },
  {
    path: '/clientes',
    name: 'Clients',
    component: Clients
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
    props: {default: true, post: true}
  },
  {
    path: '/palestras-de-vendas',
    name: 'Talk',
    component: Talk
  },
  
  {
    path: '/workshops-de-vendas',
    alias: ['/vendas', '/negociacao', '/lideranca', '/eficacia-pessoal', '/gestao'],
    name: 'Workshops',
    component: Workshops
  },
  {
    path: '/contato',
    name: 'Contact',
    component: Contact
  },  
  {
    path: '/vendas-training',
    name: 'Training',
    component: Training
  },
  {
    path: '/full-service',
    name: 'FullService',
    component: FullService
  },  
  {
    path: '/mentoria-online',
    name: 'Mentoring',
    component: Mentoring
  },
  {
    path: '/fabrica-de-conteudo',
    name: 'ContentFabric',
    component: ContentFabric
  },
  {
    path: '/treinamento-de-vendas',
    name: 'SalesTraining',
    component: SalesTraining
  },
  {
    path: '/programas-de-lideranca',
    name: 'LeaderPrograms',
    component: LeaderPrograms
  },
  {
    path: '/multiplicadores-internos',
    name: 'InternalMultipliers',
    component: InternalMultipliers
  },
  {
    path: '/:slug',
    name: 'Page',
    component: Page,
    props: {default: true, slug: true}
  },
  {
    path: '/:parent/:slug',
    name: 'Page',
    component: Page,
    props: {default: true, parent: true, slug: true}
  },
  /* regra acima pega a maioria das rotas, 
  no caso de alguma não ser pega, um 404 para garantir: */
  {
    path: '*',
    name: 'NaoEncontrado',
    component: NaoEncontrado
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