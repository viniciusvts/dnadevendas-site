<template>
  <section class="about">
    <div class="container">
      <h1>Quem Somos</h1>
      <p>Uma consultoria que atua com foco exclusivo no desenvolvimento de pessoas, processos e modelos de gestão para o aumento da produtividade em vendas. Contamos com um time multidisciplinar de 30 colaboradores que garantem excelência em todos os nossos projetos e entregas.</p>

      <div class="row">
        <div class="col-md-6 left">
          <div class="title">
            <span></span>
            <h2>Nossa história</h2>
          </div>
          <p>
            A DNA de Vendas nasceu a partir do desenvolvimento de
            um programa de gestão e capacitação da força de Vendas,
            criado por três executivos, em uma das maiores redes de
            varejo do Brasil. O projeto foi executado e aperfeiçoado
            e o impacto gerado contribuiu estrategicamente para o
            crescimento de Vendas e o aumento da rentabilidade.
          </p>

          <p>
            Ao longo dos últimos anos a DNA já desenvolveu centenas
            de programas para aumento da produtividade de Vendas
            em empresas que atuam com produtos e serviços, nos
            mais diversos segmentos, tais como: tecnologia, educação,
            mercado imobiliário, saúde indústria farmacêutica,
            automobilística, varejo, distribuição em todas as regiões
            do Brasil.
          </p>

          <p>
            O grupo DNA de Vendas é constituído por três negócios:
            DNA de Vendas Corporate, DNA de Vendas For Small e a
            DNA For Marketing.
          </p>
        </div>

        <div class="col-md-6 right">
          <div class="title">
            <h2>Nossos Valores</h2>
            <span></span>
          </div>
          <div class="row">
            <div class="col-auto">
              <img src="@/assets/svg/diamond.svg" alt="Integridade" />
            </div>
            <div class="col">
              <h3>Integridade</h3>
              <p>Nossas ações refletem retidão, justiça e caráter</p>
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <img src="@/assets/svg/tick.svg" alt="Integridade" />
            </div>
            <div class="col">
              <h3>Compromisso</h3>
              <p>Fazer mais do que o esperado</p>
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <img src="@/assets/svg/discover.svg" alt="Integridade" />
            </div>
            <div class="col">
              <h3>Foco</h3>
              <p>A concentração em nossas metas determina nossa força de atuação</p>
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <img src="@/assets/svg/lamp.svg" alt="Integridade" />
            </div>
            <div class="col">
              <h3>Inovação</h3>
              <p>Sempre existe uma maneira de fazer melhor</p>
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <img src="@/assets/svg/pencil.svg" alt="Integridade" />
            </div>
            <div class="col">
              <h3>Simplicidade</h3>
              <p>Se não for prático, objetivo e intuitivo, pense numa forma melhor</p>
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <img src="@/assets/svg/smile.svg" alt="Integridade" />
            </div>
            <div class="col">
              <h3>Otimismo</h3>
              <p>O pensamento positivo é a primeira etapa da realização de um sonho</p>
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <img src="@/assets/svg/heart.svg" alt="Integridade" />
            </div>
            <div class="col">
              <h3>Intensidade no trabalho</h3>
              <p>Energia e dedicação intensa diferenciam um resultado mediano do excepcional</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-5 group">
        <h1>Grupo Dna</h1>
        <div class="col-md-4">
          <router-link :to="{name: 'Home'}">
            <img
              src="https://www.dnadevendas.com.br/wp-content/uploads/Prancheta-1.png"
              alt="Dna de Vendas"
            />
          </router-link>
        </div>
        <div class="col-md-4">
          <router-link :to="{name: 'ForSmall'}">
            <img
              src="https://www.dnadevendas.com.br/wp-content/uploads/Prancheta-1-cópia-2.png"
              alt="Dna de Vendas for Small"
            />
          </router-link>
        </div>
        <div class="col-md-4">
          <a href="http://dnaformarketing.com.br/" target="_blank">
            <img
              src="https://www.dnadevendas.com.br/wp-content/uploads/Prancheta-1-cópia.png"
              alt="Dna for Marketing"
            />
          </a>
        </div>
      </div>

      <div class="row mt-5">
        <h1>Nossa Estrutura</h1>
        <p>A DNA de Vendas tem dois escritórios corporativos: um em São Paulo e outro em Lauro de Freitas, na RM de Salvador. Além dos escritórios, a DNA tem sócios-consultores alocados no Rio de Janeiro, Belo Horizonte e Juiz de Fora para melhor atender os clientes desses estados sem necessidade de deslocamentos.</p>
      </div>

      <div class="galery">
        <div class="row">
          <div class="col-md-3">
            <img src="https://www.dnadevendas.com.br/wp-content/uploads/nossa-estrutura-7.jpg" alt />
          </div>

          <div class="col-md-3">
            <img src="https://www.dnadevendas.com.br/wp-content/uploads/nossa-estrutura-9.jpg" alt />
          </div>

          <div class="col-md-3">
            <img src="https://www.dnadevendas.com.br/wp-content/uploads/nossa-estrutura-6.jpg" alt />
          </div>

          <div class="col-md-3">
            <img src="https://www.dnadevendas.com.br/wp-content/uploads/nossa-estrutura-5.jpg" alt />
          </div>

          <div class="col-md-3">
            <img src="https://www.dnadevendas.com.br/wp-content/uploads/nossa-estrutura-10.jpg" alt />
          </div>

          <div class="col-md-3">
            <img src="https://www.dnadevendas.com.br/wp-content/uploads/nossa-estrutura-4.jpg" alt />
          </div>

          <div class="col-md-3">
            <img src="https://www.dnadevendas.com.br/wp-content/uploads/nossa-estrutura-2.jpg" alt />
          </div>

          <div class="col-md-3">
            <img src="https://www.dnadevendas.com.br/wp-content/uploads/nossa-estrutura-1.jpg" alt />
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
    };
  },
  mounted() {
    this.getPost();
  },
  methods: {
    getPost() {
      Api.getPagesById(this.postId)
        .then(resp => resp.json())
        .then(json => {
          this.post = json;
          this.$root.meta.title = this.post.yoast_title;
          this.$root.meta.tags = this.post.yoast_meta;
        });
    }
  }
};
</script>

<style lang="scss">
@import "@/assets/scss/about.scss";
</style>