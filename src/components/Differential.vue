<template>
    <div class="differential section" v-if="diferentials">
        <div class="title">
            <h2>Diferenciais</h2>
            <span></span>
        </div>  
        <div class="container container-fhd">
            <div class="row">
                <div class="col-sm-12 col-md-4" v-for="(diferenciais, index) in diferentials.diferenciais.slice(0,6)" :key="index">
                    <div class="row blue-box" @click="changeDestaq(diferenciais)">
                        <img :src="diferenciais.icone.sizes.thumbnail" :alt="diferenciais.titulo">
                        <h3>{{diferenciais.titulo}}</h3>
                    </div>
                </div>                
            </div>
            <div class="row destaq" v-if="diferentialsdestaq.title">
                <div class="col-sm-12 col-md-4">
                    <h2>{{diferentialsdestaq.title}}</h2>
                </div>
                <div class="col-sm-12 col-md-8 destaq-text">
                    <p>{{diferentialsdestaq.text}}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Differential',
    data(){
        return {
            pageID: 37,
            diferentials: [],
            diferentialsdestaq: {
                title: null,
                text: null
            }
        }
    },
    created(){
        this.getDiferentials();
    },
    methods:{
        getDiferentials(){
            fetch(`https://www.dnadevendas.com.br/wp-json/acf/v3/pages/${this.pageID}/diferenciais`)
            .then(r => r.json())
            .then(r => {
            this.diferentials = r;
            });
        },
        changeDestaq(diferenciais) {
            this.diferentialsdestaq.title = diferenciais.titulo;
            this.diferentialsdestaq.text = diferenciais.texto;
        }
    }
}
</script>

<style lang="scss">
    @import '@/assets/scss/mixins.scss';
    @import '@/assets/scss/differential.scss';
</style>