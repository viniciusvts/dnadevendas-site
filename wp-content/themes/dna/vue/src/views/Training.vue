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

    <Pillars v-if="pilares">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-md-3 col-sm-12 col-tb-12">
            <h3 v-if="pilares.titulo" v-html="pilares.titulo"></h3>
          </div>

          <div v-for="(pilar, index) in pilares.pilares" :key="index"
            class="col-md-3 col-sm-12 col-tb-12" :class="[index < 2 ? 'pillar' : '']">
            <img :src="pilar.icone.url" :alt="pilar.pilar" />
            <p>{{pilar.pilar}}</p>
          </div>

          <div class="col-md-12 col-sm-12 col-tb-12 no-animate">
            <img src="@/assets/line-svg.svg" alt="Divisória" />
          </div>
        </div>
      </div>
    </Pillars>

    <section v-if="post.acf.chamada_sobre" class="about pt-0">
      <div class="title">
        <h2 v-html="post.acf.chamada_sobre"></h2>
        <span></span>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <img v-if="post.acf.imagem_sobre" :src="post.acf.imagem_sobre" :alt="post.acf.chamada_sobre" />
          </div>
          <div class="col-md-7 centerize-internal-div">
            <div v-if="post.acf.texto_sobre" v-html="post.acf.texto_sobre"></div>
          </div>
        </div>
      </div>
    </section>

    <div v-if="pilares" class="pilares">
      <div v-for="(pilar, index) in pilares.pilares" :key="index" class="pilar">
        <div class="container-fluid">
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

          <div v-for="(filho, indexFilho) in pilar.pilar_filho" :key="indexFilho" class="pilar-childs">
            <div class="row align-items-center">
              <div class="col-md-auto left">
                <img :src="pilar.icone.url" :alt="pilar.pilar" />
              </div>
              <div class="col right">
                <p>{{filho.descricao_filho}}</p>
              </div>
            </div>              
            <div v-if="filho.itens_filho" class="itens-pilar">
              <ul>
                <li v-for="(itensFilho, indexItensFilho) in filho.itens_filho" :key="indexItensFilho">
                  {{itensFilho.texto_itens_filho}}
                </li>
              </ul>
            </div>              
          </div>
        </div>
        <div v-if="index == 0" class="container-fluid cta-section">
          
          <CTA v-if="bluecta" :title="bluecta.titulo" :button="bluecta.botao" />
          <PaginaCarregando v-else /> 
        </div>

        <div v-if="index == 1" class="container">
          <div class="row">
            <div class="col-12">
              <div class="puzzle">
                <img :src="$http.baseURL + 'wp-content/uploads/Grupo-10251.png'" alt="">
                <img :src="$http.baseURL + 'wp-content/uploads/Grupo-10252.png'" alt="">
                <img :src="$http.baseURL + 'wp-content/uploads/Grupo-10253.png'" alt="">
                <img :src="$http.baseURL + 'wp-content/uploads/Grupo-10254.png'" alt="">
                <img :src="$http.baseURL + 'wp-content/uploads/Grupo-10255.png'" alt="">
                <img :src="$http.baseURL + 'wp-content/uploads/Grupo-10256.png'" alt="">
                <img :src="$http.baseURL + 'wp-content/uploads/Grupo-10257.png'" alt="">

                <img :src="$http.baseURL + 'wp-content/uploads/Grupo-10265.jpg'" alt="">

                <img :src="$http.baseURL + 'wp-content/uploads/Grupo-10258.png'" alt="">
                <img :src="$http.baseURL + 'wp-content/uploads/Grupo-10259.png'" alt="">
                <img :src="$http.baseURL + 'wp-content/uploads/Grupo-10260.png'" alt="">
                <img :src="$http.baseURL + 'wp-content/uploads/Grupo-10261.png'" alt="">
                <img :src="$http.baseURL + 'wp-content/uploads/Grupo-10262.png'" alt="">
                <img :src="$http.baseURL + 'wp-content/uploads/Grupo-10263.png'" alt="">

                <img :src="$http.baseURL + 'wp-content/uploads/Grupo-10264.jpg'" alt="">

              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div v-if="objecoes">
      <div v-for="(obj, index) in objecoes" :key="index">
        <CardSlider :objection="obj" :index="index" />
      </div>
    </div>

    <section v-if="post.acf.chamada_sobre" class="about">
      <div class="title">
        <h2>NOSSOS SERVIÇOS</h2>
        <span></span>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <img :src="$http.baseURL + 'wp-content/uploads/shutterstock_1076687258.png'" alt="Nossos serviços">
          </div>
          <div class="col-md-6 centerize-internal-div">
            <div>
              <p>
                Promovemos a educação corporativa através de uma jornada de aprendizagem com múltiplos recursos que conecta negócios, estratégias e pessoas ao incremento de resultados da equipe comercial.
              </p>
              <p>
                Construímos programas de treinamento corporativos personalizados, baseados diretamente nos desafios e estratégias de negócios da sua empresa. Garanta força da liderança a longo prazo e desenvolvimento de equipes de vendas de alta performance.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <Methodology/>

    <CTA v-if="bluecta" :title="bluecta.titulo" :button="bluecta.botao" />
    <PaginaCarregando v-else />

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

    <SolicitarContato/>
  </div>
</template>

<script>
import Spotlight from "@/components/Spotlight.vue";
import Metrics from "@/components/Metrics.vue";
import CardSlider from "@/components/CardSlider.vue";
import SolicitarContato from "@/components/SolicitarContato.vue";
import CTA from "@/components/BlueCta.vue";
import Pillars from "@/components/Pillars.vue";
import Methodology from "@/components/Methodology.vue";

export default {
  name: "FullService",
  components: {
    Spotlight,
    Metrics,
    SolicitarContato,
    CardSlider,
    CTA,
    Pillars,
    Methodology,
  },
  data() {
    return {
      objecoes: null,
      pageID: 310,
      methodologyId: 39,
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
          banner.imagem = json.acf.foto.url;
          banner.subtitulo = json.acf.subtitulo;
          // imagem_banner: json.acf.imagem.sizes.medium_large,
          this.bannerData = banner;
          this.bluecta = json.acf.bluecta
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