<template>
  <div class="d-flex thumbnail">
    <div class="iframe" v-html="postDataAcf.embed_spotify">
    </div>
    <div class="info d-none d-lg-block">
      <p class="top">A Ciência da Venda</p>
      <h1 v-html="postDataAcf.titulo_single"></h1>
      <div class="bottom row mt-date">
        <span class="col-6">{{postDataAcf.nome_dos_participantes}}</span>
        <span class="offset-3 ml-auto d-flex">{{getOcidentalDate(postDate)}}</span>
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    name: "HeadSinglePodcastv1",
    props: {
      postDataAcf: Object,
      postDate: String
    },
    methods: {
      getOcidentalDate(date){
        var dateObj = new Date(date)
        return dateObj.toLocaleDateString();
      },
    },
  };
</script>
<style lang="scss">
  @import '@/assets/scss/blogSingle.scss';
</style>