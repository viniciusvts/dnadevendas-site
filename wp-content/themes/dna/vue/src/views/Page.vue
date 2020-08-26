<template>
    <section class="page" style="background: white">

        <div v-if="pageContent" class="container">
            <h1 >{{pageContent[0].title.rendered}}</h1>
            <div class="row" v-if="pageContent[0].acf.conteudo">
                <div class="col-12" v-html="pageContent[0].acf.conteudo">
                </div>
            </div>
            <div class="row" v-else-if="pageContent[0].content.rendered">
                <div class="col-12" v-html="pageContent[0].content.rendered">
                </div>
            </div>
            <p class="error" v-else>Esta página não tem conteúdo</p>
        </div>

        <div v-else-if="is404" class="container">
            <h1 class="mt-5">Página não encontrada</h1>
            <div class="row">
                <div class="col-12">
                    <p class="text-center">A página solicitada não existe</p>
                </div>
            </div>
        </div>

        <div v-else-if="isError" class="container">
            <h1 class="mt-5">Ocorreu um erro de rede</h1>
            <div class="row">
                <div class="col-12">
                    <p class="text-center">
                        Ocorreu um erro de rede, recarregue a página e tente novamente mais tarde
                    </p>
                </div>
            </div>
        </div>
        <div v-else class="container loadingPage">
            <Loading />
        </div>
    </section>
    
</template>

<script>
    import Loading from "@/components/Loading.vue";

    export default {
        name: "Page",
        components:{Loading},
        data(){
            return {
                pageContent: null,
                slug: null,
                is404: false,
                isError: false
            }
        },
        mounted(){
            this.slug = this.$route.params.slug;
            this.getPage();
        },
        methods:{
            getPage(){
                //reset da página
                this.pageContent = null
                this.is404 = false
                this.isError = false
                let args = []
                args['slug'] = this.slug
                this.$http.getPages(args)
                .then(r => {
                    if (r.status == 200){
                        return r.json()
                    }
                    this.is404= true
                })
                .then(r => {
                    if (r.lenght > 0) {
                        this.pageContent = r
                        document.title = this.pageContent[0].yoast_title
                    } else {
                        this.is404 = true
                    }
                })
                .catch(() =>{
                    this.isError = true;
                });
            }
        },
        watch: {
            '$route.params.slug': function(val){
                this.slug = val;
                this.getPage();
            }
        }
    }
</script>

<style lang="scss">
    @import "@/assets/scss/page.scss"
</style>