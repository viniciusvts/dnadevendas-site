<template>
    <div class="card-case row">
      <div class="col-tb-12 col-sm-12 col-md-9 img-field out-l">
        <img class="img-notebook" src="../assets/img-notebook-alpha.png" alt="bg">
        <!-- <div class="overlay-video"></div> -->
        <div class="iframe" v-html="obj.video"></div>
      </div>
      <div class="col-sm-12 col-tb-12 col-md-3 content-client out-r">
        <div class="infos">
          <p class="centered-12">
            <img :src="obj.logo.url" alt="Logo empresa"/>
          </p>
          <h2 :class="[pink]">
            {{ obj.titulo }}
          </h2>
          <p v-html="obj.texto"></p>
        </div>
    </div>
  </div>
</template>
<script>
import TextPink from '../services/TextPink';
export default {
  name: 'card-case',
  props: ['dataCase', 'position'],
  mixins: [TextPink],
  data() {
    return {
      obj: this.dataCase,
      dataPos: this.position,
      pink: null,
    };
  },
  mounted() {
    this.elementScroll();
  },
  methods: {
    elementScroll() {
      const img = document.getElementsByClassName('img-field');
      const content = document.getElementsByClassName('content-client');
      window.addEventListener('scroll', () => {
        if(window.scrollY > 3000) {
          img[0].classList.remove('out-l');
          content[0].classList.remove('out-r');
        } else {
          img[0].classList.add('out-l');
          content[0].classList.add('out-r');
        }
      })
    },
  },
};
</script>

<style lang="scss">
  @import '@/assets/scss/variables.scss';
  @import '@/assets/scss/breakpoint.scss';
  @import '@/assets/scss/cardCases.scss';
</style>
