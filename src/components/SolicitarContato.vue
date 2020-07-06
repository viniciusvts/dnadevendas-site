<template>
  <section class="contact s-contato">
    <div class="container">
      <h2 class="fale-conosco" :class="detailColorClass">
        Entenda hoje como podemos fazer sua empresa
        <span :class="detailColorClass">crescer mais</span>
      </h2>
    </div>
    <form name="dna_contato" action="#" v-on:submit="sendForm">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <input
              type="text"
              name="nome"
              id="nome"
              :class="detailColorClass"
              v-model="formData[0].nome"
              placeholder="Seu nome"
              required
            />
          </div>

          <div class="col-md-6">
            <input
              type="text"
              name="email"
              id="email"
              :class="detailColorClass"
              v-model="formData[0].email"
              placeholder="E-mail"
              required
            />
          </div>

          <div class="col-md-6">
            <input
              type="text"
              name="telefone"
              id="telefone"
              :class="detailColorClass"
              v-model="formData[0].telefone"
              placeholder="Telefone"
              required
            />
          </div>

          <div class="col-md-6">
            <input
              type="text"
              name="empresa"
              id="empresa"
              :class="detailColorClass"
              v-model="formData[0].empresa"
              placeholder="Empresa"
              required
            />
          </div>

          <div class="col-md-6">
            <select
              type="text"
              name="qtdfunc"
              id="qtdfunc"
              :class="detailColorClass"
              v-model="formData[0].qtdfunc"
              required
            >
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
            <button :class="detailColorClass" @click.prevent="send" class="inline">
              Solicitar Contato
              <img src="@/assets/svg/paperplain.svg" alt="enviar mensagem" />
            </button>
          </div>
        </div>
      </div>
    </form>
    <p>{{formMessage}}</p>
  </section>
</template>

<script>
// import classBtn from '../services/ClassButton.js';
import Api from "@/services/ApiRest.js";

export default {
  name: "solicitar-contato",
  // mixins: [classBtn],
  data() {
    return {
      pageId: 3,
      page: null,
      detailColorClass: null,
      // classButton: null,
      formMessage: null,
      formData: [
        {
          nome: "",
          email: "",
          telefone: "",
          empresa: "",
          qtdfunc: ""
        }
      ]
    };
  },
  mounted() {
    this.detailColorClass = this.$route.name;
  },
  methods: {
    sendForm(evt) {
      evt.preventDefault();
      Api.sendToCF7(3795, this.formData)
        .then(res => {
          return res.json();
        })
        .then(json => {
          this.formMessage = json.message;
        });
    },
    getPage() {
      Api.getPageById(this.pageId)
        .then(resp => resp.json())
        .then(json => {
          this.page = json;
          this.$root.meta.title = this.page.yoast_title;
          this.$root.meta.tags = this.page.yoast_meta;
        });
    }
  }
};
</script>

<style lang="scss">
@import "@/assets/scss/contact.scss";
@import "@/assets/scss/solicitar-contato.scss";
</style>
