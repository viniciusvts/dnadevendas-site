<template>
  <div>
    <header id="menu-fixed" class="fixed-top"
    :class="[menuStyle, { 'bg-gray': bgGrayMenu}]">
      <nav>

        <div class="logo" v-if="this.$route.name == 'ForSmall'">
          <router-link to="/">
            <img v-if="logoWhite" src="@/assets/svg/logo-dnaforsmall-white.svg" alt="Dna de Vendas">
          </router-link>
        </div>
        <div class="logo" v-else>
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
          <li
            :class="{ 'active': menu.qmSomos}"
            @mouseenter="menu.qmSomos = true"
            @mouseleave="menu.qmSomos = false"
            @click="menu.qmSomos = !menu.qmSomos">
            Quem somos
            <span>&#x25bc;</span>
            <div class="submenu">
              <ul>
                <li>
                  <router-link :to="{name: 'About'}">Quem somos</router-link>
                </li>
                <li>
                  <router-link :to="{name: 'Clients'}">Clientes</router-link>
                </li>
              </ul>
            </div>
          </li>

          <li
            :class="{ 'active': menu.consultoria}"
            @mouseenter="menu.consultoria = true"
            @mouseleave="menu.consultoria = false"
            @click="menu.consultoria = !menu.consultoria">
            Consultoria
            <span>&#x25bc;</span>
            <div class="submenu">
              <ul>
                <li>
                  <router-link :to="{name: 'FullService'}">Consultoria de vendas Full Service</router-link>
                </li>
                <li>
                  <router-link :to="{name: 'Training'}">Consultoria de Vendas Training</router-link>
                </li>
                <li>
                  <router-link :to="{name: 'ForSmall'}">Consultoria de Vendas para pequenas empresas (For Small)</router-link>
                </li>
              </ul>
            </div>
          </li>

          <li
            :class="{ 'active': menu.treinamentos}"
            @mouseenter="menu.treinamentos = true"
            @mouseleave="menu.treinamentos = false"
            @click="menu.treinamentos = !menu.treinamentos">
            Treinamentos
            <span>&#x25bc;</span>
            <div class="submenu">
              <ul>
                <li>
                  <router-link :to="{ name: 'ContentFabric'}">Fábrica de Conteúdo</router-link>
                </li>
                <li>
                  <router-link :to="{name: 'SalesTraining'}">Treinamento de Vendas presencial</router-link>
                </li>
                <li><a href="http://insidesalesacademy.com.br/" target="_blank">Treinamento de Vendas online</a></li>
                <!-- <li>
                  <router-link :to="{name: 'Page', params: { slug: 'trilhas-de-capacitacao-online'}}">Trilhas de Capacitação Online</router-link>
                </li> -->
                <!-- <li>
                  <router-link :to="{name: 'Page', params: { slug: 'treinamento-de-vendas-presencial'}}">Treinamento de Vendas Presencial</router-link>
                </li> -->
                <li>
                  <router-link :to="{name: 'LeaderPrograms'}">Programas de Liderança</router-link>
                </li>
                <li>
                  <router-link :to="{name: 'InternalMultipliers'}">Multiplicadores Internos</router-link>
                </li>
                <li>
                  <router-link :to="{name: 'Workshops'}">Workshops de Vendas</router-link>
                </li>
              </ul>
            </div>
          </li>

          <li
            :class="{ 'active': menu.palestras}"
            @mouseenter="menu.palestras = true"
            @mouseleave="menu.palestras = false"
            @click="menu.palestras = !menu.palestras">
            Palestras
            <span>&#x25bc;</span>
            <div class="submenu">
              <ul>
                <li>
                  <router-link :to="{name: 'Talk'}">Palestras para Eventos</router-link>
                </li>
                <li>
                  <router-link :to="{name: 'Workshops'}">Workshops de Vendas</router-link>
                </li>
              </ul>
            </div>

          </li>

          <li>
          <router-link :to="{name: 'Mentoring'}">Mentoria</router-link>
          </li>
          
          <li
            :class="{ 'active': menu.capOnline}"
            @mouseenter="menu.capOnline = true"
            @mouseleave="menu.capOnline = false"
            @click="menu.capOnline = !menu.capOnline">
            Capacitação Online
            <span>&#x25bc;</span>
            <div class="submenu">
              <ul>
                <li><a href="http://insidesalesacademy.com.br/" target="_blank">Vendas Consultivas no Mundo Digital</a></li>
                 <li><a href="https://insidesalesacademy.com.br/hotsite-imob-corretor/" target="_blank">Curso para corretores</a></li>
                  <li><a href="https://insidesalesacademy.com.br/hotsite-imob-gestor/" target="_blank">Curso para Gestores</a></li>
              </ul>
            </div>
          </li>

          <li
            :class="{ 'active': menu.conteudo}"
            @mouseenter="menu.conteudo = true"
            @mouseleave="menu.conteudo = false"
            @click="menu.conteudo = !menu.conteudo">
            Conteúdo
            <span>&#x25bc;</span>
            <div class="submenu">
              <ul>
                <li>
                  <router-link :to="{name: 'Blog'}">Blog</router-link>
                </li>
                <li>
                  <router-link :to="{name: 'Materials'}">Materiais</router-link>
                </li>
                <li>
                  <router-link :to="{name: 'Videos'}">Videos</router-link>
                </li>
              </ul>
            </div>
          </li>

          <li>
            <router-link :to="{name: 'Contact'}">Contato</router-link>
          </li>
        </ul>    
        <div id="searchBtn">  
          <div>      
            <img v-if="logoWhite" src="@/assets/svg/search-white.svg" alt="">
            <!-- <img v-else src="@/assets/svg/search.svg" alt="">
            <p>Buscar</p> -->
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
        logoWhite: false,
        bgGrayMenu: false,
        menu: {
          qmSomos: false,
          consultoria: false,
          treinamentos: false,
          palestras: false,
          capOnline: false,
          conteudo: false,
        }
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
      this.startChangeBackgroundMenuOnScroll();
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
        if(this.slug === 'Blog' || this.slug === 'SingleBlog' || this.slug === 'Clients' || this.slug === 'About' || this.slug === 'Contact'|| this.slug === 'SalesTraining'|| this.slug === 'InternalMultipliers'|| this.slug === 'LeaderPrograms' || this.slug === 'ContentFabric'){
          this.menuStyle = 'darkMenu';
          this.logoWhite = true;
        }else if(this.slug === 'Home' || this.slug === 'Workshops' || this.slug === 'Talk' || this.slug === 'ForSmall' || this.slug === 'Training' || this.slug === 'FullService' || this.slug === 'Mentoring'){
          this.menuStyle = 'darkTransparent';
          this.logoWhite = true;
        }
        else{
          this.menuStyle = 'defaultMenu'; 
          this.logoWhite = false;
        }
      },
      startChangeBackgroundMenuOnScroll ()  {
        document.addEventListener('scroll', () => {
          if (scrollY > 500) this.bgGrayMenu = true
          else this.bgGrayMenu = false
        })
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
