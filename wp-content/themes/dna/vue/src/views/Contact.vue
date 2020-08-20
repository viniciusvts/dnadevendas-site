<template>
  <div class="contact">
    <h1>Contato</h1>
    <section class="container">
      <div class="row align-items-center">
        <div class="col-md-8 col-sm-12 col-tb-12">
          <form name="dna_contato"
          method="POST"
          :action="$http.baseURL + 'wp-json/dna_theme/v1/pagina-contato'">
            <input type="hidden" name="urlOrigem" id="urlOrigem">
            <h2 class="title-message">Vamos conversar?</h2>
            <label for="setor">Nome*</label>
            <input type="text" name="nome" id="nome" required />
            <label for="email">E-mail*</label>
            <input type="email" name="email" id="email" required />
            <label for="setor">Quero falar com</label>
            <select name="setor" id="setor" required>
              <option value="Comercial">Comercial</option>
              <option value="Administrativo">Administrativo</option>
              <option value="Comercial 1">Comercial</option>
            </select>
            <label for="telefone">Telefone*</label>
            <input type="text" name="telefone" id="telefone" v-on:keyup="execMascara" required />

            <label for="assunto">Assunto</label>
            <input type="text" name="assunto" id="assunto" required />

            <label for="mensagem">Mensagem</label>
            <textarea
              name="mensagem"
              id="mensagem"
              cols="90"
              rows="5"
              required
            ></textarea>

            <p>* Campos obrigatórios</p>
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
    <div class="row buttons-row">
      <button
        v-for="contact in contactsWithMap"
        :key="contact.map"
        @click="setMapIframe(contact.map, $event)"
      >{{contact.city}}</button>
    </div>
  </div>
</template>


<script>
import send from "../services/Contact.js";
export default {
  name: "Contact",
  mixins: [send],
  data() {
    return {
      mapIframe: null,
      contacts: [
        {
          city: "São Paulo",
          end:
            "Av. Maj. Sylvio de Magalhães Padilha 5200 America Business Park, Ed. Montreal 8º andar, Morumbi – São Paulo",
          email: "contato@dnadevendas.com.br",
          telefone: "+55 (11) 2384-1502",
          map:
            '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d29244.614597326214!2d-46.703224!3d-23.619505000000004!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4ae67492de264cb6!2sAmerica%20Business%20Park!5e0!3m2!1sen!2sus!4v1585587519596!5m2!1sen!2sus" width="100%" height="550" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>',
        },
        {
          city: "Belo Horizonte",
          end: "Rua Canopus 11, Santa Lucia, Belo Horizonte – MG",
          email: null,
          telefone: "+55 (31) 4042-0442",
          map:
            '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3750.2813349957087!2d-43.94970308508518!3d-19.954667386589936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa697861f97e149%3A0xffe6369f045869b2!2sR.%20Canopus%2C%2011%20-%20Santa%20L%C3%BAcia%2C%20Belo%20Horizonte%20-%20MG%2C%2030360-112!5e0!3m2!1spt-BR!2sbr!4v1587746473646!5m2!1spt-BR!2sbr" width="100%" height="550" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>',
        },
        {
          city: "Salvador",
          end:
            "R. Carlos Alberto Santos, nº7 Ed. Mais Empresarial, 5º Andar Vilas do Atlântico – Lauro de Freitas – BA",
          email: null,
          telefone: "+55 (71) 3289-5595",
          map:
            '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3889.582831596932!2d-38.30206118517906!3d-12.87019919092251!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7163e16a0d82513%3A0x130e7ebf24ae7c63!2sMais%20Empresarial!5e0!3m2!1spt-BR!2sbr!4v1589816921620!5m2!1spt-BR!2sbr" width="100%" height="550" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>',
        },
        {
          city: "Rio de Janeiro",
          end: null,
          email: null,
          telefone: "+55 (21) 4042-5440",
        },
      ],
    };
  },
  created() {
    console.log(process.env.VUE_USER_LOGIN_CONTACT);
    this.setMeta();
  },
  mounted() {
    this.setMapIframe(this.contactsWithMap[0].map);
    document.getElementById('urlOrigem').value = location.href
  },
  methods: {
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
    setMeta() {
      let args = []
      args['slug'] = 'contato'
      this.$http.getPages(args)
        .then((res) => res.json())
        .then((json) => {
          this.$root.meta.title = json[0].yoast_title;
          this.$root.meta.tags = json[0].yoast_meta;
        });
    },
    execMascara (evt) {
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