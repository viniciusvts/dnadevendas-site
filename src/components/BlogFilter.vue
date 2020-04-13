<template>
    <div class="blogFilter" :class="matchRoute">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="title">
                        <h2><b>Conteúdos <br> direcionados</b> para você</h2>
                        <span></span>
                    </div>
                </div>

                <div class="col">
                    <div class="title">
                        <h4>Para gestores</h4>
                        <span></span>
                    </div>
                    <ul>
                        <li>RH Estratégico</li>
                        <li>Estratégia de Vendas</li>
                        <li>Liderança de equipe</li>
                    </ul>
                </div> 

                <div class="col">
                    <div class="title">
                        <h4>Times de Vendas</h4>
                        <span></span>
                    </div>
                    <ul>
                        <li>Cases de sucesso</li>
                        <li>Competência de Vendas</li>
                        <li>CRM de Vendas</li>
                    </ul>
                </div> 

                <div class="col">
                    <div class="title">
                        <h4>Times de RH</h4>
                        <span></span>
                    </div>
                    <ul>
                        <li>Educação Corporativa</li>
                        <li>Treinamento de Vendas</li>
                    </ul>
                </div>           
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BlogFilter",
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