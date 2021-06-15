<template>
  <div class="contact" v-if="post">
    <h1>Contato</h1>
    <section class="container">
      <div class="row align-items-center">
        <div class="col-md-8 col-sm-12 col-tb-12">
          <form name="contatoform"
          method="POST"
          :action="$http.baseURL + 'wp-json/dna_theme/v1/pagina-contato'"
          @submit="sendForm">
            <input type="hidden" name="urlOrigem" id="urlOrigem">
            <input type="hidden" name="traffic_source" id="traffic_source">
            <input type="hidden" name="traffic_medium" id="traffic_medium">
            <input type="hidden" name="traffic_campaign" id="traffic_campaign">
            <input type="hidden" name="traffic_value" id="traffic_value">
            <h2 class="title-message">Vamos conversar?</h2>
            <label for="nome">Nome*</label>
            <input type="text" name="nome" id="nome" required />
            <label for="email">E-mail*</label>
            <input type="email" name="email" id="email" required />
            <label for="company_name">Empresa*</label>
            <input type="text" name="company_name" id="company_name" required />
            <label for="setor">Quero falar com*</label>
            <select name="setor" id="setor" required>
              <option value=""> </option>
              <option value="Administrativo / Financeiro">Administrativo / Financeiro</option>
              <option value="Comercial / Vendas">Comercial / Vendas</option>
              <option value="Marketing / Comunicação">Marketing / Comunicação</option>
              <option value="Recursos Humanos">Recursos Humanos</option>
            </select>
            <label for="nVendedores">N° de vendedores*</label>
            <select name="nVendedores" id="nVendedores" required>
              <option value=""> </option>
              <option value="1-2">1-2</option>
              <option value="3-10">3-10</option>
              <option value="11-20">11-20</option>
              <option value="21-50">21-50</option>
              <option value="51+">51+</option>
            </select>

            <label for="cf_segmento_de_atuacao_novo">Segmento de atuação*</label>
            <select name="cf_segmento_de_atuacao_novo" id="cf_segmento_de_atuacao_novo" required>
              <option value=""> </option>
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
            
            <label for="telefone">Telefone*</label>
            <input type="text" name="telefone" id="telefone" ref="mobile_phone" v-on:keyup="execMascaraTel" required />

            <label for="assunto">Assunto*</label>
            <input type="text" name="assunto" id="assunto" required />

            <label for="mensagem">Mensagem*</label>
            <textarea
              name="mensagem"
              id="mensagem"
              cols="90"
              rows="5"
              required
            ></textarea>

            <p class="aviso">* Campos obrigatórios</p>
            <button>Enviar</button>
            <!-- <input type="submit" value="Enviar mensagem"> -->
          </form>
        </div>

        <div class="col-md-4 col-sm-12 col-tb-12">
          <div class="local" v-for="contact in contacts" :key="contact.city">
            <div class="flex-wrap">
              <img src="../assets/svg/pinmap.gold.svg" alt srcset />
              <b v-if="contact.city">{{contact.city}}</b>
            </div>

            <p>{{contact.end}}</p>

            <a v-if="contact.email" :href="'mailto:'+contact.email">{{contact.email}}</a>
            <a v-if="contact.telefone" :href="'tel:'+contact.telefone">{{contact.telefone}}</a>
          </div>

          <p class="local">
            Quer fazer parte do nosso time?
            <a
              href="https://jobs.solides.com/dna"
              target="_blank"
            >Trabalhe Conosco</a>
          </p>
        </div>
      </div>
    </section>
    <div v-html="mapIframe"></div>
    <div class="row buttons-row mw100w">
      <button
        v-for="contact in contactsWithMap"
        :key="contact.map"
        @click="setMapIframe(contact.map, $event)"
      >{{contact.city}}</button>
    </div>
  </div>
  <div v-else class="container loadingPage">
      <Space />
  </div>
</template>

<script>
import Space from "@/components/Space.vue";
import send from "../services/Contact.js";
export default {
  name: "Contact",
  components:{Space},
  mixins: [send],
  data() {
    return {
      pageID: 7310,
      mapIframe: null,
      post: null,
      contacts: null
    };
  },
  created() {
    document.title = 'Contato - DNA de Vendas'
  },
  mounted() {
    this.getAcf();
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
    getAcf() {
      this.$http.getPagesById(this.pageID)
        .then(resp => resp.json())
        .then(json => {
          this.post = json;
          this.contacts = json.acf.contacts;
          this.setMapIframe(this.contactsWithMap[0].map);
        });
    },
    removeActiveButtons(first) {
      var buttons = document.querySelectorAll(".buttons-row button");
      for (let i = 0; i < buttons.length; i++) {
        buttons[i].classList.remove("active");
      }
      if (first && buttons.length > 0) buttons[0].classList.add("active");
    },
    setMapIframe(iframe, event) {
      if (typeof event == "undefined") {
        // se não manda evento é a primeira vez
        this.removeActiveButtons(true);
      } else {
        this.removeActiveButtons(false);
        event.target.classList.add("active");
      }
      this.mapIframe = iframe;
    },
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
  computed: {
    contactsWithMap: function () {
      //propriedade computada
      return this.contacts.filter(function (contact) {
        //filtra os contatos
        return contact.map; // por aqueles que possuem map
      });
    },
  },
};
</script>

<style lang="scss">
@import "@/assets/scss/contact.scss";
</style>