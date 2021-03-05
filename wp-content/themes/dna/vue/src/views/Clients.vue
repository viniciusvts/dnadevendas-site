<template>
    <section class="clients">
        <h1>Clientes</h1>
        <div class="container-fluid">

            <ul class="menu row justify-content-center align-items-center">
                <li class="col-md-auto col-6">
                    <a href="#todos">
                        <div v-on:click="showClients" class="tooltip active" id="todos">
                            Todos
                            <span class="tooltiptext">{{clients.length}}</span>
                        </div>                    
                    </a>
                </li>
                <li v-for="tax in taxonomy" :key="tax.term_id" class="col-md-auto col-6">
                    <a :href="'#'+tax.slug">
                        <div class="tooltip" v-on:click="showClients" :id="tax.slug">
                            {{tax.name}}
                            <span class="tooltiptext">{{tax.count}}</span>
                        </div>
                    </a>
                </li>
            </ul>   

            <hr>
            <!-- divs com ids para rolagem -->
            <div>
                <div id="todos"></div>
                <div v-for="tax in taxonomy" :key="tax.term_id"  :id="tax.slug"></div>
            </div>

            <div v-if="clients.length > 0" class="row logos" id="clientsDiv">
                <div v-for="(client, index) in clients" :key="client.slug" :class="getPortfolio_category(client.categories.portfolio_category)" class="col-md-2 active logoClient">
                    <img v-if="(index < 18)" :src="client.thumb.medium" :alt="client.thumb.alt">
                    <img v-else class="lazy" :data-src="client.thumb.medium" :alt="client.thumb.alt">
                </div>
            </div>
            <PaginaCarregando v-else/>
        </div>
    </section>
</template>

<script>
import PaginaCarregando from '@/components/Space.vue';
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
        document.title = 'Clientes - DNA de Vendas'
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
                args["orderby"] = ''
                args["order"] = ''
                this.$http.getPortfolio(args)
                .then(res=>{
                    if(res.status == 200)
                        return res.json();
                })
                .then(json=>{
                    this.clients = json;
                    this.$nextTick(() => {
                        this.verifyHash();
                    });
                });
            }
        },
        getTaxonomyClients(){
            if (this.clients.length < 1){
                this.$http.getTaxonomyPortfolio()
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
            let item = evt.target.getAttribute('id');
            this.setClients(item);
        },
        setClients(item){
            let segments = document.querySelectorAll('.tooltip');
            let logos = document.querySelectorAll('.logoClient');
            if (logos.length == 0) return; // se não carregou ainda as imagens, faz nada
            for(let seg of segments){
                if (seg.getAttribute('id') == item) seg.classList.add('active');
                else seg.classList.remove('active');
            }
            for(let logo of logos){
                if(logo.classList.contains(item) || item === 'todos') logo.classList.add('active');
                else logo.classList.remove('active');
            }
        },
        /** verifica se há um hash na url e já seleciona os clients da categoria */
        verifyHash(){
            const hash = location.hash.substr(1);
            if (hash){
                this.setClients(hash);
            }
        }
    }
}
</script>

<style lang="scss">
    @import '@/assets/scss/clients.scss';
</style>