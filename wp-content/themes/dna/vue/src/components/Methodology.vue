<template>
    <div class="methodology section" v-if="methodologys">        
        <div class="title">
            <h2>Metodologia</h2>
            <span></span>
        </div>  

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg col-md col-sm-12 col-tb-12" v-for="(methodology, index) in methodologys.acf.metodologia.slice(0, 5)" :key="index">
                    <span>{{index + 1}}</span>
                    <h3 v-html="methodology.titulo"></h3>
                    
                    <ul>
                        <li v-for="(text, index) in methodology.textos" :key="index">{{text.texto}}</li>
                    </ul>
                </div>
            </div> 
        </div>

        <!-- <h4>Vamos conversar como como aumentar suas vendas? </h4>
        <router-link to="/contato">
            <button>Falar com um consultor</button>
        </router-link> -->
    </div>
</template>

<script>
export default {
    name: 'Clients',
    data(){
        return {
            pageID: 37,
            methodologys: null
        }
    },
    created(){
        this.getMethodology();
    },
    methods:{
        getMethodology(){
            this.$http.getPostsAcfData(this.pageID)
            .then(r => r.json())
            .then(r => {
            this.methodologys = r;
            });
        }
    }
}
</script>

<style lang="scss">
    @import '@/assets/scss/variables.scss';
    @import '@/assets/scss/mixins.scss';
    @import '@/assets/scss/breakpoint.scss';
    @import '@/assets/scss/methodology.scss';
</style>