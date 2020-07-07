<template>
  <section class="contact s-contato">
    <h2 class="fale-conosco" :class="detailColorClass">Entenda hoje como podemos fazer sua empresa <span :class="detailColorClass">crescer mais</span></h2>
    <form name="dna_contato" action="#" v-on:submit.prevent="sendForm">
      <div class="row">
        <div class="col-md-12">
          <input type="text" name="name" id="name" 
        :class="detailColorClass" v-model="formData.name" placeholder="Seu nome" required>
        </div>

        <div class="col-md-6">
          <input type="text" name="email" id="email" 
          :class="detailColorClass" v-model="formData.email" placeholder="Seu e-mail" required>
        </div>

        <div class="col-md-6">
          <input type="text" name="mobile_phone" id="mobile_phone" v-on:keyup="execMascara" 
          :class="detailColorClass" v-model="formData.mobile_phone" placeholder="Seu telefone" required>
        </div>

        <div class="col-md-6">
          <input type="text" name="company_name" id="company_name" 
        :class="detailColorClass" v-model="formData.company_name" placeholder="Sua Empresa" required>
        </div>
        
        <div class="col-md-6">
          <select type="text" name="qtdfunc" id="qtdfunc" 
          :class="detailColorClass" v-model="formData.qtdfunc" required>
            <option value="">N° Funcionários</option>
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
      formData: {
          name: '',
          email: '',
          mobile_phone: '',
          company_name: '',
          qtdfunc: '',
      },
    };
  },
  mounted() {
    this.detailColorClass = this.$route.name;
  },
  methods: {
    sendForm () {
      Api.sendToRD('dna_contato', this.formData)
      .then(res => {
        if (res.status ==200) {
          // redireciona aqui
        } else {
          this.formMessage = 'Houve um erro ao enviar, tente novamente mais tarde';
        }
      });
    },
    execMascara (evt) {
      let v = evt.target.value;
      v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
      v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
      v=v.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca - depois dos 4 digitos após ()
      evt.target.value = v;
    }
  }
};
</script>

<style lang="scss">
  @import '@/assets/scss/contact.scss';
  @import '@/assets/scss/solicitar-contato.scss';
</style>
