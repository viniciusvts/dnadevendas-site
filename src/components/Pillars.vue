<template>
    <section class="pillars">
        <slot></slot>
    </section>
</template>

<script>
  export default {
    name: 'Pillars',
  }
</script>

<style lang="scss">
    @import '@/assets/scss/mixins.scss';
    @import '@/assets/scss/variables.scss';
    @import '@/assets/scss/breakpoint.scss';
    @import '@/assets/scss/pillars.scss';
</style>
