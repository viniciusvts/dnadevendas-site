<template>
    <section class="materials mt-5">

        <div class="container">
                    <h1>Materiais</h1>
        <p>Aqui você encontrará vídeos, palestras, apresentações e
outros materiais gratuitos sobre vendas. Baixe à vontade!</p>

            <div class="row">
                <div class="col-md-4">
                    <router-link to="/">
                        <div class="card">
                            <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="left">
                                <img src="https://www.dnadevendas.com.br/wp-content/uploads/consultoria-online-de-vendas.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="right">
                                <h2>Consultoria online de vendas: vantagens para pequenas e médias empresas</h2>
                                </div>
                            </div>
                            </div>
                        </div>
                    </router-link>
                </div>
                <div class="col-md-4">
                    <router-link to="/">
                        <div class="card">
                            <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="left">
                                <img src="https://www.dnadevendas.com.br/wp-content/uploads/consultoria-online-de-vendas.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="right">
                                <h2>Consultoria online de vendas: vantagens para pequenas e médias empresas</h2>
                                </div>
                            </div>
                            </div>
                        </div>
                    </router-link>
                </div>
                <div class="col-md-4">
                    <router-link to="/">
                        <div class="card">
                            <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="left">
                                <img src="https://www.dnadevendas.com.br/wp-content/uploads/consultoria-online-de-vendas.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="right">
                                <h2>Consultoria online de vendas: vantagens para pequenas e médias empresas</h2>
                                </div>
                            </div>
                            </div>
                        </div>
                    </router-link>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "Materials"
}
</script>

<style lang="scss">
    @import '@/assets/scss/materials.scss';
</style>