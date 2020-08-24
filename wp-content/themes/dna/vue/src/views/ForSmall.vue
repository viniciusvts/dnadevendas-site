<template>
  <div class="forSmall">
    <Spotlight>
      <div class="text section">
        <h1 v-html="post.acf.chamada"></h1>
        <button class="fsmall-btn">
          <a href="#contato-servico">
            Falar com um consultor
          </a>
        </button>
      </div>
      <div class="see-more">
        <div class="container">
          <span>Saiba mais</span>
          <img src="@/assets/svg/fast-forward.svg"/>
        </div>
      </div>
      <img class="image" :src="post.acf.foto.sizes.medium_large">
    </Spotlight>

    <banner-fsmall></banner-fsmall>

    <Pillars>
      <div class="container-fluid">
          <div class="row">
              <div class="col-sm-12 col-sm-12 col-tb-12">
                  <h2>Melhoramos expressivamente os resultados da sua empresa através do alinhamento de:</h2>
              </div>

              <div class="container-fluid">
                <div class="row" id="icons-area">
                  <div class="col-md-3 pillar">
                      <img src="@/assets/newarrow.png" alt="Processo">
                      <p>Processos <br>bem definidos</p>
                  </div>

                  <div class="col-md-3 pillar">
                      <img src="@/assets/newbigarrow.png" alt="Gestão">
                      <p>Funil de vendas <br>e gatilhos personalizados</p>
                  </div>

                  <div class="col-md-3 pillar">
                      <img src="@/assets/handgroup.png" alt="Tecnologia">
                      <p>Equipe de vendas <br>capacitada</p>
                  </div>

                  <div class="col-md-3">
                      <img src="@/assets/newgraphic.png" alt="Pessoas">
                      <p>Resultados <br>previsíveis e crescentes</p>                
                  </div>
                </div>
              </div>
              
              <div class="col-sm-12 col-sm-12 col-tb-12 no-animate">
                <img src="@/assets/svg/linefs.svg" alt="">
              </div>
          </div>
      </div>

    </Pillars>
    <Cases/>
    <hd-sucesso></hd-sucesso>
    <Depoiments color="pink"/>
    <pricing-table></pricing-table>
    <SolicitarContato></SolicitarContato>


  </div>
</template>

<script>
    import Spotlight from '@/components/Spotlight.vue';
    import Pillars from '@/components/Pillars.vue';
    import Cases from '@/components/CasesForSmall.vue';
    import HistoriasDeSucesso from '@/components/HistoriasDeSucesso.vue';
    import Depoiments from '@/components/Depoiments.vue';
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
      SolicitarContato,
      'pricing-table': PricingTable,
      'hd-sucesso': HistoriasDeSucesso,
      'banner-fsmall': bannerFSmal,
    },
    mixins: [ClassButton],
    data() {
      return {
        postId: 2586,
        post: null
      }
    },
    mounted(){
      this.getPost();
    },
    methods: {
      getPost(){
        this.$http.getPagesById(this.postId)
        .then(resp => resp.json())
        .then( json => {
          this.post = json
          document.title = this.post.yoast_title
        })
      }
    }
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