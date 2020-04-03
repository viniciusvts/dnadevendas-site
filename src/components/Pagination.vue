<template>
  <div class="pagination">
      <p>Páginas</p>
      <div class="columns">          
          <div class="column">
              <span class="btn prev disabled">
                  <img src="@/assets/svg/big-arrow.svg" alt="Voltar">
              </span>
          </div>
          <div class="column">
              <span class="index">01</span>
              <span class="lenght">/06</span>
          </div>
          <div class="column">
              <span class="btn next">
                  <img src="@/assets/svg/big-arrow.svg" alt="Próximo">
              </span>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name: "Pagination"
}
</script>

<style lang="scss" >
    @import "@/assets/scss/variables.scss";
    @import "@/assets/scss/mixins.scss";
    @import "@/assets/scss/pagination.scss";
</style>