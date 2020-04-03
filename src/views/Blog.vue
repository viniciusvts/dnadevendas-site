<template>
  <section class="blog">
    <div class="section">
      <BlogFilter/>
      <div class="content">
        <div class="columns">
          <div class="column">
            <router-link to="/">
              <div class="cards"> 
                <div class="columns">
                  <div class="column">
                    <div class="card">
                      <div class="columns">
                        <div class="left">
                          <img src="https://www.dnadevendas.com.br/wp-content/uploads/consultoria-online-de-vendas.jpg" alt="">
                        </div>
                        <div class="right">
                          <div class="categories">
                            <ul>
                              <li>Cases</li>
                              <li>Gestão</li>
                            </ul>
                          </div>

                          <h2>Consultoria online de vendas: vantagens para pequenas e médias empresas</h2>

                          <div class="bottom">
                            <div class="signature">
                              <div class="author">
                                <img src="https://www.dnadevendas.com.br/wp-content/uploads/lucia-150x150.jpg" alt="">
                                <p>Lucia Haracemiv</p>
                              </div>
                              <div class="views">
                                <span>200</span>
                                <img src="@/assets/svg/book.svg" alt="">
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="column">
                    <div class="card">
                      <div class="columns">
                        <div class="left">
                          <img src="https://www.dnadevendas.com.br/wp-content/uploads/consultoria-online-de-vendas.jpg" alt="">
                        </div>
                        <div class="right">
                          <div class="categories">
                            <ul>
                              <li>Cases</li>
                              <li>Gestão</li>
                            </ul>
                          </div>

                          <h2>Consultoria online de vendas: vantagens para pequenas e médias empresas</h2>

                          <div class="bottom">
                            <div class="signature">
                              <div class="author">
                                <img src="https://www.dnadevendas.com.br/wp-content/uploads/lucia-150x150.jpg" alt="">
                                <p>Lucia Haracemiv</p>
                              </div>
                              <div class="views">
                                <span>200</span>
                                <img src="@/assets/svg/book.svg" alt="">
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div> <!--end cards columns-->
              </div>
            </router-link>

            <Pagination/>
          </div>

          <div class="column">
            <Sidebar/>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>

  import BlogFilter from "@/components/BlogFilter.vue";
  import Pagination from "@/components/Pagination.vue"; 
  import Sidebar from "@/components/Sidebar.vue"; 

  export default {
    name: 'Blog',
    components: {
      BlogFilter,
      Pagination,
      Sidebar
    }
  }
</script>

<style lang="scss">
  @import '@/assets/scss/variables.scss';
  @import '@/assets/scss/mixins.scss';
  @import '@/assets/scss/breakpoint.scss';
  @import '@/assets/scss/blog.scss';
</style>