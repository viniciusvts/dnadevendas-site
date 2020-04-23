<template>
  <div class="talk">
    <Spotlight v-if="customFields">
      <div class="text section">
        <h1>{{customFields.acf.chamada}}</h1>
        <h2 v-if="customFields.acf.subtitulo">{{customFields.acf.subtitulo}}</h2>
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
      <img class="image" src="https://www.dnadevendas.com.br/wp-content/uploads/workshops.jpg" :alt="customFields.acf.chamada">
    </Spotlight>

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
                    <img class="lazy" src="@/assets/loading.gif"  :data-src="objection.imagem.sizes.large" :alt="objection.objecao">
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
    
    <Metrics v-if="customFields">
      <div class="col-md-3" v-for="(metric, index) in customFields.acf.metricas" :key="index">
        <img class="lazy" src="@/assets/loading.gif" :data-src="metric.icone.sizes.medium" :alt="metric.metrica">
        <span>{{metric.metrica}}</span>
        <h3>{{metric.titulo}}</h3>
      </div>
    </Metrics>

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
    }
  }
</script>

<style lang="scss">
  @import '@/assets/scss/talk.scss';
</style>