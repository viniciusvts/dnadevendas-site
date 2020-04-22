<template>
  <div>
    <Spotlight>
      <div class="text section">
        <h1>A mais completa <b>Consultoria de Vendas</b> para aumento de produtividade</h1>
        <button class="btn-grad">
          <router-link to="/contato">
            Falar com um consultor
          </router-link>
        </button>
      </div>
      <div class="see-more">
        <div class="container">
          <span>Saiba mais</span>
          <img src="@/assets/svg/fast-forward.svg"/>
        </div>
      </div>
      <img class="image" src="@/assets/hero-home.jpg"/>
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

    <Services/>

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
// import Cases from "@/components/Cases.vue";
import Cases from "@/components/CasesNewLayout.vue";
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
  created() {
    document.title = "Dna de Vendas";
  },
};
</script>