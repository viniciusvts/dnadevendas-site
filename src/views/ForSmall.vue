<template>
  <div class="forSmall">
    <Spotlight>
      <div class="text section">
        <h1>Consultoria para pequenos times de vendas<b>com grandes ambições</b></h1>
        <p>Há mais de 12 anos aumentando a produtividade de vendas em mais de 35 segmentos</p>
        <button class="pink">
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
      <img class="image" src="https://www.dnadevendas.com.br/wp-content/uploads/dnadevendas-forsmall.jpg"/>
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
                  <p>Processos de venda bem definidos</p>
              </div>

              <div class="col-md-2 pillar">
                  <img src="@/assets/svg/management.svg" alt="Gestão">
                  <p>Funil de vendas e gatilhos personalizados</p>
              </div>

              <div class="col-md-2 pillar">
                  <img src="@/assets/svg/tecnology.svg" alt="Tecnologia">
                  <p>Equipe de vendas capacitada</p>
              </div>

              <div class="col-md-2">
                  <img src="@/assets/svg/people.svg" alt="Pessoas">
                  <p>Resultados previsíveis e crescentes</p>                
              </div>
          </div>
      </div>
    </Pillars>

    <Cases/>
    <Depoiments/>
    <Clients/>


  </div>
</template>

<script>

    import Spotlight from '@/components/Spotlight.vue';
    import Pillars from '@/components/Pillars.vue';
    import Cases from '@/components/Cases.vue';
    import Depoiments from '@/components/Depoiments.vue';
    import Clients from '@/components/Clients.vue';

  export default {
    name: "Talk",
    components: {
      Spotlight,
      Pillars,
      Cases,
      Depoiments,
      Clients
    }
  }
</script>

<style lang="scss">
  @import '@/assets/scss/talk.scss';
</style>