<template>
    <div class="sidebar">

        <div class="visited">
            <div class="title">
                <h3>Mais Visitados</h3>
                <span></span>
            </div>
            <div class="post">
                <router-link to="/blog/dasdasd">
                    <div class="row no-gutters">
                        <div class="left col-auto"><img src="https://www.dnadevendas.com.br/wp-content/uploads/consultoria-online-de-vendas.jpg" alt=""></div>
                        <div class="right col">Consultoria online de vendas: vantagens para pequenas e médias empresas</div>
                    </div>   
                </router-link>
            </div>          
        </div>

        <div v-if="!matchRoute" class="categories">
            <div class="title">
                <h3>Categorias</h3>
                <span></span>
            </div>
            <ul>
                <li> <router-link to="/blog">Blog</router-link> </li>
                <li> <router-link to="/cases-de-sucesso">Cases de Sucesso</router-link> </li>
                <li>Competência de Vendas</li>
                <li>Consultoria de vendas</li>
                <li>CRM de Vendas</li>
                <li>Dicas de Vendas</li>
                <li>Educação Corporativa</li>
                <li>Estratégia de Vendas</li>
                <li>Liderança de Equipe</li>
                <li>Marketing</li>
                <li>Negociação</li>
                <li>Processos de vendas</li>
                <li>Produtividade de Vendas</li>
                <li>RH estratégico</li>
                <li>Sem categoria</li>
                <li>Técnicas de vendas</li>
                <li>Treinamento em vendas</li>
            </ul>              
        </div>

        <div class="banner">
            <router-link to="/">
                <img src="https://www.dnadevendas.com.br/wp-content/uploads/palestras-sales.jpg" alt="">
            </router-link>
        </div>

        <div v-if="!matchRoute" class="newsletter">
            <form action="">
                <h3>Assine nossa Newsletter</h3>
                <p>Cadastre seu e-mail aqui e receba dicas de como vender mais!</p>
                <input type="text" name="nome" id="nome" placeholder="Seu nome*">
                <input type="email" name="email" id="" placeholder="E-mail">
                <p>* Campos obrigatórios</p>
                <input type="submit" value="Cadastrar">
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Sidebar',
        computed:{
            matchRoute(){
                let rota = this.$route.name;
                return rota === 'Blog' ? true : false;
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