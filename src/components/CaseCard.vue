<template>
    <div class="card-case row">
      <div class="col-sm-12 col-md-9 img-field">
        <img class="img-notebook" src="../assets/img-notebook-alpha.png" alt="bg">
        <!-- <div class="overlay-video"></div> -->
        <div class="iframe" v-html="obj.video"></div>
      </div>
      <div class="col-sm-12 col-md-3 content-client">
        <div class="infos">
          <img :src="obj.logo.url" alt="Logo empresa"/>
          <h2>
            {{ obj.titulo }}
          </h2>
          <p v-html="obj.texto"></p>
        </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'card-case',
  props: ['dataCase', 'position'],
  data() {
    return {
      obj: this.dataCase,
      dataPos: this.position,
    };
  },
};
</script>

<style lang="scss">
  @import '@/assets/scss/variables.scss';
  @import '@/assets/scss/breakpoint.scss';
  .overlay-video {
    position: absolute;
    left: -40px;
    height: 443px;
    width: 708px;
    top: 75px;
    z-index: 2;
    background-color: black;
  }
  .content-client {
    position: relative;
    .infos {
      position: absolute;
      top: 180px;
      left: -150px;
      @include breakpoint(smartphones) {
        position: unset;
      }
      img {
        margin: 10px 0;
      }
      h2 {
        margin: 10px 0;
      }
      p {
        font-size: 14px;
      }
    }
  }
</style>
