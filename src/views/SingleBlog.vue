<template>
  <section class="blogSingle section">
    <div class="container">
      <div class="columns">
          <div class="column">
            <div class="sumary">
              <div class="title">
                <h2>Sumário</h2>
                <span></span>
              </div>
              <ul>
                <li>Quem é a Consolide?</li>
                <li>O que a Consolide queria melhorar?</li>
                <li>Diagnóstico: o que impedia a Consolide de crescer</li>
                <li>Aplicando os 4 Pilares da Produtividade: como funcionou a parceria entre a Consolide e a DNA de Vendas for Small</li>
                <li>Quais foram os resultados alcançados com a consultoria?</li>
              </ul>
            </div>
          </div>

          <div class="column content">
            <div class="thumbnail">
              <img src="https://www.dnadevendas.com.br/wp-content/uploads/6580-case-hydra-topo.jpg" alt="">
            </div>
            <h1>Entenda como a Hydra Cosméticos mudou de Field Sales para Inside Sales e dobrou seu faturamento mensal</h1>
            <p class="breadcrumb">
              <router-link to="/">Home</router-link> / 
              <router-link to="/blog">Blog</router-link> /
              Entenda como a Hydra Cosméticos mudou de Field Sales para Inside Sales e dobrou seu faturamento mensal
            </p>
            
            <h2>Você estaria disposto a mudar a sua estratégia para lucrar mais?</h2>

            <p>A empresa de cosméticos Hydra percebeu que sair de field sales para inside sales iria diminuir o CAC da empresa e aumentar a sua produtividade de vendas. Mas, ao mesmo tempo, eles tinham dúvidas de como fazer isso sem pôr em risco o andamento do negócio.</p>

            <p>Foi então que ela procurou a ajuda da DNA de Vendas for Small e conseguiu não só implementar uma nova metodologia, como alcançar outros resultados surpreendentes:</p>

            <ul>
              <li>aumentar 100% na fidelização de clientes;</li>
              <li>aumentar 20% de novos clientes;</li>
              <li>dobrar o faturamento mensal.</li>
            </ul>

            <p>Para saber como isso foi possível, acompanhe mais um case de sucesso da DNA for Small!</p>

            <h2>Quem é a Hydra Cosméticos?</h2>

            <p>Como o nome indica, a Hydra é uma empresa de cosméticos e está localizada em Juazeiro, interior da Bahia.</p>

            <p>Inicialmente, o negócio surgiu com apenas 4 produtos para tratamento capilar. Com o passar do tempo e amadurecimento da equipe, o portfólio foi crescendo, até que hoje eles possuem artigos para todas as necessidades capilares.</p>

            <p>Para o futuro, os planos são de expansão: eles querem se afastar do rótulo de produtos para cabelo e se tornar mais plural, já que pretendem operar nos demais segmentos de cosméticos.</p>

            <p>Eles atuam como uma empresa B2B2C. Ainda que eles tenham um e-commerce e realizem vendas diretas, o foco é a revenda dos seus produtos em lojas de cosméticos e farmácias.</p>

            <p>A proposta da Hydra não é apenas entregar um produto, mas dar suporte e criar estratégias para que a venda ocorra com maior agilidade e gere retorno financeiro aos seus parceiros.</p>

            <img src="https://www.dnadevendas.com.br/wp-content/uploads/cta-blog-dna-3.jpg" alt="">

            <h2>Qual era a dificuldade da Hydra?</h2>

            <p>Com o passar do tempo, a Hydra percebeu que ter representantes comerciais no seu time não era a melhor metodologia de vendas para aquele negócio.</p>

            <p>Maxwel Souza, diretor-administrativo da empresa, conta que eles começaram a ponderar algumas questões, como:</p>

            <ul>
              <li>será que eles estão utilizando um discurso alinhado aos nossos princípios?;</li>
              <li>como saber se o discurso de venda está sendo realmente efetivo?;</li>
              <li>como garantir que nossos produtos estão sendo priorizados em relação aos demais?</li>
            </ul>

              <p>Somado a isso, manter um time de vendedores externos não estava mais sendo sustentável financeiramente. Afinal, além dos gastos contratuais, eles também precisavam custear as despesas de viagens para outras cidades e estados.</p>

              <p>Foi então que eles começaram a pesquisar por opções. Eles precisavam de mais resultados de vendas para o atacado com o menor custo e maior controle sobre as operações. </p>

              <p>“Eu comecei pesquisando alternativas, aí vi que o método inside sales já era muito comum nos Estados Unidos e que algumas empresas no Brasil também já o aplicam com sucesso. Uma empresa que me inspirou bastante na época foi a Ocean Drop”, conta Maxwel.</p>

              <p>O método prometia trazer todos os benefícios que eles procuravam no momento: menor CAC, melhorar o ciclo de vendas e garantir a previsibilidade de receita da empresa.</p>

              <p>A dúvida agora era como mudar as operações de field sales para inside sales. Com as pesquisas, eles perceberam que até poderiam dar esse passo sozinhos, mas com a ajuda de uma empresa com expertise seria mais fácil e rápido. </p>

              <p>Foi nesse momento que a parceria entre a DNA for Small e a Hydra começou.</p>
            
          </div>

          <div class="column">
            <Sidebar/>
          </div>
      </div>
    </div>
  </section>
</template>


<script>

  import Sidebar from "@/components/Sidebar.vue";
  
  export default {
    name: "Contato",
    components: {
      Sidebar
    },
    props: ["slug"],
    created() {
      document.title = `Dna de Vendas - Blog | ${this.slug}` ;
    },
  };
</script>

<style lang="scss">
  @import '@/assets/scss/variables.scss';
  @import '@/assets/scss/breakpoint.scss';
  @import '@/assets/scss/blogSingle.scss';
</style>