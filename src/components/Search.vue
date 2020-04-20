<template>
    <transition>
        <div id="searching" v-if="show" class="active">
            <div id="exit">
                <img src="@/assets/svg/cancel.svg" alt="Sair">
            </div>
            <div class="container">
                <h2>Pesquisa no blog</h2>
                <div class="row align-items-center">
                    <div class="col-12">
                        <form id="search" @submit="getPosts">
                            <p v-if="errors.length > 0">
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
    </transition>
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
            loader: false,
            show: false,
            totalPages: null
        }
    },
    mounted(){
        this.showSearch();
    },
    methods:{        
        getPosts(){
            if (this.term) { 
                this.loader = true;
                this.posts = false;
                this.errors = [];

                setTimeout( () => {
                    fetch(`https://www.dnadevendas.com.br/wp-json/wp/v2/posts/?search=${this.term}&per_page=10`)
                    .then(r => r.json())
                    .then(r => {
                        this.posts = r;
                    })
                }, 1000);
            }         
            else{
                 if (!this.term) {
                    this.loader = false;
                    this.errors.push('O termo da busca é obrigatório.');                    
                }
            }                
        },
        showSearch(){
            let searchBtn  = document.querySelector('#searchBtn');           
            searchBtn.onclick = () =>{
                this.show = true;
                setTimeout( () => {
                    this.exitSearch();
                }, 200)
            }
            
        },
        exitSearch(){
            let searching  = document.querySelector('#searching');
            let resultPosts  = document.querySelector('#resultPosts');
            let exit  = document.querySelector('#exit'); 

            resultPosts.onclick = () =>{
                searching.classList.remove('active');
            }

            exit.onclick = () =>{
                this.errors = [],
                this.term = null,
                this.posts = false,
                this.loader = false,
                this.show = false
            }
        }
    },
}
</script>

<style lang="scss">
    @import '@/assets/scss/search.scss';
</style>