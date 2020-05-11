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
                
            }
        },
        created(){
            this.getPage();
        },
        methods:{
            getPage(){
                fetch(`https://www.dnadevendas.com.br/wp-json/wp/v2/pages/?slug=${this.slug}`)
                .then(r => r.json())
                .then(r => {
                this.pageContent = r;
                this.$root.meta.title = this.pageContent[0].yoast_title;
                this.$root.meta.tags = this.pageContent[0].yoast_meta;
                });
            }
        },
        computed: {
            slug() {
                let slug = this.$route.params.slug;
                return slug;
            }
        },
        watch: {
            slug() {
                this.getPage();
            }
        }
    }
</script>

<style lang="scss">
    @import "@/assets/scss/page.scss"
</style>