<template>
  <div class="forSmall">
    <Spotlight>
      <div class="text section">
        <h1>Consultoria para pequenos times de vendas<b>com grandes ambições</b></h1>
        <p>Há mais de 12 anos aumentando a produtividade de vendas em mais de 35 segmentos</p>
        <button :class="[classButton]">
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

    <banner-fsmall></banner-fsmall>

    <Pillars>
      <div class="container-fluid">
          <div class="row">
              <div class="col-sm-12">
                  <h3 style="color:#FF6CAB">Melhoramos expressivamente os resultados da sua empresa através do alinhamento de:</h3>
              </div>

              <div class="row" id="icons-area">
                <div class="col-md-3 pillar f-small">
                    <img src="@/assets/newarrow.png" alt="Processo">
                    <p>Processos de venda bem definidos</p>
                </div>

                <div class="col-md-3 pillar f-small">
                    <img src="@/assets/newbigarrow.png" alt="Gestão">
                    <p>Funil de vendas e gatilhos personalizados</p>
                </div>

                <div class="col-md-3 pillar f-small">
                    <img src="@/assets/handgroup.png" alt="Tecnologia">
                    <p>Equipe de vendas capacitada</p>
                </div>

                <div class="col-md-3 f-small">
                    <img src="@/assets/newgraphic.png" alt="Pessoas">
                    <p>Resultados previsíveis e crescentes</p>                
                </div>
              </div>
              
              <div class="col-sm-12 no-animate">
                <img src="@/assets/svg/linefs.svg" alt="">
              </div>
          </div>
      </div>

    </Pillars>
    <Cases/>
    <hd-sucesso></hd-sucesso>
    <Depoiments color="pink"/>
    <Clients/>
    <pricing-table></pricing-table>
    <SolicitarContato></SolicitarContato>


  </div>
</template>

<script>

    import Spotlight from '@/components/Spotlight.vue';
    import Pillars from '@/components/Pillars.vue';
    import Cases from '@/components/CasesNewLayout.vue';
    import HistoriasDeSucesso from '@/components/HistoriasDeSucesso.vue';
    import Depoiments from '@/components/Depoiments.vue';
    import Clients from '@/components/Clients.vue';
    import PricingTable from '@/components/PricingTable.vue';
    import SolicitarContato from '@/components/SolicitarContato.vue';
    import bannerFSmal from '@/components/BannerForSmall.vue';
    import ClassButton from '../services/ClassButton';

  export default {
    name: "Talk",
    components: {
      Spotlight,
      Pillars,
      Cases,
      Depoiments,
      Clients,
      SolicitarContato,
      'pricing-table': PricingTable,
      'hd-sucesso': HistoriasDeSucesso,
      'banner-fsmall': bannerFSmal,
    },
    mixins: [ClassButton],
    data() {
      return {
        classButton: null,
      };
    },
  }
</script>

<style lang="scss">
  @import '@/assets/scss/talk.scss';
  .fsmall-btn {
      background: linear-gradient(to right, $pink-fsmall 0%, $pink-fsmall 100%);
    }
    .centered {
      text-align: center;
    }
</style>