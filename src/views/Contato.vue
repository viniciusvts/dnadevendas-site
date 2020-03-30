<template>
  <section class="contato flat-section">
      <h1>Contato</h1>
      <div class="columns">
          <div class="column">
              <form action="">
                  <label for="nome">Nome*</label>
                  <input type="text" name="nome" id="">

                  <label for="nome">E-mail*</label>
                  <input type="text" name="nome" id="">

                  <label for="nome">Quero falar com*</label>
                  <select name="setor" id="setor">
                      <option value="">Selecionar setor</option>
                      <option value="">Comercial</option>
                      <option value="">Administrativo</option>
                      <option value="">Comercial</option>
                      <option value="">Comercial</option>
                  </select>

                  <label for="assunto">Telefone*</label>
                  <input type="text" name="telefone" id="">

                  <label for="assunto">Assunto*</label>
                  <input type="text" name="assunto" id="">

                  <label for="assunto">Mensagem</label>
                  <textarea name="mensagem" id="mensagem" cols="90" rows="5"></textarea>

                <p>* Campos obrigatórios</p>

                  <input type="submit" value="Enviar mensagem">
              </form>
          </div>

          <div class="column">
            <p class="local">
              <b>São Paulo</b>
              Av. Maj. Sylvio de Magalhães Padilha 5200 America Business Park, Ed. Montreal 8º andar, Morumbi – São Paulo
              <a href="tel:+55 (11) 2384-1502">+55 (11) 2384-1502</a>
            </p>

            <p class="local">
              <b>Belo Horizonte</b>
              Rua Canopus 11, Santa Lucia, Belo Horizonte – MG
              <a href="tel:+55 (31) 4042-0442">+55 (31) 4042-0442</a>
            </p>
            
            <p class="local">
              <b>Rio de Janeiro</b>
              <a href="tel:+55 (21) 4042-6965">+55 (21) 4042-6965</a>
            </p>

            <p class="local">
              <b>Salvador</b>
              R. Carlos Alberto Santos, nº7 Ed. Mais Empresarial, 5º Andar Vilas do Atlântico – Lauro de Freitas – BA
              <a href="tel:+55 (71) 3289-5595">+55 (71) 3289-5595</a>
            </p>            
          </div>
      </div>

      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d29244.614597326214!2d-46.703224!3d-23.619505000000004!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4ae67492de264cb6!2sAmerica%20Business%20Park!5e0!3m2!1sen!2sus!4v1585587519596!5m2!1sen!2sus" width="100%" height="550" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </section>
</template>


<script>
export default {
  name: "Contato",
  created() {
    document.title = "Dna de Vendas | Contato";
  },
};
</script>

<style lang="scss">
    @import '@/assets/scss/variables.scss';
  @import '@/assets/scss/contato.scss';
</style>