<template>
  <section class="materials mt-5" v-if="page" >
    <div class="container container-fhd">
      <h1>{{page.title.rendered}}</h1>
      <p>Aqui você encontrará vídeos, palestras, apresentações e outros materiais gratuitos sobre vendas. Baixe à vontade!</p>
      <div class="row">
        <div v-for="(mat, index) in page.acf.material" :key="index" class="col-12 col-lg-4 mb-4">
          <a :href="mat.link" target="_blank">
            <div class="card h-100">
              <div class="row h-100">
                <div class="col-12">
                  <div class="left">
                    <img v-if="index < 6" :src="mat.imagem.sizes.large" :alt="mat.imagem.alt">
                    <img v-else class="lazy" :data-src="mat.imagem.sizes.large" :alt="mat.imagem.alt">
                  </div>
                </div>
                <div class="col-12 h-50">
                  <div class="right h-90">
                    <h2>{{mat.titulo}}</h2>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
  <div v-else class="container loadingPage">
      <Space />
  </div>
</template>

<script>
import Space from "@/components/Space.vue";

export default {
  name: "Materials",
  components:{Space},
  data(){
    return {
      pageId: 2930,
      page: null
    }
  },
  created(){
    this.getPage();
  },
  methods:{
    getPage(){
      this.$http.getPagesById(this.pageId)
      .then(resp => resp.json())
      .then(json => {
        this.page = json;
        document.title = this.page.yoast_title
      });
    },
  }
}
</script>

<style lang="scss">
  @import '@/assets/scss/materials.scss';
</style>