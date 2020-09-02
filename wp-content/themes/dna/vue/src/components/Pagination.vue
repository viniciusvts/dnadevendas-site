<template>
  <div class="pagination">
      <p v-if="matchRoute">Páginas</p>
      <div class="row no-gutters align-items-center">          
          <div class="col">
              <router-link 
              v-if="getPrevPage"
              :to="{ name: ((getPrevPage == 1) ? 'Blog' : $route.name), params: { page: getPrevPage } }"
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
                        <router-link 
                        v-if="getPrevPage"
                        :to="{ name: ((getPrevPage == 1) ? 'Blog' : $route.name), params: { page: getPrevPage } }"
                        rel="prev">
                            <span>
                                <img src="@/assets/svg/separator.svg" alt="">
                            </span>
                        </router-link>
                        <span v-else class="active">
                            <img src="@/assets/svg/separator.svg" alt="">
                        </span>
                    </div>

                    <router-link 
                    v-if="(!getPrevPage)"
                    :to="{
                        name: (($route.name == 'Blog') ? 'BlogPage' : $route.name),
                        params: { page: getNextPage }
                    }"
                    rel="next">
                        <span class="">
                            <img src="@/assets/svg/separator.svg" alt="">
                        </span>
                    </router-link>
                    <router-link 
                    v-else-if="(!getNextPage && getPrevPage)"
                    :to="{
                        name: (($route.name == 'Blog') ? 'BlogPage' : $route.name),
                        params: { page: getPrevPage }
                    }"
                    rel="next">
                        <span class="">
                            <img src="@/assets/svg/separator.svg" alt="">
                        </span>
                    </router-link>
                    <div v-else class="col-auto">
                        <span :class="{'active':(getPrevPage && getNextPage)}">
                            <img src="@/assets/svg/separator.svg" alt="">
                        </span>
                    </div>

                    <div class="col-auto">
                        <router-link 
                        v-if="getNextPage"
                        :to="{
                            name: (($route.name == 'Blog') ? 'BlogPage' : $route.name),
                            params: { page: ((!getPrevPage) ? (getNextPage +1) : getNextPage) }
                        }"
                        rel="next">
                            <span class="">
                                <img src="@/assets/svg/separator.svg" alt="">
                            </span>
                        </router-link>
                        <span v-else class="active">
                            <img src="@/assets/svg/separator.svg" alt="">
                        </span>
                    </div>

                </div>
            </div>
          </div>
          <div class="col">
                <router-link 
                v-if="getNextPage"
                :to="{ name: (($route.name == 'Blog') ? 'BlogPage' : $route.name), params: { page: getNextPage } }"
                class="btn next"
                rel="next">
                  <img src="@/assets/svg/big-arrow.svg" alt="Próximo">
                </router-link>
                <!-- senão mostra mas não tem link -->
                <span v-else class="btn next disabled">
                    <img src="@/assets/svg/big-arrow.svg" alt="Voltar">
                </span>
          </div>
      </div>
  </div>
</template>

<script>
    export default {
        name: "Pagination",
        props: {
            endOfPosts: Boolean
        },
        computed:{
            getPrevPage(){
                if(typeof this.$route.params.page == 'undefined' || this.$route.params.page == 1)
                    return false
                return Number(this.$route.params.page) - 1;
            },
            getNextPage(){
                if(typeof this.$route.params.page == 'undefined') return 2;
                if (this.endOfPosts) return false;
                return Number(this.$route.params.page) + 1;
            },
            getThisPage(){
                if(typeof this.$route.params.page == 'undefined') return 1;
                return Number(this.$route.params.page);
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