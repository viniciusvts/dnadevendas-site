<template>
    <div class="differential section" v-if="diferentials">
        <div class="title">
            <h2>Diferenciais</h2>
            <span></span>
        </div>  
        <div class="container">
            <div class="row">
                <div class="col-md-4" v-for="(diferenciais, index) in diferentials.diferenciais.slice(0,6)" :key="index">
                    <img :src="diferenciais.icone.sizes.thumbnail" :alt="diferenciais.titulo">
                    <h3>{{diferenciais.titulo}}</h3>
                    <p>{{diferenciais.texto}}</p>                
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
            diferentials: null
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
        }
    }
}
</script>

<style lang="scss">
    @import '@/assets/scss/mixins.scss';
    @import '@/assets/scss/differential.scss';
</style>