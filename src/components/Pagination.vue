<template>
  <div class="pagination">
      <p v-if="matchRoute">Páginas</p>
      <div class="row no-gutters align-items-center">          
          <div class="col">
              <router-link 
              v-if="getPrevPage"
              :to="{ name: 'BlogPage', params: { page: getPrevPage } }"
              class="btn prev"
              rel="prev">
                  <img src="@/assets/svg/big-arrow.svg" alt="Voltar">
              </router-link>
              <!-- senão mostra mas não tem link -->
              <span v-else class="btn prev disabled">
                  <img src="@/assets/svg/big-arrow.svg" alt="Voltar">
              </span>
          </div>
          <div class="col">
            <div class="bullets">
                <div class="row justify-content-md-center">
                    <div class="col-auto">
                        <span :class="{'active':(!getPrevPage)}">
                            <img src="@/assets/svg/separator.svg" alt="">
                        </span>
                    </div>

                    <div class="col-auto">
                        <span :class="{'active':(getPrevPage)}">
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
              <router-link 
              :to="{ name: 'BlogPage', params: { page: getNextPage } }"
              class="btn next"
              rel="next">
                  <img src="@/assets/svg/big-arrow.svg" alt="Próximo">
              </router-link>
          </div>
      </div>
  </div>
</template>

<script>
    export default {
        name: "Pagination",
        computed:{
            getPrevPage(){
                if(typeof this.$route.params.page == 'undefined' || this.$route.params.page == 1)
                    return false
                return this.$route.params.page - 1;
            },
            getNextPage(){
                if(typeof this.$route.params.page == 'undefined') return 2;
                return this.$route.params.page + 1;
            },
            getThisPage(){
                if(typeof this.$route.params.page == 'undefined') return 1;
                return this.$route.params.page;
            },
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