<template>
    <div class="clientsComponent section">
        <div class="title">
            <h2>Clientes</h2>
            <span></span>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img class="lazy" src="@/assets/loading.gif" data-src="https://www.dnadevendas.com.br/wp-content/uploads/main-cliente-chevrolet.svg" alt="">
                </div>
                <div class="col-md-3">
                    <img class="lazy" src="@/assets/loading.gif" data-src="https://www.dnadevendas.com.br/wp-content/uploads/main-cliente-carrefour.svg" alt="">
                </div>
                <div class="col-md-3">
                    <img class="lazy" src="@/assets/loading.gif" data-src="https://www.dnadevendas.com.br/wp-content/uploads/main-cliente-nestle.svg" alt="">
                </div>
                <div class="col-md-3">
                    <img class="lazy" src="@/assets/loading.gif" data-src="https://www.dnadevendas.com.br/wp-content/uploads/main-cliente-wickbold.svg" alt="">
                </div>

                <div class="col-md-3">
                    <img class="lazy" src="@/assets/loading.gif" data-src="https://www.dnadevendas.com.br/wp-content/uploads/main-cliente-even.svg" alt="">
                </div>
                <div class="col-md-3">
                    <img class="lazy" src="@/assets/loading.gif" data-src="https://www.dnadevendas.com.br/wp-content/uploads/main-cliente-portoseguro.svg" alt="">
                </div>
                <div class="col-md-3">
                    <img class="lazy" src="@/assets/loading.gif" data-src="https://www.dnadevendas.com.br/wp-content/uploads/main-cliente-petz-1.svg" alt="">
                </div>
                <div class="col-md-3">
                    <img class="lazy" src="@/assets/loading.gif" data-src="https://www.dnadevendas.com.br/wp-content/uploads/mrv-engenharia.svg" alt="">
                </div>
            </div>
        </div>
              
        <p class="count">300</p>
        <p><button>Ver todos os clientes</button></p>        

    </div>
</template>

<script>
    export default {
        name: 'Clients'
    }
</script>

<style lang="scss">
    @import '@/assets/scss/mixins.scss';
    @import '@/assets/scss/clients.scss';
</style>