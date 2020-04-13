<template>
    <div id="searching">
        <div id="exit">
            <img src="@/assets/svg/cancel.svg" alt="Sair">
        </div>
        <div class="container">
            <h2>Pesquisa no blog</h2>
            <div class="row align-items-center">
                <div class="col-12">
                    <form id="search" @submit="getPosts">
                        <p v-if="errors.length">
                            <b>Por favor, corrija o(s) seguinte(s) erro(s):</b>
                            <ul>
                                <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
                            </ul>
                        </p>

                        <input id="busca" v-model="term" type="text" name="busca" placeholder="Digite um termo de busca">

                        <input type="submit" value="Buscar" @click.prevent="getPosts">
                    </form>
                </div>
            </div>

            <div id="resultPosts">
                <div v-if="posts">
                    <span> Resultados Encontrados: {{posts.length}} </span>
                    <div class="row">
                        <ul class="col-md-12">
                            <li v-for="(post, index) in posts" :key="index">
                                <router-link :to="'/blog/' + post.slug">
                                    {{post.title.rendered}}
                                </router-link>
                            </li>
                        </ul>
                    </div>
                </div>
                <div v-else>
                    <div v-if="loader">
                        <Loading/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import Loading from "@/components/Loading.vue";

export default {
    name: "Search",
    components:{
        Loading
    },
    data() {
        return {
            errors: [],
            term: null,
            posts: false,
            loader: false
        }
    },
    mounted(){
        this.exitSearch();
    },
    methods:{        
        getPosts(){
            if (this.term) {
                this.errors = [];   
                this.loader = true;
                setTimeout(() => {
                    fetch(`https://www.dnadevendas.com.br/wp-json/wp/v2/posts/?search=${this.term}&per_page=10`)
                    .then(r => r.json())
                    .then(r => {
                        this.posts = r;
                    });
                }, 1000);
            }         
            else{
                 if (!this.term) {
                    this.loader = false;
                    this.errors.push('O termo da busca é obrigatório.');                    
                }
            }                
        },
        exitSearch(){            
            let searching  = document.querySelector('#searching');
            let resultPosts  = document.querySelector('#resultPosts');
            let exit  = document.querySelector('#exit'); 
            let searchBtn  = document.querySelector('#searchBtn');

            searchBtn.onclick = () =>{
            searching.classList.add('active');
            }

            resultPosts.onclick = () =>{
                searching.classList.remove('active');
            }

            exit.onclick = () =>{
                searching.classList.remove('active');
                this.terms = null;
                this.posts = [];
            }
        }
    },
}
</script>

<style lang="scss">
    @import '@/assets/scss/search.scss';
</style>