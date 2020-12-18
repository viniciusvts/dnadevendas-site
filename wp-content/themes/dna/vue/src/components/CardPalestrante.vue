<template>
  <div class="row align-items-center">
    <div class="col-12 col-lg-6 col-sm-12">
      <div class="row video">
        <div class="col-12">
          <div class="iframe-palestrante" v-if="dataCase.video" v-html="dataCase.video">
          </div>
          <img class="iframe-palestrante" v-else-if="dataCase.imagem" :src="dataCase.imagem.sizes.large" :alt="dataCase.imagem.alt" />
        </div>
        <!-- <div class="col-12">
          <Pagination/>
        </div> -->
      </div>
    </div>
    <div class="col-12 col-lg-6 col-sm-12">
      <div class="row align-items-center right">
        <div class="col-12 bio">
          <h3>{{dataCase.nome_palestrante}}</h3>
          <p v-html="dataCase.bio"></p>
        </div>
      </div>
    </div>
    <div class="col-sm-12 portfolio px-0">
      <div class="row align-items-center">
        <div class="col-auto">
          <h4>Empresas que palestrou</h4>
        </div>
        <div class="col">
          <hr id="hr-golden">
        </div>
      </div>
      <div class="empresas" v-if="dataCase.onde_palestrou.length > 0">
        <carousel :responsive="carrossel">
          <div class="item" v-for="(empresa, index) in dataCase.onde_palestrou" :key="index">
            <img :src="empresa.sizes.medium" :alt="empresa.alt">
          </div>
        </carousel>
      </div>
    </div>
  </div>
</template>

<script>
import carousel from 'vue-owl-carousel'
export default {
  name: 'card-palestrante',
  components: { carousel },
  props: {
    dataCase: Object,
  },
  data () {
    return {
      carrossel: {
        0: {
          items: 1,
          dots: false,
          center: false,
          mouseDrag: true,
          autoplay: true,
          autoplayTimeout: 5000,
          navText: [
            '<div class="control"></div>',
            '<div class="control"></div>'
          ],
        },
        600: {
          items: 3,
          dots: false,
          center: false,
          mouseDrag: true,
          autoplay: true,
          autoplayTimeout: 5000,
          navText: [
            '<div class="control"></div>',
            '<div class="control"></div>'
          ],
        },
        900: {
          items: 5,
          dots: false,
          center: false,
          mouseDrag: true,
          autoplay: true,
          autoplayTimeout: 5000,
          navText: [
            '<div class="control"></div>',
            '<div class="control"></div>'
          ],
        },
      }
    }
  },
}
</script>

<style lang="scss">
@import '@/assets/scss/variables.scss';
@import '@/assets/scss/breakpoint.scss';
</style>
