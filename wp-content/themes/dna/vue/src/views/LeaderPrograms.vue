<template>
  <div class="training leader-training" v-if="post">
    <section class="about">
      <div class="container-fluid">
        <div class="title" v-if="post.title.rendered">
          <h1>{{post.title.rendered}}</h1>
          <span></span>
        </div>

        <img
          v-if="post.acf.imagem"
          :src="post.acf.imagem.sizes.medium_large"
          :alt="post.title.rendered"
        />
        <div v-html="post.acf.conteudo"></div>
      </div>
    </section>

    <Pillars v-if="pilares">
      <div class="container-fluid">
        <div class="title" v-if="pilares.titulo">
          <h2>{{pilares.titulo}}</h2>
          <span></span>
        </div>
        <div class="row">
          <div
            v-for="(pilar, index) in pilares.pilares"
            :key="index"
            class="col-md-3 mr-auto ml-auto"
          >
            <img class="lazy" :data-src="pilar.icone.url" :alt="pilar.pilar" v-if="pilar.icone.url" />
            <p>{{pilar.pilar}}</p>
          </div>

          <div class="col-md-12 col-sm-12 col-tb-12 no-animate">
            <img src="@/assets/line-svg.svg" alt="Divisória" />
          </div>
        </div>
      </div>
    </Pillars>

    <section v-if="post.acf.chamada_sobre" class="academy">
      <div class="container-fluid">
        <div class="title">
          <h2 v-if="post.acf.chamada_sobre">{{post.acf.chamada_sobre}}</h2>
          <span></span>
        </div>
        <div class="row">
          <div class="col-md-6">
            <img class="lazy" :data-src="post.acf.imagem_sobre" alt="Nossos serviços" />
          </div>
          <div class="col-md-6" v-html="post.acf.texto_sobre"></div>
        </div>
      </div>
    </section>

    <Metrics v-if="metricas">
      <div class="col-md-3" v-for="(metric, index) in metricas" :key="index">
        <img
          class="lazy"
          :data-src="metric.icone.sizes.medium"
          :alt="metric.metrica"
          v-if="metric.icone"
        />
        <span v-if="metric.metrica">{{metric.metrica}}</span>
        <h3 v-html="metric.titulo" v-if="metric.titulo"></h3>
      </div>
    </Metrics>

     <SolicitarContato />
  </div>
  <div v-else class="container loadingPage">
      <Space />
  </div>
</template>

<script>
import Space from "@/components/Space.vue";
import Pillars from "@/components/Pillars.vue";
import Metrics from "@/components/Metrics.vue";
import SolicitarContato from "@/components/SolicitarContato.vue";

export default {
  name: "LeaderPrograms",
  components: {
    Space,
    Pillars,
    Metrics,
    SolicitarContato
  },
  data() {
    return {
      pageID: 602,
      metricasId: 310,
      post: null,
      pilares: null,
      metricas: null,
    };
  },
  mounted() {
    this.getAcf();
    this.getMetrics();
  },
  methods: {
    getAcf() {
      this.$http.getPagesById(this.pageID)
        .then((resp) => resp.json())
        .then((json) => {
          this.post = json;
          this.pilares = json.acf.secao_pilares;
          document.title = this.post.yoast_title
        });
    },
    getMetrics() {
      this.$http.getPostsAcfData(this.metricasId, 'metricas')
        .then((resp) => resp.json())
        .then((json) => {
          this.metricas = json.metricas;
        });
    },
  },
};
</script>

<style lang="scss">
@import "@/assets/scss/training.scss";
</style>