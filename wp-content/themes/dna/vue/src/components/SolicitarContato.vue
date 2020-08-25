<template>
  <section class="contact s-contato" id="contato-servico">
    <h2 class="fale-conosco" :class="detailColorClass" v-if="titulo" v-html="titulo"></h2>
    <form :id="formName"
      method="POST"
      :action="$http.baseURL + 'wp-json/dna_theme/v1/solicitar-contato'">
      <input type="hidden" name="urlOrigem" id="urlOrigem">
      <div class="row">
        <div class="col-md-12">
          <input type="text" name="nome" id="nome" 
        :class="detailColorClass" placeholder="Seu nome" required>
        </div>

        <div class="col-md-6">
          <input type="email" name="email" id="email" 
          :class="detailColorClass" placeholder="Seu e-mail" required>
        </div>

        <div class="col-md-6">
          <input type="text" name="mobile_phone" id="mobile_phone" v-on:keyup="execMascara" 
          :class="detailColorClass" placeholder="Seu telefone" required>
        </div>

        <div class="col-md-6">
          <input type="text" name="company_name" id="company_name" :class="detailColorClass" placeholder="Sua Empresa" required>
        </div>

        <div class="col-md-6">
          <select type="text" name="qtdfunc" id="qtdfunc" :class="detailColorClass" required>
            <option value>N° de vendedores</option>
            <option value="1-2">1-2</option>
            <option value="3-10">3-10</option>
            <option value="11-15">11-15</option>
            <option value="16-50">16-50</option>
            <option value="51+">51+</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <button :class="detailColorClass" class="inline">
            Solicitar Contato
            <img src="@/assets/svg/paperplain.svg" 
            alt="enviar mensagem">
          </button>
        </div>
      </div>
    </form>
  </section>
</template>

<script>
export default {
  name: "solicitar-contato",
  props: {
    titulo: {
        type: String,
        default: 'Entenda hoje como podemos fazer sua empresa <span>crescer mais</span>'
      }
  },
  data() {
    return {
      detailColorClass: null,
      // classButton: null,
      formMessage: null,
    };
  },
  mounted() {
    this.detailColorClass = this.$route.name;
    document.getElementById('urlOrigem').value = location.href
  },
  methods: {
    execMascara (evt) {
      let v = evt.target.value;
      v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
      v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
      v=v.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca - depois dos 4 digitos após ()
      evt.target.value = v;
    }
  },
  computed: {
    formName () {
      if ( this.$route.name == 'FullService' ||
          this.$route.name == 'Training') return 'conversion-form-consultoria-full-service-757325c8f0ead83c4fb7'
      if ( this.$route.name == 'ForSmall') return 'conversion-form-consultoria-form-small-site-b233205a5a8fe1ee8cdc'
      if ( this.$route.name == 'SalesTraining') return 'conversion-form-treinamento-de-vendas-b2ff848a04b20e6fc3d2'
      if ( this.$route.name == 'SingleBlog') return 'conversion-form-converse-com-nossos-especialistas'
      if ( this.$route.name == 'Talk') return 'conversion-form-palestras-de-vendas-e47298a45c8657828a99'
      return 'dna_contato'
    }
  }
};
</script>

<style lang="scss">
@import "@/assets/scss/contact.scss";
@import "@/assets/scss/solicitar-contato.scss";
</style>
