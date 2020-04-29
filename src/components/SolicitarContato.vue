<template>
  <section class="contact">
    <h2 class="fale-conosco" :class="detailColorClass">Entenda hoje como podemos fazer sua empresa <span :class="detailColorClass">crescer mais</span></h2>
    <form name="dna_contato" action="#" class="row" v-on:submit="sendForm">
      <input type="text" name="nome" id="nome" class="col-12 col-md" :class="detailColorClass" v-model="formData[0].nome" placeholder="Seu nome" required>
      <input type="text" name="email" id="email" class="col-12 col-md" :class="detailColorClass" v-model="formData[0].email" placeholder="Seu e-mail" required>
      <input type="text" name="telefone" id="telefone" class="col-12 col-md" :class="detailColorClass" v-model="formData[0].telefone" placeholder="Seu telefone" required>
      <button :class="detailColorClass" @click.prevent="send">
        Solicitar Contato
      </button>
    </form>
    <p>{{formMessage}}</p>
  </section>
</template>

<script>
// import classBtn from '../services/ClassButton.js';
import Api from "@/services/ApiRest.js";

export default {
  name: 'solicitar-contato',
  // mixins: [classBtn],
  data() {
    return {
      detailColorClass: null,
      // classButton: null,
      formMessage: null,
      formData: [
        {
          nome: null,
          email: null,
          telefone: null,
        },
      ],
    };
  },
  mounted() {
    this.detailColorClass = this.$route.name;
  },
  methods: {
    sendForm(evt) {
      evt.preventDefault();
      Api.sendToCF7(3795, this.formData)
      .then(response => {
        this.formMessage = response.data.message;
        console.log('response =>', response);
      });
    }
  }
};
</script>

<style lang="scss">
  @import '@/assets/scss/contact.scss';
  @import '@/assets/scss/solicitar-contato.scss';
</style>
