<template>
    <section class="clients">
        <h1>Clientes</h1>
        <div class="container">

            <ul class="menu row justify-content-center">
                <li class="col-auto">
                    <div v-on:click="showClients" class="tooltip active" id="todos">
                        Todos
                        <span class="tooltiptext">{{clients.length}}</span>
                    </div>                    
                </li>
                <li v-for="tax in taxonomy" :key="tax.term_id" class="col-auto">
                    <div class="tooltip" v-on:click="showClients" :id="tax.slug">
                        {{tax.name}}
                        <span class="tooltiptext">{{tax.count}}</span>
                    </div>
                </li>
            </ul>   

            <hr>

            <div v-if="clients.length > 0" class="row logos">
                <div v-for="client in clients" :key="client.slug" :class="getPortfolio_category(client.categories.portfolio_category)" class="col-md-3 active logoClient">
                    <img :src="client.thumb.medium" :alt="client.thumb.alt">
                </div>
            </div>
            <div v-else>
                <PaginaCarregando/>
            </div>
        </div>
    </section>
</template>

<script>
import ApiRest from "@/services/ApiRest.js";
import PaginaCarregando from '@/components/PaginaCarregando.vue';
export default {
    name: "Clients",
    components:{PaginaCarregando},
    data() {
      return {
        clients: [],
        taxonomy: []
      }
    },
    created(){
        this.$root.meta.title = "Dna de Vendas | Clientes";
        this.getClients();
        this.getTaxonomyClients();
    },
    methods:{
        getPortfolio_category(CatArray){
            if (typeof CatArray == 'undefined') throw new TypeError("Precisa de parametro");
            if (!Array.isArray(CatArray)) throw new TypeError("O parametro precisa ser array");
            let resp = [];
            for (const key in CatArray) {
                resp[key] = CatArray[key].slug;
            }
            return resp;
        },
        getClients(){
            if (this.clients.length < 1){
                let args = [];
                args["post_per_page"] = -1
                ApiRest.getPortfolio(args)
                .then(res=>{
                    if(res.status == 200)
                        return res.json();
                })
                .then(json=>{
                    this.clients = json;
                });
            }
        },
        getTaxonomyClients(){
            if (this.clients.length < 1){
                ApiRest.getTaxonomyPortfolio()
                .then(res=>{
                    if(res.status == 200)
                        return res.json();
                })
                .then(json=>{
                    this.taxonomy = json;
                });
            }
        },
        showClients(evt){
            let segments = document.querySelectorAll('.tooltip');
            let logos = document.querySelectorAll('.logoClient');
            let item = evt.target.getAttribute('id');
            if (logos.length == 0) return; // se não carregou ainda as imagens, faz nada
            for(let seg of segments){
                if (seg.getAttribute('id') == item) seg.classList.add('active');
                else seg.classList.remove('active');
            }
            for(let logo of logos){
                if(logo.classList.contains(item) || item === 'todos') logo.classList.add('active');
                else logo.classList.remove('active');
            }
        }
    }
}
</script>

<style lang="scss">
    @import '@/assets/scss/clients.scss';
</style>