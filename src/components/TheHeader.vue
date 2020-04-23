<template>
  <div>
    <header id="menu-fixed" class="fixed-top" :class="menuStyle">
      <nav>
        <div class="logo">
          <router-link to="/">
            <img v-if="logoWhite" src="@/assets/svg/logo.svg" alt="Dna de Vendas">
            <img v-else src="@/assets/svg/logo-dnadevendas.svg" alt="Dna de Vendas">
          </router-link>
        </div>
        <div id="burgerMenu">
          <img v-if="logoWhite" src="@/assets/svg/open-menu-white.svg" alt="Menu mobile">
          <img v-else src="@/assets/svg/open-menu.svg" alt="Menu mobile">          
        </div>
        <ul id="menuItems" class="menuDesktop">
          <li>
            Quem somos
            <span>&#x25bc;</span>
            <div class="submenu">
              <ul>
                <li>
                  <router-link to="/quem-somos">Quem somos</router-link>
                </li>
                <li>
                  <router-link to="/clientes">Clientes</router-link>
                </li>
              </ul>
            </div>
          </li>

          <li>
            Consultoria
            <span>&#x25bc;</span>
            <div class="submenu">
              <ul>
                <li>
                  <router-link to="/full-service">Consultoria de vendas Full Service</router-link>
                </li>
                <li>
                  <router-link to="/vendas-training/">Consultoria de Vendas Trainning</router-link>
                </li>
                <li>
                  <router-link to="/consultoria-for-small/">Consultoria de Vendas para pequenas empresas (For Small)</router-link>
                </li>
              </ul>
            </div>
          </li>

          <li>
            Treinamentos
            <span>&#x25bc;</span>
            <div class="submenu">
              <ul>
                <li>
                  <router-link to="/fabrica-de-conteudo">Fábrica de Conteúdo</router-link>
                </li>
                <li>
                  <router-link to="/treinamento-de-vendas">Treinamento de Vendas</router-link>
                </li>
                <li>
                  <router-link to="/programas-de-liderança">Programas de Liderança</router-link>
                </li>
                <li>
                  <router-link to="/formacao-de-trainees">Formação de Trainees</router-link>
                </li>
                <li>
                  <router-link to="/multiplicadores-internos">Multiplicadores Internos</router-link>
                </li>
              </ul>
            </div>
          </li>

          <li>
            <router-link to="/palestras-de-vendas">Palestras</router-link>
          </li>

          <li>
            <router-link to="/workshops">Workshops</router-link>
          </li>

          <li>
            Conteúdo
            <span>&#x25bc;</span>
            <div class="submenu">
              <ul>
                <li>
                  <router-link to="/o-melhor-blog-de-vendas">Blog</router-link>
                </li>
                <li>
                  <router-link to="/materiais-de-vendas">Materiais</router-link>
                </li>
                <li>
                  <router-link to="/videos">Videos</router-link>
                </li>
              </ul>
            </div>
          </li>

          <li>
            <router-link to="/contato">Contato</router-link>
          </li>
        </ul>    
        <div id="searchBtn">  
          <div>      
            <img v-if="logoWhite" src="@/assets/svg/search-white.svg" alt="">
            <img v-else src="@/assets/svg/search.svg" alt="">
            <p>Buscar</p>
          </div>
        </div>  
      </nav>    
    </header>
    <Search/>
  </div>
</template>

<script>

  import Search from '@/components/Search.vue';

  export default {
    name: "TheHeader",
    data(){
      return {
        menuStyle: null,
        logoWhite: false
      }
    },
    components:{
      Search
    },
    created(){
      const html = document.documentElement // returns the html tag
      html.setAttribute('lang', 'pt-BR');
    },
    mounted(){
      this.expandMenu();
      this.matchRoute();
    },
    methods:{
      expandMenu: () => {
        let burgerMenu = document.querySelector('#burgerMenu');
        let menuItems = document.querySelector('#menuItems');
        
        burgerMenu.onclick = () => {
          if(menuItems.classList.contains('menuDesktop')){
            menuItems.classList.remove('menuDesktop');
            menuItems.classList.add('menuMobile');
          }else{
            menuItems.classList.add('menuDesktop');
            menuItems.classList.remove('menuMobile');
          }
        };
      },
      matchRoute(){
        if(this.slug === 'Blog' || this.slug === 'SingleBlog' || this.slug === 'Clients' || this.slug === 'About'){
          this.menuStyle = 'darkMenu';
          this.logoWhite = true;
        }else if(this.slug === 'Workshops' || this.slug === 'Talk' || this.slug === 'ForSmall'){
          this.menuStyle = 'darkTransparent';
          this.logoWhite = true;
        }
        else{
          this.menuStyle = 'defaultMenu'; 
          this.logoWhite = false;
        }
      }
      
    },
    computed: {
      slug() {
        let rota = this.$route.name;
        return rota;
      }
    },
    watch:{
      slug() {
        this.matchRoute();
      }
    }
  };
</script>

<style lang="scss">
  @import '@/assets/scss/header.scss';
  @import '../../node_modules/bootstrap-4-grid/scss/grid.scss';
</style>
