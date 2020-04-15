<template>
    <div class="services section">
        <div class="title">
            <h2>Serviços</h2>
            <span></span>
        </div>  
        <div class="columns">
            <slot></slot>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'Services',
  }
</script>

<style lang="scss">
    @import '@/assets/scss/mixins.scss';
    @import '@/assets/scss/variables.scss';
    @import '@/assets/scss/breakpoint.scss';
    @import '@/assets/scss/services.scss';
</style>
