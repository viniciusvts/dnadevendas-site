<template>
    <div class="sidebar">

        <div v-if="isBlogRoute" class="visited">
            <div class="title">
                <h3>Mais Visitados</h3>
                <span></span>
            </div>
            <div v-for="post in mostViewedPosts" :key="post.id" class="post">
                <router-link :to="{ name: 'SingleBlog', params: { slug: post.post_name } }">
                    <div class="row no-gutters">
                        <div class="left col-auto col-tb-12 image-sidebar">
                            <img :src="post.DNA_custom.thumb.medium" alt="">
                        </div>
                        <div class="right col col-tb-12 title-sidebar">{{post.post_title}}
                            <br/>
                            <p class="date-grey">{{ post.to_ping }}</p>
                        </div>
                    </div>   
                </router-link>
            </div>
        </div>

        <div v-if="isSingleBlogRoute" class="categories">
            <div class="title">
                <h3>Categorias</h3>
                <span></span>
            </div>
            <ul>
                <li v-for="(cat, index) in categories" :key="index">
                    <router-link 
                    :to="{ name: 'BlogCat', params: { cat: cat.slug, page: 1, categories: cat.id} }"
                    :class="{'active': (index == 0)}">
                        {{cat.name}}
                    </router-link>
                </li>
            </ul>              
        </div>

        <div class="banner">
            <a href="https://conteudo.dnadevendas.com.br/palestra-sales-da-estrategia-a-execucao">
                <img :src="$http.baseURL + 'wp-content/uploads/palestras-sales.jpg'" alt="">
            </a>
        </div>

        <div class="newsletter">
            <form name="dna_newsletter"
            method="POST"
            :action="$http.baseURL + 'wp-json/dna_theme/v1/contato-footer'">
                <input type="hidden" name="urlOrigem" id="urlOrigem">
                <h3>Assine nossa Newsletter</h3>
                <p>Cadastre seu e-mail aqui e receba dicas de como vender mais!</p>
                <input type="text" name="nome" id="nome" placeholder="Seu nome*" required>
                <input type="email" name="email" id="email" placeholder="E-mail" required>
                <p>* Campos obrigatórios</p>
                <input type="submit" value="Cadastrar">
            </form>
        </div>
    </div>
</template>

<script>

    export default {
        name: 'Sidebar',
        data() {
            return {
                mostViewedPosts: [],
                categories:[]
            }
        },
        mounted(){
            this.getPosts();
            this.getCategories();
            document.getElementById('urlOrigem').value = location.href
        },
        computed:{
            isBlogRoute(){
                let rota = this.$route.name;
                if(rota === 'Blog') return true;
                if(rota === 'BlogPage') return true;
                if(rota === 'BlogCat') return true;
                return false;
            },
            hasMostViewedPosts(){
                return (this.mostViewedPosts.length > 0);
            }
        },
        methods:{
            getPosts() {
                this.$http.getPostsByViews()
                .then(res=>{
                    if(res.status == 200)
                        return res.json();
                })
                .then(json=>{
                    this.mostViewedPosts = json;
                    for(let i = 0; i < this.mostViewedPosts.length; i++) {
                        const split = this.mostViewedPosts[i].post_date.split(' ');
                        this.mostViewedPosts[i].to_ping = split[0];
                    }
                });
            },
            getCategories(){
                this.$http.getCategories()
                .then(res=>{
                    if(res.status == 200)
                        return res.json();
                })
                .then(json=>{
                    this.categories = json;
                });
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '@/assets/scss/variables.scss';
    @import '@/assets/scss/mixins.scss';
    @import '@/assets/scss/breakpoint.scss';
    @import '@/assets/scss/sidebar.scss';
</style>