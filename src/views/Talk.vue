<template>
  <div class="talk">
    <Spotlight v-if="banner">
      <div class="text section">
        <h1>{{banner.chamada}}</h1>
        <h2>{{banner.subtitulo}}</h2>
        <button class="btn-grad">
          <router-link to="/contato">
            {{banner.cta}}
          </router-link>
        </button>
      </div>
      <div class="see-more">
        <div class="container">
          <span>Saiba mais</span>
          <img src="@/assets/svg/fast-forward.svg"/>
        </div>
      </div>
      <img class="image" :src="banner.imagem_banner" :alt="banner.chamada">
    </Spotlight>
    <PaginaCarregando v-else/>

    <div class="container">
      <div id="banner-video">
        <img src="../assets/banner-video.png" alt="Imagem Banner Video">
        <h2>Por que escolher <span>nossas palestras?</span></h2>
      </div>
    </div>

    <Pillars v-if="secao_pilares">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <h3 v-html="secao_pilares.titulo"></h3>
          </div>

          <div class="col-md-1 d-none d-lg-block d-xl-block">
            <img src="@/assets/svg/big-arrow.svg" alt="">
          </div>

          <div class="col-md-2 pillar" v-for="(pilar, index) in secao_pilares.pilares" :key="index">
            <img class="lazy" src="@/assets/loading.gif" :data-src="pilar.icone.sizes.thumbnail" alt="pilar.pilar">
            <p>{{pilar.pilar}}</p>
          </div>
        </div>
      </div>
    </Pillars>
    <PaginaCarregando v-else/>

    <div  v-if="objecoes" >
      <div v-for="(objection, index) in objecoes" :key="index">
        <section :class="[index % 2 == 0 ? 'talkDark': 'talkDefault']">
          <div class="container-fluid">
            <div class="row align-items-center" :class="[index % 2 == 0 ? 'flex-row-reverse': '']">

              <div class="col-md-1 d-none d-lg-block d-xl-block" v-if="objection.icone">
                <img class="lazy mr-auto ml-auto" src="@/assets/loading.gif"  :data-src="objection.icone.sizes.normal" :alt="objection.icone.title">
              </div>

              <div class="col-md-5">
                <div class="slider">
                  <div class="slides">
                    <img class="lazy img-slider" src="@/assets/loading.gif"
                    :key="img_key"
                    :data-src="objection.imagem[0].sizes.large"  :alt="objection.objecao">
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
    <PaginaCarregando v-else/> 

    <section class="talkers" v-if="palestrantes">
      <div class="title">
        <h2><b>Conheça nossos</b> palestrantes</h2>
        <span></span>
      </div>
      <div class="palestrantes-fotos">
        <div class="row">
          <div class="fotos-palestrantes" v-for="fotos in palestrantes" :key="fotos">
            <div class="overlay-change"></div>
            <img :src="fotos.foto.sizes.large" :alt="fotos.nome_palestrante">
            <p>{{ fotos.nome_palestrante }}</p>
            <span>{{ fotos.cargo }}</span>
          </div>
        </div>
      </div>

      <card-palestra :dataCase="transferData" :key="componentKey"></card-palestra>

    </section>
    <PaginaCarregando v-else/>

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
        <div class="col-12">
          <router-link to="/contato">
            <button>Solicite uma proposta</button>
          </router-link>
        </div>        
      </div>
    </section>
    <PaginaCarregando v-else/>
    
    <Metrics/>
    <SolicitarContato></SolicitarContato>
  </div>
</template>

<script>

  import Spotlight from '@/components/Spotlight.vue';
  import Pillars from '@/components/Pillars.vue';
  // import Pagination from '@/components/Pagination.vue';
  import Metrics from '@/components/Metrics.vue';
  import CardPalestrante from '@/components/CardPalestrante.vue';
  import SolicitarContato from '@/components/SolicitarContato.vue';

  export default {
    name: "Talk",
    components: {
      Spotlight,
      Pillars,
      // Pagination,
      Metrics,
      SolicitarContato,
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
        position: 2,
        componentKey: 2,
        transferData: null,
      }
    },
    mounted(){
      this.getAcf();
      setTimeout(() => {
        this.setActive();
        if(this.transferData == null) {
          this.transferData = this.palestrantes[1];
          this.componentKey = 1;
        }
      }, 200);
      document.title = "Dna de Vendas | Palestras de Venda";
    },
    watch: {
      position(val) {
        this.transferData = this.palestrantes[val];
        this.componentKey = val;
      },
    },
    methods:{
      getAcf(){
        fetch(`https://www.dnadevendas.com.br/wp-json/acf/v3/pages/${this.pageID}`)
        .then(r => r.json())
        .then(r => {
        // this.customFields = r;
        this.themes = r.acf.temas;
        this.palestrantes = r.acf.palestrante;
        this.objecoes = r.acf.objecoes;
        this.secao_pilares = r.acf.secao_pilares;
        console.log(this.palestrantes);
        const bannerData = {
          chamada: r.acf.chamada,
          cta: r.acf.cta,
          subtitulo: r.acf.subtitulo,
          imagem_banner: r.acf.imagem.sizes.medium_large,
        };
        this.banner = bannerData;
        });
      },
      setActive() {
        const ctx = this;
        const list = document.getElementsByClassName('overlay-change');
        console.log(list)
        for(let i = 0; i < list.length; i++) {
          list[i].setAttribute('pos', i);
          list[i].addEventListener('click', (el) => {
            const positionTarget = el.target.getAttribute('pos');
            console.log(el.target);
            ctx.position = parseInt(positionTarget);
          })
          // setTimeout(() => {
          //   list[list.length - 1].click();
          // }, 500);
        }
      },
    },
  }
</script>

<style lang="scss">
  @import '@/assets/scss/talk.scss';
  @import '@/assets/scss/variables.scss';
  #hr-golden {
    border-color: $golden-dark;
  }
  .fotos-palestrantes {
    transition-duration: .5s;
    max-width: 100vw;
    // overflow-x: scroll;
    cursor: pointer;
    position: relative;
    &:hover {
      transition-duration: .5s;
      transform: scale(1.1);
    }
    .overlay-change {
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
    }
    img {
      width: 200px;
      height: 200px;
      padding: 10px;
    }
    text-align: center;
    p {
      font-weight: 600;
      color: $baseColor;
    }
    span {
      color: $golden-dark;
    }
  }
  .show {
    display: block;
  }
  .hide {
    display: none;
  }
  #banner-video {
    margin-top: 50px;
    margin-bottom: 20px;
    position: relative;
    h2 {
      position: absolute;
      top: 90px;
      margin-left: 100px;
      width: 445px;
      font-size: 42px;
      font-weight: 100;
      color: white;
      span {
        font-weight: 600;
        color: $golden-dark;
      }
    }
    img {
      object-fit: cover;
      box-shadow: grey 2px 2px 30px;
    }
  }
  .next {
    background-color: black;
    height: 50px;
    width: 50px;
  }
</style>