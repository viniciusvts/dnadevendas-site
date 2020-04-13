<template>
    <section class="clients">
        <h1>Clientes</h1>
        <div class="container">

            <ul class="menu row justify-content-center">
                <li class="col-auto">
                    <div class="tooltip active" id="todos">
                        Todos
                        <span class="tooltiptext">380</span>
                    </div>                    
                </li>
                <li class="col-auto">
                    <div class="tooltip" id="associacoes">
                        Associações
                        <span class="tooltiptext">380</span>
                    </div>
                </li>
                <li class="col-auto">
                    <div class="tooltip" id="associacoes">
                        Distribuidora
                        <span class="tooltiptext">380</span>
                    </div>
                </li>
                <li class="col-auto">
                    <div class="tooltip" id="associacoes">
                        Educação
                        <span class="tooltiptext">380</span>
                    </div>
                </li>
                <li class="col-auto">
                    <div class="tooltip" id="forsmall">
                        For Small
                        <span class="tooltiptext">380</span>
                    </div>
                </li>
                <li class="col-auto">
                    <div class="tooltip" id="imobiliario">
                        Imobiliário
                        <span class="tooltiptext">380</span>
                    </div>
                </li>
                <li class="col-auto">
                    <div class="tooltip" id="industria">
                        Indústria
                        <span class="tooltiptext">380</span>
                    </div>
                </li>
                <li class="col-auto">
                    <div class="tooltip"  id="saude">
                        Saúde
                        <span class="tooltiptext">380</span>
                    </div>
                </li>
                <li class="col-auto">
                    <div class="tooltip"  id="servicoes">
                        Serviços
                        <span class="tooltiptext">380</span>
                    </div>
                </li>
                <li class="col-auto">
                    <div class="tooltip"  id="tecnologia">
                        Tecnologia
                        <span class="tooltiptext">380</span>
                    </div>
                </li>
                <li class="col-auto">
                    <div class="tooltip" id="varejo">
                        Varejo
                        <span class="tooltiptext">380</span>
                    </div>
                </li>
            </ul>   

            <hr>

            <div class="row logos">
                <div class="col-md-3 active logoClient industria">
                    <img src="https://www.dnadevendas.com.br/wp-content/uploads/cliente-chevrolet-500x313.png" alt="">
                </div>

                <div class="col-md-3 active logoClient associacoes">
                    <img src="https://www.dnadevendas.com.br/wp-content/uploads/cliente-chevrolet-500x313.png" alt="">
                </div>

                <div class="col-md-3 active logoClient associacoes">
                    <img src="https://www.dnadevendas.com.br/wp-content/uploads/cliente-chevrolet-500x313.png" alt="">
                </div>

                <div class="col-md-3 active logoClient associacoes">
                    <img src="https://www.dnadevendas.com.br/wp-content/uploads/cliente-chevrolet-500x313.png" alt="">
                </div>

                <div class="col-md-3 active logoClient associacoes">
                    <img src="https://www.dnadevendas.com.br/wp-content/uploads/cliente-chevrolet-500x313.png" alt="">
                </div>

                <div class="col-md-3 active logoClient varejo">
                    <img src="https://www.dnadevendas.com.br/wp-content/uploads/cliente-chevrolet-500x313.png" alt="">
                </div>
            </div>        
        </div>
    </section>
</template>

<script>
export default {
    name: "Clients",
    created(){
        document.title = "Dna de Vendas | Clientes";
    },
    mounted(){
       this.showClients();
    },
    methods:{
        showClients(){
            let segments = document.querySelectorAll('.tooltip');
            let logos = document.querySelectorAll('.logoClient');
            for(let segment of segments){
                segment.onclick = () => {
                    let item = segment.getAttribute('id');

                    for(let active of segments){
                        if(active.classList.contains('active')){
                            active.classList.remove('active');
                        }
                    }

                    segment.classList.add('active');

                    for(let logo of logos){
                        if(logo.classList.contains(item) || item === 'todos'){
                            logo.classList.add('active');
                        }else{
                            logo.classList.remove('active');
                        }
                    }
                }
            }
        }
    }
}
</script>

<style lang="scss">
    @import '@/assets/scss/clients.scss';
</style>