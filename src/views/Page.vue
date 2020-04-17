<template>
    <section class="page" style="background: white" v-if="pageContent">
        <div class="container">
            <h1 >{{pageContent[0].title.rendered}}</h1>
            <div class="row" v-if="pageContent[0].acf.conteudo">
                <div class="col-12" v-html="pageContent[0].acf.conteudo">
                </div>
            </div>
            <p class="error" v-else>Esta página não tem conteúdo</p>
        </div>
    </section>
</template>

<script>
    export default {
        name: "Page",
        data(){
            return {
                pageContent: null,
                slug: this.$route.params.slug
            }
        },
        mounted(){
            this.getPage()
        },
        methods:{
            getPage(){
                fetch(`https://www.dnadevendas.com.br/wp-json/wp/v2/pages/?slug=${this.slug}`)
                .then(r => r.json())
                .then(r => {
                this.pageContent = r;
                document.title = `DNA de Vendas | ${this.pageContent[0].title.rendered}`;
                });
            }
        }
    }
</script>

<style lang="scss">
    @import "@/assets/scss/page.scss"
</style>