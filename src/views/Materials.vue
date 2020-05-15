<template>
  <section class="materials mt-5">
    <div v-if="page" class="container container-fhd">
      <h1>{{page.title.rendered}}</h1>
      <p>Aqui você encontrará vídeos, palestras, apresentações e outros materiais gratuitos sobre vendas. Baixe à vontade!</p>
      <div class="row">
        <div v-for="(mat, index) in page.acf.material" :key="index" class="col-12 col-lg-4 mb-4">
          <a :href="mat.link">
            <div class="card h-100">
              <div class="row h-100">
                <div class="col-12">
                  <div class="left">
                    <img :src="mat.imagem.sizes.large" :alt="mat.imagem.alt">
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
    
    <div v-else class="container container-fhd">
      <Loading />
    </div>
  </section>
</template>

<script>
import Loading from "@/components/Loading.vue";
import Api from "@/services/ApiRest.js"; 

export default {
  name: "Materials",
  components:{Loading},
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
      Api.getPagesById(this.pageId)
      .then(resp => resp.json())
      .then(json => {
        this.page = json;
        this.$root.meta.title = this.page.yoast_title;
        this.$root.meta.tags = this.page.yoast_meta;
      });
    },
  }
}
</script>

<style lang="scss">
  @import '@/assets/scss/materials.scss';
</style>