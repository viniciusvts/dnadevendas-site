<template>
  <footer>
    <div class="footer section">
      <div class="top">
        <div class="row">
          <div class="col-md-2 ">
            <h3>Contato</h3>
            <p>
              <b>Salvador</b><br>
              <a href="tel:+55 (71) 3289-5595">+55 (71) 3289-5595</a>
            </p>
            <p>
              <b>São Paulo</b> <br>
              <a href="tel:+55 (11) 2384-1502">+55 (11) 2384-1502</a>
            </p>
            <p>
              <b>Belo Horizonte</b> <br>
              <a href="tel:+55 (31) 4042-0442">+55 (31) 4042-0442</a>
            </p>
            <p>
              <b>Rio de Janeiro</b> <br>
              <a href="tel:+55 (21) 4042-6965">+55 (21) 4042-6965</a>
            </p>
          </div>

          <div class="col-md-2">
            <h3>Saiba Mais</h3>
            <ul>
              <li>Consultoria de Vendas</li>
              <li>Treinamento de Vendas</li>
              <li>Workshop de Vendas</li>
              <li>Palestra de Vendas</li>
              <li>Produtividade de Vendas</li>
              <li>Materiais de Vendas</li>
              <li>Processo de Vendas</li>
              <li>Blog de Vendas</li>
              <li>Consultoria Comercial</li>
              <li>DNA For Marketing</li>
              <li>Playbook de Vendas</li>
            </ul>
          </div>

          <div class="col-md-4">
            <h3>Últimos Posts</h3>
            <ul>
              <li>Case de sucesso: confira como o Acade Lotear aumentou seu faturamento em 40% após consultoria com a DNA de Vendas For Small;</li>

              <li>Case de Sucesso: Como a DNAfor Small ajudou a Escola EDTI a ter um negócio escalável de forma sustentável;</li>

              <li>Playbook de vendas: o que é? Para que serve? E como construir um?</li>

              <li>Playbook de vendas: o que é? Para que serve? E como construir um?</li>
            </ul>
          </div>

          <div class="col-md-4">
            <h3>Receba conteúdos exclusivos</h3>
            <form action="">
              <input type="text" name="Nome" placeholder="Insira seu nome*" id="nome">
              <input type="email" placeholder="Seu e-mail*" nome="email" id="email">
              <p>* Campos obrigatórios</p>
              <input type="submit" value="Quero me inscrever">
            </form>
          </div>

        </div>
      </div>

      <div class="bottom">
        <div class="row">
          <div class="col-md-12">
            <h4>Clientes atendidos em:</h4>
            <p>Acre • Alagoas • Amapá • Amazonas • Bahia • Ceará • Distrito Federal • Espírito Santo • Goiás • Maranhão • Mato Grosso • Mato Grosso do Sul • Minas Gerais • Pará • Paraíba •Paraná • Pernambuco • Piauí • Rio de Janeiro • Rio Grande do Norte • Rio Grande do Sul • Rondônia • Roraima • Santa Catarina • São Paulo • Sergipe • Tocantins</p>
          </div>

          <div class="col-md-12">
            <hr>
          </div>

          <div class="col-12">
            <ul class="social">
              <li>
                <a href="https://www.facebook.com/dnadevendas" target="_blank" noreferrer>
                  <img src="@/assets/svg/facebook.svg" alt="">
                </a>
              </li>
              <li>
                <a href="https://www.instagram.com/dnadevendas/" target="_blank" noreferrer>
                  <img src="@/assets/svg/instagram.svg" alt="">
                </a>
              </li>
              <li>
                <a href="https://www.linkedin.com/company/dna-de-vendas" target="_blank" noreferrer>
                  <img src="@/assets/svg/linkedin.svg" alt="">
                </a>
              </li>
              <li>
                <a href="https://www.youtube.com/channel/UCFVjn3D1_niovczni8e9jeg" target="_blank" noreferrer>
                  <img src="@/assets/svg/youtube.svg" alt="">
                </a>
              </li>
              <li>
                <a href="https://br.pinterest.com/dnadevendas/" target="_blank" noreferrer>
                  <img src="@/assets/svg/pinterest.svg" alt="">
                </a>
              </li>
              <li>
                <a href="https://twitter.com/dnadevendas" target="_blank" noreferrer>
                  <img src="@/assets/svg/twitter.svg" alt="">
                </a>
              </li>
            </ul>
          </div>

          <div class="col">
            <p>© Copyright 2020. Direitos Reservados - DNA de Vendas</p>
          </div>
          
          <div class="col-md-auto">
            <router-link to="/politicas-de-privacidade">
              <p>Políticas de privacidade</p>
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: "TheFooter"
};
</script>

<style lang="scss">
  @import '@/assets/scss/variables.scss';
  @import '@/assets/scss/mixins.scss';
  @import '@/assets/scss/breakpoint.scss';
  @import '@/assets/scss/footer.scss';
</style>
