<template>
  <div class="pagination">
      <p v-if="matchRoute">Páginas</p>
      <div class="row no-gutters align-items-center">
          <div class="col">
            <!-- prevprev -->
              <router-link 
              v-if="getPrevPage"
              :to="{ name: $route.name, params: { page: getPrevPage } }"
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
                    <!-- primeiro bulet -->
                    <div class="col-auto">
                        <!-- se primeira página -->
                        <span v-if="!getPrevPage && getNextPage" class="active">
                            <img src="@/assets/svg/separator.svg" alt="">
                        </span>
                        <!-- se última página e tem prevprev -->
                        <router-link 
                        v-else-if="getPrevPrevPage && !getNextPage"
                        :to="{ name: $route.name, params: { page: getPrevPrevPage } }"
                        rel="prev">
                            <span>
                                <img src="@/assets/svg/separator.svg" alt="">
                            </span>
                        </router-link>
                        <!-- se tem prev e tem next-->
                        <router-link 
                        v-else-if="getPrevPage && getNextPage"
                        :to="{ name: $route.name, params: { page: getPrevPage } }"
                        rel="prev">
                            <span>
                                <img src="@/assets/svg/separator.svg" alt="">
                            </span>
                        </router-link>
                    </div>
                    <!-- /primeiro bulet -->
                    <!-- segundo bulet -->
                    <div class="col-auto">
                        <!-- se primeira página e tem next -->
                        <router-link 
                        v-if="(!getPrevPage && getNextPage)"
                        :to="{
                            name: $route.name,
                            params: { page: getNextPage }
                        }"
                        rel="next">
                            <span class="">
                                <img src="@/assets/svg/separator.svg" alt="">
                            </span>
                        </router-link>
                        <!-- se última página e tem prev -->
                        <router-link 
                        v-else-if="(!getNextPage && getPrevPage)"
                        :to="{
                            name: $route.name,
                            params: { page: getPrevPage }
                        }"
                        rel="next">
                            <span class="">
                                <img src="@/assets/svg/separator.svg" alt="">
                            </span>
                        </router-link>
                        <!-- todo o resto -->
                        <span v-else class="active">
                            <img src="@/assets/svg/separator.svg" alt="">
                        </span>
                    </div>
                    <!-- /segundo bulet -->
                    <!-- terceiro bulet -->
                    <div class="col-auto">
                        <!-- se última página -->
                        <span v-if="!getNextPage && getPrevPage" class="active">
                            <img src="@/assets/svg/separator.svg" alt="">
                        </span>
                        <!-- se primeira página e tem nextnext -->
                        <router-link 
                        v-else-if="!getPrevPage && getNextNextPage"
                        :to="{
                            name: $route.name,
                            params: { page: getNextNextPage }
                        }"
                        rel="next">
                            <span class="">
                                <img src="@/assets/svg/separator.svg" alt="">
                            </span>
                        </router-link>
                        <!-- se next e prev -->
                        <router-link 
                        v-else-if="getPrevPage && getNextPage"
                        :to="{
                            name: $route.name,
                            params: { page: getNextPage }
                        }"
                        rel="next">
                            <span class="">
                                <img src="@/assets/svg/separator.svg" alt="">
                            </span>
                        </router-link>
                    </div>
                    <!-- /terceiro bulet -->
                </div>
            </div>
          </div>
          <div class="col">
                <router-link 
                v-if="getNextPage"
                :to="{ name: (($route.name == 'Podcast') ? 'PodcastPage' : $route.name), params: { page: getNextPage } }"
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
        name: "PaginationPodcast",
        props: {
            XWPTotalPages: Number
        },
        computed:{
            getPrevPrevPage(){ // :)
                if(typeof this.$route.params.page == 'undefined' || this.$route.params.page == 1)
                    return false;
                /** prevPage */
                let prevPage = this.$route.params.page -1;
                /** prev prev page */
                const prevPrevPage = prevPage -1;
                if (prevPrevPage < 1) return false;
                return prevPrevPage;
            },
            getPrevPage(){
                if(typeof this.$route.params.page == 'undefined' || this.$route.params.page == 1)
                    return false
                return Number(this.$route.params.page) - 1;
            },
            getThisPage(){
                if(typeof this.$route.params.page == 'undefined') return 1;
                return Number(this.$route.params.page);
            },
            getNextPage(){
                if (this.XWPTotalPages == 1) return false;
                if (typeof this.$route.params.page == 'undefined') return 2;
                if (this.$route.params.page >= this.XWPTotalPages) return false;
                return Number(this.$route.params.page) + 1;
            },
            getNextNextPage(){ // :)
                /** nextPage */
                let nextPage = 0;
                if (typeof this.$route.params.page == 'undefined') nextPage = 2;
                else  nextPage = Number(this.$route.params.page) + 1;
                /** next next page */
                const nextnextPage = nextPage + 1;
                if (nextnextPage > this.XWPTotalPages) return false;
                return nextnextPage;
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