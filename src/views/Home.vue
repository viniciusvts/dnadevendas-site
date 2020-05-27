<template>
  <div>
    <Spotlight v-if="customFields" class="home">
      <div class="text white-lg">
        <h1 v-html="customFields.acf.chamada"></h1>
        <h2 class="subtitle" v-html="customFields.acf.subtitulo"></h2>
        <router-link to="/contato">
          <button class="btn-grad">
              {{customFields.acf.cta}}
          </button>
        </router-link>
      </div>
      <div class="see-more">
        <div class="container">
          <span>Saiba mais</span>
          <img src="@/assets/svg/fast-forward.svg"/>
        </div>
      </div>

      <video v-if="customFields.acf.video" autoplay="true" loop="true">
        <source type="video/mp4" :src="customFields.acf.video">
      </video>
      <img v-else class="image" :src="customFields.acf.chamada" :alt="customFields.acf.imagem.sizes.medium_large">
      
    </Spotlight>

    <Pillars>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-tb-12">
                    <h3>Melhoramos expressivamente os <b>resultados da sua empresa</b> através do alinhamento de:</h3>
                </div>

                <div class="col-md-2 col-sm-12 col-tb-12 pillar">
                    <img src="@/assets/svg/process.svg" alt="Processo">
                    <p>Processos</p>
                </div>

                <div class="col-md-2 col-sm-12 col-tb-12 pillar">
                    <img src="@/assets/svg/management.svg" alt="Gestão">
                    <p>Gestão</p>
                </div>

                <div class="col-md-2 col-sm-12 col-tb-12 pillar">
                    <img src="@/assets/svg/tecnology.svg" alt="Tecnologia">
                    <p>Tecnologia</p>
                </div>

                <div class="col-md-2 col-sm-12 col-tb-12">
                    <img src="@/assets/svg/people.svg" alt="Pessoas">
                    <p>Pessoas</p>                
                </div>
              <div class="col-md-12 col-sm-12 col-tb-12 no-animate">
                <img src="@/assets/line-svg.svg" alt="Pessoas">
              </div>
            </div>
        </div>
    </Pillars>

    <Services v-if="customFields">
      <div class="col-md-3 col-sm-12 col-tb-12" v-for="(service, index) in customFields.acf.servicos" :key="index">
        <div class="text">
          <h3>{{service.servico}}</h3>
          <p>{{service.descricao}}</p>
          <div class="see-more">
            <router-link :to="service.rota">
              <span>Ler mais</span>
            </router-link>
          </div>
        </div>
        <img class="lazy" src="@/assets/loading.gif" :data-src="service.imagem.sizes.large" :alt="service.servico">
      </div>
    </Services>

    <Methodology/>

    <Differential/>

    <Cases/>

    <Clients/>

    
    <Depoiments color="golden"/>
    
    <BlogFeed/>

    <SolicitarContato/>
    
  </div>
</template>

<script>
const Services = () => ({
  component: import("@/components/Services.vue"),
  loading: PaginaCarregando,
  delay: 500
});

import Spotlight from "@/components/Spotlight.vue";
import PaginaCarregando from '../components/PaginaCarregando.vue';

//segunda dobra em diante, carregar com lazyload
import Pillars from "@/components/Pillars.vue";
// import Cases from "@/components/Cases.vue";
import Cases from "@/components/CasesNewLayout.vue";
import Differential from "@/components/Differential.vue";
import Clients from "@/components/Clients.vue";
import Methodology from "@/components/Methodology.vue";
import Depoiments from "@/components/Depoiments.vue";
import SolicitarContato from "@/components/SolicitarContato.vue";
import Api from "@/services/ApiRest.js";

export default {
  name: "Home",
  components: {
    Spotlight,
    Pillars,
    Services,
    Cases,
    Differential,
    Clients,
    Methodology,
    Depoiments,
    SolicitarContato
  },
  data(){
    return {
      pageID: 37,
      customFields: null
    }
  },
  created(){
    this.setHomeMeta();
    this.getAcf();
  },
  methods:{
    getAcf(){
      fetch(`https://www.dnadevendas.com.br/wp-json/acf/v3/pages/${this.pageID}`)
      .then(r => r.json())
      .then(r => {
      this.customFields = r;
      });
    },
    setHomeMeta(){
      Api.getHomeMeta()
      .then(res => {
        return res.json();
      })
      .then(json => {
        this.$root.meta.title = json.yoast_title;
        this.$root.meta.tags = json.yoast_meta;
      });
    }
  }
};
</script>