<template>
  <section class="about">
    <div class="container">
      <h1>Quem Somos</h1>
      <p>Uma consultoria que atua com foco exclusivo no desenvolvimento de pessoas, processos e modelos de gestão para o aumento da produtividade em vendas. Contamos com um time multidisciplinar de 30 colaboradores que garantem excelência em todos os nossos projetos e entregas.</p>

      <div class="row">
        <div class="col-md-6 left">
          <h2>Nossa história</h2>
          <p>A DNA de Vendas nasceu a partir do desenvolvimento de um programa de gestão e capacitação da força de vendas, criado por três executivos, em uma das maiores redes de varejo do Brasil.</p>

          <p>O projeto foi desenhado, executado e aperfeiçoado, ao longo de três anos, pelos sócios da DNA de Vendas, e o impacto gerado pela implantação do programa contribuiu estrategicamente para o crescimento no volume de vendas, aumento da rentabilidade e qualidade na formação de líderes de vendas. A Exame concedeu o Prêmio Maiores e Melhores por dois anos consecutivos, pelo maior crescimento no setor e aumento de rentabilidade do setor varejista.</p>

          <p>Os três executivos entenderam que haviam criado uma metodologia que poderia ser aplicada e customizada em diversos negócios. E a partir de 2007, passaram a prestar serviço para várias empresas, inclusive para uma das operações da companhia que haviam trabalhado.</p>

          <p>Ao longo dos últimos anos a DNA já desenvolveu dezenas de programas para aumento da produtividade em empresas que vendem produtos e serviços em mais de 35 segmentos em todas as regiões do Brasil.</p>

          <p>A DNA possui uma equipe dedicada e multidisciplinar para atender diferentes perfis de empresas e segmentos. Contamos  com engenheiros, administradores, psicólogos e profissionais de marketing com dedicação exclusiva aos nossos projetos.</p>

          <p>Em fevereiro de 2011, em função das necessidades dos nossos clientes, criamos uma empresa de Tecnologia, a iDNA de Vendas, a qual desenvolveu o Ciapipe, um software de inteligência de vendas para ganho de produtividade das equipes.</p>
        </div>

        <div class="col-md-6 right">
          <h2>Nossos Valores</h2>
          <div class="row">
            <div class="col-auto">
              <img src="@/assets/svg/diamond.svg" alt="Integridade">              
            </div>
            <div class="col">
              <h3>Integridade</h3>
              <p>Nossas ações refletem retidão, justiça e caráter</p>
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <img src="@/assets/svg/tick.svg" alt="Integridade">              
            </div>
            <div class="col">
              <h3>Compromisso</h3>
              <p>Fazer mais do que o esperado</p>
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <img src="@/assets/svg/discover.svg" alt="Integridade">              
            </div>
            <div class="col">
              <h3>Foco</h3>
              <p>A concentração em nossas metas determina nossa força de atuação</p>
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <img src="@/assets/svg/lamp.svg" alt="Integridade">              
            </div>
            <div class="col">
              <h3>Inovação</h3>
              <p>Sempre existe uma maneira de fazer melhor</p>
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <img src="@/assets/svg/pencil.svg" alt="Integridade">              
            </div>
            <div class="col">
              <h3>Simplicidade</h3>
              <p>Se não for prático, objetivo e intuitivo, pense numa forma melhor</p>
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <img src="@/assets/svg/smile.svg" alt="Integridade">              
            </div>
            <div class="col">
              <h3>Otimismo</h3>
              <p>O pensamento positivo é a primeira etapa da realização de um sonho</p>
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <img src="@/assets/svg/heart.svg" alt="Integridade">              
            </div>
            <div class="col">
              <h3>Intensidade no trabalho</h3>
              <p>Energia e dedicação intensa diferenciam um resultado mediano do excepcional</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <h1>Nossa Estrutura</h1>
        <p>A DNA de Vendas tem dois escritórios corporativos: um em São Paulo e outro em Lauro de Freitas, na RM de Salvador. Além dos escritórios, a DNA tem sócios-consultores alocados no Rio de Janeiro, Belo Horizonte e Juiz de Fora para melhor atender os clientes desses estados sem necessidade de deslocamentos.</p>
      </div>

    <div class="galery">
      <div class="row">
            <div class="col-md-3">
              <img src="https://www.dnadevendas.com.br/wp-content/uploads/nossa-estrutura-7.jpg" alt="">
            </div>

            <div class="col-md-3">
              <img src="https://www.dnadevendas.com.br/wp-content/uploads/nossa-estrutura-9.jpg" alt="">
            </div>

            <div class="col-md-3">
              <img src="https://www.dnadevendas.com.br/wp-content/uploads/nossa-estrutura-6.jpg" alt="">
            </div>

            <div class="col-md-3">
              <img src="https://www.dnadevendas.com.br/wp-content/uploads/nossa-estrutura-5.jpg" alt="">
            </div>

            <div class="col-md-3">
              <img src="https://www.dnadevendas.com.br/wp-content/uploads/nossa-estrutura-10.jpg" alt="">
            </div>

            <div class="col-md-3">
              <img src="https://www.dnadevendas.com.br/wp-content/uploads/nossa-estrutura-4.jpg" alt="">
            </div>

            <div class="col-md-3">
              <img src="https://www.dnadevendas.com.br/wp-content/uploads/nossa-estrutura-2.jpg" alt="">
            </div>

            <div class="col-md-3">
              <img src="https://www.dnadevendas.com.br/wp-content/uploads/nossa-estrutura-1.jpg" alt="">
            </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Api from "@/services/ApiRest.js";

export default {
  name: "About",
  data() {
    return {
      postId: 312,
      post: null
    }
  },
  mounted(){
    this.getPost()
  },
  methods: {
    getPost(){
      Api.getPagesById(this.postId)
      .then(resp => resp.json())
      .then( json => {
        this.post = json
        this.$root.meta.title = this.post.yoast_title;
        this.$root.meta.tags = this.post.yoast_meta;
      })
    }
  }
}
</script>

<style lang="scss">
  @import "@/assets/scss/about.scss";  
</style>