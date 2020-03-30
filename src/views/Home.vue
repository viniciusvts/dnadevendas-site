<template>
  <section>
    <Spotlight/>
    <Pillars/>
    <Services/>
    <Cases/>
    <Differential/>
    <Clients/>
    <Methodology/>
    <Depoiments/>
    <Feedblog/>
  </section>
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
import Feedblog from "@/components/Feedblog.vue";


export default {
  name: "home",
  components: {
    Spotlight,
    Pillars,
    Services,
    Cases,
    Differential,
    Clients,
    Methodology,
    Depoiments,
    Feedblog
  },
  created() {
    document.title = "Dna de Vendas";
  },
};
</script>


