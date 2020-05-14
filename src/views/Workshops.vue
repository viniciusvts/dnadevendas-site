<template>
  <div class="talk">
    <Spotlight v-if="bannerData">
      <div class="text section">
        <h1>{{bannerData.chamada}}</h1>
        <h2 v-if="bannerData.subtitulo">{{bannerData.subtitulo}}</h2>
        <button class="btn-grad">
          <router-link to="/contato">
            {{bannerData.cta}}
          </router-link>
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

    <div  v-if="objecoes">
      <div v-for="(objection, index) in objecoes" :key="index">
        <section :class="[index % 2 == 0 ? '': 'talkDefault']">
          <div class="container-fluid">
            <div class="row align-items-center" :class="[index % 2 == 0 ? 'flex-row-reverse': '']">

              <div class="col-md-1 d-none d-lg-block d-xl-block" v-if="objection.icone">
                <img class="lazy mr-auto ml-auto" src="@/assets/loading.gif"  :data-src="objection.icone.sizes.normal" :alt="objection.icone.title">
              </div>

              <div class="col-md-5">
                <div class="slider">
                  <div class="slides">
                    <img class="lazy" src="@/assets/loading.gif"  :data-src="objection.imagem[0].sizes.large" :alt="objection.objecao">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="right">
                  <div class="title">
                    <h2>{{objection.objecao}}</h2>
                    <span></span>
                  </div>
                  <div class="text" v-html="objection.texto"></div>
                  <router-link to="/contato">
                    <button> Solicite uma proposta </button>
                  </router-link>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div> 
    
    <section class="container">
      <Metrics class="metrics row" v-if="metricas">
        <div class="col-md-3" v-for="(metric, index) in metricas" :key="index">
          <img class="lazy" src="@/assets/loading.gif" :data-src="metric.icone.sizes.medium" :alt="metric.metrica">
          <span>{{metric.metrica}}</span>
          <h3>{{metric.titulo}}</h3>
        </div>
      </Metrics>
    </section>

    <fale-conosco></fale-conosco>
    
  </div>
</template>

<script>

  import Spotlight from '@/components/Spotlight.vue';
  import FaleConosco from '@/components/FaleConosco.vue';

  export default {
    name: "WorkShops",
    components: {
      Spotlight,
      'fale-conosco': FaleConosco,
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
        fetch(`https://www.dnadevendas.com.br/wp-json/wp/v2/pages/${this.pageID}`)
        .then(resp => resp.json())
        .then(json => {
          this.post = json;
          this.objecoes = json.acf.objecoes;
          this.metricas = json.acf.metricas;
          const banner = {
            chamada: json.acf.chamada,
            cta: json.acf.cta,
            imagem: json.acf.foto.url,
            // imagem_banner: json.acf.imagem.sizes.medium_large,
          };
          this.bannerData = banner;
          this.$root.meta.title = json.yoast_title;
          this.$root.meta.tags = json.yoast_meta;
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