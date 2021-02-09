<template>
  <div class="thumbnailv2">
    <div class="row">
      <div class="col-lg-8">
        <h1 v-html="postDataAcf.titulo_single" class="text-center text-lg-left mt-0"></h1>
        <p class="text-center text-lg-left partic">com {{postDataAcf.nome_dos_participantes}}</p>
      </div>
      <div class="col-lg-4">
        <p class="text-center text-lg-right cienciavenda">A Ciência da Venda</p>
        <p class="text-center text-lg-right datehead">{{getOcidentalDate(postDate)}}</p>
      </div>
    </div>
    <div class="row embeds">
      <div class="col-lg-7" v-html="postDataAcf.embed_spotify"></div>
      <div class="col-lg-5" v-html="postDataAcf.embed_yt"></div>
    </div>
  </div>
</template>
<script>
  export default {
    name: "HeadSinglePodcastv2",
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