<template>
  <div class="talk mentoring">
    <Spotlight v-if="bannerData">
      <div class="text section">
        <h1 v-html="bannerData.chamada"></h1>
        <h2 v-if="bannerData.subtitulo" v-html="bannerData.subtitulo"></h2>
        <button class="btn-grad" v-if="bannerData.imagem">
          <router-link to="/contato">{{bannerData.cta}}</router-link>
        </button>
      </div>
      <img class="image" :src="bannerData.imagem" :alt="bannerData.chamada" />
    </Spotlight>

    <Pillars v-if="pilares">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 col-sm-12 col-tb-12">
            <h3 v-if="pilares.titulo" v-html="pilares.titulo"></h3>
          </div>

          <div
            v-for="(pilar, index) in pilares.pilares"
            :key="index"
            class="col-md-2 col-sm-12 col-tb-12"
            :class="[index < 3 ? 'pillar' : '']"
          >
            <img :src="pilar.icone.url" :alt="pilar.pilar" />
            <p>{{pilar.pilar}}</p>
          </div>

          <div class="col-md-12 col-sm-12 col-tb-12 no-animate">
            <img src="@/assets/line-svg.svg" alt="Divisória" />
          </div>
        </div>
      </div>
    </Pillars>

    <section class="what">
      <div class="title">
        <h2 v-if="post.acf.chamada_sobre" v-html="post.acf.chamada_sobre"></h2>
        <span></span>
      </div>
      <img v-if="post.acf.imagem_sobre" :src="post.acf.imagem_sobre" :alt="post.acf.chamada_sobre" />
      <p v-if="post.acf.texto_sobre" v-html="post.acf.texto_sobre"></p>
    </section>

    <section class="objectives">
      <div class="title">
        <h2>Objetivos da mentoria</h2>
        <span></span>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-4 objective" v-for="(objetivo, indexObjetivo) in post.acf.objetivos" :key="indexObjetivo">
          <img :src="objetivo.icone_objetivo.sizes.medium" :alt="objetivo.titulo_objetivo">
          <p v-html="objetivo.titulo_objetivo"></p>
        </div>
      </div>
    </section>

    <section class="what">
      <div class="title">
        <h2 v-if="post.acf.titulo_pilar_mentor" v-html="post.acf.titulo_pilar_mentor"></h2>
        <span></span>
      </div>
      <div class="container-fluid" v-if="post.acf.imagem_pilar_mentor">
        <div class="row">
          <div class="col-md-4">
            <img :src="post.acf.imagem_pilar_mentor.sizes.medium_large" :alt="post.acf.titulo_pilar_mentor">
          </div>
          <div class="col-md-8">
            <ul>
              <li v-for="(pilar, index) in post.acf.pilares_mentor" :key="index">
                {{pilar.pilar_mentor}}
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section class="plans">
      <div class="title">
        <h2> Planos mentoria</h2>
        <span></span>
      </div>
      <div class="container" v-if="post.acf.planos_mentoria">
        <div class="row">
          <div class="col-md-6" v-for="(plano, index) in post.acf.planos_mentoria" :key="index">
            <div class="plan">
              <img :src="plano.icone_plano.sizes.medium" :alt="plano.nome_plano">
              <h3>{{plano.nome_plano}}</h3>
              <ul>
                <li v-for="(itemPlano, indexItem) in plano.itens_plano" :key="indexItem">
                  <div class="row align-items-center justify-content-center">
                    <div class="col-md-auto">
                      <img :src="itemPlano.icone_item_plano.sizes.medium" :alt="itemPlano.texto_item_plano">
                    </div>
                    <div class="col-md-auto">
                      {{itemPlano.texto_item_plano}}
                    </div>
                  </div>
                </li>
              </ul>
              <img :src="$http.baseURL + 'wp-content/uploads/line.png'" alt="Linha Divisória">
              <a :href="plano.link_cta_plano" target="_blank" v-if="plano.link_cta_plano"><button>{{plano.texto_cta_plano}}</button></a>
            </div>
          </div>
        </div>
      </div>
    </section>

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

    <SolicitarContato />
  </div>
</template>

<script>
import Pillars from "@/components/Pillars.vue";
import Spotlight from "@/components/Spotlight.vue";
import Metrics from "@/components/Metrics.vue";
import SolicitarContato from "@/components/SolicitarContato.vue";

export default {
  name: "Mentoring",
  components: {
    Spotlight,
    Metrics,
    SolicitarContato,
    Pillars
  },
  data() {
    return {
      objecoes: null,
      pageID: 9535,
      palestrantesId: 439,
      bannerData: null,
      metricas: null,
      post: null,
      customFields: null,
      pilares: null,
      mentores: null,
      pilaresMentor: null
    };
  },
  created() {
    this.getAcf();
    this.getTalkers();
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
          this.pilaresMentor = json.acf.pilares_mentor;
          const banner = {};
          banner.chamada = json.acf.chamada;
          banner.cta = json.acf.cta;
          banner.imagem = json.acf.foto.sizes.medium_large;
          banner.subtitulo = json.acf.subtitulo;
          // imagem_banner: json.acf.imagem.sizes.medium_large,
          this.bannerData = banner;
          this.$root.meta.title = json.yoast_title;
          this.$root.meta.tags = json.yoast_meta;
        });
    },
    getTalkers() {
      this.$http.getPostsAcfData(this.palestrantesId, 'palestrante')
        .then(r => r.json())
        .then(r => {
          this.mentores = r;
        });
    }
  }
};
</script>

<style lang="scss">
@import "@/assets/scss/talk.scss";
@import "@/assets/scss/mentoring.scss";
</style>