<template>
  <div>
    <header id="menu-fixed" class="fixed-top" :class="{darkMenu: matchRoute}">
      <nav>
        <div class="logo">
          <router-link to="/">
            <img v-if="matchRoute" src="@/assets/svg/logo.svg" alt="Dna de Vendas">
            <img v-else src="@/assets/svg/logo-dnadevendas.svg" alt="Dna de Vendas">
          </router-link>
        </div>
        <div id="burgerMenu">
          <img v-if="matchRoute" src="@/assets/svg/open-menu-white.svg" alt="Menu mobile">
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
            <router-link to="/treinamentos">Treinamento</router-link>
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
            <img v-if="matchRoute" src="@/assets/svg/search-white.svg" alt="">
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
    components:{
      Search
    },
    created(){
      const html = document.documentElement // returns the html tag
      html.setAttribute('lang', 'pt-BR');
    },
    mounted(){
      this.expandMenu();
      this.searching();
    },
    computed:{
      matchRoute(){
        let rota = this.$route.name;
        return rota === 'Blog' || rota === 'SingleBlog' || rota === 'Clients' || rota === 'About';
      },
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
      searching: () => {
        let searchBtn  = document.querySelector('#searchBtn');
        let searching  = document.querySelector('#searching');
        let exit  = document.querySelector('#exit');

        let resultPosts  = document.querySelector('#resultPosts');

        resultPosts.onclick = () =>{
          searching.classList.remove('active');
        }

        exit.onclick = () =>{
          searching.classList.remove('active');
        }

        searchBtn.onclick = () =>{
          searching.classList.add('active');
        }
      }
    },
    watch:{
      url() {
        this.matchRoute();
      }
    }
  };
</script>

<style lang="scss">
  @import '@/assets/scss/header.scss';
  @import '../../node_modules/bootstrap-4-grid/scss/grid.scss';
</style>
