<template>
  <div class="pagination">
      <p v-if="matchRoute">Páginas</p>
      <div class="row no-gutters align-items-center">          
          <div class="col">
              <span class="btn prev disabled">
                  <img src="@/assets/svg/big-arrow.svg" alt="Voltar">
              </span>
          </div>
          <div class="col">
            <div v-if="matchRoute" class="pages">
                <span class="index">01</span>
                <span class="lenght">/06</span>
            </div>
            <div v-else class="bullets">
                <div class="row justify-content-md-center">
                    <div class="col-auto">
                        <span class="active">
                            <img src="@/assets/svg/separator.svg" alt="">
                        </span>
                    </div>

                    <div class="col-auto">
                        <span class="">
                            <img src="@/assets/svg/separator.svg" alt="">
                        </span>
                    </div>

                    <div class="col-auto">
                        <span class="">
                            <img src="@/assets/svg/separator.svg" alt="">
                        </span>
                    </div>

                </div>
            </div>
          </div>
          <div class="col">
              <span class="btn next">
                  <img src="@/assets/svg/big-arrow.svg" alt="Próximo">
              </span>
          </div>
      </div>
  </div>
</template>

<script>
    export default {
        name: "Pagination",
        computed:{
            matchRoute(){
                let rota = this.$route.name;
                return rota === 'Blog' ? true : false;
            }
        }
    }
</script>

<style lang="scss" >
    @import "@/assets/scss/variables.scss";
    @import "@/assets/scss/mixins.scss";
    @import "@/assets/scss/pagination.scss";
</style>