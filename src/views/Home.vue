<template>
  <section>
    <Spotlight/>
    <Pillars/>
    <Services/>
    
    <!--Seções da home-->
    <!--
      <Services/>
      <Cases/>
      <Methodology/>
      <Clients/>
      <Steps/>
      <Depoiments/>
      <Feed/>
      -->
  </section>
</template>

<script>
import Spotlight from "@/components/Spotlight.vue";
import Pillars from "@/components/Pillars.vue";
import Services from "@/components/Services.vue";

export default {
  name: "home",
  components: {
    Spotlight,
    Pillars,
    Services
  },
  created() {
    document.title = "Dna de Vendas";
  }
};
</script>


