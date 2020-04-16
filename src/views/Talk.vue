<template>
  <div class="talk">
    <Spotlight>
      <div class="text section">
        <h1><b>Palesras de Vendas <br>de Alto Impacto</b> Técnico e comportamental</h1>
        <button class="btn-grad">
          <router-link to="/contato">
            Vamos pensar no seu evento?
          </router-link>
        </button>
      </div>
      <div class="see-more">
        <div class="container">
          <span>Saiba mais</span>
          <img src="@/assets/svg/fast-forward.svg"/>
        </div>
      </div>
      <img class="image" src="@/assets/spotlight.jpg"/>
    </Spotlight>

    <Pillars>
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-3">
                  <h3>Veja <b>por que </b> escolher nossas palestras</h3>
              </div>

              <div class="col-md-1 d-none d-lg-block d-xl-block">
                  <img src="@/assets/svg/big-arrow.svg" alt="">
              </div>

              <div class="col-md-2 pillar">
                  <img src="@/assets/svg/bar-chart.svg" alt="Processo">
                  <p>Aumentam a produtividade do seu time</p>
              </div>

              <div class="col-md-2 pillar">
                  <img src="@/assets/svg/lightbulb.svg" alt="Gestão">
                  <p>Geram insights significativos</p>
              </div>

              <div class="col-md-2 pillar">
                  <img src="@/assets/svg/telescope.svg" alt="Tecnologia">
                  <p>Ampliam a visão das oportunidades de vendas</p>
              </div>

              <div class="col-md-2">
                  <img src="@/assets/svg/list.svg" alt="Pessoas">
                  <p>Garamtem a excelência do seu evento</p>                
              </div>
          </div>
      </div>
    </Pillars>

    <div  v-if="objections" >
      <div v-for="(objection, index) in objections.objecoes" :key="index">
        <section :class="[index % 2 == 0 ? 'talkDark': 'talkDefault']">
          <div class="container-fluid">
            <div class="row align-items-center" :class="[index % 2 == 0 ? 'flex-row-reverse': '']">

              <div class="col-md-1 d-none d-lg-block d-xl-block" v-if="objection.icone">
                <img class="lazy mr-auto ml-auto" src="@/assets/loading.gif"  :data-src="objection.icone.sizes.normal" :alt="objection.icone.title">
              </div>

              <div class="col-md-5">
                <div class="slider">
                  <div class="slides">
                    <img class="lazy" src="@/assets/loading.gif"  :data-src="objection.imagem.sizes.medium" :alt="objection.objecao">
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

    <section class="talkers talkDark" v-if="talkers">
      <div class="title">
        <h2><b>Conheça nossos</b> palestrantes</h2>
        <span></span>
      </div>

      <div class="row align-items-center" v-for="(talker, index) in talkers.palestrante.slice(0,1)" :key="index">
        <div class="col-12 col-lg-6 col-sm-12">
          <div class="row video">
            <div class="col-12">
              <div class="iframe" v-html="talker.video">
              </div>
            </div>
            <div class="col-12">
              <Pagination/>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-sm-12">
          <div class="row align-items-center right">
            <div class="col-12 bio">
              <h3>{{talker.nome_palestrante}}</h3>
              <h4>{{talker.cargo}}</h4>
              <p>{{talker.bio}}</p>
            </div>
            <div class="col-12 portfolio">
              <div class="row align-items-center">
                <div class="col-auto">
                  <h4>Empresas que palestrou</h4>
                </div>
                <div class="col">
                  <hr>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 col-sm-6" v-for="(empresa, index) in talker.onde_palestrou.slice(0,6)" :key="index">
                  <img class="lazy" src="@/assets/loading.gif"  :data-src="empresa.sizes.medium" :alt="empresa.name">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="themes" v-if="themes">
      <div class="title">
        <h2><b>Principais</b> temas</h2>
        <span></span>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-12 col-lg-3" v-for="(theme, index) in themes.temas" :key="index">
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
    
    <Metrics/>
    <fale-conosco></fale-conosco>
  </div>
</template>

<script>

  import Spotlight from '@/components/Spotlight.vue';
  import Pillars from '@/components/Pillars.vue';
  import Pagination from '@/components/Pagination.vue';
  import Metrics from '@/components/Metrics.vue';
  import FaleConosco from '@/components/FaleConosco.vue';

  export default {
    name: "Talk",
    components: {
      Spotlight,
      Pillars,
      Pagination,
      Metrics,
      'fale-conosco': FaleConosco,
    },
    data(){
      return {
        pageID: 439,
        talkers: null,
        themes: null,
        objections: null
      }
    },
    created(){
      this.getTalkers();
      this.getThemes();
      this.getObjections();
      document.title = "Dna de Vendas | Palestras de Venda";
    },
    methods:{
      getTalkers(){
        fetch(`https://www.dnadevendas.com.br/wp-json/acf/v3/pages/${this.pageID}/palestrante`)
        .then(r => r.json())
        .then(r => {
        this.talkers = r;
        });
      },

      getThemes(){
        fetch(`https://www.dnadevendas.com.br/wp-json/acf/v3/pages/${this.pageID}/temas`)
        .then(r => r.json())
        .then(r => {
        this.themes = r;
        });
      },

      getObjections(){
        fetch(`https://www.dnadevendas.com.br/wp-json/acf/v3/pages/${this.pageID}/objecoes`)
        .then(r => r.json())
        .then(r => {
        this.objections = r;
        });
      }
    }
  }
</script>

<style lang="scss">
  @import '@/assets/scss/talk.scss';
</style>