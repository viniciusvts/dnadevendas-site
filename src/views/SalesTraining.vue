<template>
  <section class="about">
    <div class="container-fluid">
      <div class="title">
        <h2>{{post.title.rendered}}</h2>
        <span></span>
      </div>

      <img :src="post.acf.imagem.sizes.medium_large" :alt="post.acf.imagem.title">

      <div v-html="post.acf.conteudo"></div>
    </div>
  </section>
</template>

<script>

export default {
  name: "SalesTraining",
  data() {
    return {
      pageID: 316,
      post: null
    };
  },
  mounted() {
    this.getAcf();
  },
  methods: {
    getAcf() {
      fetch(`https://www.dnadevendas.com.br/wp-json/wp/v2/pages/${this.pageID}`)
        .then(resp => resp.json())
        .then(json => {
          this.post = json;
          this.$root.meta.title = json.yoast_title;
          this.$root.meta.tags = json.yoast_meta;
        });
    }
  }
};
</script>

<style lang="scss">
@import "@/assets/scss/about.scss";
</style>