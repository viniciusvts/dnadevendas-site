<template>
    <div class="depoiments section" v-if="depoiments">
        <div class="title">
            <h2>Sentimento <br> dos clientes</h2>
            <span></span>
        </div>  
        <div class="line-deps"></div>
        <div class="line-center"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-4 col-tb-12 card-depoiments" v-for="(depoiment, index) in depoiments.depoimentos.slice(0, 3)" :key="index">
                    <div class="box">
                        <div :class="['top', thisColor]">
                            <p>{{depoiment.mensagem}}</p>
                        </div>
                        <div :class="['bottom', thisColor + '-bottom']">
                            <img class="lazy" :data-src="depoiment.foto" alt="">
                            <h3>{{depoiment.nome}}</h3>
                            <h4>{{depoiment.cargo}}</h4>
                            <h5 :class="thisColor">{{depoiment.empresa}}</h5>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="line-deps bottom"></div>
    </div>
</template>

<script>
export default {
    name: 'Depoiments',
    props: ['color'],
    data(){
        return {
            pageID: 37,
            depoiments: null,
            thisColor: this.color,
        }
    },
    created(){
        this.getDepoiments();
    },
    methods:{
        getDepoiments(){
            this.$http.getPostsAcfData(this.pageID, 'depoimentos')
            .then(r => r.json())
            .then(r => {
            this.depoiments = r;
            });
        }
    }
}
</script>

<style lang="scss">
    @import '@/assets/scss/depoiments.scss';
    @import '@/assets/scss/variables.scss';
    .depoiments {
        background-color: white;
        h2 {
            color: $baseColor;
        }
        h5 {
            color: $pink-fsmall !important;
        }
    }
</style>