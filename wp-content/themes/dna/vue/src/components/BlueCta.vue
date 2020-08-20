<template>
  <div class="cta-section">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-12">
          <h2 v-html="title"></h2>
          <button>
            <a :href="button.url" :target="button.target" v-html="button.title"></a>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'blue-cta',
  props: {
    title: String,
    button: Object
  }
};
</script>

<style lang="scss">
@import "@/assets/scss/blue-cta.scss";
</style>
