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
        v-for="item in cases.case" 
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
      componentKey: 0,
      masterKey: 0,
      classButton: null,
    };
  },
  mounted() {
    this.getCases();
    // const ctx = this;
    setTimeout(() => {
      if(this.transferData == null) {
        this.transferData = this.cases.case[1];
        this.componentKey = 1;
      }
      const list = document.getElementsByClassName('list-item')
      for (let i = 0; i < list.length; i++) {
        list[i].classList.add('square')
        list[list.length - 1].classList.remove('square')
      }
    }, 200);
  },
  watch: {
    position(val) {
      this.transferData = this.cases.case[val];
      this.componentKey = val;
    },
  },
  methods: {
    getCases() {
      const ctx = this;
      fetch(`https://www.dnadevendas.com.br/wp-json/acf/v3/pages/${ctx.pageID}/case`)
        .then(r => r.json())
        .then(r => {
          ctx.cases = r;
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
        })
        // setTimeout(() => {
        //   list[list.length - 1].click();
        // }, 500);
      }
    },
  },
};
</script>

<style lang="scss">
  @import '@/assets/scss/variables.scss';
  @import '@/assets/scss/breakpoint.scss';
  .iframe {
    iframe {
      position: absolute;
      left: -40px;
      height: 443px;
      width: 708px;
      top: 75px;
      @include breakpoint(smartphones) {
        position: unset;
        height: 240px;
        width: 100%;
      }
      @include breakpoint(fullHdDesktops) {
        left: 77px;
        height: 553px;
        width: 881px;
        top: 93px;
      }
      @include breakpoint(largeDesktops-1280) {
        left: -64px;
      }
    }
  }
  #veja-mais {
    position: relative;
    top: -20px;
    @include breakpoint(smartphones) {
      top: 0;
    }
  }
  .square {
    &::after {
      content: '';
      width: 8px;
      height: 8px;
      background-color: $golden-dark;
      position: absolute;
      z-index: 1;
      right: -50px;
      bottom: 15px;
      transform: rotate(45deg);
      @include breakpoint(smartphones) {
        display: none;
      }
      @include breakpoint(fullHdDesktops) {
        bottom: 40px;
        height: 15px;
        width: 15px;
      }
    }
  }
  #logos-field {
    margin-top: 220px;
    text-align: center;
    font-weight: 700;
    @include breakpoint(smartphones) {
      margin: 0;
      margin-top: 20px;
    }
    @include breakpoint(fullHdDesktops) {
      margin-top: 370px;
      p {
        font-size: 40px;
      }
    }
  }
  .list-item {
    position: relative;
    margin-right: 100px;
    cursor: pointer;
    @include breakpoint(smartphones) {
      margin-right: 0;
      img {
        width: 100%;
        display: unset;
        height: unset;
      }
    }
    img {
      transition-duration: .5s;
      transform: scale(1);
      width: 100px;
      height: 50px;
      @include breakpoint(fullHdDesktops) {
        width: 160px;
        height: auto;
        margin-top: 30px;
      }
      &:hover {
        transform: scale(1.1);
        transition-duration: .5s;
      }
    }
  }
  #logos-clientes {
    display: inline-flex;
    @include breakpoint(smartphones) {
      display: block;
    }
  }
  .card-case {
    position: relative;
    margin-bottom: 100px;
    min-height: 435px;
    @include breakpoint(smartphones) {
      margin-bottom: unset;
      min-height: unset;
    }
    h2 {
      color: $golden-dark;
    }
    .img-notebook {
      position: absolute;
      width: auto;
      height: 650px;
      object-fit: cover;
      left: -135px;
      @include breakpoint(smartphones) {
        display: none;
      }
      @include breakpoint(fullHdDesktops) {
        height: 810px;
      }
    }
  }
  svg {
    fill: black !important;
  }
  .cases {
    background-color: white;
    .title {
      h2 {
        color: black;
      }
    }
  }
</style>
