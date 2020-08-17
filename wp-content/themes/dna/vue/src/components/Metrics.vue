<template>
  <section class="metrics">
    <div class="container-fluid">
        <div class="row align-items-start">
          <slot></slot>
        </div>
    </div>
  </section>
</template>

<script>
export default {
    name: "Metrics"
}
</script>

<style lang="scss">
    @import "@/assets/scss/metrics.scss";
</style>