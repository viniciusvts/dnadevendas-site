<template>
  <div class="talk">
    <Spotlight v-if="customFields">
      <div class="text section">
        <h1>{{customFields.acf.chamada}}</h1>
        <h2>{{customFields.acf.subtitulo}}</h2>
        <button class="btn-grad">
          <router-link to="/contato">
            {{customFields.acf.cta}}
          </router-link>
        </button>
      </div>
      <div class="see-more">
        <div class="container">
          <span>Saiba mais</span>
          <img src="@/assets/svg/fast-forward.svg"/>
        </div>
      </div>
      <img class="image" :src="customFields.acf.imagem.sizes.medium_large" :alt="customFields.acf.chamada">
    </Spotlight>
    <PaginaCarregando v-else/>

    <Pillars v-if="customFields">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <h3 v-html="customFields.acf.secao_pilares.titulo"></h3>
          </div>

          <div class="col-md-1 d-none d-lg-block d-xl-block">
            <img src="@/assets/svg/big-arrow.svg" alt="">
          </div>

          <div class="col-md-2 pillar" v-for="(pilar, index) in customFields.acf.secao_pilares.pilares" :key="index">
            <img class="lazy" src="@/assets/loading.gif" :data-src="pilar.icone.sizes.thumbnail" alt="pilar.pilar">
            <p>{{pilar.pilar}}</p>
          </div>
        </div>
      </div>
    </Pillars>
    <PaginaCarregando v-else/>

    <div  v-if="customFields" >
      <div v-for="(objection, index) in customFields.acf.objecoes" :key="index">
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
    <PaginaCarregando v-else/> 

    <section class="talkers talkDark" v-if="customFields">
      <div class="title">
        <h2><b>Conheça nossos</b> palestrantes</h2>
        <span></span>
      </div>

      <div class="row align-items-center" v-for="(talker, index) in customFields.acf.palestrante.slice(0,1)" :key="index">
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
    <PaginaCarregando v-else/>

    <section class="themes" v-if="customFields">
      <div class="title">
        <h2><b>Principais</b> temas</h2>
        <span></span>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-12 col-lg-3" v-for="(theme, index) in customFields.acf.temas" :key="index">
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
    
    <Metrics v-if="customFields">
      <div class="col-md-3" v-for="(metric, index) in customFields.acf.metricas" :key="index">
        <img class="lazy" src="@/assets/loading.gif" :data-src="metric.icone.sizes.medium" :alt="metric.metrica">
        <span>{{metric.metrica}}</span>
        <h3>{{metric.titulo}}</h3>
      </div>
    </Metrics>
    <PaginaCarregando v-else/>
  </div>
</template>

<script>

  import Spotlight from '@/components/Spotlight.vue';
  import Pillars from '@/components/Pillars.vue';
  import Pagination from '@/components/Pagination.vue';
  import Metrics from '@/components/Metrics.vue';
  import PaginaCarregando from '@/components/PaginaCarregando.vue';

  export default {
    name: "Talk",
    components: {
      Spotlight,
      Pillars,
      Pagination,
      Metrics,
      PaginaCarregando
    },
    data(){
      return {
        pageID: 439,
        customFields: null
      }
    },
    created(){
      this.getAcf();
      document.title = "Dna de Vendas | Palestras de Venda";
    },
    methods:{
      getAcf(){
        fetch(`https://www.dnadevendas.com.br/wp-json/acf/v3/pages/${this.pageID}`)
        .then(r => r.json())
        .then(r => {
        this.customFields = r;
        });
      }
    }
  }
</script>

<style lang="scss">
  @import '@/assets/scss/talk.scss';
</style>