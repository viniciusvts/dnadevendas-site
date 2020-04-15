<template>
    <div class="clientsComponent section" v-if="clients">
        <div class="title">
            <h2>Clientes</h2>
            <span></span>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-3" v-for="(client, index) in clients.clientes.slice(0,9)" :key="index">
                    <img class="lazy" src="@/assets/loading.gif" :data-src="client" alt="">
                </div>

                <div class="col-12">
                    <p class="count">300</p>
                </div>
        
                <div class="col-12">
                    <router-link to="/clientes">
                        <button>Ver todos os clientes</button>
                    </router-link>
                </div>
                
            </div>

            
            
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Clients',
        data(){
            return {
                pageID: 37,
                clients: null
            }
        },
        created(){
            this.getClients();
        },
        methods:{
            getClients(){
                fetch(`https://www.dnadevendas.com.br/wp-json/acf/v3/pages/${this.pageID}/clientes`)
                .then(r => r.json())
                .then(r => {
                this.clients = r;
                });
            }
        }
    }
</script>

<style lang="scss">
    @import '@/assets/scss/clients.scss';
</style>