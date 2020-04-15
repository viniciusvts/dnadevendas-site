<template>
  <div>
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

    <Pillars>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <h3>Melhoramos expressivamente os <b>resultados da sua empresa</b> através do alinhamento de:</h3>
                </div>

                <div class="col-md-1 d-none d-lg-block d-xl-block">
                    <img src="@/assets/svg/big-arrow.svg" alt="">
                </div>

                <div class="col-md-2 pillar">
                    <img src="@/assets/svg/process.svg" alt="Processo">
                    <p>Processos</p>
                </div>

                <div class="col-md-2 pillar">
                    <img src="@/assets/svg/management.svg" alt="Gestão">
                    <p>Gestão</p>
                </div>

                <div class="col-md-2 pillar">
                    <img src="@/assets/svg/tecnology.svg" alt="Tecnologia">
                    <p>Tecnologia</p>
                </div>

                <div class="col-md-2">
                    <img src="@/assets/svg/people.svg" alt="Pessoas">
                    <p>Pessoas</p>                
                </div>
            </div>
        </div>
    </Pillars>

    <Services v-if="customFields">
      <div class="column" v-for="(service, index) in customFields.acf.servicos" :key="index">
        <div class="text">
          <div class="label">{{service.servico}}</div>
        </div>
        <div class="text">
          <p>{{service.descricao}}</p>
        </div>
        <img class="lazy" src="@/assets/loading.gif" :data-src="service.imagem.sizes.large" :alt="service.servico">
      </div>
    </Services>

    <Cases/>

    <Differential/>

    <Clients/>

    <Methodology/>
    
    <Depoiments/>
    
    <BlogFeed/>
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
import Cases from "@/components/Cases.vue";
import Differential from "@/components/Differential.vue";
import Clients from "@/components/Clients.vue";
import Methodology from "@/components/Methodology.vue";
import Depoiments from "@/components/Depoiments.vue";
import BlogFeed from "@/components/BlogFeed.vue";

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
    BlogFeed
  },
  data(){
    return {
      pageID: 37,
      customFields: null
    }
  },
  created(){
    this.getAcf();
    document.title = "Dna de Vendas | Consultoria de Vendas e Treinamento de Vendas";
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
};
</script>