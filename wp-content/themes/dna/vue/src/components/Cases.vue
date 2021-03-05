<template>
    <div class="cases section">
        <div class="top">
            <div class="title">
                <h2>Cases de sucesso</h2>
                <span></span>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="video">
                        <iframe src="https://www.youtube.com/embed/HDgjlOPDFsk" frameborder="0" width="100%"></iframe>
                    </div>
                </div>

                <div class="col-md-5">
                    <img src="@/assets/mrv-logo.png" alt="">
                    <h3>AUMENTAMOS EM <b>30%</b> O FATURAMENTO</h3>
                    <p>Atuamos com uma abordagem sistêmica para a correção dos fatores operacionais que impactam na produtividade de vendas. Implantamos uma metodologia de vendas integrada ao processo, estratégia e sistemas de gestão da empresa colocar </p>
                    <button>Saiba mais</button>
                </div>
            </div>
        </div>

        <div class="bottom">
            <h4>Veja outros cases</h4>
            <div class="row justify-content-start">
                <div class="col-2">
                    <img class="lazy" :data-src="$http.baseURL + 'wp-content/uploads/mrv-logo-novo-500x313.png'" alt="">
                </div>
                <div class="col-2">
                    <img class="lazy" :data-src="$http.baseURL + 'wp-content/uploads/mrv-logo-novo-500x313.png'" alt="">
                </div>
                <div class="col-2">
                    <img class="lazy" :data-src="$http.baseURL + 'wp-content/uploads/mrv-logo-novo-500x313.png'" alt="">
                </div>
                <div class="col-auto">
                    <button>ver todos os cases</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'Cases',
  }
</script>

<style lang="scss">
    @import '@/assets/scss/variables.scss';
    @import '@/assets/scss/mixins.scss';
    @import '@/assets/scss/cases.scss';
</style>
