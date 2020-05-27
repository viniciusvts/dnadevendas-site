<template>
  <section class="cases section">
    <div class="title">
      <h2>Cases de sucesso</h2>
      <span></span>
    </div>
    <card-case :dataCase="transferData" :position="position" :key="componentKey"></card-case>


    <div id="logos-field">
      <p>Veja outros cases</p>
      <ul id="logos-clientes">
        <li
        v-for="item in cases.case_fsmall" 
        :key="item.logo.url"
        class="list-item"
        @click.prevent="setActive"><img
        class="list-clientes"
        :src="item.logo.url" :alt="item.titulo"></li>
      </ul>
      <!-- <button class="fsmall-btn" id="veja-mais">Veja Mais cases</button> -->
    </div>
  </section>
</template>

<script>
import cardCase from './CaseCard.vue';
import Api from '@/services/ApiRest.js';

export default {
  name: 'cases-sec',
  components: {
    'card-case': cardCase,
  },
  data() {
    return {
      pageID: '2586',
      cases: [],
      position: 1,
      transferData: null,
      componentKey: 1,
      masterKey: 0,
      classButton: null,
      casesFSmall: null,
    };
  },
  mounted() {
    this.getCases();
    // const ctx = this;
  },
  watch: {
    position(val) {
      this.transferData = this.cases.case_fsmall[val];
      this.componentKey = val;
    },
  },
  methods: {
    getCases() {
      const ctx = this;
      Api.getPostsAcfData(this.pageID, 'case_fsmall')
        .then(r => r.json())
        .then(r => {
          ctx.cases = r;
          this.setActive();
          setTimeout(() => {
            this.position = 0;
            this.componentKey = this.position;
            const list = document.getElementsByClassName('list-item')
            list[0].children[0].click();
            for (let i = 0; i < list.length; i++) {
                list[i].classList.add('square')
                list[list.length - 1].classList.remove('square')
              if(this.$route.name == 'ForSmall') {
                list[i].classList.add('square-pink')
                list[list.length - 1].classList.remove('square-pink')
              }
            }
            const listA = document.getElementsByClassName('list-clientes');
            for(let i = 0; i < listA.length; i++) {
              listA[i].setAttribute('pos', i);
              const positionList = listA[i].getAttribute('pos');
              if(positionList == this.componentKey) {
                listA[i].setAttribute('style', 'filter: grayscale(0);');
              }
            }
          }, 500);
      })
    },
    setActive() {
      const ctx = this;
      const list = document.getElementsByClassName('list-clientes');
      for(let i = 0; i < list.length; i++) {
        list[i].setAttribute('pos', i);
        list[i].addEventListener('click', (el) => {
          const positionTarget = el.target.getAttribute('pos');
          ctx.position = parseInt(positionTarget);
          list[i].setAttribute('style', 'filter: grayscale(0);');
          for (let j = 0; j < list.length; j++) {
            if(list[j].getAttribute('pos') != ctx.componentKey) {
              list[j].removeAttribute('style');
            }
          }
        })
      }
    },
  },
};
</script>

<style lang="scss">
  @import '@/assets/scss/cardCases.scss';
</style>
