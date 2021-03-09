<template>
  <div class="talk" v-if="banner">
    <Spotlight>
      <div class="text section">
        <h1 v-html="banner.chamada"></h1>
        <h2 class="colorDestak" >{{banner.subtitulo}}</h2>
        <button class="btn-grad" >
          <a href="#contato-servico">
            {{banner.cta}}
          </a>
        </button>
      </div>
      <div class="see-more">
        <div class="container">
          <span>Saiba mais</span>
          <img class="image" src="@/assets/svg/fast-forward.svg"/>
        </div>
      </div>
      
      <video v-if="video" autoplay loop muted>
        <source type="video/mp4" :src="video">
      </video>
      <img v-else class="image" :src="banner.imagem_banner" :alt="banner.chamada">
      
    </Spotlight>

    <section class="container-fluid">
      <div class="banner-video">
        <h2>Por que escolher <span>nossas palestras?</span></h2>
        <div class="see-more">
          <div class="container">
            <img src="@/assets/svg/fast-forward.svg"/>
          </div>
        </div>
        <img src="../assets/alisson.jpg" alt="Imagem Banner Video">
      </div>
    </section>
    

    <section>
      <div v-for="(obj, index) in objecoes" :key="index">
        <CardSlider :objection="obj" :index="index"/>
      </div>
    </section>

    <section class="talkers container">
      <div class="title">
        <h2><b>Conheça nossos</b> palestrantes de vendas</h2>
        <span></span>
      </div>
      <div class="palestrantes-fotos">
        <div class="scroll">
          <ul>
            <li class="fotos-palestrantes" v-for="(fotos, index) in palestrantes" :key="index">
              <div class="overlay-change" @click="changeCardPalestra(index)"></div>
              <img
              class="lazy"
              v-if="fotos.foto.sizes.large"
              :data-src="fotos.foto.sizes.large"
              :alt="fotos.nome_palestrante">
              <p v-if="fotos.nome_palestrante">{{ fotos.nome_palestrante }}</p>
              <!-- <span v-if="fotos.cargo">{{ fotos.cargo }}</span> -->
            </li>
          </ul>
        </div>
      </div>
      <CardPalestrante :dataCase="transferData" v-if="transferData.onde_palestrou.length > 0"></CardPalestrante>
      <br>
        <div class="row">
          <div class="col-sm-12 col-sm-12 col-tb-12">
            <p class="centered">
              <a href="#contato-servico">
                <button>Solicite uma proposta</button>
              </a>
            </p>
          </div>
        </div>
    </section>

    <Metrics>
      <div class="col-md-3" v-for="(metric, index) in metricas" :key="index">
        <img class="lazy" :data-src="metric.icone.sizes.medium" :alt="metric.metrica">
        <span>{{metric.metrica}}</span>
        <h3 v-html="metric.titulo"></h3>
      </div>
    </Metrics>

    <section class="themes">
      <div class="title">
        <h2><b>Principais</b> temas</h2>
        <span></span>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-12 col-lg-3" v-for="(theme, index) in themes" :key="index">
          <div class="card">
            <div class="description">
              <div class="details">
                <p>{{theme.descricao}}</p>
              </div>
            </div>
            <img class="lazy" :data-src="theme.imagem.sizes.medium" :alt="theme.tema">
            <p>{{theme.tema}}</p>
          </div>
        </div>
        <div class="col-sm-12">
          <a href="#contato-servico">
            <button>Solicite uma proposta</button>
          </a>
        </div>        
      </div>
    </section>
    
    <SolicitarContato />
  </div>
  <div v-else class="container loadingPage">
      <Space />
  </div>
</template>

<script>
  import Space from "@/components/Space.vue";
  import Spotlight from '@/components/Spotlight.vue';
  import Metrics from '@/components/Metrics.vue';
  import CardPalestrante from '@/components/CardPalestrante.vue';
  import SolicitarContato from '@/components/SolicitarContato.vue';
  import CardSlider from '@/components/CardSlider.vue';

  export default {
    name: "Talk",
    components: {
      Space,
      Spotlight,
      Metrics,
      SolicitarContato,
      CardSlider,
      CardPalestrante,
    },
    data(){
      return {
        pageID: 439,
        customFields: null,
        palestrantes: null,
        themes: null,
        objecoes: null,
        secao_pilares: null,
        banner: null,
        video: null,
        position: 2,
        componentKey: 2,
        transferData: null,
        page: null,
        metricas: null,
      }
    },
    mounted(){
      this.getPage();
      if(this.transferData == null) {
        this.transferData = this.palestrantes[1];
      }
    },
    watch: {
      position(val) {
        this.transferData = null
        this.$nextTick(() => {
          this.transferData = this.palestrantes[val];
        });
      },
    },
    methods:{
      getPage(){
        this.$http.getPagesById(this.pageID)
        .then(r => r.json())
        .then(r => {
        // this.customFields = r;
        this.themes = r.acf.temas;
        this.palestrantes = r.acf.palestrante;
        this.objecoes = r.acf.objecoes;
        this.secao_pilares = r.acf.secao_pilares;
        this.metricas = r.acf.metricas;
        const bannerData = {};
          bannerData.chamada = r.acf.chamada;
          bannerData.cta = r.acf.cta;
          bannerData.subtitulo = r.acf.subtitulo;
          bannerData.imagem_banner = r.acf.imagem.sizes.medium_large;
        this.banner = bannerData;
        this.page = r;
        this.transferData = this.palestrantes[0];
        this.video = r.acf.video
        document.title = this.page.yoast_title
        });
      },
      changeCardPalestra(index) {
        this.position = index;
      },
    },
  }
</script>

<style lang="scss">
  @import '@/assets/scss/talk.scss';
  @import '@/assets/scss/variables.scss';
</style>