<template>
  <div class="spotlight spothome">
    <carousel :responsive="carrossel" v-if="data.length > 0">
      <div class="item" v-for="(banner, index) in data" :key="index">
        <a :href="banner.acf.link.url" :target="banner.acf.link.target">
          <img v-if="isMobile && banner.acf.imagem_mobile" 
          :src="banner.acf.imagem_mobile.sizes.large" :alt="banner.acf.imagem_mobile.alt">
          <img v-else :src="banner.acf.imagem.sizes.large" :alt="banner.acf.imagem.alt">
        </a>
      </div>
      <div class="item">
        <slot></slot>
      </div>
    </carousel>
    <div class="item" v-else>
      <slot></slot>
    </div>
  </div>
</template>

<script>
import carousel from 'vue-owl-carousel'
export default {
  name: 'SliderHome',
  components: { carousel },
  props: {
    data: Object
  },
  data () {
    return {
      carrossel: {
        0: {
          items: 1,
          dots: false,
          loop: true,
          center: true,
          mouseDrag: true,
          autoplay: true,
          autoplayTimeout: 5000,
          navText: ['',''],
        }
      }
    }
  },
  computed:{
    isMobile(){
      return window.innerWidth < 992
    }
  }
}
</script>

<style lang="scss">
  @import '@/assets/scss/spotlight.scss';
</style>
