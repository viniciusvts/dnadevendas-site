<template>
  <div class="spotlight">
    <div class="text section">
      <h1>A mais completa <b>Consultoria de Vendas</b> para aumento de produtividade</h1>
      <button class="btn-grad">
        <router-link to="/contato">
          Falar com um consultor
        </router-link>
      </button>
    </div>
    <div class="see-more">
      <div class="container">
        <span>Saiba mais</span>
        <img src="@/assets/svg/fast-forward.svg"/>
      </div>
    </div>
    <img class="image" src="@/assets/spotlight.jpg"/>
  </div>
</template>

<script>
  export default {
    name: 'Spotlight',
  }
</script>

<style scoped lang="scss">
  @import '@/assets/scss/spotlight.scss';
</style>
