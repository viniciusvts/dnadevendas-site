<template>
    <section class="services">
        <div class="title">
            <h2>Serviços</h2>
            <span></span>
        </div>  
        <div class="container-fluid">
            <div class="row">
                <slot></slot>
            </div>
        </div>
    </section>
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
