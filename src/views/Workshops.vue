<template>
  <div class="talk">
    <Spotlight>
      <div class="text section">
        <h1><b>Workshops de Vendas <br>de Alto Impacto</b> Técnico e comportamental</h1>
        <button class="btn-grad">
          <router-link to="/contato">
            Vamos pensar no seu Workshop?
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
                  <h3>Veja <b>por que </b> escolher nossos workshops</h3>
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

    <section class="talkDark">
      <div class="container-fluid">
        <div class="row">
          <div class="col-1">
            <img src="@/assets/svg/Grupo 9612.svg" alt="">
          </div>
          <div class="col-6">
            <div class="slider">
              <div class="slides">
                <img src="@/assets/spotlight-video.jpg" alt="">
                <img src="@/assets/spotlight-video.jpg" alt="">
                <img src="@/assets/spotlight-video.jpg" alt="">
              </div>
              
            </div>
            <Pagination/>
          </div>
          <div class="col-5">
            <div class="right">
              <div class="title">
                <h2><b>Workshops</b> de Vendas</h2>
                <span></span>
              </div>
              <div class="text">
                <p>Somos a mais completa consultoria para o aumento de produtividade em vendas do Brasil, temos mais de 10 anos de experiência auxiliando empresas a aumentar a performance em vendas de forma concreta. </p>

                <p>O nosso time de palestrantes é altamente capacitado, com ex-diretores comerciais e profissionais com ampla experiência em vendas. Temos palestras técnicas e motivacionais para a sua equipe. Ideais para Eventos, Convenções de Vendas e Treinamentos In Company.</p>
              </div>
              <button> Solicite uma proposta </button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="talkDefault">
      <div class="container-fluid">
        <div class="row flex-row-reverse">
          <div class="col-1">
            <img src="@/assets/svg/Grupo 9614.svg" alt="">
          </div>
          <div class="col-6">
            <div class="slider">
              <div class="slides">
                <img src="@/assets/spotlight-video.jpg" alt="">
                <img src="@/assets/spotlight-video.jpg" alt="">
                <img src="@/assets/spotlight-video.jpg" alt="">
              </div>
              
            </div>
            <Pagination/>
          </div>
          <div class="col-5">
            <div class="right">
              <div class="title">
                <h2><b>Workshops</b> de Vendas</h2>
                <span></span>
              </div>
              <div class="text">
                <p>Somos a mais completa consultoria para o aumento de produtividade em vendas do Brasil, temos mais de 10 anos de experiência auxiliando empresas a aumentar a performance em vendas de forma concreta. </p>

                <p>O nosso time de palestrantes é altamente capacitado, com ex-diretores comerciais e profissionais com ampla experiência em vendas. Temos palestras técnicas e motivacionais para a sua equipe. Ideais para Eventos, Convenções de Vendas e Treinamentos In Company.</p>
              </div>
              <button> Solicite uma proposta </button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <fale-conosco></fale-conosco>
    
  </div>
</template>

<script>

  import Spotlight from '@/components/Spotlight.vue';
  import Pillars from '@/components/Pillars.vue';
  import Pagination from '@/components/Pagination.vue';
  import FaleConosco from '@/components/FaleConosco.vue';

  export default {
    name: "Workshops",
    components: {
      Spotlight,
      Pillars,
      Pagination,
      'fale-conosco': FaleConosco,
    }
  }
</script>

<style lang="scss">
  @import '@/assets/scss/talk.scss';
</style>