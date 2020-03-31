<template>
  <header id="menu-fixed">
    <nav>
      <div class="logo">
        <router-link to="/">
          <img src="@/assets/svg/logo.svg" alt="Dna de Vendas">
        </router-link>
      </div>
      <ul>
        <li>
          <router-link to="/">Quem somos
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
          <router-link to="/blog">Conteúdo
          </router-link>
        </li>

        <li>
          <router-link to="/contato">Contato
          </router-link>
        </li>
      </ul>      
    </nav>
  </header>
</template>

<script>
  export default {
    name: "TheHeader",
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
