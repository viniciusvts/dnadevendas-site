<template>
  <div class="feedblog section">
      <BlogFilter/>

      <div class="bottom">
          <div class="columns">
            <div class="column">
                <div class="top">
                    <img src="https://www.dnadevendas.com.br/wp-content/uploads/consultoria-online-de-vendas.jpg" alt="">
                    <div class="bottom">
                        <h3>Consultoria online de vendas: vantagens para pequenas e médias empresas</h3>
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

            <div class="column">
                <div class="top">
                    <img src="https://www.dnadevendas.com.br/wp-content/uploads/consultoria-online-de-vendas.jpg" alt="">
                    <div class="bottom">
                        <h3>Consultoria online de vendas: vantagens para pequenas e médias empresas</h3>
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

            <div class="column">
                <div class="top">
                    <img src="https://www.dnadevendas.com.br/wp-content/uploads/consultoria-online-de-vendas.jpg" alt="">
                    <div class="bottom">
                        <h3>Consultoria online de vendas: vantagens para pequenas e médias empresas</h3>
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
          <button>Veja mais</button>
      </div>
  </div>
</template>

<script>

    import BlogFilter from "@/components/BlogFilter.vue";

  export default {
    name: 'Feedblog',
    components: {
        BlogFilter
    }
  }
</script>

<style lang="scss">
    @import '@/assets/scss/variables.scss';
    @import '@/assets/scss/mixins.scss';
    @import '@/assets/scss/breakpoint.scss';
    @import '@/assets/scss/blogFilter.scss';
    @import '@/assets/scss/blogFeed.scss';
</style>
