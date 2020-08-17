<template>
  <div :class="{'talkDefault':isImpar}" class="cardSlider">
    <div class="container-fluid">
      <div class="row align-items-center" :class="{'flex-row-reverse':isImpar}">

        <div class="col-12 col-lg-6">
          <div class="slider" :class="'i-'+index">
            <div v-for="(img, index) in objection.imagem" :key="index" class="slides" :class="{'active':index==0}">
              <img class="lazy img-slider" src="@/assets/loading.gif"
              :data-src="img.sizes.large" :alt="objection.objecao">
            </div>
          </div>
          <SliderPagination @pageEvent="changePage"
          :totalPages="objection.imagem.length" 
          class="w-bp ml-auto mr-auto"/>
        </div>
        <div class="col-12 col-lg-6 mt-5 mt-lg-0">
          <div class="right">
            <div class="title">
              <h2>{{objection.objecao}}</h2>
            </div>
            <div class="text destaq-text" v-html="objection.texto"></div>
            <router-link :to="{name: 'Contact'}">
              <button> Solicite uma proposta </button>
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SliderPagination from "@/components/SliderPagination.vue"; 

export default {
  name: 'card-slider',
  components:{SliderPagination},
  props: {
    objection: Object,
    index: Number
  },
  methods: {
    changePage(data){
      const selector = '.slider.i-' + this.index + " .slides";
      let allSlides = document.querySelectorAll(selector);
      // remove active de todos
      for (const slide of allSlides) {
        slide.classList.remove('active');
      }
      allSlides[data.page].classList.add('active');
    }
  },
  computed: {
    isImpar(){
      if(this.index % 2) return true;
      return false;
    }
  }
};
</script>

<style lang="scss">
  @import '@/assets/scss/cardSlider.scss';
</style>
