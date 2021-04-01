<template>
  <section class="contact s-contato" id="contato-servico">
    <h2 class="fale-conosco" :class="detailColorClass" v-if="titulo" v-html="titulo"></h2>
    <form id="solicitarcontatoform"
      method="POST"
      :action="$http.baseURL + 'wp-json/dna_theme/v1/solicitar-contato'"
      @submit="sendForm">
      <input type="hidden" name="urlOrigem" id="urlOrigem">
      <input type="hidden" name="traffic_source" id="traffic_source">
      <input type="hidden" name="traffic_medium" id="traffic_medium">
      <input type="hidden" name="traffic_campaign" id="traffic_campaign">
      <input type="hidden" name="traffic_value" id="traffic_value">
      <div class="row">
        <div class="col-md-6">
          <input type="text" name="nome" id="nome" 
        :class="detailColorClass" placeholder="Seu nome" required>
        </div>

        <div class="col-md-6">
          <input type="email" name="email" id="email" 
          :class="detailColorClass" placeholder="Seu e-mail" required>
        </div>

        <div class="col-md-6">
          <input type="text" name="mobile_phone" id="mobile_phone" ref="mobile_phone" v-on:keyup="execMascaraTel" 
          :class="detailColorClass" placeholder="Seu telefone" required>
        </div>

        <div class="col-md-6">
          <input type="text" name="company_name" id="company_name" :class="detailColorClass" placeholder="Sua Empresa" required>
        </div>
        
        <div class="col-md-6">
          <select name="cf_segmento_de_atuacao_novo" id="cf_segmento_de_atuacao_novo" required>
            <option value>Segmento de atuação</option>
            <option value="Agência de Marketing e Publicidade">Agência de Marketing e Publicidade</option>
            <option value="Consultorias e Treinamento">Consultorias e Treinamento</option>
            <option value="E-commerce">E-commerce</option>
            <option value="Educação e Ensino">Educação e Ensino</option>
            <option value="Engenharia">Engenharia</option>
            <option value="Eventos">Eventos</option>
            <option value="Financeiro, Jurídico">Financeiro, Jurídico</option>
            <option value="Governo e Órgãos Públicos">Governo e Órgãos Públicos</option>
            <option value="Hardware e Eletrônicos">Hardware e Eletrônicos</option>
            <option value="Imobiliárias">Imobiliárias</option>
            <option value="Mídia e Comunicação">Mídia e Comunicação</option>
            <option value="ONGs">ONGs</option>
            <option value="SaaS">SaaS</option>
            <option value="Saúde e Estética">Saúde e Estética</option>
            <option value="Serviços">Serviços</option>
            <option value="Serviços de RH">Serviços de RH</option>
            <option value="Software">Software</option>
            <option value="Telecomunicação">Telecomunicação</option>
            <option value="Turismo">Turismo</option>
            <option value="Varejo">Varejo</option>
            <option value="Construtora/ Incorporadora">Construtora/ Incorporadora</option>
            <option value="Outros">Outros</option>
          </select>
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
    // completa o formulário com alguns dados
    setTimeout(()=>{
      document.getElementById('urlOrigem').value = location.href
      document.getElementById('traffic_source').value = this.$http.getUriParam('utm_source') ? this.$http.getUriParam('utm_source') : this.$http.getCookie('__trf.src')
      document.getElementById('traffic_medium').value = this.$http.getUriParam('utm_medium')
      document.getElementById('traffic_campaign').value = this.$http.getUriParam('utm_campaign')
      document.getElementById('traffic_value').value = this.$http.getUriParam('utm_term')
    }, 2000)
  },
  methods: {
    sendForm (evt) {
      evt.preventDefault()
      const formData = new FormData(evt.target)
      const url = evt.target.action
      //verifica se telefone é válido #16882
      if(this.$refs.mobile_phone.value.length < 14){
        return alert("Digite um telefone válido")
      }
      this.$http.sendFormToWP(url, formData)
      .then(resp => {
        if (resp.ok) return resp.json()
        alert('Houve um erro ao enviar,\nTente novamente.')
      })
      .then(json => {
        location.href = json.data.url
      })
    },
    execMascaraTel (evt) {
      let v = evt.target.value;
      v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
      v=v.replace(/^(\d{11})(\d*)/g,"$1"); // remove o excedente de 11 digitos
      v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
      v=v.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca - depois dos 4 digitos após ()
      evt.target.value = v;
    }
  },
};
</script>

<style lang="scss">
@import "@/assets/scss/contact.scss";
@import "@/assets/scss/solicitar-contato.scss";
</style>
