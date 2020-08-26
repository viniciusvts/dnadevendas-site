<template>
  <section class="about" v-if="post">
    <div class="container">
      <div class="texto-principal">
        <h1 v-html="post.acf.head.titulo"></h1>
        <div v-html="post.acf.head.texto"></div>
      </div>

      <div class="row">
        <div class="col-md-6 left">
          <h2 v-html="post.acf.conteudo_esquerdo.titulo"></h2>
          <div class="texto" v-html="post.acf.conteudo_esquerdo.conteudo"></div>
        </div>

        <div class="col-md-6 right">
          <h2 v-html="post.acf.conteudo_direito.titulo"></h2>
          <div class="row" v-for="(item, index) in post.acf.conteudo_direito.valores" :key="index">
            <div class="col-auto">
              <img :src="item.imagem.sizes.medium" :alt="item.imagem.alt" />
            </div>
            <div class="col">
              <h3 v-html="item.titulo"></h3>
              <p v-html="item.texto"></p>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-5 group">
        <h1 v-html="post.acf.grupo_dna.titulo"></h1>
        <div class="col-md-4" v-for="(item, index) in post.acf.grupo_dna.galeria" :key="index">
          <a :href="item.link.url" :target="item.link.target">
            <img :src="item.imagem.sizes.large" :alt="item.imagem.alt" />
          </a>
        </div>
      </div>

      <div class="row mt-5">
        <h1 v-html="post.acf.estrutura.titulo"></h1>
        <div class="texto" v-html="post.acf.estrutura.texto"></div>
      </div>
      <div class="galery">
        <div class="row">
          <div class="col-md-3" v-for="(item, index) in post.acf.estrutura.galeria" :key="index">
            <img :src="item.sizes.large" :alt="item.alt" />
          </div>
        </div>
      </div>
    </div>
  </section>
  <div v-else class="container loadingPage">
      <Loading />
  </div>
</template>

<script>
import Loading from "@/components/Loading.vue";
export default {
  name: "About",
  components:{Loading},
  data() {
    return {
      postId: 312,
      post: null
    };
  },
  mounted() {
    this.getPost();
  },
  methods: {
    getPost() {
      this.$http.getPagesById(this.postId)
        .then(resp => resp.json())
        .then(json => {
          this.post = json;
          document.title = this.post.yoast_title
        });
    }
  }
};
</script>

<style lang="scss">
@import "@/assets/scss/about.scss";
</style>