<template>
  <div class="talk" v-if="bannerData">
    <Spotlight>
      <div class="text section">
        <h1 v-html="bannerData.chamada"></h1>
        <h2 v-if="bannerData.subtitulo">{{bannerData.subtitulo}}</h2>
        <button class="btn-grad" v-if="bannerData">
          <a href="#contato-servico">
            {{bannerData.cta}}
          </a>
        </button>
      </div>
      <div class="see-more">
        <div class="container">
          <span>Saiba mais</span>
          <img src="@/assets/svg/fast-forward.svg"/>
        </div>
      </div>
      <img class="image" :src="bannerData.imagem" :alt="bannerData.chamada">
    </Spotlight>

    <section v-if="bannerData">
      <div v-for="(obj, index) in objecoes" :key="index">
        <CardSlider :objection="obj" :index="index"/>
      </div>
    </section>
    
    <Metrics v-if="bannerData">
      <div class="col-md-3" v-for="(metric, index) in metricas" :key="index">
        <img class="lazy"
        :data-src="metric.icone.sizes.medium"
        :alt="metric.metrica">
        <span>{{metric.metrica}}</span>
        <h3 v-html="metric.titulo"></h3>
      </div>
    </Metrics>

    <!-- <fale-conosco></fale-conosco> -->
    <sec-contact v-if="bannerData"/>
    
  </div>
  <div v-else class="container loadingPage">
      <Space />
  </div>
</template>

<script>
  import Space from "@/components/Space.vue";
  import Spotlight from '@/components/Spotlight.vue';
  // import FaleConosco from '@/components/FaleConosco.vue';
  import Metrics from '@/components/Metrics.vue';
  import CardSlider from '@/components/CardSlider.vue';
  import SolicitarContato from '@/components/SolicitarContato.vue';

  export default {
    name: "WorkShops",
    components: {
      Space,
      Spotlight,
      Metrics,
      'sec-contact': SolicitarContato,
      CardSlider,
    },
    data() {
      return {
        objecoes: null,
        pageID: 3140,
        bannerData: null,
        metricas: null,
        post: null
      };
    },
    mounted() {
      this.getAcf();
    },
    methods: {
      getAcf(){
        this.$http.getPagesById(this.pageID)
        .then(resp => resp.json())
        .then(json => {
          this.post = json;
          this.objecoes = json.acf.objecoes;
          this.metricas = json.acf.metricas;
          const banner = {};
            banner.chamada = json.acf.chamada;
            banner.cta = json.acf.cta;
            banner.imagem = json.acf.foto.sizes.medium_large;
            // imagem_banner: json.acf.imagem.sizes.medium_large,
          this.bannerData = banner;
          document.title = this.post.yoast_title
        });
      }
    },
  }
</script>

<style lang="scss">
  @import '@/assets/scss/talk.scss';
  .metrics{
    background-color: white;
    text-align: center;
    span{
        @include fontSize(50px);
        font-weight: bold;
        color: $golden;
    }

    h3{
        @include fontSize(22px);
    }
    img{
        max-width: 200px;
        height: 70px;
        margin: 10px auto 30px auto;
    }
}
</style>