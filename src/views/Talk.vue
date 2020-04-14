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

    <section class="talkDark">
      <div class="container-fluid">
        <div class="row">
          <div class="col-1">
            <img src="@/assets/aspas.png" alt="">
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
            <img src="@/assets/aspas.png" alt="">
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

    <section class="talkers talkDark">
      <div class="title">
        <h2><b>Conheça nossos</b> palestrantes</h2>
        <span></span>
      </div>

      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="row video">
            <div class="col-12">
              <div class="iframe">
                <img src="@/assets/service.jpg" alt="">
              </div>
            </div>
            <div class="col-12">
              <Pagination/>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row align-items-center right">
            <div class="col-12 bio">
              <h3>Lucia Haracemiv</h3>
              <h4>CEO</h4>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
                <div class="col-4">
                  <img src="@/assets/mrv-logo.png" alt="">
                </div>
                <div class="col-4">
                  <img src="@/assets/mrv-logo.png" alt="">
                </div>
                <div class="col-4">
                  <img src="@/assets/mrv-logo.png" alt="">
                </div>

                <div class="col-4">
                  <img src="@/assets/mrv-logo.png" alt="">
                </div>
                <div class="col-4">
                  <img src="@/assets/mrv-logo.png" alt="">
                </div>
                <div class="col-4">
                  <img src="@/assets/mrv-logo.png" alt="">
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="themes">
      <div class="title">
        <h2><b>Principais</b> temas</h2>
        <span></span>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="description">
              <div class="details">
                <p>Melhorar a performance de vendas com conteúdos técnicos e desenvolvimento comportamental.</p>
              </div>
            </div>
            <img src="https://www.dnadevendas.com.br/wp-content/uploads/palestras-a-ciencia-da-venda.jpg" alt="Ciência da Venda">
            <p>Ciência da Venda</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="description">
              <div class="details">
                <p>Aumentar a produtividade de vendas com técnicas específicas B2B.</p>
              </div>
            </div>
            <img src="https://www.dnadevendas.com.br/wp-content/uploads/palestras-tecnicas-de-vendas-consultivas0A.jpg" alt="Técnicas de Vendas Consultivas">
            <p>Técnicas de Vendas Consultivas</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="description">
              <div class="details">
                <p>Preparar profissionais de vendas sobre a arte da persuasão, para que aumentem suas conversões.</p>
              </div>
            </div>
            <img src="https://www.dnadevendas.com.br/wp-content/uploads/palestras-a-arte-da-negociacao.jpg" alt="A Arte da negociação">
            <p>A Arte da negociação</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="description">
              <div class="details">
                <p>Os principais passos para executar uma estratégia de vendas e obter os resultados esperados.</p>
              </div>
            </div>
            <img src="https://www.dnadevendas.com.br/wp-content/uploads/palestras-da-estrategia-a-execucao-em-vendas.jpg">
            <p>Sales: da estratégia à execução</p>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card">
            <div class="description">
              <div class="details">
                <p>Os 4 Pilares que interferem na produtividade de vendas e como são capazes de mudar resultados.</p>
              </div>
            </div>
            <img src="https://www.dnadevendas.com.br/wp-content/uploads/palestras-produtividade-de-vendas.jpg" alt="Produtividade de Vendas">
            <p>Produtividade de Vendas</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="description">
              <div class="details">
                <p>Como executar uma estratégia de Inbound Sales de alto impacto para empresas.</p>
              </div>
            </div>
            <img src="https://www.dnadevendas.com.br/wp-content/uploads/palestras-vendas-no-mundo-pos-google.jpg" alt="Inbound Sales">
            <p>Inbound Sales</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="description">
              <div class="details">
                <p>Como escolher as métricas certas de vendas e melhorar o desempenho do seu time.</p>
              </div>
            </div>
            <img src="https://www.dnadevendas.com.br/wp-content/uploads/palestras-metricas-de-vendas.jpg" alt="A Arte da negociação">
            <p>A Arte da negociação</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="description">
              <div class="details">
                <p>Construímos conteúdos direcionados à necessidade do seu evento.</p>
              </div>
            </div>
            <img src="https://www.dnadevendas.com.br/wp-content/uploads/palestras-customizadas.jpg" alt="Palestras customizadas">
            <p>Palestras customizadas</p>
          </div>
        </div>

        <router-link to="/contato">
          <button>Solicite uma proposta</button>
        </router-link>
      </div>

    </section>
    
    <Metrics/>
  </div>
</template>

<script>

  import Spotlight from '@/components/Spotlight.vue';
  import Pillars from '@/components/Pillars.vue';
  import Pagination from '@/components/Pagination.vue';
  import Metrics from '@/components/Metrics.vue';

  export default {
    name: "Talk",
    components: {
      Spotlight,
      Pillars,
      Pagination,
      Metrics
    }
  }
</script>

<style lang="scss">
  @import '@/assets/scss/talk.scss';
</style>