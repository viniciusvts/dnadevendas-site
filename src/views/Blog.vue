<template>
  <section class="blog">
    <div class="container-fluid">
      <BlogFilter/>
      <div class="content">
        <div class="row">
          <div class="col-md-9">
            <router-link to="/blog/dasds">
              <div class="row"> 
                <div class="col-12 col-md-6 col-lg-6">
                  <div class="card">
                    <div class="row">
                      <div class="col-6 col-md-12 col-lg-12">
                        <div class="left">
                          <img src="https://www.dnadevendas.com.br/wp-content/uploads/consultoria-online-de-vendas.jpg" alt="">
                        </div>
                      </div>
                      <div class="col-6 col-md-12 col-lg-12">
                        <div class="right">
                          <div class="categories">
                            <ul>
                              <li>Cases</li>
                              <li>Gestão</li>
                            </ul>
                          </div>

                          <h2>Consultoria online de vendas: vantagens para pequenas e médias empresas</h2>

                          <div class="bottom">
                            <div class="row no-gutters">
                              <!--author-->
                              <div class="col">
                                <div class="author">
                                  <div class="row no-gutters">
                                    <div class="col-auto">
                                      <img src="https://www.dnadevendas.com.br/wp-content/uploads/lucia-150x150.jpg" alt="">
                                    </div>
                                    
                                    <div class="col">
                                      <p>Lucia Haracemiv</p>
                                    </div>
                                  </div>
                                </div>
                              </div><!--author-->

                              <!--views-->
                              <div class="col-auto">
                                <div class="views">
                                  <div class="row no-gutters">
                                    <div class="col">
                                      <span>200</span>
                                    </div>
                                    <div class="col">
                                      <img src="@/assets/svg/book.svg" alt="">
                                    </div>
                                  </div>
                                </div>
                              </div><!--views-->
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6">
                  <div class="card">
                    <div class="row">
                      <div class="col-6 col-md-12 col-lg-12">
                        <div class="left">
                          <img src="https://www.dnadevendas.com.br/wp-content/uploads/consultoria-online-de-vendas.jpg" alt="">
                        </div>
                      </div>
                      <div class="col-6 col-md-12 col-lg-12">
                        <div class="right">
                          <div class="categories">
                            <ul>
                              <li>Cases</li>
                              <li>Gestão</li>
                            </ul>
                          </div>

                          <h2>Consultoria online de vendas: vantagens para pequenas e médias empresas</h2>

                          <div class="bottom">
                            <div class="row no-gutters">
                              <!--author-->
                              <div class="col">
                                <div class="author">
                                  <div class="row no-gutters">
                                    <div class="col-auto">
                                      <img src="https://www.dnadevendas.com.br/wp-content/uploads/lucia-150x150.jpg" alt="">
                                    </div>
                                    
                                    <div class="col">
                                      <p>Lucia Haracemiv</p>
                                    </div>
                                  </div>
                                </div>
                              </div><!--author-->

                              <!--views-->
                              <div class="col-auto">
                                <div class="views">
                                  <div class="row no-gutters">
                                    <div class="col">
                                      <span>200</span>
                                    </div>
                                    <div class="col">
                                      <img src="@/assets/svg/book.svg" alt="">
                                    </div>
                                  </div>
                                </div>
                              </div><!--views-->
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </router-link>

            <Pagination/>
          </div>

          <div class="col-md-3">
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
  @import '@/assets/scss/blog.scss';
</style>