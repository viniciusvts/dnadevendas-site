
import Vue from 'vue'
import VueRouter from 'vue-router'

const Home = () => import('./views/Home.vue')
const Blog = () => import('./views/Blog.vue')
const SingleBlog = () => import('./views/SingleBlog.vue')
const Talk = () => import('./views/Talk.vue')
const Workshops = () => import('./views/Workshops.vue')
const Categories = () => import('./views/Categories.vue')
const About = () => import('./views/About.vue')
const Videos = () => import('./views/Videos.vue')
const Materials = () => import('./views/Materials.vue')
const Contact = () => import('./views/Contact.vue')
const Search = () => import('./views/Search.vue')
const Clients = () => import('./views/Clients.vue')
const ForSmall = () => import('./views/ForSmall.vue')
const Page = () => import('./views/Page.vue')

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
  {
    path: '/:slug',
    name: 'Page',
    component: Page,
    props: true
  }
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