<template>
    <section class="page" style="background: white">

        <div v-if="pageContent" class="container">
            <h1 >{{pageContent[0].title.rendered}}</h1>
            <div class="row" v-if="pageContent[0].acf.conteudo">
                <div class="col-12" v-html="pageContent[0].acf.conteudo">
                </div>
            </div>
            <p class="error" v-else>Esta página não tem conteúdo</p>
        </div>

        <div v-else-if="is404" class="container">
            404: não encontrado
        </div>

        <div v-else-if="isError" class="container">
            <h1>Ocorreu um erro de rede</h1>
            <p class="text-center">
                Ocorreu um erro de rede, recarregue a página e tente novamente mais tarde
            </p>
        </div>

        <div v-else class="container">
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
                this.pageContent = r;
                this.$root.meta.title = this.pageContent[0].yoast_title;
                this.$root.meta.tags = this.pageContent[0].yoast_meta;
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