<template>
  <section class="metrics">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-md-3">
                <img src="@/assets/svg/male-user.svg" alt="">
                <span>100 mil</span>
                <h3>Vendedores impactados</h3>
            </div>

            <div class="col-md-3">
                <img src="@/assets/svg/placeholder.svg" alt="">
                <span>150</span>
                <h3>Cidades <br> Visitadas</h3>
            </div>

            <div class="col-md-3">
                <img src="@/assets/svg/venn-diagram.svg" alt="">
                <span>35</span>
                <h3>Segmentos de mercado atingidos</h3>
            </div>

            <div class="col-md-3">
                <img src="@/assets/svg/trophy.svg" alt="">
                <span>9,7</span>
                <h3>Média de satisfação dos participantes</h3>
            </div>
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