<template>
    <div class="card-case row">
      <div class="col-sm-12 col-md-9 img-field">
        <img class="img-notebook" src="../assets/img-notebook-alpha.png" alt="bg">
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
  .content-client {
    position: relative;
    .infos {
      position: absolute;
      top: 180px;
      left: -150px;
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
