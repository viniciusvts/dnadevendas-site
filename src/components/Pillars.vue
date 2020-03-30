<template>
    <div class="pillars section">
        <div class="columns">
            <div class="column">
                <h3>Melhoramos expressivamente os <b>resultados da sua empresa</b> através do alinhamento de:</h3>
            </div>

            <div class="column">
                <img src="@/assets/svg/big-arrow.svg" alt="">
            </div>

            <div class="column pillar">
                <img src="@/assets/svg/process.svg" alt="Processo">
                <p>Processos</p>
            </div>

            <div class="column pillar">
                <img src="@/assets/svg/management.svg" alt="Gestão">
                <p>Gestão</p>
            </div>

            <div class="column pillar">
                <img src="@/assets/svg/tecnology.svg" alt="Tecnologia">
                <p>Tecnologia</p>
            </div>

            <div class="column">
                <img src="@/assets/svg/people.svg" alt="Pessoas">
                <p>Pessoas</p>                
            </div>
        </div>
        <hr>
    </div>
</template>

<script>
  export default {
    name: 'Pillars',
  }
</script>

<style lang="scss">
    @import '@/assets/scss/mixins.scss';
    @import '@/assets/scss/pillars.scss';
</style>
