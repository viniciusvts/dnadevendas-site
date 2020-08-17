<template>
  <div class="spotlight">
    <slot></slot>
  </div>
</template>

<script>
  export default {
    name: 'Spotlight',
  }
</script>

<style lang="scss">
  @import '@/assets/scss/spotlight.scss';
</style>
