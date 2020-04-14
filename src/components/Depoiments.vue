<template>
    <div class="depoiments section" v-if="depoiments">
        <div class="title">
            <h2>Depoimentos</h2>
            <span></span>
        </div>  

        <div class="container">
            <div class="row">
                <div class="col-md-4" v-for="(depoiment, index) in depoiments.acf.depoimentos" :key="index">
                    <div class="box" v-if="index <= 2">
                        <div class="top">
                            <p>{{depoiment.mensagem}}</p>
                        </div>
                        <div class="bottom">
                            <img :src="depoiment.foto" alt="">
                            <h3>{{depoiment.nome}}</h3>
                            <h4>{{depoiment.cargo}}</h4>
                            <h5>{{depoiment.empresa}}</h5>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</template>

<script>
export default {
    name: 'Depoiments',
    data(){
        return {
            pageID: 37,
            depoiments: null
        }
    },
    created(){
        this.getDepoiments();
    },
    methods:{
        getDepoiments(){
            fetch(`https://www.dnadevendas.com.br/wp-json/acf/v3/pages/${this.pageID}`)
            .then(r => r.json())
            .then(r => {
            this.depoiments = r;
            });
        }
    }
}
</script>

<style lang="scss">
    @import '@/assets/scss/variables.scss';
    @import '@/assets/scss/mixins.scss';
    @import '@/assets/scss/depoiments.scss';
</style>