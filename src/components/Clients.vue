<template>
    <div class="clientsComponent section" v-if="clients">
        <div class="title">
            <h2>Clientes</h2>
            <span></span>
        </div>

        <div class="container-fluid">
            <div class="row align-items-center no-gutters">
                <div class="col-md-6 col-sm-12 col-tb-12">
                    <div class="row no-gutters align-items-center justify-content-center logos">
                        <div class="col-md-4" v-for="(client, index) in clients.clientes.slice(0,12)" :key="index">
                            <img class="lazy" src="@/assets/loading.gif" :data-src="client.sizes.large" alt="">
                        </div>

                        <div class="col-12 col-sm-12 col-tb-12">
                            <div class="counter">
                                <p>300</p>
                                <p :class="['count', pink]">300</p>
                                <p>301</p>
                            </div>
                        </div>
                
                        <div class="col-12 col-sm-12 col-tb-12">
                            <router-link to="/clientes">
                                <button :class="[classButton]">Ver todos os clientes</button>
                            </router-link>
                        </div>                
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-tb-12">
                    <img class="lazy" src="@/assets/loading.gif" data-src="https://www.dnadevendas.com.br/wp-content/uploads/VÍDEO-LÚCIA-min.jpg" :alt="Clientes">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import classBtn from '../services/ClassButton';
import pinkText from '../services/TextPink';

    export default {
        name: 'Clients',
        mixins: [classBtn, pinkText],
        data(){
            return {
                pageID: 37,
                clients: null,
                classButton: null,
                pink: null,
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