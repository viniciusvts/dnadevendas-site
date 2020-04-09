<template>
  <header id="menu-fixed" :class="matchRoute">
    <nav>
      <div class="logo">
        <router-link to="/">
          <img src="@/assets/svg/logo.svg" alt="Dna de Vendas">
        </router-link>
      </div>
      <ul>
        <li>
          <router-link :to="{ name: 'Home' }">Quem somos
          </router-link>
        </li>

        <li>
          <router-link to="/">Consultoria
          </router-link>
        </li>

        <li>
          <router-link to="/">Treinamento
          </router-link>
        </li>

        <li>
          <router-link to="/">Palestras
          </router-link>
        </li>

        <li>
          <router-link to="/">Workshops
          </router-link>
        </li>

        <li>
          <router-link :to="{ name: 'Blog' }">Conteúdo
          </router-link>
        </li>

        <li>
          <router-link :to="{ name: 'Contato' }">Contato
          </router-link>
        </li>
      </ul>      
    </nav>
  </header>
</template>

<script>
  export default {
    name: "TheHeader",
    data() {
      return {
        blog: false
      }
    },
    created(){
      const html = document.documentElement // returns the html tag
      html.setAttribute('lang', 'pt-BR');

      window.onscroll = function(){
        let menuFixed = document.getElementById("menu-fixed");
        if(this.scrollY > 91){
          menuFixed.setAttribute("style", "background-color: #1a213b; position: fixed");
        }else{
          menuFixed.removeAttribute("style");
        }
      }
    },
    computed:{
      matchRoute(){
        let rota = this.$route.name;
        return rota === 'Blog' || rota === 'SingleBlog' ? 'darkMenu' : 'defaultMenu';
      }
    }
  };
</script>

<style lang="scss">
  @import '@/assets/scss/variables.scss';  
  @import '@/assets/scss/mixins.scss';
  @import '@/assets/scss/breakpoint.scss';
  @import '@/assets/scss/general.scss';
  @import '@/assets/scss/header.scss';
</style>
