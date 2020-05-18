<template>
    <div class="blogFilter" :class="matchRoute">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-tb-12">
                    <div class="title">
                        <h2 id="blog-title"><b>Conteúdos direcionados ao seu interesse</b></h2>
                    </div>
                </div>

                <div class="col">
                    <div class="title">
                        <h4>Para gestores</h4>
                        <span></span>
                    </div>
                    <ul>
                        <li class="filter-link" v-for="cat in catGestores" :key="cat.id">
                            <router-link :to="{ name: 'BlogCat', params: { cat: cat.slug, page: 1, categories: cat.id} }">
                                {{cat.name}}
                            </router-link>
                        </li>
                    </ul>
                </div> 

                <div class="col">
                    <div class="title">
                        <h4>Times de Vendas</h4>
                        <span></span>
                    </div>
                    <ul>
                        <li class="filter-link" v-for="cat in catTimeVendas" :key="cat.id">
                            <router-link :to="{ name: 'BlogCat', params: { cat: cat.slug, page: 1, categories: cat.id} }">
                                {{cat.name}}
                            </router-link>
                        </li>
                    </ul>
                </div> 

                <div class="col">
                    <div class="title">
                        <h4>Times de RH</h4>
                        <span></span>
                    </div>
                    <ul>
                        <li class="filter-link" v-for="cat in catTimeRH" :key="cat.id">
                            <router-link :to="{ name: 'BlogCat', params: { cat: cat.slug, page: 1, categories: cat.id} }">
                                {{cat.name}}
                            </router-link>
                        </li>
                    </ul>
                </div>           
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BlogFilter",
        data(){
            return{
                catGestores:[
                    {
                        id: 17,
                        slug: 'rh-estrategico',
                        name: 'RH estratégico'
                    },{
                        id: 23,
                        slug: 'estrategia-de-vendas',
                        name: 'Estratégia de Vendas'
                    },{
                        id: 39,
                        slug: 'lideranca-de-equipe',
                        name: 'Liderança de Equipe'
                    }
                ],
                catTimeVendas:[
                    {
                        id: 130,
                        slug: 'cases-sucesso-consultoria-de-vendas',
                        name: 'Cases de sucesso'
                    },{
                        id: 67,
                        slug: 'competencia-de-vendas',
                        name: 'Competência de Vendas'
                    },{
                        id: 85,
                        slug: 'crm-de-vendas',
                        name: 'CRM de Vendas'
                    }
                ],
                catTimeRH:[
                    {
                        id: 14,
                        slug: 'educacao-corporativa	',
                        name: 'Educação Corporativa'
                    },{
                        id: 74,
                        slug: 'treinamento-de-vendas',
                        name: 'Treinamento de Vendas'
                    }
                ]
            }
        },
        computed:{
            matchRoute(){
                let rota = this.$route.name;
                return rota === 'Blog' || rota === 'SingleBlog' ? 'darkFilter' : 'defaultFilter';
            }
        }
    }
</script>

<style lang="scss">
    @import '@/assets/scss/variables.scss';
    @import '@/assets/scss/mixins.scss';
    @import '@/assets/scss/breakpoint.scss';
    @import '@/assets/scss/blogFilter.scss';    
</style>