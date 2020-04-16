<template>
  <div class="faleConoscoComponent section">
    <div class="title">
      <h2>Fale conosco</h2>
      <span></span>
    </div>
    <div class="sub-title">
      <p id="left">Buscando consultoria de venda spara sua empresa?</p>
      <p id="right"><span>um especialista</span> irá entrar em contato</p>
    </div>
    <form action="">
        <label for="nome">Nome*</label>
        <input type="text" name="nome"  id="">

        <label for="nome">E-mail*</label>
        <input type="text"  name="nome" id="">

        <label for="assunto">Telefone*</label>
        <input type="text"  name="telefone" id="">

        <label for="nome">Empresa*</label>
        <input type="text"  name="nome" id="">

        <label for="nome">Vendedores na equipe*</label>
        <select name="setor"  id="setor">
            <option value="Não Selecionado">Selecionar</option>
            <option value="1-2">1-2</option>
            <option value="3-10">3-10</option>
            <option value="11-15">11-15</option>
            <option value="16-50">16-50</option>
            <option value="51">51+</option>
        </select>

        <label for="assunto">Mensagem</label>
        <textarea name="mensagem"  id="mensagem" cols="90" rows="5"></textarea>

      <p>* Campos obrigatórios</p>
        <button :class="[classButton]" @click.prevent="">
          Enviar mensagem
        </button>
        <!-- <input type="submit" value="Enviar mensagem"> -->
            </form>
  </div>
</template>

<script>
import classBtn from '../services/ClassButton.js';
export default {
  name: 'fale-conosco',
  mixins: [classBtn],
  data() {
    return {
      classButton: null,
    };
  },

};
</script>

<style lang="scss">
@import '@/assets/scss/breakpoint.scss';
@import '@/assets/scss/variables.scss';
.faleConoscoComponent{
    color: white;
    background-color: $baseColor;
    form {
      max-width: 500px;
      margin: 0 auto;
    }
    .fsmall-btn {
      background: linear-gradient(to right, $pink-fsmall 0%, $pink-fsmall 100%);
    }
    .sub-title {
      position: relative;
      width: 100%;
      @include breakpoint(smartphones){
        text-align: center;
        p {
          position: unset !important;
        }
      }
      p {
        position: absolute;
        &#left {
          top: -30px;
          line-height: 1;
          font-size: 13px;
          left: 0;
        }
        &#right {
          top: -65px;
          line-height: 1;
          right: 0;
          text-transform: uppercase;
          color: $golden;
          span {
            font-weight: 700;
          }
        }
      }
    }
    a{
        text-align: center;
        margin: 0 auto;
    }

    &::before{
        display: block;
        position: absolute;
        content: "";
        background-image: url("../assets/svg/cases-vetor-right.svg");
        height: 860px;
        width: 140px;
        left: 0;
        top: 0px;
        z-index: 0;
        transform: rotate(180deg);

        @include breakpoint(tablets){
            display: none;
        }
    }

    &::after{
        display: block;
        position: absolute;
        content: "";
        background-image: url("../assets/svg/cases-vetor-right.svg");
        height: 800px;
        width: 140px;
        right: 0;
        top: 300px;
        z-index: 0;
        transform: rotate(180deg);
        background-position-x: 140px;

        @include breakpoint(tablets){
            display: none;
        }
    }
}
</style>
