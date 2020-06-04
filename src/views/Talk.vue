<template>
  <div class="talk">
    <Spotlight v-if="banner">
      <div class="text section">
        <h1 v-html="banner.chamada"></h1>
        <h2 class="colorDestak">{{banner.subtitulo}}</h2>
        <button class="btn-grad">
          <router-link to="/contato">
            {{banner.cta}}
          </router-link>
        </button>
      </div>
      <div class="see-more">
        <div class="container">
          <span>Saiba mais</span>
          <img class="image" src="@/assets/svg/fast-forward.svg"/>
        </div>
      </div>
      
      <video v-if="video" autoplay="true" loop="true">
        <source type="video/mp4" :src="video">
      </video>
      <img v-else class="image" :src="banner.imagem_banner" :alt="banner.chamada">
      
    </Spotlight>
    <PaginaCarregando v-else/>

    <section class="container-fluid" v-if="video">
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
    

    <section v-if="objecoes">
      <div v-for="(obj, index) in objecoes" :key="index">
        <CardSlider :objection="obj" :index="index"/>
      </div>
    </section>
    <PaginaCarregando v-else/>

    <section class="talkers container" v-if="palestrantes">
      <div class="title">
        <h2><b>Conheça nossos</b> palestrantes</h2>
        <span></span>
      </div>
      <div class="palestrantes-fotos">
        <div class="scroll">
          <ul>
            <li class="fotos-palestrantes" v-for="(fotos, index) in palestrantes" :key="index">
              <div class="overlay-change"></div>
              <img v-if="fotos.foto.sizes.large" :src="fotos.foto.sizes.large" :alt="fotos.nome_palestrante">
              <p v-if="fotos.nome_palestrante">{{ fotos.nome_palestrante }}</p>
              <span v-if="fotos.cargo">{{ fotos.cargo }}</span>
            </li>
          </ul>
        </div>
      </div>
      <card-palestra :dataCase="transferData" :key="componentKey"></card-palestra>
      <br>
        <div class="row">
          <div class="col-sm-12 col-sm-12 col-tb-12">
            <p class="centered">
              <router-link to="/contato">
                <button>Solicite uma proposta</button>
              </router-link>
            </p>
          </div>
        </div>
    </section>
    <PaginaCarregando v-else/>

    <Metrics v-if="metricas">
      <div class="col-md-3" v-for="(metric, index) in metricas" :key="index">
        <img class="lazy" src="@/assets/loading.gif" :data-src="metric.icone.sizes.medium" :alt="metric.metrica">
        <span>{{metric.metrica}}</span>
        <h3>{{metric.titulo}}</h3>
      </div>
    </Metrics>

    <section class="themes" v-if="themes">
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
            <img class="lazy" src="@/assets/loading.gif" :data-src="theme.imagem.sizes.medium" :alt="theme.tema">
            <p>{{theme.tema}}</p>
          </div>
        </div>
        <div class="col-sm-12">
          <router-link to="/contato">
            <button>Solicite uma proposta</button>
          </router-link>
        </div>        
      </div>
    </section>
    <PaginaCarregando v-else/>
    
    <SolicitarContato></SolicitarContato>
  </div>
</template>

<script>

  import Spotlight from '@/components/Spotlight.vue';
  import Metrics from '@/components/Metrics.vue';
  import CardPalestrante from '@/components/CardPalestrante.vue';
  import SolicitarContato from '@/components/SolicitarContato.vue';
  import PaginaCarregando from '@/components/PaginaCarregando.vue';
  import CardSlider from '@/components/CardSlider.vue';

  export default {
    name: "Talk",
    components: {
      Spotlight,
      Metrics,
      PaginaCarregando,
      SolicitarContato,
      CardSlider,
      'card-palestra': CardPalestrante,
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
      setTimeout(() => {
        this.setActive();
        if(this.transferData == null) {
          this.transferData = this.palestrantes[0];
          this.componentKey = 0;
        }
      }, 2000);
    },
    watch: {
      position(val) {
        this.transferData = this.palestrantes[val];
        this.componentKey = val;
      },
    },
    methods:{
      getPage(){
        fetch(`https://www.dnadevendas.com.br/wp-json/wp/v2/pages/${this.pageID}`)
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
        this.$root.meta.title = this.page.yoast_title;
        this.$root.meta.tags = this.page.yoast_meta;
        this.transferData = this.palestrantes[0];
        this.componentKey = 0;
        this.video = r.acf.video
        });
      },
      setActive() {
        const ctx = this;
        const list = document.getElementsByClassName('overlay-change');
        for(let i = 0; i < list.length; i++) {
          list[i].setAttribute('pos', i);
          list[i].addEventListener('click', (el) => {
            const positionTarget = el.target.getAttribute('pos');
            ctx.position = parseInt(positionTarget);
          })
        }
      },
    },
  }
</script>

<style lang="scss">
  @import '@/assets/scss/talk.scss';
  @import '@/assets/scss/variables.scss';
</style>