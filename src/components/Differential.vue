<template>
    <div class="differential section" v-if="diferentials">
        <div class="title">
            <h2>Diferenciais</h2>
            <span></span>
        </div>  
        <div class="container container-fhd">
            <div class="row">
                <div class="col-sm-12 col-md-4"
                v-for="(diferenciais, index) in diferentials.diferenciais.slice(0,6)"
                :key="index">
                    <div class="inline blue-box" 
                    :class="{'active': (index == 0)}" 
                    @click.prevent="changeDestaq(diferenciais, $event)">
                        <img :src="diferenciais.icone.sizes.thumbnail" 
                        :alt="diferenciais.titulo">
                        <h3>{{diferenciais.titulo}}</h3>
                    </div>
                </div>                
            </div>
            <div class="row destaq" v-if="diferentialsdestaq.title">
                <div class="col-sm-12 col-md-4">
                    <h2>{{diferentialsdestaq.title}}</h2>
                </div>
                <div class="col-sm-12 col-md-8 destaq-text">
                    <p>{{diferentialsdestaq.text}}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Differential',
    data(){
        return {
            pageID: 37,
            diferentials: [],
            diferentialsdestaq: {
                title: null,
                text: null
            }
        }
    },
    created(){
        this.getDiferentials();
    },
    methods:{
        getDiferentials(){
            fetch(`https://www.dnadevendas.com.br/wp-json/acf/v3/pages/${this.pageID}/diferenciais`)
            .then(r => r.json())
            .then(r => {
            this.diferentials = r;
            this.changeDestaq(this.diferentials.diferenciais[0]);
            });
        },
        changeDestaq(diferenciais, evt) {
            console.log(evt);
            this.diferentialsdestaq.title = diferenciais.titulo;
            this.diferentialsdestaq.text = diferenciais.texto;
            if (typeof evt != 'undefined') {
                let blueBoxes = document.querySelectorAll('.blue-box');
                for (const bbox of blueBoxes) {
                    bbox.classList.remove('active');
                }
                /* Pq o evento estava sendo executado nos filhos
                estou fazendo uma verificação para ir no elemento certo*/
                let blueBox = evt.target;
                while (!blueBox.classList.contains('blue-box')) {
                    blueBox = blueBox.parentElement
                }
                blueBox.classList.add('active');
            }
        }
    }
}
</script>

<style lang="scss">
    @import '@/assets/scss/mixins.scss';
    @import '@/assets/scss/differential.scss';
</style>