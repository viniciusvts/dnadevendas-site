<template>
  <div class="contact" v-if="post">
    <h1>Contato</h1>
    <section class="container">
      <div class="row align-items-center">
        <div class="col-md-8 col-sm-12 col-tb-12">
          <form name="/contato/"
          method="POST"
          :action="$http.baseURL + 'wp-json/dna_theme/v1/pagina-contato'">
            <input type="hidden" name="urlOrigem" id="urlOrigem">
            <h2 class="title-message">Vamos conversar?</h2>
            <label for="nome">Nome*</label>
            <input type="text" name="nome" id="nome" required />
            <label for="email">E-mail*</label>
            <input type="email" name="email" id="email" required />
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
              <option value="11-15">11-15</option>
              <option value="16-50">16-50</option>
              <option value="51+">51+</option>
            </select>
            <label for="telefone">Telefone*</label>
            <input type="text" name="telefone" id="telefone" v-on:keyup="execMascaraTel" required />

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
      <Loading />
  </div>
</template>

<script>
import Loading from "@/components/Loading.vue";
import send from "../services/Contact.js";
export default {
  name: "Contact",
  components:{Loading},
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
  },
  methods: {
    getAcf() {
      this.$http.getPagesById(this.pageID)
        .then(resp => resp.json())
        .then(json => {
          this.post = json;
          this.contacts = json.acf.contacts;
          this.setMapIframe(this.contactsWithMap[0].map);
          setTimeout(()=>{document.getElementById('urlOrigem').value = location.href},1000)
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
    execMascaraTel (evt) {
      let v = evt.target.value;
      v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
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