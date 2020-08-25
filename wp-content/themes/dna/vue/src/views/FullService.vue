<template>
  <div class="talk full-service">
    <Spotlight v-if="bannerData">
      <div class="text section">
        <h1 v-html="bannerData.chamada"></h1>
        <h2 v-if="bannerData.subtitulo" v-html="bannerData.subtitulo"></h2>
        <button class="btn-grad">
          <a href="#contato-servico">{{bannerData.cta}}</a>
        </button>
      </div>
      <div class="see-more">
        <div class="container">
          <span>Saiba mais</span>
          <img src="@/assets/svg/fast-forward.svg" />
        </div>
      </div>
      <img class="image" :src="bannerData.imagem" :alt="bannerData.chamada" />
    </Spotlight>
    <PaginaCarregando v-else/>

    <Pillars v-if="pilares">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 col-sm-12 col-tb-12">
            <h3 v-if="pilares.titulo" v-html="pilares.titulo"></h3>
          </div>

          <div v-for="(pilar, index) in pilares.pilares" :key="index"
            class="col-md-2 col-sm-12 col-tb-12" :class="[index < 3 ? 'pillar' : '']">
            <img :src="pilar.icone.url" :alt="pilar.pilar" />
            <p>{{pilar.pilar}}</p>
          </div>

          <div class="col-md-12 col-sm-12 col-tb-12 no-animate">
            <img src="@/assets/line-svg.svg" alt="Divisória" />
          </div>
        </div>
      </div>
    </Pillars>
    <PaginaCarregando v-else/>

    <section class="about pt-0">
      <div class="title">
        <h2 v-if="post.acf.chamada_sobre" v-html="post.acf.chamada_sobre"></h2>
        <span></span>
      </div>
      <img v-if="post.acf.imagem_sobre" :src="post.acf.imagem_sobre" :alt="post.acf.chamada_sobre" />
      <p v-if="post.acf.texto_sobre" v-html="post.acf.texto_sobre"></p>
    </section>

    <section v-if="pilares" class="pilares">
      <div class="container-fluid">
        <div class="row">
          <div v-for="(pilar, index) in pilares.pilares" :key="index" class="pilar">
            <div class="row align-items-center">
              <div class="col-md-auto left">
                <img :src="pilar.icone.url" :alt="pilar.pilar" />
              </div>
              <div class="col right">
                <h2>{{pilar.pilar}}</h2>
                <p>{{pilar.descricao}}</p>
              </div>
            </div>
            <div v-if="pilar.itens_pilar" class="itens-pilar">
              <ul>
                <li v-for="(item, index) in pilar.itens_pilar" :key="index">
                  {{item.texto_item}}
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <PaginaCarregando v-else/>

    <div v-if="objecoes">
      <div v-for="(obj, index) in objecoes" :key="index">
        <CardSlider :objection="obj" :index="index" />
      </div>
    </div>
    <PaginaCarregando v-else/>

    <Methodology v-if="bannerData"/>
    <PaginaCarregando v-else/>

    <Metrics v-if="metricas">
      <div class="col-md-3" v-for="(metric, index) in metricas" :key="index">
        <img
          class="lazy"
          src="@/assets/loading.gif"
          :data-src="metric.icone.sizes.medium"
          :alt="metric.metrica"
        />
        <span>{{metric.metrica}}</span>
        <h3 v-html="metric.titulo"></h3>
      </div>
    </Metrics>
    <PaginaCarregando v-else/>

    <CTA v-if="bluecta" :title="bluecta.titulo" :button="bluecta.botao" />
    <PaginaCarregando v-else />

    <SolicitarContato v-if="bannerData"/>
    <PaginaCarregando v-else/>
  </div>
</template>

<script>
import Spotlight from "@/components/Spotlight.vue";
import CTA from "@/components/BlueCta.vue";
import Metrics from "@/components/Metrics.vue";
import CardSlider from "@/components/CardSlider.vue";
import SolicitarContato from "@/components/SolicitarContato.vue";
import Pillars from "@/components/Pillars.vue";
import Methodology from "@/components/Methodology.vue";

export default {
  name: "FullService",
  components: {
    Spotlight,
    CTA,
    Metrics,
    SolicitarContato,
    CardSlider,
    Pillars,
    Methodology
  },
  data() {
    return {
      objecoes: null,
      pageID: 308,
      methodologyId: 37,
      bannerData: null,
      metricas: null,
      pilares: null,
      post: null,
      customFields: null,
      bluecta: null
    };
  },
  mounted() {
    this.getAcf();
    this.getMethodology();
  },
  methods: {
    getAcf() {
      this.$http.getPagesById(this.pageID)
        .then(resp => resp.json())
        .then(json => {
          this.post = json;
          this.objecoes = json.acf.objecoes;
          this.metricas = json.acf.metricas;
          this.pilares = json.acf.secao_pilares;
          const banner = {};
          banner.chamada = json.acf.chamada;
          banner.cta = json.acf.cta;
          banner.imagem = json.acf.foto.sizes.medium_large;
          banner.subtitulo = json.acf.subtitulo;
          // imagem_banner: json.acf.imagem.sizes.medium_large,
          this.bannerData = banner;
          this.bluecta = json.acf.bluecta
          document.title = this.post.yoast_title
        });
    },
    getMethodology(){
      this.$http.getPostsAcfData(this.methodologyId)
      .then(r => r.json())
      .then(r => {
      this.customFields = r;
      });
    },
  }
};
</script>

<style lang="scss">
@import "@/assets/scss/talk.scss";
</style>