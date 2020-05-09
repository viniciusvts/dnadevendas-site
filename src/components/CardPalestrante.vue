<template>
  <div class="row align-items-center">
    <div class="col-12 col-lg-6 col-sm-12">
      <div class="row video">
        <div class="col-12">
          <div class="iframe" v-html="obj.video">
          </div>
        </div>
        <!-- <div class="col-12">
          <Pagination/>
        </div> -->
      </div>
    </div>
    <div class="col-12 col-lg-6 col-sm-12">
      <div class="row align-items-center right">
        <div class="col-12 bio">
          <h3>{{obj.nome_palestrante}}</h3>
          <h4>{{obj.cargo}}</h4>
          <p>{{obj.bio}}</p>
        </div>
      </div>
    </div>
    <div class="col-12 portfolio">
      <div class="row align-items-center">
        <div class="col-auto">
          <h4>Empresas que palestrou</h4>
        </div>
        <div class="col">
          <hr id="hr-golden">
        </div>
      </div>
      <div class="empresas">
        <ul>
          <li v-for="(empresa, index) in obj.onde_palestrou.slice(0,6)" :key="index">
            <img class="lazy" src="@/assets/loading.gif"  :data-src="empresa.sizes.medium" :alt="empresa.name">
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'card-palestrante',
  props: ['dataCase',],
  data() {
    return {
      obj: this.dataCase,
      dataPos: this.position,
    };
  },
}
</script>

<style lang="scss">
@import '@/assets/scss/variables.scss';
@import '@/assets/scss/breakpoint.scss';
  .empresas {
    max-width: 100vw;
    // overflow-x: scroll;
    ul {
      display: inline-flex;
      @include breakpoint(smartphones) {
        display: block;
      }
      img {
        width: 200px;
        height: 100px;
        margin: auto;
      }
    }
  }
  .portfolio {
    h4 {
      font-size: 26px;
      font-weight: 100;
    }
  }
</style>
