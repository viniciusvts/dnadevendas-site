<template>
    <div class="card-case row align-items-center">
      <div class="col-md-7">
        <div class="mockup">
          <img class="img-notebook" src="../assets/img-notebook-alpha.png" alt="bg">
          <!-- <div class="overlay-video"></div> -->
          <div class="iframe" v-html="obj.video"></div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="infos">
          <img class="lazy" :data-src="obj.logo.url" :alt="obj.titulo"/>
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
    // this.elementScroll();
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
