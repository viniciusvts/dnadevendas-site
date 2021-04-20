<template>
    <div class="sidebar">

        <div v-if="isBlogRoute" class="visited">
            <div class="title">
                <h3>Mais Visitados</h3>
                <span></span>
            </div>
            <div v-for="(post, index) in mostViewedPosts" :key="index" class="post">
                <router-link :to="{ name: 'SingleBlog', params: { slug: post.post_name } }">
                    <div class="row no-gutters">
                        <div class="left col-auto col-tb-12 image-sidebar">
                            <img v-if="(index < 5)" :src="post.DNA_custom.thumb.medium" :alt="post.DNA_custom.SEOtitle">
                            <img v-else class="lazy" :data-src="post.DNA_custom.thumb.medium" :alt="post.DNA_custom.SEOtitle">
                        </div>
                        <div class="right col col-tb-12 title-sidebar">{{post.post_title}}
                            <!-- <br/>
                            <p class="date-grey">{{ post.to_ping }}</p> -->
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
            <a href="https://conteudo.dnadevendas.com.br/palestra-sales-da-estrategia-a-execucao" target="_blank">
                <img class="lazy"
                :data-src="$http.baseURL + 'wp-content/uploads/palestras-sales.jpg'"
                alt="banner">
            </a>
        </div>

        <div class="newsletter">
            <form name="newsletterform"
            method="POST"
            :action="$http.baseURL + 'wp-json/dna_theme/v1/contato-footer'"
            @submit="sendForm">
                <input type="hidden" name="urlOrigem" id="urlOrigem">
                <input type="hidden" name="traffic_source" id="traffic_source">
                <input type="hidden" name="traffic_medium" id="traffic_medium">
                <input type="hidden" name="traffic_campaign" id="traffic_campaign">
                <input type="hidden" name="traffic_value" id="traffic_value">
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
            // completa o formulário com alguns dados
            setTimeout(()=>{
                document.getElementById('urlOrigem').value = location.href
                document.getElementById('traffic_source').value = this.$http.getUriParam('utm_source') ? this.$http.getUriParam('utm_source') : this.$http.getCookie('__trf.src')
                document.getElementById('traffic_medium').value = this.$http.getUriParam('utm_medium')
                document.getElementById('traffic_campaign').value = this.$http.getUriParam('utm_campaign')
                document.getElementById('traffic_value').value = this.$http.getUriParam('utm_term')
            }, 2000)
        },
        computed:{
            isSingleBlogRoute(){
                let rota = this.$route.name;
                if(rota === 'SingleBlog') return true;
                return false;
            },
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
            },
            sendForm (evt) {
                evt.preventDefault()
                const formData = new FormData(evt.target)
                const url = evt.target.action
                this.$http.sendFormToWP(url, formData)
                .then(resp => {
                    if (resp.ok) return resp.json()
                    alert('Houve um erro ao enviar,\nTente novamente.')
                })
                .then(json => {
                    location.href = json.data.url
                })
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